@extends('layouts.login')

@section('content')

 {!! Form::open(array('url'=>'user/create', 'class'=>'form-horizontal form-material', 'parsley-validate'=>'','novalidate'=>' ' ,'id'=>'loginform')) !!}
	    	@if(Session::has('message'))
				{!! Session::get('message') !!}
			@endif
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	
	<div class="text-center db"><h3><img src="{{ asset('assets')}}/plugins/images/admin-logo-dark.png" alt="Home" /><br/>{{ config('tecno.cnf_appname')}} </h3></div>
	<h3 class="box-title m-t-40 m-b-0">Register Now</h3><small>Create your account and enjoy</small> 
	<div class="form-group m-t-20">
	  <div class="col-xs-12">
	    {!! Form::text('username', null, array('class'=>'form-control', 'placeholder'=>Lang::get('core.username') ,'required'=>'' )) !!}
	   
	  </div>
	</div>
	<div class="form-group m-t-20">
	  <div class="col-xs-12">
	  	<div class="row">
		  	<div class="col-xs-6"> 
		    {!! Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>Lang::get('core.firstname') ,'required'=>'' )) !!}
		    </div>
		   <div class="col-xs-6">
		     {!! Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>Lang::get('core.lastname'),'required'=>'')) !!}
		     </div>
		</div>     

	  </div>
	</div>
	<div class="form-group ">
	  <div class="col-xs-12">
	    {!! Form::text('email', null, array('class'=>'form-control', 'placeholder'=>Lang::get('core.email'),'required'=>'email')) !!}
	  </div>
	</div>
	<div class="form-group ">
	  <div class="col-xs-12">

	  	<div class="row">
		  	<div class="col-xs-6"> 
		    {!! Form::password('password', array('class'=>'form-control', 'placeholder'=>Lang::get('core.password'),'required'=>'')) !!}
		    </div>
		   <div class="col-xs-6">
		     {!! Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>Lang::get('core.repassword'),'required'=>'')) !!}
		     </div>
		</div>  


	   
	  </div>
	</div>


	<div class="form-group text-center m-t-20">
	  <div class="col-xs-12">
	    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"> {{ Lang::get('core.signup') }} </button>
	  </div>
	</div>
	<div class="form-group m-b-0">
	  <div class="col-sm-12 text-center">
	    <p>Already have an account? <a href="{{ url('user/login') }}" class="text-primary m-l-5"><b> {{ Lang::get('core.signin') }} </b></a></p>
	  </div>
	</div>
	</form>


<style type="text/css">
	.login-title{
	    color: #32c5d2 ;
	    font-size: 30px;
	    font-weight: 400 !important;
	    text-align: center;
	}
	.box-footer { background: #6c7a8d;  text-align: center; color: #fff; }
	.box-footer a{ color: #fff;  }
</style>
@stop
