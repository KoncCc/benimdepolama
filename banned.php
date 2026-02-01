<?php
include("inc/sidebar.php");
include("server/adminkontrol.php");

$sql = "SELECT * FROM users WHERE banned='1'";
$anger = $conn->query($sql);

if ($angeris['role'] == 1) {
    
    if (isset($_GET['bankaldir'])) {
        $banla = htmlspecialchars($_GET['bankaldir']);
        $banlangeris = $conn->prepare("UPDATE users SET banned='0' WHERE id=?");
        $banlangeris->execute([
            $_GET['bankaldir']
        ]);
    
        header("Location: banned.shivas");
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
														<th class="wd-20p">Kullanıcı Adı</th>
                                                        <th class="wd-20p">Şifre</th>
                                                        <th class="wd-20p">IP Adresi</th>
                                                        <th class="wd-20p">Bitiş Tarihi</th>
                                                        <th class="wd-20p">Oluşturulan Tarih</th>
                                                        <th class="wd-20p">Oluşturan</th>
                                                        <th class="wd-20p">Üyelik</th>
                                                        <th class="wd-20p">Ban Kaldır</th>

													</tr>
												</thead>
												<tbody>
                                               <?php while ($users = $anger->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
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
                                        <?php if ($users['role'] == 0) { ?>
                                            <td>Freemium</td>
                                       <?php }elseif ($users['role'] == 2) { ?>
                                        <td>Premium</td>
                                      <?php } ?>
                                       <td><a href="?bankaldir=<?=$users['id']?>" onclick="return confirm('Yasak Kaldırılsınmı ?')" class="badge rounded-pill  bg-danger mt-2">Ban Kaldır</a></td>
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
