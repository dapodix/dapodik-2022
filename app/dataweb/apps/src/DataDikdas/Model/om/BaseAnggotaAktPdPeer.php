<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\AktPdPeer;
use DataDikdas\Model\AnggotaAktPd;
use DataDikdas\Model\AnggotaAktPdPeer;
use DataDikdas\Model\RegistrasiPesertaDidikPeer;
use DataDikdas\Model\map\AnggotaAktPdTableMap;

/**
 * Base static class for performing query and update operations on the 'anggota_akt_pd' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseAnggotaAktPdPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'anggota_akt_pd';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\AnggotaAktPd';

    /** the related TableMap class for this table */
    const TM_CLASS = 'AnggotaAktPdTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 11;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 11;

    /** the column name for the id_ang_akt_pd field */
    const ID_ANG_AKT_PD = 'anggota_akt_pd.id_ang_akt_pd';

    /** the column name for the id_akt_pd field */
    const ID_AKT_PD = 'anggota_akt_pd.id_akt_pd';

    /** the column name for the registrasi_id field */
    const REGISTRASI_ID = 'anggota_akt_pd.registrasi_id';

    /** the column name for the nm_pd field */
    const NM_PD = 'anggota_akt_pd.nm_pd';

    /** the column name for the nipd field */
    const NIPD = 'anggota_akt_pd.nipd';

    /** the column name for the jns_peran_pd field */
    const JNS_PERAN_PD = 'anggota_akt_pd.jns_peran_pd';

    /** the column name for the create_date field */
    const CREATE_DATE = 'anggota_akt_pd.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'anggota_akt_pd.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'anggota_akt_pd.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'anggota_akt_pd.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'anggota_akt_pd.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of AnggotaAktPd objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array AnggotaAktPd[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. AnggotaAktPdPeer::$fieldNames[AnggotaAktPdPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdAngAktPd', 'IdAktPd', 'RegistrasiId', 'NmPd', 'Nipd', 'JnsPeranPd', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idAngAktPd', 'idAktPd', 'registrasiId', 'nmPd', 'nipd', 'jnsPeranPd', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (AnggotaAktPdPeer::ID_ANG_AKT_PD, AnggotaAktPdPeer::ID_AKT_PD, AnggotaAktPdPeer::REGISTRASI_ID, AnggotaAktPdPeer::NM_PD, AnggotaAktPdPeer::NIPD, AnggotaAktPdPeer::JNS_PERAN_PD, AnggotaAktPdPeer::CREATE_DATE, AnggotaAktPdPeer::LAST_UPDATE, AnggotaAktPdPeer::SOFT_DELETE, AnggotaAktPdPeer::LAST_SYNC, AnggotaAktPdPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ANG_AKT_PD', 'ID_AKT_PD', 'REGISTRASI_ID', 'NM_PD', 'NIPD', 'JNS_PERAN_PD', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_ang_akt_pd', 'id_akt_pd', 'registrasi_id', 'nm_pd', 'nipd', 'jns_peran_pd', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. AnggotaAktPdPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdAngAktPd' => 0, 'IdAktPd' => 1, 'RegistrasiId' => 2, 'NmPd' => 3, 'Nipd' => 4, 'JnsPeranPd' => 5, 'CreateDate' => 6, 'LastUpdate' => 7, 'SoftDelete' => 8, 'LastSync' => 9, 'UpdaterId' => 10, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idAngAktPd' => 0, 'idAktPd' => 1, 'registrasiId' => 2, 'nmPd' => 3, 'nipd' => 4, 'jnsPeranPd' => 5, 'createDate' => 6, 'lastUpdate' => 7, 'softDelete' => 8, 'lastSync' => 9, 'updaterId' => 10, ),
        BasePeer::TYPE_COLNAME => array (AnggotaAktPdPeer::ID_ANG_AKT_PD => 0, AnggotaAktPdPeer::ID_AKT_PD => 1, AnggotaAktPdPeer::REGISTRASI_ID => 2, AnggotaAktPdPeer::NM_PD => 3, AnggotaAktPdPeer::NIPD => 4, AnggotaAktPdPeer::JNS_PERAN_PD => 5, AnggotaAktPdPeer::CREATE_DATE => 6, AnggotaAktPdPeer::LAST_UPDATE => 7, AnggotaAktPdPeer::SOFT_DELETE => 8, AnggotaAktPdPeer::LAST_SYNC => 9, AnggotaAktPdPeer::UPDATER_ID => 10, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ANG_AKT_PD' => 0, 'ID_AKT_PD' => 1, 'REGISTRASI_ID' => 2, 'NM_PD' => 3, 'NIPD' => 4, 'JNS_PERAN_PD' => 5, 'CREATE_DATE' => 6, 'LAST_UPDATE' => 7, 'SOFT_DELETE' => 8, 'LAST_SYNC' => 9, 'UPDATER_ID' => 10, ),
        BasePeer::TYPE_FIELDNAME => array ('id_ang_akt_pd' => 0, 'id_akt_pd' => 1, 'registrasi_id' => 2, 'nm_pd' => 3, 'nipd' => 4, 'jns_peran_pd' => 5, 'create_date' => 6, 'last_update' => 7, 'soft_delete' => 8, 'last_sync' => 9, 'updater_id' => 10, ),
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
        $toNames = AnggotaAktPdPeer::getFieldNames($toType);
        $key = isset(AnggotaAktPdPeer::$fieldKeys[$fromType][$name]) ? AnggotaAktPdPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(AnggotaAktPdPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, AnggotaAktPdPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return AnggotaAktPdPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. AnggotaAktPdPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(AnggotaAktPdPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(AnggotaAktPdPeer::ID_ANG_AKT_PD);
            $criteria->addSelectColumn(AnggotaAktPdPeer::ID_AKT_PD);
            $criteria->addSelectColumn(AnggotaAktPdPeer::REGISTRASI_ID);
            $criteria->addSelectColumn(AnggotaAktPdPeer::NM_PD);
            $criteria->addSelectColumn(AnggotaAktPdPeer::NIPD);
            $criteria->addSelectColumn(AnggotaAktPdPeer::JNS_PERAN_PD);
            $criteria->addSelectColumn(AnggotaAktPdPeer::CREATE_DATE);
            $criteria->addSelectColumn(AnggotaAktPdPeer::LAST_UPDATE);
            $criteria->addSelectColumn(AnggotaAktPdPeer::SOFT_DELETE);
            $criteria->addSelectColumn(AnggotaAktPdPeer::LAST_SYNC);
            $criteria->addSelectColumn(AnggotaAktPdPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_ang_akt_pd');
            $criteria->addSelectColumn($alias . '.id_akt_pd');
            $criteria->addSelectColumn($alias . '.registrasi_id');
            $criteria->addSelectColumn($alias . '.nm_pd');
            $criteria->addSelectColumn($alias . '.nipd');
            $criteria->addSelectColumn($alias . '.jns_peran_pd');
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
        $criteria->setPrimaryTableName(AnggotaAktPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaAktPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AnggotaAktPd
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = AnggotaAktPdPeer::doSelect($critcopy, $con);
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
        return AnggotaAktPdPeer::populateObjects(AnggotaAktPdPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            AnggotaAktPdPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);

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
     * @param      AnggotaAktPd $obj A AnggotaAktPd object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdAngAktPd();
            } // if key === null
            AnggotaAktPdPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A AnggotaAktPd object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof AnggotaAktPd) {
                $key = (string) $value->getIdAngAktPd();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or AnggotaAktPd object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(AnggotaAktPdPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   AnggotaAktPd Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(AnggotaAktPdPeer::$instances[$key])) {
                return AnggotaAktPdPeer::$instances[$key];
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
        foreach (AnggotaAktPdPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        AnggotaAktPdPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to anggota_akt_pd
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
        $cls = AnggotaAktPdPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = AnggotaAktPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = AnggotaAktPdPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AnggotaAktPdPeer::addInstanceToPool($obj, $key);
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
     * @return array (AnggotaAktPd object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = AnggotaAktPdPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = AnggotaAktPdPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + AnggotaAktPdPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AnggotaAktPdPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            AnggotaAktPdPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related AktPd table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAktPd(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AnggotaAktPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaAktPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AnggotaAktPdPeer::ID_AKT_PD, AktPdPeer::ID_AKT_PD, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RegistrasiPesertaDidik table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRegistrasiPesertaDidik(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AnggotaAktPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaAktPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AnggotaAktPdPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

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
     * Selects a collection of AnggotaAktPd objects pre-filled with their AktPd objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AnggotaAktPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAktPd(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);
        }

        AnggotaAktPdPeer::addSelectColumns($criteria);
        $startcol = AnggotaAktPdPeer::NUM_HYDRATE_COLUMNS;
        AktPdPeer::addSelectColumns($criteria);

        $criteria->addJoin(AnggotaAktPdPeer::ID_AKT_PD, AktPdPeer::ID_AKT_PD, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AnggotaAktPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AnggotaAktPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AnggotaAktPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AnggotaAktPdPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = AktPdPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = AktPdPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AktPdPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    AktPdPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (AnggotaAktPd) to $obj2 (AktPd)
                $obj2->addAnggotaAktPd($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of AnggotaAktPd objects pre-filled with their RegistrasiPesertaDidik objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AnggotaAktPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRegistrasiPesertaDidik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);
        }

        AnggotaAktPdPeer::addSelectColumns($criteria);
        $startcol = AnggotaAktPdPeer::NUM_HYDRATE_COLUMNS;
        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);

        $criteria->addJoin(AnggotaAktPdPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AnggotaAktPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AnggotaAktPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AnggotaAktPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AnggotaAktPdPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RegistrasiPesertaDidikPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RegistrasiPesertaDidikPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (AnggotaAktPd) to $obj2 (RegistrasiPesertaDidik)
                $obj2->addAnggotaAktPd($obj1);

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
        $criteria->setPrimaryTableName(AnggotaAktPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaAktPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AnggotaAktPdPeer::ID_AKT_PD, AktPdPeer::ID_AKT_PD, $join_behavior);

        $criteria->addJoin(AnggotaAktPdPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

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
     * Selects a collection of AnggotaAktPd objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AnggotaAktPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);
        }

        AnggotaAktPdPeer::addSelectColumns($criteria);
        $startcol2 = AnggotaAktPdPeer::NUM_HYDRATE_COLUMNS;

        AktPdPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + AktPdPeer::NUM_HYDRATE_COLUMNS;

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AnggotaAktPdPeer::ID_AKT_PD, AktPdPeer::ID_AKT_PD, $join_behavior);

        $criteria->addJoin(AnggotaAktPdPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AnggotaAktPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AnggotaAktPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AnggotaAktPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AnggotaAktPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined AktPd rows

            $key2 = AktPdPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = AktPdPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = AktPdPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    AktPdPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (AnggotaAktPd) to the collection in $obj2 (AktPd)
                $obj2->addAnggotaAktPd($obj1);
            } // if joined row not null

            // Add objects for joined RegistrasiPesertaDidik rows

            $key3 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = RegistrasiPesertaDidikPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RegistrasiPesertaDidikPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (AnggotaAktPd) to the collection in $obj3 (RegistrasiPesertaDidik)
                $obj3->addAnggotaAktPd($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related AktPd table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptAktPd(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AnggotaAktPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaAktPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AnggotaAktPdPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RegistrasiPesertaDidik table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRegistrasiPesertaDidik(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AnggotaAktPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaAktPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AnggotaAktPdPeer::ID_AKT_PD, AktPdPeer::ID_AKT_PD, $join_behavior);

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
     * Selects a collection of AnggotaAktPd objects pre-filled with all related objects except AktPd.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AnggotaAktPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptAktPd(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);
        }

        AnggotaAktPdPeer::addSelectColumns($criteria);
        $startcol2 = AnggotaAktPdPeer::NUM_HYDRATE_COLUMNS;

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AnggotaAktPdPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AnggotaAktPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AnggotaAktPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AnggotaAktPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AnggotaAktPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined RegistrasiPesertaDidik rows

                $key2 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = RegistrasiPesertaDidikPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RegistrasiPesertaDidikPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (AnggotaAktPd) to the collection in $obj2 (RegistrasiPesertaDidik)
                $obj2->addAnggotaAktPd($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of AnggotaAktPd objects pre-filled with all related objects except RegistrasiPesertaDidik.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AnggotaAktPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRegistrasiPesertaDidik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);
        }

        AnggotaAktPdPeer::addSelectColumns($criteria);
        $startcol2 = AnggotaAktPdPeer::NUM_HYDRATE_COLUMNS;

        AktPdPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + AktPdPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AnggotaAktPdPeer::ID_AKT_PD, AktPdPeer::ID_AKT_PD, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AnggotaAktPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AnggotaAktPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AnggotaAktPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AnggotaAktPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined AktPd rows

                $key2 = AktPdPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = AktPdPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = AktPdPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    AktPdPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (AnggotaAktPd) to the collection in $obj2 (AktPd)
                $obj2->addAnggotaAktPd($obj1);

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
        return Propel::getDatabaseMap(AnggotaAktPdPeer::DATABASE_NAME)->getTable(AnggotaAktPdPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseAnggotaAktPdPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseAnggotaAktPdPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new AnggotaAktPdTableMap());
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
        return AnggotaAktPdPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a AnggotaAktPd or Criteria object.
     *
     * @param      mixed $values Criteria or AnggotaAktPd object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from AnggotaAktPd object
        }


        // Set the correct dbName
        $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a AnggotaAktPd or Criteria object.
     *
     * @param      mixed $values Criteria or AnggotaAktPd object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(AnggotaAktPdPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(AnggotaAktPdPeer::ID_ANG_AKT_PD);
            $value = $criteria->remove(AnggotaAktPdPeer::ID_ANG_AKT_PD);
            if ($value) {
                $selectCriteria->add(AnggotaAktPdPeer::ID_ANG_AKT_PD, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(AnggotaAktPdPeer::TABLE_NAME);
            }

        } else { // $values is AnggotaAktPd object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the anggota_akt_pd table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(AnggotaAktPdPeer::TABLE_NAME, $con, AnggotaAktPdPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AnggotaAktPdPeer::clearInstancePool();
            AnggotaAktPdPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a AnggotaAktPd or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or AnggotaAktPd object or primary key or array of primary keys
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
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            AnggotaAktPdPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof AnggotaAktPd) { // it's a model object
            // invalidate the cache for this single object
            AnggotaAktPdPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AnggotaAktPdPeer::DATABASE_NAME);
            $criteria->add(AnggotaAktPdPeer::ID_ANG_AKT_PD, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                AnggotaAktPdPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(AnggotaAktPdPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            AnggotaAktPdPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given AnggotaAktPd object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      AnggotaAktPd $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(AnggotaAktPdPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(AnggotaAktPdPeer::TABLE_NAME);

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

        return BasePeer::doValidate(AnggotaAktPdPeer::DATABASE_NAME, AnggotaAktPdPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return AnggotaAktPd
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = AnggotaAktPdPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(AnggotaAktPdPeer::DATABASE_NAME);
        $criteria->add(AnggotaAktPdPeer::ID_ANG_AKT_PD, $pk);

        $v = AnggotaAktPdPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return AnggotaAktPd[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AnggotaAktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(AnggotaAktPdPeer::DATABASE_NAME);
            $criteria->add(AnggotaAktPdPeer::ID_ANG_AKT_PD, $pks, Criteria::IN);
            $objs = AnggotaAktPdPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseAnggotaAktPdPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseAnggotaAktPdPeer::buildTableMap();

