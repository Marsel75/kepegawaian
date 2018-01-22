<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA JABATAN
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#TambahJabatan">Tambah Jabatan</a></li>
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
                            <th>Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $nojabatan = 1;
                            $q = mysql_query("select * from jabatan")or die(mysql_error());
                            while($dtjabatan=mysql_fetch_array($q))
                            {?>
                            <tr>
                                <th scope="row"><?php echo $nojabatan?></th>
                                <td><?php echo $dtjabatan['Jabatan']?></td>
                            </tr>
                            <?php
                            $nojabatan++;
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="TambahJabatan" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Tambah Jabatan</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="jabatan" required/>
                            <label class="form-label">Jabatan</label>
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
    $jabatan = $_POST['jabatan'];
    
    $q = mysql_query("insert into jabatan values('', '$jabatan')")or die(mysql_error());
    if($q)
    {
        echo "<script>alert('Data $jabatan berhasil di simpan')</script>";
        echo "<script>document.location='?p=jabatan'</script>";
    }else{
        echo "<script>alert('Data $jabatan Gagal di simpan')</script>";
    }
}
?>