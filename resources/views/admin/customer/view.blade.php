@extends('admin.admin_master')
@section('admin_content')
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>

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
                        <h4 class="mb-sm-0">Customer Page</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('customer.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light"
                                style="float: right;"> Add Customer</a><br>
                            <h4 class="card-title">Customer All Data</h4>

                            <table id="complex-header-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Customer Image</th>
                                        <th>Customer Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        {{-- <th>Who Create</th> --}}
                                        {{-- <th>Who Update</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($customer as $key => $item)
                                        <tr>

                                            <td>{{ $key + 1 }}</td>
                                            <td><img id="showImage"
                                                    src="{{ !empty($item->c_image) ? asset($item->c_image) : asset('upload/no_image.jpg') }}"
                                                    style="width:60px; height:50px" alt=""></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->mobile_no }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->address }}</td>
                                            {{-- <td>{{ $item->created_by }}</td> --}}
                                            {{-- <td>{{ $item->updated_by }}</td> --}}

                                            <td>
                                                <div class="col-sm-3"><a href="{{ route('customer.edit', $item->id) }}"
                                                        class="btn btn-warning">
                                                        <i class="fas fa-edit"></i> </a>
                                                </div>
                                                <div class="col-sm-3"><a href="{{ route('customer.delete', $item->id) }}"
                                                        id="delete" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i></a></div>
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

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result); //attr=attribute
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script> --}}
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

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
