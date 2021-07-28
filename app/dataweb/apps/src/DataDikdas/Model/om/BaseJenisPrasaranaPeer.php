<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisPrasarana;
use DataDikdas\Model\JenisPrasaranaPeer;
use DataDikdas\Model\map\JenisPrasaranaTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.jenis_prasarana' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisPrasaranaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.jenis_prasarana';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\JenisPrasarana';

    /** the related TableMap class for this table */
    const TM_CLASS = 'JenisPrasaranaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 11;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 11;

    /** the column name for the jenis_prasarana_id field */
    const JENIS_PRASARANA_ID = 'ref.jenis_prasarana.jenis_prasarana_id';

    /** the column name for the nama field */
    const NAMA = 'ref.jenis_prasarana.nama';

    /** the column name for the a_unit_organisasi field */
    const A_UNIT_ORGANISASI = 'ref.jenis_prasarana.a_unit_organisasi';

    /** the column name for the a_tanah field */
    const A_TANAH = 'ref.jenis_prasarana.a_tanah';

    /** the column name for the a_bangunan field */
    const A_BANGUNAN = 'ref.jenis_prasarana.a_bangunan';

    /** the column name for the a_ruang field */
    const A_RUANG = 'ref.jenis_prasarana.a_ruang';

    /** the column name for the a_sub field */
    const A_SUB = 'ref.jenis_prasarana.a_sub';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.jenis_prasarana.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.jenis_prasarana.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.jenis_prasarana.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.jenis_prasarana.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of JenisPrasarana objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array JenisPrasarana[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. JenisPrasaranaPeer::$fieldNames[JenisPrasaranaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('JenisPrasaranaId', 'Nama', 'AUnitOrganisasi', 'ATanah', 'ABangunan', 'ARuang', 'ASub', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jenisPrasaranaId', 'nama', 'aUnitOrganisasi', 'aTanah', 'aBangunan', 'aRuang', 'aSub', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (JenisPrasaranaPeer::JENIS_PRASARANA_ID, JenisPrasaranaPeer::NAMA, JenisPrasaranaPeer::A_UNIT_ORGANISASI, JenisPrasaranaPeer::A_TANAH, JenisPrasaranaPeer::A_BANGUNAN, JenisPrasaranaPeer::A_RUANG, JenisPrasaranaPeer::A_SUB, JenisPrasaranaPeer::CREATE_DATE, JenisPrasaranaPeer::LAST_UPDATE, JenisPrasaranaPeer::EXPIRED_DATE, JenisPrasaranaPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JENIS_PRASARANA_ID', 'NAMA', 'A_UNIT_ORGANISASI', 'A_TANAH', 'A_BANGUNAN', 'A_RUANG', 'A_SUB', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('jenis_prasarana_id', 'nama', 'a_unit_organisasi', 'a_tanah', 'a_bangunan', 'a_ruang', 'a_sub', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. JenisPrasaranaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('JenisPrasaranaId' => 0, 'Nama' => 1, 'AUnitOrganisasi' => 2, 'ATanah' => 3, 'ABangunan' => 4, 'ARuang' => 5, 'ASub' => 6, 'CreateDate' => 7, 'LastUpdate' => 8, 'ExpiredDate' => 9, 'LastSync' => 10, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jenisPrasaranaId' => 0, 'nama' => 1, 'aUnitOrganisasi' => 2, 'aTanah' => 3, 'aBangunan' => 4, 'aRuang' => 5, 'aSub' => 6, 'createDate' => 7, 'lastUpdate' => 8, 'expiredDate' => 9, 'lastSync' => 10, ),
        BasePeer::TYPE_COLNAME => array (JenisPrasaranaPeer::JENIS_PRASARANA_ID => 0, JenisPrasaranaPeer::NAMA => 1, JenisPrasaranaPeer::A_UNIT_ORGANISASI => 2, JenisPrasaranaPeer::A_TANAH => 3, JenisPrasaranaPeer::A_BANGUNAN => 4, JenisPrasaranaPeer::A_RUANG => 5, JenisPrasaranaPeer::A_SUB => 6, JenisPrasaranaPeer::CREATE_DATE => 7, JenisPrasaranaPeer::LAST_UPDATE => 8, JenisPrasaranaPeer::EXPIRED_DATE => 9, JenisPrasaranaPeer::LAST_SYNC => 10, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JENIS_PRASARANA_ID' => 0, 'NAMA' => 1, 'A_UNIT_ORGANISASI' => 2, 'A_TANAH' => 3, 'A_BANGUNAN' => 4, 'A_RUANG' => 5, 'A_SUB' => 6, 'CREATE_DATE' => 7, 'LAST_UPDATE' => 8, 'EXPIRED_DATE' => 9, 'LAST_SYNC' => 10, ),
        BasePeer::TYPE_FIELDNAME => array ('jenis_prasarana_id' => 0, 'nama' => 1, 'a_unit_organisasi' => 2, 'a_tanah' => 3, 'a_bangunan' => 4, 'a_ruang' => 5, 'a_sub' => 6, 'create_date' => 7, 'last_update' => 8, 'expired_date' => 9, 'last_sync' => 10, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
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
        $toNames = JenisPrasaranaPeer::getFieldNames($toType);
        $key = isset(JenisPrasaranaPeer::$fieldKeys[$fromType][$name]) ? JenisPrasaranaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(JenisPrasaranaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, JenisPrasaranaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return JenisPrasaranaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. JenisPrasaranaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(JenisPrasaranaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(JenisPrasaranaPeer::JENIS_PRASARANA_ID);
            $criteria->addSelectColumn(JenisPrasaranaPeer::NAMA);
            $criteria->addSelectColumn(JenisPrasaranaPeer::A_UNIT_ORGANISASI);
            $criteria->addSelectColumn(JenisPrasaranaPeer::A_TANAH);
            $criteria->addSelectColumn(JenisPrasaranaPeer::A_BANGUNAN);
            $criteria->addSelectColumn(JenisPrasaranaPeer::A_RUANG);
            $criteria->addSelectColumn(JenisPrasaranaPeer::A_SUB);
            $criteria->addSelectColumn(JenisPrasaranaPeer::CREATE_DATE);
            $criteria->addSelectColumn(JenisPrasaranaPeer::LAST_UPDATE);
            $criteria->addSelectColumn(JenisPrasaranaPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(JenisPrasaranaPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.jenis_prasarana_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.a_unit_organisasi');
            $criteria->addSelectColumn($alias . '.a_tanah');
            $criteria->addSelectColumn($alias . '.a_bangunan');
            $criteria->addSelectColumn($alias . '.a_ruang');
            $criteria->addSelectColumn($alias . '.a_sub');
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
        $criteria->setPrimaryTableName(JenisPrasaranaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JenisPrasaranaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(JenisPrasaranaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(JenisPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisPrasarana
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = JenisPrasaranaPeer::doSelect($critcopy, $con);
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
        return JenisPrasaranaPeer::populateObjects(JenisPrasaranaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(JenisPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            JenisPrasaranaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(JenisPrasaranaPeer::DATABASE_NAME);

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
     * @param      JenisPrasarana $obj A JenisPrasarana object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getJenisPrasaranaId();
            } // if key === null
            JenisPrasaranaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A JenisPrasarana object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof JenisPrasarana) {
                $key = (string) $value->getJenisPrasaranaId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or JenisPrasarana object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(JenisPrasaranaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   JenisPrasarana Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(JenisPrasaranaPeer::$instances[$key])) {
                return JenisPrasaranaPeer::$instances[$key];
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
        foreach (JenisPrasaranaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        JenisPrasaranaPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.jenis_prasarana
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
        $cls = JenisPrasaranaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = JenisPrasaranaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JenisPrasaranaPeer::addInstanceToPool($obj, $key);
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
     * @return array (JenisPrasarana object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = JenisPrasaranaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = JenisPrasaranaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + JenisPrasaranaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JenisPrasaranaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            JenisPrasaranaPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(JenisPrasaranaPeer::DATABASE_NAME)->getTable(JenisPrasaranaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseJenisPrasaranaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseJenisPrasaranaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new JenisPrasaranaTableMap());
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
        return JenisPrasaranaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a JenisPrasarana or Criteria object.
     *
     * @param      mixed $values Criteria or JenisPrasarana object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from JenisPrasarana object
        }


        // Set the correct dbName
        $criteria->setDbName(JenisPrasaranaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a JenisPrasarana or Criteria object.
     *
     * @param      mixed $values Criteria or JenisPrasarana object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(JenisPrasaranaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(JenisPrasaranaPeer::JENIS_PRASARANA_ID);
            $value = $criteria->remove(JenisPrasaranaPeer::JENIS_PRASARANA_ID);
            if ($value) {
                $selectCriteria->add(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JenisPrasaranaPeer::TABLE_NAME);
            }

        } else { // $values is JenisPrasarana object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(JenisPrasaranaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.jenis_prasarana table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(JenisPrasaranaPeer::TABLE_NAME, $con, JenisPrasaranaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JenisPrasaranaPeer::clearInstancePool();
            JenisPrasaranaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a JenisPrasarana or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or JenisPrasarana object or primary key or array of primary keys
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
            $con = Propel::getConnection(JenisPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            JenisPrasaranaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof JenisPrasarana) { // it's a model object
            // invalidate the cache for this single object
            JenisPrasaranaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JenisPrasaranaPeer::DATABASE_NAME);
            $criteria->add(JenisPrasaranaPeer::JENIS_PRASARANA_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                JenisPrasaranaPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(JenisPrasaranaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            JenisPrasaranaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given JenisPrasarana object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      JenisPrasarana $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(JenisPrasaranaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(JenisPrasaranaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(JenisPrasaranaPeer::DATABASE_NAME, JenisPrasaranaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return JenisPrasarana
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = JenisPrasaranaPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(JenisPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(JenisPrasaranaPeer::DATABASE_NAME);
        $criteria->add(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $pk);

        $v = JenisPrasaranaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return JenisPrasarana[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(JenisPrasaranaPeer::DATABASE_NAME);
            $criteria->add(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $pks, Criteria::IN);
            $objs = JenisPrasaranaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseJenisPrasaranaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseJenisPrasaranaPeer::buildTableMap();

