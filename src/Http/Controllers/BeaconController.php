<?php

declare(strict_types=1);

namespace Neo\LiteRay\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Neo\LiteRay\Contracts\RayDataSource;

class BeaconController extends Controller
{
    /**
     * Handles an incoming request from Ray.
     *
     * @param  Request  $request
     * @param  \Neo\LiteRay\Contracts\RayDataSource  $dataSource
     * @return Response
     */
    public function __invoke(Request $request, RayDataSource $dataSource): Response
    {
        $dataSource->persist($request->all());

        return response('', 200);
    }
}
