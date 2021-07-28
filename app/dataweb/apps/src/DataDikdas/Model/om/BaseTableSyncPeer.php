<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\TableSync;
use DataDikdas\Model\TableSyncPeer;
use DataDikdas\Model\map\TableSyncTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.table_sync' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseTableSyncPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.table_sync';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\TableSync';

    /** the related TableMap class for this table */
    const TM_CLASS = 'TableSyncTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 11;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 11;

    /** the column name for the table_name field */
    const TABLE_NAME = 'ref.table_sync.table_name';

    /** the column name for the table_alias field */
    const TABLE_ALIAS = 'ref.table_sync.table_alias';

    /** the column name for the sync_type field */
    const SYNC_TYPE = 'ref.table_sync.sync_type';

    /** the column name for the sync_seq field */
    const SYNC_SEQ = 'ref.table_sync.sync_seq';

    /** the column name for the kolom_kecuali field */
    const KOLOM_KECUALI = 'ref.table_sync.kolom_kecuali';

    /** the column name for the table_status field */
    const TABLE_STATUS = 'ref.table_sync.table_status';

    /** the column name for the table_ket field */
    const TABLE_KET = 'ref.table_sync.table_ket';

    /** the column name for the jml_thread field */
    const JML_THREAD = 'ref.table_sync.jml_thread';

    /** the column name for the baris_per_thread field */
    const BARIS_PER_THREAD = 'ref.table_sync.baris_per_thread';

    /** the column name for the order_ekstra field */
    const ORDER_EKSTRA = 'ref.table_sync.order_ekstra';

    /** the column name for the a_table_aktif field */
    const A_TABLE_AKTIF = 'ref.table_sync.a_table_aktif';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of TableSync objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array TableSync[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. TableSyncPeer::$fieldNames[TableSyncPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('TableName', 'TableAlias', 'SyncType', 'SyncSeq', 'KolomKecuali', 'TableStatus', 'TableKet', 'JmlThread', 'BarisPerThread', 'OrderEkstra', 'ATableAktif', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('tableName', 'tableAlias', 'syncType', 'syncSeq', 'kolomKecuali', 'tableStatus', 'tableKet', 'jmlThread', 'barisPerThread', 'orderEkstra', 'aTableAktif', ),
        BasePeer::TYPE_COLNAME => array (TableSyncPeer::TABLE_NAME, TableSyncPeer::TABLE_ALIAS, TableSyncPeer::SYNC_TYPE, TableSyncPeer::SYNC_SEQ, TableSyncPeer::KOLOM_KECUALI, TableSyncPeer::TABLE_STATUS, TableSyncPeer::TABLE_KET, TableSyncPeer::JML_THREAD, TableSyncPeer::BARIS_PER_THREAD, TableSyncPeer::ORDER_EKSTRA, TableSyncPeer::A_TABLE_AKTIF, ),
        BasePeer::TYPE_RAW_COLNAME => array ('TABLE_NAME', 'TABLE_ALIAS', 'SYNC_TYPE', 'SYNC_SEQ', 'KOLOM_KECUALI', 'TABLE_STATUS', 'TABLE_KET', 'JML_THREAD', 'BARIS_PER_THREAD', 'ORDER_EKSTRA', 'A_TABLE_AKTIF', ),
        BasePeer::TYPE_FIELDNAME => array ('table_name', 'table_alias', 'sync_type', 'sync_seq', 'kolom_kecuali', 'table_status', 'table_ket', 'jml_thread', 'baris_per_thread', 'order_ekstra', 'a_table_aktif', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. TableSyncPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('TableName' => 0, 'TableAlias' => 1, 'SyncType' => 2, 'SyncSeq' => 3, 'KolomKecuali' => 4, 'TableStatus' => 5, 'TableKet' => 6, 'JmlThread' => 7, 'BarisPerThread' => 8, 'OrderEkstra' => 9, 'ATableAktif' => 10, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('tableName' => 0, 'tableAlias' => 1, 'syncType' => 2, 'syncSeq' => 3, 'kolomKecuali' => 4, 'tableStatus' => 5, 'tableKet' => 6, 'jmlThread' => 7, 'barisPerThread' => 8, 'orderEkstra' => 9, 'aTableAktif' => 10, ),
        BasePeer::TYPE_COLNAME => array (TableSyncPeer::TABLE_NAME => 0, TableSyncPeer::TABLE_ALIAS => 1, TableSyncPeer::SYNC_TYPE => 2, TableSyncPeer::SYNC_SEQ => 3, TableSyncPeer::KOLOM_KECUALI => 4, TableSyncPeer::TABLE_STATUS => 5, TableSyncPeer::TABLE_KET => 6, TableSyncPeer::JML_THREAD => 7, TableSyncPeer::BARIS_PER_THREAD => 8, TableSyncPeer::ORDER_EKSTRA => 9, TableSyncPeer::A_TABLE_AKTIF => 10, ),
        BasePeer::TYPE_RAW_COLNAME => array ('TABLE_NAME' => 0, 'TABLE_ALIAS' => 1, 'SYNC_TYPE' => 2, 'SYNC_SEQ' => 3, 'KOLOM_KECUALI' => 4, 'TABLE_STATUS' => 5, 'TABLE_KET' => 6, 'JML_THREAD' => 7, 'BARIS_PER_THREAD' => 8, 'ORDER_EKSTRA' => 9, 'A_TABLE_AKTIF' => 10, ),
        BasePeer::TYPE_FIELDNAME => array ('table_name' => 0, 'table_alias' => 1, 'sync_type' => 2, 'sync_seq' => 3, 'kolom_kecuali' => 4, 'table_status' => 5, 'table_ket' => 6, 'jml_thread' => 7, 'baris_per_thread' => 8, 'order_ekstra' => 9, 'a_table_aktif' => 10, ),
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
        $toNames = TableSyncPeer::getFieldNames($toType);
        $key = isset(TableSyncPeer::$fieldKeys[$fromType][$name]) ? TableSyncPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(TableSyncPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, TableSyncPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return TableSyncPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. TableSyncPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(TableSyncPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(TableSyncPeer::TABLE_NAME);
            $criteria->addSelectColumn(TableSyncPeer::TABLE_ALIAS);
            $criteria->addSelectColumn(TableSyncPeer::SYNC_TYPE);
            $criteria->addSelectColumn(TableSyncPeer::SYNC_SEQ);
            $criteria->addSelectColumn(TableSyncPeer::KOLOM_KECUALI);
            $criteria->addSelectColumn(TableSyncPeer::TABLE_STATUS);
            $criteria->addSelectColumn(TableSyncPeer::TABLE_KET);
            $criteria->addSelectColumn(TableSyncPeer::JML_THREAD);
            $criteria->addSelectColumn(TableSyncPeer::BARIS_PER_THREAD);
            $criteria->addSelectColumn(TableSyncPeer::ORDER_EKSTRA);
            $criteria->addSelectColumn(TableSyncPeer::A_TABLE_AKTIF);
        } else {
            $criteria->addSelectColumn($alias . '.table_name');
            $criteria->addSelectColumn($alias . '.table_alias');
            $criteria->addSelectColumn($alias . '.sync_type');
            $criteria->addSelectColumn($alias . '.sync_seq');
            $criteria->addSelectColumn($alias . '.kolom_kecuali');
            $criteria->addSelectColumn($alias . '.table_status');
            $criteria->addSelectColumn($alias . '.table_ket');
            $criteria->addSelectColumn($alias . '.jml_thread');
            $criteria->addSelectColumn($alias . '.baris_per_thread');
            $criteria->addSelectColumn($alias . '.order_ekstra');
            $criteria->addSelectColumn($alias . '.a_table_aktif');
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
        $criteria->setPrimaryTableName(TableSyncPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TableSyncPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(TableSyncPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(TableSyncPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TableSync
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = TableSyncPeer::doSelect($critcopy, $con);
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
        return TableSyncPeer::populateObjects(TableSyncPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(TableSyncPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            TableSyncPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(TableSyncPeer::DATABASE_NAME);

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
     * @param      TableSync $obj A TableSync object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getTableName();
            } // if key === null
            TableSyncPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A TableSync object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof TableSync) {
                $key = (string) $value->getTableName();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or TableSync object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(TableSyncPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   TableSync Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(TableSyncPeer::$instances[$key])) {
                return TableSyncPeer::$instances[$key];
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
        foreach (TableSyncPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        TableSyncPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.table_sync
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
        $cls = TableSyncPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = TableSyncPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = TableSyncPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TableSyncPeer::addInstanceToPool($obj, $key);
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
     * @return array (TableSync object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = TableSyncPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = TableSyncPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + TableSyncPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TableSyncPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            TableSyncPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(TableSyncPeer::DATABASE_NAME)->getTable(TableSyncPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseTableSyncPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseTableSyncPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new TableSyncTableMap());
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
        return TableSyncPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a TableSync or Criteria object.
     *
     * @param      mixed $values Criteria or TableSync object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TableSyncPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from TableSync object
        }


        // Set the correct dbName
        $criteria->setDbName(TableSyncPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a TableSync or Criteria object.
     *
     * @param      mixed $values Criteria or TableSync object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TableSyncPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(TableSyncPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(TableSyncPeer::TABLE_NAME);
            $value = $criteria->remove(TableSyncPeer::TABLE_NAME);
            if ($value) {
                $selectCriteria->add(TableSyncPeer::TABLE_NAME, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TableSyncPeer::TABLE_NAME);
            }

        } else { // $values is TableSync object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(TableSyncPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.table_sync table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TableSyncPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(TableSyncPeer::TABLE_NAME, $con, TableSyncPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TableSyncPeer::clearInstancePool();
            TableSyncPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a TableSync or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or TableSync object or primary key or array of primary keys
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
            $con = Propel::getConnection(TableSyncPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            TableSyncPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof TableSync) { // it's a model object
            // invalidate the cache for this single object
            TableSyncPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TableSyncPeer::DATABASE_NAME);
            $criteria->add(TableSyncPeer::TABLE_NAME, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                TableSyncPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(TableSyncPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            TableSyncPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given TableSync object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      TableSync $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(TableSyncPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(TableSyncPeer::TABLE_NAME);

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

        return BasePeer::doValidate(TableSyncPeer::DATABASE_NAME, TableSyncPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return TableSync
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = TableSyncPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(TableSyncPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(TableSyncPeer::DATABASE_NAME);
        $criteria->add(TableSyncPeer::TABLE_NAME, $pk);

        $v = TableSyncPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return TableSync[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TableSyncPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(TableSyncPeer::DATABASE_NAME);
            $criteria->add(TableSyncPeer::TABLE_NAME, $pks, Criteria::IN);
            $objs = TableSyncPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseTableSyncPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTableSyncPeer::buildTableMap();

