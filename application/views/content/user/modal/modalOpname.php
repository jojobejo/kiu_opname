<!-- MODAL ADD -->
<?php foreach ($barang as $b) : ?>
    <div class="modal fade" id="modalOpname<?= $b->id_barang ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('C_User/StkOpname/addOpnameData'); ?>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">ID BARANG <span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="id_isi" name="id_isi" value="<?= $b->id_barang ?>" readonly /></div>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Nama Barang <span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="barang_isi" name="barang_isi" value="<?= $b->nama_barang ?>" readonly /></div>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="kd_barang">Sektor<span class="required te">*</span></label>
                            <div class="col-sm-8">
                            <input class="form-control" type="text" id="sektor_isi" name="sektor_isi" value="<?= $b->sektor ?>" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="kd_barang">Gudang<span class="required te">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="gudang_isi" id="gudang_isi" readonly>
                                    <?php foreach ($gudang as $g) : ?>
                                        <option value="<?= $g->kode_gudang ?>" selected><?= $g->nama_gudang ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Stok Tersedia <span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="number" id="stok_isi" name="stok_isi" value="<?= $b->stok_barang ?>" readonly /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Stok Opname <span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="number" id="opname_isi" name="opname_isi" value="<?= $b->stok_opname ?>"/></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Expired Date<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="date" id="date_isi" name="date_isi" value="<?= $b->exdate ?>" /></div>
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