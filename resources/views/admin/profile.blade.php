@extends('admin.admin_master')
@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                {{-- <img class="rounded-circle avatar-xl" alt="200x200"
                                    src="{{ asset($adminData->profile_image) }}" data-holder-rendered="true"> --}}
                                <img class="rounded-circle avatar-xl" alt="200x200"
                                    src="{{ !empty($adminData->profile_image) ? asset($adminData->profile_image) : asset('upload/no_image.jpg') }}"
                                    data-holder-rendered="true">
                            </center>
                            <hr>
                        </div>
                        <div class="card-body">

                            <h4>Name: {{ $adminData->name }}</h4>
                            <hr>
                            <h4>User Name: {{ $adminData->username }}</h4>
                            <hr>
                            <h4>Email: {{ $adminData->email }}</h4>
                            <hr>
                            <a href="{{ route('edit.profile') }}"
                                class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
