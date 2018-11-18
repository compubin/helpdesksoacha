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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Usuario', (isset($fields['usuario']['language'])? $fields['usuario']['language'] : array())) }}</td>
						<td>{{ $row->usuario}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Dependencia', (isset($fields['dependencia']['language'])? $fields['dependencia']['language'] : array())) }}</td>
						<td>{{ $row->dependencia}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Fecha Solicitud', (isset($fields['fecha_solicitud']['language'])? $fields['fecha_solicitud']['language'] : array())) }}</td>
						<td>{{ $row->fecha_solicitud}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Estado', (isset($fields['estado']['language'])? $fields['estado']['language'] : array())) }}</td>
						<td>{{ $row->estado}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Incidencia', (isset($fields['incidencia']['language'])? $fields['incidencia']['language'] : array())) }}</td>
						<td>{{ $row->incidencia}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Tecnico', (isset($fields['tecnico']['language'])? $fields['tecnico']['language'] : array())) }}</td>
						<td>{{ $row->tecnico}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Fecha Resuelto', (isset($fields['fecha_resuelto']['language'])? $fields['fecha_resuelto']['language'] : array())) }}</td>
						<td>{{ $row->fecha_resuelto}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Categoria', (isset($fields['categoria']['language'])? $fields['categoria']['language'] : array())) }}</td>
						<td>{{ $row->categoria}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Sub Categoria', (isset($fields['sub_categoria']['language'])? $fields['sub_categoria']['language'] : array())) }}</td>
						<td>{{ $row->sub_categoria}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Item', (isset($fields['item']['language'])? $fields['item']['language'] : array())) }}</td>
						<td>{{ $row->item}} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	