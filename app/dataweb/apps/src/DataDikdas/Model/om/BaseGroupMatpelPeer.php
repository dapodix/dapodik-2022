<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\GroupMatpel;
use DataDikdas\Model\GroupMatpelPeer;
use DataDikdas\Model\KurikulumPeer;
use DataDikdas\Model\TingkatPendidikanPeer;
use DataDikdas\Model\map\GroupMatpelTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.group_matpel' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseGroupMatpelPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.group_matpel';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\GroupMatpel';

    /** the related TableMap class for this table */
    const TM_CLASS = 'GroupMatpelTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 10;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 10;

    /** the column name for the gmp_id field */
    const GMP_ID = 'ref.group_matpel.gmp_id';

    /** the column name for the nama_group field */
    const NAMA_GROUP = 'ref.group_matpel.nama_group';

    /** the column name for the jumlah_jam_maksimum field */
    const JUMLAH_JAM_MAKSIMUM = 'ref.group_matpel.jumlah_jam_maksimum';

    /** the column name for the jumlah_sks_maksimum field */
    const JUMLAH_SKS_MAKSIMUM = 'ref.group_matpel.jumlah_sks_maksimum';

    /** the column name for the kurikulum_id field */
    const KURIKULUM_ID = 'ref.group_matpel.kurikulum_id';

    /** the column name for the tingkat_pendidikan_id field */
    const TINGKAT_PENDIDIKAN_ID = 'ref.group_matpel.tingkat_pendidikan_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.group_matpel.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.group_matpel.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.group_matpel.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.group_matpel.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of GroupMatpel objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array GroupMatpel[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. GroupMatpelPeer::$fieldNames[GroupMatpelPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('GmpId', 'NamaGroup', 'JumlahJamMaksimum', 'JumlahSksMaksimum', 'KurikulumId', 'TingkatPendidikanId', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('gmpId', 'namaGroup', 'jumlahJamMaksimum', 'jumlahSksMaksimum', 'kurikulumId', 'tingkatPendidikanId', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (GroupMatpelPeer::GMP_ID, GroupMatpelPeer::NAMA_GROUP, GroupMatpelPeer::JUMLAH_JAM_MAKSIMUM, GroupMatpelPeer::JUMLAH_SKS_MAKSIMUM, GroupMatpelPeer::KURIKULUM_ID, GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, GroupMatpelPeer::CREATE_DATE, GroupMatpelPeer::LAST_UPDATE, GroupMatpelPeer::EXPIRED_DATE, GroupMatpelPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('GMP_ID', 'NAMA_GROUP', 'JUMLAH_JAM_MAKSIMUM', 'JUMLAH_SKS_MAKSIMUM', 'KURIKULUM_ID', 'TINGKAT_PENDIDIKAN_ID', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('gmp_id', 'nama_group', 'jumlah_jam_maksimum', 'jumlah_sks_maksimum', 'kurikulum_id', 'tingkat_pendidikan_id', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. GroupMatpelPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('GmpId' => 0, 'NamaGroup' => 1, 'JumlahJamMaksimum' => 2, 'JumlahSksMaksimum' => 3, 'KurikulumId' => 4, 'TingkatPendidikanId' => 5, 'CreateDate' => 6, 'LastUpdate' => 7, 'ExpiredDate' => 8, 'LastSync' => 9, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('gmpId' => 0, 'namaGroup' => 1, 'jumlahJamMaksimum' => 2, 'jumlahSksMaksimum' => 3, 'kurikulumId' => 4, 'tingkatPendidikanId' => 5, 'createDate' => 6, 'lastUpdate' => 7, 'expiredDate' => 8, 'lastSync' => 9, ),
        BasePeer::TYPE_COLNAME => array (GroupMatpelPeer::GMP_ID => 0, GroupMatpelPeer::NAMA_GROUP => 1, GroupMatpelPeer::JUMLAH_JAM_MAKSIMUM => 2, GroupMatpelPeer::JUMLAH_SKS_MAKSIMUM => 3, GroupMatpelPeer::KURIKULUM_ID => 4, GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID => 5, GroupMatpelPeer::CREATE_DATE => 6, GroupMatpelPeer::LAST_UPDATE => 7, GroupMatpelPeer::EXPIRED_DATE => 8, GroupMatpelPeer::LAST_SYNC => 9, ),
        BasePeer::TYPE_RAW_COLNAME => array ('GMP_ID' => 0, 'NAMA_GROUP' => 1, 'JUMLAH_JAM_MAKSIMUM' => 2, 'JUMLAH_SKS_MAKSIMUM' => 3, 'KURIKULUM_ID' => 4, 'TINGKAT_PENDIDIKAN_ID' => 5, 'CREATE_DATE' => 6, 'LAST_UPDATE' => 7, 'EXPIRED_DATE' => 8, 'LAST_SYNC' => 9, ),
        BasePeer::TYPE_FIELDNAME => array ('gmp_id' => 0, 'nama_group' => 1, 'jumlah_jam_maksimum' => 2, 'jumlah_sks_maksimum' => 3, 'kurikulum_id' => 4, 'tingkat_pendidikan_id' => 5, 'create_date' => 6, 'last_update' => 7, 'expired_date' => 8, 'last_sync' => 9, ),
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
        $toNames = GroupMatpelPeer::getFieldNames($toType);
        $key = isset(GroupMatpelPeer::$fieldKeys[$fromType][$name]) ? GroupMatpelPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(GroupMatpelPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, GroupMatpelPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return GroupMatpelPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. GroupMatpelPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(GroupMatpelPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(GroupMatpelPeer::GMP_ID);
            $criteria->addSelectColumn(GroupMatpelPeer::NAMA_GROUP);
            $criteria->addSelectColumn(GroupMatpelPeer::JUMLAH_JAM_MAKSIMUM);
            $criteria->addSelectColumn(GroupMatpelPeer::JUMLAH_SKS_MAKSIMUM);
            $criteria->addSelectColumn(GroupMatpelPeer::KURIKULUM_ID);
            $criteria->addSelectColumn(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID);
            $criteria->addSelectColumn(GroupMatpelPeer::CREATE_DATE);
            $criteria->addSelectColumn(GroupMatpelPeer::LAST_UPDATE);
            $criteria->addSelectColumn(GroupMatpelPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(GroupMatpelPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.gmp_id');
            $criteria->addSelectColumn($alias . '.nama_group');
            $criteria->addSelectColumn($alias . '.jumlah_jam_maksimum');
            $criteria->addSelectColumn($alias . '.jumlah_sks_maksimum');
            $criteria->addSelectColumn($alias . '.kurikulum_id');
            $criteria->addSelectColumn($alias . '.tingkat_pendidikan_id');
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
        $criteria->setPrimaryTableName(GroupMatpelPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            GroupMatpelPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 GroupMatpel
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = GroupMatpelPeer::doSelect($critcopy, $con);
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
        return GroupMatpelPeer::populateObjects(GroupMatpelPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            GroupMatpelPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);

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
     * @param      GroupMatpel $obj A GroupMatpel object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getGmpId();
            } // if key === null
            GroupMatpelPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A GroupMatpel object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof GroupMatpel) {
                $key = (string) $value->getGmpId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or GroupMatpel object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(GroupMatpelPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   GroupMatpel Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(GroupMatpelPeer::$instances[$key])) {
                return GroupMatpelPeer::$instances[$key];
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
        foreach (GroupMatpelPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        GroupMatpelPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.group_matpel
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
        $cls = GroupMatpelPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = GroupMatpelPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = GroupMatpelPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                GroupMatpelPeer::addInstanceToPool($obj, $key);
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
     * @return array (GroupMatpel object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = GroupMatpelPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = GroupMatpelPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + GroupMatpelPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = GroupMatpelPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            GroupMatpelPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Kurikulum table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKurikulum(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(GroupMatpelPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            GroupMatpelPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(GroupMatpelPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related TingkatPendidikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinTingkatPendidikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(GroupMatpelPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            GroupMatpelPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

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
     * Selects a collection of GroupMatpel objects pre-filled with their Kurikulum objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of GroupMatpel objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKurikulum(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);
        }

        GroupMatpelPeer::addSelectColumns($criteria);
        $startcol = GroupMatpelPeer::NUM_HYDRATE_COLUMNS;
        KurikulumPeer::addSelectColumns($criteria);

        $criteria->addJoin(GroupMatpelPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = GroupMatpelPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = GroupMatpelPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = GroupMatpelPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                GroupMatpelPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KurikulumPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KurikulumPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KurikulumPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KurikulumPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (GroupMatpel) to $obj2 (Kurikulum)
                $obj2->addGroupMatpel($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of GroupMatpel objects pre-filled with their TingkatPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of GroupMatpel objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTingkatPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);
        }

        GroupMatpelPeer::addSelectColumns($criteria);
        $startcol = GroupMatpelPeer::NUM_HYDRATE_COLUMNS;
        TingkatPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = GroupMatpelPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = GroupMatpelPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = GroupMatpelPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                GroupMatpelPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = TingkatPendidikanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = TingkatPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    TingkatPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (GroupMatpel) to $obj2 (TingkatPendidikan)
                $obj2->addGroupMatpel($obj1);

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
        $criteria->setPrimaryTableName(GroupMatpelPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            GroupMatpelPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(GroupMatpelPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

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
     * Selects a collection of GroupMatpel objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of GroupMatpel objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);
        }

        GroupMatpelPeer::addSelectColumns($criteria);
        $startcol2 = GroupMatpelPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(GroupMatpelPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = GroupMatpelPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = GroupMatpelPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = GroupMatpelPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                GroupMatpelPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Kurikulum rows

            $key2 = KurikulumPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = KurikulumPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KurikulumPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KurikulumPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (GroupMatpel) to the collection in $obj2 (Kurikulum)
                $obj2->addGroupMatpel($obj1);
            } // if joined row not null

            // Add objects for joined TingkatPendidikan rows

            $key3 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = TingkatPendidikanPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = TingkatPendidikanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TingkatPendidikanPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (GroupMatpel) to the collection in $obj3 (TingkatPendidikan)
                $obj3->addGroupMatpel($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Kurikulum table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKurikulum(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(GroupMatpelPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            GroupMatpelPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related TingkatPendidikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptTingkatPendidikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(GroupMatpelPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            GroupMatpelPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(GroupMatpelPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

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
     * Selects a collection of GroupMatpel objects pre-filled with all related objects except Kurikulum.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of GroupMatpel objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKurikulum(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);
        }

        GroupMatpelPeer::addSelectColumns($criteria);
        $startcol2 = GroupMatpelPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(GroupMatpelPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = GroupMatpelPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = GroupMatpelPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = GroupMatpelPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                GroupMatpelPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined TingkatPendidikan rows

                $key2 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = TingkatPendidikanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    TingkatPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (GroupMatpel) to the collection in $obj2 (TingkatPendidikan)
                $obj2->addGroupMatpel($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of GroupMatpel objects pre-filled with all related objects except TingkatPendidikan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of GroupMatpel objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptTingkatPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);
        }

        GroupMatpelPeer::addSelectColumns($criteria);
        $startcol2 = GroupMatpelPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(GroupMatpelPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = GroupMatpelPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = GroupMatpelPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = GroupMatpelPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                GroupMatpelPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Kurikulum rows

                $key2 = KurikulumPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KurikulumPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KurikulumPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KurikulumPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (GroupMatpel) to the collection in $obj2 (Kurikulum)
                $obj2->addGroupMatpel($obj1);

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
        return Propel::getDatabaseMap(GroupMatpelPeer::DATABASE_NAME)->getTable(GroupMatpelPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseGroupMatpelPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseGroupMatpelPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new GroupMatpelTableMap());
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
        return GroupMatpelPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a GroupMatpel or Criteria object.
     *
     * @param      mixed $values Criteria or GroupMatpel object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from GroupMatpel object
        }


        // Set the correct dbName
        $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a GroupMatpel or Criteria object.
     *
     * @param      mixed $values Criteria or GroupMatpel object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(GroupMatpelPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(GroupMatpelPeer::GMP_ID);
            $value = $criteria->remove(GroupMatpelPeer::GMP_ID);
            if ($value) {
                $selectCriteria->add(GroupMatpelPeer::GMP_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(GroupMatpelPeer::TABLE_NAME);
            }

        } else { // $values is GroupMatpel object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.group_matpel table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(GroupMatpelPeer::TABLE_NAME, $con, GroupMatpelPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            GroupMatpelPeer::clearInstancePool();
            GroupMatpelPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a GroupMatpel or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or GroupMatpel object or primary key or array of primary keys
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
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            GroupMatpelPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof GroupMatpel) { // it's a model object
            // invalidate the cache for this single object
            GroupMatpelPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(GroupMatpelPeer::DATABASE_NAME);
            $criteria->add(GroupMatpelPeer::GMP_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                GroupMatpelPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(GroupMatpelPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            GroupMatpelPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given GroupMatpel object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      GroupMatpel $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(GroupMatpelPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(GroupMatpelPeer::TABLE_NAME);

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

        return BasePeer::doValidate(GroupMatpelPeer::DATABASE_NAME, GroupMatpelPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return GroupMatpel
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = GroupMatpelPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(GroupMatpelPeer::DATABASE_NAME);
        $criteria->add(GroupMatpelPeer::GMP_ID, $pk);

        $v = GroupMatpelPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return GroupMatpel[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(GroupMatpelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(GroupMatpelPeer::DATABASE_NAME);
            $criteria->add(GroupMatpelPeer::GMP_ID, $pks, Criteria::IN);
            $objs = GroupMatpelPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseGroupMatpelPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseGroupMatpelPeer::buildTableMap();

