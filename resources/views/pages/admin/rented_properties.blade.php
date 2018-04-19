@extends('layouts.admin')
@section('page_title', 'Home')

@section('content')
    <table class="table borderless text-center" style="margin-left: 30px;width:95%; margin-top: 50px;">
        <thead>
        <tr style="max-height: 30px;">
            <th style="text-align: center; color: white; background-color: #44C7F5; width:30%; font-size: 20px; ">Name</th>
            <th style="text-align: center; color: white; background-color: #FAA98E; width:30%; font-size: 20px;">Name of Tenant</th>
            <th style="text-align: center; color: white; background-color: #6B6B6B; font-size: 20px;">Cost</th>
            <th style="text-align: center; color: white; background-color: #6b572a; font-size: 20px;">Rented Till</th>
        </tr>
        </thead>
        <tbody>
        @foreach($properties as $property)
            <tr style="opacity:0.8;">
                <td><b>{{$property->property_name }}</b></td>
                <td><b>{{ $property->getTenantName($property->tenant_id) }}</b></td>
                <td><b>{{$property->rent_price}}</b></td>
                <td>{{ $property->getNextPaymentDate($property->tenant_id) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

@section('perPageScripts')

@endsection