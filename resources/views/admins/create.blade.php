@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="row">
        <div class="medium-offset-4 medium-11 columns">
            <h4>Ajouter un admin</h4>
                <form action="{{route('admins.store')}}" method="post">
                    @foreach($errors->all() as $error)
                        <div class="alert-danger">{{$error}}</div><br>
                    @endforeach
                    <hr>
                    <div class="medium-4  columns">
                        <label class="label info">Nom & Prénom</label>
                        <input name="name" type="text" placeholder="Votre Nom & Prénom">
                    </div>
                    <div class="medium-4  columns">
                        <label class="label info">Email</label>
                        <input name="email" type="text" placeholder="Votre Email">
                    </div>
                    <div class="medium-4  columns">
                        <label class="label info">Mot de passe</label>
                        <input name="password" type="password" placeholder="Votre Mot de passe">
                        <input name="_token" type="hidden" value="{{Session::token()}}">
                    </div>
                    <div class="medium-4  columns">
                        <input value="Valider" class="button success hollow" type="submit">
                    </div>
                </form>
            </div>
        </div>
@endsection

@section('scripts')

@endsection