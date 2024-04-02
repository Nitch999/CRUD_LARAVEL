<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    //
    public function liste_etudiant()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.liste', compact( 'etudiants')); 
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function ajouter()
    {
        return view('etudiant.ajouter');
    }

    public function ajouter_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'classe' => ['required', 'string'],
        ]);

        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom= $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->save();

        return redirect('/ajouter')->with('status','l\'etudiant a bien ete ajouté avec succes.');
    }
}
