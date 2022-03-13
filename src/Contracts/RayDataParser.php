<?php

namespace Neo\LiteRay\Contracts;

use Illuminate\Support\LazyCollection;

interface RayDataParser
{
    public function parse(): LazyCollection;
}
