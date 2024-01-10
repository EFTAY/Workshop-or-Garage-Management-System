@extends('admin.admin_master')
@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="text-center">Add Blog Category Page</h4>
                            <hr>
                            <form method="post" action="{{ route('update.blog.category') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $blog->id }}">

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label"> Blog Category Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="blog_category"
                                            value="{{ $blog->blog_category }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <button class="btn btn-info" type="submit">Update Blog Category
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
