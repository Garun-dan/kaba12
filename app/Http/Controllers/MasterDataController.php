<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use App\Models\SubMenuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class MasterDataController extends Controller
{
    private function validasiMenu($slugMenu, $slugSubMenu)
    {
        if ($slugMenu !== 'menu') {
            abort(404);
        }

        $namaSubMenu = ucwords($slugSubMenu);

        return $namaSubMenu;
    }

    private function urlPath($slugMenu, $slugSubMenu)
    {
        return '/admin/' . $slugMenu . '/' . $slugSubMenu;
    }

    private function kembali($redir, $status, $pesan)
    {
        return redirect($redir)->with($status, $pesan);
    }

    // Update Menu
    public function updateMenu($slugMenu, $slugSubMenu, $idMenu, Request $request)
    {
        $this->validasiMenu($slugMenu, $slugSubMenu);
        $redir = $this->urlPath($slugMenu, $slugSubMenu);

        $validasi = $request->validate([
            'nama_menu' => 'required|string|max:64',
            'icon_menu' => 'required|string|max:64',
            'posisi_menu' => 'required|string|in:home,admin',
        ]);

        $updateMenu = MenuModel::where('id_menu', $idMenu)->first();

        $nama_menu = $validasi['nama_menu'];
        $slug_menu = Str::slug($nama_menu);
        $icon_menu = $validasi['icon_menu'];
        $posisi_menu = $validasi['posisi_menu'];

        $cekData = MenuModel::where('slug_menu', $slug_menu)->first();

        if ($cekData) {
            return $this->kembali($redir, 'error', 'Menu ' . $nama_menu . ' Sudah Tersedia!');
        }

        $updateMenu->nama_menu = $nama_menu;
        $updateMenu->slug_menu = $slug_menu;
        $updateMenu->icon_menu = $icon_menu;
        $updateMenu->posisi_menu = $posisi_menu;
        $updateMenu->save();

        return $this->kembali($redir, 'success', 'Menu ' . $nama_menu . ' Berhasil Disimpan!');
    }

    // Tambah Submenu
    public function tambahSubMenu($slugMenu, $slugSubMenu, Request $request)
    {
        $this->validasiMenu($slugMenu, $slugSubMenu);
        $redir = $this->urlPath($slugMenu, $slugSubMenu);

        $validator = Validator::make($request->all(), [
            'data' => 'required|array',
            'data.*.0' => 'required|string|max:64',
            'data.*.1' => 'nullable|string|max:64',
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
            $cekData = SubMenuModel::orderBy('id_submenu', 'desc')->first();
            $id_submenu = $cekData ? 'sbm-' . str_pad((int) substr($cekData->id_submenu, 4) + 1, 3, '0', STR_PAD_LEFT) : 'sbm-001';
            $slug_menu = Str::slug($row[1]);
            $cekMenu = MenuModel::where('slug_menu', $slug_menu)->first();
            $slug_submenu = Str::slug($row[0]);

            SubMenuModel::create([
                'id_submenu' => $id_submenu,
                'nama_submenu' => $row[0],
                'slug_submenu' => $slug_submenu,
                'id_menu' => $cekMenu->id_menu,
            ]);

            $content = <<<BLADE
        <x-back-end.layout>
            <x-slot:title>{{ \$title }}</x-slot:title>
        </x-back-end.layout>
        BLADE;

            $filePath = resource_path("views/backend/{$slug_submenu}.blade.php");

            if (!File::exists($filePath)) {
                File::put($filePath, $content);
            }
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

    // Update SubMenu
    public function updateSubMenu($slugMenu, $slugSubMenu, $idSubMenu, Request $request)
    {
        $this->validasiMenu($slugMenu, $slugSubMenu);
        $redir = $this->urlPath($slugMenu, $slugSubMenu);

        $validasi = $request->validate([
            'nama_submenu' => 'required|string|max:64',
            'id_menu' => 'required|string|max:7',
        ]);

        $nama_submenu = $validasi['nama_submenu'];
        $slug_submenu = Str::slug($nama_submenu);
        $id_menu = $validasi['id_menu'];

        $updateSubMenu = SubMenuModel::where('id_submenu', $idSubMenu)->first();

        $cekData = SubMenuModel::where('slug_submenu', $slug_submenu)->first();

        if ($cekData) {
            return $this->kembali($redir, 'error', 'SubMenu ' . $nama_submenu . ' Sudah Tersedia');
        }

        $oldFiles = resource_path("views/backend/{$updateSubMenu->slug_submenu}.blade.php");
        $newFiles = resource_path("views/backend/{$slug_submenu}.blade.php");

        File::move($oldFiles, $newFiles);

        $updateSubMenu->nama_submenu = $nama_submenu;
        $updateSubMenu->slug_submenu = $slug_submenu;
        $updateSubMenu->id_menu = $id_menu;
        $updateSubMenu->save();

        return $this->kembali($redir, 'success', 'SubMenu ' . $nama_submenu . ' Berhasil Diperbaharui!');
    }
}
