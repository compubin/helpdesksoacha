@extends('layouts.app')

@section('content')
    <section class="content-header">
      <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
         <li><a href="{{ url('completarusuarios?return='.$return) }}"> {{ $pageTitle }} </a></li>
        <li  class="active"> View </li>
      </ol>
    </section>

  <div class="content"> 

<div class="box box-primary">
	<div class="box-header with-border">
		<div class="box-header-tools pull-left" >
	   		<a href="{{ url('completarusuarios?return='.$return) }}" class="tips btn btn-sm btn-success btn-circle" title="{{ Lang::get('core.btn_back') }}"><i class="fa  fa-arrow-left"></i></a>
			@if($access['is_add'] ==1)
	   		<a href="{{ url('completarusuarios/update/'.$id.'?return='.$return) }}" class="tips btn btn-sm btn-info btn-circle" title="{{ Lang::get('core.btn_edit') }}"><i class="fa  fa-pencil"></i></a>
			@endif 
					
		</div>	

		<div class="box-header-tools pull-right" >
			<a href="{{ ($prevnext['prev'] != '' ? url('completarusuarios/show/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-xs btn-primary btn-circle"><i class="fa fa-arrow-left"></i>  </a>	
			<a href="{{ ($prevnext['next'] != '' ? url('completarusuarios/show/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-xs btn-primary btn-circle"> <i class="fa fa-arrow-right"></i>  </a>
			@if(Session::get('gid') ==1)
				<a href="{{ URL::to('tecno/module/config/'.$pageModule) }}" class="tips btn btn-sm btn-success btn-circle" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa  fa-ellipsis-v"></i></a>
			@endif 			
		</div>


	</div>
	<div class="box-body" > 	

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
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	
</div>
	  
@stop