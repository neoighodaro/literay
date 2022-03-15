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
        $dataSource->persist(
            $this->prepareData($request->all())
        );

        return response('', 200);
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function prepareData(array $data): array
    {
        $data['date'] = now()->toIso8601String();
        $data['payloads'] = array_map(static fn (array $payload) => [
            ...$payload,
            'type' => match ($payload['type']) {
                'executed_query' => 'query',
                default => $payload['type'],
            },
        ], $data['payloads'] ?? []);

        return $data;
    }
}
