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
	        <li><a href="#"> Home</a></li>
	        <li><a href="{{ url('tecno/config') }}"> Configuration</a></li>
	        <li  class="active"> Log & Security </li>
	      </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>

    <div class="row">
        <div class="white-box">

			@include('tecno.config.tab')
	 		{!! Form::open(array('url'=>'tecno/config/login/', 'class'=>'form-horizontal')) !!}

			<div class="col-sm-6">
				

		 		  <div class="form-group">
					<label for="ipt" class=" control-label col-sm-4">  {{ Lang::get('core.fr_emailsys') }}  </label>	
					<div class="col-sm-8 ">
							
							<div class="">
								<input type="radio" name="CNF_MAIL" value="phpmail"   @if($tecnoconfig['cnf_mail'] =='phpmail') checked @endif class="minimal-red"  /> 
								<label>PHP MAIL System</label>
							</div>
							
							<div class="">
								<input type="radio" name="CNF_MAIL" value="swift"   @if($tecnoconfig['cnf_mail'] =='swift') checked @endif class="minimal-red"  /> 
								<label>SWIFT Mail ( Required Configuration )</label>
							</div>			
					</div>
				</div>					
		  
				  <div class="form-group">
					<label for="ipt" class=" control-label col-sm-4"> {{ Lang::get('core.fr_registrationdefault') }}  </label>	
					<div class="col-sm-8">
							<div >
								
								<select class="form-control" name="CNF_GROUP">
									@foreach($groups as $group)
									<option value="{{ $group->group_id }}"
									 @if($tecnoconfig['cnf_group'] == $group->group_id ) selected @endif
									>{{ $group->name }}</option>
									@endforeach
								</select>
								
							</div>				
					</div>	
							
				  </div> 

				  <div class="form-group">
					<label for="ipt" class=" control-label col-sm-4">{{ Lang::get('core.fr_registration') }} </label>	
					<div class="col-sm-8 " >
						<div class=" radio-success">
							
							<div class="">
							<input type="radio" name="CNF_ACTIVATION" value="auto" @if($tecnoconfig['cnf_activation'] =='auto') checked @endif  class="minimal-red"  /> 
							<label>{{ Lang::get('core.fr_registrationauto') }}</label>
							</div>
							
							<div class=" ">
								<input type="radio" name="CNF_ACTIVATION" value="manual" @if($tecnoconfig['cnf_activation'] =='manual') checked @endif   class="minimal-red" /> 
								<label>{{ Lang::get('core.fr_registrationmanual') }}</label>
							</div>								
							<div class=" ">
								<input type="radio" name="CNF_ACTIVATION" value="confirmation" @if($tecnoconfig['cnf_activation'] =='confirmation') checked @endif  class="minimal-red"  />
								<label>{{ Lang::get('core.fr_registrationemail') }}</label>
							</div>
						</div>						
									
					</div>	
							
				  </div> 
				  
		 		  <div class="form-group">
					<label for="ipt" class=" control-label col-sm-4"> {{ Lang::get('core.fr_allowregistration') }} </label>	
					<div class="col-sm-8">
						<div class="">
							<input type="checkbox" name="CNF_REGIST" value="true"  @if($tecnoconfig['cnf_regist'] =='true') checked @endif class="minimal-red"  /> 
							<label>{{ Lang::get('core.fr_enable') }}</label>
						</div>			
					</div>
				</div>	
				
		 		<div class="form-group">
					<label for="ipt" class=" control-label col-sm-4"> {{ Lang::get('core.fr_allowfrontend') }} </label>	
					<div class="col-sm-8">
						<div class="">
							<input type="checkbox" name="CNF_FRONT" value="false" @if($tecnoconfig['cnf_front'] =='true') checked @endif class="minimal-red"  /> 
							<label>{{ Lang::get('core.fr_enable') }}</label>
						</div>			
					</div>
				</div>		
			
		 		<div class="form-group">
					<label for="ipt" class=" control-label col-sm-4"> Captcha </label>	
					<div class="col-sm-8">
						<div class="">
							<input type="checkbox" name="CNF_RECAPTCHA" value="false" @if($tecnoconfig['cnf_recaptcha'] =='true') checked @endif class="minimal-red"  /> 
							<label>{{ Lang::get('core.fr_enable') }}</label>
						</div>	
												
					</div>
				</div>		
				
				  		  
			  	<div class="form-group">
					<label for="ipt" class=" control-label col-md-4">&nbsp;</label>
					<div class="col-md-8">
						<button class="btn btn-primary" type="submit"> {{ Lang::get('core.sb_savechanges') }}</button>
				 	</div>
			  	</div>	  
			
		 	</div>

			<div class="col-sm-6">	
				<div class="form-vertical">
					<div class="form-group">
						<label> {{ Lang::get('core.fr_restrictip') }} </label>	
						
						<p><small><i>
							
							{{ Lang::get('core.fr_restrictipsmall') }}  <br />
							{{ Lang::get('core.fr_restrictipexam') }} : <code> 192.116.134 , 194.111.606.21 </code>
						</i></small></p>
						<textarea rows="5" class="form-control" name="CNF_RESTRICIP">{{ $tecnoconfig['cnf_restrictip'] }}</textarea>
					</div>
					
					<div class="form-group">
						<label> {{ Lang::get('core.fr_allowip') }} </label>	
						<p><small><i>
							
							{{ Lang::get('core.fr_allowipsmall') }}  <br />
							{{ Lang::get('core.fr_allowipexam') }} : <code> 192.116.134 , 194.111.606.21 </code>
						</i></small></p>							
						<textarea rows="5" class="form-control" name="CNF_ALLOWIP">{{ $tecnoconfig['cnf_allowip'] }}</textarea>
					</div>

					<p> {{ Lang::get('core.fr_ipnote') }} </p>
				</div>
			</div>
			{!! Form::close() !!}

			<div class="clr clear"></div>
	 	</div>
    </div>


</div>
@stop




