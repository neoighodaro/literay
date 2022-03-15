<?php

namespace Neo\LiteRay\Contracts;

use Illuminate\Support\LazyCollection;

interface RayDataSource
{
    public function persist(array $data): void;

    public function data(): LazyCollection;

    public function clear(): void;
}
