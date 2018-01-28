<div class="modal fade" id="TambahAlamat<?php echo $datanip;?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Alamat</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Alamat" value="<?php echo $dtpegawai['Nama'];?>" disabled/>
                            <label class="form-label">Nama Pegawai</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Alamat" required/>
                            <label class="form-label">Alamat</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Provinsi" required/>
                            <label class="form-label">Provinsi</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Kabupaten" required/>
                            <label class="form-label">Kabupaten</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Kecamatan" required/>
                            <label class="form-label">Kecamatan</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Kelurahan" required/>
                            <label class="form-label">Kelurahan</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input name="Status" type="radio" class="with-gap" value="True" id="True" />
                            <label for="True">Aktif</label>
                            <input name="Status" type="radio" class="with-gap" value="False" id="False" />
                            <label for="False">Tidak Aktif</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-link waves-effect" value="Simpan" name="addAlamat">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['addAlamat']))
{
    $Nip = $datanip;
    $alamat = $_POST['Alamat'];
    $provinsi = $_POST['Provinsi'];
    $kabupaten = $_POST['Kabupaten'];
    $kecamatan = $_POST['Kecamatan'];
    $kelurahan = $_POST['Kelurahan'];
    $status = $_POST['Status'];
    
    $q = mysql_query("insert into alamat values('', '$Nip','$alamat','$provinsi','$kabupaten','$kecamatan','$kelurahan','$status')")or die(mysql_error());
    if($q)
    {
        echo "<script>alert('Data berhasil di simpan')</script>";
        echo "<script>document.location='?p=alamat'</script>";
    }else{
        echo "<script>alert('Data Gagal di simpan')</script>";
    }
}

?>