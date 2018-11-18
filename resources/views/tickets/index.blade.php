@inject('ds', 'App\Services\DataService')

@extends('layouts.app')

@section('content')
    {{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
    <section class="content-header">
        <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('dashboard') }}"> Home</a></li>
            <li  class="active"> {{ $pageTitle }} </li>
        </ol>
    </section>

    <div class="content">

        <div class="box box-primary">
            <div class="box-header with-border">

                <div class="box-header-tools pull-left" >
                    @if($access['is_add'] ==1)
                        <a href="{{ url('tickets/update?return='.$return) }}" class="tips btn btn-success btn-circle btn-sm"  title="{{ Lang::get('core.btn_create') }}">
                            <i class=" fa fa-plus "></i></a>
                        <a href="javascript://ajax" class="btn btn-sm btn-info copy btn-circle" title="Copy" ><i class="fa  fa-file-o"></i> </a>
                    @endif
                    @if($access['is_remove'] ==1)
                        <a href="javascript://ajax"  onclick="TecnoDelete();" class="tips btn btn-danger btn-sm btn-circle" title="{{ Lang::get('core.btn_remove') }}">
                            <i class="fa fa-trash-o"></i> </a>
                    @endif

                </div>

                <div class="box-header-tools pull-right" >

                    @if($access['is_add'] ==1)
                        <a href="{{ URL::to($pageModule .'/import?return='.$return) }}" onclick="TecnoModal(this.href, 'Import CSV'); return false;" class="tips btn btn-xs btn-warning btn-circle" title="Import CSV">
                            <i class="fa  fa-arrow-up"></i></a>
                    @endif

                    @if($access['is_excel'] ==1)
                        <a href="{{ url( $pageModule .'/export/excel?return='.$return) }}" class="tips  btn btn-primary btn-xs btn-circle"  title="Excel"><i class="fa  fa-arrow-down"></i> </a>
                    @endif

                    @if(Session::get('gid') ==1)
                        <a href="{{ url('tecno/module/config/'.$pageModule) }}" class="tips btn btn-success btn-sm btn-circle" title=" {{ Lang::get('core.btn_config') }}" ><i class="icon-options-vertical"></i></a>
                    @endif
                </div>


            </div>
            <div class="box-body ">
                {!! (isset($search_map) ? $search_map : '') !!}
                {!! Form::open(array('url'=>'tickets/delete/', 'class'=>'form-horizontal' ,'id' =>'TecnoTable' )) !!}
                    <div class="table-responsive" style="min-height:300px; padding-bottom:60px; border: none !important">
                    <table class="table table-bordered table-hover table-tickets" id="{{ $pageModule }}Table">
                        <thead>
                            <tr>
                            <th class="number"> No </th>
                            <th> <input type="checkbox" class="checkall" /></th>
                            <th width="50" style="width: 50px;">{{ Lang::get('core.btn_action') }}</th>

                            @foreach ($tableGrid as $t)
                                @if($t['view'] =='1')
                                    <?php $limited = isset($t['limited']) ? $t['limited'] : '';
                                    if (SiteHelpers::filterColumn($limited)) {
                                        $addClass = 'class="tbl-sorting" ';
                                        if ($insort == $t['field']) {
                                            $dir_order = ($inorder == 'desc' ? 'sort-desc' : 'sort-asc');
                                            $addClass = 'class="tbl-sorting ' . $dir_order . '" ';
                                        }
                                        echo '<th align="' . $t['align'] . '" ' . $addClass . ' width="' . $t['width'] . '">' . \SiteHelpers::activeLang($t['label'], (isset($t['language']) ? $t['language'] : array())) . '</th>';
                                    }
                                    ?>
                                @endif
                            @endforeach
                            <th align="left" class="tbl-sorting" width="100">Semaforo</th>
                            <th align="left" class="tbl-sorting" width="100">Semaforo Search</th>
                        </tr>
                        </thead>

                        <tbody>
                            {{--@foreach ($rowData as $row)--}}
                                {{--@if(Session::get('gid') == 3)--}}
                                    {{--@include('tickets.partials.technical_tickets')--}}
                                {{--@else--}}
                                    {{--@include('tickets.partials.global_tickets')--}}
                                {{--@endif--}}
                            {{--@endforeach--}}
                        </tbody>
                    </table>
                    <input type="hidden" name="md" value="" />
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    <style>
        .table th , th { text-align: none !important;  }
        .table th.right { text-align:right !important;}
        .table th.center { text-align:center !important;}

    </style>
@stop

@section('custom-scripts')
    <script>
        $(document).ready(function(){
            $(function() {
                var count = 1;
                $('.table-tickets tfoot th').each( function () {
                    var title = $(this).text();
                    if(count != 2 && count != 3)
                    {
                        $(this).html( '<input type="text" class="form-control" placeholder="" />' );
                    }
                    count++;
                } );

                var table = $('.table-tickets').DataTable({
                    "order": [[ 0, "desc" ]],
                    "columnDefs": [
                        {
                            "targets": [12],
                            "visible": false,
                            type: 'natural'
                        }
                    ],
                    processing: true,
                    serverSide: true,
                    ajax: {
                        'url' : '{!! route('datatable.tickets') !!}',
                        "data": function ( d ) {
                            d.access_is_detail  = '{!! $access['is_detail'] !!}';
                            d.access_is_edit    = '{!! $access['is_edit'] !!}';
                            d.access_user_group = '{!! Session::get('gid') !!}';
                            d.access_user_id    = '{!! Session::get('uid') !!}';
                            d.access_return     = '{!! $return !!}';
                        }
                    },
                    columns: [
                        { data: 'ticketId', name: 'ticketId' },
                        { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
                        { data: 'action', name: 'action', orderable: false, searchable: false },
                        { data: 'categoria', name: 'categoria' },
                        { data: 'subcategoria', name: 'subcategoria' },
                        { data: 'clasificacion', name: 'clasificacion' },
                        { data: 'usuario', name: 'usuario' },
                        { data: 'tecnico', name: 'tecnico' },
                        { data: 'estado', name: 'estado' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'updated_at', name: 'updated_at' },
                        { data: 'semaforo', name: 'semaforo' },
                        { data: 'semaforo_search', name: 'semaforo_search' }
                    ]
                });

//                table.columns().every( function () {
//                    var that = this;
//
//                    $( 'input', this.footer() ).on( 'keyup change', function () {
//                        if ( that.search() !== this.value ) {
//                            that
//                                .search( this.value )
//                                .draw();
//                        }
//                    } );
//                } );

            });

        });
    </script>
@endsection