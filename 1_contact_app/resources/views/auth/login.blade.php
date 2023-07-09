@extends('layout.main')

@section('title', 'Login')

@section('content')

<div class="auth-wrapper d-flex bg-light">
    <div class="col-md-4 m-auto">
        <div class="bg-white shadow-sm">
            <h1 class="border-bottom p-4">Login</h1>

            <div class="px-4 pt-4">

                <form action="{{ route('login') }}" method="POST">
                    @csrf 
                    @method("POST")
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" />
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" />
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label text-black-50" for="customCheck1">Remember me</label>
                        </div>
                        <a href="{{ route('password.request') }}">Forget your password?</a>
                    </div>
                    <div class="mt-4 d-grid">
                        <button type="submit" class="btn btn-block btn-primary">Login</button>
                        <div class="text-center py-4 text-muted">
                            Don't have account?
                            <a href="{{ route('register') }}"
                                class="text-muted font-weight-bold text-decoration-none">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection