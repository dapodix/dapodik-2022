<?php
namespace DataDikdas\Info\base;
use DataDikdas\TableInfo;

/*
 * The Base TableInfo for Pembelajaran Table
 */
class BasePembelajaranTableInfo extends TableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PembelajaranTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function initialize()
    {
        $this->setName('pembelajaran');
        $this->setPhpName('Pembelajaran');
        $this->setClassname('DataDikdas\\Model\\Pembelajaran');
        $this->setPackage('DataDikdas.Model');
    }

    public function setVariables() {

        $this->setPkName(            'pembelajaran_id');
        $this->setIsData(           1);
        $this->setCreateGrid(       1);
        $this->setCreateForm(       1);
        $this->setIsRef(            0);
        $this->setIsStaticRef(      0);
        $this->setIsBigRef(         1);
        $this->setIsSmallRef(       0);
        $this->setIsCompositePk(    0);
        $this->setDisplayField(     'nama');
        $this->setRendererString(   'pembelajaran_id_str');
        $this->setHeader(           'Pembelajaran');
        $this->setLabel(            'Pembelajaran');
        $this->setCreateCombobox(   1);
        $this->setCreateRadiogroup( 0);
        $this->setCreateList(       1);
        $this->setCreateModel(      1);
        $this->setXtypeCombo(       '');
        $this->setXtypeRadio(       '');
        $this->setXtypeList(        '');
        $this->setHasMany(array(    "BukuPelajaran","JadwalRelatedByBelKe01","JadwalRelatedByBelKe02","JadwalRelatedByBelKe03","JadwalRelatedByBelKe04","JadwalRelatedByBelKe05","JadwalRelatedByBelKe06","JadwalRelatedByBelKe07","JadwalRelatedByBelKe08","JadwalRelatedByBelKe09","JadwalRelatedByBelKe10","JadwalRelatedByBelKe11","JadwalRelatedByBelKe12","JadwalRelatedByBelKe13","JadwalRelatedByBelKe14","JadwalRelatedByBelKe15","JadwalRelatedByBelKe16","JadwalRelatedByBelKe17","JadwalRelatedByBelKe18","JadwalRelatedByBelKe19","JadwalRelatedByBelKe20","PembelajaranRelatedByPembelajaranId","VldPembelajaran"));
        $this->setBelongsTo(array(  "RombonganBelajar","PtkTerdaftar"));
        $this->setIsSplitEntity(    );
        $this->setHasSplitEntity(   );
        $this->setSplitEntityName(  '');
        $this->setRelatingColumns(array(    "BukuPelajaran.pembelajaran_id","JadwalRelatedByBelKe01.pembelajaran_id","JadwalRelatedByBelKe02.pembelajaran_id","JadwalRelatedByBelKe03.pembelajaran_id","JadwalRelatedByBelKe04.pembelajaran_id","JadwalRelatedByBelKe05.pembelajaran_id","JadwalRelatedByBelKe06.pembelajaran_id","JadwalRelatedByBelKe07.pembelajaran_id","JadwalRelatedByBelKe08.pembelajaran_id","JadwalRelatedByBelKe09.pembelajaran_id","JadwalRelatedByBelKe10.pembelajaran_id","JadwalRelatedByBelKe11.pembelajaran_id","JadwalRelatedByBelKe12.pembelajaran_id","JadwalRelatedByBelKe13.pembelajaran_id","JadwalRelatedByBelKe14.pembelajaran_id","JadwalRelatedByBelKe15.pembelajaran_id","JadwalRelatedByBelKe16.pembelajaran_id","JadwalRelatedByBelKe17.pembelajaran_id","JadwalRelatedByBelKe18.pembelajaran_id","JadwalRelatedByBelKe19.pembelajaran_id","JadwalRelatedByBelKe20.pembelajaran_id","PembelajaranRelatedByPembelajaranId.pembelajaran_id","VldPembelajaran.pembelajaran_id"));
        $this->setCreateWinChildDelete(1);
        $this->setTableValidation();

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'pembelajaran_id');
        $cvar->setColumnPhpName(    'PembelajaranId');
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
        $cvar->setColumnName(       'semester_id');
        $cvar->setColumnPhpName(    'SemesterId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'Semester');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Semester');
        $cvar->setLabel(            'Semester');
        $cvar->setInputLength(      5);
        $cvar->setFieldWidth(       15);
        $cvar->setColumnWidth(      140);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'semestercombo');
        $cvar->setComboXtype(       'semestercombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'mata_pelajaran_id');
        $cvar->setColumnPhpName(    'MataPelajaranId');
        $cvar->setType(             'int');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'MataPelajaran');
        $cvar->setMin(              0);
        $cvar->setMax(              5830);
        $cvar->setHeader(           'Mata Pelajaran');
        $cvar->setLabel(            'Mata pelajaran');
        $cvar->setInputLength(      100);
        $cvar->setFieldWidth(       300);
        $cvar->setColumnWidth(      200);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'matapelajarancombo');
        $cvar->setComboXtype(       'matapelajarancombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'ptk_terdaftar_id');
        $cvar->setColumnPhpName(    'PtkTerdaftarId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'PtkTerdaftar');
        $cvar->setMin(              0);
        $cvar->setMax(              5830);
        $cvar->setHeader(           'Ptk Terdaftar');
        $cvar->setLabel(            'Ptk terdaftar');
        $cvar->setInputLength(      0);
        $cvar->setFieldWidth(       0);
        $cvar->setColumnWidth(      140);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'ptkterdaftarcombo');
        $cvar->setComboXtype(       'ptkterdaftarcombo');
        $cvar->setDisplayField(     'Nama');
        $cvar->setValidationType(   '');
        $cvar->setAllowEmpty(       0);
        $cvar->setCompositeKey(     0);
        $cvar->setDescription(      'Cukup Jelas');
        $columns[] = $cvar;

        $cvar = new \DataDikdas\ColumnInfo();
        $cvar->setColumnName(       'sk_mengajar');
        $cvar->setColumnPhpName(    'SkMengajar');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Sk Mengajar');
        $cvar->setLabel(            'Sk mengajar');
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
        $cvar->setColumnName(       'tanggal_sk_mengajar');
        $cvar->setColumnPhpName(    'TanggalSkMengajar');
        $cvar->setType(             'date');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Tanggal Sk Mengajar');
        $cvar->setLabel(            'Tanggal sk mengajar');
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
        $cvar->setColumnName(       'jam_mengajar_per_minggu');
        $cvar->setColumnPhpName(    'JamMengajarPerMinggu');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Jam Mengajar Per Minggu');
        $cvar->setLabel(            'Jam mengajar per minggu');
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
        $cvar->setColumnName(       'status_di_kurikulum');
        $cvar->setColumnPhpName(    'StatusDiKurikulum');
        $cvar->setType(             'float');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Status Di Kurikulum');
        $cvar->setLabel(            'Status di kurikulum');
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
        $cvar->setColumnName(       'nama_mata_pelajaran');
        $cvar->setColumnPhpName(    'NamaMataPelajaran');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '0');
        $cvar->setFkTableName(      '');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Nama Mata Pelajaran');
        $cvar->setLabel(            'Nama mata pelajaran');
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
        $cvar->setColumnName(       'induk_pembelajaran_id');
        $cvar->setColumnPhpName(    'IndukPembelajaranId');
        $cvar->setType(             'string');
        $cvar->setIsPkUuid(         '0');
		$cvar->setIsPk(             '0');
        $cvar->setIsFk(             '1');
        $cvar->setFkTableName(      'Pembelajaran');
        $cvar->setMin(              0);
        $cvar->setMax(              99999999);
        $cvar->setHeader(           'Induk Pembelajaran');
        $cvar->setLabel(            'Induk pembelajaran');
        $cvar->setInputLength(      0);
        $cvar->setFieldWidth(       0);
        $cvar->setColumnWidth(      140);
        $cvar->setHideColumn(       0);
        $cvar->setXtype(            'pembelajarancombo');
        $cvar->setComboXtype(       'pembelajarancombo');
        $cvar->setDisplayField(     'Nama');
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