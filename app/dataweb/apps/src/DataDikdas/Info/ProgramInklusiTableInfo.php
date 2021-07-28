<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class ProgramInklusiTableInfo extends base\BaseProgramInklusiTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->setTableValidation();

        $this->getColumnByName('sekolah_id')->setXtype('hidden');
        $this->getColumnByName('sekolah_id')->setHideColumn(1);
        $this->getColumnByName('kebutuhan_khusus_id')->setColumnWidth('300');
        $this->getColumnByName('sk_pi')->setHeader('SK Program Inklusi');
        $this->getColumnByName('sk_pi')->setColumnWidth('200');
        $this->getColumnByName('tmt_pi')->setHeader('TMT Program Inklusi');
        $this->getColumnByName('tmt_pi')->setColumnWidth('150');
        $this->getColumnByName('tst_pi')->setHeader('TST Program Inklusi');
        $this->getColumnByName('tst_pi')->setColumnWidth('150');
        $this->getColumnByName('ket_pi')->setHeader('Keterangan');
        $this->getColumnByName('ket_pi')->setColumnWidth('300');
        $this->getColumnByName('tgl_sk_pi')->setHeader('Tgl SK Program Inklusi');
        $this->getColumnByName('tgl_sk_pi')->setColumnWidth('200');

        $this->getColumnByName('kebutuhan_khusus_id')->setDescription('Pilih macam kebutuhan khusus yang dilayani oleh sekolah. Kolom ini berupa multiseleksi. Opsi yang tersedia dapat dipilih lebih dari satu');
        $this->getColumnByName('sk_pi')->setDescription('Diisi nomor SK yang tertera di Surat Keputusan Sekolah Inklusi');
        $this->getColumnByName('tmt_pi')->setDescription('Diisi tanggal mulai berlakunya Program Inklusi di sekolah sesuai yang tertera di Surat Keputusan Sekolah Inklusi');
        $this->getColumnByName('tst_pi')->setDescription('Diisi tanggal akhir berlakunya Program Inklusi di sekolah sesuai yang tertera di Surat Keputusan Sekolah Inklusi');
        $this->getColumnByName('ket_pi')->setDescription('Deskripsi tambahan terkait program inklusi sekolah');
    }

}