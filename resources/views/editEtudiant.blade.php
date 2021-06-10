@extends('layouts.master')
@section('contenu')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Edite etudiants</h3>

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

        <form action="{{route('etudiant.update', $etudiant->id)}}" method="POST">
            @csrf
             <input type="hidden" name="_method" value="put" id="">
            <div class="form-group mb-2">
                <input type="text" name="nom" placeholder="Entrez votre nom" class="form-control" value="{{$etudiant->nom}}">
            </div>
            <div class="form-group mb-2">
                <input type="text" name="prenoms" placeholder="Entrez votre prenoms" class="form-control"  value="{{$etudiant->prenoms}}">
            </div>
            <div class="form-group mb-3">
                <select name="classe_id" id="">
                    <option value="">Selectionner une classe</option>
                   @foreach ($classes as $classe)
                    @if($classe->id == $etudiant->class_id)
                        <option value="{{$classe->id}}" selected>{{$classe->libelle}}</option>
                    @else
                        <option value="{{$classe->id}}">{{$classe->libelle}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modiifier</button>
            <a href="{{route('etudiant')}}" class="btn btn-danger">Annuler</a>
        </form>
    </div>
</div>
@endsection
