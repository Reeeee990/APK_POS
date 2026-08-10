<?php

namespace App\Http\Controllers;
use App\Http\Requests\SearchRequest;
use App\Models\jenis;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jenis $jenis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jenis $jenis)
    {
        //
    }
}
