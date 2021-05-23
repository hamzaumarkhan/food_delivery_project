<?php session_start();
include('db.php');

?>

<!DOCTYPE html>

<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- Google Tag Manager -->
		<!-- End Google Tag Manager -->
		<meta charset="utf-8" />
		<title>Food Delivery</title>
		<meta name="description" content="Updates and statistics" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundlee45f.css?v=2.0.6" rel="stylesheet" type="text/css" />
		<!-- <link href="assets/plugins/custom/prismjs/prismjs.bundlee45f.css?v=2.0.6" rel="stylesheet" type="text/css" /> -->
		<link href="assets/css/style.css?v=2.0.6" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<!-- <link href="assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />

		<link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" /> -->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="https://preview.keenthemes.com/keen/theme/demo1/dist/assets/media/logos/favicon.ico" />
		<!-- Hotjar Tracking Code for keenthemes.com -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
	<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize-hoverable"onload="myFunction()">
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="d-flex flex-row flex-column-fluid page">
			<script>
				function myFunction() {
					read_data(); 
				}
			</script>