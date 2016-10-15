@extends('layouts.app')

@section('content')
<form action="{{url('/findPost')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <button type="submit" class="btn btn-default">Find</button>
    <hr/>
</form>
<script>
    $(function () {
        var availableTags = {!! $yogaEmails !!};
        $("#email").autocomplete({
            source: availableTags
        });
    });
</script>
@endsection
