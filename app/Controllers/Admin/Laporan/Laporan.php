<?php

namespace App\Controllers\Admin\Laporan;

use App\Controllers\BaseController;
use App\Models\Admin\PengunjungModel;
use Mpdf\Mpdf;

class Laporan extends BaseController
{
    protected $pengunjung;
    public function __construct()
    {
        $this->pengunjung = new PengunjungModel();
    }
    public function index($tahun)
    {
        $pengunjung = $this->pengunjung->where(['tahun' => $tahun])->find();
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-P'
        ]);


        $file = '
        <h3>Laporan Data Pengunjung Tahun ' . $tahun . '</h3>
        <table border="1" cellpadding="10" style="width: 100%;" cellspacing="0">
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Jumlah Pengunjung</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($pengunjung as $p) {
            $file .=
                '
                    <tr>
                        <td>Januari</td>
                        <td>' . $p['januari'] . '</td>
                    </tr>
                    <tr>
                        <td>Februari</td>
                        <td>' . $p['februari'] . '</td>
                    </tr>
                    <tr>
                        <td>Maret</td>
                        <td>' . $p['maret'] . '</td>
                    </tr>
                    <tr>
                        <td>April</td>
                        <td>' . $p['april'] . '</td>
                    </tr>
                    <tr>
                        <td>Mei</td>
                        <td>' . $p['mei'] . '</td>
                    </tr>
                    <tr>
                        <td>Juni</td>
                        <td>' . $p['juni'] . '</td>
                    </tr>
                    <tr>
                        <td>Juli</td>
                        <td>' . $p['juli'] . '</td>
                    </tr>
                    <tr>
                        <td>Agustus</td>
                        <td>' . $p['agustus'] . '</td>
                    </tr>
                    <tr>
                        <td>September</td>
                        <td>' . $p['september'] . '</td>
                    </tr>
                    <tr>
                        <td>Oktober</td>
                        <td>' . $p['oktober'] . '</td>
                    </tr>
                    <tr>
                        <td>November</td>
                        <td>' . $p['november'] . '</td>
                    </tr>
                    <tr>
                        <td>Desember</td>
                        <td>' . $p['desember'] . '</td>
                    </tr>';
        }

        $file .= '
            </tbody>
            </table>

            <table style="width: 100%; margin-top:30%;">
                <tbody>
                    <tr>
                        <td style=" width: 50%;">
                        </td>
                        <td style="text-align:center;">
                            <span>Kebumen, 21 Agustus 2021</span>
                            <br>
                            <span>Mengetahui</span>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <span>Pengurus Perpustakaan</span>
                        </td>
                    </tr>
                </tbody>
            </table>
';
        $mpdf->WriteHTML($file);
        return redirect()->to($mpdf->Output());
    }
}
