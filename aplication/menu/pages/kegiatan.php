<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA KEGIATAN
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#kegiatan">Tambah Kegiatan</a></li>
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
                            <th>Jenis_kegiatan</th>
                            <th>Nama_kegiatan</th>
                            <th>Tgl_mulai</th>
                            <th>Tgl_selesai</th>
                            <th>Peran</th>
                            <th>Tempat</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $q = mysql_query("select * from kegiatan")or die(mysql_error());
                            while($dtkegiatan=mysql_fetch_array($q))
                            {?>
                            <tr>
                                <th scope="row"><?php echo $no?></th>
                                <td><?php echo $dtkegiatan['Nip']?></td>
                                <td><?php echo $dtkegiatan['Jenis_Kegiatan']?></td>
                                <td><?php echo $dtkegiatan['Nama_Kegiatan']?></td>
                                <td><?php echo $dtkegiatan['Tgl_Mulai']?></td>
                                <td><?php echo $dtkegiatan['Tgl_Selesai']?></td>
                                <td><?php echo $dtkegiatan['Peran']?></td>
                                <td><?php echo $dtkegiatan['Tempat']?></td>
                                <td><?php echo $dtkegiatan['Hasil']?></td>
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

<div class="modal fade" id="kegiatan" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="FormKegiatan" action="" method="POST" id="form_advanced_validation">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Kegiatan</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Nip</label>
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
                            <input type="text" class="form-control" name="Tgl_Mulai" required/>
                            <label class="form-label">Tgl_Mulai</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Tgl_Selesai" required/>
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
                         <input name="Status" type="radio" class="with-gap" value="Sukses" id="Sukses"/>
                        <label for="Sukses">Sukses</label>
                        <input name="Status" type="radio" class="with-gap" value="Gagal" id="Gagal"/>
                        <label for="Gagal">Gagal</label>
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
?>