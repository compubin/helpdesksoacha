@extends('layouts.login')

@section('content')

		<div class="ajaxLoading"></div>
		<p class="message alert alert-danger " style="display:none;"></p>	
 
	    	@if(Session::has('message'))
				{!! Session::get('message') !!}
			@endif
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>	

      
       {!! Form::open(array('url'=> 'user/signin', 'class'=>'form-horizontal form-material','id' => 'loginform' , 'parsley-validate'=>'','novalidate'=>' ')) !!} 

        <div class="text-center db"><h3><img src="{{ asset('assets')}}/plugins/images/admin-logo-dark.png" alt="Home" /><br/>{{ config('tecno.cnf_appname')}} </h3></div> 
        
        <div class="form-group m-t-40">
          <div class="col-xs-12">
            <input class="form-control" name="email" type="text" required="true" placeholder="{{ Lang::get('core.email') }}">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" name="password" type="password" required="true" placeholder="{{ Lang::get('core.password') }}">
          </div>
        </div>
			@if(config('tecno')['cnf_recaptcha'] =='true') 
			<div class="form-group has-feedback ">
			<div class="col-xs-12">
				<label class="text-left"> Are u human ? </label>	
						{!! captcha_img() !!} <br /><br />
				<input type="text" name="captcha" placeholder="Type Security Code" class="form-control" required/>
				
				<div class="clr"></div>
				</div>
			</div>	
		 	@endif


        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox" name="remember">
              <label for="checkbox-signup"> Remember me </label>
            </div>
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
          </div>
        </div>
	   @if($socialize['google']['client_id'] !='' || $socialize['twitter']['client_id'] !='' || $socialize['facebook'] ['client_id'] !='')

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            <div class="social">

				@if($socialize['facebook']['client_id'] !='') 
				<a href="{{ URL::to('user/socialize/facebook')}}" class="btn  btn-facebook " title="Login with Facebook"><i aria-hidden="true" class="fa fa-facebook"></i>  </a>
				@endif
				@if($socialize['google']['client_id'] !='') 
				<a href="{{ URL::to('user/socialize/google')}}" class="btn btn-googleplus " title="Login with Google"><i aria-hidden="true" class="fa fa-google-plus"></i>  </a>
				@endif
				@if($socialize['twitter']['client_id'] !='') 
				<a href="{{ URL::to('user/socialize/twitter')}}" class="btn btn-twitter "><i class="fa fa-twitter"></i>  </a>
				@endif


          </div>
          <p>- {{ Lang::get('core.loginsocial') }} -</p>
        </div>
        </div>
		@endif  


		@if(config('tecno.cnf_regist') =='true')
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            <p>Don't have an account? <a href="{{ url('user/register') }}" class="text-primary m-l-5"><b> {{ Lang::get('core.signup') }} </b></a></p>
          </div>
        </div>
        @endif


      </form>

      {!! Form::open(array('url'=> 'user/request', 'class'=>'form-horizontal form-material','id' => 'recoverform' , 'parsley-validate'=>'','novalidate'=>' ')) !!} 
      
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
           <input type="text" name="credit_email"  placeholder="Enter your current email address" class="form-control" required="email" />
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
          </div>
        </div>
      </form>






<script type="text/javascript">
	$(document).ready(function(){
		$('#forgot-area').hide();
		$('.forgot-button').click(function(){
			$('#login-area').toggle();
			$('#forgot-area').toggle();
		});

		var form = $('#LoginAjax'); 
		form.parsley();
		form.submit(function(){
			
			if(form.parsley('isValid') == true){			
				var options = { 
					dataType:      'json', 
					beforeSubmit :  showRequest,
					success:       showResponse  
				}  
				$(this).ajaxSubmit(options); 
				return false;
							
			} else {
				return false;
			}		
		
		});

	});

function showRequest()
{
	$('.ajaxLoading').show();		
}  
function showResponse(data)  {		
	
	if(data.status == 'success')
	{
		window.location.href = data.url;	
		$('.ajaxLoading').hide();
	} else {
		$('.message').html(data.message)	
		$('.ajaxLoading').hide();
		$('.message').show(data.message)	
		return false;
	}	
}	
</script>
{{ SiteHelpers::showNotification() }} 
@stop