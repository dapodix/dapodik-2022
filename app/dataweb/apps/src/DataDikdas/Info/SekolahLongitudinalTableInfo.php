<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;
use DataDikdas\ColumnInfo;
use DataDikdas;

class SekolahLongitudinalTableInfo extends base\BaseSekolahLongitudinalTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        $this->setIsSplitEntity(true);
        // Override below here!

        $arrayData = array(
        		// identitas
        		/* 'waktu_penyelenggaraan_id',
        		'akreditasi_id',
        		'sertifikasi_iso_id',
        		'wilayah_terpencil',
        		'wilayah_perbatasan',
        		'wilayah_transmigrasi',
        		'wilayah_adat_terpencil',
        		'wilayah_bencana_alam',
        		'wilayah_bencana_sosial',
        		'sumber_listrik_id',
                'daya_listrik',
                'kontinuitas_listrik',
                'akses_internet_2_id',
                'akses_internet_id' */
                
                'waktu_penyelenggaraan_id',
                'sumber_listrik_id',
                'jarak_listrik',
                'daya_listrik',
                'kontinuitas_listrik',
                'partisipasi_bos',
                'sertifikasi_iso_id',
                'akses_internet_id',
                'akses_internet_2_id',

                'sekolah_longitudinal_id',
                'semester_id',
                'wilayah_terpencil',
                'wilayah_perbatasan',
                'wilayah_transmigrasi',
                'wilayah_adat_terpencil',
                'wilayah_bencana_alam',
                'wilayah_bencana_sosial',
                'blob_id'
        );

        for ($i=0; $i<sizeof($arrayData); $i++) {
        	$column_name = $arrayData[$i];
            $this->moveColumn($this->getColumnByName($column_name), $i);
        }

        // echo count($this->getColumns());
        // print_r($this->getColumns()); 
        // die;
        // $this->moveColumnBelow($this->getColumnByName('daya_listrik'), $this->getColumnByName('sumber_listrik_id'));
        // $this->moveColumnBelow($this->getColumnByName('akses_internet_2_id'), $this->getColumnByName('daya_listrik'));
        // $this->getColumnByName('sekolah_longitudinal_id')->setIsFk('0');
        // $this->getColumnByName('sekolah_longitudinal_id')->setFkTableName('');
        
        $this->getColumnByName('daya_listrik')->setLabel('Daya listrik (Watt)');

        $this->getColumnByName('wilayah_terpencil')->setLabel('Terpencil');
        $this->getColumnByName('wilayah_perbatasan')->setLabel('Perbatasan');
        $this->getColumnByName('wilayah_transmigrasi')->setLabel('Transmigrasi');
        $this->getColumnByName('wilayah_adat_terpencil')->setLabel('Adat');
        $this->getColumnByName('wilayah_bencana_alam')->setLabel('Bencana Alam');
        $this->getColumnByName('wilayah_bencana_sosial')->setLabel('Bencana Sosial');
        $this->getColumnByName('akses_internet_id')->setLabel('Akses Internet Alternatif');
        $this->getColumnByName('akses_internet_2_id')->setLabel('Akses Internet');
        $this->getColumnByName('sertifikasi_iso_id')->setLabel('Sertifikasi ISO');
        $this->getColumnByName('jarak_listrik')->setLabel('Jarak ke sumber listrik terdekat (m)');

        $this->getColumnByName('wilayah_terpencil')->setXtype('hidden');
        $this->getColumnByName('wilayah_perbatasan')->setXtype('hidden');
        $this->getColumnByName('wilayah_transmigrasi')->setXtype('hidden');
        $this->getColumnByName('wilayah_adat_terpencil')->setXtype('hidden');
        $this->getColumnByName('wilayah_bencana_alam')->setXtype('hidden');
        $this->getColumnByName('wilayah_bencana_sosial')->setXtype('hidden');

        $this->getColumnByName('partisipasi_bos')->setLabel('Bersedia menerima BOS?');
        $this->getColumnByName('partisipasi_bos')->setEnumValues(array(1 => "Ya" , 0 => "Tidak"));

        $this->getColumnByName('kontinuitas_listrik')->setLabel('Waktu ketersediaan listrik');
        $this->getColumnByName('kontinuitas_listrik')->setEnumValues(array(1 => "Sepanjang waktu", 2 => "Pagi", 3 => "Malam"));

        // $this->getColumnByName('blob_id')->setXtype('hidden');

        /* $cbg = new \DataDikdas\CheckboxGroupInfo();
      	$cbg->setColumnNumber(3);
		$this->addRange('wilayah_terpencil', 'wilayah_bencana_sosial', $cbg, 'Wilayah Khusus'); */

        // $this->moveColumnBelow($this->getColumnByName('akreditasi_id'), $this->getColumnByName('akses_internet_id'));

        $this->getColumnByName('daya_listrik')->setDescription('Diisi dengan angka daya listrik yang dimiliki sekolah. Satuan yang digunakan adalah Watt.');
        $this->getColumnByName('wilayah_terpencil')->setDescription('Centang wilayah terpencil. Pemilihan wilayah tersebut harus sesuai dengan SK yang telah ditetapkan mengenai wilayah khusus dari Gubernur/Walikota/Bupati.');
        $this->getColumnByName('wilayah_perbatasan')->setDescription('Centang wilayah perbatasan. Pemilihan wilayah tersebut harus sesuai dengan SK yang telah ditetapkan mengenai wilayah khusus dari Gubernur/Walikota/Bupati.');
        $this->getColumnByName('wilayah_transmigrasi')->setDescription('Centang wilayah transmigrasi. Pemilihan wilayah tersebut harus sesuai dengan SK yang telah ditetapkan mengenai wilayah khusus dari Gubernur/Walikota/Bupati.');
        $this->getColumnByName('wilayah_adat_terpencil')->setDescription('Centang wilayah adat terpencil. Pemilihan wilayah tersebut harus sesuai dengan SK yang telah ditetapkan mengenai wilayah khusus dari Gubernur/Walikota/Bupati.');
        $this->getColumnByName('wilayah_bencana_alam')->setDescription('Centang wilayah bencana alam berdasarkan SK dari Gubernur/Walikota/Bupati.');
        $this->getColumnByName('wilayah_bencana_sosial')->setDescription('Centang wilayah bencana sosial. Pemilihan wilayah tersebut harus sesuai dengan SK yang telah ditetapkan mengenai wilayah khusus. Sekolah yang tidak berada di salah satu daerah khusus, tidak perlu mencentang apa pun.');
        $this->getColumnByName('akses_internet_id')->setDescription('Pilih akses Internet alternatif yang dimiliki oleh sekolah.');
        $this->getColumnByName('akses_internet_2_id')->setDescription('Pilih akses Internet utama yang dimiliki oleh sekolah.');
        // $this->getColumnByName('akreditasi_id')->setDescription('Pilih tingkat akreditasi yang telah dimiliki oleh sekolah (A sampai C). Pilih Tidak Diakreditasi jika tidak memiliki akreditasi. Pilih Belum Diakreditasi jika sekolah akan atau dalam proses akreditasi.');
        $this->getColumnByName('waktu_penyelenggaraan_id')->setDescription('Pilih waktu penyelenggaraan kegiatan belajar dan mengajar. Pilih Kombinasi jika KBM diselenggarakan pagi dan siang, pilih');
        $this->getColumnByName('sumber_listrik_id')->setDescription('Pilih sumber listrik utama yang dimiliki oleh sekolah.');
        $this->getColumnByName('sertifikasi_iso_id')->setDescription('ISO adalah singkatan dari International Organization for Standardization. Sebuah badan internasional yang menangani standarisasi. Pilih jenis ISO yang telah dimiliki sekolah, antara lain ISO 9001:2000 atau ISO 9001:2008 (revisi dari 9001:2000). Pilih opsi Proses Sertifikasi jika sekolah sedang dalam proses memperoleh sertifikasi. Atau, pilih opsi Belum Bersertifikat jika sekolah belum memiliki sertifikat ISO.');



    }

}