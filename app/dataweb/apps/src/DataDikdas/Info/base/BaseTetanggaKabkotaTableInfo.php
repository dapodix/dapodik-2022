<?php
namespace DataDikdas\Info\base;
use DataDikdas\TableInfo;

/*
 * The Base TableInfo for TetanggaKabkota Table
 */
class BaseTetanggaKabkotaTableInfo extends TableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.TetanggaKabkotaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function initialize()
    {
        $this->setName('tetangga_kabkota');
        $this->setPhpName('TetanggaKabkota');
        $this->setClassname('DataDikdas\\Model\\TetanggaKabkota');
        $this->setPackage('DataDikdas.Model');
    }

    public function setVariables() {

        $this->setPkName(            'tetangga_kabkota_id');
        $this->setIsData(           0);
        $this->setCreateGrid(       0);
        $this->setCreateForm(       0);
        $this->setIsRef(            1);
        $this->setIsStaticRef(      0);
        $this->setIsBigRef(         0);
        $this->setIsSmallRef(       1);
        $this->setIsCompositePk(    1);
        $this->setDisplayField(     'nama');
        $this->setRendererString(   'tetangga_kabkota_id_str');
        $this->setHeader(           'Ref.tetangga Kabkota');
        $this->setLabel(            'Ref.tetangga kabkota');
        $this->setCreateCombobox(   1);
        $this->setCreateRadiogroup( 1);
        $this->setCreateList(       1);
        $this->setCreateModel(      1);
        $this->setXtypeCombo(       'ref.tetanggakabkotacombo');
        $this->setXtypeRadio(       'ref.tetanggakabkotaradio');
        $this->setXtypeList(        'ref.tetanggakabkotalist');
        $this->setHasMany(array(    ""));
        $this->setIsSplitEntity(    );
        $this->setHasSplitEntity(   );
        $this->setSplitEntityName(  '');
        $this->setRelatingColumns(array(    ""));
        $this->setCreateWinChildDelete(0);
        $this->setTableValidation();

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'tetangga_kabkota_id');
        $cvar->setColumnPhpName(    'TetanggaKabkotaId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '1');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              0);
        $cvar->setHeader(           ' ');
        $cvar->setLabel(            ' ');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       100);
        $cvar->setColumnWidth(      100);
        $cvar->setHideColumn(       1);
        $cvar->setXtype(            'hidden');
        $cvar->setComboXtype(       'tetanggakabkotaid');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     1);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'kode_wilayah1');
        $cvar->setColumnPhpName(    'KodeWilayah1');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '1');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'MstWilayah');
        $cvar->setMin(              0);
        $cvar->setMax(              0);
        $cvar->setHeader(           'ID');
        $cvar->setLabel(            'ID');
        $cvar->setInputLength(      8);
        $cvar->setFieldWidth(       24);
        $cvar->setColumnWidth(      180);
        $cvar->setHideColumn(       1);
        $cvar->setXtype(            'hidden');
        $cvar->setComboXtype(       'mstwilayahcombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'kode_wilayah2');
        $cvar->setColumnPhpName(    'KodeWilayah2');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '1');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'MstWilayah');
        $cvar->setMin(              0);
        $cvar->setMax(              0);
        $cvar->setHeader(           'ID');
        $cvar->setLabel(            'ID');
        $cvar->setInputLength(      8);
        $cvar->setFieldWidth(       24);
        $cvar->setColumnWidth(      180);
        $cvar->setHideColumn(       1);
        $cvar->setXtype(            'hidden');
        $cvar->setComboXtype(       'mstwilayahcombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'expired_date');
        $cvar->setColumnPhpName(    'ExpiredDate');
        $cvar->setType(             'timestamp');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Expired Date');
        $cvar->setLabel(            'Expired date');
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


        $this->setColumns($columns);
        /*
        $this->setTitle( "Fieldset Name" );
        $this->setGroupId( 1 );
        $this->setParentGroupId( 0 );
        $this->setGroupingMethod( 'fieldset' );
        */

    }

}