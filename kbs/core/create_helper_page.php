<?php
 $string =" <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if (! function_exists('element')) {
        function load_view(\$template,\$data=null) {
        \$ci = &get_instance();
 		   \$data['view'] = \$ci->load->view(\$template,\$data,true);
 		   \$ci->load->view('layout/template.php',\$data);
        }
    }
 ";
$hasil_page_template = createFile($string, $target."helpers/page_template_helper.php");
 ?>
