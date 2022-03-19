<?php

namespace Neo\LiteRay\View\Components;

use Illuminate\View\Component;
use Neo\LiteRay\Transfer\RayModelPayload;

class PayloadsModel extends Component
{
    public RayModelPayload $payload;

    /**
     * Create the component instance.
     *
     * @param  \Neo\LiteRay\Transfer\RayModelPayload  $payload
     */
    public function __construct(RayModelPayload $payload)
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
        return view('literay::components.payloads.model', ['payload' => $this->payload]);
    }
}
