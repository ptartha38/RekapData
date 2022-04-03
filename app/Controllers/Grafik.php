<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

use Config\Services;
use CodeIgniter\Controller;
use App\Models\dataModel;
use App\Models\keuanganModel;

class Grafik extends BaseController
{
    public function index()
    {
        $session = session();
        $request = Services::request();
        $keuanganModel = new keuanganModel($request);
        $waktu_sekarang = new Time('now');
        $bulan_sekarang = $waktu_sekarang->getMonth();
        $tahun_sekarang = $waktu_sekarang->getYear();
        /*------------------------------------------------------------------------------ PERHITUNGAN BERDASARKAN BULAN ----------------------------------------------------------------------------------------------- */
        // SYDNEY
        $januari_SD = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 1, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 1, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->selectSum("total")->get()->getResult();
        $februari_SD = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 2, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 2, 29)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->selectSum("total")->get()->getResult();
        $maret_SD = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 3, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 3, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->selectSum("total")->get()->getResult();
        $april_SD = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 4, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 4, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->selectSum("total")->get()->getResult();
        $mei_SD = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 5, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 5, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->selectSum("total")->get()->getResult();
        $juni_SD = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 6, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 6, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->selectSum("total")->get()->getResult();
        $juli_SD = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 7, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 7, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->selectSum("total")->get()->getResult();
        $agustus_SD = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 8, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 8, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->selectSum("total")->get()->getResult();
        $september_SD = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 9, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 9, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->selectSum("total")->get()->getResult();
        $oktober_SD = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 10, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 10, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->selectSum("total")->get()->getResult();
        $november_SD = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 11, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 11, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->selectSum("total")->get()->getResult();
        $desember_SD = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 12, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 12, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->selectSum("total")->get()->getResult();
        // Januari
        if ($januari_SD != null) {
            foreach ($januari_SD as $row) {
                $bulan_januari_SD = $row->total;
            }
        } else {
            $bulan_januari_SD = 0;
        }
        // Februari
        if ($februari_SD != null) {
            foreach ($februari_SD as $row) {
                $bulan_februari_SD = $row->total;
            }
        } else {
            $bulan_februari_SD = 0;
        }
        // Maret
        if ($maret_SD != null) {
            foreach ($maret_SD as $row) {
                $bulan_maret_SD = $row->total;
            }
        } else {
            $bulan_maret_SD = 0;
        }
        // April
        if ($april_SD != null) {
            foreach ($april_SD as $row) {
                $bulan_april_SD = $row->total;
            }
        } else {
            $bulan_april_SD = 0;
        }
        // Mei
        if ($mei_SD != null) {
            foreach ($mei_SD as $row) {
                $bulan_mei_SD = $row->total;
            }
        } else {
            $bulan_mei_SD = 0;
        }
        // Juni
        if ($juni_SD != null) {
            foreach ($juni_SD as $row) {
                $bulan_juni_SD = $row->total;
            }
        } else {
            $bulan_juni_SD = 0;
        }
        // Juli
        if ($juli_SD != null) {
            foreach ($juli_SD as $row) {
                $bulan_juli_SD = $row->total;
            }
        } else {
            $bulan_juli_SD = 0;
        }
        // Agustus
        if ($agustus_SD != null) {
            foreach ($agustus_SD as $row) {
                $bulan_agustus_SD = $row->total;
            }
        } else {
            $bulan_agustus_SD = 0;
        }
        // September
        if ($september_SD != null) {
            foreach ($september_SD as $row) {
                $bulan_september_SD = $row->total;
            }
        } else {
            $bulan_september_SD = 0;
        }
        // Oktober
        if ($oktober_SD != null) {
            foreach ($oktober_SD as $row) {
                $bulan_oktober_SD = $row->total;
            }
        } else {
            $bulan_oktober_SD = 0;
        }
        // November
        if ($november_SD != null) {
            foreach ($november_SD as $row) {
                $bulan_november_SD = $row->total;
            }
        } else {
            $bulan_november_SD = 0;
        }
        // Desember
        if ($desember_SD != null) {
            foreach ($desember_SD as $row) {
                $bulan_desember_SD = $row->total;
            }
        } else {
            $bulan_desember_SD = 0;
        }
        // SINGAPORE
        $januari_SGP = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 1, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 1, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->selectSum("total")->get()->getResult();
        $februari_SGP = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 2, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 2, 29)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->selectSum("total")->get()->getResult();
        $maret_SGP = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 3, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 3, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->selectSum("total")->get()->getResult();
        $april_SGP = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 4, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 4, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->selectSum("total")->get()->getResult();
        $mei_SGP = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 5, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 5, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->selectSum("total")->get()->getResult();
        $juni_SGP = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 6, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 6, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->selectSum("total")->get()->getResult();
        $juli_SGP = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 7, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 7, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->selectSum("total")->get()->getResult();
        $agustus_SGP = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 8, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 8, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->selectSum("total")->get()->getResult();
        $september_SGP = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 9, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 9, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->selectSum("total")->get()->getResult();
        $oktober_SGP = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 10, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 10, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->selectSum("total")->get()->getResult();
        $november_SGP = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 11, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 11, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->selectSum("total")->get()->getResult();
        $desember_SGP = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 12, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 12, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->selectSum("total")->get()->getResult();
        // Januari
        if ($januari_SGP != null) {
            foreach ($januari_SGP as $row) {
                $bulan_januari_SGP = $row->total;
            }
        } else {
            $bulan_januari_SGP = 0;
        }
        // Februari
        if ($februari_SGP != null) {
            foreach ($februari_SGP as $row) {
                $bulan_februari_SGP = $row->total;
            }
        } else {
            $bulan_februari_SGP = 0;
        }
        // Maret
        if ($maret_SGP != null) {
            foreach ($maret_SGP as $row) {
                $bulan_maret_SGP = $row->total;
            }
        } else {
            $bulan_maret_SGP = 0;
        }
        // April
        if ($april_SGP != null) {
            foreach ($april_SGP as $row) {
                $bulan_april_SGP = $row->total;
            }
        } else {
            $bulan_april_SGP = 0;
        }
        // Mei
        if ($mei_SGP != null) {
            foreach ($mei_SGP as $row) {
                $bulan_mei_SGP = $row->total;
            }
        } else {
            $bulan_mei_SGP = 0;
        }
        // Juni
        if ($juni_SGP != null) {
            foreach ($juni_SGP as $row) {
                $bulan_juni_SGP = $row->total;
            }
        } else {
            $bulan_juni_SGP = 0;
        }
        // Juli
        if ($juli_SGP != null) {
            foreach ($juli_SGP as $row) {
                $bulan_juli_SGP = $row->total;
            }
        } else {
            $bulan_juli_SGP = 0;
        }
        // Agustus
        if ($agustus_SGP != null) {
            foreach ($agustus_SGP as $row) {
                $bulan_agustus_SGP = $row->total;
            }
        } else {
            $bulan_agustus_SGP = 0;
        }
        // September
        if ($september_SGP != null) {
            foreach ($september_SGP as $row) {
                $bulan_september_SGP = $row->total;
            }
        } else {
            $bulan_september_SGP = 0;
        }
        // Oktober
        if ($oktober_SGP != null) {
            foreach ($oktober_SGP as $row) {
                $bulan_oktober_SGP = $row->total;
            }
        } else {
            $bulan_oktober_SGP = 0;
        }
        // November
        if ($november_SGP != null) {
            foreach ($november_SGP as $row) {
                $bulan_november_SGP = $row->total;
            }
        } else {
            $bulan_november_SGP = 0;
        }
        // Desember
        if ($desember_SGP != null) {
            foreach ($desember_SGP as $row) {
                $bulan_desember_SGP = $row->total;
            }
        } else {
            $bulan_desember_SGP = 0;
        }
        // HONGKONG
        $januari_HK = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 1, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 1, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->selectSum("total")->get()->getResult();
        $februari_HK = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 2, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 2, 29)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->selectSum("total")->get()->getResult();
        $maret_HK = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 3, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 3, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->selectSum("total")->get()->getResult();
        $april_HK = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 4, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 4, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->selectSum("total")->get()->getResult();
        $mei_HK = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 5, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 5, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->selectSum("total")->get()->getResult();
        $juni_HK = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 6, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 6, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->selectSum("total")->get()->getResult();
        $juli_HK = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 7, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 7, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->selectSum("total")->get()->getResult();
        $agustus_HK = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 8, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 8, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->selectSum("total")->get()->getResult();
        $september_HK = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 9, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 9, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->selectSum("total")->get()->getResult();
        $oktober_HK = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 10, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 10, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->selectSum("total")->get()->getResult();
        $november_HK = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 11, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 11, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->selectSum("total")->get()->getResult();
        $desember_HK = $keuanganModel->where('tanggal >=', Time::createFromDate($tahun_sekarang, 12, 1)->toLocalizedString('yyyy-MM-dd'))->where('tanggal <=', Time::createFromDate($tahun_sekarang, 12, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->selectSum("total")->get()->getResult();
        // Januari
        if ($januari_HK != null) {
            foreach ($januari_HK as $row) {
                $bulan_januari_HK = $row->total;
            }
        } else {
            $bulan_januari_HK = 0;
        }
        // Februari
        if ($februari_HK != null) {
            foreach ($februari_HK as $row) {
                $bulan_februari_HK = $row->total;
            }
        } else {
            $bulan_februari_HK = 0;
        }
        // Maret
        if ($maret_HK != null) {
            foreach ($maret_HK as $row) {
                $bulan_maret_HK = $row->total;
            }
        } else {
            $bulan_maret_HK = 0;
        }
        // April
        if ($april_HK != null) {
            foreach ($april_HK as $row) {
                $bulan_april_HK = $row->total;
            }
        } else {
            $bulan_april_HK = 0;
        }
        // Mei
        if ($mei_HK != null) {
            foreach ($mei_HK as $row) {
                $bulan_mei_HK = $row->total;
            }
        } else {
            $bulan_mei_HK = 0;
        }
        // Juni
        if ($juni_HK != null) {
            foreach ($juni_HK as $row) {
                $bulan_juni_HK = $row->total;
            }
        } else {
            $bulan_juni_HK = 0;
        }
        // Juli
        if ($juli_HK != null) {
            foreach ($juli_HK as $row) {
                $bulan_juli_HK = $row->total;
            }
        } else {
            $bulan_juli_HK = 0;
        }
        // Agustus
        if ($agustus_HK != null) {
            foreach ($agustus_HK as $row) {
                $bulan_agustus_HK = $row->total;
            }
        } else {
            $bulan_agustus_HK = 0;
        }
        // September
        if ($september_HK != null) {
            foreach ($september_HK as $row) {
                $bulan_september_HK = $row->total;
            }
        } else {
            $bulan_september_HK = 0;
        }
        // Oktober
        if ($oktober_HK != null) {
            foreach ($oktober_HK as $row) {
                $bulan_oktober_HK = $row->total;
            }
        } else {
            $bulan_oktober_HK = 0;
        }
        // November
        if ($november_HK != null) {
            foreach ($november_HK as $row) {
                $bulan_november_HK = $row->total;
            }
        } else {
            $bulan_november_HK = 0;
        }
        // Desember
        if ($desember_HK != null) {
            foreach ($desember_HK as $row) {
                $bulan_desember_HK = $row->total;
            }
        } else {
            $bulan_desember_HK = 0;
        }
        /*------------------------------------------------------------------------------ PERHITUNGAN TOTAL BULANAN ----------------------------------------------------------------------------------------------- */
        $total_januari = $bulan_januari_SD + $bulan_januari_SGP + $bulan_januari_HK;
        $total_februari = $bulan_februari_SD + $bulan_februari_SGP + $bulan_februari_HK;
        $total_maret = $bulan_maret_SD + $bulan_maret_SGP + $bulan_maret_HK;
        $total_april = $bulan_april_SD + $bulan_april_SGP + $bulan_april_HK;
        $total_mei = $bulan_mei_SD + $bulan_mei_SGP + $bulan_mei_HK;
        $total_juni = $bulan_juni_SD + $bulan_juni_SGP + $bulan_juni_HK;
        $total_juli = $bulan_juli_SD + $bulan_juli_SGP + $bulan_juli_HK;
        $total_agustus = $bulan_agustus_SD + $bulan_agustus_SGP + $bulan_agustus_HK;
        $total_september = $bulan_september_SD + $bulan_september_SGP + $bulan_september_HK;
        $total_oktober = $bulan_oktober_SD + $bulan_oktober_SGP + $bulan_oktober_HK;
        $total_november = $bulan_november_SD + $bulan_november_SGP + $bulan_november_HK;
        $total_desember = $bulan_desember_SD + $bulan_desember_SGP + $bulan_desember_HK;

        /*------------------------------------------------------------------------------ PERHITUNGAN BERDASARKAN MINGGU ----------------------------------------------------------------------------------------------- */
        /* Minggu Pertama ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ */
        // SYDNEY
        $satu_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 1)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $dua_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 2)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $tiga_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 3)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $empat_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 4)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $lima_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 5)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $enam_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 6)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $tujuh_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 7)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        // SINGAPORE
        $satu_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 1)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $dua_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 2)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $tiga_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 3)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $empat_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 4)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $lima_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 5)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $enam_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 6)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $tujuh_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 7)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        // HONGKONG
        $satu_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 1)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $dua_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 2)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $tiga_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 3)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $empat_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 4)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $lima_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 5)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $enam_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 6)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $tujuh_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 7)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();

        /* Minggu Kedua ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ */
        // SYDNEY
        $delapan_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 8)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $sembilan_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 9)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $sepuluh_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 10)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $sebelas_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 11)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $dua_belas_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 12)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $tiga_belas_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 13)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $empat_belas_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 14)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        // SINGAPORE
        $delapan_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 8)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $sembilan_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 9)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $sepuluh_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 10)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $sebelas_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 11)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $dua_belas_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 12)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $tiga_belas_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 13)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $empat_belas_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 14)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        // HONGKONG
        $delapan_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 8)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $sembilan_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 9)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $sepuluh_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 10)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $sebelas_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 11)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $dua_belas_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 12)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $tiga_belas_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 13)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $empat_belas_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 14)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();

        /* Minggu Ketiga ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ */
        // SYDNEY
        $lima_belas_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 15)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $enam_belas_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 16)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $tujuh_belas_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 17)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $delapan_belas_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 18)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $sembilan_belas_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 19)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $dua_puluh_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 20)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $dua_puluh_satu_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 21)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        // SINGAPORE
        $lima_belas_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 15)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $enam_belas_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 16)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $tujuh_belas_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 17)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $delapan_belas_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 18)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $sembilan_belas_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 19)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $dua_puluh_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 20)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $dua_puluh_satu_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 21)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        // HONGKONG
        $lima_belas_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 15)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $enam_belas_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 16)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $tujuh_belas_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 17)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $delapan_belas_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 18)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $sembilan_belas_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 19)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $dua_puluh_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 20)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $dua_puluh_satu_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 21)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();

        /* Minggu Keempat ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ */
        // SYDNEY
        $dua_puluh_dua_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 22)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $dua_puluh_tiga_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 23)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $dua_puluh_empat_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 24)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $dua_puluh_lima_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 25)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $dua_puluh_enam_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 26)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $dua_puluh_tujuh_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 27)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $dua_puluh_delapan_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 28)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $dua_puluh_sembilan_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 29)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $tiga_puluh_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 30)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        $tiga_puluh_satu_SD = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SD')->get()->getResult();
        // SINGAPORE
        $dua_puluh_dua_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 22)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $dua_puluh_tiga_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 23)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $dua_puluh_empat_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 24)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $dua_puluh_lima_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 25)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $dua_puluh_enam_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 26)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $dua_puluh_tujuh_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 27)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $dua_puluh_delapan_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 28)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $dua_puluh_sembilan_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 29)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $tiga_puluh_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 30)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        $tiga_puluh_satu_SGP = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'SGP')->get()->getResult();
        // HONGKONG
        $dua_puluh_dua_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 22)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $dua_puluh_tiga_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 23)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $dua_puluh_empat_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 24)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $dua_puluh_lima_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 25)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $dua_puluh_enam_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 26)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $dua_puluh_tujuh_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 27)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $dua_puluh_delapan_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 28)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $dua_puluh_sembilan_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 29)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $tiga_puluh_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 30)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();
        $tiga_puluh_satu_HK = $keuanganModel->where('tanggal', Time::createFromDate($tahun_sekarang, $bulan_sekarang, 31)->toLocalizedString('yyyy-MM-dd'))->where('pasaran =', 'HK')->get()->getResult();

        /* SYDNEY -------------------------------------------------------------------------------------------------------------------------------------------------------- */
        // Sydney Minggu Pertama 

        // Tanggal 1
        if ($satu_SD != null) {
            foreach ($satu_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_satu_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_satu_SD = 0;
        }
        // Tanggal 2
        if ($dua_SD != null) {
            foreach ($dua_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_SD = 0;
        }
        // Tanggal 3
        if ($tiga_SD != null) {
            foreach ($tiga_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_tiga_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tiga_SD = 0;
        }
        // Tanggal 4
        if ($empat_SD != null) {
            foreach ($empat_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_empat_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_empat_SD = 0;
        }
        // Tanggal 5
        if ($lima_SD != null) {
            foreach ($lima_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_lima_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_lima_SD = 0;
        }
        // Tanggal 6
        if ($enam_SD != null) {
            foreach ($enam_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_enam_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_enam_SD = 0;
        }
        // Tanggal 7
        if ($tujuh_SD != null) {
            foreach ($tujuh_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_tujuh_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tujuh_SD = 0;
        }

        // Sydney Minggu Dua 
        // Tanggal 8
        if ($delapan_SD != null) {
            foreach ($delapan_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_delapan_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_delapan_SD = 0;
        }
        // Tanggal 9
        if ($sembilan_SD != null) {
            foreach ($sembilan_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_sembilan_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_sembilan_SD = 0;
        }
        // Tanggal 10
        if ($sepuluh_SD != null) {
            foreach ($sepuluh_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_sepuluh_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_sepuluh_SD = 0;
        }
        // Tanggal 11
        if ($sebelas_SD != null) {
            foreach ($sebelas_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_sebelas_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_sebelas_SD = 0;
        }
        // Tanggal 12
        if ($dua_belas_SD != null) {
            foreach ($dua_belas_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_belas_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_belas_SD = 0;
        }
        // Tanggal 13
        if ($tiga_belas_SD != null) {
            foreach ($tiga_belas_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_tiga_belas_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tiga_belas_SD = 0;
        }
        // Tanggal 14
        if ($empat_belas_SD != null) {
            foreach ($empat_belas_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_empat_belas_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_empat_belas_SD = 0;
        }

        // Sydney Minggu Tiga
        // Tanggal 15
        if ($lima_belas_SD != null) {
            foreach ($lima_belas_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_lima_belas_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_lima_belas_SD = 0;
        }
        // Tanggal 16
        if ($enam_belas_SD != null) {
            foreach ($enam_belas_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_enam_belas_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_enam_belas_SD = 0;
        }
        // Tanggal 17
        if ($tujuh_belas_SD != null) {
            foreach ($tujuh_belas_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_tujuh_belas_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tujuh_belas_SD = 0;
        }
        // Tanggal 18
        if ($delapan_belas_SD != null) {
            foreach ($delapan_belas_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_delapan_belas_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_delapan_belas_SD = 0;
        }
        // Tanggal 19
        if ($sembilan_belas_SD != null) {
            foreach ($sembilan_belas_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_sembilan_belas_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_sembilan_belas_SD = 0;
        }
        // Tanggal 20
        if ($dua_puluh_SD != null) {
            foreach ($dua_puluh_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_SD = 0;
        }
        // Tanggal 21
        if ($dua_puluh_satu_SD != null) {
            foreach ($dua_puluh_satu_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_satu_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_satu_SD = 0;
        }

        // Sydney Minggu Empat
        // Tanggal 22
        if ($dua_puluh_dua_SD != null) {
            foreach ($dua_puluh_dua_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_dua_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_dua_SD = 0;
        }
        // Tanggal 23
        if ($dua_puluh_tiga_SD != null) {
            foreach ($dua_puluh_tiga_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_tiga_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_tiga_SD = 0;
        }
        // Tanggal 24
        if ($dua_puluh_empat_SD != null) {
            foreach ($dua_puluh_empat_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_empat_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_empat_SD = 0;
        }
        // Tanggal 25
        if ($dua_puluh_lima_SD != null) {
            foreach ($dua_puluh_lima_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_lima_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_lima_SD = 0;
        }
        // Tanggal 26
        if ($dua_puluh_enam_SD != null) {
            foreach ($dua_puluh_enam_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_enam_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_enam_SD = 0;
        }
        // Tanggal 27
        if ($dua_puluh_tujuh_SD != null) {
            foreach ($dua_puluh_tujuh_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_tujuh_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_tujuh_SD = 0;
        }
        // Tanggal 28
        if ($dua_puluh_delapan_SD != null) {
            foreach ($dua_puluh_delapan_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_delapan_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_delapan_SD = 0;
        }
        // Tanggal 29
        if ($dua_puluh_sembilan_SD != null) {
            foreach ($dua_puluh_sembilan_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_sembilan_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_sembilan_SD = 0;
        }
        // Tanggal 30
        if ($tiga_puluh_SD != null) {
            foreach ($tiga_puluh_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_tiga_puluh_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tiga_puluh_SD = 0;
        }
        // Tanggal 31
        if ($tiga_puluh_satu_SD != null) {
            foreach ($tiga_puluh_satu_SD as $row) {
                $total = explode('.', $row->total);
                $tanggal_tiga_puluh_satu_SD = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tiga_puluh_satu_SD = 0;
        }

        /* SINGAPORE -------------------------------------------------------------------------------------------------------------------------------------------------------- */

        // Singapore Minggu Pertama 
        // Tanggal 1
        if ($satu_SGP != null) {
            foreach ($satu_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_satu_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_satu_SGP = 0;
        }
        // Tanggal 2
        if ($dua_SGP != null) {
            foreach ($dua_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_SGP = 0;
        }
        // Tanggal 3
        if ($tiga_SGP != null) {
            foreach ($tiga_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_tiga_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tiga_SGP = 0;
        }
        // Tanggal 4
        if ($empat_SGP != null) {
            foreach ($empat_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_empat_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_empat_SGP = 0;
        }
        // Tanggal 5
        if ($lima_SGP != null) {
            foreach ($lima_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_lima_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_lima_SGP = 0;
        }
        // Tanggal 6
        if ($enam_SGP != null) {
            foreach ($enam_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_enam_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_enam_SGP = 0;
        }
        // Tanggal 7
        if ($tujuh_SGP != null) {
            foreach ($tujuh_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_tujuh_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tujuh_SGP = 0;
        }

        // Singapore Minggu Dua 
        // Tanggal 8
        if ($delapan_SGP != null) {
            foreach ($delapan_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_delapan_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_delapan_SGP = 0;
        }
        // Tanggal 9
        if ($sembilan_SGP != null) {
            foreach ($sembilan_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_sembilan_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_sembilan_SGP = 0;
        }
        // Tanggal 10
        if ($sepuluh_SGP != null) {
            foreach ($sepuluh_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_sepuluh_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_sepuluh_SGP = 0;
        }
        // Tanggal 11
        if ($sebelas_SGP != null) {
            foreach ($sebelas_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_sebelas_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_sebelas_SGP = 0;
        }
        // Tanggal 12
        if ($dua_belas_SGP != null) {
            foreach ($dua_belas_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_belas_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_belas_SGP = 0;
        }
        // Tanggal 13
        if ($tiga_belas_SGP != null) {
            foreach ($tiga_belas_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_tiga_belas_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tiga_belas_SGP = 0;
        }
        // Tanggal 14
        if ($empat_belas_SGP != null) {
            foreach ($empat_belas_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_empat_belas_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_empat_belas_SGP = 0;
        }

        // Singapore Minggu Tiga
        // Tanggal 15
        if ($lima_belas_SGP != null) {
            foreach ($lima_belas_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_lima_belas_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_lima_belas_SGP = 0;
        }
        // Tanggal 16
        if ($enam_belas_SGP != null) {
            foreach ($enam_belas_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_enam_belas_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_enam_belas_SGP = 0;
        }
        // Tanggal 17
        if ($tujuh_belas_SGP != null) {
            foreach ($tujuh_belas_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_tujuh_belas_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tujuh_belas_SGP = 0;
        }
        // Tanggal 18
        if ($delapan_belas_SGP != null) {
            foreach ($delapan_belas_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_delapan_belas_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_delapan_belas_SGP = 0;
        }
        // Tanggal 19
        if ($sembilan_belas_SGP != null) {
            foreach ($sembilan_belas_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_sembilan_belas_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_sembilan_belas_SGP = 0;
        }
        // Tanggal 20
        if ($dua_puluh_SGP != null) {
            foreach ($dua_puluh_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_SGP = 0;
        }
        // Tanggal 21
        if ($dua_puluh_satu_SGP != null) {
            foreach ($dua_puluh_satu_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_satu_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_satu_SGP = 0;
        }

        // Singapore Minggu Empat
        // Tanggal 22
        if ($dua_puluh_dua_SGP != null) {
            foreach ($dua_puluh_dua_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_dua_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_dua_SGP = 0;
        }
        // Tanggal 23
        if ($dua_puluh_tiga_SGP != null) {
            foreach ($dua_puluh_tiga_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_tiga_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_tiga_SGP = 0;
        }
        // Tanggal 24
        if ($dua_puluh_empat_SGP != null) {
            foreach ($dua_puluh_empat_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_empat_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_empat_SGP = 0;
        }
        // Tanggal 25
        if ($dua_puluh_lima_SGP != null) {
            foreach ($dua_puluh_lima_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_lima_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_lima_SGP = 0;
        }
        // Tanggal 26
        if ($dua_puluh_enam_SGP != null) {
            foreach ($dua_puluh_enam_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_enam_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_enam_SGP = 0;
        }
        // Tanggal 27
        if ($dua_puluh_tujuh_SGP != null) {
            foreach ($dua_puluh_tujuh_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_tujuh_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_tujuh_SGP = 0;
        }
        // Tanggal 28
        if ($dua_puluh_delapan_SGP != null) {
            foreach ($dua_puluh_delapan_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_delapan_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_delapan_SGP = 0;
        }
        // Tanggal 29
        if ($dua_puluh_sembilan_SGP != null) {
            foreach ($dua_puluh_sembilan_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_sembilan_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_sembilan_SGP = 0;
        }
        // Tanggal 30
        if ($tiga_puluh_SGP != null) {
            foreach ($tiga_puluh_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_tiga_puluh_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tiga_puluh_SGP = 0;
        }
        // Tanggal 31
        if ($tiga_puluh_satu_SGP != null) {
            foreach ($tiga_puluh_satu_SGP as $row) {
                $total = explode('.', $row->total);
                $tanggal_tiga_puluh_satu_SGP = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tiga_puluh_satu_SGP = 0;
        }

        /* HONGKONG ----------------------------------------------------------------------------------------------------------------------------------------------------------------- */
        // Hongkong Minggu Pertama 
        // Tanggal 1
        if ($satu_HK != null) {
            foreach ($satu_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_satu_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_satu_HK = 0;
        }
        // Tanggal 2
        if ($dua_HK != null) {
            foreach ($dua_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_HK = 0;
        }
        // Tanggal 3
        if ($tiga_HK != null) {
            foreach ($tiga_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_tiga_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tiga_HK = 0;
        }
        // Tanggal 4
        if ($empat_HK != null) {
            foreach ($empat_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_empat_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_empat_HK = 0;
        }
        // Tanggal 5
        if ($lima_HK != null) {
            foreach ($lima_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_lima_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_lima_HK = 0;
        }
        // Tanggal 6
        if ($enam_HK != null) {
            foreach ($enam_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_enam_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_enam_HK = 0;
        }
        // Tanggal 7
        if ($tujuh_HK != null) {
            foreach ($tujuh_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_tujuh_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tujuh_HK = 0;
        }

        // Hongkong Minggu Kedua
        // Tanggal 8
        if ($delapan_HK != null) {
            foreach ($delapan_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_delapan_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_delapan_HK = 0;
        }
        // Tanggal 9
        if ($sembilan_HK != null) {
            foreach ($sembilan_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_sembilan_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_sembilan_HK = 0;
        }
        // Tanggal 10
        if ($sepuluh_HK != null) {
            foreach ($sepuluh_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_sepuluh_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_sepuluh_HK = 0;
        }
        // Tanggal 11
        if ($sebelas_HK != null) {
            foreach ($sebelas_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_sebelas_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_sebelas_HK = 0;
        }
        // Tanggal 12
        if ($dua_belas_HK != null) {
            foreach ($dua_belas_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_belas_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_belas_HK = 0;
        }
        // Tanggal 13
        if ($tiga_belas_HK != null) {
            foreach ($tiga_belas_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_tiga_belas_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tiga_belas_HK = 0;
        }
        // Tanggal 14
        if ($empat_belas_HK != null) {
            foreach ($empat_belas_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_empat_belas_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_empat_belas_HK = 0;
        }

        // Hongkong Minggu Tiga
        // Tanggal 15
        if ($lima_belas_HK != null) {
            foreach ($lima_belas_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_lima_belas_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_lima_belas_HK = 0;
        }
        // Tanggal 16
        if ($enam_belas_HK != null) {
            foreach ($enam_belas_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_enam_belas_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_enam_belas_HK = 0;
        }
        // Tanggal 17
        if ($tujuh_belas_HK != null) {
            foreach ($tujuh_belas_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_tujuh_belas_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tujuh_belas_HK = 0;
        }
        // Tanggal 18
        if ($delapan_belas_HK != null) {
            foreach ($delapan_belas_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_delapan_belas_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_delapan_belas_HK = 0;
        }
        // Tanggal 19
        if ($sembilan_belas_HK != null) {
            foreach ($sembilan_belas_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_sembilan_belas_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_sembilan_belas_HK = 0;
        }
        // Tanggal 20
        if ($dua_puluh_HK != null) {
            foreach ($dua_puluh_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_HK = 0;
        }
        // Tanggal 21
        if ($dua_puluh_satu_HK != null) {
            foreach ($dua_puluh_satu_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_satu_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_satu_HK = 0;
        }


        // Hongkong Minggu Empat
        // Tanggal 22
        if ($dua_puluh_dua_HK != null) {
            foreach ($dua_puluh_dua_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_dua_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_dua_HK = 0;
        }
        // Tanggal 23
        if ($dua_puluh_tiga_HK != null) {
            foreach ($dua_puluh_tiga_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_tiga_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_tiga_HK = 0;
        }
        // Tanggal 24
        if ($dua_puluh_empat_HK != null) {
            foreach ($dua_puluh_empat_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_empat_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_empat_HK = 0;
        }
        // Tanggal 25
        if ($dua_puluh_lima_HK != null) {
            foreach ($dua_puluh_lima_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_lima_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_lima_HK = 0;
        }
        // Tanggal 26
        if ($dua_puluh_enam_HK != null) {
            foreach ($dua_puluh_enam_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_enam_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_enam_HK = 0;
        }
        // Tanggal 27
        if ($dua_puluh_tujuh_HK != null) {
            foreach ($dua_puluh_tujuh_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_tujuh_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_tujuh_HK = 0;
        }
        // Tanggal 28
        if ($dua_puluh_delapan_HK != null) {
            foreach ($dua_puluh_delapan_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_delapan_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_delapan_HK = 0;
        }
        // Tanggal 29
        if ($dua_puluh_sembilan_HK != null) {
            foreach ($dua_puluh_sembilan_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_dua_puluh_sembilan_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_dua_puluh_sembilan_HK = 0;
        }
        // Tanggal 30
        if ($tiga_puluh_HK != null) {
            foreach ($tiga_puluh_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_tiga_puluh_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tiga_puluh_HK = 0;
        }
        // Tanggal 31
        if ($tiga_puluh_satu_HK != null) {
            foreach ($tiga_puluh_satu_HK as $row) {
                $total = explode('.', $row->total);
                $tanggal_tiga_puluh_satu_HK = str_replace('Rp ', '', implode("", $total));
            }
        } else {
            $tanggal_tiga_puluh_satu_HK = 0;
        }

        $judul = 'Grafik Keuntungan';
        $isi = 'home/grafik_keuntungan.php';
        $data = [
            'judul' => $judul,
            'isi'   => $isi,
            /* Sydney ----------------------------------------------------------------------------------------------------------------------------------*/
            // Minggu 1 
            'tanggal_satu_SD' => $tanggal_satu_SD,
            'tanggal_dua_SD' => $tanggal_dua_SD,
            'tanggal_tiga_SD' => $tanggal_tiga_SD,
            'tanggal_empat_SD' => $tanggal_empat_SD,
            'tanggal_lima_SD' => $tanggal_lima_SD,
            'tanggal_enam_SD' => $tanggal_enam_SD,
            'tanggal_tujuh_SD' => $tanggal_tujuh_SD,
            // Minggu 2
            'tanggal_delapan_SD' => $tanggal_delapan_SD,
            'tanggal_sembilan_SD' => $tanggal_sembilan_SD,
            'tanggal_sepuluh_SD' => $tanggal_sepuluh_SD,
            'tanggal_sebelas_SD' => $tanggal_sebelas_SD,
            'tanggal_dua_belas_SD' => $tanggal_dua_belas_SD,
            'tanggal_tiga_belas_SD' => $tanggal_tiga_belas_SD,
            'tanggal_empat_belas_SD' => $tanggal_empat_belas_SD,
            // Minggu 3
            'tanggal_lima_belas_SD' => $tanggal_lima_belas_SD,
            'tanggal_enam_belas_SD' => $tanggal_enam_belas_SD,
            'tanggal_tujuh_belas_SD' => $tanggal_tujuh_belas_SD,
            'tanggal_delapan_belas_SD' => $tanggal_delapan_belas_SD,
            'tanggal_sembilan_belas_SD' => $tanggal_sembilan_belas_SD,
            'tanggal_dua_puluh_SD' => $tanggal_dua_puluh_SD,
            'tanggal_dua_puluh_satu_SD' => $tanggal_dua_puluh_satu_SD,
            // Minggu 4
            'tanggal_dua_puluh_dua_SD' => $tanggal_dua_puluh_dua_SD,
            'tanggal_dua_puluh_tiga_SD' => $tanggal_dua_puluh_tiga_SD,
            'tanggal_dua_puluh_empat_SD' => $tanggal_dua_puluh_empat_SD,
            'tanggal_dua_puluh_lima_SD' => $tanggal_dua_puluh_lima_SD,
            'tanggal_dua_puluh_enam_SD' => $tanggal_dua_puluh_enam_SD,
            'tanggal_dua_puluh_tujuh_SD' => $tanggal_dua_puluh_tujuh_SD,
            'tanggal_dua_puluh_delapan_SD' => $tanggal_dua_puluh_delapan_SD,
            'tanggal_dua_puluh_sembilan_SD' => $tanggal_dua_puluh_sembilan_SD,
            'tanggal_tiga_puluh_SD' => $tanggal_tiga_puluh_SD,
            'tanggal_tiga_puluh_satu_SD' => $tanggal_tiga_puluh_satu_SD,

            /* Singapore ---------------------------------------------------------------------------------------------------------------------------------- */
            // Minggu 1 
            'tanggal_satu_SGP' => $tanggal_satu_SGP,
            'tanggal_dua_SGP' => $tanggal_dua_SGP,
            'tanggal_tiga_SGP' => $tanggal_tiga_SGP,
            'tanggal_empat_SGP' => $tanggal_empat_SGP,
            'tanggal_lima_SGP' => $tanggal_lima_SGP,
            'tanggal_enam_SGP' => $tanggal_enam_SGP,
            'tanggal_tujuh_SGP' => $tanggal_tujuh_SGP,
            // Minggu 2
            'tanggal_delapan_SGP' => $tanggal_delapan_SGP,
            'tanggal_sembilan_SGP' => $tanggal_sembilan_SGP,
            'tanggal_sepuluh_SGP' => $tanggal_sepuluh_SGP,
            'tanggal_sebelas_SGP' => $tanggal_sebelas_SGP,
            'tanggal_dua_belas_SGP' => $tanggal_dua_belas_SGP,
            'tanggal_tiga_belas_SGP' => $tanggal_tiga_belas_SGP,
            'tanggal_empat_belas_SGP' => $tanggal_empat_belas_SGP,
            // Minggu 3
            'tanggal_lima_belas_SGP' => $tanggal_lima_belas_SGP,
            'tanggal_enam_belas_SGP' => $tanggal_enam_belas_SGP,
            'tanggal_tujuh_belas_SGP' => $tanggal_tujuh_belas_SGP,
            'tanggal_delapan_belas_SGP' => $tanggal_delapan_belas_SGP,
            'tanggal_sembilan_belas_SGP' => $tanggal_sembilan_belas_SGP,
            'tanggal_dua_puluh_SGP' => $tanggal_dua_puluh_SGP,
            'tanggal_dua_puluh_satu_SGP' => $tanggal_dua_puluh_satu_SGP,
            // Minggu 4
            'tanggal_dua_puluh_dua_SGP' => $tanggal_dua_puluh_dua_SGP,
            'tanggal_dua_puluh_tiga_SGP' => $tanggal_dua_puluh_tiga_SGP,
            'tanggal_dua_puluh_empat_SGP' => $tanggal_dua_puluh_empat_SGP,
            'tanggal_dua_puluh_lima_SGP' => $tanggal_dua_puluh_lima_SGP,
            'tanggal_dua_puluh_enam_SGP' => $tanggal_dua_puluh_enam_SGP,
            'tanggal_dua_puluh_tujuh_SGP' => $tanggal_dua_puluh_tujuh_SGP,
            'tanggal_dua_puluh_delapan_SGP' => $tanggal_dua_puluh_delapan_SGP,
            'tanggal_dua_puluh_sembilan_SGP' => $tanggal_dua_puluh_sembilan_SGP,
            'tanggal_tiga_puluh_SGP' => $tanggal_tiga_puluh_SGP,
            'tanggal_tiga_puluh_satu_SGP' => $tanggal_tiga_puluh_satu_SGP,

            /* Hongkong ---------------------------------------------------------------------------------------------------------------------------------- */
            // Minggu 1 
            'tanggal_satu_HK' => $tanggal_satu_HK,
            'tanggal_dua_HK' => $tanggal_dua_HK,
            'tanggal_tiga_HK' => $tanggal_tiga_HK,
            'tanggal_empat_HK' => $tanggal_empat_HK,
            'tanggal_lima_HK' => $tanggal_lima_HK,
            'tanggal_enam_HK' => $tanggal_enam_HK,
            'tanggal_tujuh_HK' => $tanggal_tujuh_HK,
            // Minggu 2
            'tanggal_delapan_HK' => $tanggal_delapan_HK,
            'tanggal_sembilan_HK' => $tanggal_sembilan_HK,
            'tanggal_sepuluh_HK' => $tanggal_sepuluh_HK,
            'tanggal_sebelas_HK' => $tanggal_sebelas_HK,
            'tanggal_dua_belas_HK' => $tanggal_dua_belas_HK,
            'tanggal_tiga_belas_HK' => $tanggal_tiga_belas_HK,
            'tanggal_empat_belas_HK' => $tanggal_empat_belas_HK,
            // Minggu 3
            'tanggal_lima_belas_HK' => $tanggal_lima_belas_HK,
            'tanggal_enam_belas_HK' => $tanggal_enam_belas_HK,
            'tanggal_tujuh_belas_HK' => $tanggal_tujuh_belas_HK,
            'tanggal_delapan_belas_HK' => $tanggal_delapan_belas_HK,
            'tanggal_sembilan_belas_HK' => $tanggal_sembilan_belas_HK,
            'tanggal_dua_puluh_HK' => $tanggal_dua_puluh_HK,
            'tanggal_dua_puluh_satu_HK' => $tanggal_dua_puluh_satu_HK,
            // Minggu 4
            'tanggal_dua_puluh_dua_HK' => $tanggal_dua_puluh_dua_HK,
            'tanggal_dua_puluh_tiga_HK' => $tanggal_dua_puluh_tiga_HK,
            'tanggal_dua_puluh_empat_HK' => $tanggal_dua_puluh_empat_HK,
            'tanggal_dua_puluh_lima_HK' => $tanggal_dua_puluh_lima_HK,
            'tanggal_dua_puluh_enam_HK' => $tanggal_dua_puluh_enam_HK,
            'tanggal_dua_puluh_tujuh_HK' => $tanggal_dua_puluh_tujuh_HK,
            'tanggal_dua_puluh_delapan_HK' => $tanggal_dua_puluh_delapan_HK,
            'tanggal_dua_puluh_sembilan_HK' => $tanggal_dua_puluh_sembilan_HK,
            'tanggal_tiga_puluh_HK' => $tanggal_tiga_puluh_HK,
            'tanggal_tiga_puluh_satu_HK' => $tanggal_tiga_puluh_satu_HK,

            // Bulanan
            // Sydney
            'januari_SD' => $bulan_januari_SD,
            'februari_SD' => $bulan_februari_SD,
            'maret_SD' => $bulan_maret_SD,
            'april_SD' => $bulan_april_SD,
            'mei_SD' => $bulan_mei_SD,
            'juni_SD' => $bulan_juni_SD,
            'juli_SD' => $bulan_juli_SD,
            'agustus_SD' => $bulan_agustus_SD,
            'september_SD' => $bulan_september_SD,
            'oktober_SD' => $bulan_oktober_SD,
            'november_SD' => $bulan_november_SD,
            'desember_SD' => $bulan_desember_SD,
            // Singapore
            'januari_SGP' => $bulan_januari_SGP,
            'februari_SGP' => $bulan_februari_SGP,
            'maret_SGP' => $bulan_maret_SGP,
            'april_SGP' => $bulan_april_SGP,
            'mei_SGP' => $bulan_mei_SGP,
            'juni_SGP' => $bulan_juni_SGP,
            'juli_SGP' => $bulan_juli_SGP,
            'agustus_SGP' => $bulan_agustus_SGP,
            'september_SGP' => $bulan_september_SGP,
            'oktober_SGP' => $bulan_oktober_SGP,
            'november_SGP' => $bulan_november_SGP,
            'desember_SGP' => $bulan_desember_SGP,
            // Hongkong
            'januari_HK' => $bulan_januari_HK,
            'februari_HK' => $bulan_februari_HK,
            'maret_HK' => $bulan_maret_HK,
            'april_HK' => $bulan_april_HK,
            'mei_HK' => $bulan_mei_HK,
            'juni_HK' => $bulan_juni_HK,
            'juli_HK' => $bulan_juli_HK,
            'agustus_HK' => $bulan_agustus_HK,
            'september_HK' => $bulan_september_HK,
            'oktober_HK' => $bulan_oktober_HK,
            'november_HK' => $bulan_november_HK,
            'desember_HK' => $bulan_desember_HK,

            // Total Bulanan SD + SGP + HK
            'total_januari' => $total_januari,
            'total_februari' => $total_februari,
            'total_maret' => $total_maret,
            'total_april' => $total_april,
            'total_mei' => $total_mei,
            'total_juni' => $total_juni,
            'total_juli' => $total_juli,
            'total_agustus' => $total_agustus,
            'total_september' => $total_september,
            'total_oktober' => $total_oktober,
            'total_november' => $total_november,
            'total_desember' => $total_desember,

            'bulan_sekarang' => $this->tanggal_indo($bulan_sekarang),
            'tahun_sekarang' => $tahun_sekarang,
            'session' => $session,
            'validation' => \Config\Services::validation(),
        ];
        echo view('layout/v_wrapper.php', $data);
    }


    /* FUNGSI PENDUKUNG LAINNYA */

    public function tanggal_indo($masukan)
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $tgl_indo = $bulan[(int) $masukan];

        return $tgl_indo;
    }
}
