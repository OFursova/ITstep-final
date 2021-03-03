@extends('layouts.app')

@section('content')
<section class="container">
    <div class="row py-2">
        <div class="col-12 w-100">
        <h1 class="my-2 text-center">Edit Your Profile</h1>
        {{-- Showing error messages in a div on top: --}}
        @include('messages.errors')

        @if (isset($success))
        <div class="alert alert-success">{{$success}}</div>
        @endif
        </div>
    </div>
    <div class="row py-2">
        <div class="col-md-3 w-100">
            {{-- avatar --}}
            <img src="{{asset($user->avatar)}}" alt="{{$user->avatar}}" style="max-height:50vh; min-height:20vh; max-width:90%" class="mx-auto">  
        </div>
        <div class="col-md-9">
            {!! Form::model($user, ['url' => '/cabinet', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('avatar', 'Change avatar: ') !!}
                {!! Form::file('avatar', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email: ') !!}
                {!! Form::email('email', null, ['class'=>'form-control' . ($errors->has('email') ? ' is-invalid' : '')]) !!}
                @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Phone: ') !!}
                {!! Form::text('phone', null, ['class'=>'form-control' . ($errors->has('phone') ? ' is-invalid' : '')]) !!}
                @error('phone')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
                <button class="btn btn-success">Save Changes</button>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection