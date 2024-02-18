@extends('admin.admin_master')
@section('admin_content')
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body ">

                            <h4 class="text-center">Edit Customer Page</h4>
                            <hr>
                            <form method="post" id="myForm" action="{{ route('customer.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $customer->id }}">

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <h4 class="card-title">
                                            Customer All Data </h4>
                                    </div>
                                </div>

                                <div class="row mb-3">

                                    <label for="" class="col-sm-2 col-form-label">Customer Name</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="name"
                                            value="{{ $customer->name }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Customer Mobile</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="mobile_no"
                                            value="{{ $customer->mobile_no }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Customer Email</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="email"
                                            value="{{ $customer->email }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Customer Address</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="address"
                                            value="{{ $customer->address }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Customer Image</label>

                                    <div class="form-group col-sm-10">
                                        <input class="form-control" name="c_image" type="file" placeholder=""
                                            id="image">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label"></label>

                                    <div class="col-sm-10">
                                        {{-- <img id="showImage" class="rounded avatar-lg" alt="200x200"
                                            src="{{ asset('upload/no_image.jpg') }}" data-holder-rendered="true"> --}}
                                        <img id="showImage" class="rounded avatar-lg" alt="200x200"
                                            src="{{ !empty($customer->c_image) ? asset($customer->c_image) : asset('upload/no_image.jpg') }}"
                                            data-holder-rendered="true">
                                        {{-- <img class="rounded avatar-lg" alt="200x200"
                                            src="{{ asset($editData->profile_image) }}" data-holder-rendered="true"> --}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-info btn-rounded waves-effect waves-light" style="float: right;"
                                        type="submit">Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result); //attr=attribute
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    mobile_no: {
                        required: true,
                    },

                    email: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please Enter Name",
                    },
                    mobile_no: {
                        required: "Please Enter Mobile",
                    },

                    email: {
                        required: "Please Enter Email",
                    },
                    address: {
                        required: "Please Enter Address",
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invaild-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
