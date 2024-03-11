@extends('admin.admin_master')
@section('admin_content')
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body ">

                            <h4 class="text-center">Add Purchase Page</h4>
                            <hr>
                            {{-- <form id="myForm" method="post" action="{{ route('purchase.store') }}"
                                enctype="multipart/form-data">
                                @csrf --}}
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Date</label>
                                        <input class="form-control example-date-input" type="date" name="date"
                                            id="date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Purchase No</label>
                                        <input class="form-control" type="text" name="purchase_no" id="purchase_no">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Supplier
                                            Name</label>
                                        <select class="selectpicker form-control " data-style="btn-outline-secondary btn-lg"
                                            title="Not Chosen" name="supplier_id" id="supplier_id">
                                            <option selected disabled value="">Select Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Category
                                            Name</label>
                                        <select class="selectpicker form-control " data-style="btn-outline-secondary btn-lg"
                                            title="Not Chosen" name="category_id" id="category_id">
                                            <option selected disabled value="">Select Category</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Product
                                            Name</label>
                                        <select class="selectpicker form-control " data-style="btn-outline-secondary btn-lg"
                                            title="Not Chosen" name="product_id" id="product_id">
                                            <option selected disabled value="">Select Product Name</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label"
                                            style="margin-top: 43px;"></label>
                                        <input type="submit" class="btn btn-info btn-rounded waves-effect waves-light"
                                            value="Add More">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#supplier_id', function() {
                var supplier_id = $(this).val();
                $.ajax({
                    url: "{{ route('get.category') }}",
                    type: "GET",
                    data: {
                        supplier_id: supplier_id
                    },
                    success: function(data) {
                        var html = '<option value="">Select Category</option>';
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.category_id + '">' + v
                                .category.name + '</option>';
                        });
                        $('#category_id').html(html);

                    }
                });
            });
        });
    </script>
@endsection
