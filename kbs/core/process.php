<?php
$hasil = array();
function insert_into_file($file_path, $insert_marker, $text, $after = true) {
	$contents = file_get_contents($file_path);
	$new_contents = preg_replace($insert_marker,($after) ? '$0' . $text : $text . '$0', $contents);

	return file_put_contents($file_path, $new_contents);
}

if (isset($_POST['generate'])){
    // get form data
	$table_name = safe($_POST['table_name']);

    $jenis_tabel = safe($_POST['jenis_tabel']);
    $export_excel = safe($_POST['export_excel']);
    $controller = safe($_POST['controller']);
    $model = safe($_POST['model']);

    if ($table_name <> '')
    {
        // set data
        $table_name = $table_name;
        $c = $controller <> '' ? ucfirst($controller) : ucfirst($table_name);
        $m = $model <> '' ? ucfirst($model) : ucfirst($table_name) . '_model';
        $v_list = $table_name . "_list";
        $v_read = $table_name . "_read";
        $v_form = $table_name . "_form";
        $js_in = "index";
        $layout_in = "template";
        $layout_login = "login_view";
        $c_auth = "Auth";
        $c_beranda = "Beranda";
        $v_beranda = "beranda";
        $js_beranda = "index";
		$m_app_model = "App_model";

        // url
        $c_url = strtolower($c);

        // filename
        $c_file = $c . '.php';
        $m_file = $m . '.php';
        $js_file = $js_in.'.js';
        $layout_file = $layout_in.'.php';
        $login_file = $layout_login.'.php';
        $m_app = $m_app_model.'.php';
        $c_home = $c_beranda.'.php';
        $v_home = $v_beranda.'.php';
        $js_home= $js_beranda.'.js';
        $auth_file = $c_auth.'.php';
        $v_list_file = $v_list . '.php';
        $v_read_file = $v_read . '.php';
		$v_form_file = $v_form . '.php';

        // read setting
        $get_setting = readJSON('core/settingjson.cfg');
        $target = $get_setting->target;
		$theme_name = $get_setting->theme_name;
        $title_name = $get_setting->site_title;
        $title_header = $get_setting->site_header;

        if (!file_exists($target . "views/" . $c_url))
        {
          mkdir($target . "views/" . $c_url, 0777, true);
        }

        if (!file_exists($target . "views/layout")) {
          mkdir($target . "views/layout", 0777, true);
        }

        if (!file_exists($target . "views/beranda")) {
          mkdir($target . "views/beranda", 0777, true);
        }

        if (!file_exists($target . "views/beranda/js")) {
          mkdir($target . "views/beranda/js", 0777, true);
        }

        if (!file_exists($target . "views/" . $c_url."/js")) {
          mkdir($target . "views/" . $c_url."/js", 0777, true);
        }

        if (!file_exists($target . "views/" . $c_url."/css")) {
          mkdir($target . "views/" . $c_url."/css", 0777, true);
        }

        $pk = $hc->primary_field($table_name);
        $non_pk = $hc->not_primary_field($table_name);
        $all = $hc->all_field($table_name);
        $all_foreign = $hc->foreign_key($table_name);
        $tb_list = $hc->table_list();
		$list_menu=$hc->table_list_menu();

        // generate
        include 'core/create_config_pagination.php';
        include 'core/create_controller.php';
        include 'core/create_model.php';
        $jenis_tabel == 'reguler_table' ? include 'core/create_view_list.php' : include 'core/create_view_list_datatables.php';
        include 'core/create_view_form.php';
        include 'core/create_view_read.php';
        include 'core/create_js_file.php';
        $export_excel == 1 ? include 'core/create_exportexcel_helper.php' : '';


        $hasil[] = $hasil_controller;
        $hasil[] = $hasil_model;
        $hasil[] = $hasil_view_list;
        $hasil[] = $hasil_view_form;
        $hasil[] = $hasil_view_read;
        $hasil[] = $hasil_config_pagination;
        $hasil[] = $hasil_exportexcel;
        $hasil[] = $hasil_pdf;
        $hasil[] = $hasil_js;

        if (!file_exists($target . "views/layout/template.php") || !file_exists($target . "views/layout/login_view.php")) {
            include 'core/create_template.php';
            include 'core/create_login_view.php';
            include 'core/create_helper_page.php';
            $hasil[] = $hasil_page_template;
            $hasil[] = $hasil_view_template;
            $hasil[] = $hasil_login_view;


        }

        if (!file_exists($target . "controllers/Beranda.php") || !file_exists($target . "views/beranda/beranda.php") || !file_exists($target . "views/beranda/js/index.js")) {
            include 'core/create_beranda.php';
            include 'core/create_view_beranda.php';
            include 'core/create_js_beranda.php';
            $hasil[]=$hasil_beranda;
            $hasil[]=$hasil_v_beranda;
            $hasil[]=$hasil_js_beranda;
        }

        if (!file_exists($target . "controllers/Auth.php") || !file_exists($target . "models/App_model.php")) {
            include 'core/create_auth.php';
            include 'core/create_app_model.php';
            $hasil[]=$hasil_auth;
            $hasil[]=$hasil_app_model;
        }


    } else
    {
        $hasil[] = 'No table selected.';
    }
}

// if (isset($_POST['generateall'])){
//     // get form data
//     $table_name = safe($_POST['table_name']);
//     $jenis_tabel = safe($_POST['jenis_tabel']);
//     $export_excel = safe($_POST['export_excel']);
//     $controller = safe($_POST['controller']);
//     $model = safe($_POST['model']);
//
//     $table_list = $hc->table_list();
//     foreach ($table_list as $row) {
//         if ($table_name <> ''){
//             // set data
//             $table_name = $table_name;
//             $c = $controller <> '' ? ucfirst($controller) : ucfirst($table_name);
//             $m = $model <> '' ? ucfirst($model) : ucfirst($table_name) . '_model';
//             $v_list = $table_name . "_list";
//             $v_read = $table_name . "_read";
//             $v_pdf = $table_name . "_pdf";
//             $js_in = "index";
//             $layout_in = "template";
//             $layout_login = "login_view";
//             $c_auth = "Auth";
//             $c_beranda = "Beranda";
//             $v_beranda = "beranda";
//             $js_beranda = "index";
//             $m_app_model = "App_model";
//
//             // url
//             $c_url = strtolower($c);
//
//             // filename
//             $c_file = $c . '.php';
//             $m_file = $m . '.php';
//             $js_file = $js_in.'.js';
//             $layout_file = $layout_in.'.php';
//             $login_file = $layout_login.'.php';
//             $m_app = $m_app_model.'.php';
//             $c_home = $c_beranda.'.php';
//             $v_home = $v_beranda.'.php';
//             $js_home= $js_beranda.'.js';
//             $auth_file = $c_auth.'.php';
//             $v_list_file = $v_list . '.php';
//             $v_read_file = $v_read . '.php';
//             $v_form_file = $v_form . '.php';
//
//             // read setting
//             $get_setting = readJSON('core/settingjson.cfg');
//             $target = $get_setting->target;
//
//             if (!file_exists($target . "views/" . $c_url))
//             {
//               mkdir($target . "views/" . $c_url, 0777, true);
//             }
//
//             if (!file_exists($target . "views/layout")) {
//               mkdir($target . "views/layout", 0777, true);
//             }
//
//             if (!file_exists($target . "views/beranda")) {
//               mkdir($target . "views/beranda", 0777, true);
//             }
//
//             if (!file_exists($target . "views/beranda/js")) {
//               mkdir($target . "views/beranda/js", 0777, true);
//             }
//
//             if (!file_exists($target . "views/" . $c_url."/js")) {
//               mkdir($target . "views/" . $c_url."/js", 0777, true);
//             }
//
//             if (!file_exists($target . "views/" . $c_url."/css")) {
//               mkdir($target . "views/" . $c_url."/css", 0777, true);
//             }
//
//             $pk = $hc->primary_field($table_name);
//             $non_pk = $hc->not_primary_field($table_name);
//             $all = $hc->all_field($table_name);
//             $all_foreign = $hc->foreign_key($table_name);
//             $tb_list = $hc->table_list();
//
//             // generate
//             include 'core/create_config_pagination.php';
//             include 'core/create_controller.php';
//             include 'core/create_model.php';
//             $jenis_tabel == 'reguler_table' ? include 'core/create_view_list.php' : include 'core/create_view_list_datatables.php';
//             include 'core/create_view_form.php';
//             include 'core/create_view_read.php';
//             include 'core/create_js_file.php';
//             include 'core/create_template.php';
//             include 'core/create_login_view.php';
//             include 'core/create_auth.php';
//             include 'core/create_app_model.php';
//             include 'core/create_beranda.php';
//             include 'core/create_view_beranda.php';
//             include 'core/create_js_beranda.php';
//
//             $export_excel == 1 ? include 'core/create_exportexcel_helper.php' : '';
//
//             $hasil[] = $hasil_controller;
//             $hasil[] = $hasil_model;
//             $hasil[] = $hasil_view_list;
//             $hasil[] = $hasil_view_form;
//             $hasil[] = $hasil_view_read;
//
//             if (!file_exists($target . "views/layout/template.php")) {
//               $hasil[]="tidak ada";
//             }
//             else {
//                 $hasil[]="ada";
//             }
//         }
//     }
//
//     $hasil[] = $hasil_config_pagination;
//     $hasil[] = $hasil_exportexcel;
// }
?>
