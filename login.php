<!doctype html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		.aa{
			background-color: rgba(48, 48, 77, 0.8); /* Saydamlık için 0.9 değerini değiştirebilirsiniz */
		}
	</style>
</head>
<body style="background-image: url('assets/images/back2.jpg');background-position: center; background-repeat: no-repeat;">
	

<html lang="en" dir="ltr">
	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Rookie - Minecraft">

                <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="https://i.hizliresim.com/hs1331h.png" />
        <!-- TITLE -->
        <title>Telegram @RookieChecker</title>

        <!-- BOOTSTRAP CSS -->
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

        <!-- STYLE CSS -->
        <link href="assets/css/style.css" rel="stylesheet"/>
        <link href="assets/css/skin-modes.css" rel="stylesheet"/>
        <link href="assets/css/dark-style.css" rel="stylesheet"/>

        <!-- SINGLE-PAGE CSS -->
	<link href="assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

        <!-- P-scroll bar css-->
        <link href="assets/plugins/p-scroll/perfect-scrollbar.css" rel="stylesheet" />

        <!--- FONT-ICONS CSS -->
        <link href="assets/css/icons.css" rel="stylesheet"/>

        
		
        <!-- COLOR SKIN CSS -->
        <link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/colors/color1.css" />

        <!-- SWITCHER SKIN CSS -->
        <link href="assets/switcher/css/switcher.css" rel="stylesheet">
        <link href="assets/switcher/demo.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />

    </head>

	<body class="login-img dark-mode">
		<div id="global-loader">
			<img src="assets/images/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /GLOABAL LOADER -->
        
        <iframe src="../img/login.mp3" loop id="x" allow="autoplay" style="display:none">
        </iframe>
			
				<!-- PAGE -->
				<div class="page">
					<div class="">
						<!-- CONTAINER OPEN -->
						<div class="col col-login mx-auto">
						</div>
						<div class="container-login100">
							<div class="wrap-login100 p-6">
								<div class="login100-form validate-form">
									<center>
									<img src="rvn.png" style="width: 200px;">
									<br><br>
                                     </center>
									<span class="login100-form-title">
                                    <p class="text-white mb-0"  style="background-image: url(https://media.giphy.com/media/eYRGWfchREFUUlXT7P/giphy.gif);"> Rookie - Checker </p>
									</span>
									<div class="wrap-input100 validate-input">
										<input class="input100" type="text" name="user" placeholder="Kullanıcı Adı">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="fe fe-user" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input">
										<input class="input100" type="password" name="pass" placeholder="Şifre">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="fe fe-lock" aria-hidden="true"></i>
										</span>
									</div>
									<div class="text-end pt-1">
										<p class="mb-0"><a href="https://t.me/Rookiechecker" class="text-primary ms-1">Şifrenimi Unuttun ?</a></p>
									</div>
									<div class="container-login100-form-btn">
										<button type="submit" id="btnAngeris" class="login100-form-btn btn-primary">
                                    Giriş Yap
                                     </button>
									</div>
									<div class="text-center pt-3">
                                    <a href="https://t.me/Rookiechecker" class="text-dark mb-0">Telegram Adresimize Gelmek İçin,
                                             <a href="https://t.me/Rookiechecker" class="text-primary ms-1">Yazıya Tıkla Telegrama Gel.</a></p>
									</div>
							</div>
						</div>
					
					</div>
				</div>

				<script type="text/javascript">
    $('#btnAngeris').click(function(){

        var keyad = $("[name=user]").val();
		var key = $("[name=pass]").val();
        if (key == "" && keyad == "") {

            Swal.fire ({
                icon : "error",
                title : "Oopss...",
                text : "Kullanıcı Adı Ve Şifre Boş Bırakılamaz!",
                footer: '<a href="https://t.me/Rookiechecker">Rookie Checker</a>',
                showConfirmButton: false,
                timer: 1500
            })
            
        }else{
            $.ajax({
            type : "POST",
            url : "api/login/api.php",
            data : {keyad,key},
            success : function(data){
                var json = data;
                if (json.login === "success") {
                    Swal.fire({
                    position: 'center',
                    icon : "success",
                    title : 'Merhaba Rookie Checker Üyesi :)',
                    text: 'Giriş Başarılı Yönlendiriliyorsunuz...',
                    footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
                    showConfirmButton: false,
                    timer: 3000
                })
                window.setTimeout(function() {
                    window.location.href = '/check.decart';
                }, 3000);

                }
                if (json.error === "banned") {

                    Swal.fire({
                        icon : "error",
                        title : "Oopss...",
                        text : "Rookie Bot Tarafından Banlandınız Banlanma Sebebi : Multi Key !",
                        footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
                        confirmButtonText: 'Tamam'
                    })
                    
                }
                if (json.error === "endkey") {

                    Swal.fire({
                        icon : "error",
                        title : "Oopss...",
                        text : "Üyeliğinizin Süresi Bitmiştir Tekrar Satın Almak İçin Lütfen Yöneticiye Başvurunuz !",
                        footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
                        confirmButtonText: 'Tamam'
                    })
                    
                }
                if (json.login === "error") {

                    Swal.fire({
                        icon : "error",
                        title : "Oopss...",
                        text : "Kullanıcı Bulunamadı Lütfen Kullanıcı Adını ve Şifreni Kontrol Et...",
                        footer: '<a href="https://t.me/Rookiechecker">Şifreni mi Unuttun ?</a>',
                        confirmButtonText: 'Tamam'
                    })
                    
                }
            }

        });
        }

    });
  </script>
  
</div>
</div>
</div>

</div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

			
        <script src="assets/js/jquery.min.js"></script>

        <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <script src="assets/plugins/rating/jquery.rating-stars.js"></script>
        <script src="assets/plugins/input-mask/jquery.mask.min.js"></script>
        <script src="assets/plugins/p-scroll/perfect-scrollbar.js"></script>
        <script src="assets/switcher/js/switcher.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>
