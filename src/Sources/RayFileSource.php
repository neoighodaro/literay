<?php

declare(strict_types=1);

namespace Neo\LiteRay\Sources;

use Illuminate\Support\Facades\File;
use Illuminate\Support\LazyCollection;
use Neo\LiteRay\Contracts\RayDataSource;

class RayFileSource implements RayDataSource
{
    /**
     * @return \Illuminate\Support\LazyCollection
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function data(): LazyCollection
    {
        $sourceFile = $this->sourceFile();

        if (! File::exists($sourceFile)) {
            File::put($sourceFile, '');
        }

        return File::lines($sourceFile)->map(static fn (string $line) => json_decode($line, true));
    }

    public function persist(array $data): void
    {
        $uuid = $data['uuid'] ?? null;
        $meta = $data['meta'] ?? null;
        $payloads = $data['payloads'] ?? null;

        if ($uuid && $payloads && $meta) {
            $dest = fopen($this->sourceFile(), 'a');
            fwrite($dest, json_encode($data).PHP_EOL);
            fclose($dest);
        }
    }

    private function sourceFile(): string
    {
        return config('literay.data_sources.file.path').'/ray.log';
    }
}
