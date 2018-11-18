
 @extends('layouts.app')

@section('content')


<div class="container-fluid">
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ $pageTitle }} </h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
	      <ol class="breadcrumb">
	        <li><a href="{{ url('dashboard') }}"> Home</a></li>
	        <li><a href="{{ url('tecno/config') }}"> Configuration</a></li>
	        <li  class="active"> Email Setting </li>
	      </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>

    <div class="row">
        <div class="white-box">

        	@include('tecno.config.tab')
			 {!! Form::open(array('url'=>'tecno/config/email/', 'class'=>'form-vertical row')) !!}
			
			<div class="col-sm-6 animated fadeInRight">
				<h3> {{ Lang::get('core.registernew') }} </h3>
				<div class="form-group">
					<label for="ipt" class=" control-label"> {{ Lang::get('core.tab_email') }} </label>		
					<textarea rows="20" name="regEmail" class="form-control input-sm  markItUp">{{ $regEmail }}</textarea>	
				</div>  
						

				<div class="form-group">   
					<button class="btn btn-primary" type="submit"> {{ Lang::get('core.sb_savechanges') }}</button>	 
				</div>
				
			</div> 


			<div class="col-sm-6 animated fadeInRight">
				<h3> {{ Lang::get('core.forgotpassword') }} </h3>
				
				<div class="form-group">
					<label for="ipt" class=" control-label ">{{ Lang::get('core.tab_email') }} </label>					
					<textarea rows="20" name="resetEmail" class="form-control input-sm markItUp">{{ $resetEmail }}</textarea>					 
				</div> 

				<div class="form-group">
					<button class="btn btn-primary" type="submit">{{ Lang::get('core.sb_savechanges') }}</button>
				</div> 
				 
			</div>	  

			   {!! Form::close() !!}


        </div>
    </div>
</div>



@stop





