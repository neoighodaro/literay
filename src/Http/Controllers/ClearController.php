<?php

namespace Neo\LiteRay\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use Neo\LiteRay\Contracts\RayDataSource;

class ClearController extends Controller
{
    /**
     * Clear the ray log.
     *
     * @param  \Neo\LiteRay\Contracts\RayDataSource  $dataSource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(RayDataSource $dataSource): RedirectResponse
    {
        $dataSource->clear();

        return redirect()->route('literay.index');
    }
}
