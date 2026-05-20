<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Http\Requests\StoreProdiRequest;
use App\Http\Requests\UpdateProdiRequest;
use App\Models\Fakultas;
use Illuminate\Support\Facades\Storage;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::with(['fakultas'])->get();
        return view('prodi.list-Prodi', compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.add-prodi', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdiRequest $request)
    {
        $validate = $request->safe();

        $filePath = Storage::disk('public')
            ->putFile('profile_kaprodi', $request->file('photo_kaprodi'));

        Prodi::create([
            'fakultas_id'  => $validate->fakultas_id,
            'nama_prodi'   => $validate->nama_prodi,
            'nama_kaprodi' => $validate->nama_kaprodi,
            'photo_kaprodi' => $filePath
        ]);

        return redirect('/prodi')->with('success', 'Data Prodi Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        return view('prodi.detail-prodi', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $fakultas = Fakultas::all();
        return view('prodi.edit-prodi', compact('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdiRequest $request, Prodi $prodi)
    {
        $validate = $request->safe();

        // Jika ada foto baru yang baru diupload
        if ($request->hasFile('photo_kaprodi')) {
            // Hapus foto lama dari storage
            Storage::disk('public')->delete($prodi->photo_kaprodi);

            // Upload foto baru
            $filePath = Storage::disk('public')
                ->putFile('profile_kaprodi', $request->file('photo_kaprodi'));
        } 
        else {
            // foto lama
            $filePath = $prodi->photo_kaprodi;
        }

        $prodi->update([
            'fakultas_id'   => $validate->fakultas_id,
            'nama_prodi'    => $validate->nama_prodi,
            'nama_kaprodi'  => $validate->nama_kaprodi,
            'photo_kaprodi' => $filePath
        ]);

        return redirect('/prodi')->with('success', 'Data Prodi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        // Hapus foto dari storage sebelum delete data
        Storage::disk('public')->delete($prodi->photo_kaprodi);

        $prodi->delete();

        return redirect()->back()->with('success', 'Data Prodi Berhasil Dihapus');
    }
}