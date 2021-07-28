<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenjangPendidikanPeer;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\JurusanPeer;
use DataDikdas\Model\KelompokBidangPeer;
use DataDikdas\Model\map\JurusanTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.jurusan' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseJurusanPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.jurusan';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Jurusan';

    /** the related TableMap class for this table */
    const TM_CLASS = 'JurusanTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 14;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 14;

    /** the column name for the jurusan_id field */
    const JURUSAN_ID = 'ref.jurusan.jurusan_id';

    /** the column name for the nama_jurusan field */
    const NAMA_JURUSAN = 'ref.jurusan.nama_jurusan';

    /** the column name for the untuk_sma field */
    const UNTUK_SMA = 'ref.jurusan.untuk_sma';

    /** the column name for the untuk_smk field */
    const UNTUK_SMK = 'ref.jurusan.untuk_smk';

    /** the column name for the untuk_pt field */
    const UNTUK_PT = 'ref.jurusan.untuk_pt';

    /** the column name for the untuk_slb field */
    const UNTUK_SLB = 'ref.jurusan.untuk_slb';

    /** the column name for the untuk_smklb field */
    const UNTUK_SMKLB = 'ref.jurusan.untuk_smklb';

    /** the column name for the jenjang_pendidikan_id field */
    const JENJANG_PENDIDIKAN_ID = 'ref.jurusan.jenjang_pendidikan_id';

    /** the column name for the jurusan_induk field */
    const JURUSAN_INDUK = 'ref.jurusan.jurusan_induk';

    /** the column name for the level_bidang_id field */
    const LEVEL_BIDANG_ID = 'ref.jurusan.level_bidang_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.jurusan.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.jurusan.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.jurusan.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.jurusan.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Jurusan objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Jurusan[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. JurusanPeer::$fieldNames[JurusanPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('JurusanId', 'NamaJurusan', 'UntukSma', 'UntukSmk', 'UntukPt', 'UntukSlb', 'UntukSmklb', 'JenjangPendidikanId', 'JurusanInduk', 'LevelBidangId', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jurusanId', 'namaJurusan', 'untukSma', 'untukSmk', 'untukPt', 'untukSlb', 'untukSmklb', 'jenjangPendidikanId', 'jurusanInduk', 'levelBidangId', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (JurusanPeer::JURUSAN_ID, JurusanPeer::NAMA_JURUSAN, JurusanPeer::UNTUK_SMA, JurusanPeer::UNTUK_SMK, JurusanPeer::UNTUK_PT, JurusanPeer::UNTUK_SLB, JurusanPeer::UNTUK_SMKLB, JurusanPeer::JENJANG_PENDIDIKAN_ID, JurusanPeer::JURUSAN_INDUK, JurusanPeer::LEVEL_BIDANG_ID, JurusanPeer::CREATE_DATE, JurusanPeer::LAST_UPDATE, JurusanPeer::EXPIRED_DATE, JurusanPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JURUSAN_ID', 'NAMA_JURUSAN', 'UNTUK_SMA', 'UNTUK_SMK', 'UNTUK_PT', 'UNTUK_SLB', 'UNTUK_SMKLB', 'JENJANG_PENDIDIKAN_ID', 'JURUSAN_INDUK', 'LEVEL_BIDANG_ID', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('jurusan_id', 'nama_jurusan', 'untuk_sma', 'untuk_smk', 'untuk_pt', 'untuk_slb', 'untuk_smklb', 'jenjang_pendidikan_id', 'jurusan_induk', 'level_bidang_id', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. JurusanPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('JurusanId' => 0, 'NamaJurusan' => 1, 'UntukSma' => 2, 'UntukSmk' => 3, 'UntukPt' => 4, 'UntukSlb' => 5, 'UntukSmklb' => 6, 'JenjangPendidikanId' => 7, 'JurusanInduk' => 8, 'LevelBidangId' => 9, 'CreateDate' => 10, 'LastUpdate' => 11, 'ExpiredDate' => 12, 'LastSync' => 13, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jurusanId' => 0, 'namaJurusan' => 1, 'untukSma' => 2, 'untukSmk' => 3, 'untukPt' => 4, 'untukSlb' => 5, 'untukSmklb' => 6, 'jenjangPendidikanId' => 7, 'jurusanInduk' => 8, 'levelBidangId' => 9, 'createDate' => 10, 'lastUpdate' => 11, 'expiredDate' => 12, 'lastSync' => 13, ),
        BasePeer::TYPE_COLNAME => array (JurusanPeer::JURUSAN_ID => 0, JurusanPeer::NAMA_JURUSAN => 1, JurusanPeer::UNTUK_SMA => 2, JurusanPeer::UNTUK_SMK => 3, JurusanPeer::UNTUK_PT => 4, JurusanPeer::UNTUK_SLB => 5, JurusanPeer::UNTUK_SMKLB => 6, JurusanPeer::JENJANG_PENDIDIKAN_ID => 7, JurusanPeer::JURUSAN_INDUK => 8, JurusanPeer::LEVEL_BIDANG_ID => 9, JurusanPeer::CREATE_DATE => 10, JurusanPeer::LAST_UPDATE => 11, JurusanPeer::EXPIRED_DATE => 12, JurusanPeer::LAST_SYNC => 13, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JURUSAN_ID' => 0, 'NAMA_JURUSAN' => 1, 'UNTUK_SMA' => 2, 'UNTUK_SMK' => 3, 'UNTUK_PT' => 4, 'UNTUK_SLB' => 5, 'UNTUK_SMKLB' => 6, 'JENJANG_PENDIDIKAN_ID' => 7, 'JURUSAN_INDUK' => 8, 'LEVEL_BIDANG_ID' => 9, 'CREATE_DATE' => 10, 'LAST_UPDATE' => 11, 'EXPIRED_DATE' => 12, 'LAST_SYNC' => 13, ),
        BasePeer::TYPE_FIELDNAME => array ('jurusan_id' => 0, 'nama_jurusan' => 1, 'untuk_sma' => 2, 'untuk_smk' => 3, 'untuk_pt' => 4, 'untuk_slb' => 5, 'untuk_smklb' => 6, 'jenjang_pendidikan_id' => 7, 'jurusan_induk' => 8, 'level_bidang_id' => 9, 'create_date' => 10, 'last_update' => 11, 'expired_date' => 12, 'last_sync' => 13, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $toNames = JurusanPeer::getFieldNames($toType);
        $key = isset(JurusanPeer::$fieldKeys[$fromType][$name]) ? JurusanPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(JurusanPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, JurusanPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return JurusanPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. JurusanPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(JurusanPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(JurusanPeer::JURUSAN_ID);
            $criteria->addSelectColumn(JurusanPeer::NAMA_JURUSAN);
            $criteria->addSelectColumn(JurusanPeer::UNTUK_SMA);
            $criteria->addSelectColumn(JurusanPeer::UNTUK_SMK);
            $criteria->addSelectColumn(JurusanPeer::UNTUK_PT);
            $criteria->addSelectColumn(JurusanPeer::UNTUK_SLB);
            $criteria->addSelectColumn(JurusanPeer::UNTUK_SMKLB);
            $criteria->addSelectColumn(JurusanPeer::JENJANG_PENDIDIKAN_ID);
            $criteria->addSelectColumn(JurusanPeer::JURUSAN_INDUK);
            $criteria->addSelectColumn(JurusanPeer::LEVEL_BIDANG_ID);
            $criteria->addSelectColumn(JurusanPeer::CREATE_DATE);
            $criteria->addSelectColumn(JurusanPeer::LAST_UPDATE);
            $criteria->addSelectColumn(JurusanPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(JurusanPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.jurusan_id');
            $criteria->addSelectColumn($alias . '.nama_jurusan');
            $criteria->addSelectColumn($alias . '.untuk_sma');
            $criteria->addSelectColumn($alias . '.untuk_smk');
            $criteria->addSelectColumn($alias . '.untuk_pt');
            $criteria->addSelectColumn($alias . '.untuk_slb');
            $criteria->addSelectColumn($alias . '.untuk_smklb');
            $criteria->addSelectColumn($alias . '.jenjang_pendidikan_id');
            $criteria->addSelectColumn($alias . '.jurusan_induk');
            $criteria->addSelectColumn($alias . '.level_bidang_id');
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
        $criteria->setPrimaryTableName(JurusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(JurusanPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Jurusan
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = JurusanPeer::doSelect($critcopy, $con);
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
        return JurusanPeer::populateObjects(JurusanPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            JurusanPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(JurusanPeer::DATABASE_NAME);

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
     * @param      Jurusan $obj A Jurusan object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getJurusanId();
            } // if key === null
            JurusanPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Jurusan object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Jurusan) {
                $key = (string) $value->getJurusanId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Jurusan object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(JurusanPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Jurusan Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(JurusanPeer::$instances[$key])) {
                return JurusanPeer::$instances[$key];
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
        foreach (JurusanPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        JurusanPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.jurusan
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
        $cls = JurusanPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = JurusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = JurusanPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JurusanPeer::addInstanceToPool($obj, $key);
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
     * @return array (Jurusan object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = JurusanPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + JurusanPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JurusanPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            JurusanPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related KelompokBidang table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKelompokBidang(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JurusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurusanPeer::LEVEL_BIDANG_ID, KelompokBidangPeer::LEVEL_BIDANG_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenjangPendidikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenjangPendidikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JurusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurusanPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
     * Selects a collection of Jurusan objects pre-filled with their KelompokBidang objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jurusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKelompokBidang(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanPeer::DATABASE_NAME);
        }

        JurusanPeer::addSelectColumns($criteria);
        $startcol = JurusanPeer::NUM_HYDRATE_COLUMNS;
        KelompokBidangPeer::addSelectColumns($criteria);

        $criteria->addJoin(JurusanPeer::LEVEL_BIDANG_ID, KelompokBidangPeer::LEVEL_BIDANG_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JurusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KelompokBidangPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KelompokBidangPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KelompokBidangPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KelompokBidangPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jurusan) to $obj2 (KelompokBidang)
                $obj2->addJurusan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jurusan objects pre-filled with their JenjangPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jurusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenjangPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanPeer::DATABASE_NAME);
        }

        JurusanPeer::addSelectColumns($criteria);
        $startcol = JurusanPeer::NUM_HYDRATE_COLUMNS;
        JenjangPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(JurusanPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JurusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jurusan) to $obj2 (JenjangPendidikan)
                $obj2->addJurusan($obj1);

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
        $criteria->setPrimaryTableName(JurusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JurusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JurusanPeer::LEVEL_BIDANG_ID, KelompokBidangPeer::LEVEL_BIDANG_ID, $join_behavior);

        $criteria->addJoin(JurusanPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
     * Selects a collection of Jurusan objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jurusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanPeer::DATABASE_NAME);
        }

        JurusanPeer::addSelectColumns($criteria);
        $startcol2 = JurusanPeer::NUM_HYDRATE_COLUMNS;

        KelompokBidangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KelompokBidangPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurusanPeer::LEVEL_BIDANG_ID, KelompokBidangPeer::LEVEL_BIDANG_ID, $join_behavior);

        $criteria->addJoin(JurusanPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined KelompokBidang rows

            $key2 = KelompokBidangPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = KelompokBidangPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KelompokBidangPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KelompokBidangPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Jurusan) to the collection in $obj2 (KelompokBidang)
                $obj2->addJurusan($obj1);
            } // if joined row not null

            // Add objects for joined JenjangPendidikan rows

            $key3 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JenjangPendidikanPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JenjangPendidikanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenjangPendidikanPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Jurusan) to the collection in $obj3 (JenjangPendidikan)
                $obj3->addJurusan($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JurusanRelatedByJurusanInduk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJurusanRelatedByJurusanInduk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JurusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JurusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JurusanPeer::LEVEL_BIDANG_ID, KelompokBidangPeer::LEVEL_BIDANG_ID, $join_behavior);

        $criteria->addJoin(JurusanPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related KelompokBidang table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKelompokBidang(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JurusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JurusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JurusanPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenjangPendidikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenjangPendidikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JurusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JurusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JurusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JurusanPeer::LEVEL_BIDANG_ID, KelompokBidangPeer::LEVEL_BIDANG_ID, $join_behavior);

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
     * Selects a collection of Jurusan objects pre-filled with all related objects except JurusanRelatedByJurusanInduk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jurusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJurusanRelatedByJurusanInduk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanPeer::DATABASE_NAME);
        }

        JurusanPeer::addSelectColumns($criteria);
        $startcol2 = JurusanPeer::NUM_HYDRATE_COLUMNS;

        KelompokBidangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KelompokBidangPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurusanPeer::LEVEL_BIDANG_ID, KelompokBidangPeer::LEVEL_BIDANG_ID, $join_behavior);

        $criteria->addJoin(JurusanPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KelompokBidang rows

                $key2 = KelompokBidangPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KelompokBidangPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KelompokBidangPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KelompokBidangPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Jurusan) to the collection in $obj2 (KelompokBidang)
                $obj2->addJurusan($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key3 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenjangPendidikanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenjangPendidikanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jurusan) to the collection in $obj3 (JenjangPendidikan)
                $obj3->addJurusan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jurusan objects pre-filled with all related objects except KelompokBidang.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jurusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKelompokBidang(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanPeer::DATABASE_NAME);
        }

        JurusanPeer::addSelectColumns($criteria);
        $startcol2 = JurusanPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurusanPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenjangPendidikan rows

                $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Jurusan) to the collection in $obj2 (JenjangPendidikan)
                $obj2->addJurusan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jurusan objects pre-filled with all related objects except JenjangPendidikan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jurusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenjangPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JurusanPeer::DATABASE_NAME);
        }

        JurusanPeer::addSelectColumns($criteria);
        $startcol2 = JurusanPeer::NUM_HYDRATE_COLUMNS;

        KelompokBidangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KelompokBidangPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JurusanPeer::LEVEL_BIDANG_ID, KelompokBidangPeer::LEVEL_BIDANG_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JurusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JurusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JurusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JurusanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KelompokBidang rows

                $key2 = KelompokBidangPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KelompokBidangPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KelompokBidangPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KelompokBidangPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Jurusan) to the collection in $obj2 (KelompokBidang)
                $obj2->addJurusan($obj1);

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
        return Propel::getDatabaseMap(JurusanPeer::DATABASE_NAME)->getTable(JurusanPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseJurusanPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseJurusanPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new JurusanTableMap());
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
        return JurusanPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Jurusan or Criteria object.
     *
     * @param      mixed $values Criteria or Jurusan object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Jurusan object
        }


        // Set the correct dbName
        $criteria->setDbName(JurusanPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Jurusan or Criteria object.
     *
     * @param      mixed $values Criteria or Jurusan object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(JurusanPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(JurusanPeer::JURUSAN_ID);
            $value = $criteria->remove(JurusanPeer::JURUSAN_ID);
            if ($value) {
                $selectCriteria->add(JurusanPeer::JURUSAN_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JurusanPeer::TABLE_NAME);
            }

        } else { // $values is Jurusan object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(JurusanPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.jurusan table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(JurusanPeer::TABLE_NAME, $con, JurusanPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JurusanPeer::clearInstancePool();
            JurusanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Jurusan or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Jurusan object or primary key or array of primary keys
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
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            JurusanPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Jurusan) { // it's a model object
            // invalidate the cache for this single object
            JurusanPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JurusanPeer::DATABASE_NAME);
            $criteria->add(JurusanPeer::JURUSAN_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                JurusanPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(JurusanPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            JurusanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Jurusan object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Jurusan $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(JurusanPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(JurusanPeer::TABLE_NAME);

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

        return BasePeer::doValidate(JurusanPeer::DATABASE_NAME, JurusanPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Jurusan
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = JurusanPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(JurusanPeer::DATABASE_NAME);
        $criteria->add(JurusanPeer::JURUSAN_ID, $pk);

        $v = JurusanPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Jurusan[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(JurusanPeer::DATABASE_NAME);
            $criteria->add(JurusanPeer::JURUSAN_ID, $pks, Criteria::IN);
            $objs = JurusanPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseJurusanPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseJurusanPeer::buildTableMap();

