<?php
$string = "
<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class App_model extends CI_Model
{
  function __construct()
  {
      parent::__construct();
  }

  function cek_user(\$data) {
			\$query = \$this->db->get_where('tb_admin', \$data);
			return \$query;
	}
}
";
$hasil_app_model = createFile($string, $target."models/". $m_app);
 ?>
