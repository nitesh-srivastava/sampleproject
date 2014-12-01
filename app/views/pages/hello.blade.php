

@extends('layout.default')
@section('content')
<div class="jumbotron text-center">
    <h1>Sample Project</h1>
</div>
@if(Session::get('password'))
<div class="alert alert-danger alert-dismissible text-center" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong> {{ Session::get('password')}}</strong>
</div>

@endif



<div class="col-lg-6 col-lg-offset-3 login-outer-container text-center">
    <div class="panel panel-default margin-top-small">
        <div class="panel-heading">
            <h3 class="panel-title text-center">Login</h3>
        </div>
        <div class="panel-body">

            {{ Form::open(array('route'=>'user.login')) }}
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2">
                        {{ Form::label('email','Email:' , $attributes = ['class' => 'line-height-30']) }}
                    </div>
                    <div class="col-lg-10">
                        {{ Form::text('email', '' , $attributes = ['class' => 'form-control','placeholder' => 'Enter email']) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-2">
                        {{ Form::label('password','Password:' , $attributes = ['class' => 'line-height-30']) }}
                    </div>
                    <div class="col-lg-10">
                        {{ Form::password('password', $attributes = ['class' => 'form-control','placeholder' => 'Enter Password']) }}
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-12">
                        {{ $errors->first('password','<span class="text-danger line-height-30">Invalid Credentials</span>') }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4">
                        {{ Form::submit('Submit' , $attributes = ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            
            {{ Form::close() }}

        </div>
    </div>
</div>
@stop
