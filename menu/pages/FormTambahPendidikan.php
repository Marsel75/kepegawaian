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
                    <form name="FormRiwayatPendidikan" action="" method="POST" id="form_advanced_validation">

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="Pegawai" value="<?php echo $nama;?>" />
                                <label class="form-label">Nama Pegawai</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" name="Jenjang_Pendidikan">
                             <option value="">-- Pilih Jenjang --</option>
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
                                <input type="text" class="form-control" name="Jurusan" />
                                <label class="form-label">Jurusan</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="No_Ijazah" required/>
                                <label class="form-label">No_Ijazah</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" class="form-control" name="Tgl_Ijazah" required/>
                                <label class="form-label">Tgl_Ijazah</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="Tempat" required/>
                                <label class="form-label">Tempat</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="Ketua" required/>
                                <label class="form-label">Ketua</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-link waves-effect" value="Simpan" name="addPendidikan">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    if(isset($_POST['addPendidikan']))
    {
        $Jenjang_Pendidikan = $_POST['Jenjang_Pendidikan'];
        $Jurusan            = $_POST['Jurusan'];
        $No_Ijazah          = $_POST['No_Ijazah'];
        $Tgl_Ijazah         = $_POST['Tgl_Ijazah'];
        $Tempat             = $_POST['Tempat'];
        $Ketua              = $_POST['Ketua'];
    
        
        
        $q = mysql_query("INSERT INTO riwayat_pendidikan values('', '$Nip','$Jenjang_Pendidikan','$Jurusan','$No_Ijazah','$Tgl_Ijazah','$Tempat','$Ketua')")or die(mysql_error());
        if($q)
        {
            echo "<script>alert('Pendidikan $Jenjang_Pendidikan Berhasil di simpan')</script>";
            echo "<script>document.location='?p=pegawai'</script>";
        }else{
            echo "<script>alert('Data Gagal di simpan')</script>";
        }
    }
}
    ?>
