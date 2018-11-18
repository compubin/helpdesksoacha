@inject('ds', 'App\Services\DataService')

@extends('layouts.app')

@section('custom-scripts')
    <script type="text/javascript" src="{{ asset('assets/modules/asignacion_equipos.js') }}"></script>
@endsection

@section('content')

    <section class="content-header">
        <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('dashboard') }}"> Home</a></li>
            <li><a href="{{ url('asignacionequipos?return='.$return) }}"> {{ $pageTitle }} </a></li>
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
                    @if(Session::get('gid') ==1)
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

                {!! Form::open(array('url'=>'asignacionequipos/save?return='.$return, 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
                <ul class="nav nav-tabs"><li class="active"><a href="#Usuario" data-toggle="tab">Usuario</a></li>
                    <li class=""><a href="#Equipo" data-toggle="tab">Equipo</a></li>
                    <li class=""><a href="#Adicionales" data-toggle="tab">Adicionales</a></li>
                    <li class=""><a href="#Ofimatica-Software" data-toggle="tab">Ofimatica - Software</a></li>
                </ul><div class="tab-content"><div class="tab-pane m-t active" id="Usuario">
                        {!! Form::hidden('id', $row['id']) !!}
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Tecnico  <span class="asterix"> * </span>  </label>
                            <select name='tecnico_id' rows='5' id='tecnico_id' class='select2 ' required  ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Fecha  <span class="asterix"> * </span>  </label>

                            <div class="input-group m-b" style="width:150px !important;">
                                {!! Form::text('fecha', $row['fecha'],array('class'=>'form-control input-sm date')) !!}
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Secretaria  <span class="asterix"> * </span>  </label>
                            <select name='secretarias_id' rows='5' id='secretarias_id' class='select2 ' required  ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Dependencia  <span class="asterix"> * </span>  </label>
                            <select name='dependencias_id' rows='5' id='dependencias_id' class='select2 ' required  ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Sede  <span class="asterix"> * </span>  </label>
                            <select name='sedes_id' rows='5' id='sedes_id' class='select2 ' required  ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Usuario  <span class="asterix"> * </span>  </label>
                            <select name='usuario_id' rows='5' id='usuario_id' class='select2 ' required  ></select>
                        </div> {!! Form::hidden('created_at', $row['created_at']) !!}{!! Form::hidden('updated_at', $row['updated_at']) !!}
                    </div>

                    <div class="tab-pane m-t " id="Equipo">

                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Tipos Equipo    </label>
                            <select name='tipos_equipo_id' rows='5' id='tipos_equipo_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Equipo    </label>
                            <select name='equipos_id' rows='5' id='equipos_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Marca Equipo    </label>
                            <select name='marca_equipo_id' rows='5' id='marca_equipo_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Estado    </label>
                            <input  type='text' name='estado' id='estado' value='{{ $row['estado'] }}'
                                    class='form-control input-sm ' />
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Placa    </label>
                            <input  type='text' name='placa' id='placa' value='{{ $row['placa'] }}'
                                    class='form-control input-sm ' />
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Serial    </label>
                            <input  type='text' name='serial' id='serial' value='{{ $row['serial'] }}'
                                    class='form-control input-sm ' />
                        </div>
                    </div>

                    <div class="tab-pane m-t " id="Adicionales">

                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Disco Duro    </label>
                            <select name='disco_duro_id' rows='5' id='disco_duro_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Tipo Disco Duro    </label>
                            <select name='tipo_disco_duro_id' rows='5' id='tipo_disco_duro_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Serial Disco Duro    </label>
                            <input  type='text' name='serial_disco_duro' id='serial_disco_duro' value='{{ $row['serial_disco_duro'] }}'
                                    class='form-control input-sm ' />
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Memoria Ram    </label>
                            <select name='memoria_ram_id' rows='5' id='memoria_ram_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Tipo Memoria Ram    </label>
                            <select name='tipo_memoria_ram_id' rows='5' id='tipo_memoria_ram_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Frecuencia Memoria Ram    </label>
                            <select name='frecuencia_memoria_ram_id' rows='5' id='frecuencia_memoria_ram_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Procesador    </label>
                            <select name='procesador_id' rows='5' id='procesador_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Modelo Procesador    </label>
                            <select name='modelo_procesador_id' rows='5' id='modelo_procesador_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Marcas Procesador    </label>
                            <select name='marcas_procesador_id' rows='5' id='marcas_procesador_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Board    </label>
                            <select name='board_id' rows='5' id='board_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Marca Board    </label>
                            <select name='marca_board_id' rows='5' id='marca_board_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Unidad Optica    </label>
                            <input  type='text' name='unidad_optica' id='unidad_optica' value='{{ $row['unidad_optica'] }}'
                                    class='form-control input-sm ' />
                        </div>

                        <div class="form-group  " >
                            <hr>
                            <label for="ipt" class=" control-label "> Tarjeta Red    </label>

                            @php
                                $tarjeta_red_data = [];
                                if(!empty($row['tarjeta_red']))
                                {
                                $tarjeta_red = explode('|', rtrim($row['tarjeta_red'], '|'));
                                    foreach ($tarjeta_red AS $key => $element)
                                    {
                                        $tr_data = explode(',', $element);
                                        $tarjeta_red_data[] = str_replace('Modelo:', '', str_replace('Mac:', '', str_replace('Tipo:', '', $tr_data)));
                                    }
                                }
                            @endphp

                            <table class="table table-bordered table-box">
                                <thead>
                                <tr>
                                    <th style="width: 300px">Tarjeta de red</th>
                                    <th style="width: 300px">Mac</th>
                                    <th style="width: 300px">Modelo</th>
                                    <th style="width: 300px">Tipo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($tarjeta_red_data AS $keyTr => $elementTr)
                                    <tr>
                                        <td>
                                            <button class="btn btn-xs btn-success btn-add-tr">Agregar</button>
                                            <button class="btn btn-xs btn-danger btn-delete-tr">Eliminar</button>
                                        </td>
                                        <td>
                                            <input type="text" name="mac[tarjeta_red][]" class="form-control" value="{{ $elementTr[0] }}" maxlength="50">
                                        </td>
                                        <td>
                                            <input type="text" name="modelo[tarjeta_red][]" class="form-control" value="{{ $elementTr[1] }}" maxlength="50">
                                        </td>
                                        <td>
                                            <div>
                                                <label for="WiFi">WiFi</label>
                                                <input type="radio" name="tipo[tarjeta_red][]" id="WiFi" value="WiFi" @if(!empty($elementTr[2]) and $elementTr[2] == 'WiFi') checked @endif >
                                                <br>
                                                <label for="Lan">Lan</label>
                                                <input type="radio" name="tipo[tarjeta_red][]" id="Lan" value="Lan" @if(!empty($elementTr[2]) and $elementTr[2] == 'Lan') checked @endif>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            <button class="btn btn-xs btn-success btn-add-tr">Agregar</button>
                                            <button class="btn btn-xs btn-danger btn-delete-tr">Eliminar</button>
                                        </td>
                                        <td>
                                            <input type="text" name="mac[tarjeta_red][]" class="form-control" maxlength="50">
                                        </td>
                                        <td>
                                            <input type="text" name="modelo[tarjeta_red][]" class="form-control" maxlength="50">
                                        </td>
                                        <td>
                                            <div>
                                                <label for="WiFi">WiFi</label>
                                                <input type="radio" name="tipo[tarjeta_red][]" id="WiFi" value="WiFi" >
                                                <br>
                                                <label for="Lan">Lan</label>
                                                <input type="radio" name="tipo[tarjeta_red][]" id="Lan" value="Lan" >
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group  " >
                            <hr>
                            <label for="ipt" class=" control-label "> Tarjeta Video    </label>

                            @php
                                $tarjeta_video_data = [];
                                    if(!empty($row['tarjeta_video']))
                                    {
                                    $tarjeta_video = explode('|', rtrim($row['tarjeta_video'], '|'));
                                        foreach ($tarjeta_video AS $key => $element)
                                        {
                                            $tv_data = explode(',', $element);
                                            $tarjeta_video_data[] = str_replace('Modelo:', '', str_replace('Marca:', '', $tv_data));
                                        }
                                    }
                            @endphp

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 300px">Tarjeta de video</th>
                                    <th style="width: 300px">Marca</th>
                                    <th style="width: 300px">Modelo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($tarjeta_video_data AS $keyTv => $elementTv)
                                    <tr>
                                        <td>
                                            <button class="btn btn-xs btn-success btn-add-tv">Agregar</button>
                                            <button class="btn btn-xs btn-danger btn-delete-tv">Eliminar</button>
                                        </td>
                                        <td>
                                            <select name="marca[tarjeta_video][]" class="select2 marcas_select">
                                                <option value=""> -- Seleccione</option>
                                                @foreach($ds->getMarcas() AS $key => $marca)
                                                    <option value="{{ $marca->nombre }}" @if($elementTv[0] == $marca->nombre) selected @endif>{{ $marca->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="modelo[tarjeta_video][]" class="form-control" value="{{ $elementTv[1] }}" maxlength="50">
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            <button class="btn btn-xs btn-success btn-add-tv">Agregar</button>
                                            <button class="btn btn-xs btn-danger btn-delete-tv">Eliminar</button>
                                        </td>
                                        <td>
                                            <select name="marca[tarjeta_video][]" class="select2 marcas_select">
                                                <option value=""> -- Seleccione</option>
                                                @foreach($ds->getMarcas('Tarjeta de video') AS $key => $marca)
                                                    <option value="{{ $marca->nombre }}">{{ $marca->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="modelo[tarjeta_video][]" class="form-control" maxlength="50">
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="tab-pane m-t " id="Ofimatica-Software">

                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Sistema Operativo    </label>
                            <select name='sistema_operativo_id' rows='5' id='sistema_operativo_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Version Sistema Operativo    </label>
                            <select name='version_sistema_operativo_id' rows='5' id='version_sistema_operativo_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Velocidad So    </label>
                            <select name='velocidad_so_id' rows='5' id='velocidad_so_id' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Ofimatica    </label>
                            <select name='ofimatica[]' multiple rows='5' id='ofimatica' class='select2 '   ></select>
                        </div>
                        <div class="form-group  " >
                            <label for="ipt" class=" control-label "> Software    </label>
                            <select name='software[]' multiple rows='5' id='software' class='select2 '   ></select>
                        </div>
                    </div>




                    <div style="clear:both"></div>


                    <div class="form-group">
                        <label class="col-sm-4 text-right">&nbsp;</label>
                        <div class="col-sm-8">
                            <button type="submit" name="apply" class="btn btn-success " > {{ Lang::get('core.sb_apply') }}</button>
                            <button type="submit" name="submit" class="btn btn-primary " > {{ Lang::get('core.sb_save') }}</button>
                            <button type="button" onclick="location.href='{{ URL::to('asignacionequipos?return='.$return) }}' " class="btn btn-danger  ">  {{ Lang::get('core.sb_cancel') }} </button>
                        </div>

                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {


                $("#tecnico_id").jCombo("{!! url('asignacionequipos/comboselect?filter=v_usuarios_tecnicos:tb_users_id:nombre') !!}",
                    {  selected_value : '{{ $row["tecnico_id"] }}' });

                $("#secretarias_id").jCombo("{!! url('asignacionequipos/comboselect?filter=secretarias:id:nombre') !!}",
                    {  selected_value : '{{ $row["secretarias_id"] }}' });

                $("#dependencias_id").jCombo("{!! url('asignacionequipos/comboselect?filter=dependencias:id:nombre') !!}&parent=secretarias_id:",
                    {  parent: '#secretarias_id', selected_value : '{{ $row["dependencias_id"] }}' });

                $("#sedes_id").jCombo("{!! url('asignacionequipos/comboselect?filter=sedes:id:nombre') !!}",
                    {  selected_value : '{{ $row["sedes_id"] }}' });

                $("#usuario_id").jCombo("{!! url('asignacionequipos/comboselect?filter=v_usuarios:tb_user_id:nombres|apellidos') !!}&parent=dependencias_id:",
                    {  parent: '#dependencias_id', selected_value : '{{ $row["usuario_id"] }}' });

                $("#tipos_equipo_id").jCombo("{!! url('asignacionequipos/comboselect?filter=tipos_equipo:id:nombre') !!}",
                    {  selected_value : '{{ $row["tipos_equipo_id"] }}' });

                $("#equipos_id").jCombo("{!! url('asignacionequipos/comboselect?filter=equipos:id:nombre') !!}",
                    {  selected_value : '{{ $row["equipos_id"] }}' });

                $("#marca_equipo_id").jCombo("{!! url('asignacionequipos/comboselect?filter=marcas:id:nombre') !!}",
                    {  selected_value : '{{ $row["marca_equipo_id"] }}' });

                $("#disco_duro_id").jCombo("{!! url('asignacionequipos/comboselect?filter=disco_duro:id:nombre') !!}",
                    {  selected_value : '{{ $row["disco_duro_id"] }}' });

                $("#tipo_disco_duro_id").jCombo("{!! url('asignacionequipos/comboselect?filter=tipo_disco_duro:id:nombre') !!}",
                    {  selected_value : '{{ $row["tipo_disco_duro_id"] }}' });

                $("#memoria_ram_id").jCombo("{!! url('asignacionequipos/comboselect?filter=memoria_ram:id:nombre') !!}",
                    {  selected_value : '{{ $row["memoria_ram_id"] }}' });

                $("#tipo_memoria_ram_id").jCombo("{!! url('asignacionequipos/comboselect?filter=tipo_memoria_ram:id:nombre') !!}",
                    {  selected_value : '{{ $row["tipo_memoria_ram_id"] }}' });

                $("#frecuencia_memoria_ram_id").jCombo("{!! url('asignacionequipos/comboselect?filter=frecuencia_memoria_ram:id:nombre') !!}",
                    {  selected_value : '{{ $row["frecuencia_memoria_ram_id"] }}' });

                $("#procesador_id").jCombo("{!! url('asignacionequipos/comboselect?filter=procesador:id:nombre') !!}",
                    {  selected_value : '{{ $row["procesador_id"] }}' });

                $("#modelo_procesador_id").jCombo("{!! url('asignacionequipos/comboselect?filter=modelo:id:nombre') !!}",
                    {  selected_value : '{{ $row["modelo_procesador_id"] }}' });

                $("#marcas_procesador_id").jCombo("{!! url('asignacionequipos/comboselect?filter=marcas:id:nombre') !!}",
                    {  selected_value : '{{ $row["marcas_procesador_id"] }}' });

                $("#board_id").jCombo("{!! url('asignacionequipos/comboselect?filter=board:id:nombre') !!}",
                    {  selected_value : '{{ $row["board_id"] }}' });

                $("#marca_board_id").jCombo("{!! url('asignacionequipos/comboselect?filter=marcas:id:nombre') !!}",
                    {  selected_value : '{{ $row["marca_board_id"] }}' });

                $("#sistema_operativo_id").jCombo("{!! url('asignacionequipos/comboselect?filter=sistema_operativo:id:nombre') !!}",
                    {  selected_value : '{{ $row["sistema_operativo_id"] }}' });

                $("#version_sistema_operativo_id").jCombo("{!! url('asignacionequipos/comboselect?filter=version_sistema_operativo:id:nombre') !!}&parent=sistema_operativo_id:",
                    {  parent: '#sistema_operativo_id', selected_value : '{{ $row["version_sistema_operativo_id"] }}' });

                $("#velocidad_so_id").jCombo("{!! url('asignacionequipos/comboselect?filter=velocidad_so:id:nombre') !!}",
                    {  selected_value : '{{ $row["velocidad_so_id"] }}' });

                $("#ofimatica").jCombo("{!! url('asignacionequipos/comboselect?filter=ofimatica:nombre:nombre') !!}",
                    {  selected_value : '{{ $row["ofimatica"] }}' });

                $("#software").jCombo("{!! url('asignacionequipos/comboselect?filter=software:nombre:nombre') !!}",
                    {  selected_value : '{{ $row["software"] }}' });


                $('.removeMultiFiles').on('click',function(){
                    var removeUrl = '{{ url("asignacionequipos/removefiles?file=")}}'+$(this).attr('url');
                    $(this).parent().remove();
                    $.get(removeUrl,function(response){});
                    $(this).parent('div').empty();
                    return false;
                });

            });
        </script>
@stop