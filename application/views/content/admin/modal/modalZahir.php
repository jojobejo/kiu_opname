<!-- MODAL ADD -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Zahir</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('C_Admin/Data_zahir/addBarang'); ?>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Kode Barang<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="kode_isi" name="kode_isi" value="" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Kode Pending<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="pending_isi" name="pending_isi" value="" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Nama Barang <span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="barang_isi" name="barang_isi" value="" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Panjang Dimensi<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="number" id="panjang_isi" name="panjang_isi" value="" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Lebar Dimensi<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="number" id="lebar_isi" name="lebar_isi" value="" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Tinggi Dimensi<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="number" id="tinggi_isi" name="tinggi_isi" value="" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Qty<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="number" id="qty_isi" name="qty_isi" value="" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Expired Date<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="date_isi" name="date_isi" value="" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="kd_barang">Sektor<span class="required te">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="sektor_isi" id="sektor_isi">
                                <option value="">-- LOKASI SEKTOR --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Sektor Berkaitan<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="sktor_kait_isi" name="sktor_kait_isi" value="" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Keterangan Input <span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="keterangan_isi" name="keterangan_isi" value="" /></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php foreach ($barang as $b) :
    $originalDate = $b->exp_date;
    $newDate = date("m/d/Y", strtotime($originalDate)); ?>
    <!-- MODAL ADD -->
    <div class="modal fade" id="editZahir<?= $b->id_barang ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Zahir</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('C_Admin/Data_zahir/editBarang'); ?>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">id barang<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="id_isi" name="id_isi" value="<?= $b->id_barang ?>" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Kode Pending<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="pending_isi" name="pending_isi" value="<?= $b->kode_pending ?>" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Kode Barang<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="kode_isi" name="kode_isi" value="<?= $b->kode_barang ?>" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Nama Barang <span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="barang_isi" name="barang_isi" value="<?= $b->nama_barang ?>" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Qty<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="number" id="qty_isi" name="qty_isi" value="<?= $b->qty ?>" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Expired Date<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="date_isi" name="date_isi" value="<?= $b->exp_date  ?>" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="kd_barang">Sektor<span class="required te">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="sektor_isi" id="sektor_isi">
                                    <option <?php if ($b->sektor == 1) {
                                                echo 'selected';
                                            } ?> value="1">1</option>
                                    <option <?php if ($b->sektor == 2) {
                                                echo 'selected';
                                            } ?> value="2">2</option>
                                    <option <?php if ($b->sektor == 3) {
                                                echo 'selected';
                                            } ?> value="3">3</option>
                                    <option <?php if ($b->sektor == 4) {
                                                echo 'selected';
                                            } ?> value="4">4</option>
                                    <option <?php if ($b->sektor == 5) {
                                                echo 'selected';
                                            } ?> value="5">5</option>
                                    <option <?php if ($b->sektor == 6) {
                                                echo 'selected';
                                            } ?> value="6">6</option>
                                    <option <?php if ($b->sektor == 7) {
                                                echo 'selected';
                                            } ?> value="7">7</option>
                                    <option <?php if ($b->sektor == 8) {
                                                echo 'selected';
                                            } ?> value="8">8</option>
                                    <option <?php if ($b->sektor == 9) {
                                                echo 'selected';
                                            } ?> value="9">9</option>
                                    <option <?php if ($b->sektor == 10) {
                                                echo 'selected';
                                            } ?> value="10">10</option>
                                    <option <?php if ($b->sektor == 11) {
                                                echo 'selected';
                                            } ?> value="11">11</option>
                                    <option <?php if ($b->sektor == 12) {
                                                echo 'selected';
                                            } ?> value="12">12</option>
                                    <option <?php if ($b->sektor == 13) {
                                                echo 'selected';
                                            } ?> value="13">13</option>
                                    <option <?php if ($b->sektor == 14) {
                                                echo 'selected';
                                            } ?> value="14">14</option>
                                    <option <?php if ($b->sektor == 15) {
                                                echo 'selected';
                                            } ?> value="15">15</option>
                                    <option <?php if ($b->sektor == 16) {
                                                echo 'selected';
                                            } ?> value="16">16</option>
                                    <option <?php if ($b->sektor == 17) {
                                                echo 'selected';
                                            } ?> value="17">17</option>
                                    <option <?php if ($b->sektor == 18) {
                                                echo 'selected';
                                            } ?> value="18">18</option>
                                    <option <?php if ($b->sektor == 19) {
                                                echo 'selected';
                                            } ?> value="19">19</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Sektor Berkaitan<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="sktor_terkait_isi" name="sktor_terkait_isi" value="<?= $b->sktor_tambahan  ?>" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Keterangan<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="sktor_terkait_isi" name="sktor_terkait_isi" value="<?= $b->keterangan  ?>" /></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>


<!-- MODAL HAPUS -->
<?php foreach ($barang as $b) : ?>
    <div class="modal fade" id="hapusZahir<?php echo $b->id_barang ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <h3>!!!Anda akan menghapus data !!! </h3>
                    <br>
                    <h3><?php echo $b->nama_barang ?></h3>
                    <br>
                    <h3>Data yang sudah terhapus tidak dapat di kembalikan lagi</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger" href="<?php echo base_url("C_Admin/Data_zahir/hapusBarang/$b->id_barang") ?>">Hapus</a>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<!-- /.modal