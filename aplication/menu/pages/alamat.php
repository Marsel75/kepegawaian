<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA ALAMAT
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#TambahAlamat">Tambah Alamat</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Alamat</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    <tbody>
                        <?php
                            $noalamat = 1;
                            $q = mysql_query("select * from alamat")or die(mysql_error());
                            while($dtalamat=mysql_fetch_array($q))
                            {?>
                            <tr>
                                <th scope="row"><?php echo $noalamat?></th>
                                <td><?php echo $dtalamat['Nip']?></td>
                                <td><?php echo $dtalamat['Alamat']?></td>
                                <td><?php echo $dtalamat['Provinsi']?></td>
                                <td><?php echo $dtalamat['Kabupaten']?></td>
                                <td><?php echo $dtalamat['Kecamatan']?></td>
                                <td><?php echo $dtalamat['Kelurahan']?></td>
                                <td><?php echo $dtalamat['Status']?></td>
                                <td>
                                    <button data-toggle="modal" data-target="#EditAlamat<?php echo $dtalamat['Id']?>"><i class="material-icons">create</i></button>
                                    <!--
                                        Edit Alamat
                                    -->
                                    <div class="modal fade" id="EditAlamat<?php echo $dtalamat['Id']?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="defaultModalLabel">Edit Alamat</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="hidden" class="form-control" name="Id" value="<?php echo $dtalamat[0]?>"/>
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
                                </td>
                            </tr>
                            <?php
                            $noalamat++;
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="TambahAlamat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Alamat</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="Nip">
                                <option value="">-- Pilih Pegawai --</option>
                                <?php
                                    $q = mysql_query("select * from pegawai")or die(mysql_error());
                                    while($dtpegawai=mysql_fetch_array($q))
                                    {
                                        echo "<option value='$dtpegawai[0]'>$dtpegawai[1]</option>";
                                    }
                                
                                ?>
                            </select>              
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
                    <input type="submit" class="btn btn-link waves-effect" value="Simpan" name="add">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['add']))
{
    $Nip = $_POST['Nip'];
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


if(isset($_POST['Update']))
{
    $Id         = $_POST['Id'];
    $alamat     = $_POST['Alamat'];
    $provinsi   = $_POST['Provinsi'];
    $kabupaten  = $_POST['Kabupaten'];
    $kecamatan  = $_POST['Kecamatan'];
    $kelurahan  = $_POST['Kelurahan'];
    $status     = $_POST['Status'];

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
?>