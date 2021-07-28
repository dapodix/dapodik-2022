<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BidangStudi;
use DataDikdas\Model\BidangStudiPeer;
use DataDikdas\Model\map\BidangStudiTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.bidang_studi' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseBidangStudiPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.bidang_studi';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\BidangStudi';

    /** the related TableMap class for this table */
    const TM_CLASS = 'BidangStudiTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 17;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 17;

    /** the column name for the bidang_studi_id field */
    const BIDANG_STUDI_ID = 'ref.bidang_studi.bidang_studi_id';

    /** the column name for the kelompok_bidang_studi_id field */
    const KELOMPOK_BIDANG_STUDI_ID = 'ref.bidang_studi.kelompok_bidang_studi_id';

    /** the column name for the kode field */
    const KODE = 'ref.bidang_studi.kode';

    /** the column name for the bidang_studi field */
    const BIDANG_STUDI = 'ref.bidang_studi.bidang_studi';

    /** the column name for the kelompok field */
    const KELOMPOK = 'ref.bidang_studi.kelompok';

    /** the column name for the jenjang_paud field */
    const JENJANG_PAUD = 'ref.bidang_studi.jenjang_paud';

    /** the column name for the jenjang_tk field */
    const JENJANG_TK = 'ref.bidang_studi.jenjang_tk';

    /** the column name for the jenjang_sd field */
    const JENJANG_SD = 'ref.bidang_studi.jenjang_sd';

    /** the column name for the jenjang_smp field */
    const JENJANG_SMP = 'ref.bidang_studi.jenjang_smp';

    /** the column name for the jenjang_sma field */
    const JENJANG_SMA = 'ref.bidang_studi.jenjang_sma';

    /** the column name for the jenjang_tinggi field */
    const JENJANG_TINGGI = 'ref.bidang_studi.jenjang_tinggi';

    /** the column name for the a_sert_komp field */
    const A_SERT_KOMP = 'ref.bidang_studi.a_sert_komp';

    /** the column name for the a_sert_profesi field */
    const A_SERT_PROFESI = 'ref.bidang_studi.a_sert_profesi';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.bidang_studi.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.bidang_studi.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.bidang_studi.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.bidang_studi.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of BidangStudi objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array BidangStudi[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. BidangStudiPeer::$fieldNames[BidangStudiPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('BidangStudiId', 'KelompokBidangStudiId', 'Kode', 'BidangStudi', 'Kelompok', 'JenjangPaud', 'JenjangTk', 'JenjangSd', 'JenjangSmp', 'JenjangSma', 'JenjangTinggi', 'ASertKomp', 'ASertProfesi', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('bidangStudiId', 'kelompokBidangStudiId', 'kode', 'bidangStudi', 'kelompok', 'jenjangPaud', 'jenjangTk', 'jenjangSd', 'jenjangSmp', 'jenjangSma', 'jenjangTinggi', 'aSertKomp', 'aSertProfesi', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (BidangStudiPeer::BIDANG_STUDI_ID, BidangStudiPeer::KELOMPOK_BIDANG_STUDI_ID, BidangStudiPeer::KODE, BidangStudiPeer::BIDANG_STUDI, BidangStudiPeer::KELOMPOK, BidangStudiPeer::JENJANG_PAUD, BidangStudiPeer::JENJANG_TK, BidangStudiPeer::JENJANG_SD, BidangStudiPeer::JENJANG_SMP, BidangStudiPeer::JENJANG_SMA, BidangStudiPeer::JENJANG_TINGGI, BidangStudiPeer::A_SERT_KOMP, BidangStudiPeer::A_SERT_PROFESI, BidangStudiPeer::CREATE_DATE, BidangStudiPeer::LAST_UPDATE, BidangStudiPeer::EXPIRED_DATE, BidangStudiPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('BIDANG_STUDI_ID', 'KELOMPOK_BIDANG_STUDI_ID', 'KODE', 'BIDANG_STUDI', 'KELOMPOK', 'JENJANG_PAUD', 'JENJANG_TK', 'JENJANG_SD', 'JENJANG_SMP', 'JENJANG_SMA', 'JENJANG_TINGGI', 'A_SERT_KOMP', 'A_SERT_PROFESI', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('bidang_studi_id', 'kelompok_bidang_studi_id', 'kode', 'bidang_studi', 'kelompok', 'jenjang_paud', 'jenjang_tk', 'jenjang_sd', 'jenjang_smp', 'jenjang_sma', 'jenjang_tinggi', 'a_sert_komp', 'a_sert_profesi', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. BidangStudiPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('BidangStudiId' => 0, 'KelompokBidangStudiId' => 1, 'Kode' => 2, 'BidangStudi' => 3, 'Kelompok' => 4, 'JenjangPaud' => 5, 'JenjangTk' => 6, 'JenjangSd' => 7, 'JenjangSmp' => 8, 'JenjangSma' => 9, 'JenjangTinggi' => 10, 'ASertKomp' => 11, 'ASertProfesi' => 12, 'CreateDate' => 13, 'LastUpdate' => 14, 'ExpiredDate' => 15, 'LastSync' => 16, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('bidangStudiId' => 0, 'kelompokBidangStudiId' => 1, 'kode' => 2, 'bidangStudi' => 3, 'kelompok' => 4, 'jenjangPaud' => 5, 'jenjangTk' => 6, 'jenjangSd' => 7, 'jenjangSmp' => 8, 'jenjangSma' => 9, 'jenjangTinggi' => 10, 'aSertKomp' => 11, 'aSertProfesi' => 12, 'createDate' => 13, 'lastUpdate' => 14, 'expiredDate' => 15, 'lastSync' => 16, ),
        BasePeer::TYPE_COLNAME => array (BidangStudiPeer::BIDANG_STUDI_ID => 0, BidangStudiPeer::KELOMPOK_BIDANG_STUDI_ID => 1, BidangStudiPeer::KODE => 2, BidangStudiPeer::BIDANG_STUDI => 3, BidangStudiPeer::KELOMPOK => 4, BidangStudiPeer::JENJANG_PAUD => 5, BidangStudiPeer::JENJANG_TK => 6, BidangStudiPeer::JENJANG_SD => 7, BidangStudiPeer::JENJANG_SMP => 8, BidangStudiPeer::JENJANG_SMA => 9, BidangStudiPeer::JENJANG_TINGGI => 10, BidangStudiPeer::A_SERT_KOMP => 11, BidangStudiPeer::A_SERT_PROFESI => 12, BidangStudiPeer::CREATE_DATE => 13, BidangStudiPeer::LAST_UPDATE => 14, BidangStudiPeer::EXPIRED_DATE => 15, BidangStudiPeer::LAST_SYNC => 16, ),
        BasePeer::TYPE_RAW_COLNAME => array ('BIDANG_STUDI_ID' => 0, 'KELOMPOK_BIDANG_STUDI_ID' => 1, 'KODE' => 2, 'BIDANG_STUDI' => 3, 'KELOMPOK' => 4, 'JENJANG_PAUD' => 5, 'JENJANG_TK' => 6, 'JENJANG_SD' => 7, 'JENJANG_SMP' => 8, 'JENJANG_SMA' => 9, 'JENJANG_TINGGI' => 10, 'A_SERT_KOMP' => 11, 'A_SERT_PROFESI' => 12, 'CREATE_DATE' => 13, 'LAST_UPDATE' => 14, 'EXPIRED_DATE' => 15, 'LAST_SYNC' => 16, ),
        BasePeer::TYPE_FIELDNAME => array ('bidang_studi_id' => 0, 'kelompok_bidang_studi_id' => 1, 'kode' => 2, 'bidang_studi' => 3, 'kelompok' => 4, 'jenjang_paud' => 5, 'jenjang_tk' => 6, 'jenjang_sd' => 7, 'jenjang_smp' => 8, 'jenjang_sma' => 9, 'jenjang_tinggi' => 10, 'a_sert_komp' => 11, 'a_sert_profesi' => 12, 'create_date' => 13, 'last_update' => 14, 'expired_date' => 15, 'last_sync' => 16, ),
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
        $toNames = BidangStudiPeer::getFieldNames($toType);
        $key = isset(BidangStudiPeer::$fieldKeys[$fromType][$name]) ? BidangStudiPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(BidangStudiPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, BidangStudiPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return BidangStudiPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. BidangStudiPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(BidangStudiPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(BidangStudiPeer::BIDANG_STUDI_ID);
            $criteria->addSelectColumn(BidangStudiPeer::KELOMPOK_BIDANG_STUDI_ID);
            $criteria->addSelectColumn(BidangStudiPeer::KODE);
            $criteria->addSelectColumn(BidangStudiPeer::BIDANG_STUDI);
            $criteria->addSelectColumn(BidangStudiPeer::KELOMPOK);
            $criteria->addSelectColumn(BidangStudiPeer::JENJANG_PAUD);
            $criteria->addSelectColumn(BidangStudiPeer::JENJANG_TK);
            $criteria->addSelectColumn(BidangStudiPeer::JENJANG_SD);
            $criteria->addSelectColumn(BidangStudiPeer::JENJANG_SMP);
            $criteria->addSelectColumn(BidangStudiPeer::JENJANG_SMA);
            $criteria->addSelectColumn(BidangStudiPeer::JENJANG_TINGGI);
            $criteria->addSelectColumn(BidangStudiPeer::A_SERT_KOMP);
            $criteria->addSelectColumn(BidangStudiPeer::A_SERT_PROFESI);
            $criteria->addSelectColumn(BidangStudiPeer::CREATE_DATE);
            $criteria->addSelectColumn(BidangStudiPeer::LAST_UPDATE);
            $criteria->addSelectColumn(BidangStudiPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(BidangStudiPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.bidang_studi_id');
            $criteria->addSelectColumn($alias . '.kelompok_bidang_studi_id');
            $criteria->addSelectColumn($alias . '.kode');
            $criteria->addSelectColumn($alias . '.bidang_studi');
            $criteria->addSelectColumn($alias . '.kelompok');
            $criteria->addSelectColumn($alias . '.jenjang_paud');
            $criteria->addSelectColumn($alias . '.jenjang_tk');
            $criteria->addSelectColumn($alias . '.jenjang_sd');
            $criteria->addSelectColumn($alias . '.jenjang_smp');
            $criteria->addSelectColumn($alias . '.jenjang_sma');
            $criteria->addSelectColumn($alias . '.jenjang_tinggi');
            $criteria->addSelectColumn($alias . '.a_sert_komp');
            $criteria->addSelectColumn($alias . '.a_sert_profesi');
            $criteria->addSelectColumn($alias . '.create_date');
            $criteria->addSelectColumn($alias . '.last_update');
            $criteria->addSelectColumn($alias . '.expired_date');
            $criteria->addSelectColumn($alias . '.last_sync');
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
        $criteria->setPrimaryTableName(BidangStudiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BidangStudiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(BidangStudiPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BidangStudi
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = BidangStudiPeer::doSelect($critcopy, $con);
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
        return BidangStudiPeer::populateObjects(BidangStudiPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            BidangStudiPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(BidangStudiPeer::DATABASE_NAME);

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
     * @param      BidangStudi $obj A BidangStudi object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getBidangStudiId();
            } // if key === null
            BidangStudiPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A BidangStudi object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof BidangStudi) {
                $key = (string) $value->getBidangStudiId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or BidangStudi object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(BidangStudiPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   BidangStudi Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(BidangStudiPeer::$instances[$key])) {
                return BidangStudiPeer::$instances[$key];
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
        foreach (BidangStudiPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        BidangStudiPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.bidang_studi
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

        return (int) $row[$startcol];
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
        $cls = BidangStudiPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = BidangStudiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = BidangStudiPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BidangStudiPeer::addInstanceToPool($obj, $key);
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
     * @return array (BidangStudi object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = BidangStudiPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + BidangStudiPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BidangStudiPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            BidangStudiPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(BidangStudiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BidangStudiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BidangStudiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

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
     * Selects a collection of BidangStudi objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BidangStudi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BidangStudiPeer::DATABASE_NAME);
        }

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol2 = BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BidangStudiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BidangStudiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BidangStudiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

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
        return Propel::getDatabaseMap(BidangStudiPeer::DATABASE_NAME)->getTable(BidangStudiPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseBidangStudiPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseBidangStudiPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new BidangStudiTableMap());
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
        return BidangStudiPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a BidangStudi or Criteria object.
     *
     * @param      mixed $values Criteria or BidangStudi object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from BidangStudi object
        }


        // Set the correct dbName
        $criteria->setDbName(BidangStudiPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a BidangStudi or Criteria object.
     *
     * @param      mixed $values Criteria or BidangStudi object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(BidangStudiPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(BidangStudiPeer::BIDANG_STUDI_ID);
            $value = $criteria->remove(BidangStudiPeer::BIDANG_STUDI_ID);
            if ($value) {
                $selectCriteria->add(BidangStudiPeer::BIDANG_STUDI_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BidangStudiPeer::TABLE_NAME);
            }

        } else { // $values is BidangStudi object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(BidangStudiPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.bidang_studi table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(BidangStudiPeer::TABLE_NAME, $con, BidangStudiPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BidangStudiPeer::clearInstancePool();
            BidangStudiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a BidangStudi or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or BidangStudi object or primary key or array of primary keys
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
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            BidangStudiPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof BidangStudi) { // it's a model object
            // invalidate the cache for this single object
            BidangStudiPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BidangStudiPeer::DATABASE_NAME);
            $criteria->add(BidangStudiPeer::BIDANG_STUDI_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                BidangStudiPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(BidangStudiPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            BidangStudiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given BidangStudi object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      BidangStudi $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(BidangStudiPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(BidangStudiPeer::TABLE_NAME);

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

        return BasePeer::doValidate(BidangStudiPeer::DATABASE_NAME, BidangStudiPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return BidangStudi
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = BidangStudiPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(BidangStudiPeer::DATABASE_NAME);
        $criteria->add(BidangStudiPeer::BIDANG_STUDI_ID, $pk);

        $v = BidangStudiPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return BidangStudi[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(BidangStudiPeer::DATABASE_NAME);
            $criteria->add(BidangStudiPeer::BIDANG_STUDI_ID, $pks, Criteria::IN);
            $objs = BidangStudiPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseBidangStudiPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBidangStudiPeer::buildTableMap();

