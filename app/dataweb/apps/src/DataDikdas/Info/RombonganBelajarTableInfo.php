<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class RombonganBelajarTableInfo extends base\BaseRombonganBelajarTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();
        $this->setTableValidation('vld_rombel');

        // Override below here!
        $this->moveColumnBelow($this->getColumnByName('id_ruang'), $this->getColumnByName('ptk_id'));

        //$this->getColumnByName('tahun_ajaran_id')->setHideColumn(1);
        $this->getColumnByName('semester_id')->setHideColumn(1);
        $this->getColumnByName('sekolah_id')->setHideColumn(1);

        //$this->getColumnByName('jurusan_sekolah_id')->setHideColumn(1);
        //$this->getColumnByName('jurusan_sp_id')->setHideColumn(1);
        $this->getColumnByName('jurusan_sp_id')->setHeader('Jurusan Sat.Pendidikan');
        $this->getColumnByName('jurusan_sp_id')->setAllowEmpty(1);
        //$this->getColumnByName('jurusan_sp_id')->setIsBigRef(1);

        $this->getColumnByName('jenis_rombel')->setIsFk('1');
        $this->getColumnByName('jenis_rombel')->setFkTableName('JenisRombel');

        // Hiding the column will be done programmatically in the front end
        //$this->getColumnByName('jurusan_sp_id')->setHideColumn(1);

        $this->getColumnByName('jenis_rombel')->setHideColumn(0);
        $this->getColumnByName('sks')->setHideColumn(1);

        $this->getColumnByName('kurikulum_id')->setColumnWidth(200);
        // $this->moveColumnBelow($this->getColumnByName('kurikulum_id'), $this->getColumnByName('tingkat_pendidikan_id'));

        $this->getColumnByName('nama')->setColumnWidth(120);
        $this->getColumnByName('nama')->setHeader('Nama Rombel');

        $colJk1 = $this->getColumnByName('moving_class');
        $colJk1->setEnumValues(array(1 => "Ya" , 2 => "Tidak"));

        $this->getColumnByName('ptk_id')->setHeader('Wali/Guru Kelas');
        $this->getColumnByName('ptk_id')->setAllowEmpty(0);
        $this->getColumnByName('moving_class')->setColumnWidth(100);

        $this->getColumnByName('kebutuhan_khusus_id')->setColumnWidth(160);
        $this->getColumnByName('kebutuhan_khusus_id')->setHeader('Melayani Keb.Khusus');

        $this->getColumnByName('tingkat_pendidikan_id')->setColumnWidth(160);
        $this->setInfoBeforeDelete('Mohon berhati-hati apabila ingin menghapus rombongan belajar, karena akan menyebabkan rombel tsb terkunci pada Kuncian Rombel GTK. Yang akan menyebabkan seluruh guru pada rombel tsb tidak akan diproses jam mengajarnya. Apakah anda yakin ingin menghapus rombel tsb?');

        $this->getColumnByName('tingkat_pendidikan_id')->setDescription('Pilih tingkat pendidikan. Untuk SD/SDLB/sederajat pilih 1 - 6, untuk SMP/SMPLB/sederajat pilih 7 - 9, untuk SLB pilih 1-9 dan untuk SMA/SMK/SMLB pilih 10-13.');
        $this->getColumnByName('kurikulum_id')->setDescription('Pilih kurikulum yang diterapkan pada rombel.');
        $this->getColumnByName('nama')->setDescription('Diisi nama rombel. Contohnya: Kelas 1, Kelas 2A, dst');
        $this->getColumnByName('ptk_id')->setDescription('Pilih PTK yang bertugas menjadi wali kelas pada rombel terkait.');
        $this->getColumnByName('id_ruang')->setDescription('Pilih prasarana (ruang teori/kelas) yang menjadi tempat bagi anggota rombel melaksanakan KBM. Dari ketentuan yang dikeluarkan oleh P2TK, rombel hanya diakui jika prasarananya adalah ruang teori/kelas (laboratorium dan ruangan bukan kelas lainnya tidak dakui).');
        $this->getColumnByName('moving_class')->setDescription('Pilih mobilitas kelas. Moving class berarti rombongan belajar tidak menetap di satu ruang belajar, melainkan berpindah-pindah sesuai mata pelajarannya (tiap mata pelajaran memiliki ruang belajar sendiri).');
        $this->getColumnByName('kebutuhan_khusus_id')->setDescription('Pilih pelayanan kebutuhan khusus dalam rombel. Bisa pilih lebih dari satu.');

    }

}
