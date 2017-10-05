<?php
$string = "
<?php \$uri = \$this->uri->segment(2); ?>
<div class=\"col-md-12\">
  <div class=\"widget-title\"> <span class=\"icon\"><i class=\"icon-th\"></i></span>";
  if ($theme_name == '1') {

  }
  elseif ($theme_name == '2') {

  }
  else {
    $string .= "<h5><h1 class=\"page-header\"><?php echo \$title ?></h1></h5>";
  }
  $string .= "
  </div>
  <div class=\"col-md-8\">\n
  <form action=\"<?php echo \$action; ?>\" method=\"post\" class=\"form-horizontal\">";
foreach ($non_pk as $row) {
    //$string .="\n".$row['column_key']."\n";
    if ($row["data_type"] == 'text' && $row['column_key'] =='' )
    {
    $string .= "\n\t<div class=\"form-group\">
            <label class=\"form-label\" for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
        </div>";
    }
    else if ($row["data_type"] == 'int' && $row['column_key'] =='MUL') {
      foreach ($all_foreign as $foreign_key) {
              if ($row['column_name'] == $foreign_key['referenced_column_name']) {
                $string .="\n<?php
                if(\$uri == 'create'){
                  ?>";
                  $string .= "\n\t<div class=\"form-group\">
                          <label class=\"form-label\" for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
                          <select class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" value=\"<?php echo \$".$row["column_name"]." ?>\"><?php echo $".$row["column_name"]."; ?>
                            <option value=\"\"> Mohon Pilih Salah Satu</option>
                            <?php
                            foreach(\$".$foreign_key['referenced_table_name']." as \$key){
                              ?>
                              <option value=\"<?php echo \$key->".$foreign_key['referenced_column_name']." ?>\"><?php echo \$key->".$foreign_key['referenced_column_name']." ?></option>
                              <?php
                            }
                            ?>
                          ";
                          $string .= "</select>
                      </div>";
                $string .="  <?php
                }
                else{
                  ?>";
                  $string .= "\n\t    <div class=\"form-group\">
                          <label class=\"form-label\" for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
                          <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\"/>
                      </div>";
                $string .="  <?php
                }
                ?>";
              }
          }
    }
    else if ($row["data_type"] == 'varchar' && $row['column_key'] =='MUL') {
      foreach ($all_foreign as $foreign_key) {
              if ($row['column_name'] == $foreign_key['referenced_column_name']) {
                $string .="\n<?php
                if(\$uri == 'create'){
                  ?>";
                  $string .= "\n\t<div class=\"form-group\">
                          <label class=\"form-label\" for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
                          <select class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" value=\"<?php echo \$".$row["column_name"]." ?>\"><?php echo $".$row["column_name"]."; ?>
                            <option value=\"\"> Mohon Pilih Salah Satu</option>
                            <?php
                            foreach(\$".$foreign_key['referenced_table_name']." as \$key){
                              ?>
                              <option value=\"<?php echo \$key->".$foreign_key['referenced_column_name']." ?>\"><?php echo \$key->".$foreign_key['referenced_column_name']." ?></option>
                              <?php
                            }
                            ?>
                          ";
                          $string .= "</select>
                      </div>";
                $string .="  <?php
                }
                else{
                  ?>";
                  $string .= "\n\t<div class=\"form-group\">
                          <label class=\"form-label\" for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
                          <select class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" value=\"<?php echo \$".$row["column_name"]." ?>\"><?php echo $".$row["column_name"]."; ?>
                            <option value=\"\"> Mohon Pilih Salah Satu</option>
                            <?php
                            foreach(\$".$foreign_key['referenced_table_name']." as \$key){
                              ?>
                              <?php if (\$key->".$foreign_key['referenced_column_name']." == \$".$row["column_name"]."): ?>
                                <option value=\"<?php echo \$key->".$foreign_key['referenced_column_name']." ?>\" selected=\"True\"><?php echo \$key->".$foreign_key['referenced_column_name']." ?></option>
                              <?php else: ?>
                                <option value=\"<?php echo \$key->".$foreign_key['referenced_column_name']." ?>\"><?php echo \$key->".$foreign_key['referenced_column_name']." ?></option>
                              <?php endif; ?>
                              <?php
                            }
                            ?>
                          ";
                          $string .= "</select>
                      </div>";
                $string .="  <?php
                }
                ?>";
              }
          }
    }
    elseif ($row["data_type"] == 'enum' && $row['column_key'] =='') {
      //echo json_encode($row['column_type']);
      $type = $row['column_type'];
      preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
      $enum = explode("','", $matches[1]);

      $string .= "\n\t<div class=\"form-group\">
              <label class=\"form-label\" for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
              <select class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\"><?php echo $".$row["column_name"]."; ?>
                <option value=\"\"> Mohon Pilih Salah Satu</option> <!-- tolong edit -->\n";
                foreach ($enum as $key) {
                  $string .= "\t            <option value=\"".$key."\">".$key."</option>\n";
                }
              $string .= "</select>
          </div>";
    }
    else {
    $string .= "\n\t    <div class=\"form-group\">
            <label class=\"form-label\" for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
        </div>";
    }
}
$string .= "\n\t    <div class=\"form-actions\"><input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a>";
$string .= "\n\t</div>\n</form>\n</div><div class=\"col-md-4\"><h3>panduan</h3><hr /></div>\n</div>";

$hasil_view_form = createFile($string, $target."views/" . $c_url . "/" . $v_form_file);

?>
