<div class="card">
    <div class="card-header">
        <strong>DATA PERSONIL</strong>
    </div>
    <div class="card-body card-block">
        <button id="insert" style="margin-left:auto; margin-bottom:15; margin-right:auto; display:block;" onclick="tambah_data()" class="btn btn-success">TAMBAH DATA PERSONIL</button>
    </div>
    <div class="container-fluid">
        <table id='data_anggota' class="table table-bordered table" style="text-align: center;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>USERNAME</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_personil as $row) {
                ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td>
                            <div class="p-2"><a href="#" class="btn btn-primary" onclick="edit_record(<?php echo $row['id'] ?>)" title="Edit"><span style="font-size: 2em;"><i class="fa fa-edit"></i></span></a></div>
                            <div class="p-2"><a href="#" class="btn btn-danger" onclick="warning(<?php echo $row['id'] ?>)" title="Delete"><span style="font-size:2em;"><i class="fa fa-trash"></i></span></a></div>
                        </td>
                    </tr>
            </tbody>
        <?php } ?>
        </table>
        <BR>
    </div>
</div>

<!-- INSERT MODAL -->

<div class="modal hide fade" id="InsertModal" role="dialog" aria-labelledby="InsertModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajaxModalLabel">Insert Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-insert" method="post" action="<?= base_url('Personil/tambah_personil') ?>">
                    <div class="form-group">
                        <label for="nama_pelapor">NAMA</label>
                        <input type="text" class="form-control" id="nama_insert" name="nama_insert">
                    </div>
                    <div class="form-group">
                        <label for="username">USERNAME</label>
                        <input type="text" class="form-control" id="username_insert" name="username_insert">
                    </div>
                    <div class="form-group">
                        <label for="password">PASSWORD</label>
                        <input type="text" class="form-control" id="password_insert" name="password_insert">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left "></i>&nbsp;Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Save Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- UPDATE MODAL -->
<div class="modal hide fade" id="UpdateModal" role="dialog" aria-labelledby="UpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajaxModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit" method="post" action="<?= base_url('Personil/update_personil') ?>">
                    <div class="form-group">
                        <input type="hidden" name="id_update" id="id_update">
                        <label for="nama_pelapor">NAMA</label>
                        <input type="text" class="form-control" id="nama_update" name="nama_update">
                    </div>
                    <div class="form-group">
                        <label for="username">USERNAME</label>
                        <input type="text" class="form-control" id="username_update" name="username_update">
                    </div>
                    <div class="form-group">
                        <label for="password">PASSWORD</label>
                        <input type="text" class="form-control" id="password_update" name="password_update">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-circle-left "></i>&nbsp;Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Save Data</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="ModalHapusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalHapusLabel">MENGHAPUS DATA ANGGOTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-hapus" method="post" action="<?= base_url('Personil/hapus_personil') ?>">
                    <input type="hidden" name="delete_id" id="delete_id">
                    <p class="error-text"><i style="color: Tomato;" class="fa fa-warning modal-icon"></i><b> ANDA YAKIN AKAN MENGHAPUS DATA ?</b>
                        <br><i>Tindakan Ini Tidak dapat Dibatalkan.</i>
                    </p>
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
    <?php if (session()->getFlashdata('sukses')) { ?>
        Swal.fire(
            'Selamat',
            '<?php echo $session->sukses ?>',
            'success'
        )
    <?php } ?>

    function tambah_data() {
        $('#InsertModal').modal('show');
    }
    //Delete
    function warning(hasil_id) {
        $('#ModalHapus').modal('show');
        $('#delete_id').val(hasil_id);
    }
    //Tampil Edit Data
    function edit_record(hasil_id) {
        $('#UpdateModal').modal('show');
        $('#id_update').val(hasil_id);
        $.ajax({
            url: "<?php echo base_url('Personil/edit_anggota'); ?>",
            type: 'POST',
            dataType: 'JSON',
            data: $('#form-edit').serialize(),
            success: function(x) {
                if (x.sukses == true) {
                    $('#nama_update').val(x.data.nama);
                    $('#username_update').val(x.data.username);
                }
            }
        });
    }
</script>
<style>
    .modal-backdrop {
        z-index: -1;
    }
</style>