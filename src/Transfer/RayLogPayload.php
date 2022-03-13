<?php

declare(strict_types=1);

namespace Neo\LiteRay\Transfer;

use Neo\LiteRay\Contracts\RayPayload;
use Spatie\DataTransferObject\DataTransferObject;

class RayLogPayload extends DataTransferObject implements RayPayload
{
    public string $type;

    public array $origin;

    public array $content;
}
