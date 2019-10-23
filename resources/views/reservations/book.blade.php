@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="row" style="padding:10px;">
        <div class="medium-12 columns">
            @if(Session::has('success'))
                <div class="alert-success">{{Session::get('success')}}</div>
            @endif
            <table class="stack">
                <thead>
                    <tr>
                    <th width="200">Chambre</th>
                    <th width="200">Disponibilité</th>
                    <th width="200">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                    <tr>
                        <td>{{$room->name}}</td>
                        <td>
                            @if($room->status == 1)
                                <h7><div class="callout success">Disponible</div></h7>
                            @else
                                <h7><div class="callout warning">Resérvée</div></h7>
                            @endif
                        </td>
                        <td>
                        @if(isset(Auth::user()->id))
                            @if($room->status == 1)
                                <h7><a href="#" class="button success hollow" data-open="myModal{{$room->id}}">Resérver</a></h7>
                                <div id="myModal{{$room->id}}" class="reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                                    <h2 id="modalTitle">Resérvation pour: <b>{{Auth::user()->name}}</b></h2>
                                    <form action="{{route('reservations.store')}}" method="post">
                                        <input type="hidden" name="_token" value="{{Session::token()}}">
                                        <input type="hidden" name="room_id" value="{{$room->id}}">
                                        <div class="medium-1  columns">De:</div>
                                        <div class="medium-2  columns"><input name="dateFrom" value="<?php echo date('Y-m-d');?>" type="date"/></div>
                                        <div class="medium-1  columns">A:</div>
                                        <div class="medium-2  columns"><input name="dateTo" value="<?php echo date('Y-m-d');?>" type="date"/></div>
                                        <div class="medium-2  columns"><input class="button" type="submit" value="Valider" /></div>
                                    </form>
                                    <button class="close-button" data-close aria-label="Close modal" type="button">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @else
                                <span class="label info">Sera disponible le : {{$reservation = App\Reservation::where('room_id',$room->id)->first()->date_out}}</span>
                            @endif
                        </td>
                        @else
                            @if($room->status == 1)
                              <h7><a href="{{route('clients.login')}}" class="button success hollow">Resérver</a></h7>
                            @endif
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
    