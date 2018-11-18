@inject('ds', 'App\Services\DataService')

@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
		<ol class="breadcrumb">
			<li><a href="#"> Home</a></li>
			<li><a href="{{ url('tickets?return='.$return) }}"> {{ $pageTitle }} </a></li>
			<li  class="active"> View </li>
		</ol>
	</section>

	<div class="content">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="box-header-tools pull-left" >
					<a href="{{ url('tickets?return='.$return) }}" class="tips btn btn-sm btn-success btn-circle" title="{{ Lang::get('core.btn_back') }}"><i class="fa  fa-arrow-left"></i></a>
					@if($access['is_add'] ==1)
						<a href="{{ url('tickets/update/'.$id.'?return='.$return) }}" class="tips btn btn-sm btn-info btn-circle" title="{{ Lang::get('core.btn_edit') }}"><i class="fa  fa-pencil"></i></a>
					@endif

				</div>

				<div class="box-header-tools pull-right" >
					<a href="{{ ($prevnext['prev'] != '' ? url('tickets/show/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-xs btn-primary btn-circle"><i class="fa fa-arrow-left"></i>  </a>
					<a href="{{ ($prevnext['next'] != '' ? url('tickets/show/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-xs btn-primary btn-circle"> <i class="fa fa-arrow-right"></i>  </a>
					@if(Session::get('gid') ==1)
						<a href="{{ URL::to('tecno/module/config/'.$pageModule) }}" class="tips btn btn-sm btn-success btn-circle" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa  fa-ellipsis-v"></i></a>
					@endif
				</div>


			</div>
			<div class="box-body" >

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

					{{--<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Equipo', (isset($fields['equipos_id']['language'])? $fields['equipos_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->equipos_id,'equipos_id','1:equipos:id:nombre') }} </td>

					</tr>--}}

					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Estado', (isset($fields['estado']['language'])? $fields['estado']['language'] : array())) }}</td>
						<td>{{ $row->estado}} </td>

					</tr>

					</tbody>
				</table>

				@php
					$ticket = $ds->getTicketById($row->id);
					$currentGroupTicket = $ds->getUserById($ticket->usuario_id);
					$currentTechnicallTicket = $ds->getUserById($ticket->tecnico_id);
				@endphp

				@if(Session::get('gid') == 3 || (Session::get('gid') == 1 || Session::get('gid') == 2))
					@if($row->tecnico_id == '' && Session::get('gid') == 3 && $currentGroupTicket->group_id == 4 && $ticket->tecnico_id == null)
						<form method="post" action="{{ route('auto-assign-ticket') }}">
							{{ csrf_field() }}
							<input type="hidden" name="ticket_id" value="{{ $row->id }}">
							<input type="hidden" name="technical_id" value="{{ Session::get('uid') }}">
							<button type="submit" class="btn btn-primary center-block"> Tomar ticket</button>
						</form>
					@elseif($currentGroupTicket->group_id == 3 && (Session::get('gid') == 1 || Session::get('gid') == 2) && $ticket->tecnico_id == null)
                        <form method="post" action="{{ route('auto-assign-ticket') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="ticket_id" value="{{ $row->id }}">
                            <input type="hidden" name="technical_id" value="{{ Session::get('uid') }}">
                            <button type="submit" class="btn btn-primary center-block"> Tomar ticket</button>
                        </form>
                    @elseif($ticket->tecnico_id != null)
						<p class="text-center">
							Ticket asignado:
							<lable class="label label-success">{{ $currentTechnicallTicket->first_name }} {{ $currentTechnicallTicket->last_name }}</lable>
						</p>
					@endif
				@endif

				@if(!empty($ticket->calificacion))
					<p class="text-center">
						<a href="/calificaciontickets/show/{{ $ticket->calificacion_id }}?return=" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-star"></span> Ver calificación</a>
					</p>
				@else
					<p class="text-center">
						<a href="#" class="btn btn-inverse btn-xs"> <span class="glyphicon glyphicon-star"></span> Sin calificación</a>
					</p>
				@endif

			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Trazabilidad del ticket</h3>
			</div>
			<div class="panel-body">
				<div class="list-group">
                    @forelse($ds->getTicketTraceability($row->id) AS $key => $ticket)
                        <a href="#" class="list-group-item">
                            <h5 class="list-group-item-heading">Comentario:</h5>
                            <p class="list-group-item-text">
                                {{ $ticket->comentario }}
                            </p>
                            <p class="text-right">
                                <small><em>{{ $ticket->tecnico }} - Fecha: {{ $ticket->created_at }}</em></small>
                            </p>
                        </a>
                    @empty
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">Soacha - HelpDesk</h4>
                            <p class="list-group-item-text">
                                Ticket sin trazabilidad.
                            </p>
                        </a>
                    @endforelse
                </div>
			</div>
		</div>
	</div>
@stop