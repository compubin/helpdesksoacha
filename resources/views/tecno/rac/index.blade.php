@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
    <section class="content-header">
      <h1> {{ $pageTitle }} <small> {{ $pageNote }} </small></h1>
      <ol class="breadcrumb">
        <li><a href="#"> Home</a></li>
        <li  class="active"> {{ $pageTitle }} </li>
      </ol>
    </section>

  <div class="content"> 	

<div class="box box-primary">
	<div class="box-header with-border">
		<div class="box-header-tools pull-left" >
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('tecno/rac/update?return='.$return) }}" class="tips btn btn-sm btn-success btn-circle"  title="{{ Lang::get('core.btn_create') }}">
			<i class="fa  fa-plus "></i> </a>
			@endif  
			@if($access['is_remove'] ==1)
			<a href="javascript://ajax"  onclick="TecnoDelete();" class="tips btn btn-sm btn-danger btn-circle" title="{{ Lang::get('core.btn_remove') }}">
			<i class="fa fa-trash-o"></i></a>
			@endif 
							


		</div>

		<div class="box-header-tools pull-right" >

			<a href="{{ url($pageModule) }}" class=" tips btn btn-sm btn-primary btn-circle"  title="{{ Lang::get('core.btn_clearsearch') }}" ><i class="fa fa-spinner"></i>  </a>		
			@if(Session::get('gid') ==1)
				<a href="{{ URL::to('tecno/module/config/'.$pageModule) }}" class="tips btn btn-sm btn-success btn-circle" title=" {{ Lang::get('core.btn_config') }}" ><i class="fa  fa-ellipsis-v"></i></a>
			@endif 
		</div>
	</div>

	<div class="box-body "> 	
	

	 {!! (isset($search_map) ? $search_map : '') !!}
	
	 {!! Form::open(array('url'=>'tecno/rac/delete/0?return='.$return, 'class'=>'form-horizontal' ,'id' =>'TecnoTable' )) !!}
	 <div class="table-responsive" style="min-height:70px;  padding-bottom:60px;">
    <table class="table table-bordered table-hover  ">
        <thead>
			<tr>
				<th class="number"><span> No </span> </th>
				<th> <input type="checkbox" class="checkall" /></th>
				<th ><span>{{ Lang::get('core.btn_action') }}</span></th>
				
				@foreach ($tableGrid as $t)
					@if($t['view'] =='1')				
						<?php $limited = isset($t['limited']) ? $t['limited'] :''; ?>
						@if(SiteHelpers::filterColumn($limited ))						
							<th><span>{{ $t['label'] }}</span></th>			
						@endif 
					@endif
				@endforeach
				<th ><span> How To Use ?</span></th>
				
			  </tr>
        </thead>

        <tbody>        						
            @foreach ($rowData as $row)
                <tr>
					<td width="30"> {{ ++$i }} </td>
					<td width="50"><input type="checkbox" class="ids" name="ids[]" value="{{ $row->id }}" />  </td>	
					<td>
					 	<div class="dropdown">
						  <button class="btn btn-success btn-sm btn-outline btn-circle dropdown-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-arrow-down"></i>
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu">
						 	@if($access['is_detail'] ==1)
							<li><a href="{{ URL::to('tecno/rac/show/'.$row->id.'?return='.$return)}}" class="tips" title="{{ Lang::get('core.btn_view') }}"><i class="fa  fa-search "></i> {{ Lang::get('core.btn_view') }} </a></li>
							@endif
							@if($access['is_edit'] ==1)
							<li><a  href="{{ URL::to('tecno/rac/update/'.$row->id.'?return='.$return) }}" class="tips" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit "></i> {{ Lang::get('core.btn_edit') }} </a></li>
							@endif
						  </ul>
						</div>

					</td>

				 @foreach ($tableGrid as $field)
					 @if($field['view'] =='1')
					 	<?php $limited = isset($field['limited']) ? $field['limited'] :''; ?>
					 	@if(SiteHelpers::filterColumn($limited ))
						 <td>					 
						 	{!! SiteHelpers::formatRows($row->{$field['field']},$field ,$row ) !!}						 
						 </td>
						@endif	
					 @endif					 
				 @endforeach	
				 <td> <a class="btn btn-xs btn-success"href="{{ URL::to('tecno/rac/show/'.$row->id.'?return='.$return) }}"><i class="fa fa-question-circle"></i> Usage </a></td>	 
                </tr>
				
            @endforeach
              
        </tbody>
      
    </table>
	<input type="hidden" name="md" value="" />
	</div>
	{!! Form::close() !!}
	@include('footer')
	</div>
</div>	  
</div>	
	
@stop