<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisKeluarPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\PtkTerdaftar;
use DataDikdas\Model\PtkTerdaftarPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\TahunAjaranPeer;
use DataDikdas\Model\map\PtkTerdaftarTableMap;

/**
 * Base static class for performing query and update operations on the 'ptk_terdaftar' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BasePtkTerdaftarPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ptk_terdaftar';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\PtkTerdaftar';

    /** the related TableMap class for this table */
    const TM_CLASS = 'PtkTerdaftarTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 27;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 27;

    /** the column name for the ptk_terdaftar_id field */
    const PTK_TERDAFTAR_ID = 'ptk_terdaftar.ptk_terdaftar_id';

    /** the column name for the ptk_id field */
    const PTK_ID = 'ptk_terdaftar.ptk_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'ptk_terdaftar.sekolah_id';

    /** the column name for the jenis_keluar_id field */
    const JENIS_KELUAR_ID = 'ptk_terdaftar.jenis_keluar_id';

    /** the column name for the tahun_ajaran_id field */
    const TAHUN_AJARAN_ID = 'ptk_terdaftar.tahun_ajaran_id';

    /** the column name for the nomor_surat_tugas field */
    const NOMOR_SURAT_TUGAS = 'ptk_terdaftar.nomor_surat_tugas';

    /** the column name for the tanggal_surat_tugas field */
    const TANGGAL_SURAT_TUGAS = 'ptk_terdaftar.tanggal_surat_tugas';

    /** the column name for the ptk_induk field */
    const PTK_INDUK = 'ptk_terdaftar.ptk_induk';

    /** the column name for the tmt_tugas field */
    const TMT_TUGAS = 'ptk_terdaftar.tmt_tugas';

    /** the column name for the aktif_bulan_01 field */
    const AKTIF_BULAN_01 = 'ptk_terdaftar.aktif_bulan_01';

    /** the column name for the aktif_bulan_02 field */
    const AKTIF_BULAN_02 = 'ptk_terdaftar.aktif_bulan_02';

    /** the column name for the aktif_bulan_03 field */
    const AKTIF_BULAN_03 = 'ptk_terdaftar.aktif_bulan_03';

    /** the column name for the aktif_bulan_04 field */
    const AKTIF_BULAN_04 = 'ptk_terdaftar.aktif_bulan_04';

    /** the column name for the aktif_bulan_05 field */
    const AKTIF_BULAN_05 = 'ptk_terdaftar.aktif_bulan_05';

    /** the column name for the aktif_bulan_06 field */
    const AKTIF_BULAN_06 = 'ptk_terdaftar.aktif_bulan_06';

    /** the column name for the aktif_bulan_07 field */
    const AKTIF_BULAN_07 = 'ptk_terdaftar.aktif_bulan_07';

    /** the column name for the aktif_bulan_08 field */
    const AKTIF_BULAN_08 = 'ptk_terdaftar.aktif_bulan_08';

    /** the column name for the aktif_bulan_09 field */
    const AKTIF_BULAN_09 = 'ptk_terdaftar.aktif_bulan_09';

    /** the column name for the aktif_bulan_10 field */
    const AKTIF_BULAN_10 = 'ptk_terdaftar.aktif_bulan_10';

    /** the column name for the aktif_bulan_11 field */
    const AKTIF_BULAN_11 = 'ptk_terdaftar.aktif_bulan_11';

    /** the column name for the aktif_bulan_12 field */
    const AKTIF_BULAN_12 = 'ptk_terdaftar.aktif_bulan_12';

    /** the column name for the tgl_ptk_keluar field */
    const TGL_PTK_KELUAR = 'ptk_terdaftar.tgl_ptk_keluar';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ptk_terdaftar.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ptk_terdaftar.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'ptk_terdaftar.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ptk_terdaftar.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'ptk_terdaftar.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of PtkTerdaftar objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array PtkTerdaftar[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PtkTerdaftarPeer::$fieldNames[PtkTerdaftarPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('PtkTerdaftarId', 'PtkId', 'SekolahId', 'JenisKeluarId', 'TahunAjaranId', 'NomorSuratTugas', 'TanggalSuratTugas', 'PtkInduk', 'TmtTugas', 'AktifBulan01', 'AktifBulan02', 'AktifBulan03', 'AktifBulan04', 'AktifBulan05', 'AktifBulan06', 'AktifBulan07', 'AktifBulan08', 'AktifBulan09', 'AktifBulan10', 'AktifBulan11', 'AktifBulan12', 'TglPtkKeluar', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('ptkTerdaftarId', 'ptkId', 'sekolahId', 'jenisKeluarId', 'tahunAjaranId', 'nomorSuratTugas', 'tanggalSuratTugas', 'ptkInduk', 'tmtTugas', 'aktifBulan01', 'aktifBulan02', 'aktifBulan03', 'aktifBulan04', 'aktifBulan05', 'aktifBulan06', 'aktifBulan07', 'aktifBulan08', 'aktifBulan09', 'aktifBulan10', 'aktifBulan11', 'aktifBulan12', 'tglPtkKeluar', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (PtkTerdaftarPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_ID, PtkTerdaftarPeer::SEKOLAH_ID, PtkTerdaftarPeer::JENIS_KELUAR_ID, PtkTerdaftarPeer::TAHUN_AJARAN_ID, PtkTerdaftarPeer::NOMOR_SURAT_TUGAS, PtkTerdaftarPeer::TANGGAL_SURAT_TUGAS, PtkTerdaftarPeer::PTK_INDUK, PtkTerdaftarPeer::TMT_TUGAS, PtkTerdaftarPeer::AKTIF_BULAN_01, PtkTerdaftarPeer::AKTIF_BULAN_02, PtkTerdaftarPeer::AKTIF_BULAN_03, PtkTerdaftarPeer::AKTIF_BULAN_04, PtkTerdaftarPeer::AKTIF_BULAN_05, PtkTerdaftarPeer::AKTIF_BULAN_06, PtkTerdaftarPeer::AKTIF_BULAN_07, PtkTerdaftarPeer::AKTIF_BULAN_08, PtkTerdaftarPeer::AKTIF_BULAN_09, PtkTerdaftarPeer::AKTIF_BULAN_10, PtkTerdaftarPeer::AKTIF_BULAN_11, PtkTerdaftarPeer::AKTIF_BULAN_12, PtkTerdaftarPeer::TGL_PTK_KELUAR, PtkTerdaftarPeer::CREATE_DATE, PtkTerdaftarPeer::LAST_UPDATE, PtkTerdaftarPeer::SOFT_DELETE, PtkTerdaftarPeer::LAST_SYNC, PtkTerdaftarPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PTK_TERDAFTAR_ID', 'PTK_ID', 'SEKOLAH_ID', 'JENIS_KELUAR_ID', 'TAHUN_AJARAN_ID', 'NOMOR_SURAT_TUGAS', 'TANGGAL_SURAT_TUGAS', 'PTK_INDUK', 'TMT_TUGAS', 'AKTIF_BULAN_01', 'AKTIF_BULAN_02', 'AKTIF_BULAN_03', 'AKTIF_BULAN_04', 'AKTIF_BULAN_05', 'AKTIF_BULAN_06', 'AKTIF_BULAN_07', 'AKTIF_BULAN_08', 'AKTIF_BULAN_09', 'AKTIF_BULAN_10', 'AKTIF_BULAN_11', 'AKTIF_BULAN_12', 'TGL_PTK_KELUAR', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('ptk_terdaftar_id', 'ptk_id', 'sekolah_id', 'jenis_keluar_id', 'tahun_ajaran_id', 'nomor_surat_tugas', 'tanggal_surat_tugas', 'ptk_induk', 'tmt_tugas', 'aktif_bulan_01', 'aktif_bulan_02', 'aktif_bulan_03', 'aktif_bulan_04', 'aktif_bulan_05', 'aktif_bulan_06', 'aktif_bulan_07', 'aktif_bulan_08', 'aktif_bulan_09', 'aktif_bulan_10', 'aktif_bulan_11', 'aktif_bulan_12', 'tgl_ptk_keluar', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PtkTerdaftarPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('PtkTerdaftarId' => 0, 'PtkId' => 1, 'SekolahId' => 2, 'JenisKeluarId' => 3, 'TahunAjaranId' => 4, 'NomorSuratTugas' => 5, 'TanggalSuratTugas' => 6, 'PtkInduk' => 7, 'TmtTugas' => 8, 'AktifBulan01' => 9, 'AktifBulan02' => 10, 'AktifBulan03' => 11, 'AktifBulan04' => 12, 'AktifBulan05' => 13, 'AktifBulan06' => 14, 'AktifBulan07' => 15, 'AktifBulan08' => 16, 'AktifBulan09' => 17, 'AktifBulan10' => 18, 'AktifBulan11' => 19, 'AktifBulan12' => 20, 'TglPtkKeluar' => 21, 'CreateDate' => 22, 'LastUpdate' => 23, 'SoftDelete' => 24, 'LastSync' => 25, 'UpdaterId' => 26, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('ptkTerdaftarId' => 0, 'ptkId' => 1, 'sekolahId' => 2, 'jenisKeluarId' => 3, 'tahunAjaranId' => 4, 'nomorSuratTugas' => 5, 'tanggalSuratTugas' => 6, 'ptkInduk' => 7, 'tmtTugas' => 8, 'aktifBulan01' => 9, 'aktifBulan02' => 10, 'aktifBulan03' => 11, 'aktifBulan04' => 12, 'aktifBulan05' => 13, 'aktifBulan06' => 14, 'aktifBulan07' => 15, 'aktifBulan08' => 16, 'aktifBulan09' => 17, 'aktifBulan10' => 18, 'aktifBulan11' => 19, 'aktifBulan12' => 20, 'tglPtkKeluar' => 21, 'createDate' => 22, 'lastUpdate' => 23, 'softDelete' => 24, 'lastSync' => 25, 'updaterId' => 26, ),
        BasePeer::TYPE_COLNAME => array (PtkTerdaftarPeer::PTK_TERDAFTAR_ID => 0, PtkTerdaftarPeer::PTK_ID => 1, PtkTerdaftarPeer::SEKOLAH_ID => 2, PtkTerdaftarPeer::JENIS_KELUAR_ID => 3, PtkTerdaftarPeer::TAHUN_AJARAN_ID => 4, PtkTerdaftarPeer::NOMOR_SURAT_TUGAS => 5, PtkTerdaftarPeer::TANGGAL_SURAT_TUGAS => 6, PtkTerdaftarPeer::PTK_INDUK => 7, PtkTerdaftarPeer::TMT_TUGAS => 8, PtkTerdaftarPeer::AKTIF_BULAN_01 => 9, PtkTerdaftarPeer::AKTIF_BULAN_02 => 10, PtkTerdaftarPeer::AKTIF_BULAN_03 => 11, PtkTerdaftarPeer::AKTIF_BULAN_04 => 12, PtkTerdaftarPeer::AKTIF_BULAN_05 => 13, PtkTerdaftarPeer::AKTIF_BULAN_06 => 14, PtkTerdaftarPeer::AKTIF_BULAN_07 => 15, PtkTerdaftarPeer::AKTIF_BULAN_08 => 16, PtkTerdaftarPeer::AKTIF_BULAN_09 => 17, PtkTerdaftarPeer::AKTIF_BULAN_10 => 18, PtkTerdaftarPeer::AKTIF_BULAN_11 => 19, PtkTerdaftarPeer::AKTIF_BULAN_12 => 20, PtkTerdaftarPeer::TGL_PTK_KELUAR => 21, PtkTerdaftarPeer::CREATE_DATE => 22, PtkTerdaftarPeer::LAST_UPDATE => 23, PtkTerdaftarPeer::SOFT_DELETE => 24, PtkTerdaftarPeer::LAST_SYNC => 25, PtkTerdaftarPeer::UPDATER_ID => 26, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PTK_TERDAFTAR_ID' => 0, 'PTK_ID' => 1, 'SEKOLAH_ID' => 2, 'JENIS_KELUAR_ID' => 3, 'TAHUN_AJARAN_ID' => 4, 'NOMOR_SURAT_TUGAS' => 5, 'TANGGAL_SURAT_TUGAS' => 6, 'PTK_INDUK' => 7, 'TMT_TUGAS' => 8, 'AKTIF_BULAN_01' => 9, 'AKTIF_BULAN_02' => 10, 'AKTIF_BULAN_03' => 11, 'AKTIF_BULAN_04' => 12, 'AKTIF_BULAN_05' => 13, 'AKTIF_BULAN_06' => 14, 'AKTIF_BULAN_07' => 15, 'AKTIF_BULAN_08' => 16, 'AKTIF_BULAN_09' => 17, 'AKTIF_BULAN_10' => 18, 'AKTIF_BULAN_11' => 19, 'AKTIF_BULAN_12' => 20, 'TGL_PTK_KELUAR' => 21, 'CREATE_DATE' => 22, 'LAST_UPDATE' => 23, 'SOFT_DELETE' => 24, 'LAST_SYNC' => 25, 'UPDATER_ID' => 26, ),
        BasePeer::TYPE_FIELDNAME => array ('ptk_terdaftar_id' => 0, 'ptk_id' => 1, 'sekolah_id' => 2, 'jenis_keluar_id' => 3, 'tahun_ajaran_id' => 4, 'nomor_surat_tugas' => 5, 'tanggal_surat_tugas' => 6, 'ptk_induk' => 7, 'tmt_tugas' => 8, 'aktif_bulan_01' => 9, 'aktif_bulan_02' => 10, 'aktif_bulan_03' => 11, 'aktif_bulan_04' => 12, 'aktif_bulan_05' => 13, 'aktif_bulan_06' => 14, 'aktif_bulan_07' => 15, 'aktif_bulan_08' => 16, 'aktif_bulan_09' => 17, 'aktif_bulan_10' => 18, 'aktif_bulan_11' => 19, 'aktif_bulan_12' => 20, 'tgl_ptk_keluar' => 21, 'create_date' => 22, 'last_update' => 23, 'soft_delete' => 24, 'last_sync' => 25, 'updater_id' => 26, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = PtkTerdaftarPeer::getFieldNames($toType);
        $key = isset(PtkTerdaftarPeer::$fieldKeys[$fromType][$name]) ? PtkTerdaftarPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(PtkTerdaftarPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, PtkTerdaftarPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PtkTerdaftarPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. PtkTerdaftarPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PtkTerdaftarPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(PtkTerdaftarPeer::PTK_TERDAFTAR_ID);
            $criteria->addSelectColumn(PtkTerdaftarPeer::PTK_ID);
            $criteria->addSelectColumn(PtkTerdaftarPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(PtkTerdaftarPeer::JENIS_KELUAR_ID);
            $criteria->addSelectColumn(PtkTerdaftarPeer::TAHUN_AJARAN_ID);
            $criteria->addSelectColumn(PtkTerdaftarPeer::NOMOR_SURAT_TUGAS);
            $criteria->addSelectColumn(PtkTerdaftarPeer::TANGGAL_SURAT_TUGAS);
            $criteria->addSelectColumn(PtkTerdaftarPeer::PTK_INDUK);
            $criteria->addSelectColumn(PtkTerdaftarPeer::TMT_TUGAS);
            $criteria->addSelectColumn(PtkTerdaftarPeer::AKTIF_BULAN_01);
            $criteria->addSelectColumn(PtkTerdaftarPeer::AKTIF_BULAN_02);
            $criteria->addSelectColumn(PtkTerdaftarPeer::AKTIF_BULAN_03);
            $criteria->addSelectColumn(PtkTerdaftarPeer::AKTIF_BULAN_04);
            $criteria->addSelectColumn(PtkTerdaftarPeer::AKTIF_BULAN_05);
            $criteria->addSelectColumn(PtkTerdaftarPeer::AKTIF_BULAN_06);
            $criteria->addSelectColumn(PtkTerdaftarPeer::AKTIF_BULAN_07);
            $criteria->addSelectColumn(PtkTerdaftarPeer::AKTIF_BULAN_08);
            $criteria->addSelectColumn(PtkTerdaftarPeer::AKTIF_BULAN_09);
            $criteria->addSelectColumn(PtkTerdaftarPeer::AKTIF_BULAN_10);
            $criteria->addSelectColumn(PtkTerdaftarPeer::AKTIF_BULAN_11);
            $criteria->addSelectColumn(PtkTerdaftarPeer::AKTIF_BULAN_12);
            $criteria->addSelectColumn(PtkTerdaftarPeer::TGL_PTK_KELUAR);
            $criteria->addSelectColumn(PtkTerdaftarPeer::CREATE_DATE);
            $criteria->addSelectColumn(PtkTerdaftarPeer::LAST_UPDATE);
            $criteria->addSelectColumn(PtkTerdaftarPeer::SOFT_DELETE);
            $criteria->addSelectColumn(PtkTerdaftarPeer::LAST_SYNC);
            $criteria->addSelectColumn(PtkTerdaftarPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.ptk_terdaftar_id');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.jenis_keluar_id');
            $criteria->addSelectColumn($alias . '.tahun_ajaran_id');
            $criteria->addSelectColumn($alias . '.nomor_surat_tugas');
            $criteria->addSelectColumn($alias . '.tanggal_surat_tugas');
            $criteria->addSelectColumn($alias . '.ptk_induk');
            $criteria->addSelectColumn($alias . '.tmt_tugas');
            $criteria->addSelectColumn($alias . '.aktif_bulan_01');
            $criteria->addSelectColumn($alias . '.aktif_bulan_02');
            $criteria->addSelectColumn($alias . '.aktif_bulan_03');
            $criteria->addSelectColumn($alias . '.aktif_bulan_04');
            $criteria->addSelectColumn($alias . '.aktif_bulan_05');
            $criteria->addSelectColumn($alias . '.aktif_bulan_06');
            $criteria->addSelectColumn($alias . '.aktif_bulan_07');
            $criteria->addSelectColumn($alias . '.aktif_bulan_08');
            $criteria->addSelectColumn($alias . '.aktif_bulan_09');
            $criteria->addSelectColumn($alias . '.aktif_bulan_10');
            $criteria->addSelectColumn($alias . '.aktif_bulan_11');
            $criteria->addSelectColumn($alias . '.aktif_bulan_12');
            $criteria->addSelectColumn($alias . '.tgl_ptk_keluar');
            $criteria->addSelectColumn($alias . '.create_date');
            $criteria->addSelectColumn($alias . '.last_update');
            $criteria->addSelectColumn($alias . '.soft_delete');
            $criteria->addSelectColumn($alias . '.last_sync');
            $criteria->addSelectColumn($alias . '.updater_id');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 PtkTerdaftar
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PtkTerdaftarPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return PtkTerdaftarPeer::populateObjects(PtkTerdaftarPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PtkTerdaftarPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      PtkTerdaftar $obj A PtkTerdaftar object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getPtkTerdaftarId();
            } // if key === null
            PtkTerdaftarPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A PtkTerdaftar object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof PtkTerdaftar) {
                $key = (string) $value->getPtkTerdaftarId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or PtkTerdaftar object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(PtkTerdaftarPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   PtkTerdaftar Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PtkTerdaftarPeer::$instances[$key])) {
                return PtkTerdaftarPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }
    
    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (PtkTerdaftarPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        PtkTerdaftarPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ptk_terdaftar
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (string) $row[$startcol];
    }
    
    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = PtkTerdaftarPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PtkTerdaftarPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PtkTerdaftarPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (PtkTerdaftar object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PtkTerdaftarPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PtkTerdaftarPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PtkTerdaftarPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisKeluar table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisKeluar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Ptk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related TahunAjaran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinTahunAjaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Sekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkTerdaftarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of PtkTerdaftar objects pre-filled with their JenisKeluar objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisKeluar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);
        }

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol = PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        JenisKeluarPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisKeluarPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisKeluarPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisKeluarPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PtkTerdaftar) to $obj2 (JenisKeluar)
                $obj2->addPtkTerdaftar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PtkTerdaftar objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);
        }

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol = PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PtkPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PtkTerdaftar) to $obj2 (Ptk)
                $obj2->addPtkTerdaftar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PtkTerdaftar objects pre-filled with their TahunAjaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTahunAjaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);
        }

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol = PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        TahunAjaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = TahunAjaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = TahunAjaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    TahunAjaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PtkTerdaftar) to $obj2 (TahunAjaran)
                $obj2->addPtkTerdaftar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PtkTerdaftar objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);
        }

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol = PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkTerdaftarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SekolahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SekolahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PtkTerdaftar) to $obj2 (Sekolah)
                $obj2->addPtkTerdaftar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of PtkTerdaftar objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);
        }

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined JenisKeluar rows

            $key2 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = JenisKeluarPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisKeluarPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisKeluarPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj2 (JenisKeluar)
                $obj2->addPtkTerdaftar($obj1);
            } // if joined row not null

            // Add objects for joined Ptk rows

            $key3 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PtkPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PtkPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj3 (Ptk)
                $obj3->addPtkTerdaftar($obj1);
            } // if joined row not null

            // Add objects for joined TahunAjaran rows

            $key4 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = TahunAjaranPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = TahunAjaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TahunAjaranPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj4 (TahunAjaran)
                $obj4->addPtkTerdaftar($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key5 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = SekolahPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = SekolahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SekolahPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj5 (Sekolah)
                $obj5->addPtkTerdaftar($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisKeluar table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisKeluar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Ptk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related TahunAjaran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptTahunAjaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Sekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of PtkTerdaftar objects pre-filled with all related objects except JenisKeluar.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisKeluar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);
        }

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ptk rows

                $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PtkPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj2 (Ptk)
                $obj2->addPtkTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key3 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = TahunAjaranPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TahunAjaranPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj3 (TahunAjaran)
                $obj3->addPtkTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj4 (Sekolah)
                $obj4->addPtkTerdaftar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PtkTerdaftar objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);
        }

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisKeluar rows

                $key2 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisKeluarPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisKeluarPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj2 (JenisKeluar)
                $obj2->addPtkTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key3 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = TahunAjaranPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TahunAjaranPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj3 (TahunAjaran)
                $obj3->addPtkTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj4 (Sekolah)
                $obj4->addPtkTerdaftar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PtkTerdaftar objects pre-filled with all related objects except TahunAjaran.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptTahunAjaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);
        }

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisKeluar rows

                $key2 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisKeluarPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisKeluarPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj2 (JenisKeluar)
                $obj2->addPtkTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key3 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PtkPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PtkPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj3 (Ptk)
                $obj3->addPtkTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj4 (Sekolah)
                $obj4->addPtkTerdaftar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PtkTerdaftar objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);
        }

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisKeluar rows

                $key2 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisKeluarPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisKeluarPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj2 (JenisKeluar)
                $obj2->addPtkTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key3 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PtkPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PtkPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj3 (Ptk)
                $obj3->addPtkTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key4 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TahunAjaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TahunAjaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PtkTerdaftar) to the collection in $obj4 (TahunAjaran)
                $obj4->addPtkTerdaftar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(PtkTerdaftarPeer::DATABASE_NAME)->getTable(PtkTerdaftarPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasePtkTerdaftarPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasePtkTerdaftarPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new PtkTerdaftarTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return PtkTerdaftarPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a PtkTerdaftar or Criteria object.
     *
     * @param      mixed $values Criteria or PtkTerdaftar object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from PtkTerdaftar object
        }


        // Set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a PtkTerdaftar or Criteria object.
     *
     * @param      mixed $values Criteria or PtkTerdaftar object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PtkTerdaftarPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PtkTerdaftarPeer::PTK_TERDAFTAR_ID);
            $value = $criteria->remove(PtkTerdaftarPeer::PTK_TERDAFTAR_ID);
            if ($value) {
                $selectCriteria->add(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PtkTerdaftarPeer::TABLE_NAME);
            }

        } else { // $values is PtkTerdaftar object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ptk_terdaftar table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PtkTerdaftarPeer::TABLE_NAME, $con, PtkTerdaftarPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PtkTerdaftarPeer::clearInstancePool();
            PtkTerdaftarPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a PtkTerdaftar or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or PtkTerdaftar object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PtkTerdaftarPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof PtkTerdaftar) { // it's a model object
            // invalidate the cache for this single object
            PtkTerdaftarPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PtkTerdaftarPeer::DATABASE_NAME);
            $criteria->add(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                PtkTerdaftarPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PtkTerdaftarPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            PtkTerdaftarPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given PtkTerdaftar object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      PtkTerdaftar $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PtkTerdaftarPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PtkTerdaftarPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(PtkTerdaftarPeer::DATABASE_NAME, PtkTerdaftarPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return PtkTerdaftar
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PtkTerdaftarPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PtkTerdaftarPeer::DATABASE_NAME);
        $criteria->add(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $pk);

        $v = PtkTerdaftarPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return PtkTerdaftar[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PtkTerdaftarPeer::DATABASE_NAME);
            $criteria->add(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $pks, Criteria::IN);
            $objs = PtkTerdaftarPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePtkTerdaftarPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePtkTerdaftarPeer::buildTableMap();

