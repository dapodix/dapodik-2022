<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class KepanitiaanTableInfo extends base\BaseKepanitiaanTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->getColumnByName('sekolah_id')->setXtype('hidden');
        $this->getColumnByName('sekolah_id')->setHideColumn(1);

        $this->getColumnByName('id_jns_panitia')->setXtype('jeniskepanitiaancombo');
        $this->getColumnByName('id_jns_panitia')->setLabel('Satuan Tugas');
        $this->getColumnByName('id_jns_panitia')->setHeader('Satuan Tugas');
        $this->getColumnByName('id_jns_panitia')->setColumnWidth(250);

        $this->getColumnByName('nm_panitia')->setLabel('Nama Satuan Tugas');
        $this->getColumnByName('nm_panitia')->setHeader('Nama Satuan Tugas');
        $this->getColumnByName('nm_panitia')->setColumnWidth(250);

        $this->getColumnByName('instansi')->setColumnWidth(150);

        $this->getColumnByName('sk_tugas')->setLabel('SK Tugas');
        $this->getColumnByName('sk_tugas')->setHeader('SK Tugas');
        $this->getColumnByName('sk_tugas')->setColumnWidth(150);

        $this->getColumnByName('tmt_sk_tugas')->setLabel('TMT SK Tugas');
        $this->getColumnByName('tmt_sk_tugas')->setHeader('TMT SK Tugas');
        $this->getColumnByName('tmt_sk_tugas')->setColumnWidth(100);

        $this->getColumnByName('tkt_panitia')->setLabel('Tingkat Satuan Tugas');
        $this->getColumnByName('tkt_panitia')->setHeader('Tingkat Satuan Tugas');
        $this->getColumnByName('tkt_panitia')->setColumnWidth(200);
        $this->getColumnByName('tkt_panitia')->setEnumValues(array("L" => "Lokal/Satuan Pendidikan", "D" => "Daerah"));

        $this->getColumnByName('tst_sk_tugas')->setLabel('TST SK Tugas');
        $this->getColumnByName('tst_sk_tugas')->setHeader('TST SK Tugas');

        $this->getColumnByName('a_pasang_papan')->setLabel('Terpasang Papan/Plang');
        $this->getColumnByName('a_pasang_papan')->setHeader('Terpasang Papan/Plang');
        $this->getColumnByName('a_pasang_papan')->setEnumValues(array("1" => "Ya", "0" => "Tidak"));
        $this->getColumnByName('a_pasang_papan')->setColumnWidth(200);
        $this->getColumnByName('a_pasang_papan')->setEditable(1);

        $this->getColumnByName('a_formulir')->setLabel('Tersedia Formulir');
        $this->getColumnByName('a_formulir')->setHeader('Tersedia Formulir');
        $this->getColumnByName('a_formulir')->setEnumValues(array("1" => "Ya", "0" => "Tidak"));
        $this->getColumnByName('a_formulir')->setColumnWidth(200);
        $this->getColumnByName('a_formulir')->setEditable(1);

        $this->getColumnByName('a_silabus')->setLabel('Tersedia Silabus');
        $this->getColumnByName('a_silabus')->setHeader('Tersedia Silabus');
        $this->getColumnByName('a_silabus')->setEnumValues(array("1" => "Ya", "0" => "Tidak"));
        $this->getColumnByName('a_silabus')->setColumnWidth(200);
        $this->getColumnByName('a_silabus')->setEditable(1);

        $this->getColumnByName('a_berlaku_pos')->setLabel('Diberlakukan POS (Prosedur Operasional Standar)');
        $this->getColumnByName('a_berlaku_pos')->setHeader('Diberlakukan POS (Prosedur Operasional Standar)');
        $this->getColumnByName('a_berlaku_pos')->setEnumValues(array("1" => "Ya", "0" => "Tidak"));
        $this->getColumnByName('a_berlaku_pos')->setColumnWidth(200);
        $this->getColumnByName('a_berlaku_pos')->setEditable(1);

        $this->getColumnByName('a_sosialisasi_pos')->setLabel('Telah Melakukan Sosialisasi POS');
        $this->getColumnByName('a_sosialisasi_pos')->setHeader('Telah Melakukan Sosialisasi POS');
        $this->getColumnByName('a_sosialisasi_pos')->setEnumValues(array("1" => "Ya", "0" => "Tidak"));
        $this->getColumnByName('a_sosialisasi_pos')->setColumnWidth(200);
        $this->getColumnByName('a_sosialisasi_pos')->setEditable(1);

        $this->getColumnByName('a_ks_edukatif')->setLabel('Bekerjasama dengan Lembaga Edukatif');
        $this->getColumnByName('a_ks_edukatif')->setHeader('Bekerjasama dengan Lembaga Edukatif');
        $this->getColumnByName('a_ks_edukatif')->setEnumValues(array("1" => "Ya", "0" => "Tidak"));
        $this->getColumnByName('a_ks_edukatif')->setColumnWidth(200);
        $this->getColumnByName('a_ks_edukatif')->setEditable(1);

        $this->getColumnByName('id_jns_panitia')->setDescription('Pilih satuan tugas kepanitiaan.');
		$this->getColumnByName('nm_panitia')->setDescription('Diisi nama satuan tugas. Contoh: <strong>Panitia Penanggulangan Tindak Kekerasan di Sekolah.');
		$this->getColumnByName('instansi')->setDescription('Diisi nama instansi kepanitiaan yang dibentuk. Misalnya, diisi nama sekolah apabila dibentuk pada tingkat satuan pendidikan.');
		$this->getColumnByName('tkt_panitia')->setDescription('Pilih tingkat pembentukan panitia.');
		$this->getColumnByName('sk_tugas')->setDescription('Diisi nomor SK pembentukan panitia.');
		$this->getColumnByName('tmt_sk_tugas')->setDescription('Diisi tanggal mulai berlakunya SK pembentukan panitia.');
		$this->getColumnByName('tst_sk_tugas')->setDescription('Diisi tanggal berakhirnya SK pembentukan panitia.');
		$this->getColumnByName('a_pasang_papan')->setDescription('Pilih pemasangan papan/plang.');
		$this->getColumnByName('a_formulir')->setDescription('Pilih ketersediaan formulir pengaduan.');
		$this->getColumnByName('a_silabus')->setDescription('Pilih ketersediaan silabus dalam pendidikan/edukasi.');
		$this->getColumnByName('a_berlaku_pos')->setDescription('Pilih pemberlakuan POS untuk kasus yang ditangani.');
		$this->getColumnByName('a_sosialisasi_pos')->setDescription('Pilih keterlaksanaan sosialisasi.');
		$this->getColumnByName('a_ks_edukatif')->setDescription('Pilih ada atau tidaknya kerja sama terhadap lembaga edukatif dalam pendidikan.');

    }

}