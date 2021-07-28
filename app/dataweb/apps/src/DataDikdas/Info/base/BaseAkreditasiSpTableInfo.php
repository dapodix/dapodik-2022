<?php
namespace DataDikdas\Info\base;
use DataDikdas\TableInfo;

/*
 * The Base TableInfo for AkreditasiSp Table
 */
class BaseAkreditasiSpTableInfo extends TableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.AkreditasiSpTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function initialize()
    {
        $this->setName('akreditasi_sp');
        $this->setPhpName('AkreditasiSp');
        $this->setClassname('DataDikdas\\Model\\AkreditasiSp');
        $this->setPackage('DataDikdas.Model');
    }

    public function setVariables() {

        $this->setPkName(            'akred_sp_id');
        $this->setIsData(           1);
        $this->setCreateGrid(       1);
        $this->setCreateForm(       1);
        $this->setIsRef(            0);
        $this->setIsStaticRef(      0);
        $this->setIsBigRef(         1);
        $this->setIsSmallRef(       0);
        $this->setIsCompositePk(    0);
        $this->setDisplayField(     'nama');
        $this->setRendererString(   'akred_sp_id_str');
        $this->setHeader(           'Akreditasi Sp');
        $this->setLabel(            'Akreditasi sp');
        $this->setCreateCombobox(   1);
        $this->setCreateRadiogroup( 0);
        $this->setCreateList(       1);
        $this->setCreateModel(      1);
        $this->setXtypeCombo(       '');
        $this->setXtypeRadio(       '');
        $this->setXtypeList(        '');
        $this->setBelongsTo(array(  "SekolahPaud","Sekolah"));
        $this->setIsSplitEntity(    );
        $this->setHasSplitEntity(   );
        $this->setSplitEntityName(  '');
        $this->setCreateWinChildDelete(0);
        $this->setTableValidation();

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'akred_sp_id');
        $cvar->setColumnPhpName(    'AkredSpId');
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
        $cvar->setColumnName(       'sekolah_id');
        $cvar->setColumnPhpName(    'SekolahId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'Sekolah');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Sekolah');
        $cvar->setLabel(            'Sekolah');
        $cvar->setInputLength(      0);
        $cvar->setFieldWidth(       0);
        $cvar->setColumnWidth(      220);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'sekolahcombo');
        $cvar->setComboXtype(       'sekolahcombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'akred_sp_sk');
        $cvar->setColumnPhpName(    'AkredSpSk');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Akred Sp Sk');
        $cvar->setLabel(            'Akred sp sk');
        $cvar->setInputLength(      80);
        $cvar->setFieldWidth(       240);
        $cvar->setColumnWidth(      300);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'textfield');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'akred_sp_tmt');
        $cvar->setColumnPhpName(    'AkredSpTmt');
        $cvar->setType(             'date');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Akred Sp Tmt');
        $cvar->setLabel(            'Akred sp tmt');
        $cvar->setInputLength(      0);
        $cvar->setFieldWidth(       0);
        $cvar->setColumnWidth(      100);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'datefield');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'akred_sp_tst');
        $cvar->setColumnPhpName(    'AkredSpTst');
        $cvar->setType(             'date');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Akred Sp Tst');
        $cvar->setLabel(            'Akred sp tst');
        $cvar->setInputLength(      0);
        $cvar->setFieldWidth(       0);
        $cvar->setColumnWidth(      100);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'datefield');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'akreditasi_id');
        $cvar->setColumnPhpName(    'AkreditasiId');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'Akreditasi');
        $cvar->setMin(              0);
        $cvar->setMax(              6);
        $cvar->setHeader(           'Akreditasi');
        $cvar->setLabel(            'Akreditasi');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      150);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'akreditasicombo');
        $cvar->setComboXtype(       'akreditasicombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'la_id');
        $cvar->setColumnPhpName(    'LaId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'LembagaAkreditasi');
        $cvar->setMin(              0);
        $cvar->setMax(              6);
        $cvar->setHeader(           'La');
        $cvar->setLabel(            'La');
        $cvar->setInputLength(      5);
        $cvar->setFieldWidth(       15);
        $cvar->setColumnWidth(      220);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'lembagaakreditasicombo');
        $cvar->setComboXtype(       'lembagaakreditasicombo');
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