<?php
if(isset($_GET['action'])==1)
{
    $IdAlamat= $_GET['IdAlamat'];
    $q = mysql_query("SELECT * FROM alamat where Id = '$IdAlamat'")or die(mysql_error());
    $dtalamat = mysql_fetch_array($q);

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
                            <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="Nip" value="<?php echo $dtalamat[1]?>" required disabled/>
                                        <label class="form-label">Nip</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="Alamat" value="<?php echo $dtalamat[2]?>" required/>
                                        <label class="form-label">Alamat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="Provinsi" value="<?php echo $dtalamat[3]?>" required/>
                                        <label class="form-label">Provinsi</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="Kabupaten" value="<?php echo $dtalamat[4]?>" required/>
                                        <label class="form-label">Kabupaten</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="Kecamatan" value="<?php echo $dtalamat[5]?>" required/>
                                        <label class="form-label">Kecamatan</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="Kelurahan" value="<?php echo $dtalamat[6]?>" required/>
                                        <label class="form-label">Kelurahan</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <?php
                                            if($dtalamat['Status']=="True")
                                            {
                                                echo "
                                                <input name='Status' type='radio' class='with-gap' value='True' id='True' checked/>
                                                <label for='True'>Aktif</label>
                                                <input name='Status' type='radio' class='with-gap' value='False' id='False' />
                                                <label for='False'>Tidak Aktif</label>
                                                 ";
                                            }else
                                            {
                                                echo "
                                                <input name='Status' type='radio' class='with-gap' value='True' id='True' />
                                                <label for='True'>Aktif</label>
                                                <input name='Status' type='radio' class='with-gap' value='False' id='False' checked/>
                                                <label for='False'>Tidak Aktif</label>
                                                ";
                                            }
                                        ?>
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
        $Id         = $_POST['Id'];
        $alamat     = $_POST['Alamat'];
        $provinsi   = $_POST['Provinsi'];
        $kabupaten  = $_POST['Kabupaten'];
        $kecamatan  = $_POST['Kecamatan'];
        $kelurahan  = $_POST['Kelurahan'];
        $status     = $_POST['Status'];
        echo "<script>alert('$status')</script>";

        //echo "<script>alert('$Id, $alamat, $provinsi, $kabupaten, $kecamatan, $kelurahan, $status')</script>";
    
    
        $q = mysql_query("UPDATE alamat SET Alamat='$alamat', Provinsi='$provinsi', Kabupaten='$kabupaten', kecamatan='$kecamatan', Kelurahan= '$kelurahan', Status= '$status' WHERE Id = '$Id'")or die(mysql_error());
        if($q)
        {
            echo "<script>alert('Data berhasil di Update')</script>";
            echo "<script>document.location='?p=alamat'</script>";
        }else{
            echo "<script>alert('Data Gagal di Diipdate')</script>";
        }
    }
}

?>