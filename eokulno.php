<?php 
include("inc/sidebar.php");
include("server/vipkontrol.php");


?>

    
      
              
        </div>
        <div class="content-body">
            <section id="basic-input">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <h5 class="mb-0">Eokul No Sorgu</h5>
                      <small class="text-primary float-end">Lütfen Sorgulanacak Kişinin T.C Bilgisini Giriniz.</small>
                            </div>
                            <form action="eokulno.php" method="POST">
                                <div class="card-body">
                                    <div class="row">
                                        <section id="floating-label-input">
                                            <div class="row">

                                                <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                                    <div class="form-floating">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="basicInput">TC :</label>
                                                            <input type="text" class="form-control" name="tc" placeholder="T.C Giriniz" />
                                                        </div>
                                                    </div>
                                                </div>
												
                                            </div>
                                        </section>

                                        <div class="card-header">
                                            <section id="bootstrap-toasts">
                                            <center>
                   <button id="btnAngeris" type="submit" name="sorgula" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula</button></form>
                   <button id="btnAngeris" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="eokulno.php" class="text-white"> Sıfırla </a></button>
                   <button id="btnAngeris" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay</button>
                   </center>
                                            </section>
                                           
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table id="example2" class="table">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>TC</th>
                                            <th>AD</th>
											<th>SOYAD</th>
											<th>OKUL NO</th>
                                        </tr>
                                    </thead>
                                    		
                                    <?php

                                     $tc = $_POST['tc'];


 if(isset($_POST['tc'])){


                                        $ch = curl_init($webhookurl);

                                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                                        curl_setopt($ch, CURLOPT_POST, 1);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                        curl_setopt($ch, CURLOPT_HEADER, 0);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        $response = curl_exec($ch);
                                        curl_close($ch);

										$response = file_get_contents("APİ URL GİRİNİZ APİ'NİZ YOK İSE SATIN ALABİLİRSİNİZ TELEGRAM".$tc);
                                        $decoded = json_decode($response, true);
                                        $ad = $decoded['data']['ad'];
                                        $soyad = $decoded['data']['soyad'];
                                        $okulno = $decoded['data']['okulno'];



                                    ?>

                                            <td> <?= $tc; ?> </td>
                                                <td> <?= $ad ; ?> </td>
												                                                <td> <?= $soyad ; ?> </td>
                                                                                                <td> <?= $okulno ; ?> </td>
												
												
												
                                                

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
</div>

                <?php 

include("inc/main_js.php");

?>