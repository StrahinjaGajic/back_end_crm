@extends('layouts.admin')
@section('page_title', 'Home')

@section('content')
    <div class="col-md-12">
        <div class="col-md-3" style="background-color: #44c7f4; height: 60px; color: white;">
            <div class="col-md-6"><p>Properties Let</p></div>
            <div class="col-md-6 "><p style="text-align: right;">4</p></div>
        </div>
        <div class="col-md-3 col-md-offset-1" style="background-color: #f8a98e; height: 60px; color: white;">
            <div class="col-md-6"><p>Payment Due</p></div>
            <div class="col-md-6"><p>$5,104.00</p></div>
        </div>
        <div class="col-md-3 col-md-offset-1" style="background-color: #b0dedb; height: 60px; color: white;">
            <div class="col-md-6"><p>Reminders Today</p></div>
            <div class="col-md-6"><p>11</p></div>
        </div>
    </div>
@endsection

@section('perPageScripts')

@endsection