<?php
namespace DataDikdas\Info;

use DataDikdas\ColumnInfo;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class SekolahTableInfo extends base\BaseSekolahTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.SekolahTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {

    	parent::setVariables();

        $this->setTableValidation('vld_sekolah');

        // Override below here!
        /* $this->moveColumnBelow($this->getColumnByName('status_sekolah'), $this->getColumnByName('bentuk_pendidikan_id'));
        $this->moveColumnBelow($this->getColumnByName('nomor_telepon'), $this->getColumnByName('luas_tanah_bukan_milik'));
        $this->moveColumnBelow($this->getColumnByName('nomor_fax'), $this->getColumnByName('nomor_telepon'));
        $this->moveColumnBelow($this->getColumnByName('email'), $this->getColumnByName('nomor_fax'));
        $this->moveColumnBelow($this->getColumnByName('website'), $this->getColumnByName('email'));
        $this->moveColumnBelow($this->getColumnByName('mbs'), $this->getColumnByName('tanggal_sk_izin_operasional'));
        $this->moveColumnBelow($this->getColumnByName('luas_tanah_milik'), $this->getColumnByName('mbs'));
        $this->moveColumnBelow($this->getColumnByName('luas_tanah_bukan_milik'), $this->getColumnByName('luas_tanah_milik'));
        $this->moveColumnBelow($this->getColumnByName('npwp'), $this->getColumnByName('luas_tanah_bukan_milik'));
        $this->moveColumnBelow($this->getColumnByName('nm_wp'), $this->getColumnByName('npwp')); */

        $arrayData = array(
            // identitas sekolah
            'sekolah_id',
            'nama',
            'nama_nomenklatur',
            'npsn',
            'nss',
            'status_sekolah',
            'bentuk_pendidikan_id',
            'alamat_jalan',
            'desa_kelurahan',
            'kode_wilayah',
            
            // lokasi sekolah
            'rt',
            'rw',
            'nama_dusun',
            'kode_pos',
            'lintang',
            'bujur',

            // data administrati sekolah
            'kebutuhan_khusus_id',
            'sk_pendirian_sekolah',
            'tanggal_sk_pendirian',
            'status_kepemilikan_id',
            'sk_izin_operasional',
            'tanggal_sk_izin_operasional',
            'mbs',
            'luas_tanah_milik',
            'luas_tanah_bukan_milik',
            'npwp',
            'nm_wp',

            // nomor rekening BOS
            'no_rekening',
            'nama_bank',
            'cabang_kcp_unit',
            'rekening_atas_nama',

            // kontak sekolah
            'nomor_telepon',
            'nomor_fax',
            'email',
            'website',

            // hidden
            'yayasan_id',
            'kode_registrasi',
            // 'keaktifan',
            'flag'
        );

        // var_dump($this->getColumnByName); die;
        for ($i=0; $i<sizeof($arrayData); $i++) {
            $column_name = $arrayData[$i];
            $this->moveColumn($this->getColumnByName($column_name), $i);
        }

        $fieldSet = new \DataDikdas\FieldsetInfo();
        $this->addRange('nama', 'kode_wilayah', $fieldSet, 'Identitas Sekolah');
        $this->getColumnByName('nama')->setXtype('displayfield');
        $this->getColumnByName('nama_nomenklatur')->setXtype('displayfield');
        $this->getColumnByName('nss')->setXtype('displayfield');
        $this->getColumnByName('nss')->setLabel('NSS');
        $this->getColumnByName('nss')->setXtype('hidden');
        // $this->getColumnByName('npsn')->setXtype('displayfield');
        // $this->getColumnByName('npsn')->setLabel('NPSN');
        $this->getColumnByName('bentuk_pendidikan_id')->setDisabled(1);
        $this->getColumnByName('bentuk_pendidikan_id')->setAnchor(50);
        // $this->getColumnByName('bentuk_pendidikan_id')->setXtype('bentukpendidikancombo');
        $this->getColumnByName('lintang')->setXtype('displayfield');
        // $this->getColumnByName('lintang')->setType('double');
        $this->getColumnByName('lintang')->setMax(999999999999999999);
        $this->getColumnByName('lintang')->setInputLength(400);
        $this->getColumnByName('bujur')->setXtype('displayfield');
        // $this->getColumnByName('bujur')->setType('double');
        $this->getColumnByName('bujur')->setMax(999999999999999999);
        $this->getColumnByName('bujur')->setInputLength(400);

        $fieldSet2 = new \DataDikdas\FieldsetInfo();
        $this->addRange('rt', 'bujur', $fieldSet2, 'Lokasi Sekolah');
        $this->getColumnByName('alamat_jalan')->setLabel('Alamat');
        $this->getColumnByName('rt')->setLabel('RT');
        $this->getColumnByName('rt')->setAnchor(30);
        $this->getColumnByName('rw')->setLabel('RW');
        $this->getColumnByName('rw')->setAnchor(30);
        $this->getColumnByName('nama_dusun')->setAnchor(70);
        $this->getColumnByName('desa_kelurahan')->setAnchor(70);
        $this->getColumnByName('desa_kelurahan')->setLabel('Desa/Kelurahan');
        $this->getColumnByName('kode_wilayah')->setLabel('Kecamatan / Kabupaten');
        $this->getColumnByName('kode_wilayah')->setAnchor(70);
        $this->getColumnByName('kode_pos')->setXtype('numberfield');
        $this->getColumnByName('kode_pos')->setMinLength(5);
        $this->getColumnByName('kode_pos')->setAnchor(35);
        $this->getColumnByName('lintang')->setAnchor(50);
        $this->getColumnByName('lintang')->setMin(-99999999);
        $this->getColumnByName('lintang')->setDecimalPrecision(11);
        $this->getColumnByName('lintang')->setFormTextAlignRight(1);
        $this->getColumnByName('bujur')->setAnchor(50);
        $this->getColumnByName('bujur')->setMin(-99999999);
        $this->getColumnByName('bujur')->setDecimalPrecision(11);
        $this->getColumnByName('bujur')->setFormTextAlignRight(1);

        $fieldSet3 = new \DataDikdas\FieldsetInfo();
        $this->addRange('kebutuhan_khusus_id', 'nm_wp', $fieldSet3, 'Data Administrasi Sekolah');
        $this->getColumnByName('kebutuhan_khusus_id')->setLabel('Kebutuhan khusus dilayani');
        $this->getColumnByName('kebutuhan_khusus_id')->setAllowEmpty(1);;
        $this->getColumnByName('status_sekolah')->setDisabled(1);
        $this->getColumnByName('status_sekolah')->setEnumValues(array('1.0' => "Negeri" , '2.0' => "Swasta"));
        $this->getColumnByName('status_sekolah')->setAnchor(50);
        $this->getColumnByName('sk_pendirian_sekolah')->setAnchor(50);
        $this->getColumnByName('sk_pendirian_sekolah')->setLabel('SK pendirian sekolah');
        $this->getColumnByName('sk_pendirian_sekolah')->setDisabled(1);
        $this->getColumnByName('tanggal_sk_pendirian')->setAnchor(50);
        $this->getColumnByName('tanggal_sk_pendirian')->setLabel('Tanggal SK pendirian');
        $this->getColumnByName('tanggal_sk_pendirian')->setDisabled(1);
        $this->getColumnByName('status_kepemilikan_id')->setAnchor(50);
        $this->getColumnByName('status_kepemilikan_id')->setLabel('Status kepemilikan');
        $this->getColumnByName('sk_izin_operasional')->setAnchor(50);
        $this->getColumnByName('sk_izin_operasional')->setLabel('SK izin operasional');
        $this->getColumnByName('sk_izin_operasional')->setDisabled(1);
        $this->getColumnByName('tanggal_sk_izin_operasional')->setAnchor(50);
        $this->getColumnByName('tanggal_sk_izin_operasional')->setLabel('Tanggal SK izin operasional');
        $this->getColumnByName('tanggal_sk_izin_operasional')->setDisabled(1);
        $this->getColumnByName('npwp')->setLabel('NPWP');
        $this->getColumnByName('nm_wp')->setLabel('Nama Wajib Pajak');
        
        $fieldSet4 = new \DataDikdas\FieldsetInfo();
        $this->addRange('no_rekening', 'rekening_atas_nama', $fieldSet4, 'Nomor Rekening BOS (Bantuan Operasional Sekolah)');
        $this->getColumnByName('no_rekening')->setAnchor(50);
        $this->getColumnByName('no_rekening')->setLabel('Nomor rekening');
        $this->getColumnByName('nama_bank')->setAnchor(50);
        $this->getColumnByName('cabang_kcp_unit')->setAnchor(50);
        $this->getColumnByName('cabang_kcp_unit')->setLabel('Cabang KCP/unit');
        $this->getColumnByName('rekening_atas_nama')->setAnchor(50);

        $fieldSet5 = new \DataDikdas\FieldsetInfo();
        $this->addRange('nomor_telepon', 'website', $fieldSet5, 'Kontak Sekolah');
        $this->getColumnByName('nomor_telepon')->setAnchor(50);
        $this->getColumnByName('nomor_fax')->setAnchor(50);
        $this->getColumnByName('email')->setAnchor(70);
        $this->getColumnByName('email')->setValidationType('email');
        $this->getColumnByName('website')->setAnchor(70);
        $this->getColumnByName('website')->setValidationType('url');

        $col1 = $this->getColumnByName('luas_tanah_milik');
        $col1->setAnchor(40);
        $col1->setInputLength(7);
        $col1->setLabel($col1->getLabel().' (m2)' );

        $col2 = $this->getColumnByName('luas_tanah_bukan_milik');
        $col2->setAnchor(40);
        $col2->setInputLength(7);
        $col2->setLabel($col2->getLabel().' (m2)' );

        $this->getColumnByName('mbs')->setAnchor(50);
        $this->getColumnByName('mbs')->setLabel('MBS');
        $this->getColumnByName('mbs')->setEnumValues(array('1.0' => "Ya" , '0.0' => "Tidak"));

        // $this->getColumnByName('kode_registrasi')->setXtype('hidden');
        // $this->getColumnByName('flag')->setXtype('hidden');


        // custom description
        $this->getColumnByName('nama')->setDescription('Nama sekolah. Apabila terjadi kekeliruan, silakan kontak KK Datadik / CS Pusat');
        $this->getColumnByName('nss')->setDescription('NSS jika kosong atau salah diabaikan saja, kedepannya hanya akan menggunakan NPSN');
        // $this->getColumnByName('npsn')->setDescription('Nomor Pokok Sekolah Nasional. Apabila terjadi kekeliruan, silakan kontak KK Datadik / CS Pusat. Cek di referensi.data.kemdikbud.go.id');
        $this->getColumnByName('bentuk_pendidikan_id')->setDescription('Jenjang/Bentuk pendidikan sekolah. Apabila terjadi kekeliruan, silakan kontak KK Datadik / CS Pusat.');
        $this->getColumnByName('status_sekolah')->setDescription('Status sekolah. Apabila terjadi kekeliruan, silakan kontak KK Datadik / CS Pusat');
        $this->getColumnByName('alamat_jalan')->setDescription('Diisi dengan alamat jalan sekolah berupa jalan, gang, dan nomor (jika ada).');
        $this->getColumnByName('rt')->setDescription('Diisi dengan nomor RT.');
        $this->getColumnByName('rw')->setDescription('Diisi dengan nomor RW.');
        $this->getColumnByName('nama_dusun')->setDescription('Diisi dengan nama dusun. Contoh: Dusun Merak.');
        $this->getColumnByName('desa_kelurahan')->setDescription('Diisi dengan nama desa/kelurahan. Contoh: Desa Selatan Tiga.');
        $this->getColumnByName('kode_wilayah')->setDescription('Diisi dengan kecamatan yang sesuai.');
        $this->getColumnByName('kode_pos')->setDescription('Diisi dengan kode pos yang sesuai.');
        $this->getColumnByName('lintang')->setDescription('Diisi posisi geografis sekolah dalam garis lintang.');
        $this->getColumnByName('bujur')->setDescription('Diisi posisi geografis sekolah dalam garis bujur.');
        $this->getColumnByName('kebutuhan_khusus_id')->setDescription('Macam kebutuhan khusus yang juga dilayani oleh sekolah. Kolom ini berupa multiseleksi. Opsi yang tersedia dapat dipilih lebih dari satu. Khusus untuk kebutuhan khusus grahita ringan dan grahita sedang hanya boleh dipilih salah satu. Daksa ringan dan sedang juga hanya bisa dipilih salah satu');
        $this->getColumnByName('sk_pendirian_sekolah')->setDescription('Diisi dengan nomor SK pendirian sekolah.');
        $this->getColumnByName('tanggal_sk_pendirian')->setDescription('Diisi dengan tanggal ditetapkannya SK pendirian sekolah.');
        $this->getColumnByName('status_kepemilikan_id')->setDescription('Pilih pihak yang memiliki sekolah.');
        $this->getColumnByName('yayasan_id')->setDescription('Pilih yayasan yang menaungi sekolah. Opsi ini muncul jika data yayasan di Data Rinci Sekolah telah diisi. Khusus sekolah swasta.');
        $this->getColumnByName('sk_izin_operasional')->setDescription('Diisi dengan nomor SK izin beroperasinya sekolah.');
        $this->getColumnByName('tanggal_sk_izin_operasional')->setDescription('Diisi dengan tanggal ditetapkannya SK operasional sekolah.');
        $this->getColumnByName('no_rekening')->setDescription('Diisi dengan nomor rekening BOS milik sekolah. Tidak diperkenankan isian selain angka.');
        $this->getColumnByName('nama_bank')->setDescription('Diisi dengan nama bank tempat rekening BOS milik sekolah terdaftar.');
        $this->getColumnByName('cabang_kcp_unit')->setDescription('Diisi nama kantor cabang/unit/pembantu dari bank tempat rekening BOS milik sekolah terdaftar.');
        $this->getColumnByName('rekening_atas_nama')->setDescription('Diisi nama pemilik sesuai dengan yang tertera di buku rekening BOS. Harus atas nama sekolah');
        $this->getColumnByName('mbs')->setDescription('MBS adalah singkatan dari Manajemen Berbasis Sekolah. Pilih salah satu, sekolah telah melaksanakan (Ya) atau tidak melaksanakan (Tidak).');
        $this->getColumnByName('luas_tanah_milik')->setDescription('Diisi dengan luas tanah milik sekolah. Satuan yang dipakai adalah meter per segi. Jika desimal isi dengan tanda titik (.) contoh 607.85 ');
        $this->getColumnByName('luas_tanah_bukan_milik')->setDescription('Diisi dengan luas tanah yang digunakan oleh sekolah, namun tidak dimiliki oleh sekolah (misalnya menumpang pada pihak-pihak tertentu). Satuan yang dipakai adalah meter per segi.');
        $this->getColumnByName('nomor_telepon')->setDescription('Diisi nomor telepon sekolah (jika ada).');
        $this->getColumnByName('nomor_fax')->setDescription('Diisi nomor faksimili sekolah (jika ada).');
        $this->getColumnByName('email')->setDescription('Diisi nomor surat elektronik sekolah (jika ada).');
        $this->getColumnByName('website')->setDescription('Diisi alamat situs web sekolah (jika ada).');
        // $this->getColumnByName('sk_akreditasi')->setDescription('Diisi dengan nomor SK akreditasi sekolah.');
        // $this->getColumnByName('tanggal_sk_akreditasi')->setDescription('Diisi dengan tanggal ditetapkannya SK akreditasi sekolah.');

    }

}