@extends('layout.main')

@section('title', 'Verify Email')

@section('content')
<main class="py-5">
    <div class="container">
        <h1 class="h5 mb-3">
            Welcome
            <small class="text-muted">{{ auth()->user()->name }}</small>
        </h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                        Verification link has been sent to your email
                    </div>
                    @endif
                    <div class="card-body">
                        <p class="mb-0"><strong>Thanks for signing up!</strong> Before getting started, please
                            verify your email address by clicking on the link we just emailed to you.</p>
                        <p class="mb-0">If you didn't receve the email, we will gladly send you another.</p>
                        <form action="{{ route('verification.send') }}" method="POST">
                            @csrf 
                            @method("POST")
                            <button class="btn btn-secondary mt-3">Resend email verification</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection