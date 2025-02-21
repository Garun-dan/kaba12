<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use App\Models\SubMenuModel;
use App\Models\TampilanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PengaturanController extends Controller
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

    // Reset Tampilan
    public function resetTampilan($slugMenu, $slugSubMenu, Request $request)
    {
        $this->validasiMenu($slugMenu, $slugSubMenu);

        $redir = $this->urlPath($slugMenu, $slugSubMenu);

        $validated = $request->validate([
            'id_tampilan' => 'required|string|max:7',
        ]);

        $cekData = TampilanModel::where('id_tampilan', $validated['id_tampilan'])->first();

        $data = [
            'nama_web' => 'kaba12',
            'slogan_web' => 'Media Inspirasi Masa Kini',
            'nama_instansi' => 'PT. Media Kaba Duobaleh',
            'alamat_email' => 'redaksi.kaba12@gmail.com',
            'nomor_telephone' => '(0752) 76808',
            'alamat' => 'Jl. Sudirman, No. 02, Padang Baru, Lubukbasung, Kab. Agam, Sumatera Barat',
            'logo_web' => 'default/logo/logo.svg',
            'favicon_web' => 'default/logo/favication.svg',
            'background_web' => 'default/media/image/background.jpg',
            'background_login' => 'default/media/video/video.mp4',
            'fb' => 'media_kaba12',
            'ig' => 'media_kaba12',
            'thread' => 'media_kaba12',
            'tiktok' => 'media_kaba12',
            'youtube' => 'media_kaba12',
            'twitter' => 'media_kaba12',
        ];

        $fileFields = [
            'logo_web' => 'default/logo/logo.svg',
            'favicon_web' => 'default/logo/favication.svg',
            'background_web' => 'default/media/image/background.jpg',
            'background_login' => 'default/media/video/video.mp4',
        ];

        if (!$cekData) {
            $perbaharui = TampilanModel::create([
                'id_tampilan' => $validated['id_tampilan'],
            ] + $data);
        } else {
            foreach ($fileFields as $field => $default) {
                if ($cekData->$field !== $default && Storage::exists($cekData->$field)) {
                    Storage::delete($cekData->$field);
                }
            }

            $perbaharui = TampilanModel::where('id_tampilan', $validated['id_tampilan'])
                ->update($data);
        }

        if ($perbaharui) {
            return $this->kembali($redir, 'success', 'Pengaturan berhasil telah direset.');
        } else {
            return $this->kembali($redir, 'error', 'Terjadi kesalahan saat menyimpan data pengaturan.');
        }
    }

    // Update Tampilan
    public function updateTampilan($slugMenu, $slugSubMenu, $jenis, Request $request)
    {
        $this->validasiMenu($slugMenu, $slugSubMenu);

        $redir = $this->urlPath($slugMenu, $slugSubMenu);

        $cekData = TampilanModel::where('id_tampilan', 'mpt-001')->first();

        if (!$cekData) {
            return $this->kembali($redir, 'error', 'Data tidak ditemukan');
        }

        if ($jenis == 'identitas') {
            $messages = [
                'nama_web.required' => 'Nama Web wajib diisi!',
                'nama_web.string' => 'Nama Web harus berupa teks!',
                'nama_web.max' => 'Nama Web Maksimal 20 karakter!',
                'slogan_web.required' => 'Slogan Web wajib diisi!',
                'slogan_web.string' => 'Slogan Web harus berupa teks!',
                'slogan_web.max' => 'Slogan Web Maksimal 128 karakter!',
                'nama_instansi.required' => 'Nama Instansi wajib diisi!',
                'nama_instansi.string' => 'Nama Instansi harus berupa teks!',
                'nama_instansi.max' => 'Nama Instansi Maksimal 128 karakter!',
                'alamat_email.required' => 'Alamat Email wajib diisi!',
                'alamat_email.string' => 'Alamat Email harus berupa teks!',
                'alamat_email.max' => 'Alamat Email Maksimal 128 karakter!',
                'no_telp.required' => 'Nomor Telephone wajib diisi!',
                'no_telp.string' => 'Nomor Telephone harus berupa teks!',
                'no_telp.max' => 'Nomor Telephone Maksimal 16 karakter!',
                'alamat.required' => 'Alamat wajib diisi!',
                'alamat.string' => 'Alamat harus berupa teks!',
            ];

            $validasiData = $request->validate([
                'nama_web' => 'required|string|max:20',
                'slogan_web' => 'required|string|max:128',
                'nama_instansi' => 'required|string|max:128',
                'alamat_email' => 'required|string|max:128',
                'no_telp' => 'required|string|max:16',
                'alamat' => 'required|string',
            ], $messages);

            $cekData->nama_web = $validasiData['nama_web'];
            $cekData->slogan_web = $validasiData['slogan_web'];
            $cekData->nama_instansi = $validasiData['nama_instansi'];
            $cekData->alamat_email = $validasiData['alamat_email'];
            $cekData->alamat = $validasiData['alamat'];
            $cekData->save();
        } else if ($jenis == 'media') {
            $messages = [
                'logo_web.file' => 'Logo harus berupa file!',
                'logo_web.mimes' => 'Format logo harus png, svg, jpg, jpeg, atau gif!',
                'logo_web.max' => 'Ukuran logo maksimal 1 MB!',
                'favicon_web.file' => 'Favicon harus berupa file!',
                'favicon_web.mimes' => 'Format favicon harus png, svg, jpg, jpeg, atau gif!',
                'favicon_web.max' => 'Ukuran favicon maksimal 1 MB!',
                'background_media.file' => 'Background harus berupa file!',
                'background_media.mimes' => 'Format background harus png, svg, jpg, jpeg, atau gif!',
                'background_media.max' => 'Ukuran background maksimal 1 MB!',
                'background_login.file' => 'Background video harus berupa file!',
                'background_login.mimes' => 'Format video harus mp4!',
                'background_login.max' => 'Ukuran video maksimal 1 MB!',
            ];

            $validasiData = $request->validate([
                'logo_web' => 'nullable|file|mimes:png,svg,jpg,jpeg,gif|max:1024',
                'favicon_web' => 'nullable|file|mimes:png,svg,jpg,jpeg,gif|max:1024',
                'background_media' => 'nullable|file|mimes:png,svg,jpg,jpeg,gif|max:1024',
                'background_login' => 'nullable|file|mimes:mp4|max:1024',
            ], $messages);

            // Cek Logo
            if ($request->hasFile('logo_web')) {
                if ($cekData->logo_web !== 'default/logo/logo.svg' && Storage::exists($cekData->logo_web)) {
                    Storage::delete($cekData->logo_web);
                }

                $newLogo = $request->file('logo_web');
                $logoName = Str::random(12) . '.' . $newLogo->getClientOriginalExtension();
                $logo_web = $newLogo->storeAs('upload/media', $logoName, 'public');
            } else {
                $logo_web = $cekData->logo_web;
            }

            // Cek Favication
            if ($request->hasFile('favicon_web')) {
                if ($cekData->favicon_web !== 'default/logo/favication.svg' && Storage::exists($cekData->favicon_web)) {
                    Storage::delete($cekData->favicon_web);
                }

                $newFavicon = $request->file('favicon_web');
                $faviconName = Str::random(12) . '.' . $newFavicon->getClientOriginalExtension();
                $favicon_web = $newFavicon->storeAs('upload/media', $faviconName, 'public');
            } else {
                $favicon_web = $cekData->favicon_web;
            }

            // Cek Background
            if ($request->hasFile('background_media')) {
                if ($cekData->background_web !== 'default/media/image/background.jpg' && Storage::exists($cekData->background_web)) {
                    Storage::delete($cekData->background_web);
                }

                $newBackground = $request->file('background_media');
                $backgroundName = Str::random(12) . '.' . $newBackground->getClientOriginalExtension();
                $background_web = $newBackground->storeAs('upload/media', $backgroundName, 'public');
            } else {
                $background_web = $cekData->background_web;
            }

            // Cek Background Video
            if ($request->hasFile('background_login')) {
                if ($cekData->background_login !== 'default/media/video/video.mp4' && Storage::exists($cekData->background_login)) {
                    Storage::delete($cekData->background_login);
                }

                $newVideo = $request->file('background_login');
                $videoName = Str::random(12) . '.' . $newVideo->getClientOriginalExtension();
                $background_login = $newVideo->storeAs('upload/media', $videoName, 'public');
            } else {
                $background_login = $cekData->background_login;
            }

            $cekData->logo_web = $logo_web;
            $cekData->favicon_web = $favicon_web;
            $cekData->background_web = $background_web;
            $cekData->background_login = $background_login;
            $cekData->save();
        } else if ($jenis == 'sosmed') {
            $messages = [
                'fb.required' => 'Akun Facebook wajib diisi!',
                'fb.string' => 'Akun Facebook harus berupa teks!',
                'fb.max' => 'Akun Facebook Maksimal 128 karakter!',
                'ig.required' => 'Akun Instagram wajib diisi!',
                'ig.string' => 'Akun Instagram harus berupa teks!',
                'ig.max' => 'Akun Instagram Maksimal 128 karakter!',
                'thread.required' => 'Akun Thread wajib diisi!',
                'thread.string' => 'Akun Thread harus berupa teks!',
                'thread.max' => 'Akun Thread Maksimal 128 karakter!',
                'tiktok.required' => 'Akun TikTok wajib diisi!',
                'tiktok.string' => 'Akun TikTok harus berupa teks!',
                'tiktok.max' => 'Akun TikTok Maksimal 128 karakter!',
                'youtube.required' => 'Akun YouTube wajib diisi!',
                'youtube.string' => 'Akun YouTube harus berupa teks!',
                'youtube.max' => 'Akun YouTube Maksimal 128 karakter!',
                'twitter.required' => 'Akun Twitter wajib diisi!',
                'twitter.string' => 'Akun Twitter harus berupa teks!',
                'twitter.max' => 'Akun Twitter Maksimal 128 karakter!',
            ];

            $validasiData = $request->validate([
                'fb' => 'required|string|max:128',
                'ig' => 'required|string|max:128',
                'thread' => 'required|string|max:128',
                'tiktok' => 'required|string|max:128',
                'youtube' => 'required|string|max:128',
                'twitter' => 'required|string|max:128',
            ], $messages);

            $cekData->fb = $validasiData['fb'];
            $cekData->ig = $validasiData['ig'];
            $cekData->thread = $validasiData['thread'];
            $cekData->tiktok = $validasiData['tiktok'];
            $cekData->youtube = $validasiData['youtube'];
            $cekData->twitter = $validasiData['twitter'];
            $cekData->save();
        } else {
            return $this->kembali($redir, 'error', 'Data target tidak ditemukan');
        }

        return $this->kembali($redir, 'success', 'Data berhasil diperbaharui');
    }
}
