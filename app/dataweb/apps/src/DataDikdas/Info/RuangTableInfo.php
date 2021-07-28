<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class RuangTableInfo extends base\BaseRuangTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        $this->setDisplayField('nm_ruang');
        
        // Override below here!
        $arrayData = array(
            'jenis_prasarana_id',
            'id_bangunan',
            'kd_ruang',
            'nm_ruang',
            'reg_pras',
            'lantai',
            'panjang',
            'lebar',
            'luas_ruang',
            'kapasitas',
            'luas_plester_m2',
            'luas_plafon_m2',
            'luas_dinding_m2',
            'luas_daun_jendela_m2',
            'luas_daun_pintu_m2',
            'panj_kusen_m',
            'luas_tutup_lantai_m2',
            'panj_inst_listrik_m',
            'jml_inst_listrik',
            'panj_inst_air_m',
            'jml_inst_air',
            'panj_drainase_m',
            'luas_finish_struktur_m2',
            'luas_finish_plafon_m2',
            'luas_finish_dinding_m2',
            'luas_finish_kpj_m2',

            'sekolah_id',
            'parent_id_ruang',
        );

        for ($i=0; $i<sizeof($arrayData); $i++) {
        	$column_name = $arrayData[$i];
            $this->moveColumn($this->getColumnByName($column_name), $i);
        }

        $fs1 = new \DataDikdas\FieldsetInfo();
        $this->addRange('jenis_prasarana_id', 'luas_finish_kpj_m2', $fs1, 'Formulir Ruang');

        $this->getColumnByName('id_bangunan')->setColumnWidth('200');
        $this->getColumnByName('id_bangunan')->setHeader('Bangunan');
        $this->getColumnByName('id_bangunan')->setLabel('Bangunan');

        $this->getColumnByName('sekolah_id')->setXtype('hidden');
        $this->getColumnByName('sekolah_id')->setHideColumn(1);

        $this->getColumnByName('parent_id_ruang')->setXtype('hidden');
        $this->getColumnByName('parent_id_ruang')->setHideColumn(1);

        $this->getColumnByName('kd_ruang')->setColumnWidth('150');
        $this->getColumnByName('kd_ruang')->setHeader('Kode Ruang');
        $this->getColumnByName('kd_ruang')->setLabel('Kode Ruang');

        $this->getColumnByName('nm_ruang')->setColumnWidth('200');
        $this->getColumnByName('nm_ruang')->setHeader('Nama Ruang');
        $this->getColumnByName('nm_ruang')->setLabel('Nama Ruang');
        
        $this->getColumnByName('reg_pras')->setColumnWidth('200');
        $this->getColumnByName('reg_pras')->setHeader('Registrasi Ruang');
        $this->getColumnByName('reg_pras')->setLabel('Registrasi Ruang');
        
        $this->getColumnByName('lantai')->setColumnWidth('150');
        $this->getColumnByName('lantai')->setHeader('Lantai Ke-');
        $this->getColumnByName('lantai')->setLabel('Lantai Ke-');
        $this->getColumnByName('lantai')->setMin(1);
        $this->getColumnByName('lantai')->setMax(50);
        $this->getColumnByName('lantai')->setInputLength(2);
        
        $this->getColumnByName('panjang')->setColumnWidth('150');
        $this->getColumnByName('panjang')->setHeader('Panjang (m)');
        $this->getColumnByName('panjang')->setLabel('Panjang (m)');
        
        $this->getColumnByName('lebar')->setColumnWidth('150');
        $this->getColumnByName('lebar')->setHeader('Lebar (m)');
        $this->getColumnByName('lebar')->setLabel('Lebar (m)');
        
        $this->getColumnByName('luas_ruang')->setColumnWidth('150');
        $this->getColumnByName('luas_ruang')->setHeader('Luas Ruang (m2)');
        $this->getColumnByName('luas_ruang')->setLabel('Luas ruang (m2)');
        
        $this->getColumnByName('kapasitas')->setColumnWidth('150');
        
        $this->getColumnByName('luas_plester_m2')->setColumnWidth('150');
        $this->getColumnByName('luas_plester_m2')->setHeader('Luas Plester (m2)');
        $this->getColumnByName('luas_plester_m2')->setLabel('Luas plester (m2)');
        
        $this->getColumnByName('luas_plafon_m2')->setColumnWidth('150');
        $this->getColumnByName('luas_plafon_m2')->setHeader('Luas Plafon (m2)');
        $this->getColumnByName('luas_plafon_m2')->setLabel('Luas plafon (m2)');
        
        $this->getColumnByName('luas_dinding_m2')->setColumnWidth('150');
        $this->getColumnByName('luas_dinding_m2')->setHeader('Luas Dinding (m2)');
        $this->getColumnByName('luas_dinding_m2')->setLabel('Luas dinding (m2)');
        
        $this->getColumnByName('luas_daun_jendela_m2')->setColumnWidth('150');
        $this->getColumnByName('luas_daun_jendela_m2')->setHeader('Luas Daun Jendela (m2)');
        $this->getColumnByName('luas_daun_jendela_m2')->setLabel('Luas daun jendela (m2)');
        
        $this->getColumnByName('luas_daun_pintu_m2')->setColumnWidth('150');
        $this->getColumnByName('luas_daun_pintu_m2')->setHeader('Luas Daun Pintu (m2)');
        $this->getColumnByName('luas_daun_pintu_m2')->setLabel('Luas daun pintu (m2)');
        
        $this->getColumnByName('panj_kusen_m')->setColumnWidth('150');
        $this->getColumnByName('panj_kusen_m')->setHeader('Panjang Kusen (m)');
        $this->getColumnByName('panj_kusen_m')->setLabel('Panjang kusen (m)');
        
        $this->getColumnByName('luas_tutup_lantai_m2')->setColumnWidth('150');
        $this->getColumnByName('luas_tutup_lantai_m2')->setHeader('Luas Tutup Lantai (m2)');
        $this->getColumnByName('luas_tutup_lantai_m2')->setLabel('Luas tutup lantai (m2)');
        
        $this->getColumnByName('panj_inst_listrik_m')->setColumnWidth('150');
        $this->getColumnByName('panj_inst_listrik_m')->setHeader('Luas Instalasi Listrik (m)');
        $this->getColumnByName('panj_inst_listrik_m')->setLabel('Luas instalasi listrik (m)');
        
        $this->getColumnByName('jml_inst_listrik')->setColumnWidth('150');
        $this->getColumnByName('jml_inst_listrik')->setHeader('Jml Instalasi Listrik');
        $this->getColumnByName('jml_inst_listrik')->setLabel('Jml instalasi listrik');
        
        $this->getColumnByName('panj_inst_air_m')->setColumnWidth('150');
        $this->getColumnByName('panj_inst_air_m')->setHeader('Panjang Instalasi Air (m)');
        $this->getColumnByName('panj_inst_air_m')->setLabel('Panjang instalasi air (m)');
        
        $this->getColumnByName('jml_inst_air')->setColumnWidth('150');
        $this->getColumnByName('jml_inst_air')->setHeader('Jml Instalasi Air');
        $this->getColumnByName('jml_inst_air')->setLabel('Jml instalasi air');
        
        $this->getColumnByName('panj_drainase_m')->setColumnWidth('150');
        $this->getColumnByName('panj_drainase_m')->setHeader('Panjang Drainase (m)');
        $this->getColumnByName('panj_drainase_m')->setLabel('Panjang drainase (m)');
        
        $this->getColumnByName('luas_finish_struktur_m2')->setColumnWidth('150');
        $this->getColumnByName('luas_finish_struktur_m2')->setHeader('Luas Finish Struktur (m2)');
        $this->getColumnByName('luas_finish_struktur_m2')->setLabel('Luas finish struktur (m2)');
        
        $this->getColumnByName('luas_finish_plafon_m2')->setColumnWidth('150');
        $this->getColumnByName('luas_finish_plafon_m2')->setHeader('Luas Finish Plafon (m2)');
        $this->getColumnByName('luas_finish_plafon_m2')->setLabel('Luas finish plafon (m2)');
        
        $this->getColumnByName('luas_finish_dinding_m2')->setColumnWidth('150');
        $this->getColumnByName('luas_finish_dinding_m2')->setHeader('Luas Finish Dinding (m2)');
        $this->getColumnByName('luas_finish_dinding_m2')->setLabel('Luas finish dinding (m2)');
        
        $this->getColumnByName('luas_finish_kpj_m2')->setColumnWidth('150');
        $this->getColumnByName('luas_finish_kpj_m2')->setHeader('Luas Finish KPJ (m2)');
        $this->getColumnByName('luas_finish_kpj_m2')->setLabel('Luas finish KPJ (m2)');

        $this->getColumnByName('nm_ruang')->setDescription('Nama Ruangan');
        $this->getColumnByName('reg_pras')->setDescription('Registrasi Prasarana');
        $this->getColumnByName('lantai')->setDescription('keberadaan dilantai');
        $this->getColumnByName('panjang')->setDescription('ukuran panjang ruangan');
        $this->getColumnByName('lebar')->setDescription('ukuran lebar ruangan');
        $this->getColumnByName('luas_ruang')->setDescription('ukuran panjang ruangan dikali ukuran lebar ruangan');
        $this->getColumnByName('kapasitas')->setDescription('Kapasitas menampung');
        $this->getColumnByName('luas_plester_m2')->setDescription('Luas plester');
        $this->getColumnByName('luas_plafon_m2')->setDescription('Luas plafon');
        $this->getColumnByName('luas_dinding_m2')->setDescription('Luas dinding');
        $this->getColumnByName('luas_daun_jendela_m2')->setDescription('Luas daun jendela');
        $this->getColumnByName('luas_daun_pintu_m2')->setDescription('Luas daun pintu');
        $this->getColumnByName('panj_kusen_m')->setDescription('Panjang Kusen');
        $this->getColumnByName('luas_tutup_lantai_m2')->setDescription('Luas tutup lantai');
        $this->getColumnByName('panj_inst_listrik_m')->setDescription('Panjang Instalasi Listrik');
        $this->getColumnByName('jml_inst_listrik')->setDescription('Jumlah Instalasi Listrik');
        $this->getColumnByName('panj_inst_air_m')->setDescription('Panjang Instalasi Air');
        $this->getColumnByName('jml_inst_air')->setDescription('Jumlah Instalasi Air');
        $this->getColumnByName('panj_drainase_m')->setDescription('Panjang Drainase');
        $this->getColumnByName('luas_finish_struktur_m2')->setDescription('Luas finish struktur');
        $this->getColumnByName('luas_finish_plafon_m2')->setDescription('Luas finish plafon');
        $this->getColumnByName('luas_finish_dinding_m2')->setDescription('Luas finish dinding');
        $this->getColumnByName('luas_finish_kpj_m2')->setDescription('Luas finish kpj');

    }
    
}