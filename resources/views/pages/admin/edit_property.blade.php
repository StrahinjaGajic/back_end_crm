@extends('layouts.admin')
@section('page_title', 'Edit Property')

@section('content')
    <form action="{{ route('admin-update-property', $property->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="col-lg-12" style="padding: 0 !important; margin: 0 !important; background-color: #D1D2D4; min-height: 90px;">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="pull-left"><h3 style="opacity: 0.7; padding-left: 20px;">Edit Property</h3></div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="padding-top: 25px;">
                <ul class="pull-right list-inline">
                    <li class="breadcrumb-item" ><b>Property</b></li>
                    <li>></li>
                    <li class="breadcrumb-item" style="opacity: 0.8"><b>Edit Property</b></li>
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
                <input value="{{$property->property_name}}" class="form-control <?php echo ($errors->has('property_name')) ? 'alert alert-danger' : '';?>" id="property_name" type="text" name="property_name">
                {{--@if($errors->has('fname'))--}}
                {{--{{ $errors->first('fname') }}--}}
                {{--@endif--}}
                <h4>Street Address 1</h4>
                <input value="{{$property->street_address_1}}" class="form-control <?php echo ($errors->has('street_address_1')) ? 'alert alert-danger' : '';?>" name="street_address_1" id="street" type="text" />
                {{--@if($errors->has('street1'))--}}
                {{--{{ $errors->first('street1') }}--}}
                {{--@endif--}}
                <h4>Street Address 2</h4>
                <input value="{{$property->street_address_2}}" class="form-control <?php echo ($errors->has('street_address_2')) ? 'alert alert-danger' : '';?>" name="street_address_2" id="street" type="text"/>
                {{--@if($errors->has('street2'))--}}
                {{--{{ $errors->first('street2') }}--}}
                {{--@endif--}}
                <h4>City</h4>
                <input value="{{$property->city}}" class="form-control <?php echo ($errors->has('city')) ? 'alert alert-danger' : '';?>" type="text" name="city" id="city"  >
                <h4>County</h4>
                <input value="{{$property->county}}" class="form-control <?php echo ($errors->has('county')) ? 'alert alert-danger' : '';?>" type="text" name="county" id="state"  >
                <h4>Post code</h4>
                <input value="{{$property->post_code}}" class="form-control <?php echo ($errors->has('post_code')) ? 'alert alert-danger' : '';?>" type="text" name="post_code" id="post_code" maxlength="10" >
                <h4>Country</h4>
                <div class="form-group">
                    <select class="form-control" placeholder="United Kingdom" name="country" id="country" >
                        @foreach($countries as $country)
                            <option {{ ($property->country ==  $country->code) ? 'selected' : ''}} value="{{ $country->code }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                <h4>Description</h4>
                <textarea class="form-control" name="description" rows="4" id="textareaChars" placeholder="Property description..." maxlength="512"></textarea>
                <span style="margin-left: 10px;" id="chars">512</span> characters left
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
                <input value="{{$property->lat}}" type='hidden' name='lat' id='lat'>
                <input value="{{$property->lng}}" type='hidden' name='lng' id='lng'>

                <h4>Property Rent Price (per month)</h4>
                <input value="{{$property->rent_price}}" class="form-control <?php echo ($errors->has('rent_price')) ? 'alert alert-danger' : '';?>" type="number" step=".01" name="rent_price" id="rent_price" min="0" style="padding: 0 0 0 10px !important;" placeholder="450">
                <h4>Property Deposit</h4>
                <input value="{{$property->property_deposit}}" class="form-control <?php echo ($errors->has('property_deposit')) ? 'alert alert-danger' : '';?>" type="number" step=".01" name="property_deposit" id="property_deposit" style="padding: 0 0 0 10px !important;" min="0" placeholder="700">
                <h4>Property Type</h4>
                <div class="form-group">
                    <select class="form-control" name="property_type" id="property_type">
                        <option {{ ($property->property_type == 'bungalow') ? 'selected' : ''}}value="bungalow">Bungalow</option>
                        <option {{ ($property->property_type == 'semi-detached') ? 'selected' : ''}}value="semi-detached">Semi Detached</option>
                        <option {{ ($property->property_type == 'detached') ? 'selected' : ''}}value="detached">Detached</option>
                        <option {{ ($property->property_type == 'terraced') ? 'selected' : ''}}value="terraced">Terraced</option>
                        <option {{ ($property->property_type == 'apartment') ? 'selected' : ''}}value="apartment">Apartment</option>
                        <option {{ ($property->property_type == 'flat') ? 'selected' : ''}}value="flat">Flat</option>
                        <option {{ ($property->property_type == 'loft') ? 'selected' : ''}}value="loft">Loft</option>
                        <option {{ ($property->property_type == 'room') ? 'selected' : ''}}value="room">Room</option>
                        <option {{ ($property->property_type == 'studio-apartment') ? 'selected' : ''}}value="studio-apartment">Studio Apartment</option>
                        <option {{ ($property->property_type == 'studio-flat') ? 'selected' : ''}}value="studio-flat">Studio Flat</option>
                    </select>
                </div>
                <h4>Bedrooms</h4>
                <input value="{{$property->bedrooms}}" class="form-control <?php echo ($errors->has('bedrooms')) ? 'alert alert-danger' : '';?>" type="number" name="bedrooms" id="bedrooms" style="padding: 0 0 0 10px !important;" min="0" placeholder="4">
                <h4>Year built</h4>
                <input value="{{$property->year_built}}" class="form-control <?php echo ($errors->has('year_built')) ? 'alert alert-danger' : '';?>" type="number" placeholder="2000" maxlength="4" name="year_built" id="year_built" style="padding: 0 0 0 10px !important;" min="1700">
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-xs-12" style="margin-top: 20px">
            <div class="col-lg-6"> <!-- OVAKO STAVLJAMO U ISTI RED-->
                <h3>Edit Photo/Avatar</h3>
                <div class="gallery">
                    @foreach($propertyImages as $image)
                        <div id="{{$image['id']}}" class="col-lg-3 col-md-3 col-sm-3">
                            <figure>
                                <img data-toggle="modal" data-target="#myModal{{$image['id']}}" src="{{asset('uploads/'.$image['path'])}}" class="img-responsive">
                                {{--<figcaption>Daytona Beach <small>United States</small></figcaption>--}}
                            </figure>
                        </div>
                        <div style="margin-top: 130px" class="modal fade" id="myModal{{$image['id']}}" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete this image ?</h4>
                                    </div>
                                    <div class="modal-body text-center">
                                        <div class="col-lg-12 col-sm-12 col-xs-12">
                                            <img height="400" width="300" src="{{asset('uploads/'.$image['path'])}}"/>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-xs-12 idSelector" style="margin-top: 25px">
                                            <button type="button" data-image="{{$image['id']}}" class="btn btn-danger deleteImage">Delete</button>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="border-top: none !important;">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close pop-up</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <h3>Edit supporting files</h3>
                @foreach($propertyFiles as $files)

                    <?php $extension = strtoupper(substr($files['path'], -3));?>
                    <div id="{{$files['id']}}" class="col-lg-5 col-md-5 col-sm-5">
                        <figure>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="col-lg-offset-4">
                                    <h3>{{ $extension }} File</h3>
                                    <img src="{{asset('img/admin/DocumentIcon.png')}}" class="img-responsive"/>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px;">
                                <div class="col-lg-6">
                                    <a target="_blank" href="{{ asset('uploads/'.$files['path']) }}" type="button" data-file="{{$files['id']}}" class="btn btn-primary">Download</a>

                                </div>
                                <div class="col-lg-6">
                                    <button type="button"  data-toggle="modal" data-target="#myFileModal{{$files['id']}}" class="btn btn-danger">Delete</button>

                                </div>
                            </div>
                        </figure>
                    </div>
                    <div style="margin-top: 130px" class="modal fade" id="myFileModal{{$files['id']}}" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body text-center">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <p>Are you sure you want to delete this file</p>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 idSelector" style="margin-top: 25px">
                                        <button type="button" data-file="{{$files['id']}}" class="btn btn-danger deleteFile">Delete</button>
                                    </div>
                                </div>
                                <div class="modal-footer" style="border-top: none !important;">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close pop-up</button>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </form>
@endsection

@section('perPageScripts')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXhfBoB8yqj7jLIUBoWVKGU5aIAgy4XnE&callback=initialize">
    </script>
    <script>
        var maxLength = 512;
        $('textarea').keyup(function() {
            var length = $(this).val().length;
            var length = maxLength-length;
            $('#chars').text(length);
        });
        function initialize() {
            var myLatlng = new google.maps.LatLng('{{$property->lat}}','{{$property->lng}}');
            var mapProp = {
                center:myLatlng,
                zoom:10,
                mapTypeId:google.maps.MapTypeId.ROADMAP

            };
            var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Hello World!',
                draggable:true
            });
            document.getElementById('lat').value= '{{$property->lat}}'
            document.getElementById('lng').value= '{{$property->lng}}'
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
    <script>
        $(document).ready(function () {
            $('.deleteImage').click(function(){
                var $imageId = $(this).attr('data-image'); // PUTANJA !!!
                $.post('/getPropertyImage/' + $imageId, function (data) {
                    if(data.response) {
                        $('#myModal' + $imageId).modal('hide'); //works
                        var imageToDelete = data.target;
                        $('div#'+imageToDelete).remove();
                    }
//                    $('#' + data.target).empty();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.deleteFile').click(function(){
                var $fileId = $(this).attr('data-file');  // PUTANJA !!!
                $.post('/getPropertyFile/' + $fileId, function (data) {
                    if(data.response) {
                        $('#myFileModal' + $fileId).modal('hide'); //works
                        var imageToDelete = data.target;
                        $('div#'+imageToDelete).remove();
                    }
//                    $('#' + data.target).empty();
                });
            });
        });

    </script>

@endsection