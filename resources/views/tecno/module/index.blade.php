@extends('layouts.app')

@section('content')


    <div class="container-fluid">
        <div class="row bg-title">
            <!-- .page title -->
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Module Management</h4> </div>
            <!-- /.page title -->
            <!-- .breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Module Management</li>
                </ol>
            </div>
            <!-- /.breadcrumb -->
        </div>

<!-- .row -->
        <div class="row">
            
            <div class="white-box">
                    <div class="row row-in">
                        {{--<div class="col-lg-3 col-sm-6 row-in-br">
                            <ul class="col-in">
                                <li>
                                    <a href="{{ url('tecno/module/create') }}">
                                        <span class="circle circle-md bg-danger"><i class="ti-plus"></i></span>
                                    </a>    
                                </li>
                                <li >
                                    <h4>New Module</h4>
                                    <p> {{ Lang::get('core.fr_createmodule') }}</p>
                                    
                                </li>
                            </ul>
                        </div>--}}
                        {{--<div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                            <ul class="col-in">
                                <li>
                                    <a href="javascript:void(0)" class="clear " onclick="$('.unziped').toggle()">
                                        <span class="circle circle-md bg-info"><i class="ti-import"></i></span>
                                    </a>    
                                </li>
                                <li >
                                    <h4>{{ Lang::get('core.btn_install') }} </h4>
                                    <p>{{ Lang::get('core.fr_installmodule') }}</p>
                                </li>
                            </ul>
                        </div>--}}
                        {{--<div class="col-lg-3 col-sm-6 row-in-br">
                            <ul class="col-in">
                                <li>
                                    <a href="{{ url('tecno/module/package') }}" class="post_url">
                                        <span class="circle circle-md bg-success"><i class=" ti-export"></i></span>
                                    </a>    
                                </li>
                                <li>
                                    <h4>{{ Lang::get('core.btn_backup') }}</h4>
                                  
                                    
                                </li>
                            </ul>
                        </div>--}}
                        <div class="col-lg-3 col-sm-6  b-0">
                            <ul class="col-in">
                                <li>
                                    <a href="{{ url('tecno/tables') }}">
                                        <span class="circle circle-md bg-warning"><i class="fa fa-database"></i></span>
                                    </a>    
                                </li>
                               
                                <li >
                                    <h4> DataBase</h4>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

        </div>
        <!-- .row -->




        <div class="row">
        	<div class="white-box">

      <div class="p-sm m-b unziped" style=" display:none; padding: 5px 5px 30px ; margin-bottom:10px;">
       {!! Form::open(array('url'=>'tecno/module/install/', 'class'=>'breadcrumb-search','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
        <h3>Select File ( Module zip installer ) </h3>
        <p>  <input type="file" name="installer" required style="float:left;">  <button type="submit" class="btn btn-primary btn-sm" style="float:left;"  ><i class=" icon-arrow-up-circle "></i> Install</button></p>
        </form>
        <div class="clr" style="clear: both;"></div>
      </div>    


<ul class="nav nav-tabs" style="margin-bottom:10px;">
<li @if($type =='addon') class="active" @endif><a href="{{ URL::to('tecno/module')}}"> {{ Lang::get('core.tab_installed') }}  </a></li>
<li @if($type =='core') class="active" @endif><a href="{{ URL::to('tecno/module?t=core')}}"> {{ Lang::get('core.tab_core') }}</a></li>
</ul>     

@if($type =='core')

 <div class="infobox infobox-info fade in">
  <button type="button" class="close" data-dismiss="alert"> x </button>  
  <p>   Do not <b>Rebuild</b> or Change any Core Module </p>	
</div>	
 
@endif

<div class="table-responsive"  style="min-height:400px; padding-bottom: 200px;"> 


{!! Form::open(array('url'=>'tecno/module/package#', 'class'=>'form-horizontal' ,'ID' =>'TecnoTable' )) !!}

@if(count($rowData) >=1) 
<table class="table table-hover  ">
	<thead>
	<tr>
		<th>Action</th>					
		<th><input type="checkbox" class="checkall" /></th>
		<th>Module</th>
        <th>Type</th>
		
		<th>Controller</th>
		<th>Database</th>
		<th>PRI</th>
		<th>Created</th>

	</tr>
	</thead>
<tbody>
@foreach ($rowData as $row)
	<tr>		
		<td>
		<div class="btn-group ">
		<button class="btn btn-success btn-sm  btn-outline dropdown-toggle" data-toggle="dropdown">
		<I class="ti-align-justify"></I> <span class="caret"></span>
		</button>
			<ul  class="dropdown-menu icons-right " style="z-index: 999999">
				@if($type != 'core')
				<li><a href="{{ URL::to($row->module_name)}}"> {{ Lang::get('core.btn_view') }} Module </a></li>
				<li><a href="{{ URL::to('tecno/module/duplicate/'.$row->module_id)}}" onclick="TecnoModal(this.href,'Duplicate/Clone Module'); return false;" > Duplicate/Clone </a></li>						
				@endif
				<li><a href="{{ URL::to('tecno/module/config/'.$row->module_name)}}"> {{ Lang::get('core.btn_edit') }}</a></li>	
				
				@if($type != 'core')
				<li><a href="javascript://ajax" onclick="TecnoConfirmDelete('{{ URL::to('tecno/module/destroy/'.$row->module_id)}}')"> {{ Lang::get('core.btn_remove') }}</a></li>
				<li class="divider"></li>
				<li><a href="{{ URL::to('tecno/module/rebuild/'.$row->module_id)}}"> Rebuild All Codes</a></li>
				@endif
			</ul>
		</div>					
		</td>
		<td>
		 
		<input type="checkbox" class="ids" name="id[]" value="{{ $row->module_id }}" /> </td>
		<td>{{ $row->module_title }} </td>
        <td>{{ $row->module_type }} </td>
		<td>{{ $row->module_name }} </td>

		<td>{{ $row->module_db }} </td>
		<td>{{ $row->module_db_key }} </td>
		<td>{{ $row->module_created }} </td>
	</tr>
@endforeach	
</tbody>		
</table>
{!! Form::close() !!}
</div>
@else

<p class="text-center" style="padding:50px 0;">{{ Lang::get('core.norecord') }} 
<br /><br />
<a href="{{ URL::to('tecno/module/create')}}" class="btn btn-success "><i class="fa fa-plus"></i> {{ Lang::get('core.fr_createmodule') }} </a>
 </p>	
@endif
</div>	

</div>
</div>

  <script language='javascript' >
  jQuery(document).ready(function($){
    $('.post_url').click(function(e){
      e.preventDefault();
      if( ( $('.ids',$('#TecnoTable')).is(':checked') )==false ){
        alert( $(this).attr('data-title') + " not selected");
        return false;
      }
      $('#TecnoTable').attr({'action' : $(this).attr('href') }).submit();
    });


  })
  </script>        





@stop