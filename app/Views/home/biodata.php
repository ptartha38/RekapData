<div class="card">
    <div class="card-header">
        <strong>ISI BIODATA ANDA DENGAN BENAR</strong>
    </div>
    <div class="card-body card-block">
        <form action="<?= base_url('Home/biodata') ?>" id="form_biodata" name="form_biodata" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Nomor Induk Kependudukan (NIK)</label>
                    <input hidden type="text" id="NIK" name="NIK" value="<?= $session->NIK; ?>">
                </div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static"><b><?= $session->NIK; ?></b></p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Nama Lengkap</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= $session->nama_lengkap; ?>" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>">
                    <small id="error_nama_lengkap" style="font-style : normal; color:red;" name="error_nama_lengkap"><?= $validation->getError('nama_lengkap'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Jenis Kelamin</label>
                </div>
                <div class="col col-md-9">
                    <div class="form-check">
                        <div class="radio">
                            <?php
                            $nilai_lama = old('jk');
                            if ($nilai_lama != null) {
                                if ($nilai_lama = "Laki-Laki") {
                                    $check_laki = "Checked";
                                    $check_perempuan = "";
                                }

                                if ($nilai_lama = "Perempuan") {
                                    $check_laki = "";
                                    $check_perempuan = "Checked";
                                }
                            } else {
                                $check_laki = "";
                                $check_perempuan = "";
                            }
                            ?>
                            <label for="radio1" class="form-check-label ">
                                <input type="radio" id="jk" name="jk" value="Laki-Laki" <?= ($check_laki != "") ? 'checked' : '' ?> class="form-check-input">Laki - Laki
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radio2" class="form-check-label ">
                                <input type="radio" id="jk" name="jk" value="Perempuan" <?= ($check_perempuan != "") ? 'checked' : '' ?> class="form-check-input">Perempuan
                            </label>
                        </div>
                    </div>
                    <small id="error_jk" style="font-style : normal; color:red;" name="error_jk"><?= $validation->getError('jk'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tempat Lahir</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" value="<?= old('tempat_lahir') ?>" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : '' ?>">
                    <small id="error_tempat_lahir" style="font-style : normal; color:red;" name="error_tempat_lahir"><?= $validation->getError('tempat_lahir'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="date" value="<?= old('tgl_lahir') ?>" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : '' ?>">
                    <small id="error_tgl_lahir" style="font-style : normal; color:red;" name="error_tgl_lahir"><?= $validation->getError('tgl_lahir'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="pekerjaan" class=" form-control-label">Pekerjaan</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="pekerjaan" id="pekerjaan" class="form-control">
                        <option value="POLRI">POLRI</option>
                        <option value="TNI">TNI</option>
                        <option value="BUMN BRI">BUMN BRI</option>
                        <option value="BUMN PLN">BUMN PLN</option>
                        <option value="BUMN BNI">BUMN BNI</option>
                        <option value="KARYAWAN SWASTA">KARYAWAN SWASTA</option>
                        <option value="WIRASWASTA">WIRASWASTA</option>
                        <optgroup label="TERPILIH SEBELUMNYA" <?= ($validation->hasError('nama_lengkap') or $validation->hasError('jk') or $validation->hasError('tempat_lahir') or $validation->hasError('tgl_lahir') or $validation->hasError('agama') or $validation->hasError('alamat') or $validation->hasError('email') or $validation->hasError('password') or $validation->hasError('foto') or $validation->hasError('foto_ktp')) ? '' : 'hidden' ?>>
                            <option <?= ($validation->hasError('nama_lengkap') or $validation->hasError('jk') or $validation->hasError('tempat_lahir') or $validation->hasError('tgl_lahir') or $validation->hasError('agama') or $validation->hasError('alamat') or $validation->hasError('email') or $validation->hasError('password') or $validation->hasError('foto') or $validation->hasError('foto_ktp')) ? 'selected' : 'hidden' ?> value="<?= old('pekerjaan') ?>"><?= old('pekerjaan') ?></option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="agama" class=" form-control-label">Agama</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="agama" id="agama" class="form-control">
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <optgroup label="TERPILIH SEBELUMNYA" <?= ($validation->hasError('nama_lengkap') or $validation->hasError('jk') or $validation->hasError('tempat_lahir') or $validation->hasError('tgl_lahir') or $validation->hasError('pekerjaan') or $validation->hasError('alamat') or $validation->hasError('email') or $validation->hasError('password') or $validation->hasError('foto') or $validation->hasError('foto_ktp')) ? '' : 'hidden' ?>>
                            <option <?= ($validation->hasError('nama_lengkap') or $validation->hasError('jk') or $validation->hasError('tempat_lahir') or $validation->hasError('tgl_lahir') or $validation->hasError('pekerjaan') or $validation->hasError('alamat') or $validation->hasError('email') or $validation->hasError('password') or $validation->hasError('foto') or $validation->hasError('foto_ktp')) ? 'selected' : 'hidden' ?> value="<?= old('agama') ?>"><?= old('agama') ?></option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="textarea-input" class=" form-control-label">Alamat</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="alamat" id="alamat" rows="3" placeholder="Alamat Lengkap" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>"><?= old('alamat') ?></textarea>
                    <small id="error_alamat" style="font-style : normal; color:red;" name="error_alamat"><?= $validation->getError('alamat'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="email" class=" form-control-label">Email</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="email" id="email" name="email" placeholder="Masukan E-Mail" value="<?= $session->email; ?>" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>">
                    <small id="error_email" style="font-style : normal; color:red;" name="error_email"><?= $validation->getError('email'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password-input" class=" form-control-label">Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" id="password" name="password" value="<?= old('password') ?>" placeholder="Password" class="form-control">
                    <small id="error_password" style="font-style : normal; color:red;" name="error_password"><?= $validation->getError('password'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password-input" class=" form-control-label">Confirm Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" id="confirm_password" value="<?= old('confirm_password') ?>" name="confirm_password" placeholder="Password" class="form-control">
                    <small id="confirm_error_password" style="font-style : normal; color:red;" name="confirm_error_password"><?= $validation->getError('confirm_password'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password-input" class=" form-control-label"></label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="checkbox" onclick="tampilkan_pass()"> Show Password
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label">Foto Profil</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="foto" name="foto" class="form-control-file">
                    <small id="error_foto" style="font-style : normal; color:red;" name="error_foto"><?= $validation->getError('foto'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label"></label>
                </div>
                <div class="col-12 col-md-9">
                    <img style="width:80px" id="preview_foto" src="<?= base_url() ?>/assets/img/foto_profil/kamera.png" />
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label">Foto KTP</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="foto_ktp" name="foto_ktp" class="form-control-file">
                    <small id="error_foto_ktp" style="font-style : normal; color:red;" name="error_foto_ktp"><?= $validation->getError('foto_ktp'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label"></label>
                </div>
                <div class="col-12 col-md-9">
                    <img style="width:120px" id="preview_foto_ktp" src="<?= base_url() ?>/assets/img/foto_ktp/ktp.png" />
                </div>
            </div>
    </div>
    <div class="card-footer">
        <button id="btn_simpan" name="btn_simpan" type="submit" class="btn btn-primary btn-sm" onclick="preloader()">
            <i class="fa fa-dot-circle-o"></i> Simpan
        </button>
    </div>
    </form>
    <div class="progress mb-3 ml-3 mr-3">
        <div id="progres" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>

<script>
    function preloader() {
        $('#btn_simpan').prop('disabled', true);
        $('#btn_simpan').html('<i class="fa fa-spin fa-spinner"></i>');
        $('#progres').addClass('progress-bar bg-info progress-bar-striped progress-bar-animated');
        document.getElementById("form_biodata").submit();
    };

    function tampil_foto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_foto').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#foto").change(function() {
        tampil_foto(this);
    });

    function foto_ktp(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_foto_ktp').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#foto_ktp").change(function() {
        foto_ktp(this);
    });

    function tampilkan_pass() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        var y = document.getElementById("confirm_password");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
</script>