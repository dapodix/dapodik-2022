<?php

namespace DataDikdas\Info;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
use Defuse\Crypto\File;

// Referensi
use DataDikdas\Model\BentukPendidikanPeer;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\JenisRombelPeer;

// Publik
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\GugusSekolahPeer;
use DataDikdas\Model\PtkTerdaftarPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\JenisPtkPeer;
use DataDikdas\Model\WsAplikasiPeer;
use DataDikdas\Model\PenggunaPeer;
use DataDikdas\Model\RolePenggunaPeer;
use DataDikdas\Model\RegistrasiPesertaDidikPeer;
use DataDikdas\Model\PesertaDidikPeer;
use DataDikdas\Model\PesertaDidikLongitudinalPeer;
use DataDikdas\Model\AnggotaRombelPeer;
use DataDikdas\Model\RombonganBelajarPeer;
use DataDikdas\Model\JurusanSpPeer;
use DataDikdas\Model\KelasEkskulPeer;
use DataDikdas\Model\PembelajaranPeer;
use DataDikdas\Model\StatusDiKurikulumPeer;
use DataDikdas\Model\TanahPeer;
use DataDikdas\Model\BangunanPeer;
use DataDikdas\Model\RuangPeer;
use DataDikdas\Model\RwyPendFormalPeer;
use DataDikdas\Model\RwyKepangkatanPeer;
use DataDikdas\Model\JenjangPendidikanPeer;

use DataDikdas\Model;
use DataDikdas\Validation;

class SekolahDetailTableInfo {

	private $sekolah_id;
	private $semester_id;
	private $tahun_ajaran_id;
	private $ip_address;
	private $port;
	private $http_code;
	private $message_error;
	private $ws_aplikasi_obj;
	private $parameter;
	private $string;

	function __construct() {

		// $header = $this->getAuthorizationHeader();
		// print_r($header);
        $token = $this->getBearerToken();
		if (!$token){
            die('Access denied - You are not authorized to access this page. #1');
        }

		$ip_address = $_SERVER['REMOTE_ADDR'];
		$port = $_SERVER['REMOTE_PORT'];
		$npsn = $_REQUEST['npsn'];
		$string = $_REQUEST['query'];
		// $token_sync = "eb96e950-7579-4fd1-82b8-9534a7df9e3f";
		$tokenKhususArr = ["eb96e950-7579-4fd1-82b8-9534a7df9e3f", "t0k3np33mp3"];
		$strtotime = strtotime(date("Y-m-d"));
		// $token_encrypt = Crypto::encrypt($token_sync, $strtotime);
		// return "hade: ".$token_encrypt; die;
		// die ($ip_address);

		$this->setIpAddress($ip_address);
		$this->setPort($port);
		$this->setString($string);

		if (!$npsn) {
			$this->setHttpCode(403);
			$this->setMessageError('Parameter NPSN harap diisi');

			die($this->getStatusCode());
		}

		$c = new \Criteria();
		$c->add(SekolahPeer::NPSN, $npsn);
		$c->add(SekolahPeer::SOFT_DELETE, 0);
		$sekolahObj = SekolahPeer::doSelectOne($c);

		if (!is_object($sekolahObj)) {
			$this->setHttpCode(403);
			$this->setMessageError('Sekolah tidak ditemukan');

			die($this->getStatusCode());
		}

		$c = new \Criteria();
		$c->add(SemesterPeer::EXPIRED_DATE, NULL, \Criteria::ISNULL);
		$c->add(SemesterPeer::PERIODE_AKTIF, 1);
		$c->addDescendingOrderByColumn(SemesterPeer::SEMESTER_ID);
		$semesterObj = SemesterPeer::doSelectOne($c);

		if (!is_object($semesterObj)) {
			$this->setHttpCode(403);
			$this->setMessageError('Semester tidak ditemukan');

			die($this->getStatusCode());	
		}

		// if ($token_sync == $token) {
		if (in_array($token, $tokenKhususArr)) {

			// echo $ip_address; die;
			if (!in_array($ip_address, array("localhost", "127.0.0.1", "::1", "10.0.2.2"))) {
				if ($token == "eb96e950-7579-4fd1-82b8-9534a7df9e3f") {
					die('Access denied - You are not authorized to access this page. #2');
				}
			}

			/* if (!in_array($port, array('5437', '5439'))) {
				die('Access denied - You are not authorized to access this page. #3');
			} */

			$this->setSekolahId($sekolahObj->getSekolahId());
			$this->setSemesterId($semesterObj->getSemesterId());
			$this->setTahunAjaranId($semesterObj->getTahunAjaranId());
			$this->setParameter($_REQUEST);

		} else {

			// echo $sekolahObj; die;
			$c = new \Criteria();
			// $c->add(WsAplikasiPeer::SEKOLAH_ID, $sekolahObj->getSekolahId());
			$c->add(WsAplikasiPeer::TOKEN, $token);
			// $c->add(WsAplikasiPeer::PORT, $port);
			// $c->add(WsAplikasiPeer::IP_ADDRESS, $ip_address);
			$c->add(WsAplikasiPeer::SOFT_DELETE, 0);
			$c->add(WsAplikasiPeer::AKTIF, 1);

			$wsAplikasiObj = WsAplikasiPeer::doSelectOne($c);

			if (!is_object($wsAplikasiObj)) {
				$this->setHttpCode(403);
				$this->setMessageError('Aplikasi tidak terdaftar pada Web Service Dapodik');

				die($this->getStatusCode());
			} else {
				if (in_array($ip_address, array("localhost", "127.0.0.1", "::1"))) {
					$ip_address = "localhost";
				}

				$ip_address_db = $wsAplikasiObj->getIpAddress();
				if (in_array($wsAplikasiObj->getIpAddress(), array("localhost", "127.0.0.1", "::1"))) {
					$ip_address_db = "localhost";
				}

				if ($ip_address != $ip_address_db) {
					$this->setHttpCode(403);
					$this->setMessageError('IP Address yang didaftarkan pada Web Service Dapodik berbeda');

					die($this->getStatusCode());
				} /*else if ($_REQUEST['password'] != $wsAplikasiObj->getPassword()) {
					$this->setHttpCode(403);
					$this->setMessageError('Password yang anda masukan salah');

					die($this->getStatusCode());
				} */else {
					if (!is_object($semesterObj)) {
						$this->setHttpCode(500);
						$this->setMessageError('Terjadi kesalahan pada saat mengambil semester aktif');

						die($this->getStatusCode());
					} else {
						$this->setWsAplikasiObj($wsAplikasiObj);
						$this->setSekolahId($wsAplikasiObj->getSekolahId());
						$this->setSemesterId($semesterObj->getSemesterId());
						$this->setTahunAjaranId($semesterObj->getTahunAjaranId());
						$this->setParameter($_REQUEST);
					}
				}
			}

		}

	}

	function getAuthorizationHeader(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }

    function getBearerToken() {
	    $headers = $this->getAuthorizationHeader();
	    // HEADER: Get the access token from the header
	    if (!empty($headers)) {
	        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
	            return $matches[1];
	        }
	    }
	    return null;
	}

	function permissionSql($string) {

		$deniedColumns = [
			"information_",
			"table_",
			"drop ",
			"insert ",
			"create ",
			"add",
			"update",
			"delete",
			"truncate",
			"merge",
			"upsert",
			"collations",
			"columns",
			"search_path",
			"pg_",
			"has_",
			"current_",
			"inet_",
			"session_user",
			"user",
			"version",
			"format_type",
			"_description",
			"txid_",
			"database",
			"privileges",
			"grant"
		];

		$exceptionColums = [
			'a_boleh_delete',
			'a_boleh_insert',
			'a_boleh_update',
			'delete_rule',
			'last_update',
			'n_update',
			'soft_delete',
			'tanggal_update',
			'update_rule',
			'updater_id'
		];

		$stringCek = str_replace($exceptionColums, "", strtolower($string));
		$success = true;
		$keyError = "";
		foreach ($deniedColumns as $syntax) {
			if (strpos(strtolower($stringCek), $syntax) !== FALSE) {
				$success = false;
				$keyError = $syntax;
				break;
			}
		}

		$arr['success'] = $success;
		$arr['message'] = $keyError;

		return json_encode($arr);
	}

	function setIpAddress($ip_address) {
		$this->ip_address = $ip_address;
	}

	function setPort($port) {
		$this->port = $port;
	}

	function setHttpCode($http_code) {
		$this->http_code = $http_code;
	}

	function setMessageError($message_error) {
		$this->message_error = $message_error;
	}

	function setWsAplikasiObj($ws_aplikasi_obj) {
		$this->ws_aplikasi_obj = $ws_aplikasi_obj;
	}

	function setSekolahId($sekolah_id) {
		$this->sekolah_id = $sekolah_id;
	}

	function setSemesterId($semester_id) {
		$this->semester_id = $semester_id;
	}

	function setTahunAjaranId($tahun_ajaran_id) {
		$this->tahun_ajaran_id = $tahun_ajaran_id;
	}

	function setParameter($parameter) {
		$this->parameter = $parameter;
	}

	function setString($string) {
		$this->string = $string;
	}

	function getIpAddress() {
		return $this->ip_address;
	}

	function getPort() {
		return $this->port;
	}

	function getHttpCode() {
		return $this->http_code;
	}

	function getMessageError() {
		return $this->message_error;
	}

	function getWsAplikasiObj() {
		return $this->ws_aplikasi_obj;
	}

	function getParameter() {
		return $this->parameter;
	}

	function getSekolahId() {
		return $this->sekolah_id;
	}

	function getSemesterId() {
		return $this->semester_id;
	}

	function getTahunAjaranId() {
		return $this->tahun_ajaran_id;
	}

	function getString() {
		return $this->string;
	}

	function getStatusCode() {
		$http_status_codes = array(100 => "Continue", 101 => "Switching Protocols", 102 => "Processing", 200 => "OK", 201 => "Created", 202 => "Accepted", 203 => "Non-Authoritative Information", 204 => "No Content", 205 => "Reset Content", 206 => "Partial Content", 207 => "Multi-Status", 300 => "Multiple Choices", 301 => "Moved Permanently", 302 => "Found", 303 => "See Other", 304 => "Not Modified", 305 => "Use Proxy", 306 => "(Unused)", 307 => "Temporary Redirect", 308 => "Permanent Redirect", 400 => "Bad Request", 401 => "Unauthorized", 402 => "Payment Required", 403 => "Forbidden", 404 => "Not Found", 405 => "Method Not Allowed", 406 => "Not Acceptable", 407 => "Proxy Authentication Required", 408 => "Request Timeout", 409 => "Conflict", 410 => "Gone", 411 => "Length Required", 412 => "Precondition Failed", 413 => "Request Entity Too Large", 414 => "Request-URI Too Long", 415 => "Unsupported Media Type", 416 => "Requested Range Not Satisfiable", 417 => "Expectation Failed", 418 => "I'm a teapot", 419 => "Authentication Timeout", 420 => "Enhance Your Calm", 422 => "Unprocessable Entity", 423 => "Locked", 424 => "Failed Dependency", 424 => "Method Failure", 425 => "Unordered Collection", 426 => "Upgrade Required", 428 => "Precondition Required", 429 => "Too Many Requests", 431 => "Request Header Fields Too Large", 444 => "No Response", 449 => "Retry With", 450 => "Blocked by Windows Parental Controls", 451 => "Unavailable For Legal Reasons", 494 => "Request Header Too Large", 495 => "Cert Error", 496 => "No Cert", 497 => "HTTP to HTTPS", 499 => "Client Closed Request", 500 => "Internal Server Error", 501 => "Not Implemented", 502 => "Bad Gateway", 503 => "Service Unavailable", 504 => "Gateway Timeout", 505 => "HTTP Version Not Supported", 506 => "Variant Also Negotiates", 507 => "Insufficient Storage", 508 => "Loop Detected", 509 => "Bandwidth Limit Exceeded", 510 => "Not Extended", 511 => "Network Authentication Required", 598 => "Network read timeout error", 599 => "Network connect timeout error");

		$code = $this->getHttpCode();
		$text = $http_status_codes[$code];
		$message_error = $this->getMessageError();

		if (!$code) {
			$code = 403;
			$text = $http_status_codes[$code];
			$message_error = "Anda tidak berhak mengakses halaman ini";
		}

		$arr['success'] = false;
		$arr['http_code'] = $code;
		$arr['status_code'] = $text;
		$arr['message'] = $message_error;

		return json_encode($arr);
	}

	function getSekolah() {

		$sekolahObj = SekolahPeer::retrieveByPk($this->getSekolahId());

		if (!is_object($sekolahObj)) {
			$this->setHttpCode(403);
			$this->setMessageError('Data sekolah tidak ditemukan');

			die($this->getStatusCode());
		} else {

			$c = new \Criteria();
			$c->add(GugusSekolahPeer::SEKOLAH_INTI_ID, $sekolahObj->getSekolahId());
			$c->add(GugusSekolahPeer::SOFT_DELETE, 0);
			$c->add(GugusSekolahPeer::JENIS_GUGUS_ID, 11);
			$gugusSekolahObj = GugusSekolahPeer::doSelectOne($c);

			$is_sks = false;
			if (is_object($gugusSekolahObj)) {
				$is_sks = true;
			}

			$outArr = array();
			$outArr['sekolah_id'] = $sekolahObj->getSekolahId();
			$outArr['nama'] = $sekolahObj->getNama();
			$outArr['nss'] = $sekolahObj->getNss();
			$outArr['npsn'] = $sekolahObj->getNpsn();
			$outArr['bentuk_pendidikan_id'] = $sekolahObj->getBentukPendidikanId();
			$outArr['bentuk_pendidikan_id_str'] = $sekolahObj->getBentukPendidikan()->getNama();
			$outArr['status_sekolah'] = $sekolahObj->getStatusSekolah();
			$outArr['status_sekolah_str'] = $sekolahObj->getStatusSekolah() == 1 ? 'Negeri' : 'Swasta';
			$outArr['alamat_jalan'] = $sekolahObj->getAlamatJalan();
			$outArr['rt'] = $sekolahObj->getRt();
			$outArr['rw'] = $sekolahObj->getRw();
			$outArr['kode_wilayah'] = $sekolahObj->getKodeWilayah();
			$outArr['kode_pos'] = $sekolahObj->getKodePos();
			$outArr['nomor_telepon'] = $sekolahObj->getNomorTelepon();
			$outArr['nomor_fax'] = $sekolahObj->getNomorFax();
			$outArr['email'] = $sekolahObj->getEmail();
			$outArr['website'] = $sekolahObj->getWebsite();
			$outArr['is_sks'] = $is_sks;
			// $outArr['kode_registrasi'] = strtoupper(base_convert($sekolahObj->getKodeRegistrasi(), 10, 32));
			$outArr['lintang'] = $sekolahObj->getLintang();
			$outArr['bujur'] = $sekolahObj->getBujur();

			$kodeKecamatan = substr($sekolahObj->getKodeWilayah(), 0, 6);
			// echo $kodeKecamatan; die;
			$kecamatanObj = MstWilayahPeer::retrieveByPk($kodeKecamatan);
			$kabupatenKotaObj = MstWilayahPeer::retrieveByPk($kecamatanObj->getMstKodeWilayah());
			$provinsiObj = MstWilayahPeer::retrieveByPk($kabupatenKotaObj->getMstKodeWilayah());

			$outArr['kode_pos'] = $sekolahObj->getKodePos();
			$outArr['dusun'] = $sekolahObj->getNamaDusun();
			if ($sekolahObj->getMstWilayah()->getIdLevelWilayah() == 4) {
				$outArr['desa_kelurahan'] = $sekolahObj->getMstWilayah()->getNama();
			} else {
				$outArr['desa_kelurahan'] = $sekolahObj->getDesaKelurahan();
			}
			$outArr['kecamatan'] = $kecamatanObj->getNama();
			$outArr['kabupaten_kota'] = $kabupatenKotaObj->getNama();
			$outArr['provinsi'] = $provinsiObj->getNama();

			// print_r($outArr); die;
			return tableJson($outArr, 1, SekolahPeer::getFieldNames(\BasePeer::TYPE_FIELDNAME));
		}
	}

	function getGtk() {

		$tahun_ajaran_id = $this->getTahunAjaranId();
		$sekolah_id = $this->getSekolahId();
		$params = $this->getParameter();

		$c = new \Criteria();
        $c->addJoin(PtkTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, \Criteria::JOIN);
        $c->addJoin(PtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, \Criteria::JOIN);
        $c->add(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $tahun_ajaran_id);
        $c->add(PtkTerdaftarPeer::SEKOLAH_ID, $sekolah_id);
        $c->add(PtkTerdaftarPeer::SOFT_DELETE, 0);
        $c->add(PtkTerdaftarPeer::JENIS_KELUAR_ID, NULL, \Criteria::ISNULL);
		$c->add(PtkPeer::SOFT_DELETE, 0);
		
		if ($params['ptk_id']) {
			$c->add(PtkTerdaftarPeer::PTK_ID, $params['ptk_id']);
		}

        $c->addAscendingOrderByColumn(PtkPeer::NAMA);

        // print_r($c->toString());die;
        $ptkTerdaftarObj = PtkTerdaftarPeer::doSelect($c);
        $ptkTerdaftarCount = PtkTerdaftarPeer::doCount($c);
        // print_r($ptkTerdaftarObj); die;

        if ($ptkTerdaftarCount < 1) {
			$this->setHttpCode(403);
			$this->setMessageError('Data GTK tidak ditemukan');

			return $this->getStatusCode();
		} else {

			$outArr = array();
			foreach ($ptkTerdaftarObj as $ptkTerdaftar) {
				$c = new \Criteria();
                $c->addJoin(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID);
                $c->add(JenjangPendidikanPeer::EXPIRED_DATE, NULL, \Criteria::ISNULL);
                $c->add(JenjangPendidikanPeer::JENJANG_LEMBAGA, 1);
                $c->add(RwyPendFormalPeer::PTK_ID, $ptkTerdaftar->getPtkId());
                $c->add(RwyPendFormalPeer::SOFT_DELETE, 0);
				$c->addDescendingOrderByColumn(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID);
				
				$rwyPendFormalAllObj = RwyPendFormalPeer::doSelect($c);
				$rwyPendFormalObj = RwyPendFormalPeer::doSelectOne($c);

				$c = new \Criteria();
                $c->add(RwyKepangkatanPeer::PTK_ID, $ptkTerdaftar->getPtkId());
                $c->add(RwyKepangkatanPeer::SOFT_DELETE, 0);
                $c->add(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, 99, \Criteria::LESS_THAN);
                $c->addDescendingOrderByColumn(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID);
                $rwyKepangkatanObj = RwyKepangkatanPeer::doSelect($c);
				
				$sql = "select
                            last_pangkat.*,
                            pangkat_golongan.nama,
                            age(tmt_pangkat) masa_kerja
                        from (
                            select
                                pangkat_golongan_id,
                                tanggal_sk,
                                tmt_pangkat,
                                masa_kerja_gol_tahun
                            from rwy_kepangkatan
                            where
                                soft_delete = 0
                                and ptk_id = '".$ptkTerdaftar->getPtkId()."'
                            union all
                            select
                                pangkat_golongan_id,
                                tanggal_sk,
                                tmt_kgb,
                                masa_kerja_tahun
                            from riwayat_gaji_berkala
                            where
                                soft_delete = 0
                                and ptk_id = '".$ptkTerdaftar->getPtkId()."'
                        ) last_pangkat
                        join ref.pangkat_golongan on last_pangkat.pangkat_golongan_id = pangkat_golongan.pangkat_golongan_id
                        order by
                            tmt_pangkat desc
                        limit 1";

                $dataPangkat = getDataBySql($sql, FALSE, DBNAME);

				if (count($dataPangkat)) {
					$pangkat_golongan_id_str = $dataPangkat[0]['nama'];
				} else {
					$pangkat_golongan_id_str = "-";
				}

				$rwyKepangkatanArr = [];
				foreach ($rwyKepangkatanObj as $kepangkatan) {
					$arrRwyKepangkatan = $kepangkatan->toArray(\BasePeer::TYPE_FIELDNAME);
					$arrRwyKepangkatan['pangkat_golongan_id_str'] = is_object($kepangkatan->getPangkatGolongan()) ? $kepangkatan->getPangkatGolongan()->getNama() : "";

					unset($arrRwyKepangkatan['pangkat_golongan_id']);
					unset($arrRwyKepangkatan['asal_data']);
					unset($arrRwyKepangkatan['ptk_id']);
					unset($arrRwyKepangkatan['create_date']);
					unset($arrRwyKepangkatan['last_update']);
					unset($arrRwyKepangkatan['soft_delete']);
					unset($arrRwyKepangkatan['last_sync']);
					unset($arrRwyKepangkatan['updater_id']);

					$rwyKepangkatanArr[] = $arrRwyKepangkatan;
				}

				$rwyPendFormalAllArr = [];
				foreach ($rwyPendFormalAllObj as $formal) {
					$arrRwyPendFormal = $formal->toArray(\BasePeer::TYPE_FIELDNAME);
					$arrRwyPendFormal['bidang_studi_id_str'] = is_object($formal->getBidangStudi()) ? $formal->getBidangStudi()->getBidangStudi() : "";
					$arrRwyPendFormal['jenjang_pendidikan_id_str'] = is_object($formal->getJenjangPendidikan()) ? $formal->getJenjangPendidikan()->getNama() : "";
					$arrRwyPendFormal['gelar_akademik_id_str'] = is_object($formal->getGelarAkademik()) ? $formal->getGelarAkademik()->getNama() : "";


					unset($arrRwyPendFormal['bidang_studi_id']);
					unset($arrRwyPendFormal['jenjang_pendidikan_id']);
					unset($arrRwyPendFormal['gelar_akademik_id']);
					unset($arrRwyPendFormal['ptk_id']);
					unset($arrRwyPendFormal['create_date']);
					unset($arrRwyPendFormal['last_update']);
					unset($arrRwyPendFormal['soft_delete']);
					unset($arrRwyPendFormal['last_sync']);
					unset($arrRwyPendFormal['updater_id']);

					$rwyPendFormalAllArr[] = $arrRwyPendFormal;
				}
				
				$arr['tahun_ajaran_id'] = $tahun_ajaran_id;
				$arr['ptk_terdaftar_id'] = $ptkTerdaftar->getPtkTerdaftarId();
				$arr['ptk_id'] = $ptkTerdaftar->getPtkId();
				$arr['ptk_induk'] = $ptkTerdaftar->getPtkInduk();
				$arr['tanggal_surat_tugas'] = $ptkTerdaftar->getTanggalSuratTugas();
				$arr['nama'] = $ptkTerdaftar->getPtk()->getNama();
				$arr['jenis_kelamin'] = $ptkTerdaftar->getPtk()->getJenisKelamin();
				$arr['tempat_lahir'] = $ptkTerdaftar->getPtk()->getTempatLahir();
				$arr['tanggal_lahir'] = $ptkTerdaftar->getPtk()->getTanggalLahir();
				$arr['agama_id'] = $ptkTerdaftar->getPtk()->getAgamaId();
				$arr['agama_id_str'] = $ptkTerdaftar->getPtk()->getAgama()->getNama();
				$arr['nuptk'] = $ptkTerdaftar->getPtk()->getNuptk();
				$arr['nik'] = $ptkTerdaftar->getPtk()->getNik();
				$arr['jenis_ptk_id'] = $ptkTerdaftar->getPtk()->getJenisPtkId();
				$arr['jenis_ptk_id_str'] = $ptkTerdaftar->getPtk()->getJenisPtk()->getJenisPtk();
				$arr['status_kepegawaian_id'] = $ptkTerdaftar->getPtk()->getStatusKepegawaianId();
				$arr['status_kepegawaian_id_str'] = $ptkTerdaftar->getPtk()->getStatusKepegawaian()->getNama();
				$arr['nip'] = $ptkTerdaftar->getPtk()->getNip();
				$arr['pendidikan_terakhir'] = is_object($rwyPendFormalObj) ? $rwyPendFormalObj->getJenjangPendidikan()->getNama()  : "-";
				$arr['bidang_studi_terakhir'] = is_object($rwyPendFormalObj) ? $rwyPendFormalObj->getBidangStudi()->getBidangStudi() : "-";
				$arr['pangkat_golongan_terakhir'] = $pangkat_golongan_id_str;
				$arr['rwy_pend_formal'] = $rwyPendFormalAllArr;
				$arr['rwy_kepangkatan'] = $rwyKepangkatanArr;

				$outArr[] = $arr;
			}

			return tableJson($outArr, $ptkTerdaftarCount, PtkTerdaftarPeer::getFieldNames(\BasePeer::TYPE_FIELDNAME));
		}

	}

	function getPengguna() {

		$tahun_ajaran_id = $this->getTahunAjaranId();
		$sekolah_id = $this->getSekolahId();
		$params = $this->getParameter();

		$c = new \Criteria();
		$c->addJoin(PenggunaPeer::PENGGUNA_ID, RolePenggunaPeer::PENGGUNA_ID);
		// $c->add(PenggunaPeer::SEKOLAH_ID, $sekolah_id);
		$c->add(PenggunaPeer::SOFT_DELETE, 0);
		$c->add(PenggunaPeer::AKTIF, 1);
		$c->add(RolePenggunaPeer::SEKOLAH_ID, $sekolah_id);
		$c->add(RolePenggunaPeer::EXPIRED_DATE, NULL, \Criteria::ISNULL);
		// $c->add(RolePenggunaPeer::PERAN_ID, array(10,53,90), \Criteria::IN);

		if ($params['peran_id']) {
			$c->add(RolePenggunaPeer::PERAN_ID, $params['peran_id']);
		}

		$c->addAscendingOrderByColumn(RolePenggunaPeer::PERAN_ID);
		$penggunaObj = RolePenggunaPeer::doSelect($c);
        $penggunaCount = RolePenggunaPeer::doCount($c);

        if ($penggunaCount < 1) {
			$this->setHttpCode(403);
			$this->setMessageError('Data Pengguna tidak ditemukan');

			return $this->getStatusCode();
		} else {

			$outArr = array();
			foreach ($penggunaObj as $pengguna) {
				if ($pengguna->getPengguna()->getPesertaDidikId()) {
					$arrParam['npsn'] = $params['npsn'];
					$arrParam['peserta_didik_id'] = $pengguna->getPengguna()->getPesertaDidikId();

					$this->setParameter($arrParam);
					$getPesertaDidik = $this->getPesertaDidik();
					$recPd = json_decode($getPesertaDidik, true);
					// print_r($recPd);

					if (!array_key_exists('results', $recPd)) {
						continue;
					}
				}

				if ($pengguna->getPengguna()->getPtkId() && $pengguna->getPeranId() != 10) {
					$arrParam['npsn'] = $params['npsn'];
					$arrParam['ptk_id'] = $pengguna->getPengguna()->getPtkId();

					$this->setParameter($arrParam);
					$getGtk = $this->getGtk();
					$recGtk = json_decode($getGtk, true);
					// print_r($recGtk);

					if (!array_key_exists('results', $recGtk)) {
						continue;
					}
				}

				$arr['pengguna_id'] = $pengguna->getPenggunaId();	
				$arr['sekolah_id'] = $pengguna->getSekolahId();
				$arr['username'] = $pengguna->getPengguna()->getUsername();
				$arr['nama'] = $pengguna->getPengguna()->getNama();
				$arr['peran_id_str'] = is_object($pengguna->getPeran()) ? $pengguna->getPeran()->getNama() : "Operator-Sekolah";
				$arr['password'] = $pengguna->getPengguna()->getPassword();
				$arr['alamat'] = $pengguna->getPengguna()->getAlamat();
				$arr['no_telepon'] = $pengguna->getPengguna()->getNoTelepon();
				$arr['no_hp'] = $pengguna->getPengguna()->getNoHp();
				$arr['ptk_id'] = $pengguna->getPengguna()->getPtkId();
				$arr['peserta_didik_id'] = $pengguna->getPengguna()->getPesertaDidikId();

				$outArr[] = $arr;
			}

			return tableJson($outArr, count($outArr), PenggunaPeer::getFieldNames(\BasePeer::TYPE_FIELDNAME));
		}

	}

	function getPesertaDidik() {

		$tahun_ajaran_id = $this->getTahunAjaranId();
		$semester_id = $this->getSemesterId();
		$sekolah_id = $this->getSekolahId();
		$params = $this->getParameter();

		$c = new \Criteria();
		$c->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, \Criteria::INNER_JOIN);
		$c->add(RegistrasiPesertaDidikPeer::SEKOLAH_ID, $sekolah_id);
		$c->add(RegistrasiPesertaDidikPeer::SOFT_DELETE, 0);
		$c->add(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, NULL, \Criteria::ISNULL);
		$c->add(PesertaDidikPeer::SOFT_DELETE, 0);

		if ($params['peserta_didik_id']) {
			$c->add(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, $params['peserta_didik_id']);
		}		

		$registrasiPdObj = RegistrasiPesertaDidikPeer::doSelect($c);
        $registrasiPdCount = RegistrasiPesertaDidikPeer::doCount($c);

        if ($registrasiPdCount < 1) {
			$this->setHttpCode(403);
			$this->setMessageError('Data Peserta Didik tidak ditemukan');

			return $this->getStatusCode();
		} else {

			$outArr = array();
			foreach ($registrasiPdObj as $rpd) {

				$c = new \Criteria();
				$c->add(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID, $rpd->getPesertaDidikId());
				$c->add(PesertaDidikLongitudinalPeer::SEMESTER_ID, $semester_id);
				$c->add(PesertaDidikLongitudinalPeer::SOFT_DELETE, 0);
				$pesLongObj = PesertaDidikLongitudinalPeer::doSelectOne($c);

				$arr['registrasi_id'] = $rpd->getRegistrasiId();
				$arr['jenis_pendaftaran_id'] = $rpd->getJenisPendaftaranId();
				$arr['jenis_pendaftaran_id_str'] = $rpd->getJenisPendaftaran()->getNama();
				$arr['nipd'] = $rpd->getNipd();
				$arr['tanggal_masuk_sekolah'] = $rpd->getTanggalMasukSekolah();
				$arr['sekolah_asal'] = $rpd->getSekolahAsal();
				$arr['peserta_didik_id'] = $rpd->getPesertaDidikId();
				$arr['nama'] = $rpd->getPesertaDidik()->getNama();
				$arr['nisn'] = $rpd->getPesertaDidik()->getNisn();
				$arr['jenis_kelamin'] = $rpd->getPesertaDidik()->getJenisKelamin();
				$arr['nik'] = $rpd->getPesertaDidik()->getNik();
				$arr['tempat_lahir'] = $rpd->getPesertaDidik()->getTempatLahir();
				$arr['tanggal_lahir'] = $rpd->getPesertaDidik()->getTanggalLahir();
				$arr['agama_id'] = $rpd->getPesertaDidik()->getAgamaId();
				$arr['agama_id_str'] = $rpd->getPesertaDidik()->getAgama()->getNama();
				$arr['alamat_jalan'] = $rpd->getPesertaDidik()->getAlamatJalan();
				$arr['nomor_telepon_rumah'] = $rpd->getPesertaDidik()->getNomorTeleponRumah();
				$arr['nomor_telepon_seluler'] = $rpd->getPesertaDidik()->getNomorTeleponSeluler();
				$arr['nama_ayah'] = $rpd->getPesertaDidik()->getNamaAyah();
				$arr['pekerjaan_ayah_id'] = $rpd->getPesertaDidik()->getPekerjaanIdAyah();
				if (is_object($rpd->getPesertaDidik()->getPekerjaanRelatedByPekerjaanIdAyah())) {
					$arr['pekerjaan_ayah_id_str'] = $rpd->getPesertaDidik()->getPekerjaanRelatedByPekerjaanIdAyah()->getNama();
				} else {
					$arr['pekerjaan_ayah_id_str'] = "";
				}
				$arr['nama_ibu'] = $rpd->getPesertaDidik()->getNamaIbuKandung();
				$arr['pekerjaan_ibu_id'] = $rpd->getPesertaDidik()->getPekerjaanIdIbu();
				if (is_object($rpd->getPesertaDidik()->getPekerjaanRelatedByPekerjaanIdIbu())) {
					$arr['pekerjaan_ibu_id_str'] = $rpd->getPesertaDidik()->getPekerjaanRelatedByPekerjaanIdIbu()->getNama();
				} else {
					$arr['pekerjaan_ibu_id_str'] = "";
				}
				$arr['nama_wali'] = $rpd->getPesertaDidik()->getNamaWali();
				$arr['pekerjaan_wali_id'] = $rpd->getPesertaDidik()->getPekerjaanIdWali();
				if (is_object($rpd->getPesertaDidik()->getPekerjaanRelatedByPekerjaanIdWali())) {
					$arr['pekerjaan_wali_id_str'] = $rpd->getPesertaDidik()->getPekerjaanRelatedByPekerjaanIdWali()->getNama();
				} else {
					$arr['pekerjaan_wali_id_str'] = "";
				}
				$ar['anak_keberapa'] = $rpd->getPesertaDidik()->getAnakKeberapa();
				if (is_object($pesLongObj)) {
					$arr['tinggi_badan'] = $pesLongObj->getTinggiBadan();
					$arr['berat_badan'] = $pesLongObj->getBeratBadan();
				}
				$arr['semester_id'] = $semester_id;
				$arr['email'] = $rpd->getPesertaDidik()->getEmail();

				$c = new \Criteria();
				$c->addJoin(AnggotaRombelPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, \Criteria::INNER_JOIN);
				$c->add(AnggotaRombelPeer::PESERTA_DIDIK_ID, $rpd->getPesertaDidikId());
				$c->add(AnggotaRombelPeer::SOFT_DELETE, 0);
				$c->add(RombonganBelajarPeer::SOFT_DELETE, 0);
				$c->add(RombonganBelajarPeer::SEMESTER_ID, $semester_id);
				$c->add(RombonganBelajarPeer::JENIS_ROMBEL, array(1,8,9,10,11,12,13,14), \Criteria::IN);
				$anggotaRombelObj = AnggotaRombelPeer::doSelectOne($c);
				// $anggotaRombelObj = $rpd->getPesertaDidik()->getAnggotaRombels($c);

				if (is_object($anggotaRombelObj)) {
					$arr['anggota_rombel_id'] = $anggotaRombelObj->getAnggotaRombelId();
					$arr['rombongan_belajar_id'] = $anggotaRombelObj->getRombonganBelajarId();
					$arr['tingkat_pendidikan_id'] = $anggotaRombelObj->getRombonganBelajar()->getTingkatPendidikanId();
					$arr['semester_id'] = $anggotaRombelObj->getRombonganBelajar()->getSemesterId();
					$arr['nama_rombel'] = $anggotaRombelObj->getRombonganBelajar()->getNama();
					$arr['kurikulum_id'] = $anggotaRombelObj->getRombonganBelajar()->getKurikulumId();
					$arr['kurikulum_id_str'] = $anggotaRombelObj->getRombonganBelajar()->getKurikulum()->getNamaKurikulum();
				} else {
					$arr['anggota_rombel_id'] = "Belum masuk ke dalam rombongan belajar";
				}

				$outArr[] = $arr;
			}

			return tableJson($outArr, count($outArr), RegistrasiPesertaDidikPeer::getFieldNames(\BasePeer::TYPE_FIELDNAME));
		}

	}

	function getRombonganBelajar() {

		$tahun_ajaran_id = $this->getTahunAjaranId();
		$semester_id = $this->getSemesterId();
		$sekolah_id = $this->getSekolahId();

		$c = new \Criteria();
		$c->add(RombonganBelajarPeer::SEKOLAH_ID, $sekolah_id);
		$c->add(RombonganBelajarPeer::SOFT_DELETE, 0);
		$c->add(RombonganBelajarPeer::JENIS_ROMBEL, array(1,2,8,9,10,11,12,13,51), \Criteria::IN);
		$c->add(RombonganBelajarPeer::SEMESTER_ID, $semester_id);
		$c->addAscendingOrderByColumn(RombonganBelajarPeer::JENIS_ROMBEL);
		$c->addAscendingOrderByColumn(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID);

		$rombelObj = RombonganBelajarPeer::doSelect($c);
		$rombelCount = RombonganBelajarPeer::doCount($c);

		if ($rombelCount < 1) {
			$this->setHttpCode(403);
			$this->setMessageError('Data Rombongan Belajar tidak ditemukan');

			return $this->getStatusCode();
		} else {

			$outArr = array();
			foreach ($rombelObj as $rombel) {
				$jenisRombelObj = JenisRombelPeer::retrieveByPk($rombel->getJenisRombel());

				$arr['rombongan_belajar_id'] = $rombel->getRombonganBelajarId();
				$arr['nama'] = $rombel->getNama();
				$arr['tingkat_pendidikan_id'] = $rombel->getTingkatPendidikanId();
				$arr['semester_id'] = $rombel->getSemesterId();
				$arr['jenis_rombel'] = $rombel->getJenisRombel();
				$arr['kurikulum_id'] = $rombel->getKurikulumId();
				$arr['kurikulum_id_str'] = $rombel->getKurikulum()->getNamaKurikulum();
				$arr['id_ruang'] = $rombel->getIdRuang();
				$arr['id_ruang_str'] = $rombel->getRuang()->getNmRuang();
				$arr['moving_class'] = $rombel->getMovingClass()==1 ? "Ya" : "Tidak";
				$arr['ptk_id'] = $rombel->getPtkId();

				if ($rombel->getPtkId()) {
					$arr['ptk_id_str'] = $rombel->getPtk()->getNama();
				}

				if (is_object($jenisRombelObj)) {
					$arr['jenis_rombel_str'] = $jenisRombelObj->getNmJenisRombel();
				}

				if ($rombel->getJurusanSpId()) {
					$jurusanSpObj = JurusanSpPeer::retrieveByPk($rombel->getJurusanSpId());

					$arr['jurusan_id'] = $jurusanSpObj->getJurusanId();
					$arr['jurusan_id_str'] = $jurusanSpObj->getJurusan()->getNamaJurusan();
				}

				$c = new \Criteria();
				$c->add(AnggotaRombelPeer::SOFT_DELETE, 0);
				$c->add(AnggotaRombelPeer::ROMBONGAN_BELAJAR_ID, $rombel->getRombonganBelajarId());
				$anggotaRombelObj = AnggotaRombelPeer::doSelect($c);
				
				$anggota_rombel = [];
				foreach ($anggotaRombelObj as $anggotaRombel) {
					$arrAnggotaRombel['anggota_rombel_id'] = $anggotaRombel->getAnggotaRombelId();
					$arrAnggotaRombel['peserta_didik_id'] = $anggotaRombel->getPesertaDidikId();
					$arrAnggotaRombel['jenis_pendaftaran_id'] = $anggotaRombel->getJenisPendaftaranId();
					$arrAnggotaRombel['jenis_pendaftaran_id_str'] = $anggotaRombel->getJenisPendaftaran()->getNama();

					$anggota_rombel[] = $arrAnggotaRombel;
				}
				$arr['anggota_rombel'] = $anggota_rombel;

				if ($rombel->getJenisRombel() == 51) {
					$c = new \Criteria();
					$c->add(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID, $rombel->getRombonganBelajarId());
					$c->add(KelasEkskulPeer::SOFT_DELETE, 0);
					$kelasEkskulObj = KelasEkskulPeer::doSelectOne($c);

					if (is_object($kelasEkskulObj)) {
						$arr['id_kelas_ekskul'] = $kelasEkskulObj->getIdKelasEkskul();
						$arr['id_ekskul'] = $kelasEkskulObj->getIdEkskul();
						$arr['nm_ekskul'] = $kelasEkskulObj->getNmEkskul();
						$arr['sk_ekskul'] = $kelasEkskulObj->getSkEkskul();

						if (is_object($kelasEkskulObj->getEkstraKurikuler())) {
							$arr['id_ekskul_str'] = $kelasEkskulObj->getEkstraKurikuler()->getNmEkskul();
						}
					}
				} else {
					$c = new \Criteria();
					$c->add(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, $rombel->getRombonganBelajarId());
					$c->add(PembelajaranPeer::SOFT_DELETE, 0);
					$c->add(PembelajaranPeer::SEMESTER_ID, $semester_id);
					$pembelajaranObj = PembelajaranPeer::doSelect($c);

					$pembelajaranArr = [];
					foreach ($pembelajaranObj as $pembelajaran) {
						$statusDiKurikulumObj = StatusDiKurikulumPeer::retrieveByPk($pembelajaran->getStatusDiKurikulum());

						$arrPembelajaran['pembelajaran_id'] = $pembelajaran->getPembelajaranId();
						$arrPembelajaran['mata_pelajaran_id'] = $pembelajaran->getMataPelajaranId();
						$arrPembelajaran['mata_pelajaran_id_str'] = $pembelajaran->getMataPelajaran()->getNama();
						$arrPembelajaran['ptk_terdaftar_id'] = $pembelajaran->getPtkTerdaftarId();
						$arrPembelajaran['ptk_id'] = $pembelajaran->getPtkTerdaftar()->getPtkId();
						$arrPembelajaran['nama_mata_pelajaran'] = $pembelajaran->getNamaMataPelajaran();
						$arrPembelajaran['induk_pembelajaran_id'] = $pembelajaran->getIndukPembelajaranId();
						$arrPembelajaran['jam_mengajar_per_minggu'] = $pembelajaran->getJamMengajarPerMinggu();
						$arrPembelajaran['status_di_kurikulum'] = $pembelajaran->getStatusDiKurikulum();
						if (is_object($statusDiKurikulumObj)) {
							$arrPembelajaran['status_di_kurikulum_str'] = $statusDiKurikulumObj->getKetStatDiKurikulum();
						}

						$pembelajaranArr[] = $arrPembelajaran;
					}
					$arr['pembelajaran'] = $pembelajaranArr;
				}

				$outArr[] = $arr;
			}

			return tableJson($outArr, $rombelCount, RombonganBelajarPeer::getFieldNames(\BasePeer::TYPE_FIELDNAME));
		}

	}

	function getPrasarana() {
		$tahun_ajaran_id = $this->getTahunAjaranId();
		$semester_id = $this->getSemesterId();
		$sekolah_id = $this->getSekolahId();

		$c = new \Criteria();
		$c->add(TanahPeer::SEKOLAH_ID, $sekolah_id);
		$c->add(TanahPeer::SOFT_DELETE, 0);
		$c->add(TanahPeer::ID_HAPUS_BUKU, NULL, \Criteria::ISNULL);
		$tanahCount = TanahPeer::doCount($c);
		$tanahObj = TanahPeer::doSelect($c);

		foreach ($tanahObj as $tanah) {
			$c = new \Criteria();
			$c->add(BangunanPeer::ID_TANAH, $tanah->getIdTanah());
			$c->add(BangunanPeer::SEKOLAH_ID, $tanah->getSekolahId());
			$c->add(BangunanPeer::ID_HAPUS_BUKU, NULL, \Criteria::ISNULL);
			$c->add(BangunanPeer::SOFT_DELETE, 0);
			$bangunanObj = BangunanPeer::doSelect($c);

			$arr['id_tanah'] = $tanah->getIdTanah();
			$arr['jenis_prasarana_id'] = $tanah->getJenisPrasaranaId();
			$arr['jenis_prasarana_id_str'] = $tanah->getJenisPrasarana()->getNama();
			$arr['nama'] = trim($tanah->getNama());
			$arr['no_sertifikat_tanah'] = $tanah->getNoSertifikatTanah();
			$arr['panjang'] = $tanah->getPanjang();
			$arr['lebar'] = $tanah->getLebar();
			$arr['luas_lahan_tersedia'] = $tanah->getLuasLahanTersedia();
			$arr['kepemilikan_sarpras'] = $tanah->getStatusKepemilikanSarpras()->getNama();
			$arr['ket_tanah'] = $tanah->getKetTanah();

			$bangunanArr = [];
			foreach ($bangunanObj as $bangunan) {
				$arrBangunan['id_bangunan'] = $bangunan->getIdBangunan();
				$arrBangunan['jenis_prasarana_id'] = $bangunan->getJenisPrasaranaId();
				$arrBangunan['jenis_prasarana_id_str'] = $bangunan->getJenisPrasarana()->getNama();
				$arrBangunan['kepemilikan_sarpras'] = $bangunan->getStatusKepemilikanSarpras()->getNama();
				$arrBangunan['nama'] = trim($bangunan->getNama());
				$arrBangunan['panjang'] = $bangunan->getPanjang();
				$arrBangunan['lebar'] = $bangunan->getLebar();
				$arrBangunan['luas_tapak_bangunan'] = $bangunan->getLuasTapakBangunan();
				$arrBangunan['jml_lantai'] = $bangunan->getJmlLantai();
				$arrBangunan['thn_dibangun'] = $bangunan->getThnDibangun();

				$c = new \Criteria();
				$c->add(RuangPeer::ID_BANGUNAN, $bangunan->getIdBangunan());
				$c->add(RuangPeer::SOFT_DELETE, 0);
				$ruangObj = RuangPeer::doSelect($c);

				$ruangArr = [];
				foreach ($ruangObj as $ruang) {
					$arrRuang['id_ruang'] = $ruang->getIdRuang();
					$arrRuang['jenis_prasarana_id'] = $ruang->getJenisPrasaranaId();
					$arrRuang['jenis_prasarana_id_str'] = $ruang->getJenisPrasarana()->getNama();
					$arrRuang['kode_ruang'] = $ruang->getKdRuang();
					$arrRuang['nama_ruang'] = trim($ruang->getNmRuang());
					$arrRuang['registrasi_ruang'] = $ruang->getRegPras();
					$arrRuang['lantai_ke'] = $ruang->getLantai();
					$arrRuang['panjang'] = $ruang->getPanjang();
					$arrRuang['lebar'] = $ruang->getLebar();

					$ruangArr[] = $arrRuang;
				}

				$arrBangunan['jumlah_ruang'] = sizeof($ruangArr);
				$arrBangunan['ruang'] = $ruangArr;
				$bangunanArr[] = $arrBangunan;
			}
			$arr['jumlah_bangunan'] = sizeof($bangunanArr);
			$arr['bangunan'] = $bangunanArr;

			$outArr[] = $arr;
		}

		return tableJson($outArr, $tanahCount, TanahPeer::getFieldNames(\BasePeer::TYPE_FIELDNAME));
	}

	function getCustomQuery(Request $request, Application $app) {
		$tahun_ajaran_id = $this->getTahunAjaranId();
		$semester_id = $this->getSemesterId();
		$sekolah_id = $this->getSekolahId();
		$string = $this->getString();
		$params = $this->getParameter();

		$user_input = sha1(strtotime(date("Y-m-d")));
		$pass_crypt = crypt($params['npsn'], $user_input);
		
		if (strlen($string) < 10) {
			$this->setHttpCode(403);
			$this->setMessageError('Parameter query harap diisi');

			die($this->getStatusCode());
		}

		// echo $params['npsn'];
		// echo " - ".$pass_crypt;
		// echo " - ".$params['key'];
		if ($pass_crypt !== $params['key']) {
			$this->setHttpCode(403);
			$this->setMessageError('Parameter key tidak sesuai');

			die($this->getStatusCode());
		}

		try {
			$cek_sql = $this->permissionSql($string);
			$result = json_decode($cek_sql);
			
			if ($result->success === true) {
				$con = \Propel::getConnection("pendataan_ro");
				$stmt = $con->prepare($string);
				$stmt->execute();
				$result = $stmt->setFetchMode(\PDO::FETCH_ASSOC);
				$res = $stmt->fetchAll();

				$outArr = $res;
			} else {
				$this->setHttpCode(400);
				$this->setMessageError('Query tidak diizinkan (syntax '.$result->message.')');

				die($this->getStatusCode());
			}
		} catch (\PDOException $err) {
			$this->setHttpCode(400);
			$this->setMessageError($err->getMessage());

			die($this->getStatusCode());
		}

		return tableJson($outArr, count($outArr), SekolahPeer::getFieldNames(\BasePeer::TYPE_FIELDNAME));
	}

	function getValidation(Request $request, Application $app) {

		$tahun_ajaran_id = $this->getTahunAjaranId();
		$semester_id = $this->getSemesterId();
		$sekolah_id = $this->getSekolahId();
		$jenis_validasi = $request->get('jenis_validasi');
		$email = $request->get('email');

		// return $sekolah_id;
		if ($jenis_validasi) {
			$params[] = $jenis_validasi;
		} else {
			$params = array("sekolah", "prasarana", "rombongan_belajar", "peserta_didik", "ptk", "referensi", "pembelajaran", "nilai");
		}

		$validation = new Validation();
		$validation->setSekolahId($sekolah_id);
		$validation->setSemesterId($semester_id);
		$app['session']->set('sekolah', array('sekolah_id' => $sekolah_id));

		$request->query->set('callback', "sync");
		$countInvalid = 0;
		$countWarning = 0;
		$arrInvalid = array();
		foreach ($params as $param) {
			
			// print_r($param); die;
			$request->query->set('jenis_validasi', $param);
			$checkAll = $validation->checkAll($request, $app);

			$checkAllJson = json_decode($checkAll, true);
			$arrRows = $checkAllJson['rows'];
			$countRows = count($checkAllJson['rows']);
			// print_r($checkAllJson);
			// echo $countRows;
			foreach ($arrRows as $row) {
				// print_r($row); die;
				if ($row['tipe'] == 1) {
					$countWarning++;
				} else {
					$arrInvalid[] = $row;
					$countInvalid++;
				}
			}
		}

		$arr['success'] = true;
		$arr['jenis_validasi'] = $jenis_validasi ? $jenis_validasi : $params;
		$arr['jumlah_warning'] = $countWarning;
		$arr['jumlah_invalid'] = $countInvalid;
		
		/* if (in_array($email, array(
			'esman.ariadji@yahoo.com',
			'goenawants@gmail.com',
			'sdn_bayongbong03@yahoo.co.id',
			'slbbdharmawanitakotabogor@yahoo.com',
			'slbbiman_bgd@yahoo.co.id',
			'fangq.manz@gmail.com',
			'slb.ephphatha@yahoo.com',
			'kaktommy@gmail.com',
			'komangpur@gmail.com',
			'andrey.ashanta@gmail.com',
			'nympasek3@gmail.com',
			'dhonimardiansyah596@gmail.com',
			'dandikdas@gmail.com',
			'adam.dikdas@gmail.com',
			'chandbrill@gmail.com',
			'ariusa09@gmail.com',
			'goeslinar08@gmail.com',
			'dikwa28@gmail.com',
			'asrosita@gmail.com',
			'kinghendro@gmail.com',
			'difah135@gmail.com'
		))) {
			$arr['jumlah_invalid'] = 0;
		} else {
			
		} */
		
		$app['session']->clear();
		return json_encode($arr);
	}

}

?>