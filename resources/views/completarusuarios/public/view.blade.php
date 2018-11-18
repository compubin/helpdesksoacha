<div class="m-t" style="padding-top:25px;">	
    <div class="row m-b-lg animated fadeInDown delayp1 text-center">
        <h3> {{ $pageTitle }} <small> {{ $pageNote }} </small></h3>
        <hr />       
    </div>
</div>
<div class="m-t">
	<div class="table-responsive" > 	

		<table class="table table-striped table-bordered" >
			<tbody>	
		
			
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Usuario', (isset($fields['tb_users_id']['language'])? $fields['tb_users_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->tb_users_id,'tb_users_id','1:tb_users:id:first_name|last_name') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Secretaria', (isset($fields['secretarias_id']['language'])? $fields['secretarias_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->secretarias_id,'secretarias_id','1:secretarias:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Dependencia', (isset($fields['dependencias_id']['language'])? $fields['dependencias_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->dependencias_id,'dependencias_id','1:dependencias:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Cargo', (isset($fields['cargos_id']['language'])? $fields['cargos_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->cargos_id,'cargos_id','1:cargos:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Fecha Nacimiento', (isset($fields['fecha_nacimiento']['language'])? $fields['fecha_nacimiento']['language'] : array())) }}</td>
						<td>{{ $row->fecha_nacimiento}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Tipo Documento', (isset($fields['tipo_documento']['language'])? $fields['tipo_documento']['language'] : array())) }}</td>
						<td>{{ $row->tipo_documento}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Documento', (isset($fields['documento']['language'])? $fields['documento']['language'] : array())) }}</td>
						<td>{{ $row->documento}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Telefono', (isset($fields['telefono']['language'])? $fields['telefono']['language'] : array())) }}</td>
						<td>{{ $row->telefono}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Ext', (isset($fields['ext']['language'])? $fields['ext']['language'] : array())) }}</td>
						<td>{{ $row->ext}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Genero', (isset($fields['genero']['language'])? $fields['genero']['language'] : array())) }}</td>
						<td>{{ $row->genero}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	