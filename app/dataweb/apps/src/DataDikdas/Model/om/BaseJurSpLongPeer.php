<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JurSpLong;
use DataDikdas\Model\JurSpLongPeer;
use DataDikdas\Model\JurusanSpPeer;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\map\JurSpLongTableMap;

/**
 * Base static class for performing query and update operations on the 'jur_sp_long' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseJurSpLongPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'jur_sp_long';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\JurSpLong';

    /** the related TableMap class for this table */
    const TM_CLASS = 'JurSpLongTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 8;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 8;

    /** the column name for the jurusan_sp_id field */
    const JURUSAN_SP_ID = 'jur_sp_long.jurusan_sp_id';

    /** the column name for the semester_id field */
    const SEMESTER_ID = 'jur_sp_long.semester_id';

    /** the column name for the jumlah_pendaftar field */
    const JUMLAH_PENDAFTAR = 'jur_sp_long.jumlah_pendaftar';

    /** the column name for the create_date field */
    const CREATE_DATE = 'jur_sp_long.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'jur_sp_long.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'jur_sp_long.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'jur_sp_long.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'jur_sp_long.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of JurSpLong objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array JurSpLong[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. JurSpLongPeer::$fieldNames[JurSpLongPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('JurusanSpId', 'SemesterId', 'JumlahPendaftar', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jurusanSpId', 'semesterId', 'jumlahPendaftar', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (JurSpLongPeer::JURUSAN_SP_ID, JurSpLongPeer::SEMESTER_ID, JurSpLongPeer::JUMLAH_PENDAFTAR, JurSpLongPeer::CREATE_DATE, JurSpLongPeer::LAST_UPDATE, JurSpLongPeer::SOFT_DELETE, JurSpLongPeer::LAST_SYNC, JurSpLongPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JURUSAN_SP_ID', 'SEMESTER_ID', 'JUMLAH_PENDAFTAR', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('jurusan_sp_id', 'semester_id', 'jumlah_pendaftar', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. JurSpLongPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('JurusanSpId' => 0, 'SemesterId' => 1, 'JumlahPendaftar' => 2, 'CreateDate' => 3, 'LastUpdate' => 4, 'SoftDelete' => 5, 'LastSync' => 6, 'UpdaterId' => 7, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jurusanSpId' => 0, 'semesterId' => 1, 'jumlahPendaftar' => 2, 'createDate' => 3, 'lastUpdate' => 4, 'softDelete' => 5, 'lastSync' => 6, 'updaterId' => 7, ),
        BasePeer::TYPE_COLNAME => array (JurSpLongPeer::JURUSAN_SP_ID => 0, JurSpLongPeer::SEMESTER_ID => 1, JurSpLongPeer::JUMLAH_PENDAFTAR => 2, JurSpLongPeer::CREATE_DATE => 3, JurSpLongPeer::LAST_UPDATE => 4, JurSpLongPeer::SOFT_DELETE => 5, JurSpLongPeer::LAST_SYNC => 6, JurSpLongPeer::UPDATER_ID => 7, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JURUSAN_SP_ID' => 0, 'SEMESTER_ID' => 1, 'JUMLAH_PENDAFTAR' => 2, 'CREATE_DATE' => 3, 'LAST_UPDATE' => 4, 'SOFT_DELETE' => 5, 'LAST_SYNC' => 6, 'UPDATER_ID' => 7, ),
        BasePeer::TYPE_FIELDNAME => array ('jurusan_sp_id' => 0, 'semester_id' => 1, 'jumlah_pendaftar' => 2, 'create_date' => 3, 'last_update' => 4, 'soft_delete' => 5, 'last_sync' => 6, 'updater_id' => 7, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
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
        $toNames = JurSpLongPeer::getFieldNames($toType);
        $key = isset(JurSpLongPeer::$fieldKeys[$fromType][$name]) ? JurSpLongPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(JurSpLongPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, JurSpLongPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return JurSpLongPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. JurSpLongPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(JurSpLongPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(JurSpLongPeer::JURUSAN_SP_ID);
            $criteria->addSelectColumn(JurSpLongPeer::SEMESTER_ID);
            $criteria->addSelectColumn(JurSpLongPeer::JUMLAH_PENDAFTAR);
            $criteria->addSelectColumn(JurSpLongPeer::CREATE_DATE);
            $criteria->addSelectColumn(JurSpLongPeer::LAST_UPDATE);
            $criteria->addSelectColumn(JurSpLongPeer::SOFT_DELETE);
            $criteria->addSelectColumn(JurSpLongPeer::LAST_SYNC);
            $criteria->addSelectColumn(JurSpLongPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.jurusan_sp_id');
            $criteria->addSelectColumn($alias . '.semester_id');
            $criteria->addSelectColumn($alias . '.jumlah_pendaftar');
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
        $criteria->setPrimaryTableName(JurSpLongPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurSpLongPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(JurSpLongPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(JurSpLongPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JurSpLong
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = JurSpLongPeer::doSelect($critcopy, $con);
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
        return JurSpLongPeer::populateObjects(JurSpLongPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(JurSpLongPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            JurSpLongPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);

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
     * @param      JurSpLong $obj A JurSpLong object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getJurusanSpId(), (string) $obj->getSemesterId()));
            } // if key === null
            JurSpLongPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A JurSpLong object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof JurSpLong) {
                $key = serialize(array((string) $value->getJurusanSpId(), (string) $value->getSemesterId()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or JurSpLong object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(JurSpLongPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   JurSpLong Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(JurSpLongPeer::$instances[$key])) {
                return JurSpLongPeer::$instances[$key];
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
        foreach (JurSpLongPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        JurSpLongPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to jur_sp_long
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
        $cls = JurSpLongPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = JurSpLongPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = JurSpLongPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JurSpLongPeer::addInstanceToPool($obj, $key);
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
     * @return array (JurSpLong object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = JurSpLongPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = JurSpLongPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + JurSpLongPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JurSpLongPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            JurSpLongPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(JurSpLongPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurSpLongPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurSpLongPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurSpLongPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(JurSpLongPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurSpLongPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurSpLongPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurSpLongPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

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
     * Selects a collection of JurSpLong objects pre-filled with their Semester objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurSpLong objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);
        }

        JurSpLongPeer::addSelectColumns($criteria);
        $startcol = JurSpLongPeer::NUM_HYDRATE_COLUMNS;
        SemesterPeer::addSelectColumns($criteria);

        $criteria->addJoin(JurSpLongPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurSpLongPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurSpLongPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JurSpLongPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurSpLongPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (JurSpLong) to $obj2 (Semester)
                $obj2->addJurSpLong($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of JurSpLong objects pre-filled with their JurusanSp objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurSpLong objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJurusanSp(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);
        }

        JurSpLongPeer::addSelectColumns($criteria);
        $startcol = JurSpLongPeer::NUM_HYDRATE_COLUMNS;
        JurusanSpPeer::addSelectColumns($criteria);

        $criteria->addJoin(JurSpLongPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurSpLongPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurSpLongPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JurSpLongPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurSpLongPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (JurSpLong) to $obj2 (JurusanSp)
                $obj2->addJurSpLong($obj1);

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
        $criteria->setPrimaryTableName(JurSpLongPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurSpLongPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurSpLongPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurSpLongPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(JurSpLongPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

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
     * Selects a collection of JurSpLong objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurSpLong objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);
        }

        JurSpLongPeer::addSelectColumns($criteria);
        $startcol2 = JurSpLongPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurSpLongPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(JurSpLongPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurSpLongPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurSpLongPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurSpLongPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurSpLongPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Semester rows

            $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = SemesterPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (JurSpLong) to the collection in $obj2 (Semester)
                $obj2->addJurSpLong($obj1);
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

                // Add the $obj1 (JurSpLong) to the collection in $obj3 (JurusanSp)
                $obj3->addJurSpLong($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
        $criteria->setPrimaryTableName(JurSpLongPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurSpLongPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurSpLongPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JurSpLongPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(JurSpLongPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurSpLongPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurSpLongPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JurSpLongPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
     * Selects a collection of JurSpLong objects pre-filled with all related objects except Semester.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurSpLong objects.
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
            $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);
        }

        JurSpLongPeer::addSelectColumns($criteria);
        $startcol2 = JurSpLongPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurSpLongPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurSpLongPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurSpLongPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurSpLongPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurSpLongPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (JurSpLong) to the collection in $obj2 (JurusanSp)
                $obj2->addJurSpLong($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of JurSpLong objects pre-filled with all related objects except JurusanSp.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurSpLong objects.
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
            $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);
        }

        JurSpLongPeer::addSelectColumns($criteria);
        $startcol2 = JurSpLongPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurSpLongPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurSpLongPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurSpLongPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurSpLongPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurSpLongPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Semester rows

                $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SemesterPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (JurSpLong) to the collection in $obj2 (Semester)
                $obj2->addJurSpLong($obj1);

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
        return Propel::getDatabaseMap(JurSpLongPeer::DATABASE_NAME)->getTable(JurSpLongPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseJurSpLongPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseJurSpLongPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new JurSpLongTableMap());
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
        return JurSpLongPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a JurSpLong or Criteria object.
     *
     * @param      mixed $values Criteria or JurSpLong object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurSpLongPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from JurSpLong object
        }


        // Set the correct dbName
        $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a JurSpLong or Criteria object.
     *
     * @param      mixed $values Criteria or JurSpLong object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurSpLongPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(JurSpLongPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(JurSpLongPeer::JURUSAN_SP_ID);
            $value = $criteria->remove(JurSpLongPeer::JURUSAN_SP_ID);
            if ($value) {
                $selectCriteria->add(JurSpLongPeer::JURUSAN_SP_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JurSpLongPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(JurSpLongPeer::SEMESTER_ID);
            $value = $criteria->remove(JurSpLongPeer::SEMESTER_ID);
            if ($value) {
                $selectCriteria->add(JurSpLongPeer::SEMESTER_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JurSpLongPeer::TABLE_NAME);
            }

        } else { // $values is JurSpLong object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the jur_sp_long table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurSpLongPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(JurSpLongPeer::TABLE_NAME, $con, JurSpLongPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JurSpLongPeer::clearInstancePool();
            JurSpLongPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a JurSpLong or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or JurSpLong object or primary key or array of primary keys
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
            $con = Propel::getConnection(JurSpLongPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            JurSpLongPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof JurSpLong) { // it's a model object
            // invalidate the cache for this single object
            JurSpLongPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JurSpLongPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(JurSpLongPeer::JURUSAN_SP_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(JurSpLongPeer::SEMESTER_ID, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                JurSpLongPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(JurSpLongPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            JurSpLongPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given JurSpLong object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      JurSpLong $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(JurSpLongPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(JurSpLongPeer::TABLE_NAME);

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

        return BasePeer::doValidate(JurSpLongPeer::DATABASE_NAME, JurSpLongPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $jurusan_sp_id
     * @param   string $semester_id
     * @param      PropelPDO $con
     * @return   JurSpLong
     */
    public static function retrieveByPK($jurusan_sp_id, $semester_id, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $jurusan_sp_id, (string) $semester_id));
         if (null !== ($obj = JurSpLongPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(JurSpLongPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(JurSpLongPeer::DATABASE_NAME);
        $criteria->add(JurSpLongPeer::JURUSAN_SP_ID, $jurusan_sp_id);
        $criteria->add(JurSpLongPeer::SEMESTER_ID, $semester_id);
        $v = JurSpLongPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseJurSpLongPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseJurSpLongPeer::buildTableMap();

