@extends('layouts.app')

@section('content')
    <section class="content-header">
      <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
         <li><a href="{{ url('trazabilidadticket?return='.$return) }}"> {{ $pageTitle }} </a></li>
        <li  class="active"> View </li>
      </ol>
    </section>

  <div class="content"> 

<div class="box box-primary">
	<div class="box-header with-border">
		<div class="box-header-tools pull-left" >
	   		<a href="{{ url('trazabilidadticket?return='.$return) }}" class="tips btn btn-sm btn-success btn-circle" title="{{ Lang::get('core.btn_back') }}"><i class="fa  fa-arrow-left"></i></a>
			@if($access['is_add'] ==1)
	   		<a href="{{ url('trazabilidadticket/update/'.$id.'?return='.$return) }}" class="tips btn btn-sm btn-info btn-circle" title="{{ Lang::get('core.btn_edit') }}"><i class="fa  fa-pencil"></i></a>
			@endif 
					
		</div>	

		<div class="box-header-tools pull-right" >
			<a href="{{ ($prevnext['prev'] != '' ? url('trazabilidadticket/show/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-xs btn-primary btn-circle"><i class="fa fa-arrow-left"></i>  </a>	
			<a href="{{ ($prevnext['next'] != '' ? url('trazabilidadticket/show/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-xs btn-primary btn-circle"> <i class="fa fa-arrow-right"></i>  </a>
			@if(Session::get('gid') ==1)
				<a href="{{ URL::to('tecno/module/config/'.$pageModule) }}" class="tips btn btn-sm btn-success btn-circle" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa  fa-ellipsis-v"></i></a>
			@endif 			
		</div>


	</div>
	<div class="box-body" > 	

		<table class="table table-striped table-bordered" >
			<tbody>	
		
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Ticket', (isset($fields['ticket_id']['language'])? $fields['ticket_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->ticket_id,'ticket_id','1:v_tickets:id:id|clasificacion|estado') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Tecnico', (isset($fields['tecnico_id']['language'])? $fields['tecnico_id']['language'] : array())) }}</td>
						<td>{{ $row->tecnico_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Comentario', (isset($fields['comentario']['language'])? $fields['comentario']['language'] : array())) }}</td>
						<td>{{ $row->comentario}} </td>
						
					</tr>
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	
</div>
	  
@stop