<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LayananController extends Controller
{
    public function index(Request $request): View
    {
        $query = Layanan::query();
        $search = trim((string) $request->query('search', ''));

        if ($search !== '') {
            $query->where(function ($builder) use ($search) {
                $builder->where('nama_layanan', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $dataLayanan = $query->orderBy('nama_layanan')->paginate(10)->withQueryString();

        return view('admin.layanan.index', compact('dataLayanan', 'search'));
    }

    public function create(): View
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules(), $this->messages());
        Layanan::create($validated);

        return redirect()->route('admin.layanan.index')->with('success', 'Data layanan berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $dataLayanan = Layanan::findOrFail($id);
        return view('admin.layanan.show', compact('dataLayanan'));
    }

    public function edit(string $id): View
    {
        $dataLayanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('dataLayanan'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $dataLayanan = Layanan::findOrFail($id);
        $validated = $request->validate($this->rules(), $this->messages());
        $dataLayanan->update($validated);

        return redirect()->route('admin.layanan.index')->with('success', 'Data layanan berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        Layanan::findOrFail($id)->delete();
        return redirect()->route('admin.layanan.index')->with('success', 'Data layanan berhasil dihapus.');
    }

    private function rules(): array
    {
        return [
            'nama_layanan' => ['required', 'string', 'min:3', 'max:100'],
            'deskripsi' => ['nullable', 'string', 'max:500'],
            'durasi_menit' => ['required', 'integer', 'min:10', 'max:480'],
            'harga' => ['required', 'numeric', 'min:0', 'max:10000000'],
            'status' => ['required', 'in:aktif,nonaktif'],
        ];
    }

    private function messages(): array
    {
        return [
            'nama_layanan.required' => 'Nama layanan wajib diisi.',
            'nama_layanan.min' => 'Nama layanan minimal 3 karakter.',
            'nama_layanan.max' => 'Nama layanan maksimal 100 karakter.',
            'deskripsi.max' => 'Deskripsi maksimal 500 karakter.',
            'durasi_menit.required' => 'Durasi layanan wajib diisi.',
            'durasi_menit.integer' => 'Durasi harus berupa angka bulat dalam menit.',
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
