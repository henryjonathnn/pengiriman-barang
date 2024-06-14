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
            <h4>New here?</h4>
            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
            <form action="{{ route('register.store') }}" method="post" class="pt-3">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Masukkan Nama" value="{{ old ('name') }}">
              </div>
              @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
              <div class="form-group">
                <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="Masukkan Email" value="{{old ('email') }}">
              </div>
              @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Masukkan Password">
              </div>
              @if ($errors->has('password'))
              <span class="text-danger">{{ $errors->first('password') }}</span>
              @endif
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" name="password_confirmation" id="password_confirmation" placeholder="Masukkan Password Lagi">
              </div>
              @if ($errors->has('password_confirmation'))
              <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
              @endif
              <div class="form-group">
                <div class="incheck-primary">
                  <input type="checkbox" id="agreeTerms" name="terms", value="agree">
                  <label for="agreeTerms">
                    I agree to the <a href="#">terms</a>
                  </label>
                </div>
              </div>
              <div class="mt-3">
                <input type="submit" class="btn btn-primary" value="Register">
              </div>
              <div class="text-center mt-4 font-weight-light">
                Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
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