<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

    <title>Cetak Nota</title>

    <link rel='stylesheet' type='text/css' href='css/style.css' />
    <link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
    <script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
    <script type='text/javascript' src='js/example.js'></script>
    <script src="../../../js/angular/angular.min.js"></script>
    <script src="../../../js/angular/angular-route.js"></script>

</head>

<body ng-app="Ctrl" ng-controller="LaporanController" ng-init="Init()">
    <?php
    session_start();
    $_SESSION['DataNip']=$_GET['Nip'];
    ?>
    <div id="page-wrap">
        <div id="col-12" style="border-bottom: solid;">

            <div id="col-2" sftyle="text-align: right!important;">
                <img src="../../../images/LogoJayapura.png" width="100px">
            </div>
            <div id="col-10">
                <div id="col-12">
                    <div id="col-10">
                        <center>
                            <h3>PEMERINTAH KOTA JAYAPURA</h3>
                            <H2>KANTOR KELURAHAN ENTROP DISTRIK JAYAPURA SELATA<BR> PROVINSI PAPUA</H2>
                            <H5>Jalan Kabupaten III No. 2 Telp. 0967 537380 Jayapura-Papua</H5>
                        </center>
                    </div>
                    <div id="col-2">
                    </div>
                </div>
            </div>


        </div>
        

        <div id="col-12" style="margin-bottom:40px; margin-top:30px;">
            <div id="col-9">
                <div id="col-12">
                    <div id="col-8">
                        <div id="col-3">Nama</div><div id="col-1" style="text-align: right!important;">:&nbsp;</div>
                        <div id="col-4">{{DataRekap.Nama}}</div>
                    </div>
                    <div id="col-6"></div>
                </div>
                <div id="col-12">
                    <div id="col-8">
                        <div id="col-3">Nip</div><div id="col-1" style="text-align: right!important;">:&nbsp;</div>
                        <div id="col-4">{{DataRekap.Nip}}</div>
                    </div>
                    <div id="col-6"></div>
                </div>
                <div id="col-12">
                    <div id="col-8">
                        <div id="col-3">Jenis Kelamin</div><div id="col-1" style="text-align: right!important;">:&nbsp;</div>
                        <div id="col-4">{{DataRekap.Sex}}</div>
                    </div>
                    <div id="col-6"></div>
                </div>
                <div id="col-12">
                    <div id="col-8">
                        <div id="col-3">TTL</div><div id="col-1" style="text-align: right!important;">:&nbsp;</div>
                        <div id="col-5">{{DataRekap.Tempat_Lahir}}, &nbsp; {{DataRekap.Tgl_Lahir}}</div>
                    </div>
                    <div id="col-6"></div>
                </div>
                <div id="col-12">
                    <div id="col-8">
                        <div id="col-3">Agama</div><div id="col-1" style="text-align: right!important;">:&nbsp;</div>
                        <div id="col-4">{{DataRekap.Agama}}</div>
                    </div>
                    <div id="col-6"></div>
                </div>
                <div id="col-12">
                    <div id="col-8">
                        <div id="col-3">Status Kawin</div><div id="col-1" style="text-align: right!important;">:&nbsp;</div>
                        <div id="col-4">{{DataRekap.Status_Perkawinan}}</div>
                    </div>
                    <div id="col-6"></div>
                </div>
                <div id="col-12">
                    <div id="col-8">
                        <div id="col-3">Mulai Kerja</div><div id="col-1" style="text-align: right!important;">:&nbsp;</div>
                        <div id="col-4">{{DataRekap.Tgl_Masuk}}</div>
                    </div>
                    <div id="col-6"></div>
                </div>
                <div id="col-12">
                    <div id="col-8">
                        <div id="col-3">Keterangan</div><div id="col-1" style="text-align: right!important;">:&nbsp;</div>
                        <div id="col-4" ng-show="DataRekap.Status='True'">Aktif</div>
                        <div id="col-4" ng-show="DataRekap.Status!='True'">Tidak Aktif</div>
                    </div>
                    <div id="col-6"></div>
                </div>
            </div>
            <div id="col-3" style="text-align: right!important;">
                <img ng-show="DataRekap.Photo!=null" src="../../img/{{DataRekap.Photo}}" width="150px" />
            </div>
        </div>

        <div id="col-12">
                <h4>RIWAYAT ALAMAT</h4>
        </div>
        <table width=100%>
            <tr>
                <th>No</th>
                <th>Alamat</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Status</th>
            </tr>

            <tr class="odd gradeX" ng-repeat="item in DataRekap.Alamat">
                <td>{{$index+1}}</td>
                <td>{{item.Alamat}}</td>
                <td>{{item.Provinsi}}</td>
                <td>{{item.Kabupaten}}</td>
                <td>{{item.Kecamatan}}</td>
                <td>{{item.Kelurahan}}</td>
                <td ng-show="item.Status='True'"><i class='material-icons'>check</i></td>
                <td ng-show="item.Status!='True'"><i class='material-icons'>close</i></td>
            </tr>
        </table>

        <div id="col-12" style="margin-top:40px;">
                <h4>RIWAYAT PENDIDIKAN</h4>
        </div>
        <table width=100%>
            <tr>
                <th>No</th>
                <th>Jenjang Pendidikan</th>
                <th>Jurusan</th>
                <th>Nomor Ijazah</th>
                <th>Tgl Ijazah</th>
                <th>Tempat</th>
                <th>Tandatangan Ijazah</th>
            </tr>

            <tr class="odd gradeX" ng-repeat="item in DataRekap.JenjangPendidikan">
                <td>{{$index+1}}</td>
                <td>{{item.Jenjang_Pendidikan}}</td>
                <td>{{item.Jurusan}}</td>
                <td>{{item.No_Ijazah}}</td>
                <td>{{item.Tgl_Ijazah}}</td>
                <td>{{item.Tempat}}</td>
                <td>{{item.Ketua}}</td>
            </tr>
        </table>

        <div id="col-12" style="margin-top:40px;">
                <h4>RIWAYAT JABATAN</h4>
        </div>
        <table width=100%>
            <tr>
                <th>No</th>
                <th>Jabatan</th>
                <th>Gol</th>
                <th>Tanggal Menjabat</th>
                <th>Gaji Pokok</th>
                <th>No SK</th>
                <th>Tanggal SK</th>
            </tr>

            <tr class="odd gradeX" ng-repeat="item in DataRekap.RiwayatJabatan">
                <td>{{$index+1}}</td>
                <td>{{item.Jabatan}}</td>
                <td>{{item.Pangkat}}</td>
                <td>{{item.Tgl_Menjabat}}&nbsp;s/d &nbsp;{{Tgl_Terakhir_Menjabat}}</td>
                <td>{{item.Gaji_Pokok}}</td>
                <td>{{item.No_SK_Jabatan}}</td>
                <td>{{item.Tgl_SK}}</td>
            </tr>
        </table>
        <div id="col-12" style="margin-top:40px;">
                <h4>RIWAYAT KEGIATAN</h4>
        </div>
        <table width=100%>
            <tr>
                <th>No</th>
                <th>Jenis Kegiatan</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Peran</th>
                <th>Tempat</th>
                <th>Hasil</th>
            </tr>

            <tr class="odd gradeX" ng-repeat="item in DataRekap.Kegiatan">
                <td>{{$index+1}}</td>
                <td>{{item.Jenis_Kegiatan}}</td>
                <td>{{item.Nama_Kegiatan}}</td>
                <td>{{item.Tgl_Mulai}}&nbsp;s/d &nbsp;{{item.Tgl_Selesai}}</td>
                <td>{{item.Peran}}</td>
                <td>{{item.Tempat}}</td>
                <td>{{item.Hasil}}</td>
            </tr>
        </table>
        <div id="col-12" style="margin-top:70px;">
            <div id="col-4">
                &nbsp;
            </div>
            <div id="col-8">
                <div id="col-12">
                    <div id="col-6"></div>
                    <div id="col-6" class="pull-right" style="text-align: center!important;">
                        <div id="col-12">
                            Jayapura, {{DataRekap.TanggalBuat}}
                        </div>
                        <div id="col-12" style="margin:0 0 50px 0;">
                            <b>Kepada Bagian Kepegawaian</b>
                        </div>
                        <div id="col-12">
                            <b><u>MARSEL KOGOYA</u></b>
                        </div>
                        <div id="col-12">
                            NIP. 010163512391
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        angular.module("Ctrl", [])
            .controller("LaporanController", function($scope, $http) {
                $scope.DataRekap = [];
                $scope.Init = function() {
                    var GetNota = "../../api/datas/readDataPegawai.php";
                    $http({
                            method: "get",
                            url: GetNota
                        })
                        .then(function(response) {
                            $scope.DataRekap = response.data;
                        }, function(error) {
                            alert(error.message);
                        })
                }


            });
    </script>


</body>

</html>