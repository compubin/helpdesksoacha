

		 {!! Form::open(array('url'=>'tickets/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Ticket</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group  " >
										<label for="Categoria" class=" control-label col-md-4 text-left"> Categoria <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='categorias_id' rows='5' id='categorias_id' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Sub Categoria" class=" control-label col-md-4 text-left"> Sub Categoria <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='sub_categorias_id' rows='5' id='sub_categorias_id' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Clasificación" class=" control-label col-md-4 text-left"> Clasificación <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='clasificacion_id' rows='5' id='clasificacion_id' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Incidencia" class=" control-label col-md-4 text-left"> Incidencia <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <textarea name='incidencia' rows='5' id='incidencia' class='form-control input-sm '  
				         required  >{{ $row['incidencia'] }}</textarea> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Usuario" class=" control-label col-md-4 text-left"> Usuario <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='usuario_id' rows='5' id='usuario_id' class='select2 ' required  ></select> 
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
										<label for="Equipo" class=" control-label col-md-4 text-left"> Equipo <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='equipos_id' rows='5' id='equipos_id' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Estado" class=" control-label col-md-4 text-left"> Estado <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  
					
					<input type='radio' name='estado' value ='Pendiente' required @if($row['estado'] == 'Pendiente') checked="checked" @endif class='minimal-red' > Pendiente 
					
					<input type='radio' name='estado' value ='En proceso' required @if($row['estado'] == 'En proceso') checked="checked" @endif class='minimal-red' > En proceso 
					
					<input type='radio' name='estado' value ='Finalizado' required @if($row['estado'] == 'Finalizado') checked="checked" @endif class='minimal-red' > Finalizado  
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
		
		
		$("#categorias_id").jCombo("{!! url('tickets/comboselect?filter=categorias:id:nombre') !!}",
		{  selected_value : '{{ $row["categorias_id"] }}' });
		
		$("#sub_categorias_id").jCombo("{!! url('tickets/comboselect?filter=sub_categorias:id:nombre') !!}&parent=categorias_id:",
		{  parent: '#categorias_id', selected_value : '{{ $row["sub_categorias_id"] }}' });
		
		$("#clasificacion_id").jCombo("{!! url('tickets/comboselect?filter=clasificacion:id:nombre') !!}&parent=sub_categorias_id:",
		{  parent: '#sub_categorias_id', selected_value : '{{ $row["clasificacion_id"] }}' });
		
		$("#usuario_id").jCombo("{!! url('tickets/comboselect?filter=v_usuarios_no_tecnicos:tb_users_id:nombre') !!}",
		{  selected_value : '{{ $row["usuario_id"] }}' });
		
		$("#tecnico_id").jCombo("{!! url('tickets/comboselect?filter=v_usuarios_tecnicos:tb_users_id:nombre') !!}",
		{  selected_value : '{{ $row["tecnico_id"] }}' });
		
		$("#equipos_id").jCombo("{!! url('tickets/comboselect?filter=equipos:id:nombre') !!}",
		{  selected_value : '{{ $row["equipos_id"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
