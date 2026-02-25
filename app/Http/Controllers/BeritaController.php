<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function show_berita()
    {
        $berita = Berita::where('status', 'publish')
            ->latest()
            ->get();

        return view('berita-perpustakaan.show', compact('berita'));
    }

    // ==============================================Tambah Berita====================================================
    public function upload()
    {
        return view('berita-perpustakaan.create');
    }

    public function proses_upload(Request $request)
    {
        $request->validate([
            'judul'    => 'required',
            'penulis'  => 'required',
            'berita'   => 'required',
            'kategori' => 'required|in:pengumuman,berita,informasi',
            'status'   => 'required|in:draft,publish',
            'gambar'   => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // upload gambar
        $file = $request->file('gambar'); // ✅ FIX
        $nama_file = time() . '.' . $file->extension();
        $file->move(public_path('data_file'), $nama_file);

        // slug unik
        $slug = Str::slug($request->judul);
        if (Berita::where('slug', $slug)->exists()) {
            $slug .= '-' . time();
        }

        Berita::create([
            'judul'    => $request->judul,
            'slug'     => $slug,
            'penulis'  => $request->penulis,
            'berita'   => $request->berita,
            'gambar'   => $nama_file, // ✅ FIX
            'kategori' => $request->kategori,
            'status'   => $request->status,
        ]);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }
    // ===============================================================Hapus Berita===============================================
    public function hapus($id)
    {
        $berita = Berita::findOrFail($id);

        $path = public_path('data_file/' . $berita->gambar); // ✅ FIX
        if (File::exists($path)) {
            File::delete($path);
        }

        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }

    // ===============================================================Edit Berita===============================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'    => 'required',
            'penulis'  => 'required',
            'berita'   => 'required',
            'kategori' => 'required|in:pengumuman,berita,informasi',
            'status'   => 'required|in:draft,publish',
            'gambar'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $berita = Berita::findOrFail($id);

        // update gambar (jika ada)
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = uniqid() . '.' . $file->extension();
            $file->move(public_path('data_file'), $nama_file);

            if ($berita->gambar) {
                $path = public_path('data_file/' . $berita->gambar);
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

            $berita->gambar = $nama_file;
        }

        $berita->update([
            'judul'    => $request->judul,
            'penulis'  => $request->penulis,
            'berita'   => $request->berita,
            'kategori' => $request->kategori,
            'status'   => $request->status,
        ]);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diupdate');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita-perpustakaan.edit', compact('berita'));
    }
}
