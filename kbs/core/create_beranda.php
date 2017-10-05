<?php
$string = "
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
  public function __construct()
	{
		parent::__construct();
    if (!\$this->session->userdata('login')) {
        redirect('auth');
    }
    else{

    }

	}
  public function index()
  {
    \$data['site_title'] = 'Beranda';
    \$data['title'] = 'Beranda';
    \$data['assign_js'] ='beranda/js/index.js';
    load_view('beranda/beranda', \$data);
  }
}

";
$hasil_beranda = createFile($string, $target."controllers/". $c_home);
 ?>
