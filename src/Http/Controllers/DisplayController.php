<?php

declare(strict_types=1);

namespace Neo\LiteRay\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;
use Neo\LiteRay\Services\LogParser;
use Neo\LiteRay\Services\HtmlDumper;

class DisplayController extends Controller
{
    /**
     * Displays the Ray log.
     *
     * @param  \Neo\LiteRay\Services\LogParser  $logParser
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(LogParser $logParser): View
    {
        return view('literay::display', ['items' => $logParser->parse(), 'sfdump' => $this->sfdump()]);
    }

    private function sfdump(): string
    {
        return (new HtmlDumper())->dumpHeader();
    }
}
