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
		        <li><a href="#"> Home</a></li>
		        <li><a href="{{ url('tecno/config') }}"> Configuration</a></li>
		        <li  class="active"> Translation </li>
		      </ol>
            </div>
            <!-- /.breadcrumb -->
        </div>

        <div class="row">
	        <div class="white-box">
		@include('tecno.config.tab',array('active'=>'translation'))
		 	
			<div class="col-sm-8">
				<ul class="nav nav-tabs" >
				@foreach($files as $f)
					@if($f != "." and $f != ".." and $f != 'info.json')
					<li @if($file == $f) class="active" @endif  >
					<a href="{{ URL::to('tecno/config/translation?edit='.$lang.'&file='.$f)}}">{{ $f }} </a></li>
					@endif
				@endforeach
				</ul>
				<hr />
				{!! Form::open(array('url'=>'tecno/config/savetranslation/', 'class'=>'form-vertical ')) !!}
					<table class="table table-striped">
						<thead>
							<tr>
								<th> Pharse </th>
								<th> Translation </th>

							</tr>
						</thead>
						<tbody>	
							
							<?php foreach($stringLang as $key => $val) : 
								if(!is_array($val)) 
								{
								?>
								<tr>	
									<td><?php echo $key ;?></td>
									<td><input type="text" name="<?php echo $key ;?>" value="{{ $val }}" class="form-control input-sm" />
									
									</td>
								</tr>
								<?php 
								} else {
									foreach($val as $k=>$v)
									{ ?>
										<tr>	
											<td><?php echo $key .' - '.$k ;?></td>
											<td><input type="text" name="<?php echo $key ;?>[<?php echo $k ;?>]" value="{{ $v }}" class="form-control  input-sm" />
											
											</td>
										</tr>						
									<?php }
								}
							endforeach; ?>
						</tbody>
						
					</table>
					<input type="hidden" name="lang" value="{{ $lang }}"  />
					<input type="hidden" name="file" value="{{ $file }}"  />
					<button type="submit" class="btn btn-info"> Save Translation</button>
				{!! Form::close() !!}
			</div>
			<div class="clr clear"></div>
		
				
		 	</div>
        </div>
    </div>    





@endsection