<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BarberController extends Controller
{
    public function index(Request $request): View
    {
        $query = Barber::query();
        $search = trim((string) $request->query('search', ''));

        if ($search !== '') {
            $query->where(function ($builder) use ($search) {
                $builder->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('no_telepon', 'like', "%{$search}%")
                    ->orWhere('spesialisasi', 'like', "%{$search}%");
            });
        }

        $dataBarber = $query->orderBy('nama')->paginate(10)->withQueryString();

        return view('admin.barber.index', compact('dataBarber', 'search'));
    }

    public function create(): View
    {
        return view('admin.barber.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules(), $this->messages());
        Barber::create($validated);

        return redirect()->route('admin.barber.index')->with('success', 'Data barber berhasil ditambahkan.');
    }

    public function show(string $id): View
    {
        $dataBarber = Barber::findOrFail($id);
        return view('admin.barber.show', compact('dataBarber'));
    }

    public function edit(string $id): View
    {
        $dataBarber = Barber::findOrFail($id);
        return view('admin.barber.edit', compact('dataBarber'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $dataBarber = Barber::findOrFail($id);
        $validated = $request->validate($this->rules($dataBarber), $this->messages());
        $dataBarber->update($validated);

        return redirect()->route('admin.barber.index')->with('success', 'Data barber berhasil diperbarui.');
    }

    public function destroy(string $id): RedirectResponse
    {
        Barber::findOrFail($id)->delete();
        return redirect()->route('admin.barber.index')->with('success', 'Data barber berhasil dihapus.');
    }

    private function rules(?Barber $barber = null): array
    {
        $uniqueEmail = Rule::unique('barber', 'email');
        if ($barber !== null) {
            $uniqueEmail->ignore($barber->barber_id, 'barber_id');
        }

        return [
            'nama' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email', 'max:255', $uniqueEmail],
            'no_telepon' => ['required', 'string', 'max:20'],
            'spesialisasi' => ['required', 'string', 'max:100'],
            'status' => ['required', 'in:aktif,nonaktif'],
        ];
    }

    private function messages(): array
    {
        return [
            'nama.required' => 'Nama barber wajib diisi.',
            'nama.min' => 'Nama barber minimal 3 karakter.',
            'nama.max' => 'Nama barber maksimal 100 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'email.unique' => 'Email tersebut sudah digunakan oleh barber lain.',
            'no_telepon.required' => 'Nomor telepon wajib diisi.',
            'no_telepon.max' => 'Nomor telepon maksimal 20 karakter.',
            'spesialisasi.required' => 'Spesialisasi wajib diisi.',
            'spesialisasi.max' => 'Spesialisasi maksimal 100 karakter.',
            'status.required' => 'Status barber wajib dipilih.',
            'status.in' => 'Status hanya boleh Aktif atau Nonaktif.',
        ];
    }
}
