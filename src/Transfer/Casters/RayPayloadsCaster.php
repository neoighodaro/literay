<?php

declare(strict_types=1);

namespace Neo\LiteRay\Transfer\Casters;

use Exception;
use Spatie\DataTransferObject\Caster;
use Neo\LiteRay\Transfer\RayLogPayload;

class RayPayloadsCaster implements Caster
{
    public function cast(mixed $value): mixed
    {
        if (! is_array($value)) {
            throw new Exception(__('Can only cast arrays to Foo'));
        }

        $cast = function (array $data) {
            $type = $data['type'] ?? null;

            switch ($type) {
                case 'log':
                    return new RayLogPayload(
                        type: $type,
                        origin: $data['origin'] ?? null,
                        content: array_map(
                            fn ($item) => $this->removeSfDumpStyleAndScript($item),
                            $data['content']['values'] ?? [],
                        ),
                    );
                // case 'exception':
                //     return new RayLogPayload(
                //         type: $type,
                //         origin: $data['origin'] ?? null,
                //         content: $data['content']['values'] ?? null,
                //     );
                default:
                    return null;
            }
        };

        return array_filter(array_map($cast, $value));
    }

    protected function removeSfDumpStyleAndScript(mixed $value): string
    {
        if (! is_string($value) || ! str_contains($value, 'Sfdump = window.Sfdump')) {
            return $value;
        }

        return preg_replace('#.*(<pre)#', '$1$2', $value);
    }
}
