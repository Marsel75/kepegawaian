<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA PEGAWAI
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#Tambahpegawai">Tambah Pegawai</a></li>
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
                            <th>Nama</th>
                            <th>Sex</th>
                            <th>Tempat_Lahir</th>
                            <th>Tgl_Lahir</th>
                            <th>Agama</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $nopegawai = 1;
                            $q = mysql_query("select * from pegawai")or die(mysql_error());
                            while($dtpegawai=mysql_fetch_array($q))
                            {?>
                            <tr>
                                <th scope="row"><?php echo $nopegawai?></th>
                                <td><?php echo $dtpegawai['Nip']?></td>
                                <td><?php echo $dtpegawai['Nama']?></td>
                                <td><?php echo $dtpegawai['Sex']?></td>
                                <td><?php echo $dtpegawai['Tempat_Lahir']?></td>
                                <td><?php echo $dtpegawai['Tgl_Lahir']?></td>
                                <td><?php echo $dtpegawai['Agama']?></td>
                                <td><?php echo $dtpegawai['Status']?></td>
                                <td>
                                <button data-toggle="modal" data-target="#Editpegawai<?php echo $nopegawai?>"><i class="material-icons">create</i></button>
                                <button data-toggle="modal" data-target="#Detailpegawai<?php echo $nopegawai?>"><i class="material-icons">view_agenda</i></button>
                                
                                <!--
                                    Edit Pegawai
                                -->
                                <div class="modal fade" id="Editpegawai<?php echo $nopegawai?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            
                                            <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="defaultModalLabel">Edit Jabatan</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="Nip" value="<?php echo $dtpegawai['Nip']?>" required/>
                                                            <label class="form-label">Nip</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="Nama" value="<?php echo $dtpegawai['Nama']?>" required/>
                                                            <label class="form-label">Nama</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input name="Sex" type="radio" class="with-gap" value="L" id="L"/>
                                                            <label for="L">L</label>
                                                            <input name="Sex" type="radio" class="with-gap" value="P" id="P"/>
                                                            <label for="P">P</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="Tempat_Lahir" required/>
                                                            <label class="form-label">Tempat_Lahir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            
                                                            <input type="date" class="form-control" name="Tgl_Lahir" required/>
                                                            <label class="form-label">Tgl_Lahir</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                        <select class="form-control show-tick" name="Agama">
                                                            <option value="$dtpegawai['Agama']"><?php echo $dtpegawai['Agama']?></option>
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
                                                            <input name="Martial" type="radio" class="with-gap" value="Kawin" id="Kawin"/>
                                                            <label for="Kawin">Kawin</label>
                                                            <input name="Martial" type="radio" class="with-gap" value="Belum Kawin" id="Belum_Kawin"/>
                                                            <label for="Belum_Kawin">Belum Kawin</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="date" class="form-control" name="Tgl_Masuk" required/>
                                                            <label class="form-label">Tgl_Masuk</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input name="JenisPegawai" type="radio" class="with-gap" value="PNS" id="PNS"/>
                                                            <label for="PNS">PNS</label>
                                                            <input name="JensPegawai" type="radio" class="with-gap" value="Kontrak" id="Kontrak"/>
                                                            <label for="Kontrak">Kontrak</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input name="Status" type="radio" class="with-gap" value="True" id="True"/>
                                                            <label for="True">Aktif</label>
                                                            <input name="Status" type="radio" class="with-gap" value="False" id="False"/>
                                                            <label for="False">Tidak Aktif</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="Photo" required/>
                                                            <label class="form-label">Photo</label>
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

                                
                                <!--
                                    Detail Pegawai
                                -->
                                <div class="modal fade" id="Detailpegawai<?php echo $nopegawai?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            
                                            <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="defaultModalLabel">Detail Pegawai</h4>
                                                </div>
                                                <div class="modal-body">

                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-link waves-effect" value="Simpan" name="Update">
                                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            
                                </td>
                            </tr>
                            <?php
                            $nopegawai++;
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Tambahpegawai" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Pegawai</h4>
                </div>
                <div class="modal-body">

                <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Nip" required/>
                            <label class="form-label">Nip</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Nama" required/>
                            <label class="form-label">Nama</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input name="Sex" type="radio" class="with-gap" value="L" id="L"/>
                            <label for="L">L</label>
                            <input name="Sex" type="radio" class="with-gap" value="P" id="P"/>
                            <label for="P">P</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Tempat_Lahir" required/>
                            <label class="form-label">Tempat_Lahir</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="date" class="form-control" name="Tgl_Lahir" required/>
                            <label class="form-label">Tgl_Lahir</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                        <select class="form-control show-tick" name="Agama">
                            <option value="">-- Pilih Agama --</option>
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
                            <input name="Martial" type="radio" class="with-gap" value="Kawin" id="Kawin"/>
                            <label for="Kawin">Kawin</label>
                            <input name="Martial" type="radio" class="with-gap" value="Belum Kawin" id="Belum_Kawin"/>
                            <label for="Belum_Kawin">Belum Kawin</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="date" class="form-control" name="Tgl_Masuk" required/>
                            <label class="form-label">Tgl_Masuk</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input name="JenisPegawai" type="radio" class="with-gap" value="PNS" id="PNS"/>
                            <label for="PNS">PNS</label>
                            <input name="JensPegawai" type="radio" class="with-gap" value="Kontrak" id="Kontrak"/>
                            <label for="Kontrak">Kontrak</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input name="Status" type="radio" class="with-gap" value="True" id="True"/>
                            <label for="True">Aktif</label>
                            <input name="Status" type="radio" class="with-gap" value="False" id="False"/>
                            <label for="False">Tidak Aktif</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Photo" required/>
                            <label class="form-label">Photo</label>
                        </div>
                    </div
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
    $Nama = $_POST['Nama'];
    $Sex = $_POST['Sex'];
    $Tempat_lahir = $_POST['Tempat_Lahir'];
    $Tgl_lahir = $_POST['Tgl_lahir'];
    $Agama = $_POST['Agama'];
    $Martial = $_POST['Martial'];
    $Tgl_Masuk = $_POST['Tgl_Masuk'];
    $JenisPegawai = $_POST['JenisPegawai'];
    $Status = $_POST['Status'];
    $Photo = $_POST['Photo'];

    //echo "<script>alert('$Nip, $Nama, $Sex, $Tempat_lahir, $Tgl_lahir, $Agama, $Martial, $Tgl_Masuk,  $JenisPegawai, $Status, $Photo')</script>";
    
    $q = mysql_query("insert into pegawai values('$Nip','$Nama','$Sex','$Tempat_lahir','$Tgl_lahir','$Agama','$Martial','$Tgl_Masuk','$JenisPegawai','$Status','$Photo')")or die(mysql_error());
    if($q)
    {
        echo "<script>alert('Data berhasil di simpan')</script>";
        echo "<script>document.location='?p=pegawai'</script>";
    }else{
        echo "<script>alert('Data Gagal di simpan')</script>";
    }
    
}
?>