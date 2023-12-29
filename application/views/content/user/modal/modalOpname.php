<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" style="text-align: center;">Input Barang Opname</h3>
            </div>
            <div class="modal-body form">
                <form action="<?= base_url('inputOpname') ?>" method="POST" id="form_add_opname" class="form-horizontal">
                    <?php echo form_open_multipart('inputOpname'); ?>
                    <input type="hidden" value="" name="id" />
                    <div class="form-body">
                        <div class="form-group" hidden>
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">ID BARANG <span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="text" id="id_isi" name="id_isi" value="" readonly /></div>
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">Kode Barang <span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="text" id="kode_isi" name="kode_isi" value="" readonly /></div>
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">Kode Pending <span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="text" id="pending_isi" name="pending_isi" value="" readonly /></div>
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">dimensi <span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="text" id="dimensi_isi" name="dimensi_isi" value="" readonly /></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">Nama Barang<span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="text" id="nama_isi" name="nama_isi" value="" readonly /></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">Expired Date<span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="text" id="date_isi" name="date_isi" value="" readonly /></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">Box<span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="number" id="box_isi" name="box_isi" value="" /></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">Pcs<span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="number" id="pcs_isi" name="pcs_isi" value="" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_exp" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" style="text-align: center;">Input Epired Date Barang</h3>
            </div>
            <div class="modal-body form">
                <form action="<?= base_url('inputOpnameExp') ?>" method="POST" id="form_add_exp" class="form-horizontal">
                    <?php echo form_open_multipart('inputOpnameExp'); ?>
                    <input type="hidden" value="" name="id" />
                    <div class="form-body">

                        <div class="form-group" hidden>
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">Kode Barang <span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="text" id="kode_isi" name="kode_isi" value="" readonly /></div>
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">Kode Pending <span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="text" id="pending_isi" name="pending_isi" value="" readonly /></div>
                            </div>
                        </div>
                        <div class="form-group" hidden>
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">dimensi <span class="required">*</span></label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="panjang_isi" name="panjang_isi" value="" readonly />
                                    <input class="form-control" type="text" id="lebar_isi" name="lebar_isi" value="" readonly />
                                    <input class="form-control" type="text" id="tinggi_isi" name="tinggi_isi" value="" readonly />
                                    <input class="form-control" type="text" id="dimensi_isi" name="dimensi_isi" value="" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">Nama Barang<span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="text" id="nama_isi" name="nama_isi" value="" readonly /></div>
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
                                <label class="col-sm-3 control-label text-right" for="id_bar">Box<span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="number" id="box_isi" name="box_isi" value="" /></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right" for="id_bar">Pcs<span class="required">*</span></label>
                                <div class="col-sm-8"><input class="form-control" type="number" id="pcs_isi" name="pcs_isi" value="" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->