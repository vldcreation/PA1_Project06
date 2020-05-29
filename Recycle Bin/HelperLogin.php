<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- icon -->
  <link rel="shortcut icon" href="<?php echo $this->website->icon(); ?>">

  <!-- Load Konfigurasu -->
  <?php
  // Site
  $site_info = $this->konfigurasi_model->listing();
?>
  <!-- Login baru -->
  <link rel="stylesheet" href="https://dashboard.tawk.to/_s/787/css/other.style.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://dashboard.tawk.to/_s/787/js/otherhtml.script.min.js"></script>

		<!--[if lte IE 8]>
			<script type="text/javascript">
				window.location.href = "/unsupported";
			</script>
		<![endif]-->

		<script type="text/javascript">
			$.validator.messages.required  = "Bagian ini diperlukan.";
			$.validator.messages.minlength = "Masukkan setidaknya {0} karakter.";
		</script>
		<script type="text/javascript">
			var $_Tawk_API={},$_Tawk_LoadStart=new Date();(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];s1.async=true;s1.src='https://embed.tawk.to/521727297ca1334016000005/18nms7gql';s1.charset='UTF-8';s1.setAttribute('crossorigin','*');s0.parentNode.insertBefore(s1,s0);})();
		</script>
		<script type="text/javascript">
			function parseQueryString(str) {
				var i, l, pair, query, vars,
					queryObj = {};

				if (str) {
					query = str.replace(/(.*)\?/, '');
				}

				vars = query.split('&');

				for (i = 0, l = vars.length; i < l; i += 1) {
					pair = vars[i].split('=');

					queryObj[pair[0]] = pair[1];
				}

				return queryObj;
			}

			if(window.location.hash === '#!tawk-debug'){
				if(!Modernizr.canvas){
					console.log('no canvas');
				}

				if(!Modernizr.audio){
					console.log('no audio');
				}

				if(!Modernizr.filereader){
					console.log('no filereader');
				}

				if(!Modernizr.cookies){
					console.log('no cookies');
				}

				if(!Modernizr.localstorage){
					console.log('no localstorage');
				}
			}

			if( !Modernizr.cookies ){
				window.location.href = "/unsupported";
			}

			$(document).ready(function(){
				$('#login').validate({
					rules: {
						email    : rules.email,
						password : rules.password
					},
					highlight : function(element, errorClass){
						$(element).addClass(errorClass);
					},
					errorElement  : 'em',
					errorClass    : 'invalid',
					submitHandler : function(){
						var loginData = {
							password   : $('#password').val(),
							rememberMe : $('#rememberMe').is(':checked') ? 'yes' : 'no',
							locale     : $('#language').val()
						};

						$("#submitting-loader-container").show();

						formSubmission(loginData, '/login', function(data){
							$("#submitting-loader-container").hide();

							if(data.redirect) {
								window.location.href = data.redirect;
								return;
							}

							$('p.error').hide();

							if(data === null || !data.success) {
								if(data.error === 'INVALID_EMAIL'){
									$('#email-error').show();
								}else if(data.error === 'AGENT_NOT_FOUND'){
									$('#not-found').show();
								}else if(data.error === 'ACCOUNT_SUSPENDED'){
									$('#suspended').show();
								}else if(data.error === 'BETA_UNAPPROVED'){
									$('#beta-unapproved').show();
								}else if(data.error === 'TOO_MANY_FAILED_LOGINS'){
									$('#failed-login-attemtps').show();
								} else if(data.error === 'REQUIRES_PASSWORD_RESET'){
									$('#password-reset-required').show();
								}
								else{
									$('#invalid-credentials').show();
								}
							}else{
								if(loginData.locale){
									setLocaleCookie(loginData.locale);
								}

								var searchQuery = parseQueryString(window.location.href);
								var redirectTo;

								if (searchQuery) {
									if (searchQuery.redirectTo) {
										redirectTo = searchQuery.redirectTo;
									}
								}

								if (redirectTo) {
									window.location = window.location.protocol + '//' + window.location.host + decodeURIComponent(redirectTo);
								} else {
									window.location = '/' + window.location.hash;
								}
							}
						});

						return false;
					}
				});

				$.ajax({
					type : "get",
					url : 'https://proxy.tawk.to/v2/feed?v=3',
					dataType : 'json'
				}).done(function (data) {
					if (data) {
						var count = 0;
						$('#body-content-container').html('');

						for (var i = 0; i < data.length; i++) {
							var entryDate, entryEl,
								entry = data[i];


							entryEl = $('<div class="content"></div>');

							entryEl.append('<a class="content-title" href="' + entry.link + '" target="_blank">' + entry.title + '</a>');

							if (entry.date && entry.date.length) {
								entryDate = new Date(entry.date);
								entryEl.append('<p class="content-date">' + entryDate.toDateString() + '</p>');
							}

							if (entry.description && entry.description.length) {
								entryEl.append('<p class="content-body">' + entry.description + '</p>');
							}

							entryEl.append('<a class="light-green feed-link" href="' + entry.link + '" target="_blank">Learn more</a>');

							$('#body-content-container').append(entryEl);
							count++;

							if (count === 2) {
								break;
							}
						}
					}
				}).fail(function(data){
					$('#body-content-container').html('<p class="error">Unable to load content</p>');
				});
			});
		</script>

<!-- End Login baru -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SWEETALERT -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style type="text/css" media="screen">
    .login-box {
      min-width: 40% !important;
    }
  </style>
</head>
<body>
<div id="menu-container">
			<div id="language-container">
				<div id="selected-language">
					<span id="language-name">English (United States)</span>
					<span id="select-language"></span>
				</div>
				<div id="language-selection-list">
					<ul>
							<li class="change-language" id="bg"><span class="lang-title">български</span></li>
							<li class="change-language" id="cat"><span class="lang-title">català</span></li>
							<li class="change-language" id="cs"><span class="lang-title">čeština</span></li>
							<li class="change-language" id="da"><span class="lang-title">dansk</span></li>
							<li class="change-language" id="de"><span class="lang-title">Deutsch</span></li>
							<li class="change-language" id="en"><span class="lang-title">english (United States)</span></li>
							<li class="change-language" id="es"><span class="lang-title">español</span></li>
							<li class="change-language" id="fi"><span class="lang-title">suomi</span></li>
							<li class="change-language" id="fr"><span class="lang-title">français</span></li>
							<li class="change-language" id="hi"><span class="lang-title">हिंदी</span></li>
							<li class="change-language" id="it"><span class="lang-title">italiano</span></li>
							<li class="change-language" id="hu"><span class="lang-title">magyar</span></li>
							<li class="change-language" id="id"><span class="lang-title">Bahasa Indonesia</span></li>
							<li class="change-language" id="ko"><span class="lang-title">한국어</span></li>
							<li class="change-language" id="nl"><span class="lang-title">Nederlands</span></li>
							<li class="change-language" id="pl"><span class="lang-title">polski</span></li>
							<li class="change-language" id="pt_br"><span class="lang-title">português (Brasil)</span></li>
							<li class="change-language" id="ro"><span class="lang-title">română</span></li>
							<li class="change-language" id="ru"><span class="lang-title">Русский</span></li>
							<li class="change-language" id="sk"><span class="lang-title">slovenčina</span></li>
							<li class="change-language" id="sv"><span class="lang-title">svenska</span></li>
							<li class="change-language" id="tr"><span class="lang-title">Türkçe</span></li>
							<li class="change-language" id="vi"><span class="lang-title">Tiếng Việt</span></li>
							<li class="change-language" id="zh_tw"><span class="lang-title">繁体中文</span></li>
					</ul>
					<div id="language-dropdown-triangle"></div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div id="load-container">
			<img width="60" height="60" src="data:image/gif;base64,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" />
		</div>
		<div id="login-container" class="main-container hide">
			<div id="left-content-container">
				<div id="left-content-wrapper">
					<div id="header-content">
						<div class="clear"></div>
						<p id="feed-header" class="light-green">
							Cloud CLub Del
						</p>
					</div>
					<div>
						<div id="body-content-container">
							<img src="<?php echo base_url() ?>assets/upload/image/logo.png" style="margin: 30px auto; display: block;">
						</div>
					</div>
				</div>
			</div>
			<div id="right-content-container">
				<div id="form-container">
					<div id="logo-container">
						<div id="logo"></div>
					</div>
					<div id="form-header">
						<h1>Login to your Cloud Club Akun</h1>
					</div>
					<form id="login" method="post" action="login" class="form">

						<div class="input-area">
							<input type="text" class="text" id="username" name="username"
								placeholder="Masukkan email"/>
						</div>
						<div class="input-area">
							<input type="password" class="text" id="password" name="password" minlength="6"
								placeholder="Masukkan Kata Sandi Anda"/>
						</div>
						<div class="input-area">
							<input type="submit" class="button" value="Masuk" id="submit-login" />
						</div>
						<div class="input-area">
							<div class="left">
								<input type="checkbox" id="rememberMe" name="rememberMe" />
								<label for="rememberMe" id="rememberMe-label">Ingatkan saya</label>
							</div>
							<div class="right">
								<a id="forgot-password-link" href="forgot-password" class="light-green">Lupa Password?</a>
							</div>
							<div class="clear"></div>
						</div>
						<p>Don't have an account? <a href="signup" class="light-green">Create free account</a></p>
						<input type="hidden" value="id" id="language" />
					</form>
				</div>
			</div>
		</div>

    !-- /.login-box -->
<!-- SWEETALERT -->
<?php if($this->session->flashdata('sukses')) { ?>
<script>
  swal("Berhasil", "<?php echo $this->session->flashdata('sukses'); ?>","success")
</script>
<?php } ?>

<?php if($this->session->flashdata('warning')) { ?>
<script>
  swal("Oops...", "<?php echo $this->session->flashdata('warning'); ?>","warning")
</script>
<?php } ?>
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>