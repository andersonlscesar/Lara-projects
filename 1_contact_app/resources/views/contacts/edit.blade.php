@extends('layout.main')

@section('Edit', $contact->first_name)

@section('content')

<main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
            <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                @csrf 
                @method("PUT")
                @include('contacts._form')
            </form>
        </div>
      </div>
    </div>
  </main>


@endsection