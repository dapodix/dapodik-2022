<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class PenggunaTableInfo extends base\BasePenggunaTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        //$this->getColumnByName('nama')->setAnchor(100);
        $this->moveColumnBelow($this->getColumnByName('ptk_id'), $this->getColumnByName('nama'));
        $this->moveColumnBelow($this->getColumnByName('peserta_didik_id'), $this->getColumnByName('ptk_id'));

        $this->setBelongsTo(array(  "Sekolah","LembagaNonSekolah","Yayasan","Dudi","Ptk","PesertaDidik"));

        $this->getColumnByName('sekolah_id')->setXtype('hidden');
        $this->getColumnByName('sekolah_id')->setHideColumn(1);

        $this->getColumnByName('dudi_id')->setXtype('hidden');
        $this->getColumnByName('dudi_id')->setHideColumn(1);

        $this->getColumnByName('username')->setXtype('displayfield');

        $this->getColumnByName('password')->setXtype('hidden');
        $this->getColumnByName('password')->setHideColumn(1);

        $this->getColumnByName('lembaga_id')->setXtype('hidden');
        $this->getColumnByName('lembaga_id')->setHideColumn(1);

        $this->getColumnByName('nip_nim')->setXtype('hidden');
        $this->getColumnByName('nip_nim')->setHideColumn(1);

        $this->getColumnByName('jabatan_lembaga')->setXtype('hidden');
        $this->getColumnByName('jabatan_lembaga')->setHideColumn(1);

        $this->getColumnByName('aktif')->setXtype('hidden');
        $this->getColumnByName('aktif')->setHideColumn(1);

        $this->getColumnByName('kode_wilayah')->setXtype('hidden');
        $this->getColumnByName('kode_wilayah')->setHideColumn(1);

        $this->getColumnByName('la_id')->setXtype('hidden');
        $this->getColumnByName('la_id')->setHideColumn(1);
        $this->getColumnByName('yayasan_id')->setXtype('hidden');
        $this->getColumnByName('yayasan_id')->setHideColumn(1);

        $this->getColumnByName('ptk_id')->setHeader('GTK');
        $this->getColumnByName('ptk_id')->setLabel('GTK');
        $this->getColumnByName('ptk_id')->setXtype('ptkcombo');
        $this->getColumnByName('ptk_id')->setIsFk(1);
        $this->getColumnByName('ptk_id')->setFkTableName('Ptk');
        $this->getColumnByName('ptk_id')->setDisplayField('nama');
        $this->getColumnByName('ptk_id')->setComboXtype('ptkcombo');

        $this->getColumnByName('peserta_didik_id')->setXtype('pesertadidikcombo');
        $this->getColumnByName('peserta_didik_id')->setIsFk(1);
        $this->getColumnByName('peserta_didik_id')->setFkTableName('PesertaDidik');
        $this->getColumnByName('peserta_didik_id')->setDisplayField('nama');
        $this->getColumnByName('peserta_didik_id')->setComboXtype('pesertadidikcombo');

        $this->getColumnByName('nama')->setColumnWidth(150);
        $this->getColumnByName('ptk_id')->setColumnWidth(250);
        $this->getColumnByName('peserta_didik_id')->setColumnWidth(250);

        $this->getColumnByName('kode_lemb_sert')->setXtype('hidden');
        // $this->getColumnByName('peserta_didik_id')->setXtype('hidden');
        $this->getColumnByName('a_bot')->setXtype('hidden');
        $this->getColumnByName('approval_pengguna')->setXtype('hidden');
        $this->getColumnByName('password_lama')->setXtype('hidden');
        $this->getColumnByName('tgl_ganti_pwd')->setXtype('hidden');
        $this->getColumnByName('id_sdm_pengguna')->setXtype('hidden');
        $this->getColumnByName('id_pd_pengguna')->setXtype('hidden');
        $this->getColumnByName('token_reg')->setXtype('hidden');
        $this->getColumnByName('tempat_lahir')->setXtype('hidden');
        $this->getColumnByName('tgl_lahir')->setXtype('hidden');
        $this->getColumnByName('jenis_kelamin')->setXtype('hidden');
        $this->getColumnByName('alamat')->setXtype('hidden');
        $this->getColumnByName('no_telepon')->setXtype('hidden');
        $this->getColumnByName('jabatan')->setXtype('hidden');

        $this->getColumnByName('kode_lemb_sert')->setHideColumn(1);
        // $this->getColumnByName('peserta_didik_id')->setHideColumn(1);
        $this->getColumnByName('a_bot')->setHideColumn(1);
        $this->getColumnByName('approval_pengguna')->setHideColumn(1);
        $this->getColumnByName('password_lama')->setHideColumn(1);
        $this->getColumnByName('tgl_ganti_pwd')->setHideColumn(1);
        $this->getColumnByName('id_sdm_pengguna')->setHideColumn(1);
        $this->getColumnByName('id_pd_pengguna')->setHideColumn(1);
        $this->getColumnByName('token_reg')->setHideColumn(1);
        $this->getColumnByName('tempat_lahir')->setHideColumn(1);
        $this->getColumnByName('tgl_lahir')->setHideColumn(1);
        $this->getColumnByName('jenis_kelamin')->setHideColumn(1);
        $this->getColumnByName('alamat')->setHideColumn(1);
        $this->getColumnByName('no_telepon')->setHideColumn(1);
        $this->getColumnByName('jabatan')->setHideColumn(1);

        /* $colJk = $this->getColumnByName('jenis_kelamin');
        $colJk->setHeader('JK');
        $colJk->setEnumValues(array("L" => "L" , "P" => "P")); */

        // 0001761330 2000-04-12
        // $this->getColumnByName('ym')->setLabel('WhatsApp');
        // $this->getColumnByName('ym')->setHeader('WhatsApp');
        // $this->getColumnByName('ym')->setHideColumn(1);
        // $this->getColumnByName('skype')->setHideColumn(1);
    }

}