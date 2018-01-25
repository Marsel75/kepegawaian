<?php
if(isset($_GET['action'])==1)
{
    $Nip= $_GET['Nip'];
    $nama = $_GET['nama'];

?>
    <div class="row clearfix">
        <div class="col-lg-8">
            <div class="card">
                <div class="header">
                    <h2>
                        Tambah Riwayat Jabatan
                    </h2>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <form name="FormRiwayatJabatani" action="" method="POST" id="form_advanced_validation" enctype="multipart/form-data">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="pegawai" value="<?php echo $nama;?>" disabled/>
                                    <label class="form-label">Nama Pegawai</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Jabatan</label>
                                    <select class="form-control show-tick" name="IdJabatan" required>
                                <option value="">-- Pilih Jabatan --</option>
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
                                    <select class="form-control show-tick" name="IdPangkat" required>
                                <option value="">-- Pilih Pangkat --</option>
                                <?php
                                    $q = mysql_query("select * from pangkat")or die(mysql_error());
                                    while($dtpangkat=mysql_fetch_array($q))
                                    {
                                        echo "<option value='$dtpangkat[0]'>$dtpangkat[1]/$dtpangkat[2]</option>";
                                    }
                                
                                ?>
                            </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="Tgl_Menjabat" required/>
                                    <label class="form-label">Tanggal Mulai Menjabat</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="Tgl_Terakhir_Menjabat" required/>
                                    <label class="form-label">Tgl_Terahkir_Menjabat</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Gaji_Pokok" required/>
                                    <label class="form-label">Gaji_Pokok</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="No_SK_Jabatan" required/>
                                    <label class="form-label">No_SK_Jabatan</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="Tgl_SK" required/>
                                    <label class="form-label">Tgl_SK</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-link waves-effect" value="Simpan" name="addRiwayat">
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    if(isset($_POST['addRiwayat']))
    {
        $Jabatan_id = $_POST['IdJabatan'];
        $Pangkat_id = $_POST['IdPangkat'];
        $Tgl_Menjabat = $_POST['Tgl_Menjabat'];
        $Tgl_Terakhir_Menjabat = $_POST['Tgl_Terakhir_Menjabat'];
        $Gaji_Pokok = $_POST['Gaji_Pokok'];
        $No_SK_Jabatan = $_POST['No_SK_Jabatan'];
        $Tgl_SK = $_POST['Tgl_SK'];
        
        $q = mysql_query("insert into Riwayat_Jabatan values('', '$Nip','$Jabatan_id','$Pangkat_id','$Tgl_Menjabat','$Tgl_Terakhir_Menjabat','$Gaji_Pokok','$No_SK_Jabatan','$Tgl_SK')")or die(mysql_error());
        if($q)
        {
            echo "<script>alert('Pangkat = $a, Jabatan =$Jabatan_id')</script>";
            echo "<script>document.location='?p=pegawai'</script>";
        }else{
            echo "<script>alert('Data Gagal di simpan')</script>";
        }
    }
}
    ?>