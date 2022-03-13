<?php

declare(strict_types=1);

namespace Neo\LiteRay\View\Components;

use Illuminate\View\Component;
use Neo\LiteRay\Transfer\RayLogPayload;

class PayloadsLog extends Component
{
    public RayLogPayload $payload;

    /**
     * Create the component instance.
     *
     * @param  RayLogPayload  $payload
     * @return void
     */
    public function __construct($payload)
    {
        $this->payload = $payload;
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\Support\Htmlable|\Closure|string
     */
    public function render()
    {
        return view('literay::components.payloads.log', ['payload' => $this->payload]);
    }
}
