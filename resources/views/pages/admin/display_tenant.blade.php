@extends('layouts.admin')
@section('page_title', 'Tenant Page')

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
        <div class="col-lg-12" style="margin-top: 110px">
            <div class="col-lg-1 shadow" style="background-color: grey; margin-right: 5px; width: 200px; height: 100%;">
                <div class="side-bar">
                    <section>
                        <div class="links-an">
                            <ul style="padding-left: 10px !important;">
                                <li><a href="">Add tenant to property</a></li>
                                <li><a href="">Vacate a property</a></li>
                                <li><a href="">Delete a property</a></li>
                                <li><a href="">Add tenant</a></li>
                                <li><a href="">Edit property</a></li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
            <div class="col-lg-10 col-lg-offset-1" style="margin-left: 160px;">
                <div class="col-lg-12" style="height: 100%;">
                    <div class="col-lg-6" id="first_col">
                        <div style="background-color: #43C6F8;">
                            <div style="padding:0;">
                                <img id="img1" src="{{ asset('img/properties/apartment.jpg') }}" class="img-responsive" style=" height: 300px; width: 100%; padding:0;">
                            </div>
                            <div id="description" >
                                <div id="desc_text" style="color: white; width: 100%; padding: 15px; height: 20%; vertical-align: middle;">
                                    <h3>Description</h3>
                                    <p class="h5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                            </div>
                            <img id="img2" src="{{ asset('img/properties/apartment.jpg') }}"  class="img-responsive" style=" height: 300px; width: 100%; padding:0;">
                        </div>
                    </div>
                    <div id="second_col" class="col-lg-6" style="height: 100%;">
                        <div class="col-lg-6" style="background-color: #43C6F8; height: 100%; padding:0;">
                            <div class="h5 col-lg-12" style="color: white; padding: 20px;border-left: 30px solid #43C6F8;"><b>
                                    Diablos Designs Residence<br>
                                    Diablos Close<br>
                                    Shrewsbury<br>
                                    Shropshire<br>
                                    SY0 0OPT</b>
                            </div>
                            <div class="col-lg-12 hidden-sm hidden-xs" style="background-color: #D1D2D4; padding: 10px 10px 10px 0;border-left: 30px solid #43C6F8;">
                                <div class="col-lg-12">
                                    <h5 class="h5" id="grey_box" style="color:#6D6D6D;  "><b>Property Rent Price (per month)</b></h5>
                                    <label style="color:white;">£450.00</label></div>
                                <div class="col-lg-6">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Property type</b></h5>
                                    <label style="color:white;">Detached</label>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Property Deposit</b></h5>
                                    <label style="color:white;">£450.00</label>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Year built</b></h5>
                                    <label style="color:white;">1980</label>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Bedrooms</b></h5>
                                    <label style="color:white;">3</label>
                                </div>
                            </div>
                            <div class="col-lg-12 hidden-lg hidde-md" style="background-color: #43C6F8; padding: 10px 5px 10px 5px;border-left: 30px solid #43C6F8;">
                                <div class="col-lg-12">
                                    <h5 class="h5" id="grey_box" style="color:#6D6D6D;  "><b>Property Rent Price (per month)</b></h5>
                                    <label style="color:white;">£450.00</label></div>
                                <div class="col-lg-12">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Property type</b></h5>
                                    <label style="color:white;">Detached</label>
                                </div>
                                <div class="col-lg-12">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Property Deposit</b></h5>
                                    <label style="color:white;">£450.00</label>
                                </div>
                                <div class="col-lg-12">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Year built</b></h5>
                                    <label style="color:white;">1980</label>
                                </div>
                                <div class="col-lg-12">
                                    <h5 class="h5" style="color:#6D6D6D;"><b>Bedrooms</b></h5>
                                    <label style="color:white;">3</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" style="height: 100%;">
                            <h5><b>Property Documents</b></h5>
                        </div>
                        <div class="col-lg-12" style="border-top: 20px solid #6D6D6D; border-left: 30px solid #43C6F8;">
                            <div class="col-lg-12" style="padding: 15px;">
                                <div class="col-lg-12">
                                    <h3><b>Tenant Details</b></h3>
                                </div>
                                <div class="col-lg-4" style="">
                                    <img src="PeronalProfileIcon.png" style="height: 100px; width: 100px;">
                                </div>
                                <div class="col-lg-4">
                                    <h5><b>Rent Amount</b></h5>
                                    <label>£450.00</label>
                                    <h5><b>Arrears</b></h5>
                                    <label>£0</label>
                                    <h5><b>Next Payment</b></h5>
                                    <label>01/01/2018</label>
                                </div>
                                <div class="col-lg-4">
                                    <h5><b>Tenant Details</b></h5>
                                    <label>John Doe</label>
                                    <h5><b>Date Moved In</b></h5>
                                    <label>01/01/2018</label>
                                    <h5><b>Contract Length</b></h5>
                                    <label>12 months</label>
                                    <h5><b>Contract End</b></h5>
                                    <label>01/01/2019</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="col-lg-6">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                                </div>
                                <div class="col-lg-6 text-center"  style="padding: 30px;">
                                    <button type="button" class="btn btn-info">Add/Edit</button>
                                </div>
                            </div>
                        </div>
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
@endsection