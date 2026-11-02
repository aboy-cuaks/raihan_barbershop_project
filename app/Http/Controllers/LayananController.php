<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LayananController extends Controller
{
    // READ: Menampilkan data layanan menggunakan Query Builder
    public function index(Request $request): View
    {
        $query = DB::table('layanan as l')
            ->leftJoin(
                'kategori_layanan as k',
                'l.kategori_id',
                '=',
                'k.kategori_id'
            )
            ->select('l.*', 'k.nama_kategori');

        $search = trim((string) $request->query('search', ''));

        // Nested WHERE untuk pencarian beberapa kolom
        if ($search !== '') {
            $query->where(function ($builder) use ($search) {
                $builder->where('l.nama_layanan', 'like', "%{$search}%")
                    ->orWhere('l.deskripsi', 'like', "%{$search}%")
                    ->orWhere('l.status', 'like', "%{$search}%")
                    ->orWhere('k.nama_kategori', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan status
        $status = $request->query('status');

        if (in_array($status, ['aktif', 'nonaktif'], true)) {
            $query->where('l.status', $status);
        }

        $dataLayanan = $query
            ->orderBy('l.nama_layanan')
            ->paginate(10)
            ->withQueryString();

        return view('admin.layanan.index', compact(
            'dataLayanan',
            'search',
            'status'
        ));
    }

    // Menampilkan form tambah layanan
    public function create(): View
    {
        $dataKategori = DB::table('kategori_layanan')
            ->orderBy('nama_kategori')
            ->get();

        return view('admin.layanan.create', compact('dataKategori'));
    }

    // CREATE: Menyimpan layanan
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules(), $this->messages());

        DB::table('layanan')->insert([
            'kategori_id' => $validated['kategori_id'],
            'nama_layanan' => $validated['nama_layanan'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'durasi_menit' => $validated['durasi_menit'],
            'harga' => $validated['harga'],
            'status' => $validated['status'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Data layanan berhasil ditambahkan.');
    }

    // READ: Menampilkan detail layanan
    public function show(string $id): View
    {
        $dataLayanan = DB::table('layanan as l')
            ->leftJoin(
                'kategori_layanan as k',
                'l.kategori_id',
                '=',
                'k.kategori_id'
            )
            ->select('l.*', 'k.nama_kategori')
            ->where('l.layanan_id', $id)
            ->first();

        abort_if(!$dataLayanan, 404);

        return view('admin.layanan.show', compact('dataLayanan'));
    }

    // Menampilkan form edit
    public function edit(string $id): View
    {
        $dataLayanan = DB::table('layanan')
            ->where('layanan_id', $id)
            ->first();

        abort_if(!$dataLayanan, 404);

        $dataKategori = DB::table('kategori_layanan')
            ->orderBy('nama_kategori')
            ->get();

        return view('admin.layanan.edit', compact(
            'dataLayanan',
            'dataKategori'
        ));
    }

    // UPDATE: Memperbarui layanan
    public function update(Request $request, string $id): RedirectResponse
    {
        $dataLayanan = DB::table('layanan')
            ->where('layanan_id', $id)
            ->first();

        abort_if(!$dataLayanan, 404);

        $validated = $request->validate($this->rules(), $this->messages());

        DB::table('layanan')
            ->where('layanan_id', $id)
            ->update([
                'kategori_id' => $validated['kategori_id'],
                'nama_layanan' => $validated['nama_layanan'],
                'deskripsi' => $validated['deskripsi'] ?? null,
                'durasi_menit' => $validated['durasi_menit'],
                'harga' => $validated['harga'],
                'status' => $validated['status'],
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Data layanan berhasil diperbarui.');
    }

    // DELETE: Menghapus layanan
    public function destroy(string $id): RedirectResponse
    {
        $dataLayanan = DB::table('layanan')
            ->where('layanan_id', $id)
            ->first();

        abort_if(!$dataLayanan, 404);

        DB::table('layanan')
            ->where('layanan_id', $id)
            ->delete();

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Data layanan berhasil dihapus.');
    }

    // Validation Rules
    private function rules(): array
    {
        return [
            'kategori_id' => [
                'required',
                'exists:kategori_layanan,kategori_id',
            ],
            'nama_layanan' => [
                'required',
                'string',
                'min:3',
                'max:100',
            ],
            'deskripsi' => [
                'nullable',
                'string',
                'max:500',
            ],
            'durasi_menit' => [
                'required',
                'integer',
                'min:10',
                'max:480',
            ],
            'harga' => [
                'required',
                'numeric',
                'min:0',
                'max:10000000',
            ],
            'status' => [
                'required',
                'in:aktif,nonaktif',
            ],
        ];
    }

    // Pesan Validation
    private function messages(): array
    {
        return [
            'kategori_id.required' => 'Kategori layanan wajib dipilih.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak tersedia.',
            'nama_layanan.required' => 'Nama layanan wajib diisi.',
            'nama_layanan.min' => 'Nama layanan minimal 3 karakter.',
            'nama_layanan.max' => 'Nama layanan maksimal 100 karakter.',
            'deskripsi.max' => 'Deskripsi maksimal 500 karakter.',
            'durasi_menit.required' => 'Durasi layanan wajib diisi.',
            'durasi_menit.integer' => 'Durasi harus berupa angka bulat.',
            'durasi_menit.min' => 'Durasi minimal 10 menit.',
            'durasi_menit.max' => 'Durasi maksimal 480 menit.',
            'harga.required' => 'Harga layanan wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh negatif.',
            'harga.max' => 'Harga terlalu besar.',
            'status.required' => 'Status layanan wajib dipilih.',
            'status.in' => 'Status hanya boleh Aktif atau Nonaktif.',
        ];
    }
}
