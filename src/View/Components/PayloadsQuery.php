<?php

namespace Neo\LiteRay\View\Components;

use Illuminate\View\Component;
use Neo\LiteRay\Transfer\RayQueryPayload;

class PayloadsQuery extends Component
{
    public RayQueryPayload $payload;

    /**
     * Create the component instance.
     *
     * @param  RayQueryPayload  $payload
     * @return void
     */
    public function __construct(RayQueryPayload $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('literay::components.payloads.query', ['payload' => $this->payload]);
    }
}
