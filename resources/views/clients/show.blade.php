@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="row">
        <div class="medium-offset-4 medium-6 columns">
            <div class="column">
                <div class="card" style="width:40%;padding:10px;">
                    <img src="assets/img/generic/rectangle-1.jpg">
                    <div class="card-section">
                        <p><span class="label success"> Nom & Prénom: </span>  {{$client->name.' '.$client->lastname}}</p>
                        <small><span class="label success">Adresse: </span> {{$client->address}}</small><p><span class="label success">Ville: </span> {{$client->city}}</p>
                        <p><span class="label success">  Email: </span> {{$client->email}}</p>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')

@endsection