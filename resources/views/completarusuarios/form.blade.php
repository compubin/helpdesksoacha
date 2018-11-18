@inject('ds', 'App\Services\DataService')

@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('dashboard') }}"> Home</a></li>
         <li><a href="{{ url('completarusuarios?return='.$return) }}"> {{ $pageTitle }} </a></li>
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

		 {!! Form::open(array('url'=>'completarusuarios/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
<div class="col-md-12">
						<fieldset><legend> Completar información del usuario</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group  " >
										<label for="Usuario" class=" control-label col-md-4 text-left"> Usuario <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='tb_users_id' rows='5' id='tb_users_id_' class='select2 ' required @if(!empty($row['tb_users_id'])) readonly="" @endif >
										  	
										  	@if(!empty($row['tb_users_id']))
										  		<option value="{{ $row['tb_users_id'] }}"> {{ $ds->getUserById($row['tb_users_id'])->first_name }} {{ $ds->getUserById($row['tb_users_id'])->last_name }}</option>
										  	@else
											  	<option>-- Please select --</option>
											  	@foreach($ds->getCompletarUsuarios() AS $key => $element)
											  		<option value="{{ $element->id }}">{{ $element->first_name }} {{ $element->last_name }}</option>
											  	@endforeach
										  	@endif
										  </select> 
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
									  </div> {!! Form::hidden('created_at', $row['created_at']) !!}{!! Form::hidden('updated_at', $row['updated_at']) !!}</fieldset>
			</div>
			
			

		
			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-success " > {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-primary " > {{ Lang::get('core.sb_save') }}</button>
					<button type="button" onclick="location.href='{{ URL::to('completarusuarios?return='.$return) }}' " class="btn btn-danger  ">  {{ Lang::get('core.sb_cancel') }} </button>
					</div>	  
			
				  </div> 
		 
		 {!! Form::close() !!}
	</div>
</div>		 
</div>	
		 
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
		 

		$('.removeMultiFiles').on('click',function(){
			var removeUrl = '{{ url("completarusuarios/removefiles?file=")}}'+$(this).attr('url');
			$(this).parent().remove();
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
@stop