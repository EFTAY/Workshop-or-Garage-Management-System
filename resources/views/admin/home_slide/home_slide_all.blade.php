@extends('admin.admin_master')
@section('admin_content')
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="text-center">Home Slide Page</h4>
                            <hr>
                            <form method="post" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $homeslide->id }}">

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="title"
                                            value="{{ $homeslide->title }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="short_title"
                                            value="{{ $homeslide->short_title }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Video URL</label>

                                    <div class="col-sm-10">
                                        <input class="form-control" name="video_url" type="text" placeholder=""
                                            value="{{ $homeslide->video_url }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Slider Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" placeholder="" name="image"
                                            id="images" value="{{ $homeslide->image }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label"> </label>

                                    <div class="col-sm-10">
                                        <img id="showImage" name="image" class="rounded avatar-lg" alt="200x200"
                                            src="{{ !empty($homeslide->image) ? asset($homeslide->image) : asset('upload/no_image.jpg') }}"
                                            data-holder-rendered="true">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <button class="btn btn-info" type="submit">Update
                                        Slide</button>
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
