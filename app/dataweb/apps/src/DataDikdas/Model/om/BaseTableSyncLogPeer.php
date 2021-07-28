<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\InstalasiPeer;
use DataDikdas\Model\TableSyncLog;
use DataDikdas\Model\TableSyncLogPeer;
use DataDikdas\Model\TableSyncPeer;
use DataDikdas\Model\map\TableSyncLogTableMap;

/**
 * Base static class for performing query and update operations on the 'table_sync_log' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseTableSyncLogPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'table_sync_log';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\TableSyncLog';

    /** the related TableMap class for this table */
    const TM_CLASS = 'TableSyncLogTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 15;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 15;

    /** the column name for the table_name field */
    const TABLE_NAME = 'table_sync_log.table_name';

    /** the column name for the id_instalasi field */
    const ID_INSTALASI = 'table_sync_log.id_instalasi';

    /** the column name for the begin_sync field */
    const BEGIN_SYNC = 'table_sync_log.begin_sync';

    /** the column name for the end_sync field */
    const END_SYNC = 'table_sync_log.end_sync';

    /** the column name for the sync_media field */
    const SYNC_MEDIA = 'table_sync_log.sync_media';

    /** the column name for the is_success field */
    const IS_SUCCESS = 'table_sync_log.is_success';

    /** the column name for the selisih_waktu_server field */
    const SELISIH_WAKTU_SERVER = 'table_sync_log.selisih_waktu_server';

    /** the column name for the n_create field */
    const N_CREATE = 'table_sync_log.n_create';

    /** the column name for the n_update field */
    const N_UPDATE = 'table_sync_log.n_update';

    /** the column name for the n_hapus field */
    const N_HAPUS = 'table_sync_log.n_hapus';

    /** the column name for the n_konflik field */
    const N_KONFLIK = 'table_sync_log.n_konflik';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'table_sync_log.last_update';

    /** the column name for the sync_page field */
    const SYNC_PAGE = 'table_sync_log.sync_page';

    /** the column name for the alamat_ip field */
    const ALAMAT_IP = 'table_sync_log.alamat_ip';

    /** the column name for the pengguna_id field */
    const PENGGUNA_ID = 'table_sync_log.pengguna_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of TableSyncLog objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array TableSyncLog[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. TableSyncLogPeer::$fieldNames[TableSyncLogPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('TableName', 'IdInstalasi', 'BeginSync', 'EndSync', 'SyncMedia', 'IsSuccess', 'SelisihWaktuServer', 'NCreate', 'NUpdate', 'NHapus', 'NKonflik', 'LastUpdate', 'SyncPage', 'AlamatIp', 'PenggunaId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('tableName', 'idInstalasi', 'beginSync', 'endSync', 'syncMedia', 'isSuccess', 'selisihWaktuServer', 'nCreate', 'nUpdate', 'nHapus', 'nKonflik', 'lastUpdate', 'syncPage', 'alamatIp', 'penggunaId', ),
        BasePeer::TYPE_COLNAME => array (TableSyncLogPeer::TABLE_NAME, TableSyncLogPeer::ID_INSTALASI, TableSyncLogPeer::BEGIN_SYNC, TableSyncLogPeer::END_SYNC, TableSyncLogPeer::SYNC_MEDIA, TableSyncLogPeer::IS_SUCCESS, TableSyncLogPeer::SELISIH_WAKTU_SERVER, TableSyncLogPeer::N_CREATE, TableSyncLogPeer::N_UPDATE, TableSyncLogPeer::N_HAPUS, TableSyncLogPeer::N_KONFLIK, TableSyncLogPeer::LAST_UPDATE, TableSyncLogPeer::SYNC_PAGE, TableSyncLogPeer::ALAMAT_IP, TableSyncLogPeer::PENGGUNA_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('TABLE_NAME', 'ID_INSTALASI', 'BEGIN_SYNC', 'END_SYNC', 'SYNC_MEDIA', 'IS_SUCCESS', 'SELISIH_WAKTU_SERVER', 'N_CREATE', 'N_UPDATE', 'N_HAPUS', 'N_KONFLIK', 'LAST_UPDATE', 'SYNC_PAGE', 'ALAMAT_IP', 'PENGGUNA_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('table_name', 'id_instalasi', 'begin_sync', 'end_sync', 'sync_media', 'is_success', 'selisih_waktu_server', 'n_create', 'n_update', 'n_hapus', 'n_konflik', 'last_update', 'sync_page', 'alamat_ip', 'pengguna_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. TableSyncLogPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('TableName' => 0, 'IdInstalasi' => 1, 'BeginSync' => 2, 'EndSync' => 3, 'SyncMedia' => 4, 'IsSuccess' => 5, 'SelisihWaktuServer' => 6, 'NCreate' => 7, 'NUpdate' => 8, 'NHapus' => 9, 'NKonflik' => 10, 'LastUpdate' => 11, 'SyncPage' => 12, 'AlamatIp' => 13, 'PenggunaId' => 14, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('tableName' => 0, 'idInstalasi' => 1, 'beginSync' => 2, 'endSync' => 3, 'syncMedia' => 4, 'isSuccess' => 5, 'selisihWaktuServer' => 6, 'nCreate' => 7, 'nUpdate' => 8, 'nHapus' => 9, 'nKonflik' => 10, 'lastUpdate' => 11, 'syncPage' => 12, 'alamatIp' => 13, 'penggunaId' => 14, ),
        BasePeer::TYPE_COLNAME => array (TableSyncLogPeer::TABLE_NAME => 0, TableSyncLogPeer::ID_INSTALASI => 1, TableSyncLogPeer::BEGIN_SYNC => 2, TableSyncLogPeer::END_SYNC => 3, TableSyncLogPeer::SYNC_MEDIA => 4, TableSyncLogPeer::IS_SUCCESS => 5, TableSyncLogPeer::SELISIH_WAKTU_SERVER => 6, TableSyncLogPeer::N_CREATE => 7, TableSyncLogPeer::N_UPDATE => 8, TableSyncLogPeer::N_HAPUS => 9, TableSyncLogPeer::N_KONFLIK => 10, TableSyncLogPeer::LAST_UPDATE => 11, TableSyncLogPeer::SYNC_PAGE => 12, TableSyncLogPeer::ALAMAT_IP => 13, TableSyncLogPeer::PENGGUNA_ID => 14, ),
        BasePeer::TYPE_RAW_COLNAME => array ('TABLE_NAME' => 0, 'ID_INSTALASI' => 1, 'BEGIN_SYNC' => 2, 'END_SYNC' => 3, 'SYNC_MEDIA' => 4, 'IS_SUCCESS' => 5, 'SELISIH_WAKTU_SERVER' => 6, 'N_CREATE' => 7, 'N_UPDATE' => 8, 'N_HAPUS' => 9, 'N_KONFLIK' => 10, 'LAST_UPDATE' => 11, 'SYNC_PAGE' => 12, 'ALAMAT_IP' => 13, 'PENGGUNA_ID' => 14, ),
        BasePeer::TYPE_FIELDNAME => array ('table_name' => 0, 'id_instalasi' => 1, 'begin_sync' => 2, 'end_sync' => 3, 'sync_media' => 4, 'is_success' => 5, 'selisih_waktu_server' => 6, 'n_create' => 7, 'n_update' => 8, 'n_hapus' => 9, 'n_konflik' => 10, 'last_update' => 11, 'sync_page' => 12, 'alamat_ip' => 13, 'pengguna_id' => 14, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $toNames = TableSyncLogPeer::getFieldNames($toType);
        $key = isset(TableSyncLogPeer::$fieldKeys[$fromType][$name]) ? TableSyncLogPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(TableSyncLogPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, TableSyncLogPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return TableSyncLogPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. TableSyncLogPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(TableSyncLogPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(TableSyncLogPeer::TABLE_NAME);
            $criteria->addSelectColumn(TableSyncLogPeer::ID_INSTALASI);
            $criteria->addSelectColumn(TableSyncLogPeer::BEGIN_SYNC);
            $criteria->addSelectColumn(TableSyncLogPeer::END_SYNC);
            $criteria->addSelectColumn(TableSyncLogPeer::SYNC_MEDIA);
            $criteria->addSelectColumn(TableSyncLogPeer::IS_SUCCESS);
            $criteria->addSelectColumn(TableSyncLogPeer::SELISIH_WAKTU_SERVER);
            $criteria->addSelectColumn(TableSyncLogPeer::N_CREATE);
            $criteria->addSelectColumn(TableSyncLogPeer::N_UPDATE);
            $criteria->addSelectColumn(TableSyncLogPeer::N_HAPUS);
            $criteria->addSelectColumn(TableSyncLogPeer::N_KONFLIK);
            $criteria->addSelectColumn(TableSyncLogPeer::LAST_UPDATE);
            $criteria->addSelectColumn(TableSyncLogPeer::SYNC_PAGE);
            $criteria->addSelectColumn(TableSyncLogPeer::ALAMAT_IP);
            $criteria->addSelectColumn(TableSyncLogPeer::PENGGUNA_ID);
        } else {
            $criteria->addSelectColumn($alias . '.table_name');
            $criteria->addSelectColumn($alias . '.id_instalasi');
            $criteria->addSelectColumn($alias . '.begin_sync');
            $criteria->addSelectColumn($alias . '.end_sync');
            $criteria->addSelectColumn($alias . '.sync_media');
            $criteria->addSelectColumn($alias . '.is_success');
            $criteria->addSelectColumn($alias . '.selisih_waktu_server');
            $criteria->addSelectColumn($alias . '.n_create');
            $criteria->addSelectColumn($alias . '.n_update');
            $criteria->addSelectColumn($alias . '.n_hapus');
            $criteria->addSelectColumn($alias . '.n_konflik');
            $criteria->addSelectColumn($alias . '.last_update');
            $criteria->addSelectColumn($alias . '.sync_page');
            $criteria->addSelectColumn($alias . '.alamat_ip');
            $criteria->addSelectColumn($alias . '.pengguna_id');
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
        $criteria->setPrimaryTableName(TableSyncLogPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TableSyncLogPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TableSyncLog
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = TableSyncLogPeer::doSelect($critcopy, $con);
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
        return TableSyncLogPeer::populateObjects(TableSyncLogPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            TableSyncLogPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);

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
     * @param      TableSyncLog $obj A TableSyncLog object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getTableName(), (string) $obj->getIdInstalasi()));
            } // if key === null
            TableSyncLogPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A TableSyncLog object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof TableSyncLog) {
                $key = serialize(array((string) $value->getTableName(), (string) $value->getIdInstalasi()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or TableSyncLog object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(TableSyncLogPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   TableSyncLog Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(TableSyncLogPeer::$instances[$key])) {
                return TableSyncLogPeer::$instances[$key];
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
        foreach (TableSyncLogPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        TableSyncLogPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to table_sync_log
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
        $cls = TableSyncLogPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = TableSyncLogPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = TableSyncLogPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TableSyncLogPeer::addInstanceToPool($obj, $key);
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
     * @return array (TableSyncLog object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = TableSyncLogPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = TableSyncLogPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + TableSyncLogPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TableSyncLogPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            TableSyncLogPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Instalasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinInstalasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TableSyncLogPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TableSyncLogPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TableSyncLogPeer::ID_INSTALASI, InstalasiPeer::ID_INSTALASI, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related TableSync table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinTableSync(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TableSyncLogPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TableSyncLogPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TableSyncLogPeer::TABLE_NAME, TableSyncPeer::TABLE_NAME, $join_behavior);

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
     * Selects a collection of TableSyncLog objects pre-filled with their Instalasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TableSyncLog objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinInstalasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);
        }

        TableSyncLogPeer::addSelectColumns($criteria);
        $startcol = TableSyncLogPeer::NUM_HYDRATE_COLUMNS;
        InstalasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(TableSyncLogPeer::ID_INSTALASI, InstalasiPeer::ID_INSTALASI, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TableSyncLogPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TableSyncLogPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TableSyncLogPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TableSyncLogPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = InstalasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = InstalasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = InstalasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    InstalasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TableSyncLog) to $obj2 (Instalasi)
                $obj2->addTableSyncLog($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TableSyncLog objects pre-filled with their TableSync objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TableSyncLog objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTableSync(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);
        }

        TableSyncLogPeer::addSelectColumns($criteria);
        $startcol = TableSyncLogPeer::NUM_HYDRATE_COLUMNS;
        TableSyncPeer::addSelectColumns($criteria);

        $criteria->addJoin(TableSyncLogPeer::TABLE_NAME, TableSyncPeer::TABLE_NAME, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TableSyncLogPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TableSyncLogPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TableSyncLogPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TableSyncLogPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = TableSyncPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = TableSyncPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = TableSyncPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    TableSyncPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TableSyncLog) to $obj2 (TableSync)
                $obj2->addTableSyncLog($obj1);

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
        $criteria->setPrimaryTableName(TableSyncLogPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TableSyncLogPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TableSyncLogPeer::ID_INSTALASI, InstalasiPeer::ID_INSTALASI, $join_behavior);

        $criteria->addJoin(TableSyncLogPeer::TABLE_NAME, TableSyncPeer::TABLE_NAME, $join_behavior);

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
     * Selects a collection of TableSyncLog objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TableSyncLog objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);
        }

        TableSyncLogPeer::addSelectColumns($criteria);
        $startcol2 = TableSyncLogPeer::NUM_HYDRATE_COLUMNS;

        InstalasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + InstalasiPeer::NUM_HYDRATE_COLUMNS;

        TableSyncPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TableSyncPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TableSyncLogPeer::ID_INSTALASI, InstalasiPeer::ID_INSTALASI, $join_behavior);

        $criteria->addJoin(TableSyncLogPeer::TABLE_NAME, TableSyncPeer::TABLE_NAME, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TableSyncLogPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TableSyncLogPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TableSyncLogPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TableSyncLogPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Instalasi rows

            $key2 = InstalasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = InstalasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = InstalasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    InstalasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (TableSyncLog) to the collection in $obj2 (Instalasi)
                $obj2->addTableSyncLog($obj1);
            } // if joined row not null

            // Add objects for joined TableSync rows

            $key3 = TableSyncPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = TableSyncPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = TableSyncPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TableSyncPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (TableSyncLog) to the collection in $obj3 (TableSync)
                $obj3->addTableSyncLog($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Instalasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptInstalasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TableSyncLogPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TableSyncLogPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TableSyncLogPeer::TABLE_NAME, TableSyncPeer::TABLE_NAME, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related TableSync table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptTableSync(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TableSyncLogPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TableSyncLogPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TableSyncLogPeer::ID_INSTALASI, InstalasiPeer::ID_INSTALASI, $join_behavior);

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
     * Selects a collection of TableSyncLog objects pre-filled with all related objects except Instalasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TableSyncLog objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptInstalasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);
        }

        TableSyncLogPeer::addSelectColumns($criteria);
        $startcol2 = TableSyncLogPeer::NUM_HYDRATE_COLUMNS;

        TableSyncPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + TableSyncPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TableSyncLogPeer::TABLE_NAME, TableSyncPeer::TABLE_NAME, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TableSyncLogPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TableSyncLogPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TableSyncLogPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TableSyncLogPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined TableSync rows

                $key2 = TableSyncPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = TableSyncPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = TableSyncPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    TableSyncPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TableSyncLog) to the collection in $obj2 (TableSync)
                $obj2->addTableSyncLog($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TableSyncLog objects pre-filled with all related objects except TableSync.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TableSyncLog objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptTableSync(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);
        }

        TableSyncLogPeer::addSelectColumns($criteria);
        $startcol2 = TableSyncLogPeer::NUM_HYDRATE_COLUMNS;

        InstalasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + InstalasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TableSyncLogPeer::ID_INSTALASI, InstalasiPeer::ID_INSTALASI, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TableSyncLogPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TableSyncLogPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TableSyncLogPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TableSyncLogPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Instalasi rows

                $key2 = InstalasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = InstalasiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = InstalasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    InstalasiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TableSyncLog) to the collection in $obj2 (Instalasi)
                $obj2->addTableSyncLog($obj1);

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
        return Propel::getDatabaseMap(TableSyncLogPeer::DATABASE_NAME)->getTable(TableSyncLogPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseTableSyncLogPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseTableSyncLogPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new TableSyncLogTableMap());
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
        return TableSyncLogPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a TableSyncLog or Criteria object.
     *
     * @param      mixed $values Criteria or TableSyncLog object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from TableSyncLog object
        }


        // Set the correct dbName
        $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a TableSyncLog or Criteria object.
     *
     * @param      mixed $values Criteria or TableSyncLog object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(TableSyncLogPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(TableSyncLogPeer::TABLE_NAME);
            $value = $criteria->remove(TableSyncLogPeer::TABLE_NAME);
            if ($value) {
                $selectCriteria->add(TableSyncLogPeer::TABLE_NAME, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TableSyncLogPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(TableSyncLogPeer::ID_INSTALASI);
            $value = $criteria->remove(TableSyncLogPeer::ID_INSTALASI);
            if ($value) {
                $selectCriteria->add(TableSyncLogPeer::ID_INSTALASI, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TableSyncLogPeer::TABLE_NAME);
            }

        } else { // $values is TableSyncLog object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the table_sync_log table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(TableSyncLogPeer::TABLE_NAME, $con, TableSyncLogPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TableSyncLogPeer::clearInstancePool();
            TableSyncLogPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a TableSyncLog or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or TableSyncLog object or primary key or array of primary keys
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
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            TableSyncLogPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof TableSyncLog) { // it's a model object
            // invalidate the cache for this single object
            TableSyncLogPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TableSyncLogPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(TableSyncLogPeer::TABLE_NAME, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(TableSyncLogPeer::ID_INSTALASI, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                TableSyncLogPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(TableSyncLogPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            TableSyncLogPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given TableSyncLog object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      TableSyncLog $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(TableSyncLogPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(TableSyncLogPeer::TABLE_NAME);

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

        return BasePeer::doValidate(TableSyncLogPeer::DATABASE_NAME, TableSyncLogPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $table_name
     * @param   string $id_instalasi
     * @param      PropelPDO $con
     * @return   TableSyncLog
     */
    public static function retrieveByPK($table_name, $id_instalasi, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $table_name, (string) $id_instalasi));
         if (null !== ($obj = TableSyncLogPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(TableSyncLogPeer::DATABASE_NAME);
        $criteria->add(TableSyncLogPeer::TABLE_NAME, $table_name);
        $criteria->add(TableSyncLogPeer::ID_INSTALASI, $id_instalasi);
        $v = TableSyncLogPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseTableSyncLogPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTableSyncLogPeer::buildTableMap();

