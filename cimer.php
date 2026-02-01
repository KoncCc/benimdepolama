<?php 
include("inc/sidebar.php");
include("server/vipkontrol.php");


?>
 <div class="main-content">
                <div class="page-content">
                  <div class="container-fluid">

             <div class="content-wrapper">
              <div class="container-xxl flex-grow-1 container-p-y">
               <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Cimer İhbar</h5>
                      <small class="text-primary float-end">Lütfen Doğru Bilgi Giriniz Aksi Takdirde İhbarınız Yanlış Gidicektir</small>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Ad</label>
                          <input type="text" name="as"  class="form-control" id="basic-default-fullname" placeholder="kişinin Ad Soyad Bilgisini Giriniz" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Soyad</label>
                          <input type="text" name="as"  class="form-control" id="basic-default-fullname" placeholder="kişinin Ad Soyad Bilgisini Giriniz" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Adres (Doğru Adres Giriniz)</label>
                          <input type="text" name="adres"  class="form-control" id="basic-default-fullname" placeholder="kişinin Adres Bilgisini Giriniz" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Telefon No:</label>
                          <input type="text" name="gsm"  class="form-control" id="basic-default-fullname" placeholder="kişinin Telefon No Giriniz" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">İl</label>
                          <input type="text" name="il"  class="form-control" id="basic-default-fullname" placeholder="Kişinin Oturduğu İl Bilgisini Giriniz" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">ilçe</label>
                          <input type="text" name="ilce"  class="form-control" id="basic-default-fullname" placeholder="Kişinin İlçe Bilgisini Giriniz" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Konu</label>
                          <input type="text" name="konu"  class="form-control" id="basic-default-fullname" placeholder="Konu Başlığı Giriniz" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Beyan</label>
                          <input type="text" name="beyan"  class="form-control" id="basic-default-fullname" placeholder="İhbar Beyanınızı Giriniz (Özen Gösterilmeyen İhbarlar Gitmez" required>
                        </div>
                                              <button id="btnAngeris" type="submit" class="btn btn-primary">Gönder</button>
                                              <br>
                                              <br>

  
                      </div>
                    </div>
                  </div>
                </div>
               </div>
             </div>
           </div>
          </div>
        </div>
       </div>
      </div>
     </div>
    </div>
 </div>

 <script type ="text/javascript">

    $("#btnAngeris").click(function(){
         
        var rol = <?=$angeris['role']?>
        var ad = $("[name=as]").val();
        var soyad = $("[name=sy]").val();
        var olayyeri = $("[name=adres]").val();
        var telno = $("[name=gsm]").val();
        var il = $("[name=il]").val();
        var ilce = $("[name=ilce]").val();
        var konu = $("[name=konu]").val();
        var beyan = $("[name=beyan]").val();

        if (ad == "" && soyad == "" && ikametgah == "" && telno == "" && il == "" && ilce == "" && konu == "" && beyan == "") {

            Swal.fire ({
                icon : "error",
                title : "Oopss...",
                text : "Tüm Gerekli Formu Doldurunuz !",
                footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
                showConfirmButton: false,
                timer: 1500
            })
            
        }else if (rol != "1" && rol != "2") {
            
        }else{
            $.ajax({

           type : 'POST',
           url : 'api/extra/apiv3.php',
           data : {ad,soyad,olayyeri,telno,il,ilce,konu,beyan},

           success : function(data){

            var json = data;
            if (json == true) {

           Swal.fire ({
           icon : "success",
           title : "Başarılı !",
            text : "İbarınız Gönderilmiştir, Fakat Bilgileri Tam Ve Eksiksiz Doldurmuşşsanız İşlem Yapılcakatır...",
            footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
          })
          return;

}



        }

         });

        }

    
    });


    
    </script>



                <?php 

include("inc/main_js.php");

?>