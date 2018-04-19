@section('min_sidebar', 'true')

<div class="top-second-sidebar" style="height: 81px; position: relative">
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