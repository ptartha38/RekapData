<?php

$koneksi = mysqli_connect("localhost", "u169438557_mesin_cuan", "@Cuanmaksimal7", "u169438557_mesin_cuan");

// Check connection
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

// update data ke database
mysqli_query($koneksi, "UPDATE personil SET status = 'offline'");
