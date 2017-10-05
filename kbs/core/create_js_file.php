<?php
$string="<script type=\"text/javascript\">
  $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      startDate: '-3d'
  });
  $('#table".$c_url."').dataTable({ //load list
    \"lengthMenu\": [[25, 50, -1], [25, 50, \"All\"]] //set here to set lenth list
  });
</script>
";

$hasil_js = createFile ($string, $target."views/" . $c_url."/js/".$js_file);

 ?>
