@extends('admin.main')

@section('content')
<div class="container d-flex justify-content-between align-items-center">
    <h1 class="text-center">Roles</h1>
</div>
    <table class="table w-75 mx-auto" id="dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Role</th>
                <th>Permissions</th>
                <th class="text-center"><i class="fas fa-pencil-alt"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->permissions->pluck('name')->join(',')}}</td>
                <td><a href="/admin/roles" class="btn btn-warning my-1">Add role</a></td>
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