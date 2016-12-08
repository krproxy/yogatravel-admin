@extends('layouts.app')

@section('content')
<table class="table table-bordered table-hover">
    <tr class="active">
        <th>Показатель</th>
        <th>Всего в система</th>
        <th>Ваши ученики</th>
    </tr>
    
    @foreach($site_statistic as $key => $value)
      <tr>
        <td>
          {{ $key }}
        </td>
        <td>
          {{ $value['all'] }}
        </td>
        <td>
          {{ $value['own'] }}
        </td>
      </tr>
    @endforeach    
</table>
@endsection
