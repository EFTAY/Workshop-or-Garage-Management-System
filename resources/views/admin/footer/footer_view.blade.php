@extends('admin.admin_master')
@section('admin_content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="text-center">Footer Page</h4>
                            <hr>
                            <form method="post" action="{{ route('footer.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $footerSetup->id }}">

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Number</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="number"
                                            value="{{ $footerSetup->number }}">
                                    </div>
                                </div>{{-- end row --}}

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Short Description</label>

                                    <div class="col-sm-10">
                                        <textarea required="" name="description" type="text" placeholder="" value="" class="form-control"
                                            rows="5">{{ $footerSetup->description }}</textarea>
                                    </div>
                                </div>{{-- end row --}}
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="address"
                                            value="{{ $footerSetup->address }}">
                                    </div>
                                </div>{{-- end row --}}
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="email"
                                            value="{{ $footerSetup->email }}">
                                    </div>
                                </div>{{-- end row --}}
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="facebook"
                                            value="{{ $footerSetup->facebook }}">
                                    </div>
                                </div>{{-- end row --}}
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="twitter"
                                            value="{{ $footerSetup->twitter }}">
                                    </div>
                                </div>{{-- end row --}}
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Copyright</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" placeholder="" name="copyright"
                                            value="{{ $footerSetup->copyright }}">
                                    </div>
                                </div>{{-- end row --}}
                                <div class="row mb-3">
                                    <button class="btn btn-info" type="submit">Update
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
