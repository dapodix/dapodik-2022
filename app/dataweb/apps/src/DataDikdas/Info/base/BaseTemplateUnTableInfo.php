<?php
namespace DataDikdas\Info\base;
use DataDikdas\TableInfo;

/*
 * The Base TableInfo for TemplateUn Table
 */
class BaseTemplateUnTableInfo extends TableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.TemplateUnTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function initialize()
    {
        $this->setName('template_un');
        $this->setPhpName('TemplateUn');
        $this->setClassname('DataDikdas\\Model\\TemplateUn');
        $this->setPackage('DataDikdas.Model');
    }

    public function setVariables() {

        $this->setPkName(            'template_id');
        $this->setIsData(           1);
        $this->setCreateGrid(       1);
        $this->setCreateForm(       1);
        $this->setIsRef(            0);
        $this->setIsStaticRef(      0);
        $this->setIsBigRef(         1);
        $this->setIsSmallRef(       0);
        $this->setIsCompositePk(    0);
        $this->setDisplayField(     'nama');
        $this->setRendererString(   'template_id_str');
        $this->setHeader(           'Ref.template Un');
        $this->setLabel(            'Ref.template un');
        $this->setCreateCombobox(   1);
        $this->setCreateRadiogroup( 0);
        $this->setCreateList(       1);
        $this->setCreateModel(      1);
        $this->setXtypeCombo(       '');
        $this->setXtypeRadio(       '');
        $this->setXtypeList(        '');
        $this->setHasMany(array(    "TemplateRapor","Un"));
        $this->setIsSplitEntity(    );
        $this->setHasSplitEntity(   );
        $this->setSplitEntityName(  '');
        $this->setRelatingColumns(array(    "TemplateRapor.template_id","Un.template_id"));
        $this->setCreateWinChildDelete(1);
        $this->setTableValidation();

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'template_id');
        $cvar->setColumnPhpName(    'TemplateId');
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
        $cvar->setColumnName(       'jenjang_pendidikan_id');
        $cvar->setColumnPhpName(    'JenjangPendidikanId');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'JenjangPendidikan');
        $cvar->setMin(              0);
        $cvar->setMax(              27);
        $cvar->setHeader(           'Jenjang Pendidikan');
        $cvar->setLabel(            'Jenjang pendidikan');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      145);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'jenjangpendidikancombo');
        $cvar->setComboXtype(       'jenjangpendidikancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'tahun_ajaran_id');
        $cvar->setColumnPhpName(    'TahunAjaranId');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'TahunAjaran');
        $cvar->setMin(              0);
        $cvar->setMax(              23);
        $cvar->setHeader(           'Tahun Ajaran');
        $cvar->setLabel(            'Tahun ajaran');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      130);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'tahunajarancombo');
        $cvar->setComboXtype(       'tahunajarancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'jurusan_id');
        $cvar->setColumnPhpName(    'JurusanId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'Jurusan');
        $cvar->setMin(              0);
        $cvar->setMax(              23);
        $cvar->setHeader(           'Jurusan');
        $cvar->setLabel(            'Jurusan');
        $cvar->setInputLength(      25);
        $cvar->setFieldWidth(       75);
        $cvar->setColumnWidth(      140);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'jurusancombo');
        $cvar->setComboXtype(       'jurusancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'template_ket');
        $cvar->setColumnPhpName(    'TemplateKet');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Template Ket');
        $cvar->setLabel(            'Template ket');
        $cvar->setInputLength(      250);
        $cvar->setFieldWidth(       750);
        $cvar->setColumnWidth(      60);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'textfield');
        $cvar->setComboXtype(       '');
        $cvar->setDisplayField(     '');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'mp1_id');
        $cvar->setColumnPhpName(    'Mp1Id');
        $cvar->setType(             'int');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'MataPelajaran');
        $cvar->setMin(              0);
        $cvar->setMax(              5830);
        $cvar->setHeader(           'Mp1id');
        $cvar->setLabel(            'Mp1id');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      200);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'matapelajarancombo');
        $cvar->setComboXtype(       'matapelajarancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'mp2_id');
        $cvar->setColumnPhpName(    'Mp2Id');
        $cvar->setType(             'int');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'MataPelajaran');
        $cvar->setMin(              0);
        $cvar->setMax(              5830);
        $cvar->setHeader(           'Mp2id');
        $cvar->setLabel(            'Mp2id');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      200);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'matapelajarancombo');
        $cvar->setComboXtype(       'matapelajarancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'mp3_id');
        $cvar->setColumnPhpName(    'Mp3Id');
        $cvar->setType(             'int');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'MataPelajaran');
        $cvar->setMin(              0);
        $cvar->setMax(              5830);
        $cvar->setHeader(           'Mp3id');
        $cvar->setLabel(            'Mp3id');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      200);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'matapelajarancombo');
        $cvar->setComboXtype(       'matapelajarancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'mp4_id');
        $cvar->setColumnPhpName(    'Mp4Id');
        $cvar->setType(             'int');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'MataPelajaran');
        $cvar->setMin(              0);
        $cvar->setMax(              5830);
        $cvar->setHeader(           'Mp4id');
        $cvar->setLabel(            'Mp4id');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      200);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'matapelajarancombo');
        $cvar->setComboXtype(       'matapelajarancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'mp5_id');
        $cvar->setColumnPhpName(    'Mp5Id');
        $cvar->setType(             'int');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'MataPelajaran');
        $cvar->setMin(              0);
        $cvar->setMax(              5830);
        $cvar->setHeader(           'Mp5id');
        $cvar->setLabel(            'Mp5id');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      200);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'matapelajarancombo');
        $cvar->setComboXtype(       'matapelajarancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'mp6_id');
        $cvar->setColumnPhpName(    'Mp6Id');
        $cvar->setType(             'int');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'MataPelajaran');
        $cvar->setMin(              0);
        $cvar->setMax(              5830);
        $cvar->setHeader(           'Mp6id');
        $cvar->setLabel(            'Mp6id');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      200);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'matapelajarancombo');
        $cvar->setComboXtype(       'matapelajarancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'mp7_id');
        $cvar->setColumnPhpName(    'Mp7Id');
        $cvar->setType(             'int');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'MataPelajaran');
        $cvar->setMin(              0);
        $cvar->setMax(              5830);
        $cvar->setHeader(           'Mp7id');
        $cvar->setLabel(            'Mp7id');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      200);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'matapelajarancombo');
        $cvar->setComboXtype(       'matapelajarancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       1);
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