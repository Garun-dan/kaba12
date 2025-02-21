<?php

namespace App\View\Components\BackEnd;

use App\Models\TampilanModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public $pengaturan;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->pengaturan = TampilanModel::where('id_tampilan', 'mpt-001')->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.back-end.layout');
    }
}
