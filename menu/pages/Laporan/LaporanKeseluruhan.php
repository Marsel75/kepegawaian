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
    <div id="col-12" style="border-bottom: solid;">
        <div id="col-1">
        </div>
        <div id="col-10">
            <div id="col-12">
                <div id="col-4" style="text-align: right!important;">
                    <img src="../../../images/LogoJayapura.png" width="60px">
                </div>
                <div id="col-8">
                    <div id="col-12">
                        <div id="col-10">
                            <center>
                                <h4>PEMERINTAH KOTA JAYAPURA</h4>
                                <H3>KELURAHAN ENTROP DISTRIK JAYAPURA SELATAN<BR> PROVINSI PAPUA</H3>
                                <H5>Jln. Kelapa II Entrop, Kecamatan Jayapura Selatan, Kota Jayapura</H5>
                            </center>
                        </div>
                        <div id="col-2">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div id="col-1">
        </div>
    </div>
    <div id="col-12" style="margin-bottom:40px;">
        <center>
            <h4>DAFTAR PEGAWAI DISTRIK JAYAPURA SELATAN</h4>
        </center>
    </div>
    

    <table width=100%>
        <tr>
            <th style="font-size: 10px;"> NO </th>
            <th style="font-size: 10px;"> NIP </th>
            <th style="font-size: 10px;"> NAMA PEGAWAI </th>
            <th style="font-size: 10px;"> JK</th>
            <th style="font-size: 10px;">TEMPAT LAHIT</th>
            <th style="font-size: 10px;"> TANGGAL LAHIR </th>
            <th style="font-size: 10px;"> AGAMA </th>
            <th style="font-size: 10px;">STATUS KAWIN</th>
            <th style="font-size: 10px;">TANGGAL MASUK KERJA</th>
            <th style="font-size: 10px;">STATUS</th>            
            <th width="50px" style="font-size: 10px;">PHOTO</th>
            <th style="font-size: 10px;">STATUS PEGAWAI</th>
        <tr ng-repeat="item in DataRekap">
            <td style="font-size: 10px;" scope="row">{{$index+1}}</td>
            <td style="font-size: 10px;">{{item.Nip}}</td>
            <td style="font-size: 10px;">{{item.Nama}}</td>
            <td style="font-size: 10px;">{{item.Sex}}</td>
            <td style="font-size: 10px;">{{item.Tempat_Lahir}}</td>
            <td style="font-size: 10px;">{{item.Tgl_Lahir}}</td>
            <td style="font-size: 10px;">{{item.Agama}}</td>
            <td style="font-size: 10px;">{{item.Status_Perkawinan}}</td>
            <td style="font-size: 10px;">{{item.Tgl_Masuk}}</td>
            <td style="font-size: 10px;">{{item.Jenis_Pegawai}}</td>
            <td ng-show="item.Photo==null" style="font-size: 10px;">Foto Kosong</td>
            <td ng-show="item.Photo!=null" style="font-size: 10px;"><img src="../../img/{{item.Photo}}" width="75px"/></td>
            <td ng-show="item.Status=='True'" style="font-size: 10px;">Aktif</td>
            <td ng-show="item.Status=='False'" style="font-size: 10px;">Tidak Aktif</td>

        </tr>
    </table>


    <script>
        angular.module("Ctrl", [])
            .controller("LaporanController", function($scope, $http) {
                $scope.DataRekap = [];
                $scope.Init = function() {



                    var GetNota = "../../api/datas/readPegawai.php";
                    $http({
                            method: "get",
                            url: GetNota
                        })
                        .then(function(response) {
                            $scope.DataRekap = response.data.records;
                        }, function(error) {
                            alert(error.message);
                        })
                }


            });
    </script>


</body>

</html>