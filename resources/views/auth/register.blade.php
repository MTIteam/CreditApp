
@extends('layouts.app')
@section('content')
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="auth-form">
                            <div class="text-center mb-3">
                                <a href="index.html"><img src="{{ URL::to('assets/images/logo-full.png') }}" alt=""></a>
                            </div>
                            <h4 class="text-center mb-4">Sign up your account</h4>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Full Nmae</strong></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter full name">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Email</strong></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <input type="hidden" class="image" name="image" value="photo_defaults.jpg">
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Role Name</strong></label>
                                    <select class="form-control default-select wide @error('role_name') is-invalid @enderror" name="role_name" id="role_name">
                                        <option selected disabled>-- Select Role Name --</option>
                                        @foreach ($role as $name)
                                            <option value="{{ $name->role_type }}">{{ $name->role_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Password</strong></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="mb-1"><strong>Repeat Password</strong></label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Choose Repeat Password">
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                </div>
                            </form>
                            <div class="new-account mt-3">
                                <p>Already have an account? <a class="text-primary" href="{{route('login')}}">Sign in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
