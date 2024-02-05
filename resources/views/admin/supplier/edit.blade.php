@extends('admin.admin_master')
@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="text-center">Edit Supplier Page</h4>
                            <hr>
                            <form method="post" action="{{ route('supplier.update') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $supplier->id }}">

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
                                            value="{{ $supplier->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Supplier Mobile</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="" name="mobile_no"
                                            value="{{ $supplier->mobile_no }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Supplier Email</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="" name="email"
                                            value="{{ $supplier->email }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Supplier Address</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="" name="address"
                                            value="{{ $supplier->address }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Supplier Status</label>
                                    <div class="col-sm-6">
                                        <select class=" form-control " data-style="btn-outline-secondary btn-lg"
                                            title="Not Chosen" name="status" required>
                                            <option value="1" {{ $supplier->status == 1 ? 'Selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $supplier->status == 0 ? 'Selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>

                                </div>
                                {{-- <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Supplier Status</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" placeholder="" name="status"
                                            value="{{ $supplier->status }}">
                                    </div>

                                </div> --}}
                                <div class="row mb-3 float-right">
                                    <button class="col-sm-2 btn btn-info " type="submit">Update
                                    </button>
                                </div>


                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
