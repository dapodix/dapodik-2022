<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BidangStudiPeer;
use DataDikdas\Model\JenisKeluarPeer;
use DataDikdas\Model\JenjangKepengawasanPeer;
use DataDikdas\Model\LembagaNonSekolahPeer;
use DataDikdas\Model\MataPelajaranPeer;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\PengawasTerdaftarPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\TahunAjaranPeer;
use DataDikdas\Model\map\PengawasTerdaftarTableMap;

/**
 * Base static class for performing query and update operations on the 'pengawas_terdaftar' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BasePengawasTerdaftarPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'pengawas_terdaftar';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\PengawasTerdaftar';

    /** the related TableMap class for this table */
    const TM_CLASS = 'PengawasTerdaftarTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 29;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 29;

    /** the column name for the pengawas_terdaftar_id field */
    const PENGAWAS_TERDAFTAR_ID = 'pengawas_terdaftar.pengawas_terdaftar_id';

    /** the column name for the lembaga_id field */
    const LEMBAGA_ID = 'pengawas_terdaftar.lembaga_id';

    /** the column name for the ptk_id field */
    const PTK_ID = 'pengawas_terdaftar.ptk_id';

    /** the column name for the tahun_ajaran_id field */
    const TAHUN_AJARAN_ID = 'pengawas_terdaftar.tahun_ajaran_id';

    /** the column name for the nomor_surat_tugas field */
    const NOMOR_SURAT_TUGAS = 'pengawas_terdaftar.nomor_surat_tugas';

    /** the column name for the tanggal_surat_tugas field */
    const TANGGAL_SURAT_TUGAS = 'pengawas_terdaftar.tanggal_surat_tugas';

    /** the column name for the tmt_tugas field */
    const TMT_TUGAS = 'pengawas_terdaftar.tmt_tugas';

    /** the column name for the mata_pelajaran_id field */
    const MATA_PELAJARAN_ID = 'pengawas_terdaftar.mata_pelajaran_id';

    /** the column name for the bidang_studi_id field */
    const BIDANG_STUDI_ID = 'pengawas_terdaftar.bidang_studi_id';

    /** the column name for the jenjang_kepengawasan_id field */
    const JENJANG_KEPENGAWASAN_ID = 'pengawas_terdaftar.jenjang_kepengawasan_id';

    /** the column name for the aktif_bulan_01 field */
    const AKTIF_BULAN_01 = 'pengawas_terdaftar.aktif_bulan_01';

    /** the column name for the aktif_bulan_02 field */
    const AKTIF_BULAN_02 = 'pengawas_terdaftar.aktif_bulan_02';

    /** the column name for the aktif_bulan_03 field */
    const AKTIF_BULAN_03 = 'pengawas_terdaftar.aktif_bulan_03';

    /** the column name for the aktif_bulan_04 field */
    const AKTIF_BULAN_04 = 'pengawas_terdaftar.aktif_bulan_04';

    /** the column name for the aktif_bulan_05 field */
    const AKTIF_BULAN_05 = 'pengawas_terdaftar.aktif_bulan_05';

    /** the column name for the aktif_bulan_06 field */
    const AKTIF_BULAN_06 = 'pengawas_terdaftar.aktif_bulan_06';

    /** the column name for the aktif_bulan_07 field */
    const AKTIF_BULAN_07 = 'pengawas_terdaftar.aktif_bulan_07';

    /** the column name for the aktif_bulan_08 field */
    const AKTIF_BULAN_08 = 'pengawas_terdaftar.aktif_bulan_08';

    /** the column name for the aktif_bulan_09 field */
    const AKTIF_BULAN_09 = 'pengawas_terdaftar.aktif_bulan_09';

    /** the column name for the aktif_bulan_10 field */
    const AKTIF_BULAN_10 = 'pengawas_terdaftar.aktif_bulan_10';

    /** the column name for the aktif_bulan_11 field */
    const AKTIF_BULAN_11 = 'pengawas_terdaftar.aktif_bulan_11';

    /** the column name for the aktif_bulan_12 field */
    const AKTIF_BULAN_12 = 'pengawas_terdaftar.aktif_bulan_12';

    /** the column name for the jenis_keluar_id field */
    const JENIS_KELUAR_ID = 'pengawas_terdaftar.jenis_keluar_id';

    /** the column name for the tgl_pengawas_keluar field */
    const TGL_PENGAWAS_KELUAR = 'pengawas_terdaftar.tgl_pengawas_keluar';

    /** the column name for the create_date field */
    const CREATE_DATE = 'pengawas_terdaftar.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'pengawas_terdaftar.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'pengawas_terdaftar.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'pengawas_terdaftar.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'pengawas_terdaftar.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of PengawasTerdaftar objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array PengawasTerdaftar[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PengawasTerdaftarPeer::$fieldNames[PengawasTerdaftarPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('PengawasTerdaftarId', 'LembagaId', 'PtkId', 'TahunAjaranId', 'NomorSuratTugas', 'TanggalSuratTugas', 'TmtTugas', 'MataPelajaranId', 'BidangStudiId', 'JenjangKepengawasanId', 'AktifBulan01', 'AktifBulan02', 'AktifBulan03', 'AktifBulan04', 'AktifBulan05', 'AktifBulan06', 'AktifBulan07', 'AktifBulan08', 'AktifBulan09', 'AktifBulan10', 'AktifBulan11', 'AktifBulan12', 'JenisKeluarId', 'TglPengawasKeluar', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('pengawasTerdaftarId', 'lembagaId', 'ptkId', 'tahunAjaranId', 'nomorSuratTugas', 'tanggalSuratTugas', 'tmtTugas', 'mataPelajaranId', 'bidangStudiId', 'jenjangKepengawasanId', 'aktifBulan01', 'aktifBulan02', 'aktifBulan03', 'aktifBulan04', 'aktifBulan05', 'aktifBulan06', 'aktifBulan07', 'aktifBulan08', 'aktifBulan09', 'aktifBulan10', 'aktifBulan11', 'aktifBulan12', 'jenisKeluarId', 'tglPengawasKeluar', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID, PengawasTerdaftarPeer::LEMBAGA_ID, PengawasTerdaftarPeer::PTK_ID, PengawasTerdaftarPeer::TAHUN_AJARAN_ID, PengawasTerdaftarPeer::NOMOR_SURAT_TUGAS, PengawasTerdaftarPeer::TANGGAL_SURAT_TUGAS, PengawasTerdaftarPeer::TMT_TUGAS, PengawasTerdaftarPeer::MATA_PELAJARAN_ID, PengawasTerdaftarPeer::BIDANG_STUDI_ID, PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, PengawasTerdaftarPeer::AKTIF_BULAN_01, PengawasTerdaftarPeer::AKTIF_BULAN_02, PengawasTerdaftarPeer::AKTIF_BULAN_03, PengawasTerdaftarPeer::AKTIF_BULAN_04, PengawasTerdaftarPeer::AKTIF_BULAN_05, PengawasTerdaftarPeer::AKTIF_BULAN_06, PengawasTerdaftarPeer::AKTIF_BULAN_07, PengawasTerdaftarPeer::AKTIF_BULAN_08, PengawasTerdaftarPeer::AKTIF_BULAN_09, PengawasTerdaftarPeer::AKTIF_BULAN_10, PengawasTerdaftarPeer::AKTIF_BULAN_11, PengawasTerdaftarPeer::AKTIF_BULAN_12, PengawasTerdaftarPeer::JENIS_KELUAR_ID, PengawasTerdaftarPeer::TGL_PENGAWAS_KELUAR, PengawasTerdaftarPeer::CREATE_DATE, PengawasTerdaftarPeer::LAST_UPDATE, PengawasTerdaftarPeer::SOFT_DELETE, PengawasTerdaftarPeer::LAST_SYNC, PengawasTerdaftarPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PENGAWAS_TERDAFTAR_ID', 'LEMBAGA_ID', 'PTK_ID', 'TAHUN_AJARAN_ID', 'NOMOR_SURAT_TUGAS', 'TANGGAL_SURAT_TUGAS', 'TMT_TUGAS', 'MATA_PELAJARAN_ID', 'BIDANG_STUDI_ID', 'JENJANG_KEPENGAWASAN_ID', 'AKTIF_BULAN_01', 'AKTIF_BULAN_02', 'AKTIF_BULAN_03', 'AKTIF_BULAN_04', 'AKTIF_BULAN_05', 'AKTIF_BULAN_06', 'AKTIF_BULAN_07', 'AKTIF_BULAN_08', 'AKTIF_BULAN_09', 'AKTIF_BULAN_10', 'AKTIF_BULAN_11', 'AKTIF_BULAN_12', 'JENIS_KELUAR_ID', 'TGL_PENGAWAS_KELUAR', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('pengawas_terdaftar_id', 'lembaga_id', 'ptk_id', 'tahun_ajaran_id', 'nomor_surat_tugas', 'tanggal_surat_tugas', 'tmt_tugas', 'mata_pelajaran_id', 'bidang_studi_id', 'jenjang_kepengawasan_id', 'aktif_bulan_01', 'aktif_bulan_02', 'aktif_bulan_03', 'aktif_bulan_04', 'aktif_bulan_05', 'aktif_bulan_06', 'aktif_bulan_07', 'aktif_bulan_08', 'aktif_bulan_09', 'aktif_bulan_10', 'aktif_bulan_11', 'aktif_bulan_12', 'jenis_keluar_id', 'tgl_pengawas_keluar', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PengawasTerdaftarPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('PengawasTerdaftarId' => 0, 'LembagaId' => 1, 'PtkId' => 2, 'TahunAjaranId' => 3, 'NomorSuratTugas' => 4, 'TanggalSuratTugas' => 5, 'TmtTugas' => 6, 'MataPelajaranId' => 7, 'BidangStudiId' => 8, 'JenjangKepengawasanId' => 9, 'AktifBulan01' => 10, 'AktifBulan02' => 11, 'AktifBulan03' => 12, 'AktifBulan04' => 13, 'AktifBulan05' => 14, 'AktifBulan06' => 15, 'AktifBulan07' => 16, 'AktifBulan08' => 17, 'AktifBulan09' => 18, 'AktifBulan10' => 19, 'AktifBulan11' => 20, 'AktifBulan12' => 21, 'JenisKeluarId' => 22, 'TglPengawasKeluar' => 23, 'CreateDate' => 24, 'LastUpdate' => 25, 'SoftDelete' => 26, 'LastSync' => 27, 'UpdaterId' => 28, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('pengawasTerdaftarId' => 0, 'lembagaId' => 1, 'ptkId' => 2, 'tahunAjaranId' => 3, 'nomorSuratTugas' => 4, 'tanggalSuratTugas' => 5, 'tmtTugas' => 6, 'mataPelajaranId' => 7, 'bidangStudiId' => 8, 'jenjangKepengawasanId' => 9, 'aktifBulan01' => 10, 'aktifBulan02' => 11, 'aktifBulan03' => 12, 'aktifBulan04' => 13, 'aktifBulan05' => 14, 'aktifBulan06' => 15, 'aktifBulan07' => 16, 'aktifBulan08' => 17, 'aktifBulan09' => 18, 'aktifBulan10' => 19, 'aktifBulan11' => 20, 'aktifBulan12' => 21, 'jenisKeluarId' => 22, 'tglPengawasKeluar' => 23, 'createDate' => 24, 'lastUpdate' => 25, 'softDelete' => 26, 'lastSync' => 27, 'updaterId' => 28, ),
        BasePeer::TYPE_COLNAME => array (PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID => 0, PengawasTerdaftarPeer::LEMBAGA_ID => 1, PengawasTerdaftarPeer::PTK_ID => 2, PengawasTerdaftarPeer::TAHUN_AJARAN_ID => 3, PengawasTerdaftarPeer::NOMOR_SURAT_TUGAS => 4, PengawasTerdaftarPeer::TANGGAL_SURAT_TUGAS => 5, PengawasTerdaftarPeer::TMT_TUGAS => 6, PengawasTerdaftarPeer::MATA_PELAJARAN_ID => 7, PengawasTerdaftarPeer::BIDANG_STUDI_ID => 8, PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID => 9, PengawasTerdaftarPeer::AKTIF_BULAN_01 => 10, PengawasTerdaftarPeer::AKTIF_BULAN_02 => 11, PengawasTerdaftarPeer::AKTIF_BULAN_03 => 12, PengawasTerdaftarPeer::AKTIF_BULAN_04 => 13, PengawasTerdaftarPeer::AKTIF_BULAN_05 => 14, PengawasTerdaftarPeer::AKTIF_BULAN_06 => 15, PengawasTerdaftarPeer::AKTIF_BULAN_07 => 16, PengawasTerdaftarPeer::AKTIF_BULAN_08 => 17, PengawasTerdaftarPeer::AKTIF_BULAN_09 => 18, PengawasTerdaftarPeer::AKTIF_BULAN_10 => 19, PengawasTerdaftarPeer::AKTIF_BULAN_11 => 20, PengawasTerdaftarPeer::AKTIF_BULAN_12 => 21, PengawasTerdaftarPeer::JENIS_KELUAR_ID => 22, PengawasTerdaftarPeer::TGL_PENGAWAS_KELUAR => 23, PengawasTerdaftarPeer::CREATE_DATE => 24, PengawasTerdaftarPeer::LAST_UPDATE => 25, PengawasTerdaftarPeer::SOFT_DELETE => 26, PengawasTerdaftarPeer::LAST_SYNC => 27, PengawasTerdaftarPeer::UPDATER_ID => 28, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PENGAWAS_TERDAFTAR_ID' => 0, 'LEMBAGA_ID' => 1, 'PTK_ID' => 2, 'TAHUN_AJARAN_ID' => 3, 'NOMOR_SURAT_TUGAS' => 4, 'TANGGAL_SURAT_TUGAS' => 5, 'TMT_TUGAS' => 6, 'MATA_PELAJARAN_ID' => 7, 'BIDANG_STUDI_ID' => 8, 'JENJANG_KEPENGAWASAN_ID' => 9, 'AKTIF_BULAN_01' => 10, 'AKTIF_BULAN_02' => 11, 'AKTIF_BULAN_03' => 12, 'AKTIF_BULAN_04' => 13, 'AKTIF_BULAN_05' => 14, 'AKTIF_BULAN_06' => 15, 'AKTIF_BULAN_07' => 16, 'AKTIF_BULAN_08' => 17, 'AKTIF_BULAN_09' => 18, 'AKTIF_BULAN_10' => 19, 'AKTIF_BULAN_11' => 20, 'AKTIF_BULAN_12' => 21, 'JENIS_KELUAR_ID' => 22, 'TGL_PENGAWAS_KELUAR' => 23, 'CREATE_DATE' => 24, 'LAST_UPDATE' => 25, 'SOFT_DELETE' => 26, 'LAST_SYNC' => 27, 'UPDATER_ID' => 28, ),
        BasePeer::TYPE_FIELDNAME => array ('pengawas_terdaftar_id' => 0, 'lembaga_id' => 1, 'ptk_id' => 2, 'tahun_ajaran_id' => 3, 'nomor_surat_tugas' => 4, 'tanggal_surat_tugas' => 5, 'tmt_tugas' => 6, 'mata_pelajaran_id' => 7, 'bidang_studi_id' => 8, 'jenjang_kepengawasan_id' => 9, 'aktif_bulan_01' => 10, 'aktif_bulan_02' => 11, 'aktif_bulan_03' => 12, 'aktif_bulan_04' => 13, 'aktif_bulan_05' => 14, 'aktif_bulan_06' => 15, 'aktif_bulan_07' => 16, 'aktif_bulan_08' => 17, 'aktif_bulan_09' => 18, 'aktif_bulan_10' => 19, 'aktif_bulan_11' => 20, 'aktif_bulan_12' => 21, 'jenis_keluar_id' => 22, 'tgl_pengawas_keluar' => 23, 'create_date' => 24, 'last_update' => 25, 'soft_delete' => 26, 'last_sync' => 27, 'updater_id' => 28, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
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
        $toNames = PengawasTerdaftarPeer::getFieldNames($toType);
        $key = isset(PengawasTerdaftarPeer::$fieldKeys[$fromType][$name]) ? PengawasTerdaftarPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(PengawasTerdaftarPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, PengawasTerdaftarPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PengawasTerdaftarPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. PengawasTerdaftarPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PengawasTerdaftarPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::LEMBAGA_ID);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::PTK_ID);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::TAHUN_AJARAN_ID);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::NOMOR_SURAT_TUGAS);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::TANGGAL_SURAT_TUGAS);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::TMT_TUGAS);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::MATA_PELAJARAN_ID);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::BIDANG_STUDI_ID);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::AKTIF_BULAN_01);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::AKTIF_BULAN_02);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::AKTIF_BULAN_03);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::AKTIF_BULAN_04);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::AKTIF_BULAN_05);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::AKTIF_BULAN_06);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::AKTIF_BULAN_07);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::AKTIF_BULAN_08);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::AKTIF_BULAN_09);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::AKTIF_BULAN_10);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::AKTIF_BULAN_11);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::AKTIF_BULAN_12);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::JENIS_KELUAR_ID);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::TGL_PENGAWAS_KELUAR);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::CREATE_DATE);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::LAST_UPDATE);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::SOFT_DELETE);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::LAST_SYNC);
            $criteria->addSelectColumn(PengawasTerdaftarPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.pengawas_terdaftar_id');
            $criteria->addSelectColumn($alias . '.lembaga_id');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.tahun_ajaran_id');
            $criteria->addSelectColumn($alias . '.nomor_surat_tugas');
            $criteria->addSelectColumn($alias . '.tanggal_surat_tugas');
            $criteria->addSelectColumn($alias . '.tmt_tugas');
            $criteria->addSelectColumn($alias . '.mata_pelajaran_id');
            $criteria->addSelectColumn($alias . '.bidang_studi_id');
            $criteria->addSelectColumn($alias . '.jenjang_kepengawasan_id');
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
            $criteria->addSelectColumn($alias . '.jenis_keluar_id');
            $criteria->addSelectColumn($alias . '.tgl_pengawas_keluar');
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
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PengawasTerdaftar
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PengawasTerdaftarPeer::doSelect($critcopy, $con);
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
        return PengawasTerdaftarPeer::populateObjects(PengawasTerdaftarPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

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
     * @param      PengawasTerdaftar $obj A PengawasTerdaftar object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getPengawasTerdaftarId();
            } // if key === null
            PengawasTerdaftarPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A PengawasTerdaftar object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof PengawasTerdaftar) {
                $key = (string) $value->getPengawasTerdaftarId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or PengawasTerdaftar object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(PengawasTerdaftarPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   PengawasTerdaftar Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PengawasTerdaftarPeer::$instances[$key])) {
                return PengawasTerdaftarPeer::$instances[$key];
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
        foreach (PengawasTerdaftarPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        PengawasTerdaftarPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to pengawas_terdaftar
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
        $cls = PengawasTerdaftarPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PengawasTerdaftarPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PengawasTerdaftarPeer::addInstanceToPool($obj, $key);
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
     * @return array (PengawasTerdaftar object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PengawasTerdaftarPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PengawasTerdaftarPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PengawasTerdaftarPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related BidangStudi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBidangStudi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LembagaNonSekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLembagaNonSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMataPelajaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenjangKepengawasan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenjangKepengawasan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);

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
     * Selects a collection of PengawasTerdaftar objects pre-filled with their BidangStudi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBidangStudi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        BidangStudiPeer::addSelectColumns($criteria);

        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PengawasTerdaftar) to $obj2 (BidangStudi)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PengawasTerdaftar objects pre-filled with their JenisKeluar objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisKeluar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        JenisKeluarPeer::addSelectColumns($criteria);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (PengawasTerdaftar) to $obj2 (JenisKeluar)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PengawasTerdaftar objects pre-filled with their LembagaNonSekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLembagaNonSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        LembagaNonSekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LembagaNonSekolahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LembagaNonSekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LembagaNonSekolahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PengawasTerdaftar) to $obj2 (LembagaNonSekolah)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PengawasTerdaftar objects pre-filled with their MataPelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMataPelajaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        MataPelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MataPelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MataPelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PengawasTerdaftar) to $obj2 (MataPelajaran)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PengawasTerdaftar objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (PengawasTerdaftar) to $obj2 (Ptk)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PengawasTerdaftar objects pre-filled with their TahunAjaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTahunAjaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        TahunAjaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (PengawasTerdaftar) to $obj2 (TahunAjaran)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PengawasTerdaftar objects pre-filled with their JenjangKepengawasan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenjangKepengawasan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        JenjangKepengawasanPeer::addSelectColumns($criteria);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenjangKepengawasanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenjangKepengawasanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenjangKepengawasanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenjangKepengawasanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (PengawasTerdaftar) to $obj2 (JenjangKepengawasan)
                $obj2->addPengawasTerdaftar($obj1);

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
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);

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
     * Selects a collection of PengawasTerdaftar objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        LembagaNonSekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PtkPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        JenjangKepengawasanPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + JenjangKepengawasanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined BidangStudi rows

            $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj2 (BidangStudi)
                $obj2->addPengawasTerdaftar($obj1);
            } // if joined row not null

            // Add objects for joined JenisKeluar rows

            $key3 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JenisKeluarPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JenisKeluarPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisKeluarPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj3 (JenisKeluar)
                $obj3->addPengawasTerdaftar($obj1);
            } // if joined row not null

            // Add objects for joined LembagaNonSekolah rows

            $key4 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = LembagaNonSekolahPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = LembagaNonSekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembagaNonSekolahPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj4 (LembagaNonSekolah)
                $obj4->addPengawasTerdaftar($obj1);
            } // if joined row not null

            // Add objects for joined MataPelajaran rows

            $key5 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = MataPelajaranPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MataPelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj5 (MataPelajaran)
                $obj5->addPengawasTerdaftar($obj1);
            } // if joined row not null

            // Add objects for joined Ptk rows

            $key6 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = PtkPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = PtkPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PtkPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj6 (Ptk)
                $obj6->addPengawasTerdaftar($obj1);
            } // if joined row not null

            // Add objects for joined TahunAjaran rows

            $key7 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = TahunAjaranPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = TahunAjaranPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    TahunAjaranPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj7 (TahunAjaran)
                $obj7->addPengawasTerdaftar($obj1);
            } // if joined row not null

            // Add objects for joined JenjangKepengawasan rows

            $key8 = JenjangKepengawasanPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = JenjangKepengawasanPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = JenjangKepengawasanPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    JenjangKepengawasanPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj8 (JenjangKepengawasan)
                $obj8->addPengawasTerdaftar($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related BidangStudi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBidangStudi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LembagaNonSekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLembagaNonSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMataPelajaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenjangKepengawasan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenjangKepengawasan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PengawasTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Selects a collection of PengawasTerdaftar objects pre-filled with all related objects except BidangStudi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBidangStudi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        LembagaNonSekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PtkPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        JenjangKepengawasanPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenjangKepengawasanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj2 (JenisKeluar)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaNonSekolah rows

                $key3 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = LembagaNonSekolahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = LembagaNonSekolahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LembagaNonSekolahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj3 (LembagaNonSekolah)
                $obj3->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key4 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = MataPelajaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    MataPelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj4 (MataPelajaran)
                $obj4->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key5 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = PtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj5 (Ptk)
                $obj5->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key6 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = TahunAjaranPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    TahunAjaranPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj6 (TahunAjaran)
                $obj6->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangKepengawasan rows

                $key7 = JenjangKepengawasanPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenjangKepengawasanPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenjangKepengawasanPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenjangKepengawasanPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj7 (JenjangKepengawasan)
                $obj7->addPengawasTerdaftar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PengawasTerdaftar objects pre-filled with all related objects except JenisKeluar.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
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
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        LembagaNonSekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PtkPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        JenjangKepengawasanPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenjangKepengawasanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BidangStudi rows

                $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj2 (BidangStudi)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaNonSekolah rows

                $key3 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = LembagaNonSekolahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = LembagaNonSekolahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LembagaNonSekolahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj3 (LembagaNonSekolah)
                $obj3->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key4 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = MataPelajaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    MataPelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj4 (MataPelajaran)
                $obj4->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key5 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = PtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj5 (Ptk)
                $obj5->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key6 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = TahunAjaranPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    TahunAjaranPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj6 (TahunAjaran)
                $obj6->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangKepengawasan rows

                $key7 = JenjangKepengawasanPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenjangKepengawasanPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenjangKepengawasanPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenjangKepengawasanPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj7 (JenjangKepengawasan)
                $obj7->addPengawasTerdaftar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PengawasTerdaftar objects pre-filled with all related objects except LembagaNonSekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLembagaNonSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PtkPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        JenjangKepengawasanPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenjangKepengawasanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BidangStudi rows

                $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj2 (BidangStudi)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined JenisKeluar rows

                $key3 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisKeluarPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisKeluarPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj3 (JenisKeluar)
                $obj3->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key4 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = MataPelajaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    MataPelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj4 (MataPelajaran)
                $obj4->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key5 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = PtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj5 (Ptk)
                $obj5->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key6 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = TahunAjaranPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    TahunAjaranPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj6 (TahunAjaran)
                $obj6->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangKepengawasan rows

                $key7 = JenjangKepengawasanPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenjangKepengawasanPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenjangKepengawasanPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenjangKepengawasanPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj7 (JenjangKepengawasan)
                $obj7->addPengawasTerdaftar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PengawasTerdaftar objects pre-filled with all related objects except MataPelajaran.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMataPelajaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        LembagaNonSekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PtkPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        JenjangKepengawasanPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenjangKepengawasanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BidangStudi rows

                $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj2 (BidangStudi)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined JenisKeluar rows

                $key3 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisKeluarPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisKeluarPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj3 (JenisKeluar)
                $obj3->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaNonSekolah rows

                $key4 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LembagaNonSekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LembagaNonSekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembagaNonSekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj4 (LembagaNonSekolah)
                $obj4->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key5 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = PtkPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PtkPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj5 (Ptk)
                $obj5->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key6 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = TahunAjaranPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    TahunAjaranPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj6 (TahunAjaran)
                $obj6->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangKepengawasan rows

                $key7 = JenjangKepengawasanPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenjangKepengawasanPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenjangKepengawasanPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenjangKepengawasanPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj7 (JenjangKepengawasan)
                $obj7->addPengawasTerdaftar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PengawasTerdaftar objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
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
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        LembagaNonSekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        JenjangKepengawasanPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenjangKepengawasanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BidangStudi rows

                $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj2 (BidangStudi)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined JenisKeluar rows

                $key3 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisKeluarPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisKeluarPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj3 (JenisKeluar)
                $obj3->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaNonSekolah rows

                $key4 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LembagaNonSekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LembagaNonSekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembagaNonSekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj4 (LembagaNonSekolah)
                $obj4->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key5 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MataPelajaranPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MataPelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj5 (MataPelajaran)
                $obj5->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key6 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = TahunAjaranPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    TahunAjaranPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj6 (TahunAjaran)
                $obj6->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangKepengawasan rows

                $key7 = JenjangKepengawasanPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenjangKepengawasanPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenjangKepengawasanPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenjangKepengawasanPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj7 (JenjangKepengawasan)
                $obj7->addPengawasTerdaftar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PengawasTerdaftar objects pre-filled with all related objects except TahunAjaran.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
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
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        LembagaNonSekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenjangKepengawasanPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenjangKepengawasanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BidangStudi rows

                $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj2 (BidangStudi)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined JenisKeluar rows

                $key3 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisKeluarPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisKeluarPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj3 (JenisKeluar)
                $obj3->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaNonSekolah rows

                $key4 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LembagaNonSekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LembagaNonSekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembagaNonSekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj4 (LembagaNonSekolah)
                $obj4->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key5 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MataPelajaranPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MataPelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj5 (MataPelajaran)
                $obj5->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key6 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = PtkPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PtkPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj6 (Ptk)
                $obj6->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangKepengawasan rows

                $key7 = JenjangKepengawasanPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenjangKepengawasanPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenjangKepengawasanPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenjangKepengawasanPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj7 (JenjangKepengawasan)
                $obj7->addPengawasTerdaftar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PengawasTerdaftar objects pre-filled with all related objects except JenjangKepengawasan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PengawasTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenjangKepengawasan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);
        }

        PengawasTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = PengawasTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        LembagaNonSekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PtkPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PengawasTerdaftarPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::LEMBAGA_ID, LembagaNonSekolahPeer::LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PengawasTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PengawasTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PengawasTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PengawasTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BidangStudi rows

                $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj2 (BidangStudi)
                $obj2->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined JenisKeluar rows

                $key3 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisKeluarPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisKeluarPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj3 (JenisKeluar)
                $obj3->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaNonSekolah rows

                $key4 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LembagaNonSekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LembagaNonSekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembagaNonSekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj4 (LembagaNonSekolah)
                $obj4->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key5 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MataPelajaranPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MataPelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj5 (MataPelajaran)
                $obj5->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key6 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = PtkPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PtkPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj6 (Ptk)
                $obj6->addPengawasTerdaftar($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key7 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = TahunAjaranPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    TahunAjaranPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (PengawasTerdaftar) to the collection in $obj7 (TahunAjaran)
                $obj7->addPengawasTerdaftar($obj1);

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
        return Propel::getDatabaseMap(PengawasTerdaftarPeer::DATABASE_NAME)->getTable(PengawasTerdaftarPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasePengawasTerdaftarPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasePengawasTerdaftarPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new PengawasTerdaftarTableMap());
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
        return PengawasTerdaftarPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a PengawasTerdaftar or Criteria object.
     *
     * @param      mixed $values Criteria or PengawasTerdaftar object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from PengawasTerdaftar object
        }


        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a PengawasTerdaftar or Criteria object.
     *
     * @param      mixed $values Criteria or PengawasTerdaftar object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PengawasTerdaftarPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID);
            $value = $criteria->remove(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID);
            if ($value) {
                $selectCriteria->add(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PengawasTerdaftarPeer::TABLE_NAME);
            }

        } else { // $values is PengawasTerdaftar object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pengawas_terdaftar table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PengawasTerdaftarPeer::TABLE_NAME, $con, PengawasTerdaftarPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PengawasTerdaftarPeer::clearInstancePool();
            PengawasTerdaftarPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a PengawasTerdaftar or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or PengawasTerdaftar object or primary key or array of primary keys
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
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PengawasTerdaftarPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof PengawasTerdaftar) { // it's a model object
            // invalidate the cache for this single object
            PengawasTerdaftarPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PengawasTerdaftarPeer::DATABASE_NAME);
            $criteria->add(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                PengawasTerdaftarPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PengawasTerdaftarPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            PengawasTerdaftarPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given PengawasTerdaftar object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      PengawasTerdaftar $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PengawasTerdaftarPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PengawasTerdaftarPeer::TABLE_NAME);

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

        return BasePeer::doValidate(PengawasTerdaftarPeer::DATABASE_NAME, PengawasTerdaftarPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return PengawasTerdaftar
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PengawasTerdaftarPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PengawasTerdaftarPeer::DATABASE_NAME);
        $criteria->add(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID, $pk);

        $v = PengawasTerdaftarPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return PengawasTerdaftar[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PengawasTerdaftarPeer::DATABASE_NAME);
            $criteria->add(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID, $pks, Criteria::IN);
            $objs = PengawasTerdaftarPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePengawasTerdaftarPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePengawasTerdaftarPeer::buildTableMap();

