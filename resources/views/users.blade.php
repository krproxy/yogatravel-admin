@extends('layouts.app')

@section('content')
    <table class="table table-bordered table-hover">
        <tr class="active">
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
        <tr class={{$user->is_blocked === 1 ? 'danger' : $user->is_accepted === 1 ? 'warning' : 'succes'}}>
            <td style="cursor:pointer" class='clickable-row' data-href={{url('/user/' . $user->id)}}>
              {{ $user->name }}
            </td>
            <td style="cursor:pointer" class='clickable-row' data-href={{url('/user/' . $user->id)}}>
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
        @endforeach
    </table>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
  });
</script>

{{ $users->links() }}
@endsection
