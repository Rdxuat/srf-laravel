@extends('admin.layout.app')
@section('title', 'Account Setting')
@section('content')
    <main>
        <div class="container-fluid site-width">
            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0">{{ $title }}</h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><a href="#">{{ $title }}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <div id="cmn-respns"></div>

            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 col-lg-12 mt-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{ $heading }}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form method="POST" action="{{ route('changePassword') }}">@csrf
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Current
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control " name="current_password"
                                                        id="current_password" placeholder="Old Password" required>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">New Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" name="new_password"
                                                        id="password" placeholder="New Password" required>
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Confirm
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control"
                                                        name="new_password_confirmation" id="password_confirmation"
                                                        placeholder="Confirm Password" required>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <!-- END: Card DATA-->
        </div>
    </main>

@endsection
