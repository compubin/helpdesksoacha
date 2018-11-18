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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Id', (isset($fields['id']['language'])? $fields['id']['language'] : array())) }}</td>
						<td>{{ $row->id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Tecnico', (isset($fields['tecnico_id']['language'])? $fields['tecnico_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->tecnico_id,'tecnico_id','1:v_usuarios_tecnicos:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Fecha', (isset($fields['fecha']['language'])? $fields['fecha']['language'] : array())) }}</td>
						<td>{{ date('',strtotime($row->fecha)) }} </td>
						
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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Sede', (isset($fields['sedes_id']['language'])? $fields['sedes_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->sedes_id,'sedes_id','1:sedes:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Usuari', (isset($fields['usuario_id']['language'])? $fields['usuario_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->usuario_id,'usuario_id','1:v_usuarios:tb_user_id:nombres|apellidos') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Tipo Equipo', (isset($fields['tipos_equipo_id']['language'])? $fields['tipos_equipo_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->tipos_equipo_id,'tipos_equipo_id','1:tipos_equipo:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Equipo', (isset($fields['equipos_id']['language'])? $fields['equipos_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->equipos_id,'equipos_id','1:equipos:id:nombre') }} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	