@extends('layout.default')
@section('content')
<div class="alert alert-info" role="alert">
    Register New User
</div>
<div>
    {{ Form::open(array('route'=> 'user.store')) }}
    <div class="form-group">
        <div class="row">
            <div class="col-xs-2 text-right">
                {{ Form::label('username','Username:') }}
            </div>
            <div class="col-xs-2">
                {{ Form::text('username') }}
            </div>
            {{ $errors->first('username','<span class="text-danger">:message</span>') }}

        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-2 text-right">
                {{ Form::label('email','Email:') }}
            </div>
            <div class="col-xs-2">
                {{ Form::text('email') }}
            </div>
            {{ $errors->first('email','<span class="text-danger">:message</span>') }}
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-2 text-right">
                {{ Form::label('contact','Contact:') }}
            </div>
            <div class="col-xs-2">
                {{ Form::number('contact') }}
            </div>
            {{ $errors->first('contact','<span class="text-danger">:message</span>') }}
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-2 col-xs-offset-2">
                {{ Form::submit('Register user') }}
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@stop

