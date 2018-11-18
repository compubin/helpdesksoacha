@extends('layouts.app')

@section('content')

<section class="content-header">
  <h1>{{ $pageTitle }}
    <small>{{ $pageNote }}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('dashboard') }}"> Home</a></li>
    <li class="active">{{ $pageTitle }} </li>
  </ol>
</section>



 <div class="content">

	<div class="box box-primary">
	  	<div class="box-header with-border"><b>  {{ $pageTitle }} </b> </div>
	    <div class="box-body">
	    	<?php echo $content ;?>
	    </div>
	</div>

</div>    





@stop