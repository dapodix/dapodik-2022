<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class AktivitasKepanitiaanTableInfo extends base\BaseAktivitasKepanitiaanTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
         $this->getColumnByName('id_panitia')->setHideColumn(1);
         $this->getColumnByName('id_panitia')->setXtype('hidden');
         $this->getColumnByName('semester_id')->setHideColumn(1);
         $this->getColumnByName('semester_id')->setXtype('hidden');

         $this->getColumnByName('id_jns_akt_pan')->setHeader('Jenis Aktivitas Panitia');
         $this->getColumnByName('id_jns_akt_pan')->setColumnWidth(350);
         $this->getColumnByName('frek_akt_pan')->setHeader('Frekuensi Aktivitas Panitia');
         $this->getColumnByName('frek_akt_pan')->setColumnWidth(350);
         $this->getColumnByName('ket_akt_pan')->setHeader('Keterangan');
         $this->getColumnByName('ket_akt_pan')->setColumnWidth(350);

         $this->getColumnByName('id_jns_akt_pan')->setDescription('Pilih jenis kepanitiaan');
        $this->getColumnByName('ket_akt_pan')->setDescription('Keterangan kepanitiaan');
    }
    
}