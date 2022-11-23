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
                        <label class="col-sm-3 control-label text-right" for="id_bar">Nama Barang <span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="barang_isi" name="barang_isi" value="" /></div>
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
                        <div class="col-sm-8"><input class="form-control" type="date" id="date_isi" name="date_isi" value="" /></div>
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

<?php foreach($barang as $b) : ?>
<!-- MODAL ADD -->
<div class="modal fade" id="editZahir<?= $b->id_barang?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Zahir</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('C_Admin/Data_zahir/editBarang'); ?>
                <div class="form-group" hidden>
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">id barang<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="id_isi" name="id_isi" value="<?= $b->id_barang?>" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Kode Barang<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="kode_isi" name="kode_isi" value="<?= $b->kode_barang?>" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Nama Barang <span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="barang_isi" name="barang_isi" value="<?= $b->nama_barang?>" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Qty<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="number" id="qty_isi" name="qty_isi" value="<?= $b->qty?>" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Expired Date<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="date" id="date_isi" name="date_isi" value="<?= $b->exp_date?>" /></div>
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