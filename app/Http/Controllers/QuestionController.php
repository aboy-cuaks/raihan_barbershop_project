<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuestionController extends Controller
{
    public function index(): View
    {
        $dataPertanyaan = Pertanyaan::latest()->paginate(15);

        return view('admin.pertanyaan.index', compact('dataPertanyaan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'min:5', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'subjek' => ['nullable', 'string', 'max:150'],
            'pertanyaan' => ['required', 'string', 'min:10', 'max:300'],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama minimal 5 karakter.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'subjek.max' => 'Subjek maksimal 150 karakter.',
            'pertanyaan.required' => 'Pesan wajib diisi.',
            'pertanyaan.min' => 'Pesan minimal 10 karakter.',
            'pertanyaan.max' => 'Pesan maksimal 300 karakter.',
        ]);

        Pertanyaan::create($validated);

        return redirect()->back()->with('success', 'Terima kasih. Pesan kamu berhasil dikirim ke FM Barbershop.');
    }
}
