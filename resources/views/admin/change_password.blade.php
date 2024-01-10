@extends('admin.admin_master')
@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="text-center">Edit Password Page</h4>
                            <hr>
                            @php
                                $id = Auth::user()->id;
                                $image = App\Models\User::find($id);
                            @endphp
                            <center>
                                <img class="rounded-circle avatar-xl" alt="200x200"
                                    src="{{ !empty($image->profile_image) ? asset($image->profile_image) : asset('upload/no_image.jpg') }}"
                                    data-holder-rendered="true">
                            </center>
                            <hr>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                                @endforeach
                            @endif

                            <form action="{{ route('update.password') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="oldpassword" id="oldpassword"
                                            value="" placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" placeholder="New Password"
                                            name="newpassword" id="newpassword" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" placeholder="Confirm Password"
                                            name="confirm_password" id="confirm_password" value="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12"><button class="btn btn-info waves-effect waves-light "
                                            type="submit">Change
                                            Password</button></div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
