<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"> Fontawesome</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"> Themify</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Simply Line</a></li>
    <li role="presentation"><a href="#material" aria-controls="messages" role="tab" data-toggle="tab">Material</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
       @include('tecno.menu.fontawesome')
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
        @include('tecno.menu.temify')
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
        @include('tecno.menu.simple')
    </div>
    <div role="tabpanel" class="tab-pane" id="material">
        @include('tecno.menu.material')
    </div>
  </div>

</div>
<style type="text/css">
    .icon-list-demo { font-size: 10px; }
    .icon-list-demo i{ font-size: 16px; }

</style>
<script type="text/javascript">
    $(document).ready(function(){

        $('.icon-list-demo  i , .material-icon-list-demo i').on('click',function(){
            val = $(this).attr('class');
           // alert(val);
            $('input[name=menu_icons]').val(val);
            $('#tecno-modal').modal('hide');

        })
    })
</script>