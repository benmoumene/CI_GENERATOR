<?php
error_reporting(0);
require_once 'helper.php';
$res = '';
$get_setting = readJSON('settingjsonmenu.cfg');
if (isset($_POST['save'])) {
    $menu = $_POST['menu_title'];

    $string = $menu;

    $hasil_setting = createFile($string, 'settingjsonmenu.cfg');
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
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css"/>
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
                    </button> <a class="navbar-brand" href="#">KBS STMIK ADHI GUNA</a>
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

            </div>
            <div class="col-md-4">
                <b>Membuat Menu Dengan JSON</b><hr>
                <?php echo $res; ?>

                <?php
                //echo json_encode($get_setting);
                foreach ($get_setting as $key ) {
                  echo $key->name;
                }
                 ?>
                <form action="menu.php" method="POST">
                    <div class="form-group">
                        <label for="">Menu</label>
                        <!-- <input type="text" name="menu_title" value="<?php echo $menu_file ?>" class="form-control" required> -->
                        <textarea name="menu_title" value='<?php echo json_encode($get_setting); ?>' class="form-control" rows="8" cols="80" required></textarea>
                    </div>
                    <input type="submit" value="Save" name="save" class="btn btn-primary btn-block" />
                </form>
            </div>
            <div class="col-md-4">

            </div>
        </div>
        <script src="../assets/jquery/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    	<script src="../../assets/plugisn/json-menu/json-menu.js"></script>
    </body>
</html>
