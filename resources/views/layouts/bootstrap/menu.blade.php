<?php $menus = SiteHelpers::menus('top') ;?>
 	  <ul class="nav navbar-nav ">
		<?php foreach ($menus as $menu) :?>
			 <li class="<?php if(Request::segment(1) == $menu['module']) echo 'active';?>" >
			 	<a  
				<?php if($menu['menu_type'] =='external') :?>
					href="<?php echo URL::to($menu['URL::to']);?>" 
				<?php else : ?>
					href="<?php echo URL::to($menu['module']);?>" 
				<?php endif; ?> 
			 
				 <?php if(count($menu['childs']) > 0 ) echo 'class="dropdown-toggle" data-toggle="dropdown" ';?>>
			 		<i class="<?php  echo $menu['menu_icons'];?>"></i> <span>
						<?php  echo $menu['menu_name'];?>				
					</span>
					<?php  if(count($menu['childs']) > 0 ) : ?>
					 <b class="caret"></b> 
					<?php endif;?>  
				</a> 
				<?php if(count($menu['childs']) > 0):?>
					 <ul class="dropdown-menu dropdown-menu-right">
						<?php foreach ($menu['childs'] as $menu2):?>
						 <li class=" 
						 <?php if(count($menu2['childs']) > 0) echo 'dropdown-submenu';?>
						 <?php if(Request::segment(1) == $menu2['module']) echo 'active ';?>">
						 	<a 
								<?php if($menu['menu_type'] =='external'):?>
									href="<?php  echo URL::to($menu2['URL::to']);?>" 
								<?php else:?>
									href="<?php  echo URL::to($menu2['module']);?>" 
								<?php endif;?>
											
							>
								<i class="<?php echo $menu2['menu_icons'];?>"></i> 
										<?php echo $menu2['menu_name'];?>
							</a> 
							<?php if(count($menu2['childs']) > 0):?>
							<ul class="dropdown-menu dropdown-menu-right">
								<?php foreach($menu2['childs'] as $menu3):?>
									<li <?php  if(Request::segment(1) == $menu3['module']) echo 'class="active"';?>>
										<a 
											<?php if($menu['menu_type'] =='external'):?>
												href="<?php  echo URL::to($menu3['URL::to']);?>" 
											<?php else :?>
												href="<?php echo URL::to($menu3['module']);?>" 
											<?php endif;?>										
										
										>
											<span>
												<?php echo $menu3['menu_name'];?>
											</span>  
										</a>
									</li>	
								<?php endforeach; ?>
							</ul>
							<?php endif	;?>						
							
						</li>							
						<?php endforeach;?>
					</ul>
				<?php endif;?>
			</li>
		<?php endforeach;?>  
			

  </ul> 


  <ul class="nav navbar-nav navbar-right" style="touch-action: pan-y;">
 			@if($tecnoconfig['cnf_multilang'] ==1)    

              <?php 
              $flag ='en';
              $langname = 'English'; 
              foreach(SiteHelpers::langOption() as $lang):
                if($lang['folder'] == session('lang') or $lang['folder'] == 'CNF_LANG') {
                  $flag = $lang['folder'];
                  $langname = $lang['name']; 
                }
              endforeach;?>

 			<li class="dropdown ">
 				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
 				<img class="flag-lang" src="{{ asset('assets/plugins/images/flags/'.$flag.'.png') }}" width="16" height="11" alt="lang" />
 					 {{ $flag }}  <span class="caret"></span>

 				</a>
 				<ul  class="dropdown-menu">
                @foreach(SiteHelpers::langOption() as $lang)
                <li><a tabindex="-1" href="{{ URL::to('home/lang/'.$lang['folder'])}}">
                <img class="flag-lang" src="{{ asset('assets/plugins/images/flags/'.$lang['folder'].'.png') }}" width="16" height="11" alt="lang" /> {{ $lang['name'] }} </a></li>
                @endforeach
                </ul>
                
            
            </li>
            @endif

    <li class="dropdown "><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> My Account <span class="caret"></span></a>
       <ul class="dropdown-menu dropdown-menu-right">

 			@if(Auth::check())
            

                <li><a tabindex="-1" href="{{ URL::to('dashboard') }}"> Dashboard</a></li>
                <li><a tabindex="-1" href="{{ URL::to('user/profile?view=frontend') }}"> {{ Lang::get('core.m_profile') }}</a></li>
                <li><a tabindex="-1" href="{{ URL::to('user/logout') }}"> {{ Lang::get('core.m_logout') }}</a></li>
     
            @else

              <li class="btn-cta"><a href="{{ URL::to('user/login') }}"><span> {{ Lang::get('core.signin') }} </span></a></li>
              <li class="btn-cta"><a href="{{ URL::to('user/register') }}"><span>  {{ Lang::get('core.signup') }} </span></a></li>
            @endif
        
       </ul>

    </li>
</ul>
 