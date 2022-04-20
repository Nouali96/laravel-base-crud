<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comic.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Comic $comic)
    {
        return view('comic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|min:5',
                'description' => 'required||min:10',
                'thumb' => 'required|url',
                'price' => 'required|numeric|min:0',
                'series' => 'required|min:5',
                
                'type' => 'required|min:5',
            ]
        );
        
        $data = $request->all();

        $comic = new Comic();
        $comic->fill($data);
        $comic->save();

        return redirect()->route('comic.index')->with('status', 'Nuovo fumetto aggiunto');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        
        return view('comic.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        
        return view('comic.edit', compact('comic'));
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Comic $comic)
    {   
        $request->validate(
            [
                'title' => 'required|min:5',
                'description' => 'required||min:10',
                'thumb' => 'required|url',
                'price' => 'required|numeric|min:0',
                'series' => 'required|min:5',
                
                "type" => 'required|min:5',
            ]
        );
        $data = $request->all();

        $comic->update($data);

        $comic->save();

        return redirect()->route('comic.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comic.index')->with('status', 'Elemento correttamente cancellato');
    }
}
