<!-- MODAL ADD -->
<div class="modal fade" id="modal_form">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Opname</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form" class="form-horizontal">
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">id<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="id_isi" name="id_isi" value="" /></div>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Dimensi<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="number" id="dimensi_isi" name="dimensi_isi" value="" min="0" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Qty Box<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" id="box_isi" name="box_isi" value="0" min="0" />
                                <input class="form-control" type="text" id="kode_barang" name="kode_barang" value="" hidden />
                                <input class="form-control" type="text" id="nama_barang" name="nama_barang" value="" hidden />
                                <input class="form-control" type="text" id="sektor_i" name="sektor_i" value="" hidden />
                                <input class="form-control" type="text" id="kode_pending" name="kode_pending" value="" hidden />
                                <input class="form-control" type="text" id="exp_date" name="exp_date" value="" hidden />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Qty Pcs<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="number" id="pcs_isi" name="pcs_isi" value="0" min="0" /></div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>