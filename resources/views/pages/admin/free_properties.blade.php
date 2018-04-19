@extends('layouts.admin')
@section('page_title', 'Home')

@section('content')
    <table class="table borderless text-center" style="margin-left: 30px;width:95%; margin-top: 50px;">
        <thead>
        <tr style="max-height: 30px;">
            <th style="text-align: center; color: white; background-color: #44C7F5; width:30%; font-size: 20px; ">Name</th>
            <th style="text-align: center; color: white; background-color: #FAA98E; width:30%; font-size: 20px;">Street Address</th>
            <th style="text-align: center; color: white; background-color: #6B6B6B; font-size: 20px;">City</th>
            <th style="text-align: center; color: white; background-color: #6b572a; font-size: 20px;">County</th>
            <th style="text-align: center; color: white; background-color: #6b344c; font-size: 20px;">Country</th>
            <th style="text-align: center; color: white; background-color: #376b69; font-size: 20px;">Rent Price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($properties as $property)
            <tr style="opacity:0.8;">
                <td><b>{{$property->property_name }}</b></td>
                <td><b>{{ $property->street_address_1 }}</b></td>
                <td><b>{{$property->city}}</b></td>
                <td><b>{{ $property->county }}</b></td>
                <td><b>{{ $property->country }}</b></td>
                <td><b>{{ $property->rent_price }}</b></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('perPageScripts')

@endsection