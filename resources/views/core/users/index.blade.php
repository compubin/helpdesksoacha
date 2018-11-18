@extends('layouts.app')

@section('content')
	{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}

	<section class="content-header">
		<h1>
			{{ Lang::get('core.m_users') }}
			<small>{{ $pageNote }}</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('dashboard') }}"> Home</a></li>
			<li><a href="{{ url('core/users') }}">  {{ Lang::get('core.m_users') }}</a></li>
			<li class="active">All</li>
		</ol>
	</section>



	<div class="content">
		<!-- Page header -->

		<div class="box box-primary ">
			<div class="box-header with-border">
				<div class="box-header-tools pull-left" >
					@if($access['is_add'] ==1)
						<a href="{{ URL::to('core/users/update') }}" class="tips btn btn-sm btn-success btn-circle"  title="{{ Lang::get('core.btn_create') }}">
							<i class="fa  fa-plus "></i></a>
					@endif
					@if($access['is_remove'] ==1)
						<a href="javascript://ajax"  onclick="TecnoDelete();" class="tips btn btn-sm btn-danger btn-circle" title="{{ Lang::get('core.btn_remove') }}">
							<i class="fa fa-trash-o"></i></a>
					@endif
					@if($access['is_excel'] ==1)
						<a href="{{ URL::to('core/users/download') }}" class="tips btn btn-sm btn-info btn-circle" title="{{ Lang::get('core.btn_download') }}">
							<i class="fa fa-cloud-download"></i></a>
					@endif
					{{--			<a href="{{ URL::to( 'core/users/search') }}" class="btn btn-sm btn-default btn-circle" onclick="TecnoModal(this.href,'Advance Search'); return false;" ><i class="fa fa-search"></i> </a>		--}}

				</div>


				<div class="box-header-tools pull-right" >
					{{--<a href="{{ url($pageModule) }}" class="btn btn-sm btn-primary tips btn-circle" title="Clear Search" ><i class="fa fa-spinner"></i></a>--}}
					@if(Session::get('gid') ==1)
						<a href="{{ URL::to('tecno/module/config/users') }}" class="btn btn-sm btn-success tips btn-circle" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa  fa-ellipsis-v"></i></a>
					@endif
				</div>
			</div>
			<div class="box-body ">



				{!! Form::open(array('url'=>'core/users/delete/', 'class'=>'form-horizontal' ,'id' =>'TecnoTable' )) !!}
				<div class="table-responsive" style="min-height:70px; padding-bottom: 70px;">
					<table class="table table-bordered table-hover table-users">
						<thead>
						<tr>
							<th class="number"> No </th>
							<th> <input type="checkbox" class="checkall" /></th>
							<th ><span>{{ Lang::get('core.btn_action') }}</span></th>

							@foreach ($tableGrid as $t)
								@if($t['view'] =='1')
									<th>{{ $t['label'] }}</th>
								@endif
							@endforeach

						</tr>
						</thead>

						<tbody></tbody>

					</table>
					<input type="hidden" name="md" value="" />
				</div>
				{!! Form::close() !!}
				{{--@include('footer')--}}
			</div>
		</div>

	</div>
	<style type="text/css">
		tr.cls_success td{background: green !important}
		tr.cls_failed td{background: red !important}
	</style>
	<script>
        $(document).ready(function(){

            $('.do-quick-search').click(function(){
                $('#TecnoTable').attr('action','{{ URL::to("core/users/multisearch")}}');
                $('#TecnoTable').submit();
            });

        });
	</script>
@section('custom-scripts')
	<script>
        $(document).ready(function(){

            $(function() {

                var count = 1;

                $('.table-users tfoot th').each( function () {
                    var title = $(this).text();

                    if(count != 2 && count != 3)
                    {
                        $(this).html( '<input type="text" class="form-control" placeholder="" />' );
                    }

                    count++;
                } );

                var table = $('.table-users').DataTable({
                    "order": [[ 0, "desc" ]],
                    // "columnDefs": [
                    //     {
                    //         "targets": [12],
                    //         "visible": false,
                    //         type: 'natural'
                    //     }
                    // ],
                    processing: true,
                    serverSide: true,
                    ajax: {
                        'url' : '{!! route('datatable-users') !!}',
                        "data": function ( d ) {
                            d.access_is_detail  = '{!! $access['is_detail'] !!}';
                            d.access_is_edit    = '{!! $access['is_edit'] !!}';
                            d.access_user_group = '{!! Session::get('gid') !!}';
                            d.access_user_id    = '{!! Session::get('uid') !!}';
                            d.access_return     = '{!! $return !!}';
                        }
                    },
                    columns: [
                        { data: 'tbuId', name: 'tbuId' },
                        { data: 'checkbox', name: 'checkbox', orderable: false, searchable: false },
                        { data: 'action', name: 'action', orderable: false, searchable: false },
                        { data: 'avatar', name: 'avatar' },
                        { data: 'grupo', name: 'grupo' },
                        { data: 'username', name: 'username' },
                        { data: 'first_name', name: 'first_name' },
                        { data: 'last_name', name: 'last_name' },
                        { data: 'email', name: 'email' },
                        { data: 'status', name: 'status' }
                    ]
                });

            });

        });
	</script>
@endsection
@stop