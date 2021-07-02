<?php
/**
 * Created by PhpStorm.
 * User: Al
 * Date: 21/7/2020
 * Time: 09:29 م
 */

namespace App\ServiceInterfaces\Export;

use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;

class ExportPdf implements Exportable
{

    public function export($data)
    {
        $view = View::make($data['view'], $data['data']);
        $html = $view->render();

        $m_pdf = new Mpdf();
        $m_pdf->WriteHTML($html);
        $m_pdf->AddPage();
        $m_pdf->WriteHTML($html);
        $m_pdf->Output($data['output'] , 'F'); // for save
        //$m_pdf->Output($data['output'], 'I'); // for download
        dd("AA");

    }
}
