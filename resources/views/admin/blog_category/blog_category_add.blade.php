@extends('admin.admin_master')
@section('admin_content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="text-center">Add Blog Category Page</h4>
                            <hr>
                            <form method="post" id="myForm" action="{{ route('store.blog.category') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label"> Blog Category Name</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" name="blog_category"
                                            id="example-text-input">
                                        {{-- Custom Validation --}}
                                        {{-- @error('blog_category')
                                            <span class="text-danger">{{ $message }} *</span>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <button class="btn btn-info" type="submit">Insert Blog Category
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
                    blog_category: {
                        required: true,
                    },
                },
                messages: {
                    blog_category: {
                        required: "Please enter a blog category name",
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
