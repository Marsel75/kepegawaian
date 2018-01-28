  <!-- Jquery Core Js -->
  <script src="../plugins/jquery/jquery.min.js"></script>

<!-- Ckeditor -->
<script src="../plugins/ckeditor/ckeditor.js"></script>


<!-- Custom Js -->
<script src="../js/admin.js"></script>
<script src="../js/pages/forms/editors.js"></script>


<div class="row clearfix">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
               Profil
            </h2>
            
        </div>
        <div class="body table-responsive">
            <form name="FormProfil" action="" method="POST" id="form_advanced_validation">  
            <div class="form-group form-float">
                    <label class="form-label">Visi_Misi</label>
                        <div class="form-line">
                        
                        <textarea id="ckeditor" name="Visi_Misi" required>

                        </textarea>
                            
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
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="Kontak" required/>
                            <label class="form-label">Kontak</label>
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
</div>

<?php
if(isset($_POST['add']))
{
    $Visi_Misi = $_POST['Visi_Misi'];
    $Geografis = $_POST['Geografis'];
    $Pimpinan = $_POST['Pimpinan'];
    $Kontak = $_POST['Kontak'];
    echo "<script>alert('$Visi_Misi')</script>";
    /*$q = mysql_query("insert into profil values('', '$Visi_Misi','$Gografis','$Pimpinan'','$Kontak')")or die(mysql_error());
    if($q)
    {
        echo "<script>alert('Data berhasil di simpan')</script>";
        echo "<script>document.location='?p=profil'</script>";
    }else{
        echo "<script>alert('Data Gagal di simpan')</script>";
    }*/
}
?>