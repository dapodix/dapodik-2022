<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\Kompetensi;
use DataDikdas\Model\KompetensiPeer;
use DataDikdas\Model\KurikulumPeer;
use DataDikdas\Model\MataPelajaranPeer;
use DataDikdas\Model\TingkatPendidikanPeer;
use DataDikdas\Model\map\KompetensiTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.kompetensi' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseKompetensiPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.kompetensi';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Kompetensi';

    /** the related TableMap class for this table */
    const TM_CLASS = 'KompetensiTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 14;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 14;

    /** the column name for the id_komp field */
    const ID_KOMP = 'ref.kompetensi.id_komp';

    /** the column name for the desk field */
    const DESK = 'ref.kompetensi.desk';

    /** the column name for the nmr field */
    const NMR = 'ref.kompetensi.nmr';

    /** the column name for the kelompok field */
    const KELOMPOK = 'ref.kompetensi.kelompok';

    /** the column name for the versi field */
    const VERSI = 'ref.kompetensi.versi';

    /** the column name for the id_inti_dasar field */
    const ID_INTI_DASAR = 'ref.kompetensi.id_inti_dasar';

    /** the column name for the level_komp field */
    const LEVEL_KOMP = 'ref.kompetensi.level_komp';

    /** the column name for the tingkat_pendidikan_id field */
    const TINGKAT_PENDIDIKAN_ID = 'ref.kompetensi.tingkat_pendidikan_id';

    /** the column name for the kurikulum_id field */
    const KURIKULUM_ID = 'ref.kompetensi.kurikulum_id';

    /** the column name for the mata_pelajaran_id field */
    const MATA_PELAJARAN_ID = 'ref.kompetensi.mata_pelajaran_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.kompetensi.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.kompetensi.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.kompetensi.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.kompetensi.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Kompetensi objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Kompetensi[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. KompetensiPeer::$fieldNames[KompetensiPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdKomp', 'Desk', 'Nmr', 'Kelompok', 'Versi', 'IdIntiDasar', 'LevelKomp', 'TingkatPendidikanId', 'KurikulumId', 'MataPelajaranId', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idKomp', 'desk', 'nmr', 'kelompok', 'versi', 'idIntiDasar', 'levelKomp', 'tingkatPendidikanId', 'kurikulumId', 'mataPelajaranId', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (KompetensiPeer::ID_KOMP, KompetensiPeer::DESK, KompetensiPeer::NMR, KompetensiPeer::KELOMPOK, KompetensiPeer::VERSI, KompetensiPeer::ID_INTI_DASAR, KompetensiPeer::LEVEL_KOMP, KompetensiPeer::TINGKAT_PENDIDIKAN_ID, KompetensiPeer::KURIKULUM_ID, KompetensiPeer::MATA_PELAJARAN_ID, KompetensiPeer::CREATE_DATE, KompetensiPeer::LAST_UPDATE, KompetensiPeer::EXPIRED_DATE, KompetensiPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_KOMP', 'DESK', 'NMR', 'KELOMPOK', 'VERSI', 'ID_INTI_DASAR', 'LEVEL_KOMP', 'TINGKAT_PENDIDIKAN_ID', 'KURIKULUM_ID', 'MATA_PELAJARAN_ID', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('id_komp', 'desk', 'nmr', 'kelompok', 'versi', 'id_inti_dasar', 'level_komp', 'tingkat_pendidikan_id', 'kurikulum_id', 'mata_pelajaran_id', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. KompetensiPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdKomp' => 0, 'Desk' => 1, 'Nmr' => 2, 'Kelompok' => 3, 'Versi' => 4, 'IdIntiDasar' => 5, 'LevelKomp' => 6, 'TingkatPendidikanId' => 7, 'KurikulumId' => 8, 'MataPelajaranId' => 9, 'CreateDate' => 10, 'LastUpdate' => 11, 'ExpiredDate' => 12, 'LastSync' => 13, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idKomp' => 0, 'desk' => 1, 'nmr' => 2, 'kelompok' => 3, 'versi' => 4, 'idIntiDasar' => 5, 'levelKomp' => 6, 'tingkatPendidikanId' => 7, 'kurikulumId' => 8, 'mataPelajaranId' => 9, 'createDate' => 10, 'lastUpdate' => 11, 'expiredDate' => 12, 'lastSync' => 13, ),
        BasePeer::TYPE_COLNAME => array (KompetensiPeer::ID_KOMP => 0, KompetensiPeer::DESK => 1, KompetensiPeer::NMR => 2, KompetensiPeer::KELOMPOK => 3, KompetensiPeer::VERSI => 4, KompetensiPeer::ID_INTI_DASAR => 5, KompetensiPeer::LEVEL_KOMP => 6, KompetensiPeer::TINGKAT_PENDIDIKAN_ID => 7, KompetensiPeer::KURIKULUM_ID => 8, KompetensiPeer::MATA_PELAJARAN_ID => 9, KompetensiPeer::CREATE_DATE => 10, KompetensiPeer::LAST_UPDATE => 11, KompetensiPeer::EXPIRED_DATE => 12, KompetensiPeer::LAST_SYNC => 13, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_KOMP' => 0, 'DESK' => 1, 'NMR' => 2, 'KELOMPOK' => 3, 'VERSI' => 4, 'ID_INTI_DASAR' => 5, 'LEVEL_KOMP' => 6, 'TINGKAT_PENDIDIKAN_ID' => 7, 'KURIKULUM_ID' => 8, 'MATA_PELAJARAN_ID' => 9, 'CREATE_DATE' => 10, 'LAST_UPDATE' => 11, 'EXPIRED_DATE' => 12, 'LAST_SYNC' => 13, ),
        BasePeer::TYPE_FIELDNAME => array ('id_komp' => 0, 'desk' => 1, 'nmr' => 2, 'kelompok' => 3, 'versi' => 4, 'id_inti_dasar' => 5, 'level_komp' => 6, 'tingkat_pendidikan_id' => 7, 'kurikulum_id' => 8, 'mata_pelajaran_id' => 9, 'create_date' => 10, 'last_update' => 11, 'expired_date' => 12, 'last_sync' => 13, ),
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
        $toNames = KompetensiPeer::getFieldNames($toType);
        $key = isset(KompetensiPeer::$fieldKeys[$fromType][$name]) ? KompetensiPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(KompetensiPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, KompetensiPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return KompetensiPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. KompetensiPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(KompetensiPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(KompetensiPeer::ID_KOMP);
            $criteria->addSelectColumn(KompetensiPeer::DESK);
            $criteria->addSelectColumn(KompetensiPeer::NMR);
            $criteria->addSelectColumn(KompetensiPeer::KELOMPOK);
            $criteria->addSelectColumn(KompetensiPeer::VERSI);
            $criteria->addSelectColumn(KompetensiPeer::ID_INTI_DASAR);
            $criteria->addSelectColumn(KompetensiPeer::LEVEL_KOMP);
            $criteria->addSelectColumn(KompetensiPeer::TINGKAT_PENDIDIKAN_ID);
            $criteria->addSelectColumn(KompetensiPeer::KURIKULUM_ID);
            $criteria->addSelectColumn(KompetensiPeer::MATA_PELAJARAN_ID);
            $criteria->addSelectColumn(KompetensiPeer::CREATE_DATE);
            $criteria->addSelectColumn(KompetensiPeer::LAST_UPDATE);
            $criteria->addSelectColumn(KompetensiPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(KompetensiPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.id_komp');
            $criteria->addSelectColumn($alias . '.desk');
            $criteria->addSelectColumn($alias . '.nmr');
            $criteria->addSelectColumn($alias . '.kelompok');
            $criteria->addSelectColumn($alias . '.versi');
            $criteria->addSelectColumn($alias . '.id_inti_dasar');
            $criteria->addSelectColumn($alias . '.level_komp');
            $criteria->addSelectColumn($alias . '.tingkat_pendidikan_id');
            $criteria->addSelectColumn($alias . '.kurikulum_id');
            $criteria->addSelectColumn($alias . '.mata_pelajaran_id');
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
        $criteria->setPrimaryTableName(KompetensiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KompetensiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Kompetensi
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = KompetensiPeer::doSelect($critcopy, $con);
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
        return KompetensiPeer::populateObjects(KompetensiPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            KompetensiPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME);

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
     * @param      Kompetensi $obj A Kompetensi object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdKomp();
            } // if key === null
            KompetensiPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Kompetensi object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Kompetensi) {
                $key = (string) $value->getIdKomp();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Kompetensi object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(KompetensiPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Kompetensi Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(KompetensiPeer::$instances[$key])) {
                return KompetensiPeer::$instances[$key];
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
        foreach (KompetensiPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        KompetensiPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.kompetensi
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
        $cls = KompetensiPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = KompetensiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = KompetensiPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                KompetensiPeer::addInstanceToPool($obj, $key);
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
     * @return array (Kompetensi object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = KompetensiPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = KompetensiPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + KompetensiPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = KompetensiPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            KompetensiPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(KompetensiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KompetensiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KompetensiPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMataPelajaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(KompetensiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KompetensiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KompetensiPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(KompetensiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KompetensiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

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
     * Selects a collection of Kompetensi objects pre-filled with their Kurikulum objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kompetensi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKurikulum(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KompetensiPeer::DATABASE_NAME);
        }

        KompetensiPeer::addSelectColumns($criteria);
        $startcol = KompetensiPeer::NUM_HYDRATE_COLUMNS;
        KurikulumPeer::addSelectColumns($criteria);

        $criteria->addJoin(KompetensiPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KompetensiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KompetensiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = KompetensiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KompetensiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Kompetensi) to $obj2 (Kurikulum)
                $obj2->addKompetensi($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Kompetensi objects pre-filled with their MataPelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kompetensi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMataPelajaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KompetensiPeer::DATABASE_NAME);
        }

        KompetensiPeer::addSelectColumns($criteria);
        $startcol = KompetensiPeer::NUM_HYDRATE_COLUMNS;
        MataPelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(KompetensiPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KompetensiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KompetensiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = KompetensiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KompetensiPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MataPelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MataPelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Kompetensi) to $obj2 (MataPelajaran)
                $obj2->addKompetensi($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Kompetensi objects pre-filled with their TingkatPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kompetensi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTingkatPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KompetensiPeer::DATABASE_NAME);
        }

        KompetensiPeer::addSelectColumns($criteria);
        $startcol = KompetensiPeer::NUM_HYDRATE_COLUMNS;
        TingkatPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KompetensiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KompetensiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = KompetensiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KompetensiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Kompetensi) to $obj2 (TingkatPendidikan)
                $obj2->addKompetensi($obj1);

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
        $criteria->setPrimaryTableName(KompetensiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KompetensiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KompetensiPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

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
     * Selects a collection of Kompetensi objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kompetensi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KompetensiPeer::DATABASE_NAME);
        }

        KompetensiPeer::addSelectColumns($criteria);
        $startcol2 = KompetensiPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KompetensiPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KompetensiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KompetensiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KompetensiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KompetensiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Kompetensi) to the collection in $obj2 (Kurikulum)
                $obj2->addKompetensi($obj1);
            } // if joined row not null

            // Add objects for joined MataPelajaran rows

            $key3 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = MataPelajaranPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MataPelajaranPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Kompetensi) to the collection in $obj3 (MataPelajaran)
                $obj3->addKompetensi($obj1);
            } // if joined row not null

            // Add objects for joined TingkatPendidikan rows

            $key4 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = TingkatPendidikanPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = TingkatPendidikanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TingkatPendidikanPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Kompetensi) to the collection in $obj4 (TingkatPendidikan)
                $obj4->addKompetensi($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related KompetensiRelatedByIdIntiDasar table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKompetensiRelatedByIdIntiDasar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(KompetensiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KompetensiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(KompetensiPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(KompetensiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KompetensiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(KompetensiPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMataPelajaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(KompetensiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KompetensiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(KompetensiPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(KompetensiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KompetensiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(KompetensiPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Selects a collection of Kompetensi objects pre-filled with all related objects except KompetensiRelatedByIdIntiDasar.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kompetensi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKompetensiRelatedByIdIntiDasar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KompetensiPeer::DATABASE_NAME);
        }

        KompetensiPeer::addSelectColumns($criteria);
        $startcol2 = KompetensiPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KompetensiPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KompetensiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KompetensiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KompetensiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KompetensiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Kompetensi) to the collection in $obj2 (Kurikulum)
                $obj2->addKompetensi($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key3 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = MataPelajaranPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MataPelajaranPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Kompetensi) to the collection in $obj3 (MataPelajaran)
                $obj3->addKompetensi($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key4 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TingkatPendidikanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TingkatPendidikanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Kompetensi) to the collection in $obj4 (TingkatPendidikan)
                $obj4->addKompetensi($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Kompetensi objects pre-filled with all related objects except Kurikulum.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kompetensi objects.
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
            $criteria->setDbName(KompetensiPeer::DATABASE_NAME);
        }

        KompetensiPeer::addSelectColumns($criteria);
        $startcol2 = KompetensiPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KompetensiPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KompetensiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KompetensiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KompetensiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KompetensiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined MataPelajaran rows

                $key2 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = MataPelajaranPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MataPelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Kompetensi) to the collection in $obj2 (MataPelajaran)
                $obj2->addKompetensi($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key3 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = TingkatPendidikanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TingkatPendidikanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Kompetensi) to the collection in $obj3 (TingkatPendidikan)
                $obj3->addKompetensi($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Kompetensi objects pre-filled with all related objects except MataPelajaran.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kompetensi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMataPelajaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KompetensiPeer::DATABASE_NAME);
        }

        KompetensiPeer::addSelectColumns($criteria);
        $startcol2 = KompetensiPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KompetensiPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KompetensiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KompetensiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KompetensiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KompetensiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Kompetensi) to the collection in $obj2 (Kurikulum)
                $obj2->addKompetensi($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key3 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = TingkatPendidikanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TingkatPendidikanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Kompetensi) to the collection in $obj3 (TingkatPendidikan)
                $obj3->addKompetensi($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Kompetensi objects pre-filled with all related objects except TingkatPendidikan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kompetensi objects.
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
            $criteria->setDbName(KompetensiPeer::DATABASE_NAME);
        }

        KompetensiPeer::addSelectColumns($criteria);
        $startcol2 = KompetensiPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KompetensiPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(KompetensiPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KompetensiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KompetensiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KompetensiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KompetensiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Kompetensi) to the collection in $obj2 (Kurikulum)
                $obj2->addKompetensi($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key3 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = MataPelajaranPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MataPelajaranPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Kompetensi) to the collection in $obj3 (MataPelajaran)
                $obj3->addKompetensi($obj1);

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
        return Propel::getDatabaseMap(KompetensiPeer::DATABASE_NAME)->getTable(KompetensiPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseKompetensiPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseKompetensiPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new KompetensiTableMap());
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
        return KompetensiPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Kompetensi or Criteria object.
     *
     * @param      mixed $values Criteria or Kompetensi object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Kompetensi object
        }


        // Set the correct dbName
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Kompetensi or Criteria object.
     *
     * @param      mixed $values Criteria or Kompetensi object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(KompetensiPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(KompetensiPeer::ID_KOMP);
            $value = $criteria->remove(KompetensiPeer::ID_KOMP);
            if ($value) {
                $selectCriteria->add(KompetensiPeer::ID_KOMP, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(KompetensiPeer::TABLE_NAME);
            }

        } else { // $values is Kompetensi object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.kompetensi table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(KompetensiPeer::TABLE_NAME, $con, KompetensiPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KompetensiPeer::clearInstancePool();
            KompetensiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Kompetensi or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Kompetensi object or primary key or array of primary keys
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
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            KompetensiPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Kompetensi) { // it's a model object
            // invalidate the cache for this single object
            KompetensiPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(KompetensiPeer::DATABASE_NAME);
            $criteria->add(KompetensiPeer::ID_KOMP, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                KompetensiPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(KompetensiPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            KompetensiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Kompetensi object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Kompetensi $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(KompetensiPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(KompetensiPeer::TABLE_NAME);

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

        return BasePeer::doValidate(KompetensiPeer::DATABASE_NAME, KompetensiPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Kompetensi
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = KompetensiPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(KompetensiPeer::DATABASE_NAME);
        $criteria->add(KompetensiPeer::ID_KOMP, $pk);

        $v = KompetensiPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Kompetensi[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(KompetensiPeer::DATABASE_NAME);
            $criteria->add(KompetensiPeer::ID_KOMP, $pks, Criteria::IN);
            $objs = KompetensiPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseKompetensiPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseKompetensiPeer::buildTableMap();

