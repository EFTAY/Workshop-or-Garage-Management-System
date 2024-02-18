@extends('admin.admin_master')
@section('admin_content')
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body ">

                            <h4 class="text-center">Add Unit Page</h4>
                            <hr>
                            <form id="myForm" method="post" action="{{ route('unit.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <h4 class="card-title">
                                            Unit Data All</h4>
                                    </div>
                                </div>
                                <div class="row mb-3">

                                    <label for="" class="col-sm-2 col-form-label">Unit Name</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="unit_name"
                                            value="">
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Status</label>
                                    <div class="form-group col-sm-10">
                                        <select class="selectpicker form-control " data-style="btn-outline-secondary btn-lg"
                                            title="Not Chosen" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                </div> --}}
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    unit_name: {
                        required: true,
                    },

                },
                messages: {
                    unit_name: {
                        required: "Kindly Enter Unit Name",
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
