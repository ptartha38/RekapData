<style>
    body {
        background-color: #f4f7f6;
        margin-top: 20px;
    }

    .card {
        background: #fff;
        transition: .5s;
        border: 0;
        margin-bottom: 30px;
        border-radius: .55rem;
        position: relative;
        width: 100%;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
    }

    .chat-app .people-list {
        width: 280px;
        position: absolute;
        left: 0;
        top: 0;
        padding: 20px;
        z-index: 7
    }

    .chat-app .chat {
        margin-left: 280px;
        border-left: 1px solid #eaeaea
    }

    .people-list {
        -moz-transition: .5s;
        -o-transition: .5s;
        -webkit-transition: .5s;
        transition: .5s
    }

    .people-list .chat-list li {
        padding: 10px 15px;
        list-style: none;
        border-radius: 3px
    }

    .people-list .chat-list li:hover {
        background: #efefef;
        cursor: pointer
    }

    .people-list .chat-list li.active {
        background: #efefef
    }

    .people-list .chat-list li .name {
        font-size: 15px
    }

    .people-list .chat-list img {
        width: 45px;
        border-radius: 50%
    }

    .people-list img {
        float: left;
        border-radius: 50%
    }

    .people-list .about {
        float: left;
        padding-left: 8px
    }

    .people-list .status {
        color: #999;
        font-size: 13px
    }

    .chat .chat-header {
        padding: 15px 20px;
        border-bottom: 2px solid #f4f7f6
    }

    .chat .chat-header img {
        float: left;
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-header .chat-about {
        float: left;
        padding-left: 10px
    }

    .chat .chat-history {
        padding: 20px;
        border-bottom: 2px solid #fff
    }

    .chat .chat-history ul {
        padding: 0
    }

    .chat .chat-history ul li {
        list-style: none;
        margin-bottom: 30px
    }

    .chat .chat-history ul li:last-child {
        margin-bottom: 0px
    }

    .chat .chat-history .message-data {
        margin-bottom: 15px
    }

    .chat .chat-history .message-data img {
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-history .message-data-time {
        color: #434651;
        padding-left: 6px
    }

    .chat .chat-history .message {
        color: #444;
        padding: 18px 20px;
        line-height: 26px;
        font-size: 16px;
        border-radius: 7px;
        display: inline-block;
        position: relative
    }

    .chat .chat-history .message:after {
        bottom: 100%;
        left: 7%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #fff;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .my-message {
        background: #efefef
    }

    .chat .chat-history .my-message:after {
        bottom: 100%;
        left: 30px;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #efefef;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .other-message {
        background: #e8f1f3;
        text-align: right
    }

    .chat .chat-history .other-message:after {
        border-bottom-color: #e8f1f3;
        left: 93%
    }

    .chat .chat-message {
        padding: 20px
    }

    .online,
    .offline,
    .me {
        margin-right: 2px;
        font-size: 8px;
        vertical-align: middle
    }

    .online {
        color: #86c541
    }

    .offline {
        color: #e47297
    }

    .me {
        color: #1d8ecd
    }

    .float-right {
        float: right
    }

    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0
    }

    @media only screen and (max-width: 767px) {
        .chat-app .people-list {
            height: 465px;
            width: 100%;
            overflow-x: auto;
            background: #fff;
            left: -400px;
            display: none
        }

        .chat-app .people-list.open {
            left: 0
        }

        .chat-app .chat {
            margin: 0
        }

        .chat-app .chat .chat-header {
            border-radius: 0.55rem 0.55rem 0 0
        }

        .chat-app .chat-history {
            height: 300px;
            overflow-x: auto
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 992px) {
        .chat-app .chat-list {
            height: 650px;
            overflow-x: auto
        }

        .chat-app .chat-history {
            height: 600px;
            overflow-x: auto
        }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
        .chat-app .chat-list {
            height: 480px;
            overflow-x: auto
        }

        .chat-app .chat-history {
            height: calc(100vh - 350px);
            overflow-x: auto
        }
    }
</style>

<div class="container-fluid">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            <div id="status_user">
                            </div>

                        </ul>
                    </div>
                    <div class="chat">
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                        <img src="<?= base_url() ?>/assets/img/gambar/gembok.png" alt="avatar">
                                    </a>
                                    <div class="chat-about">
                                        <h6 class="m-b-0">Group Chat</h6>
                                        <small>Private Group</small>
                                    </div>
                                </div>
                                <div class="col-lg-6 hidden-sm text-right">
                                    <!-- <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="chat-history">
                            <ul class="m-b-0">
                                <div id="isi-chat">

                                </div>
                            </ul>
                        </div>
                        <form id="form-pesan">
                            <div class="form-group">
                                <div class="chat-message clearfix">
                                    <div class="input-group mb-0">
                                        <textarea rows="1" require name="message" id="message" placeholder="Pesan" class="form-control"></textarea>
                                        <input type="hidden" class="form-control" id="username" name="username" value="<?= $session->username; ?>">
                                        <input type="hidden" class="form-control" id="waktu_pesan" name="waktu_pesan" value="<?= $data_waktu; ?>">
                                        <input type="hidden" class="form-control" id="hari_pesan" name="hari_pesan" value="<?= $today; ?>">
                                    </div>
                                    <button type="submit" id="send" class="btn btn-success mt-2 ">Kirim</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function() {

        setInterval(() => {
            tampilkan_pesan();
            tampilkan_user();
        }, 100);

        function tampilkan_user() {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Personil/ambil_data_user'); ?>",
                async: true,
                dataType: 'JSON',
                success: function(x) {
                    if (x.sukses == true) {
                        var html = "";
                        for (i = 0; i < x.data.length; i++) {
                            if (x.data[i].status == "online") {
                                var status = "fa fa-circle online";
                                var text_status = "Online";
                            } else {
                                var status = "fa fa-circle offline";
                                var text_status = "Offline";
                            }
                            html += "<li class='clearfix'><img src='<?= base_url() ?>/assets/img/gambar/hacker.png' alt='avatar'><div class='about'><div class='name'>" + x.data[i].nama + "</div><div class='status'> <i class='" + status + "'></i>" + text_status + "</div></div></li>";
                            $("#status_user").html(html);
                        }
                    }
                }
            });
        }

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
                            if (x.data[i].username == "<?= $session->username; ?>") {
                                var align = "message-data";
                                var text_align = "message my-message";
                            } else {
                                var align = "message-data text-right";
                                var text_align = "message other-message float-right";
                            }
                            html += "<li class='clearfix'><div class='name" + align + "'>" + x.data[i].username + "</div><div class ='" + align + "'><img src = '<?= base_url() ?>/assets/img/gambar/hacker.png'alt = 'avatar' ><span class = 'message-data-time'>" + x.data[i].waktu_pesan + ", " + x.data[i].hari_pesan + "</span> </div> <div class = '" + text_align + "'>" + x.data[i].message + "</div> </li>";
                            $("#isi-chat").html(html);
                        }
                    }
                }
            });
        }

        $("#send").on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Chat/insert_chat'); ?>",
                type: 'POST',
                dataType: 'JSON',
                data: $('#form-pesan').serialize(),
                success: function(x) {
                    if (x.sukses == true) {
                        console.log(x.pesan);
                        $("#message").val('');
                    }
                }
            });
        });

    });
</script>