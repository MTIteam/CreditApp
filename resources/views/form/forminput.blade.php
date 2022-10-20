
@extends('layouts.master')
@section('content')
{{-- message --}}
{!! Toastr::message() !!}

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">Form</a></li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Form Input</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-12">
                            <form>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" placeholder="Name" class="form-control" name="name">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">User ID</label>
                                        <input type="text" class="form-control" name="user_id" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" placeholder="Email" class="form-control">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Join Date</label>
                                        <input type="text" class="form-control" name="join_date" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Phone Number</label>
                                        <input type="tel" placeholder="Phone Number" class="form-control" name="phone_number">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Role Name</label>
                                        <input type="text" class="form-control" name="role_name" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Status</label>
                                        <input type="tel" class="form-control" name="status" readonly>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Position</label>
                                        <input type="text" class="form-control" name="position" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Department</label>
                                        <input type="text" class="form-control" name="department" readonly>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Upload File</label>
                                        <div class="input-group mb-6">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-control" name="upload[]">
                                            </div>
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')

@endsection
@endsection
