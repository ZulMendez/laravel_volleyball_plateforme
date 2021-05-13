<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Http\Request;

class AllController extends Controller
{
    public function home(){
        $equipes = Equipe::all();
        $joueurs = Joueur::all();

    //joueurs sans equipes random
        $noEquipe = $joueurs->where('equipe_id', '==', null);
        if (count($noEquipe) > 4) {
            $noEquipeRandom = $noEquipe->random(4);
        } else {
            $noEquipeRandom = $noEquipe;
        }

    // joueurs avec equipes
        $avecEquipe = $joueurs->where('equipe_id', '!=', null);
        if (count($avecEquipe) > 4) {
            $avecEquipeRandom = $avecEquipe->random(4);
        } else {
            $avecEquipeRandom = $avecEquipe;
        }

    // equipe europe
        $europeEquipe = $equipes->where('continent_id', '=', 1);

    // equipe non europe
        $noEuropeEquipe = $equipes->where('continent_id', '!=', 1);

    // joueur femme avec equipe random
        $femme = $joueurs->where('genre', '=', 'femme');
        $joueurFemme = $femme->where('equipe_id', '!=', null); //random 1

    // joueur homme ave equipe
        $joueurHomme = $joueurs->where('genre', '=', 'homme'); //random 5
        return view('home', compact('equipes','joueurs', 'noEquipeRandom', 'avecEquipeRandom', 'europeEquipe', 'noEuropeEquipe', 'joueurFemme', 'joueurHomme'));
    }
// EQUIPES
    public function equipes() {
        $equipes = Equipe::all();
        return view('pages.equipe', compact('equipes'));
    }

    public function showEquipe(Equipe $equipe) {
        return view('pages.showEquipe', compact('equipe'));
    }
// JOUEURS
    public function joueurs() {
        $joueurs = Joueur::all();
        return view('pages.joueur', compact('joueurs'));
    }

    public function showJoueur(Joueur $joueur) {
        return view('pages.showJoueur', compact('joueur'));
    }

// ADMIN
    public function admin() {
        $joueurs = Joueur::all()->take(4);
        $equipes = Equipe::all()->take(4);
        return view('admin.main', compact('joueurs', 'equipes'));
    }
}
