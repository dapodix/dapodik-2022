<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\PangkatGolonganPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\RiwayatGajiBerkala;
use DataDikdas\Model\RiwayatGajiBerkalaPeer;
use DataDikdas\Model\map\RiwayatGajiBerkalaTableMap;

/**
 * Base static class for performing query and update operations on the 'riwayat_gaji_berkala' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseRiwayatGajiBerkalaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'riwayat_gaji_berkala';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\RiwayatGajiBerkala';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RiwayatGajiBerkalaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 14;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 14;

    /** the column name for the riwayat_gaji_berkala_id field */
    const RIWAYAT_GAJI_BERKALA_ID = 'riwayat_gaji_berkala.riwayat_gaji_berkala_id';

    /** the column name for the ptk_id field */
    const PTK_ID = 'riwayat_gaji_berkala.ptk_id';

    /** the column name for the pangkat_golongan_id field */
    const PANGKAT_GOLONGAN_ID = 'riwayat_gaji_berkala.pangkat_golongan_id';

    /** the column name for the nomor_sk field */
    const NOMOR_SK = 'riwayat_gaji_berkala.nomor_sk';

    /** the column name for the tanggal_sk field */
    const TANGGAL_SK = 'riwayat_gaji_berkala.tanggal_sk';

    /** the column name for the tmt_kgb field */
    const TMT_KGB = 'riwayat_gaji_berkala.tmt_kgb';

    /** the column name for the masa_kerja_tahun field */
    const MASA_KERJA_TAHUN = 'riwayat_gaji_berkala.masa_kerja_tahun';

    /** the column name for the masa_kerja_bulan field */
    const MASA_KERJA_BULAN = 'riwayat_gaji_berkala.masa_kerja_bulan';

    /** the column name for the gaji_pokok field */
    const GAJI_POKOK = 'riwayat_gaji_berkala.gaji_pokok';

    /** the column name for the create_date field */
    const CREATE_DATE = 'riwayat_gaji_berkala.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'riwayat_gaji_berkala.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'riwayat_gaji_berkala.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'riwayat_gaji_berkala.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'riwayat_gaji_berkala.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of RiwayatGajiBerkala objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array RiwayatGajiBerkala[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RiwayatGajiBerkalaPeer::$fieldNames[RiwayatGajiBerkalaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('RiwayatGajiBerkalaId', 'PtkId', 'PangkatGolonganId', 'NomorSk', 'TanggalSk', 'TmtKgb', 'MasaKerjaTahun', 'MasaKerjaBulan', 'GajiPokok', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('riwayatGajiBerkalaId', 'ptkId', 'pangkatGolonganId', 'nomorSk', 'tanggalSk', 'tmtKgb', 'masaKerjaTahun', 'masaKerjaBulan', 'gajiPokok', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID, RiwayatGajiBerkalaPeer::PTK_ID, RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, RiwayatGajiBerkalaPeer::NOMOR_SK, RiwayatGajiBerkalaPeer::TANGGAL_SK, RiwayatGajiBerkalaPeer::TMT_KGB, RiwayatGajiBerkalaPeer::MASA_KERJA_TAHUN, RiwayatGajiBerkalaPeer::MASA_KERJA_BULAN, RiwayatGajiBerkalaPeer::GAJI_POKOK, RiwayatGajiBerkalaPeer::CREATE_DATE, RiwayatGajiBerkalaPeer::LAST_UPDATE, RiwayatGajiBerkalaPeer::SOFT_DELETE, RiwayatGajiBerkalaPeer::LAST_SYNC, RiwayatGajiBerkalaPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('RIWAYAT_GAJI_BERKALA_ID', 'PTK_ID', 'PANGKAT_GOLONGAN_ID', 'NOMOR_SK', 'TANGGAL_SK', 'TMT_KGB', 'MASA_KERJA_TAHUN', 'MASA_KERJA_BULAN', 'GAJI_POKOK', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('riwayat_gaji_berkala_id', 'ptk_id', 'pangkat_golongan_id', 'nomor_sk', 'tanggal_sk', 'tmt_kgb', 'masa_kerja_tahun', 'masa_kerja_bulan', 'gaji_pokok', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RiwayatGajiBerkalaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('RiwayatGajiBerkalaId' => 0, 'PtkId' => 1, 'PangkatGolonganId' => 2, 'NomorSk' => 3, 'TanggalSk' => 4, 'TmtKgb' => 5, 'MasaKerjaTahun' => 6, 'MasaKerjaBulan' => 7, 'GajiPokok' => 8, 'CreateDate' => 9, 'LastUpdate' => 10, 'SoftDelete' => 11, 'LastSync' => 12, 'UpdaterId' => 13, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('riwayatGajiBerkalaId' => 0, 'ptkId' => 1, 'pangkatGolonganId' => 2, 'nomorSk' => 3, 'tanggalSk' => 4, 'tmtKgb' => 5, 'masaKerjaTahun' => 6, 'masaKerjaBulan' => 7, 'gajiPokok' => 8, 'createDate' => 9, 'lastUpdate' => 10, 'softDelete' => 11, 'lastSync' => 12, 'updaterId' => 13, ),
        BasePeer::TYPE_COLNAME => array (RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID => 0, RiwayatGajiBerkalaPeer::PTK_ID => 1, RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID => 2, RiwayatGajiBerkalaPeer::NOMOR_SK => 3, RiwayatGajiBerkalaPeer::TANGGAL_SK => 4, RiwayatGajiBerkalaPeer::TMT_KGB => 5, RiwayatGajiBerkalaPeer::MASA_KERJA_TAHUN => 6, RiwayatGajiBerkalaPeer::MASA_KERJA_BULAN => 7, RiwayatGajiBerkalaPeer::GAJI_POKOK => 8, RiwayatGajiBerkalaPeer::CREATE_DATE => 9, RiwayatGajiBerkalaPeer::LAST_UPDATE => 10, RiwayatGajiBerkalaPeer::SOFT_DELETE => 11, RiwayatGajiBerkalaPeer::LAST_SYNC => 12, RiwayatGajiBerkalaPeer::UPDATER_ID => 13, ),
        BasePeer::TYPE_RAW_COLNAME => array ('RIWAYAT_GAJI_BERKALA_ID' => 0, 'PTK_ID' => 1, 'PANGKAT_GOLONGAN_ID' => 2, 'NOMOR_SK' => 3, 'TANGGAL_SK' => 4, 'TMT_KGB' => 5, 'MASA_KERJA_TAHUN' => 6, 'MASA_KERJA_BULAN' => 7, 'GAJI_POKOK' => 8, 'CREATE_DATE' => 9, 'LAST_UPDATE' => 10, 'SOFT_DELETE' => 11, 'LAST_SYNC' => 12, 'UPDATER_ID' => 13, ),
        BasePeer::TYPE_FIELDNAME => array ('riwayat_gaji_berkala_id' => 0, 'ptk_id' => 1, 'pangkat_golongan_id' => 2, 'nomor_sk' => 3, 'tanggal_sk' => 4, 'tmt_kgb' => 5, 'masa_kerja_tahun' => 6, 'masa_kerja_bulan' => 7, 'gaji_pokok' => 8, 'create_date' => 9, 'last_update' => 10, 'soft_delete' => 11, 'last_sync' => 12, 'updater_id' => 13, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $toNames = RiwayatGajiBerkalaPeer::getFieldNames($toType);
        $key = isset(RiwayatGajiBerkalaPeer::$fieldKeys[$fromType][$name]) ? RiwayatGajiBerkalaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RiwayatGajiBerkalaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RiwayatGajiBerkalaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RiwayatGajiBerkalaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RiwayatGajiBerkalaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RiwayatGajiBerkalaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::PTK_ID);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::NOMOR_SK);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::TANGGAL_SK);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::TMT_KGB);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::MASA_KERJA_TAHUN);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::MASA_KERJA_BULAN);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::GAJI_POKOK);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::CREATE_DATE);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::LAST_UPDATE);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::SOFT_DELETE);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::LAST_SYNC);
            $criteria->addSelectColumn(RiwayatGajiBerkalaPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.riwayat_gaji_berkala_id');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.pangkat_golongan_id');
            $criteria->addSelectColumn($alias . '.nomor_sk');
            $criteria->addSelectColumn($alias . '.tanggal_sk');
            $criteria->addSelectColumn($alias . '.tmt_kgb');
            $criteria->addSelectColumn($alias . '.masa_kerja_tahun');
            $criteria->addSelectColumn($alias . '.masa_kerja_bulan');
            $criteria->addSelectColumn($alias . '.gaji_pokok');
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
        $criteria->setPrimaryTableName(RiwayatGajiBerkalaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RiwayatGajiBerkalaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RiwayatGajiBerkala
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RiwayatGajiBerkalaPeer::doSelect($critcopy, $con);
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
        return RiwayatGajiBerkalaPeer::populateObjects(RiwayatGajiBerkalaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RiwayatGajiBerkalaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);

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
     * @param      RiwayatGajiBerkala $obj A RiwayatGajiBerkala object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getRiwayatGajiBerkalaId();
            } // if key === null
            RiwayatGajiBerkalaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A RiwayatGajiBerkala object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof RiwayatGajiBerkala) {
                $key = (string) $value->getRiwayatGajiBerkalaId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RiwayatGajiBerkala object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RiwayatGajiBerkalaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   RiwayatGajiBerkala Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RiwayatGajiBerkalaPeer::$instances[$key])) {
                return RiwayatGajiBerkalaPeer::$instances[$key];
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
        foreach (RiwayatGajiBerkalaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RiwayatGajiBerkalaPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to riwayat_gaji_berkala
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
        $cls = RiwayatGajiBerkalaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RiwayatGajiBerkalaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RiwayatGajiBerkalaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RiwayatGajiBerkalaPeer::addInstanceToPool($obj, $key);
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
     * @return array (RiwayatGajiBerkala object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RiwayatGajiBerkalaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RiwayatGajiBerkalaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RiwayatGajiBerkalaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RiwayatGajiBerkalaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RiwayatGajiBerkalaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(RiwayatGajiBerkalaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RiwayatGajiBerkalaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RiwayatGajiBerkalaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PangkatGolongan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPangkatGolongan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RiwayatGajiBerkalaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RiwayatGajiBerkalaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

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
     * Selects a collection of RiwayatGajiBerkala objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RiwayatGajiBerkala objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);
        }

        RiwayatGajiBerkalaPeer::addSelectColumns($criteria);
        $startcol = RiwayatGajiBerkalaPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(RiwayatGajiBerkalaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RiwayatGajiBerkalaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RiwayatGajiBerkalaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RiwayatGajiBerkalaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RiwayatGajiBerkalaPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RiwayatGajiBerkala) to $obj2 (Ptk)
                $obj2->addRiwayatGajiBerkala($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RiwayatGajiBerkala objects pre-filled with their PangkatGolongan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RiwayatGajiBerkala objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPangkatGolongan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);
        }

        RiwayatGajiBerkalaPeer::addSelectColumns($criteria);
        $startcol = RiwayatGajiBerkalaPeer::NUM_HYDRATE_COLUMNS;
        PangkatGolonganPeer::addSelectColumns($criteria);

        $criteria->addJoin(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RiwayatGajiBerkalaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RiwayatGajiBerkalaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RiwayatGajiBerkalaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RiwayatGajiBerkalaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PangkatGolonganPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PangkatGolonganPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PangkatGolonganPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RiwayatGajiBerkala) to $obj2 (PangkatGolongan)
                $obj2->addRiwayatGajiBerkala($obj1);

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
        $criteria->setPrimaryTableName(RiwayatGajiBerkalaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RiwayatGajiBerkalaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RiwayatGajiBerkalaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

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
     * Selects a collection of RiwayatGajiBerkala objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RiwayatGajiBerkala objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);
        }

        RiwayatGajiBerkalaPeer::addSelectColumns($criteria);
        $startcol2 = RiwayatGajiBerkalaPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RiwayatGajiBerkalaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RiwayatGajiBerkalaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RiwayatGajiBerkalaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RiwayatGajiBerkalaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RiwayatGajiBerkalaPeer::addInstanceToPool($obj1, $key1);
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
                } // if obj2 loaded

                // Add the $obj1 (RiwayatGajiBerkala) to the collection in $obj2 (Ptk)
                $obj2->addRiwayatGajiBerkala($obj1);
            } // if joined row not null

            // Add objects for joined PangkatGolongan rows

            $key3 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PangkatGolonganPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PangkatGolonganPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PangkatGolonganPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (RiwayatGajiBerkala) to the collection in $obj3 (PangkatGolongan)
                $obj3->addRiwayatGajiBerkala($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
        $criteria->setPrimaryTableName(RiwayatGajiBerkalaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RiwayatGajiBerkalaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PangkatGolongan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPangkatGolongan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RiwayatGajiBerkalaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RiwayatGajiBerkalaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RiwayatGajiBerkalaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Selects a collection of RiwayatGajiBerkala objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RiwayatGajiBerkala objects.
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
            $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);
        }

        RiwayatGajiBerkalaPeer::addSelectColumns($criteria);
        $startcol2 = RiwayatGajiBerkalaPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RiwayatGajiBerkalaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RiwayatGajiBerkalaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RiwayatGajiBerkalaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RiwayatGajiBerkalaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined PangkatGolongan rows

                $key2 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PangkatGolonganPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PangkatGolonganPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RiwayatGajiBerkala) to the collection in $obj2 (PangkatGolongan)
                $obj2->addRiwayatGajiBerkala($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RiwayatGajiBerkala objects pre-filled with all related objects except PangkatGolongan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RiwayatGajiBerkala objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPangkatGolongan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);
        }

        RiwayatGajiBerkalaPeer::addSelectColumns($criteria);
        $startcol2 = RiwayatGajiBerkalaPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RiwayatGajiBerkalaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RiwayatGajiBerkalaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RiwayatGajiBerkalaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RiwayatGajiBerkalaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RiwayatGajiBerkalaPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RiwayatGajiBerkala) to the collection in $obj2 (Ptk)
                $obj2->addRiwayatGajiBerkala($obj1);

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
        return Propel::getDatabaseMap(RiwayatGajiBerkalaPeer::DATABASE_NAME)->getTable(RiwayatGajiBerkalaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRiwayatGajiBerkalaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRiwayatGajiBerkalaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RiwayatGajiBerkalaTableMap());
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
        return RiwayatGajiBerkalaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a RiwayatGajiBerkala or Criteria object.
     *
     * @param      mixed $values Criteria or RiwayatGajiBerkala object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from RiwayatGajiBerkala object
        }


        // Set the correct dbName
        $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a RiwayatGajiBerkala or Criteria object.
     *
     * @param      mixed $values Criteria or RiwayatGajiBerkala object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RiwayatGajiBerkalaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID);
            $value = $criteria->remove(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID);
            if ($value) {
                $selectCriteria->add(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RiwayatGajiBerkalaPeer::TABLE_NAME);
            }

        } else { // $values is RiwayatGajiBerkala object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the riwayat_gaji_berkala table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RiwayatGajiBerkalaPeer::TABLE_NAME, $con, RiwayatGajiBerkalaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RiwayatGajiBerkalaPeer::clearInstancePool();
            RiwayatGajiBerkalaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a RiwayatGajiBerkala or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or RiwayatGajiBerkala object or primary key or array of primary keys
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
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RiwayatGajiBerkalaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof RiwayatGajiBerkala) { // it's a model object
            // invalidate the cache for this single object
            RiwayatGajiBerkalaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RiwayatGajiBerkalaPeer::DATABASE_NAME);
            $criteria->add(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                RiwayatGajiBerkalaPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RiwayatGajiBerkalaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            RiwayatGajiBerkalaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given RiwayatGajiBerkala object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      RiwayatGajiBerkala $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RiwayatGajiBerkalaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RiwayatGajiBerkalaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(RiwayatGajiBerkalaPeer::DATABASE_NAME, RiwayatGajiBerkalaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return RiwayatGajiBerkala
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RiwayatGajiBerkalaPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RiwayatGajiBerkalaPeer::DATABASE_NAME);
        $criteria->add(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID, $pk);

        $v = RiwayatGajiBerkalaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return RiwayatGajiBerkala[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RiwayatGajiBerkalaPeer::DATABASE_NAME);
            $criteria->add(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID, $pks, Criteria::IN);
            $objs = RiwayatGajiBerkalaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRiwayatGajiBerkalaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRiwayatGajiBerkalaPeer::buildTableMap();

