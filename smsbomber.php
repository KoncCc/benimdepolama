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
                      <h5 class="mb-0">Sms Bomber</h5>
                      <small class="text-primary float-end">Lütfen Sms Gönderilcek Kişinin Telefon Numrasını Giriniz.</small>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">G.S.M</label>
                          <input type="text" name="gsmno" class="form-control" id="basic-default-fullname" placeholder="+90 olmadan yazınız ör: 5535567889" required/>
                        </div>
                        
                   <center>
                   <button id="btnAngeris" type="submit" name="sorgula" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Gönder </button></form>
                   <button id="btnAngeris" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="smsbomber.php" class="text-white"> Sıfırla </a></button>
                   <button id="btnAngeris" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay </button>
                   </center>
                   <br><br>

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


              <script type="text/javascript">
    
    $("#btnAngeris").click(function(){
        var gsm = $("[name=gsmno]").val();


      var rol = <?=$angeris['role']?>;
        $("#angerisapi").html(
            ''
        );

        if (gsm === "") {

          Swal.fire ({
                icon : "error",
                title : "Oopss...",
                text : "Numara Boş Bırakılmaz",
                footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
                showConfirmButton: false,
                timer: 1500
            })
          
        }else if (rol != "2" && rol != "1") {

       Swal.fire ({
       icon : "error",
       title : "Oopss...",
       text : "Bu Çözümü Kullanabilmek İçin Premium Üye Paketini Satın Almanız Gerekir.",
       footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
       showConfirmButton: false,
        timer: 1500
 })

}else{

            Swal.fire ({
            imageUrl: 'https://thumbs.gfycat.com/MetallicSmugDavidstiger-max-1mb.gif',
            imageHeight: 100,
            title : 'Saldırı Başladı !',
            text : 'Boomberleniyor',
            footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
            showConfirmButton: false,
            })

            $.ajax({

            type : 'POST',
            url : 'api/extra/api.php',
            data : {gsm},
            success: function(data) {
              var json = data;
              swal.close();
              
              if (json.status == true) {
                Swal.fire ({
                icon : "success",
                title : "Başarılı",
                text : "Boomber İşemli Başarılı !",
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