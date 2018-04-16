@extends('layouts.admin')
@section('page_title', 'Home')

@section('content')
    <form action="{{ route('admin-save-property') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12" style="padding: 0 !important; margin: 0 !important; background-color: #D1D2D4; min-height: 90px;">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="pull-left"><h3 style="opacity: 0.7; padding-left: 20px;">Add Property</h3></div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="padding-top: 25px;">
                <ul class="pull-right list-inline">
                            <li class="breadcrumb-item" ><b>Tenant</b></li>
                            <li>></li>
                            <li class="breadcrumb-item" style="opacity: 0.8"><b>Add Property</b></li>
                    <li><button type="submit" class="btn btn-info">SAVE</button></li>
                </ul>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px;">
            @if (count($errors) > 0)
                <div class="alert alert-danger" style="margin: 0 !important;">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="col-lg-7">
            <h4>Property name</h4>
                    <input value="{{old('property_name')}}" class="form-control <?php echo ($errors->has('property_name')) ? 'alert alert-danger' : '';?>" id="property_name" type="text" name="property_name">
            {{--@if($errors->has('fname'))--}}
                {{--{{ $errors->first('fname') }}--}}
            {{--@endif--}}
                <h4>Street Address 1</h4>
                <input value="{{old('street_address_1')}}" class="form-control <?php echo ($errors->has('street_address_1')) ? 'alert alert-danger' : '';?>" name="street_address_1" id="street" type="text" />
            {{--@if($errors->has('street1'))--}}
                {{--{{ $errors->first('street1') }}--}}
            {{--@endif--}}
                <h4>Street Address 2</h4>
                <input value="{{old('street_address_2')}}" class="form-control <?php echo ($errors->has('street_address_2')) ? 'alert alert-danger' : '';?>" name="street_address_2" id="street" type="text"/>
            {{--@if($errors->has('street2'))--}}
                {{--{{ $errors->first('street2') }}--}}
            {{--@endif--}}
                <h4>City</h4>
                <input value="{{old('city')}}" class="form-control <?php echo ($errors->has('city')) ? 'alert alert-danger' : '';?>" type="text" name="city" id="city"  >
                <h4>County</h4>
                <input value="{{old('county')}}" class="form-control <?php echo ($errors->has('county')) ? 'alert alert-danger' : '';?>" type="text" name="county" id="state"  >
                <h4>Post code</h4>
                <input value="{{old('post_code')}}" class="form-control <?php echo ($errors->has('post_code')) ? 'alert alert-danger' : '';?>" type="text" name="post_code" id="post_code" maxlength="10" >
                <h4>Country</h4>
                <div class="form-group">
                    <select class="form-control" placeholder="United Kingdom" name="country" id="country" >
                        @foreach($countries as $country)
                            <option value="{{ $country->code }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <h4>Description</h4>
                <textarea class="form-control" name="description" rows="4" id="description"></textarea>
                <h4>Upload Property Files</h4>
            <input id="input-b3" name="property_files[]" type="file" class="file" multiple
                   data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload..." data-allowed-file-extensions='["doc","pdf","docx","zip"]'>

            <h3>Photo/Avatar</h3>
            <input id="input-b3" name="photos[]" type="file" class="file" multiple
                   data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload..." data-allowed-file-extensions='["jpeg","png","bmp","jpg"]'>
        </div>
        <div class="col-lg-4 col-lg-offset-1">
                <h3><b>Google Map embed</b></h3>
            <div id="googleMap" style="height: 400px;"></div>

                Select your location
                <input value="{{old('lat')}}" type='hidden' name='lat' id='lat'>
                <input value="{{old('lng')}}" type='hidden' name='lng' id='lng'>

            <h4>Property Rent Price (per month)</h4>
                <input value="{{old('rent_price')}}" class="form-control <?php echo ($errors->has('rent_price')) ? 'alert alert-danger' : '';?>" type="number" step=".01" name="rent_price" id="rent_price" min="0" style="padding: 0 0 0 10px !important;" placeholder="450">
                <h4>Property Deposit</h4>
                <input value="{{old('property_deposit')}}" class="form-control <?php echo ($errors->has('property_deposit')) ? 'alert alert-danger' : '';?>" type="number" step=".01" name="property_deposit" id="property_deposit" style="padding: 0 0 0 10px !important;" min="0" placeholder="700">
                <h4>Property Type</h4>
                <div class="form-group">
                    <select class="form-control" name="property_type" id="property_type">
                        <option value="bungalow">Bungalow</option>
                        <option value="semi-detached">Semi Detached</option>
                        <option value="detached">Detached</option>
                        <option value="terraced">Terraced</option>
                        <option value="apartment">Apartment</option>
                        <option value="flat">Flat</option>
                        <option value="loft">Loft</option>
                        <option value="room">Room</option>
                        <option value="studio-apartment">Studio Apartment</option>
                        <option value="studio-flat">Studio Flat</option>
                    </select>
                </div>
                <h4>Bedrooms</h4>
                <input value="{{old('bedrooms')}}" class="form-control <?php echo ($errors->has('bedrooms')) ? 'alert alert-danger' : '';?>" type="number" name="bedrooms" id="bedrooms" style="padding: 0 0 0 10px !important;" min="0" placeholder="4">
                <h4>Year built</h4>
                <input value="{{old('year_built')}}" class="form-control <?php echo ($errors->has('year_built')) ? 'alert alert-danger' : '';?>" type="number" placeholder="2000" maxlength="4" name="year_built" id="year_built" style="padding: 0 0 0 10px !important;" min="1700">
        </div>
    </div>
    </form>
@endsection

@section('perPageScripts')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXhfBoB8yqj7jLIUBoWVKGU5aIAgy4XnE&callback=initialize">
    </script>
    <script>
        function initialize() {
            var myLatlng = new google.maps.LatLng(51.508742,-0.120850);
            var mapProp = {
                center:myLatlng,
                zoom:5,
                mapTypeId:google.maps.MapTypeId.ROADMAP

            };
            var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Hello World!',
                draggable:true
            });
            document.getElementById('lat').value= 51.508742
            document.getElementById('lng').value= -0.120850
            // marker drag event
            google.maps.event.addListener(marker,'drag',function(event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
            });

            //marker drag event end
            google.maps.event.addListener(marker,'dragend',function(event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
//                alert("lat=>"+event.latLng.lat());
//                alert("long=>"+event.latLng.lng());
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script>
        $(document).on('ready', function() {
            $("#input-b6").fileinput({
                showUpload: false,
                dropZoneEnabled: false,
                maxFileCount: 10,
                mainClass: "input-group-lg"
            });
        });
    </script>


@endsection