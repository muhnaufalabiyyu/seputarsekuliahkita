<?php

function templateadmin($view, $data=null){
	get_instance()->load->view('admin/template/v_header', $data);
	get_instance()->load->view($view, $data);
	get_instance()->load->view('admin/template/v_footer', $data);
}

function template($view, $data=null){
  get_instance()->load->view('template/v_header', $data);
  get_instance()->load->view($view, $data);
  get_instance()->load->view('template/v_footer', $data);
}

function active_menu($controller){
    $class=get_instance()->uri->segment(2);
    return ($class==$controller) ? 'active' : '';
}

function active_menu_cust($controller){
    $class=get_instance()->uri->segment(1);
    return ($class==$controller) ? 'active' : '';
}

function tanggal_indo($tanggal, $waktu = false, $cetak_hari = false)
{
  $hari = array ( 1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
      );
  
  $bulan = array (1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
  if($waktu){
    $split_waktu = explode(' ', $tanggal);
    $split = explode('-', $split_waktu[0]);
    $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0].' '.$split_waktu[1];
  }
  else {
    $split_waktu = explode(' ', $tanggal);
    $split = explode('-', $split_waktu[0]);
    $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
  }

  if ($cetak_hari) {
    $num = date('N', strtotime($tanggal));
    return $hari[$num] . ', ' . $tgl_indo;
  }
  return $tgl_indo;
}

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}