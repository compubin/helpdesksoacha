@inject('ds', 'App\Services\DataService')

@extends('layouts.app')

@section('content')

	<section class="content-header">
		<h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('dashboard') }}"> Home</a></li>
			<li><a href="{{ url('tickets?return='.$return) }}"> {{ $pageTitle }} </a></li>
			<li  class="active"> Update </li>
		</ol>
	</section>

	<div class="content">

		<div class="box box-primary">
			<div class="box-header with-border">

				<div class="box-header-tools pull-left" >
					<a href="{{ url($pageModule.'?return='.$return) }}" class="tips btn btn-sm btn-success btn-circle"  title="{{ Lang::get('core.btn_back') }}" ><i class="fa  fa-arrow-left"></i></a>
				</div>
				<div class="box-header-tools pull-right" >
					@if(Session::get('gid') == 1)
						<a href="{{ URL::to('tecno/module/config/'.$pageModule) }}" class="tips btn btn-sm btn-success btn-circle" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa  fa-ellipsis-v"></i></a>
					@endif
				</div>

			</div>
			<div class="box-body">

				<ul class="parsley-error-list">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>

				

				{!! Form::open(array('url'=>'tickets/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
				<div class="col-md-12">
					<fieldset>
						@if($ds->checkUserClosedTickets(Session::get('uid')) > 0 && Session::get('gid') == 4)
							<legend>
								Tiene Tickets pendientes de calificar. Por favor califiquelos en el siguiente link <a href="/calificaciontickets" class="btn btn-xs btn-default"> Calificar tickets </a> antes de colocar un nuevo ticket
							</legend>
						@else
							<legend> Ticket</legend>
							{!! Form::hidden('id', $row['id']) !!}
							<div class="form-group  " >
								<label for="Categoria" class=" control-label col-md-4 text-left"> Categoria <span class="asterix"> * </span></label>
								<div class="col-md-6">
									@if(Session::get('gid') == 4)

										@if(request()->segment(3) != null)
											<input type="text" name="" value="{{ $ds->getCategory($row['categorias_id'])->nombre }}" class="form-control" disabled="">
											<select name='categorias_id' rows='5' id='categorias_id' class='hidden ' @if(Session::get('gid') != 1 ) disabled @endif required></select>
										@else
											<select name='categorias_id' rows='5' id='categorias_id' class='select2 ' required></select>
										@endif

									@else
										<select name='categorias_id' rows='5' id='categorias_id' class='select2 ' required></select>
									@endif
								</div>
								<div class="col-md-2">

								</div>
							</div>
							@if(Session::get('gid') != 4)
								<div class="form-group  " >
									<label for="Sub Categoria" class=" control-label col-md-4 text-left"> Sub Categoria <span class="asterix"> * </span></label>
									<div class="col-md-6">
										<select name='sub_categorias_id' rows='5' id='sub_categorias_id' class='select2 ' required  ></select>
									</div>
									<div class="col-md-2">

									</div>
								</div>
								<div class="form-group  " >
									<label for="Clasificación" class=" control-label col-md-4 text-left"> Clasificación <span class="asterix"> * </span></label>
									<div class="col-md-6">
										<select name='clasificacion_id' rows='5' id='clasificacion_id' class='select2 ' required  ></select>
									</div>
									<div class="col-md-2">

									</div>
								</div>
							@endif
							<div class="form-group  " >
								<label for="Incidencia" class=" control-label col-md-4 text-left"> Incidencia <span class="asterix"> * </span></label>
								<div class="col-md-6">
											  <textarea name='incidencia' rows='5' id='incidencia' class='form-control input-sm '
														required>{{ $row['incidencia'] }}</textarea>
								</div>
								<div class="col-md-2">

								</div>
							</div>
							@if(Session::get('gid') != 4 && Session::get('gid') != 3)
								<div class="form-group  " >
									<label for="Usuario" class=" control-label col-md-4 text-left"> Usuario <span class="asterix"> * </span></label>
									<div class="col-md-6">
										<select name='usuario_id' rows='5' id='usuario_id' class='select2 ' required @if(Session::get('gid') != 1 && Session::get('gid') != 2) disabled @endif ></select>
										@if(Session::get('gid') != 1 && Session::get('gid') != 2) 
											<input type="hidden" name="usuario_id" value="{{ $row['usuario_id'] }}" >
										@endif
									</div>
									<div class="col-md-2">

									</div>
								</div>
								<div class="form-group  " >
									<label for="Tecnico" class=" control-label col-md-4 text-left"> Tecnico <span class="asterix"> * </span></label>
									<div class="col-md-6">
										<select name='tecnico_id' rows='5' id='tecnico_id' class='select2 ' required @if(Session::get('gid') != 1 && Session::get('gid') != 2 ) disabled @endif ></select>
										@if(Session::get('gid') != 1 && Session::get('gid') != 2 ) 
											<input type="hidden" name="tecnico_id" value="{{ $row['tecnico_id'] }}" >
										@endif
									</div>
									<div class="col-md-2">

									</div>
								</div>
							@endif
							<!--<div class="form-group  " >
								<label for="Equipo" class=" control-label col-md-4 text-left"> Equipo <span class="asterix"> * </span></label>
								<div class="col-md-6">
									<select name='equipos_id' rows='5' id='equipos_id' class='select2 ' required  ></select>
								</div>
								<div class="col-md-2">

								</div>
							</div>-->

							@if(Session::get('gid') == 4 || Session::get('gid') == 3)

                                @if(Session::get('uid') == $row['usuario_id'] || $row['usuario_id'] == '')
                                    <input type="hidden" name="usuario_id" value="{{ Session::get('uid') }}">
                                @else
                                    <input type="hidden" name="usuario_id" value="{{ $row['usuario_id'] }}">
                                @endif
								<input type="hidden" name="estado" value="Pendiente">
							@endif

							@if(Session::get('gid') != 4 || Session::get('gid') != 3)
								<div class="form-group  " >
									<label for="Estado" class=" control-label col-md-4 text-left">
										Estado <span class="asterix"> * </span>
									</label>
									<div class="col-md-6">

										<input type='radio' name='estado' value ='Pendiente' required @if($row['estado'] == 'Pendiente') checked="checked" @endif class='minimal-red' > Pendiente

										<input type='radio' name='estado' value ='En proceso' required @if($row['estado'] == 'En proceso') checked="checked" @endif class='minimal-red' > En proceso

										<input type='radio' name='estado' value ='Finalizado' required @if($row['estado'] == 'Finalizado') checked="checked" @endif class='minimal-red' > Finalizado
									</div>
									<div class="col-md-2">

									</div>
								</div>
							@endif

						@endif
						{!! Form::hidden('created_at', $row['created_at']) !!}{!! Form::hidden('updated_at', $row['updated_at']) !!}
						</fieldset>
				</div>




				<div style="clear:both"></div>

				@if($ds->checkUserClosedTickets(Session::get('uid')) == 0 || Session::get('gid') != 4)
				<div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">
						<button type="submit" name="apply" class="btn btn-success " > {{ Lang::get('core.sb_apply') }}</button>
						<button type="submit" name="submit" class="btn btn-primary " > {{ Lang::get('core.sb_save') }}</button>
						<button type="button" onclick="location.href='{{ URL::to('tickets?return='.$return) }}' " class="btn btn-danger  ">  {{ Lang::get('core.sb_cancel') }} </button>
					</div>

				</div>
				@endif

				{!! Form::close() !!}
			</div>
		</div>
	</div>

	<script type="text/javascript">
        $(document).ready(function() {


            $("#categorias_id").jCombo("{!! url('tickets/comboselect?filter=categorias:id:nombre') !!}",
                {  selected_value : '{{ $row["categorias_id"] }}' });

            $("#sub_categorias_id").jCombo("{!! url('tickets/comboselect?filter=sub_categorias:id:nombre') !!}&parent=categorias_id:",
                {  parent: '#categorias_id', selected_value : '{{ $row["sub_categorias_id"] }}' });

            $("#clasificacion_id").jCombo("{!! url('tickets/comboselect?filter=clasificacion:id:nombre') !!}&parent=sub_categorias_id:",
                {  parent: '#sub_categorias_id', selected_value : '{{ $row["clasificacion_id"] }}' });

            $("#usuario_id").jCombo("{!! url('tickets/comboselect?filter=v_usuarios_no_tecnicos:tb_users_id:nombre') !!}",
                {  selected_value : '{{ $row["usuario_id"] }}' });

            $("#tecnico_id").jCombo("{!! url('tickets/comboselect?filter=v_usuarios_tecnicos:tb_users_id:nombre') !!}",
                {  selected_value : '{{ $row["tecnico_id"] }}' });

            {{--$("#equipos_id").jCombo("{!! url('tickets/comboselect?filter=equipos:id:nombre') !!}",
                {  selected_value : '{{ $row["equipos_id"] }}' });--}}


            $('.removeMultiFiles').on('click',function(){
                var removeUrl = '{{ url("tickets/removefiles?file=")}}'+$(this).attr('url');
                $(this).parent().remove();
                $.get(removeUrl,function(response){});
                $(this).parent('div').empty();
                return false;
            });

        });
	</script>
@stop