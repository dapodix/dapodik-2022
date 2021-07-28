<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\Blockgrant;
use DataDikdas\Model\BlockgrantPeer;
use DataDikdas\Model\JenisBantuanPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\SumberDanaPeer;
use DataDikdas\Model\map\BlockgrantTableMap;

/**
 * Base static class for performing query and update operations on the 'blockgrant' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseBlockgrantPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'blockgrant';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Blockgrant';

    /** the related TableMap class for this table */
    const TM_CLASS = 'BlockgrantTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 15;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 15;

    /** the column name for the blockgrant_id field */
    const BLOCKGRANT_ID = 'blockgrant.blockgrant_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'blockgrant.sekolah_id';

    /** the column name for the nama field */
    const NAMA = 'blockgrant.nama';

    /** the column name for the tahun field */
    const TAHUN = 'blockgrant.tahun';

    /** the column name for the jenis_bantuan_id field */
    const JENIS_BANTUAN_ID = 'blockgrant.jenis_bantuan_id';

    /** the column name for the sumber_dana_id field */
    const SUMBER_DANA_ID = 'blockgrant.sumber_dana_id';

    /** the column name for the besar_bantuan field */
    const BESAR_BANTUAN = 'blockgrant.besar_bantuan';

    /** the column name for the dana_pendamping field */
    const DANA_PENDAMPING = 'blockgrant.dana_pendamping';

    /** the column name for the peruntukan_dana field */
    const PERUNTUKAN_DANA = 'blockgrant.peruntukan_dana';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'blockgrant.asal_data';

    /** the column name for the create_date field */
    const CREATE_DATE = 'blockgrant.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'blockgrant.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'blockgrant.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'blockgrant.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'blockgrant.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Blockgrant objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Blockgrant[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. BlockgrantPeer::$fieldNames[BlockgrantPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('BlockgrantId', 'SekolahId', 'Nama', 'Tahun', 'JenisBantuanId', 'SumberDanaId', 'BesarBantuan', 'DanaPendamping', 'PeruntukanDana', 'AsalData', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('blockgrantId', 'sekolahId', 'nama', 'tahun', 'jenisBantuanId', 'sumberDanaId', 'besarBantuan', 'danaPendamping', 'peruntukanDana', 'asalData', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (BlockgrantPeer::BLOCKGRANT_ID, BlockgrantPeer::SEKOLAH_ID, BlockgrantPeer::NAMA, BlockgrantPeer::TAHUN, BlockgrantPeer::JENIS_BANTUAN_ID, BlockgrantPeer::SUMBER_DANA_ID, BlockgrantPeer::BESAR_BANTUAN, BlockgrantPeer::DANA_PENDAMPING, BlockgrantPeer::PERUNTUKAN_DANA, BlockgrantPeer::ASAL_DATA, BlockgrantPeer::CREATE_DATE, BlockgrantPeer::LAST_UPDATE, BlockgrantPeer::SOFT_DELETE, BlockgrantPeer::LAST_SYNC, BlockgrantPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('BLOCKGRANT_ID', 'SEKOLAH_ID', 'NAMA', 'TAHUN', 'JENIS_BANTUAN_ID', 'SUMBER_DANA_ID', 'BESAR_BANTUAN', 'DANA_PENDAMPING', 'PERUNTUKAN_DANA', 'ASAL_DATA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('blockgrant_id', 'sekolah_id', 'nama', 'tahun', 'jenis_bantuan_id', 'sumber_dana_id', 'besar_bantuan', 'dana_pendamping', 'peruntukan_dana', 'asal_data', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. BlockgrantPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('BlockgrantId' => 0, 'SekolahId' => 1, 'Nama' => 2, 'Tahun' => 3, 'JenisBantuanId' => 4, 'SumberDanaId' => 5, 'BesarBantuan' => 6, 'DanaPendamping' => 7, 'PeruntukanDana' => 8, 'AsalData' => 9, 'CreateDate' => 10, 'LastUpdate' => 11, 'SoftDelete' => 12, 'LastSync' => 13, 'UpdaterId' => 14, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('blockgrantId' => 0, 'sekolahId' => 1, 'nama' => 2, 'tahun' => 3, 'jenisBantuanId' => 4, 'sumberDanaId' => 5, 'besarBantuan' => 6, 'danaPendamping' => 7, 'peruntukanDana' => 8, 'asalData' => 9, 'createDate' => 10, 'lastUpdate' => 11, 'softDelete' => 12, 'lastSync' => 13, 'updaterId' => 14, ),
        BasePeer::TYPE_COLNAME => array (BlockgrantPeer::BLOCKGRANT_ID => 0, BlockgrantPeer::SEKOLAH_ID => 1, BlockgrantPeer::NAMA => 2, BlockgrantPeer::TAHUN => 3, BlockgrantPeer::JENIS_BANTUAN_ID => 4, BlockgrantPeer::SUMBER_DANA_ID => 5, BlockgrantPeer::BESAR_BANTUAN => 6, BlockgrantPeer::DANA_PENDAMPING => 7, BlockgrantPeer::PERUNTUKAN_DANA => 8, BlockgrantPeer::ASAL_DATA => 9, BlockgrantPeer::CREATE_DATE => 10, BlockgrantPeer::LAST_UPDATE => 11, BlockgrantPeer::SOFT_DELETE => 12, BlockgrantPeer::LAST_SYNC => 13, BlockgrantPeer::UPDATER_ID => 14, ),
        BasePeer::TYPE_RAW_COLNAME => array ('BLOCKGRANT_ID' => 0, 'SEKOLAH_ID' => 1, 'NAMA' => 2, 'TAHUN' => 3, 'JENIS_BANTUAN_ID' => 4, 'SUMBER_DANA_ID' => 5, 'BESAR_BANTUAN' => 6, 'DANA_PENDAMPING' => 7, 'PERUNTUKAN_DANA' => 8, 'ASAL_DATA' => 9, 'CREATE_DATE' => 10, 'LAST_UPDATE' => 11, 'SOFT_DELETE' => 12, 'LAST_SYNC' => 13, 'UPDATER_ID' => 14, ),
        BasePeer::TYPE_FIELDNAME => array ('blockgrant_id' => 0, 'sekolah_id' => 1, 'nama' => 2, 'tahun' => 3, 'jenis_bantuan_id' => 4, 'sumber_dana_id' => 5, 'besar_bantuan' => 6, 'dana_pendamping' => 7, 'peruntukan_dana' => 8, 'asal_data' => 9, 'create_date' => 10, 'last_update' => 11, 'soft_delete' => 12, 'last_sync' => 13, 'updater_id' => 14, ),
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
        $toNames = BlockgrantPeer::getFieldNames($toType);
        $key = isset(BlockgrantPeer::$fieldKeys[$fromType][$name]) ? BlockgrantPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(BlockgrantPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, BlockgrantPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return BlockgrantPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. BlockgrantPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(BlockgrantPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(BlockgrantPeer::BLOCKGRANT_ID);
            $criteria->addSelectColumn(BlockgrantPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(BlockgrantPeer::NAMA);
            $criteria->addSelectColumn(BlockgrantPeer::TAHUN);
            $criteria->addSelectColumn(BlockgrantPeer::JENIS_BANTUAN_ID);
            $criteria->addSelectColumn(BlockgrantPeer::SUMBER_DANA_ID);
            $criteria->addSelectColumn(BlockgrantPeer::BESAR_BANTUAN);
            $criteria->addSelectColumn(BlockgrantPeer::DANA_PENDAMPING);
            $criteria->addSelectColumn(BlockgrantPeer::PERUNTUKAN_DANA);
            $criteria->addSelectColumn(BlockgrantPeer::ASAL_DATA);
            $criteria->addSelectColumn(BlockgrantPeer::CREATE_DATE);
            $criteria->addSelectColumn(BlockgrantPeer::LAST_UPDATE);
            $criteria->addSelectColumn(BlockgrantPeer::SOFT_DELETE);
            $criteria->addSelectColumn(BlockgrantPeer::LAST_SYNC);
            $criteria->addSelectColumn(BlockgrantPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.blockgrant_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.tahun');
            $criteria->addSelectColumn($alias . '.jenis_bantuan_id');
            $criteria->addSelectColumn($alias . '.sumber_dana_id');
            $criteria->addSelectColumn($alias . '.besar_bantuan');
            $criteria->addSelectColumn($alias . '.dana_pendamping');
            $criteria->addSelectColumn($alias . '.peruntukan_dana');
            $criteria->addSelectColumn($alias . '.asal_data');
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
        $criteria->setPrimaryTableName(BlockgrantPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BlockgrantPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(BlockgrantPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Blockgrant
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = BlockgrantPeer::doSelect($critcopy, $con);
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
        return BlockgrantPeer::populateObjects(BlockgrantPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            BlockgrantPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);

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
     * @param      Blockgrant $obj A Blockgrant object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getBlockgrantId();
            } // if key === null
            BlockgrantPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Blockgrant object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Blockgrant) {
                $key = (string) $value->getBlockgrantId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Blockgrant object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(BlockgrantPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Blockgrant Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(BlockgrantPeer::$instances[$key])) {
                return BlockgrantPeer::$instances[$key];
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
        foreach (BlockgrantPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        BlockgrantPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to blockgrant
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
        $cls = BlockgrantPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = BlockgrantPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = BlockgrantPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BlockgrantPeer::addInstanceToPool($obj, $key);
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
     * @return array (Blockgrant object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = BlockgrantPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = BlockgrantPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + BlockgrantPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BlockgrantPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            BlockgrantPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(BlockgrantPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BlockgrantPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BlockgrantPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisBantuan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisBantuan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BlockgrantPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BlockgrantPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BlockgrantPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SumberDana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSumberDana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BlockgrantPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BlockgrantPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BlockgrantPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);

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
     * Selects a collection of Blockgrant objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Blockgrant objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);
        }

        BlockgrantPeer::addSelectColumns($criteria);
        $startcol = BlockgrantPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(BlockgrantPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BlockgrantPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BlockgrantPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BlockgrantPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BlockgrantPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Blockgrant) to $obj2 (Sekolah)
                $obj2->addBlockgrant($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Blockgrant objects pre-filled with their JenisBantuan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Blockgrant objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisBantuan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);
        }

        BlockgrantPeer::addSelectColumns($criteria);
        $startcol = BlockgrantPeer::NUM_HYDRATE_COLUMNS;
        JenisBantuanPeer::addSelectColumns($criteria);

        $criteria->addJoin(BlockgrantPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BlockgrantPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BlockgrantPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BlockgrantPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BlockgrantPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisBantuanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisBantuanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisBantuanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisBantuanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Blockgrant) to $obj2 (JenisBantuan)
                $obj2->addBlockgrant($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Blockgrant objects pre-filled with their SumberDana objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Blockgrant objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSumberDana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);
        }

        BlockgrantPeer::addSelectColumns($criteria);
        $startcol = BlockgrantPeer::NUM_HYDRATE_COLUMNS;
        SumberDanaPeer::addSelectColumns($criteria);

        $criteria->addJoin(BlockgrantPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BlockgrantPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BlockgrantPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BlockgrantPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BlockgrantPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SumberDanaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SumberDanaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SumberDanaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SumberDanaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Blockgrant) to $obj2 (SumberDana)
                $obj2->addBlockgrant($obj1);

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
        $criteria->setPrimaryTableName(BlockgrantPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BlockgrantPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BlockgrantPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BlockgrantPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);

        $criteria->addJoin(BlockgrantPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);

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
     * Selects a collection of Blockgrant objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Blockgrant objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);
        }

        BlockgrantPeer::addSelectColumns($criteria);
        $startcol2 = BlockgrantPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisBantuanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisBantuanPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SumberDanaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BlockgrantPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BlockgrantPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);

        $criteria->addJoin(BlockgrantPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BlockgrantPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BlockgrantPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BlockgrantPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BlockgrantPeer::addInstanceToPool($obj1, $key1);
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
                } // if obj2 loaded

                // Add the $obj1 (Blockgrant) to the collection in $obj2 (Sekolah)
                $obj2->addBlockgrant($obj1);
            } // if joined row not null

            // Add objects for joined JenisBantuan rows

            $key3 = JenisBantuanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JenisBantuanPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JenisBantuanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisBantuanPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Blockgrant) to the collection in $obj3 (JenisBantuan)
                $obj3->addBlockgrant($obj1);
            } // if joined row not null

            // Add objects for joined SumberDana rows

            $key4 = SumberDanaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = SumberDanaPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = SumberDanaPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SumberDanaPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Blockgrant) to the collection in $obj4 (SumberDana)
                $obj4->addBlockgrant($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
        $criteria->setPrimaryTableName(BlockgrantPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BlockgrantPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BlockgrantPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);

        $criteria->addJoin(BlockgrantPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisBantuan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisBantuan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BlockgrantPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BlockgrantPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BlockgrantPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BlockgrantPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SumberDana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSumberDana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BlockgrantPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BlockgrantPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BlockgrantPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BlockgrantPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);

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
     * Selects a collection of Blockgrant objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Blockgrant objects.
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
            $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);
        }

        BlockgrantPeer::addSelectColumns($criteria);
        $startcol2 = BlockgrantPeer::NUM_HYDRATE_COLUMNS;

        JenisBantuanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisBantuanPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SumberDanaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BlockgrantPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);

        $criteria->addJoin(BlockgrantPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BlockgrantPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BlockgrantPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BlockgrantPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BlockgrantPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisBantuan rows

                $key2 = JenisBantuanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisBantuanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisBantuanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisBantuanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Blockgrant) to the collection in $obj2 (JenisBantuan)
                $obj2->addBlockgrant($obj1);

            } // if joined row is not null

                // Add objects for joined SumberDana rows

                $key3 = SumberDanaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SumberDanaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SumberDanaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SumberDanaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Blockgrant) to the collection in $obj3 (SumberDana)
                $obj3->addBlockgrant($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Blockgrant objects pre-filled with all related objects except JenisBantuan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Blockgrant objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisBantuan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);
        }

        BlockgrantPeer::addSelectColumns($criteria);
        $startcol2 = BlockgrantPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SumberDanaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BlockgrantPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BlockgrantPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BlockgrantPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BlockgrantPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BlockgrantPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BlockgrantPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Blockgrant) to the collection in $obj2 (Sekolah)
                $obj2->addBlockgrant($obj1);

            } // if joined row is not null

                // Add objects for joined SumberDana rows

                $key3 = SumberDanaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SumberDanaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SumberDanaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SumberDanaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Blockgrant) to the collection in $obj3 (SumberDana)
                $obj3->addBlockgrant($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Blockgrant objects pre-filled with all related objects except SumberDana.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Blockgrant objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSumberDana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);
        }

        BlockgrantPeer::addSelectColumns($criteria);
        $startcol2 = BlockgrantPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisBantuanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisBantuanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BlockgrantPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BlockgrantPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BlockgrantPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BlockgrantPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BlockgrantPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BlockgrantPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Blockgrant) to the collection in $obj2 (Sekolah)
                $obj2->addBlockgrant($obj1);

            } // if joined row is not null

                // Add objects for joined JenisBantuan rows

                $key3 = JenisBantuanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisBantuanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisBantuanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisBantuanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Blockgrant) to the collection in $obj3 (JenisBantuan)
                $obj3->addBlockgrant($obj1);

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
        return Propel::getDatabaseMap(BlockgrantPeer::DATABASE_NAME)->getTable(BlockgrantPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseBlockgrantPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseBlockgrantPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new BlockgrantTableMap());
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
        return BlockgrantPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Blockgrant or Criteria object.
     *
     * @param      mixed $values Criteria or Blockgrant object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Blockgrant object
        }


        // Set the correct dbName
        $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Blockgrant or Criteria object.
     *
     * @param      mixed $values Criteria or Blockgrant object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(BlockgrantPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(BlockgrantPeer::BLOCKGRANT_ID);
            $value = $criteria->remove(BlockgrantPeer::BLOCKGRANT_ID);
            if ($value) {
                $selectCriteria->add(BlockgrantPeer::BLOCKGRANT_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BlockgrantPeer::TABLE_NAME);
            }

        } else { // $values is Blockgrant object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the blockgrant table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(BlockgrantPeer::TABLE_NAME, $con, BlockgrantPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BlockgrantPeer::clearInstancePool();
            BlockgrantPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Blockgrant or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Blockgrant object or primary key or array of primary keys
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
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            BlockgrantPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Blockgrant) { // it's a model object
            // invalidate the cache for this single object
            BlockgrantPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BlockgrantPeer::DATABASE_NAME);
            $criteria->add(BlockgrantPeer::BLOCKGRANT_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                BlockgrantPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(BlockgrantPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            BlockgrantPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Blockgrant object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Blockgrant $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(BlockgrantPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(BlockgrantPeer::TABLE_NAME);

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

        return BasePeer::doValidate(BlockgrantPeer::DATABASE_NAME, BlockgrantPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Blockgrant
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = BlockgrantPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(BlockgrantPeer::DATABASE_NAME);
        $criteria->add(BlockgrantPeer::BLOCKGRANT_ID, $pk);

        $v = BlockgrantPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Blockgrant[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(BlockgrantPeer::DATABASE_NAME);
            $criteria->add(BlockgrantPeer::BLOCKGRANT_ID, $pks, Criteria::IN);
            $objs = BlockgrantPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseBlockgrantPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBlockgrantPeer::buildTableMap();

