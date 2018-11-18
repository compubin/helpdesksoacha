

		 {!! Form::open(array('url'=>'reportecalificacion/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Reporte Calificacion</legend>
									
									  <div class="form-group  " >
										<label for="IdTicket" class=" control-label col-md-4 text-left"> IdTicket </label>
										<div class="col-md-6">
										  <input  type='text' name='idTicket' id='idTicket' value='{{ $row['idTicket'] }}' 
						     class='form-control input-sm ' /> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Ticket" class=" control-label col-md-4 text-left"> Ticket </label>
										<div class="col-md-6">
										  <textarea name='ticket' rows='5' id='ticket' class='form-control input-sm '  
				           >{{ $row['ticket'] }}</textarea> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Calificacion" class=" control-label col-md-4 text-left"> Calificacion </label>
										<div class="col-md-6">
										  <input  type='text' name='calificacion' id='calificacion' value='{{ $row['calificacion'] }}' 
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
										<label for="Estado" class=" control-label col-md-4 text-left"> Estado </label>
										<div class="col-md-6">
										  <input  type='text' name='estado' id='estado' value='{{ $row['estado'] }}' 
						     class='form-control input-sm ' /> 
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
