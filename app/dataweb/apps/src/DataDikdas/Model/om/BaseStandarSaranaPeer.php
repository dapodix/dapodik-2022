<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BentukPendidikanPeer;
use DataDikdas\Model\JenisPrasaranaPeer;
use DataDikdas\Model\JenisSaranaPeer;
use DataDikdas\Model\JurusanPeer;
use DataDikdas\Model\StandarSarana;
use DataDikdas\Model\StandarSaranaPeer;
use DataDikdas\Model\map\StandarSaranaTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.standar_sarana' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseStandarSaranaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.standar_sarana';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\StandarSarana';

    /** the related TableMap class for this table */
    const TM_CLASS = 'StandarSaranaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 10;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 10;

    /** the column name for the id_std_sarana field */
    const ID_STD_SARANA = 'ref.standar_sarana.id_std_sarana';

    /** the column name for the jenis_prasarana_id field */
    const JENIS_PRASARANA_ID = 'ref.standar_sarana.jenis_prasarana_id';

    /** the column name for the jenis_sarana_id field */
    const JENIS_SARANA_ID = 'ref.standar_sarana.jenis_sarana_id';

    /** the column name for the jurusan_id field */
    const JURUSAN_ID = 'ref.standar_sarana.jurusan_id';

    /** the column name for the bentuk_pendidikan_id field */
    const BENTUK_PENDIDIKAN_ID = 'ref.standar_sarana.bentuk_pendidikan_id';

    /** the column name for the a_harus_ada field */
    const A_HARUS_ADA = 'ref.standar_sarana.a_harus_ada';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.standar_sarana.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.standar_sarana.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.standar_sarana.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.standar_sarana.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of StandarSarana objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array StandarSarana[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. StandarSaranaPeer::$fieldNames[StandarSaranaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdStdSarana', 'JenisPrasaranaId', 'JenisSaranaId', 'JurusanId', 'BentukPendidikanId', 'AHarusAda', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idStdSarana', 'jenisPrasaranaId', 'jenisSaranaId', 'jurusanId', 'bentukPendidikanId', 'aHarusAda', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (StandarSaranaPeer::ID_STD_SARANA, StandarSaranaPeer::JENIS_PRASARANA_ID, StandarSaranaPeer::JENIS_SARANA_ID, StandarSaranaPeer::JURUSAN_ID, StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, StandarSaranaPeer::A_HARUS_ADA, StandarSaranaPeer::CREATE_DATE, StandarSaranaPeer::LAST_UPDATE, StandarSaranaPeer::EXPIRED_DATE, StandarSaranaPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_STD_SARANA', 'JENIS_PRASARANA_ID', 'JENIS_SARANA_ID', 'JURUSAN_ID', 'BENTUK_PENDIDIKAN_ID', 'A_HARUS_ADA', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('id_std_sarana', 'jenis_prasarana_id', 'jenis_sarana_id', 'jurusan_id', 'bentuk_pendidikan_id', 'a_harus_ada', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. StandarSaranaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdStdSarana' => 0, 'JenisPrasaranaId' => 1, 'JenisSaranaId' => 2, 'JurusanId' => 3, 'BentukPendidikanId' => 4, 'AHarusAda' => 5, 'CreateDate' => 6, 'LastUpdate' => 7, 'ExpiredDate' => 8, 'LastSync' => 9, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idStdSarana' => 0, 'jenisPrasaranaId' => 1, 'jenisSaranaId' => 2, 'jurusanId' => 3, 'bentukPendidikanId' => 4, 'aHarusAda' => 5, 'createDate' => 6, 'lastUpdate' => 7, 'expiredDate' => 8, 'lastSync' => 9, ),
        BasePeer::TYPE_COLNAME => array (StandarSaranaPeer::ID_STD_SARANA => 0, StandarSaranaPeer::JENIS_PRASARANA_ID => 1, StandarSaranaPeer::JENIS_SARANA_ID => 2, StandarSaranaPeer::JURUSAN_ID => 3, StandarSaranaPeer::BENTUK_PENDIDIKAN_ID => 4, StandarSaranaPeer::A_HARUS_ADA => 5, StandarSaranaPeer::CREATE_DATE => 6, StandarSaranaPeer::LAST_UPDATE => 7, StandarSaranaPeer::EXPIRED_DATE => 8, StandarSaranaPeer::LAST_SYNC => 9, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_STD_SARANA' => 0, 'JENIS_PRASARANA_ID' => 1, 'JENIS_SARANA_ID' => 2, 'JURUSAN_ID' => 3, 'BENTUK_PENDIDIKAN_ID' => 4, 'A_HARUS_ADA' => 5, 'CREATE_DATE' => 6, 'LAST_UPDATE' => 7, 'EXPIRED_DATE' => 8, 'LAST_SYNC' => 9, ),
        BasePeer::TYPE_FIELDNAME => array ('id_std_sarana' => 0, 'jenis_prasarana_id' => 1, 'jenis_sarana_id' => 2, 'jurusan_id' => 3, 'bentuk_pendidikan_id' => 4, 'a_harus_ada' => 5, 'create_date' => 6, 'last_update' => 7, 'expired_date' => 8, 'last_sync' => 9, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
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
        $toNames = StandarSaranaPeer::getFieldNames($toType);
        $key = isset(StandarSaranaPeer::$fieldKeys[$fromType][$name]) ? StandarSaranaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(StandarSaranaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, StandarSaranaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return StandarSaranaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. StandarSaranaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(StandarSaranaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(StandarSaranaPeer::ID_STD_SARANA);
            $criteria->addSelectColumn(StandarSaranaPeer::JENIS_PRASARANA_ID);
            $criteria->addSelectColumn(StandarSaranaPeer::JENIS_SARANA_ID);
            $criteria->addSelectColumn(StandarSaranaPeer::JURUSAN_ID);
            $criteria->addSelectColumn(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID);
            $criteria->addSelectColumn(StandarSaranaPeer::A_HARUS_ADA);
            $criteria->addSelectColumn(StandarSaranaPeer::CREATE_DATE);
            $criteria->addSelectColumn(StandarSaranaPeer::LAST_UPDATE);
            $criteria->addSelectColumn(StandarSaranaPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(StandarSaranaPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.id_std_sarana');
            $criteria->addSelectColumn($alias . '.jenis_prasarana_id');
            $criteria->addSelectColumn($alias . '.jenis_sarana_id');
            $criteria->addSelectColumn($alias . '.jurusan_id');
            $criteria->addSelectColumn($alias . '.bentuk_pendidikan_id');
            $criteria->addSelectColumn($alias . '.a_harus_ada');
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
        $criteria->setPrimaryTableName(StandarSaranaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StandarSaranaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 StandarSarana
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = StandarSaranaPeer::doSelect($critcopy, $con);
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
        return StandarSaranaPeer::populateObjects(StandarSaranaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            StandarSaranaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

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
     * @param      StandarSarana $obj A StandarSarana object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdStdSarana();
            } // if key === null
            StandarSaranaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A StandarSarana object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof StandarSarana) {
                $key = (string) $value->getIdStdSarana();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or StandarSarana object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(StandarSaranaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   StandarSarana Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(StandarSaranaPeer::$instances[$key])) {
                return StandarSaranaPeer::$instances[$key];
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
        foreach (StandarSaranaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        StandarSaranaPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.standar_sarana
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
        $cls = StandarSaranaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = StandarSaranaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = StandarSaranaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                StandarSaranaPeer::addInstanceToPool($obj, $key);
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
     * @return array (StandarSarana object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = StandarSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = StandarSaranaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + StandarSaranaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = StandarSaranaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            StandarSaranaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisSarana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisSarana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StandarSaranaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StandarSaranaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StandarSaranaPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related BentukPendidikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBentukPendidikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StandarSaranaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StandarSaranaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisPrasarana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisPrasarana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StandarSaranaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StandarSaranaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StandarSaranaPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Jurusan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJurusan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StandarSaranaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StandarSaranaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StandarSaranaPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

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
     * Selects a collection of StandarSarana objects pre-filled with their JenisSarana objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StandarSarana objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisSarana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);
        }

        StandarSaranaPeer::addSelectColumns($criteria);
        $startcol = StandarSaranaPeer::NUM_HYDRATE_COLUMNS;
        JenisSaranaPeer::addSelectColumns($criteria);

        $criteria->addJoin(StandarSaranaPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StandarSaranaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StandarSaranaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StandarSaranaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StandarSaranaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisSaranaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisSaranaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisSaranaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (StandarSarana) to $obj2 (JenisSarana)
                $obj2->addStandarSarana($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of StandarSarana objects pre-filled with their BentukPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StandarSarana objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBentukPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);
        }

        StandarSaranaPeer::addSelectColumns($criteria);
        $startcol = StandarSaranaPeer::NUM_HYDRATE_COLUMNS;
        BentukPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StandarSaranaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StandarSaranaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StandarSaranaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StandarSaranaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BentukPendidikanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BentukPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BentukPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (StandarSarana) to $obj2 (BentukPendidikan)
                $obj2->addStandarSarana($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of StandarSarana objects pre-filled with their JenisPrasarana objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StandarSarana objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisPrasarana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);
        }

        StandarSaranaPeer::addSelectColumns($criteria);
        $startcol = StandarSaranaPeer::NUM_HYDRATE_COLUMNS;
        JenisPrasaranaPeer::addSelectColumns($criteria);

        $criteria->addJoin(StandarSaranaPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StandarSaranaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StandarSaranaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StandarSaranaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StandarSaranaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisPrasaranaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisPrasaranaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisPrasaranaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (StandarSarana) to $obj2 (JenisPrasarana)
                $obj2->addStandarSarana($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of StandarSarana objects pre-filled with their Jurusan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StandarSarana objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJurusan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);
        }

        StandarSaranaPeer::addSelectColumns($criteria);
        $startcol = StandarSaranaPeer::NUM_HYDRATE_COLUMNS;
        JurusanPeer::addSelectColumns($criteria);

        $criteria->addJoin(StandarSaranaPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StandarSaranaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StandarSaranaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = StandarSaranaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StandarSaranaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JurusanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JurusanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JurusanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (StandarSarana) to $obj2 (Jurusan)
                $obj2->addStandarSarana($obj1);

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
        $criteria->setPrimaryTableName(StandarSaranaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StandarSaranaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(StandarSaranaPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

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
     * Selects a collection of StandarSarana objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StandarSarana objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);
        }

        StandarSaranaPeer::addSelectColumns($criteria);
        $startcol2 = StandarSaranaPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        BentukPendidikanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BentukPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StandarSaranaPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StandarSaranaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StandarSaranaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StandarSaranaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StandarSaranaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined JenisSarana rows

            $key2 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = JenisSaranaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisSaranaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisSaranaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj2 (JenisSarana)
                $obj2->addStandarSarana($obj1);
            } // if joined row not null

            // Add objects for joined BentukPendidikan rows

            $key3 = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = BentukPendidikanPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = BentukPendidikanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BentukPendidikanPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj3 (BentukPendidikan)
                $obj3->addStandarSarana($obj1);
            } // if joined row not null

            // Add objects for joined JenisPrasarana rows

            $key4 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = JenisPrasaranaPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = JenisPrasaranaPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisPrasaranaPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj4 (JenisPrasarana)
                $obj4->addStandarSarana($obj1);
            } // if joined row not null

            // Add objects for joined Jurusan rows

            $key5 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = JurusanPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = JurusanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JurusanPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj5 (Jurusan)
                $obj5->addStandarSarana($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisSarana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisSarana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StandarSaranaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StandarSaranaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related BentukPendidikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBentukPendidikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StandarSaranaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StandarSaranaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(StandarSaranaPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisPrasarana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisPrasarana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StandarSaranaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StandarSaranaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(StandarSaranaPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Jurusan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJurusan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(StandarSaranaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            StandarSaranaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(StandarSaranaPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

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
     * Selects a collection of StandarSarana objects pre-filled with all related objects except JenisSarana.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StandarSarana objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisSarana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);
        }

        StandarSaranaPeer::addSelectColumns($criteria);
        $startcol2 = StandarSaranaPeer::NUM_HYDRATE_COLUMNS;

        BentukPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BentukPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StandarSaranaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StandarSaranaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StandarSaranaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StandarSaranaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BentukPendidikan rows

                $key2 = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BentukPendidikanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BentukPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BentukPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj2 (BentukPendidikan)
                $obj2->addStandarSarana($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPrasarana rows

                $key3 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisPrasaranaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisPrasaranaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj3 (JenisPrasarana)
                $obj3->addStandarSarana($obj1);

            } // if joined row is not null

                // Add objects for joined Jurusan rows

                $key4 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JurusanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JurusanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj4 (Jurusan)
                $obj4->addStandarSarana($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of StandarSarana objects pre-filled with all related objects except BentukPendidikan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StandarSarana objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBentukPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);
        }

        StandarSaranaPeer::addSelectColumns($criteria);
        $startcol2 = StandarSaranaPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StandarSaranaPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StandarSaranaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StandarSaranaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StandarSaranaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StandarSaranaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisSarana rows

                $key2 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisSaranaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisSaranaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisSaranaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj2 (JenisSarana)
                $obj2->addStandarSarana($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPrasarana rows

                $key3 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisPrasaranaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisPrasaranaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj3 (JenisPrasarana)
                $obj3->addStandarSarana($obj1);

            } // if joined row is not null

                // Add objects for joined Jurusan rows

                $key4 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JurusanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JurusanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj4 (Jurusan)
                $obj4->addStandarSarana($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of StandarSarana objects pre-filled with all related objects except JenisPrasarana.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StandarSarana objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisPrasarana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);
        }

        StandarSaranaPeer::addSelectColumns($criteria);
        $startcol2 = StandarSaranaPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        BentukPendidikanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BentukPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StandarSaranaPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StandarSaranaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StandarSaranaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StandarSaranaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StandarSaranaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisSarana rows

                $key2 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisSaranaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisSaranaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisSaranaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj2 (JenisSarana)
                $obj2->addStandarSarana($obj1);

            } // if joined row is not null

                // Add objects for joined BentukPendidikan rows

                $key3 = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BentukPendidikanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BentukPendidikanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BentukPendidikanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj3 (BentukPendidikan)
                $obj3->addStandarSarana($obj1);

            } // if joined row is not null

                // Add objects for joined Jurusan rows

                $key4 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JurusanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JurusanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj4 (Jurusan)
                $obj4->addStandarSarana($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of StandarSarana objects pre-filled with all related objects except Jurusan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of StandarSarana objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJurusan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);
        }

        StandarSaranaPeer::addSelectColumns($criteria);
        $startcol2 = StandarSaranaPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        BentukPendidikanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BentukPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JenisPrasaranaPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(StandarSaranaPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(StandarSaranaPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::JENIS_PRASARANA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = StandarSaranaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = StandarSaranaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = StandarSaranaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                StandarSaranaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisSarana rows

                $key2 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisSaranaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisSaranaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisSaranaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj2 (JenisSarana)
                $obj2->addStandarSarana($obj1);

            } // if joined row is not null

                // Add objects for joined BentukPendidikan rows

                $key3 = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BentukPendidikanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BentukPendidikanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BentukPendidikanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj3 (BentukPendidikan)
                $obj3->addStandarSarana($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPrasarana rows

                $key4 = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisPrasaranaPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisPrasaranaPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisPrasaranaPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (StandarSarana) to the collection in $obj4 (JenisPrasarana)
                $obj4->addStandarSarana($obj1);

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
        return Propel::getDatabaseMap(StandarSaranaPeer::DATABASE_NAME)->getTable(StandarSaranaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseStandarSaranaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseStandarSaranaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new StandarSaranaTableMap());
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
        return StandarSaranaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a StandarSarana or Criteria object.
     *
     * @param      mixed $values Criteria or StandarSarana object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from StandarSarana object
        }


        // Set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a StandarSarana or Criteria object.
     *
     * @param      mixed $values Criteria or StandarSarana object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(StandarSaranaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(StandarSaranaPeer::ID_STD_SARANA);
            $value = $criteria->remove(StandarSaranaPeer::ID_STD_SARANA);
            if ($value) {
                $selectCriteria->add(StandarSaranaPeer::ID_STD_SARANA, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(StandarSaranaPeer::TABLE_NAME);
            }

        } else { // $values is StandarSarana object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.standar_sarana table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(StandarSaranaPeer::TABLE_NAME, $con, StandarSaranaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StandarSaranaPeer::clearInstancePool();
            StandarSaranaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a StandarSarana or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or StandarSarana object or primary key or array of primary keys
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
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            StandarSaranaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof StandarSarana) { // it's a model object
            // invalidate the cache for this single object
            StandarSaranaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(StandarSaranaPeer::DATABASE_NAME);
            $criteria->add(StandarSaranaPeer::ID_STD_SARANA, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                StandarSaranaPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(StandarSaranaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            StandarSaranaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given StandarSarana object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      StandarSarana $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(StandarSaranaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(StandarSaranaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(StandarSaranaPeer::DATABASE_NAME, StandarSaranaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return StandarSarana
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = StandarSaranaPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(StandarSaranaPeer::DATABASE_NAME);
        $criteria->add(StandarSaranaPeer::ID_STD_SARANA, $pk);

        $v = StandarSaranaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return StandarSarana[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(StandarSaranaPeer::DATABASE_NAME);
            $criteria->add(StandarSaranaPeer::ID_STD_SARANA, $pks, Criteria::IN);
            $objs = StandarSaranaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseStandarSaranaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseStandarSaranaPeer::buildTableMap();

