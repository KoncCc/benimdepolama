<?php
include("inc/sidebar.php");

$customCSS = array(
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link rel="icon" href="https://quarex.pro/assets/images/quarexlogox2.png" type="image/x-icon" />',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>'

);

$page_title = 'IP SORGU';
include 'enbuyukbenimaminakodumuncocuklari.php';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');

error_reporting(0);

?>
<!--<div class="page-content">-->
<!--BAŞLANGIC-->

             
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
                                

                
                                              <div class="card">
                                        <div class="card-body">
										<h4 class="fs-base lh-base fw-medium text-muted mb-0">
 <i class="fas fa-map-marked-alt"> IP SORGU</i>
</h4>
<br>
<h2 class="h6 font-w500 text-muted mb-0">
<b style="color:white;">Merkezi Nüfus İdaresi Sistemi veritabanı sorgu bölümünde aradığınız kişileri IP Adresi ile sorgulayabilirsiniz.</b>
</h2>

</div>
</div>




  <div class="card">
                                        <div class="card-body">


<h5><b> - IP adresi ile ne yapabilirim ?</b></h5>
<p>
    <b>İstediğiniz kişinin Adresine ve cihazına sızıp, veri aktarımı yapabilirsiniz.</b>
</p>


<h5><b> - Neden IP sorguda Açık adresi göremiyorum ?</b></h5>
<p>
    <b>Diğer sunucuları deneyebilir veya Harita üzerinden kullanabilirsiniz.</b>
</p>
										
                                <form action="" method="post">

<div class="tab-pane active" id="tc" role="tabpanel">
                         <div class="mb-3 input-group">
                        <input type="text" maxlength="18" class="form-control" name="ip_adresi" id="number" placeholder="IP Adresi" required><br>
                        </div>
                       
                                </div>

                                <br>
				   <center>
                   <button type="submit" name="sorgula" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula</button></form>
                   <button id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="ipsorgu.php" class="text-white"> Sıfırla </a></button>
                   <button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay</button><br><br>
                   </center>
                        
 </div>
  </div>
                                </div>
                            </div>
							</div>
								</div>
							
	<div class="col-xl-12 col-md-6">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
									
										<div class="table-responsive">
                                            <table class="table mb-0">
        
                                                <thead class="thead-light">
<tr>
<th scope="col">IP</th>
<th scope="col">Ülke</th>
<th scope="col">Ülke Kodu</th>
<th scope="col">Bölge</th>
<th scope="col">Bölge Kodu</th>
<th scope="col">Şehir</th>
<th scope="col">Posta Kodu</th>
<th scope="col">Enlem</th>
<th scope="col">Boylam</th>
<th scope="col">Zaman Dilimi</th>
<th scope="col">ISP</th>
<th scope="col">Organizasyon</th>
<th scope="col">As Numarası/Adı</th>
</tr>
                            </thead>
                        
                            <tr>
                                	<?php
        if(isset($_POST['sorgula'])) {
            //JSON Veriyi çek ve çöz
            $ip_bilgi = file_get_contents('http://ip-api.com/json/'.$_POST['ip_adresi']);
            $json_coz = json_decode($ip_bilgi, true);
            ?>
                  
<tbody>
<td><?php echo $json_coz['query']; ?> </td>

<td><?php echo $json_coz['country']; ?> </td>

<td><?php echo $json_coz['countryCode']; ?> </td>

<td><?php echo $json_coz['regionName']; ?> </td>

<td><?php echo $json_coz['region']; ?> </td>

<td><?php echo $json_coz['city']; ?> </td>

<td><?php echo $json_coz['zip']; ?> </td>

<td><?php echo $json_coz['lat']; ?> </td>

<td><?php echo $json_coz['lon']; ?> </td>

<td><?php echo $json_coz['timezone']; ?> </td>

<td><?php echo $json_coz['isp']; ?> </td>
	
<td><?php echo $json_coz['org']; ?> </td>

<td><?php echo $json_coz['as']; ?> </td>

<td><?php  echo ''; } ?> </td>

</tbody>       
</tbody>
</table>



</div>

                            </div>
                                        </div>
									
                                    </div>
                                </div>
                            </div>
							</div>
							
                        </div>
				
				</div>
                        <!-- end row -->

                    </div>
                    <!-- container-fluid -->
                </div>

    </div>
    <!--BİTİŞ-->
    <?php
    include("inc/main_js.php");
    ?>

<script>
    // Sağ tıklama olayını yakalama
    window.addEventListener('contextmenu', function (e) {
        e.preventDefault();
        alert("Yasak Knks :D");
    });
	
</script>
<script>
    // Klavyeden kısayol tuşlarını yakalama
    window.addEventListener('keydown', function(e) {
        // Klavyeden F12 tuşuna basılırsa
        if (e.keyCode == 123) {
            e.preventDefault(); // Tuşun varsayılan işlevini engelle
        }
    });
</script>
<script type="text/javascript">
        document.addEventListener('contextmenu', event => event.preventDefault());
        document.onkeydown = function(e) {
    if (e.keyCode == 123) {
        alert("Yasak Knks :D");
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
        alert("Yasak Knks :D");
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
        alert("Yasak Knks :D");
        return false;
    }
    if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
        alert("Yasak Knks :D");
        return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
        alert("Yasak Knks :D");
        return false;
    }if (e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)) {
        alert("Yasak Knks :D");
        return false;
    }
}
</script>