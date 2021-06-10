@extends('layouts.master')
@section('contenu')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Liste des étudiants Inscrit</h3>
      <div>
        <div class="d-flex justify-content-end">
          <a href="{{route('etudiant.create')}}" class="btn btn-primary">Ajouter un nouvelle etudiant</a>
        </div>
        @if (session()->has('successDelete'))
           <div class="alert alert-success">
                {{session()->get('successDelete')}}
           </div>
        @endif
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Prenoms</th>
              <th scope="col">Classe</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
              @foreach ($etudiants as $etudiant)
              <tr>
                <th scope="row">{{$loop->index +1}}</th>
                <td>{{$etudiant->nom}}</td>
                <td>{{$etudiant->prenoms}}</td>
                <td>{{$etudiant->classe->libelle}}</td>
                <td>
                  <a href="{{route('etudiant.edit', $etudiant->id)}}" class="btn btn-info">Editer</a>
                  <a class="btn btn-danger" href="{{route('etudiant.supprimer', $etudiant->id)}}" onclick="return confirm('Voulez vous supprimer cet etudiant')" method="POST">Supprimer</a>

                    @csrf
                    <input type="hidden" name="_method" value="delete" id="">
                  </form>
                </td>
              </tr>
              @endforeach

          </tbody>
        </table>

            {{$etudiants->links()}}

      </div>
  </div>
@endsection
