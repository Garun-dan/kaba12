<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackController extends Controller
{
    private function validasiMenu($slugMenu, $slugSubMenu)
    {
        if ($slugMenu !== 'menu') {
            abort(404);
        }

        $namaSubMenu = ucwords($slugSubMenu);

        return $namaSubMenu;
    }

    public function index($slugMenu, $slugSubMenu)
    {
        $title = $this->validasiMenu($slugMenu, $slugSubMenu);

        $data = [
            'title' => $title,
        ];

        $path = 'backend.' . $slugSubMenu;

        if (view()->exists($path)) {
            return view($path, $data);
        } else {
            abort(404);
        }
    }
}
