@extends('layout.main')

@section('title', 'Contact - Create')

@section('content')

<main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf 
                @method("POST")
                @include('contacts._form')
            </form>
        </div>
      </div>
    </div>
  </main>

@endsection