<?php

$string = "";
if ($theme_name == '1') {

}
elseif ($theme_name == '2') {

}
else {
  $string .= "<h5><h1 class=\"page-header\"><?php echo \$title ?></h1></h5>";
}
$string .= "<table class=\"table\">";
foreach ($non_pk as $row) {
    $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
}
$string .= "\n\t    <tr><td></td><td><a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a></td></tr>";
$string .= "\n\t</table>";
$hasil_view_read = createFile($string, $target."views/" . $c_url . "/" . $v_read_file);

?>