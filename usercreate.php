<?php
include("inc/sidebar.php");
include("server/adminkontrol.php");

if (isset($_POST['ekle'])) {
    $created = $angeris['key_ad'];
    $eklenentarih = date('d.m.Y');
    $keyad = htmlspecialchars($_POST['keyad']);
    $kkey = htmlspecialchars($_POST['kkey']);
    $bitistarih = htmlspecialchars($_POST['bitistarih']);
    $ipadres = htmlspecialchars($_POST['ipadres']);
    $rolu = htmlspecialchars($_POST['rolu']);
    $guvenli = htmlspecialchars($_POST['guvenli']);

    $kontrol = $conn->query("SELECT * FROM users WHERE key_pas='$kkey'")->fetch();
    if ($kontrol['key_pas'] == "$kkey") {
        $message =  "<div class='alert alert-danger'>Hata Bu Kullanıcı Adı Ve Ya Şifresini Kullanan Bir Kullanıcı Var</div>";
    }else {
       $angerisekle = $conn->prepare("INSERT INTO users SET key_ad='$keyad',key_pas='$kkey',role='$rolu',createddate='$eklenentarih',enddate='$bitistarih',ipadres='$ipadres',security='$guvenli',endkey='',owner='',banned='',createdadmin='$created'");

       $angerisekle->execute();
       $message =  "<div class='alert alert-primary'>Bilgilendirme : Başarılı Kullanıcı Eklendi ! Kullanıcı Adı : ".$keyad." Kullanıcı Şifresi : ".$kkey." IP Adresi : ".$ipadres." Bitiş Tarihi : ".$bitistarih."  </div>";

    }


}
    ?>

                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="mb-0 card-title">Kullanıcı Ekle</h3>
									</div>
									<div class="card-body">
                                    <div class="alert alert-primary" role="alert">
	                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×        
                                        </button>Kullanıcı Eklerken Dikkat Et Aşşağıdaki Tüm Seçenekleri Doldurduğuna Emin Ol Aksi Taktirde Hata Alabilirsin!</div>
                                        <form method="post">
                                        <div class="row">
											<div class="col-md-6">
                                               <div class="mb-4">
													<input type="text" class="form-control" name="keyad" placeholder="Kullanıcı Adı" required>
												</div>
                                                <div class="mb-4">
													<input type="text" class="form-control" name="kkey" placeholder="Şifre"required>
												</div>
                                                <div class="mb-4">
													<input type="text" class="form-control" name="bitistarih" placeholder="Bitiş Tarihi"required>

                                                    
														</label>
                                                        <label class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" name="rolu" value="2">
															<span class="custom-control-label">Premium Üye</span>
														</label>
                                                        <label class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" name="guvenli" value="1">
															<span class="custom-control-label">Güvenli Üye</span>
														</label>
                                                        <label class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" name="bitistarih" value="0">
															<span class="custom-control-label">Süresiz Üye</span>
														</label>
                                              </div>
                                            </div> 
                                            <button type="submit" name="ekle" style="float: right;" class="btn btn-primary">Oluştur <i class="fa fa-plus fa-spin ms-2"></i></button>
                                            <br><br>
                                            <?php echo $message; ?>
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