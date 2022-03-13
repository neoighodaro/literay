<?php

declare(strict_types=1);

namespace Neo\LiteRay\View\Components;

use Illuminate\View\Component;
use Neo\LiteRay\Transfer\RayLog;

class LogBlock extends Component
{
    public RayLog $item;

    /**
     * Create the component instance.
     *
     * @param  RayLog  $item
     * @return void
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / view contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\Support\Htmlable|\Closure|string
     */
    public function render()
    {
        return view('literay::components.block', ['item' => $this->item]);
    }
}
