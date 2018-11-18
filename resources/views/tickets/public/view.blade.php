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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Categoria', (isset($fields['categorias_id']['language'])? $fields['categorias_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->categorias_id,'categorias_id','1:categorias:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Sub Categoria', (isset($fields['sub_categorias_id']['language'])? $fields['sub_categorias_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->sub_categorias_id,'sub_categorias_id','1:sub_categorias:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Clasificación', (isset($fields['clasificacion_id']['language'])? $fields['clasificacion_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->clasificacion_id,'clasificacion_id','1:clasificacion:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Incidencia', (isset($fields['incidencia']['language'])? $fields['incidencia']['language'] : array())) }}</td>
						<td>{{ $row->incidencia}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Usuario', (isset($fields['usuario_id']['language'])? $fields['usuario_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->usuario_id,'usuario_id','1:v_usuarios_no_tecnicos:tb_users_id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Tecnico', (isset($fields['tecnico_id']['language'])? $fields['tecnico_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->tecnico_id,'tecnico_id','1:v_usuarios_tecnicos:tb_users_id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Equipo', (isset($fields['equipos_id']['language'])? $fields['equipos_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->equipos_id,'equipos_id','1:equipos:id:nombre') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Estado', (isset($fields['estado']['language'])? $fields['estado']['language'] : array())) }}</td>
						<td>{{ $row->estado}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	