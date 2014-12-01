@extends('layout.default')
@section('content')
<div class="alert alert-info" role="alert">
    {{ ($method == "put")? 'Update user\'s detail':'Register New User'}}
</div>
<div class='col-xs-6'>

    @if($method == "put")
    {{ Form::open(array('route'=> 'user.update','method'=>'put')) }}
    {{ Form::Input('hidden','_id',$user->id) }}
    @else
    {{ Form::open(array('route'=> 'user.store','method'=>'post')) }}
    @endif
    <div class="form-group">
        <div class="row">
            <div class="col-xs-2 text-right">
                {{ Form::label('username','Username:' , $attributes = ['class' => 'line-height-30']) }}
            </div>
            <div class="col-xs-5">
                {{ Form::text('username',($method == "put")?$user->username:'' , $attributes = ['class' => 'form-control','placeholder' => 'Enter Username']) }}
            </div>
            <div class="col-xs-5">
                {{ $errors->first('username','<span class="text-danger line-height-30">:message</span>') }}
            </div>
            

        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-2 text-right">
                {{ Form::label('email','Email:' , $attributes = ['class' => 'line-height-30']) }}
            </div>
            <div class="col-xs-5">
                {{ Form::text('email', $value = ($method == "put")?$user->email:''  , $attributes = ['class' => 'form-control','placeholder' => 'Email']) }}
            </div>
            <div class="col-xs-5">
                {{ $errors->first('email','<span class="text-danger line-height-30">:message</span>') }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-2 text-right">
                {{ Form::label('contact','Contact:', $attributes = ['class' => 'line-height-30']) }}
            </div>
            <div class="col-xs-5">
                {{ Form::number('contact', $value = ($method == "put")?$user->contact:''  , $attributes = ['class' => 'form-control','placeholder' => 'Enter Contact Number']) }}
            </div>
            <div class="col-xs-5">
                {{ $errors->first('contact','<span class="text-danger line-height-30">:message</span>') }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 text-center">
                {{ ($method == "put") ? Form::submit('Update Detail') :Form::submit('Register user') }}
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@stop

