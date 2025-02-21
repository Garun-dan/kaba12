<?php

namespace App\View\Components\BackEnd;

use App\Models\MenuModel;
use App\Models\SubMenuModel;
use App\Models\TampilanModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LeftSidebar extends Component
{
    public $pengaturan;
    public $allMenu;
    public $allSubMenu;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->pengaturan = TampilanModel::where('id_tampilan', 'mpt-001')->first();
        $this->allMenu = MenuModel::all();
        $this->allSubMenu = SubMenuModel::with('joinMenu')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.back-end.left-sidebar');
    }
}
