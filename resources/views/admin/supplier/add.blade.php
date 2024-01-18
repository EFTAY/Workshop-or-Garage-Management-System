@extends('admin.admin_master')
@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="text-center">Add Supplier Page</h4>
                            <hr>
                            <form method="post" action="{{ route('supplier.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    {{-- <label for="" class="col-sm-2 col-form-label">Blog Data All </label> --}}
                                    <div class="col-sm-10">
                                        <h4 class="card-title">Blog Data All</h4>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="" name="name"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Supplier Mobile</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="" name="mobile_no"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Supplier Email</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="" name="email"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Supplier Address</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="" name="address"
                                            value="" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Supplier Status</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="" name="status"
                                            value="" required>
                                    </div>
                                    <div class="row mb-3 float-right">
                                        <button class="col-sm-2 btn btn-info " type="submit">Insert
                                        </button>
                                    </div>
                                </div>



                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
