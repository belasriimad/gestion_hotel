@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="medium-12 columns">
            @if(Session::has('success'))
                <div class="alert-success">{{Session::get('success')}}</div>
            @endif
            <h4>Hotels Du Maroc</h4>
            <hr>
            <div class="media-object">
                <div class="media-object-section">
                    <div class="thumbnail">
                    <img src= "{{URL::to('images/hotels.jpg')}}">
                    </div>
                </div>
                <div class="media-object-section main-section">
                    <h4>Dreams feel real while we're in them.</h4>
                    <p>I'm going to improvise. Listen, there's something you should know about me... about inception. An idea is like a virus, resilient, highly contagious. The smallest seed of an idea can grow. It can grow to define or destroy you.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection