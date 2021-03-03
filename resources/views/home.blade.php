@extends('layouts.app')

@section('content')
<h1 class="my-2 text-center">Welcome!</h1>
@if (Auth::user()->ban)
        <div class="alert alert-danger w-75 mx-auto" role="alert">You are banned!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif
@endsection

@section('js')
    <script>
    $().alert('close')
    </script>
@endsection
