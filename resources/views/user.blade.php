@extends('layouts.app')

@section('content')
<table class="table table-bordered table-hover">
    <tr class="active">
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <tr class={{$user->is_blocked === 1 ? 'danger' : $user->is_accepted === 1 ? 'warning' : 'succes'}}>
        <td>
          {{ $user->name }}
        </td>
        <td>
          {{ $user->email }}
        </td>
        <td class="col-md-2">
          @if($user->is_blocked === 1)
            <form action="{{ url('/action/unblock/' . $user->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="submit" value="Unblock" class="btn btn-success">
            </form>
          @else
            <form action="{{ url('/action/block/' . $user->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="submit" value="Block" class="btn btn-danger">
            </form>
          @endif
        </td>
    </tr>
</table>
@endsection
