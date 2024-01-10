@extends('admin.admin_master')
@section('admin_content')
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="text-center">Portfolio Page</h4>
                            <hr>
                            <form method="post" action="{{ route('store.portfolio') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Portfolio Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="portfolio_name" value=""
                                            required>
                                        {{-- @error('portfolio_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror --}}
                                    </div>
                                </div>
                                {{-- end row --}}
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Portfolio Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="portfolio_title"
                                            value="" required>
                                        {{-- @error('portfolio_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror --}}
                                    </div>
                                </div>
                                {{-- end row --}}

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Portfolio
                                        Description</label>

                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="portfolio_description" value=""></textarea>
                                    </div>
                                </div>{{-- end row --}}
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Portfolio Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" accept="image/*" placeholder=""
                                            name="portfolio_image" id="images" value="" required>
                                    </div>
                                </div>
                                {{-- end row --}}
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label"> </label>

                                    <div class="col-sm-10">
                                        <img id="showImage" name="image" class="rounded avatar-lg" alt="200x200"
                                            src="{{ asset('upload/no_image.jpg') }}" data-holder-rendered="true">
                                    </div>
                                </div>{{-- end row --}}

                                <div class="row mb-3">
                                    <button class="btn btn-info" type="submit">Insert
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
