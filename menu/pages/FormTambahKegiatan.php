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
                                    <input type="text" class="form-control" name="Jenis_Kegiatan" value="<?php echo $nama;?>" disabled/>
                                    <label class="form-label">Jenis_Kegiatan</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Jenis_Kegiatan" required/>
                                    <label class="form-label">Jenis_Kegiatan</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Nama_Kegiatan" required/>
                                    <label class="form-label">Nama_kegiatan</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="Tgl_Mulai" required/>
                                    <label class="form-label">Tgl_Mulai</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" class="form-control" name="Tgl_Selesai" required/>
                                    <label class="form-label">Tgl_Selesai</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Peran" required/>
                                    <label class="form-label">Peran</label>
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
                                    <input name="Status" type="radio" class="with-gap" value="Sukses" id="Sukses" />
                                    <label for="Sukses">Sukses</label>
                                    <input name="Status" type="radio" class="with-gap" value="Gagal" id="Gagal" />
                                    <label for="Gagal">Gagal</label>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-link waves-effect" value="Simpan" name="addKegiatan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['addKegiatan']))
    {
        $Jenis_Kegiatan = $_POST['Jenis_Kegiatan'];
        $Nama_Kegiatan = $_POST['Nama_Kegiatan'];
        $Tgl_Mulai = $_POST['Tgl_Mulai'];
        $Tgl_Selesai = $_POST['Tgl_Selesai'];
        $Peran = $_POST['Peran'];
        $Tempat = $_POST['Tempat'];
        $Hasil = $_POST['Status'];
        $q = mysql_query("insert into kegiatan values('', '$Nip','$Jenis_Kegiatan','$Nama_Kegiatan','$Tgl_Mulai','$Tgl_Selesai','$Peran','$Tempat','$Hasil')")or die(mysql_error());

        if($q)
        {
            echo "<script>alert('Data berhasil di simpan')</script>";
            echo "<script>document.location='?p=kegiatan'</script>";
        }else{
            echo "<script>alert('Data Gagal di simpan')</script>";
        }
    }
}
    ?>