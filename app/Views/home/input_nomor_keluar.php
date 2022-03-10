<?php
if ($waktu >= 1 && $waktu <= 14) {
    $sd_select = "";
    $sgp_select = "";
    $hk_select = 'selected="selected"';
} else if ($waktu >= 19 && $waktu <= 23) {
    $sd_select = "";
    $sgp_select = 'selected="selected"';
    $hk_select = "";
} else {
    $sd_select = 'selected="selected"';
    $sgp_select = "";
    $hk_select = "";
}
?>
<div class="card">
    <div class="card-header">
        <strong>ISI DATA DENGAN BENAR</strong>
    </div>
    <div class="card-body card-block">
        <form action="<?= base_url('Keuangan/insert_nomor_keluar') ?>" id="form_insert_nomor_keluar" name="form_insert_nomor_keluar" method="POST" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tanggal Keluaran</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="date" value="<?= ($validation->hasError('tgl_keluaran')) ? old('tgl_keluaran') : $tgl_hari_ini ?>" id="tgl_keluaran" name="tgl_keluaran" placeholder="Tanggal Keluaran" class="form-control <?= ($validation->hasError('tgl_keluaran')) ? 'is-invalid' : '' ?>">
                    <small id="error_tgl_keluaran" style="font-style : normal; color:red;" name="error_tgl_keluaran"><?= $validation->getError('tgl_keluaran'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="pasaran" class=" form-control-label">Pasaran</label>
                </div>

                <div class="col-12 col-md-9">
                    <select name="pasaran" id="pasaran" class="form-control">
                        <option <?= $sd_select; ?> value="SD">SYDNEY</option>
                        <option <?= $sgp_select; ?> value="SGP">SINGAPORE</option>
                        <option <?= $hk_select; ?> value="HK">HONGKONG</option>
                        <optgroup label="TERPILIH SEBELUMNYA" <?= ($validation->hasError('jumlah_modal') or $validation->hasError('tgl_keluaran') or $validation->hasError('2D') or $validation->hasError('3D') or $validation->hasError('4D')) ? '' : 'hidden' ?>>
                            <option <?= ($validation->hasError('jumlah_modal') or $validation->hasError('tgl_keluaran') or $validation->hasError('2D') or $validation->hasError('3D') or $validation->hasError('4D')) ? 'selected' : 'hidden' ?> value="<?= old('pasaran') ?>"><?= old('pasaran') ?></option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">4D</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" value="<?= ($validation->hasError('jumlah_modal') or $validation->hasError('tgl_keluaran') or $validation->hasError('2D') or $validation->hasError('3D')) ? old('4D') : '' ?>" id="4D" name="4D" minlength="4" maxlength="4" placeholder="4D" class="form-control <?= ($validation->hasError('4D')) ? 'is-invalid' : '' ?>">
                    <small id="error_4D" style="font-style : normal; color:red;" name="error_4D"><?= $validation->getError('4D'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">3D</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" value="<?= ($validation->hasError('jumlah_modal') or $validation->hasError('tgl_keluaran') or $validation->hasError('2D') or $validation->hasError('4D')) ? old('3D') : '' ?>" id="3D" name="3D" minlength="3" maxlength="3" placeholder="3D" class="form-control <?= ($validation->hasError('3D')) ? 'is-invalid' : '' ?>">
                    <small id="error_3D" style="font-style : normal; color:red;" name="error_3D"><?= $validation->getError('3D'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">2D</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" value="<?= ($validation->hasError('jumlah_modal') or $validation->hasError('tgl_keluaran') or $validation->hasError('4D') or $validation->hasError('3D')) ? old('2D') : '' ?>" id="2D" name="2D" minlength="2" maxlength="2" placeholder="2D" class="form-control <?= ($validation->hasError('2D')) ? 'is-invalid' : '' ?>">
                    <small id="error_2D" style="font-style : normal; color:red;" name="error_2D"><?= $validation->getError('2D'); ?></small>
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
    <?php if (session()->getFlashdata('sukses')) { ?> Swal.fire(
            'Selamat',
            '<?php echo $session->sukses ?>',
            'success'
        ) <?php } ?>

        function preloader() {
            $('#btn_simpan').prop('disabled', true);
            $('#btn_simpan').html('<i class="fa fa-spin fa-spinner"></i>');
            $('#progres').addClass('progress-bar bg-info progress-bar-striped progress-bar-animated');
            document.getElementById("form_insert_nomor_keluar").submit();
        };

        function setInputFilter(textbox, inputFilter) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                textbox.addEventListener(event, function() {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            });
        }
        setInputFilter(document.getElementById("2D"), function(value) {
            return /^\d+$/.test(value); // Allow digits 
        });
        setInputFilter(document.getElementById("3D"), function(value) {
            return /^\d+$/.test(value); // Allow digits 
        });
        setInputFilter(document.getElementById("4D"), function(value) {
            return /^\d+$/.test(value); // Allow digits 
        });
</script>