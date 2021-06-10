<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index(){

        $etudiants = Etudiant::orderBy('nom', 'asc')->paginate(5);
        return view('etudiant',compact('etudiants'));
    }

    public function create(){

        //renvoie la liste de classe
        $classes = Classe::all();
        return view('createEtudiant',compact('classes'));
    }

    public function edit(Etudiant $etudiant){

        //renvoie la liste de classe
        $classes = Classe::all();
        return view('editEtudiant',compact('etudiant', 'classes'));
    }

    public function store(Request $request){

        $request->validate([

            'nom'=>'required',
            'prenoms'=>'required',
            'classe_id'=>'required'
        ]);

        Etudiant::create($request->all());
        return back()->with('success', 'Etudiant crée avec succè');

    }


    public function update(Request $request, Etudiant $etudiant){

        $request->validate([

            'nom'=>'required',
            'prenoms'=>'required',
            'classe_id'=>'required'
        ]);

        $etudiant->update([
            "nom" => $request->nom,
            "prenoms" => $request->prenoms,
            "classe_id" => $request->classe_id
        ]);

        return back()->with('success', 'Etudiant modifier vec succè');

    }


    public function delete($id){


        $etudiants = Etudiant::find($id)->delete();
        return back()->with('successDelete', "L'étudiant  Supprimer avec succès!");

    }

}
