@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="row">
        <div class="medium-offset-4 medium-11 columns">
            <h4>Nous Contacter</h4>
                <form action="{{route('contacts.store')}}" method="post">
                    @foreach($errors->all() as $error)
                        <div class="alert-danger">{{$error}}</div><br>
                    @endforeach
                    @if(Session::get('fail'))
                        <div class="alert-danger">{{Session::get('fail')}}</div><br>
                    @endif
                    @if(Session::get('success'))
                        <div class="alert-success">{{Session::get('success')}}</div><br>
                    @endif
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
                        <label class="label info">Message</label>
                        <textarea name="message" cols="30" rows="5" placeholder="Votre Message"></textarea>
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