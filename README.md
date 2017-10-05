## HOW TO USE ##
[1] Copy seluruh folder (assets and kbs) generator ke dalam proyek berbasis codeigniter.
## ##
[2] Ubah File database.php yang ada didalam application/config/ hubungkan dengan database yang akan digunakan
## ##
[3] Ubah File config.php yang ada didalam application/config/
    `$config['index_page'] = '';`
    `$config['uri_protocol']	= 'REQUEST_URI';`
    `$config['url_suffix'] = '.html';`
## ##
[4] Ubah File autoload.php yang ada didalam application/config/
    `$autoload['libraries'] = array(
                                'database',
                                'session',
                                'form_validation'
                              );`
    `$autoload['helper'] = array('url','page_template');`
## ##
[5] Pastikan .htaccess dengan isi berikut ini jika tidak ada silahkan ditambahkan
    `RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php/$1 [L]`
## ##
[6] Akses generator dengan localhost/project/kbs/
## ##
[7] Klik menu navigasi Setting untuk setting dasar dan pemilihan tema yang digunakan (adminLTE/default) jika sudah klik generator pada menu navigasi
## ##
[8] Klik tabel yang ingin digenerate pada selecbox
## ##
[9] Klik Generate ; see your controller,model and view GOOD working
