<!-- MODAL ADD -->
<?php foreach ($detail_opname as $i) : ?>
    <div class="modal fade" id="editopname<?= $i->id_opname ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('input_edit/edit_data'); ?>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">DATA<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="act_input" name="act_input" value="edit_data" readonly />
                                <input class="form-control" type="number" id="idopname" name="idopname" value="<?= $i->id_opname ?>" readonly />
                                <input class="form-control" type="number" id="dimensi" name="dimensi" value="<?= $i->dimensi ?>" readonly />
                                <input class="form-control" type="text" id="kdbarang" name="kdbarang" value="<?= $i->kode_barang ?>" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Pcs<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" id="pcs_isi" name="pcs_isi" value="<?= $i->stock_pcs ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Box<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="number" id="box_isi" name="box_isi" value="<?= $i->stock_box ?>" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Expired Date<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="date_isi" name="date_isi" value="<?= $i->exp_date ?>" readonly /></div>
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
<?php foreach ($detail_opname as $i) : ?>
    <div class="modal fade" id="hapus<?= $i->id_opname ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?php echo form_open_multipart('input_edit/hapus_data'); ?>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">DATA<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="act_input" name="act_input" value="hapus_data" readonly />
                                <input class="form-control" type="number" id="idopname" name="idopname" value="<?= $i->id_opname ?>" readonly />
                                <input class="form-control" type="number" id="dimensi" name="dimensi" value="<?= $i->dimensi ?>" readonly />
                                <input class="form-control" type="text" id="kdbarang" name="kdbarang" value="<?= $i->kode_barang ?>" readonlsy />
                            </div>
                        </div>
                    </div>
                    <h3>Data Akan Terhapus Permanen</h3>
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