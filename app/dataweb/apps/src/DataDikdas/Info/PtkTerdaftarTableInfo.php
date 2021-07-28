<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class PtkTerdaftarTableInfo extends base\BasePtkTerdaftarTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->moveColumnBelow($this->getColumnByName('aktif_bulan_07'), $this->getColumnByName('ptk_induk'));
        $this->moveColumnBelow($this->getColumnByName('aktif_bulan_08'), $this->getColumnByName('aktif_bulan_07'));
        $this->moveColumnBelow($this->getColumnByName('aktif_bulan_09'), $this->getColumnByName('aktif_bulan_08'));
        $this->moveColumnBelow($this->getColumnByName('aktif_bulan_10'), $this->getColumnByName('aktif_bulan_09'));
        $this->moveColumnBelow($this->getColumnByName('aktif_bulan_11'), $this->getColumnByName('aktif_bulan_10'));
        $this->moveColumnBelow($this->getColumnByName('aktif_bulan_12'), $this->getColumnByName('aktif_bulan_11'));
        
        $this->moveColumnBelow($this->getColumnByName('jenis_keluar_id'), $this->getColumnByName('aktif_bulan_06'));
        $this->moveColumnBelow($this->getColumnByName('tmt_tugas'), $this->getColumnByName('tanggal_surat_tugas'));
        
        $this->setDisplayField('ptk_id_str');
        $this->setRendererString('ptk_id_str');
                
        $colJk1 = $this->getColumnByName('ptk_induk');
        $colJk1->setEnumValues(array(1 => "Ya" , 0 => "Tidak"));
        $colJk1->setLabel('Sekolah induk');
        
        $this->getColumnByName('aktif_bulan_07')->setLabel('Jul');
        $this->getColumnByName('aktif_bulan_08')->setLabel('Ags');
        $this->getColumnByName('aktif_bulan_09')->setLabel('Sep');
        $this->getColumnByName('aktif_bulan_10')->setLabel('Okt');
        $this->getColumnByName('aktif_bulan_11')->setLabel('Nov');
        $this->getColumnByName('aktif_bulan_12')->setLabel('Des');
        $this->getColumnByName('aktif_bulan_01')->setLabel('Jan');
        $this->getColumnByName('aktif_bulan_02')->setLabel('Feb');
        $this->getColumnByName('aktif_bulan_03')->setLabel('Mar');
        $this->getColumnByName('aktif_bulan_04')->setLabel('Apr');
        $this->getColumnByName('aktif_bulan_05')->setLabel('Mei');
        $this->getColumnByName('aktif_bulan_06')->setLabel('Jun');
        
        $fieldSet1 = new \DataDikdas\FieldsetInfo();
        $this->addRange('nomor_surat_tugas', 'ptk_induk', $fieldSet1, 'Penugasan');
        
        $cbg = new \DataDikdas\CheckboxGroupInfo();
        $cbg->setColumnNumber(4);
        $this->addRange('aktif_bulan_07', 'aktif_bulan_06', $cbg, 'Keaktifan PTK');

        $fieldSet2 = new \DataDikdas\FieldsetInfo();
        $this->addRange('jenis_keluar_id', 'tgl_ptk_keluar', $fieldSet2, 'Di Isi Saat Sudah Keluar');
        
        $this->getColumnByName('tmt_tugas')->setLabel('TMT tugas');
        $this->getColumnByName('tgl_ptk_keluar')->setLabel('Tanggal keluar');
        $this->getColumnByName('tgl_ptk_keluar')->setAllowEmpty(1);
        $this->getColumnByName('jenis_keluar_id')->setLabel('Keluar karena');
        
        $this->getColumnByName('tahun_ajaran_id')->setXtype('hidden');
        $this->getColumnByName('sekolah_id')->setXtype('hidden');
        $this->getColumnByName('ptk_id')->setXtype('hidden');

        $this->getColumnByName('jenis_keluar_id')->setDescription('Pilih alasan keluar PTK dari sekolah.');
        $this->getColumnByName('nomor_surat_tugas')->setDescription('Bagi PTK yang status sekolahnya SEKOLAH INDUK diisi NONOR SURAT PENUGASAN/PENEMPATAN pertama kali PTK di sekolah ini. Bagi PTK dengan status sekolah BUKAN INDUK diisi dengan nomor SURAT PEMBAGIAN TUGAS MENGAJAR yang terbit setiap tahun atau semester. Bagi PTK WNA diisi dengan Rekomendasi Ijin Mempekerjakan Tenaga Asing (IMTA) dari Kemdikbud');
        $this->getColumnByName('tanggal_surat_tugas')->setDescription('Diisi TANGGAL SURAT pada surat yang digunakan sebagai dasar pengisian nomor surat tugas diatas');
        $this->getColumnByName('ptk_induk')->setDescription('Pilih penugasan PTK di sekolah ini sebagai SEKOLAH INDUK atau SEKOLAH BUKAN INDUK.');
        $this->getColumnByName('tmt_tugas')->setDescription('Diisi TMT (Terhitung Mulai Tanggal) pertama kali PTK bertugas di sekolah ini sesuai dengan surat penugasan.');
        $this->getColumnByName('aktif_bulan_01')->setDescription('Ceklis bulan Januari untuk menyatakan keaktifan PTK pada bulan Januari, jika PTK tidak melaksanakan tugasnya misalkan karena sakit atau cuti maka jangan di ceklis. Penceklisan ini sesuai periode bulan berjalan.');
        $this->getColumnByName('aktif_bulan_02')->setDescription('Ceklis bulan Februari untuk menyatakan keaktifan PTK pada bulan Februari, jika PTK tidak melaksanakan tugasnya misalkan karena sakit atau cuti maka jangan di ceklis. Penceklisan ini sesuai periode bulan berjalan.');
        $this->getColumnByName('aktif_bulan_03')->setDescription('Ceklis bulan Maret untuk menyatakan keaktifan PTK pada bulan Maret, jika PTK tidak melaksanakan tugasnya misalkan karena sakit atau cuti maka jangan di ceklis. Penceklisan ini sesuai periode bulan berjalan.');
        $this->getColumnByName('aktif_bulan_04')->setDescription('Ceklis bulan April untuk menyatakan keaktifan PTK pada bulan April, jika PTK tidak melaksanakan tugasnya misalkan karena sakit atau cuti maka jangan di ceklis. Penceklisan ini sesuai periode bulan berjalan.');
        $this->getColumnByName('aktif_bulan_05')->setDescription('Ceklis bulan Mei untuk menyatakan keaktifan PTK pada bulan Mei, jika PTK tidak melaksanakan tugasnya misalkan karena sakit atau cuti maka jangan di ceklis. Penceklisan ini sesuai periode bulan berjalan.');
        $this->getColumnByName('aktif_bulan_06')->setDescription('Ceklis bulan Juni untuk menyatakan keaktifan PTK pada bulan Juni, jika PTK tidak melaksanakan tugasnya misalkan karena sakit atau cuti maka jangan di ceklis. penceklisan ini sesuai periode bulan berjalan.');
        $this->getColumnByName('aktif_bulan_07')->setDescription('Ceklis bulan Juli untuk menyatakan keaktifan PTK pada bulan Juli, jika PTK tidak melaksanakan tugasnya misalkan karena sakit atau cuti maka jangan di ceklis. Penceklisan ini sesuai periode bulan berjalan.');
        $this->getColumnByName('aktif_bulan_08')->setDescription('Ceklis bulan Agustus untuk menyatakan keaktifan PTK pada bulan Agustus, jika PTK tidak melaksanakan tugasnya misalkan karena sakit atau cuti maka jangan di ceklis. Penceklisan ini sesuai periode bulan berjalan.');
        $this->getColumnByName('aktif_bulan_09')->setDescription('Ceklis bulan September untuk keaktifan PTK pada bulan September, jika PTK tidak melaksanakan tugasnya misalkan karena sakit atau cuti maka jangan di ceklis. Penceklisan ini sesuai periode bulan berjalan.');
        $this->getColumnByName('aktif_bulan_10')->setDescription('Ceklis bulan Oktober untuk menyatakan keaktifan PTK pada bulan Oktober, jika PTK tidak melaksanakan tugasnya misalkan karena sakit atau cuti maka jangan di ceklis. Penceklisan ini sesuai periode bulan berjalan.');
        $this->getColumnByName('aktif_bulan_11')->setDescription('Ceklis bulan November untuk menyatakan keaktifan PTK pada bulan November, jika PTK tidak melaksanakan tugasnya misalkan karena sakit atau cuti maka jangan di ceklis. penceklisan ini sesuai periode bulan berjalan.');
        $this->getColumnByName('aktif_bulan_12')->setDescription('Ceklis bulan Desember untuk menyatakan keaktifan PTK pada bulan Desember, jika PTK tidak melaksanakan tugasnya misalkan karena sakit atau cuti maka jangan di ceklis. Penceklisan ini sesuai periode bulan berjalan.');
        $this->getColumnByName('tgl_ptk_keluar')->setDescription('Diisi tanggal PTK keluar dari sekolah.');

    }
    
}