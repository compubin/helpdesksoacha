@inject('ds', 'App\Services\DataService')

@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('dashboard') }}"> Home</a></li>
         <li><a href="{{ url('calificaciontickets?return='.$return) }}"> {{ $pageTitle }} </a></li>
        <li  class="active"> Update </li>
      </ol>
    </section>

  <div class="content"> 

<div class="box box-primary">
	<div class="box-header with-border">

		<div class="box-header-tools pull-left" >
			<a href="{{ url($pageModule.'?return='.$return) }}" class="tips btn btn-sm btn-success btn-circle"  title="{{ Lang::get('core.btn_back') }}" ><i class="fa  fa-arrow-left"></i></a> 
		</div>
		<div class="box-header-tools pull-right" >
			@if(Session::get('gid') ==1)
				<a href="{{ URL::to('tecno/module/config/'.$pageModule) }}" class="tips btn btn-sm btn-success btn-circle" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa  fa-ellipsis-v"></i></a>
			@endif 			
		</div> 

	</div>
	<div class="box-body"> 	

		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>	

		 {!! Form::open(array('url'=>'calificaciontickets/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> Calificar Ticket</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group  " >
										<label for="Ticket" class=" control-label col-md-4 text-left"> Ticket <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='tickets_id' rows='5' id='tickets_id' class='select2 ' required  >
										  	<option></option>
										  	@if(in_array(Session::get('gid'), [1,2]))
											  	@foreach($ds->getAllSuccessTicketsUnRated(Session::get('uid')) AS $key => $value)
											  		<option value="{{ $value->id }}"> {{ $value->clasificacion }}</option>
											  	@endforeach
										  	@else
											  	@foreach($ds->getSuccessTicketsByUserUnRated(Session::get('uid')) AS $key => $value)
											  		<option value="{{ $value->id }}"> {{ $value->clasificacion }}</option>
											  	@endforeach
										  	@endif
										  </select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Comentario" class=" control-label col-md-4 text-left"> Comentario <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <textarea name='comentario' rows='5' id='comentario' class='form-control input-sm '  
				         required  >{{ $row['comentario'] }}</textarea> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Calificación" class=" control-label col-md-4 text-left"> Calificación <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  
					
					<input type='radio' name='calificacion' value ='Muy satisfecho' required @if($row['calificacion'] == 'Muy satisfecho') checked="checked" @endif class='minimal-red' > Muy satisfecho 
					
					<input type='radio' name='calificacion' value ='Satisfecho' required @if($row['calificacion'] == 'Satisfecho') checked="checked" @endif class='minimal-red' > Satisfecho 
					
					<input type='radio' name='calificacion' value ='Poco satisfecho' required @if($row['calificacion'] == 'Poco satisfecho') checked="checked" @endif class='minimal-red' > Poco satisfecho 
					
					<input type='radio' name='calificacion' value ='Nada satisfecho' required @if($row['calificacion'] == 'Nada satisfecho') checked="checked" @endif class='minimal-red' > Nada satisfecho  
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Usuario" class=" control-label col-md-4 text-left"> Usuario <span class="asterix"> * </span></label>
										<div class="col-md-6">
											@if(Session::get('gid') == 4)
												<select rows='5' class='select2 ' required disabled="">
													<option></option>
													@foreach($ds->getUsers() AS $key => $value)
											  			<option value="{{ $value->tb_user_id }}" @if(Session::get('uid') == $value->tb_user_id) selected="" @endif> {{ $value->nombres }}  {{ $value->apellidos }}</option>
											  		@endforeach
												</select> 
												<input type="hidden" name="tb_users_id" value="{{ Session::get('uid') }}">
											@else

												<select name='tb_users_id' rows='5' id='tb_users_id' class='select2 ' required  ></select> 
											@endif
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> {!! Form::hidden('created_at', $row['created_at']) !!}{!! Form::hidden('updated_at', $row['updated_at']) !!}</fieldset>
			</div>
			
			

		
			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-success " > {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary " > {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('calificaciontickets?return='.$return) }}' " class="btn btn-danger  ">  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		$("#tb_users_id").jCombo("{!! url('calificaciontickets/comboselect?filter=v_usuarios:tb_user_id:nombres|apellidos|cargo') !!}",
		{  selected_value : '{{ $row["tb_users_id"] }}' });
		 

		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ url("calificaciontickets/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop