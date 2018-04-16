@extends('layouts.admin')
@section('page_title', 'Tenant List')

@section('content')
    <div style="background-color: #D1D2D4; min-height: 70px;width: calc(1600px - 240px); float: none; position: fixed;
z-index: 100;">
        <div class="col-md-12 col-lg-12 col-sm-12" style="height: 81px; position: relative">
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3">
                <div class="pull-left"><h3 style="opacity: 0.7; padding-left: 20px; ">Tenant List</h3></div>
            </div>
            <div class="col-lg-7 col-md-8 col-sm-8 col-xs-8" style="padding-top: 25px;">
                <ul class="pull-right list-inline">
                    <li class="breadcrumb-item" ><b>Tenant</b></li>
                    <li>></li>
                    <li class="breadcrumb-item" style="margin-right:45px;opacity: 0.8"><b>Tenant List</b></li>
                    <li><a href="{{route('admin.add-tenant')}}" class="btn btn-info">ADD NEW</a></li>
                </ul>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        </div>
    </div>
    <div class="row" style="float: none; margin-right: 0; height: inherit;">
        <div class="col-lg-1 shadow" style="background-color: grey; margin-right: 5px; width: 200px; height: 100%;">
            <div class="side-bar">
                <section>
                    <div class="links-an">
                        <ul style="padding-left: 10px !important;">
                            <li><a href="">Add Tenant to property</a></li>
                            <li><a href="">Non assigned tenants</a></li>
                            <li><a href="">Assigned tenants</a></li>
                            <li><a href="">Add new tenant</a></li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
        <div class="col-lg-10" id="other">
            <table class="table borderless text-center" style="width:95%">
                <thead>
                <tr style="max-height: 30px;">
                    <th style="text-align: center; color: white; background-color: #44C7F5; width:30%; font-size: 20px; ">Tenants</th>
                    <th style="text-align: center; color: white; background-color: #B1DEDB; width:30%; font-size:20px;">Property Assigned</th>
                    <th style="text-align: center; color: white; background-color: #FAA98E; width:30%; font-size: 20px;">Contract Length Left</th>
                    <th style="text-align: center; color: white; background-color: #6B6B6B; font-size: 20px;">Edit</th>
                    <th style="text-align: center; color: white; background-color: #6B6B6B; font-size: 20px;">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tenants as $tenant)

                <tr style="opacity:0.8;">
                    <td><b>{{$tenant->first_name.' '.$tenant->last_name}}</b></td>
                    <td><b>{{ ($tenant->property) ? $tenant->getAssignedPropertyName($tenant->property) : 'Not Assigned' }}</b></td>
                    <td><b>{{$tenant->contract_length}} Months</b></td>
                    <td>
                        <a href="{{route('admin-edit-tenant',[$tenant->id])}}"><img src="{{asset('img/admin/ContractLengthHouseIcon.png')}}"/></a>
                    </td>
                    <td>
                        <a data-toggle="modal" data-target="#myModal{{$tenant->id}}"><img src="{{asset('img/admin/TrashCanIcon.png')}}"/></a>
                    </td>
                </tr>
                <div id="myModal{{$tenant->id}}" class="modal fade" role="dialog" style="margin-top: 250px;">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Are you use you want to delete {{$tenant->first_name.' '.$tenant->last_name}} and all related data</h4>
                            </div>
                            <div class="modal-body text-center">
                                <form action="{{route('admin-delete-tenant',$tenant->id)}}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('perPageScripts')
    <script>
    </script>
@endsection