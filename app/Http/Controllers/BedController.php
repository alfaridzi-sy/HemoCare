<?php

namespace App\Http\Controllers;


use App\Models\Bed;
use Illuminate\Http\Request;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beds = Bed::all();
        return view('bed.index', ["beds" => $beds]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bed.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            Bed::create($request->all());
            return redirect('bed')->with('success', 'Data tempat tidur berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect('bed')->with('error', 'Terjadi kesalahan saat menambahkan data tempat tidur.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($bed_id)
    {
        $bed = Bed::findOrFail($bed_id);
        return view('bed.update', ["bed" => $bed]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $bed_id)
    {
        try {
            $bed = Bed::findOrFail($bed_id);
            $bed->update($request->all());
            return redirect('bed')->with('success', 'Data tempat tidur berhasil diubah.');
        } catch (\Exception $e) {
            return redirect('bed')->with('error', 'Terjadi kesalahan saat mengubah data tempat tidur.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($bed_id)
    {
        try {
            $bed = Bed::findOrFail($bed_id);
            $bed->delete();

            session()->flash('success', 'Data tempat tidur berhasil dihapus.');

            return response()->json([
                'message' => 'Data tempat tidur berhasil dihapus.'
            ], 200);
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menghapus data tempat tidur.');

            return response()->json([
                'message' => 'Gagal menghapus data tempat tidur.'
            ], 500);
        }
    }
}
