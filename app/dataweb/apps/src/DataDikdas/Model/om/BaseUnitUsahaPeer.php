<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\KelompokUsahaPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\UnitUsaha;
use DataDikdas\Model\UnitUsahaPeer;
use DataDikdas\Model\map\UnitUsahaTableMap;

/**
 * Base static class for performing query and update operations on the 'unit_usaha' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseUnitUsahaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'unit_usaha';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\UnitUsaha';

    /** the related TableMap class for this table */
    const TM_CLASS = 'UnitUsahaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 9;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 9;

    /** the column name for the unit_usaha_id field */
    const UNIT_USAHA_ID = 'unit_usaha.unit_usaha_id';

    /** the column name for the kelompok_usaha_id field */
    const KELOMPOK_USAHA_ID = 'unit_usaha.kelompok_usaha_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'unit_usaha.sekolah_id';

    /** the column name for the nama_unit_usaha field */
    const NAMA_UNIT_USAHA = 'unit_usaha.nama_unit_usaha';

    /** the column name for the create_date field */
    const CREATE_DATE = 'unit_usaha.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'unit_usaha.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'unit_usaha.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'unit_usaha.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'unit_usaha.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of UnitUsaha objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array UnitUsaha[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. UnitUsahaPeer::$fieldNames[UnitUsahaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('UnitUsahaId', 'KelompokUsahaId', 'SekolahId', 'NamaUnitUsaha', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('unitUsahaId', 'kelompokUsahaId', 'sekolahId', 'namaUnitUsaha', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (UnitUsahaPeer::UNIT_USAHA_ID, UnitUsahaPeer::KELOMPOK_USAHA_ID, UnitUsahaPeer::SEKOLAH_ID, UnitUsahaPeer::NAMA_UNIT_USAHA, UnitUsahaPeer::CREATE_DATE, UnitUsahaPeer::LAST_UPDATE, UnitUsahaPeer::SOFT_DELETE, UnitUsahaPeer::LAST_SYNC, UnitUsahaPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('UNIT_USAHA_ID', 'KELOMPOK_USAHA_ID', 'SEKOLAH_ID', 'NAMA_UNIT_USAHA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('unit_usaha_id', 'kelompok_usaha_id', 'sekolah_id', 'nama_unit_usaha', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. UnitUsahaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('UnitUsahaId' => 0, 'KelompokUsahaId' => 1, 'SekolahId' => 2, 'NamaUnitUsaha' => 3, 'CreateDate' => 4, 'LastUpdate' => 5, 'SoftDelete' => 6, 'LastSync' => 7, 'UpdaterId' => 8, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('unitUsahaId' => 0, 'kelompokUsahaId' => 1, 'sekolahId' => 2, 'namaUnitUsaha' => 3, 'createDate' => 4, 'lastUpdate' => 5, 'softDelete' => 6, 'lastSync' => 7, 'updaterId' => 8, ),
        BasePeer::TYPE_COLNAME => array (UnitUsahaPeer::UNIT_USAHA_ID => 0, UnitUsahaPeer::KELOMPOK_USAHA_ID => 1, UnitUsahaPeer::SEKOLAH_ID => 2, UnitUsahaPeer::NAMA_UNIT_USAHA => 3, UnitUsahaPeer::CREATE_DATE => 4, UnitUsahaPeer::LAST_UPDATE => 5, UnitUsahaPeer::SOFT_DELETE => 6, UnitUsahaPeer::LAST_SYNC => 7, UnitUsahaPeer::UPDATER_ID => 8, ),
        BasePeer::TYPE_RAW_COLNAME => array ('UNIT_USAHA_ID' => 0, 'KELOMPOK_USAHA_ID' => 1, 'SEKOLAH_ID' => 2, 'NAMA_UNIT_USAHA' => 3, 'CREATE_DATE' => 4, 'LAST_UPDATE' => 5, 'SOFT_DELETE' => 6, 'LAST_SYNC' => 7, 'UPDATER_ID' => 8, ),
        BasePeer::TYPE_FIELDNAME => array ('unit_usaha_id' => 0, 'kelompok_usaha_id' => 1, 'sekolah_id' => 2, 'nama_unit_usaha' => 3, 'create_date' => 4, 'last_update' => 5, 'soft_delete' => 6, 'last_sync' => 7, 'updater_id' => 8, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $toNames = UnitUsahaPeer::getFieldNames($toType);
        $key = isset(UnitUsahaPeer::$fieldKeys[$fromType][$name]) ? UnitUsahaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(UnitUsahaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, UnitUsahaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return UnitUsahaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. UnitUsahaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(UnitUsahaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(UnitUsahaPeer::UNIT_USAHA_ID);
            $criteria->addSelectColumn(UnitUsahaPeer::KELOMPOK_USAHA_ID);
            $criteria->addSelectColumn(UnitUsahaPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(UnitUsahaPeer::NAMA_UNIT_USAHA);
            $criteria->addSelectColumn(UnitUsahaPeer::CREATE_DATE);
            $criteria->addSelectColumn(UnitUsahaPeer::LAST_UPDATE);
            $criteria->addSelectColumn(UnitUsahaPeer::SOFT_DELETE);
            $criteria->addSelectColumn(UnitUsahaPeer::LAST_SYNC);
            $criteria->addSelectColumn(UnitUsahaPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.unit_usaha_id');
            $criteria->addSelectColumn($alias . '.kelompok_usaha_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.nama_unit_usaha');
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
        $criteria->setPrimaryTableName(UnitUsahaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 UnitUsaha
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = UnitUsahaPeer::doSelect($critcopy, $con);
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
        return UnitUsahaPeer::populateObjects(UnitUsahaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            UnitUsahaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);

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
     * @param      UnitUsaha $obj A UnitUsaha object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getUnitUsahaId();
            } // if key === null
            UnitUsahaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A UnitUsaha object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof UnitUsaha) {
                $key = (string) $value->getUnitUsahaId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or UnitUsaha object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(UnitUsahaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   UnitUsaha Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(UnitUsahaPeer::$instances[$key])) {
                return UnitUsahaPeer::$instances[$key];
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
        foreach (UnitUsahaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        UnitUsahaPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to unit_usaha
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
        $cls = UnitUsahaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = UnitUsahaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = UnitUsahaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UnitUsahaPeer::addInstanceToPool($obj, $key);
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
     * @return array (UnitUsaha object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = UnitUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = UnitUsahaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + UnitUsahaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UnitUsahaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            UnitUsahaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related KelompokUsaha table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKelompokUsaha(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UnitUsahaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UnitUsahaPeer::KELOMPOK_USAHA_ID, KelompokUsahaPeer::KELOMPOK_USAHA_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(UnitUsahaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UnitUsahaPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of UnitUsaha objects pre-filled with their KelompokUsaha objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UnitUsaha objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKelompokUsaha(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);
        }

        UnitUsahaPeer::addSelectColumns($criteria);
        $startcol = UnitUsahaPeer::NUM_HYDRATE_COLUMNS;
        KelompokUsahaPeer::addSelectColumns($criteria);

        $criteria->addJoin(UnitUsahaPeer::KELOMPOK_USAHA_ID, KelompokUsahaPeer::KELOMPOK_USAHA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UnitUsahaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UnitUsahaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = UnitUsahaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UnitUsahaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KelompokUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KelompokUsahaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KelompokUsahaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KelompokUsahaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (UnitUsaha) to $obj2 (KelompokUsaha)
                $obj2->addUnitUsaha($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of UnitUsaha objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UnitUsaha objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);
        }

        UnitUsahaPeer::addSelectColumns($criteria);
        $startcol = UnitUsahaPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(UnitUsahaPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UnitUsahaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UnitUsahaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = UnitUsahaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UnitUsahaPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (UnitUsaha) to $obj2 (Sekolah)
                $obj2->addUnitUsaha($obj1);

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
        $criteria->setPrimaryTableName(UnitUsahaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UnitUsahaPeer::KELOMPOK_USAHA_ID, KelompokUsahaPeer::KELOMPOK_USAHA_ID, $join_behavior);

        $criteria->addJoin(UnitUsahaPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of UnitUsaha objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UnitUsaha objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);
        }

        UnitUsahaPeer::addSelectColumns($criteria);
        $startcol2 = UnitUsahaPeer::NUM_HYDRATE_COLUMNS;

        KelompokUsahaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KelompokUsahaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UnitUsahaPeer::KELOMPOK_USAHA_ID, KelompokUsahaPeer::KELOMPOK_USAHA_ID, $join_behavior);

        $criteria->addJoin(UnitUsahaPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UnitUsahaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UnitUsahaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UnitUsahaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UnitUsahaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined KelompokUsaha rows

            $key2 = KelompokUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = KelompokUsahaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KelompokUsahaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KelompokUsahaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (UnitUsaha) to the collection in $obj2 (KelompokUsaha)
                $obj2->addUnitUsaha($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key3 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = SekolahPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = SekolahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (UnitUsaha) to the collection in $obj3 (Sekolah)
                $obj3->addUnitUsaha($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related KelompokUsaha table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKelompokUsaha(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UnitUsahaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(UnitUsahaPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(UnitUsahaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(UnitUsahaPeer::KELOMPOK_USAHA_ID, KelompokUsahaPeer::KELOMPOK_USAHA_ID, $join_behavior);

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
     * Selects a collection of UnitUsaha objects pre-filled with all related objects except KelompokUsaha.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UnitUsaha objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKelompokUsaha(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);
        }

        UnitUsahaPeer::addSelectColumns($criteria);
        $startcol2 = UnitUsahaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UnitUsahaPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UnitUsahaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UnitUsahaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UnitUsahaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UnitUsahaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Sekolah rows

                $key2 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SekolahPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SekolahPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (UnitUsaha) to the collection in $obj2 (Sekolah)
                $obj2->addUnitUsaha($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of UnitUsaha objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UnitUsaha objects.
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
            $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);
        }

        UnitUsahaPeer::addSelectColumns($criteria);
        $startcol2 = UnitUsahaPeer::NUM_HYDRATE_COLUMNS;

        KelompokUsahaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KelompokUsahaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UnitUsahaPeer::KELOMPOK_USAHA_ID, KelompokUsahaPeer::KELOMPOK_USAHA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UnitUsahaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UnitUsahaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UnitUsahaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UnitUsahaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KelompokUsaha rows

                $key2 = KelompokUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KelompokUsahaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KelompokUsahaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KelompokUsahaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (UnitUsaha) to the collection in $obj2 (KelompokUsaha)
                $obj2->addUnitUsaha($obj1);

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
        return Propel::getDatabaseMap(UnitUsahaPeer::DATABASE_NAME)->getTable(UnitUsahaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseUnitUsahaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseUnitUsahaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new UnitUsahaTableMap());
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
        return UnitUsahaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a UnitUsaha or Criteria object.
     *
     * @param      mixed $values Criteria or UnitUsaha object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from UnitUsaha object
        }


        // Set the correct dbName
        $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a UnitUsaha or Criteria object.
     *
     * @param      mixed $values Criteria or UnitUsaha object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(UnitUsahaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(UnitUsahaPeer::UNIT_USAHA_ID);
            $value = $criteria->remove(UnitUsahaPeer::UNIT_USAHA_ID);
            if ($value) {
                $selectCriteria->add(UnitUsahaPeer::UNIT_USAHA_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(UnitUsahaPeer::TABLE_NAME);
            }

        } else { // $values is UnitUsaha object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the unit_usaha table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(UnitUsahaPeer::TABLE_NAME, $con, UnitUsahaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UnitUsahaPeer::clearInstancePool();
            UnitUsahaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a UnitUsaha or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or UnitUsaha object or primary key or array of primary keys
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
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            UnitUsahaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof UnitUsaha) { // it's a model object
            // invalidate the cache for this single object
            UnitUsahaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UnitUsahaPeer::DATABASE_NAME);
            $criteria->add(UnitUsahaPeer::UNIT_USAHA_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                UnitUsahaPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            UnitUsahaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given UnitUsaha object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      UnitUsaha $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(UnitUsahaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(UnitUsahaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(UnitUsahaPeer::DATABASE_NAME, UnitUsahaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return UnitUsaha
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = UnitUsahaPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(UnitUsahaPeer::DATABASE_NAME);
        $criteria->add(UnitUsahaPeer::UNIT_USAHA_ID, $pk);

        $v = UnitUsahaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return UnitUsaha[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(UnitUsahaPeer::DATABASE_NAME);
            $criteria->add(UnitUsahaPeer::UNIT_USAHA_ID, $pks, Criteria::IN);
            $objs = UnitUsahaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseUnitUsahaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseUnitUsahaPeer::buildTableMap();

