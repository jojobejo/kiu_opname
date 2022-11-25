<!-- MODAL ADD -->
<?php foreach ($barang as $b) : ?>
    <div class="modal fade" id="modalOpname<?= $b->id_opname ?>">
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
                            <div class="col-sm-8"><input class="form-control" type="text" id="id_isi" name="id_isi" value="<?= $b->id_opname ?>" readonly /></div>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Kode Barang <span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="kode_isi" name="kode_isi" value="<?= $b->kode_barang ?>" readonly /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Dimensi<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="number" id="dimensi_isi" name="dimensi_isi" value="<?= $b->hasil_dimensi ?>" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Box<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="number" id="box_isi" name="box_isi" value="<?= $b->stok_box1 ?>" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Pcs<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="number" id="pcs_isi" name="pcs_isi" value="<?= $b->stok_pcs1 ?>" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Expired Date<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="date" id="date_isi" name="date_isi" value="<?= $b->exp_date ?>" readonly /></div>
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