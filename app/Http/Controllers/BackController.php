<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use App\Models\SubMenuModel;
use App\Models\RoleModel;
use App\Models\TampilanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class BackController extends Controller
{
    private function validasiMenu($slugMenu, $slugSubMenu)
    {
        $cekMenu = MenuModel::where('slug_menu', $slugMenu)->first();

        if (!$cekMenu) {
            abort(404);
        }

        $cekSubMenu = SubMenuModel::where('slug_submenu', $slugSubMenu)
            ->where('id_menu', $cekMenu->id_menu)
            ->first();

        if (!$cekSubMenu) {
            abort(404);
        }

        return $cekSubMenu->nama_submenu;
    }


    private function urlPath($slugMenu, $slugSubMenu)
    {
        return '/admin/' . $slugMenu . '/' . $slugSubMenu;
    }

    private function kembali($redir, $status, $pesan)
    {
        return redirect($redir)->with($status, $pesan);
    }

    private function createControllerForMenu($namaMenu)
    {
        $controllerName = ucfirst(Str::camel($namaMenu)) . 'Controller';

        $controllerPath = app_path("Http/Controllers/{$controllerName}.php");

        if (!File::exists($controllerPath)) {
            Artisan::call('make:controller', ['name' => "Http/Controllers/{$controllerName}"]);

            $controllerTemplate = "<?php

                namespace App\Http\Controllers;

                use Illuminate\Http\Request;

                class {$controllerName} extends Controller
                {
                }
                ";

            File::put($controllerPath, $controllerTemplate);
        }
    }

    public function index($slugMenu, $slugSubMenu)
    {
        $title = $this->validasiMenu($slugMenu, $slugSubMenu);

        $menu = MenuModel::where('slug_menu', $slugMenu)->first();

        $data = [
            'title' => $title,
            'slugMenu' => $slugMenu,
            'slugSubMenu' => $slugSubMenu,
            'menu' => $menu->nama_menu,
            'submenu' => $title,
            'pengaturan' => TampilanModel::where('id_tampilan', 'mpt-001')->first(),
            'allMenu' => MenuModel::all(),
            'allSubMenu' => SubMenuModel::with('joinMenu')->get(),
            'allRole' => RoleModel::all(),
        ];

        $path = 'backend.' . $slugSubMenu;

        if (view()->exists($path)) {
            return view($path, $data);
        } else {
            abort(404);
        }
    }

    // Tambah Menu
    public function tambahMenu(Request $request, $slugMenu, $slugSubMenu)
    {
        $this->validasiMenu($slugMenu, $slugSubMenu);

        $validator = Validator::make($request->all(), [
            'data' => 'required|array',
            'data.*.0' => 'required|string|max:64',
            'data.*.1' => 'nullable|string|max:64',
            'data.*.2' => 'required|string|in:home,admin',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
                'swal' => [
                    'title' => 'Gagal!',
                    'text' => 'Terjadi kesalahan validasi.',
                    'icon' => 'error'
                ]
            ], 422);
        }

        foreach ($request->data as $index => $row) {
            $cekData = MenuModel::orderBy('id_menu', 'desc')->first();
            $id_menu = $cekData ? 'mnu-' . str_pad((int) substr($cekData->id_menu, 4) + 1, 3, '0', STR_PAD_LEFT) : 'mnu-001';
            $namaMenu = str_replace(' ', '', $row[0]);

            MenuModel::create([
                'id_menu' => $id_menu,
                'nama_menu' => $row[0],
                'slug_menu' => Str::slug($row[0]),
                'icon_menu' => $row[1] ?? null,
                'posisi_menu' => $row[2],
            ]);

            $this->createControllerForMenu($namaMenu);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan!',
            'swal' => [
                'title' => 'Berhasil!',
                'text' => 'Menu berhasil ditambahkan.',
                'icon' => 'success'
            ]
        ]);
    }
}
