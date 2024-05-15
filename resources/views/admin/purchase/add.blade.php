@extends('admin.admin_master')
@section('admin_content')
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body ">

                            <h4 class="text-center">Add Purchase Page</h4>
                            <hr>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Date</label>
                                        <input class="form-control" type="date" name="date" id="date">
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
                                            <option selected disabled value="">Select Product</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label"
                                            style="margin-top: 43px;"></label>

                                        <i
                                            class="btn btn-info btn-rounded waves-effect waves-light fas fa-plus-circle addevenmore">Add
                                            More</i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- --------------------------------------- --}}

                        <div class="card-body">
                            <form action="{{ route('purchase.store') }}" method="post">
                                @csrf
                                <table class="table-sm table-bordered" width="100%" style="border-color: #ddd">
                                    <thead>
                                        <tr>
                                            <th>
                                                Category
                                            </th>
                                            <th>
                                                Product Name
                                            </th>
                                            <th>
                                                PSC/KG
                                            </th>
                                            <th>
                                                Unit Price
                                            </th>
                                            <th>
                                                Description
                                            </th>
                                            <th>
                                                Total Price
                                            </th>
                                            <th>
                                                Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody id="addRow" class="addRow">


                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td>
                                                <input type="text" name="estimated_amount" value="0"
                                                    id="estimated_amount" class="form-control estimated_amount" readonly
                                                    style="background-color:#ddd">
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div class="from-group">
                                    <button type="submit" class="btn btn-info " id="storeButton">Purchase Store</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    {{-- ajax start --}}

    <script type="text/x-handlebars-template" id="document-template">
        <tr class="delete_add_more_item" id="delete_add_more_item">

            <input type="hidden" name="date[]" value="@{{ date }}">
            <input type="hidden" name="purchase_no[]" value="@{{ purchase_no }}">
            <input type="hidden" name="supplier_id[]" value="@{{ supplier_id }}">
            <td> <input type="hidden" name="category_id[]" value="@{{ category_id }}">@{{ category_name }}</td>
            <td> <input type="hidden" name="product_id[]" value="@{{ product_id }}">@{{ product_name }}</td>
            <td> 
                <input type="number" min="1" class="form-control buying_quantity text-right" name="buying_quantity[]"
                value="">
            </td>
            <td> <input type="number" min="1" class="form-control unit_price text-right" name="unit_price[]"
                value="">
            </td>
            
            <td> <input type="text" class="form-control" name="description[]"></td>
            <td> <input type="number" min="1" class="form-control buying_price text-right" name="buying_price[]"
                value="0" readonly>
            </td>
            <td><i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i></td>
        </tr>
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("click", ".addevenmore", function() {
                var date = $('#date').val();
                var purchase_no = $('#purchase_no').val();
                var supplier_id = $('#supplier_id').val();
                var category_id = $('#category_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();
                if (date == '') {
                    $.notify("Date is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (purchase_no == '') {
                    $.notify("Purchase No is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (supplier_id == '') {
                    $.notify("Supplier is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (category_id == '') {
                    $.notify("Category is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (product_id == '') {
                    $.notify("Product is Required", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var data = {
                    date: date,
                    purchase_no: purchase_no,
                    supplier_id: supplier_id,
                    category_id: category_id,
                    category_name: category_name,
                    product_id: product_id,
                    product_name: product_name
                };
                var html = template(data);
                $('#addRow').append(html);
            });
            $(document).on("click", ".removeeventmore", function(event) {
                $(this).closest(".delete_add_more_item").remove();
                totalAmount();

            });
            $(document).on('keyup click', '.buying_quantity, .unit_price', function() {
                var buying_quantity = $(this).closest("tr").find("input.buying_quantity").val();
                var unit_price = $(this).closest("tr").find("input.unit_price").val();
                var total = buying_quantity * unit_price;
                $(this).closest("tr").find("input.buying_price").val(total);
                totalAmount();
            });

            function totalAmount() {
                var sum = 0;
                $(".buying_price").each(function() {
                    var value = $(this).val();
                    if (!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });
                $('#estimated_amount').val(sum);
            }
        });
    </script>


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
    <script type="text/javascript">
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get.product') }}",
                    type: "GET",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        var html = '<option value="">Select Product</option>';
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.id + '">' + v
                                .name + '</option>';
                        });
                        $('#product_id').html(html);

                    }
                });
            });
        });
    </script>
@endsection
