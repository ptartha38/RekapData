<style>
    .modal-backdrop {
        z-index: -1;
    }
</style>
<?php
if ($waktu >= 22 && $waktu <= 11) {
    $sd_select = "";
    $sgp_select = "";
    $hk_select = 'selected="selected"';
} else if ($waktu >= 17 && $waktu <= 21) {
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
        <strong class="card-title mb-3">Rekapan Pembelian <?= $tanggal_filter; ?></strong>
        <form action="<?= base_url('Rekapan') ?>" id="form_filter_data" name="form_filter_data" method="POST" class="form-horizontal">
            <div class="form-group">
                <label for="petugas">FILTER TANGGAL</label>
                <input style="margin-bottom:15;" type="date" name="date_filter" id="date_filter" class="form-control" autocomplete="off" placeholder="Tanggal" value="<?= $hari_ini; ?>">
            </div>
            <div class="form-group">
                <label for="petugas">FILTER PASARAN</label>
                <select class="custom-select" id="filter_pasaran" name="filter_pasaran">
                    <optgroup label="PILIHAN">
                        <option <?= $sd_select; ?> value="SD">SYDNEY</option>
                        <option <?= $sgp_select; ?> value="SGP">SINGAPORE</option>
                        <option <?= $hk_select; ?> value="HK">HONGKONG</option>
                    </optgroup>
                </select>
            </div>
            <div class="card-footer">
                <button id="btn_simpan2" name="btn_simpan2" class="btn btn-primary btn-sm" onclick="preloader2()">
                    <i class="fa fa-dot-circle-o"></i> Filter Data
                </button>
            </div>
        </form>
    </div>

    <div class="card-body">
        <table id="data_nomor1" class="table table-bordered table" style="width:100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NOMOR</th>
                    <th>JUMLAH BELI (Rp.)</th>
                    <th>TGL BELI</th>
                    <th>ID PEMBELIAN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($rekap_nomor as $row) {
                    $nomor_data = $row['nomor_data'];
                    $harga_beli = $row['harga_beli'];
                ?>
                    <tr>
                        <?php echo "<td style='background-color:" . ((strlen($row['nomor_data']) <=  2) ? '' : '#808080;font-weight:bold;color:#FFFFFF') . "'>" . $no++ . "</td>";
                        ?>
                        <?php echo "<td style='background-color:" . ((strlen($row['nomor_data']) <=  2) ? '' : '#808080;font-weight:bold;color:#FFFFFF') . "'>" . $nomor_data . "</td>";
                        ?>
                        <?php echo "<td style='background-color:" . ((strlen($row['nomor_data']) <=  2) ? '' : '#808080;font-weight:bold;color:#FFFFFF') . "'>" . $harga_beli . "</td>";
                        ?>
                        <?php echo "<td style='background-color:" . ((strlen($row['nomor_data']) <=  2) ? '' : '#808080;font-weight:bold;color:#FFFFFF') . "'>" . $tanggal_filter . "</td>";
                        ?>
                        <?php echo "<td style='background-color:" . ((strlen($row['nomor_data']) <=  2) ? '' : '#808080;font-weight:bold;color:#FFFFFF') . "'>" . $pasaran . "</td>";
                        ?>
                    </tr>
                <?php } ?>
            <tfoot>
                <tr>
                    <th colspan="2">Total Pembelian</th>
                    <th><?php echo $jumlah_pembelian; ?></th>
                    <th><?php echo $tanggal_filter; ?></th>
                    <th><?php echo $pasaran; ?></th>
                </tr>
            </tfoot>
            </tbody>
        </table>
        <div class="card-body card-block">
            <button <?php if ($id_hapus === 'kosong') echo "hidden"; ?> id="insert" style="margin-left:auto; margin-bottom:15; margin-right:auto; display:inline;" onclick="warning(<?php echo $id_hapus; ?>)" class="btn btn-danger">HAPUS DATA INPUTAN TERAKHIR</button>
        </div>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="ModalHapusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalHapusLabel">MENGHAPUS DATA INPUTAN TERAKHIR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-hapus" method="post" action="<?= base_url('Rekapan/hapus_data_terakhir') ?>">
                    <p class="error-text"><i style="color: Tomato;" class="fa fa-warning modal-icon"></i><b> ANDA YAKIN AKAN MENGHAPUS DATA ?</b>
                        <br><i>Tindakan Ini Tidak dapat Dibatalkan.</i>
                    </p>
                    <input type="hidden" id="delete_id" name="delete_id" class="form-control">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left "></i>&nbsp;Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;Hapus Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var t = $('#data_nomor1').DataTable({
            "iDisplayLength": 50,
            "responsive": true,
            "order": [
                [2, 'desc']
            ],
            "columnDefs": [{
                    "targets": 0,
                    "width": "2%",
                    "className": "text-center",
                    "orderable": false,
                    "searchable": true,
                    "responsivePriority": 1,
                },
                {
                    "targets": 1,
                    "className": "text-center",
                    "orderable": false,
                    "searchable": true,
                    "responsivePriority": 2,
                },
                {
                    "targets": 2,
                    "className": "text-center",
                    "orderable": true,
                    "searchable": true,
                    render: $.fn.dataTable.render.number('.', '.'),
                    "responsivePriority": 3,
                },
                {
                    "targets": 3,
                    "className": "text-center",
                    "orderable": false,
                    "searchable": false,
                    "responsivePriority": 4,
                },
                {
                    "targets": 4,
                    "className": "text-center",
                    "orderable": false,
                    "searchable": false,
                    "responsivePriority": 5,
                },
            ],
            dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [{
                    extend: 'copy',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    download: "open",
                    title: 'Rekap Data Pembelian Tanggal <?= $tanggal_filter; ?>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    download: "open",
                    title: 'Rekap Data Pembelian Tanggal <?= $tanggal_filter; ?>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'excelHtml5',
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        // set cell style: Wrapped text
                        $('row c', sheet).attr('s', '55'),
                            $('row:first c', sheet).attr('s', '51'); // first row is center
                        // $('row:nth-child(3) c:nth-child(2)', sheet).attr('s','2');                  
                    },
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    download: "open",
                    title: 'Rekap Data Pembelian Tanggal <?= $tanggal_filter; ?>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
                {
                    extend: 'print',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    download: "open",
                    title: 'Rekap Data Pembelian Tanggal <?= $tanggal_filter; ?>',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }
            ]
        });

        t.on('order.dt search.dt', function() {
            t.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });

    <?php if (session()->getFlashdata('sukses')) { ?> Swal.fire(
            'Selamat',
            '<?php echo $session->sukses ?>',
            'success'
        ) <?php } ?>

        function preloader2() {
            $('#btn_simpan2').prop('disabled', true);
            $('#btn_simpan2').html('<i class="fa fa-spin fa-spinner"></i>');
            $('#progres2').addClass('progress-bar bg-info progress-bar-striped progress-bar-animated');
            document.getElementById("form_filter_data").submit();
        };

        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
            //   window.history.replaceState("http://example.ca", "Sample Title", "/example/path.html");
        }

        //Delete
        function warning(hasil_id) {
            $('#ModalHapus').modal('show');
            $('#delete_id').val(hasil_id);
        }
</script>