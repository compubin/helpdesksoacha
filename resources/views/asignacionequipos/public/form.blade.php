

		 {!! Form::open(array('url'=>'asignacionequipos/savepublic', 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<ul class="nav nav-tabs"><li class="active"><a href="#Usuario" data-toggle="tab">Usuario</a></li>
				<li class=""><a href="#Equipo" data-toggle="tab">Equipo</a></li>
				<li class=""><a href="#Adicionales" data-toggle="tab">Adicionales</a></li>
				<li class=""><a href="#Ofimatica-Software" data-toggle="tab">Ofimatica - Software</a></li>
				</ul><div class="tab-content"><div class="tab-pane m-t active" id="Usuario"> 
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Tecnico  <span class="asterix"> * </span>  </label>									
										  <select name='tecnico_id' rows='5' id='tecnico_id' class='select2 ' required  ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Fecha  <span class="asterix"> * </span>  </label>									
										  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('fecha', $row['fecha'],array('class'=>'form-control input-sm date')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Secretaria  <span class="asterix"> * </span>  </label>									
										  <select name='secretarias_id' rows='5' id='secretarias_id' class='select2 ' required  ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Dependencia  <span class="asterix"> * </span>  </label>									
										  <select name='dependencias_id' rows='5' id='dependencias_id' class='select2 ' required  ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Sede  <span class="asterix"> * </span>  </label>									
										  <select name='sedes_id' rows='5' id='sedes_id' class='select2 ' required  ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Usuario  <span class="asterix"> * </span>  </label>									
										  <select name='usuario_id' rows='5' id='usuario_id' class='select2 ' required  ></select> 						
									  </div> {!! Form::hidden('created_at', $row['created_at']) !!}{!! Form::hidden('updated_at', $row['updated_at']) !!}
			</div>
			
			<div class="tab-pane m-t " id="Equipo"> 
									
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Tipos Equipo    </label>									
										  <select name='tipos_equipo_id' rows='5' id='tipos_equipo_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Equipo    </label>									
										  <select name='equipos_id' rows='5' id='equipos_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Marca Equipo    </label>									
										  <select name='marca_equipo_id' rows='5' id='marca_equipo_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Estado    </label>									
										  <input  type='text' name='estado' id='estado' value='{{ $row['estado'] }}' 
						     class='form-control input-sm ' /> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Placa    </label>									
										  <input  type='text' name='placa' id='placa' value='{{ $row['placa'] }}' 
						     class='form-control input-sm ' /> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Serial    </label>									
										  <input  type='text' name='serial' id='serial' value='{{ $row['serial'] }}' 
						     class='form-control input-sm ' /> 						
									  </div> 
			</div>
			
			<div class="tab-pane m-t " id="Adicionales"> 
									
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Disco Duro    </label>									
										  <select name='disco_duro_id' rows='5' id='disco_duro_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Tipo Disco Duro    </label>									
										  <select name='tipo_disco_duro_id' rows='5' id='tipo_disco_duro_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Serial Disco Duro    </label>									
										  <input  type='text' name='serial_disco_duro' id='serial_disco_duro' value='{{ $row['serial_disco_duro'] }}' 
						     class='form-control input-sm ' /> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Memoria Ram    </label>									
										  <select name='memoria_ram_id' rows='5' id='memoria_ram_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Tipo Memoria Ram    </label>									
										  <select name='tipo_memoria_ram_id' rows='5' id='tipo_memoria_ram_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Frecuencia Memoria Ram    </label>									
										  <select name='frecuencia_memoria_ram_id' rows='5' id='frecuencia_memoria_ram_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Procesador    </label>									
										  <select name='procesador_id' rows='5' id='procesador_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Modelo Procesador    </label>									
										  <select name='modelo_procesador_id' rows='5' id='modelo_procesador_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Marcas Procesador    </label>									
										  <select name='marcas_procesador_id' rows='5' id='marcas_procesador_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Board    </label>									
										  <select name='board_id' rows='5' id='board_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Marca Board    </label>									
										  <select name='marca_board_id' rows='5' id='marca_board_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Unidad Optica    </label>									
										  <input  type='text' name='unidad_optica' id='unidad_optica' value='{{ $row['unidad_optica'] }}' 
						     class='form-control input-sm ' /> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Tarjeta Red    </label>									
										  <textarea name='tarjeta_red' rows='5' id='tarjeta_red' class='form-control input-sm '  
				           >{{ $row['tarjeta_red'] }}</textarea> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Tarjeta Video    </label>									
										  <textarea name='tarjeta_video' rows='5' id='tarjeta_video' class='form-control input-sm '  
				           >{{ $row['tarjeta_video'] }}</textarea> 						
									  </div> 
			</div>
			
			<div class="tab-pane m-t " id="Ofimatica-Software"> 
									
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Sistema Operativo    </label>									
										  <select name='sistema_operativo_id' rows='5' id='sistema_operativo_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Version Sistema Operativo    </label>									
										  <select name='version_sistema_operativo_id' rows='5' id='version_sistema_operativo_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Velocidad So    </label>									
										  <select name='velocidad_so_id' rows='5' id='velocidad_so_id' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Ofimatica    </label>									
										  <select name='ofimatica[]' multiple rows='5' id='ofimatica' class='select2 '   ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Software    </label>									
										  <select name='software[]' multiple rows='5' id='software' class='select2 '   ></select> 						
									  </div> 
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
		
		
		$("#tecnico_id").jCombo("{!! url('asignacionequipos/comboselect?filter=v_usuarios_tecnicos:tb_users_id:nombre') !!}",
		{  selected_value : '{{ $row["tecnico_id"] }}' });
		
		$("#secretarias_id").jCombo("{!! url('asignacionequipos/comboselect?filter=secretarias:id:nombre') !!}",
		{  selected_value : '{{ $row["secretarias_id"] }}' });
		
		$("#dependencias_id").jCombo("{!! url('asignacionequipos/comboselect?filter=dependencias:id:nombre') !!}&parent=secretarias_id:",
		{  parent: '#secretarias_id', selected_value : '{{ $row["dependencias_id"] }}' });
		
		$("#sedes_id").jCombo("{!! url('asignacionequipos/comboselect?filter=sedes:id:nombre') !!}",
		{  selected_value : '{{ $row["sedes_id"] }}' });
		
		$("#usuario_id").jCombo("{!! url('asignacionequipos/comboselect?filter=v_usuarios:tb_user_id:nombres|apellidos') !!}&parent=dependencias_id:",
		{  parent: '#dependencias_id', selected_value : '{{ $row["usuario_id"] }}' });
		
		$("#tipos_equipo_id").jCombo("{!! url('asignacionequipos/comboselect?filter=tipos_equipo:id:nombre') !!}",
		{  selected_value : '{{ $row["tipos_equipo_id"] }}' });
		
		$("#equipos_id").jCombo("{!! url('asignacionequipos/comboselect?filter=equipos:id:nombre') !!}",
		{  selected_value : '{{ $row["equipos_id"] }}' });
		
		$("#marca_equipo_id").jCombo("{!! url('asignacionequipos/comboselect?filter=marcas:id:nombre') !!}",
		{  selected_value : '{{ $row["marca_equipo_id"] }}' });
		
		$("#disco_duro_id").jCombo("{!! url('asignacionequipos/comboselect?filter=disco_duro:id:nombre') !!}",
		{  selected_value : '{{ $row["disco_duro_id"] }}' });
		
		$("#tipo_disco_duro_id").jCombo("{!! url('asignacionequipos/comboselect?filter=tipo_disco_duro:id:nombre') !!}",
		{  selected_value : '{{ $row["tipo_disco_duro_id"] }}' });
		
		$("#memoria_ram_id").jCombo("{!! url('asignacionequipos/comboselect?filter=memoria_ram:id:nombre') !!}",
		{  selected_value : '{{ $row["memoria_ram_id"] }}' });
		
		$("#tipo_memoria_ram_id").jCombo("{!! url('asignacionequipos/comboselect?filter=tipo_memoria_ram:id:nombre') !!}",
		{  selected_value : '{{ $row["tipo_memoria_ram_id"] }}' });
		
		$("#frecuencia_memoria_ram_id").jCombo("{!! url('asignacionequipos/comboselect?filter=frecuencia_memoria_ram:id:nombre') !!}",
		{  selected_value : '{{ $row["frecuencia_memoria_ram_id"] }}' });
		
		$("#procesador_id").jCombo("{!! url('asignacionequipos/comboselect?filter=procesador:id:nombre') !!}",
		{  selected_value : '{{ $row["procesador_id"] }}' });
		
		$("#modelo_procesador_id").jCombo("{!! url('asignacionequipos/comboselect?filter=modelo:id:nombre') !!}",
		{  selected_value : '{{ $row["modelo_procesador_id"] }}' });
		
		$("#marcas_procesador_id").jCombo("{!! url('asignacionequipos/comboselect?filter=marcas:id:nombre') !!}",
		{  selected_value : '{{ $row["marcas_procesador_id"] }}' });
		
		$("#board_id").jCombo("{!! url('asignacionequipos/comboselect?filter=board:id:nombre') !!}",
		{  selected_value : '{{ $row["board_id"] }}' });
		
		$("#marca_board_id").jCombo("{!! url('asignacionequipos/comboselect?filter=marcas:id:nombre') !!}",
		{  selected_value : '{{ $row["marca_board_id"] }}' });
		
		$("#sistema_operativo_id").jCombo("{!! url('asignacionequipos/comboselect?filter=sistema_operativo:id:nombre') !!}",
		{  selected_value : '{{ $row["sistema_operativo_id"] }}' });
		
		$("#version_sistema_operativo_id").jCombo("{!! url('asignacionequipos/comboselect?filter=version_sistema_operativo:id:nombre') !!}&parent=sistema_operativo_id:",
		{  parent: '#sistema_operativo_id', selected_value : '{{ $row["version_sistema_operativo_id"] }}' });
		
		$("#velocidad_so_id").jCombo("{!! url('asignacionequipos/comboselect?filter=velocidad_so:id:nombre') !!}",
		{  selected_value : '{{ $row["velocidad_so_id"] }}' });
		
		$("#ofimatica").jCombo("{!! url('asignacionequipos/comboselect?filter=ofimatica:nombre:nombre') !!}",
		{  selected_value : '{{ $row["ofimatica"] }}' });
		
		$("#software").jCombo("{!! url('asignacionequipos/comboselect?filter=software:nombre:nombre') !!}",
		{  selected_value : '{{ $row["software"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
