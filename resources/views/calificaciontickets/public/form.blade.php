

		 {!! Form::open(array('url'=>'calificaciontickets/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Calificar Ticket</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group  " >
										<label for="Ticket" class=" control-label col-md-4 text-left"> Ticket <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='tickets_id' rows='5' id='tickets_id' class='select2 ' required  ></select> 
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
										  <select name='tb_users_id' rows='5' id='tb_users_id' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> {!! Form::hidden('created_at', $row['created_at']) !!}{!! Form::hidden('updated_at', $row['updated_at']) !!}</fieldset>
			</div>
			
			

			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
				  </div>	  
			
		</div> 
		 
		 {!! Form::close() !!}
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#tickets_id").jCombo("{!! url('calificaciontickets/comboselect?filter=v_tickets:id:clasificacion|estado') !!}",
		{  selected_value : '{{ $row["tickets_id"] }}' });
		
		$("#tb_users_id").jCombo("{!! url('calificaciontickets/comboselect?filter=v_usuarios:tb_user_id:nombres|apellidos|cargo') !!}",
		{  selected_value : '{{ $row["tb_users_id"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
