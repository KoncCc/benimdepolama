<?php

$page_title = 'Deprem İstatistik';

include("inc/sidebar.php");

?>
<style id="Alert">
    .alert-danger {
        background: rgba(234, 84, 85, 0.12) !important;
        color: #ea5455 !important;
    }

    .alert {
        position: relative;
        padding: 0.99rem 1rem;
        margin-bottom: 1rem;
        border: 0 solid transparent;
        border-radius: 0.358rem;
    }
</style>
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><img style="width: 30px;height: auto;" src="/assets/img/turkey.png" alt=""> Deprem İstatistik</h4>
                    <p class="mb-1">
                    </p>
                    </p>
            <div class="container-xxl flex-grow-1 container-p-y">
               <div class="row">
                <div class="col-xl">
                <?php 
$url = "http://www.koeri.boun.edu.tr/scripts/lst5.asp";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$keles = curl_exec($ch);
	
	curl_close($ch);
	
	$keles = iconv('ISO-8859-9', 'UTF-8', $keles);
	
	
	$keles = preg_replace ('/<HTML[\s\S]+?500 deprem listelenmiştir....../', '', $keles);
	$keles = "<pre style=\"color: $000;\">" . $keles;
	$keles = preg_replace('/Sitemizde yayımlanan her türlü bilgi [\s\S]+?görüntülenmiştir./', '', $keles);
	$keles = str_replace ('      .', "       ", $keles);
	$keles = str_replace ('-  ----------', "-   ---   ---  ---", $keles);
	$keles = str_replace ('MD   ML', "  Şiddet", $keles);
	$keles = str_replace ('---    ---------- ', "---   ---------- ", $keles);
	$keles = str_replace ('Şiddet   Mw', " Şiddet     ", $keles);
	
	
	echo $keles;

?>
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
<?php
include("inc/main_js.php");
?>