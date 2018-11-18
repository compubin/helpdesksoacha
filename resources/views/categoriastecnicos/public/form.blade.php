

		 {!! Form::open(array('url'=>'categoriastecnicos/savepublic', 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div class="col-md-12">
						<fieldset><legend> Categorías - Técnicos</legend>
				{!! Form::hidden('id', $row['id']) !!}					
									  <div class="form-group  " >
										<label for="Categoría" class=" control-label col-md-4 text-left"> Categoría <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='categorias_id' rows='5' id='categorias_id' class='select2 ' required  ></select> 
										 </div> 
										 <div class="col-md-2">
										 	
										 </div>
									  </div> 					
									  <div class="form-group  " >
										<label for="Usuario" class=" control-label col-md-4 text-left"> Usuario <span class="asterix"> * </span></label>
										<div class="col-md-6">
										  <select name='usuarios_id' rows='5' id='usuarios_id' class='select2 ' required  ></select> 
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
		
		
		$("#categorias_id").jCombo("{!! url('categoriastecnicos/comboselect?filter=categorias:id:nombre') !!}",
		{  selected_value : '{{ $row["categorias_id"] }}' });
		
		$("#usuarios_id").jCombo("{!! url('categoriastecnicos/comboselect?filter=v_usuarios_tecnicos:id:nombre') !!}",
		{  selected_value : '{{ $row["usuarios_id"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
