<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipes = Equipe::all();
        return view('admin.equipes.main', compact('equipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $continents = Continent::all();
        return view('admin.equipes.create', compact('continents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'min:2'],
            'ville' => ['required','min:2'],
            'pays' => ['required','min:2'],
            'continent_id' => ['required'],
            'max' => ['required', 'numeric'],
        ]);
        $equipe = new Equipe();
        $equipe->nom = $request->nom;
        $equipe->ville = $request->ville;
        $equipe->pays = $request->pays;
        $equipe->continent_id = $request->continent_id;
        $equipe->max = $request->max;
        $equipe->AT = 0;
        $equipe->CT = 0;
        $equipe->DC = 0;
        $equipe->RP = 0;
        $equipe->save();
        return redirect()->route('equipe.index')->with('success', $request->nom . ' a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        return view('admin.equipes.show', compact('equipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe)
    {
        $continents = Continent::all();
        return view('admin.equipes.edit', compact('equipe', 'continents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            'nom' => ['required','min:2'],
            'ville' => ['required','min:2'],
            'pays' => ['required','min:2'],
            'continent_id' => ['required'],
            'max' => ['required', 'numeric'],
        ]);
        $equipe->nom = $request->nom;
        $equipe->ville = $request->ville;
        $equipe->pays = $request->pays;
        $equipe->continent_id = $request->continent_id;
        $equipe->max = $request->max;
        $equipe->save();
        return redirect()->route('equipe.index')->with('success', $request->nom . ' a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        $equipe->delete();
        return redirect()->route('equipe.index')->with('warning', 'Equipe supprimé');
    }
}
