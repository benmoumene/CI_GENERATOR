<?php
$string = "
<script type=\"text/javascript\">
  $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      startDate: '-3d'
  });
</script>
";
$hasil_js_beranda = createFile($string, $target."views/beranda/js/". $js_home);
 ?>
