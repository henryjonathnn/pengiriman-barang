@extends('auth.partials.master')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo">
                            </div>
                            <form action="{{ route('login.check') }}" method="post" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Masukkan Email" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Masukkan Password">
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-primary" value="Login">
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('sweetalert::alert')
@endsection
