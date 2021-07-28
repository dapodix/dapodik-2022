<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BentukLembagaPeer;
use DataDikdas\Model\FasilitasLayananPeer;
use DataDikdas\Model\JadwalPaudPeer;
use DataDikdas\Model\KategoriTkPeer;
use DataDikdas\Model\KlasifikasiLembagaPeer;
use DataDikdas\Model\LembagaPengangkatPeer;
use DataDikdas\Model\SekolahPaud;
use DataDikdas\Model\SekolahPaudPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\SumberDanaSekolahPeer;
use DataDikdas\Model\map\SekolahPaudTableMap;

/**
 * Base static class for performing query and update operations on the 'sekolah_paud' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseSekolahPaudPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'sekolah_paud';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\SekolahPaud';

    /** the related TableMap class for this table */
    const TM_CLASS = 'SekolahPaudTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 30;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 30;

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'sekolah_paud.sekolah_id';

    /** the column name for the kategori_tk_id field */
    const KATEGORI_TK_ID = 'sekolah_paud.kategori_tk_id';

    /** the column name for the klasifikasi_lembaga_id field */
    const KLASIFIKASI_LEMBAGA_ID = 'sekolah_paud.klasifikasi_lembaga_id';

    /** the column name for the sumber_dana_sekolah_id field */
    const SUMBER_DANA_SEKOLAH_ID = 'sekolah_paud.sumber_dana_sekolah_id';

    /** the column name for the fasilitas_layanan_id field */
    const FASILITAS_LAYANAN_ID = 'sekolah_paud.fasilitas_layanan_id';

    /** the column name for the jadwal_pmtas field */
    const JADWAL_PMTAS = 'sekolah_paud.jadwal_pmtas';

    /** the column name for the lembaga_pengangkat_id field */
    const LEMBAGA_PENGANGKAT_ID = 'sekolah_paud.lembaga_pengangkat_id';

    /** the column name for the jadwal_ddtk field */
    const JADWAL_DDTK = 'sekolah_paud.jadwal_ddtk';

    /** the column name for the freq_parenting field */
    const FREQ_PARENTING = 'sekolah_paud.freq_parenting';

    /** the column name for the bentuk_lembaga_id field */
    const BENTUK_LEMBAGA_ID = 'sekolah_paud.bentuk_lembaga_id';

    /** the column name for the jadwal_kesehatan field */
    const JADWAL_KESEHATAN = 'sekolah_paud.jadwal_kesehatan';

    /** the column name for the izin_paud field */
    const IZIN_PAUD = 'sekolah_paud.izin_paud';

    /** the column name for the pencatatan_ddtk field */
    const PENCATATAN_DDTK = 'sekolah_paud.pencatatan_ddtk';

    /** the column name for the rujukan_ddtk field */
    const RUJUKAN_DDTK = 'sekolah_paud.rujukan_ddtk';

    /** the column name for the pelaksanaan_parenting field */
    const PELAKSANAAN_PARENTING = 'sekolah_paud.pelaksanaan_parenting';

    /** the column name for the parenting_kpo field */
    const PARENTING_KPO = 'sekolah_paud.parenting_kpo';

    /** the column name for the parenting_kelas field */
    const PARENTING_KELAS = 'sekolah_paud.parenting_kelas';

    /** the column name for the parenting_kegiatan field */
    const PARENTING_KEGIATAN = 'sekolah_paud.parenting_kegiatan';

    /** the column name for the parenting_konsultasi field */
    const PARENTING_KONSULTASI = 'sekolah_paud.parenting_konsultasi';

    /** the column name for the parenting_kunjungan field */
    const PARENTING_KUNJUNGAN = 'sekolah_paud.parenting_kunjungan';

    /** the column name for the parenting_lainnya field */
    const PARENTING_LAINNYA = 'sekolah_paud.parenting_lainnya';

    /** the column name for the nilk field */
    const NILK = 'sekolah_paud.nilk';

    /** the column name for the nilm field */
    const NILM = 'sekolah_paud.nilm';

    /** the column name for the no_penetapan_pnf field */
    const NO_PENETAPAN_PNF = 'sekolah_paud.no_penetapan_pnf';

    /** the column name for the tanggal_penetapan_pnf field */
    const TANGGAL_PENETAPAN_PNF = 'sekolah_paud.tanggal_penetapan_pnf';

    /** the column name for the create_date field */
    const CREATE_DATE = 'sekolah_paud.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'sekolah_paud.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'sekolah_paud.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'sekolah_paud.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'sekolah_paud.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of SekolahPaud objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array SekolahPaud[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. SekolahPaudPeer::$fieldNames[SekolahPaudPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('SekolahId', 'KategoriTkId', 'KlasifikasiLembagaId', 'SumberDanaSekolahId', 'FasilitasLayananId', 'JadwalPmtas', 'LembagaPengangkatId', 'JadwalDdtk', 'FreqParenting', 'BentukLembagaId', 'JadwalKesehatan', 'IzinPaud', 'PencatatanDdtk', 'RujukanDdtk', 'PelaksanaanParenting', 'ParentingKpo', 'ParentingKelas', 'ParentingKegiatan', 'ParentingKonsultasi', 'ParentingKunjungan', 'ParentingLainnya', 'Nilk', 'Nilm', 'NoPenetapanPnf', 'TanggalPenetapanPnf', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('sekolahId', 'kategoriTkId', 'klasifikasiLembagaId', 'sumberDanaSekolahId', 'fasilitasLayananId', 'jadwalPmtas', 'lembagaPengangkatId', 'jadwalDdtk', 'freqParenting', 'bentukLembagaId', 'jadwalKesehatan', 'izinPaud', 'pencatatanDdtk', 'rujukanDdtk', 'pelaksanaanParenting', 'parentingKpo', 'parentingKelas', 'parentingKegiatan', 'parentingKonsultasi', 'parentingKunjungan', 'parentingLainnya', 'nilk', 'nilm', 'noPenetapanPnf', 'tanggalPenetapanPnf', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (SekolahPaudPeer::SEKOLAH_ID, SekolahPaudPeer::KATEGORI_TK_ID, SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SekolahPaudPeer::FASILITAS_LAYANAN_ID, SekolahPaudPeer::JADWAL_PMTAS, SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, SekolahPaudPeer::JADWAL_DDTK, SekolahPaudPeer::FREQ_PARENTING, SekolahPaudPeer::BENTUK_LEMBAGA_ID, SekolahPaudPeer::JADWAL_KESEHATAN, SekolahPaudPeer::IZIN_PAUD, SekolahPaudPeer::PENCATATAN_DDTK, SekolahPaudPeer::RUJUKAN_DDTK, SekolahPaudPeer::PELAKSANAAN_PARENTING, SekolahPaudPeer::PARENTING_KPO, SekolahPaudPeer::PARENTING_KELAS, SekolahPaudPeer::PARENTING_KEGIATAN, SekolahPaudPeer::PARENTING_KONSULTASI, SekolahPaudPeer::PARENTING_KUNJUNGAN, SekolahPaudPeer::PARENTING_LAINNYA, SekolahPaudPeer::NILK, SekolahPaudPeer::NILM, SekolahPaudPeer::NO_PENETAPAN_PNF, SekolahPaudPeer::TANGGAL_PENETAPAN_PNF, SekolahPaudPeer::CREATE_DATE, SekolahPaudPeer::LAST_UPDATE, SekolahPaudPeer::SOFT_DELETE, SekolahPaudPeer::LAST_SYNC, SekolahPaudPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SEKOLAH_ID', 'KATEGORI_TK_ID', 'KLASIFIKASI_LEMBAGA_ID', 'SUMBER_DANA_SEKOLAH_ID', 'FASILITAS_LAYANAN_ID', 'JADWAL_PMTAS', 'LEMBAGA_PENGANGKAT_ID', 'JADWAL_DDTK', 'FREQ_PARENTING', 'BENTUK_LEMBAGA_ID', 'JADWAL_KESEHATAN', 'IZIN_PAUD', 'PENCATATAN_DDTK', 'RUJUKAN_DDTK', 'PELAKSANAAN_PARENTING', 'PARENTING_KPO', 'PARENTING_KELAS', 'PARENTING_KEGIATAN', 'PARENTING_KONSULTASI', 'PARENTING_KUNJUNGAN', 'PARENTING_LAINNYA', 'NILK', 'NILM', 'NO_PENETAPAN_PNF', 'TANGGAL_PENETAPAN_PNF', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('sekolah_id', 'kategori_tk_id', 'klasifikasi_lembaga_id', 'sumber_dana_sekolah_id', 'fasilitas_layanan_id', 'jadwal_pmtas', 'lembaga_pengangkat_id', 'jadwal_ddtk', 'freq_parenting', 'bentuk_lembaga_id', 'jadwal_kesehatan', 'izin_paud', 'pencatatan_ddtk', 'rujukan_ddtk', 'pelaksanaan_parenting', 'parenting_kpo', 'parenting_kelas', 'parenting_kegiatan', 'parenting_konsultasi', 'parenting_kunjungan', 'parenting_lainnya', 'nilk', 'nilm', 'no_penetapan_pnf', 'tanggal_penetapan_pnf', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. SekolahPaudPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('SekolahId' => 0, 'KategoriTkId' => 1, 'KlasifikasiLembagaId' => 2, 'SumberDanaSekolahId' => 3, 'FasilitasLayananId' => 4, 'JadwalPmtas' => 5, 'LembagaPengangkatId' => 6, 'JadwalDdtk' => 7, 'FreqParenting' => 8, 'BentukLembagaId' => 9, 'JadwalKesehatan' => 10, 'IzinPaud' => 11, 'PencatatanDdtk' => 12, 'RujukanDdtk' => 13, 'PelaksanaanParenting' => 14, 'ParentingKpo' => 15, 'ParentingKelas' => 16, 'ParentingKegiatan' => 17, 'ParentingKonsultasi' => 18, 'ParentingKunjungan' => 19, 'ParentingLainnya' => 20, 'Nilk' => 21, 'Nilm' => 22, 'NoPenetapanPnf' => 23, 'TanggalPenetapanPnf' => 24, 'CreateDate' => 25, 'LastUpdate' => 26, 'SoftDelete' => 27, 'LastSync' => 28, 'UpdaterId' => 29, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('sekolahId' => 0, 'kategoriTkId' => 1, 'klasifikasiLembagaId' => 2, 'sumberDanaSekolahId' => 3, 'fasilitasLayananId' => 4, 'jadwalPmtas' => 5, 'lembagaPengangkatId' => 6, 'jadwalDdtk' => 7, 'freqParenting' => 8, 'bentukLembagaId' => 9, 'jadwalKesehatan' => 10, 'izinPaud' => 11, 'pencatatanDdtk' => 12, 'rujukanDdtk' => 13, 'pelaksanaanParenting' => 14, 'parentingKpo' => 15, 'parentingKelas' => 16, 'parentingKegiatan' => 17, 'parentingKonsultasi' => 18, 'parentingKunjungan' => 19, 'parentingLainnya' => 20, 'nilk' => 21, 'nilm' => 22, 'noPenetapanPnf' => 23, 'tanggalPenetapanPnf' => 24, 'createDate' => 25, 'lastUpdate' => 26, 'softDelete' => 27, 'lastSync' => 28, 'updaterId' => 29, ),
        BasePeer::TYPE_COLNAME => array (SekolahPaudPeer::SEKOLAH_ID => 0, SekolahPaudPeer::KATEGORI_TK_ID => 1, SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID => 2, SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID => 3, SekolahPaudPeer::FASILITAS_LAYANAN_ID => 4, SekolahPaudPeer::JADWAL_PMTAS => 5, SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID => 6, SekolahPaudPeer::JADWAL_DDTK => 7, SekolahPaudPeer::FREQ_PARENTING => 8, SekolahPaudPeer::BENTUK_LEMBAGA_ID => 9, SekolahPaudPeer::JADWAL_KESEHATAN => 10, SekolahPaudPeer::IZIN_PAUD => 11, SekolahPaudPeer::PENCATATAN_DDTK => 12, SekolahPaudPeer::RUJUKAN_DDTK => 13, SekolahPaudPeer::PELAKSANAAN_PARENTING => 14, SekolahPaudPeer::PARENTING_KPO => 15, SekolahPaudPeer::PARENTING_KELAS => 16, SekolahPaudPeer::PARENTING_KEGIATAN => 17, SekolahPaudPeer::PARENTING_KONSULTASI => 18, SekolahPaudPeer::PARENTING_KUNJUNGAN => 19, SekolahPaudPeer::PARENTING_LAINNYA => 20, SekolahPaudPeer::NILK => 21, SekolahPaudPeer::NILM => 22, SekolahPaudPeer::NO_PENETAPAN_PNF => 23, SekolahPaudPeer::TANGGAL_PENETAPAN_PNF => 24, SekolahPaudPeer::CREATE_DATE => 25, SekolahPaudPeer::LAST_UPDATE => 26, SekolahPaudPeer::SOFT_DELETE => 27, SekolahPaudPeer::LAST_SYNC => 28, SekolahPaudPeer::UPDATER_ID => 29, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SEKOLAH_ID' => 0, 'KATEGORI_TK_ID' => 1, 'KLASIFIKASI_LEMBAGA_ID' => 2, 'SUMBER_DANA_SEKOLAH_ID' => 3, 'FASILITAS_LAYANAN_ID' => 4, 'JADWAL_PMTAS' => 5, 'LEMBAGA_PENGANGKAT_ID' => 6, 'JADWAL_DDTK' => 7, 'FREQ_PARENTING' => 8, 'BENTUK_LEMBAGA_ID' => 9, 'JADWAL_KESEHATAN' => 10, 'IZIN_PAUD' => 11, 'PENCATATAN_DDTK' => 12, 'RUJUKAN_DDTK' => 13, 'PELAKSANAAN_PARENTING' => 14, 'PARENTING_KPO' => 15, 'PARENTING_KELAS' => 16, 'PARENTING_KEGIATAN' => 17, 'PARENTING_KONSULTASI' => 18, 'PARENTING_KUNJUNGAN' => 19, 'PARENTING_LAINNYA' => 20, 'NILK' => 21, 'NILM' => 22, 'NO_PENETAPAN_PNF' => 23, 'TANGGAL_PENETAPAN_PNF' => 24, 'CREATE_DATE' => 25, 'LAST_UPDATE' => 26, 'SOFT_DELETE' => 27, 'LAST_SYNC' => 28, 'UPDATER_ID' => 29, ),
        BasePeer::TYPE_FIELDNAME => array ('sekolah_id' => 0, 'kategori_tk_id' => 1, 'klasifikasi_lembaga_id' => 2, 'sumber_dana_sekolah_id' => 3, 'fasilitas_layanan_id' => 4, 'jadwal_pmtas' => 5, 'lembaga_pengangkat_id' => 6, 'jadwal_ddtk' => 7, 'freq_parenting' => 8, 'bentuk_lembaga_id' => 9, 'jadwal_kesehatan' => 10, 'izin_paud' => 11, 'pencatatan_ddtk' => 12, 'rujukan_ddtk' => 13, 'pelaksanaan_parenting' => 14, 'parenting_kpo' => 15, 'parenting_kelas' => 16, 'parenting_kegiatan' => 17, 'parenting_konsultasi' => 18, 'parenting_kunjungan' => 19, 'parenting_lainnya' => 20, 'nilk' => 21, 'nilm' => 22, 'no_penetapan_pnf' => 23, 'tanggal_penetapan_pnf' => 24, 'create_date' => 25, 'last_update' => 26, 'soft_delete' => 27, 'last_sync' => 28, 'updater_id' => 29, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, )
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
        $toNames = SekolahPaudPeer::getFieldNames($toType);
        $key = isset(SekolahPaudPeer::$fieldKeys[$fromType][$name]) ? SekolahPaudPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(SekolahPaudPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, SekolahPaudPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return SekolahPaudPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. SekolahPaudPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(SekolahPaudPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(SekolahPaudPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(SekolahPaudPeer::KATEGORI_TK_ID);
            $criteria->addSelectColumn(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID);
            $criteria->addSelectColumn(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID);
            $criteria->addSelectColumn(SekolahPaudPeer::FASILITAS_LAYANAN_ID);
            $criteria->addSelectColumn(SekolahPaudPeer::JADWAL_PMTAS);
            $criteria->addSelectColumn(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID);
            $criteria->addSelectColumn(SekolahPaudPeer::JADWAL_DDTK);
            $criteria->addSelectColumn(SekolahPaudPeer::FREQ_PARENTING);
            $criteria->addSelectColumn(SekolahPaudPeer::BENTUK_LEMBAGA_ID);
            $criteria->addSelectColumn(SekolahPaudPeer::JADWAL_KESEHATAN);
            $criteria->addSelectColumn(SekolahPaudPeer::IZIN_PAUD);
            $criteria->addSelectColumn(SekolahPaudPeer::PENCATATAN_DDTK);
            $criteria->addSelectColumn(SekolahPaudPeer::RUJUKAN_DDTK);
            $criteria->addSelectColumn(SekolahPaudPeer::PELAKSANAAN_PARENTING);
            $criteria->addSelectColumn(SekolahPaudPeer::PARENTING_KPO);
            $criteria->addSelectColumn(SekolahPaudPeer::PARENTING_KELAS);
            $criteria->addSelectColumn(SekolahPaudPeer::PARENTING_KEGIATAN);
            $criteria->addSelectColumn(SekolahPaudPeer::PARENTING_KONSULTASI);
            $criteria->addSelectColumn(SekolahPaudPeer::PARENTING_KUNJUNGAN);
            $criteria->addSelectColumn(SekolahPaudPeer::PARENTING_LAINNYA);
            $criteria->addSelectColumn(SekolahPaudPeer::NILK);
            $criteria->addSelectColumn(SekolahPaudPeer::NILM);
            $criteria->addSelectColumn(SekolahPaudPeer::NO_PENETAPAN_PNF);
            $criteria->addSelectColumn(SekolahPaudPeer::TANGGAL_PENETAPAN_PNF);
            $criteria->addSelectColumn(SekolahPaudPeer::CREATE_DATE);
            $criteria->addSelectColumn(SekolahPaudPeer::LAST_UPDATE);
            $criteria->addSelectColumn(SekolahPaudPeer::SOFT_DELETE);
            $criteria->addSelectColumn(SekolahPaudPeer::LAST_SYNC);
            $criteria->addSelectColumn(SekolahPaudPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.kategori_tk_id');
            $criteria->addSelectColumn($alias . '.klasifikasi_lembaga_id');
            $criteria->addSelectColumn($alias . '.sumber_dana_sekolah_id');
            $criteria->addSelectColumn($alias . '.fasilitas_layanan_id');
            $criteria->addSelectColumn($alias . '.jadwal_pmtas');
            $criteria->addSelectColumn($alias . '.lembaga_pengangkat_id');
            $criteria->addSelectColumn($alias . '.jadwal_ddtk');
            $criteria->addSelectColumn($alias . '.freq_parenting');
            $criteria->addSelectColumn($alias . '.bentuk_lembaga_id');
            $criteria->addSelectColumn($alias . '.jadwal_kesehatan');
            $criteria->addSelectColumn($alias . '.izin_paud');
            $criteria->addSelectColumn($alias . '.pencatatan_ddtk');
            $criteria->addSelectColumn($alias . '.rujukan_ddtk');
            $criteria->addSelectColumn($alias . '.pelaksanaan_parenting');
            $criteria->addSelectColumn($alias . '.parenting_kpo');
            $criteria->addSelectColumn($alias . '.parenting_kelas');
            $criteria->addSelectColumn($alias . '.parenting_kegiatan');
            $criteria->addSelectColumn($alias . '.parenting_konsultasi');
            $criteria->addSelectColumn($alias . '.parenting_kunjungan');
            $criteria->addSelectColumn($alias . '.parenting_lainnya');
            $criteria->addSelectColumn($alias . '.nilk');
            $criteria->addSelectColumn($alias . '.nilm');
            $criteria->addSelectColumn($alias . '.no_penetapan_pnf');
            $criteria->addSelectColumn($alias . '.tanggal_penetapan_pnf');
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
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SekolahPaud
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = SekolahPaudPeer::doSelect($critcopy, $con);
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
        return SekolahPaudPeer::populateObjects(SekolahPaudPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

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
     * @param      SekolahPaud $obj A SekolahPaud object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getSekolahId();
            } // if key === null
            SekolahPaudPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A SekolahPaud object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof SekolahPaud) {
                $key = (string) $value->getSekolahId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SekolahPaud object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(SekolahPaudPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   SekolahPaud Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(SekolahPaudPeer::$instances[$key])) {
                return SekolahPaudPeer::$instances[$key];
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
        foreach (SekolahPaudPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        SekolahPaudPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to sekolah_paud
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
        $cls = SekolahPaudPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = SekolahPaudPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SekolahPaudPeer::addInstanceToPool($obj, $key);
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
     * @return array (SekolahPaud object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = SekolahPaudPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + SekolahPaudPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SekolahPaudPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            SekolahPaudPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related BentukLembaga table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBentukLembaga(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related FasilitasLayanan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinFasilitasLayanan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JadwalPaudRelatedByFreqParenting table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJadwalPaudRelatedByFreqParenting(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JadwalPaudRelatedByJadwalDdtk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJadwalPaudRelatedByJadwalDdtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JadwalPaudRelatedByJadwalKesehatan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJadwalPaudRelatedByJadwalKesehatan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JadwalPaudRelatedByJadwalPmtas table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJadwalPaudRelatedByJadwalPmtas(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related KategoriTk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKategoriTk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related KlasifikasiLembaga table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKlasifikasiLembaga(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LembagaPengangkat table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLembagaPengangkat(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SumberDanaSekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSumberDanaSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of SekolahPaud objects pre-filled with their BentukLembaga objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBentukLembaga(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;
        BentukLembagaPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BentukLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BentukLembagaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BentukLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BentukLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahPaud) to $obj2 (BentukLembaga)
                $obj2->addSekolahPaud($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with their FasilitasLayanan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinFasilitasLayanan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;
        FasilitasLayananPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = FasilitasLayananPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = FasilitasLayananPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = FasilitasLayananPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    FasilitasLayananPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahPaud) to $obj2 (FasilitasLayanan)
                $obj2->addSekolahPaud($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with their JadwalPaud objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJadwalPaudRelatedByFreqParenting(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;
        JadwalPaudPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JadwalPaudPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JadwalPaudPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JadwalPaudPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahPaud) to $obj2 (JadwalPaud)
                $obj2->addSekolahPaudRelatedByFreqParenting($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with their JadwalPaud objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJadwalPaudRelatedByJadwalDdtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;
        JadwalPaudPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JadwalPaudPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JadwalPaudPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JadwalPaudPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahPaud) to $obj2 (JadwalPaud)
                $obj2->addSekolahPaudRelatedByJadwalDdtk($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with their JadwalPaud objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJadwalPaudRelatedByJadwalKesehatan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;
        JadwalPaudPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JadwalPaudPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JadwalPaudPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JadwalPaudPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahPaud) to $obj2 (JadwalPaud)
                $obj2->addSekolahPaudRelatedByJadwalKesehatan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with their JadwalPaud objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJadwalPaudRelatedByJadwalPmtas(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;
        JadwalPaudPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JadwalPaudPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JadwalPaudPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JadwalPaudPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahPaud) to $obj2 (JadwalPaud)
                $obj2->addSekolahPaudRelatedByJadwalPmtas($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with their KategoriTk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKategoriTk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;
        KategoriTkPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KategoriTkPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KategoriTkPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KategoriTkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KategoriTkPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahPaud) to $obj2 (KategoriTk)
                $obj2->addSekolahPaud($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with their KlasifikasiLembaga objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKlasifikasiLembaga(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;
        KlasifikasiLembagaPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KlasifikasiLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KlasifikasiLembagaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KlasifikasiLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KlasifikasiLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahPaud) to $obj2 (KlasifikasiLembaga)
                $obj2->addSekolahPaud($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with their LembagaPengangkat objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLembagaPengangkat(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;
        LembagaPengangkatPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LembagaPengangkatPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LembagaPengangkatPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LembagaPengangkatPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahPaud) to $obj2 (LembagaPengangkat)
                $obj2->addSekolahPaud($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (SekolahPaud) to $obj2 (Sekolah)
                // one to one relationship
                $obj1->setSekolah($obj2);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with their SumberDanaSekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSumberDanaSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;
        SumberDanaSekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SumberDanaSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SumberDanaSekolahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SumberDanaSekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SumberDanaSekolahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahPaud) to $obj2 (SumberDanaSekolah)
                $obj2->addSekolahPaud($obj1);

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
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of SekolahPaud objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;

        BentukLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BentukLembagaPeer::NUM_HYDRATE_COLUMNS;

        FasilitasLayananPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FasilitasLayananPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        KategoriTkPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KategoriTkPeer::NUM_HYDRATE_COLUMNS;

        KlasifikasiLembagaPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + KlasifikasiLembagaPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaSekolahPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + SumberDanaSekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined BentukLembaga rows

            $key2 = BentukLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = BentukLembagaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BentukLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BentukLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj2 (BentukLembaga)
                $obj2->addSekolahPaud($obj1);
            } // if joined row not null

            // Add objects for joined FasilitasLayanan rows

            $key3 = FasilitasLayananPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = FasilitasLayananPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = FasilitasLayananPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FasilitasLayananPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj3 (FasilitasLayanan)
                $obj3->addSekolahPaud($obj1);
            } // if joined row not null

            // Add objects for joined JadwalPaud rows

            $key4 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = JadwalPaudPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = JadwalPaudPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JadwalPaudPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj4 (JadwalPaud)
                $obj4->addSekolahPaudRelatedByFreqParenting($obj1);
            } // if joined row not null

            // Add objects for joined JadwalPaud rows

            $key5 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = JadwalPaudPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = JadwalPaudPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JadwalPaudPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj5 (JadwalPaud)
                $obj5->addSekolahPaudRelatedByJadwalDdtk($obj1);
            } // if joined row not null

            // Add objects for joined JadwalPaud rows

            $key6 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = JadwalPaudPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = JadwalPaudPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JadwalPaudPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj6 (JadwalPaud)
                $obj6->addSekolahPaudRelatedByJadwalKesehatan($obj1);
            } // if joined row not null

            // Add objects for joined JadwalPaud rows

            $key7 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = JadwalPaudPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = JadwalPaudPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JadwalPaudPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj7 (JadwalPaud)
                $obj7->addSekolahPaudRelatedByJadwalPmtas($obj1);
            } // if joined row not null

            // Add objects for joined KategoriTk rows

            $key8 = KategoriTkPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = KategoriTkPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = KategoriTkPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KategoriTkPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj8 (KategoriTk)
                $obj8->addSekolahPaud($obj1);
            } // if joined row not null

            // Add objects for joined KlasifikasiLembaga rows

            $key9 = KlasifikasiLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol9);
            if ($key9 !== null) {
                $obj9 = KlasifikasiLembagaPeer::getInstanceFromPool($key9);
                if (!$obj9) {

                    $cls = KlasifikasiLembagaPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    KlasifikasiLembagaPeer::addInstanceToPool($obj9, $key9);
                } // if obj9 loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj9 (KlasifikasiLembaga)
                $obj9->addSekolahPaud($obj1);
            } // if joined row not null

            // Add objects for joined LembagaPengangkat rows

            $key10 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol10);
            if ($key10 !== null) {
                $obj10 = LembagaPengangkatPeer::getInstanceFromPool($key10);
                if (!$obj10) {

                    $cls = LembagaPengangkatPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    LembagaPengangkatPeer::addInstanceToPool($obj10, $key10);
                } // if obj10 loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj10 (LembagaPengangkat)
                $obj10->addSekolahPaud($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key11 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol11);
            if ($key11 !== null) {
                $obj11 = SekolahPeer::getInstanceFromPool($key11);
                if (!$obj11) {

                    $cls = SekolahPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    SekolahPeer::addInstanceToPool($obj11, $key11);
                } // if obj11 loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj11 (Sekolah)
                $obj1->setSekolah($obj11);
            } // if joined row not null

            // Add objects for joined SumberDanaSekolah rows

            $key12 = SumberDanaSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol12);
            if ($key12 !== null) {
                $obj12 = SumberDanaSekolahPeer::getInstanceFromPool($key12);
                if (!$obj12) {

                    $cls = SumberDanaSekolahPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    SumberDanaSekolahPeer::addInstanceToPool($obj12, $key12);
                } // if obj12 loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj12 (SumberDanaSekolah)
                $obj12->addSekolahPaud($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related BentukLembaga table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBentukLembaga(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related FasilitasLayanan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptFasilitasLayanan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JadwalPaudRelatedByFreqParenting table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJadwalPaudRelatedByFreqParenting(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JadwalPaudRelatedByJadwalDdtk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJadwalPaudRelatedByJadwalDdtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JadwalPaudRelatedByJadwalKesehatan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJadwalPaudRelatedByJadwalKesehatan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JadwalPaudRelatedByJadwalPmtas table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJadwalPaudRelatedByJadwalPmtas(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related KategoriTk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKategoriTk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related KlasifikasiLembaga table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKlasifikasiLembaga(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LembagaPengangkat table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLembagaPengangkat(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SumberDanaSekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSumberDanaSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahPaudPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of SekolahPaud objects pre-filled with all related objects except BentukLembaga.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBentukLembaga(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;

        FasilitasLayananPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + FasilitasLayananPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        KategoriTkPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KategoriTkPeer::NUM_HYDRATE_COLUMNS;

        KlasifikasiLembagaPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KlasifikasiLembagaPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaSekolahPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + SumberDanaSekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined FasilitasLayanan rows

                $key2 = FasilitasLayananPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = FasilitasLayananPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = FasilitasLayananPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    FasilitasLayananPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj2 (FasilitasLayanan)
                $obj2->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key3 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JadwalPaudPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JadwalPaudPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj3 (JadwalPaud)
                $obj3->addSekolahPaudRelatedByFreqParenting($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key4 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JadwalPaudPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JadwalPaudPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj4 (JadwalPaud)
                $obj4->addSekolahPaudRelatedByJadwalDdtk($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key5 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JadwalPaudPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JadwalPaudPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj5 (JadwalPaud)
                $obj5->addSekolahPaudRelatedByJadwalKesehatan($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key6 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JadwalPaudPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JadwalPaudPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj6 (JadwalPaud)
                $obj6->addSekolahPaudRelatedByJadwalPmtas($obj1);

            } // if joined row is not null

                // Add objects for joined KategoriTk rows

                $key7 = KategoriTkPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KategoriTkPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KategoriTkPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KategoriTkPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj7 (KategoriTk)
                $obj7->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KlasifikasiLembaga rows

                $key8 = KlasifikasiLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KlasifikasiLembagaPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KlasifikasiLembagaPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KlasifikasiLembagaPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj8 (KlasifikasiLembaga)
                $obj8->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key9 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = LembagaPengangkatPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    LembagaPengangkatPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj9 (LembagaPengangkat)
                $obj9->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key10 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = SekolahPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    SekolahPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj10 (Sekolah)
                $obj1->setSekolah($obj10);

            } // if joined row is not null

                // Add objects for joined SumberDanaSekolah rows

                $key11 = SumberDanaSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = SumberDanaSekolahPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = SumberDanaSekolahPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    SumberDanaSekolahPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj11 (SumberDanaSekolah)
                $obj11->addSekolahPaud($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with all related objects except FasilitasLayanan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptFasilitasLayanan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;

        BentukLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BentukLembagaPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        KategoriTkPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + KategoriTkPeer::NUM_HYDRATE_COLUMNS;

        KlasifikasiLembagaPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KlasifikasiLembagaPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaSekolahPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + SumberDanaSekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BentukLembaga rows

                $key2 = BentukLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BentukLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BentukLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BentukLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj2 (BentukLembaga)
                $obj2->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key3 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JadwalPaudPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JadwalPaudPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj3 (JadwalPaud)
                $obj3->addSekolahPaudRelatedByFreqParenting($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key4 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JadwalPaudPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JadwalPaudPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj4 (JadwalPaud)
                $obj4->addSekolahPaudRelatedByJadwalDdtk($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key5 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JadwalPaudPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JadwalPaudPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj5 (JadwalPaud)
                $obj5->addSekolahPaudRelatedByJadwalKesehatan($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key6 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JadwalPaudPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JadwalPaudPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj6 (JadwalPaud)
                $obj6->addSekolahPaudRelatedByJadwalPmtas($obj1);

            } // if joined row is not null

                // Add objects for joined KategoriTk rows

                $key7 = KategoriTkPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = KategoriTkPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = KategoriTkPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    KategoriTkPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj7 (KategoriTk)
                $obj7->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KlasifikasiLembaga rows

                $key8 = KlasifikasiLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KlasifikasiLembagaPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KlasifikasiLembagaPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KlasifikasiLembagaPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj8 (KlasifikasiLembaga)
                $obj8->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key9 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = LembagaPengangkatPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    LembagaPengangkatPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj9 (LembagaPengangkat)
                $obj9->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key10 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = SekolahPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    SekolahPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj10 (Sekolah)
                $obj1->setSekolah($obj10);

            } // if joined row is not null

                // Add objects for joined SumberDanaSekolah rows

                $key11 = SumberDanaSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = SumberDanaSekolahPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = SumberDanaSekolahPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    SumberDanaSekolahPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj11 (SumberDanaSekolah)
                $obj11->addSekolahPaud($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with all related objects except JadwalPaudRelatedByFreqParenting.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJadwalPaudRelatedByFreqParenting(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;

        BentukLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BentukLembagaPeer::NUM_HYDRATE_COLUMNS;

        FasilitasLayananPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FasilitasLayananPeer::NUM_HYDRATE_COLUMNS;

        KategoriTkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + KategoriTkPeer::NUM_HYDRATE_COLUMNS;

        KlasifikasiLembagaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + KlasifikasiLembagaPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaSekolahPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + SumberDanaSekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BentukLembaga rows

                $key2 = BentukLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BentukLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BentukLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BentukLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj2 (BentukLembaga)
                $obj2->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined FasilitasLayanan rows

                $key3 = FasilitasLayananPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FasilitasLayananPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = FasilitasLayananPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FasilitasLayananPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj3 (FasilitasLayanan)
                $obj3->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KategoriTk rows

                $key4 = KategoriTkPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = KategoriTkPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = KategoriTkPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    KategoriTkPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj4 (KategoriTk)
                $obj4->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KlasifikasiLembaga rows

                $key5 = KlasifikasiLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = KlasifikasiLembagaPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = KlasifikasiLembagaPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    KlasifikasiLembagaPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj5 (KlasifikasiLembaga)
                $obj5->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key6 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = LembagaPengangkatPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    LembagaPengangkatPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj6 (LembagaPengangkat)
                $obj6->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key7 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = SekolahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    SekolahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj7 (Sekolah)
                $obj1->setSekolah($obj7);

            } // if joined row is not null

                // Add objects for joined SumberDanaSekolah rows

                $key8 = SumberDanaSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = SumberDanaSekolahPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = SumberDanaSekolahPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    SumberDanaSekolahPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj8 (SumberDanaSekolah)
                $obj8->addSekolahPaud($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with all related objects except JadwalPaudRelatedByJadwalDdtk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJadwalPaudRelatedByJadwalDdtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;

        BentukLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BentukLembagaPeer::NUM_HYDRATE_COLUMNS;

        FasilitasLayananPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FasilitasLayananPeer::NUM_HYDRATE_COLUMNS;

        KategoriTkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + KategoriTkPeer::NUM_HYDRATE_COLUMNS;

        KlasifikasiLembagaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + KlasifikasiLembagaPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaSekolahPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + SumberDanaSekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BentukLembaga rows

                $key2 = BentukLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BentukLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BentukLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BentukLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj2 (BentukLembaga)
                $obj2->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined FasilitasLayanan rows

                $key3 = FasilitasLayananPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FasilitasLayananPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = FasilitasLayananPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FasilitasLayananPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj3 (FasilitasLayanan)
                $obj3->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KategoriTk rows

                $key4 = KategoriTkPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = KategoriTkPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = KategoriTkPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    KategoriTkPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj4 (KategoriTk)
                $obj4->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KlasifikasiLembaga rows

                $key5 = KlasifikasiLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = KlasifikasiLembagaPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = KlasifikasiLembagaPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    KlasifikasiLembagaPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj5 (KlasifikasiLembaga)
                $obj5->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key6 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = LembagaPengangkatPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    LembagaPengangkatPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj6 (LembagaPengangkat)
                $obj6->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key7 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = SekolahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    SekolahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj7 (Sekolah)
                $obj1->setSekolah($obj7);

            } // if joined row is not null

                // Add objects for joined SumberDanaSekolah rows

                $key8 = SumberDanaSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = SumberDanaSekolahPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = SumberDanaSekolahPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    SumberDanaSekolahPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj8 (SumberDanaSekolah)
                $obj8->addSekolahPaud($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with all related objects except JadwalPaudRelatedByJadwalKesehatan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJadwalPaudRelatedByJadwalKesehatan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;

        BentukLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BentukLembagaPeer::NUM_HYDRATE_COLUMNS;

        FasilitasLayananPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FasilitasLayananPeer::NUM_HYDRATE_COLUMNS;

        KategoriTkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + KategoriTkPeer::NUM_HYDRATE_COLUMNS;

        KlasifikasiLembagaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + KlasifikasiLembagaPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaSekolahPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + SumberDanaSekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BentukLembaga rows

                $key2 = BentukLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BentukLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BentukLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BentukLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj2 (BentukLembaga)
                $obj2->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined FasilitasLayanan rows

                $key3 = FasilitasLayananPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FasilitasLayananPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = FasilitasLayananPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FasilitasLayananPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj3 (FasilitasLayanan)
                $obj3->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KategoriTk rows

                $key4 = KategoriTkPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = KategoriTkPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = KategoriTkPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    KategoriTkPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj4 (KategoriTk)
                $obj4->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KlasifikasiLembaga rows

                $key5 = KlasifikasiLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = KlasifikasiLembagaPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = KlasifikasiLembagaPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    KlasifikasiLembagaPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj5 (KlasifikasiLembaga)
                $obj5->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key6 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = LembagaPengangkatPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    LembagaPengangkatPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj6 (LembagaPengangkat)
                $obj6->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key7 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = SekolahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    SekolahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj7 (Sekolah)
                $obj1->setSekolah($obj7);

            } // if joined row is not null

                // Add objects for joined SumberDanaSekolah rows

                $key8 = SumberDanaSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = SumberDanaSekolahPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = SumberDanaSekolahPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    SumberDanaSekolahPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj8 (SumberDanaSekolah)
                $obj8->addSekolahPaud($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with all related objects except JadwalPaudRelatedByJadwalPmtas.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJadwalPaudRelatedByJadwalPmtas(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;

        BentukLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BentukLembagaPeer::NUM_HYDRATE_COLUMNS;

        FasilitasLayananPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FasilitasLayananPeer::NUM_HYDRATE_COLUMNS;

        KategoriTkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + KategoriTkPeer::NUM_HYDRATE_COLUMNS;

        KlasifikasiLembagaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + KlasifikasiLembagaPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaSekolahPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + SumberDanaSekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BentukLembaga rows

                $key2 = BentukLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BentukLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BentukLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BentukLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj2 (BentukLembaga)
                $obj2->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined FasilitasLayanan rows

                $key3 = FasilitasLayananPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FasilitasLayananPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = FasilitasLayananPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FasilitasLayananPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj3 (FasilitasLayanan)
                $obj3->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KategoriTk rows

                $key4 = KategoriTkPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = KategoriTkPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = KategoriTkPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    KategoriTkPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj4 (KategoriTk)
                $obj4->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KlasifikasiLembaga rows

                $key5 = KlasifikasiLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = KlasifikasiLembagaPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = KlasifikasiLembagaPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    KlasifikasiLembagaPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj5 (KlasifikasiLembaga)
                $obj5->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key6 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = LembagaPengangkatPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    LembagaPengangkatPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj6 (LembagaPengangkat)
                $obj6->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key7 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = SekolahPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    SekolahPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj7 (Sekolah)
                $obj1->setSekolah($obj7);

            } // if joined row is not null

                // Add objects for joined SumberDanaSekolah rows

                $key8 = SumberDanaSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = SumberDanaSekolahPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = SumberDanaSekolahPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    SumberDanaSekolahPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj8 (SumberDanaSekolah)
                $obj8->addSekolahPaud($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with all related objects except KategoriTk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKategoriTk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;

        BentukLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BentukLembagaPeer::NUM_HYDRATE_COLUMNS;

        FasilitasLayananPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FasilitasLayananPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        KlasifikasiLembagaPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KlasifikasiLembagaPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaSekolahPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + SumberDanaSekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BentukLembaga rows

                $key2 = BentukLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BentukLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BentukLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BentukLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj2 (BentukLembaga)
                $obj2->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined FasilitasLayanan rows

                $key3 = FasilitasLayananPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FasilitasLayananPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = FasilitasLayananPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FasilitasLayananPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj3 (FasilitasLayanan)
                $obj3->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key4 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JadwalPaudPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JadwalPaudPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj4 (JadwalPaud)
                $obj4->addSekolahPaudRelatedByFreqParenting($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key5 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JadwalPaudPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JadwalPaudPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj5 (JadwalPaud)
                $obj5->addSekolahPaudRelatedByJadwalDdtk($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key6 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JadwalPaudPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JadwalPaudPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj6 (JadwalPaud)
                $obj6->addSekolahPaudRelatedByJadwalKesehatan($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key7 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JadwalPaudPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JadwalPaudPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj7 (JadwalPaud)
                $obj7->addSekolahPaudRelatedByJadwalPmtas($obj1);

            } // if joined row is not null

                // Add objects for joined KlasifikasiLembaga rows

                $key8 = KlasifikasiLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KlasifikasiLembagaPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KlasifikasiLembagaPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KlasifikasiLembagaPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj8 (KlasifikasiLembaga)
                $obj8->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key9 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = LembagaPengangkatPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    LembagaPengangkatPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj9 (LembagaPengangkat)
                $obj9->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key10 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = SekolahPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    SekolahPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj10 (Sekolah)
                $obj1->setSekolah($obj10);

            } // if joined row is not null

                // Add objects for joined SumberDanaSekolah rows

                $key11 = SumberDanaSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = SumberDanaSekolahPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = SumberDanaSekolahPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    SumberDanaSekolahPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj11 (SumberDanaSekolah)
                $obj11->addSekolahPaud($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with all related objects except KlasifikasiLembaga.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKlasifikasiLembaga(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;

        BentukLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BentukLembagaPeer::NUM_HYDRATE_COLUMNS;

        FasilitasLayananPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FasilitasLayananPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        KategoriTkPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KategoriTkPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaSekolahPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + SumberDanaSekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BentukLembaga rows

                $key2 = BentukLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BentukLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BentukLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BentukLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj2 (BentukLembaga)
                $obj2->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined FasilitasLayanan rows

                $key3 = FasilitasLayananPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FasilitasLayananPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = FasilitasLayananPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FasilitasLayananPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj3 (FasilitasLayanan)
                $obj3->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key4 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JadwalPaudPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JadwalPaudPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj4 (JadwalPaud)
                $obj4->addSekolahPaudRelatedByFreqParenting($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key5 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JadwalPaudPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JadwalPaudPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj5 (JadwalPaud)
                $obj5->addSekolahPaudRelatedByJadwalDdtk($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key6 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JadwalPaudPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JadwalPaudPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj6 (JadwalPaud)
                $obj6->addSekolahPaudRelatedByJadwalKesehatan($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key7 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JadwalPaudPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JadwalPaudPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj7 (JadwalPaud)
                $obj7->addSekolahPaudRelatedByJadwalPmtas($obj1);

            } // if joined row is not null

                // Add objects for joined KategoriTk rows

                $key8 = KategoriTkPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KategoriTkPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KategoriTkPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KategoriTkPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj8 (KategoriTk)
                $obj8->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key9 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = LembagaPengangkatPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    LembagaPengangkatPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj9 (LembagaPengangkat)
                $obj9->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key10 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = SekolahPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    SekolahPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj10 (Sekolah)
                $obj1->setSekolah($obj10);

            } // if joined row is not null

                // Add objects for joined SumberDanaSekolah rows

                $key11 = SumberDanaSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = SumberDanaSekolahPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = SumberDanaSekolahPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    SumberDanaSekolahPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj11 (SumberDanaSekolah)
                $obj11->addSekolahPaud($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with all related objects except LembagaPengangkat.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLembagaPengangkat(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;

        BentukLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BentukLembagaPeer::NUM_HYDRATE_COLUMNS;

        FasilitasLayananPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FasilitasLayananPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        KategoriTkPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KategoriTkPeer::NUM_HYDRATE_COLUMNS;

        KlasifikasiLembagaPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + KlasifikasiLembagaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaSekolahPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + SumberDanaSekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BentukLembaga rows

                $key2 = BentukLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BentukLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BentukLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BentukLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj2 (BentukLembaga)
                $obj2->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined FasilitasLayanan rows

                $key3 = FasilitasLayananPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FasilitasLayananPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = FasilitasLayananPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FasilitasLayananPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj3 (FasilitasLayanan)
                $obj3->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key4 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JadwalPaudPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JadwalPaudPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj4 (JadwalPaud)
                $obj4->addSekolahPaudRelatedByFreqParenting($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key5 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JadwalPaudPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JadwalPaudPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj5 (JadwalPaud)
                $obj5->addSekolahPaudRelatedByJadwalDdtk($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key6 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JadwalPaudPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JadwalPaudPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj6 (JadwalPaud)
                $obj6->addSekolahPaudRelatedByJadwalKesehatan($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key7 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JadwalPaudPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JadwalPaudPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj7 (JadwalPaud)
                $obj7->addSekolahPaudRelatedByJadwalPmtas($obj1);

            } // if joined row is not null

                // Add objects for joined KategoriTk rows

                $key8 = KategoriTkPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KategoriTkPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KategoriTkPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KategoriTkPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj8 (KategoriTk)
                $obj8->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KlasifikasiLembaga rows

                $key9 = KlasifikasiLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = KlasifikasiLembagaPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = KlasifikasiLembagaPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    KlasifikasiLembagaPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj9 (KlasifikasiLembaga)
                $obj9->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key10 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = SekolahPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    SekolahPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj10 (Sekolah)
                $obj1->setSekolah($obj10);

            } // if joined row is not null

                // Add objects for joined SumberDanaSekolah rows

                $key11 = SumberDanaSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = SumberDanaSekolahPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = SumberDanaSekolahPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    SumberDanaSekolahPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj11 (SumberDanaSekolah)
                $obj11->addSekolahPaud($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
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
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;

        BentukLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BentukLembagaPeer::NUM_HYDRATE_COLUMNS;

        FasilitasLayananPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FasilitasLayananPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        KategoriTkPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KategoriTkPeer::NUM_HYDRATE_COLUMNS;

        KlasifikasiLembagaPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + KlasifikasiLembagaPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaSekolahPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + SumberDanaSekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, SumberDanaSekolahPeer::SUMBER_DANA_SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BentukLembaga rows

                $key2 = BentukLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BentukLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BentukLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BentukLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj2 (BentukLembaga)
                $obj2->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined FasilitasLayanan rows

                $key3 = FasilitasLayananPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FasilitasLayananPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = FasilitasLayananPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FasilitasLayananPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj3 (FasilitasLayanan)
                $obj3->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key4 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JadwalPaudPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JadwalPaudPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj4 (JadwalPaud)
                $obj4->addSekolahPaudRelatedByFreqParenting($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key5 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JadwalPaudPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JadwalPaudPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj5 (JadwalPaud)
                $obj5->addSekolahPaudRelatedByJadwalDdtk($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key6 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JadwalPaudPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JadwalPaudPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj6 (JadwalPaud)
                $obj6->addSekolahPaudRelatedByJadwalKesehatan($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key7 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JadwalPaudPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JadwalPaudPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj7 (JadwalPaud)
                $obj7->addSekolahPaudRelatedByJadwalPmtas($obj1);

            } // if joined row is not null

                // Add objects for joined KategoriTk rows

                $key8 = KategoriTkPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KategoriTkPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KategoriTkPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KategoriTkPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj8 (KategoriTk)
                $obj8->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KlasifikasiLembaga rows

                $key9 = KlasifikasiLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = KlasifikasiLembagaPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = KlasifikasiLembagaPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    KlasifikasiLembagaPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj9 (KlasifikasiLembaga)
                $obj9->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key10 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = LembagaPengangkatPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    LembagaPengangkatPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj10 (LembagaPengangkat)
                $obj10->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined SumberDanaSekolah rows

                $key11 = SumberDanaSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = SumberDanaSekolahPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = SumberDanaSekolahPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    SumberDanaSekolahPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj11 (SumberDanaSekolah)
                $obj11->addSekolahPaud($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahPaud objects pre-filled with all related objects except SumberDanaSekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahPaud objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSumberDanaSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);
        }

        SekolahPaudPeer::addSelectColumns($criteria);
        $startcol2 = SekolahPaudPeer::NUM_HYDRATE_COLUMNS;

        BentukLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BentukLembagaPeer::NUM_HYDRATE_COLUMNS;

        FasilitasLayananPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + FasilitasLayananPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        JadwalPaudPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JadwalPaudPeer::NUM_HYDRATE_COLUMNS;

        KategoriTkPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + KategoriTkPeer::NUM_HYDRATE_COLUMNS;

        KlasifikasiLembagaPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + KlasifikasiLembagaPeer::NUM_HYDRATE_COLUMNS;

        LembagaPengangkatPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + LembagaPengangkatPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahPaudPeer::BENTUK_LEMBAGA_ID, BentukLembagaPeer::BENTUK_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FASILITAS_LAYANAN_ID, FasilitasLayananPeer::FASILITAS_LAYANAN_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::FREQ_PARENTING, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_DDTK, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_KESEHATAN, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::JADWAL_PMTAS, JadwalPaudPeer::JADWAL_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KATEGORI_TK_ID, KategoriTkPeer::KATEGORI_TK_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, KlasifikasiLembagaPeer::KLASIFIKASI_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, LembagaPengangkatPeer::LEMBAGA_PENGANGKAT_ID, $join_behavior);

        $criteria->addJoin(SekolahPaudPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahPaudPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahPaudPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahPaudPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahPaudPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BentukLembaga rows

                $key2 = BentukLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BentukLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BentukLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BentukLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj2 (BentukLembaga)
                $obj2->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined FasilitasLayanan rows

                $key3 = FasilitasLayananPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = FasilitasLayananPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = FasilitasLayananPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    FasilitasLayananPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj3 (FasilitasLayanan)
                $obj3->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key4 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JadwalPaudPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JadwalPaudPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj4 (JadwalPaud)
                $obj4->addSekolahPaudRelatedByFreqParenting($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key5 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JadwalPaudPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JadwalPaudPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj5 (JadwalPaud)
                $obj5->addSekolahPaudRelatedByJadwalDdtk($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key6 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JadwalPaudPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JadwalPaudPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj6 (JadwalPaud)
                $obj6->addSekolahPaudRelatedByJadwalKesehatan($obj1);

            } // if joined row is not null

                // Add objects for joined JadwalPaud rows

                $key7 = JadwalPaudPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JadwalPaudPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JadwalPaudPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JadwalPaudPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj7 (JadwalPaud)
                $obj7->addSekolahPaudRelatedByJadwalPmtas($obj1);

            } // if joined row is not null

                // Add objects for joined KategoriTk rows

                $key8 = KategoriTkPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = KategoriTkPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = KategoriTkPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    KategoriTkPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj8 (KategoriTk)
                $obj8->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined KlasifikasiLembaga rows

                $key9 = KlasifikasiLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = KlasifikasiLembagaPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = KlasifikasiLembagaPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    KlasifikasiLembagaPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj9 (KlasifikasiLembaga)
                $obj9->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaPengangkat rows

                $key10 = LembagaPengangkatPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = LembagaPengangkatPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = LembagaPengangkatPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    LembagaPengangkatPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj10 (LembagaPengangkat)
                $obj10->addSekolahPaud($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key11 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = SekolahPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    SekolahPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (SekolahPaud) to the collection in $obj11 (Sekolah)
                $obj1->setSekolah($obj11);

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
        return Propel::getDatabaseMap(SekolahPaudPeer::DATABASE_NAME)->getTable(SekolahPaudPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseSekolahPaudPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseSekolahPaudPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new SekolahPaudTableMap());
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
        return SekolahPaudPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a SekolahPaud or Criteria object.
     *
     * @param      mixed $values Criteria or SekolahPaud object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from SekolahPaud object
        }


        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a SekolahPaud or Criteria object.
     *
     * @param      mixed $values Criteria or SekolahPaud object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(SekolahPaudPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(SekolahPaudPeer::SEKOLAH_ID);
            $value = $criteria->remove(SekolahPaudPeer::SEKOLAH_ID);
            if ($value) {
                $selectCriteria->add(SekolahPaudPeer::SEKOLAH_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SekolahPaudPeer::TABLE_NAME);
            }

        } else { // $values is SekolahPaud object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the sekolah_paud table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(SekolahPaudPeer::TABLE_NAME, $con, SekolahPaudPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SekolahPaudPeer::clearInstancePool();
            SekolahPaudPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a SekolahPaud or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or SekolahPaud object or primary key or array of primary keys
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
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            SekolahPaudPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof SekolahPaud) { // it's a model object
            // invalidate the cache for this single object
            SekolahPaudPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SekolahPaudPeer::DATABASE_NAME);
            $criteria->add(SekolahPaudPeer::SEKOLAH_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                SekolahPaudPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(SekolahPaudPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            SekolahPaudPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given SekolahPaud object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      SekolahPaud $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(SekolahPaudPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(SekolahPaudPeer::TABLE_NAME);

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

        return BasePeer::doValidate(SekolahPaudPeer::DATABASE_NAME, SekolahPaudPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return SekolahPaud
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = SekolahPaudPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(SekolahPaudPeer::DATABASE_NAME);
        $criteria->add(SekolahPaudPeer::SEKOLAH_ID, $pk);

        $v = SekolahPaudPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return SekolahPaud[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(SekolahPaudPeer::DATABASE_NAME);
            $criteria->add(SekolahPaudPeer::SEKOLAH_ID, $pks, Criteria::IN);
            $objs = SekolahPaudPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseSekolahPaudPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSekolahPaudPeer::buildTableMap();

