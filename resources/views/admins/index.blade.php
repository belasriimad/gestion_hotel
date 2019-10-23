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
            <h4>Admins</h4>
            <hr>
            <a class="hollow button primary" href="{{route('admins.create')}}">Ajouter</a>
            <table class="stack">
            <thead>
                <tr>
                <th width="200">Nom & Prénom</th>
                <th width="200">Email</th>
                <th width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>
                        <a class="hollow button warning" href="{{route('admins.delete',['id'=>$admin->id])}}">Supprimer</a>
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