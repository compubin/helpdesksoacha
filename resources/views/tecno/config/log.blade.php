@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ $pageTitle }} <small> {{ $pageNote }} </small> </h4> 
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
	      <ol class="breadcrumb">
	        <li><a href="{{ url('dashboard') }}"> Home</a></li>
	        <li><a href="{{ url('tecno/config') }}"> Configuration</a></li>
	        <li  class="active"> Configuration </li>
	      </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>

    <div class="row">
        <div class="white-box">
			@include('tecno.config.tab')	
			  
			{!! Form::open(array('url'=>'config/email/', 'class'=>'form-vertical row')) !!}
			
			<div class="col-sm-6 m-t">
			

				
				  <div class="form-group">
					<label for="ipt" class=" control-label"> Template Cache </label>		
						
				  </div>  
				  
				<div class="form-group">   
					<a href="{{ URL::to('tecno/config/clearlog') }}" class="btn btn-primary btn-flat clearCache" ><i class="fa fa-trash"></i> {{ Lang::get('core.dash_clearcache') }} </a>	 
				</div>

			</div> 
	 		{!! Form::close() !!}
	 	</div>
    </div>


</div>
@endsection