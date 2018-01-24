<div ng-controller="RiwayatJabatanController" ng-init="Init()">
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
                                <select class="form-control" ng-options="item as item.Jabatan for item in DatasJabatan track by item.Id" ng-model="DataItem.SelectedJabatan"></select>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Pangkat</label>
                                <!--<select class="form-control" ng-options="item as item.Pangkat for item in DatasPangkat track by item.Id"></select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" class="form-control" name="Tgl_Menjabat" ng-model="DataSelectedJabatan.Tgl_Menjabat" />
                                <label class="form-label">Tanggal Mulai Menjabat</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" class="form-control" name="Tgl_Terakhir_Menjabat" ng-model="DataSelectedJabatan.Tgl_Terakhir_Menjabat" />
                                <label class="form-label">Tgl_Terahkir_Menjabat</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="Gaji_Pokok" ng-model="DataSelectedJabatan.Gaji_Pokok" />
                                <label class="form-label">Gaji_Pokok</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="No_SK_Jabatan" ng-model="DataSelectedJabatan.No_SK_Jabatan" />
                                <label class="form-label">No_SK_Jabatan</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" class="form-control" name="Tgl_SK" ng-model="DataSelectedJabatan.Tgl_SK" />
                                <label class="form-label">Tgl_SK</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-link waves-effect" value="Update" ng-click="UpdateRiwayatPegawai()">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
    
</div>