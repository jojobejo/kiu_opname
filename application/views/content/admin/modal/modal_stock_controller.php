<!-- MODAL ADD -->
<?php foreach ($detail_tracinng as $d) : ?>
    <div class="modal fade" id="modaledit<?= $d->id_opname ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Revisi Stock</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('stock_controller/adjustmen'); ?>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">qty<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="idopname" name="idopname" value="<?= $d->id_opname ?>" readonly />
                                <input class="form-control" type="text" id="dimensi" name="dimensi" value="<?= $d->dimensi ?>" readonly />
                                <input class="form-control" type="text" id="kdbarang" name="kdbarang" value="<?= $d->kode_barang ?>" readonly />
                                <input class="form-control" type="text" id="keterangan" name="keterangan" value="addjustment" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Stock Pcs<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" id="stock_pcs" name="stock_pcs" value="<?= $d->stock_pcs ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Stock Box<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" id="stock_box" name="stock_box" value="<?= $d->stock_box ?>" />
                            </div>
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

<!-- MODAL ADD -->
<?php foreach ($status_tracing as $s) : ?>
    <div class="modal fade" id="adjustment">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Adjustment Stock</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('stock_controller/adjustmentadd'); ?>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">qty<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" id="kdbarang" name="kdbarang" value="<?= $s->kode_barang ?>" readonly />
                                <input class="form-control" type="text" id="nmbr" name="nmbr" value="<?= $s->nama_barang ?>" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">QTY Adjustment<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" id="qtyisi" name="qtyisi" value="" placeholder="0" />
                            </div>
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