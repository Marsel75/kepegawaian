<?php
if(isset($_GET['action'])==1)
{
    $IdJabatan= $_GET['IdJabatan'];
    $nama = $_GET['nama'];
    $q = mysql_query("select * from riwayat_jabatan rj, pangkat p, jabatan j where rj.Jabatan_Id = j.Id and rj.Pangkat_Id = p.Id and rj.Id='$IdJabatan'")or die(mysql_error());
    $dtpendidikan = mysql_fetch_array($q);

?>
    <div class="row clearfix">
        <div class="col-lg-7">
            <div class="card">
                <div class="header">
                    <h2>
                        Edit Alamat
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form name="FormRiwayatJabatan" action="" method="POST" id="form_advanced_validation">
                            <div class="modal-header">
                                <h4 class="modal-title" id="defaultModalLabel">Tambah Riwayat Jabatan</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                    <input type="text" class="form-control" value="<?php echo $nama;?>" disabled/>
                                    <label class="form-label">Nama Pegawai</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Jabatan</label>
                                        <select class="form-control show-tick" name="Jabatan_Id">
                                    <option value="<?php echo $dtpendidikan[12];?>"><?php echo $dtpendidikan[13];?></option>
                                    <?php
                                        $q = mysql_query("select * from jabatan")or die(mysql_error());
                                        while($dtjabatan=mysql_fetch_array($q))
                                        {
                                            echo "<option value='$dtjabatan[0]'>$dtjabatan[1]</option>";
                                        }
                                    ?>
                                </select>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Pangkat</label>
                                        <select class="form-control show-tick" name="Pangkat_Id">
                                    <option value="<?php echo $dtpendidikan[9];?>"><?php echo $dtpendidikan[10];?>/<?php echo $dtpendidikan[11];?></option>
                                    <?php
                                        $q = mysql_query("select * from pangkat")or die(mysql_error());
                                        while($dtpangkat=mysql_fetch_array($q))
                                        {
                                            echo "<option value='$dtpangkat[0]'>$dtpangkat[1]</option>";
                                        }
                                    
                                    ?>
                                </select>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="Tgl_Menjabat" value="<?php echo $dtpendidikan[4]?>"/>
                                        <label class="form-label">Tgl_Menjabat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="Tgl_Terakhir_Menjabat" value="<?php echo $dtpendidikan[5]?>"/>
                                        <label class="form-label">Tgl_Terahkir_Menjabat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="Gaji_Pokok" value="<?php echo $dtpendidikan[6]?>"/>
                                        <label class="form-label">Gaji_Pokok</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="No_SK_Jabatan" value="<?php echo $dtpendidikan[7]?>"/>
                                        <label class="form-label">No_SK_Jabatan</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="Tgl_SK" value="<?php echo $dtpendidikan[8]?>"/>
                                        <label class="form-label">Tgl_SK</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-link waves-effect" value="Simpan" name="Update">
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
        
        $Jabatan_id = $_POST['Jabatan_Id'];
        $Pangkat_id = $_POST['Pangkat_Id'];
        $Tgl_Menjabat = $_POST['Tgl_Menjabat'];
        $Tgl_Terakhir_Menjabat = $_POST['Tgl_Terakhir_Menjabat'];
        $Gaji_Pokok = $_POST['Gaji_Pokok'];
        $No_SK_Jabatan = $_POST['No_SK_Jabatan'];
        $Tgl_SK = $_POST['Tgl_SK'];
        
        $q = mysql_query("UPDATE riwayat_jabatan SET Jabatan_Id='$Jabatan_id', Pangkat_Id= '$Pangkat_id', Tgl_Menjabat= '$Tgl_Menjabat', Tgl_Terakhir_Menjabat = '$Tgl_Terakhir_Menjabat', Gaji_Pokok= '$Gaji_Pokok', No_SK_Jabatan = '$No_SK_Jabatan', Tgl_SK= '$Tgl_SK' WHERE Id= '$IdJabatan'")or die(mysql_error());
        if($q)
        {
            echo "<script>alert('Data berhasil di Ubah')</script>";
            echo "<script>document.location='?p=riwayat_jabatan'</script>";
        }else{
            echo "<script>alert('Data Gagal di Ubah')</script>";
        }
    }
}

?>