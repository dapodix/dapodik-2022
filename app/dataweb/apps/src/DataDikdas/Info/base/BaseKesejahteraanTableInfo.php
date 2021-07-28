<?php
namespace DataDikdas\Info\base;
use DataDikdas\TableInfo;

/*
 * The Base TableInfo for Kesejahteraan Table
 */
class BaseKesejahteraanTableInfo extends TableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.KesejahteraanTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function initialize()
    {
        $this->setName('kesejahteraan');
        $this->setPhpName('Kesejahteraan');
        $this->setClassname('DataDikdas\\Model\\Kesejahteraan');
        $this->setPackage('DataDikdas.Model');
    }

    public function setVariables() {

        $this->setPkName(            'kesejahteraan_id');
        $this->setIsData(           1);
        $this->setCreateGrid(       1);
        $this->setCreateForm(       1);
        $this->setIsRef(            0);
        $this->setIsStaticRef(      0);
        $this->setIsBigRef(         1);
        $this->setIsSmallRef(       0);
        $this->setIsCompositePk(    0);
        $this->setDisplayField(     'nama');
        $this->setRendererString(   'kesejahteraan_id_str');
        $this->setHeader(           'Kesejahteraan');
        $this->setLabel(            'Kesejahteraan');
        $this->setCreateCombobox(   1);
        $this->setCreateRadiogroup( 0);
        $this->setCreateList(       1);
        $this->setCreateModel(      1);
        $this->setXtypeCombo(       '');
        $this->setXtypeRadio(       '');
        $this->setXtypeList(        '');
        $this->setHasMany(array(    "VldKesejahteraan"));
        $this->setBelongsTo(array(  "Ptk"));
        $this->setIsSplitEntity(    );
        $this->setHasSplitEntity(   );
        $this->setSplitEntityName(  '');
        $this->setRelatingColumns(array(    "VldKesejahteraan.kesejahteraan_id"));
        $this->setCreateWinChildDelete(1);
        $this->setTableValidation();

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'kesejahteraan_id');
        $cvar->setColumnPhpName(    'KesejahteraanId');
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
        $cvar->setColumnName(       'ptk_id');
        $cvar->setColumnPhpName(    'PtkId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'Ptk');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Ptk');
        $cvar->setLabel(            'Ptk');
        $cvar->setInputLength(      0);
        $cvar->setFieldWidth(       0);
        $cvar->setColumnWidth(      220);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'ptkcombo');
        $cvar->setComboXtype(       'ptkcombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'jenis_kesejahteraan_id');
        $cvar->setColumnPhpName(    'JenisKesejahteraanId');
        $cvar->setType(             'int');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'JenisKesejahteraan');
        $cvar->setMin(              0);
        $cvar->setMax(              11);
        $cvar->setHeader(           'Jenis Kesejahteraan');
        $cvar->setLabel(            'Jenis kesejahteraan');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      170);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'jeniskesejahteraancombo');
        $cvar->setComboXtype(       'jeniskesejahteraancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'nama');
        $cvar->setColumnPhpName(    'Nama');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Nama');
        $cvar->setLabel(            'Nama');
        $cvar->setInputLength(      50);
        $cvar->setFieldWidth(       150);
        $cvar->setColumnWidth(      210);
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
        $cvar->setColumnName(       'penyelenggara');
        $cvar->setColumnPhpName(    'Penyelenggara');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Penyelenggara');
        $cvar->setLabel(            'Penyelenggara');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      360);
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
        $cvar->setColumnName(       'dari_tahun');
        $cvar->setColumnPhpName(    'DariTahun');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Dari Tahun');
        $cvar->setLabel(            'Dari tahun');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      360);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'numberfield');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'sampai_tahun');
        $cvar->setColumnPhpName(    'SampaiTahun');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Sampai Tahun');
        $cvar->setLabel(            'Sampai tahun');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      360);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'numberfield');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'status');
        $cvar->setColumnPhpName(    'Status');
        $cvar->setType(             'int');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Status');
        $cvar->setLabel(            'Status');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      360);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'numberfield');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
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