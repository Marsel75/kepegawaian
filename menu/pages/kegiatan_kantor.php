<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA KEGIATAN KANTOR
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#TambahKegiatanKantor">Tambah Kegiatan</a></li>
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
                            <th>Nama_kegiatan</th>
                            <th>Tgl_Mulai</th>
                            <th>Tgl_selesai</th>
                            <th>Tempat</th>
                            <th>Hasil</th>
                            <th>Peserta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $q = mysql_query("select * from kegiatan_kantor")or die(mysql_error());
                            while($dtKegiatanKantor=mysql_fetch_array($q))
                            {?>
                            <tr>
                                <th scope="row"><?php echo $no?></th>
                                <td><?php echo $dtKegiatanKantor[1]?></td>
                                <td><?php echo $dtKegiatanKantor[2]?></td>
                                <td><?php echo $dtKegiatanKantor[3]?></td>
                                <td><?php echo $dtKegiatanKantor[4]?></td>
                                <td><?php echo $dtKegiatanKantor[5]?></td>
                                <td><?php echo $dtKegiatanKantor[6]?></td>
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

<div class="modal fade" id="TambahKegiatanKantor" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Kegiatan</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Nama_Kegiatan" required/>
                            <label class="form-label">Nama_Kegiatan</label>
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
                            <input type="text" class="form-control" name="Tempat" required/>
                            <label class="form-label">Tempat</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Hasil" required/>
                            <label class="form-label">Hasil</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Peserta" required/>
                            <label class="form-label">Peserta</label>
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
    $Nama_Kegiatan = $_POST['Nama_Kegiatan'];
    $Tgl_Mulai = $_POST['Tgl_Mulai'];
    $Tgl_Selesai = $_POST['Tgl_Selesai'];
    $Tempat = $_POST['Tempat'];
    $Hasil = $_POST['Hasil'];
    $Peserta = $_POST['Peserta'];
    $q = mysql_query("insert into Kegiatan_Kantor values('', '$Nama_Kegiatan','$Tgl_Mulai','$Tgl_Selesai','$Tempat','$Hasil','$Peserta')")or die(mysql_error());
    if($q)
    {
        echo "<script>alert('Data berhasil di simpan')</script>";
        echo "<script>document.location='?p=Kegiatan_Kantor'</script>";
    }else{
        echo "<script>alert('Data Gagal di simpan')</script>";
    }
}
?>