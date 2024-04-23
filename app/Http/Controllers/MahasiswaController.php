<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', [
            'data' => Mahasiswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check())
            return redirect()->back();

        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check())
            return redirect()->back();
        try {
            $data = $request->except(['foto', '_token']);

            $imgName = Str::slug($request->nama) . '-' . time() . '.' . $request->file('foto')->getClientOriginalExtension();

            $data['foto'] = 'foto/' . $imgName;

            $request->file('foto')->storeAs('public/foto', $imgName);

            Mahasiswa::create($data);

            Session::flash('success', 'Data tersimpan!');
        } catch (\Exception $e) {
            Log::alert($e->getMessage());
            Session::flash('error', 'Data gagal disimpan!');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        if (!Auth::check())
            return redirect()->back();

        return view('edit', [
            'data' => Mahasiswa::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        if (!Auth::check())
            return redirect()->back();
        try {
            $dataMhs = Mahasiswa::findOrFail($id);
            $data = $request->except(['foto', '_token']);

            if ($request->hasFile('foto')) {
                if (Storage::disk('public')->exists($dataMhs->foto))
                    Storage::disk('public')->delete($dataMhs->foto);

                $imgName = Str::slug($request->nama) . '-' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
                $data['foto'] = 'foto/' . $imgName;
                $request->file('foto')->storeAs('public/foto', $imgName);
            }

            $dataMhs->update($data);

            Session::flash('success', 'Data diperbarui!');
        } catch (\Exception $e) {
            Log::alert($e->getMessage());
            Session::flash('error', 'Data gagal diperbarui!');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if (!Auth::check())
            return redirect()->back();
        try {
            $dataMhs = Mahasiswa::findOrFail($id);

            if (Storage::disk('public')->exists($dataMhs->foto))
                Storage::disk('public')->delete($dataMhs->foto);

            $dataMhs->delete();

            Session::flash('success', 'Data dihapus!');
        } catch (\Exception $e) {
            Log::alert($e->getMessage());
            Session::flash('error', 'Data gagal dihapus!');
        }

        return redirect()->back();
    }
}