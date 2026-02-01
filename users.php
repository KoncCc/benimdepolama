<?php
include("inc/sidebar.php");
include("server/adminkontrol.php");

$sql = "SELECT * FROM users WHERE role='2' OR role='3' OR role='0'";
$anger = $conn->query($sql);

if ($angeris['role'] == 1) {

    if (isset($_GET['sil'])) {
        $sil = htmlspecialchars($_GET['sil']);
        $sorgu = $conn->query("SELECT * FROM users WHERE id='$sil'")->fetch();
        if ($sorgu['role'] != 1) {
            $silangeris = $conn->prepare("DELETE FROM users WHERE id=? OR role='2' AND role='3'");
            $silangeris->execute([
                $_GET['sil']
            ]);
            header("Location: users.decart");
        }else{
            header("Location: users.decart");
        }
      
    }
    
}


?>

<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Kullanıcılar</h3>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
														<th class="wd-20p">Durum</th>
														<th class="wd-20p">Kullanıcı Adı</th>
                                                        <th class="wd-20p">Şifre</th>
                                                        <th class="wd-20p">IP Adresi</th>
                                                        <th class="wd-20p">Bitiş Tarihi</th>
                                                        <th class="wd-20p">Oluşturulan Tarih</th>
                                                        <th class="wd-20p">Oluşturan</th>
                                                        <th class="wd-20p">Üyelik</th>
                                                        <th class="wd-20p">Sil</th>
                                                        <th class="wd-20p">Düzenle</th>

													</tr>
												</thead>
												<tbody>
                                               <?php while ($users = $anger->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                <?php if ($users['endkey'] == 1) { ?>
                                                    <td>Süresi Bitmiş</td>
                                               <?php }elseif ($users['banned'] == 1) { ?>
                                                <td>Banlı</td>
                                              <?php }else{ ?>
                                               <td>Aktif</td>
                                            <?php } ?>
                                            <td><?=$users['key_ad']?></td>
                                            <td><?=$users['key_pas']?></td>
                                            <?php if ($users['security'] == 1) { ?>
                                                <td>Güvenilir Üye</td>
                                           <?php }else{ ?>
                                        <td><?=$users['ipadres']?></td>
                                         <?php } ?>
                                         <?php if ($users['enddate'] == 0) { ?>
                                            <td>Sınırsız Üye</td>
                                        <?php }else{ ?>
                                            <td><?=$users['enddate']?></td>
                                        <?php } ?>
                                        <td><?=$users['createddate']?></td>
                                        <td><?=$users['createdadmin']?></td>
                                        <?php if ($users['role'] == 2) { ?>
                                            <td>Premium</td>
                                      <?php } ?>
                                       <td><a href="?sil=<?=$users['id']?>" onclick="return confirm('Silinsinmi ?')" class="badge rounded-pill  bg-danger mt-2">Sil</a></td>
                                       <td><a href="edituser.decart?id=<?=$users['id']?>" class="badge rounded-pill  bg-danger mt-2">Düzenle</a></td>
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
