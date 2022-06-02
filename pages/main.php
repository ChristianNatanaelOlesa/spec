<?php

$page=isset($_GET['p']) ? $_GET['p'] : 'home';
if($page=='home'){
	include 'home.php';
}
elseif ($page=='target') {
	include 'tabel/target.php';
}
elseif ($page=='aksi') {
	include 'tabel/aksi.php';
}
elseif ($page=='lokasi') {
	include 'tabel/lokasi.php';
}
elseif ($page=='user') {
	include 'tabel/user.php';
}
elseif ($page=='new_prospect') {
	include 'tabel/new_prospect.php';
}
elseif ($page=='newprospectdetail') {
	include 'tabel/new_prospect_detail.php';
}
elseif ($page=='newprospectdetailmoreoil') {
	include 'tabel/new_prospect_detail_more_oil.php';
}
elseif ($page=='tunggu') {
	include 'tabel/tunggu.php';
}
elseif ($page=='form_spec_close') {
	include 'tabel/formspec_close.php';
}
elseif ($page=='new_klarifikasi') {
	include 'tabel/new_klarifikasi.php';
}
elseif ($page=='form_spec') {
	include 'tabel/form_spec.php';
}
elseif ($page=='form_spec_open') {
	include 'tabel/formspec_open.php';
}
elseif ($page=='form_spec_progress') {
	include 'tabel/formspec_progress.php';
}
elseif ($page=='form_spec_wait_approve') {
	include 'tabel/formspec_wait_approve.php';
}
elseif ($page=='form_spec_terima_sales') {
	include 'tabel/formspec_terima_sales.php';
}
elseif ($page=='form_spec_release') {
	include 'tabel/formspec_release.php';
}
elseif ($page=='formspec_reject') {
	include 'tabel/formspec_reject.php';
}
elseif ($page=='minta_material') {
	include 'tabel/minta_material.php';
}
elseif ($page=='minta_koreksi') {
	include 'tabel/minta_koreksi.php';
}
elseif ($page=='form_spec_reject_spv') {
	include 'tabel/formspec_reject_spv.php';
}



//TAMBAHAN CHRIST (25 May 2022)
elseif ($page=='trafo_oil_std') {
	include 'tabel/trafo_oil_std.php';
}
elseif ($page=='create_trafo_oil_std') {
	include 'tabel/create_trafo_oil_std.php';
}

elseif ($page=='update_trafo_oil_std') {
	include 'tabel/update_trafo_oil_std.php';
}

elseif ($page=='delete_trafo_oil_std') {
	include 'tabel/delete_trafo_oil_std.php';
}

elseif ($page=='trafo_dry_std') {
	include 'tabel/trafo_dry_std.php';
}
elseif ($page=='create_trafo_dry_std') {
	include 'tabel/create_trafo_dry_std.php';
}

elseif ($page=='update_trafo_dry_std') {
	include 'tabel/update_trafo_dry_std.php';
}

elseif ($page=='delete_trafo_dry_std') {
	include 'tabel/delete_trafo_dry_std.php';
}
?>