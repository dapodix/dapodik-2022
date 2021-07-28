<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class RwyPendFormalTableInfo extends base\BaseRwyPendFormalTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_rwy_pend_formal');

        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        $this->getColumnByName('prodi')->setHideColumn(1);
        $this->getColumnByName('id_reg_pd')->setHideColumn(1);

        $this->getColumnByName('bidang_studi_id')->setHeader('Bidang Studi');
        $this->getColumnByName('bidang_studi_id')->setColumnWidth(200);

        $this->getColumnByName('fakultas')->setColumnWidth(200);
        $this->getColumnByName('bidang_studi_id')->setColumnWidth(120);
        $this->getColumnByName('kependidikan')->setColumnWidth(120);

        $colJk1 = $this->getColumnByName('kependidikan');
        $colJk1->setEnumValues(array("1" => "Ya" , "0" => "Tidak"));

        $this->getColumnByName('tahun_masuk')->setHeader('Thn Masuk');
        $this->getColumnByName('tahun_masuk')->setColumnWidth(100);
        $this->getColumnByName('tahun_masuk')->setInputLength(4);
        $this->getColumnByName('tahun_masuk')->setMinLength(4);

        $this->getColumnByName('tahun_lulus')->setHeader('Thn Lulus');
        $this->getColumnByName('tahun_lulus')->setColumnWidth(100);
        $this->getColumnByName('tahun_lulus')->setInputLength(4);
        $this->getColumnByName('tahun_lulus')->setMinLength(4);

        $this->getColumnByName('nim')->setHeader('NIS / NISN / NIM');
        $this->getColumnByName('nim')->setColumnWidth(200);

        $col1 = $this->getColumnByName('status_kuliah');
        $col1->setColumnWidth(200);
        $col1->setHeader('Masih Studi / Kuliah');
        $col1->setEnumValues(array('1' => "Ya" , '0' => "Tidak"));

        $this->getColumnByName('semester')->setColumnWidth(100);

        $this->getColumnByName('ipk')->setHeader('Rata-rata Ujian Akhir / IPK / GPA');

        $this->getColumnByName('bidang_studi_id')->setDescription('Pilih jurusan pada jenjang pendidikan PTK. Diisi hanya untuk jenjang pendidikan tinggi diatas SMA/SMK/MA/Sederajat');
        $this->getColumnByName('jenjang_pendidikan_id')->setDescription('Pilih jenjang pendidikan PTK.');
        $this->getColumnByName('gelar_akademik_id')->setDescription('Pilih gelar yang diperoleh pada jenjang pendidikan PTK. Isi jika pendidikan tersebut telah selesai ditempuh. Kosongkan jika pendidikan belum selesai ditempuh.');
        $this->getColumnByName('satuan_pendidikan_formal')->setDescription('Diisi nama satuan pendidikan PTK. Contoh: Universitas Pendidikan Indonesia atau Sekolah Tinggi Keguruan dan Ilmu Pendidikan (STKIP-PGRI) Pontianak.');
        $this->getColumnByName('fakultas')->setDescription('Diisi nama fakultas pendidikan PTK. ');
        $this->getColumnByName('kependidikan')->setDescription('Pilih status pendidikan yang ditempuh, sebagai LPTK (Lembaga Pendidikan Tenaga Keguruan) atau bukan. LTPK adalah lembaga yang khusus mendidik calon-calon guru, seperti STKIP atau FKIP.');
        $this->getColumnByName('tahun_masuk')->setDescription('Diisi tahun pertama kali masuk pada jenjang pendidikan terkait.');
        $this->getColumnByName('tahun_lulus')->setDescription('Diisi tahun lulus pada jenjang pendidikan terkait. Kosongkan bila belum lulus.');
        $this->getColumnByName('nim')->setDescription('Diisi Nomor Induk Mahasiswa PTK.');
        $this->getColumnByName('status_kuliah')->setDescription('Pilih status keaktifan perkuliahan PTK. Pilih Ya jika masih berkuliah. Pilih Tidak jika sudah lulus');
        $this->getColumnByName('semester')->setDescription('Diisi jumlah semester yang ditempuh pada perkuliahan PTK. Contoh jika kuliah selesai ditempuh dalam waktu 4 tahun maka diisi 8, jika sekarang masih aktif kuliah di akhir tahun ke-3 maka diisi dengan 6.');
        $this->getColumnByName('ipk')->setDescription('Diisi IPK terkini pada perkuliahan PTK.');

    }

}