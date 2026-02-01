
<?php 
include("inc/sidebar.php");

$sql = "SELECT * FROM duyuru";
$duyuruangeris = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		.aa{
			background-color: rgba(48, 48, 77, 0.8); /* Saydamlık için 0.5 değerini değiştirebilirsiniz */
		}
	</style>
</head>
<body style="background-image: url('assets/images/.jpg');background-position: center; background-repeat: no-repeat;">
	
<div class="row" >
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
							<div class="card  img-card ">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
											<p class="text-white mb-0"  style="background-image: url(https://media.giphy.com/media/eYRGWfchREFUUlXT7P/giphy.gif);">Bitiş Tarihi : </p>
											<br>
											<h2 class="mb-0 number-font" style="font-size:15px;">
											<?php
                                               if ($angeris['role'] == 1) {
												echo "Sınırsız";
											   }elseif ($angeris['role'] == 2 && $angeris['enddate'] == 0) {
												echo "Sınırsız";
											   }elseif ($angeris['role'] == 3 && $angeris['enddate'] == 0) {
												echo "Sınırsız";
											   }else{
												echo ($tarih2 - $tarih1) / (60*60*24); echo "    Gün Kaldı";
											   }
											
											?>
											   </h2>
											</div>
											<div class="ms-auto"> <i class="fa-solid fa-clock text-white fs-30 me-2 mt-2"></i></i> </div>
										</div>
									</div>
								</div>
							</div><!-- COL END -->
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
							<div class="card  img-card ">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
											<p class="text-white mb-0" style="background-image: url(https://media.giphy.com/media/eYRGWfchREFUUlXT7P/giphy.gif);">Üyelik Türü :</p>
												<h2 class="mb-0 number-font" style="font-size:15px;">
													<br>
													
													<?php if ($angeris['role'] == 1) { ?>
                                                        root@admin
													<?php }else if ($angeris['role'] == 2) { ?>

														root@premium
														
													<?php } ?>
												</h2>
												
											</div>
											<div class="ms-auto"> <i class="fa-solid fa-circle-user text-white fs-30 me-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
							</div><!-- COL END -->
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card  img-card ">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
											<p class="text-white mb-0"  style="background-image: url(https://media.giphy.com/media/eYRGWfchREFUUlXT7P/giphy.gif);">Toplam Kullanıcı Sayısı : </p>
											<h2 class="mb-0 number-font" style="font-size:15px;">
											<?php echo $angerissayi; ?>
											</h2>
											</div>
											<div class="ms-auto"> <i class="fa solid fa-users text-white fs-30 me-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
						 </div>
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
							<div class="card  img-card ">
									<div class="card-body"  style="background-color: rgba(48, 48, 77, 0.8); /* Saydamlık için 0.5 değerini değiştirebilirsiniz */">
										<div class="d-flex">
											<div class="text-white">
											
											<h2 class="mb-0 number-font" style="font-size:15px;">
											Sistemimize Hoşgeldin
											</h2>
											<p class="text-white mb-0"  style="background-image: url(https://media.giphy.com/media/eYRGWfchREFUUlXT7P/giphy.gif);"><?=$angeris['key_ad'];?></p>
											
											</div>
											<div class="ms-auto"> <i class="fa-solid fa-user-secret text-white fs-30 me-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
						</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header"  style="background-color: rgba(48, 48, 77, 0.8); /* Saydamlık için 0.5 değerini değiştirebilirsiniz */">
										<h3 class="card-title">Duyuru Tablosu</h3>
									</div>
									<div class="card-body"  style="background-color: rgba(48, 48, 77, 0.8); /* Saydamlık için 0.5 değerini değiştirebilirsiniz */">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
														<th class="wd-15p">Duyuru Atan</th>
														<th class="wd-15p" >Duyuru</th>
														<th class="wd-20p">Duyuru Tarihi</th>
													</tr>
												</thead>
												<tbody>
												<?php while ($angers = $duyuruangeris->fetch(PDO::FETCH_ASSOC)) { ?>
													<tr>
													<td><?=$angers['duyuruatan']?></td>
													<td><?=$angers['atılanduyuru']?></td>
													<td><?=$angers['tarih']?></td>
													</tr>
														
												<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
						</div>
						


       <?php
       include("inc/main_js.php");
	   ?>
</body>
</html>

