<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class SekolahPaudTableInfo extends base\BaseSekolahPaudTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $arrayData = array (
            // kategori tk (khusus tk) => combo
            // fasilitas layanan kpd lembaga lain => combo
            // pencatatan hasil ddtk di satuan paud => ada, belum ada
            // sistem rujukan ddtk ke puskesmas => ada, belum ada
            // jadwal pmtas => combo
            // jadwal pemeriksaan deteksi dini tumbuh kembang (ddtk) => combo
            // freq parenting => combo
            // jadwal kesehatan => combo
            // izin paud dikeluarkan oleh => combo
            // masa berlaku izin sampai dengan
            // sumber pendaaan utama
            // no sertifikat/surat tanah
            // pelaksanaan program parenting => sudah. belum
            // bentuk program parenting yg sudah berjalan
            'kategori_tk_id',
            'nilk',
            'nilm',
            'fasilitas_layanan_id',
            'pencatatan_ddtk',
            'rujukan_ddtk',
            'jadwal_pmtas',
            'jadwal_ddtk',
            'freq_parenting',
            'jadwal_kesehatan',
            'izin_paud',
            'sumber_dana_sekolah_id',
            'pelaksanaan_parenting',
            
            'parenting_kpo',
            'parenting_kelas',
            'parenting_kegiatan',
            'parenting_konsultasi',
            'parenting_kunjungan',
            'parenting_lainnya',

            'sekolah_id',
            'bentuk_lembaga_id',
            'klasifikasi_lembaga_id',
            'lembaga_pengangkat_id',
            'no_penetapan_pnf',
            'tanggal_penetapan_pnf'

        );

        for ($i=0; ($i<sizeof($arrayData)); $i++) {
        	$column_name = $arrayData[$i];
        	// echo $column_name."<br>";
        	$this->moveColumn($this->getColumnByName($column_name), $i);
        }

        $this->getColumnByName('nilk')->setXtype('hidden');
        $this->getColumnByName('nilm')->setXtype('hidden');
        $this->getColumnByName('freq_parenting')->setHideColumn(1);
        $this->getColumnByName('pelaksanaan_parenting')->setHideColumn(1);
        $this->getColumnByName('parenting_kpo')->setHideColumn(1);
        $this->getColumnByName('parenting_kelas')->setHideColumn(1);
        $this->getColumnByName('parenting_kegiatan')->setHideColumn(1);
        $this->getColumnByName('parenting_konsultasi')->setHideColumn(1);
        $this->getColumnByName('parenting_kunjungan')->setHideColumn(1);
        $this->getColumnByName('parenting_lainnya')->setHideColumn(1);
        $this->getColumnByName('lembaga_pengangkat_id')->setHideColumn(1);
        $this->getColumnByName('izin_paud')->setHideColumn(1);
        
        $this->getColumnByName('freq_parenting')->setXtype('textfield');
        $this->getColumnByName('pelaksanaan_parenting')->setXtype('textfield');
        $this->getColumnByName('parenting_kpo')->setXtype('textfield');
        $this->getColumnByName('parenting_kelas')->setXtype('textfield');
        $this->getColumnByName('parenting_kegiatan')->setXtype('textfield');
        $this->getColumnByName('parenting_konsultasi')->setXtype('textfield');
        $this->getColumnByName('parenting_kunjungan')->setXtype('textfield');
        $this->getColumnByName('parenting_lainnya')->setXtype('textfield');
        $this->getColumnByName('lembaga_pengangkat_id')->setXtype('textfield');
        $this->getColumnByName('izin_paud')->setXtype('textfield');

        $this->getColumnByName('kategori_tk_id')->setXtype('kategoritkcombo');
        $this->getColumnByName('sumber_dana_sekolah_id')->setXtype('sumberdanasekolahcombo');
        $this->getColumnByName('fasilitas_layanan_id')->setXtype('fasilitaslayanancombo');
        $this->getColumnByName('bentuk_lembaga_id')->setXtype('bentuklembagacombo');
        $this->getColumnByName('klasifikasi_lembaga_id')->setXtype('klasifikasilembagacombo');
        $this->getColumnByName('jadwal_ddtk')->setXtype('klasifikasilembagacombo');
        $this->getColumnByName('jadwal_ddtk')->setXtype('jadwalpaudcombo');
        $this->getColumnByName('jadwal_pmtas')->setXtype('jadwalpaudcombo');
        $this->getColumnByName('jadwal_kesehatan')->setXtype('jadwalpaudcombo');

        $this->getColumnByName('kategori_tk_id')->setLabel('Kategori TK');
        $this->getColumnByName('fasilitas_layanan_id')->setLabel('Fasilitas layanan kpd lembaga lain');
        $this->getColumnByName('jadwal_pmtas')->setLabel('Jadwal PMT-AS');
        $this->getColumnByName('jadwal_ddtk')->setLabel('Jadwal pemeriksaan DDTK');
        $this->getColumnByName('freq_parenting')->setLabel('Jadwal frekuensi parenting');
        $this->getColumnByName('no_penetapan_pnf')->setLabel('No Penetapan Pendidikan Non Formal (PNF)');

        // $this->getColumnByName('izin_paud')->setLabel('Perizinan PAUD');
        // $this->getColumnByName('izin_paud')->setEnumValues(array(0 => 'Belum ada', 1 => 'Ada'));

        $this->getColumnByName('pencatatan_ddtk')->setLabel('Pencatatan hasil DDTK di satuan PAUD');
        $this->getColumnByName('pencatatan_ddtk')->setType('string');
        $this->getColumnByName('pencatatan_ddtk')->setEnumValues(array("0" => 'Belum ada', 1 => 'Ada'));

        $this->getColumnByName('rujukan_ddtk')->setLabel('Sistem rujukan DDTK ke puskesmas');
        $this->getColumnByName('rujukan_ddtk')->setType('string');
        $this->getColumnByName('rujukan_ddtk')->setEnumValues(array("0" => 'Belum ada', 1 => 'Ada'));

        // $this->getColumnByName('pelaksanaan_parenting')->setLabel('Pelaksanaan program parenting');
        // $this->getColumnByName('pelaksanaan_parenting')->setEnumValues(array("0" => 'Belum', 1 => 'Sudah'));

        // $parentingCheckbox = new \DataDikdas\CheckboxGroupInfo();
        // $parentingCheckbox->setColumnNumber(2);
		// $this->addRange('parenting_kpo', 'parenting_lainnya', $parentingCheckbox, 'Bentuk program parenting yg sudah berjalan');
        // $this->getColumnByName('parenting_kpo')->setLabel('Kelompok pertemuan orang tua');
        // $this->getColumnByName('parenting_kelas')->setLabel('Keterlibatan orang tua di kelas/kelompok');
        // $this->getColumnByName('parenting_kegiatan')->setLabel('Keterlibatan orangtua dalam kegiatan bersama (out bound, rekreasi, dll)');
        // $this->getColumnByName('parenting_konsultasi')->setLabel('Hari konsultasi');
        // $this->getColumnByName('parenting_kunjungan')->setLabel('Kunjungan rumah');
        // $this->getColumnByName('parenting_lainnya')->setLabel('Program lainnya');

        $this->getColumnByName('kategori_tk_id')->setDescription('Kategori TK: TK Negeri Pembina adalah TK yang dibangun oleh Pemerintah dan bertempat di ibukota Provinsi sebagai TK Negeri. TK Biasa adalah TK yang didirikan oleh yayasan atau masyarakat.');
        $this->getColumnByName('klasifikasi_lembaga_id')->setDescription('Pilih fasilitas layanan kepada lembaga lain');
        $this->getColumnByName('sumber_dana_sekolah_id')->setDescription('Pilih sumber dana sekolah');
        $this->getColumnByName('fasilitas_layanan_id')->setDescription('Pilih fasilitas layanan kepada lembaga lain');
        $this->getColumnByName('jadwal_pmtas')->setDescription('Pilih jadwal PMT-AS (Pemberian Makanan Tambahan Anak Sekolah) ');
        $this->getColumnByName('lembaga_pengangkat_id')->setDescription('Pilih lembaga pengangkat');
        $this->getColumnByName('jadwal_ddtk')->setDescription('Pilih jadwal DDTK (Deteksi Dini Tumbuh Kembang)');
        $this->getColumnByName('freq_parenting')->setDescription('Pilih frekuensi parenting');
        $this->getColumnByName('bentuk_lembaga_id')->setDescription('Pilih bentuk lembaga');
        $this->getColumnByName('jadwal_kesehatan')->setDescription('Pilih jadwal kesehatan');
        $this->getColumnByName('pencatatan_ddtk')->setDescription('Adakah pencatatan hasil DDTK');
        $this->getColumnByName('rujukan_ddtk')->setDescription('Adakah sistem rujukan DDTK ke Puskesmas');
        $this->getColumnByName('pelaksanaan_parenting')->setDescription('Pilih jenis pelaksanaan parenting');

    }
    
}