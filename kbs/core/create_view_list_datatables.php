<?php
$string = "
<div class=\"row\">
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
  </div>
</div>
<div class=\"row\">
  <div class=\"col-md-8\">
    <?php echo anchor(site_url('".$c_url."/create'), 'Tambah Data', 'class=\"btn btn-success\"'); ?>";
    if ($export_excel == '1') {
        $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), 'Excel', 'class=\"btn btn-warning\"'); ?>";
    }
    if ($export_word == '1') {
        $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), 'Word', 'class=\"btn btn-danger\"'); ?>";
    }
    if ($export_pdf == '1') {
        $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
    }
    $string .= "\n\t
  </div>
  <div class=\"col-md-4\">
      <div id=\"message\">
          <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
      </div>
  </div>
</div>
<div class=\"row\">
  <div class=\"col-md-12\">
    <br>
    <table class=\"table table-bordered table-striped data-table\" id=\"table".$c_url."\">
      <thead>
          <tr>
            <th style=\"text-align:center\" width=\"40px\">No</th>";
            foreach ($non_pk as $row) {
                $string .= "\n\t\t    <th style=\"text-align:center\">" . label($row['column_name']) . "</th>";
            }
            $string .= "\n\t\t
            <th style=\"text-align:center\" width=\"100px\">Action</th>
          </tr>
      </thead>";
      $string .= "\n\t
      <tbody>
          <?php
          \$start = 0;
          foreach ($" . $c_url . "_data as \$$c_url)
          {
              ?>
              <tr>";

              $string .= "\n\t\t    <td><?php echo ++\$start ?></td>";

              foreach ($non_pk as $row) {
                  $string .= "\n\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
              }

              $string .= "\n\t\t    <td style=\"text-align:center\" width=\"100px\">
              <a href=\"<?php echo site_url('".$c_url."/read/'.$".$c_url."->".$pk.") ?>\"><i class='fa fa-eye'></i></a> |
              <a href=\"<?php echo site_url('".$c_url."/update/'.$".$c_url."->".$pk.") ?>\"><i class='fa fa-pencil-square-o'></i></a> |
              <a href=\"<?php echo site_url('".$c_url."/delete/'.$".$c_url."->".$pk.") ?>\" onclick='javasciprt: return confirm(\"Are You Sure ?\")'><i class='fa fa-trash-o'></i></a>";
              $string .=  "\n\t
              </tr>
        <?php
    }
    ?>
      </tbody>
    </table>
  </div>
  </div>
</div>";
$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>
