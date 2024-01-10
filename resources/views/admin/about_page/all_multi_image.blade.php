@extends('admin.admin_master')
@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Multi Image All</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Multi Image All</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>About Multi Image </th>
                                        <th>Action </th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($allImages as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><img src="{{ asset($item->multi_image) }}"
                                                    style="height: 40px; width: 70px;" alt=""> </td>
                                            <td>
                                                <a href="{{ route('edit.multi.image', $item->id) }}"
                                                    class="btn btn-warning sm"> <i class="fas fa-edit"></i>Edit</a>
                                                <a href="{{ route('delete.multi.image', $item->id) }}" id="delete"
                                                    class="btn btn-danger sm"><i class="fas fa-trash-alt"></i>Delete</a>
                                            </td>
                                        </tr>
                                        {{-- todo --}}
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
