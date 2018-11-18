

		 {!! Form::open(array('url'=>'completarusuarios/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Completar información del usuario</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group  " >
										<label for="Usuario" class=" control-label col-md-4 text-left"> Usuario <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='tb_users_id' rows='5' id='tb_users_id' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Secretaría" class=" control-label col-md-4 text-left"> Secretaría <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='secretarias_id' rows='5' id='secretarias_id' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Dependencia" class=" control-label col-md-4 text-left"> Dependencia <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='dependencias_id' rows='5' id='dependencias_id' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Cargo" class=" control-label col-md-4 text-left"> Cargo <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='cargos_id' rows='5' id='cargos_id' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Fecha Nacimiento" class=" control-label col-md-4 text-left"> Fecha Nacimiento <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('fecha_nacimiento', $row['fecha_nacimiento'],array('class'=>'form-control input-sm date')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Tipo Documento" class=" control-label col-md-4 text-left"> Tipo Documento <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  
					<?php $tipo_documento = explode(',',$row['tipo_documento']);
					$tipo_documento_opt = array( 'Cédula' => 'Cédula' , ); ?>
					<select name='tipo_documento' rows='5' required  class='select2 '  > 
						<?php 
						foreach($tipo_documento_opt as $key=>$val)
						{
							echo "<option  value ='$key' ".($row['tipo_documento'] == $key ? " selected='selected' " : '' ).">$val</option>"; 						
						}						
						?></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Documento" class=" control-label col-md-4 text-left"> Documento <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='documento' id='documento' value='{{ $row['documento'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Telefono" class=" control-label col-md-4 text-left"> Telefono <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='telefono' id='telefono' value='{{ $row['telefono'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Ext" class=" control-label col-md-4 text-left"> Ext <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='ext' id='ext' value='{{ $row['ext'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Genero" class=" control-label col-md-4 text-left"> Genero <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  
					
					<input type='radio' name='genero' value ='Masculino' required @if($row['genero'] == 'Masculino') checked="checked" @endif class='minimal-red' > Masculino 
					
					<input type='radio' name='genero' value ='Femenino' required @if($row['genero'] == 'Femenino') checked="checked" @endif class='minimal-red' > Femenino  
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> {!! Form::hidden('created_at', $row['created_at']) !!}{!! Form::hidden('upated_at', $row['upated_at']) !!}</fieldset>
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
		
		
		$("#tb_users_id").jCombo("{!! url('completarusuarios/comboselect?filter=tb_users:id:first_name|last_name') !!}",
		{  selected_value : '{{ $row["tb_users_id"] }}' });
		
		$("#secretarias_id").jCombo("{!! url('completarusuarios/comboselect?filter=secretarias:id:nombre') !!}",
		{  selected_value : '{{ $row["secretarias_id"] }}' });
		
		$("#dependencias_id").jCombo("{!! url('completarusuarios/comboselect?filter=dependencias:id:nombre') !!}&parent=secretarias_id:",
		{  parent: '#secretarias_id', selected_value : '{{ $row["dependencias_id"] }}' });
		
		$("#cargos_id").jCombo("{!! url('completarusuarios/comboselect?filter=cargos:id:nombre') !!}",
		{  selected_value : '{{ $row["cargos_id"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
