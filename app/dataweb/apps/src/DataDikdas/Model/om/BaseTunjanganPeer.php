<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisTunjanganPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\Tunjangan;
use DataDikdas\Model\TunjanganPeer;
use DataDikdas\Model\map\TunjanganTableMap;

/**
 * Base static class for performing query and update operations on the 'tunjangan' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseTunjanganPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'tunjangan';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Tunjangan';

    /** the related TableMap class for this table */
    const TM_CLASS = 'TunjanganTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 19;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 19;

    /** the column name for the tunjangan_id field */
    const TUNJANGAN_ID = 'tunjangan.tunjangan_id';

    /** the column name for the ptk_id field */
    const PTK_ID = 'tunjangan.ptk_id';

    /** the column name for the jenis_tunjangan_id field */
    const JENIS_TUNJANGAN_ID = 'tunjangan.jenis_tunjangan_id';

    /** the column name for the nama field */
    const NAMA = 'tunjangan.nama';

    /** the column name for the instansi field */
    const INSTANSI = 'tunjangan.instansi';

    /** the column name for the sk_tunjangan field */
    const SK_TUNJANGAN = 'tunjangan.sk_tunjangan';

    /** the column name for the tgl_sk_tunjangan field */
    const TGL_SK_TUNJANGAN = 'tunjangan.tgl_sk_tunjangan';

    /** the column name for the semester_id field */
    const SEMESTER_ID = 'tunjangan.semester_id';

    /** the column name for the sumber_dana field */
    const SUMBER_DANA = 'tunjangan.sumber_dana';

    /** the column name for the dari_tahun field */
    const DARI_TAHUN = 'tunjangan.dari_tahun';

    /** the column name for the sampai_tahun field */
    const SAMPAI_TAHUN = 'tunjangan.sampai_tahun';

    /** the column name for the nominal field */
    const NOMINAL = 'tunjangan.nominal';

    /** the column name for the status field */
    const STATUS = 'tunjangan.status';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'tunjangan.asal_data';

    /** the column name for the create_date field */
    const CREATE_DATE = 'tunjangan.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'tunjangan.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'tunjangan.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'tunjangan.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'tunjangan.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Tunjangan objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Tunjangan[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. TunjanganPeer::$fieldNames[TunjanganPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('TunjanganId', 'PtkId', 'JenisTunjanganId', 'Nama', 'Instansi', 'SkTunjangan', 'TglSkTunjangan', 'SemesterId', 'SumberDana', 'DariTahun', 'SampaiTahun', 'Nominal', 'Status', 'AsalData', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('tunjanganId', 'ptkId', 'jenisTunjanganId', 'nama', 'instansi', 'skTunjangan', 'tglSkTunjangan', 'semesterId', 'sumberDana', 'dariTahun', 'sampaiTahun', 'nominal', 'status', 'asalData', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (TunjanganPeer::TUNJANGAN_ID, TunjanganPeer::PTK_ID, TunjanganPeer::JENIS_TUNJANGAN_ID, TunjanganPeer::NAMA, TunjanganPeer::INSTANSI, TunjanganPeer::SK_TUNJANGAN, TunjanganPeer::TGL_SK_TUNJANGAN, TunjanganPeer::SEMESTER_ID, TunjanganPeer::SUMBER_DANA, TunjanganPeer::DARI_TAHUN, TunjanganPeer::SAMPAI_TAHUN, TunjanganPeer::NOMINAL, TunjanganPeer::STATUS, TunjanganPeer::ASAL_DATA, TunjanganPeer::CREATE_DATE, TunjanganPeer::LAST_UPDATE, TunjanganPeer::SOFT_DELETE, TunjanganPeer::LAST_SYNC, TunjanganPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('TUNJANGAN_ID', 'PTK_ID', 'JENIS_TUNJANGAN_ID', 'NAMA', 'INSTANSI', 'SK_TUNJANGAN', 'TGL_SK_TUNJANGAN', 'SEMESTER_ID', 'SUMBER_DANA', 'DARI_TAHUN', 'SAMPAI_TAHUN', 'NOMINAL', 'STATUS', 'ASAL_DATA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('tunjangan_id', 'ptk_id', 'jenis_tunjangan_id', 'nama', 'instansi', 'sk_tunjangan', 'tgl_sk_tunjangan', 'semester_id', 'sumber_dana', 'dari_tahun', 'sampai_tahun', 'nominal', 'status', 'asal_data', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. TunjanganPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('TunjanganId' => 0, 'PtkId' => 1, 'JenisTunjanganId' => 2, 'Nama' => 3, 'Instansi' => 4, 'SkTunjangan' => 5, 'TglSkTunjangan' => 6, 'SemesterId' => 7, 'SumberDana' => 8, 'DariTahun' => 9, 'SampaiTahun' => 10, 'Nominal' => 11, 'Status' => 12, 'AsalData' => 13, 'CreateDate' => 14, 'LastUpdate' => 15, 'SoftDelete' => 16, 'LastSync' => 17, 'UpdaterId' => 18, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('tunjanganId' => 0, 'ptkId' => 1, 'jenisTunjanganId' => 2, 'nama' => 3, 'instansi' => 4, 'skTunjangan' => 5, 'tglSkTunjangan' => 6, 'semesterId' => 7, 'sumberDana' => 8, 'dariTahun' => 9, 'sampaiTahun' => 10, 'nominal' => 11, 'status' => 12, 'asalData' => 13, 'createDate' => 14, 'lastUpdate' => 15, 'softDelete' => 16, 'lastSync' => 17, 'updaterId' => 18, ),
        BasePeer::TYPE_COLNAME => array (TunjanganPeer::TUNJANGAN_ID => 0, TunjanganPeer::PTK_ID => 1, TunjanganPeer::JENIS_TUNJANGAN_ID => 2, TunjanganPeer::NAMA => 3, TunjanganPeer::INSTANSI => 4, TunjanganPeer::SK_TUNJANGAN => 5, TunjanganPeer::TGL_SK_TUNJANGAN => 6, TunjanganPeer::SEMESTER_ID => 7, TunjanganPeer::SUMBER_DANA => 8, TunjanganPeer::DARI_TAHUN => 9, TunjanganPeer::SAMPAI_TAHUN => 10, TunjanganPeer::NOMINAL => 11, TunjanganPeer::STATUS => 12, TunjanganPeer::ASAL_DATA => 13, TunjanganPeer::CREATE_DATE => 14, TunjanganPeer::LAST_UPDATE => 15, TunjanganPeer::SOFT_DELETE => 16, TunjanganPeer::LAST_SYNC => 17, TunjanganPeer::UPDATER_ID => 18, ),
        BasePeer::TYPE_RAW_COLNAME => array ('TUNJANGAN_ID' => 0, 'PTK_ID' => 1, 'JENIS_TUNJANGAN_ID' => 2, 'NAMA' => 3, 'INSTANSI' => 4, 'SK_TUNJANGAN' => 5, 'TGL_SK_TUNJANGAN' => 6, 'SEMESTER_ID' => 7, 'SUMBER_DANA' => 8, 'DARI_TAHUN' => 9, 'SAMPAI_TAHUN' => 10, 'NOMINAL' => 11, 'STATUS' => 12, 'ASAL_DATA' => 13, 'CREATE_DATE' => 14, 'LAST_UPDATE' => 15, 'SOFT_DELETE' => 16, 'LAST_SYNC' => 17, 'UPDATER_ID' => 18, ),
        BasePeer::TYPE_FIELDNAME => array ('tunjangan_id' => 0, 'ptk_id' => 1, 'jenis_tunjangan_id' => 2, 'nama' => 3, 'instansi' => 4, 'sk_tunjangan' => 5, 'tgl_sk_tunjangan' => 6, 'semester_id' => 7, 'sumber_dana' => 8, 'dari_tahun' => 9, 'sampai_tahun' => 10, 'nominal' => 11, 'status' => 12, 'asal_data' => 13, 'create_date' => 14, 'last_update' => 15, 'soft_delete' => 16, 'last_sync' => 17, 'updater_id' => 18, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
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
        $toNames = TunjanganPeer::getFieldNames($toType);
        $key = isset(TunjanganPeer::$fieldKeys[$fromType][$name]) ? TunjanganPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(TunjanganPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, TunjanganPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return TunjanganPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. TunjanganPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(TunjanganPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(TunjanganPeer::TUNJANGAN_ID);
            $criteria->addSelectColumn(TunjanganPeer::PTK_ID);
            $criteria->addSelectColumn(TunjanganPeer::JENIS_TUNJANGAN_ID);
            $criteria->addSelectColumn(TunjanganPeer::NAMA);
            $criteria->addSelectColumn(TunjanganPeer::INSTANSI);
            $criteria->addSelectColumn(TunjanganPeer::SK_TUNJANGAN);
            $criteria->addSelectColumn(TunjanganPeer::TGL_SK_TUNJANGAN);
            $criteria->addSelectColumn(TunjanganPeer::SEMESTER_ID);
            $criteria->addSelectColumn(TunjanganPeer::SUMBER_DANA);
            $criteria->addSelectColumn(TunjanganPeer::DARI_TAHUN);
            $criteria->addSelectColumn(TunjanganPeer::SAMPAI_TAHUN);
            $criteria->addSelectColumn(TunjanganPeer::NOMINAL);
            $criteria->addSelectColumn(TunjanganPeer::STATUS);
            $criteria->addSelectColumn(TunjanganPeer::ASAL_DATA);
            $criteria->addSelectColumn(TunjanganPeer::CREATE_DATE);
            $criteria->addSelectColumn(TunjanganPeer::LAST_UPDATE);
            $criteria->addSelectColumn(TunjanganPeer::SOFT_DELETE);
            $criteria->addSelectColumn(TunjanganPeer::LAST_SYNC);
            $criteria->addSelectColumn(TunjanganPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.tunjangan_id');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.jenis_tunjangan_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.instansi');
            $criteria->addSelectColumn($alias . '.sk_tunjangan');
            $criteria->addSelectColumn($alias . '.tgl_sk_tunjangan');
            $criteria->addSelectColumn($alias . '.semester_id');
            $criteria->addSelectColumn($alias . '.sumber_dana');
            $criteria->addSelectColumn($alias . '.dari_tahun');
            $criteria->addSelectColumn($alias . '.sampai_tahun');
            $criteria->addSelectColumn($alias . '.nominal');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.asal_data');
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
        $criteria->setPrimaryTableName(TunjanganPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TunjanganPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(TunjanganPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Tunjangan
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = TunjanganPeer::doSelect($critcopy, $con);
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
        return TunjanganPeer::populateObjects(TunjanganPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            TunjanganPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(TunjanganPeer::DATABASE_NAME);

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
     * @param      Tunjangan $obj A Tunjangan object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getTunjanganId();
            } // if key === null
            TunjanganPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Tunjangan object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Tunjangan) {
                $key = (string) $value->getTunjanganId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Tunjangan object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(TunjanganPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Tunjangan Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(TunjanganPeer::$instances[$key])) {
                return TunjanganPeer::$instances[$key];
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
        foreach (TunjanganPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        TunjanganPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to tunjangan
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
        $cls = TunjanganPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = TunjanganPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = TunjanganPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TunjanganPeer::addInstanceToPool($obj, $key);
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
     * @return array (Tunjangan object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = TunjanganPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = TunjanganPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + TunjanganPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TunjanganPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            TunjanganPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Semester table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSemester(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TunjanganPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TunjanganPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TunjanganPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TunjanganPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Ptk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TunjanganPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TunjanganPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TunjanganPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TunjanganPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisTunjangan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisTunjangan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TunjanganPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TunjanganPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TunjanganPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TunjanganPeer::JENIS_TUNJANGAN_ID, JenisTunjanganPeer::JENIS_TUNJANGAN_ID, $join_behavior);

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
     * Selects a collection of Tunjangan objects pre-filled with their Semester objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tunjangan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TunjanganPeer::DATABASE_NAME);
        }

        TunjanganPeer::addSelectColumns($criteria);
        $startcol = TunjanganPeer::NUM_HYDRATE_COLUMNS;
        SemesterPeer::addSelectColumns($criteria);

        $criteria->addJoin(TunjanganPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TunjanganPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TunjanganPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TunjanganPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TunjanganPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SemesterPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Tunjangan) to $obj2 (Semester)
                $obj2->addTunjangan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Tunjangan objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tunjangan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TunjanganPeer::DATABASE_NAME);
        }

        TunjanganPeer::addSelectColumns($criteria);
        $startcol = TunjanganPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(TunjanganPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TunjanganPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TunjanganPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TunjanganPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TunjanganPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PtkPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Tunjangan) to $obj2 (Ptk)
                $obj2->addTunjangan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Tunjangan objects pre-filled with their JenisTunjangan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tunjangan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisTunjangan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TunjanganPeer::DATABASE_NAME);
        }

        TunjanganPeer::addSelectColumns($criteria);
        $startcol = TunjanganPeer::NUM_HYDRATE_COLUMNS;
        JenisTunjanganPeer::addSelectColumns($criteria);

        $criteria->addJoin(TunjanganPeer::JENIS_TUNJANGAN_ID, JenisTunjanganPeer::JENIS_TUNJANGAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TunjanganPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TunjanganPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TunjanganPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TunjanganPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisTunjanganPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisTunjanganPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisTunjanganPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisTunjanganPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Tunjangan) to $obj2 (JenisTunjangan)
                $obj2->addTunjangan($obj1);

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
        $criteria->setPrimaryTableName(TunjanganPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TunjanganPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TunjanganPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TunjanganPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(TunjanganPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(TunjanganPeer::JENIS_TUNJANGAN_ID, JenisTunjanganPeer::JENIS_TUNJANGAN_ID, $join_behavior);

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
     * Selects a collection of Tunjangan objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tunjangan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TunjanganPeer::DATABASE_NAME);
        }

        TunjanganPeer::addSelectColumns($criteria);
        $startcol2 = TunjanganPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenisTunjanganPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisTunjanganPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TunjanganPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(TunjanganPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(TunjanganPeer::JENIS_TUNJANGAN_ID, JenisTunjanganPeer::JENIS_TUNJANGAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TunjanganPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TunjanganPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TunjanganPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TunjanganPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Semester rows

            $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = SemesterPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Tunjangan) to the collection in $obj2 (Semester)
                $obj2->addTunjangan($obj1);
            } // if joined row not null

            // Add objects for joined Ptk rows

            $key3 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PtkPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PtkPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Tunjangan) to the collection in $obj3 (Ptk)
                $obj3->addTunjangan($obj1);
            } // if joined row not null

            // Add objects for joined JenisTunjangan rows

            $key4 = JenisTunjanganPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = JenisTunjanganPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = JenisTunjanganPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisTunjanganPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Tunjangan) to the collection in $obj4 (JenisTunjangan)
                $obj4->addTunjangan($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Semester table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSemester(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TunjanganPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TunjanganPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TunjanganPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TunjanganPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(TunjanganPeer::JENIS_TUNJANGAN_ID, JenisTunjanganPeer::JENIS_TUNJANGAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Ptk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TunjanganPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TunjanganPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TunjanganPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TunjanganPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(TunjanganPeer::JENIS_TUNJANGAN_ID, JenisTunjanganPeer::JENIS_TUNJANGAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisTunjangan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisTunjangan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TunjanganPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TunjanganPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TunjanganPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TunjanganPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(TunjanganPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Selects a collection of Tunjangan objects pre-filled with all related objects except Semester.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tunjangan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TunjanganPeer::DATABASE_NAME);
        }

        TunjanganPeer::addSelectColumns($criteria);
        $startcol2 = TunjanganPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenisTunjanganPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisTunjanganPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TunjanganPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(TunjanganPeer::JENIS_TUNJANGAN_ID, JenisTunjanganPeer::JENIS_TUNJANGAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TunjanganPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TunjanganPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TunjanganPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TunjanganPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ptk rows

                $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PtkPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Tunjangan) to the collection in $obj2 (Ptk)
                $obj2->addTunjangan($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTunjangan rows

                $key3 = JenisTunjanganPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisTunjanganPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisTunjanganPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisTunjanganPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Tunjangan) to the collection in $obj3 (JenisTunjangan)
                $obj3->addTunjangan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Tunjangan objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tunjangan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TunjanganPeer::DATABASE_NAME);
        }

        TunjanganPeer::addSelectColumns($criteria);
        $startcol2 = TunjanganPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        JenisTunjanganPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisTunjanganPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TunjanganPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(TunjanganPeer::JENIS_TUNJANGAN_ID, JenisTunjanganPeer::JENIS_TUNJANGAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TunjanganPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TunjanganPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TunjanganPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TunjanganPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Semester rows

                $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SemesterPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Tunjangan) to the collection in $obj2 (Semester)
                $obj2->addTunjangan($obj1);

            } // if joined row is not null

                // Add objects for joined JenisTunjangan rows

                $key3 = JenisTunjanganPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisTunjanganPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisTunjanganPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisTunjanganPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Tunjangan) to the collection in $obj3 (JenisTunjangan)
                $obj3->addTunjangan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Tunjangan objects pre-filled with all related objects except JenisTunjangan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Tunjangan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisTunjangan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TunjanganPeer::DATABASE_NAME);
        }

        TunjanganPeer::addSelectColumns($criteria);
        $startcol2 = TunjanganPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TunjanganPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(TunjanganPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TunjanganPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TunjanganPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TunjanganPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TunjanganPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Semester rows

                $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SemesterPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Tunjangan) to the collection in $obj2 (Semester)
                $obj2->addTunjangan($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key3 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PtkPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PtkPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Tunjangan) to the collection in $obj3 (Ptk)
                $obj3->addTunjangan($obj1);

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
        return Propel::getDatabaseMap(TunjanganPeer::DATABASE_NAME)->getTable(TunjanganPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseTunjanganPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseTunjanganPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new TunjanganTableMap());
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
        return TunjanganPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Tunjangan or Criteria object.
     *
     * @param      mixed $values Criteria or Tunjangan object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Tunjangan object
        }


        // Set the correct dbName
        $criteria->setDbName(TunjanganPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Tunjangan or Criteria object.
     *
     * @param      mixed $values Criteria or Tunjangan object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(TunjanganPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(TunjanganPeer::TUNJANGAN_ID);
            $value = $criteria->remove(TunjanganPeer::TUNJANGAN_ID);
            if ($value) {
                $selectCriteria->add(TunjanganPeer::TUNJANGAN_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TunjanganPeer::TABLE_NAME);
            }

        } else { // $values is Tunjangan object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(TunjanganPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the tunjangan table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(TunjanganPeer::TABLE_NAME, $con, TunjanganPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TunjanganPeer::clearInstancePool();
            TunjanganPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Tunjangan or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Tunjangan object or primary key or array of primary keys
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
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            TunjanganPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Tunjangan) { // it's a model object
            // invalidate the cache for this single object
            TunjanganPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TunjanganPeer::DATABASE_NAME);
            $criteria->add(TunjanganPeer::TUNJANGAN_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                TunjanganPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(TunjanganPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            TunjanganPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Tunjangan object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Tunjangan $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(TunjanganPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(TunjanganPeer::TABLE_NAME);

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

        return BasePeer::doValidate(TunjanganPeer::DATABASE_NAME, TunjanganPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Tunjangan
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = TunjanganPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(TunjanganPeer::DATABASE_NAME);
        $criteria->add(TunjanganPeer::TUNJANGAN_ID, $pk);

        $v = TunjanganPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Tunjangan[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(TunjanganPeer::DATABASE_NAME);
            $criteria->add(TunjanganPeer::TUNJANGAN_ID, $pks, Criteria::IN);
            $objs = TunjanganPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseTunjanganPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTunjanganPeer::buildTableMap();

