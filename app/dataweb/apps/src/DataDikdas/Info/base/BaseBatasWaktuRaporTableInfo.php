<?php
namespace DataDikdas\Info\base;
use DataDikdas\TableInfo;

/*
 * The Base TableInfo for BatasWaktuRapor Table
 */
class BaseBatasWaktuRaporTableInfo extends TableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.BatasWaktuRaporTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function initialize()
    {
        $this->setName('batas_waktu_rapor');
        $this->setPhpName('BatasWaktuRapor');
        $this->setClassname('DataDikdas\\Model\\BatasWaktuRapor');
        $this->setPackage('DataDikdas.Model');
    }

    public function setVariables() {

        $this->setPkName(            'semester_id');
        $this->setIsData(           0);
        $this->setCreateGrid(       0);
        $this->setCreateForm(       0);
        $this->setIsRef(            1);
        $this->setIsStaticRef(      0);
        $this->setIsBigRef(         0);
        $this->setIsSmallRef(       1);
        $this->setIsCompositePk(    0);
        $this->setDisplayField(     'nama');
        $this->setRendererString(   'semester_id_str');
        $this->setHeader(           'Ref.batas Waktu Rapor');
        $this->setLabel(            'Ref.batas waktu rapor');
        $this->setCreateCombobox(   1);
        $this->setCreateRadiogroup( 1);
        $this->setCreateList(       1);
        $this->setCreateModel(      1);
        $this->setXtypeCombo(       'ref.bataswakturaporcombo');
        $this->setXtypeRadio(       'ref.bataswakturaporradio');
        $this->setXtypeList(        'ref.bataswakturaporlist');
        $this->setHasMany(array(    ""));
        $this->setIsSplitEntity(    );
        $this->setHasSplitEntity(   );
        $this->setSplitEntityName(  '');
        $this->setRelatingColumns(array(    ""));
        $this->setCreateWinChildDelete(0);
        $this->setTableValidation();

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'semester_id');
        $cvar->setColumnPhpName(    'SemesterId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '1');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'Semester');
        $cvar->setMin(              0);
        $cvar->setMax(              0);
        $cvar->setHeader(           'ID');
        $cvar->setLabel(            'ID');
        $cvar->setInputLength(      5);
        $cvar->setFieldWidth(       15);
        $cvar->setColumnWidth(      140);
        $cvar->setHideColumn(       1);
        $cvar->setXtype(            'hidden');
        $cvar->setComboXtype(       'semestercombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'tgl_rapor_mulai');
        $cvar->setColumnPhpName(    'TglRaporMulai');
        $cvar->setType(             'date');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Tgl Rapor Mulai');
        $cvar->setLabel(            'Tgl rapor mulai');
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
        $cvar->setColumnName(       'tgl_rapor_selesai');
        $cvar->setColumnPhpName(    'TglRaporSelesai');
        $cvar->setType(             'date');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Tgl Rapor Selesai');
        $cvar->setLabel(            'Tgl rapor selesai');
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
        $cvar->setColumnName(       'tgl_usm_mulai');
        $cvar->setColumnPhpName(    'TglUsmMulai');
        $cvar->setType(             'date');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Tgl Usm Mulai');
        $cvar->setLabel(            'Tgl usm mulai');
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
        $cvar->setColumnName(       'tgl_usm_selesai');
        $cvar->setColumnPhpName(    'TglUsmSelesai');
        $cvar->setType(             'date');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Tgl Usm Selesai');
        $cvar->setLabel(            'Tgl usm selesai');
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