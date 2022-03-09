<?php

namespace App\validation;

class CekNomor
{
    public function CekDigit($data_nomor)
    {
        // Cek Digit

        if (strpos($data_nomor, '+')) {
            $cek_digit_angka = $this->cek_ada_tambah($data_nomor);
            $cek_digit_4_angka = $this->cek_ada_tambah_4_angka($data_nomor);
        } else {
            $cek_digit_angka = $this->cek_tidak_ada_tambah($data_nomor);
            $cek_digit_4_angka = $this->cek_tidak_ada_tambah_4_angka($data_nomor);
        }

        // Cek Huruf
        if (preg_match('/[a-z.,\/|{}`~><;:?^%$@!]+/', $data_nomor, $cek_huruf)) {
            $hasil_cek_huruf = "ada huruf";
        } else {
            $hasil_cek_huruf = "tidak ada huruf";
        };

        // Cek Pagar
        if (preg_match('/[#]+/', $data_nomor, $cek_pembelian)) {
            $hasil_cek_pagar = "ada pagar";
        } else {
            $hasil_cek_pagar = "tidak ada pagar";
        };

        // Cek Pembelian
        $nominal_pembelian = substr($data_nomor, strrpos($data_nomor, '#') + 1);
        if (is_numeric($nominal_pembelian) === true) {
            $hasil_cek_pembelian = "ada pembelian";
        } else {
            $hasil_cek_pembelian = "tidak ada pembelian";
        };

        // Hasil
        if ($cek_digit_angka === false && $cek_digit_4_angka === false && $hasil_cek_huruf === "tidak ada huruf" && $hasil_cek_pagar === "ada pagar" && $hasil_cek_pembelian === "ada pembelian") {
            return true;
        }
        return false;
    }

    /* SECTION 2 ANGKA DENGAN ATAU TANPA + -----------------------------------------------------------------------------------------------------------*/

    function cek_tidak_ada_tambah($data_nomor)
    {
        $pagar_pembelian = substr($data_nomor, strrpos($data_nomor, '#'));
        $pecah = explode('*', $data_nomor);
        $hanya_nomor = str_replace($pagar_pembelian, "", $pecah);

        /* Jika Kurang dari 2 Angka Tidak ada + */
        $cek_digit =  array_map(array($this, 'cek_digit'), $hanya_nomor);
        $string_digit = implode('+', $cek_digit);
        $hasil_cek_digit = strpos($string_digit, 'salah');

        return $hasil_cek_digit;
    }


    function cek_ada_tambah($data_nomor)
    {
        $pecah = explode('+', $data_nomor);

        /* Jika Kurang dari 2 Angka ada + */
        $cek_angka =  array_map(array($this, 'hilangkan_pembelian'), $pecah);
        $cek_digit =  array_map(array($this, 'pecahkan_pembelian'), $cek_angka);
        $string_digit = implode('+', $cek_digit);
        $hasil_cek_digit = strpos($string_digit, 'salah');
        return $hasil_cek_digit;
    }

    function cek_digit($nomor)
    {
        $cek_digit = strlen($nomor);
        if ($cek_digit <= 1) {
            $hasil = "salah";
        } else {
            $hasil = "$nomor";
        }
        return $hasil;
    }

    /* ------------------------------------------------------------------------------------------------------------------------------------------ */

    /* SECTION 4 ANGKA DENGAN ATAU TANPA + ------------------------------------------------------------------------------------------------------- */

    function cek_tidak_ada_tambah_4_angka($data_nomor)
    {
        $pagar_pembelian = substr($data_nomor, strrpos($data_nomor, '#'));
        $pecah = explode('*', $data_nomor);
        $hanya_nomor = str_replace($pagar_pembelian, "", $pecah);

        $cek_digit_4_angka =  array_map(array($this, 'lebih_4_angka'), $hanya_nomor);
        $string_digit_4_angka = implode('+', $cek_digit_4_angka);
        $hasil_cek_digit_4_angka = strpos($string_digit_4_angka, 'salah');

        return $hasil_cek_digit_4_angka;
    }

    function cek_ada_tambah_4_angka($data_nomor)
    {
        $pecah = explode('+', $data_nomor);

        /* Jika Kurang dari 2 Angka ada pada setiap pembelian + */
        $cek_angka =  array_map(array($this, 'hilangkan_pembelian'), $pecah);
        $cek_digit =  array_map(array($this, 'pecahkan_pembelian_4_angka'), $cek_angka);
        $string_digit = implode('+', $cek_digit);
        $hasil_cek_digit = strpos($string_digit, 'salah');
        return $hasil_cek_digit;
    }

    function lebih_4_angka($nomor)
    {
        $cek_digit = strlen($nomor);
        if ($cek_digit >= 5) {
            $hasil = "salah";
        } else {
            $hasil = $nomor;
        }
        return $hasil;
    }

    /* ---------------------------------------------------------------------------------------------------------------------------------------------------  */

    function pecahkan_pembelian_4_angka($data_nomor)
    {
        $pecah_beli = explode('*', $data_nomor);
        $pengecekan =  array_map(array($this, 'lebih_4_angka'), $pecah_beli);
        $string_digit = implode('+', $pengecekan);
        return $string_digit;
    }

    function pecahkan_pembelian($data_nomor)
    {
        $pecah_beli = explode('*', $data_nomor);
        $pengecekan =  array_map(array($this, 'cek_digit'), $pecah_beli);
        $string_digit = implode('+', $pengecekan);
        return $string_digit;
    }

    function hilangkan_pembelian($data_nomor)
    {
        $pagar_pembelian = substr($data_nomor, strrpos($data_nomor, '#'));
        $hanya_nomor = str_replace($pagar_pembelian, "", $data_nomor);
        return $hanya_nomor;
    }
}
