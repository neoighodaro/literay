<?php

declare(strict_types=1);

namespace Neo\LiteRay\Services;

use Symfony\Component\VarDumper\Dumper\HtmlDumper as SfHtmlDumper;

class HtmlDumper extends SfHtmlDumper
{
    public function dumpHeader(): string
    {
        return str_replace(
            ['#18171B', '#56DB3A', '#1299DA', '#A0A0A0', '#FFFFFF', '#B729D9', '#56DB3A', '#FF8400'],
            ['#F1F5F9', '#629755', '#6897BB', '#6E6E6E', '#262626', '#B729D9', '#789339', '#CC7832'],
            $this->getDumpHeader()
        );
    }
}
