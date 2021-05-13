<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Genre;
use App\Models\Joueur;
use App\Models\Photo;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueurs = Joueur::all();
        return view('admin.joueurs.main', compact('joueurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $roles = Role::all();
        $equipes = Equipe::all();
        return view('admin.joueurs.create', compact('genres', 'roles', 'equipes'));
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
            "nom" => ["required", 'min:2'],
            "prenom" => ["required", 'min:2'],
            "age" => ["required", 'numeric'],
            "tel" => ["required", 'numeric'],
            "email" => ["required", 'min:2'],
            "genre_id" => ["required"],
            "role_id" => ["required"],
            "equipe_id" => ["required"],
            "img" => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],    
        ]);

        //Chope l'equipe
        $equipe = Equipe::find($request->equipe_id);
        $occupe = $equipe->AT + $equipe->CT + $equipe->DC + $equipe->RP;

        //switch pour +1 le role choisi au niveau de l'équipe
        switch ($request->role_id) {
            case 1:
                $equipe->AT+=1;
                $equipe->save();
                break;
            case 2:
                $equipe->CT+=1;
                $equipe->save();
                break;
            case 3:
                $equipe->DC+=1;
                $equipe->save();            
                break;
            case 4:
                $equipe->RP+=1;
                $equipe->save();
                break;
        }

        //Condition pour vérifier le nombre de joueur dans l'équipe pour ne pas dépasser le max défini !
        if ($occupe >= $equipe->max) {
            return redirect()->back()->with('warning', $equipe->nom . ' : complet, veuillez choisir une autre equipe');
        } else {
            //Création storage IMG
            $photo = new Photo();
            $request->file('img')->storePublicly('img/', 'public');
            $photo->img = $request->file('img')->hashName();
            $photo->save();
            //Création du joueur
            $joueur = new Joueur();
            $joueur->nom = $request->nom;
            $joueur->prenom = $request->prenom;
            $joueur->age = $request->age;
            $joueur->tel = $request->tel;
            $joueur->email = $request->email;
            $joueur->genre_id = $request->genre_id;
            $joueur->role_id = $request->role_id;
            $joueur->photo_id = $photo->id;
            $joueur->equipe_id = $request->equipe_id;
            $joueur->save();
            return redirect()->route('joueur.index')->with('success', 'Joueur bien ajouté à ' . $equipe->nom);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function show(Joueur $joueur)
    {
        return view('admin.joueurs.show', compact('joueur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function edit(Joueur $joueur)
    {
        $genres = Genre::all();
        $roles = Role::all();
        $equipes = Equipe::all();
        return view('admin.joueurs.edit', compact('joueur', 'genres', 'roles', 'equipes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Joueur $joueur)
    {
        $request->validate([
            "nom" => ["required", 'min:2'],
            "prenom" => ["required", 'min:2'],
            "age" => ["required", 'numeric'],
            "tel" => ["required", 'numeric'],
            "email" => ["required", 'min:2'],
            "genre_id" => ["required"],
            "role_id" => ["required"],
            "equipe_id" => ["required"],
            "img" => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],    
        ]);
        $equipeActuelle = Equipe::find($joueur->equipe_id);
        $equipeDepart = Equipe::find($request->equipe_id);
        $occupe = $equipeDepart->AT + $equipeDepart->CT + $equipeDepart->DC + $equipeDepart->RP;

        //verifie si on change le role du joueur
        if ($joueur->role_id != $request->role_id) {
            // -1 dans le post dans l'equipe qu'il etait
            switch ($joueur->role_id) {
                case 1:
                    $equipeActuelle->AT-=1;
                    $equipeActuelle->save();
                    break;
                case 2:
                    $equipeActuelle->CT-=1;
                    $equipeActuelle->save();
                    break;
                case 3:
                    $equipeActuelle->DC-=1;
                    $equipeActuelle->save();            
                    break;
                case 4:
                    $equipeActuelle->RP-=1;
                    $equipeActuelle->save();
                    break;
            }
            //rajouter +1 dans le nv role dans son new equipe/son equipe actuelle
            switch ($request->role_id) {
                case 1:
                    $equipeDepart->AT+=1;
                    $equipeDepart->save();
                    break;
                case 2:
                    $equipeDepart->CT+=1;
                    $equipeDepart->save();
                    break;
                case 3:
                    $equipeDepart->DC+=1;
                    $equipeDepart->save();            
                    break;
                case 4:
                    $equipeDepart->RP+=1;
                    $equipeDepart->save();
                    break;
            }
        // si le role est le meme, on rentre dans le else
        } else {   
            //switch -1 pour le post de l'equipe d'ou il vient
            switch ($joueur->role_id) {
                case 1:
                    $equipeActuelle->AT-=1;
                    $equipeActuelle->save();
                    break;
                case 2:
                    $equipeActuelle->CT-=1;
                    $equipeActuelle->save();
                    break;
                case 3:
                    $equipeActuelle->DC-=1;
                    $equipeActuelle->save();            
                    break;
                case 4:
                    $equipeActuelle->RP-=1;
                    $equipeActuelle->save();
                    break;
            }     
            //switch +1 pour le post dans l'equipe ou il part          
            switch ($request->role_id) {
                case 1:
                    $equipeDepart->AT+=1;
                    $equipeDepart->save();
                    break;
                case 2:
                    $equipeDepart->CT+=1;
                    $equipeDepart->save();
                    break;
                case 3:
                    $equipeDepart->DC+=1;
                    $equipeDepart->save();            
                    break;
                case 4:
                    $equipeDepart->RP+=1;
                    $equipeDepart->save();
                    break;
            }
        }

        //notre logique de base avec crud classique 
        if ($occupe >= $equipeDepart->max) {
            return redirect()->back()->with('warning', $equipeDepart->nom . ' : complet, veuillez choisir une autre equipe');
        } else {
    
            //Création storage IMG
            if ($request->file('img') != null) {
                $photo = Photo::find($joueur->id);
                $request->file('img')->storePublicly('img/', 'public');
                $photo->img = $request->file('img')->hashName();
                $photo->save();
            }
            $joueur->nom = $request->nom;
            $joueur->prenom = $request->prenom;
            $joueur->age = $request->age;
            $joueur->tel = $request->tel;
            $joueur->email = $request->email;
            $joueur->genre_id = $request->genre_id;
            $joueur->role_id = $request->role_id;
            $joueur->equipe_id = $request->equipe_id;
            $joueur->save();
            return redirect()->route('joueur.index')->with('success', $joueur->prenom . ' bien modifé');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joueur $joueur)
    {
        //delete au niveau du nombre de joueurs dans l'équipe
        $equipe = Equipe::find($joueur->equipe_id);
        switch ($joueur->role_id) {
            case 1:
                $equipe->AT-=1;
                $equipe->save();
                break;
            case 2:
                $equipe->CT-=1;
                $equipe->save();
                break;
            case 3:
                $equipe->DC-=1;
                $equipe->save();            
                break;
            case 4:
                $equipe->RP-=1;
                $equipe->save();
                break;
        }
        //logique delete normal
        $joueur->delete();
        Storage::disk('public')->delete('img/' . $joueur->photo->img);
        return redirect()->route('joueur.index')->with('success', 'Joueur bien supprimé');
    }
}
