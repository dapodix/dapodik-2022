<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class RuangLongitudinalTableInfo extends base\BaseRuangLongitudinalTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->getColumnByName('ruang_longitudinal_id')->setIsFk('0');
        $this->getColumnByName('ruang_longitudinal_id')->setFkTableName('');

        $this->getColumnByName('blob_id')->setXtype('hidden');
        $this->getColumnByName('rusak_lisplang_talang')->setXtype('hidden');
        $this->getColumnByName('ket_lisplang_talang')->setXtype('hidden');

        $this->getColumnByName('rusak_rangka_plafon')->setLabel('Kerusakan rangka plafon (%)');
        $this->getColumnByName('rusak_rangka_plafon')->setInputLength(3);
        $this->getColumnByName('rusak_rangka_plafon')->setMax(100);

        $this->getColumnByName('ket_rangka_plafon')->setLabel('Keterangan rangka plafon');

        $this->getColumnByName('rusak_tutup_plafon')->setLabel('Kerusakan tutup plafon (%)');
        $this->getColumnByName('rusak_tutup_plafon')->setInputLength(3);
        $this->getColumnByName('rusak_tutup_plafon')->setMax(100);
        $this->getColumnByName('ket_tutup_plafon')->setLabel('Keterangan tutup plafon');

        $this->getColumnByName('rusak_bata_dinding')->setLabel('Kerusakan bata/dinding (%)');
        $this->getColumnByName('rusak_bata_dinding')->setInputLength(3);
        $this->getColumnByName('rusak_bata_dinding')->setMax(100);
        $this->getColumnByName('ket_bata_dinding')->setLabel('Keterangan bata/dinding');

        $this->getColumnByName('rusak_plester_dinding')->setLabel('Kerusakan plester dinding (%)');
        $this->getColumnByName('rusak_plester_dinding')->setInputLength(3);
        $this->getColumnByName('rusak_plester_dinding')->setMax(100);
        $this->getColumnByName('ket_plester_dinding')->setLabel('Keterangan plester dinding');

        $this->getColumnByName('rusak_daun_jendela')->setLabel('Kerusakan daun jendela (%)');
        $this->getColumnByName('rusak_daun_jendela')->setInputLength(3);
        $this->getColumnByName('rusak_daun_jendela')->setMax(100);
        $this->getColumnByName('ket_daun_jendela')->setLabel('Keterangan daun jendela');

        $this->getColumnByName('rusak_daun_pintu')->setLabel('Kerusakan daun pintu (%)');
        $this->getColumnByName('rusak_daun_pintu')->setInputLength(3);
        $this->getColumnByName('rusak_daun_pintu')->setMax(100);
        $this->getColumnByName('ket_daun_pintu')->setLabel('Keterangan daun pintu');

        $this->getColumnByName('rusak_kusen')->setLabel('Kerusakan kusen (%)');
        $this->getColumnByName('rusak_kusen')->setInputLength(3);
        $this->getColumnByName('rusak_kusen')->setMax(100);
        $this->getColumnByName('ket_kusen')->setLabel('Keterangan kusen');

        $this->getColumnByName('rusak_tutup_lantai')->setLabel('Kerusakan tutup lantai (%)');
        $this->getColumnByName('rusak_tutup_lantai')->setInputLength(3);
        $this->getColumnByName('rusak_tutup_lantai')->setMax(100);
        $this->getColumnByName('ket_penutup_lantai')->setLabel('Keterangan penutup lantai');

        $this->getColumnByName('rusak_inst_listrik')->setLabel('Kerusakan instalasi listrik (%)');
        $this->getColumnByName('rusak_inst_listrik')->setInputLength(3);
        $this->getColumnByName('rusak_inst_listrik')->setMax(100);
        $this->getColumnByName('ket_inst_listrik')->setLabel('Keterangan instalasi listrik');

        $this->getColumnByName('rusak_inst_air')->setLabel('Kerusakan instalasi air (%)');
        $this->getColumnByName('rusak_inst_air')->setInputLength(3);
        $this->getColumnByName('rusak_inst_air')->setMax(100);
        $this->getColumnByName('ket_inst_air')->setLabel('Keterangan instalasi air');

        $this->getColumnByName('rusak_drainase')->setLabel('Kerusakan drainase (%)');
        $this->getColumnByName('rusak_drainase')->setInputLength(3);
        $this->getColumnByName('rusak_drainase')->setMax(100);
        $this->getColumnByName('ket_drainase')->setLabel('Keterangan drainase');

        $this->getColumnByName('rusak_finish_struktur')->setLabel('Kerusakan finishing struktur (%)');
        $this->getColumnByName('rusak_finish_struktur')->setInputLength(3);
        $this->getColumnByName('rusak_finish_struktur')->setMax(100);
        $this->getColumnByName('ket_finish_struktur')->setLabel('Keterangan finishing struktur');

        $this->getColumnByName('rusak_finish_plafon')->setLabel('Kerusakan finishing plafon (%)');
        $this->getColumnByName('rusak_finish_plafon')->setInputLength(3);
        $this->getColumnByName('rusak_finish_plafon')->setMax(100);
        $this->getColumnByName('ket_finish_plafon')->setLabel('Keterangan finishing plafon');

        $this->getColumnByName('rusak_finish_dinding')->setLabel('Kerusakan finishing dinding (%)');
        $this->getColumnByName('rusak_finish_dinding')->setInputLength(3);
        $this->getColumnByName('rusak_finish_dinding')->setMax(100);
        $this->getColumnByName('ket_finish_dinding')->setLabel('Keterangan finishing dinding');

        $this->getColumnByName('rusak_finish_kpj')->setLabel('Kerusakan finishing Kusen, Pintu, Jendela (%)');
        $this->getColumnByName('rusak_finish_kpj')->setInputLength(3);
        $this->getColumnByName('rusak_finish_kpj')->setMax(100);
        $this->getColumnByName('ket_finish_kpj')->setLabel('Keterangan finishing Kusen, Pintu, Jendela');

        // $this->getColumnByName('berfungsi')->setXtype('hidden');
        $colBerfungsi = $this->getColumnByName('berfungsi');
        $colBerfungsi->setLabel('Berfungsi');
        $colBerfungsi->setEnumValues(array("1" => "Ya" , "0" => "Tidak"));

        $cols = $this->getColumns();
        $i = 0;

        foreach ($cols as $c) {

        	if ($c->getXtype() != "hidden") {
        		if (($i % 2) == 0) {
        			$c->setFlex(1);
        			$c->setFieldWidth(80);
        			$c->setLabelWidth(210);
        			$genap = $c->getName();
        			$title = $c->getLabel();
        		} else {
        			$c->setFlex(1);
        			$c->setFieldWidth(80);
        			$c->setLabelWidth(210);
        			$ganjil = $c->getName();

        			$fieldGroup = new \DataDikdas\HboxformInfo();
        			$this->addRange($genap, $ganjil, $fieldGroup, $title);
        		}
        		$i++;
        	}

        }

        $this->getColumnByName('rusak_rangka_plafon')->setAllowEmpty(1);
        $this->getColumnByName('ket_rangka_plafon')->setAllowEmpty(0);
        $this->getColumnByName('rusak_tutup_plafon')->setAllowEmpty(1);
        $this->getColumnByName('ket_tutup_plafon')->setAllowEmpty(0);
        $this->getColumnByName('rusak_bata_dinding')->setAllowEmpty(1);
        $this->getColumnByName('ket_bata_dinding')->setAllowEmpty(0);
        $this->getColumnByName('rusak_plester_dinding')->setAllowEmpty(1);
        $this->getColumnByName('ket_plester_dinding')->setAllowEmpty(0);
        $this->getColumnByName('rusak_daun_jendela')->setAllowEmpty(1);
        $this->getColumnByName('ket_daun_jendela')->setAllowEmpty(0);
        $this->getColumnByName('rusak_daun_pintu')->setAllowEmpty(1);
        $this->getColumnByName('ket_daun_pintu')->setAllowEmpty(0);
        $this->getColumnByName('rusak_kusen')->setAllowEmpty(1);
        $this->getColumnByName('ket_kusen')->setAllowEmpty(0);
        $this->getColumnByName('rusak_tutup_lantai')->setAllowEmpty(1);
        $this->getColumnByName('ket_penutup_lantai')->setAllowEmpty(0);
        $this->getColumnByName('rusak_inst_listrik')->setAllowEmpty(1);
        $this->getColumnByName('ket_inst_listrik')->setAllowEmpty(0);
        $this->getColumnByName('rusak_inst_air')->setAllowEmpty(1);
        $this->getColumnByName('ket_inst_air')->setAllowEmpty(0);
        $this->getColumnByName('rusak_drainase')->setAllowEmpty(1);
        $this->getColumnByName('ket_drainase')->setAllowEmpty(0);
        $this->getColumnByName('rusak_finish_struktur')->setAllowEmpty(1);
        $this->getColumnByName('ket_finish_struktur')->setAllowEmpty(0);
        $this->getColumnByName('rusak_finish_plafon')->setAllowEmpty(1);
        $this->getColumnByName('ket_finish_plafon')->setAllowEmpty(0);
        $this->getColumnByName('rusak_finish_dinding')->setAllowEmpty(1);
        $this->getColumnByName('ket_finish_dinding')->setAllowEmpty(0);
        $this->getColumnByName('rusak_finish_kpj')->setAllowEmpty(1);
        $this->getColumnByName('ket_finish_kpj')->setAllowEmpty(0);
    }

    
}