<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                   Profil
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#defaultModal">Tambah Profil</a></li>
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
                            <th>Visi_Misi</th>
                            <th>Geografis</th>
                            <th>Pimpinan</th>
                            <th>Kontak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $noprofil = 1;
                            $q = mysql_query("select * from profil")or die(mysql_error());
                            while($dtprofil=mysql_fetch_array($q))
                            {?>
                            <tr>
                                <th scope="row"><?php echo $noprofil?></th>
                                <td><?php echo $dtprofil['Visi_Misi']?></td>
                                <td><?php echo $dtprofil['Geografis']?></td>
                                <td><?php echo $dtprofil['Pimpinan']?></td>
                                <td><?php echo $dtprofil['Kontak']?></td>
                            </tr>
                            <?php
                            $noprofil++;
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="FormProfil" action="" method="POST" id="form_advanced_validation">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Profil</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Visi_Misi" required/>
                            <label class="form-label">Visi_Misi</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Geografis" required/>
                            <label class="form-label">Geografis</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Pimpinan" required/>
                            <label class="form-label">Pimpinan</label>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Kontak" required/>
                            <label class="form-label">Kontak</label>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['add']))
{
    $Visi_Misi = $_POST['Visi_Misi'];
    $Geografis = $_POST['Geografis'];
    $Pimpinan = $_POST['Pimpinan'];
    $Kontak = $_POST['Kontak'];
    $q = mysql_query("insert into profil values('', '$Visi_Misi','$Gografis','$Pimpinan'','$Kontak')")or die(mysql_error());
    if($q)
    {
        echo "<script>alert('Data berhasil di simpan')</script>";
        echo "<script>document.location='?p=profil'</script>";
    }else{
        echo "<script>alert('Data Gagal di simpan')</script>";
    }
}
?>