<?php
if(isset($_GET['action'])==1)
{
    $IdPendidikan= $_GET['IdPendidikan'];
    $nama = $_GET['nama'];
    $q = mysql_query("SELECT * FROM riwayat_pendidikan where Id = '$IdPendidikan'")or die(mysql_error());
    $dtpendidikan = mysql_fetch_array($q);

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
                        <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo $nama;?>" disabled/>
                                    <label class="form-label">Nama Pegawai</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <select class="form-control show-tick" name="Jenjang_Pendidikan" disabled>
                                        <option value="<?php echo $dtpendidikan[2];?>"><?php echo $dtpendidikan[2];?></option>
                                        <option value="SD">SD</option>
                                        <option value="SMP/Sederajat">SMP/Sederajat</option>
                                        <option value="SMA/Sederajat">SMA/Sederajat</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Jurusan" value="<?php echo $dtpendidikan[3];?>"/>
                                    <label class="form-label">Jurusan</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="No_Ijazah" value="<?php echo $dtpendidikan[4];?>"/>
                                    <label class="form-label">No_Ijazah</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="Tgl_Ijazah" value="<?php echo $dtpendidikan[5];?>"/>
                                    <label class="form-label">Tgl_Ijazah</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Tempat" value="<?php echo $dtpendidikan[6];?>"/>
                                    <label class="form-label">Tempat</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Ketua" value="<?php echo $dtpendidikan[7];?>"/>
                                    <label class="form-label">Ketua</label>
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
        $Jenjang_Pendidikan = $_POST['Jenjang_Pendidikan'];
        $Jurusan            = $_POST['Jurusan'];
        $No_Ijazah          = $_POST['No_Ijazah'];
        $Tgl_Ijazah         = $_POST['Tgl_Ijazah'];
        $Tempat             = $_POST['Tempat'];
        $Ketua              = $_POST['Ketua'];
    
        
        $q = mysql_query("UPDATE riwayat_pendidikan SET Jurusan = '$Jurusan', No_Ijazah='$No_Ijazah', Tgl_Ijazah='$Tgl_Ijazah', Tempat='$Tempat', Ketua='$Ketua' WHERE Id='$IdPendidikan'")or die(mysql_error());
        if($q)
        {
            echo "<script>alert('Data berhasil di Update')</script>";
            echo "<script>document.location='?p=riwayat_pendidikan'</script>";
        }else{
            echo "<script>alert('Data Gagal di Update')</script>";
        }
    }
}

?>