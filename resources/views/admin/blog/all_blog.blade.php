@extends('admin.admin_master')
@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Blog Page</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Blog All Data</h4>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Blog Category</th>
                                        <th>Blog Title</th>
                                        <th>Blog Tags</th>
                                        <th>Blog Description</th>
                                        <th>Blog Image</th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($allBlog as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item['category']['blog_category'] }}</td>
                                            <td>{{ $item->blog_title }}</td>
                                            <td>{{ $item->blog_tag }}</td>
                                            <td>{!! $item->blog_description !!}</td>
                                            <td><img src="{{ asset($item->blog_image) }}" style="height: 60px; width: 90px;"
                                                    alt=""> </td>
                                            <td>
                                                <a href="{{ route('blog.edit', $item->id) }}" class="btn btn-warning sm">
                                                    Edit <i class="fas fa-edit"></i> </a>

                                                <a href="{{ route('blog.delete', $item->id) }}" id="delete"
                                                    class="btn btn-danger sm"> Delete <i class="fas fa-trash-alt"></i></a>
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
@endsection
