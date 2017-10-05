<?php
$string = "
<div class=\"row\">
  <div class=\"col-lg-12\">";
  if ($theme_name == '1') {

  }
  elseif ($theme_name == '2') {

  }
  else {
    $string .= "<h5><h1 class=\"page-header\"><?php echo \$title ?></h1></h5>";
  }

  $string .= "</div>
</div><!--/.row-->

<div class=\"row\">
  <div class=\"col-md-12\">
    <!-- code here to home modification  -->
  </div>
</div>

<div class=\"row\">
  <div class=\"col-xs-12 col-lg-12\">
    <div class=\"box box-primary\">
      <div class=\"box-header\">
        <h3 class=\"box-title\">Tentang KBS Generator</h3><hr>
      </div>
      <div class=\"box-body\">
        <p>Selamat datang di KBS Generator versi 1.0, Sistem ini dibuat menggunakan Kbs Generator</p>
        <ul>
          <li>Pembuatan Crud Cepat</li>
          <li>Berbasis Bostraap 3.4</li>
          <li>Disertai Interface Dan Sistem Keamanan</li>
          <li>Pemodelan Model Lebih Handal</li>
          <li>Berbasis Codeigniter 3.4</li>
        </ul>
        <br>
        <p>Bila terdapat kesalahan, kerusakan dan ketidaksesuaian pada proses sistem atau ingin mengirimkan kritik dan saran serta bertanya seputar PTT Team, maka dapat langsung menghubungi kontak dibawah ini:</p>
        <ul>
          <li>Email: iank@palutechnotraining.net</li>
        </ul>
        <br>
        <p>Terima Kasih</p>
      </div>
    </div>
  </div>
</div>
";
$hasil_v_beranda = createFile($string, $target."views/beranda/". $v_home);
 ?>
