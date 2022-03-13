<?php

declare(strict_types=1);

namespace Neo\LiteRay\Transfer;

use Spatie\DataTransferObject\DataTransferObject;

class RayLogMeta extends DataTransferObject
{
    public ?string $php_version;

    public ?string $php_version_id;

    public ?string $project_name;

    public ?string $laravel_version;

    public ?string $laravel_ray_package_version;

    public ?string $ray_package_version;
}
