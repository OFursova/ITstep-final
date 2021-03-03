@extends('admin.main')

@section('content')
<div class="container">
    <div class="row py-2">
        <div class="col-12 w-100">
        <h1 class="my-2 text-center">Edit user permissions</h1>
        {{-- Showing error messages in a div on top: --}}
        @include('messages.errors')

        @if (isset($success))
        <div class="alert alert-success">{{$success}}</div>
        @endif
        </div>
    </div>
    <div class="row py-2">
        {!! Form::model($user) !!}
        <div class="form-group">
            {{-- <label for="role_id">Role:
                <select name="role_id" id="role_id" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{$role}}">{{array_search($role)}}</option>
                    @endforeach
                </select>
            </label> --}}
        {!! Form::label('role', 'Role: ') !!}
        {!! Form::select('role', $roles, null, ['class'=>'form-control' . ($errors->has('role') ? ' is-invalid' : '')]) !!}
        @error('role')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
        </div>
        <div class="form-group">
            {!! Form::label('ban', 'Put in BAN: ') !!}
            {!! Form::hidden('ban', 0) !!}
            {!! Form::checkbox('ban', 1) !!}
          </div>
        <button class="btn btn-success">Save Changes</button>
        {!! Form::close() !!}
    </div>
    <a href="/admin" class="btn btn-primary">Back</a>
</div>
@endsection