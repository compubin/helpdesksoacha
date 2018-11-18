@extends('layouts.app')

@section('content')
    <section class="content-header">
      <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
         <li><a href="{{ url('rac?return='.$return) }}"> {{ $pageTitle }} </a></li>
        <li  class="active"> View </li>
      </ol>
    </section>

  <div class="content"> 

<div class="box box-primary">
	<div class="box-header with-border">
		<div class="box-header-tools pull-left" >
	   		<a href="{{ url('tecno/rac?return='.$return) }}" class="tips btn btn-sm btn-success btn-circle" title="{{ Lang::get('core.btn_back') }}"><i class="fa  fa-arrow-left"></i></a>
			@if($access['is_add'] ==1)
	   		<a href="{{ url('tecno/rac/update/'.$id.'?return='.$return) }}" class="tips btn btn-sm btn-info btn-circle" title="{{ Lang::get('core.btn_edit') }}"><i class="fa  fa-pencil"></i></a>
			@endif 
					
		</div>	

		<div class="box-header-tools pull-right " >
			<a href="{{ ($prevnext['prev'] != '' ? url('tecno/rac/show/'.$prevnext['prev'].'?return='.$return ) : '#') }}" class="tips btn btn-sm btn-warning btn-circle"><i class="fa fa-arrow-left"></i>  </a>	
			<a href="{{ ($prevnext['next'] != '' ? url('tecno/rac/show/'.$prevnext['next'].'?return='.$return ) : '#') }}" class="tips btn btn-sm btn-warning btn-circle"> <i class="fa fa-arrow-right"></i>  </a>
			@if(Session::get('gid') ==1)
				<a href="{{ URL::to('tecno/module/config/'.$pageModule) }}" class="tips btn btn-sm btn-success btn-circle" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa  fa-ellipsis-v"></i></a>
			@endif 			
		</div>


	</div>
	<div class="box-body" > 	
	<div style="padding: 20px;">
	<b>ID</b> : {{ SiteHelpers::formatLookUp($row->apiuser,'apiuser','1:tb_users:id:email') }} <br />
	<b> KEY </b> : {{ $row->apikey}}
	</div>

							<?php
					 			$am = explode(',',$row->modules);
					 			
					 		?>
					 		<table class="table table-bordered table-striped tableapi">
					 			<thead>
					 				<tr>
					 					<th>Module</th>
					 					<th>Path</th>
					 					<th>Action</th>
					 					<th>Route Name</th>
					 				</tr>

					 			</thead>
					 			@foreach($am as $m)
					 			<tbody>
					 				<tr>
					 					<td colspan="4"><h5>{{ $m}}</h5></td>

					 				</tr>
					 				<tr>
						 				<td><b>GET</b></td>
						 				<td>{{ url('tecnoapi?module='.$m) }}</td>
						 				<td>index</td>
						 				<td>tecnoapi.index</td>
					 				</tr>
						 				<td><b>POST</b></td>
						 				<td>{{ url('tecnoapi?module='.$m) }}</td>
						 				<td>store</td>
						 				<td>tecnoapi.store</td>
					 				</tr>
					 				</tr>
						 				<td><b>GET</b></td>
						 				<td>{{ url('tecnoapi/id?module='.$m) }}</td>
						 				<td>show</td>
						 				<td>tecnoapi.show</td>
					 				</tr>
					 				</tr>
						 				<td><b>PUT/PATCH</b></td>
						 				<td>{{ url('tecnoapi/id?module='.$m) }}</td>
						 				<td>update</td>
						 				<td>tecnoapi.update</td>
					 				</tr>
					 				</tr>
						 				<td><b>DELETE</b></td>
						 				<td>{{ url('tecnoapi/id?module='.$m) }}</td>
						 				<td>destroy</td>
						 				<td>tecnoapi.destroy</td>
					 				</tr>

					 			@endforeach	

					 			</tbody>

					 		</table>	


	 
	
	</div>
</div>	
</div>
	  
@stop