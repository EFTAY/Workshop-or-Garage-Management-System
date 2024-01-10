@extends('admin.admin_master')
@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Blog Category All</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Blog Category All Data</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Blog Category Name</th>
                                        <th>Action</th>
                                </thead>


                                <tbody>
                                    {{-- @php
                                        $i = 1;
                                    @endphp --}}
                                    {{-- todo $key is update version --}}

                                    @foreach ($blogcategory as $key => $item)
                                        <tr>
                                            {{-- <td>{{ $i++ }}</td> --}}
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->blog_category }}</td>
                                            <td>
                                                <a href="{{ route('edit.blog.category', $item->id) }}"
                                                    class="btn btn-warning sm"> Edit
                                                    <i class="fas fa-edit"></i> </a>

                                                <a href="{{ route('delete.blog.category', $item->id) }}" id="delete"
                                                    class="btn btn-danger sm">
                                                    Delete <i class="fas fa-trash-alt"></i></a>

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
