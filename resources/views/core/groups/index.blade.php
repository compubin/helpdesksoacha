@extends('layouts.app')

@section('content')
{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}

    <section class="content-header">
      <h1>
        {{ Lang::get('core.m_groups') }} 
        <small>{{ $pageNote }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('dashboard') }}"> Home</a></li>
         <li><a href="{{ url('core/groups') }}">  {{ Lang::get('core.m_groups') }}</a></li>
        <li class="active">All</li>
      </ol>
    </section>



 <div class="content">
    <!-- Page header -->



<div class="box box-primary ">
	<div class="box-header with-border"> 
		<div class="box-header-tools pull-left" >
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('core/groups/update') }}" class="tips btn btn-sm btn-success btn-circle"  title="{{ Lang::get('core.btn_create') }}">
			<i class="fa  fa-plus"></i></a>
			@endif  
			@if($access['is_remove'] ==1)
			<a href="javascript://ajax"  onclick="TecnoDelete();" class="tips btn btn-sm btn-danger btn-circle" title="{{ Lang::get('core.btn_remove') }}">
			<i class="fa fa-trash-o"></i></a>
			@endif 		
						
		</div>
	</div>
	<div class="box-body "> 	



	 {!! Form::open(array('url'=>'core/groups/delete/', 'class'=>'form-horizontal' ,'id' =>'TecnoTable' )) !!}
	 <div class="table-responsive" style="min-height:50px;  padding-bottom: 70px;">
    <table class="table table-bordered table-hover ">
        <thead>
			<tr>
				<th class="number"> No </th>
				<th> <input type="checkbox" class="checkall" /></th>
				<th width="70" >{{ Lang::get('core.btn_action') }}</th>
				
				@foreach ($tableGrid as $t)
					@if($t['view'] =='1')
						<th>{{ $t['label'] }}</th>
					@endif
				@endforeach
				
			  </tr>
        </thead>

        <tbody>
						
            @foreach ($rowData as $row)
                <tr>
					<td width="30"> {{ ++$i }} </td>
					<td width="50"><input type="checkbox" class="ids" name="id[]" value="{{ $row->group_id }}" />  </td>
					<td>
					 	<div class="dropdown">
						  <button class="btn btn-success btn-sm dropdown-toggle btn-outline btn-circle" type="button" data-toggle="dropdown"> <i class="fa fa-arrow-down"></i>
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu">
						 	@if($access['is_detail'] ==1)
							<li><a href="{{ URL::to('core/groups/show/'.$row->group_id.'?return='.$return)}}" class="tips" title="{{ Lang::get('core.btn_view') }}"><i class="fa  fa-search "></i> {{ Lang::get('core.btn_view') }} </a></li>
							@endif
							@if($access['is_edit'] ==1)
							<li><a  href="{{ URL::to('core/groups/update/'.$row->group_id.'?return='.$return) }}" class="tips" title="{{ Lang::get('core.btn_edit') }}"><i class="fa fa-edit "></i> {{ Lang::get('core.btn_edit') }} </a></li>
							@endif
						  </ul>
						</div>

					</td>														
				 @foreach ($tableGrid as $field)
					 @if($field['view'] =='1')
					 <td>					 
					 	{!! SiteHelpers::formatRows($row->{$field['field']},$field ,$row ) !!}					 
					 </td>
					 @endif					 
				 @endforeach
				 
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
<script>
$(document).ready(function(){

	$('.do-quick-search').click(function(){
		$('#TecnoTable').attr('action','{{ URL::to("cpre/groups/multisearch")}}');
		$('#TecnoTable').submit();
	});
	
});	
</script>		
@stop