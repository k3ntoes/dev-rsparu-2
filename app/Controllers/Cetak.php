<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\API\PasienModel;
use CodeIgniter\API\ResponseTrait;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Mpdf\Mpdf;

class Cetak extends BaseController
{
	use ResponseTrait;

	function __construct()
	{
		helper('url');
	}
	public function RM($id = null)
	{
		$parser = \Config\Services::parser();
		$logger = new Logger('name');
		$logger->pushHandler(new StreamHandler(APPPATH . '../writable/logs/mpdf.log', Logger::DEBUG));

		$this->response->setHeader('Content-Type', 'application/pdf');
		if ($id == null) return $this->respondNoContent('Hmm');
		$data =  model(PasienModel::class)->cari_bio_by_rm($id);
		$data->logo = getcwd() . '/assets/images/banyumas.png';
		switch ($data->statKawin) {
			case "K":
				$data->statKawin = "KAWIN";
				break;
			case "CH":
				$data->statKawin = "CERAI HIDUP";
				break;
			case "CM":
				$data->statKawin = "CERAI MATI";
				break;
			default:
				$data->statKawin = "BELUM KAWIN";
		}
		($data->jeniskel == "L") ? $data->jeniskel = 'LAKI-LAKI' : $data->jeniskel = "PEREMPUAN";
		$data->tanggal = Date('d-M-Y', strtotime($data->tgldaftar));
		// print_r($data);
		$p = $parser
			->setData((array)$data)
			->render('cetak/rm2');
		$mpdfConf = [
			'format' => 'Legal'
		];
		$mpdf = new Mpdf($mpdfConf);
		$mpdf->showImageErrors = true;
		$mpdf->curlAllowUnsafeSslRequests = true;
		$mpdf->setLogger($logger);
		$mpdf->WriteHTML($p);
		$mpdf->Output();
	}
}
