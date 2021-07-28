<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\WsAplikasi;
use DataDikdas\Model\WsAplikasiPeer;
use DataDikdas\Model\WsRoleTablePeer;
use DataDikdas\Model\map\WsAplikasiTableMap;

/**
 * Base static class for performing query and update operations on the 'ws_aplikasi' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseWsAplikasiPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'dapodik_app';

    /** the table name for this class */
    const TABLE_NAME = 'ws_aplikasi';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\WsAplikasi';

    /** the related TableMap class for this table */
    const TM_CLASS = 'WsAplikasiTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 16;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 16;

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'ws_aplikasi.sekolah_id';

    /** the column name for the aplikasi_id field */
    const APLIKASI_ID = 'ws_aplikasi.aplikasi_id';

    /** the column name for the nama field */
    const NAMA = 'ws_aplikasi.nama';

    /** the column name for the token field */
    const TOKEN = 'ws_aplikasi.token';

    /** the column name for the password field */
    const PASSWORD = 'ws_aplikasi.password';

    /** the column name for the ip_address field */
    const IP_ADDRESS = 'ws_aplikasi.ip_address';

    /** the column name for the port field */
    const PORT = 'ws_aplikasi.port';

    /** the column name for the mac_address field */
    const MAC_ADDRESS = 'ws_aplikasi.mac_address';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'ws_aplikasi.asal_data';

    /** the column name for the aktif field */
    const AKTIF = 'ws_aplikasi.aktif';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ws_aplikasi.expired_date';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ws_aplikasi.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ws_aplikasi.last_update';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'ws_aplikasi.updater_id';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ws_aplikasi.last_sync';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'ws_aplikasi.soft_delete';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of WsAplikasi objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array WsAplikasi[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. WsAplikasiPeer::$fieldNames[WsAplikasiPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('SekolahId', 'AplikasiId', 'Nama', 'Token', 'Password', 'IpAddress', 'Port', 'MacAddress', 'AsalData', 'Aktif', 'ExpiredDate', 'CreateDate', 'LastUpdate', 'UpdaterId', 'LastSync', 'SoftDelete', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('sekolahId', 'aplikasiId', 'nama', 'token', 'password', 'ipAddress', 'port', 'macAddress', 'asalData', 'aktif', 'expiredDate', 'createDate', 'lastUpdate', 'updaterId', 'lastSync', 'softDelete', ),
        BasePeer::TYPE_COLNAME => array (WsAplikasiPeer::SEKOLAH_ID, WsAplikasiPeer::APLIKASI_ID, WsAplikasiPeer::NAMA, WsAplikasiPeer::TOKEN, WsAplikasiPeer::PASSWORD, WsAplikasiPeer::IP_ADDRESS, WsAplikasiPeer::PORT, WsAplikasiPeer::MAC_ADDRESS, WsAplikasiPeer::ASAL_DATA, WsAplikasiPeer::AKTIF, WsAplikasiPeer::EXPIRED_DATE, WsAplikasiPeer::CREATE_DATE, WsAplikasiPeer::LAST_UPDATE, WsAplikasiPeer::UPDATER_ID, WsAplikasiPeer::LAST_SYNC, WsAplikasiPeer::SOFT_DELETE, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SEKOLAH_ID', 'APLIKASI_ID', 'NAMA', 'TOKEN', 'PASSWORD', 'IP_ADDRESS', 'PORT', 'MAC_ADDRESS', 'ASAL_DATA', 'AKTIF', 'EXPIRED_DATE', 'CREATE_DATE', 'LAST_UPDATE', 'UPDATER_ID', 'LAST_SYNC', 'SOFT_DELETE', ),
        BasePeer::TYPE_FIELDNAME => array ('sekolah_id', 'aplikasi_id', 'nama', 'token', 'password', 'ip_address', 'port', 'mac_address', 'asal_data', 'aktif', 'expired_date', 'create_date', 'last_update', 'updater_id', 'last_sync', 'soft_delete', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. WsAplikasiPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('SekolahId' => 0, 'AplikasiId' => 1, 'Nama' => 2, 'Token' => 3, 'Password' => 4, 'IpAddress' => 5, 'Port' => 6, 'MacAddress' => 7, 'AsalData' => 8, 'Aktif' => 9, 'ExpiredDate' => 10, 'CreateDate' => 11, 'LastUpdate' => 12, 'UpdaterId' => 13, 'LastSync' => 14, 'SoftDelete' => 15, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('sekolahId' => 0, 'aplikasiId' => 1, 'nama' => 2, 'token' => 3, 'password' => 4, 'ipAddress' => 5, 'port' => 6, 'macAddress' => 7, 'asalData' => 8, 'aktif' => 9, 'expiredDate' => 10, 'createDate' => 11, 'lastUpdate' => 12, 'updaterId' => 13, 'lastSync' => 14, 'softDelete' => 15, ),
        BasePeer::TYPE_COLNAME => array (WsAplikasiPeer::SEKOLAH_ID => 0, WsAplikasiPeer::APLIKASI_ID => 1, WsAplikasiPeer::NAMA => 2, WsAplikasiPeer::TOKEN => 3, WsAplikasiPeer::PASSWORD => 4, WsAplikasiPeer::IP_ADDRESS => 5, WsAplikasiPeer::PORT => 6, WsAplikasiPeer::MAC_ADDRESS => 7, WsAplikasiPeer::ASAL_DATA => 8, WsAplikasiPeer::AKTIF => 9, WsAplikasiPeer::EXPIRED_DATE => 10, WsAplikasiPeer::CREATE_DATE => 11, WsAplikasiPeer::LAST_UPDATE => 12, WsAplikasiPeer::UPDATER_ID => 13, WsAplikasiPeer::LAST_SYNC => 14, WsAplikasiPeer::SOFT_DELETE => 15, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SEKOLAH_ID' => 0, 'APLIKASI_ID' => 1, 'NAMA' => 2, 'TOKEN' => 3, 'PASSWORD' => 4, 'IP_ADDRESS' => 5, 'PORT' => 6, 'MAC_ADDRESS' => 7, 'ASAL_DATA' => 8, 'AKTIF' => 9, 'EXPIRED_DATE' => 10, 'CREATE_DATE' => 11, 'LAST_UPDATE' => 12, 'UPDATER_ID' => 13, 'LAST_SYNC' => 14, 'SOFT_DELETE' => 15, ),
        BasePeer::TYPE_FIELDNAME => array ('sekolah_id' => 0, 'aplikasi_id' => 1, 'nama' => 2, 'token' => 3, 'password' => 4, 'ip_address' => 5, 'port' => 6, 'mac_address' => 7, 'asal_data' => 8, 'aktif' => 9, 'expired_date' => 10, 'create_date' => 11, 'last_update' => 12, 'updater_id' => 13, 'last_sync' => 14, 'soft_delete' => 15, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
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
        $toNames = WsAplikasiPeer::getFieldNames($toType);
        $key = isset(WsAplikasiPeer::$fieldKeys[$fromType][$name]) ? WsAplikasiPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(WsAplikasiPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, WsAplikasiPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return WsAplikasiPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. WsAplikasiPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(WsAplikasiPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(WsAplikasiPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(WsAplikasiPeer::APLIKASI_ID);
            $criteria->addSelectColumn(WsAplikasiPeer::NAMA);
            $criteria->addSelectColumn(WsAplikasiPeer::TOKEN);
            $criteria->addSelectColumn(WsAplikasiPeer::PASSWORD);
            $criteria->addSelectColumn(WsAplikasiPeer::IP_ADDRESS);
            $criteria->addSelectColumn(WsAplikasiPeer::PORT);
            $criteria->addSelectColumn(WsAplikasiPeer::MAC_ADDRESS);
            $criteria->addSelectColumn(WsAplikasiPeer::ASAL_DATA);
            $criteria->addSelectColumn(WsAplikasiPeer::AKTIF);
            $criteria->addSelectColumn(WsAplikasiPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(WsAplikasiPeer::CREATE_DATE);
            $criteria->addSelectColumn(WsAplikasiPeer::LAST_UPDATE);
            $criteria->addSelectColumn(WsAplikasiPeer::UPDATER_ID);
            $criteria->addSelectColumn(WsAplikasiPeer::LAST_SYNC);
            $criteria->addSelectColumn(WsAplikasiPeer::SOFT_DELETE);
        } else {
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.aplikasi_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.token');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.ip_address');
            $criteria->addSelectColumn($alias . '.port');
            $criteria->addSelectColumn($alias . '.mac_address');
            $criteria->addSelectColumn($alias . '.asal_data');
            $criteria->addSelectColumn($alias . '.aktif');
            $criteria->addSelectColumn($alias . '.expired_date');
            $criteria->addSelectColumn($alias . '.create_date');
            $criteria->addSelectColumn($alias . '.last_update');
            $criteria->addSelectColumn($alias . '.updater_id');
            $criteria->addSelectColumn($alias . '.last_sync');
            $criteria->addSelectColumn($alias . '.soft_delete');
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
        $criteria->setPrimaryTableName(WsAplikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            WsAplikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(WsAplikasiPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(WsAplikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 WsAplikasi
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = WsAplikasiPeer::doSelect($critcopy, $con);
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
        return WsAplikasiPeer::populateObjects(WsAplikasiPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(WsAplikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            WsAplikasiPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(WsAplikasiPeer::DATABASE_NAME);

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
     * @param      WsAplikasi $obj A WsAplikasi object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getAplikasiId();
            } // if key === null
            WsAplikasiPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A WsAplikasi object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof WsAplikasi) {
                $key = (string) $value->getAplikasiId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or WsAplikasi object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(WsAplikasiPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   WsAplikasi Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(WsAplikasiPeer::$instances[$key])) {
                return WsAplikasiPeer::$instances[$key];
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
        foreach (WsAplikasiPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        WsAplikasiPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ws_aplikasi
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in WsRoleTablePeer instance pool,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        WsRoleTablePeer::clearInstancePool();
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
        if ($row[$startcol + 1] === null) {
            return null;
        }

        return (string) $row[$startcol + 1];
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

        return (string) $row[$startcol + 1];
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
        $cls = WsAplikasiPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = WsAplikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = WsAplikasiPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                WsAplikasiPeer::addInstanceToPool($obj, $key);
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
     * @return array (WsAplikasi object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = WsAplikasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = WsAplikasiPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + WsAplikasiPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = WsAplikasiPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            WsAplikasiPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(WsAplikasiPeer::DATABASE_NAME)->getTable(WsAplikasiPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseWsAplikasiPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseWsAplikasiPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new WsAplikasiTableMap());
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
        return WsAplikasiPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a WsAplikasi or Criteria object.
     *
     * @param      mixed $values Criteria or WsAplikasi object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(WsAplikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from WsAplikasi object
        }


        // Set the correct dbName
        $criteria->setDbName(WsAplikasiPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a WsAplikasi or Criteria object.
     *
     * @param      mixed $values Criteria or WsAplikasi object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(WsAplikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(WsAplikasiPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(WsAplikasiPeer::APLIKASI_ID);
            $value = $criteria->remove(WsAplikasiPeer::APLIKASI_ID);
            if ($value) {
                $selectCriteria->add(WsAplikasiPeer::APLIKASI_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(WsAplikasiPeer::TABLE_NAME);
            }

        } else { // $values is WsAplikasi object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(WsAplikasiPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ws_aplikasi table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(WsAplikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(WsAplikasiPeer::TABLE_NAME, $con, WsAplikasiPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            WsAplikasiPeer::clearInstancePool();
            WsAplikasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a WsAplikasi or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or WsAplikasi object or primary key or array of primary keys
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
            $con = Propel::getConnection(WsAplikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            WsAplikasiPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof WsAplikasi) { // it's a model object
            // invalidate the cache for this single object
            WsAplikasiPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(WsAplikasiPeer::DATABASE_NAME);
            $criteria->add(WsAplikasiPeer::APLIKASI_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                WsAplikasiPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(WsAplikasiPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            WsAplikasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given WsAplikasi object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      WsAplikasi $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(WsAplikasiPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(WsAplikasiPeer::TABLE_NAME);

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

        return BasePeer::doValidate(WsAplikasiPeer::DATABASE_NAME, WsAplikasiPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return WsAplikasi
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = WsAplikasiPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(WsAplikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(WsAplikasiPeer::DATABASE_NAME);
        $criteria->add(WsAplikasiPeer::APLIKASI_ID, $pk);

        $v = WsAplikasiPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return WsAplikasi[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(WsAplikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(WsAplikasiPeer::DATABASE_NAME);
            $criteria->add(WsAplikasiPeer::APLIKASI_ID, $pks, Criteria::IN);
            $objs = WsAplikasiPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseWsAplikasiPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseWsAplikasiPeer::buildTableMap();

