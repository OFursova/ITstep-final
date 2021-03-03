@extends('admin.main')

@section('content')
<div class="container d-flex justify-content-between align-items-center">
    <h1 class="text-center">Users</h1>
</div>
    <table class="table w-75 mx-auto" id="dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Ban</th>
                <th class="text-center"><i class="fas fa-pencil-alt"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="{{asset($item->avatar)}}" style="width: 70px;" alt="{{$item->name}}"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->roles->pluck('name')->join(',')}}</td>
                <td class="text-center">@if ($item->ban)
                    <i class="fas fa-check-circle"></i>
                @endif</td>
                <td><a href="/admin/permits/{{$item->id}}" class="btn btn-warning my-1">Set changes</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
    $(document).ready(function(){
        $('#dataTable').DataTable();
    });
    </script>
@endsection