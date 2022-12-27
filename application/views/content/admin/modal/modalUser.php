<!-- MODAL ADD -->
<div class="modal fade" id="modalAddUser">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah User Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('C_Admin/User/AddUser'); ?>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Nama User<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="nama_isi" name="nama_isi" value="" placeholder="input Nama Pengguna" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Username<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="text" id="username_isi" name="username_isi" value="" placeholder="Input Username" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Password<span class="required">*</span></label>
                        <div class="col-sm-8"><input class="form-control" type="password" id="password_isi" name="password_isi" value="" placeholder="Input Password" /></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Role<span class="required">*</span></label>
                        <div class="col-sm-8"><select class="form-control" name="role_isi" id="role_isi" readonly>
                                <option value="user" selected>user</option>
                            </Select></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Sektor<span class="required">*</span></label>
                        <div class="col-sm-8"><select class="form-control" name="sektor_isi" id="sektor_isi" readonly>
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
                            </Select></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label text-right" for="id_bar">Team Opname<span class="required">*</span></label>
                        <div class="col-sm-8"><select class="form-control" name="team_isi" id="team_isi">
                                <option value="">PILIH TEAM OPNAME</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </Select></div>
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

<?php foreach ($user as $u) : ?>
    <!-- MODAL ADD -->
    <div class="modal fade" id="modalEditUser<?= $u->id_user ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('C_Admin/User/EditUser'); ?>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">id user<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="id_isi" name="id_isi" value="<?= $u->id_user ?>" hidden /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Nama User<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="nama_isi" name="nama_isi" value="<?= $u->nama_user ?>" placeholder="input Nama Pengguna" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Username<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="text" id="username_isi" name="username_isi" value="<?= $u->username ?>" placeholder="Input Username" /></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Password<span class="required">*</span></label>
                            <div class="col-sm-8"><input class="form-control" type="password" id="password_isi" name="password_isi" value="" placeholder="Input Password kembali" /></div>
                        </div>
                    </div>
                    <div class="form-group" hidden>
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Roles<span class="required">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="role_isi" id="role_isi" readonly>
                                    <option value="<?= $u->role ?>" selected><?= $u->role ?></option>
                                </Select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Sektor<span class="required">*</span></label>
                            <div class="col-sm-8"><select class="form-control" name="sektor_isi" id="sektor_isi">
                                    <option value="<?= $u->sektor ?>"><?= $u->sektor ?></option>
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
                                </Select></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label text-right" for="id_bar">Team Opname<span class="required">*</span></label>
                            <div class="col-sm-8"><select class="form-control" name="team_isi" id="team_isi">
                                    <option value="<?= $u->team_opname ?>"><?= $u->team_opname ?></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </Select></div>
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