@extends('layouts.app')


@section('content')



<div class="container-fluid">
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ $pageTitle }} <small> {{ $pageNote }} </small> </h4> 
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
	      <ol class="breadcrumb">
	        <li><a href="{{ url('dashboard') }}"> Home</a></li>
	        <li><a href="{{ url('tecno/config') }}"> Configuration</a></li>
	        <li  class="active"> Translation </li>
	      </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>

    <div class="row">
        <div class="white-box">

	 @include('tecno.config.tab',array('active'=>'translation'))
 	{!! Form::open(array('url'=>'tecno/config/translation/', 'class'=>'form-vertical row')) !!}
		
		<div class="col-sm-9">
		
			<a href="{{ URL::to('tecno/config/addtranslation')}} " onclick="TecnoModal(this.href,'Add New Language');return false;" class="btn btn-success"><i class="fa fa-plus"></i> New </a>  
			<hr />
			<table class="table table-striped">
				<thead>
					<tr>
						<th> Name </th>
						<th> Folder </th>
						<th> Author </th>
						<th> Action </th>
					</tr>
				</thead>
				<tbody>		
			
				@foreach(SiteHelpers::langOption() as $lang)
					<tr>
						<td>  {{  $lang['name'] }}   </td>
						<td> {{  $lang['folder'] }} </td>
						<td> {{  $lang['author'] }} </td>
					  	<td>
						@if($lang['folder'] !='en')
						<a href="{{ URL::to('tecno/config/translation?edit='.$lang['folder'])}} " class="btn btn-sm btn-primary"> Manage </a>
						<a href="{{ URL::to('tecno/config/removetranslation/'.$lang['folder'])}} " class="btn btn-sm btn-danger"> Delete </a> 
						 
						@endif 
					
					</td>
					</tr>
				@endforeach
				
				</tbody>
			</table>
		</div> 

		{!! Form::close() !!}

			
	 	</div>
    </div>


</div>


@endsection