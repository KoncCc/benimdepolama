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
                      <h5 class="mb-0">DDoS Attack</h5>
                      <small class="text-primary float-end">Lütfen Doğru Bilgi Giriniz Aksi Takdirte Saldırı Gitmeyecektir</small>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Site:</label>
                          <input type="text" name="site"  class="form-control" id="basic-default-fullname" placeholder="DDoS Atılacak Site Adresini Giriniz"/ required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">IP:</label>
                          <input type="text" name="ip"  class="form-control" id="basic-default-fullname" placeholder="DDoS Atılacak İp Adresini Giriniz"/ required>
                        </div>
                     
                                              <button name="gonder" id="btnAngeris"type="submit" class="btn btn-primary">Başlat</button>
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

   <script type="text/javascript">

    $("#btnAngeris").click(function(){

        var ip = $("[name=ip]").val();
        var adres = $("[name=site]").val();

        if (ip == "" && adres == "") {

            Swal.fire ({
                icon : "error",
                title : "Oopss...",
                text : "IP ve Site Adresi Boş Bırakılmaz",
                footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
                showConfirmButton: false,
                timer: 1500
            })
        }else{

            Swal.fire ({
            imageUrl: 'https://thumbs.gfycat.com/MetallicSmugDavidstiger-max-1mb.gif',
            imageHeight: 100,
            title : 'Saldırı Başladı !',
            text : 'DDoS Attack Start....',
            footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
            showConfirmButton: false,
            })

            $.ajax({
                type : "POST",
                url : "api/extra/apiv2.php",
                data : {ip,adres},
                success : function(data){
                    var json = data;

                    if (json == true) {

                Swal.fire ({
                icon : "success",
                title : "Başarılı",
                text : "DDoS Saldırı İşemli Başarılı !",
                footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
                })
            return;
                    }
                }
            })

        }

    });

    </script>

                <?php 

include("inc/main_js.php");

?>