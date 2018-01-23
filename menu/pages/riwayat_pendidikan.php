<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA RIWAYAT PENDIDIKAN
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#riwayatpendidikan">Tambah Riwayat</a></li>
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
                            <th>Jenjang_Pendidikan</th>
                            <th>Jurusan</th>
                            <th>No_Ijazah</th>
                            <th>Tgl_Ijazah</th>
                            <th>Tempat</th>
                            <th>Ketua</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $q = mysql_query("select * from riwayat_pendidikan")or die(mysql_error());
                            while($dtriwayatpendidikan=mysql_fetch_array($q))
                            {?>
                            <tr>
                                <th scope="row"><?php echo $no?></th>
                                <td><?php echo $dtriwayatpendidikan['Jenjang_Pendidikan']?></td>
                                <td><?php echo $dtriwayatpendidikan['Jurusan']?></td>
                                <td><?php echo $dtriwayatpendidikan['No_Ijazah']?></td>
                                <td><?php echo $dtriwayatpendidikan['Tgl_Ijazah']?></td>
                                <td><?php echo $dtriwayatpendidikan['Tempat']?></td>
                                <td><?php echo $dtriwayatpendidikan['Ketua']?></td>
                                <td>
                                    <button data-toggle="modal" data-target="#EditPendidikan"><i class="material-icons">create</i></button>
                                    <button data-toggle="modal" data-target="#Detailpegawai<?php echo $nopegawai?>"><i class="material-icons">view_agenda</i></button>
                                    <div class="modal fade" id="EditPendidikan" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form name="FormRiwayatPendidikan" action="" method="POST" id="form_advanced_validation">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="defaultModalLabel">Tambah Riwayat Pendidikan</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <label class="form-label">Nip</label>
                                                                <select class="form-control show-tick" name="Nip">
                                                                <option value="<?php echo $dtriwayatpendidikan['Jenjang_Pendidikan']?>"></option>
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
                                                                <input type="text" class="form-control" name="Jurusan"/>
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
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-link waves-effect" value="Simpan" name="add">
                                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                            </tr>
                            <?php
                            $no++;
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="riwayatpendidikan" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="FormRiwayatPendidikan" action="" method="POST" id="form_advanced_validation">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Riwayat Pendidikan</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">No</label>
                            <select class="form-control show-tick" name="Nip">
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
                            <input type="text" class="form-control" name="Jurusan"/>
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
    $Nip                = $_POST['Nip'];
    $Jenjang_Pendidikan = $_POST['Jenjang_Pendidikan'];
    $Jurusan            = $_POST['Jurusan'];
    $No_Ijazah          = $_POST['No_Ijazah'];
    $Tgl_Ijazah         = $_POST['Tgl_Ijazah'];
    $Tempat             = $_POST['Tempat'];
    $Ketua              = $_POST['Ketua'];

    
    $q = mysql_query("INSERT INTO riwayat_pendidikan values('', '$Nip','$Jenjang_Pendidikan','$Jurusan','$No_Ijazah','$Tgl_Ijazah','$Tempat','$Ketua')")or die(mysql_error());
    if($q)
    {
        echo "<script>alert('Data berhasil di simpan')</script>";
        echo "<script>document.location='?p=riwayat_pendidikan'</script>";
    }else{
        echo "<script>alert('Data Gagal di simpan')</script>";
    }
}
?>