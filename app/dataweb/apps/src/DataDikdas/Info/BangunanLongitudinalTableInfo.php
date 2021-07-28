<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class BangunanLongitudinalTableInfo extends base\BaseBangunanLongitudinalTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.BangunanLongitudinalTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->getColumnByName('bangunan_longitudinal_id')->setIsFk('0');
        $this->getColumnByName('bangunan_longitudinal_id')->setFkTableName('');

        $this->getColumnByName('rusak_pondasi')->setLabel('Kerusakan pondasi (%)');
        $this->getColumnByName('rusak_pondasi')->setInputLength(3);
        $this->getColumnByName('rusak_pondasi')->setMax(100);

        $this->getColumnByName('ket_pondasi')->setLabel('Keterangan Pondasi');

        $this->getColumnByName('rusak_sloop_kolom_balok')->setLabel('Kerusakan sloop, kolom, dan balok (%)');
        $this->getColumnByName('rusak_sloop_kolom_balok')->setInputLength(3);
        $this->getColumnByName('rusak_sloop_kolom_balok')->setMax(100);

        $this->getColumnByName('ket_sloop_kolom_balok')->setLabel('Keterangan sloop, kolom, dan balok');

        $this->getColumnByName('rusak_plester_struktur')->setLabel('Kerusakan plester struktur (%)');
        $this->getColumnByName('rusak_plester_struktur')->setInputLength(3);
        $this->getColumnByName('rusak_plester_struktur')->setMax(100);

        $this->getColumnByName('ket_plester_struktur')->setLabel('Keterangan plester struktur');

        $this->getColumnByName('rusak_kudakuda_atap')->setLabel('Kerusakan kuda-kuda atap (%)');
        $this->getColumnByName('rusak_kudakuda_atap')->setInputLength(3);
        $this->getColumnByName('rusak_kudakuda_atap')->setMax(100);

        $this->getColumnByName('ket_kudakuda_atap')->setLabel('Keterangan kuda-kuda atap');

        $this->getColumnByName('rusak_kaso_atap')->setLabel('Kerusakan kaso atap (%)');
        $this->getColumnByName('rusak_kaso_atap')->setInputLength(3);
        $this->getColumnByName('rusak_kaso_atap')->setMax(100);

        $this->getColumnByName('ket_kaso_atap')->setLabel('Keterangan kaso atap');

        $this->getColumnByName('rusak_reng_atap')->setLabel('Kerusakan reng atap (%)');
        $this->getColumnByName('rusak_reng_atap')->setInputLength(3);
        $this->getColumnByName('rusak_reng_atap')->setMax(100);

        $this->getColumnByName('ket_reng_atap')->setLabel('Keterangan reng atap');

        $this->getColumnByName('rusak_tutup_atap')->setLabel('Kerusakan tutup atap (%)');
        $this->getColumnByName('rusak_tutup_atap')->setInputLength(3);
        $this->getColumnByName('rusak_tutup_atap')->setMax(100);

        // $this->getColumnByName('ket_tutup_atap')->setLabel('Keterangan tutup atap');
        $col = $this->getColumnByName('ket_tutup_atap');
        $col->setLabel('Keterangan tutup atap');
        $col->setEnumValues(array("Dak Beton" => "Dak Beton", "Bukan Dak Beton" => "Bukan Dak Beton", "Tidak Memiliki Atap" => "Tidak Memiliki Atap"));

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

        $this->getColumnByName('rusak_pondasi')->setAllowEmpty(1);
        $this->getColumnByName('rusak_sloop_kolom_balok')->setAllowEmpty(1);
        $this->getColumnByName('rusak_plester_struktur')->setAllowEmpty(1);
        $this->getColumnByName('rusak_kudakuda_atap')->setAllowEmpty(1);
        $this->getColumnByName('rusak_kaso_atap')->setAllowEmpty(1);
        $this->getColumnByName('rusak_reng_atap')->setAllowEmpty(1);
        $this->getColumnByName('rusak_tutup_atap')->setAllowEmpty(1);

        $this->getColumnByName('ket_pondasi')->setAllowEmpty(0);
        $this->getColumnByName('ket_sloop_kolom_balok')->setAllowEmpty(0);
        $this->getColumnByName('ket_plester_struktur')->setAllowEmpty(0);
        $this->getColumnByName('ket_kudakuda_atap')->setAllowEmpty(0);
        $this->getColumnByName('ket_kaso_atap')->setAllowEmpty(0);
        $this->getColumnByName('ket_reng_atap')->setAllowEmpty(0);
        $this->getColumnByName('ket_tutup_atap')->setAllowEmpty(0);

        $this->getColumnByName('rusak_pondasi')->setDescription('Kerusakan Pondasi');
        $this->getColumnByName('ket_pondasi')->setDescription('Keterangan kerusakan');
        $this->getColumnByName('rusak_sloop_kolom_balok')->setDescription('Kerusakan Sloop Kolom Balok');
        $this->getColumnByName('ket_sloop_kolom_balok')->setDescription('Keterangan kerusakan');
        $this->getColumnByName('rusak_plester_struktur')->setDescription('Kerusakan plester struktur');
        $this->getColumnByName('ket_plester_struktur')->setDescription('Keterangan kerusakan');
        $this->getColumnByName('rusak_kudakuda_atap')->setDescription('Kerusakan kudakuda atap');
        $this->getColumnByName('ket_kudakuda_atap')->setDescription('Keterangan kerusakan');
        $this->getColumnByName('rusak_kaso_atap')->setDescription('Kerusakan kaso atap');
        $this->getColumnByName('ket_kaso_atap')->setDescription('Keterangan kerusakan');
        $this->getColumnByName('rusak_reng_atap')->setDescription('kerusakan reng atap');
        $this->getColumnByName('ket_reng_atap')->setDescription('Keterangan kerusakan');
        $this->getColumnByName('rusak_tutup_atap')->setDescription('kerusakan tutup atap');
        $this->getColumnByName('ket_tutup_atap')->setDescription('Keterangan kerusakan');
        $this->getColumnByName('nilai_saat_ini')->setDescription('Nilai kerusakan');
    }
    
}