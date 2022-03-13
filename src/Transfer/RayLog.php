<?php

declare(strict_types=1);

namespace Neo\LiteRay\Transfer;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Neo\LiteRay\Transfer\Casters\RayPayloadsCaster;

class RayLog extends DataTransferObject
{
    public string $uuid;

    /** @var array|\Neo\LiteRay\Contracts\RayPayload[] */
    #[CastWith(RayPayloadsCaster::class)]
    public array $payloads;

    public RayLogMeta $meta;
}
