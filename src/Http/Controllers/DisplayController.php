<?php

declare(strict_types=1);

namespace Neo\LiteRay\Http\Controllers;

use Illuminate\Routing\Controller;
use Neo\LiteRay\Services\LogParser;
use Neo\LiteRay\Services\HtmlDumper;

class DisplayController extends Controller
{
    /**
     * Displays the Ray log.
     *
     * @return  \Illunmiate\Http\Response
     */
    public function __invoke(LogParser $logParser)
    {
        return view('literay::display', [
            'items' => $logParser->parse(),
            'sfdump' => $this->sfdump(),
        ]);
    }

    public function sfdump(): string
    {
        return (new HtmlDumper())->dumpHeader();
    }
}
