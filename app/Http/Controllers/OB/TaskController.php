<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{

    public function index()
    {
        $customer_data = $this->get_customer_data();
        return view('dynamic_pdf')->with('customer_data', $customer_data);
    }
    function get_customer_data()
    {
        $customer_data = DB::table('pegawai')->limit(10)->get();
        return $customer_data;
    }
    public function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        return $pdf->stream();
    }
    function convert_customer_data_to_html()
    {
        $customer_data = $this->get_customer_data();
        $output = '<h3 align=”center”>Daftar Pegawai</h3>
        <table width=”100%” style=”border-collapse: collapse; border: 0px;”>
            <tr>
            <th style=”border: 1px solid; padding:12px;” width=”15%”>Nama</th>
            <th style=”border: 1px solid; padding:12px;” width=”15%”>Alamat</th>
            <th style=”border: 1px solid; padding:12px;” width=”15%”>Telepon</th>
            </tr>';
            foreach ($customer_data as $customer) {
                $output .= '
                    <tr>
                    <td style=”border: 1px solid; padding:12px;”>' . $customer->Nama . '</td>
                    <td style=”border: 1px solid; padding:12px;”>' . $customer->Alamat . '</td>
                    <td style=”border: 1px solid; padding:12px;”>' . $customer->Telepon . '</td>
                    </tr>';
            }
        $output .= '</table>';
            return $output;
    }
}
