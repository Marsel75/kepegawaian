<div ng-controller="PegawaiController">
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-init="Init()">
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
                        <tr ng-repeat="item in DatasPegawai">
                            <td>{{$index+1}}</td>
                            <td>{{item.Nip}}</td>
                            <td>{{item.Nama}}</td>
                            <td>{{item.Sex}}</td>
                            <td>{{item.Tempat_Lahir}}</td>
                            <td>{{item.Tgl_Lahir}}</td>
                            <td>{{item.Agama}}</td>
                            <td>{{item.Status}}</td>
                            <td>
                                <button data-toggle="modal" data-target="#Editpegawai" ng-click="Selected(item)"><i class="material-icons">create</i></button>
                                <button data-toggle="modal" data-target="#Detailpegawai" ng-click="viewdetail(item)"><i class="material-icons">view_agenda</i></button>
                            </td>
                        </tr>
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
                            <input name="Sex" type="radio" class="with-gap" value="L" id="L1" ng-model="SelectedItemPegawai.Sex"/>
                            <label for="L1">L</label>
                            <input name="Sex" type="radio" class="with-gap" value="P" id="P1" ng-model="SelectedItemPegawai.Sex"/>
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
                            <input name="Martial" type="radio" class="with-gap" value="Kawin" id="Kawin1"  ng-model="SelectedItemPegawai.Status_Perkawinan"/>
                            <label for="Kawin1">Kawin</label>
                            <input name="Martial" type="radio" class="with-gap" value="Belum Kawin" id="Belum_Kawin1"  ng-model="SelectedItemPegawai.Status_Perkawinan"/>
                            <label for="Belum_Kawin1">Belum Kawin</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="date" class="form-control" name="Tgl_Masuk"  ng-model="SelectedItemPegawai.Tgl_Masuk" required/>
                            <label class="form-label">Tgl_Masuk</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input name="JenisPegawai" type="radio" class="with-gap" value="PNS" id="PNS1"  ng-model="SelectedItemPegawai.Jenis_Pegawai"/>
                            <label for="PNS1">PNS</label>
                            <input name="JenisPegawai" type="radio" class="with-gap" value="Kontrak" id="Kontrak1"  ng-model="SelectedItemPegawai.Jenis_Pegawai"/>
                            <label for="Kontrak1">Kontrak</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input name="Status" type="radio" class="with-gap" value="True" id="True1"  ng-model="SelectedItemPegawai.Status"/>
                            <label for="True1">Aktif</label>
                            <input name="Status" type="radio" class="with-gap" value="False" id="False1"  ng-model="SelectedItemPegawai.Status"/>
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
                            <input name="Status" type="radio" class="with-gap" value="True" id="True" />
                            <label for="True">Aktif</label>
                            <input name="Status" type="radio" class="with-gap" value="False" id="False" />
                            <label for="False">Tidak Aktif</label>
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




<!--
                                    Detail Pegawai
                                -->
                                    <div class="modal fade" id="Detailpegawai" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">

                                                <form name="FormPangkat" action="" method="POST" id="form_advanced_validation">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="defaultModalLabel">Detail Pegawai</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <div class="col-md-12">
                                                                <div class="panel-group" id="accordion_9" role="tablist" aria-multiselectable="true">                                                                    
                                                                    <div class="panel panel-col-cyan">
                                                                        <div class="panel-heading" role="tab" id="headingOne_9">
                                                                            <h4 class="panel-title">
                                                                                <a role="button" data-toggle="collapse" data-parent="#accordion_9" href="#collapseOne_9" aria-expanded="true" aria-controls="collapseOne_9">
                                                                                    Riwayat Alamat
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseOne_9" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_9">
                                                                            <div class="panel-body">
                                                                                <button data-toggle="modal" data-target="#TambahPendidikan" ng-click="Selected(item)" class="btn bg-pink waves-effect"><i class="material-icons">add</i></button>
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
                                                                                            <tr ng-repeat="item in DataItem.Alamat">
                                                                                                <td>{{$index+1}}</td>
                                                                                                <td>{{item.Alamat}}</td>
                                                                                                <td>{{item.Provinsi}}</td>
                                                                                                <td>{{item.Kabupaten}}</td>
                                                                                                <td>{{item.Kecamatan}}</td>
                                                                                                <td>{{item.Kelurahan}}</td>
                                                                                                <td ng-show="item.Status=='True'"><i class="material-icons">check</i></td>
                                                                                                <td ng-show="item.Status=='False'"><i class="material-icons">close</i></td>
                                                                                                <td>
                                                                                                    <button data-toggle="modal" data-target="#TambahAlamat" ng-click="Selected(item)"><i class="material-icons">create</i></button>
                                                                                                </td>
                                                                                            </tr>                                                                                            
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="panel panel-col-cyan">
                                                                        <div class="panel-heading" role="tab" id="headingTwo_10">
                                                                            <h4 class="panel-title">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_9" href="#collapseTwo_10" aria-expanded="false" aria-controls="collapseTwo_10">
                                                                                    Riwayat Pendidikan
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseTwo_10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_10">
                                                                            <div class="panel-body">
                                                                                <button data-toggle="modal" data-target="#TambahJabatan" data-dismiss="modal" class="btn bg-pink waves-effect"><i class="material-icons">add</i></button>
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
                                                                                            <tr ng-repeat="item in DataItem.JenjangPendidikan">
                                                                                                <td>{{$index+1}}</td>
                                                                                                <td>{{item.Jenjang_Pendidikan}}</td>
                                                                                                <td>{{item.Jurusan}}</td>
                                                                                                <td>{{item.No_Ijazah}}</td>
                                                                                                <td>{{item.Tgl_Ijazah}}</td>
                                                                                                <td>
                                                                                                    <button data-toggle="modal" data-target="#Editpegawai" ng-click="Selected(item)"><i class="material-icons">create</i></button>
                                                                                                    <button data-toggle="modal" data-target="#Detailpegawai" ng-click="ReadDataPegawai(item)"><i class="material-icons">view_agenda</i></button>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="panel panel-col-cyan">
                                                                        <div class="panel-heading" role="tab" id="headingTwo_9">
                                                                            <h4 class="panel-title">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_9" href="#collapseTwo_9" aria-expanded="false"
                                                                                   aria-controls="collapseTwo_9">
                                                                                    Riwayat Jabatan
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseTwo_9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_9">
                                                                            <div class="panel-body">
                                                                                <button data-toggle="modal" data-target="#TambahJabatan" data-dismiss="modal" class="btn bg-pink waves-effect"><i class="material-icons">add</i></button>
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
                                                                                            <tr ng-repeat="item in DataItem.RiwayatJabatan">
                                                                                                <td>{{$index+1}}</td>
                                                                                                <td>{{item.Jabatan}}</td>
                                                                                                <td>{{item.Pangkat}}</td>
                                                                                                <td>{{item.Tgl_Menjabat}}&nbsp;s/d&nbsp;<br>{{item.Tgl_Terakhir_Menjabat}}</td>
                                                                                                <td>{{item.Gaji_Pokok | currency:"Rp. ":0}}</td>
                                                                                                <td>{{item.No_SK_Jabatan}}</td>
                                                                                                <td>{{item.Tgl_SK}}</td>
                                                                                                <td>
                                                                                                    <button data-toggle="modal" data-target="#EditJabatan" ng-click="SelectedJabatan(item)"><i class="material-icons">create</i></button>
                                                                                                    <button data-toggle="modal" data-target="#Detailpegawai" ng-click="ReadDataPegawai(item)"><i class="material-icons">view_agenda</i></button>
                                                                                                </td>
                                                                                            </tr>
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
                                    <?php
                                    include_once 'form/FormTambahEditJabatan.php';
                                    ?>


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
    $Photo = $_POST['Photo'];

    //echo "<script>alert('$Nip, $Nama, $Sex, $Tempat_lahir, $Tgl_lahir, $Agama, $Martial, $Tgl_Masuk,  $JenisPegawai, $Status, $Photo')</script>";
    
    $q = mysql_query("insert into pegawai values('$Nip','$Nama','$Sex','$Tempat_lahir','$Tgl_lahir','$Agama','$Martial','$Tgl_Masuk','$JenisPegawai','$Status')")or die(mysql_error());
    if($q)
    {
        echo "<script>alert('Data berhasil di simpan')</script>";
        echo "<script>document.location='?p=pegawai'</script>";
    }else{
        echo "<script>alert('Data Gagal di simpan')</script>";
    }
    
}

?>


<script>
        angular.module("Ctrl", [])
            .controller("PegawaiController", function($scope, $http) {
                $scope.DatasPegawai = [];
                $scope.SelectedItemPegawai={};
                $scope.Agama=[{'agama': 'Islam'}, {'agama': 'Protestan'}, {'agama': 'Katolik'}, {'agama': 'Hindu'}, {'agama': 'Budha'}, {'agama': 'Konghucu'}];
                $scope.SelectedAgama={};
                $scope.DataSelectedJabatan={};
                $scope.DataItem={};
                $scope.Init=function(){
                    var UrlreadPegawai = "api/datas/readPegawai.php";
                    $http({
                        method: "get",
                        url:UrlreadPegawai
                    }).then(function(response){
                        if(response.data.message!="No Pegawai found")
                        $scope.DatasPegawai=response.data.records;

                    }, function(error){
                        alert(error.message);
                    })
                }

                $scope.Selected= function(item){
                    var NewDateLahir = new Date(angular.copy(item.Tgl_Lahir));
                    var NewDateMasuk = new Date(angular.copy(item.Tgl_Masuk));
                    $scope.SelectedAgama.agama=angular.copy(item.Agama);
                    //var newdate = $scope.InputPrice.CreateDate.getFullYear() + '-' + ($scope.InputPrice.CreateDate.getMonth() + 1) + '-' + $scope.InputPrice.CreateDate.getDate();
                    $scope.SelectedItemPegawai= angular.copy(item);
                    $scope.SelectedItemPegawai.Tgl_Lahir=NewDateLahir;
                    $scope.SelectedItemPegawai.Tgl_Masuk=NewDateMasuk;

                }

                $scope.Update=function(item){
                    var a= $scope.SelectedAgama.agama;
                    var NewDateLahir = $scope.SelectedItemPegawai.Tgl_Lahir.getFullYear() + '-' + '0' + ($scope.SelectedItemPegawai.Tgl_Lahir.getMonth() + 1) + '-' + $scope.SelectedItemPegawai.Tgl_Lahir.getDate();
                    var NewDateMasuk = $scope.SelectedItemPegawai.Tgl_Masuk.getFullYear() + '-' + '0' + ($scope.SelectedItemPegawai.Tgl_Masuk.getMonth() + 1) + '-' + $scope.SelectedItemPegawai.Tgl_Masuk.getDate();
                    $scope.SelectedItemPegawai.Agama=a;
                    $scope.SelectedItemPegawai.Tgl_Lahir=NewDateLahir;
                    $scope.SelectedItemPegawai.Tgl_Masuk=NewDateMasuk;
                    var Data = $scope.SelectedItemPegawai;
                    var UrlUpdatePegawai = "api/datas/updatePegawai.php";
                    $http({
                        method: "post",
                        url: UrlUpdatePegawai,
                        data:Data
                    }).then(function(response){
                        if(response.data.message=="Employees successfully changed")
                        {
                            angular.forEach($scope.DatasPegawai, function(value, keys){
                                if(value.Nip==Data.Nip)
                                {
                                    value.Nama=Data.Nama;
                                    value.Sex=Data.Sex;
                                    value.Tempat_Lahir=Data.Tempat_Lahir;
                                    value.Tgl_Lahir=Data.Tgl_Lahir;
                                    value.Agama=Data.Agama;
                                    value.Status_Perkawinan=Data.Status_Perkawinan;
                                    value.Tgl_Masuk=Data.Tgl_Masuk;
                                    value.Jenis_Pegawai=Data.Jenis_Pegawai;
                                    value.Status=Data.Status;
                                    alert(response.data.message);
                                }
                            })
                        }else{
                            alert(response.data.message);
                        }

                    }, function(error){
                        alert(error.message);
                    })
                }

                $scope.viewdetail=function(item){
                    $scope.DataItem=item;
                }

                $scope.SelectedJabatan=function(item){
                    $scope.DataSelectedJabatan=item;
                }

                $scope.UpdateRiwayatPegawai=function(){

                }

            })
</script>

