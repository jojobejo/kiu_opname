<!-- MODAL ADD -->
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('C_Admin/ListBarang/addBarang'); ?>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Kode Barang<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="kode_isi" name="kode_isi" value="" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Id Opname<span class="required">*</span></label>
                        <?php foreach ($idopname as $id) { ?>
                        <div class="col-sm-8"><input class="form-control" type="text" id="id_opname_isi" name="id_opname_isi" value="<?php $id ?>" /></div>
                        <?php } ?>
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
                        <label class="col-sm-3 control-label text-right" for="kd_barang">Sektor<span class="required te">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="sektor_isi" id="sektor_isi">
                                <option value="">-- LOKASI SEKTOR --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
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

<!-- MODAL EDIT -->
<?php foreach ($barang as $b) : ?>
<div class="modal fade" id="editBarang<?php echo $b->id_barang ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('C_Admin/ListBarang/editBarang'); ?>
                <div class="form-group" hidden>
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">id_barang<span class="required">*</span></label>
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
                        <label class="col-sm-3 control-label text-right" for="kd_barang">Sektor<span class="required te">*</span></label>
                        <div class="col-sm-8">
                            <select class="form-control" name="sektor_isi" id="sektor_isi">
                                <option value="<?= $b->sektor?>"><?= $b->sektor?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Panjang Dimensi<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="number" id="panjang_isi" name="panjang_isi" value="<?= $b->panjang?>" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Lebar Dimensi<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="number" id="lebar_isi" name="lebar_isi" value="<?= $b->lebar?>" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Tinggi Dimensi<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="number" id="tinggi_isi" name="tinggi_isi" value="<?= $b->tinggi?>" /></div>
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
    <div class="modal fade" id="hapus<?php echo $b->id_barang ?>">
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
                    <a class="btn btn-danger" href="<?php echo base_url("C_Admin/ListBarang/hapusBarang/$b->id_barang") ?>">Hapus</a>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach; ?>
<!-- /.modal