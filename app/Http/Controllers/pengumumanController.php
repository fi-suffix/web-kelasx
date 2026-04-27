<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengumuman_crud;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class pengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $allPengumuman = pengumuman_crud::get();
        return view('pengumuman.index', compact('allPengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        pengumuman_crud::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dibuat!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengumuman = pengumuman_crud::findOrFail($id);
        return view('pengumuman.show', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengumuman = pengumuman_crud::findOrFail($id);
        return view('pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $pengumuman = pengumuman_crud::findOrFail($id);
        
        $pengumuman->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
        ]);

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        $pengumuman = pengumuman_crud::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dihapus!');
    }
}