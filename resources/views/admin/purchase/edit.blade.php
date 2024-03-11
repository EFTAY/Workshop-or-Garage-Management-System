@extends('admin.admin_master')
@section('admin_content')
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body ">

                            <h4 class="text-center">Edit Purchase Page</h4>
                            <hr>
                            <form id="myForm" method="post" action="{{ route('purchase.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $purchase_data->id }}">
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <h4 class="card-title">
                                            Purchase Data All</h4>
                                    </div>
                                </div>
                                <div class="row mb-3">

                                    <label for="" class="col-sm-2 col-form-label">Purchase Name</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="name"
                                            value="{{ $purchase_data->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for=""> Suppliers Name</label>
                                    <div class="form-group col-sm-10">
                                        <select class="selectpicker form-control " data-style="btn-outline-secondary btn-lg"
                                            title="Not Chosen" name="supplier_id">
                                            <option selected disabled value="">Select Suppliers</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}"
                                                    {{ $supplier->id == $purchase_data->supplier_id ? 'selected' : ' ' }}>
                                                    {{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for=""> Units Name</label>
                                    <div class="form-group col-sm-10">
                                        <select class="selectpicker form-control " data-style="btn-outline-secondary btn-lg"
                                            title="Not Chosen" name="unit_id">
                                            <option selected disabled value="">Select Units</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}"
                                                    {{ $unit->id == $purchase_data->unit_id ? 'selected' : ' ' }}>
                                                    {{ $unit->unit_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for=""> Categories Name</label>
                                    <div class="form-group col-sm-10">
                                        <select class="selectpicker form-control " data-style="btn-outline-secondary btn-lg"
                                            title="Not Chosen" name="category_id">
                                            <option selected disabled value="">Select Categories</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $purchase_data->category_id ? 'selected' : ' ' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    unit_id: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    supplier_id: {
                        required: true,
                    },


                },
                messages: {
                    name: {
                        required: "Kindly Enter Purchase Name",
                    },
                    unit_id: {
                        required: "Kindly Select One Unit ",
                    },
                    category_id: {
                        required: "Kindly Select One Category ",
                    },
                    supplier_id: {
                        required: "Kindly Select One Supplier ",
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
