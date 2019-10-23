@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="row">
        <div class="medium-offset-4 medium-11 columns">
            <h4>Modification</h4>
                <form action="{{route('client.update',['id'=>$client->id])}}" method="post">
                    @foreach($errors->all() as $error)
                        <div class="alert-danger">{{$error}}</div><br>
                    @endforeach
                    <hr>
                    <div class="medium-4  columns">
                        <label class="label info">Nom</label>
                        <input name="name" type="text" placeholder="Votre Nom" value="{{$client->name}}">
                    </div>
                    <div class="medium-4  columns">
                        <label class="label info">Prénom</label>
                        <input name="lastName" type="text" placeholder="Votre Prénom" value="{{$client->lastname}}">
                    </div>
                    <div class="medium-8  columns">
                        <label class="label info">Adresse</label>
                        <input name="address" type="text" placeholder="Votre Adresse" value="{{$client->address}}">
                    </div>
                    <div class="medium-4  columns">
                        <label class="label info">Code postal</label>
                        <input name="zipCode" type="number" placeholder="Votre Code Postal" value="{{$client->zipCode}}">
                        <input name="_token" type="hidden" value="{{Session::token()}}">
                    </div>
                    <div class="medium-4  columns">
                        <label class="label info">Ville</label>
                        <input name="city" type="text" placeholder="Votre Ville" value="{{$client->city}}">
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