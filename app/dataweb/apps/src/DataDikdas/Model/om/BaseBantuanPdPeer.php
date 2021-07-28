<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\AnggotaRombelPeer;
use DataDikdas\Model\BantuanPd;
use DataDikdas\Model\BantuanPdPeer;
use DataDikdas\Model\JenisBantuanPeer;
use DataDikdas\Model\map\BantuanPdTableMap;

/**
 * Base static class for performing query and update operations on the 'bantuan_pd' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseBantuanPdPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'bantuan_pd';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\BantuanPd';

    /** the related TableMap class for this table */
    const TM_CLASS = 'BantuanPdTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 10;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 10;

    /** the column name for the id_bantuan_pd field */
    const ID_BANTUAN_PD = 'bantuan_pd.id_bantuan_pd';

    /** the column name for the jenis_bantuan_id field */
    const JENIS_BANTUAN_ID = 'bantuan_pd.jenis_bantuan_id';

    /** the column name for the anggota_rombel_id field */
    const ANGGOTA_ROMBEL_ID = 'bantuan_pd.anggota_rombel_id';

    /** the column name for the besar_bantuan field */
    const BESAR_BANTUAN = 'bantuan_pd.besar_bantuan';

    /** the column name for the dana_pendamping field */
    const DANA_PENDAMPING = 'bantuan_pd.dana_pendamping';

    /** the column name for the create_date field */
    const CREATE_DATE = 'bantuan_pd.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'bantuan_pd.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'bantuan_pd.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'bantuan_pd.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'bantuan_pd.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of BantuanPd objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array BantuanPd[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. BantuanPdPeer::$fieldNames[BantuanPdPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdBantuanPd', 'JenisBantuanId', 'AnggotaRombelId', 'BesarBantuan', 'DanaPendamping', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idBantuanPd', 'jenisBantuanId', 'anggotaRombelId', 'besarBantuan', 'danaPendamping', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (BantuanPdPeer::ID_BANTUAN_PD, BantuanPdPeer::JENIS_BANTUAN_ID, BantuanPdPeer::ANGGOTA_ROMBEL_ID, BantuanPdPeer::BESAR_BANTUAN, BantuanPdPeer::DANA_PENDAMPING, BantuanPdPeer::CREATE_DATE, BantuanPdPeer::LAST_UPDATE, BantuanPdPeer::SOFT_DELETE, BantuanPdPeer::LAST_SYNC, BantuanPdPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_BANTUAN_PD', 'JENIS_BANTUAN_ID', 'ANGGOTA_ROMBEL_ID', 'BESAR_BANTUAN', 'DANA_PENDAMPING', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_bantuan_pd', 'jenis_bantuan_id', 'anggota_rombel_id', 'besar_bantuan', 'dana_pendamping', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. BantuanPdPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdBantuanPd' => 0, 'JenisBantuanId' => 1, 'AnggotaRombelId' => 2, 'BesarBantuan' => 3, 'DanaPendamping' => 4, 'CreateDate' => 5, 'LastUpdate' => 6, 'SoftDelete' => 7, 'LastSync' => 8, 'UpdaterId' => 9, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idBantuanPd' => 0, 'jenisBantuanId' => 1, 'anggotaRombelId' => 2, 'besarBantuan' => 3, 'danaPendamping' => 4, 'createDate' => 5, 'lastUpdate' => 6, 'softDelete' => 7, 'lastSync' => 8, 'updaterId' => 9, ),
        BasePeer::TYPE_COLNAME => array (BantuanPdPeer::ID_BANTUAN_PD => 0, BantuanPdPeer::JENIS_BANTUAN_ID => 1, BantuanPdPeer::ANGGOTA_ROMBEL_ID => 2, BantuanPdPeer::BESAR_BANTUAN => 3, BantuanPdPeer::DANA_PENDAMPING => 4, BantuanPdPeer::CREATE_DATE => 5, BantuanPdPeer::LAST_UPDATE => 6, BantuanPdPeer::SOFT_DELETE => 7, BantuanPdPeer::LAST_SYNC => 8, BantuanPdPeer::UPDATER_ID => 9, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_BANTUAN_PD' => 0, 'JENIS_BANTUAN_ID' => 1, 'ANGGOTA_ROMBEL_ID' => 2, 'BESAR_BANTUAN' => 3, 'DANA_PENDAMPING' => 4, 'CREATE_DATE' => 5, 'LAST_UPDATE' => 6, 'SOFT_DELETE' => 7, 'LAST_SYNC' => 8, 'UPDATER_ID' => 9, ),
        BasePeer::TYPE_FIELDNAME => array ('id_bantuan_pd' => 0, 'jenis_bantuan_id' => 1, 'anggota_rombel_id' => 2, 'besar_bantuan' => 3, 'dana_pendamping' => 4, 'create_date' => 5, 'last_update' => 6, 'soft_delete' => 7, 'last_sync' => 8, 'updater_id' => 9, ),
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
        $toNames = BantuanPdPeer::getFieldNames($toType);
        $key = isset(BantuanPdPeer::$fieldKeys[$fromType][$name]) ? BantuanPdPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(BantuanPdPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, BantuanPdPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return BantuanPdPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. BantuanPdPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(BantuanPdPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(BantuanPdPeer::ID_BANTUAN_PD);
            $criteria->addSelectColumn(BantuanPdPeer::JENIS_BANTUAN_ID);
            $criteria->addSelectColumn(BantuanPdPeer::ANGGOTA_ROMBEL_ID);
            $criteria->addSelectColumn(BantuanPdPeer::BESAR_BANTUAN);
            $criteria->addSelectColumn(BantuanPdPeer::DANA_PENDAMPING);
            $criteria->addSelectColumn(BantuanPdPeer::CREATE_DATE);
            $criteria->addSelectColumn(BantuanPdPeer::LAST_UPDATE);
            $criteria->addSelectColumn(BantuanPdPeer::SOFT_DELETE);
            $criteria->addSelectColumn(BantuanPdPeer::LAST_SYNC);
            $criteria->addSelectColumn(BantuanPdPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_bantuan_pd');
            $criteria->addSelectColumn($alias . '.jenis_bantuan_id');
            $criteria->addSelectColumn($alias . '.anggota_rombel_id');
            $criteria->addSelectColumn($alias . '.besar_bantuan');
            $criteria->addSelectColumn($alias . '.dana_pendamping');
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
        $criteria->setPrimaryTableName(BantuanPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BantuanPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(BantuanPdPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BantuanPd
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = BantuanPdPeer::doSelect($critcopy, $con);
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
        return BantuanPdPeer::populateObjects(BantuanPdPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            BantuanPdPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);

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
     * @param      BantuanPd $obj A BantuanPd object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdBantuanPd();
            } // if key === null
            BantuanPdPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A BantuanPd object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof BantuanPd) {
                $key = (string) $value->getIdBantuanPd();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or BantuanPd object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(BantuanPdPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   BantuanPd Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(BantuanPdPeer::$instances[$key])) {
                return BantuanPdPeer::$instances[$key];
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
        foreach (BantuanPdPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        BantuanPdPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to bantuan_pd
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
        $cls = BantuanPdPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = BantuanPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = BantuanPdPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BantuanPdPeer::addInstanceToPool($obj, $key);
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
     * @return array (BantuanPd object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = BantuanPdPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = BantuanPdPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + BantuanPdPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BantuanPdPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            BantuanPdPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related AnggotaRombel table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAnggotaRombel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BantuanPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BantuanPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BantuanPdPeer::ANGGOTA_ROMBEL_ID, AnggotaRombelPeer::ANGGOTA_ROMBEL_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(BantuanPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BantuanPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BantuanPdPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);

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
     * Selects a collection of BantuanPd objects pre-filled with their AnggotaRombel objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BantuanPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAnggotaRombel(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);
        }

        BantuanPdPeer::addSelectColumns($criteria);
        $startcol = BantuanPdPeer::NUM_HYDRATE_COLUMNS;
        AnggotaRombelPeer::addSelectColumns($criteria);

        $criteria->addJoin(BantuanPdPeer::ANGGOTA_ROMBEL_ID, AnggotaRombelPeer::ANGGOTA_ROMBEL_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BantuanPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BantuanPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BantuanPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BantuanPdPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = AnggotaRombelPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = AnggotaRombelPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AnggotaRombelPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    AnggotaRombelPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (BantuanPd) to $obj2 (AnggotaRombel)
                $obj2->addBantuanPd($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of BantuanPd objects pre-filled with their JenisBantuan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BantuanPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisBantuan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);
        }

        BantuanPdPeer::addSelectColumns($criteria);
        $startcol = BantuanPdPeer::NUM_HYDRATE_COLUMNS;
        JenisBantuanPeer::addSelectColumns($criteria);

        $criteria->addJoin(BantuanPdPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BantuanPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BantuanPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BantuanPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BantuanPdPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (BantuanPd) to $obj2 (JenisBantuan)
                $obj2->addBantuanPd($obj1);

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
        $criteria->setPrimaryTableName(BantuanPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BantuanPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BantuanPdPeer::ANGGOTA_ROMBEL_ID, AnggotaRombelPeer::ANGGOTA_ROMBEL_ID, $join_behavior);

        $criteria->addJoin(BantuanPdPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);

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
     * Selects a collection of BantuanPd objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BantuanPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);
        }

        BantuanPdPeer::addSelectColumns($criteria);
        $startcol2 = BantuanPdPeer::NUM_HYDRATE_COLUMNS;

        AnggotaRombelPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + AnggotaRombelPeer::NUM_HYDRATE_COLUMNS;

        JenisBantuanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisBantuanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BantuanPdPeer::ANGGOTA_ROMBEL_ID, AnggotaRombelPeer::ANGGOTA_ROMBEL_ID, $join_behavior);

        $criteria->addJoin(BantuanPdPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BantuanPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BantuanPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BantuanPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BantuanPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined AnggotaRombel rows

            $key2 = AnggotaRombelPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = AnggotaRombelPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AnggotaRombelPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    AnggotaRombelPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (BantuanPd) to the collection in $obj2 (AnggotaRombel)
                $obj2->addBantuanPd($obj1);
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

                // Add the $obj1 (BantuanPd) to the collection in $obj3 (JenisBantuan)
                $obj3->addBantuanPd($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related AnggotaRombel table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAnggotaRombel(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BantuanPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BantuanPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BantuanPdPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(BantuanPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BantuanPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BantuanPdPeer::ANGGOTA_ROMBEL_ID, AnggotaRombelPeer::ANGGOTA_ROMBEL_ID, $join_behavior);

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
     * Selects a collection of BantuanPd objects pre-filled with all related objects except AnggotaRombel.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BantuanPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAnggotaRombel(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);
        }

        BantuanPdPeer::addSelectColumns($criteria);
        $startcol2 = BantuanPdPeer::NUM_HYDRATE_COLUMNS;

        JenisBantuanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisBantuanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BantuanPdPeer::JENIS_BANTUAN_ID, JenisBantuanPeer::JENIS_BANTUAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BantuanPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BantuanPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BantuanPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BantuanPdPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (BantuanPd) to the collection in $obj2 (JenisBantuan)
                $obj2->addBantuanPd($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of BantuanPd objects pre-filled with all related objects except JenisBantuan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BantuanPd objects.
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
            $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);
        }

        BantuanPdPeer::addSelectColumns($criteria);
        $startcol2 = BantuanPdPeer::NUM_HYDRATE_COLUMNS;

        AnggotaRombelPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + AnggotaRombelPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BantuanPdPeer::ANGGOTA_ROMBEL_ID, AnggotaRombelPeer::ANGGOTA_ROMBEL_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BantuanPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BantuanPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BantuanPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BantuanPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined AnggotaRombel rows

                $key2 = AnggotaRombelPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = AnggotaRombelPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = AnggotaRombelPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    AnggotaRombelPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (BantuanPd) to the collection in $obj2 (AnggotaRombel)
                $obj2->addBantuanPd($obj1);

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
        return Propel::getDatabaseMap(BantuanPdPeer::DATABASE_NAME)->getTable(BantuanPdPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseBantuanPdPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseBantuanPdPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new BantuanPdTableMap());
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
        return BantuanPdPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a BantuanPd or Criteria object.
     *
     * @param      mixed $values Criteria or BantuanPd object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from BantuanPd object
        }


        // Set the correct dbName
        $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a BantuanPd or Criteria object.
     *
     * @param      mixed $values Criteria or BantuanPd object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(BantuanPdPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(BantuanPdPeer::ID_BANTUAN_PD);
            $value = $criteria->remove(BantuanPdPeer::ID_BANTUAN_PD);
            if ($value) {
                $selectCriteria->add(BantuanPdPeer::ID_BANTUAN_PD, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BantuanPdPeer::TABLE_NAME);
            }

        } else { // $values is BantuanPd object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the bantuan_pd table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(BantuanPdPeer::TABLE_NAME, $con, BantuanPdPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BantuanPdPeer::clearInstancePool();
            BantuanPdPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a BantuanPd or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or BantuanPd object or primary key or array of primary keys
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
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            BantuanPdPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof BantuanPd) { // it's a model object
            // invalidate the cache for this single object
            BantuanPdPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BantuanPdPeer::DATABASE_NAME);
            $criteria->add(BantuanPdPeer::ID_BANTUAN_PD, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                BantuanPdPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(BantuanPdPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            BantuanPdPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given BantuanPd object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      BantuanPd $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(BantuanPdPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(BantuanPdPeer::TABLE_NAME);

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

        return BasePeer::doValidate(BantuanPdPeer::DATABASE_NAME, BantuanPdPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return BantuanPd
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = BantuanPdPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(BantuanPdPeer::DATABASE_NAME);
        $criteria->add(BantuanPdPeer::ID_BANTUAN_PD, $pk);

        $v = BantuanPdPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return BantuanPd[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(BantuanPdPeer::DATABASE_NAME);
            $criteria->add(BantuanPdPeer::ID_BANTUAN_PD, $pks, Criteria::IN);
            $objs = BantuanPdPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseBantuanPdPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBantuanPdPeer::buildTableMap();

