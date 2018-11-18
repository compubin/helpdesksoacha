

		 {!! Form::open(array('url'=>'report/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Reporte</legend>
									
									  <div class="form-group  " >
										<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
										<div class="col-md-6">
										  <input  type='text' name='id' id='id' value='{{ $row['id'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Usuario" class=" control-label col-md-4 text-left"> Usuario </label>
										<div class="col-md-6">
										  <input  type='text' name='usuario' id='usuario' value='{{ $row['usuario'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Dependencia" class=" control-label col-md-4 text-left"> Dependencia </label>
										<div class="col-md-6">
										  <input  type='text' name='dependencia' id='dependencia' value='{{ $row['dependencia'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Fecha Solicitud" class=" control-label col-md-4 text-left"> Fecha Solicitud </label>
										<div class="col-md-6">
										  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('fecha_solicitud', $row['fecha_solicitud'],array('class'=>'form-control input-sm datetime', 'style'=>'width:150px !important;')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Estado" class=" control-label col-md-4 text-left"> Estado </label>
										<div class="col-md-6">
										  <input  type='text' name='estado' id='estado' value='{{ $row['estado'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Incidencia" class=" control-label col-md-4 text-left"> Incidencia </label>
										<div class="col-md-6">
										  <textarea name='incidencia' rows='5' id='incidencia' class='form-control input-sm '  
				           >{{ $row['incidencia'] }}</textarea> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Tecnico" class=" control-label col-md-4 text-left"> Tecnico </label>
										<div class="col-md-6">
										  <input  type='text' name='tecnico' id='tecnico' value='{{ $row['tecnico'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Fecha Resuelto" class=" control-label col-md-4 text-left"> Fecha Resuelto </label>
										<div class="col-md-6">
										  
				<div class="input-group m-b" style="width:150px !important;">
					{!! Form::text('fecha_resuelto', $row['fecha_resuelto'],array('class'=>'form-control input-sm datetime', 'style'=>'width:150px !important;')) !!}
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				</div>
				 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Categoria" class=" control-label col-md-4 text-left"> Categoria </label>
										<div class="col-md-6">
										  <input  type='text' name='categoria' id='categoria' value='{{ $row['categoria'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Sub Categoria" class=" control-label col-md-4 text-left"> Sub Categoria </label>
										<div class="col-md-6">
										  <input  type='text' name='sub_categoria' id='sub_categoria' value='{{ $row['sub_categoria'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Item" class=" control-label col-md-4 text-left"> Item </label>
										<div class="col-md-6">
										  <input  type='text' name='item' id='item' value='{{ $row['item'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> </fieldset>
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
		
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
