@extends('layouts.admin')
@section('page_title', 'Edit Tenant')

@section('content')
    <form action="{{ route('update-tenant',$tenant['id']) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div class="col-lg-12" style="padding: 0 !important; margin: 0 !important; background-color: #D1D2D4; min-height: 90px;">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="pull-left"><h3 style="opacity: 0.7; padding-left: 20px;">Add Tenant</h3></div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" style="padding-top: 25px;">
                <ul class="pull-right list-inline">
                    <li class="breadcrumb-item" >Tenant</li>
                    <li>></li>
                    <li class="breadcrumb-item" style="opacity: 0.8">Add Tenant</li>
                    <li><button type="submit" class="btn btn-info">SAVE</button></li>
                </ul>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
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
            <div class="col-lg-4">
                <h3>Tenant Details</h3>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 50px;">
                    <div class="form-group">

                        <label for="first_name">First name</label>
                        <input value="{{$tenant['first_name']}}" name="first_name"  type="text" class="form-control <?php echo ($errors->has('first_name')) ? 'alert alert-danger' : '';?>" id="first_name">

                        <label for="surname">Last Name</label>
                        <input value="{{$tenant['last_name']}}" name="last_name"  type="text" class="form-control <?php echo ($errors->has('last_name')) ? 'alert alert-danger' : '';?>" id="surname">

                    </div>
                </div>
                <br>
                <div class="form-group">
                    <h3>Current Address Details</h3>
                    <br>
                    <h4>Street Address 1</h4>

                    <input value="{{$tenant['street_address_1']}}" name="street_address_1"  type="text" class="form-control <?php echo ($errors->has('street_address_1')) ? 'alert alert-danger' : '';?>" id="street_address_1">

                    <br>
                    <h4>Street Address 2</h4>

                    <input value="{{$tenant['street_address_2']}}" name="street_address_2"  type="text" class="form-control <?php echo ($errors->has('street_address_2')) ? 'alert alert-danger' : '';?>" id="street_address_2">

                    <br>
                    <h4>City</h4>

                    <input value="{{$tenant['city']}}" name="city"  type="text" class="form-control <?php echo ($errors->has('city')) ? 'alert alert-danger' : '';?>" id="city">

                    <br>
                    <h4>County</h4>

                    <input value="{{$tenant['county']}}" name="county"  type="text" class="form-control <?php echo ($errors->has('county')) ? 'alert alert-danger' : '';?>" id="county">

                    <br>
                    <h4>Post code</h4>

                    <input style="padding: 0 0 0 10px !important;" value="{{$tenant['post_code']}}" name="post_code"  type="text" min="0" maxlength="10" class="form-control <?php echo ($errors->has('post_code')) ? 'alert alert-danger' : '';?>" id="postcode">

                    <br>
                    <h4>Country</h4>
                    <div class="form-group">
                        <label for="countries"></label>
                        <select class="form-control" id="countries" name="countries">
                            @foreach($countries as $country)
                                <option {{ ($country->code == $tenant['countries']) ? 'selected' : ''}} value="{{ $country->code }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h3>Additional Occupants</h3>
                <br>
                <div class="form-group col-lg-12" style="margin-bottom: 50px;">
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label for="adult_number">Adults</label>
                        </div>
                        <div class="col-lg-8">

                            <input style="padding: 0 0 0 10px !important;" value="{{$tenant['adult_number']}}" name="adult_number" placeholder="1"  type="number" class="form-control <?php echo ($errors->has('adult_number')) ? 'alert alert-danger' : '';?>" id="adult_number" min="0">

                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 50px;">
                        <div class="col-lg-4" style="margin-top: 20px;">
                            <label for="children_number">Children under 16</label>
                        </div>
                        <div class="col-lg-8" style="margin-top: 20px;">

                            <input style="padding: 0 0 0 10px !important;" value="{{$tenant['children_number']}}" name="children_number" placeholder="3" type="number" class="form-control <?php echo ($errors->has('children_number')) ? 'alert alert-danger' : '';?>" id="children_number" min="0">

                        </div>
                    </div>
                </div>
                <br>
                <h3>Names of Additional Occupants</h3>
                <br>
                <h4>Names of all occupants and ages</br>(separate with comma: name age, ...)</h4>

                <input value="{{$tenant['occupant_names']}}" name="occupant_names" placeholder="Jane Doh 33,John Kid 2,Jane Doh 23"  type="text" class="form-control <?php echo ($errors->has('occupant_names')) ? 'alert alert-danger' : '';?>" id="occupant_names">

                <br>
                <br>
                <br>
                <div class="col-lg-12 col-sm-12" style="background-color: #44c7f4;padding: 10px;">
                    <div class="col-lg-12"><h3 style="color: white">Assign tenant to property?</h3></div>
                    <div class="col-lg-12 col-sm-12">
                        <h3>Select Property</h3>
                        <div class="form-group">
                            <label for="sel1"></label>
                            <select class="form-control" id="sel1" name="property">
                                <option value="">Don't Assign</option>
                                @foreach($properties as $property)
                                    <option {{ ($property['id'] == $tenantPropertyId) ? 'selected' : ''}} value="{{ $property['id'] }}">{{ $property['property_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="deposit"><h4>Deposit amount</h4></label>
                                <input style="padding: 0 0 0 10px !important;" value="{{$tenant['deposit']}}" name="deposit" step=".01" type="number" class="form-control <?php echo ($errors->has('deposit')) ? 'alert alert-danger' : '';?>" id="deposit" min="0">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h4 style="margin-bottom: 14px;">Paid</h4>
                            <div class="form-group">
                                <label for="paid"></label>
                                <select class="form-control" id="paid" name="paid">
                                    <option {{ ($tenant['deposit'] == '1') ? 'selected' : ''}}value="1">Yes</option>
                                    <option {{ ($tenant['deposit'] == '0') ? 'selected' : ''}} value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h4 style="margin-bottom: 14px;">Contract</h4>
                            <div class="form-group">
                                <label for="contract_length"></label>
                                <select class="form-control" id="contract_length" name="contract_length">
                                    <option value="1">1</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <div class="col-lg-6">
                            <h4>Date Moved in</h4>
                            <div class="form-group">
                                <div id="filterDate2">

                                    <!-- Datepicker as text field -->
                                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                                        <input value="{{$tenant['moved_in_date']}}" name="moved_in_date" type="text" class="form-control <?php echo ($errors->has('moved_in_date')) ? 'alert alert-danger' : '';?>" placeholder="dd/mm/yyyy">
                                        <div class="input-group-addon" >
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <h4>Payment Date</h4>
                            <div class="form-group">
                                <div id="filterDate2">

                                    <!-- Datepicker as text field -->
                                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                                        <input value="{{$tenant['payment_date']}}" name="payment_date" type="text" class="form-control <?php echo ($errors->has('payment_date')) ? 'alert alert-danger' : '';?>" placeholder="dd/mm/yyyy">
                                        <div class="input-group-addon" >
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="col-sm-12 col-lg-12 col-xs-12" style="margin-top: 20px;">
                    <h3>Contanct Details</h3>
                    <h4>Telephone Number</h4>
                    <input style="padding: 0 0 0 10px !important;" value="{{$tenant['phone']}}" name="phone"  type="number" class="form-control <?php echo ($errors->has('phone')) ? 'alert alert-danger' : '';?>" id="phone" placeholder="00000 000000">
                    <h4>Email Address</h4>
                    <input value="{{$tenant['email']}}" name="email"  type="email" class="form-control <?php echo ($errors->has('email')) ? 'alert alert-danger' : '';?>" id="email" placeholder="contact@contact.co.uk">
                </div>
                <div class="col-sm-12 col-lg-12" style="margin-top: 20px;">
                    <h3>Emergency Contact</h3>
                    <h4>Next of Kin Full name</h4>

                    <input value="{{$tenant['next_of_kin_full_name']}}" name="next_of_kin_full_name"  type="text" class="form-control <?php echo ($errors->has('next_of_kin_full_name')) ? 'alert alert-danger' : '';?>" id="upload_files" placeholder="Joe Doe">

                    <h4>Next of Kin Contact Email</h4>

                    <input value="{{$tenant['next_of_kin_email']}}" name="next_of_kin_email"  type="email" class="form-control <?php echo ($errors->has('next_of_kin_email')) ? 'alert alert-danger' : '';?>" id="email" placeholder="contact@contact.co.uk">

                    <h4>Next of Kin contact Number</h4>

                    <input style="padding: 0 0 0 10px !important;" value="{{$tenant['next_of_kin_phone']}}" name="next_of_kin_phone"  type="number" class="form-control <?php echo ($errors->has('next_of_kin_phone')) ? 'alert alert-danger' : '';?>" id="number" placeholder="00000 000000">

                </div>
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 col-xs-12" style="margin-top: 20px">
            <div class="col-lg-6"> <!-- OVAKO STAVLJAMO U ISTI RED-->
                <h3>Edit Photo/Avatar</h3>
                <div class="gallery">
                @foreach($tenantImages as $image)
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
                                            <img height="400" src="{{asset('uploads/'.$image['path'])}}"/>
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
                @foreach($tenantFiles as $files)

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
        <div class="col-lg-12 col-sm-12 col-xs-12" style="margin-top: 20px">
            <div class="col-lg-6"> <!-- OVAKO STAVLJAMO U ISTI RED-->
                <h3>Photo/Avatar</h3>
                <input id="input-b3" name="tenant_image[]" type="file" class="file" multiple
                       data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {images} for upload..." data-allowed-file-extensions='["jpg","jpeg","png","bmp"]'>

            </div>
            <div class="col-lg-6">
                <h3>Upload supporting files</h3>
                <input id="input-b3" name="supporting_files[]" type="file" class="file" multiple
                       data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload..." data-allowed-file-extensions='["doc","pdf","docx","zip"]'>

            </div>
        </div>

    </form>
@endsection


@section('perPageScripts')
    <script>
        $('.input-group.date').datepicker({format: "dd/mm/yyyy"});
        !function(e){var t=function(t,n){this.$element=e(t),this.type=this.$element.data("uploadtype")||(this.$element.find(".thumbnail").length>0?"image":"file"),this.$input=this.$element.find(":file");if(this.$input.length===0)return;this.name=this.$input.attr("name")||n.name,this.$hidden=this.$element.find('input[type=hidden][name="'+this.name+'"]'),this.$hidden.length===0&&(this.$hidden=e('<input value="string" type="hidden" />'),this.$element.prepend(this.$hidden)),this.$preview=this.$element.find(".fileupload-preview");var r=this.$preview.css("height");this.$preview.css("display")!="inline"&&r!="0px"&&r!="none"&&this.$preview.css("line-height",r),this.original={exists:this.$element.hasClass("fileupload-exists"),preview:this.$preview.html(),hiddenVal:this.$hidden.val()},this.$remove=this.$element.find('[data-dismiss="fileupload"]'),this.$element.find('[data-trigger="fileupload"]').on("click.fileupload",e.proxy(this.trigger,this)),this.listen()};t.prototype={listen:function(){this.$input.on("change.fileupload",e.proxy(this.change,this)),e(this.$input[0].form).on("reset.fileupload",e.proxy(this.reset,this)),this.$remove&&this.$remove.on("click.fileupload",e.proxy(this.clear,this))},change:function(e,t){if(t==="clear")return;var n=e.target.files!==undefined?e.target.files[0]:e.target.value?{name:e.target.value.replace(/^.+\\/,"")}:null;if(!n){this.clear();return}this.$hidden.val(""),this.$hidden.attr("name",""),this.$input.attr("name",this.name);if(this.type==="image"&&this.$preview.length>0&&(typeof n.type!="undefined"?n.type.match("image.*"):n.name.match(/\.(gif|png|jpe?g)$/i))&&typeof FileReader!="undefined"){var r=new FileReader,i=this.$preview,s=this.$element;r.onload=function(e){i.html('<img src="'+e.target.result+'" '+(i.css("max-height")!="none"?'style="max-height: '+i.css("max-height")+';"':"")+" />"),s.addClass("fileupload-exists").removeClass("fileupload-new")},r.readAsDataURL(n)}else this.$preview.text(n.name),this.$element.addClass("fileupload-exists").removeClass("fileupload-new")},clear:function(e){this.$hidden.val(""),this.$hidden.attr("name",this.name),this.$input.attr("name","");if(navigator.userAgent.match(/msie/i)){var t=this.$input.clone(!0);this.$input.after(t),this.$input.remove(),this.$input=t}else this.$input.val("");this.$preview.html(""),this.$element.addClass("fileupload-new").removeClass("fileupload-exists"),e&&(this.$input.trigger("change",["clear"]),e.preventDefault())},reset:function(e){this.clear(),this.$hidden.val(this.original.hiddenVal),this.$preview.html(this.original.preview),this.original.exists?this.$element.addClass("fileupload-exists").removeClass("fileupload-new"):this.$element.addClass("fileupload-new").removeClass("fileupload-exists")},trigger:function(e){this.$input.trigger("click"),e.preventDefault()}},e.fn.fileupload=function(n){return this.each(function(){var r=e(this),i=r.data("fileupload");i||r.data("fileupload",i=new t(this,n)),typeof n=="string"&&i[n]()})},e.fn.fileupload.Constructor=t,e(document).on("click.fileupload.data-api",'[data-provides="fileupload"]',function(t){var n=e(this);if(n.data("fileupload"))return;n.fileupload(n.data());var r=e(t.target).closest('[data-dismiss="fileupload"],[data-trigger="fileupload"]');r.length>0&&(r.trigger("click.fileupload"),t.preventDefault())})}(window.jQuery)
    </script>
    <script>
        $(document).ready(function () {
            $('.deleteImage').click(function(){
                var $imageId = $(this).attr('data-image');
                $.post('/getImage/' + $imageId, function (data) {
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
                var $fileId = $(this).attr('data-file');
                $.post('/getFile/' + $fileId, function (data) {
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