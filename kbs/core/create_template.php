<?php
if ($theme_name == '1') {
	$string ="
	<!DOCTYPE html>
	<html>
	<head>
	  <meta charset=\"utf-8\">
	  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
	  <title> ".$title_header." | Dashboard</title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no\" name=\"viewport\">
	  <link href=\"<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>\" rel=\"stylesheet\">
		<link href=\"<?php echo base_url('assets/plugins/dataTables/css/dataTables.bootstrap.min.css') ?>\" rel=\"stylesheet\">
	  <link href=\"<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css?v=4.4.0');?>\" rel=\"stylesheet\">
	  <link rel=\"stylesheet\" href=\"<?php echo base_url('assets/themes/adminLTE/css/AdminLTE.min.css'); ?>\">
	  <link rel=\"stylesheet\" href=\"<?php echo base_url('assets/themes/adminLTE/css/skins/_all-skins.min.css'); ?>\">
		<link href=\"<?php echo base_url('assets/plugins/datepicker/css/bootstrap-datepicker3.min.css') ?>\" rel=\"stylesheet\">
		<link href=\"<?php echo base_url('assets/plugins/datepicker/css/bootstrap-datepicker.min.css') ?>\" rel=\"stylesheet\">
	  <!--[if lt IE 9]>
	  <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
	  <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
	  <![endif]-->
	  <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic\">
	</head>
	<body class=\"hold-transition skin-blue sidebar-mini\">
	<div class=\"wrapper\">
	  <header class=\"main-header\">
	    <a href=\"<?php echo base_url() ?>\" class=\"logo\">
	      <span class=\"logo-mini\"><b>P</b>TT</span>
	      <span class=\"logo-lg\"><b>PTT</b>".$title_name."</span>
	    </a>
	    <nav class=\"navbar navbar-static-top\">
	      <!-- Sidebar toggle button-->
	      <a href=\"#\" class=\"sidebar-toggle\" data-toggle=\"push-menu\" role=\"button\">
	        <span class=\"sr-only\">Toggle navigation</span>
	      </a>
	      <div class=\"navbar-custom-menu\">
	        <ul class=\"nav navbar-nav\">
	          <li class=\"dropdown messages-menu\">
	            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
	              <i class=\"fa fa-envelope-o\"></i>
	              <span class=\"label label-success\">4</span>
	            </a>
	            <ul class=\"dropdown-menu\">
	              <li class=\"header\">You have 4 messages</li>
	              <li>
	                <ul class=\"menu\">
	                  <li>
	                    <a href=\"#\">
	                      <div class=\"pull-left\">
	                        <img src=\"dist/img/user2-160x160.jpg\" class=\"img-circle\" alt=\"User Image\">
	                      </div>
	                      <h4>
	                        Support Team
	                        <small><i class=\"fa fa-clock-o\"></i> 5 mins</small>
	                      </h4>
	                      <p>Why not buy a new awesome theme?</p>
	                    </a>
	                  </li>
	                </ul>
	              </li>
	              <li class=\"footer\"><a href=\"#\">See All Messages</a></li>
	            </ul>
	          </li>
	          <li>
	            <a href=\"#\" data-toggle=\"control-sidebar\"><i class=\"fa fa-gears\"></i></a>
	          </li>
	        </ul>
	      </div>
	    </nav>
	  </header>
	  <aside class=\"main-sidebar\">
	    <section class=\"sidebar\">
	      <div class=\"user-panel\">
	        <div class=\"pull-left image\">
	          <!-- add image -->
	          <img src=\"\" class=\"img-circle\" alt=\"User Image\">
	        </div>
	        <div class=\"pull-left info\">
	          <p>admin</p>
	          <a href=\"#\"><i class=\"fa fa-circle text-success\"></i> Online</a>
	        </div>
	      </div>
	      <!-- search form add to function-->
	      <form action=\"#\" method=\"get\" class=\"sidebar-form\">
	        <div class=\"input-group\">
	          <input type=\"text\" name=\"q\" class=\"form-control\" placeholder=\"Search...\">
	          <span class=\"input-group-btn\">
	                <button type=\"submit\" name=\"search\" id=\"search-btn\" class=\"btn btn-flat\"><i class=\"fa fa-search\"></i>
	                </button>
	              </span>
	        </div>
	      </form>
	      <ul class=\"sidebar-menu\" data-widget=\"tree\">
	        <li class=\"header\">MAIN NAVIGATION</li>
	        <li class=\"active treeview\">
	          <a href=\"#\">
	            <i class=\"fa fa-dashboard\"></i> <span>Dashboard</span>
	            <span class=\"pull-right-container\">
	              <i class=\"fa fa-angle-left pull-right\"></i>
	            </span>
	          </a>
	          <ul class=\"treeview-menu\">
						";
						foreach ($list_menu as $key => $value) {
							$menu = explode("_", $value['table_name']);
							if (!$_POST['generateall']) {
								if ($value['table_name'] == "VIEW") {

								}
								else {
									$string .= "
									<li>
										<a class=\"\" href=\"<?php echo site_url('".$value['table_name']."') ?>\"> <i class=\"fa fa-circle-o\"></i>  ".ucfirst($value['table_name'])."</a>
									</li>
									";
								}
							}
							else {
								if ($value['table_name'] == "VIEW") {

								}
								else {
									$string .= "
										<li>
											<a class=\"\" href=\"<?php echo site_url('".$value['table_name']."') ?>\"> <i class=\"fa fa-circle-o\"></i>  ".ucfirst($value['table_name'])."</a>
										</li>
									";
								}
							}

						}
						$string .="
	          </ul>
	        </li>
	        <li class=\"header\">Documentation</li>
	        <li><a href=\"https://adminlte.io/docs\"><i class=\"fa fa-circle-o text-red\"></i> <span>AdminLTE</span></a></li>
	        <li><a href=\"#\"><i class=\"fa fa-circle-o text-yellow\"></i> <span>Standar</span></a></li>
	      </ul>
	    </section>
	  </aside>
	  <div class=\"content-wrapper\">
	    <section class=\"content-header\">
	      <h1>
	        <?php echo \$title ?>
	      </h1>
	      <ol class=\"breadcrumb\">
				<li class=\"active\"><a href=\" <?php echo site_url(\$this->uri->segment(1)) ?>\"><i class=\"fa fa-home\"></i></a></li>

				<?php
				\$total_uri = \$this->uri->total_segments();
				for (\$i=1; \$i <= \$total_uri; \$i++) {
					\$uri = \$this->uri->segment(\$i);
					?>
					<li><a href=\" <?php echo site_url(\$this->uri->segment(\$i)) ?>\"><?php echo \$uri ?></a></li>
					<?php
				}
				?>
				</ol>
	    </section>
	    <section class=\"content\">
				<?php echo \$view; ?>
	    </section>
	  </div>
	  <!-- Control Sidebar -->
	  <aside class=\"control-sidebar control-sidebar-dark\">
	    <!-- Create the tabs -->
	    <ul class=\"nav nav-tabs nav-justified control-sidebar-tabs\">
	      <li><a href=\"#control-sidebar-home-tab\" data-toggle=\"tab\"><i class=\"fa fa-home\"></i></a></li>
	      <li><a href=\"#control-sidebar-settings-tab\" data-toggle=\"tab\"><i class=\"fa fa-gears\"></i></a></li>
	    </ul>
	    <div class=\"tab-content\">
	      <div class=\"tab-pane\" id=\"control-sidebar-home-tab\">

	      </div>
	      <div class=\"tab-pane\" id=\"control-sidebar-settings-tab\">
	        <ul class=\"control-sidebar-menu\">
	          <li>
	            <a href=\"javascript:void(0)\">
	              <i class=\"menu-icon fa fa-birthday-cake bg-red\"></i>
	              <div class=\"menu-info\">
	                <h4 class=\"control-sidebar-subheading\">Logout</h4>
	              </div>
	            </a>
	          </li>
	        </ul>
	      </div>
	    </div>
	  </aside>
	  <div class=\"control-sidebar-bg\"></div>
	</div>
	<script src=\"<?php echo base_url('assets/jquery/jquery.min.js') ?>\"></script>
	<script src=\"<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>\"></script>
	<script src=\"<?php echo base_url('assets/themes/adminLTE/js/adminlte.min.js'); ?>\"></script>
	<script src=\"<?php echo base_url('assets/plugins/datepicker/js/bootstrap-datepicker.min.js') ?>\"></script>
	<script src=\"<?php echo base_url('assets/plugins/dataTables/js/jquery.dataTables.min.js') ?>\"></script>
	<script src=\"<?php echo base_url('assets/plugins/dataTables/js/dataTables.bootstrap.min.js') ?>\"></script>
	<script src=\"<?php echo base_url('assets/plugins/json-menu/js/json-menu.js') ?>\"></script>
	<?php
			if (\$assign_js != '') {
					\$this->load->view(\$assign_js);
			}
	?>
	</body>
	</html>
";
}
elseif ($theme_name == '2') {
	# code...
}
else {
	$string = "
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset=\"utf-8\">
	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
	<title>PTT Team</title>

	<link href=\"<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>\" rel=\"stylesheet\">
	<link href=\"<?php echo base_url('assets/plugins/dataTables/css/dataTables.bootstrap.min.css') ?>\" rel=\"stylesheet\">
	<link href=\"<?php echo base_url('assets/plugins/datepicker/css/bootstrap-datepicker3.min.css') ?>\" rel=\"stylesheet\">
	<link href=\"<?php echo base_url('assets/plugins/datepicker/css/bootstrap-datepicker.min.css') ?>\" rel=\"stylesheet\">
	<link href=\"<?php echo base_url('assets/themes/default/styles.css') ?>\" rel=\"stylesheet\">
	<link href=\"<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css?v=4.4.0');?>\" rel=\"stylesheet\">
	</head>

	<body>
		<nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">
			<div class=\"container-fluid\">
				<div class=\"navbar-header\">
					<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#sidebar-collapse\">
						<span class=\"sr-only\">Toggle navigation</span>
						<span class=\"icon-bar\"></span>
						<span class=\"icon-bar\"></span>
						<span class=\"icon-bar\"></span>
					</button>
					<a class=\"navbar-brand\" href=\"#\"><span>PTT </span> ".$title_name."</a>
					<ul class=\"user-menu\">
						<li class=\"dropdown pull-right\">
							<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><svg class=\"glyph stroked male-user\"><use xlink:href=\"#stroked-male-user\"></use></svg> User <span class=\"caret\"></span></a>
							<ul class=\"dropdown-menu\" role=\"menu\">
								<li><a href=\"#\"><svg class=\"glyph stroked male-user\"><use xlink:href=\"#stroked-male-user\"></use></svg> <?php echo \$this->session->userdata('username') ?></a></li>
								<li><a href=\"<?php echo site_url('auth/logout') ?>\"><svg class=\"glyph stroked cancel\"><use xlink:href=\"#stroked-cancel\"></use></svg> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div>

			</div><!-- /.container-fluid -->
		</nav>

		<div id=\"sidebar-collapse\" class=\"col-sm-3 col-lg-2 sidebar\">
			<ul class=\"nav menu\">
				<li class=\"active\"><a href=\"<?php echo base_url() ?>\"><svg class=\"glyph stroked dashboard-dial\"><use xlink:href=\"#stroked-dashboard-dial\"></use></svg> Dashboard</a></li>
				<li class=\"parent \">
				<a data-toggle=\"collapse\" href=\"#sub-item-1\">
					<span ><svg class=\"glyph stroked chevron-down\"><use xlink:href=\"#stroked-chevron-down\"></use></svg></span> Menu
				</a>
					<ul class=\"children collapse\" id=\"sub-item-1\">
						<li>";
						foreach ($list_menu as $key => $value) {
							$menu = explode("_", $value['table_name']);
							if (!$_POST['generateall']) {
								if ($value['table_name'] == "VIEW") {

								}
								else {
									$string .= "
										<a class=\"\" href=\"<?php echo site_url('".$menu[1]."') ?>\"> <i class=\"fa fa-bars\"></i> ".ucfirst($menu[1])."</a>
									";
								}
							}
							else {
								if ($value['table_name'] == "VIEW") {

								}
								else {
									$string .= "
										<a class=\"\" href=\"<?php echo site_url('".$value['table_name']."') ?>\"> <i class=\"fa fa-bars\"></i>  ".ucfirst($value['table_name'])."</a>
									";
								}
							}

						}
						$string .="
						</li>
					</ul>
				</li>
			</ul>

		</div><!--/.sidebar-->
		<div class=\"col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main\">
			<?php echo \$view; ?>
		</div>	<!--/.main-->

		<script src=\"<?php echo base_url('assets/jquery/jquery.min.js') ?>\"></script>
		<script src=\"<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>\"></script>
		<script src=\"<?php echo base_url('assets/plugins/datepicker/js/bootstrap-datepicker.min.js') ?>\"></script>
		<script src=\"<?php echo base_url('assets/plugins/dataTables/js/jquery.dataTables.min.js') ?>\"></script>
		<script src=\"<?php echo base_url('assets/plugins/dataTables/js/dataTables.bootstrap.min.js') ?>\"></script>
	  <?php
	      if (\$assign_js != '') {
	          \$this->load->view(\$assign_js);
	      }
	  ?>
	  <script type=\"text/javascript\">
	    \$('.datepicker').datepicker({
	        format: 'yyyy-mm-dd',
	        startDate: '-3d'
	    });

	    !function (\$) {
	        \$(document).on(\"click\",\"ul.nav li.parent > a > span.icon\", function(){
	            \$(this).find('em:first').toggleClass(\"glyphicon-minus\");
	        });
	        \$(\".sidebar span.icon\").find('em:first').addClass(\"glyphicon-plus\");
	    }(window.jQuery);

	    \$(window).on('resize', function () {
	      if (\$(window).width() > 768) \$('#sidebar-collapse').collapse('show')
	    })
	    \$(window).on('resize', function () {
	      if (\$(window).width() <= 767) \$('#sidebar-collapse').collapse('hide')
	    })
	  </script>
	</body>
	</html>
	";
}
$hasil_view_template = createFile($string, $target."views/layout/". $layout_file);
 ?>
