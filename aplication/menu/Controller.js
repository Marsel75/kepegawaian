angular.module("Ctrl", [])

.controller("PegawaiController", function($scope, $http, $rootScope) {
    $scope.DatasPegawai = [];
    $scope.SelectedItemPegawai = {};
    $scope.DatasPangkat = [];
    $scope.DatasJabatan = [];
    $rootScope.DataEditJabatan = {};
    $scope.Agama = [{ 'agama': 'Islam' }, { 'agama': 'Protestan' }, { 'agama': 'Katolik' }, { 'agama': 'Hindu' }, { 'agama': 'Budha' }, { 'agama': 'Konghucu' }];
    $scope.SelectedAgama = {};
    $scope.DataSelectedJabatan = {};
    $scope.DataItem = {};
    $scope.SelectedJabatan = {};
    $scope.SelectedPangkat = {};

    $scope.Init = function() {
        var UrlreadPegawai = "api/datas/readPegawai.php";
        $http({
            method: "get",
            url: UrlreadPegawai
        }).then(function(response) {
            if (response.data.message != "No Pegawai found")
                $scope.DatasPegawai = response.data.records;

        }, function(error) {
            alert(error.message);
        })

        var UrlJabatan = "api/datas/readJabatan.php";
        $http({
            method: "get",
            url: UrlJabatan
        }).then(function(response) {
            if (response.data.message != "No Jabatan found") {
                $scope.DatasJabatan = response.data.records;
            }
        }, function(error) {
            alert(error.message);
        })

        var UrlPangkat = "api/datas/readPangkat.php";
        $http({
            method: "get",
            url: UrlPangkat
        }).then(function(response) {
            if (response.data.message != "No Pangkat found") {
                $scope.DatasPangkat = response.data.records;
            }

        }, function(error) {
            alert(error.message);
        })
    }

    $scope.Selected = function(item) {
        var NewDateLahir = new Date(angular.copy(item.Tgl_Lahir));
        var NewDateMasuk = new Date(angular.copy(item.Tgl_Masuk));
        $scope.SelectedAgama.agama = angular.copy(item.Agama);
        //var newdate = $scope.InputPrice.CreateDate.getFullYear() + '-' + ($scope.InputPrice.CreateDate.getMonth() + 1) + '-' + $scope.InputPrice.CreateDate.getDate();
        $scope.SelectedItemPegawai = angular.copy(item);
        $scope.SelectedItemPegawai.Tgl_Lahir = NewDateLahir;
        $scope.SelectedItemPegawai.Tgl_Masuk = NewDateMasuk;

    }

    $scope.Update = function(item) {
        var a = $scope.SelectedAgama.agama;
        var NewDateLahir = $scope.SelectedItemPegawai.Tgl_Lahir.getFullYear() + '-' + '0' + ($scope.SelectedItemPegawai.Tgl_Lahir.getMonth() + 1) + '-' + $scope.SelectedItemPegawai.Tgl_Lahir.getDate();
        var NewDateMasuk = $scope.SelectedItemPegawai.Tgl_Masuk.getFullYear() + '-' + '0' + ($scope.SelectedItemPegawai.Tgl_Masuk.getMonth() + 1) + '-' + $scope.SelectedItemPegawai.Tgl_Masuk.getDate();
        $scope.SelectedItemPegawai.Agama = a;
        $scope.SelectedItemPegawai.Tgl_Lahir = NewDateLahir;
        $scope.SelectedItemPegawai.Tgl_Masuk = NewDateMasuk;
        var Data = $scope.SelectedItemPegawai;
        var UrlUpdatePegawai = "api/datas/updatePegawai.php";
        $http({
            method: "post",
            url: UrlUpdatePegawai,
            data: Data
        }).then(function(response) {
            if (response.data.message == "Employees successfully changed") {
                angular.forEach($scope.DatasPegawai, function(value, keys) {
                    if (value.Nip == Data.Nip) {
                        value.Nama = Data.Nama;
                        value.Sex = Data.Sex;
                        value.Tempat_Lahir = Data.Tempat_Lahir;
                        value.Tgl_Lahir = Data.Tgl_Lahir;
                        value.Agama = Data.Agama;
                        value.Status_Perkawinan = Data.Status_Perkawinan;
                        value.Tgl_Masuk = Data.Tgl_Masuk;
                        value.Jenis_Pegawai = Data.Jenis_Pegawai;
                        value.Status = Data.Status;
                        alert(response.data.message);
                    }
                })
            } else {
                alert(response.data.message);
            }

        }, function(error) {
            alert(error.message);
        })
    }

    $scope.viewdetail = function(item) {
        $scope.DataItem = item;
    }

    $scope.SelectedJabatan = function(item) {
        $rootScope.DataEditJabatan = item;
        //window.location. = 'kepegawaian/menu/index.php?p=kegiatan';
    }

    $scope.ReadDataPegawai = function(item) {


    }

    $scope.UpdateRiwayatPegawai = function() {

    }

})


.controller("RiwayatJabatanController", function($scope, $http, $rootScope) {
    $scope.DatasJabatan = [];
    var a = $rootScope.DataEditJabatan;
})

;