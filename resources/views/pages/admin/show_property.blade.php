@extends('layouts.admin')
@section('page_title', 'Home')

@section('content')
        <div class="col-lg-12">
            <div class="col-lg-1 shadow" style="background-color: grey; margin-right: 5px; width: 200px; height: 100%;">
                <div class="side-bar">
                    <section>
                        <div class="links-an">
                            <ul>
                                <li><a href="">Property List</a></li>
                                <li><a href="">Property List</a></li>
                                <li><a href="">Property List</a></li>
                                <li><a href="">Property List</a></li>
                                <li><a href="">Property List</a></li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-10 col-lg-offset-1" style="margin-left: 170px; margin-top: 20px">
                <div class="col-lg-12" style="height: 100%;">
                    <div class="col-lg-6" id="first_col">
                        <div style="background-color: #43C6F8;">
                            <div style="padding:0;">
                                <img id="img1" src="{{asset('uploads/'.$property->getSingleImage($property->id))}}" class="img-responsive" style="
                                 height: 300px; width: 100%; padding:0;">
                            </div>
                            <div id="description" >
                                <div id="desc_text" style="color: white; width: 100%; padding: 15px; height: 20%; vertical-align: middle;">
                                    <h3>Description</h3>
                                    <p class="h5">{{$property->description}}</p>
                                </div>
                            </div>
                            <div id="googleMap" style="height: 400px;"></div>

                            <input value="{{$property->lat}}" type='hidden' name='lat' id='lat'>
                            <input value="{{$property->lng}}" type='hidden' name='lng' id='lng'>
                        </div>
                    </div>
                    <div id="second_col" class="col-lg-6" style="height: 100%;">
                        <div class="col-lg-6" style="background-color: #43C6F8; height: 100%; padding:0;">
                            <div class="h5 col-lg-12" style="color: white; padding: 20px;border-left: 30px solid #43C6F8;"><b>
                                    {{$property->street_address_1}}<br>
                                    {{$property->street_address_1}}<br>
                                </b>
                            </div>
                            <div class="col-lg-12 hidden-sm hidden-xs" style="background-color: #D1D2D4; padding: 10px 10px 10px 0;border-left: 30px solid #43C6F8;">
                                <div class="col-lg-12">
                                    <h5 class="h5" id="grey_box" style="color:#6D6D6D;  "><b>Property Rent Price (per month)</b></h5>
                                    <label style="color:white;">£{{$property->rent_price}}</label></div>
                                <div class="col-lg-6">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Property type</b></h5>
                                    <label style="color:white;">{{$property->property_type}}</label>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Property Deposit</b></h5>
                                    <label style="color:white;">£{{$property->property_deposit}}</label>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Year built</b></h5>
                                    <label style="color:white;">{{$property->year_build}}</label>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Bedrooms</b></h5>
                                    <label style="color:white;">{{$property->bedrooms}}</label>
                                </div>
                            </div>
                            <div class="col-lg-12 hidden-lg hidde-md" style="background-color: #43C6F8; padding: 10px 5px 10px 5px;border-left: 30px solid #43C6F8;">
                                <div class="col-lg-12">
                                    <h5 class="h5" id="grey_box" style="color:#6D6D6D;  "><b>Property Rent Price (per month)</b></h5>
                                    <label style="color:white;">£{{$property->rent_price}}</label></div>
                                <div class="col-lg-12">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Property type</b></h5>
                                    <label style="color:white;">{{$property->property_type}}</label>
                                </div>
                                <div class="col-lg-12">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Property Deposit</b></h5>
                                    <label style="color:white;">£{{$property->property_deposit}}</label>
                                </div>
                                <div class="col-lg-12">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Year built</b></h5>
                                    <label style="color:white;">{{$property->year_build}}</label>
                                </div>
                                <div class="col-lg-12">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Bedrooms</b></h5>
                                    <label style="color:white;">{{$property->bedrooms}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" style="height: 100%;">
                            <h5><b>Property Documents</b></h5>
                                    <figure>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            @foreach($propertyFiles as $files)
                                                <?php $extension = strtoupper(substr($files['path'], -3));?>
                                            <div style="float: left; margin-right: 10px;">
                                                <h5>{{ $extension }} File</h5>
                                                <a target="_blank" href="{{ asset('uploads/'.$files['path']) }}">
                                                    <img src="{{asset('img/admin/DocumentIcon.png')}}" class="img-responsive"/>
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </figure>
                        </div>
                        @if($property->tenant_id)
                        <div class="col-lg-12" style="border-top: 20px solid #6D6D6D; border-left: 30px solid #43C6F8;">
                            <div class="col-lg-12" style="padding: 15px;">
                                <div class="col-lg-12">
                                    <h3><b>Tenant Details</b></h3>
                                </div>
                                <div class="col-lg-4" style="">
                                    <img src="{{asset('img/admin/user-profile-image.png')}}" style="height: 100px; width: 100px;">
                                </div>
                                <div class="col-lg-4">
                                    <h5><b>Rent Amount</b></h5>
                                    <label>£{{ $property->rent_price }}</label>
                                    {{--Calculate if last payment wasn't successfully paid and display it--}}
                                    <h5><b>Arrears</b></h5>
                                    <label>£0</label>
                                    <h5><b>Next Payment</b></h5>
                                    <label>{{ $tenant->payment_date }}</label>
                                </div>
                                <div class="col-lg-4">
                                    <h5><b>Tenant Details</b></h5>
                                    <label>{{ $property->getTenantName($property->tenant_id) }}</label>
                                    <h5><b>Date Moved In</b></h5>
                                    <label>{{ $tenant->moved_in_date }}</label>
                                    <h5><b>Contract Length</b></h5>
                                    <label>{{ $tenant->contract_length }}</label>
                                    <h5><b>Contract End</b></h5>
                                    {{--Make additional row for contract_end--}}
                                    <label>01/01/2019</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-6">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                                </div>
                                <div class="col-lg-6 text-center"  style="padding: 30px;">
                                    <button type="button" class="btn btn-info">Display</button>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="col-lg-12" style="border-top: 20px solid #6D6D6D; border-left: 30px solid #43C6F8;">
                                <div class="col-lg-12" style="padding: 15px;">
                                    <div class="col-lg-12">
                                        <h3><b>None Assigned</b></h3>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('perPageScripts')
    <script>
        window.onload = function(){
            if(!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                var height=0;
                height = document.getElementById('second_col').offsetHeight - (document.getElementById('img1').offsetHeight + document.getElementById('img2').offsetHeight);
                var string = "height: ";
                string = string.concat(height, "px");
                document.getElementById('description').setAttribute("style", string);
            }else{
                if(window.innerHeight < window.innerWidth){
                    var height=0;
                    height = document.getElementById('second_col').offsetHeight - (document.getElementById('img1').offsetHeight + document.getElementById('img2').offsetHeight);
                    var string = "height: ";
                    string = string.concat(height, "px");
                    document.getElementById('description').setAttribute("style", string);
                }
            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXhfBoB8yqj7jLIUBoWVKGU5aIAgy4XnE&callback=initialize">
    </script>
    <script>
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
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection