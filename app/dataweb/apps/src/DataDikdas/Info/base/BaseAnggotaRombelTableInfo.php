<?php
namespace DataDikdas\Info\base;
use DataDikdas\TableInfo;

/*
 * The Base TableInfo for AnggotaRombel Table
 */
class BaseAnggotaRombelTableInfo extends TableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.AnggotaRombelTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function initialize()
    {
        $this->setName('anggota_rombel');
        $this->setPhpName('AnggotaRombel');
        $this->setClassname('DataDikdas\\Model\\AnggotaRombel');
        $this->setPackage('DataDikdas.Model');
    }

    public function setVariables() {

        $this->setPkName(            'anggota_rombel_id');
        $this->setIsData(           1);
        $this->setCreateGrid(       1);
        $this->setCreateForm(       1);
        $this->setIsRef(            0);
        $this->setIsStaticRef(      0);
        $this->setIsBigRef(         1);
        $this->setIsSmallRef(       0);
        $this->setIsCompositePk(    0);
        $this->setDisplayField(     'nama');
        $this->setRendererString(   'anggota_rombel_id_str');
        $this->setHeader(           'Anggota Rombel');
        $this->setLabel(            'Anggota rombel');
        $this->setCreateCombobox(   1);
        $this->setCreateRadiogroup( 0);
        $this->setCreateList(       1);
        $this->setCreateModel(      1);
        $this->setXtypeCombo(       '');
        $this->setXtypeRadio(       '');
        $this->setXtypeList(        '');
        $this->setHasMany(array(    "BantuanPd"));
        $this->setBelongsTo(array(  "RombonganBelajar","PesertaDidik"));
        $this->setIsSplitEntity(    );
        $this->setHasSplitEntity(   );
        $this->setSplitEntityName(  '');
        $this->setRelatingColumns(array(    "BantuanPd.anggota_rombel_id"));
        $this->setCreateWinChildDelete(1);
        $this->setTableValidation();

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'anggota_rombel_id');
        $cvar->setColumnPhpName(    'AnggotaRombelId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '1');
		$cvar->setIsPk(             '1');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'ID');
        $cvar->setLabel(            'ID');
        $cvar->setInputLength(      0);
        $cvar->setFieldWidth(       0);
        $cvar->setColumnWidth(      60);
        $cvar->setHideColumn(       1);
        $cvar->setXtype(            'hidden');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'rombongan_belajar_id');
        $cvar->setColumnPhpName(    'RombonganBelajarId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'RombonganBelajar');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Rombongan Belajar');
        $cvar->setLabel(            'Rombongan belajar');
        $cvar->setInputLength(      0);
        $cvar->setFieldWidth(       0);
        $cvar->setColumnWidth(      150);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'rombonganbelajarcombo');
        $cvar->setComboXtype(       'rombonganbelajarcombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'peserta_didik_id');
        $cvar->setColumnPhpName(    'PesertaDidikId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'PesertaDidik');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Peserta Didik');
        $cvar->setLabel(            'Peserta didik');
        $cvar->setInputLength(      0);
        $cvar->setFieldWidth(       0);
        $cvar->setColumnWidth(      220);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'pesertadidikcombo');
        $cvar->setComboXtype(       'pesertadidikcombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'jenis_pendaftaran_id');
        $cvar->setColumnPhpName(    'JenisPendaftaranId');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'JenisPendaftaran');
        $cvar->setMin(              0);
        $cvar->setMax(              9);
        $cvar->setHeader(           'Jenis Pendaftaran');
        $cvar->setLabel(            'Jenis pendaftaran');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      140);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'jenispendaftarancombo');
        $cvar->setComboXtype(       'jenispendaftarancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;


        $this->setColumns($columns);
        /*
        $this->setTitle( "Fieldset Name" );
        $this->setGroupId( 1 );
        $this->setParentGroupId( 0 );
        $this->setGroupingMethod( 'fieldset' );
        */

    }

}