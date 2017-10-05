<?php

$string = "<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class " . $c . " extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!\$this->session->userdata('login')) {
            redirect('auth');
        }
        else{
            \$this->load->model('$m');
            \$this->load->library('form_validation');
        }
    }";

if ($jenis_tabel == 'reguler_table') {

$string .= "\n\n    public function index()
    {
        \$q = urldecode(\$this->input->get('q', TRUE));
        \$start = intval(\$this->input->get('start'));

        if (\$q <> '') {
            \$config['base_url'] = base_url() . '$c_url/index.html?q=' . urlencode(\$q);
            \$config['first_url'] = base_url() . '$c_url/index.html?q=' . urlencode(\$q);
        } else {
            \$config['base_url'] = base_url() . '$c_url/index.html';
            \$config['first_url'] = base_url() . '$c_url/index.html';
        }

        \$config['per_page'] = 10;
        \$config['page_query_string'] = TRUE;
        \$config['total_rows'] = \$this->" . $m . "->total_rows(\$q);
        \$$c_url = \$this->" . $m . "->get_limit_data(\$config['per_page'], \$start, \$q);

        \$this->load->library('pagination');
        \$this->pagination->initialize(\$config);

        \$data = array(
            '" . $c_url . "_data' => \$$c_url,
            'q' => \$q,
            'pagination' => \$this->pagination->create_links(),
            'total_rows' => \$config['total_rows'],
            'start' => \$start,
        );
        \$data['site_title'] = '" . $c . "';
        \$data['title'] = '" . $c . "';
        \$data['assign_js'] = '".$c_url."/js/index.js';
        load_view('$c_url/$v_list', \$data);
    }";

}
else {

$string .="\n\n    public function index()
    {
        \$$c_url = \$this->" . $m . "->get_all();

        \$data = array(
            '" . $c_url . "_data' => \$$c_url
        );
        \$data['site_title'] = '" . $c . "';
        \$data['title'] = '" . $c . "';
        \$data['assign_js'] ='".$c_url."/js/index.js';
        load_view('$c_url/$v_list', \$data);
    }";

}

$string .= "\n\n    public function read(\$id)
    {
        \$row = \$this->" . $m . "->get_by_id(\$id);
        if (\$row) {
            \$data = array(";
            foreach ($all as $row) {
                $string .= "\n\t\t'" . $row['column_name'] . "' => \$row->" . $row['column_name'] . ",";
            }
            $string .= "\n\t    );
            \$data['site_title'] = '" . $c . "';
            \$data['title'] = '" . $c . "';
            \$data['assign_js'] = '".$c_url."/js/index.js';
            load_view('$c_url/$v_read', \$data);
        } else {
            \$this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('$c_url'));
        }
    }";
//area create
$string.="\n\n    public function create()
    {\n";
$string .= "\n      \$data = array(
            'button' => 'Create',
            'action' => site_url('$c_url/create_action'),";
            foreach ($all as $row) {
                $string .= "\n\t    '" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "'),";
            }
$string .= "\n\t);";
foreach ($all as $key) {
    if ($key['column_key'] == 'MUL') {
        //$string .= "\n   \$data['".json_encode($key)."']=\"\";";
        foreach ($all_foreign as $foreign_key) {
            if ($key['column_name'] == $foreign_key['referenced_column_name']) {
                $string .= "\n   \$".$foreign_key['referenced_table_name']."=\$this->".$m."->get_query(\"SELECT * FROM ".$foreign_key['referenced_table_name']." \")->result();
                ";
                $string .= "\n   \$data['".$foreign_key['referenced_table_name']."']=\$".$foreign_key['referenced_table_name'].";";
            }
        }
    }
}
$string .="      \$data['site_title'] = '" . $c . "';
        \$data['title'] = 'Tambahkan Data " . $c . "';
        \$data['assign_js'] = '".$c_url."/js/index.js';
        load_view('$c_url/$v_form', \$data);
    }";

$string.="\n\n    public function create_action()
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->create();
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t    );

            \$this->".$m."->insert(\$data);
            \$this->session->set_flashdata('message', '<div class=\"alert bg-success\" role=\"alert\"><em class=\"fa fa-lg fa-warning\">&nbsp;</em> Berhasil Tambah Data <a href=\"#\" class=\"pull-right\"> <em class=\"fa fa-lg fa-close\"></em></a></div>');
            redirect(site_url('$c_url'));
        }
    }

    public function update(\$id)
    {
        \$row = \$this->".$m."->get_by_id(\$id);

        if (\$row) {
            \$data = array(
                'button' => 'Update',
                'action' => site_url('$c_url/update_action'),";
                foreach ($all as $row) {
                    $string .= "\n\t\t'" . $row['column_name'] . "' => set_value('" . $row['column_name'] . "', \$row->". $row['column_name']."),";

                }
                $string .= "\n\t);";
                foreach ($all as $key) {
                    if ($key['column_key'] == 'MUL') {
                        foreach ($all_foreign as $foreign_key) {
                            if ($key['column_name'] == $foreign_key['referenced_column_name']) {
                                $string .= "\n   \$".$foreign_key['referenced_table_name']."=\$this->".$m."->get_query(\"SELECT * FROM ".$foreign_key['referenced_table_name']." \")->result();
                                ";
                                $string .= "\n   \$data['".$foreign_key['referenced_table_name']."']=\$".$foreign_key['referenced_table_name'].";";
                            }
                        }
                    }
                }

            $string .="\$data['site_title'] = '" . $c . "';
            \$data['title'] = 'Ubah Data " . $c . "';
            \$data['assign_js'] = '".$c_url."/js/index.js';
            load_view('$c_url/$v_form', \$data);
        } else {
            \$this->session->set_flashdata('message', '<div class=\"alert bg-danger\" role=\"alert\"><em class=\"fa fa-lg fa-warning\">&nbsp;</em> Data Tidak Ditemukan <a href=\"#\" class=\"pull-right\"> <em class=\"fa fa-lg fa-close\"></em></a></div>');
            redirect(site_url('$c_url'));
        }
    }

    public function update_action()
    {
        \$this->_rules();

        if (\$this->form_validation->run() == FALSE) {
            \$this->update(\$this->input->post('$pk', TRUE));
        } else {
            \$data = array(";
foreach ($non_pk as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$this->input->post('" . $row['column_name'] . "',TRUE),";
}
$string .= "\n\t    );

            \$this->".$m."->update(\$this->input->post('$pk', TRUE), \$data);
            \$this->session->set_flashdata('message', '<div class=\"alert bg-success\" role=\"alert\"><em class=\"fa fa-lg fa-warning\">&nbsp;</em> Berhasil Update Data <a href=\"#\" class=\"pull-right\"> <em class=\"fa fa-lg fa-close\"></em></a></div>');
            redirect(site_url('$c_url'));
        }
    }

    public function delete(\$id)
    {
        \$row = \$this->".$m."->get_by_id(\$id);

        if (\$row) {
            \$this->".$m."->delete(\$id);
            \$this->session->set_flashdata('message', '<div class=\"alert bg-success\" role=\"alert\"><em class=\"fa fa-lg fa-warning\">&nbsp;</em> Berhasil Hapus Data <a href=\"#\" class=\"pull-right\"> <em class=\"fa fa-lg fa-close\"></em></a></div>');
            redirect(site_url('$c_url'));
        } else {
            \$this->session->set_flashdata('message', '<div class=\"alert bg-danger\" role=\"alert\"><em class=\"fa fa-lg fa-warning\">&nbsp;</em> Data Tidak Ditemukan <a href=\"#\" class=\"pull-right\"> <em class=\"fa fa-lg fa-close\"></em></a></div>');
            redirect(site_url('$c_url'));
        }
    }

    public function _rules()
    {";
foreach ($non_pk as $row) {
    $int = $row['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? '|numeric' : '';
    $string .= "\n\t\$this->form_validation->set_rules('".$row['column_name']."', '".  strtolower(label($row['column_name']))."', 'trim|required$int');";
}
$string .= "\n\n\t\$this->form_validation->set_rules('$pk', '$pk', 'trim');";
$string .= "\n\t\$this->form_validation->set_error_delimiters('<span class=\"text-danger\">', '</span>');
    }";

if ($export_excel == '1') {
    $string .= "\n\n    public function excel()
    {
        \$this->load->helper('exportexcel');
        \$namaFile = \"$table_name.xls\";
        \$judul = \"$table_name\";
        \$tablehead = 0;
        \$tablebody = 1;
        \$nourut = 1;
        //penulisan header
        header(\"Pragma: public\");
        header(\"Expires: 0\");
        header(\"Cache-Control: must-revalidate, post-check=0,pre-check=0\");
        header(\"Content-Type: application/force-download\");
        header(\"Content-Type: application/octet-stream\");
        header(\"Content-Type: application/download\");
        header(\"Content-Disposition: attachment;filename=\" . \$namaFile . \"\");
        header(\"Content-Transfer-Encoding: binary \");

        xlsBOF();

        \$kolomhead = 0;
        xlsWriteLabel(\$tablehead, \$kolomhead++, \"No\");";
foreach ($non_pk as $row) {
        $column_name = label($row['column_name']);
        $string .= "\n\txlsWriteLabel(\$tablehead, \$kolomhead++, \"$column_name\");";
}
$string .= "\n\n\tforeach (\$this->" . $m . "->get_all() as \$data) {
            \$kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber(\$tablebody, \$kolombody++, \$nourut);";
foreach ($non_pk as $row) {
        $column_name = $row['column_name'];
        $xlsWrite = $row['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? 'xlsWriteNumber' : 'xlsWriteLabel';
        $string .= "\n\t    " . $xlsWrite . "(\$tablebody, \$kolombody++, \$data->$column_name);";
}
$string .= "\n\n\t    \$tablebody++;
            \$nourut++;
        }

        xlsEOF();
        exit();
    }";
}

// if ($export_word == '1') {
//     $string .= "\n\n    public function word()
//     {
//         header(\"Content-type: application/vnd.ms-word\");
//         header(\"Content-Disposition: attachment;Filename=$table_name.doc\");
//
//         \$data = array(
//             '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
//             'start' => 0
//         );
//         \$data['site_title'] = '" . $c . "';
//         \$data['title'] = '" . $c . "';
//         \$data['assign_js'] = '".$c_url."/js/index.js';
//         load_view('" . $c_url ."/". $v_doc . "',\$data);
//     }";
// }
//
// if ($export_pdf == '1') {
//     $string .= "\n\n    function pdf()
//     {
//         \$data = array(
//             '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
//             'start' => 0
//         );
//
//         ini_set('memory_limit', '32M');
//         \$html = load_view('" . $c_url ."/". $v_pdf . "', \$data, true);
//         \$this->load->library('pdf');
//         \$pdf = \$this->pdf->load();
//         \$pdf->WriteHTML(\$html);
//         \$pdf->Output('" . $table_name . ".pdf', 'D');
//     }";
// }

$string .= "\n\n}\n\n/* PTT */";

$hasil_controller = createFile($string, $target . "controllers/" . $c_file);

?>
