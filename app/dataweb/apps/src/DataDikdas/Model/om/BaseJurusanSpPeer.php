<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JurusanPeer;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\JurusanSpPeer;
use DataDikdas\Model\KebutuhanKhususPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\map\JurusanSpTableMap;

/**
 * Base static class for performing query and update operations on the 'jurusan_sp' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseJurusanSpPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'jurusan_sp';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\JurusanSp';

    /** the related TableMap class for this table */
    const TM_CLASS = 'JurusanSpTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 12;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 12;

    /** the column name for the jurusan_sp_id field */
    const JURUSAN_SP_ID = 'jurusan_sp.jurusan_sp_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'jurusan_sp.sekolah_id';

    /** the column name for the kebutuhan_khusus_id field */
    const KEBUTUHAN_KHUSUS_ID = 'jurusan_sp.kebutuhan_khusus_id';

    /** the column name for the jurusan_id field */
    const JURUSAN_ID = 'jurusan_sp.jurusan_id';

    /** the column name for the nama_jurusan_sp field */
    const NAMA_JURUSAN_SP = 'jurusan_sp.nama_jurusan_sp';

    /** the column name for the sk_izin field */
    const SK_IZIN = 'jurusan_sp.sk_izin';

    /** the column name for the tanggal_sk_izin field */
    const TANGGAL_SK_IZIN = 'jurusan_sp.tanggal_sk_izin';

    /** the column name for the create_date field */
    const CREATE_DATE = 'jurusan_sp.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'jurusan_sp.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'jurusan_sp.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'jurusan_sp.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'jurusan_sp.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of JurusanSp objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array JurusanSp[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. JurusanSpPeer::$fieldNames[JurusanSpPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('JurusanSpId', 'SekolahId', 'KebutuhanKhususId', 'JurusanId', 'NamaJurusanSp', 'SkIzin', 'TanggalSkIzin', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jurusanSpId', 'sekolahId', 'kebutuhanKhususId', 'jurusanId', 'namaJurusanSp', 'skIzin', 'tanggalSkIzin', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (JurusanSpPeer::JURUSAN_SP_ID, JurusanSpPeer::SEKOLAH_ID, JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, JurusanSpPeer::JURUSAN_ID, JurusanSpPeer::NAMA_JURUSAN_SP, JurusanSpPeer::SK_IZIN, JurusanSpPeer::TANGGAL_SK_IZIN, JurusanSpPeer::CREATE_DATE, JurusanSpPeer::LAST_UPDATE, JurusanSpPeer::SOFT_DELETE, JurusanSpPeer::LAST_SYNC, JurusanSpPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JURUSAN_SP_ID', 'SEKOLAH_ID', 'KEBUTUHAN_KHUSUS_ID', 'JURUSAN_ID', 'NAMA_JURUSAN_SP', 'SK_IZIN', 'TANGGAL_SK_IZIN', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('jurusan_sp_id', 'sekolah_id', 'kebutuhan_khusus_id', 'jurusan_id', 'nama_jurusan_sp', 'sk_izin', 'tanggal_sk_izin', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. JurusanSpPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('JurusanSpId' => 0, 'SekolahId' => 1, 'KebutuhanKhususId' => 2, 'JurusanId' => 3, 'NamaJurusanSp' => 4, 'SkIzin' => 5, 'TanggalSkIzin' => 6, 'CreateDate' => 7, 'LastUpdate' => 8, 'SoftDelete' => 9, 'LastSync' => 10, 'UpdaterId' => 11, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jurusanSpId' => 0, 'sekolahId' => 1, 'kebutuhanKhususId' => 2, 'jurusanId' => 3, 'namaJurusanSp' => 4, 'skIzin' => 5, 'tanggalSkIzin' => 6, 'createDate' => 7, 'lastUpdate' => 8, 'softDelete' => 9, 'lastSync' => 10, 'updaterId' => 11, ),
        BasePeer::TYPE_COLNAME => array (JurusanSpPeer::JURUSAN_SP_ID => 0, JurusanSpPeer::SEKOLAH_ID => 1, JurusanSpPeer::KEBUTUHAN_KHUSUS_ID => 2, JurusanSpPeer::JURUSAN_ID => 3, JurusanSpPeer::NAMA_JURUSAN_SP => 4, JurusanSpPeer::SK_IZIN => 5, JurusanSpPeer::TANGGAL_SK_IZIN => 6, JurusanSpPeer::CREATE_DATE => 7, JurusanSpPeer::LAST_UPDATE => 8, JurusanSpPeer::SOFT_DELETE => 9, JurusanSpPeer::LAST_SYNC => 10, JurusanSpPeer::UPDATER_ID => 11, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JURUSAN_SP_ID' => 0, 'SEKOLAH_ID' => 1, 'KEBUTUHAN_KHUSUS_ID' => 2, 'JURUSAN_ID' => 3, 'NAMA_JURUSAN_SP' => 4, 'SK_IZIN' => 5, 'TANGGAL_SK_IZIN' => 6, 'CREATE_DATE' => 7, 'LAST_UPDATE' => 8, 'SOFT_DELETE' => 9, 'LAST_SYNC' => 10, 'UPDATER_ID' => 11, ),
        BasePeer::TYPE_FIELDNAME => array ('jurusan_sp_id' => 0, 'sekolah_id' => 1, 'kebutuhan_khusus_id' => 2, 'jurusan_id' => 3, 'nama_jurusan_sp' => 4, 'sk_izin' => 5, 'tanggal_sk_izin' => 6, 'create_date' => 7, 'last_update' => 8, 'soft_delete' => 9, 'last_sync' => 10, 'updater_id' => 11, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $toNames = JurusanSpPeer::getFieldNames($toType);
        $key = isset(JurusanSpPeer::$fieldKeys[$fromType][$name]) ? JurusanSpPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(JurusanSpPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, JurusanSpPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return JurusanSpPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. JurusanSpPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(JurusanSpPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(JurusanSpPeer::JURUSAN_SP_ID);
            $criteria->addSelectColumn(JurusanSpPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID);
            $criteria->addSelectColumn(JurusanSpPeer::JURUSAN_ID);
            $criteria->addSelectColumn(JurusanSpPeer::NAMA_JURUSAN_SP);
            $criteria->addSelectColumn(JurusanSpPeer::SK_IZIN);
            $criteria->addSelectColumn(JurusanSpPeer::TANGGAL_SK_IZIN);
            $criteria->addSelectColumn(JurusanSpPeer::CREATE_DATE);
            $criteria->addSelectColumn(JurusanSpPeer::LAST_UPDATE);
            $criteria->addSelectColumn(JurusanSpPeer::SOFT_DELETE);
            $criteria->addSelectColumn(JurusanSpPeer::LAST_SYNC);
            $criteria->addSelectColumn(JurusanSpPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.jurusan_sp_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.kebutuhan_khusus_id');
            $criteria->addSelectColumn($alias . '.jurusan_id');
            $criteria->addSelectColumn($alias . '.nama_jurusan_sp');
            $criteria->addSelectColumn($alias . '.sk_izin');
            $criteria->addSelectColumn($alias . '.tanggal_sk_izin');
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
        $criteria->setPrimaryTableName(JurusanSpPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanSpPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(JurusanSpPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JurusanSp
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = JurusanSpPeer::doSelect($critcopy, $con);
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
        return JurusanSpPeer::populateObjects(JurusanSpPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            JurusanSpPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);

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
     * @param      JurusanSp $obj A JurusanSp object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getJurusanSpId();
            } // if key === null
            JurusanSpPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A JurusanSp object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof JurusanSp) {
                $key = (string) $value->getJurusanSpId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or JurusanSp object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(JurusanSpPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   JurusanSp Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(JurusanSpPeer::$instances[$key])) {
                return JurusanSpPeer::$instances[$key];
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
        foreach (JurusanSpPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        JurusanSpPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to jurusan_sp
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
        $cls = JurusanSpPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = JurusanSpPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = JurusanSpPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JurusanSpPeer::addInstanceToPool($obj, $key);
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
     * @return array (JurusanSp object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = JurusanSpPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + JurusanSpPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JurusanSpPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            JurusanSpPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(JurusanSpPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanSpPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurusanSpPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(JurusanSpPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanSpPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurusanSpPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related KebutuhanKhusus table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKebutuhanKhusus(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JurusanSpPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanSpPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

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
     * Selects a collection of JurusanSp objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurusanSp objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);
        }

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol = JurusanSpPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(JurusanSpPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanSpPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JurusanSpPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanSpPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (JurusanSp) to $obj2 (Sekolah)
                $obj2->addJurusanSp($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of JurusanSp objects pre-filled with their Jurusan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurusanSp objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJurusan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);
        }

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol = JurusanSpPeer::NUM_HYDRATE_COLUMNS;
        JurusanPeer::addSelectColumns($criteria);

        $criteria->addJoin(JurusanSpPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanSpPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JurusanSpPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanSpPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (JurusanSp) to $obj2 (Jurusan)
                $obj2->addJurusanSp($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of JurusanSp objects pre-filled with their KebutuhanKhusus objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurusanSp objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKebutuhanKhusus(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);
        }

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol = JurusanSpPeer::NUM_HYDRATE_COLUMNS;
        KebutuhanKhususPeer::addSelectColumns($criteria);

        $criteria->addJoin(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanSpPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JurusanSpPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanSpPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (JurusanSp) to $obj2 (KebutuhanKhusus)
                $obj2->addJurusanSp($obj1);

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
        $criteria->setPrimaryTableName(JurusanSpPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanSpPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurusanSpPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(JurusanSpPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

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
     * Selects a collection of JurusanSp objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurusanSp objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);
        }

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol2 = JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurusanSpPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(JurusanSpPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanSpPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurusanSpPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanSpPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (JurusanSp) to the collection in $obj2 (Sekolah)
                $obj2->addJurusanSp($obj1);
            } // if joined row not null

            // Add objects for joined Jurusan rows

            $key3 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JurusanPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JurusanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (JurusanSp) to the collection in $obj3 (Jurusan)
                $obj3->addJurusanSp($obj1);
            } // if joined row not null

            // Add objects for joined KebutuhanKhusus rows

            $key4 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = KebutuhanKhususPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = KebutuhanKhususPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    KebutuhanKhususPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (JurusanSp) to the collection in $obj4 (KebutuhanKhusus)
                $obj4->addJurusanSp($obj1);
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
        $criteria->setPrimaryTableName(JurusanSpPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanSpPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JurusanSpPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(JurusanSpPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanSpPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JurusanSpPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related KebutuhanKhusus table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKebutuhanKhusus(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JurusanSpPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanSpPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JurusanSpPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(JurusanSpPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

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
     * Selects a collection of JurusanSp objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurusanSp objects.
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
            $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);
        }

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol2 = JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurusanSpPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanSpPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurusanSpPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanSpPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Jurusan rows

                $key2 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (JurusanSp) to the collection in $obj2 (Jurusan)
                $obj2->addJurusanSp($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (JurusanSp) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addJurusanSp($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of JurusanSp objects pre-filled with all related objects except Jurusan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurusanSp objects.
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
            $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);
        }

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol2 = JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurusanSpPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanSpPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurusanSpPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanSpPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (JurusanSp) to the collection in $obj2 (Sekolah)
                $obj2->addJurusanSp($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (JurusanSp) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addJurusanSp($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of JurusanSp objects pre-filled with all related objects except KebutuhanKhusus.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JurusanSp objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKebutuhanKhusus(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);
        }

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol2 = JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurusanSpPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(JurusanSpPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanSpPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurusanSpPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanSpPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (JurusanSp) to the collection in $obj2 (Sekolah)
                $obj2->addJurusanSp($obj1);

            } // if joined row is not null

                // Add objects for joined Jurusan rows

                $key3 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JurusanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (JurusanSp) to the collection in $obj3 (Jurusan)
                $obj3->addJurusanSp($obj1);

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
        return Propel::getDatabaseMap(JurusanSpPeer::DATABASE_NAME)->getTable(JurusanSpPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseJurusanSpPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseJurusanSpPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new JurusanSpTableMap());
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
        return JurusanSpPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a JurusanSp or Criteria object.
     *
     * @param      mixed $values Criteria or JurusanSp object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from JurusanSp object
        }


        // Set the correct dbName
        $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a JurusanSp or Criteria object.
     *
     * @param      mixed $values Criteria or JurusanSp object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(JurusanSpPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(JurusanSpPeer::JURUSAN_SP_ID);
            $value = $criteria->remove(JurusanSpPeer::JURUSAN_SP_ID);
            if ($value) {
                $selectCriteria->add(JurusanSpPeer::JURUSAN_SP_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JurusanSpPeer::TABLE_NAME);
            }

        } else { // $values is JurusanSp object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the jurusan_sp table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(JurusanSpPeer::TABLE_NAME, $con, JurusanSpPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JurusanSpPeer::clearInstancePool();
            JurusanSpPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a JurusanSp or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or JurusanSp object or primary key or array of primary keys
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
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            JurusanSpPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof JurusanSp) { // it's a model object
            // invalidate the cache for this single object
            JurusanSpPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JurusanSpPeer::DATABASE_NAME);
            $criteria->add(JurusanSpPeer::JURUSAN_SP_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                JurusanSpPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(JurusanSpPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            JurusanSpPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given JurusanSp object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      JurusanSp $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(JurusanSpPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(JurusanSpPeer::TABLE_NAME);

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

        return BasePeer::doValidate(JurusanSpPeer::DATABASE_NAME, JurusanSpPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return JurusanSp
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = JurusanSpPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(JurusanSpPeer::DATABASE_NAME);
        $criteria->add(JurusanSpPeer::JURUSAN_SP_ID, $pk);

        $v = JurusanSpPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return JurusanSp[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(JurusanSpPeer::DATABASE_NAME);
            $criteria->add(JurusanSpPeer::JURUSAN_SP_ID, $pks, Criteria::IN);
            $objs = JurusanSpPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseJurusanSpPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseJurusanSpPeer::buildTableMap();

