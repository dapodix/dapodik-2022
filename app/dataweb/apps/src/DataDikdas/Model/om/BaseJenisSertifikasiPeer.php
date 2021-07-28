<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisSertifikasi;
use DataDikdas\Model\JenisSertifikasiPeer;
use DataDikdas\Model\KebutuhanKhususPeer;
use DataDikdas\Model\map\JenisSertifikasiTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.jenis_sertifikasi' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisSertifikasiPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.jenis_sertifikasi';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\JenisSertifikasi';

    /** the related TableMap class for this table */
    const TM_CLASS = 'JenisSertifikasiTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 11;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 11;

    /** the column name for the id_jenis_sertifikasi field */
    const ID_JENIS_SERTIFIKASI = 'ref.jenis_sertifikasi.id_jenis_sertifikasi';

    /** the column name for the jenis_sertifikasi field */
    const JENIS_SERTIFIKASI = 'ref.jenis_sertifikasi.jenis_sertifikasi';

    /** the column name for the prof_guru field */
    const PROF_GURU = 'ref.jenis_sertifikasi.prof_guru';

    /** the column name for the kepala_sekolah field */
    const KEPALA_SEKOLAH = 'ref.jenis_sertifikasi.kepala_sekolah';

    /** the column name for the laboran field */
    const LABORAN = 'ref.jenis_sertifikasi.laboran';

    /** the column name for the a_pd field */
    const A_PD = 'ref.jenis_sertifikasi.a_pd';

    /** the column name for the kebutuhan_khusus_id field */
    const KEBUTUHAN_KHUSUS_ID = 'ref.jenis_sertifikasi.kebutuhan_khusus_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.jenis_sertifikasi.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.jenis_sertifikasi.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.jenis_sertifikasi.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.jenis_sertifikasi.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of JenisSertifikasi objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array JenisSertifikasi[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. JenisSertifikasiPeer::$fieldNames[JenisSertifikasiPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdJenisSertifikasi', 'JenisSertifikasi', 'ProfGuru', 'KepalaSekolah', 'Laboran', 'APd', 'KebutuhanKhususId', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idJenisSertifikasi', 'jenisSertifikasi', 'profGuru', 'kepalaSekolah', 'laboran', 'aPd', 'kebutuhanKhususId', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::JENIS_SERTIFIKASI, JenisSertifikasiPeer::PROF_GURU, JenisSertifikasiPeer::KEPALA_SEKOLAH, JenisSertifikasiPeer::LABORAN, JenisSertifikasiPeer::A_PD, JenisSertifikasiPeer::KEBUTUHAN_KHUSUS_ID, JenisSertifikasiPeer::CREATE_DATE, JenisSertifikasiPeer::LAST_UPDATE, JenisSertifikasiPeer::EXPIRED_DATE, JenisSertifikasiPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_JENIS_SERTIFIKASI', 'JENIS_SERTIFIKASI', 'PROF_GURU', 'KEPALA_SEKOLAH', 'LABORAN', 'A_PD', 'KEBUTUHAN_KHUSUS_ID', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('id_jenis_sertifikasi', 'jenis_sertifikasi', 'prof_guru', 'kepala_sekolah', 'laboran', 'a_pd', 'kebutuhan_khusus_id', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. JenisSertifikasiPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdJenisSertifikasi' => 0, 'JenisSertifikasi' => 1, 'ProfGuru' => 2, 'KepalaSekolah' => 3, 'Laboran' => 4, 'APd' => 5, 'KebutuhanKhususId' => 6, 'CreateDate' => 7, 'LastUpdate' => 8, 'ExpiredDate' => 9, 'LastSync' => 10, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idJenisSertifikasi' => 0, 'jenisSertifikasi' => 1, 'profGuru' => 2, 'kepalaSekolah' => 3, 'laboran' => 4, 'aPd' => 5, 'kebutuhanKhususId' => 6, 'createDate' => 7, 'lastUpdate' => 8, 'expiredDate' => 9, 'lastSync' => 10, ),
        BasePeer::TYPE_COLNAME => array (JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI => 0, JenisSertifikasiPeer::JENIS_SERTIFIKASI => 1, JenisSertifikasiPeer::PROF_GURU => 2, JenisSertifikasiPeer::KEPALA_SEKOLAH => 3, JenisSertifikasiPeer::LABORAN => 4, JenisSertifikasiPeer::A_PD => 5, JenisSertifikasiPeer::KEBUTUHAN_KHUSUS_ID => 6, JenisSertifikasiPeer::CREATE_DATE => 7, JenisSertifikasiPeer::LAST_UPDATE => 8, JenisSertifikasiPeer::EXPIRED_DATE => 9, JenisSertifikasiPeer::LAST_SYNC => 10, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_JENIS_SERTIFIKASI' => 0, 'JENIS_SERTIFIKASI' => 1, 'PROF_GURU' => 2, 'KEPALA_SEKOLAH' => 3, 'LABORAN' => 4, 'A_PD' => 5, 'KEBUTUHAN_KHUSUS_ID' => 6, 'CREATE_DATE' => 7, 'LAST_UPDATE' => 8, 'EXPIRED_DATE' => 9, 'LAST_SYNC' => 10, ),
        BasePeer::TYPE_FIELDNAME => array ('id_jenis_sertifikasi' => 0, 'jenis_sertifikasi' => 1, 'prof_guru' => 2, 'kepala_sekolah' => 3, 'laboran' => 4, 'a_pd' => 5, 'kebutuhan_khusus_id' => 6, 'create_date' => 7, 'last_update' => 8, 'expired_date' => 9, 'last_sync' => 10, ),
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
        $toNames = JenisSertifikasiPeer::getFieldNames($toType);
        $key = isset(JenisSertifikasiPeer::$fieldKeys[$fromType][$name]) ? JenisSertifikasiPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(JenisSertifikasiPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, JenisSertifikasiPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return JenisSertifikasiPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. JenisSertifikasiPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(JenisSertifikasiPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI);
            $criteria->addSelectColumn(JenisSertifikasiPeer::JENIS_SERTIFIKASI);
            $criteria->addSelectColumn(JenisSertifikasiPeer::PROF_GURU);
            $criteria->addSelectColumn(JenisSertifikasiPeer::KEPALA_SEKOLAH);
            $criteria->addSelectColumn(JenisSertifikasiPeer::LABORAN);
            $criteria->addSelectColumn(JenisSertifikasiPeer::A_PD);
            $criteria->addSelectColumn(JenisSertifikasiPeer::KEBUTUHAN_KHUSUS_ID);
            $criteria->addSelectColumn(JenisSertifikasiPeer::CREATE_DATE);
            $criteria->addSelectColumn(JenisSertifikasiPeer::LAST_UPDATE);
            $criteria->addSelectColumn(JenisSertifikasiPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(JenisSertifikasiPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.id_jenis_sertifikasi');
            $criteria->addSelectColumn($alias . '.jenis_sertifikasi');
            $criteria->addSelectColumn($alias . '.prof_guru');
            $criteria->addSelectColumn($alias . '.kepala_sekolah');
            $criteria->addSelectColumn($alias . '.laboran');
            $criteria->addSelectColumn($alias . '.a_pd');
            $criteria->addSelectColumn($alias . '.kebutuhan_khusus_id');
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
        $criteria->setPrimaryTableName(JenisSertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JenisSertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(JenisSertifikasiPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(JenisSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisSertifikasi
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = JenisSertifikasiPeer::doSelect($critcopy, $con);
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
        return JenisSertifikasiPeer::populateObjects(JenisSertifikasiPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(JenisSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            JenisSertifikasiPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(JenisSertifikasiPeer::DATABASE_NAME);

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
     * @param      JenisSertifikasi $obj A JenisSertifikasi object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdJenisSertifikasi();
            } // if key === null
            JenisSertifikasiPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A JenisSertifikasi object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof JenisSertifikasi) {
                $key = (string) $value->getIdJenisSertifikasi();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or JenisSertifikasi object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(JenisSertifikasiPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   JenisSertifikasi Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(JenisSertifikasiPeer::$instances[$key])) {
                return JenisSertifikasiPeer::$instances[$key];
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
        foreach (JenisSertifikasiPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        JenisSertifikasiPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.jenis_sertifikasi
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
        $cls = JenisSertifikasiPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = JenisSertifikasiPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JenisSertifikasiPeer::addInstanceToPool($obj, $key);
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
     * @return array (JenisSertifikasi object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = JenisSertifikasiPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + JenisSertifikasiPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JenisSertifikasiPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            JenisSertifikasiPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(JenisSertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JenisSertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JenisSertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JenisSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JenisSertifikasiPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

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
     * Selects a collection of JenisSertifikasi objects pre-filled with their KebutuhanKhusus objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JenisSertifikasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKebutuhanKhusus(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JenisSertifikasiPeer::DATABASE_NAME);
        }

        JenisSertifikasiPeer::addSelectColumns($criteria);
        $startcol = JenisSertifikasiPeer::NUM_HYDRATE_COLUMNS;
        KebutuhanKhususPeer::addSelectColumns($criteria);

        $criteria->addJoin(JenisSertifikasiPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JenisSertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JenisSertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JenisSertifikasiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (JenisSertifikasi) to $obj2 (KebutuhanKhusus)
                $obj2->addJenisSertifikasi($obj1);

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
        $criteria->setPrimaryTableName(JenisSertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JenisSertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JenisSertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JenisSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JenisSertifikasiPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

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
     * Selects a collection of JenisSertifikasi objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of JenisSertifikasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JenisSertifikasiPeer::DATABASE_NAME);
        }

        JenisSertifikasiPeer::addSelectColumns($criteria);
        $startcol2 = JenisSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JenisSertifikasiPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JenisSertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JenisSertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JenisSertifikasiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined KebutuhanKhusus rows

            $key2 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = KebutuhanKhususPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KebutuhanKhususPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KebutuhanKhususPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (JenisSertifikasi) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addJenisSertifikasi($obj1);
            } // if joined row not null

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
        return Propel::getDatabaseMap(JenisSertifikasiPeer::DATABASE_NAME)->getTable(JenisSertifikasiPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseJenisSertifikasiPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseJenisSertifikasiPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new JenisSertifikasiTableMap());
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
        return JenisSertifikasiPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a JenisSertifikasi or Criteria object.
     *
     * @param      mixed $values Criteria or JenisSertifikasi object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from JenisSertifikasi object
        }


        // Set the correct dbName
        $criteria->setDbName(JenisSertifikasiPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a JenisSertifikasi or Criteria object.
     *
     * @param      mixed $values Criteria or JenisSertifikasi object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(JenisSertifikasiPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI);
            $value = $criteria->remove(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI);
            if ($value) {
                $selectCriteria->add(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JenisSertifikasiPeer::TABLE_NAME);
            }

        } else { // $values is JenisSertifikasi object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(JenisSertifikasiPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.jenis_sertifikasi table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(JenisSertifikasiPeer::TABLE_NAME, $con, JenisSertifikasiPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JenisSertifikasiPeer::clearInstancePool();
            JenisSertifikasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a JenisSertifikasi or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or JenisSertifikasi object or primary key or array of primary keys
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
            $con = Propel::getConnection(JenisSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            JenisSertifikasiPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof JenisSertifikasi) { // it's a model object
            // invalidate the cache for this single object
            JenisSertifikasiPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JenisSertifikasiPeer::DATABASE_NAME);
            $criteria->add(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                JenisSertifikasiPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(JenisSertifikasiPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            JenisSertifikasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given JenisSertifikasi object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      JenisSertifikasi $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(JenisSertifikasiPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(JenisSertifikasiPeer::TABLE_NAME);

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

        return BasePeer::doValidate(JenisSertifikasiPeer::DATABASE_NAME, JenisSertifikasiPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return JenisSertifikasi
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = JenisSertifikasiPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(JenisSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(JenisSertifikasiPeer::DATABASE_NAME);
        $criteria->add(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $pk);

        $v = JenisSertifikasiPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return JenisSertifikasi[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(JenisSertifikasiPeer::DATABASE_NAME);
            $criteria->add(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $pks, Criteria::IN);
            $objs = JenisSertifikasiPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseJenisSertifikasiPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseJenisSertifikasiPeer::buildTableMap();

