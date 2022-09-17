<style>
    /* Chat containers */
    .container {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
    }

    /* Darker chat container */
    .darker {
        border-color: #ccc;
        background-color: #ddd;
    }

    /* Clear floats */
    .container::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Style images */
    .container img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }

    /* Style the right image */
    .container img.right {
        float: right;
        margin-left: 20px;
        margin-right: 0;
    }

    /* Style time text */
    .time-right {
        float: right;
        color: #aaa;
    }

    /* Style time text */
    .time-left {
        float: left;
        color: #999;
    }
</style>

<div id="tampilpesan"></div>

<div class="container">
    <form id="form-pesan">
        <div class="form-group">
            <input type="hidden" class="form-control" id="username" name="username" value="<?= $session->nama; ?>">
        </div>
        <div class="form-group">
            <textarea rows="10" name="message" id="message" placeholder="Pesan" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" id="send" class="btn btn-success">Kirim</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {

        setInterval(() => {
            tampilkan_pesan();
        }, 100);

        function tampilkan_pesan() {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Chat/isi_pesan'); ?>",
                async: true,
                dataType: 'JSON',
                success: function(x) {
                    if (x.sukses == true) {
                        var html = "";
                        for (i = 0; i < x.data.length; i++) {
                            if (x.data.username != "<?= $session->username ?>") {
                                html += "<div class='container'>" + x.data[i].username + "<p>" + x.data[i].message + "</p> <span class = 'time-left'> 11 : 00 </span></div>";
                            } else {
                                html += "<div class='container darker'>" + "<img src='/w3images/avatar_g2.jpg' alt='Avatar' class='right'>" + x.data[i].username + "<p>" + x.data[i].message + "</p> <span class = 'time-left'> 11 : 00 </span></div>";
                            }
                        }
                        $("#tampilpesan").html(html);
                    }

                }
            });
        }

        $("#send").on('click', function(e) {
            e.preventDefault();
            var msg = $("#msg").val();
            $.ajax({
                url: "<?php echo base_url('Chat/insert_chat'); ?>",
                type: 'POST',
                dataType: 'JSON',
                data: $('#form-pesan').serialize(),
                success: function(x) {
                    if (x.sukses == true) {
                        console.log("Data Tersimpan");
                        $("#message").val('');
                    }
                }
            });
        });
    });
</script>