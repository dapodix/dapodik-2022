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
use DataDikdas\Model\JenisSertifikasiPeer;
use DataDikdas\Model\LembSertifikasiPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\RwySertifikasi;
use DataDikdas\Model\RwySertifikasiPeer;
use DataDikdas\Model\map\RwySertifikasiTableMap;

/**
 * Base static class for performing query and update operations on the 'rwy_sertifikasi' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseRwySertifikasiPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'rwy_sertifikasi';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\RwySertifikasi';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RwySertifikasiTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 17;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 17;

    /** the column name for the riwayat_sertifikasi_id field */
    const RIWAYAT_SERTIFIKASI_ID = 'rwy_sertifikasi.riwayat_sertifikasi_id';

    /** the column name for the kode_lemb_sert field */
    const KODE_LEMB_SERT = 'rwy_sertifikasi.kode_lemb_sert';

    /** the column name for the ptk_id field */
    const PTK_ID = 'rwy_sertifikasi.ptk_id';

    /** the column name for the bidang_studi_id field */
    const BIDANG_STUDI_ID = 'rwy_sertifikasi.bidang_studi_id';

    /** the column name for the id_jenis_sertifikasi field */
    const ID_JENIS_SERTIFIKASI = 'rwy_sertifikasi.id_jenis_sertifikasi';

    /** the column name for the tgl_sert field */
    const TGL_SERT = 'rwy_sertifikasi.tgl_sert';

    /** the column name for the tgl_exp_sert field */
    const TGL_EXP_SERT = 'rwy_sertifikasi.tgl_exp_sert';

    /** the column name for the nomor_sertifikat field */
    const NOMOR_SERTIFIKAT = 'rwy_sertifikasi.nomor_sertifikat';

    /** the column name for the nomer_registrasi field */
    const NOMER_REGISTRASI = 'rwy_sertifikasi.nomer_registrasi';

    /** the column name for the nomor_peserta field */
    const NOMOR_PESERTA = 'rwy_sertifikasi.nomor_peserta';

    /** the column name for the kualifikasi field */
    const KUALIFIKASI = 'rwy_sertifikasi.kualifikasi';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'rwy_sertifikasi.asal_data';

    /** the column name for the create_date field */
    const CREATE_DATE = 'rwy_sertifikasi.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'rwy_sertifikasi.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'rwy_sertifikasi.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'rwy_sertifikasi.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'rwy_sertifikasi.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of RwySertifikasi objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array RwySertifikasi[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RwySertifikasiPeer::$fieldNames[RwySertifikasiPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('RiwayatSertifikasiId', 'KodeLembSert', 'PtkId', 'BidangStudiId', 'IdJenisSertifikasi', 'TglSert', 'TglExpSert', 'NomorSertifikat', 'NomerRegistrasi', 'NomorPeserta', 'Kualifikasi', 'AsalData', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('riwayatSertifikasiId', 'kodeLembSert', 'ptkId', 'bidangStudiId', 'idJenisSertifikasi', 'tglSert', 'tglExpSert', 'nomorSertifikat', 'nomerRegistrasi', 'nomorPeserta', 'kualifikasi', 'asalData', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID, RwySertifikasiPeer::KODE_LEMB_SERT, RwySertifikasiPeer::PTK_ID, RwySertifikasiPeer::BIDANG_STUDI_ID, RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, RwySertifikasiPeer::TGL_SERT, RwySertifikasiPeer::TGL_EXP_SERT, RwySertifikasiPeer::NOMOR_SERTIFIKAT, RwySertifikasiPeer::NOMER_REGISTRASI, RwySertifikasiPeer::NOMOR_PESERTA, RwySertifikasiPeer::KUALIFIKASI, RwySertifikasiPeer::ASAL_DATA, RwySertifikasiPeer::CREATE_DATE, RwySertifikasiPeer::LAST_UPDATE, RwySertifikasiPeer::SOFT_DELETE, RwySertifikasiPeer::LAST_SYNC, RwySertifikasiPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('RIWAYAT_SERTIFIKASI_ID', 'KODE_LEMB_SERT', 'PTK_ID', 'BIDANG_STUDI_ID', 'ID_JENIS_SERTIFIKASI', 'TGL_SERT', 'TGL_EXP_SERT', 'NOMOR_SERTIFIKAT', 'NOMER_REGISTRASI', 'NOMOR_PESERTA', 'KUALIFIKASI', 'ASAL_DATA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('riwayat_sertifikasi_id', 'kode_lemb_sert', 'ptk_id', 'bidang_studi_id', 'id_jenis_sertifikasi', 'tgl_sert', 'tgl_exp_sert', 'nomor_sertifikat', 'nomer_registrasi', 'nomor_peserta', 'kualifikasi', 'asal_data', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RwySertifikasiPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('RiwayatSertifikasiId' => 0, 'KodeLembSert' => 1, 'PtkId' => 2, 'BidangStudiId' => 3, 'IdJenisSertifikasi' => 4, 'TglSert' => 5, 'TglExpSert' => 6, 'NomorSertifikat' => 7, 'NomerRegistrasi' => 8, 'NomorPeserta' => 9, 'Kualifikasi' => 10, 'AsalData' => 11, 'CreateDate' => 12, 'LastUpdate' => 13, 'SoftDelete' => 14, 'LastSync' => 15, 'UpdaterId' => 16, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('riwayatSertifikasiId' => 0, 'kodeLembSert' => 1, 'ptkId' => 2, 'bidangStudiId' => 3, 'idJenisSertifikasi' => 4, 'tglSert' => 5, 'tglExpSert' => 6, 'nomorSertifikat' => 7, 'nomerRegistrasi' => 8, 'nomorPeserta' => 9, 'kualifikasi' => 10, 'asalData' => 11, 'createDate' => 12, 'lastUpdate' => 13, 'softDelete' => 14, 'lastSync' => 15, 'updaterId' => 16, ),
        BasePeer::TYPE_COLNAME => array (RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID => 0, RwySertifikasiPeer::KODE_LEMB_SERT => 1, RwySertifikasiPeer::PTK_ID => 2, RwySertifikasiPeer::BIDANG_STUDI_ID => 3, RwySertifikasiPeer::ID_JENIS_SERTIFIKASI => 4, RwySertifikasiPeer::TGL_SERT => 5, RwySertifikasiPeer::TGL_EXP_SERT => 6, RwySertifikasiPeer::NOMOR_SERTIFIKAT => 7, RwySertifikasiPeer::NOMER_REGISTRASI => 8, RwySertifikasiPeer::NOMOR_PESERTA => 9, RwySertifikasiPeer::KUALIFIKASI => 10, RwySertifikasiPeer::ASAL_DATA => 11, RwySertifikasiPeer::CREATE_DATE => 12, RwySertifikasiPeer::LAST_UPDATE => 13, RwySertifikasiPeer::SOFT_DELETE => 14, RwySertifikasiPeer::LAST_SYNC => 15, RwySertifikasiPeer::UPDATER_ID => 16, ),
        BasePeer::TYPE_RAW_COLNAME => array ('RIWAYAT_SERTIFIKASI_ID' => 0, 'KODE_LEMB_SERT' => 1, 'PTK_ID' => 2, 'BIDANG_STUDI_ID' => 3, 'ID_JENIS_SERTIFIKASI' => 4, 'TGL_SERT' => 5, 'TGL_EXP_SERT' => 6, 'NOMOR_SERTIFIKAT' => 7, 'NOMER_REGISTRASI' => 8, 'NOMOR_PESERTA' => 9, 'KUALIFIKASI' => 10, 'ASAL_DATA' => 11, 'CREATE_DATE' => 12, 'LAST_UPDATE' => 13, 'SOFT_DELETE' => 14, 'LAST_SYNC' => 15, 'UPDATER_ID' => 16, ),
        BasePeer::TYPE_FIELDNAME => array ('riwayat_sertifikasi_id' => 0, 'kode_lemb_sert' => 1, 'ptk_id' => 2, 'bidang_studi_id' => 3, 'id_jenis_sertifikasi' => 4, 'tgl_sert' => 5, 'tgl_exp_sert' => 6, 'nomor_sertifikat' => 7, 'nomer_registrasi' => 8, 'nomor_peserta' => 9, 'kualifikasi' => 10, 'asal_data' => 11, 'create_date' => 12, 'last_update' => 13, 'soft_delete' => 14, 'last_sync' => 15, 'updater_id' => 16, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $toNames = RwySertifikasiPeer::getFieldNames($toType);
        $key = isset(RwySertifikasiPeer::$fieldKeys[$fromType][$name]) ? RwySertifikasiPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RwySertifikasiPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RwySertifikasiPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RwySertifikasiPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RwySertifikasiPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RwySertifikasiPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID);
            $criteria->addSelectColumn(RwySertifikasiPeer::KODE_LEMB_SERT);
            $criteria->addSelectColumn(RwySertifikasiPeer::PTK_ID);
            $criteria->addSelectColumn(RwySertifikasiPeer::BIDANG_STUDI_ID);
            $criteria->addSelectColumn(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI);
            $criteria->addSelectColumn(RwySertifikasiPeer::TGL_SERT);
            $criteria->addSelectColumn(RwySertifikasiPeer::TGL_EXP_SERT);
            $criteria->addSelectColumn(RwySertifikasiPeer::NOMOR_SERTIFIKAT);
            $criteria->addSelectColumn(RwySertifikasiPeer::NOMER_REGISTRASI);
            $criteria->addSelectColumn(RwySertifikasiPeer::NOMOR_PESERTA);
            $criteria->addSelectColumn(RwySertifikasiPeer::KUALIFIKASI);
            $criteria->addSelectColumn(RwySertifikasiPeer::ASAL_DATA);
            $criteria->addSelectColumn(RwySertifikasiPeer::CREATE_DATE);
            $criteria->addSelectColumn(RwySertifikasiPeer::LAST_UPDATE);
            $criteria->addSelectColumn(RwySertifikasiPeer::SOFT_DELETE);
            $criteria->addSelectColumn(RwySertifikasiPeer::LAST_SYNC);
            $criteria->addSelectColumn(RwySertifikasiPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.riwayat_sertifikasi_id');
            $criteria->addSelectColumn($alias . '.kode_lemb_sert');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.bidang_studi_id');
            $criteria->addSelectColumn($alias . '.id_jenis_sertifikasi');
            $criteria->addSelectColumn($alias . '.tgl_sert');
            $criteria->addSelectColumn($alias . '.tgl_exp_sert');
            $criteria->addSelectColumn($alias . '.nomor_sertifikat');
            $criteria->addSelectColumn($alias . '.nomer_registrasi');
            $criteria->addSelectColumn($alias . '.nomor_peserta');
            $criteria->addSelectColumn($alias . '.kualifikasi');
            $criteria->addSelectColumn($alias . '.asal_data');
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
        $criteria->setPrimaryTableName(RwySertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwySertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RwySertifikasi
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RwySertifikasiPeer::doSelect($critcopy, $con);
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
        return RwySertifikasiPeer::populateObjects(RwySertifikasiPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RwySertifikasiPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

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
     * @param      RwySertifikasi $obj A RwySertifikasi object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getRiwayatSertifikasiId();
            } // if key === null
            RwySertifikasiPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A RwySertifikasi object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof RwySertifikasi) {
                $key = (string) $value->getRiwayatSertifikasiId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RwySertifikasi object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RwySertifikasiPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   RwySertifikasi Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RwySertifikasiPeer::$instances[$key])) {
                return RwySertifikasiPeer::$instances[$key];
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
        foreach (RwySertifikasiPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RwySertifikasiPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to rwy_sertifikasi
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
        $cls = RwySertifikasiPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RwySertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RwySertifikasiPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RwySertifikasiPeer::addInstanceToPool($obj, $key);
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
     * @return array (RwySertifikasi object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RwySertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RwySertifikasiPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RwySertifikasiPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RwySertifikasiPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RwySertifikasiPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(RwySertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwySertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwySertifikasiPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisSertifikasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisSertifikasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwySertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwySertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

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
        $criteria->setPrimaryTableName(RwySertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwySertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwySertifikasiPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LembSertifikasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLembSertifikasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwySertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwySertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwySertifikasiPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

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
     * Selects a collection of RwySertifikasi objects pre-filled with their BidangStudi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwySertifikasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBidangStudi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);
        }

        RwySertifikasiPeer::addSelectColumns($criteria);
        $startcol = RwySertifikasiPeer::NUM_HYDRATE_COLUMNS;
        BidangStudiPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwySertifikasiPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwySertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwySertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwySertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwySertifikasiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwySertifikasi) to $obj2 (BidangStudi)
                $obj2->addRwySertifikasi($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwySertifikasi objects pre-filled with their JenisSertifikasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwySertifikasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisSertifikasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);
        }

        RwySertifikasiPeer::addSelectColumns($criteria);
        $startcol = RwySertifikasiPeer::NUM_HYDRATE_COLUMNS;
        JenisSertifikasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwySertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwySertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwySertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwySertifikasiPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisSertifikasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisSertifikasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisSertifikasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RwySertifikasi) to $obj2 (JenisSertifikasi)
                $obj2->addRwySertifikasi($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwySertifikasi objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwySertifikasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);
        }

        RwySertifikasiPeer::addSelectColumns($criteria);
        $startcol = RwySertifikasiPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwySertifikasiPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwySertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwySertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwySertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwySertifikasiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwySertifikasi) to $obj2 (Ptk)
                $obj2->addRwySertifikasi($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwySertifikasi objects pre-filled with their LembSertifikasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwySertifikasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLembSertifikasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);
        }

        RwySertifikasiPeer::addSelectColumns($criteria);
        $startcol = RwySertifikasiPeer::NUM_HYDRATE_COLUMNS;
        LembSertifikasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwySertifikasiPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwySertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwySertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwySertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwySertifikasiPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LembSertifikasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LembSertifikasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LembSertifikasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RwySertifikasi) to $obj2 (LembSertifikasi)
                $obj2->addRwySertifikasi($obj1);

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
        $criteria->setPrimaryTableName(RwySertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwySertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwySertifikasiPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

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
     * Selects a collection of RwySertifikasi objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwySertifikasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);
        }

        RwySertifikasiPeer::addSelectColumns($criteria);
        $startcol2 = RwySertifikasiPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenisSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PtkPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwySertifikasiPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwySertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwySertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwySertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwySertifikasiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwySertifikasi) to the collection in $obj2 (BidangStudi)
                $obj2->addRwySertifikasi($obj1);
            } // if joined row not null

            // Add objects for joined JenisSertifikasi rows

            $key3 = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JenisSertifikasiPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JenisSertifikasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisSertifikasiPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (RwySertifikasi) to the collection in $obj3 (JenisSertifikasi)
                $obj3->addRwySertifikasi($obj1);
            } // if joined row not null

            // Add objects for joined Ptk rows

            $key4 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = PtkPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = PtkPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PtkPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (RwySertifikasi) to the collection in $obj4 (Ptk)
                $obj4->addRwySertifikasi($obj1);
            } // if joined row not null

            // Add objects for joined LembSertifikasi rows

            $key5 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = LembSertifikasiPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = LembSertifikasiPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    LembSertifikasiPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (RwySertifikasi) to the collection in $obj5 (LembSertifikasi)
                $obj5->addRwySertifikasi($obj1);
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
        $criteria->setPrimaryTableName(RwySertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwySertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisSertifikasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisSertifikasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwySertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwySertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwySertifikasiPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

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
        $criteria->setPrimaryTableName(RwySertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwySertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwySertifikasiPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LembSertifikasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLembSertifikasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwySertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwySertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwySertifikasiPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Selects a collection of RwySertifikasi objects pre-filled with all related objects except BidangStudi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwySertifikasi objects.
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
            $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);
        }

        RwySertifikasiPeer::addSelectColumns($criteria);
        $startcol2 = RwySertifikasiPeer::NUM_HYDRATE_COLUMNS;

        JenisSertifikasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwySertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwySertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwySertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwySertifikasiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisSertifikasi rows

                $key2 = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisSertifikasiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisSertifikasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisSertifikasiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RwySertifikasi) to the collection in $obj2 (JenisSertifikasi)
                $obj2->addRwySertifikasi($obj1);

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

                // Add the $obj1 (RwySertifikasi) to the collection in $obj3 (Ptk)
                $obj3->addRwySertifikasi($obj1);

            } // if joined row is not null

                // Add objects for joined LembSertifikasi rows

                $key4 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LembSertifikasiPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LembSertifikasiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembSertifikasiPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwySertifikasi) to the collection in $obj4 (LembSertifikasi)
                $obj4->addRwySertifikasi($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwySertifikasi objects pre-filled with all related objects except JenisSertifikasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwySertifikasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisSertifikasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);
        }

        RwySertifikasiPeer::addSelectColumns($criteria);
        $startcol2 = RwySertifikasiPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwySertifikasiPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwySertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwySertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwySertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwySertifikasiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwySertifikasi) to the collection in $obj2 (BidangStudi)
                $obj2->addRwySertifikasi($obj1);

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

                // Add the $obj1 (RwySertifikasi) to the collection in $obj3 (Ptk)
                $obj3->addRwySertifikasi($obj1);

            } // if joined row is not null

                // Add objects for joined LembSertifikasi rows

                $key4 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LembSertifikasiPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LembSertifikasiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembSertifikasiPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwySertifikasi) to the collection in $obj4 (LembSertifikasi)
                $obj4->addRwySertifikasi($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwySertifikasi objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwySertifikasi objects.
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
            $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);
        }

        RwySertifikasiPeer::addSelectColumns($criteria);
        $startcol2 = RwySertifikasiPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenisSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwySertifikasiPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwySertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwySertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwySertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwySertifikasiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwySertifikasi) to the collection in $obj2 (BidangStudi)
                $obj2->addRwySertifikasi($obj1);

            } // if joined row is not null

                // Add objects for joined JenisSertifikasi rows

                $key3 = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisSertifikasiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisSertifikasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisSertifikasiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RwySertifikasi) to the collection in $obj3 (JenisSertifikasi)
                $obj3->addRwySertifikasi($obj1);

            } // if joined row is not null

                // Add objects for joined LembSertifikasi rows

                $key4 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LembSertifikasiPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LembSertifikasiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembSertifikasiPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwySertifikasi) to the collection in $obj4 (LembSertifikasi)
                $obj4->addRwySertifikasi($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwySertifikasi objects pre-filled with all related objects except LembSertifikasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwySertifikasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLembSertifikasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);
        }

        RwySertifikasiPeer::addSelectColumns($criteria);
        $startcol2 = RwySertifikasiPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenisSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PtkPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwySertifikasiPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(RwySertifikasiPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwySertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwySertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwySertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwySertifikasiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwySertifikasi) to the collection in $obj2 (BidangStudi)
                $obj2->addRwySertifikasi($obj1);

            } // if joined row is not null

                // Add objects for joined JenisSertifikasi rows

                $key3 = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisSertifikasiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisSertifikasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisSertifikasiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RwySertifikasi) to the collection in $obj3 (JenisSertifikasi)
                $obj3->addRwySertifikasi($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key4 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PtkPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PtkPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwySertifikasi) to the collection in $obj4 (Ptk)
                $obj4->addRwySertifikasi($obj1);

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
        return Propel::getDatabaseMap(RwySertifikasiPeer::DATABASE_NAME)->getTable(RwySertifikasiPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRwySertifikasiPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRwySertifikasiPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RwySertifikasiTableMap());
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
        return RwySertifikasiPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a RwySertifikasi or Criteria object.
     *
     * @param      mixed $values Criteria or RwySertifikasi object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from RwySertifikasi object
        }


        // Set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a RwySertifikasi or Criteria object.
     *
     * @param      mixed $values Criteria or RwySertifikasi object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RwySertifikasiPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID);
            $value = $criteria->remove(RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID);
            if ($value) {
                $selectCriteria->add(RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RwySertifikasiPeer::TABLE_NAME);
            }

        } else { // $values is RwySertifikasi object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the rwy_sertifikasi table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RwySertifikasiPeer::TABLE_NAME, $con, RwySertifikasiPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RwySertifikasiPeer::clearInstancePool();
            RwySertifikasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a RwySertifikasi or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or RwySertifikasi object or primary key or array of primary keys
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
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RwySertifikasiPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof RwySertifikasi) { // it's a model object
            // invalidate the cache for this single object
            RwySertifikasiPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RwySertifikasiPeer::DATABASE_NAME);
            $criteria->add(RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                RwySertifikasiPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RwySertifikasiPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            RwySertifikasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given RwySertifikasi object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      RwySertifikasi $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RwySertifikasiPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RwySertifikasiPeer::TABLE_NAME);

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

        return BasePeer::doValidate(RwySertifikasiPeer::DATABASE_NAME, RwySertifikasiPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return RwySertifikasi
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RwySertifikasiPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RwySertifikasiPeer::DATABASE_NAME);
        $criteria->add(RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID, $pk);

        $v = RwySertifikasiPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return RwySertifikasi[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RwySertifikasiPeer::DATABASE_NAME);
            $criteria->add(RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID, $pks, Criteria::IN);
            $objs = RwySertifikasiPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRwySertifikasiPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRwySertifikasiPeer::buildTableMap();

