<?php
include("inc/sidebar.php");
include("server/adminkontrol.php");


if ($angeris['role'] == 1) {

    if (isset($_POST['gonder'])){

        $keyad = $_POST['key_ad'];
        $kkey = $_POST['key_pas'];
        $bitistarih = $_POST['enddate'];
        $multi = $_POST['ipadres'];
        $guvenli = $_POST['security'];
        $role = $_POST['role'];
        $id = htmlspecialchars($_GET['id']);
        
        $guncelle = $conn->prepare("UPDATE users SET key_ad='$keyad',key_pas='$kkey',role='$role',enddate='$bitistarih',ipadres='$multi',security='$guvenli',endkey='0',owner='0',banned='0' WHERE id='$id'");
        $guncelle->execute();
        
        
        $message =  "<div class='alert alert-primary'>Bilgilendirme : Başarılı Key Düzenlendi !  / Kullanıcı Adı : ".$keyad." / Kullanıcı Şifresi : ".$kkey." / IP Adresi : ".$multi."\n / Bitiş Tarihi : ".$bitistarih."  </div>";
        
        
        
        }

}



$sql = "SELECT * from users WHERE id = ?";
$angeris = $conn->prepare($sql);
$angeris->execute([$_GET['id']]);
$satir = $angeris->fetch(PDO::FETCH_ASSOC);
?>


                   <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                      <form method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Kullanıcı Adı</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="key_ad" id="basic-default-name" placeholder="" value="<?=$satir['key_ad']?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Kullanıcı Şifresi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="key_pas" id="basic-default-company" placeholder="" value="<?=$satir['key_pas']?>">
                          </div>
                        </div>
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Bitiş Tarihi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="enddate"  id="basic-default-company" placeholder="" value="<?=$satir['enddate']?>">
                          </div>
                        </div>
                          </div>
                          <br><br><br>
                          <center>
                          <?php if ($satir['role'] == 2) { ?>
                            <h5 class="text-primary" style="float:left;">Üyelik Durumu : <h5 class="text-danger" style="float:left; margin-left: 5px;"> Premium</h5>
                         <?php } ?>
                         <br><br>
                         <?php if ($satir['security'] == 1) { ?>
                            <h5 class="text-primary" style="float:left;">Güvenli Üye Durumu : <h5 class="text-danger" style="float:left; margin-left: 5px;"> Aktif</h5>
                         <?php }else{ ?>

                           <h5 class="text-primary" style="float:left;">Güvenli Üye Durumu : <h5 class="text-danger" style="float:left; margin-left: 5px;"> Kapalı</h5>

                        <?php } ?>
                        <br><br>
                        <?php if ($satir['enddate'] == "0") { ?>
                            <h5 class="text-primary" style="float:left;">Sınırsız Üye Durumu : <h5 class="text-danger" style="float:left; margin-left: 5px;"> Aktif</h5>
                         <?php }else{ ?>

                           <h5 class="text-primary" style="float:left;">Sınırsız Üye Durumu : <h5 class="text-danger" style="float:left; margin-left: 5px;"> Kapalı</h5>

                        <?php } ?>


                       </center>
                        </div>
                           <div class="alert alert-danger">Bilgilendirme : Lütfen Key Düzenlerken Aşşağıdaki Seçenekleri Seçmeyi Unutmayın Sınırsız Üye Eklerken Lütfen Bitiş Tarihine Bir Veri Girmeyiniz, Güvenilir Üyeyi Kullanıcıdan Kaldırmak İçin Lütfen Güvenilir Üye Tickini Seçmeden Düzenleme Yapınız Düzenlediğiniz Kullanıcıyı Düzenlemeden Önce Hangi Üyelik Olduğunu Seçiniz Ve Ya Değiştirmek İstediğiniz Üyeliği Seçiniz, Sınırsız Üye Özelliğini Almak İsterseniz Bitiş Tarihini Doldurup Düzenlemeniz Yeterlidir ! Unutmayın Düzenlediğiniz Üyenin Aşşağıdaki Üyelik Seçeneklerini Seçmeden Düzenlerseniz Hata Alırsınız. !</div>

                       <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="role" id="exampleRadios1" value="2" >
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Premium Üye
                                                    </label>
                                                </div>
                                                 <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="security" id="exampleRadios1" value="1" >
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Güvenilir Üye
                                                    </label>
                                                </div>
                                                 <div class="form-check mb-2">
                                                    <input class="form-check-input" type="radio" name="enddate" id="exampleRadios1" value="0" >
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Süresiz Üye
                                                    </label>
                                                </div>
                        <br>

                        <br>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name="gonder" style="float:right;" class="btn btn-danger">Kaydet</button>
                          </div>
                          <br><br><br>
                         <?php echo $message; ?>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                         </div>
                         </div>
                         </div>


<?php
include("inc/main_js.php");

?>

