@extends('layouts.master')
@section('contenu')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Ajout d'un nouvel etudiants</h3>

    <div class="mt-4">
        @if (session()->has('success'))
           <div class="alert alert-success">
                {{session()->get('success')}}
           </div>
        @endif
        @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <div class="text-danger">{{$error}}</div>
            @endforeach
        </div>
        @endif

        <form action="{{route('etudiant.ajouter')}}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <input type="text" name="nom" placeholder="Entrez votre nom" class="form-control">
            </div>
            <div class="form-group mb-2">
                <input type="text" name="prenoms" placeholder="Entrez votre prenoms" class="form-control">
            </div>
            <div class="form-group mb-3">
                <select name="classe_id" id="">
                    <option value="">Selectionner une classe</option>
                   @foreach ($classe as $classe)
                        <option value="{{$classe->id}}">{{$classe->libelle}}</option>
                   @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <a href="{{route('etudiant')}}" class="btn btn-danger">Annuler</a>
        </form>
    </div>
</div>
@endsection
