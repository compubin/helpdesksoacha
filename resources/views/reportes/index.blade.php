@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1> Reportes <small> Generación de reportes </small></h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('dashboard') }}"> Home</a></li>
            <li><a href="{{ url('reportes') }}"> Reportes </a></li>
            <li  class="active"> Generar </li>
        </ol>
    </section>

    <div class="content">

        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(array('url'=> route('reportes.generate'), 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
                <div class="col-md-6 col-md-offset-3">
                    @if(session('status'))
                        <div class="alert alert-warning" role="alert">
                            <p class="text-center">
                                {{ session('status') }}
                            </p>
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <fieldset>
                        <legend> Reportes</legend>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group  " >
                                    <label for="fecha_desde" class=" control-label col-md-2 col-md-offset-4 text-left"> Desde:</label>
                                    <div class="col-md-6">
                                        <input  type='date' name='fecha_desde' id='fecha_desde' value='' class='form-control input-sm ' />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  " >
                                    <label for="fecha_hasta" class=" control-label col-md-2 text-left"> Hasta:</label>
                                    <div class="col-md-6">
                                        <input  type='date' name='fecha_hasta' id='fecha_hasta' value='' class='form-control input-sm ' />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="form-group  " >
                                    <label for="usuario" class=" control-label col-md-2 text-left"> Usuario:</label>
                                    <div class="col-md-6">
                                        <select name="usuario" id="usuario" class="form-control select2">
                                            <option value="">-- Seleccione</option>
                                            @foreach($usuarios AS $key => $element)
                                                <option value="{{ $element->tb_user_id }}">{{ $element->usuario }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="form-group  " >
                                    <label for="dependencia" class=" control-label col-md-2 text-left"> Dependencia:</label>
                                    <div class="col-md-6">
                                        <select name="dependencia" id="dependencia" class="form-control select2">
                                            <option value="">-- Seleccione</option>
                                            @foreach($dependencias AS $key => $element)
                                                <option value="{{ $element->id }}">{{ $element->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="form-group  " >
                                    <label for="secretaria" class=" control-label col-md-2 text-left"> Secretaría:</label>
                                    <div class="col-md-6">
                                        <select name="secretaria" id="secretaria" class="form-control select2">
                                            <option value="">-- Seleccione</option>
                                            @foreach($secretarias AS $key => $element)
                                                <option value="{{ $element->id }}">{{ $element->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="form-group  " >
                                    <label for="tecnico" class=" control-label col-md-2 text-left"> Técnico:</label>
                                    <div class="col-md-6">
                                        <select name="tecnico" id="tecnico" class="form-control select2">
                                            <option value="">-- Seleccione</option>
                                            @foreach($tecnicos AS $key => $element)
                                                <option value="{{ $element->tb_users_id }}">{{ $element->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="form-group  " >
                                    <label for="categoria" class=" control-label col-md-2 text-left"> Categoría:</label>
                                    <div class="col-md-6">
                                        <select name="categoria" id="categoria" class="form-control select2">
                                            <option value="">-- Seleccione</option>
                                            @foreach($categorias AS $key => $element)
                                                <option value="{{ $element->id }}">{{ $element->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="form-group  " >
                                    <label for="estado" class=" control-label col-md-2 text-left"> Estado:</label>
                                    <div class="col-md-6">
                                        <select name="estado" id="estado" class="form-control select2">
                                            <option value="">-- Seleccione</option>
                                            @foreach($estados AS $key => $element)
                                                <option value="{{ $element }}">{{ $element }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="form-group  " >
                                    <label for="tipo_solicitud" class=" control-label col-md-2 text-left"> Tipo solicitud:</label>
                                    <div class="col-md-6">
                                        <select name="tipo_solicitud" id="tipo_solicitud" class="form-control select2">
                                            <option value="">-- Seleccione</option>
                                            @foreach($tipoSolicitud AS $key => $element)
                                                <option value="{{ $element }}">{{ $element }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <div class="form-group  " >
                                    <label for="calificacion" class=" control-label col-md-2 text-left"> Calificación:</label>
                                    <div class="col-md-6">
                                        <select name="calificacion" id="calificacion" class="form-control select2">
                                            <option value="">-- Seleccione</option>
                                            @foreach($calificacion AS $key => $element)
                                                <option value="{{ $element }}">{{ $element }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </div>

                <div style="clear:both"></div>

                <div class="form-group">
                    <label class="col-sm-4 text-right">&nbsp;</label>
                    <div class="col-sm-8">
                        <button type="submit" name="apply" class="btn btn-success " > {{ Lang::get('core.sb_apply') }}</button>
                        <button type="submit" name="submit" class="btn btn-primary " > {{ Lang::get('core.sb_save') }}</button>
                        <button type="button" onclick="location.href='{{ URL::to('reportes') }}' " class="btn btn-danger  ">  {{ Lang::get('core.sb_cancel') }} </button>
                    </div>

                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop