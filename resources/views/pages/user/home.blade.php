@extends('layouts.user')
@section('page_title', 'Home')

@section('content')
    <div class="col-md-12" style="margin-top: 45px;">
        <div class="col-md-3" style="background-color: #44c7f4; height: 60px; color: white;">
            <div class="row top-notification-first">Next Payment Date</div>
            <div class="row top-notification-second">02/02/2018</div>
        </div>
        <div class="col-md-3 col-md-offset-1" style="background-color: #f8a98e; height: 60px; color: white;">
            <div class="row top-notification-first">Payment Made</div>
            <div class="row top-notification-second">$5,104.00</div>
        </div>
        <div class="col-md-3 col-md-offset-1" style="background-color: #b0dedb; height: 60px; color: white;">
            <div class="row top-notification-first">Reminders Today</div>
            <div class="row top-notification-second">11</div>
        </div>
    </div>

    <div class="col-md-12" style="margin-top: 45px;">
        <div class="col-md-3" style="padding: 0 !important;">
            <div class="media">
                <img width="350" class="media-object" src="{{ asset('img/properties/apartment.jpg') }}" />
            </div>
        </div>
        <div class="col-md-8 col-md-offset-1" style="background-color: #f8a98e; height: 60px; color: white;">
            <div class="row top-notification-first">Payment Made</div>
            <div class="row top-notification-second">$5,104.00</div>
        </div>
    </div>
@endsection

@section('perPageScripts')

@endsection