<?php

namespace App\View\Components\BackEnd;

use App\Models\MenuModel;
use App\Models\RoleModel;
use App\Models\SubMenuModel;
use App\Models\TampilanModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modals extends Component
{
    public $slugMenu;
    public $slugSubMenu;
    public $pengaturan;
    public $allMenu;
    public $allSubMenu;
    public $allRole;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->setSlugFromUrl();
        $this->pengaturan = TampilanModel::where('id_tampilan', 'mpt-001')->first();
        $this->allMenu = MenuModel::all();
        $this->allSubMenu = SubMenuModel::with('joinMenu')->get();
        $this->allRole = RoleModel::all();
    }

    private function setSlugFromUrl(): void
    {
        $segments = request()->segments();

        if (count($segments) < 2) {
            abort(404, 'URL tidak valid.');
        }

        $this->slugMenu = $segments[1];
        $this->slugSubMenu = $segments[2];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.back-end.modals');
    }
}
