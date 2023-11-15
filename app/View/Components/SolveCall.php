<?php

namespace App\View\Components;

use App\Models\Call;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SolveCall extends Component
{
    public Call $call;
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->call = Call::find($this->value);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->call = Call::find($this->value);

        return view('components.solve-call');
    }
}
