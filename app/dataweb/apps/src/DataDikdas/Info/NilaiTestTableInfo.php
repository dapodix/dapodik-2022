<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class NilaiTestTableInfo extends base\BaseNilaiTestTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->setTableValidation('vld_nilai_test');

        $this->setIsBigRef(1);
        $this->setIsSmallRef(0);
        $this->getColumnByName('ptk_id')->setHideColumn(1);

        $this->getColumnByName('tahun')->setColumnWidth('80');
        $this->getColumnByName('tahun')->setInputLength(4);
        $this->getColumnByName('tahun')->setMinLength(4);
        $this->getColumnByName('tahun')->setColumnWidth('100');

        $this->getColumnByName('skor')->setColumnWidth('100');
        $this->getColumnByName('skor')->setMin(0);
        $this->getColumnByName('skor')->setMax(100);
        $this->getColumnByName('skor')->setDecimalPrecision(2);
        $this->getColumnByName('skor')->setHeader('Skor Final');
        // $this->getColumnByName('skor')->setXtype('hidden');

        $this->getColumnByName('skor1')->setColumnWidth('80');
        $this->getColumnByName('skor1')->setMin(0);
        $this->getColumnByName('skor1')->setMax(100);
        $this->getColumnByName('skor1')->setDecimalPrecision(2);
        $this->getColumnByName('skor1')->setHideColumn(1);
        $this->getColumnByName('skor1')->setXtype('hidden');

        $this->getColumnByName('skor2')->setColumnWidth('80');
        $this->getColumnByName('skor2')->setMin(0);
        $this->getColumnByName('skor2')->setMax(100);
        $this->getColumnByName('skor2')->setDecimalPrecision(2);
        $this->getColumnByName('skor2')->setHideColumn(1);
        $this->getColumnByName('skor2')->setXtype('hidden');

        $this->getColumnByName('skor3')->setColumnWidth('80');
        $this->getColumnByName('skor3')->setMin(0);
        $this->getColumnByName('skor3')->setMax(100);
        $this->getColumnByName('skor3')->setDecimalPrecision(2);
        $this->getColumnByName('skor3')->setHideColumn(1);
        $this->getColumnByName('skor3')->setXtype('hidden');

        $this->getColumnByName('skor4')->setColumnWidth('80');
        $this->getColumnByName('skor4')->setMin(0);
        $this->getColumnByName('skor4')->setMax(100);
        $this->getColumnByName('skor4')->setDecimalPrecision(2);
        $this->getColumnByName('skor4')->setHideColumn(1);
        $this->getColumnByName('skor4')->setXtype('hidden');

        $this->getColumnByName('skor5')->setColumnWidth('80');
        $this->getColumnByName('skor5')->setMin(0);
        $this->getColumnByName('skor5')->setMax(100);
        $this->getColumnByName('skor5')->setDecimalPrecision(2);
        $this->getColumnByName('skor5')->setHideColumn(1);
        $this->getColumnByName('skor5')->setXtype('hidden');

        $this->getColumnByName('nomor_peserta')->setColumnWidth('200');

        $this->getColumnByName('jenis_test_id')->setDescription('Pilih jenis tes yang pernah diikuti oleh PTK.');
        $this->getColumnByName('nama')->setDescription('Diisi nama tes yang pernah diikuti oleh PTK.');
        $this->getColumnByName('penyelenggara')->setDescription('Diisi nama penyelenggara tes yang pernah diikuti oleh PTK.');
        $this->getColumnByName('tahun')->setDescription('Diisi tahun tes yang pernah diikuti oleh PTK.');
        $this->getColumnByName('skor')->setDescription('Diisi nilai skor tes yang pernah diikuti oleh PTK.');

    }

}