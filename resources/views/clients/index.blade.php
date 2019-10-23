@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="medium-12 columns">
        @if(Session::get('fail'))
            <div class="alert-danger">{{Session::get('fail')}}</div><br>
        @endif
        @if(Session::get('success'))
            <div class="alert-success">{{Session::get('success')}}</div><br>
        @endif

        <h4>Clients</h4>
        <hr>
        <table class="stack">
          <thead>
            <tr>
              <th width="200">Nom & Prénom</th>
              <th width="200">Email</th>
              <th width="200">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($clients as $client)
              <tr>
                <td>{{$client->name}}</td>
                <td>{{$client->email}}</td>
                <td>
                  <a class="hollow button warning" href="{{route('clients.edit',['id'=>$client->id])}}">Modifier</a>
                  <a class="hollow button danger" href="{{route('client.delete',['id'=>$client->id])}}">Supprimer</a>
                  <a class="hollow button info" href="{{route('clients.show',['id'=>$client->id])}}">Voir</a>
                </td>
              </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection

@section('scripts')

@endsection