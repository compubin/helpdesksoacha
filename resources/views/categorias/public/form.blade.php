

		 {!! Form::open(array('url'=>'categorias/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Categorías</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group  " >
										<label for="Codigo" class=" control-label col-md-4 text-left"> Codigo <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='codigo' id='codigo' value='{{ $row['codigo'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Nombre" class=" control-label col-md-4 text-left"> Nombre <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <input  type='text' name='nombre' id='nombre' value='{{ $row['nombre'] }}' 
						required     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Descripcion" class=" control-label col-md-4 text-left"> Descripcion <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <textarea name='descripcion' rows='5' id='descripcion' class='form-control input-sm '  
				         required  >{{ $row['descripcion'] }}</textarea> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Estado" class=" control-label col-md-4 text-left"> Estado <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  
					
					<input type='radio' name='estado' value ='Activa' required @if($row['estado'] == 'Activa') checked="checked" @endif class='minimal-red' > Activa 
					
					<input type='radio' name='estado' value ='Inactiva' required @if($row['estado'] == 'Inactiva') checked="checked" @endif class='minimal-red' > Inactiva  
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
		
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
