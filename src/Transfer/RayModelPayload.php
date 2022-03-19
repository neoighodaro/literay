<?php

declare(strict_types=1);

namespace Neo\LiteRay\Transfer;

class RayModelPayload extends RayLogPayload
{
    public ?string $model;

    public ?string $relations;

    public ?string $attributes;
}
