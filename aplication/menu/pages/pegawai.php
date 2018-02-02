<div ng-controller="PegawaiController">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-init="Init()">

            <div class="card">
                <div class="header">
                    <h2>
                        DATA PEGAWAI<br>&nbsp;  
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#Tambahpegawai">Tambah Pegawai</a></li>
                                <li><a href="../menu/pages/Laporan/LaporanKeseluruhan.php" target="_blank">Cetak Pegawai Aktif</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class "col-lg-12">
                        <div class "col-md 4">
                            <form method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="cari" placeholder="Search by Nip or Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <input type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" name="search" value="Cari"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nip</th>
                                <th>Nama</th>
                                <th>Sex</th>
                                <th>Tempat_Lahir</th>
                                <th>Tgl_Lahir</th>
                                <th>Agama</th>
                                <th>Status</th>
                                <th width="200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                $cari = $_POST['cari'];
                                //echo"<script>alert('$cari')</script>";
                                $nopegawai = 1;
                                $query="";
                                if(!isset($_POST['search']))
                                {
                                    $query="SELECT * FROM pegawai";
                                }else
                                {
                                    $query="select * from pegawai WHERE Nip Like '%$cari%' || Nama Like '%$cari%'";
                                }
                                $q = mysql_query($query)or die(mysql_error());

                                while($dtpegawai=mysql_fetch_array($q))
                                {
                                    $datanip=$dtpegawai['Nip'];
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $nopegawai?>
                                        </th>
                                        <td>
                                            <div class="user-info">
                                                <div class="image">
                                                    <a href="" data-toggle="modal" data-target="#Detailpegawai<?php echo $dtpegawai[0]?>"><img src="img/<?php echo $dtpegawai['Photo']?>" width="100" alt="User"/></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $dtpegawai['Nip']?>
                                        </td>
                                        <td>
                                            <?php echo $dtpegawai['Nama']?>
                                        </td>
                                        <td>
                                            <?php echo $dtpegawai['Sex']?>
                                        </td>
                                        <td>
                                            <?php echo $dtpegawai['Tempat_Lahir']?>
                                        </td>
                                        <td>
                                            <?php echo $dtpegawai['Tgl_Lahir']?>
                                        </td>
                                        <td>
                                            <?php echo $dtpegawai['Agama']?>
                                        </td>
                                        <td>
                                            <?php echo $dtpegawai['Status']?>
                                        </td>
                                        <td>
                                            <a href="?p=EditPegawai&action=1&Nip=<?php echo $dtpegawai[0];?>" class="btn bg-deep-purple waves-effect">
                                                <i class="material-icons">create</i>
                                            </a>
                                            <button data-toggle="modal" data-target="#Detailpegawai<?php echo $dtpegawai[0]?>" class="btn bg-deep-purple waves-effect"><i class="material-icons">view_agenda</i></button>
                                            <a href="../menu/pages/Laporan/LaporanPegawai.php?Nip=<?php echo $dtpegawai[0];?>" class="btn bg-deep-purple waves-effect" target="_blank">
                                                <i class="material-icons">print</i>
                                            </a>
                                            <!--
                                        Detail Pegawai
                                    -->
                                            <div class="modal fade" id="Detailpegawai<?php echo $dtpegawai[0]?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">

                                                        <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="defaultModalLabel">Detail Pegawai</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-12">
                                                                        <div class="panel-group" id="accordion_9<?php echo $dtpegawai[0]?>" role="tablist" aria-multiselectable="true">
                                                                            <div class="panel panel-col-cyan">
                                                                                <div class="panel-heading" role="tab" id="headingOne_9<?php echo $dtpegawai[0]?>">
                                                                                    <h4 class="panel-title">
                                                                                        <a role="button" data-toggle="collapse" data-parent="#accordion_9<?php echo $dtpegawai[0]?>" href="#collapseOne_9<?php echo $dtpegawai[0]?>" aria-expanded="true" aria-controls="collapseOne_9<?php echo $dtpegawai[0]?>">
                                                                                        Riwayat Alamat
                                                                                    </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapseOne_9<?php echo $dtpegawai[0]?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_9<?php echo $dtpegawai[0]?>">
                                                                                    <div class="panel-body">
                                                                                        <button data-toggle="modal" data-target="#TambahAlamat<?php echo $datanip;?>" data-dismiss="modal" class="btn bg-pink waves-effect"><i class="material-icons">add</i></button>
                                                                                        <div class="body table-responsive">
                                                                                            <table class="table">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>No</th>
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
                                                                                                    
                                                                                                    $qalamat = mysql_query("select * from alamat where Nip='$datanip'")or die(mysql_error());
                                                                                                    while($dtalamat=mysql_fetch_array($qalamat))
                                                                                                    {?>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <?php echo $noalamat?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtalamat['Alamat']?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtalamat['Provinsi']?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtalamat['Kabupaten']?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtalamat['Kecamatan']?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtalamat['Kelurahan']?>
                                                                                                            </td>
                                                                                                            <?php
                                                                                                            if($dtalamat['Status']=="True")
                                                                                                                echo "<td><i class='material-icons'>check</i></td>";
                                                                                                            else
                                                                                                                echo "<td><i class='material-icons'>close</i></td>";
                                                                                                            ?>
                                                                                                                <td>
                                                                                                                    <a href="?p=EditAlamat&action=1&Nip=<?php echo $dtpegawai[0];?>&IdAlamat=<?php echo $dtalamat[0];?>" class="btn bg-deep-purple waves-effect">
                                                                                                                        <i class="material-icons">create</i>
                                                                                                                    </a>
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
                                                                            <div class="panel panel-col-cyan">
                                                                                <div class="panel-heading" role="tab" id="headingTwo_10<?php echo $dtpegawai[0]?>">
                                                                                    <h4 class="panel-title">
                                                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_9<?php echo $dtpegawai[0]?>" href="#collapseTwo_10<?php echo $dtpegawai[0]?>" aria-expanded="false" aria-controls="collapseTwo_10<?php echo $dtpegawai[0]?>">
                                                                                        Riwayat Pendidikan
                                                                                    </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapseTwo_10<?php echo $dtpegawai[0]?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_10<?php echo $dtpegawai[0]?>">
                                                                                    <div class="panel-body">
                                                                                        <a href="?p=FormTambahPendidikan&action=1&Nip=<?php echo $dtpegawai[0];?>&nama=<?php echo $dtpegawai['Nama']?>" class="btn bg-pink waves-effect">
                                                                                            <i class="material-icons">add</i>
                                                                                        </a>
                                                                                        <div class="body table-responsive">
                                                                                            <table class="table">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>No</th>
                                                                                                        <th>Jenjang Pendidikan</th>
                                                                                                        <th>Jurusan</th>
                                                                                                        <th>Nomor Ijazah</th>
                                                                                                        <th>Tgl Ijazah</th>
                                                                                                        <th>Action</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                    $nopendidikan = 1;
                                                                                                    
                                                                                                    $qpendidikan = mysql_query("select * from riwayat_pendidikan where Nip='$datanip'")or die(mysql_error());
                                                                                                    while($dtpendidikan=mysql_fetch_array($qpendidikan))
                                                                                                    {?>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <?php echo $nopendidikan?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtpendidikan['Jenjang_Pendidikan']?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtpendidikan['Jurusan']?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtpendidikan['No_Ijazah']?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtpendidikan['Tgl_Ijazah']?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <a href="?p=EditPendidikan&action=1&Nip=<?php echo $dtpegawai[0];?>&IdPendidikan=<?php echo $dtpendidikan[0];?>&nama=<?php echo $dtpegawai['Nama']?>" class="btn bg-deep-purple waves-effect">
                                                                                                                    <i class="material-icons">create</i>
                                                                                                                </a>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <?php
                                                                                                        $nopendidikan++;
                                                                                                    }
                                                                                                    ?>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-col-cyan">
                                                                                <div class="panel-heading" role="tab" id="headingTwo_9<?php echo $dtpegawai[0]?>">
                                                                                    <h4 class="panel-title">
                                                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_9<?php echo $dtpegawai[0]?>" href="#collapseTwo_9<?php echo $dtpegawai[0]?>" aria-expanded="false" aria-controls="collapseTwo_9<?php echo $dtpegawai[0]?>">
                                                                                        Riwayat Jabatan
                                                                                    </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapseTwo_9<?php echo $dtpegawai[0]?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_9<?php echo $dtpegawai[0]?>">
                                                                                    <div class="panel-body">
                                                                                        <a href="?p=FormTambahEditJabatan&action=1&Nip=<?php echo $dtpegawai[0];?>&nama=<?php echo $dtpegawai['Nama']?>" class="btn bg-pink waves-effect">
                                                                                            <i class="material-icons">add</i>
                                                                                        </a>
                                                                                        <div class="body table-responsive">
                                                                                            <table class="table">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>No</th>
                                                                                                        <th>Jabatan</th>
                                                                                                        <th>Gol</th>
                                                                                                        <th width="20%">Tgl Menjabat</th>
                                                                                                        <th>Gaji Pokok</th>
                                                                                                        <th>No SK</th>
                                                                                                        <th>Tanggal SK</th>
                                                                                                        <th width="20%">Action</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                        $nojabatan = 1;
                                                                                                        
                                                                                                        $qjabatan = mysql_query("select * from riwayat_jabatan rj, pangkat p, jabatan j where rj.Jabatan_Id = j.Id and rj.Pangkat_Id = p.Id and Nip='$datanip'")or die(mysql_error());
                                                                                                        while($dtjabatan=mysql_fetch_array($qjabatan))
                                                                                                        {?>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <?php echo $nojabatan;?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtjabatan['Jabatan'];?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtjabatan['Pangkat'];?>/
                                                                                                                <?php echo $dtjabatan['Golongan'];?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtjabatan['Tgl_Menjabat'];?>&nbsp;s/d&nbsp;<br>
                                                                                                                <?php echo $dtjabatan['Tgl_Terakhir_Menjabat'];?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtjabatan['Gaji_Pokok'];?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtjabatan['No_SK_Jabatan'];?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtjabatan['Tgl_SK'];?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <a href="?p=EditJabatan&action=1&Nip=<?php echo $dtpegawai[0];?>&IdJabatan=<?php echo $dtjabatan[0];?>&nama=<?php echo $dtpegawai['Nama']?>" class="btn bg-deep-purple waves-effect">
                                                                                                                    <i class="material-icons">create</i>
                                                                                                                </a>

                                                                                                            </td>
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
                                                                            <div class="panel panel-col-cyan">
                                                                                <div class="panel-heading" role="tab" id="headingTwo_11<?php echo $dtpegawai[0]?>">
                                                                                    <h4 class="panel-title">
                                                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_9<?php echo $dtpegawai[0]?>" href="#collapseTwo_11<?php echo $dtpegawai[0]?>" aria-expanded="false" aria-controls="collapseTwo_11<?php echo $dtpegawai[0]?>">
                                                                                        Riwayat Kegiatan
                                                                                    </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapseTwo_11<?php echo $dtpegawai[0]?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_11<?php echo $dtpegawai[0]?>">
                                                                                    <div class="panel-body">
                                                                                        <a href="?p=FormTambahKegiatan&action=1&Nip=<?php echo $dtpegawai[0];?>&nama=<?php echo $dtpegawai['Nama']?>" class="btn bg-pink waves-effect">
                                                                                            <i class="material-icons">add</i>
                                                                                        </a>
                                                                                        <div class="body table-responsive">
                                                                                            <table class="table">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th>No</th>
                                                                                                        <th>Jenis Kegiatan</th>
                                                                                                        <th>Nama Kegiatan</th>
                                                                                                        <th>Tanggal</th>
                                                                                                        <th>Peran</th>
                                                                                                        <th>Tempat</th>
                                                                                                        <th>Hasil</th>
                                                                                                        <th>Action</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                    <?php
                                                                                                        $nokegiatan = 1;
                                                                                                        
                                                                                                        $qkegiatan = mysql_query("select * from kegiatan")or die(mysql_error());
                                                                                                        while($dtkegiatan=mysql_fetch_array($qkegiatan))
                                                                                                        {?>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                <?php echo $nokegiatan;?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtkegiatan['Jenis_Kegiatan'];?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtkegiatan['Nama_Kegiatan'];?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtkegiatan['Tgl_Mulai'];?>&nbsp;s/d&nbsp;<br>
                                                                                                                <?php echo $dtjabatan['Tgl_Selesai'];?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtkegiatan['Peran'];?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtkegiatan['Tempat'];?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <?php echo $dtkegiatan['Hasil'];?>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <a href="?p=EditKegiatan&action=1&Nip=<?php echo $dtpegawai[0];?>&IdJabatan=<?php echo $dtkegiatan[0];?>&nama=<?php echo $dtpegawai['Nama']?>" class="btn bg-deep-purple waves-effect">
                                                                                                                    <i class="material-icons">create</i>
                                                                                                                </a>

                                                                                                            </td>
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
                                                                        </div>
                                                                    </div>
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
                                $nopegawai++;
                                include 'form/FormTambahAlamat.php';
                                //include 'form/FormTambahPendidikan.php';
                                //include 'form/FormTambahEditJabatan.php';

                                }
                            
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--
    Edit Pegawai
-->
    <div class="modal fade" id="Editpegawai" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form name="testing" action="" method="POST" id="form_advanced_validation">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Edit Pegawai</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="Nip" ng-model="SelectedItemPegawai.Nip" required/>
                                <label class="form-label">Nip</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="Nama" ng-model="SelectedItemPegawai.Nama" required/>
                                <label class="form-label">Nama</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input name="Sex" type="radio" class="with-gap" value="L" id="L1" ng-model="SelectedItemPegawai.Sex" />
                                <label for="L1">L</label>
                                <input name="Sex" type="radio" class="with-gap" value="P" id="P1" ng-model="SelectedItemPegawai.Sex" />
                                <label for="P1">P</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="Tempat_Lahir" ng-model="SelectedItemPegawai.Tempat_Lahir" required/>
                                <label class="form-label">Tempat_Lahir</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" class="form-control" name="Tgl_Lahir" ng-model="SelectedItemPegawai.Tgl_Lahir" required/>
                                <label class="form-label">Tgl_Lahir</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control" ng-options="item as item.agama for item in Agama track by item.agama" ng-model="SelectedAgama"></select>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input name="Martial" type="radio" class="with-gap" value="Kawin" id="Kawin1" ng-model="SelectedItemPegawai.Status_Perkawinan" />
                                <label for="Kawin1">Kawin</label>
                                <input name="Martial" type="radio" class="with-gap" value="Belum Kawin" id="Belum_Kawin1" ng-model="SelectedItemPegawai.Status_Perkawinan" />
                                <label for="Belum_Kawin1">Belum Kawin</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" class="form-control" name="Tgl_Masuk" ng-model="SelectedItemPegawai.Tgl_Masuk" required/>
                                <label class="form-label">Tgl_Masuk</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input name="JenisPegawai" type="radio" class="with-gap" value="PNS" id="PNS1" ng-model="SelectedItemPegawai.Jenis_Pegawai" />
                                <label for="PNS1">PNS</label>
                                <input name="JenisPegawai" type="radio" class="with-gap" value="Kontrak" id="Kontrak1" ng-model="SelectedItemPegawai.Jenis_Pegawai" />
                                <label for="Kontrak1">Kontrak</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input name="Status" type="radio" class="with-gap" value="True" id="True1" ng-model="SelectedItemPegawai.Status" />
                                <label for="True1">Aktif</label>
                                <input name="Status" type="radio" class="with-gap" value="False" id="False1" ng-model="SelectedItemPegawai.Status" />
                                <label for="False1">Tidak Aktif</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-link waves-effect" value="Update" ng-click="Update()">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="Tambahpegawai" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form name="FormPangkat" action="" method="POST" id="form_advanced_validation" enctype="multipart/form-data">
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
                                <input name="Sex" type="radio" class="with-gap" value="L" id="L" />
                                <label for="L">L</label>
                                <input name="Sex" type="radio" class="with-gap" value="P" id="P" />
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
                                <input name="Martial" type="radio" class="with-gap" value="Kawin" id="Kawin" />
                                <label for="Kawin">Kawin</label>
                                <input name="Martial" type="radio" class="with-gap" value="Belum Kawin" id="Belum_Kawin" />
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
                                <input name="JenisPegawai" type="radio" class="with-gap" value="PNS" id="PNS" />
                                <label for="PNS">PNS</label>
                                <input name="JenisPegawai" type="radio" class="with-gap" value="Kontrak" id="Kontrak" />
                                <label for="Kontrak">Kontrak</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input name="Status" type="radio" class="with-gap" value="True" id="Truee" />
                                <label for="Truee">Aktif</label>
                                <input name="Status" type="radio" class="with-gap" value="False" id="Falsee" />
                                <label for="Falsee">Tidak Aktif</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="file" class="form-control" name="foto" required/>
                                <label class="form-label">Tgl_Masuk</label>
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





</div>

<?php
if(isset($_POST['add']))
{
    $Nip = $_POST['Nip'];
    $Nama = $_POST['Nama'];
    $Sex = $_POST['Sex'];
    $Tempat_lahir = $_POST['Tempat_Lahir'];
    $Tgl_lahir = $_POST['Tgl_Lahir'];
    $Agama = $_POST['Agama'];
    $Martial = $_POST['Martial'];
    $Tgl_Masuk = $_POST['Tgl_Masuk'];
    $JenisPegawai = $_POST['JenisPegawai'];
    $Status = $_POST['Status'];
    $Photo = $_FILES['foto']['name'];

    //==================================//		
    //proses upload foto bandara/dermaga//
    //==================================//
    $dir       = 'img/'; //Folder penyimpanan file
    $max_size  = 9000000; //Ukuran file maximal 4Mb
    $nama_file = $_FILES['foto']['name']; //Nama file yang akan di Upload
    $file_size = $_FILES['foto']['size']; //Ukuran file yang akan di Upload
    $nama_tmp  = $_FILES['foto']['tmp_name']; //Nama file sementara
    $upload = $dir . $nama_file; //Memposisikan direktori penyimpanan dan file
    if($file_size<=$max_size){
        if(move_uploaded_file($nama_tmp, $upload))
        {
            $q = mysql_query("insert into pegawai values('$Nip','$Nama','$Sex','$Tempat_lahir','$Tgl_lahir','$Agama','$Martial','$Tgl_Masuk','$JenisPegawai','$Status','$Photo')")or die(mysql_error());
            if($q)
            {
                echo "<script>alert('Data berhasil di simpan')</script>";
                echo "<script>document.location='?p=pegawai'</script>";
            }else{
                echo "<script>alert('Data Gagal di simpan')</script>";
            }
        }
    }

    //echo "<script>alert('$Nip, $Nama, $Sex, $Tempat_lahir, $Tgl_lahir, $Agama, $Martial, $Tgl_Masuk,  $JenisPegawai, $Status, $Photo')</script>";
    
    
    
    
}

?>


    <script>
    </script>