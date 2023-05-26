<!-- MODAL ADD -->
<?php foreach ($opname as $o) : ?>
    <div class="modal fade" id="modalEditOpname<?= $o->idopname ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Inputan Opname</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('editInputOpname'); ?>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">idopname<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="id_isi" name="id_isi" value="<?= $o->idopname ?>" readonly /></div>
                        </div>
                    </div>
                    <div class="form-group" hidden >
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Kode Barang<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="kdbarang_isi" name="kdbarang_isi" value="<?= $o->kode_barang ?>" readonly /></div>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Hasil Dimensi<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="number" id="dimensi_isi" name="dimensi_isi" value="<?= $o->hasil_dimensi ?>" readonly /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Nama Barang<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="nama_isi" name="nama_isi" value="<?= $o->nama_barang ?>" readonly /></div>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Kode Pending<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="pending_isi" name="pending_isi" value="<?= $o->kode_pending ?>" readonly /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Exp Date<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="exp_isi" name="exp_isi" value="<?= $o->exp_date ?>" readonly/></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Stok Box<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="number" id="box_isi" name="box_isi" value="<?= $o->stok_box1 ?>"  /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Stok Pcs<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="number" id="pcs_isi" name="pcs_isi" value="<?= $o->stok_pcs1 ?>" /></div>
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