<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    // Aturan validasi dipakai bersama oleh store() dan update()
    private function rules(?int $id = null): array
    {
        return [
            'nis'           => ['required', 'string', 'max:20', Rule::unique('siswa', 'nis')->ignore($id)],
            'nama'          => ['required', 'string', 'max:100'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'tanggal_lahir' => ['required', 'date', 'before:today'],
            'kelas'         => ['required', 'string', 'max:20'],
            'email'         => ['nullable', 'email', 'max:100'],
            'alamat'        => ['nullable', 'string'],
        ];
    }

    // READ (daftar)
    public function index(Request $request)
    {
        $siswa = Siswa::query()
            ->when($request->q, function ($query, $cari) {
                $query->where('nama', 'like', "%{$cari}%")
                      ->orWhere('nis', 'like', "%{$cari}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('siswa.index', compact('siswa'));
    }

    // CREATE (form)
    public function create()
    {
        return view('siswa.create');
    }

    // CREATE (simpan)
    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        Siswa::create($data);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    // READ (detail)
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    // UPDATE (form)
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    // UPDATE (simpan)
    public function update(Request $request, Siswa $siswa)
    {
        $data = $request->validate($this->rules($siswa->id));

        $siswa->update($data);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    // DELETE
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
