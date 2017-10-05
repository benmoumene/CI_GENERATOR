<?php
error_reporting(0);
require_once 'core/kbs.php';
require_once 'core/helper.php';

$res = '';
$get_setting = readJSON('core/settingjson.cfg');
if (isset($_POST['save'])) {

    $target = $_POST['target'];
    $tema = $_POST['themes'];
    $title = $_POST['site_title'];
    $title_h = $_POST['site_header'];

    $string = '{
"target": "' . $target . '",
"copyassets": "0",
"theme_name": "'.$tema.'",
"site_title":"'.$title.'",
"site_header": "'.$title_h.'"
}';

    $hasil_setting = createFile($string, 'core/settingjson.cfg');
    $res = '<div class="alert alert-success alert-dismissable">
        				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        				<h4> Alert!</h4>
        				SETTING UPDATE SUCCESSFULLY
        			</div>';
}
?>
<!doctype html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                         <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="#">KBS Generator</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="../">Generator</a></li>
                        <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cara pakai<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Generate</a>
                                </li>
                                <li>
                                    <a href="#">Another action</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">About<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">About</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        <br><br><br>
        <div class="row">

                <div class="col-md-4">
                    <b>Pengaturan</b><hr>
                    <?php echo $res; ?>
                    <?php
                    $get_setting = readJSON('core/settingjson.cfg');
                    $theme_name = $get_setting->theme_name;
                    $title_name = $get_setting->site_title;
                    $title_header = $get_setting->site_header;
                     ?>
                     <form action="setting.php" method="POST">
                        <div class="form-group">
                            <label for="">Enter Your Site Title</label>
                            <input type="text" name="site_title" value="<?php echo $title_name ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Enter Your Site Header</label>
                            <input type="text" name="site_header" value="<?php echo $title_header ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Choose Theme</label>
                            <select class="form-control" name="themes" required="">
                                <?php if ($theme_name == 0): ?>
                                    <option value="0" selected>Default</option>
                                <?php else: ?>
                                    <option value="1" selected>AdminLTE</option>
                                <?php endif; ?>
                                <option value="0">Default</option>
                                <option value="1">AdminLTE</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Target Folder</label>
                            <div class="row">
                                <?php $target = $_POST['target'] ? $_POST['target'] : $get_setting->target; ?>
                                <div class="col-md-6">
                                    <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                        <label>
                                            <input type="radio" name="target" value="../application/" <?php echo $target == '../application/' ? 'checked' : ''; ?>>
                                            ../application/
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="radio" style="margin-bottom: 0px; margin-top: 0px">
                                        <label>
                                            <input type="radio" name="target" value="output/" <?php echo $target == 'output/' ? 'checked' : ''; ?>>
                                            output/
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save" name="save" class="btn btn-primary btn-block" />
                        </div>
                    </form>
                </div>
            <div class="col-md-4">
                <b>Admin User</b><hr>
                <?php
                    $table_list = $hc->table_list();
                    $count = 0;
                 ?>
                 <?php foreach ($table_list as $key => $value): ?>
                     <?php if ($value['table_name'] == 'admin' || $value['table_name'] == 'tb_admin' || $value['table_name'] == 'user' || $value['table_name'] == 'tb_user' || $value['table_name'] == 'users' || $value['table_name'] == 'tb_users'): ?>
                         <?php $count++ ?>
                     <?php endif; ?>
                 <?php endforeach; ?>
                 <form class="form" action="setting.php" method="post" role="form">
                     <?php if ($count != 0): ?>
                         <div class="form-group">
                             <label><?php echo $count." Tabel Admin Terdeteksi" ?> - <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Refresh</a></label>
                             <select id="table_name" name="table_name" class="form-control" onchange="setname()">
                                 <option value="">Please Select Your Admin Table</option>
                                 <?php
                                 $table_list = $hc->table_list();
                                 $table_list_selected = isset($_POST['table_name']) ? $_POST['table_name'] : '';
                                 foreach ($table_list as $table) {
                                     ?>
                                     <option value="<?php echo $table['table_name'] ?>" <?php echo $table_list_selected == $table['table_name'] ? 'selected="selected"' : ''; ?>><?php echo $table['table_name'] ?></option>
                                     <?php
                                 }
                                 ?>
                             </select>
                         </div>
                         <div class="form-group">
                             <label for="">Username</label>
                             <input type="text" class="form-control" name="" value="">
                         </div>
                         <div class="form-group">
                             <label for="">Password</label>
                             <input type="password" class="form-control" name="" value="">
                         </div>
                     <?php else: ?>
                         <b>Tidak Ada Tabel Admin Terdeteksi</b><hr>
                         <p>
                             <b>Ikuti Intruksi Berikut Ini Agar Proses Pembuatan Lebih Mudah</b><br>

                         </p>
                     <?php endif; ?>
                 </form>

            </div>
            <div class="col-md-4">

            </div>


        </div>
        <script src="../assets/jquery/jquery.min.js"></script>
    	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
