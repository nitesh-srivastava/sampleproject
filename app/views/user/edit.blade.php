@extends('layout.default')
@section('content')
<div class="alert alert-info" role="alert">
    Edit existing user detail
</div>
<div>
    {{ Form::open(array('route'=> 'user.store')) }}
    <div class="form-group">
        {{ Form::label('username','Username:') }}
        {{ Form::text('username') }}
    </div>
    <div class="form-group">
        {{ Form::label('email','Email:') }}
        {{ Form::text('email') }}
    </div>
    <div class="form-group">
        {{ Form::label('contact','Contact:') }}
        {{ Form::number('contact') }}
    </div>
    <div class="form-group">
        {{ Form::submit('Register user') }}
    </div>
    {{ Form::close() }}
</div>
@stop

