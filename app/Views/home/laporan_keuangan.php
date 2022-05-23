<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 0, '.', '.');
    return $hasil_rupiah;
}
?>
<div class="card">
    <div class="card-header">
        <strong class="card-title mb-3">Data Pendapatan Bersih, Kotor, Hadiah & Total</strong>
    </div>
    <div class="card-body">
        <form action="<?= base_url('Keuangan') ?>" id="form_filter_data" name="form_filter_data" method="POST" class="form-horizontal">
            <div class="form-group">
                <label for="petugas">FILTER TANGGAL</label>
                <input style="margin-bottom:15;" type="date" name="date_filter" value="<?= $tgl_hari_ini; ?>" id="date_filter" class="form-control" autocomplete="off" placeholder="Tanggal">
            </div>
            <div class="card-footer">
                <button id="btn_simpan" name="btn_simpan" type="submit" class="btn btn-primary btn-sm" onclick="preloader()">
                    <i class="fa fa-dot-circle-o"></i> Filter
                </button>
            </div>
        </form>
        </form>
        <br>
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th style="background-color:#906400">SYDNEY</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bruto === <?= $kotor_sydney; ?></td>
                    </tr>
                    <tr>
                        <td>Netto === <?= $bersih_sydney; ?></td>
                    </tr>
                    <tr>
                        <td>Hadiah : <?= $hadiah_sydney; ?></td>
                    </tr>
                    <tr>
                        <td>Total === <?= rupiah((int)$total_sydney) ?></td>
                    </tr>
                    <tr>
                        <td>
                            <div <?php echo ($tgl_filter && $hadiah_sydney != "") ? "" : 'hidden'; ?> class="btn btn-success">
                                <a href="http://api.whatsapp.com://send?text=
                                <?= "*LAPORAN KEUANGAN*" . "%0A" . "%0A" .
                                    "*SYDNEY* " . "%0A" . $tgl_filter . "%0A" . "%0A" .
                                    "*Bruto :* " . $kotor_sydney . "%0A" .
                                    "*Netto :* " . $bersih_sydney . "%0A" .
                                    "*Jackpot Prize :* " . $hadiah_sydney .
                                    "%0A" . "___________________________" . "%0A" . "%0A" .
                                    "*Profit :* " . rupiah((int)$total_sydney)
                                ?> " target=" _blank">
                                    <i style="color: white;" class="fab fa-whatsapp fa-1x" aria-hidden="true"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th style="background-color:#003869">SINGAPORE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bruto === <?= $kotor_singapore; ?></td>
                    </tr>
                    <tr>
                        <td>Netto === <?= $bersih_singapore; ?></td>
                    </tr>
                    <tr>
                        <td>Hadiah : <?= $hadiah_singapore; ?></td>
                    </tr>
                    <tr>
                        <td>Total === <?= rupiah((int)$total_singapore); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <div <?php echo ($tgl_filter && $hadiah_singapore != "") ? "" : 'hidden'; ?> class="btn btn-success">
                                <a href="http://api.whatsapp.com://send?text=
                                <?= "*LAPORAN KEUANGAN*" . "%0A" . "%0A" .
                                    "*SINGAPORE* " . "%0A" . $tgl_filter . "%0A" . "%0A" .
                                    "*Bruto :* " . $kotor_singapore . "%0A" .
                                    "*Netto :* " . $bersih_singapore . "%0A" .
                                    "*Jackpot Prize :* " . $hadiah_singapore .
                                    "%0A" . "______________________" . "%0A" . "%0A" .
                                    "*Profit :* " . rupiah((int)$total_singapore)
                                ?> " target=" _blank">
                                    <i style="color: white;" class="fab fa-whatsapp fa-1x" aria-hidden="true"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>HONGKONG</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bruto === <?= $kotor_hongkong; ?></td>
                    </tr>
                    <tr>
                        <td>Netto === <?= $bersih_hongkong; ?></td>
                    </tr>
                    <tr>
                        <td>Hadiah : <?= $hadiah_hongkong; ?></td>
                    </tr>
                    <tr>
                        <td>Total === <?= rupiah((int)$total_hongkong); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <div <?php echo ($tgl_filter && $hadiah_hongkong != "") ? "" : 'hidden'; ?> class="btn btn-success">
                                <a href="http://api.whatsapp.com://send?text=
                                <?= "*LAPORAN KEUANGAN*" . "%0A" . "%0A" .
                                    "*HONGKONG* " . "%0A" . $tgl_filter . "%0A" . "%0A" .
                                    "*Bruto :* " . $kotor_hongkong . "%0A" .
                                    "*Netto :* " . $bersih_hongkong . "%0A" .
                                    "*Jackpot Prize :* " . $hadiah_hongkong .
                                    "%0A" . "______________________" . "%0A" . "%0A" .
                                    "*Profit :* " . rupiah((int)$total_hongkong)
                                ?> " target=" _blank">
                                    <i style="color: white;" class="fab fa-whatsapp fa-1x" aria-hidden="true"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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
            document.getElementById("form_filter_data").submit();
        };
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
            //   window.history.replaceState("http://example.ca", "Sample Title", "/example/path.html");
        }
</script>