@extends('admin.admin_master')
@section('admin_content')
    <!-- DataTables -->
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Product Page</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('product.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light"
                                style="float: right;"> Add Product</a><br>
                            <h4 class="card-title">Product All Data</h4>

                            <table id="complex-header-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Product Name</th>
                                        <th>Product Supplier</th>
                                        <th>Product Unit</th>
                                        <th>Product Category</th>
                                        <th>Product Quantity</th>
                                        <th>Status</th>
                                        {{-- <th>Who Create</th> --}}
                                        {{-- <th>Who Update</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($products as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            {{-- <td>{{ $item->supplier_id }}</td> --}}
                                            <td>{{ $item['supplier']['name'] ?? 'N/A' }}</td>
                                            {{-- <td>{{ $item->unit_id }}</td> --}}
                                            <td>{{ $item['unit']['unit_name'] ?? 'N/A' }}</td>
                                            {{-- <td>{{ $item->category_id }}</td> --}}
                                            <td>{{ $item['category']['name'] ?? 'N/A' }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            {{-- 
                                                <td>{{ $item->created_by }}</td>
                                                <td>{{ $item->updated_by }}</td>
                                             --}}
                                            @if ($item->status == 1)
                                                <td><span class="badge bg-success">Active</span></td>
                                            @else
                                                <td><span class="badge bg-danger">Inactive</span></td>
                                            @endif

                                            <td style="background-color:rgb(116, 132, 142)">
                                                <div class="col-sm-3"><a href="{{ route('product.edit', $item->id) }}"
                                                        class="btn sm">
                                                        <i class="fas fa-edit" style="color: rgb(206, 193, 5)"></i> </a>
                                                </div>
                                                <div class="col-sm-3"><a href="{{ route('product.delete', $item->id) }}"
                                                        id="delete" class="btn sm">
                                                        <i class="fas fa-trash-alt" style="color: red"></i></a></div>
                                                <div class="col-sm-3"></div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>


    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>
    <!-- Datatable init js -->
    <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>
@endsection
