<?php 
include("inc/sidebar.php");
include("server/vipkontrol.php");
?>

<div class="content">
    <div class="row">
        <form action="vesika.php" method="post">
            <div class="col-md-12">
                <div class="mb-4">
                    <div class="input-group">
                        <font size="5">-18 Vesikalık Sorgu</font>
                    </div>
                    <p><br>
                        Sorgulanacak kişinin T.C Nosunu giriniz.
                    </p>
                </div>
                <div class="input-group">
                    <input id="tc" name="tc" type="text" placeholder="TC Giriniz." class="form-control">
                    <br>
                    <input class="btn waves-effect toast-basic-toggler waves-light btn-rounded btn-primary" type="submit" id="sorgula" name="yolla" value="Sorgula">
                </div>
            </div>
        </form>
    </div>

    <?php
    if(isset($_POST['tc'])){
        $tc = $_POST['tc'];
        $apiUrl = "APİ URL GİRİNİZ APİ'NİZ YOK İSE TELEGRAM @İNFOLANMAM $tc ";
        $response = file_get_contents($apiUrl);

        if ($response === false) {
            echo "<p class='text-danger'>API isteği sırasında hata oluştu.</p>";
        } else {
            $decoded = json_decode($response, true);

            if (isset($decoded['data']['image'])) {
                $image = $decoded['data']['image'];
                $image_data = base64_decode($image);
                $image_src = 'data:image/jpeg;base64,' . base64_encode($image_data);
    ?>
                <div class="row gx-12">
                    <div class="col-xl-12 col-lg-6">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Vesika</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <center>
                                                <img src="<?= $image_src ?>" alt="Öğrenci Fotoğrafı" style="width:135px; height:150px; border-radius:0%;">
                                            </center>
                                            <br>
                                            <br>
                                            <br>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                echo "<p class='text-danger'>API yanıtında resim bulunamadı.</p>";
            }
        }
    }

?>

<?php 
include("inc/main_js.php");
?>
