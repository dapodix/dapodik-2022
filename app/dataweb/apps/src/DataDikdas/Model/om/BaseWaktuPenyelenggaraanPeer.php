<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\WaktuPenyelenggaraan;
use DataDikdas\Model\WaktuPenyelenggaraanPeer;
use DataDikdas\Model\map\WaktuPenyelenggaraanTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.waktu_penyelenggaraan' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseWaktuPenyelenggaraanPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.waktu_penyelenggaraan';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\WaktuPenyelenggaraan';

    /** the related TableMap class for this table */
    const TM_CLASS = 'WaktuPenyelenggaraanTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 6;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 6;

    /** the column name for the waktu_penyelenggaraan_id field */
    const WAKTU_PENYELENGGARAAN_ID = 'ref.waktu_penyelenggaraan.waktu_penyelenggaraan_id';

    /** the column name for the nama field */
    const NAMA = 'ref.waktu_penyelenggaraan.nama';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.waktu_penyelenggaraan.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.waktu_penyelenggaraan.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.waktu_penyelenggaraan.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.waktu_penyelenggaraan.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of WaktuPenyelenggaraan objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array WaktuPenyelenggaraan[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. WaktuPenyelenggaraanPeer::$fieldNames[WaktuPenyelenggaraanPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('WaktuPenyelenggaraanId', 'Nama', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('waktuPenyelenggaraanId', 'nama', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, WaktuPenyelenggaraanPeer::NAMA, WaktuPenyelenggaraanPeer::CREATE_DATE, WaktuPenyelenggaraanPeer::LAST_UPDATE, WaktuPenyelenggaraanPeer::EXPIRED_DATE, WaktuPenyelenggaraanPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('WAKTU_PENYELENGGARAAN_ID', 'NAMA', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('waktu_penyelenggaraan_id', 'nama', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. WaktuPenyelenggaraanPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('WaktuPenyelenggaraanId' => 0, 'Nama' => 1, 'CreateDate' => 2, 'LastUpdate' => 3, 'ExpiredDate' => 4, 'LastSync' => 5, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('waktuPenyelenggaraanId' => 0, 'nama' => 1, 'createDate' => 2, 'lastUpdate' => 3, 'expiredDate' => 4, 'lastSync' => 5, ),
        BasePeer::TYPE_COLNAME => array (WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID => 0, WaktuPenyelenggaraanPeer::NAMA => 1, WaktuPenyelenggaraanPeer::CREATE_DATE => 2, WaktuPenyelenggaraanPeer::LAST_UPDATE => 3, WaktuPenyelenggaraanPeer::EXPIRED_DATE => 4, WaktuPenyelenggaraanPeer::LAST_SYNC => 5, ),
        BasePeer::TYPE_RAW_COLNAME => array ('WAKTU_PENYELENGGARAAN_ID' => 0, 'NAMA' => 1, 'CREATE_DATE' => 2, 'LAST_UPDATE' => 3, 'EXPIRED_DATE' => 4, 'LAST_SYNC' => 5, ),
        BasePeer::TYPE_FIELDNAME => array ('waktu_penyelenggaraan_id' => 0, 'nama' => 1, 'create_date' => 2, 'last_update' => 3, 'expired_date' => 4, 'last_sync' => 5, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
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
        $toNames = WaktuPenyelenggaraanPeer::getFieldNames($toType);
        $key = isset(WaktuPenyelenggaraanPeer::$fieldKeys[$fromType][$name]) ? WaktuPenyelenggaraanPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(WaktuPenyelenggaraanPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, WaktuPenyelenggaraanPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return WaktuPenyelenggaraanPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. WaktuPenyelenggaraanPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(WaktuPenyelenggaraanPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID);
            $criteria->addSelectColumn(WaktuPenyelenggaraanPeer::NAMA);
            $criteria->addSelectColumn(WaktuPenyelenggaraanPeer::CREATE_DATE);
            $criteria->addSelectColumn(WaktuPenyelenggaraanPeer::LAST_UPDATE);
            $criteria->addSelectColumn(WaktuPenyelenggaraanPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(WaktuPenyelenggaraanPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.waktu_penyelenggaraan_id');
            $criteria->addSelectColumn($alias . '.nama');
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
        $criteria->setPrimaryTableName(WaktuPenyelenggaraanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            WaktuPenyelenggaraanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(WaktuPenyelenggaraanPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(WaktuPenyelenggaraanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 WaktuPenyelenggaraan
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = WaktuPenyelenggaraanPeer::doSelect($critcopy, $con);
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
        return WaktuPenyelenggaraanPeer::populateObjects(WaktuPenyelenggaraanPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(WaktuPenyelenggaraanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            WaktuPenyelenggaraanPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(WaktuPenyelenggaraanPeer::DATABASE_NAME);

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
     * @param      WaktuPenyelenggaraan $obj A WaktuPenyelenggaraan object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getWaktuPenyelenggaraanId();
            } // if key === null
            WaktuPenyelenggaraanPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A WaktuPenyelenggaraan object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof WaktuPenyelenggaraan) {
                $key = (string) $value->getWaktuPenyelenggaraanId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or WaktuPenyelenggaraan object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(WaktuPenyelenggaraanPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   WaktuPenyelenggaraan Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(WaktuPenyelenggaraanPeer::$instances[$key])) {
                return WaktuPenyelenggaraanPeer::$instances[$key];
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
        foreach (WaktuPenyelenggaraanPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        WaktuPenyelenggaraanPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.waktu_penyelenggaraan
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
        $cls = WaktuPenyelenggaraanPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = WaktuPenyelenggaraanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = WaktuPenyelenggaraanPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WaktuPenyelenggaraanPeer::addInstanceToPool($obj, $key);
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
     * @return array (WaktuPenyelenggaraan object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = WaktuPenyelenggaraanPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = WaktuPenyelenggaraanPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + WaktuPenyelenggaraanPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WaktuPenyelenggaraanPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            WaktuPenyelenggaraanPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        return Propel::getDatabaseMap(WaktuPenyelenggaraanPeer::DATABASE_NAME)->getTable(WaktuPenyelenggaraanPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseWaktuPenyelenggaraanPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseWaktuPenyelenggaraanPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new WaktuPenyelenggaraanTableMap());
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
        return WaktuPenyelenggaraanPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a WaktuPenyelenggaraan or Criteria object.
     *
     * @param      mixed $values Criteria or WaktuPenyelenggaraan object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(WaktuPenyelenggaraanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from WaktuPenyelenggaraan object
        }


        // Set the correct dbName
        $criteria->setDbName(WaktuPenyelenggaraanPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a WaktuPenyelenggaraan or Criteria object.
     *
     * @param      mixed $values Criteria or WaktuPenyelenggaraan object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(WaktuPenyelenggaraanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(WaktuPenyelenggaraanPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID);
            $value = $criteria->remove(WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID);
            if ($value) {
                $selectCriteria->add(WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(WaktuPenyelenggaraanPeer::TABLE_NAME);
            }

        } else { // $values is WaktuPenyelenggaraan object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(WaktuPenyelenggaraanPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.waktu_penyelenggaraan table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(WaktuPenyelenggaraanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(WaktuPenyelenggaraanPeer::TABLE_NAME, $con, WaktuPenyelenggaraanPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WaktuPenyelenggaraanPeer::clearInstancePool();
            WaktuPenyelenggaraanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a WaktuPenyelenggaraan or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or WaktuPenyelenggaraan object or primary key or array of primary keys
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
            $con = Propel::getConnection(WaktuPenyelenggaraanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            WaktuPenyelenggaraanPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof WaktuPenyelenggaraan) { // it's a model object
            // invalidate the cache for this single object
            WaktuPenyelenggaraanPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WaktuPenyelenggaraanPeer::DATABASE_NAME);
            $criteria->add(WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                WaktuPenyelenggaraanPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(WaktuPenyelenggaraanPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            WaktuPenyelenggaraanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given WaktuPenyelenggaraan object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      WaktuPenyelenggaraan $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(WaktuPenyelenggaraanPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(WaktuPenyelenggaraanPeer::TABLE_NAME);

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

        return BasePeer::doValidate(WaktuPenyelenggaraanPeer::DATABASE_NAME, WaktuPenyelenggaraanPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return WaktuPenyelenggaraan
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = WaktuPenyelenggaraanPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(WaktuPenyelenggaraanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(WaktuPenyelenggaraanPeer::DATABASE_NAME);
        $criteria->add(WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $pk);

        $v = WaktuPenyelenggaraanPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return WaktuPenyelenggaraan[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(WaktuPenyelenggaraanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(WaktuPenyelenggaraanPeer::DATABASE_NAME);
            $criteria->add(WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $pks, Criteria::IN);
            $objs = WaktuPenyelenggaraanPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseWaktuPenyelenggaraanPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseWaktuPenyelenggaraanPeer::buildTableMap();

