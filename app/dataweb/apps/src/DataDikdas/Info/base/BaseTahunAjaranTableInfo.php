<?php
namespace DataDikdas\Info\base;
use DataDikdas\TableInfo;

/*
 * The Base TableInfo for TahunAjaran Table
 */
class BaseTahunAjaranTableInfo extends TableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.TahunAjaranTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function initialize()
    {
        $this->setName('tahun_ajaran');
        $this->setPhpName('TahunAjaran');
        $this->setClassname('DataDikdas\\Model\\TahunAjaran');
        $this->setPackage('DataDikdas.Model');
    }

    public function setVariables() {

        $this->setPkName(            'tahun_ajaran_id');
        $this->setIsData(           0);
        $this->setCreateGrid(       0);
        $this->setCreateForm(       0);
        $this->setIsRef(            1);
        $this->setIsStaticRef(      0);
        $this->setIsBigRef(         1);
        $this->setIsSmallRef(       0);
        $this->setIsCompositePk(    0);
        $this->setDisplayField(     'nama');
        $this->setRendererString(   'tahun_ajaran_id_str');
        $this->setHeader(           'Ref.tahun Ajaran');
        $this->setLabel(            'Ref.tahun ajaran');
        $this->setCreateCombobox(   1);
        $this->setCreateRadiogroup( 0);
        $this->setCreateList(       1);
        $this->setCreateModel(      1);
        $this->setXtypeCombo(       'ref.tahunajarancombo');
        $this->setXtypeRadio(       'ref.tahunajaranradio');
        $this->setXtypeList(        'ref.tahunajaranlist');
        $this->setHasMany(array(    ""));
        $this->setIsSplitEntity(    );
        $this->setHasSplitEntity(   );
        $this->setSplitEntityName(  '');
        $this->setRelatingColumns(array(    ""));
        $this->setCreateWinChildDelete(0);
        $this->setTableValidation();

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'tahun_ajaran_id');
        $cvar->setColumnPhpName(    'TahunAjaranId');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '1');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              23);
        $cvar->setHeader(           'ID');
        $cvar->setLabel(            'ID');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      360);
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
        $cvar->setInputLength(      10);
        $cvar->setFieldWidth(       30);
        $cvar->setColumnWidth(      90);
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
        $cvar->setColumnName(       'periode_aktif');
        $cvar->setColumnPhpName(    'PeriodeAktif');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Periode Aktif');
        $cvar->setLabel(            'Periode aktif');
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
        $cvar->setColumnName(       'tanggal_mulai');
        $cvar->setColumnPhpName(    'TanggalMulai');
        $cvar->setType(             'date');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Tanggal Mulai');
        $cvar->setLabel(            'Tanggal mulai');
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
        $cvar->setColumnName(       'tanggal_selesai');
        $cvar->setColumnPhpName(    'TanggalSelesai');
        $cvar->setType(             'date');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Tanggal Selesai');
        $cvar->setLabel(            'Tanggal selesai');
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