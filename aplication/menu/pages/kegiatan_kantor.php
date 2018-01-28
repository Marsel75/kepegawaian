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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $q = mysql_query("select * from kegiatan_kantor")or die(mysql_error());
                            while($dtKegiatanKantor=mysql_fetch_array($q))
                            {?>
                            <tr>
                                <th scope="row">
                                    <?php echo $no?>
                                </th>
                                <td>
                                    <?php echo $dtKegiatanKantor[1]?>
                                </td>
                                <td>
                                    <?php echo $dtKegiatanKantor[2]?>
                                </td>
                                <td>
                                    <?php echo $dtKegiatanKantor[3]?>
                                </td>
                                <td>
                                    <?php echo $dtKegiatanKantor[4]?>
                                </td>
                                <td>
                                    <?php echo $dtKegiatanKantor[5]?>
                                </td>
                                <td>
                                    <?php echo $dtKegiatanKantor[6]?>
                                </td>
                                <td>
                                    <button data-toggle="modal" data-target="#Edit<?php echo $dtKegiatanKantor[0]?>"><i class="material-icons">create</i></button>
                                    <div class="modal fade" id="Edit<?php echo $dtKegiatanKantor[0]?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="defaultModalLabel">Tambah Kegiatan</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="Nama_Kegiatan" value="<?php echo $dtKegiatanKantor[1]?>" required/>
                                                                <label class="form-label">Nama_Kegiatan</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="date" class="form-control" name="Tgl_Mulai" value="<?php echo $dtKegiatanKantor[2]?>" required/>
                                                                <label class="form-label">Tgl_Mulai</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="date" class="form-control" name="Tgl_Selesai"  value="<?php echo $dtKegiatanKantor[3]?>"  required/>
                                                                <label class="form-label">Tgl_Selesai</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="Tempat"  value="<?php echo $dtKegiatanKantor[4]?>" required/>
                                                                <label class="form-label">Tempat</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="Hasil"  value="<?php echo $dtKegiatanKantor[5]?>"/>
                                                                <label class="form-label">Hasil</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="Peserta"  value="<?php echo $dtKegiatanKantor[6]?>" required/>
                                                                <label class="form-label">Peserta</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <textarea class="form-control" name="Keterangan"  value="<?php echo $dtKegiatanKantor[7]?>" > <?php echo $dtKegiatanKantor[7]?></textarea>
                                                                <label class="form-label">Keterangan</label>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-link waves-effect" value="Simpan" name="update<?php echo $dtKegiatanKantor[0]?>">
                                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if(isset($_POST['update'.$dtKegiatanKantor[0]]))
                                        {
                                            $Nama_Kegiatan = $_POST['Nama_Kegiatan'];
                                            $Tgl_Mulai = $_POST['Tgl_Mulai'];
                                            $Tgl_Selesai = $_POST['Tgl_Selesai'];
                                            $Tempat = $_POST['Tempat'];
                                            $Hasil = $_POST['Hasil'];
                                            $Peserta = $_POST['Peserta'];
                                            $Keterangan = $_POST['Keterangan'];
                                            //echo "<script>alert('$dtKegiatanKantor[0]')</script>";
                                            
                                            $q = mysql_query("UPDATE Kegiatan_Kantor SET Nama_Kegiatan='$Nama_Kegiatan', Tgl_Mulai='$Tgl_Mulai', Tgl_Selesai='$Tgl_Selesai',Tempat= '$Tempat',Hasil= '$Hasil',Peserta= '$Peserta', Keterangan= '$Keterangan' WHERE Id='$dtKegiatanKantor[0]'")or die(mysql_error());
                                            if($q)
                                            {
                                                echo "<script>alert('Data berhasil di simpan')</script>";
                                                echo "<script>document.location='?p=kegiatan_kantor'</script>";
                                            }else{
                                                echo "<script>alert('Data Gagal di simpan')</script>";
                                            }
                                        }
                                    ?>
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
                            <input type="text" class="form-control" name="Tempat" required/>
                            <label class="form-label">Tempat</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Hasil"/>
                            <label class="form-label">Hasil</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Peserta" required/>
                            <label class="form-label">Peserta</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea class="form-control" name="Keterangan" ></textarea>
                            <label class="form-label">Keterangan</label>
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
    $Keterangan = $_POST['Keterangan'];
    $q = mysql_query("insert into Kegiatan_Kantor values('', '$Nama_Kegiatan','$Tgl_Mulai','$Tgl_Selesai','$Tempat','$Hasil','$Peserta','$Keterangan')")or die(mysql_error());
    if($q)
    {
        echo "<script>alert('Data berhasil di simpan')</script>";
        echo "<script>document.location='?p=kegiatan_kantor'</script>";
    }else{
        echo "<script>alert('Data Gagal di simpan')</script>";
    }
}
?>

  
    </script>


    