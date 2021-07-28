<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\AksesInternetPeer;
use DataDikdas\Model\LargeObjectPeer;
use DataDikdas\Model\SekolahLongitudinal;
use DataDikdas\Model\SekolahLongitudinalPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\SertifikasiIsoPeer;
use DataDikdas\Model\SumberListrikPeer;
use DataDikdas\Model\WaktuPenyelenggaraanPeer;
use DataDikdas\Model\map\SekolahLongitudinalTableMap;

/**
 * Base static class for performing query and update operations on the 'sekolah_longitudinal' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseSekolahLongitudinalPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'sekolah_longitudinal';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\SekolahLongitudinal';

    /** the related TableMap class for this table */
    const TM_CLASS = 'SekolahLongitudinalTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 23;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 23;

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'sekolah_longitudinal.sekolah_id';

    /** the column name for the semester_id field */
    const SEMESTER_ID = 'sekolah_longitudinal.semester_id';

    /** the column name for the waktu_penyelenggaraan_id field */
    const WAKTU_PENYELENGGARAAN_ID = 'sekolah_longitudinal.waktu_penyelenggaraan_id';

    /** the column name for the kontinuitas_listrik field */
    const KONTINUITAS_LISTRIK = 'sekolah_longitudinal.kontinuitas_listrik';

    /** the column name for the jarak_listrik field */
    const JARAK_LISTRIK = 'sekolah_longitudinal.jarak_listrik';

    /** the column name for the wilayah_terpencil field */
    const WILAYAH_TERPENCIL = 'sekolah_longitudinal.wilayah_terpencil';

    /** the column name for the wilayah_perbatasan field */
    const WILAYAH_PERBATASAN = 'sekolah_longitudinal.wilayah_perbatasan';

    /** the column name for the wilayah_transmigrasi field */
    const WILAYAH_TRANSMIGRASI = 'sekolah_longitudinal.wilayah_transmigrasi';

    /** the column name for the wilayah_adat_terpencil field */
    const WILAYAH_ADAT_TERPENCIL = 'sekolah_longitudinal.wilayah_adat_terpencil';

    /** the column name for the wilayah_bencana_alam field */
    const WILAYAH_BENCANA_ALAM = 'sekolah_longitudinal.wilayah_bencana_alam';

    /** the column name for the wilayah_bencana_sosial field */
    const WILAYAH_BENCANA_SOSIAL = 'sekolah_longitudinal.wilayah_bencana_sosial';

    /** the column name for the partisipasi_bos field */
    const PARTISIPASI_BOS = 'sekolah_longitudinal.partisipasi_bos';

    /** the column name for the sertifikasi_iso_id field */
    const SERTIFIKASI_ISO_ID = 'sekolah_longitudinal.sertifikasi_iso_id';

    /** the column name for the sumber_listrik_id field */
    const SUMBER_LISTRIK_ID = 'sekolah_longitudinal.sumber_listrik_id';

    /** the column name for the daya_listrik field */
    const DAYA_LISTRIK = 'sekolah_longitudinal.daya_listrik';

    /** the column name for the akses_internet_id field */
    const AKSES_INTERNET_ID = 'sekolah_longitudinal.akses_internet_id';

    /** the column name for the akses_internet_2_id field */
    const AKSES_INTERNET_2_ID = 'sekolah_longitudinal.akses_internet_2_id';

    /** the column name for the blob_id field */
    const BLOB_ID = 'sekolah_longitudinal.blob_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'sekolah_longitudinal.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'sekolah_longitudinal.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'sekolah_longitudinal.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'sekolah_longitudinal.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'sekolah_longitudinal.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of SekolahLongitudinal objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array SekolahLongitudinal[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. SekolahLongitudinalPeer::$fieldNames[SekolahLongitudinalPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('SekolahId', 'SemesterId', 'WaktuPenyelenggaraanId', 'KontinuitasListrik', 'JarakListrik', 'WilayahTerpencil', 'WilayahPerbatasan', 'WilayahTransmigrasi', 'WilayahAdatTerpencil', 'WilayahBencanaAlam', 'WilayahBencanaSosial', 'PartisipasiBos', 'SertifikasiIsoId', 'SumberListrikId', 'DayaListrik', 'AksesInternetId', 'AksesInternet2Id', 'BlobId', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('sekolahId', 'semesterId', 'waktuPenyelenggaraanId', 'kontinuitasListrik', 'jarakListrik', 'wilayahTerpencil', 'wilayahPerbatasan', 'wilayahTransmigrasi', 'wilayahAdatTerpencil', 'wilayahBencanaAlam', 'wilayahBencanaSosial', 'partisipasiBos', 'sertifikasiIsoId', 'sumberListrikId', 'dayaListrik', 'aksesInternetId', 'aksesInternet2Id', 'blobId', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (SekolahLongitudinalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEMESTER_ID, SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, SekolahLongitudinalPeer::KONTINUITAS_LISTRIK, SekolahLongitudinalPeer::JARAK_LISTRIK, SekolahLongitudinalPeer::WILAYAH_TERPENCIL, SekolahLongitudinalPeer::WILAYAH_PERBATASAN, SekolahLongitudinalPeer::WILAYAH_TRANSMIGRASI, SekolahLongitudinalPeer::WILAYAH_ADAT_TERPENCIL, SekolahLongitudinalPeer::WILAYAH_BENCANA_ALAM, SekolahLongitudinalPeer::WILAYAH_BENCANA_SOSIAL, SekolahLongitudinalPeer::PARTISIPASI_BOS, SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SekolahLongitudinalPeer::DAYA_LISTRIK, SekolahLongitudinalPeer::AKSES_INTERNET_ID, SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, SekolahLongitudinalPeer::BLOB_ID, SekolahLongitudinalPeer::CREATE_DATE, SekolahLongitudinalPeer::LAST_UPDATE, SekolahLongitudinalPeer::SOFT_DELETE, SekolahLongitudinalPeer::LAST_SYNC, SekolahLongitudinalPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SEKOLAH_ID', 'SEMESTER_ID', 'WAKTU_PENYELENGGARAAN_ID', 'KONTINUITAS_LISTRIK', 'JARAK_LISTRIK', 'WILAYAH_TERPENCIL', 'WILAYAH_PERBATASAN', 'WILAYAH_TRANSMIGRASI', 'WILAYAH_ADAT_TERPENCIL', 'WILAYAH_BENCANA_ALAM', 'WILAYAH_BENCANA_SOSIAL', 'PARTISIPASI_BOS', 'SERTIFIKASI_ISO_ID', 'SUMBER_LISTRIK_ID', 'DAYA_LISTRIK', 'AKSES_INTERNET_ID', 'AKSES_INTERNET_2_ID', 'BLOB_ID', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('sekolah_id', 'semester_id', 'waktu_penyelenggaraan_id', 'kontinuitas_listrik', 'jarak_listrik', 'wilayah_terpencil', 'wilayah_perbatasan', 'wilayah_transmigrasi', 'wilayah_adat_terpencil', 'wilayah_bencana_alam', 'wilayah_bencana_sosial', 'partisipasi_bos', 'sertifikasi_iso_id', 'sumber_listrik_id', 'daya_listrik', 'akses_internet_id', 'akses_internet_2_id', 'blob_id', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. SekolahLongitudinalPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('SekolahId' => 0, 'SemesterId' => 1, 'WaktuPenyelenggaraanId' => 2, 'KontinuitasListrik' => 3, 'JarakListrik' => 4, 'WilayahTerpencil' => 5, 'WilayahPerbatasan' => 6, 'WilayahTransmigrasi' => 7, 'WilayahAdatTerpencil' => 8, 'WilayahBencanaAlam' => 9, 'WilayahBencanaSosial' => 10, 'PartisipasiBos' => 11, 'SertifikasiIsoId' => 12, 'SumberListrikId' => 13, 'DayaListrik' => 14, 'AksesInternetId' => 15, 'AksesInternet2Id' => 16, 'BlobId' => 17, 'CreateDate' => 18, 'LastUpdate' => 19, 'SoftDelete' => 20, 'LastSync' => 21, 'UpdaterId' => 22, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('sekolahId' => 0, 'semesterId' => 1, 'waktuPenyelenggaraanId' => 2, 'kontinuitasListrik' => 3, 'jarakListrik' => 4, 'wilayahTerpencil' => 5, 'wilayahPerbatasan' => 6, 'wilayahTransmigrasi' => 7, 'wilayahAdatTerpencil' => 8, 'wilayahBencanaAlam' => 9, 'wilayahBencanaSosial' => 10, 'partisipasiBos' => 11, 'sertifikasiIsoId' => 12, 'sumberListrikId' => 13, 'dayaListrik' => 14, 'aksesInternetId' => 15, 'aksesInternet2Id' => 16, 'blobId' => 17, 'createDate' => 18, 'lastUpdate' => 19, 'softDelete' => 20, 'lastSync' => 21, 'updaterId' => 22, ),
        BasePeer::TYPE_COLNAME => array (SekolahLongitudinalPeer::SEKOLAH_ID => 0, SekolahLongitudinalPeer::SEMESTER_ID => 1, SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID => 2, SekolahLongitudinalPeer::KONTINUITAS_LISTRIK => 3, SekolahLongitudinalPeer::JARAK_LISTRIK => 4, SekolahLongitudinalPeer::WILAYAH_TERPENCIL => 5, SekolahLongitudinalPeer::WILAYAH_PERBATASAN => 6, SekolahLongitudinalPeer::WILAYAH_TRANSMIGRASI => 7, SekolahLongitudinalPeer::WILAYAH_ADAT_TERPENCIL => 8, SekolahLongitudinalPeer::WILAYAH_BENCANA_ALAM => 9, SekolahLongitudinalPeer::WILAYAH_BENCANA_SOSIAL => 10, SekolahLongitudinalPeer::PARTISIPASI_BOS => 11, SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID => 12, SekolahLongitudinalPeer::SUMBER_LISTRIK_ID => 13, SekolahLongitudinalPeer::DAYA_LISTRIK => 14, SekolahLongitudinalPeer::AKSES_INTERNET_ID => 15, SekolahLongitudinalPeer::AKSES_INTERNET_2_ID => 16, SekolahLongitudinalPeer::BLOB_ID => 17, SekolahLongitudinalPeer::CREATE_DATE => 18, SekolahLongitudinalPeer::LAST_UPDATE => 19, SekolahLongitudinalPeer::SOFT_DELETE => 20, SekolahLongitudinalPeer::LAST_SYNC => 21, SekolahLongitudinalPeer::UPDATER_ID => 22, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SEKOLAH_ID' => 0, 'SEMESTER_ID' => 1, 'WAKTU_PENYELENGGARAAN_ID' => 2, 'KONTINUITAS_LISTRIK' => 3, 'JARAK_LISTRIK' => 4, 'WILAYAH_TERPENCIL' => 5, 'WILAYAH_PERBATASAN' => 6, 'WILAYAH_TRANSMIGRASI' => 7, 'WILAYAH_ADAT_TERPENCIL' => 8, 'WILAYAH_BENCANA_ALAM' => 9, 'WILAYAH_BENCANA_SOSIAL' => 10, 'PARTISIPASI_BOS' => 11, 'SERTIFIKASI_ISO_ID' => 12, 'SUMBER_LISTRIK_ID' => 13, 'DAYA_LISTRIK' => 14, 'AKSES_INTERNET_ID' => 15, 'AKSES_INTERNET_2_ID' => 16, 'BLOB_ID' => 17, 'CREATE_DATE' => 18, 'LAST_UPDATE' => 19, 'SOFT_DELETE' => 20, 'LAST_SYNC' => 21, 'UPDATER_ID' => 22, ),
        BasePeer::TYPE_FIELDNAME => array ('sekolah_id' => 0, 'semester_id' => 1, 'waktu_penyelenggaraan_id' => 2, 'kontinuitas_listrik' => 3, 'jarak_listrik' => 4, 'wilayah_terpencil' => 5, 'wilayah_perbatasan' => 6, 'wilayah_transmigrasi' => 7, 'wilayah_adat_terpencil' => 8, 'wilayah_bencana_alam' => 9, 'wilayah_bencana_sosial' => 10, 'partisipasi_bos' => 11, 'sertifikasi_iso_id' => 12, 'sumber_listrik_id' => 13, 'daya_listrik' => 14, 'akses_internet_id' => 15, 'akses_internet_2_id' => 16, 'blob_id' => 17, 'create_date' => 18, 'last_update' => 19, 'soft_delete' => 20, 'last_sync' => 21, 'updater_id' => 22, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
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
        $toNames = SekolahLongitudinalPeer::getFieldNames($toType);
        $key = isset(SekolahLongitudinalPeer::$fieldKeys[$fromType][$name]) ? SekolahLongitudinalPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(SekolahLongitudinalPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, SekolahLongitudinalPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return SekolahLongitudinalPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. SekolahLongitudinalPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(SekolahLongitudinalPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(SekolahLongitudinalPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::SEMESTER_ID);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::KONTINUITAS_LISTRIK);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::JARAK_LISTRIK);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::WILAYAH_TERPENCIL);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::WILAYAH_PERBATASAN);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::WILAYAH_TRANSMIGRASI);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::WILAYAH_ADAT_TERPENCIL);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::WILAYAH_BENCANA_ALAM);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::WILAYAH_BENCANA_SOSIAL);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::PARTISIPASI_BOS);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::DAYA_LISTRIK);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::AKSES_INTERNET_ID);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::BLOB_ID);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::CREATE_DATE);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::LAST_UPDATE);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::SOFT_DELETE);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::LAST_SYNC);
            $criteria->addSelectColumn(SekolahLongitudinalPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.semester_id');
            $criteria->addSelectColumn($alias . '.waktu_penyelenggaraan_id');
            $criteria->addSelectColumn($alias . '.kontinuitas_listrik');
            $criteria->addSelectColumn($alias . '.jarak_listrik');
            $criteria->addSelectColumn($alias . '.wilayah_terpencil');
            $criteria->addSelectColumn($alias . '.wilayah_perbatasan');
            $criteria->addSelectColumn($alias . '.wilayah_transmigrasi');
            $criteria->addSelectColumn($alias . '.wilayah_adat_terpencil');
            $criteria->addSelectColumn($alias . '.wilayah_bencana_alam');
            $criteria->addSelectColumn($alias . '.wilayah_bencana_sosial');
            $criteria->addSelectColumn($alias . '.partisipasi_bos');
            $criteria->addSelectColumn($alias . '.sertifikasi_iso_id');
            $criteria->addSelectColumn($alias . '.sumber_listrik_id');
            $criteria->addSelectColumn($alias . '.daya_listrik');
            $criteria->addSelectColumn($alias . '.akses_internet_id');
            $criteria->addSelectColumn($alias . '.akses_internet_2_id');
            $criteria->addSelectColumn($alias . '.blob_id');
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
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SekolahLongitudinal
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = SekolahLongitudinalPeer::doSelect($critcopy, $con);
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
        return SekolahLongitudinalPeer::populateObjects(SekolahLongitudinalPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

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
     * @param      SekolahLongitudinal $obj A SekolahLongitudinal object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getSekolahId(), (string) $obj->getSemesterId()));
            } // if key === null
            SekolahLongitudinalPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A SekolahLongitudinal object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof SekolahLongitudinal) {
                $key = serialize(array((string) $value->getSekolahId(), (string) $value->getSemesterId()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SekolahLongitudinal object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(SekolahLongitudinalPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   SekolahLongitudinal Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(SekolahLongitudinalPeer::$instances[$key])) {
                return SekolahLongitudinalPeer::$instances[$key];
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
        foreach (SekolahLongitudinalPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        SekolahLongitudinalPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to sekolah_longitudinal
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
        if ($row[$startcol] === null && $row[$startcol + 1] === null) {
            return null;
        }

        return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1]));
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

        return array((string) $row[$startcol], (string) $row[$startcol + 1]);
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
        $cls = SekolahLongitudinalPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = SekolahLongitudinalPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SekolahLongitudinalPeer::addInstanceToPool($obj, $key);
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
     * @return array (SekolahLongitudinal object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = SekolahLongitudinalPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SekolahLongitudinalPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            SekolahLongitudinalPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related LargeObject table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLargeObject(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SertifikasiIso table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSertifikasiIso(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Semester table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSemester(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SumberListrik table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSumberListrik(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related WaktuPenyelenggaraan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinWaktuPenyelenggaraan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related AksesInternetRelatedByAksesInternetId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAksesInternetRelatedByAksesInternetId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related AksesInternetRelatedByAksesInternet2Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAksesInternetRelatedByAksesInternet2Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

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
     * Selects a collection of SekolahLongitudinal objects pre-filled with their LargeObject objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLargeObject(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        LargeObjectPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LargeObjectPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LargeObjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LargeObjectPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to $obj2 (LargeObject)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with their SertifikasiIso objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSertifikasiIso(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        SertifikasiIsoPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SertifikasiIsoPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SertifikasiIsoPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SertifikasiIsoPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SertifikasiIsoPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to $obj2 (SertifikasiIso)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (SekolahLongitudinal) to $obj2 (Sekolah)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with their Semester objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        SemesterPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SemesterPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to $obj2 (Semester)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with their SumberListrik objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSumberListrik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        SumberListrikPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SumberListrikPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SumberListrikPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SumberListrikPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SumberListrikPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to $obj2 (SumberListrik)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with their WaktuPenyelenggaraan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinWaktuPenyelenggaraan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        WaktuPenyelenggaraanPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = WaktuPenyelenggaraanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = WaktuPenyelenggaraanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = WaktuPenyelenggaraanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    WaktuPenyelenggaraanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to $obj2 (WaktuPenyelenggaraan)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with their AksesInternet objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAksesInternetRelatedByAksesInternetId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        AksesInternetPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = AksesInternetPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AksesInternetPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    AksesInternetPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to $obj2 (AksesInternet)
                $obj2->addSekolahLongitudinalRelatedByAksesInternetId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with their AksesInternet objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAksesInternetRelatedByAksesInternet2Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        AksesInternetPeer::addSelectColumns($criteria);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = AksesInternetPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AksesInternetPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    AksesInternetPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to $obj2 (AksesInternet)
                $obj2->addSekolahLongitudinalRelatedByAksesInternet2Id($obj1);

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
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

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
     * Selects a collection of SekolahLongitudinal objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        SertifikasiIsoPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SertifikasiIsoPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        SumberListrikPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SumberListrikPeer::NUM_HYDRATE_COLUMNS;

        WaktuPenyelenggaraanPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + WaktuPenyelenggaraanPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined LargeObject rows

            $key2 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = LargeObjectPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LargeObjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LargeObjectPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj2 (LargeObject)
                $obj2->addSekolahLongitudinal($obj1);
            } // if joined row not null

            // Add objects for joined SertifikasiIso rows

            $key3 = SertifikasiIsoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = SertifikasiIsoPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = SertifikasiIsoPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SertifikasiIsoPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj3 (SertifikasiIso)
                $obj3->addSekolahLongitudinal($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = SekolahPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj4 (Sekolah)
                $obj4->addSekolahLongitudinal($obj1);
            } // if joined row not null

            // Add objects for joined Semester rows

            $key5 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = SemesterPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = SemesterPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SemesterPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj5 (Semester)
                $obj5->addSekolahLongitudinal($obj1);
            } // if joined row not null

            // Add objects for joined SumberListrik rows

            $key6 = SumberListrikPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = SumberListrikPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = SumberListrikPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SumberListrikPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj6 (SumberListrik)
                $obj6->addSekolahLongitudinal($obj1);
            } // if joined row not null

            // Add objects for joined WaktuPenyelenggaraan rows

            $key7 = WaktuPenyelenggaraanPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = WaktuPenyelenggaraanPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = WaktuPenyelenggaraanPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    WaktuPenyelenggaraanPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj7 (WaktuPenyelenggaraan)
                $obj7->addSekolahLongitudinal($obj1);
            } // if joined row not null

            // Add objects for joined AksesInternet rows

            $key8 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = AksesInternetPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = AksesInternetPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    AksesInternetPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj8 (AksesInternet)
                $obj8->addSekolahLongitudinalRelatedByAksesInternetId($obj1);
            } // if joined row not null

            // Add objects for joined AksesInternet rows

            $key9 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol9);
            if ($key9 !== null) {
                $obj9 = AksesInternetPeer::getInstanceFromPool($key9);
                if (!$obj9) {

                    $cls = AksesInternetPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    AksesInternetPeer::addInstanceToPool($obj9, $key9);
                } // if obj9 loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj9 (AksesInternet)
                $obj9->addSekolahLongitudinalRelatedByAksesInternet2Id($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related LargeObject table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLargeObject(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SertifikasiIso table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSertifikasiIso(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Semester table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSemester(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SumberListrik table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSumberListrik(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related WaktuPenyelenggaraan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptWaktuPenyelenggaraan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related AksesInternetRelatedByAksesInternetId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAksesInternetRelatedByAksesInternetId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related AksesInternetRelatedByAksesInternet2Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAksesInternetRelatedByAksesInternet2Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SekolahLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

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
     * Selects a collection of SekolahLongitudinal objects pre-filled with all related objects except LargeObject.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLargeObject(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        SertifikasiIsoPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SertifikasiIsoPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        SumberListrikPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SumberListrikPeer::NUM_HYDRATE_COLUMNS;

        WaktuPenyelenggaraanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + WaktuPenyelenggaraanPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined SertifikasiIso rows

                $key2 = SertifikasiIsoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SertifikasiIsoPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SertifikasiIsoPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SertifikasiIsoPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj2 (SertifikasiIso)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key3 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj3 (Sekolah)
                $obj3->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key4 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SemesterPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SemesterPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj4 (Semester)
                $obj4->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SumberListrik rows

                $key5 = SumberListrikPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SumberListrikPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SumberListrikPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SumberListrikPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj5 (SumberListrik)
                $obj5->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined WaktuPenyelenggaraan rows

                $key6 = WaktuPenyelenggaraanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = WaktuPenyelenggaraanPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = WaktuPenyelenggaraanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    WaktuPenyelenggaraanPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj6 (WaktuPenyelenggaraan)
                $obj6->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined AksesInternet rows

                $key7 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = AksesInternetPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = AksesInternetPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    AksesInternetPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj7 (AksesInternet)
                $obj7->addSekolahLongitudinalRelatedByAksesInternetId($obj1);

            } // if joined row is not null

                // Add objects for joined AksesInternet rows

                $key8 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = AksesInternetPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = AksesInternetPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    AksesInternetPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj8 (AksesInternet)
                $obj8->addSekolahLongitudinalRelatedByAksesInternet2Id($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with all related objects except SertifikasiIso.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSertifikasiIso(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        SumberListrikPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SumberListrikPeer::NUM_HYDRATE_COLUMNS;

        WaktuPenyelenggaraanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + WaktuPenyelenggaraanPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LargeObject rows

                $key2 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LargeObjectPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LargeObjectPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj2 (LargeObject)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key3 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj3 (Sekolah)
                $obj3->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key4 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SemesterPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SemesterPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj4 (Semester)
                $obj4->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SumberListrik rows

                $key5 = SumberListrikPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SumberListrikPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SumberListrikPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SumberListrikPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj5 (SumberListrik)
                $obj5->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined WaktuPenyelenggaraan rows

                $key6 = WaktuPenyelenggaraanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = WaktuPenyelenggaraanPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = WaktuPenyelenggaraanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    WaktuPenyelenggaraanPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj6 (WaktuPenyelenggaraan)
                $obj6->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined AksesInternet rows

                $key7 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = AksesInternetPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = AksesInternetPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    AksesInternetPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj7 (AksesInternet)
                $obj7->addSekolahLongitudinalRelatedByAksesInternetId($obj1);

            } // if joined row is not null

                // Add objects for joined AksesInternet rows

                $key8 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = AksesInternetPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = AksesInternetPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    AksesInternetPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj8 (AksesInternet)
                $obj8->addSekolahLongitudinalRelatedByAksesInternet2Id($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
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
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        SertifikasiIsoPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SertifikasiIsoPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        SumberListrikPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SumberListrikPeer::NUM_HYDRATE_COLUMNS;

        WaktuPenyelenggaraanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + WaktuPenyelenggaraanPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LargeObject rows

                $key2 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LargeObjectPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LargeObjectPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj2 (LargeObject)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SertifikasiIso rows

                $key3 = SertifikasiIsoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SertifikasiIsoPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SertifikasiIsoPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SertifikasiIsoPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj3 (SertifikasiIso)
                $obj3->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key4 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SemesterPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SemesterPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj4 (Semester)
                $obj4->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SumberListrik rows

                $key5 = SumberListrikPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SumberListrikPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SumberListrikPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SumberListrikPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj5 (SumberListrik)
                $obj5->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined WaktuPenyelenggaraan rows

                $key6 = WaktuPenyelenggaraanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = WaktuPenyelenggaraanPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = WaktuPenyelenggaraanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    WaktuPenyelenggaraanPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj6 (WaktuPenyelenggaraan)
                $obj6->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined AksesInternet rows

                $key7 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = AksesInternetPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = AksesInternetPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    AksesInternetPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj7 (AksesInternet)
                $obj7->addSekolahLongitudinalRelatedByAksesInternetId($obj1);

            } // if joined row is not null

                // Add objects for joined AksesInternet rows

                $key8 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = AksesInternetPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = AksesInternetPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    AksesInternetPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj8 (AksesInternet)
                $obj8->addSekolahLongitudinalRelatedByAksesInternet2Id($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with all related objects except Semester.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        SertifikasiIsoPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SertifikasiIsoPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberListrikPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SumberListrikPeer::NUM_HYDRATE_COLUMNS;

        WaktuPenyelenggaraanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + WaktuPenyelenggaraanPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LargeObject rows

                $key2 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LargeObjectPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LargeObjectPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj2 (LargeObject)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SertifikasiIso rows

                $key3 = SertifikasiIsoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SertifikasiIsoPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SertifikasiIsoPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SertifikasiIsoPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj3 (SertifikasiIso)
                $obj3->addSekolahLongitudinal($obj1);

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

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj4 (Sekolah)
                $obj4->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SumberListrik rows

                $key5 = SumberListrikPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SumberListrikPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SumberListrikPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SumberListrikPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj5 (SumberListrik)
                $obj5->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined WaktuPenyelenggaraan rows

                $key6 = WaktuPenyelenggaraanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = WaktuPenyelenggaraanPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = WaktuPenyelenggaraanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    WaktuPenyelenggaraanPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj6 (WaktuPenyelenggaraan)
                $obj6->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined AksesInternet rows

                $key7 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = AksesInternetPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = AksesInternetPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    AksesInternetPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj7 (AksesInternet)
                $obj7->addSekolahLongitudinalRelatedByAksesInternetId($obj1);

            } // if joined row is not null

                // Add objects for joined AksesInternet rows

                $key8 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = AksesInternetPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = AksesInternetPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    AksesInternetPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj8 (AksesInternet)
                $obj8->addSekolahLongitudinalRelatedByAksesInternet2Id($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with all related objects except SumberListrik.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSumberListrik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        SertifikasiIsoPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SertifikasiIsoPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        WaktuPenyelenggaraanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + WaktuPenyelenggaraanPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LargeObject rows

                $key2 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LargeObjectPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LargeObjectPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj2 (LargeObject)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SertifikasiIso rows

                $key3 = SertifikasiIsoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SertifikasiIsoPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SertifikasiIsoPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SertifikasiIsoPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj3 (SertifikasiIso)
                $obj3->addSekolahLongitudinal($obj1);

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

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj4 (Sekolah)
                $obj4->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key5 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SemesterPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SemesterPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj5 (Semester)
                $obj5->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined WaktuPenyelenggaraan rows

                $key6 = WaktuPenyelenggaraanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = WaktuPenyelenggaraanPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = WaktuPenyelenggaraanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    WaktuPenyelenggaraanPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj6 (WaktuPenyelenggaraan)
                $obj6->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined AksesInternet rows

                $key7 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = AksesInternetPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = AksesInternetPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    AksesInternetPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj7 (AksesInternet)
                $obj7->addSekolahLongitudinalRelatedByAksesInternetId($obj1);

            } // if joined row is not null

                // Add objects for joined AksesInternet rows

                $key8 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = AksesInternetPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = AksesInternetPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    AksesInternetPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj8 (AksesInternet)
                $obj8->addSekolahLongitudinalRelatedByAksesInternet2Id($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with all related objects except WaktuPenyelenggaraan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptWaktuPenyelenggaraan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        SertifikasiIsoPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SertifikasiIsoPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        SumberListrikPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SumberListrikPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        AksesInternetPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + AksesInternetPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, AksesInternetPeer::AKSES_INTERNET_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LargeObject rows

                $key2 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LargeObjectPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LargeObjectPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj2 (LargeObject)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SertifikasiIso rows

                $key3 = SertifikasiIsoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SertifikasiIsoPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SertifikasiIsoPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SertifikasiIsoPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj3 (SertifikasiIso)
                $obj3->addSekolahLongitudinal($obj1);

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

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj4 (Sekolah)
                $obj4->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key5 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SemesterPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SemesterPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj5 (Semester)
                $obj5->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SumberListrik rows

                $key6 = SumberListrikPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SumberListrikPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = SumberListrikPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SumberListrikPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj6 (SumberListrik)
                $obj6->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined AksesInternet rows

                $key7 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = AksesInternetPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = AksesInternetPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    AksesInternetPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj7 (AksesInternet)
                $obj7->addSekolahLongitudinalRelatedByAksesInternetId($obj1);

            } // if joined row is not null

                // Add objects for joined AksesInternet rows

                $key8 = AksesInternetPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = AksesInternetPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = AksesInternetPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    AksesInternetPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj8 (AksesInternet)
                $obj8->addSekolahLongitudinalRelatedByAksesInternet2Id($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with all related objects except AksesInternetRelatedByAksesInternetId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAksesInternetRelatedByAksesInternetId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        SertifikasiIsoPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SertifikasiIsoPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        SumberListrikPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SumberListrikPeer::NUM_HYDRATE_COLUMNS;

        WaktuPenyelenggaraanPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + WaktuPenyelenggaraanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LargeObject rows

                $key2 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LargeObjectPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LargeObjectPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj2 (LargeObject)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SertifikasiIso rows

                $key3 = SertifikasiIsoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SertifikasiIsoPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SertifikasiIsoPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SertifikasiIsoPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj3 (SertifikasiIso)
                $obj3->addSekolahLongitudinal($obj1);

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

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj4 (Sekolah)
                $obj4->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key5 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SemesterPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SemesterPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj5 (Semester)
                $obj5->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SumberListrik rows

                $key6 = SumberListrikPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SumberListrikPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = SumberListrikPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SumberListrikPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj6 (SumberListrik)
                $obj6->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined WaktuPenyelenggaraan rows

                $key7 = WaktuPenyelenggaraanPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = WaktuPenyelenggaraanPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = WaktuPenyelenggaraanPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    WaktuPenyelenggaraanPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj7 (WaktuPenyelenggaraan)
                $obj7->addSekolahLongitudinal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SekolahLongitudinal objects pre-filled with all related objects except AksesInternetRelatedByAksesInternet2Id.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SekolahLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAksesInternetRelatedByAksesInternet2Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);
        }

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        SertifikasiIsoPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SertifikasiIsoPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        SumberListrikPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SumberListrikPeer::NUM_HYDRATE_COLUMNS;

        WaktuPenyelenggaraanPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + WaktuPenyelenggaraanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SekolahLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, SertifikasiIsoPeer::SERTIFIKASI_ISO_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, SumberListrikPeer::SUMBER_LISTRIK_ID, $join_behavior);

        $criteria->addJoin(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SekolahLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SekolahLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SekolahLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LargeObject rows

                $key2 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LargeObjectPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LargeObjectPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj2 (LargeObject)
                $obj2->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SertifikasiIso rows

                $key3 = SertifikasiIsoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SertifikasiIsoPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SertifikasiIsoPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SertifikasiIsoPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj3 (SertifikasiIso)
                $obj3->addSekolahLongitudinal($obj1);

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

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj4 (Sekolah)
                $obj4->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key5 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SemesterPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SemesterPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj5 (Semester)
                $obj5->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined SumberListrik rows

                $key6 = SumberListrikPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SumberListrikPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = SumberListrikPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SumberListrikPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj6 (SumberListrik)
                $obj6->addSekolahLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined WaktuPenyelenggaraan rows

                $key7 = WaktuPenyelenggaraanPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = WaktuPenyelenggaraanPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = WaktuPenyelenggaraanPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    WaktuPenyelenggaraanPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (SekolahLongitudinal) to the collection in $obj7 (WaktuPenyelenggaraan)
                $obj7->addSekolahLongitudinal($obj1);

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
        return Propel::getDatabaseMap(SekolahLongitudinalPeer::DATABASE_NAME)->getTable(SekolahLongitudinalPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseSekolahLongitudinalPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseSekolahLongitudinalPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new SekolahLongitudinalTableMap());
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
        return SekolahLongitudinalPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a SekolahLongitudinal or Criteria object.
     *
     * @param      mixed $values Criteria or SekolahLongitudinal object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from SekolahLongitudinal object
        }


        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a SekolahLongitudinal or Criteria object.
     *
     * @param      mixed $values Criteria or SekolahLongitudinal object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(SekolahLongitudinalPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(SekolahLongitudinalPeer::SEKOLAH_ID);
            $value = $criteria->remove(SekolahLongitudinalPeer::SEKOLAH_ID);
            if ($value) {
                $selectCriteria->add(SekolahLongitudinalPeer::SEKOLAH_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(SekolahLongitudinalPeer::SEMESTER_ID);
            $value = $criteria->remove(SekolahLongitudinalPeer::SEMESTER_ID);
            if ($value) {
                $selectCriteria->add(SekolahLongitudinalPeer::SEMESTER_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SekolahLongitudinalPeer::TABLE_NAME);
            }

        } else { // $values is SekolahLongitudinal object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the sekolah_longitudinal table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(SekolahLongitudinalPeer::TABLE_NAME, $con, SekolahLongitudinalPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SekolahLongitudinalPeer::clearInstancePool();
            SekolahLongitudinalPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a SekolahLongitudinal or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or SekolahLongitudinal object or primary key or array of primary keys
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
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            SekolahLongitudinalPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof SekolahLongitudinal) { // it's a model object
            // invalidate the cache for this single object
            SekolahLongitudinalPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SekolahLongitudinalPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(SekolahLongitudinalPeer::SEKOLAH_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(SekolahLongitudinalPeer::SEMESTER_ID, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                SekolahLongitudinalPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(SekolahLongitudinalPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            SekolahLongitudinalPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given SekolahLongitudinal object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      SekolahLongitudinal $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(SekolahLongitudinalPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(SekolahLongitudinalPeer::TABLE_NAME);

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

        return BasePeer::doValidate(SekolahLongitudinalPeer::DATABASE_NAME, SekolahLongitudinalPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $sekolah_id
     * @param   string $semester_id
     * @param      PropelPDO $con
     * @return   SekolahLongitudinal
     */
    public static function retrieveByPK($sekolah_id, $semester_id, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $sekolah_id, (string) $semester_id));
         if (null !== ($obj = SekolahLongitudinalPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(SekolahLongitudinalPeer::DATABASE_NAME);
        $criteria->add(SekolahLongitudinalPeer::SEKOLAH_ID, $sekolah_id);
        $criteria->add(SekolahLongitudinalPeer::SEMESTER_ID, $semester_id);
        $v = SekolahLongitudinalPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseSekolahLongitudinalPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSekolahLongitudinalPeer::buildTableMap();

