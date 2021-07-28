<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\ErrortypePeer;
use DataDikdas\Model\PtkTerdaftarPeer;
use DataDikdas\Model\VldPtkTerdaftar;
use DataDikdas\Model\VldPtkTerdaftarPeer;
use DataDikdas\Model\map\VldPtkTerdaftarTableMap;

/**
 * Base static class for performing query and update operations on the 'vld_ptk_terdaftar' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseVldPtkTerdaftarPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'vld_ptk_terdaftar';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\VldPtkTerdaftar';

    /** the related TableMap class for this table */
    const TM_CLASS = 'VldPtkTerdaftarTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 13;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 13;

    /** the column name for the logid field */
    const LOGID = 'vld_ptk_terdaftar.logid';

    /** the column name for the ptk_terdaftar_id field */
    const PTK_TERDAFTAR_ID = 'vld_ptk_terdaftar.ptk_terdaftar_id';

    /** the column name for the idtype field */
    const IDTYPE = 'vld_ptk_terdaftar.idtype';

    /** the column name for the status_validasi field */
    const STATUS_VALIDASI = 'vld_ptk_terdaftar.status_validasi';

    /** the column name for the field_error field */
    const FIELD_ERROR = 'vld_ptk_terdaftar.field_error';

    /** the column name for the error_message field */
    const ERROR_MESSAGE = 'vld_ptk_terdaftar.error_message';

    /** the column name for the app_username field */
    const APP_USERNAME = 'vld_ptk_terdaftar.app_username';

    /** the column name for the keterangan field */
    const KETERANGAN = 'vld_ptk_terdaftar.keterangan';

    /** the column name for the create_date field */
    const CREATE_DATE = 'vld_ptk_terdaftar.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'vld_ptk_terdaftar.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'vld_ptk_terdaftar.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'vld_ptk_terdaftar.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'vld_ptk_terdaftar.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of VldPtkTerdaftar objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array VldPtkTerdaftar[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. VldPtkTerdaftarPeer::$fieldNames[VldPtkTerdaftarPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Logid', 'PtkTerdaftarId', 'Idtype', 'StatusValidasi', 'FieldError', 'ErrorMessage', 'AppUsername', 'Keterangan', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('logid', 'ptkTerdaftarId', 'idtype', 'statusValidasi', 'fieldError', 'errorMessage', 'appUsername', 'keterangan', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (VldPtkTerdaftarPeer::LOGID, VldPtkTerdaftarPeer::PTK_TERDAFTAR_ID, VldPtkTerdaftarPeer::IDTYPE, VldPtkTerdaftarPeer::STATUS_VALIDASI, VldPtkTerdaftarPeer::FIELD_ERROR, VldPtkTerdaftarPeer::ERROR_MESSAGE, VldPtkTerdaftarPeer::APP_USERNAME, VldPtkTerdaftarPeer::KETERANGAN, VldPtkTerdaftarPeer::CREATE_DATE, VldPtkTerdaftarPeer::LAST_UPDATE, VldPtkTerdaftarPeer::SOFT_DELETE, VldPtkTerdaftarPeer::LAST_SYNC, VldPtkTerdaftarPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('LOGID', 'PTK_TERDAFTAR_ID', 'IDTYPE', 'STATUS_VALIDASI', 'FIELD_ERROR', 'ERROR_MESSAGE', 'APP_USERNAME', 'KETERANGAN', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('logid', 'ptk_terdaftar_id', 'idtype', 'status_validasi', 'field_error', 'error_message', 'app_username', 'keterangan', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. VldPtkTerdaftarPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Logid' => 0, 'PtkTerdaftarId' => 1, 'Idtype' => 2, 'StatusValidasi' => 3, 'FieldError' => 4, 'ErrorMessage' => 5, 'AppUsername' => 6, 'Keterangan' => 7, 'CreateDate' => 8, 'LastUpdate' => 9, 'SoftDelete' => 10, 'LastSync' => 11, 'UpdaterId' => 12, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('logid' => 0, 'ptkTerdaftarId' => 1, 'idtype' => 2, 'statusValidasi' => 3, 'fieldError' => 4, 'errorMessage' => 5, 'appUsername' => 6, 'keterangan' => 7, 'createDate' => 8, 'lastUpdate' => 9, 'softDelete' => 10, 'lastSync' => 11, 'updaterId' => 12, ),
        BasePeer::TYPE_COLNAME => array (VldPtkTerdaftarPeer::LOGID => 0, VldPtkTerdaftarPeer::PTK_TERDAFTAR_ID => 1, VldPtkTerdaftarPeer::IDTYPE => 2, VldPtkTerdaftarPeer::STATUS_VALIDASI => 3, VldPtkTerdaftarPeer::FIELD_ERROR => 4, VldPtkTerdaftarPeer::ERROR_MESSAGE => 5, VldPtkTerdaftarPeer::APP_USERNAME => 6, VldPtkTerdaftarPeer::KETERANGAN => 7, VldPtkTerdaftarPeer::CREATE_DATE => 8, VldPtkTerdaftarPeer::LAST_UPDATE => 9, VldPtkTerdaftarPeer::SOFT_DELETE => 10, VldPtkTerdaftarPeer::LAST_SYNC => 11, VldPtkTerdaftarPeer::UPDATER_ID => 12, ),
        BasePeer::TYPE_RAW_COLNAME => array ('LOGID' => 0, 'PTK_TERDAFTAR_ID' => 1, 'IDTYPE' => 2, 'STATUS_VALIDASI' => 3, 'FIELD_ERROR' => 4, 'ERROR_MESSAGE' => 5, 'APP_USERNAME' => 6, 'KETERANGAN' => 7, 'CREATE_DATE' => 8, 'LAST_UPDATE' => 9, 'SOFT_DELETE' => 10, 'LAST_SYNC' => 11, 'UPDATER_ID' => 12, ),
        BasePeer::TYPE_FIELDNAME => array ('logid' => 0, 'ptk_terdaftar_id' => 1, 'idtype' => 2, 'status_validasi' => 3, 'field_error' => 4, 'error_message' => 5, 'app_username' => 6, 'keterangan' => 7, 'create_date' => 8, 'last_update' => 9, 'soft_delete' => 10, 'last_sync' => 11, 'updater_id' => 12, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $toNames = VldPtkTerdaftarPeer::getFieldNames($toType);
        $key = isset(VldPtkTerdaftarPeer::$fieldKeys[$fromType][$name]) ? VldPtkTerdaftarPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(VldPtkTerdaftarPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, VldPtkTerdaftarPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return VldPtkTerdaftarPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. VldPtkTerdaftarPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(VldPtkTerdaftarPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::LOGID);
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::PTK_TERDAFTAR_ID);
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::IDTYPE);
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::STATUS_VALIDASI);
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::FIELD_ERROR);
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::ERROR_MESSAGE);
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::APP_USERNAME);
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::KETERANGAN);
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::CREATE_DATE);
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::LAST_UPDATE);
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::SOFT_DELETE);
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::LAST_SYNC);
            $criteria->addSelectColumn(VldPtkTerdaftarPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.logid');
            $criteria->addSelectColumn($alias . '.ptk_terdaftar_id');
            $criteria->addSelectColumn($alias . '.idtype');
            $criteria->addSelectColumn($alias . '.status_validasi');
            $criteria->addSelectColumn($alias . '.field_error');
            $criteria->addSelectColumn($alias . '.error_message');
            $criteria->addSelectColumn($alias . '.app_username');
            $criteria->addSelectColumn($alias . '.keterangan');
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
        $criteria->setPrimaryTableName(VldPtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VldPtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 VldPtkTerdaftar
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = VldPtkTerdaftarPeer::doSelect($critcopy, $con);
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
        return VldPtkTerdaftarPeer::populateObjects(VldPtkTerdaftarPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            VldPtkTerdaftarPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);

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
     * @param      VldPtkTerdaftar $obj A VldPtkTerdaftar object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getLogid();
            } // if key === null
            VldPtkTerdaftarPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A VldPtkTerdaftar object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof VldPtkTerdaftar) {
                $key = (string) $value->getLogid();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or VldPtkTerdaftar object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(VldPtkTerdaftarPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   VldPtkTerdaftar Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(VldPtkTerdaftarPeer::$instances[$key])) {
                return VldPtkTerdaftarPeer::$instances[$key];
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
        foreach (VldPtkTerdaftarPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        VldPtkTerdaftarPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to vld_ptk_terdaftar
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
        $cls = VldPtkTerdaftarPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = VldPtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = VldPtkTerdaftarPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                VldPtkTerdaftarPeer::addInstanceToPool($obj, $key);
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
     * @return array (VldPtkTerdaftar object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = VldPtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = VldPtkTerdaftarPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + VldPtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = VldPtkTerdaftarPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            VldPtkTerdaftarPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Errortype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinErrortype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(VldPtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VldPtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(VldPtkTerdaftarPeer::IDTYPE, ErrortypePeer::IDTYPE, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PtkTerdaftar table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPtkTerdaftar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(VldPtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VldPtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(VldPtkTerdaftarPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

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
     * Selects a collection of VldPtkTerdaftar objects pre-filled with their Errortype objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of VldPtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinErrortype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);
        }

        VldPtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol = VldPtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        ErrortypePeer::addSelectColumns($criteria);

        $criteria->addJoin(VldPtkTerdaftarPeer::IDTYPE, ErrortypePeer::IDTYPE, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = VldPtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = VldPtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = VldPtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                VldPtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = ErrortypePeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = ErrortypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ErrortypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    ErrortypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (VldPtkTerdaftar) to $obj2 (Errortype)
                $obj2->addVldPtkTerdaftar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of VldPtkTerdaftar objects pre-filled with their PtkTerdaftar objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of VldPtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtkTerdaftar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);
        }

        VldPtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol = VldPtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;
        PtkTerdaftarPeer::addSelectColumns($criteria);

        $criteria->addJoin(VldPtkTerdaftarPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = VldPtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = VldPtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = VldPtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                VldPtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PtkTerdaftarPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PtkTerdaftarPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PtkTerdaftarPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (VldPtkTerdaftar) to $obj2 (PtkTerdaftar)
                $obj2->addVldPtkTerdaftar($obj1);

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
        $criteria->setPrimaryTableName(VldPtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VldPtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(VldPtkTerdaftarPeer::IDTYPE, ErrortypePeer::IDTYPE, $join_behavior);

        $criteria->addJoin(VldPtkTerdaftarPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

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
     * Selects a collection of VldPtkTerdaftar objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of VldPtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);
        }

        VldPtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = VldPtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        ErrortypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ErrortypePeer::NUM_HYDRATE_COLUMNS;

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(VldPtkTerdaftarPeer::IDTYPE, ErrortypePeer::IDTYPE, $join_behavior);

        $criteria->addJoin(VldPtkTerdaftarPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = VldPtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = VldPtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = VldPtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                VldPtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Errortype rows

            $key2 = ErrortypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = ErrortypePeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = ErrortypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ErrortypePeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (VldPtkTerdaftar) to the collection in $obj2 (Errortype)
                $obj2->addVldPtkTerdaftar($obj1);
            } // if joined row not null

            // Add objects for joined PtkTerdaftar rows

            $key3 = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PtkTerdaftarPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PtkTerdaftarPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PtkTerdaftarPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (VldPtkTerdaftar) to the collection in $obj3 (PtkTerdaftar)
                $obj3->addVldPtkTerdaftar($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Errortype table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptErrortype(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(VldPtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VldPtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(VldPtkTerdaftarPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PtkTerdaftar table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPtkTerdaftar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(VldPtkTerdaftarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            VldPtkTerdaftarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(VldPtkTerdaftarPeer::IDTYPE, ErrortypePeer::IDTYPE, $join_behavior);

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
     * Selects a collection of VldPtkTerdaftar objects pre-filled with all related objects except Errortype.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of VldPtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptErrortype(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);
        }

        VldPtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = VldPtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(VldPtkTerdaftarPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = VldPtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = VldPtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = VldPtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                VldPtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined PtkTerdaftar rows

                $key2 = PtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PtkTerdaftarPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PtkTerdaftarPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PtkTerdaftarPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (VldPtkTerdaftar) to the collection in $obj2 (PtkTerdaftar)
                $obj2->addVldPtkTerdaftar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of VldPtkTerdaftar objects pre-filled with all related objects except PtkTerdaftar.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of VldPtkTerdaftar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPtkTerdaftar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);
        }

        VldPtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol2 = VldPtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        ErrortypePeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + ErrortypePeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(VldPtkTerdaftarPeer::IDTYPE, ErrortypePeer::IDTYPE, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = VldPtkTerdaftarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = VldPtkTerdaftarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = VldPtkTerdaftarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                VldPtkTerdaftarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Errortype rows

                $key2 = ErrortypePeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = ErrortypePeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = ErrortypePeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    ErrortypePeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (VldPtkTerdaftar) to the collection in $obj2 (Errortype)
                $obj2->addVldPtkTerdaftar($obj1);

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
        return Propel::getDatabaseMap(VldPtkTerdaftarPeer::DATABASE_NAME)->getTable(VldPtkTerdaftarPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseVldPtkTerdaftarPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseVldPtkTerdaftarPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new VldPtkTerdaftarTableMap());
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
        return VldPtkTerdaftarPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a VldPtkTerdaftar or Criteria object.
     *
     * @param      mixed $values Criteria or VldPtkTerdaftar object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from VldPtkTerdaftar object
        }


        // Set the correct dbName
        $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a VldPtkTerdaftar or Criteria object.
     *
     * @param      mixed $values Criteria or VldPtkTerdaftar object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(VldPtkTerdaftarPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(VldPtkTerdaftarPeer::LOGID);
            $value = $criteria->remove(VldPtkTerdaftarPeer::LOGID);
            if ($value) {
                $selectCriteria->add(VldPtkTerdaftarPeer::LOGID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(VldPtkTerdaftarPeer::TABLE_NAME);
            }

        } else { // $values is VldPtkTerdaftar object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the vld_ptk_terdaftar table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(VldPtkTerdaftarPeer::TABLE_NAME, $con, VldPtkTerdaftarPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            VldPtkTerdaftarPeer::clearInstancePool();
            VldPtkTerdaftarPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a VldPtkTerdaftar or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or VldPtkTerdaftar object or primary key or array of primary keys
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
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            VldPtkTerdaftarPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof VldPtkTerdaftar) { // it's a model object
            // invalidate the cache for this single object
            VldPtkTerdaftarPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(VldPtkTerdaftarPeer::DATABASE_NAME);
            $criteria->add(VldPtkTerdaftarPeer::LOGID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                VldPtkTerdaftarPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(VldPtkTerdaftarPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            VldPtkTerdaftarPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given VldPtkTerdaftar object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      VldPtkTerdaftar $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(VldPtkTerdaftarPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(VldPtkTerdaftarPeer::TABLE_NAME);

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

        return BasePeer::doValidate(VldPtkTerdaftarPeer::DATABASE_NAME, VldPtkTerdaftarPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return VldPtkTerdaftar
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = VldPtkTerdaftarPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(VldPtkTerdaftarPeer::DATABASE_NAME);
        $criteria->add(VldPtkTerdaftarPeer::LOGID, $pk);

        $v = VldPtkTerdaftarPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return VldPtkTerdaftar[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(VldPtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(VldPtkTerdaftarPeer::DATABASE_NAME);
            $criteria->add(VldPtkTerdaftarPeer::LOGID, $pks, Criteria::IN);
            $objs = VldPtkTerdaftarPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseVldPtkTerdaftarPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseVldPtkTerdaftarPeer::buildTableMap();

