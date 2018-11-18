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
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Ticket', (isset($fields['tickets_id']['language'])? $fields['tickets_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->tickets_id,'tickets_id','1:v_tickets:id:clasificacion|estado') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Comentario', (isset($fields['comentario']['language'])? $fields['comentario']['language'] : array())) }}</td>
						<td>{{ $row->comentario}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Calificacion', (isset($fields['calificacion']['language'])? $fields['calificacion']['language'] : array())) }}</td>
						<td>{{ $row->calificacion}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Usuario', (isset($fields['tb_users_id']['language'])? $fields['tb_users_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->tb_users_id,'tb_users_id','1:v_usuarios:tb_user_id:nombres|apellidos|cargo') }} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)" class="btn btn-primary"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	