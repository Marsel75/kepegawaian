<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                   DATA RIWAYAT JABATAN
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#riwayat_jabatan">Riwayat Jabatan</a></li>
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
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Pangkat</th>
                            <th>Tgl Menjabat</th>
                            <th>Tgl Akhir Jabatan</th>
                            <th>Gaji_pokok</th>
                            <th>No SK </th>
                            <th>Tgl SK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $q = mysql_query("select * from riwayat_jabatan r, pegawai p, jabatan j, pangkat t where r.Nip=p.Nip and r.Jabatan_Id=j.Id and r.Pangkat_Id=t.Id")or die(mysql_error());
                            while($dtriwayat_jabatan=mysql_fetch_array($q))
                            {?>
                            <tr>
                                <th scope="row"><?php echo $no?></th>
                                <td><?php echo $dtriwayat_jabatan['Nama']?></td>
                                <td><?php echo $dtriwayat_jabatan['Jabatan']?></td>
                                <td><?php echo $dtriwayat_jabatan['Pangkat']?></td>
                                <td><?php echo $dtriwayat_jabatan['Tgl_Menjabat']?></td>
                                <td><?php echo $dtriwayat_jabatan['Tgl_Terakhir_Menjabat']?></td>
                                <td><?php echo $dtriwayat_jabatan['Gaji_Pokok']?></td>
                                <td><?php echo $dtriwayat_jabatan['No_SK_Jabatan']?></td>
                                <td><?php echo $dtriwayat_jabatan['Tgl_SK']?></td>
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

<div class="modal fade" id="riwayat_jabatan" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="FormRiwayatJabatan" action="" method="POST" id="form_advanced_validation">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Riwayat Jabatan</h4>
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
                            <label class="form-label">Jabatan</label>
                            <select class="form-control show-tick" name="Jabatan_Id">
                            <option value="">-- Pilih Jabatan --</option>
                            <?php
                                $q = mysql_query("select * from jabatan")or die(mysql_error());
                                while($dtjabatan=mysql_fetch_array($q))
                                {
                                    echo "<option value='$dtjabatan[0]'>$dtjabatan[1]</option>";
                                }
                            
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Pangkat</label>
                            <select class="form-control show-tick" name="Pangkat_Id">
                            <option value="">-- Pilih Pangkat --</option>
                            <?php
                                $q = mysql_query("select * from pangkat")or die(mysql_error());
                                while($dtpangkat=mysql_fetch_array($q))
                                {
                                    echo "<option value='$dtpangkat[0]'>$dtpangkat[1]</option>";
                                }
                            
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Tgl_Menjabat" required/>
                            <label class="form-label">Tgl_Menjabat</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Tgl_Terakhir_Menjabat" required/>
                            <label class="form-label">Tgl_Terahkir_Menjabat</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Gaji_Pokok" required/>
                            <label class="form-label">Gaji_Pokok</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="No_SK_Jabatan" required/>
                            <label class="form-label">No_SK_Jabatan</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Tgl_SK" required/>
                            <label class="form-label">Tgl_SK</label>
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
    $Nip = $_POST['Nip'];
    $Jabatan_id = $_POST['Jabatan_Id'];
    $Pangkat_id = $_POST['Pangkat_Id'];
    $Tgl_Menjabat = $_POST['Tgl_Menjabat'];
    $Tgl_Terakhir_Menjabat = $_POST['Tgl_Terakhir_Menjabat'];
    $Gaji_Pokok = $_POST['Gaji_Pokok'];
    $No_SK_Jabatan = $_POST['No_SK_Jabatan'];
    $Tgl_SK = $_POST['Tgl_SK'];
    
    $q = mysql_query("insert into Riwayat_Jabatan values('', '$Nip','$Jabatan_id','$Pangkat_id','$Tgl_Menjabat','$Tgl_Terakhir_Menjabat','$Gaji_Pokok','$No_SK_Jabatan','$Tgl_SK')")or die(mysql_error());
    if($q)
    {
        echo "<script>alert('Data berhasil di simpan')</script>";
        echo "<script>document.location='?p=riwayat_jabatan'</script>";
    }else{
        echo "<script>alert('Data Gagal di simpan')</script>";
    }
}
?>