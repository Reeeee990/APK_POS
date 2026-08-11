<?php

namespace App\Http\Controllers;
use App\Http\Requests\SearchRequest;
use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
       $keyword = $request->input('search');

        if ($keyword) {
            $types = Jenis::when($keyword, function ($query) use ($keyword) {
                $query->where('nama_jenis', 'like', "%" . $keyword . "%");
            })
                ->orderBy('nama_jenis')
                ->paginate(10)
                ->withQueryString();
        } else {
            $types = Jenis::latest()->paginate(10)->withQueryString();
        }


        return view('jenis.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        Jenis::create([
            'user_id' => auth()->id(),
            'nama_jenis' => $request->input('nama_jenis'),
        ]);

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis $jenis)
    {
        return redirect()->route('jenis.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis $jenis)
    {
        $type = $jenis;
        return view('jenis.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jenis $jenis)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255',
        ]);

        $jenis->update([
            'nama_jenis' => $request->input('nama_jenis'),
        ]);

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jenis)
    {
        $jenis->delete();

        return redirect()->route('jenis.index')->with('success', 'Jenis berhasil dihapus.');
    }
}
