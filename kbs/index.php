<?php
error_reporting(0);
require_once 'core/kbs.php';
require_once 'core/helper.php';
require_once 'core/process.php';
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
                        <li class=""><a href="core/setting.php">Setting</a></li>
                        <li class=""><a href="core/menu.php">Create Menu</a></li>
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
          <div class="col-md-4"></div>
          <div class="col-md-4">
              <form action="index.php" method="POST">
                  <div class="form-group">
                      <label>Select Table - <a href="<?php echo $_SERVER['PHP_SELF'] ?>">Refresh</a></label>
                      <select id="table_name" name="table_name" class="form-control" onchange="setname()">
                          <option value="">Please Select</option>
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
                      <div class="row">
                          <?php $jenis_tabel = isset($_POST['jenis_tabel']) ? $_POST['jenis_tabel'] : 'reguler_table'; ?>
                          <div class="col-md-6">
                              <div class="checkbox">
                                  <?php $export_excel = isset($_POST['export_excel']) ? $_POST['export_excel'] : ''; ?>
                                  <label>
                                      <input type="checkbox" name="export_excel" value="1" checked>
                                      Export Excel
                                  </label>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="checkbox">
                                  <label>
                                      <input type="radio" name="jenis_tabel" value="datatables" checked>
                                      Datatables
                                  </label>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Custom Controller Name</label>
                      <input type="text" id="controller" name="controller" value="<?php echo isset($_POST['controller']) ? $_POST['controller'] : '' ?>" class="form-control" placeholder="Controller Name" />
                  </div>
                  <div class="form-group">
                      <label>Custom Model Name</label>
                      <input type="text" id="model" name="model" value="<?php echo isset($_POST['model']) ? $_POST['model'] : '' ?>" class="form-control" placeholder="Controller Name" />
                  </div>
                  <input type="submit" value="Generate" name="generate" class="btn btn-primary btn-block" onclick="javascript: return confirm('This will overwrite the existing files. Continue ?')" />
                  <!-- <input type="submit" value="Generate All" name="generateall" class="btn btn-danger" onclick="javascript: return confirm('WARNING !! This will generate code for ALL TABLE and overwrite the existing files\
                  \nPlease double check before continue. Continue ?')" /> -->

              </form>
              <br>

              <?php
              foreach ($hasil as $h) {
                  echo '<p>' . $h . '</p>';
              }
              ?>
          </div>
          <div class="col-md-4"></div>
        </div>
        <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                         <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="#">KBS STMIK ADHI GUNA</a>
                </div>
            </nav>
        <script src="../assets/jquery/jquery.min.js"></script>
    	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function capitalize(s) {
                return s && s[0].toUpperCase() + s.slice(1);
            }

            function setname() {
                var table_name = document.getElementById('table_name').value.toLowerCase();
                if (table_name != '') {
                    document.getElementById('controller').value = capitalize(table_name);
                    document.getElementById('model').value = capitalize(table_name) + '_model';
                } else {
                    document.getElementById('controller').value = '';
                    document.getElementById('model').value = '';
                }
            }
        </script>
    </body>
</html>
