@extends('layouts.app')

@section('content')
    <table class="table table-bordered table-hover">
        <tr class="active">
            <th>Name</th>
            <th>Email</th>
            <th>Last login</th>
            <th>Instructor</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
        <tr class={{$user->is_blocked === 1 ? 'danger' : $user->is_accepted === 1 ? 'warning' : 'succes'}}>
            <td style="cursor:pointer" class='clickable-row' data-href={{url('/user/' . $user->id)}}>
              {{ $user->name . ' ' . $user->surname}}
            </td>
            <td style="cursor:pointer" class='clickable-row' data-href={{url('/user/' . $user->id)}}>
              {{ $user->email }}
            </td>
            <td style="cursor:pointer" class='clickable-row' data-href={{url('/user/' . $user->id)}}>
              {{ $user->last_login_at == '0000-00-00 00:00:00' ? 'never' : Carbon\Carbon::parse($user->last_login_at)->diffForHumans() }}
            </td>
            <td>
                <form action="{{ url('/action/instructorChange/' . $user->id) }}" method="POST">
                  {{ csrf_field() }}
                  <select name="instructor">
                    <option {{$user->instructor == ''?'selected':''}} value="">Выберите инструктора</option>
                    @foreach(app\User::on('mysql_auth')->where('role', '=', 'instructor')->get() as $instructor)
                      <option {{$user->instructor == $instructor->email?'selected':''}} value={{$instructor->email}}>{{$instructor->name}}</option>
                    @endforeach
                  </select>
                  <input type="submit" value="Change" class="btn btn-sm btn-success">
                </form>
            </td>
            <td class="col-md-1">
              @if($user->is_blocked === 1)
                <form action="{{ url('/action/unblock/' . $user->id) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" value="Unblock" class="btn btn-sm btn-success">
                </form>
              @else
                <form action="{{ url('/action/block/' . $user->id) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" value="Block" class="btn btn-sm btn-danger">
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
