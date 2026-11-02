<?php

namespace App\Http\Controllers;

use App\Models\KategoriLayanan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class KategoriLayananController extends Controller
{
    // READ: Menampilkan seluruh kategori
    public function index(Request $request): View
    {
        $query = KategoriLayanan::withCount('layanans');

        $search = trim((string) $request->query('search', ''));

        if ($search !== '') {
            $query->where(function ($builder) use ($search) {
                $builder->where('nama_kategori', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $dataKategori = $query
            ->orderBy('nama_kategori')
            ->paginate(10)
            ->withQueryString();

        return view('admin.kategori-layanan.index', compact(
            'dataKategori',
            'search'
        ));
    }

    // Menampilkan form tambah
    public function create(): View
    {
        return view('admin.kategori-layanan.create');
    }

    // CREATE: Menyimpan kategori
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'min:3',
                'max:100',
                'unique:kategori_layanan,nama_kategori',
            ],
            'deskripsi' => ['nullable', 'string', 'max:500'],
        ]);

        KategoriLayanan::create($validated);

        return redirect()
            ->route('admin.kategori-layanan.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit(string $id): View
    {
        $dataKategori = KategoriLayanan::findOrFail($id);

        return view('admin.kategori-layanan.edit', compact(
            'dataKategori'
        ));
    }

    // UPDATE: Memperbarui kategori
    public function update(
        Request $request,
        string $id
    ): RedirectResponse {
        $dataKategori = KategoriLayanan::findOrFail($id);

        $validated = $request->validate([
            'nama_kategori' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('kategori_layanan', 'nama_kategori')
                    ->ignore($dataKategori->kategori_id, 'kategori_id'),
            ],
            'deskripsi' => ['nullable', 'string', 'max:500'],
        ]);

        $dataKategori->update($validated);

        return redirect()
            ->route('admin.kategori-layanan.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    // DELETE: Menghapus kategori
    public function destroy(string $id): RedirectResponse
    {
        $dataKategori = KategoriLayanan::findOrFail($id);

        // Kategori tidak boleh dihapus jika masih digunakan layanan
        if ($dataKategori->layanans()->exists()) {
            return redirect()
                ->route('admin.kategori-layanan.index')
                ->with('error', 'Kategori masih digunakan oleh layanan.');
        }

        $dataKategori->delete();

        return redirect()
            ->route('admin.kategori-layanan.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
