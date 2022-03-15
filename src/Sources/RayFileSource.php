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
            $file = $this->sourceFile();
            $log = json_encode($data).PHP_EOL;

            $handle = fopen($this->sourceFile(), 'r+');
            $len = strlen($log);
            $finalLen = filesize($file) + $len;
            $oldCache = fread($handle, $len);
            rewind($handle);

            $i = 1;
            while (ftell($handle) < $finalLen) {
                fwrite($handle, $log);
                $log = $oldCache;
                $oldCache = fread($handle, $len);
                fseek($handle, $i * $len);
                $i++;
            }

            fclose($handle);
        }
    }

    public function clear(): void
    {
        File::put($this->sourceFile(), '');
    }

    private function sourceFile(): string
    {
        return config('literay.data_sources.file.path').'/ray.log';
    }
}
