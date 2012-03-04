<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap','bootstrap-responsive','prettify'));
        echo $this->Html->script(array('jquery', 'bootstrap-alerts','bootstrap-tabs', 'bootstrap-buttons', 'bootstrap-modal', 'bootstrap-popover' ,'bootstrap-tabs', 'bootstrap-twipsy','prettify'));
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div class="container">
		<div class="row">
		    <div class="navbar">
                <div class="navbar-inner">
                  <div class="container" style="width: auto;">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">rap-
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">My Global Warming Dashboard</a>
                    <div class="nav-collapse">
                      <ul class="nav">
                        <li class="active"><?php echo $html->link(__("Home", true), array("controller"=>"geolocations", "action"=>"index")); ?></li>
                        <li><a href="#">Information</a></li>
                        <li><a href="#">Twitter Feed</a></li>
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">What can I do?<b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                           <li class="divider"></li>
                            <li class="nav-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                          </ul>
                        </li>
                      </ul>
                      <form class="navbar-search pull-left" action="">
                        <input class="search-query span2" placeholder="Search" type="text">
                      </form>
                      <ul class="nav pull-right">
                        <li><a href="#">Link</a></li>
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Coders4Africa <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Our Work</a></li>
                            <li><a href="#">Our Projects</a></li>
                            <li><a href="#">Become a member</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div><!-- /.nav-collapse -->
                  </div>
                </div><!-- /navbar-inner -->

           
            </div>
		</div>
		<div class="row">
		    <div class="span4">
		   
		            
		        </header>
		        
		    </div>
            <div class="span8">
                
                <?php echo $this->Session->flash(); ?>

                <?php echo $content_for_layout; ?>
            </div>

			

		</div>
		<div class="row">
			
		
		</div>
	</div>
	
</body>
</html>