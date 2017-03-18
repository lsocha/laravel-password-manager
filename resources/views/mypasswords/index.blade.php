@extends('layouts.default')
 
@section('content')

<script>
$(document).ready(function() {
    var table = $('#passwords_table').DataTable({
        "paging": false
    });
    $('#search-inp').on('keyup',function(){
      table.search($(this).val()).draw() ;
    });
} );
</script>
<style>
#passwords_table_filter {
    display:none;
}

#passwords_table_length {
    display: none;
}

#passwords_table_info {
    display: none;
}
</style>

    <div class="row">
            <div class="col-md-6 text-left">
                <h2>Password Manager</h2>
            </div>
            <div class="col-md-6 text-right input-group">
                <input class="form-control" style="margin-right:10px" type="search" id="search-inp" placeholder="Type to search"/>
                <a class="btn btn-success" href="{{ route('mypasswords.create') }}"> Add new</a>
            </div>
    </div>

    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif

    <table id="passwords_table" class="display table" width="100%" cellspacing="0">
    <thead class="thead-default">
        <tr>
            <th>Page</th>
            <th>Login</th>
            <th>Password</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($passwords as $key => $password)
    <tr>
        <td>{{ str_limit($password->page, $limit = 20, $end = '...') }}</td>
        <td>{{ str_limit($password->login, $limit = 20, $end = '...') }}</td>
        <td type="password">{{ str_limit($password->password, $limit = 20, $end = '...') }}</td>
        <td>{{ str_limit($password->description, $limit = 20, $end = '...') }}</td>
        <td class="text-right">
            <a class="btn btn-info" href="{{ route('mypasswords.show',$password->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('mypasswords.edit',$password->id) }}">Edit</a>
            {{ Form::open(['method' => 'DELETE','route' => ['mypasswords.destroy', $password->id],'style'=>'display:inline']) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>

@endsection

