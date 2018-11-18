

		 {!! Form::open(array('url'=>'trazabilidadticket/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Trazabilidad Ticket</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group  " >
										<label for="Ticket" class=" control-label col-md-4 text-left"> Ticket <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='ticket_id' rows='5' id='ticket_id' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Tecnico" class=" control-label col-md-4 text-left"> Tecnico <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='tecnico_id' rows='5' id='tecnico_id' class='select2 ' required  ></select> 
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
		
		
		$("#ticket_id").jCombo("{!! url('trazabilidadticket/comboselect?filter=v_tickets:id:clasificacion|usuario|estado') !!}",
		{  selected_value : '{{ $row["ticket_id"] }}' });
		
		$("#tecnico_id").jCombo("{!! url('trazabilidadticket/comboselect?filter=v_usuarios_tecnicos:tb_users_id:nombre') !!}",
		{  selected_value : '{{ $row["tecnico_id"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
