<?php

declare(strict_types=1);

namespace Neo\LiteRay\Services;

use Carbon\Carbon;
use Neo\LiteRay\Transfer\RayLog;
use Illuminate\Support\LazyCollection;
use Neo\LiteRay\Contracts\RayDataParser;
use Neo\LiteRay\Contracts\RayDataSource;

class LogParser implements RayDataParser
{
    /**
     * @var \Neo\LiteRay\Contracts\RayDataSource
     */
    protected RayDataSource $source;

    /**
     * Create a new LogParser instance.
     *
     * @param  RayDataSource $source
     * @return void
     */
    public function __construct(RayDataSource $source)
    {
        $this->source = $source;
    }

    /**
     * Parse the Ray log.
     *
     * @return \Illuminate\Support\LazyCollection
     */
    public function parse(): LazyCollection
    {
        return $this->source->data()
            ->map(static function (?array $line) {
                return $line ? new RayLog(
                    uuid: $line['uuid'],
                    meta: $line['meta'],
                    payloads: $line['payloads'],
                    date: Carbon::parse($line['date']),
                ) : null;
            })
            ->filter();
    }
}
