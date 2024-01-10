@extends('admin.admin_master')
@section('admin_content')
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #d50909;
            font-weight: 700px;

        }
    </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="text-center">Edit Blog Page</h4>
                            <hr>
                            <form method="post" action="{{ route('blog.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $editBlog->id }}">
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Blog Data All </label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example"
                                            name="blog_category_id">
                                            <option selected disabled>Open this select menu</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}"
                                                    {{ $cat->id == $editBlog->blog_category_id ? 'selected' : ' ' }}>
                                                    {{ $cat->blog_category }}</option>
                                            @endforeach


                                        </select>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Blog Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="blog_title"
                                            value="{{ $editBlog->blog_title }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Blog Tag</label>
                                    <div class="col-sm-10">
                                        <input class="form-control select2-selection__rendered" type="text"
                                            name="blog_tag" value="{{ $editBlog->blog_tag }}" data-role="tagsinput">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Blog
                                        Description</label>

                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="blog_description">{!! $editBlog->blog_description !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Blog Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="blog_image" id="images">
                                    </div>
                                </div>
                                {{-- end row --}}
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label"> </label>

                                    <div class="col-sm-10">
                                        <img id="showImage" name="image" class="rounded avatar-lg" alt="200x200"
                                            src="{{ asset($editBlog->blog_image) }}" data-holder-rendered="true">
                                    </div>
                                </div>{{-- end row --}}

                                <div class="row mb-3">
                                    <button class="btn btn-info" type="submit">Update Blog
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#images').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result); //attr=attribute
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
