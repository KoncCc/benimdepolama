<?php

include("inc/sidebar.php");
include("server/owner.php");

?>
                               <div class="row">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Duyuru Ekle</h4>
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">Duyuru</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="duyuru" placeholder="Yapılıcak Duyuru !" id="example-search-input" required>
                                            </div>
                                        </div>

                                        <button type="submit" id="angerisapi" style="float: right;" class="btn btn-primary">Ekle<i class="fa fa-plus fa-spin ms-2"></i></button>
                                        <br><br><br>
                                        <div id="message">

                                        </div>
                                            </div>

                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <script>
                         $("#angerisapi").click(function(){

                            var text = $("[name=duyuru]").val();

                            if (text === "") {

                                Swal.fire ({
                                 icon : "error",
                                 title : "Oopss...",
                                 text : "Duyuru Boş Bırakılamaz",
                                 footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
                                 showConfirmButton: false,
                                 timer: 1500
                             })
                                 
                            }else{
                                $.ajax({
                                type : 'POST',
                                url : 'api/duyuru/api.php',
                                data : {text},

                                success : function(data){
                                    var json = data;
                                    if (json.status === "true") {

                                Swal.fire ({
                                 icon : "success",
                                 title : "Başarılı",
                                 text : "Duyuru Başarıyla Gönderildi",
                                 footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
                                 showConfirmButton: false,
                                 timer: 1500
                             })

                            }

                            if (json.status === "false") {

                                Swal.fire ({
                                 icon : "error",
                                 title : "Oopss...",
                                 text : "Hata Duyuru Gönderilmedi !",
                                 footer: '<a href="https://t.me/Rookiechecker">Telegram Adresimiz</a>',
                                 showConfirmButton: false,
                                 timer: 1500
                             })
                                
                            }
                            
                        }
 

                    });
                }

        });
                        </script>
              
<?php
include("inc/main_js.php");

?>
