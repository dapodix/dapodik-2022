<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JurusanKerjasama;
use DataDikdas\Model\JurusanKerjasamaPeer;
use DataDikdas\Model\JurusanSpPeer;
use DataDikdas\Model\MouPeer;
use DataDikdas\Model\map\JurusanKerjasamaTableMap;

/**
 * Base static class for performing query and update operations on the 'jurusan_kerjasama' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseJurusanKerjasamaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'jurusan_kerjasama';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\JurusanKerjasama';

    /** the related TableMap class for this table */
    const TM_CLASS = 'JurusanKerjasamaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 7;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 7;

    /** the column name for the mou_id field */
    const MOU_ID = 'jurusan_kerjasama.mou_id';

    /** the column name for the jurusan_sp_id field */
    const JURUSAN_SP_ID = 'jurusan_kerjasama.jurusan_sp_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'jurusan_kerjasama.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'jurusan_kerjasama.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'jurusan_kerjasama.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'jurusan_kerjasama.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'jurusan_kerjasama.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of JurusanKerjasama objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array JurusanKerjasama[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. JurusanKerjasamaPeer::$fieldNames[JurusanKerjasamaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('MouId', 'JurusanSpId', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('mouId', 'jurusanSpId', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (JurusanKerjasamaPeer::MOU_ID, JurusanKerjasamaPeer::JURUSAN_SP_ID, JurusanKerjasamaPeer::CREATE_DATE, JurusanKerjasamaPeer::LAST_UPDATE, JurusanKerjasamaPeer::SOFT_DELETE, JurusanKerjasamaPeer::LAST_SYNC, JurusanKerjasamaPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('MOU_ID', 'JURUSAN_SP_ID', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('mou_id', 'jurusan_sp_id', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. JurusanKerjasamaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('MouId' => 0, 'JurusanSpId' => 1, 'CreateDate' => 2, 'LastUpdate' => 3, 'SoftDelete' => 4, 'LastSync' => 5, 'UpdaterId' => 6, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('mouId' => 0, 'jurusanSpId' => 1, 'createDate' => 2, 'lastUpdate' => 3, 'softDelete' => 4, 'lastSync' => 5, 'updaterId' => 6, ),
        BasePeer::TYPE_COLNAME => array (JurusanKerjasamaPeer::MOU_ID => 0, JurusanKerjasamaPeer::JURUSAN_SP_ID => 1, JurusanKerjasamaPeer::CREATE_DATE => 2, JurusanKerjasamaPeer::LAST_UPDATE => 3, JurusanKerjasamaPeer::SOFT_DELETE => 4, JurusanKerjasamaPeer::LAST_SYNC => 5, JurusanKerjasamaPeer::UPDATER_ID => 6, ),
        BasePeer::TYPE_RAW_COLNAME => array ('MOU_ID' => 0, 'JURUSAN_SP_ID' => 1, 'CREATE_DATE' => 2, 'LAST_UPDATE' => 3, 'SOFT_DELETE' => 4, 'LAST_SYNC' => 5, 'UPDATER_ID' => 6, ),
        BasePeer::TYPE_FIELDNAME => array ('mou_id' => 0, 'jurusan_sp_id' => 1, 'create_date' => 2, 'last_update' => 3, 'soft_delete' => 4, 'last_sync' => 5, 'updater_id' => 6, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
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
        $toNames = JurusanKerjasamaPeer::getFieldNames($toType);
        $key = isset(JurusanKerjasamaPeer::$fieldKeys[$fromType][$name]) ? JurusanKerjasamaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(JurusanKerjasamaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, JurusanKerjasamaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return JurusanKerjasamaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. JurusanKerjasamaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(JurusanKerjasamaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(JurusanKerjasamaPeer::MOU_ID);
            $criteria->addSelectColumn(JurusanKerjasamaPeer::JURUSAN_SP_ID);
            $criteria->addSelectColumn(JurusanKerjasamaPeer::CREATE_DATE);
            $criteria->addSelectColumn(JurusanKerjasamaPeer::LAST_UPDATE);
            $criteria->addSelectColumn(JurusanKerjasamaPeer::SOFT_DELETE);
            $criteria->addSelectColumn(JurusanKerjasamaPeer::LAST_SYNC);
            $criteria->addSelectColumn(JurusanKerjasamaPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.mou_id');
            $criteria->addSelectColumn($alias . '.jurusan_sp_id');
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
        $criteria->setPrimaryTableName(JurusanKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JurusanKerjasama
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = JurusanKerjasamaPeer::doSelect($critcopy, $con);
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
        return JurusanKerjasamaPeer::populateObjects(JurusanKerjasamaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            JurusanKerjasamaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);

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
     * @param      JurusanKerjasama $obj A JurusanKerjasama object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getMouId(), (string) $obj->getJurusanSpId()));
            } // if key === null
            JurusanKerjasamaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A JurusanKerjasama object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof JurusanKerjasama) {
                $key = serialize(array((string) $value->getMouId(), (string) $value->getJurusanSpId()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or JurusanKerjasama object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(JurusanKerjasamaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   JurusanKerjasama Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(JurusanKerjasamaPeer::$instances[$key])) {
                return JurusanKerjasamaPeer::$instances[$key];
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
        foreach (JurusanKerjasamaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        JurusanKerjasamaPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to jurusan_kerjasama
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
        $cls = JurusanKerjasamaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = JurusanKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = JurusanKerjasamaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JurusanKerjasamaPeer::addInstanceToPool($obj, $key);
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
     * @return array (JurusanKerjasama object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = JurusanKerjasamaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = JurusanKerjasamaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + JurusanKerjasamaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JurusanKerjasamaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            JurusanKerjasamaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Mou table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMou(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JurusanKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurusanKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JurusanSp table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJurusanSp(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JurusanKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurusanKerjasamaPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

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
     * Selects a collection of JurusanKerjasama objects pre-filled with their Mou objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurusanKerjasama objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMou(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);
        }

        JurusanKerjasamaPeer::addSelectColumns($criteria);
        $startcol = JurusanKerjasamaPeer::NUM_HYDRATE_COLUMNS;
        MouPeer::addSelectColumns($criteria);

        $criteria->addJoin(JurusanKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanKerjasamaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JurusanKerjasamaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanKerjasamaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MouPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MouPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MouPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MouPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (JurusanKerjasama) to $obj2 (Mou)
                $obj2->addJurusanKerjasama($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of JurusanKerjasama objects pre-filled with their JurusanSp objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurusanKerjasama objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJurusanSp(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);
        }

        JurusanKerjasamaPeer::addSelectColumns($criteria);
        $startcol = JurusanKerjasamaPeer::NUM_HYDRATE_COLUMNS;
        JurusanSpPeer::addSelectColumns($criteria);

        $criteria->addJoin(JurusanKerjasamaPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanKerjasamaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JurusanKerjasamaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanKerjasamaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (JurusanKerjasama) to $obj2 (JurusanSp)
                $obj2->addJurusanKerjasama($obj1);

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
        $criteria->setPrimaryTableName(JurusanKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurusanKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);

        $criteria->addJoin(JurusanKerjasamaPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

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
     * Selects a collection of JurusanKerjasama objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurusanKerjasama objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);
        }

        JurusanKerjasamaPeer::addSelectColumns($criteria);
        $startcol2 = JurusanKerjasamaPeer::NUM_HYDRATE_COLUMNS;

        MouPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MouPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurusanKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);

        $criteria->addJoin(JurusanKerjasamaPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanKerjasamaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurusanKerjasamaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanKerjasamaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Mou rows

            $key2 = MouPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = MouPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MouPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MouPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (JurusanKerjasama) to the collection in $obj2 (Mou)
                $obj2->addJurusanKerjasama($obj1);
            } // if joined row not null

            // Add objects for joined JurusanSp rows

            $key3 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JurusanSpPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JurusanSpPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanSpPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (JurusanKerjasama) to the collection in $obj3 (JurusanSp)
                $obj3->addJurusanKerjasama($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Mou table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMou(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JurusanKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JurusanKerjasamaPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JurusanSp table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJurusanSp(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JurusanKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JurusanKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);

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
     * Selects a collection of JurusanKerjasama objects pre-filled with all related objects except Mou.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurusanKerjasama objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMou(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);
        }

        JurusanKerjasamaPeer::addSelectColumns($criteria);
        $startcol2 = JurusanKerjasamaPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurusanKerjasamaPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanKerjasamaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurusanKerjasamaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanKerjasamaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (JurusanKerjasama) to the collection in $obj2 (JurusanSp)
                $obj2->addJurusanKerjasama($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of JurusanKerjasama objects pre-filled with all related objects except JurusanSp.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurusanKerjasama objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJurusanSp(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);
        }

        JurusanKerjasamaPeer::addSelectColumns($criteria);
        $startcol2 = JurusanKerjasamaPeer::NUM_HYDRATE_COLUMNS;

        MouPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MouPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurusanKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanKerjasamaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurusanKerjasamaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanKerjasamaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Mou rows

                $key2 = MouPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = MouPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = MouPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MouPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (JurusanKerjasama) to the collection in $obj2 (Mou)
                $obj2->addJurusanKerjasama($obj1);

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
        return Propel::getDatabaseMap(JurusanKerjasamaPeer::DATABASE_NAME)->getTable(JurusanKerjasamaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseJurusanKerjasamaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseJurusanKerjasamaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new JurusanKerjasamaTableMap());
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
        return JurusanKerjasamaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a JurusanKerjasama or Criteria object.
     *
     * @param      mixed $values Criteria or JurusanKerjasama object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from JurusanKerjasama object
        }


        // Set the correct dbName
        $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a JurusanKerjasama or Criteria object.
     *
     * @param      mixed $values Criteria or JurusanKerjasama object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(JurusanKerjasamaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(JurusanKerjasamaPeer::MOU_ID);
            $value = $criteria->remove(JurusanKerjasamaPeer::MOU_ID);
            if ($value) {
                $selectCriteria->add(JurusanKerjasamaPeer::MOU_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JurusanKerjasamaPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(JurusanKerjasamaPeer::JURUSAN_SP_ID);
            $value = $criteria->remove(JurusanKerjasamaPeer::JURUSAN_SP_ID);
            if ($value) {
                $selectCriteria->add(JurusanKerjasamaPeer::JURUSAN_SP_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JurusanKerjasamaPeer::TABLE_NAME);
            }

        } else { // $values is JurusanKerjasama object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the jurusan_kerjasama table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(JurusanKerjasamaPeer::TABLE_NAME, $con, JurusanKerjasamaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JurusanKerjasamaPeer::clearInstancePool();
            JurusanKerjasamaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a JurusanKerjasama or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or JurusanKerjasama object or primary key or array of primary keys
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
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            JurusanKerjasamaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof JurusanKerjasama) { // it's a model object
            // invalidate the cache for this single object
            JurusanKerjasamaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JurusanKerjasamaPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(JurusanKerjasamaPeer::MOU_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(JurusanKerjasamaPeer::JURUSAN_SP_ID, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                JurusanKerjasamaPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(JurusanKerjasamaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            JurusanKerjasamaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given JurusanKerjasama object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      JurusanKerjasama $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(JurusanKerjasamaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(JurusanKerjasamaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(JurusanKerjasamaPeer::DATABASE_NAME, JurusanKerjasamaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $mou_id
     * @param   string $jurusan_sp_id
     * @param      PropelPDO $con
     * @return   JurusanKerjasama
     */
    public static function retrieveByPK($mou_id, $jurusan_sp_id, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $mou_id, (string) $jurusan_sp_id));
         if (null !== ($obj = JurusanKerjasamaPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(JurusanKerjasamaPeer::DATABASE_NAME);
        $criteria->add(JurusanKerjasamaPeer::MOU_ID, $mou_id);
        $criteria->add(JurusanKerjasamaPeer::JURUSAN_SP_ID, $jurusan_sp_id);
        $v = JurusanKerjasamaPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseJurusanKerjasamaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseJurusanKerjasamaPeer::buildTableMap();

