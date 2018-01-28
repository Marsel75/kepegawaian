<?php
if(isset($_GET['action'])==1)
{
    $Nip= $_GET['Nip'];
    $q = mysql_query("SELECT * FROM pegawai where Nip = '$Nip'")or die(mysql_error());
    $dtpegawai = mysql_fetch_array($q);
    $nama = $dtpegawai['Nama'];

?>
    <div class="row clearfix">
        <div class="col-lg-7">
            <div class="card">
                <div class="header">
                    <h2>
                        Edit Pendidikan
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form name="FormPangkat" action="" method="POST" id="form_advanced_validation" enctype="multipart/form-data">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Nama" value="<?php echo $dtpegawai[1];?>"/>
                                    <label class="form-label">Nama</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <?php
                                    if($dtpegawai[2]=="P")
                                    {?>
                                        <input name="Sex" type="radio" class="with-gap" value="L" id="L1"/>
                                        <label for="L1">L</label>
                                        <input name="Sex" type="radio" class="with-gap" value="P" id="P1" checked />
                                        <label for="P1">P</label>
                                    <?php
                                    }else
                                    {?>
                                        <input name="Sex" type="radio" class="with-gap" value="L" id="L1" checked/>
                                        <label for="L1">L</label>
                                        <input name="Sex" type="radio" class="with-gap" value="P" id="P1" />
                                        <label for="P1">P</label>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Tempat_Lahir" value="<?php echo $dtpegawai[3];?>" required/>
                                    <label class="form-label">Tempat_Lahir</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="Tgl_Lahir" value="<?php echo $dtpegawai[4];?>" required/>
                                    <label class="form-label">Tgl_Lahir</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="Agama">
                                        <option value="<?php echo $dtpegawai[5];?>"><?php echo $dtpegawai[5];?></option>
                                        <option value="Islam">Islam</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <?php
                                    if($dtpegawai[6]=="Kawin")
                                    {?>
                                        <input name="Martial" type="radio" class="with-gap" value="Kawin" id="Kawin1" checked />
                                        <label for="Kawin1">Kawin</label>
                                        <input name="Martial" type="radio" class="with-gap" value="Belum Kawin" id="Belum_Kawin1"/>
                                        <label for="Belum_Kawin1">Belum Kawin</label>
                                    <?php
                                    }else
                                    {?>
                                        <input name="Martial" type="radio" class="with-gap" value="Kawin" id="Kawin1"/>
                                        <label for="Kawin1">Kawin</label>
                                        <input name="Martial" type="radio" class="with-gap" value="Belum Kawin" id="Belum_Kawin1" checked/>
                                        <label for="Belum_Kawin1">Belum Kawin</label>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="Tgl_Masuk" value="<?php echo $dtpegawai[7];?>" required/>
                                    <label class="form-label">Tgl_Masuk</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <?php
                                    if($dtpegawai[8]=="PNS")
                                    {?>
                                        <input name="JenisPegawai" type="radio" class="with-gap" value="PNS" id="PNS1" checked/>
                                        <label for="PNS1">PNS</label>
                                        <input name="JenisPegawai" type="radio" class="with-gap" value="Kontrak" id="Kontrak1"/>
                                        <label for="Kontrak1">Kontrak</label>
                                    <?php
                                    }else
                                    {?>
                                        <input name="JenisPegawai" type="radio" class="with-gap" value="PNS" id="PNS1" />
                                        <label for="PNS1">PNS</label>
                                        <input name="JenisPegawai" type="radio" class="with-gap" value="Kontrak" id="Kontrak1" checked/>
                                        <label for="Kontrak1">Kontrak</label>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <?php
                                    if($dtpegawai[9]=="True")
                                    {?>
                                        <input name="Status" type="radio" class="with-gap" value="True" id="True1" checked/>
                                        <label for="True1">Aktif</label>
                                        <input name="Status" type="radio" class="with-gap" value="False" id="False1"/>
                                        <label for="False1">Tidak Aktif</label>
                                    <?php
                                    }else
                                    {?>
                                        <input name="Status" type="radio" class="with-gap" value="True" id="True1"/>
                                        <label for="True1">Aktif</label>
                                        <input name="Status" type="radio" class="with-gap" value="False" id="False1" checked/>
                                        <label for="False1">Tidak Aktif</label>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="file" class="form-control" name="foto"  value="<?php echo $dtpegawai[10];?>"/>
                                    <label class="form-label">Tgl_Masuk</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-link waves-effect" value="Update" name="Update">
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['Update'])){
        $Sex = $_POST['Sex'];
        $Tempat_lahir = $_POST['Tempat_Lahir'];
        $Tgl_lahir = $_POST['Tgl_Lahir'];
        $Agama = $_POST['Agama'];
        $Martial = $_POST['Martial'];
        $Tgl_Masuk = $_POST['Tgl_Masuk'];
        $JenisPegawai = $_POST['JenisPegawai'];
        $Status = $_POST['Status'];
        $Photo = $_FILES['foto']['name'];
        

        

        //==================================//		
        //proses upload foto bandara/dermaga//
        //==================================//
        
        $dir       = 'img/'; //Folder penyimpanan file
        $max_size  = 9000000; //Ukuran file maximal 4Mb
        $nama_file = $_FILES['foto']['name']; //Nama file yang akan di Upload
        $file_size = $_FILES['foto']['size']; //Ukuran file yang akan di Upload
        $nama_tmp  = $_FILES['foto']['tmp_name']; //Nama file sementara
        $upload = $dir . $nama_file; //Memposisikan direktori penyimpanan dan file
        if($Photo!=NULL)
        {
            if($file_size<=$max_size){
                if(move_uploaded_file($nama_tmp, $upload))
                {
                    $q = mysql_query("UPDATE pegawai SET Sex= '$Sex', Tempat_Lahir= '$Tempat_lahir', Tgl_Lahir= '$Tgl_lahir', Agama= '$Agama', Status_Perkawinan= '$Martial', Tgl_Masuk= '$Tgl_Masuk', Jenis_Pegawai= '$JenisPegawai', Status= '$Status' where Nip= '$Nip', Photo = '$Photo'")or die(mysql_error());
                    if($q)
                    {
                        echo "<script>alert('Data berhasil di simpan')</script>";
                        echo "<script>document.location='?p=pegawai'</script>";
                    }else{
                        echo "<script>alert('Data Gagal di simpan')</script>";
                    }
                }
            }
        }else
        {
                    $q = mysql_query("UPDATE pegawai SET Sex= '$Sex', Tempat_Lahir= '$Tempat_lahir', Tgl_Lahir= '$Tgl_lahir', Agama= '$Agama', Status_Perkawinan= '$Martial', Tgl_Masuk= '$Tgl_Masuk', Jenis_Pegawai= '$JenisPegawai', Status= '$Status' where Nip= '$Nip'")or die(mysql_error());
                    if($q)
                    {
                        echo "<script>alert('Data berhasil di simpan')</script>";
                        echo "<script>document.location='?p=pegawai'</script>";
                    }else{
                        echo "<script>alert('Data Gagal di simpan')</script>";
                    }
        }
        
        
    }
}

?>