<ul class="nav nav-tabs" style="margin-bottom:30px;">
  <li><a href="{{ url('tecno/module')}}"> All </a></li>
  <li @if($active == 'config') class="active" @endif ><a href="{{ URL::to('tecno/module/config/'.$module_name)}}"> Info</a></li>
  <li @if($active == 'sql') class="active" @endif >
  @if(isset($type) && $type =='blank')

  @else
  <a href="{{ URL::to('tecno/module/sql/'.$module_name)}}"> SQL</a></li>
  <li @if($active == 'table') class="active" @endif >
  <a href="{{ URL::to('tecno/module/table/'.$module_name)}}"> Table</a></li>
  <li @if($active == 'form' or $active == 'subform') class="active" @endif >
  <a href="{{ URL::to('tecno/module/form/'.$module_name)}}"> Form</a></li>
  <li @if($active == 'sub'  ) class="active" @endif >
  <a href="{{ URL::to('tecno/module/sub/'.$module_name)}}"> Master Detail</a></li>
  @endif
  <li @if($active == 'permission') class="active" @endif >
  <a href="{{ URL::to('tecno/module/permission/'.$module_name)}}"> Permission</a></li>
  @if($type !='core' )
  <li @if($active == 'source') class="active" @endif >
  <a href="{{ URL::to('tecno/module/source/'.$module_name)}}"> Codes </a></li>
  @endif

  
   <li @if($active == 'rebuild') class="active" @endif >

    @if(isset($type) && ( $type =='blank' or $type =='core'))

    @else
    <a href="javascript://ajax" onclick="TecnoModal('{{ URL::to('tecno/module/build/'.$module_name)}}','Rebuild Module ')"> Rebuild</a></li>
   @endif
    <li class="dropdown pull-right">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Swith
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <?php $md = DB::table('tb_module')->where('module_type','!=','core')->get();
      foreach($md as $m) { ?>
      <li><a href="{{ url('tecno/module/'.$active.'/'.$m->module_name)}}"> {{ $m->module_title}}</a></li>
      <?php } ?>
    </ul>
  </li>

  
  
</ul>