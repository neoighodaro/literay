<?php

namespace Neo\LiteRay\Transfer;

class RayQueryPayload extends RayLogPayload
{
    public ?string $connection_name;

    public ?string $time;

    public string $sql;
}
