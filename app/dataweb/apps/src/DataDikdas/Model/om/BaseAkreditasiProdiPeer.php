<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\AkreditasiPeer;
use DataDikdas\Model\AkreditasiProdi;
use DataDikdas\Model\AkreditasiProdiPeer;
use DataDikdas\Model\JurusanSpPeer;
use DataDikdas\Model\LembagaAkreditasiPeer;
use DataDikdas\Model\map\AkreditasiProdiTableMap;

/**
 * Base static class for performing query and update operations on the 'akreditasi_prodi' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseAkreditasiProdiPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'akreditasi_prodi';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\AkreditasiProdi';

    /** the related TableMap class for this table */
    const TM_CLASS = 'AkreditasiProdiTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 12;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 12;

    /** the column name for the akred_prodi_id field */
    const AKRED_PRODI_ID = 'akreditasi_prodi.akred_prodi_id';

    /** the column name for the akreditasi_id field */
    const AKREDITASI_ID = 'akreditasi_prodi.akreditasi_id';

    /** the column name for the la_id field */
    const LA_ID = 'akreditasi_prodi.la_id';

    /** the column name for the jurusan_sp_id field */
    const JURUSAN_SP_ID = 'akreditasi_prodi.jurusan_sp_id';

    /** the column name for the no_sk_akred field */
    const NO_SK_AKRED = 'akreditasi_prodi.no_sk_akred';

    /** the column name for the tgl_sk_akred field */
    const TGL_SK_AKRED = 'akreditasi_prodi.tgl_sk_akred';

    /** the column name for the tgl_akhir_akred field */
    const TGL_AKHIR_AKRED = 'akreditasi_prodi.tgl_akhir_akred';

    /** the column name for the create_date field */
    const CREATE_DATE = 'akreditasi_prodi.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'akreditasi_prodi.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'akreditasi_prodi.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'akreditasi_prodi.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'akreditasi_prodi.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of AkreditasiProdi objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array AkreditasiProdi[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. AkreditasiProdiPeer::$fieldNames[AkreditasiProdiPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('AkredProdiId', 'AkreditasiId', 'LaId', 'JurusanSpId', 'NoSkAkred', 'TglSkAkred', 'TglAkhirAkred', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('akredProdiId', 'akreditasiId', 'laId', 'jurusanSpId', 'noSkAkred', 'tglSkAkred', 'tglAkhirAkred', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (AkreditasiProdiPeer::AKRED_PRODI_ID, AkreditasiProdiPeer::AKREDITASI_ID, AkreditasiProdiPeer::LA_ID, AkreditasiProdiPeer::JURUSAN_SP_ID, AkreditasiProdiPeer::NO_SK_AKRED, AkreditasiProdiPeer::TGL_SK_AKRED, AkreditasiProdiPeer::TGL_AKHIR_AKRED, AkreditasiProdiPeer::CREATE_DATE, AkreditasiProdiPeer::LAST_UPDATE, AkreditasiProdiPeer::SOFT_DELETE, AkreditasiProdiPeer::LAST_SYNC, AkreditasiProdiPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('AKRED_PRODI_ID', 'AKREDITASI_ID', 'LA_ID', 'JURUSAN_SP_ID', 'NO_SK_AKRED', 'TGL_SK_AKRED', 'TGL_AKHIR_AKRED', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('akred_prodi_id', 'akreditasi_id', 'la_id', 'jurusan_sp_id', 'no_sk_akred', 'tgl_sk_akred', 'tgl_akhir_akred', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. AkreditasiProdiPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('AkredProdiId' => 0, 'AkreditasiId' => 1, 'LaId' => 2, 'JurusanSpId' => 3, 'NoSkAkred' => 4, 'TglSkAkred' => 5, 'TglAkhirAkred' => 6, 'CreateDate' => 7, 'LastUpdate' => 8, 'SoftDelete' => 9, 'LastSync' => 10, 'UpdaterId' => 11, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('akredProdiId' => 0, 'akreditasiId' => 1, 'laId' => 2, 'jurusanSpId' => 3, 'noSkAkred' => 4, 'tglSkAkred' => 5, 'tglAkhirAkred' => 6, 'createDate' => 7, 'lastUpdate' => 8, 'softDelete' => 9, 'lastSync' => 10, 'updaterId' => 11, ),
        BasePeer::TYPE_COLNAME => array (AkreditasiProdiPeer::AKRED_PRODI_ID => 0, AkreditasiProdiPeer::AKREDITASI_ID => 1, AkreditasiProdiPeer::LA_ID => 2, AkreditasiProdiPeer::JURUSAN_SP_ID => 3, AkreditasiProdiPeer::NO_SK_AKRED => 4, AkreditasiProdiPeer::TGL_SK_AKRED => 5, AkreditasiProdiPeer::TGL_AKHIR_AKRED => 6, AkreditasiProdiPeer::CREATE_DATE => 7, AkreditasiProdiPeer::LAST_UPDATE => 8, AkreditasiProdiPeer::SOFT_DELETE => 9, AkreditasiProdiPeer::LAST_SYNC => 10, AkreditasiProdiPeer::UPDATER_ID => 11, ),
        BasePeer::TYPE_RAW_COLNAME => array ('AKRED_PRODI_ID' => 0, 'AKREDITASI_ID' => 1, 'LA_ID' => 2, 'JURUSAN_SP_ID' => 3, 'NO_SK_AKRED' => 4, 'TGL_SK_AKRED' => 5, 'TGL_AKHIR_AKRED' => 6, 'CREATE_DATE' => 7, 'LAST_UPDATE' => 8, 'SOFT_DELETE' => 9, 'LAST_SYNC' => 10, 'UPDATER_ID' => 11, ),
        BasePeer::TYPE_FIELDNAME => array ('akred_prodi_id' => 0, 'akreditasi_id' => 1, 'la_id' => 2, 'jurusan_sp_id' => 3, 'no_sk_akred' => 4, 'tgl_sk_akred' => 5, 'tgl_akhir_akred' => 6, 'create_date' => 7, 'last_update' => 8, 'soft_delete' => 9, 'last_sync' => 10, 'updater_id' => 11, ),
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
        $toNames = AkreditasiProdiPeer::getFieldNames($toType);
        $key = isset(AkreditasiProdiPeer::$fieldKeys[$fromType][$name]) ? AkreditasiProdiPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(AkreditasiProdiPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, AkreditasiProdiPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return AkreditasiProdiPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. AkreditasiProdiPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(AkreditasiProdiPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(AkreditasiProdiPeer::AKRED_PRODI_ID);
            $criteria->addSelectColumn(AkreditasiProdiPeer::AKREDITASI_ID);
            $criteria->addSelectColumn(AkreditasiProdiPeer::LA_ID);
            $criteria->addSelectColumn(AkreditasiProdiPeer::JURUSAN_SP_ID);
            $criteria->addSelectColumn(AkreditasiProdiPeer::NO_SK_AKRED);
            $criteria->addSelectColumn(AkreditasiProdiPeer::TGL_SK_AKRED);
            $criteria->addSelectColumn(AkreditasiProdiPeer::TGL_AKHIR_AKRED);
            $criteria->addSelectColumn(AkreditasiProdiPeer::CREATE_DATE);
            $criteria->addSelectColumn(AkreditasiProdiPeer::LAST_UPDATE);
            $criteria->addSelectColumn(AkreditasiProdiPeer::SOFT_DELETE);
            $criteria->addSelectColumn(AkreditasiProdiPeer::LAST_SYNC);
            $criteria->addSelectColumn(AkreditasiProdiPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.akred_prodi_id');
            $criteria->addSelectColumn($alias . '.akreditasi_id');
            $criteria->addSelectColumn($alias . '.la_id');
            $criteria->addSelectColumn($alias . '.jurusan_sp_id');
            $criteria->addSelectColumn($alias . '.no_sk_akred');
            $criteria->addSelectColumn($alias . '.tgl_sk_akred');
            $criteria->addSelectColumn($alias . '.tgl_akhir_akred');
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
        $criteria->setPrimaryTableName(AkreditasiProdiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AkreditasiProdiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AkreditasiProdi
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = AkreditasiProdiPeer::doSelect($critcopy, $con);
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
        return AkreditasiProdiPeer::populateObjects(AkreditasiProdiPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            AkreditasiProdiPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);

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
     * @param      AkreditasiProdi $obj A AkreditasiProdi object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getAkredProdiId();
            } // if key === null
            AkreditasiProdiPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A AkreditasiProdi object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof AkreditasiProdi) {
                $key = (string) $value->getAkredProdiId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or AkreditasiProdi object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(AkreditasiProdiPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   AkreditasiProdi Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(AkreditasiProdiPeer::$instances[$key])) {
                return AkreditasiProdiPeer::$instances[$key];
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
        foreach (AkreditasiProdiPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        AkreditasiProdiPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to akreditasi_prodi
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
        $cls = AkreditasiProdiPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = AkreditasiProdiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = AkreditasiProdiPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AkreditasiProdiPeer::addInstanceToPool($obj, $key);
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
     * @return array (AkreditasiProdi object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = AkreditasiProdiPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = AkreditasiProdiPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + AkreditasiProdiPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AkreditasiProdiPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            AkreditasiProdiPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related LembagaAkreditasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLembagaAkreditasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AkreditasiProdiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AkreditasiProdiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AkreditasiProdiPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AkreditasiProdiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AkreditasiProdiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AkreditasiProdiPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Akreditasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAkreditasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AkreditasiProdiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AkreditasiProdiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AkreditasiProdiPeer::AKREDITASI_ID, AkreditasiPeer::AKREDITASI_ID, $join_behavior);

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
     * Selects a collection of AkreditasiProdi objects pre-filled with their LembagaAkreditasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AkreditasiProdi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLembagaAkreditasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);
        }

        AkreditasiProdiPeer::addSelectColumns($criteria);
        $startcol = AkreditasiProdiPeer::NUM_HYDRATE_COLUMNS;
        LembagaAkreditasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(AkreditasiProdiPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AkreditasiProdiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AkreditasiProdiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AkreditasiProdiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AkreditasiProdiPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LembagaAkreditasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LembagaAkreditasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (AkreditasiProdi) to $obj2 (LembagaAkreditasi)
                $obj2->addAkreditasiProdi($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of AkreditasiProdi objects pre-filled with their JurusanSp objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AkreditasiProdi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJurusanSp(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);
        }

        AkreditasiProdiPeer::addSelectColumns($criteria);
        $startcol = AkreditasiProdiPeer::NUM_HYDRATE_COLUMNS;
        JurusanSpPeer::addSelectColumns($criteria);

        $criteria->addJoin(AkreditasiProdiPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AkreditasiProdiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AkreditasiProdiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AkreditasiProdiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AkreditasiProdiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (AkreditasiProdi) to $obj2 (JurusanSp)
                $obj2->addAkreditasiProdi($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of AkreditasiProdi objects pre-filled with their Akreditasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AkreditasiProdi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAkreditasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);
        }

        AkreditasiProdiPeer::addSelectColumns($criteria);
        $startcol = AkreditasiProdiPeer::NUM_HYDRATE_COLUMNS;
        AkreditasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(AkreditasiProdiPeer::AKREDITASI_ID, AkreditasiPeer::AKREDITASI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AkreditasiProdiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AkreditasiProdiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AkreditasiProdiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AkreditasiProdiPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = AkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = AkreditasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AkreditasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    AkreditasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (AkreditasiProdi) to $obj2 (Akreditasi)
                $obj2->addAkreditasiProdi($obj1);

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
        $criteria->setPrimaryTableName(AkreditasiProdiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AkreditasiProdiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AkreditasiProdiPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $criteria->addJoin(AkreditasiProdiPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(AkreditasiProdiPeer::AKREDITASI_ID, AkreditasiPeer::AKREDITASI_ID, $join_behavior);

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
     * Selects a collection of AkreditasiProdi objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AkreditasiProdi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);
        }

        AkreditasiProdiPeer::addSelectColumns($criteria);
        $startcol2 = AkreditasiProdiPeer::NUM_HYDRATE_COLUMNS;

        LembagaAkreditasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        AkreditasiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + AkreditasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AkreditasiProdiPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $criteria->addJoin(AkreditasiProdiPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(AkreditasiProdiPeer::AKREDITASI_ID, AkreditasiPeer::AKREDITASI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AkreditasiProdiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AkreditasiProdiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AkreditasiProdiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AkreditasiProdiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined LembagaAkreditasi rows

            $key2 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = LembagaAkreditasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LembagaAkreditasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (AkreditasiProdi) to the collection in $obj2 (LembagaAkreditasi)
                $obj2->addAkreditasiProdi($obj1);
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

                // Add the $obj1 (AkreditasiProdi) to the collection in $obj3 (JurusanSp)
                $obj3->addAkreditasiProdi($obj1);
            } // if joined row not null

            // Add objects for joined Akreditasi rows

            $key4 = AkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = AkreditasiPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = AkreditasiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    AkreditasiPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (AkreditasiProdi) to the collection in $obj4 (Akreditasi)
                $obj4->addAkreditasiProdi($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related LembagaAkreditasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLembagaAkreditasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AkreditasiProdiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AkreditasiProdiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AkreditasiProdiPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(AkreditasiProdiPeer::AKREDITASI_ID, AkreditasiPeer::AKREDITASI_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AkreditasiProdiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AkreditasiProdiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AkreditasiProdiPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $criteria->addJoin(AkreditasiProdiPeer::AKREDITASI_ID, AkreditasiPeer::AKREDITASI_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Akreditasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAkreditasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AkreditasiProdiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AkreditasiProdiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AkreditasiProdiPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $criteria->addJoin(AkreditasiProdiPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

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
     * Selects a collection of AkreditasiProdi objects pre-filled with all related objects except LembagaAkreditasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AkreditasiProdi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLembagaAkreditasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);
        }

        AkreditasiProdiPeer::addSelectColumns($criteria);
        $startcol2 = AkreditasiProdiPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        AkreditasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + AkreditasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AkreditasiProdiPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(AkreditasiProdiPeer::AKREDITASI_ID, AkreditasiPeer::AKREDITASI_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AkreditasiProdiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AkreditasiProdiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AkreditasiProdiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AkreditasiProdiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (AkreditasiProdi) to the collection in $obj2 (JurusanSp)
                $obj2->addAkreditasiProdi($obj1);

            } // if joined row is not null

                // Add objects for joined Akreditasi rows

                $key3 = AkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = AkreditasiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = AkreditasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    AkreditasiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (AkreditasiProdi) to the collection in $obj3 (Akreditasi)
                $obj3->addAkreditasiProdi($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of AkreditasiProdi objects pre-filled with all related objects except JurusanSp.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AkreditasiProdi objects.
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
            $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);
        }

        AkreditasiProdiPeer::addSelectColumns($criteria);
        $startcol2 = AkreditasiProdiPeer::NUM_HYDRATE_COLUMNS;

        LembagaAkreditasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;

        AkreditasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + AkreditasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AkreditasiProdiPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $criteria->addJoin(AkreditasiProdiPeer::AKREDITASI_ID, AkreditasiPeer::AKREDITASI_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AkreditasiProdiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AkreditasiProdiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AkreditasiProdiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AkreditasiProdiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LembagaAkreditasi rows

                $key2 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LembagaAkreditasiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LembagaAkreditasiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (AkreditasiProdi) to the collection in $obj2 (LembagaAkreditasi)
                $obj2->addAkreditasiProdi($obj1);

            } // if joined row is not null

                // Add objects for joined Akreditasi rows

                $key3 = AkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = AkreditasiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = AkreditasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    AkreditasiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (AkreditasiProdi) to the collection in $obj3 (Akreditasi)
                $obj3->addAkreditasiProdi($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of AkreditasiProdi objects pre-filled with all related objects except Akreditasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AkreditasiProdi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAkreditasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);
        }

        AkreditasiProdiPeer::addSelectColumns($criteria);
        $startcol2 = AkreditasiProdiPeer::NUM_HYDRATE_COLUMNS;

        LembagaAkreditasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AkreditasiProdiPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $criteria->addJoin(AkreditasiProdiPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AkreditasiProdiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AkreditasiProdiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AkreditasiProdiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AkreditasiProdiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LembagaAkreditasi rows

                $key2 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LembagaAkreditasiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LembagaAkreditasiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (AkreditasiProdi) to the collection in $obj2 (LembagaAkreditasi)
                $obj2->addAkreditasiProdi($obj1);

            } // if joined row is not null

                // Add objects for joined JurusanSp rows

                $key3 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JurusanSpPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanSpPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (AkreditasiProdi) to the collection in $obj3 (JurusanSp)
                $obj3->addAkreditasiProdi($obj1);

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
        return Propel::getDatabaseMap(AkreditasiProdiPeer::DATABASE_NAME)->getTable(AkreditasiProdiPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseAkreditasiProdiPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseAkreditasiProdiPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new AkreditasiProdiTableMap());
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
        return AkreditasiProdiPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a AkreditasiProdi or Criteria object.
     *
     * @param      mixed $values Criteria or AkreditasiProdi object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from AkreditasiProdi object
        }


        // Set the correct dbName
        $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a AkreditasiProdi or Criteria object.
     *
     * @param      mixed $values Criteria or AkreditasiProdi object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(AkreditasiProdiPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(AkreditasiProdiPeer::AKRED_PRODI_ID);
            $value = $criteria->remove(AkreditasiProdiPeer::AKRED_PRODI_ID);
            if ($value) {
                $selectCriteria->add(AkreditasiProdiPeer::AKRED_PRODI_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(AkreditasiProdiPeer::TABLE_NAME);
            }

        } else { // $values is AkreditasiProdi object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the akreditasi_prodi table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(AkreditasiProdiPeer::TABLE_NAME, $con, AkreditasiProdiPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AkreditasiProdiPeer::clearInstancePool();
            AkreditasiProdiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a AkreditasiProdi or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or AkreditasiProdi object or primary key or array of primary keys
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
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            AkreditasiProdiPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof AkreditasiProdi) { // it's a model object
            // invalidate the cache for this single object
            AkreditasiProdiPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AkreditasiProdiPeer::DATABASE_NAME);
            $criteria->add(AkreditasiProdiPeer::AKRED_PRODI_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                AkreditasiProdiPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(AkreditasiProdiPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            AkreditasiProdiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given AkreditasiProdi object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      AkreditasiProdi $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(AkreditasiProdiPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(AkreditasiProdiPeer::TABLE_NAME);

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

        return BasePeer::doValidate(AkreditasiProdiPeer::DATABASE_NAME, AkreditasiProdiPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return AkreditasiProdi
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = AkreditasiProdiPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(AkreditasiProdiPeer::DATABASE_NAME);
        $criteria->add(AkreditasiProdiPeer::AKRED_PRODI_ID, $pk);

        $v = AkreditasiProdiPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return AkreditasiProdi[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(AkreditasiProdiPeer::DATABASE_NAME);
            $criteria->add(AkreditasiProdiPeer::AKRED_PRODI_ID, $pks, Criteria::IN);
            $objs = AkreditasiProdiPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseAkreditasiProdiPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseAkreditasiProdiPeer::buildTableMap();

