@extends('layouts.app')

@section('content')

	<section class="content-header">
		<h1>
			{{ Lang::get('core.m_users') }}
			<small>{{ $pageNote }}</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('dashboard') }}"> Home</a></li>
			<li><a href="{{ url('core/users') }}">  {{ Lang::get('core.m_users') }} </a></li>
			<li class="active">Edit / Update</li>
		</ol>
	</section>



	<div class="content">

		<div class="box box-danger ">

			<div class="box-body">
				<ul class="parsley-error-list">
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>

				{!! Form::open(array('url'=>'core/users/save?return='.$return, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}
				<div class="col-md-6">


					<div class="form-group hidethis " style="display:none;">
						<label for="Id" class=" control-label col-md-4 text-left"> Id </label>
						<div class="col-md-6">
							{!! Form::text('id', $row['id'],array('class'=>'form-control input-sm', 'placeholder'=>'',   )) !!}
						</div>
						<div class="col-md-2">

						</div>
					</div>
					<div class="form-group  " >
						<label for="Group / Level" class=" control-label col-md-4 text-left"> Group / Level <span class="asterix"> * </span></label>
						<div class="col-md-6">
							<select name='group_id' rows='5' id='group_id' code='{$group_id}'
									class='select2 form-control  input-sm'  required  ></select>
						</div>
						<div class="col-md-2">

						</div>
					</div>
					<div class="form-group  " >
						<label for="Username" class=" control-label col-md-4 text-left"> Username <span class="asterix"> * </span></label>
						<div class="col-md-6">
							{!! Form::text('username', $row['username'],array('class'=>'form-control  input-sm', 'placeholder'=>'', 'required'=>'true'  )) !!}
						</div>
						<div class="col-md-2">

						</div>
					</div>
					<div class="form-group  " >
						<label for="First Name" class=" control-label col-md-4 text-left"> First Name <span class="asterix"> * </span></label>
						<div class="col-md-6">
							{!! Form::text('first_name', $row['first_name'],array('class'=>'form-control  input-sm', 'placeholder'=>'', 'required'=>'true'  )) !!}
						</div>
						<div class="col-md-2">

						</div>
					</div>
					<div class="form-group  " >
						<label for="Last Name" class=" control-label col-md-4 text-left"> Last Name </label>
						<div class="col-md-6">
							{!! Form::text('last_name', $row['last_name'],array('class'=>'form-control  input-sm', 'placeholder'=>'',   )) !!}
						</div>
						<div class="col-md-2">

						</div>
					</div>
					<div class="form-group  " >
						<label for="Email" class=" control-label col-md-4 text-left"> Email <span class="asterix"> * </span></label>
						<div class="col-md-6">
							{!! Form::text('email', $row['email'],array('class'=>'form-control  input-sm', 'placeholder'=>'', 'required'=>'true', 'parsley-type'=>'email'   )) !!}
						</div>
						<div class="col-md-2">

						</div>
					</div>

					<div class="form-group  " >
						<label for="Status" class=" control-label col-md-4 text-left"> Status <span class="asterix"> * </span></label>
						<div class="col-md-6">
							<input type='radio' name='active' value ='1' required @if($row['active'] == '1') checked="checked" @endif class="minimal-red" > Active

							<input type='radio' name='active' value ='0' required @if($row['active'] == '0') checked="checked" @endif class="minimal-red" > Inactive

							<input type='radio' name='active' value ='2' required @if($row['active'] == '2') checked="checked" @endif class="minimal-red" > Banned
						</div>
						<div class="col-md-2">

						</div>
					</div>


					<div class="form-group  " >
						<label for="Avatar" class=" control-label col-md-4 text-left"> Avatar </label>
						<div class="col-md-6">
							<input  type='file' name='avatar' id='avatar' @if($row['avatar'] =='') class='required' @endif style='width:150px !important;'  />
							<div >
								{!! SiteHelpers::showUploadedFile($row['avatar'],'/uploads/users/') !!}

							</div>

						</div>
						<div class="col-md-2">

						</div>
					</div>
				</div>

				@if(!empty(\Request::segment('4')))
					@if((session()->get('gid') == 1) || (session()->get('gid') == 2 && $row->group_id >= session()->get('gid')) || (session()->get('gid') == $row->group_id))
						<div class="col-md-6">
							<div class="form-group">
								<label for="ipt" class=" control-label col-md-4 text-left" > </label>
								<div class="col-md-8">
									@if($row['id'] !='')
										{{ Lang::get('core.notepassword') }}
									@else
										Create Password
									@endif
								</div>
							</div>
							<div class="form-group">
								<label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.newpassword') }} </label>
								<div class="col-md-8">
									<input name="password" type="password" id="password" class="form-control input-sm" value=""
										   @if($row['id'] =='')
										   required
											@endif
									/>
								</div>
							</div>
							<div class="form-group">
								<label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.conewpassword') }} </label>
								<div class="col-md-8">
									<input name="password_confirmation" type="password" id="password_confirmation" class="form-control input-sm" value=""
										   @if($row['id'] =='')
										   required
											@endif
									/>
								</div>
							</div>
						</div>
					@endif
					@else
					<div class="col-md-6">
						<div class="form-group">
							<label for="ipt" class=" control-label col-md-4 text-left" > </label>
							<div class="col-md-8">
								@if($row['id'] !='')
									{{ Lang::get('core.notepassword') }}
								@else
									Create Password
								@endif
							</div>
						</div>
						<div class="form-group">
							<label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.newpassword') }} </label>
							<div class="col-md-8">
								<input name="password" type="password" id="password" class="form-control input-sm" value=""
									   @if($row['id'] =='')
									   required
										@endif
								/>
							</div>
						</div>
						<div class="form-group">
							<label for="ipt" class=" control-label col-md-4"> {{ Lang::get('core.conewpassword') }} </label>
							<div class="col-md-8">
								<input name="password_confirmation" type="password" id="password_confirmation" class="form-control input-sm" value=""
									   @if($row['id'] =='')
									   required
										@endif
								/>
							</div>
						</div>
					</div>
				@endif


				<div style="clear:both"></div>


				<div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">
						<button type="submit" name="apply" class="btn btn-info btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
						<button type="submit" name="submit" class="btn btn-primary btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
						<button type="button" onclick="location.href='{{ URL::to('core/users?return='.$return) }}' " class="btn btn-success btn-sm "><i class="fa  fa-arrow-circle-left "></i>  {{ Lang::get('core.sb_cancel') }} </button>
					</div>

				</div>

				{!! Form::close() !!}
			</div>
		</div>

	</div>
	<script type="text/javascript">
        $(document).ready(function() {

            $("#group_id").jCombo("{{ URL::to('core/users/comboselect?filter=tb_groups:group_id:name') }}",
                {  selected_value : '{{ $row["group_id"] }}' });

        });
	</script>
@stop