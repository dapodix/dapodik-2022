<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BentukPendidikan;
use DataDikdas\Model\BentukPendidikanPeer;
use DataDikdas\Model\map\BentukPendidikanTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.bentuk_pendidikan' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseBentukPendidikanPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.bentuk_pendidikan';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\BentukPendidikan';

    /** the related TableMap class for this table */
    const TM_CLASS = 'BentukPendidikanTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 15;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 15;

    /** the column name for the bentuk_pendidikan_id field */
    const BENTUK_PENDIDIKAN_ID = 'ref.bentuk_pendidikan.bentuk_pendidikan_id';

    /** the column name for the nama field */
    const NAMA = 'ref.bentuk_pendidikan.nama';

    /** the column name for the jenjang_paud field */
    const JENJANG_PAUD = 'ref.bentuk_pendidikan.jenjang_paud';

    /** the column name for the jenjang_tk field */
    const JENJANG_TK = 'ref.bentuk_pendidikan.jenjang_tk';

    /** the column name for the jenjang_sd field */
    const JENJANG_SD = 'ref.bentuk_pendidikan.jenjang_sd';

    /** the column name for the jenjang_smp field */
    const JENJANG_SMP = 'ref.bentuk_pendidikan.jenjang_smp';

    /** the column name for the jenjang_sma field */
    const JENJANG_SMA = 'ref.bentuk_pendidikan.jenjang_sma';

    /** the column name for the jenjang_tinggi field */
    const JENJANG_TINGGI = 'ref.bentuk_pendidikan.jenjang_tinggi';

    /** the column name for the direktorat_pembinaan field */
    const DIREKTORAT_PEMBINAAN = 'ref.bentuk_pendidikan.direktorat_pembinaan';

    /** the column name for the aktif field */
    const AKTIF = 'ref.bentuk_pendidikan.aktif';

    /** the column name for the formalitas_pendidikan field */
    const FORMALITAS_PENDIDIKAN = 'ref.bentuk_pendidikan.formalitas_pendidikan';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.bentuk_pendidikan.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.bentuk_pendidikan.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.bentuk_pendidikan.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.bentuk_pendidikan.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of BentukPendidikan objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array BentukPendidikan[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. BentukPendidikanPeer::$fieldNames[BentukPendidikanPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('BentukPendidikanId', 'Nama', 'JenjangPaud', 'JenjangTk', 'JenjangSd', 'JenjangSmp', 'JenjangSma', 'JenjangTinggi', 'DirektoratPembinaan', 'Aktif', 'FormalitasPendidikan', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('bentukPendidikanId', 'nama', 'jenjangPaud', 'jenjangTk', 'jenjangSd', 'jenjangSmp', 'jenjangSma', 'jenjangTinggi', 'direktoratPembinaan', 'aktif', 'formalitasPendidikan', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, BentukPendidikanPeer::NAMA, BentukPendidikanPeer::JENJANG_PAUD, BentukPendidikanPeer::JENJANG_TK, BentukPendidikanPeer::JENJANG_SD, BentukPendidikanPeer::JENJANG_SMP, BentukPendidikanPeer::JENJANG_SMA, BentukPendidikanPeer::JENJANG_TINGGI, BentukPendidikanPeer::DIREKTORAT_PEMBINAAN, BentukPendidikanPeer::AKTIF, BentukPendidikanPeer::FORMALITAS_PENDIDIKAN, BentukPendidikanPeer::CREATE_DATE, BentukPendidikanPeer::LAST_UPDATE, BentukPendidikanPeer::EXPIRED_DATE, BentukPendidikanPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('BENTUK_PENDIDIKAN_ID', 'NAMA', 'JENJANG_PAUD', 'JENJANG_TK', 'JENJANG_SD', 'JENJANG_SMP', 'JENJANG_SMA', 'JENJANG_TINGGI', 'DIREKTORAT_PEMBINAAN', 'AKTIF', 'FORMALITAS_PENDIDIKAN', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('bentuk_pendidikan_id', 'nama', 'jenjang_paud', 'jenjang_tk', 'jenjang_sd', 'jenjang_smp', 'jenjang_sma', 'jenjang_tinggi', 'direktorat_pembinaan', 'aktif', 'formalitas_pendidikan', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. BentukPendidikanPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('BentukPendidikanId' => 0, 'Nama' => 1, 'JenjangPaud' => 2, 'JenjangTk' => 3, 'JenjangSd' => 4, 'JenjangSmp' => 5, 'JenjangSma' => 6, 'JenjangTinggi' => 7, 'DirektoratPembinaan' => 8, 'Aktif' => 9, 'FormalitasPendidikan' => 10, 'CreateDate' => 11, 'LastUpdate' => 12, 'ExpiredDate' => 13, 'LastSync' => 14, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('bentukPendidikanId' => 0, 'nama' => 1, 'jenjangPaud' => 2, 'jenjangTk' => 3, 'jenjangSd' => 4, 'jenjangSmp' => 5, 'jenjangSma' => 6, 'jenjangTinggi' => 7, 'direktoratPembinaan' => 8, 'aktif' => 9, 'formalitasPendidikan' => 10, 'createDate' => 11, 'lastUpdate' => 12, 'expiredDate' => 13, 'lastSync' => 14, ),
        BasePeer::TYPE_COLNAME => array (BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID => 0, BentukPendidikanPeer::NAMA => 1, BentukPendidikanPeer::JENJANG_PAUD => 2, BentukPendidikanPeer::JENJANG_TK => 3, BentukPendidikanPeer::JENJANG_SD => 4, BentukPendidikanPeer::JENJANG_SMP => 5, BentukPendidikanPeer::JENJANG_SMA => 6, BentukPendidikanPeer::JENJANG_TINGGI => 7, BentukPendidikanPeer::DIREKTORAT_PEMBINAAN => 8, BentukPendidikanPeer::AKTIF => 9, BentukPendidikanPeer::FORMALITAS_PENDIDIKAN => 10, BentukPendidikanPeer::CREATE_DATE => 11, BentukPendidikanPeer::LAST_UPDATE => 12, BentukPendidikanPeer::EXPIRED_DATE => 13, BentukPendidikanPeer::LAST_SYNC => 14, ),
        BasePeer::TYPE_RAW_COLNAME => array ('BENTUK_PENDIDIKAN_ID' => 0, 'NAMA' => 1, 'JENJANG_PAUD' => 2, 'JENJANG_TK' => 3, 'JENJANG_SD' => 4, 'JENJANG_SMP' => 5, 'JENJANG_SMA' => 6, 'JENJANG_TINGGI' => 7, 'DIREKTORAT_PEMBINAAN' => 8, 'AKTIF' => 9, 'FORMALITAS_PENDIDIKAN' => 10, 'CREATE_DATE' => 11, 'LAST_UPDATE' => 12, 'EXPIRED_DATE' => 13, 'LAST_SYNC' => 14, ),
        BasePeer::TYPE_FIELDNAME => array ('bentuk_pendidikan_id' => 0, 'nama' => 1, 'jenjang_paud' => 2, 'jenjang_tk' => 3, 'jenjang_sd' => 4, 'jenjang_smp' => 5, 'jenjang_sma' => 6, 'jenjang_tinggi' => 7, 'direktorat_pembinaan' => 8, 'aktif' => 9, 'formalitas_pendidikan' => 10, 'create_date' => 11, 'last_update' => 12, 'expired_date' => 13, 'last_sync' => 14, ),
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
        $toNames = BentukPendidikanPeer::getFieldNames($toType);
        $key = isset(BentukPendidikanPeer::$fieldKeys[$fromType][$name]) ? BentukPendidikanPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(BentukPendidikanPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, BentukPendidikanPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return BentukPendidikanPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. BentukPendidikanPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(BentukPendidikanPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID);
            $criteria->addSelectColumn(BentukPendidikanPeer::NAMA);
            $criteria->addSelectColumn(BentukPendidikanPeer::JENJANG_PAUD);
            $criteria->addSelectColumn(BentukPendidikanPeer::JENJANG_TK);
            $criteria->addSelectColumn(BentukPendidikanPeer::JENJANG_SD);
            $criteria->addSelectColumn(BentukPendidikanPeer::JENJANG_SMP);
            $criteria->addSelectColumn(BentukPendidikanPeer::JENJANG_SMA);
            $criteria->addSelectColumn(BentukPendidikanPeer::JENJANG_TINGGI);
            $criteria->addSelectColumn(BentukPendidikanPeer::DIREKTORAT_PEMBINAAN);
            $criteria->addSelectColumn(BentukPendidikanPeer::AKTIF);
            $criteria->addSelectColumn(BentukPendidikanPeer::FORMALITAS_PENDIDIKAN);
            $criteria->addSelectColumn(BentukPendidikanPeer::CREATE_DATE);
            $criteria->addSelectColumn(BentukPendidikanPeer::LAST_UPDATE);
            $criteria->addSelectColumn(BentukPendidikanPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(BentukPendidikanPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.bentuk_pendidikan_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.jenjang_paud');
            $criteria->addSelectColumn($alias . '.jenjang_tk');
            $criteria->addSelectColumn($alias . '.jenjang_sd');
            $criteria->addSelectColumn($alias . '.jenjang_smp');
            $criteria->addSelectColumn($alias . '.jenjang_sma');
            $criteria->addSelectColumn($alias . '.jenjang_tinggi');
            $criteria->addSelectColumn($alias . '.direktorat_pembinaan');
            $criteria->addSelectColumn($alias . '.aktif');
            $criteria->addSelectColumn($alias . '.formalitas_pendidikan');
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
        $criteria->setPrimaryTableName(BentukPendidikanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BentukPendidikanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(BentukPendidikanPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(BentukPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BentukPendidikan
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = BentukPendidikanPeer::doSelect($critcopy, $con);
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
        return BentukPendidikanPeer::populateObjects(BentukPendidikanPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(BentukPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            BentukPendidikanPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(BentukPendidikanPeer::DATABASE_NAME);

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
     * @param      BentukPendidikan $obj A BentukPendidikan object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getBentukPendidikanId();
            } // if key === null
            BentukPendidikanPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A BentukPendidikan object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof BentukPendidikan) {
                $key = (string) $value->getBentukPendidikanId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or BentukPendidikan object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(BentukPendidikanPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   BentukPendidikan Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(BentukPendidikanPeer::$instances[$key])) {
                return BentukPendidikanPeer::$instances[$key];
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
        foreach (BentukPendidikanPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        BentukPendidikanPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.bentuk_pendidikan
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
        $cls = BentukPendidikanPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = BentukPendidikanPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BentukPendidikanPeer::addInstanceToPool($obj, $key);
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
     * @return array (BentukPendidikan object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = BentukPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = BentukPendidikanPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + BentukPendidikanPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BentukPendidikanPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            BentukPendidikanPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(BentukPendidikanPeer::DATABASE_NAME)->getTable(BentukPendidikanPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseBentukPendidikanPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseBentukPendidikanPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new BentukPendidikanTableMap());
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
        return BentukPendidikanPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a BentukPendidikan or Criteria object.
     *
     * @param      mixed $values Criteria or BentukPendidikan object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BentukPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from BentukPendidikan object
        }


        // Set the correct dbName
        $criteria->setDbName(BentukPendidikanPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a BentukPendidikan or Criteria object.
     *
     * @param      mixed $values Criteria or BentukPendidikan object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BentukPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(BentukPendidikanPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID);
            $value = $criteria->remove(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID);
            if ($value) {
                $selectCriteria->add(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BentukPendidikanPeer::TABLE_NAME);
            }

        } else { // $values is BentukPendidikan object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(BentukPendidikanPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.bentuk_pendidikan table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BentukPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(BentukPendidikanPeer::TABLE_NAME, $con, BentukPendidikanPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BentukPendidikanPeer::clearInstancePool();
            BentukPendidikanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a BentukPendidikan or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or BentukPendidikan object or primary key or array of primary keys
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
            $con = Propel::getConnection(BentukPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            BentukPendidikanPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof BentukPendidikan) { // it's a model object
            // invalidate the cache for this single object
            BentukPendidikanPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BentukPendidikanPeer::DATABASE_NAME);
            $criteria->add(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                BentukPendidikanPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(BentukPendidikanPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            BentukPendidikanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given BentukPendidikan object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      BentukPendidikan $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(BentukPendidikanPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(BentukPendidikanPeer::TABLE_NAME);

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

        return BasePeer::doValidate(BentukPendidikanPeer::DATABASE_NAME, BentukPendidikanPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return BentukPendidikan
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = BentukPendidikanPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(BentukPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(BentukPendidikanPeer::DATABASE_NAME);
        $criteria->add(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $pk);

        $v = BentukPendidikanPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return BentukPendidikan[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BentukPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(BentukPendidikanPeer::DATABASE_NAME);
            $criteria->add(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $pks, Criteria::IN);
            $objs = BentukPendidikanPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseBentukPendidikanPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBentukPendidikanPeer::buildTableMap();

