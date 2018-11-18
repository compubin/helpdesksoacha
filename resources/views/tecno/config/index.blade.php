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
                <li><a href="#">Dashboard</a></li>
                <li class="active">Configuration</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>

    <div class="row">
        <div class="white-box">


@include('tecno.config.tab')
	 {!! Form::open(array('url'=>'tecno/config/save/', 'class'=>'form-horizontal row', 'files' => true)) !!}

	<div class="col-sm-6 animated fadeInRight ">
	  <div class="form-group">
	    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.fr_appname') }} </label>
		<div class="col-md-8">
		<input name="cnf_appname" type="text" id="cnf_appname" class="form-control input-sm " required  value="{{ $tecnoconfig['cnf_appname'] }}" />  
		 </div> 
	  </div>  
	  
	  <div class="form-group">
	    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.fr_appdesc') }} </label>
		<div class="col-md-8">
		<input name="cnf_appdesc" type="text" id="cnf_appdesc" class="form-control input-sm" value="{{ $tecnoconfig['cnf_appdesc'] }}" /> 
		 </div> 
	  </div>  
	  
	  <div class="form-group">
	    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.fr_comname') }} </label>
		<div class="col-md-8">
		<input name="cnf_comname" type="text" id="cnf_comname" class="form-control input-sm" value="{{ $tecnoconfig['cnf_comname'] }}" />  
		 </div> 
	  </div>      

	  <div class="form-group">
	    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.fr_emailsys') }} </label>
		<div class="col-md-8">
		<input name="cnf_email" type="text" id="cnf_email" class="form-control input-sm" value="{{ $tecnoconfig['cnf_email'] }}" /> 
		 </div> 
	  </div>   
	  <div class="form-group">
	    <label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.fr_multilanguage') }} <br />  </label>
		<div class="col-md-8">
			<div class="">
				<input name="cnf_multilang" type="checkbox" id="cnf_multilang" value="1" class="minimal-red" 
				@if($tecnoconfig['cnf_multilang'] ==1) checked @endif
				  /> <label> {{ Lang::get('core.fr_enable') }} </label>
			</div>	
		 </div> 
	  </div> 
	     
	   <div class="form-group">
	    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.fr_mainlanguage') }} </label>
		<div class="col-md-8">

				<select class="form-control input-sm" name="cnf_lang">

				@foreach(SiteHelpers::langOption() as $lang)
					<option value="{{  $lang['folder'] }}"
					@if(config('tecno.cnf_lang') ==$lang['folder']) selected @endif
					>{{  $lang['name'] }}</option>
				@endforeach
			</select>
		 </div> 
	  </div>   
	      

	   <div class="form-group">
	    <label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.fr_fronttemplate') }}</label>
		<div class="col-md-8">
				
				<select class="form-control input-sm" name="cnf_theme">

				@foreach(SiteHelpers::themeOption() as $t)
					<option value="{{  $t['folder'] }}"
					@if($tecnoconfig['cnf_theme'] ==$t['folder']) selected @endif
					>{{  $t['name'] }}</option>
				@endforeach
			</select>
		 </div> 
	  </div> 

	  <div class="form-group hide">
	    <label for="ipt" class=" control-label col-md-4"> Development Mode ?   </label>
		<div class="col-md-8">
			<div class="checkbox">
				<input name="cnf_mode" type="checkbox" id="cnf_mode" value="1"
				@if ($tecnoconfig['cnf_mode'] =='production') checked @endif
				  />  Production
			</div>
			<small> If you need to debug mode , please unchecked this option </small>	
		 </div> 
	  </div> 		  
	  
	  <div class="form-group">
	    <label for="ipt" class=" control-label col-md-4">&nbsp;</label>
		<div class="col-md-8">
			<button class="btn btn-primary" type="submit">{{ Lang::get('core.sb_savechanges') }} </button>
		 </div> 
	  </div> 
	</div>

	<div class="col-sm-6 animated fadeInRight ">

	  
	  <div class="form-group">
	    <label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.fr_dateformat') }} </label>
		<div class="col-md-8">
			<select class="form-control input-sm" name="cnf_date">
			<?php $dates = array(
					'Y-m-d'=>' ( Y-m-d ) . Example : '.date('Y-m-d'),
					'Y/m/d'=>' ( Y/m/d ) . Example : '.date('Y/m/d'),
					'd-m-y'=>' ( D-M-Y ) . Example : '.date('d-m-y'),
					'd/m/y'=>' ( D/M/Y ) . Example : '.date('d/m/y'),
					'm-d-y'=>' ( m-d-Y ) . Example : '.date('m-d-Y'),
					'm/d/y'=>' ( m/d/Y ) . Example : '.date('m/d/Y'),
				  );
			foreach($dates as $key=>$val) {?>
				<option value="{{  $key }}"
				@if(config('tecno.cnf_date') ==$key) selected @endif
				>{{  $val }}</option>

			<?php } ?>
			</select>
		 </div> 
	  </div>  			

	  <div class="form-group">
	    <label for="ipt" class=" control-label col-md-4">Metakey </label>
		<div class="col-md-8">
			<textarea class="form-control input-sm" name="cnf_metakey">{{ $tecnoconfig['cnf_metakey'] }}</textarea>
		 </div> 
	  </div> 

	   <div class="form-group">
	    <label  class=" control-label col-md-4">Meta Description</label>
		<div class="col-md-8">
			<textarea class="form-control input-sm"  name="cnf_metadesc">{{ $tecnoconfig['cnf_metadesc'] }}</textarea>
		 </div> 
	  </div>  

	   <div class="form-group">
	    <label  class=" control-label col-md-4">{{ Lang::get('core.fr_backendlogo') }}</label>
		<div class="col-md-8">
			<input type="file" name="logo">
			<p> <i>Please use image dimension 155px * 30px </i> </p>
			<div style="padding:5px; border:solid 1px #ddd; background:#222; width:auto;">
			 	@if(file_exists(public_path().'/assets/plugins/images/'.$tecnoconfig['cnf_logo']) && $tecnoconfig['cnf_logo'] !='')
			 	<img src="{{ asset('assets/plugins/images/'.$tecnoconfig['cnf_logo'])}}" alt="{{ $tecnoconfig['cnf_appname'] }}" />
			 	@else
				<img src="{{ asset('assets/plugins/images/logo.png')}}" alt="{{ $tecnoconfig['cnf_appname'] }}" />
				@endif	
			</div>				
		 </div> 
	  </div>  		  

	</div>  
	 {!! Form::close() !!}               	

            
        </div>

    </div>
 </div>
     




@stop