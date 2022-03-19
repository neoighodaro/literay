<?php

declare(strict_types=1);

namespace Neo\LiteRay\Transfer\Casters;

use Exception;
use Spatie\DataTransferObject\Caster;
use Neo\LiteRay\Transfer\RayLogPayload;
use Neo\LiteRay\Transfer\RayModelPayload;
use Neo\LiteRay\Transfer\RayQueryPayload;

class RayPayloadsCaster implements Caster
{
    public function cast(mixed $value): mixed
    {
        $cast = function (array $data) {
            $type = $data['type'] ?? null;
            $origin = $data['origin'] ?? null;

            return match ($type) {
                'log' => new RayLogPayload(
                    type: $type,
                    origin: $origin,
                    content: array_map(fn ($item) => $this->cleanSfDump($item), $data['content']['values'] ?? [], ),
                ),
                'query' => new RayQueryPayload(
                    type: $type,
                    origin: $origin,
                    time: $data['content']['time'] ?? null,
                    connection_name: $data['content']['connection_name'] ?? null,
                    sql: $this->insertBinds($data['content']['sql'] ?? null, $data['content']['bindings'] ?? []),
                ),
                'model' => new RayModelPayload(
                    type: $type,
                    origin: $origin,
                    attributes: $this->cleanSfDump($data['content']['attributes'] ?? null),
                    relations: $this->cleanSfDump($data['content']['relations'] ?? null),
                    model: $data['content']['class_name'] ?? null,
                ),
                'exception' => null,
                default => null,
            };
        };

        try {
            if (! is_array($value)) {
                throw new Exception(__('Can only cast arrays to Foo'));
            }

            return array_filter(array_map($cast, $value));
        } catch (Exception) {
            return [];
        }
    }

    protected function insertBinds(?string $query, array $bindings): ?string
    {
        if (! $query) {
            return null;
        }

        foreach ($bindings as $binding) {
            if (is_bool($binding)) {
                $val = $binding === true ? 'TRUE' : 'FALSE';
            } elseif (is_numeric($binding)) {
                $val = (string) $binding;
            } else {
                $val = "'$binding'";
            }

            $query = preg_replace("#\?#", $val, $query, 1);
        }

        return str_replace('"', '`', $query);
    }

    protected function cleanSfDump(mixed $value): mixed
    {
        if (! is_string($value) || ! str_contains($value, 'Sfdump = window.Sfdump')) {
            return $value;
        }

        return preg_replace('#.*(<pre)#', '$1$2', $value);
    }
}
