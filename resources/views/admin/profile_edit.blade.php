@extends('admin.admin_master')
@section('admin_content')
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js') }}"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="text-center">Edit Profile Page</h4>
                            <hr>
                            <center>
                                <img class="rounded-circle avatar-xl" alt="200x200"
                                    src="{{ !empty($editData->profile_image) ? asset($editData->profile_image) : asset('upload/no_image.jpg') }}"
                                    data-holder-rendered="true">
                            </center>
                            <hr>
                            <form action="{{ route('store.profile') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="name" id="name"
                                            value="{{ $editData->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="username"
                                            id="username" value="{{ $editData->username }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" placeholder="" name="email"
                                            id="email" value="{{ $editData->email }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Profile Image</label>

                                    <div class="col-sm-10">
                                        <input class="form-control" name="profile_image" type="file" placeholder=""
                                            id="image">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Profile Image</label>

                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" alt="200x200"
                                            src="{{ !empty($editData->profile_image) ? asset($editData->profile_image) : asset('upload/no_image.jpg') }}"
                                            data-holder-rendered="true">
                                        {{-- <img class="rounded avatar-lg" alt="200x200"
                                            src="{{ asset($editData->profile_image) }}" data-holder-rendered="true"> --}}
                                    </div>
                                </div>
                                <center>
                                    <input type="submit" class="btn btn-info  waves-effect waves-light ">
                                </center>

                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result); //attr=attribute
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
