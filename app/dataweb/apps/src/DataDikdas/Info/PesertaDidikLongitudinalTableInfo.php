<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;
use DataDikdas\ColumnInfo;
use DataDikdas;

class PesertaDidikLongitudinalTableInfo extends base\BasePesertaDidikLongitudinalTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_pd_long');

        // Override below here!
        $this->getColumnByName('tinggi_badan')->setXtype('numberfield');
        $this->getColumnByName('tinggi_badan')->setMin(0);
        $this->getColumnByName('tinggi_badan')->setLabel('Tinggi badan (cm)');
        $this->getColumnByName('tinggi_badan')->setInputLength(3);
        $this->getColumnByName('tinggi_badan')->setMinLength(2);
        $this->getColumnByName('berat_badan')->setLabel('Berat badan (kg)');
        $this->getColumnByName('berat_badan')->setInputLength(3);
        $this->getColumnByName('berat_badan')->setMinLength(2);
        $this->getColumnByName('lingkar_kepala')->setInputLength(3);
        $this->getColumnByName('lingkar_kepala')->setMinLength(1);

        $this->getColumnByName('jarak_rumah_ke_sekolah')->setEnumValues(array("1" => "kurang dari 1 km", "2" => "lebih dari 1 km"));
        $this->getColumnByName('jarak_rumah_ke_sekolah')->setColumnsRadio(1);

        $this->getColumnByName('jarak_rumah_ke_sekolah_km')->setLabel('Sebutkan (dalam kilometer)');
        $this->getColumnByName('jarak_rumah_ke_sekolah_km')->setInputLength(3);

        $this->getColumnByName('jarak_rumah_ke_sekolah_km')->setFlex(1);
        $this->getColumnByName('jarak_rumah_ke_sekolah')->setLabel('Jarak rumah ke sekolah');
        $this->getColumnByName('jarak_rumah_ke_sekolah')->setLabelWidth(10);
        $this->getColumnByName('jarak_rumah_ke_sekolah')->setFlex(1);

        $fieldGroup2 = new \DataDikdas\FieldgroupInfo();
        $this->addRange('waktu_tempuh_ke_sekolah', 'menit_tempuh_ke_sekolah', $fieldGroup2, 'Waktu tempuh ke sekolah (jam / menit)');
        $this->getColumnByName('waktu_tempuh_ke_sekolah')->setLabel('');
        $this->getColumnByName('waktu_tempuh_ke_sekolah')->setMax(24);
        $this->getColumnByName('waktu_tempuh_ke_sekolah')->setFlex(1);
        $this->getColumnByName('menit_tempuh_ke_sekolah')->setLabel('/');
        $this->getColumnByName('menit_tempuh_ke_sekolah')->setLabelWidth(1);
        $this->getColumnByName('menit_tempuh_ke_sekolah')->setFlex(1);
        $this->getColumnByName('menit_tempuh_ke_sekolah')->setMax(60);

        $this->getColumnByName('jumlah_saudara_kandung')->setXtype('numberfield');
        $this->getColumnByName('jumlah_saudara_kandung')->setMin(0);
        $this->getColumnByName('jumlah_saudara_kandung')->setInputLength(2);

        $this->getColumnByName('tinggi_badan')->setDescription('Diisi dengan angka tinggi badan peserta didik dalam satuan sentimeter.');
        $this->getColumnByName('berat_badan')->setDescription('Diisi dengan angka berat badan peserta didik dalam satuan kilogram.');
        $this->getColumnByName('jarak_rumah_ke_sekolah')->setDescription('Pilih jarak rumah peserta didik ke sekolah, kurang dari 1 km atau lebih dari 1 km.');
        $this->getColumnByName('jarak_rumah_ke_sekolah_km')->setDescription('Apabila jarak rumah peserta didik ke sekolah lebih dari 1 km, isikan dengan angka jarak yang sebenarnya pada kolom ini dalam satuan kilometer. Jika akan menggunakan desimal gunakan tanda titik (.) contoh 5.5 (baca : lima koma lima) ');
        $this->getColumnByName('waktu_tempuh_ke_sekolah')->setDescription('Diisi lama waktu tempuh peserta didik ke sekolah dalam jam');
        $this->getColumnByName('menit_tempuh_ke_sekolah')->setDescription('Diisi 0 apabila lama waktu tempuh  tepat dalam hitungan jam, namun apabila ada lebih maka diisi untuk menyatakan dalam menit');
        $this->getColumnByName('jumlah_saudara_kandung')->setDescription('Diisi dengan angka jumlah saudara kandung yang dimiliki peserta didik. Jumlah saudara kandung dihitung tanpa menyertakan peserta didik. Rumusnya adalah jumlah kakak ditambah jumlah adik.');


    }

}