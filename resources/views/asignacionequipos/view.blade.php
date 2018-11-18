@extends('layouts.app')

@section('content')
    <section class="content-header">
      <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
         <li><a href="{{ url('asignacionequipos?return='.$return) }}"> {{ $pageTitle }} </a></li>
        <li  class="active"> View </li>
      </ol>
    </section>

  <div class="content"> 

<div class="box box-primary">
	<div class="box-header with-border">
		<div class="box-header-tools pull-left" >
	   		<a href="{{ url('asignacionequipos?return='.$return) }}" class="tips btn btn-sm btn-success btn-circle" title="{{ Lang::get('core.btn_back') }}"><i class="fa  fa-arrow-left"></i></a>
			@if($access['is_add'] ==1)
	   		<a href="{{ url('asignacionequipos/update/'.$id.'?return='.$return) }}" class="tips btn btn-sm btn-info btn-circle" title="{{ Lang::get('core.btn_edit') }}"><i class="fa  fa-pencil"></i></a>
			@endif 
					
		</div>	

		<div class="box-header-tools pull-right" >
			<a href="{{ ($prevnext['prev'] != '' ? url('asignacionequipos/show/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-xs btn-primary btn-circle"><i class="fa fa-arrow-left"></i>  </a>	
			<a href="{{ ($prevnext['next'] != '' ? url('asignacionequipos/show/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-xs btn-primary btn-circle"> <i class="fa fa-arrow-right"></i>  </a>
			@if(Session::get('gid') ==1)
				<a href="{{ URL::to('tecno/module/config/'.$pageModule) }}" class="tips btn btn-sm btn-success btn-circle" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa  fa-ellipsis-v"></i></a>
			@endif 			
		</div>


	</div>
	<div class="box-body" > 	

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
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	
</div>
	  
@stop