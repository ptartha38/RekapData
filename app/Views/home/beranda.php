<?php
if ($waktu >= 18 && $waktu <= 23) {
    $sd_select = "";
    $sgp_select = "";
    $hk_select = 'selected="selected"';
} else if ($waktu >= 15 && $waktu <= 19) {
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
        <strong class="card-title mb-3">Input Data data Hari Ini</strong>
    </div>
    <div class="card-body">
        <div class="card-body card-block">
            <form action="<?= base_url('Rekapan/rekap_data') ?>" id="form_rekap_data" name="form_rekap_data" method="POST" class="form-horizontal">
                <input type="hidden" id="id_hapus" name="id_hapus" class="form-control" value="<?php echo $id_hapus; ?>">
                <div class=" form-group">
                    <label for="petugas">PASARAN</label>
                    <select class="custom-select" id="pasaran" name="pasaran">
                        <optgroup label="PILIHAN">
                            <option <?= $sd_select; ?> value="SD">SYDNEY</option>
                            <option <?= $sgp_select; ?> value="SGP">SINGAPORE</option>
                            <option <?= $hk_select; ?> value="HK">HONGKONG</option>
                        </optgroup>
                        <optgroup label="TERPILIH SEBELUMNYA" <?= ($validation->hasError('data_angka')) ? '' : 'hidden' ?>>
                            <option <?= ($validation->hasError('data_angka')) ? 'selected' : 'hidden' ?> value="<?= old('pasaran') ?>"><?= old('pasaran') ?></option>
                        </optgroup>
                    </select>
                </div>
                <input type="text" id="tgl_pembelian" name="tgl_pembelian" placeholder="Tanggal" class="form-control" value="<?php echo $hari_ini; ?>" disabled>
                <br>
                <textarea rows="10" name="data_angka" id="data_angka" rows="3" placeholder="Data Angka" class="form-control <?= ($validation->hasError('data_angka')) ? 'is-invalid' : '' ?>"><?= old('data_angka') ?></textarea>
                <div id="validationServer03Feedback" class="invalid-feedback">
                    <p style="font-size: small; font-weight: bold"><?= $validation->getError('data_angka'); ?></p>
                </div>
                <span class="error-keyup-2"></span>
        </div>
        <div class="card-footer">
            <button id="btn_simpan" name="btn_simpan" class="btn btn-primary btn-sm" onclick="preloader()">
                <i class="fa fa-dot-circle-o"></i> Simpan
            </button>
        </div>
        </form>
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
            document.getElementById("form_rekap_data").submit();
        };

        $('#data_angka').keyup(function() {
            $('span.error-keyup-2').remove();
            var inputVal = $(this).val();
            var characterReg = /^\s*[0-9#*+\s]+\s*$/;
            if (!characterReg.test(inputVal) && inputVal != '') {
                $(this).after('<span style="color:red" class="error error-keyup-2">Format Salah</span>');
            }
        });

        $("#data_angka").keypress(function(event) {
            this.value = this.value.replace(/ /g, '');
        });

        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
            //   window.history.replaceState("http://example.ca", "Sample Title", "/example/path.html");
        }
</script>