<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PelangganController extends Controller
{
    public function index(Request $request): View
    {
        $query = Pelanggan::query();
        $search = trim((string) $request->query('search', ''));

        if ($search !== '') {
            $query->where(function ($builder) use ($search) {
                $builder->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $dataPelanggan = $query->orderByDesc('created_at')->paginate(10)->withQueryString();

        return view('admin.pelanggan.index', compact('dataPelanggan', 'search'));
    }

    public function create(): View
    {
        return view('admin.pelanggan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules(), $this->messages());
        Pelanggan::create($validated);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $dataPelanggan = Pelanggan::findOrFail($id);

        return view('admin.pelanggan.show', compact('dataPelanggan'));
    }

    public function edit(string $id): View
    {
        $dataPelanggan = Pelanggan::findOrFail($id);

        return view('admin.pelanggan.edit', compact('dataPelanggan'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $dataPelanggan = Pelanggan::findOrFail($id);
        $validated = $request->validate($this->rules($dataPelanggan), $this->messages());
        $dataPelanggan->update($validated);

        return redirect()->route('admin.pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $dataPelanggan = Pelanggan::findOrFail($id);
        $dataPelanggan->delete();

        return redirect()->route('admin.pelanggan.index')->with('success', 'Data pelanggan berhasil dihapus.');
    }

    private function rules(?Pelanggan $pelanggan = null): array
    {
        $uniqueEmail = Rule::unique('pelanggan', 'email');
        if ($pelanggan !== null) {
            $uniqueEmail->ignore($pelanggan->pelanggan_id, 'pelanggan_id');
        }

        return [
            'first_name' => ['required', 'string', 'min:2', 'max:100'],
            'last_name' => ['required', 'string', 'min:2', 'max:100'],
            'birthday' => ['required', 'date'],
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'email' => [
                'required',
                'email',
                'max:255',
                $uniqueEmail,
            ],
            'phone' => ['required', 'numeric'],
        ];
    }

    private function messages(): array
    {
        return [
            'first_name.required' => 'Nama depan wajib diisi.',
            'first_name.min' => 'Nama depan minimal 2 karakter.',
            'first_name.max' => 'Nama depan maksimal 100 karakter.',
            'last_name.required' => 'Nama belakang wajib diisi.',
            'last_name.min' => 'Nama belakang minimal 2 karakter.',
            'last_name.max' => 'Nama belakang maksimal 100 karakter.',
            'birthday.required' => 'Tanggal lahir wajib diisi.',
            'birthday.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'gender.in' => 'Jenis kelamin hanya boleh Laki-laki atau Perempuan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'phone.numeric' => 'Nomor telepon hanya boleh berisi angka.',
        ];
    }
}
