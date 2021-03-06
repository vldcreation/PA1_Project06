<?php
// Site
$site_info = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<meta name="description" content="<?php echo strip_tags($site_info->tentang).', '.$title ?>">
<meta name="keywords" content="<?php echo $site_info->keywords.', '.$title  ?>">
<meta name="author" content="<?php echo $site_info->namaweb ?>">
<!-- icon -->
<link rel="shortcut icon" href="<?php echo $this->website->icon(); ?>">
<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<!-- Plugin css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/font-awesome.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/fonts/flaticon.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/bootstrap.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/animate.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/swiper.min.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/lightcase.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/jquery.nstSlider.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/flexslider.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/style3.css" media="all" />
<!-- own style css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/style.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/rtl.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/tema/assets/css/responsive.css" media="all" />
<!-- DataTables CSS -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap4.css">
<!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.css">
  <style type="text/css" media="screen">
  	p {
  		margin-bottom: 15px;
  	}
  </style>

<link href="<?php echo base_url() ?>assets/font/googleapis.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/font/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/font/ionicons.min.css">
  <!-- TINYMCE -->
<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- TINYMCE -->
  <script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
  
</head>

<body>
