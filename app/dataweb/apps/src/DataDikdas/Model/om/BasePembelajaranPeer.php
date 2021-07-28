<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\MataPelajaranPeer;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\PembelajaranPeer;
use DataDikdas\Model\PtkTerdaftarPeer;
use DataDikdas\Model\RombonganBelajarPeer;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\map\PembelajaranTableMap;

/**
 * Base static class for performing query and update operations on the 'pembelajaran' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BasePembelajaranPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'pembelajaran';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Pembelajaran';

    /** the related TableMap class for this table */
    const TM_CLASS = 'PembelajaranTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 16;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 16;

    /** the column name for the pembelajaran_id field */
    const PEMBELAJARAN_ID = 'pembelajaran.pembelajaran_id';

    /** the column name for the rombongan_belajar_id field */
    const ROMBONGAN_BELAJAR_ID = 'pembelajaran.rombongan_belajar_id';

    /** the column name for the semester_id field */
    const SEMESTER_ID = 'pembelajaran.semester_id';

    /** the column name for the mata_pelajaran_id field */
    const MATA_PELAJARAN_ID = 'pembelajaran.mata_pelajaran_id';

    /** the column name for the ptk_terdaftar_id field */
    const PTK_TERDAFTAR_ID = 'pembelajaran.ptk_terdaftar_id';

    /** the column name for the sk_mengajar field */
    const SK_MENGAJAR = 'pembelajaran.sk_mengajar';

    /** the column name for the tanggal_sk_mengajar field */
    const TANGGAL_SK_MENGAJAR = 'pembelajaran.tanggal_sk_mengajar';

    /** the column name for the jam_mengajar_per_minggu field */
    const JAM_MENGAJAR_PER_MINGGU = 'pembelajaran.jam_mengajar_per_minggu';

    /** the column name for the status_di_kurikulum field */
    const STATUS_DI_KURIKULUM = 'pembelajaran.status_di_kurikulum';

    /** the column name for the nama_mata_pelajaran field */
    const NAMA_MATA_PELAJARAN = 'pembelajaran.nama_mata_pelajaran';

    /** the column name for the induk_pembelajaran_id field */
    const INDUK_PEMBELAJARAN_ID = 'pembelajaran.induk_pembelajaran_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'pembelajaran.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'pembelajaran.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'pembelajaran.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'pembelajaran.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'pembelajaran.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Pembelajaran objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Pembelajaran[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PembelajaranPeer::$fieldNames[PembelajaranPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('PembelajaranId', 'RombonganBelajarId', 'SemesterId', 'MataPelajaranId', 'PtkTerdaftarId', 'SkMengajar', 'TanggalSkMengajar', 'JamMengajarPerMinggu', 'StatusDiKurikulum', 'NamaMataPelajaran', 'IndukPembelajaranId', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('pembelajaranId', 'rombonganBelajarId', 'semesterId', 'mataPelajaranId', 'ptkTerdaftarId', 'skMengajar', 'tanggalSkMengajar', 'jamMengajarPerMinggu', 'statusDiKurikulum', 'namaMataPelajaran', 'indukPembelajaranId', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (PembelajaranPeer::PEMBELAJARAN_ID, PembelajaranPeer::ROMBONGAN_BELAJAR_ID, PembelajaranPeer::SEMESTER_ID, PembelajaranPeer::MATA_PELAJARAN_ID, PembelajaranPeer::PTK_TERDAFTAR_ID, PembelajaranPeer::SK_MENGAJAR, PembelajaranPeer::TANGGAL_SK_MENGAJAR, PembelajaranPeer::JAM_MENGAJAR_PER_MINGGU, PembelajaranPeer::STATUS_DI_KURIKULUM, PembelajaranPeer::NAMA_MATA_PELAJARAN, PembelajaranPeer::INDUK_PEMBELAJARAN_ID, PembelajaranPeer::CREATE_DATE, PembelajaranPeer::LAST_UPDATE, PembelajaranPeer::SOFT_DELETE, PembelajaranPeer::LAST_SYNC, PembelajaranPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PEMBELAJARAN_ID', 'ROMBONGAN_BELAJAR_ID', 'SEMESTER_ID', 'MATA_PELAJARAN_ID', 'PTK_TERDAFTAR_ID', 'SK_MENGAJAR', 'TANGGAL_SK_MENGAJAR', 'JAM_MENGAJAR_PER_MINGGU', 'STATUS_DI_KURIKULUM', 'NAMA_MATA_PELAJARAN', 'INDUK_PEMBELAJARAN_ID', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('pembelajaran_id', 'rombongan_belajar_id', 'semester_id', 'mata_pelajaran_id', 'ptk_terdaftar_id', 'sk_mengajar', 'tanggal_sk_mengajar', 'jam_mengajar_per_minggu', 'status_di_kurikulum', 'nama_mata_pelajaran', 'induk_pembelajaran_id', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PembelajaranPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('PembelajaranId' => 0, 'RombonganBelajarId' => 1, 'SemesterId' => 2, 'MataPelajaranId' => 3, 'PtkTerdaftarId' => 4, 'SkMengajar' => 5, 'TanggalSkMengajar' => 6, 'JamMengajarPerMinggu' => 7, 'StatusDiKurikulum' => 8, 'NamaMataPelajaran' => 9, 'IndukPembelajaranId' => 10, 'CreateDate' => 11, 'LastUpdate' => 12, 'SoftDelete' => 13, 'LastSync' => 14, 'UpdaterId' => 15, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('pembelajaranId' => 0, 'rombonganBelajarId' => 1, 'semesterId' => 2, 'mataPelajaranId' => 3, 'ptkTerdaftarId' => 4, 'skMengajar' => 5, 'tanggalSkMengajar' => 6, 'jamMengajarPerMinggu' => 7, 'statusDiKurikulum' => 8, 'namaMataPelajaran' => 9, 'indukPembelajaranId' => 10, 'createDate' => 11, 'lastUpdate' => 12, 'softDelete' => 13, 'lastSync' => 14, 'updaterId' => 15, ),
        BasePeer::TYPE_COLNAME => array (PembelajaranPeer::PEMBELAJARAN_ID => 0, PembelajaranPeer::ROMBONGAN_BELAJAR_ID => 1, PembelajaranPeer::SEMESTER_ID => 2, PembelajaranPeer::MATA_PELAJARAN_ID => 3, PembelajaranPeer::PTK_TERDAFTAR_ID => 4, PembelajaranPeer::SK_MENGAJAR => 5, PembelajaranPeer::TANGGAL_SK_MENGAJAR => 6, PembelajaranPeer::JAM_MENGAJAR_PER_MINGGU => 7, PembelajaranPeer::STATUS_DI_KURIKULUM => 8, PembelajaranPeer::NAMA_MATA_PELAJARAN => 9, PembelajaranPeer::INDUK_PEMBELAJARAN_ID => 10, PembelajaranPeer::CREATE_DATE => 11, PembelajaranPeer::LAST_UPDATE => 12, PembelajaranPeer::SOFT_DELETE => 13, PembelajaranPeer::LAST_SYNC => 14, PembelajaranPeer::UPDATER_ID => 15, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PEMBELAJARAN_ID' => 0, 'ROMBONGAN_BELAJAR_ID' => 1, 'SEMESTER_ID' => 2, 'MATA_PELAJARAN_ID' => 3, 'PTK_TERDAFTAR_ID' => 4, 'SK_MENGAJAR' => 5, 'TANGGAL_SK_MENGAJAR' => 6, 'JAM_MENGAJAR_PER_MINGGU' => 7, 'STATUS_DI_KURIKULUM' => 8, 'NAMA_MATA_PELAJARAN' => 9, 'INDUK_PEMBELAJARAN_ID' => 10, 'CREATE_DATE' => 11, 'LAST_UPDATE' => 12, 'SOFT_DELETE' => 13, 'LAST_SYNC' => 14, 'UPDATER_ID' => 15, ),
        BasePeer::TYPE_FIELDNAME => array ('pembelajaran_id' => 0, 'rombongan_belajar_id' => 1, 'semester_id' => 2, 'mata_pelajaran_id' => 3, 'ptk_terdaftar_id' => 4, 'sk_mengajar' => 5, 'tanggal_sk_mengajar' => 6, 'jam_mengajar_per_minggu' => 7, 'status_di_kurikulum' => 8, 'nama_mata_pelajaran' => 9, 'induk_pembelajaran_id' => 10, 'create_date' => 11, 'last_update' => 12, 'soft_delete' => 13, 'last_sync' => 14, 'updater_id' => 15, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
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
        $toNames = PembelajaranPeer::getFieldNames($toType);
        $key = isset(PembelajaranPeer::$fieldKeys[$fromType][$name]) ? PembelajaranPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(PembelajaranPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, PembelajaranPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PembelajaranPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. PembelajaranPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PembelajaranPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(PembelajaranPeer::PEMBELAJARAN_ID);
            $criteria->addSelectColumn(PembelajaranPeer::ROMBONGAN_BELAJAR_ID);
            $criteria->addSelectColumn(PembelajaranPeer::SEMESTER_ID);
            $criteria->addSelectColumn(PembelajaranPeer::MATA_PELAJARAN_ID);
            $criteria->addSelectColumn(PembelajaranPeer::PTK_TERDAFTAR_ID);
            $criteria->addSelectColumn(PembelajaranPeer::SK_MENGAJAR);
            $criteria->addSelectColumn(PembelajaranPeer::TANGGAL_SK_MENGAJAR);
            $criteria->addSelectColumn(PembelajaranPeer::JAM_MENGAJAR_PER_MINGGU);
            $criteria->addSelectColumn(PembelajaranPeer::STATUS_DI_KURIKULUM);
            $criteria->addSelectColumn(PembelajaranPeer::NAMA_MATA_PELAJARAN);
            $criteria->addSelectColumn(PembelajaranPeer::INDUK_PEMBELAJARAN_ID);
            $criteria->addSelectColumn(PembelajaranPeer::CREATE_DATE);
            $criteria->addSelectColumn(PembelajaranPeer::LAST_UPDATE);
            $criteria->addSelectColumn(PembelajaranPeer::SOFT_DELETE);
            $criteria->addSelectColumn(PembelajaranPeer::LAST_SYNC);
            $criteria->addSelectColumn(PembelajaranPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.pembelajaran_id');
            $criteria->addSelectColumn($alias . '.rombongan_belajar_id');
            $criteria->addSelectColumn($alias . '.semester_id');
            $criteria->addSelectColumn($alias . '.mata_pelajaran_id');
            $criteria->addSelectColumn($alias . '.ptk_terdaftar_id');
            $criteria->addSelectColumn($alias . '.sk_mengajar');
            $criteria->addSelectColumn($alias . '.tanggal_sk_mengajar');
            $criteria->addSelectColumn($alias . '.jam_mengajar_per_minggu');
            $criteria->addSelectColumn($alias . '.status_di_kurikulum');
            $criteria->addSelectColumn($alias . '.nama_mata_pelajaran');
            $criteria->addSelectColumn($alias . '.induk_pembelajaran_id');
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
        $criteria->setPrimaryTableName(PembelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PembelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Pembelajaran
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PembelajaranPeer::doSelect($critcopy, $con);
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
        return PembelajaranPeer::populateObjects(PembelajaranPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PembelajaranPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

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
     * @param      Pembelajaran $obj A Pembelajaran object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getPembelajaranId();
            } // if key === null
            PembelajaranPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Pembelajaran object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Pembelajaran) {
                $key = (string) $value->getPembelajaranId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Pembelajaran object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(PembelajaranPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Pembelajaran Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PembelajaranPeer::$instances[$key])) {
                return PembelajaranPeer::$instances[$key];
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
        foreach (PembelajaranPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        PembelajaranPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to pembelajaran
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
        $cls = PembelajaranPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PembelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PembelajaranPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PembelajaranPeer::addInstanceToPool($obj, $key);
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
     * @return array (Pembelajaran object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PembelajaranPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PembelajaranPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PembelajaranPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PembelajaranPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(PembelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PembelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PembelajaranPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PembelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PembelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PembelajaranPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RombonganBelajar table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRombonganBelajar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PembelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PembelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PembelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PembelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PembelajaranPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Selects a collection of Pembelajaran objects pre-filled with their PtkTerdaftar objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pembelajaran objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtkTerdaftar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);
        }

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol = PembelajaranPeer::NUM_HYDRATE_COLUMNS;
        PtkTerdaftarPeer::addSelectColumns($criteria);

        $criteria->addJoin(PembelajaranPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PembelajaranPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PembelajaranPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PembelajaranPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Pembelajaran) to $obj2 (PtkTerdaftar)
                $obj2->addPembelajaran($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Pembelajaran objects pre-filled with their Semester objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pembelajaran objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);
        }

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol = PembelajaranPeer::NUM_HYDRATE_COLUMNS;
        SemesterPeer::addSelectColumns($criteria);

        $criteria->addJoin(PembelajaranPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PembelajaranPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PembelajaranPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PembelajaranPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Pembelajaran) to $obj2 (Semester)
                $obj2->addPembelajaran($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Pembelajaran objects pre-filled with their RombonganBelajar objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pembelajaran objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRombonganBelajar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);
        }

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol = PembelajaranPeer::NUM_HYDRATE_COLUMNS;
        RombonganBelajarPeer::addSelectColumns($criteria);

        $criteria->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PembelajaranPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PembelajaranPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PembelajaranPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RombonganBelajarPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RombonganBelajarPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RombonganBelajarPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Pembelajaran) to $obj2 (RombonganBelajar)
                $obj2->addPembelajaran($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Pembelajaran objects pre-filled with their MataPelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pembelajaran objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMataPelajaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);
        }

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol = PembelajaranPeer::NUM_HYDRATE_COLUMNS;
        MataPelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(PembelajaranPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PembelajaranPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PembelajaranPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PembelajaranPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Pembelajaran) to $obj2 (MataPelajaran)
                $obj2->addPembelajaran($obj1);

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
        $criteria->setPrimaryTableName(PembelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PembelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PembelajaranPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Selects a collection of Pembelajaran objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pembelajaran objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);
        }

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol2 = PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PembelajaranPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PembelajaranPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PembelajaranPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PembelajaranPeer::addInstanceToPool($obj1, $key1);
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
                } // if obj2 loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj2 (PtkTerdaftar)
                $obj2->addPembelajaran($obj1);
            } // if joined row not null

            // Add objects for joined Semester rows

            $key3 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = SemesterPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = SemesterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SemesterPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj3 (Semester)
                $obj3->addPembelajaran($obj1);
            } // if joined row not null

            // Add objects for joined RombonganBelajar rows

            $key4 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = RombonganBelajarPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = RombonganBelajarPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RombonganBelajarPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj4 (RombonganBelajar)
                $obj4->addPembelajaran($obj1);
            } // if joined row not null

            // Add objects for joined MataPelajaran rows

            $key5 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = MataPelajaranPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MataPelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj5 (MataPelajaran)
                $obj5->addPembelajaran($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByIndukPembelajaranId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByIndukPembelajaranId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PembelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PembelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PembelajaranPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PembelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PembelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PembelajaranPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PembelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PembelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PembelajaranPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RombonganBelajar table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRombonganBelajar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PembelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PembelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PembelajaranPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PembelajaranPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PembelajaranPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PembelajaranPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

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
     * Selects a collection of Pembelajaran objects pre-filled with all related objects except PembelajaranRelatedByIndukPembelajaranId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pembelajaran objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByIndukPembelajaranId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);
        }

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol2 = PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PembelajaranPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PembelajaranPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PembelajaranPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PembelajaranPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Pembelajaran) to the collection in $obj2 (PtkTerdaftar)
                $obj2->addPembelajaran($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key3 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SemesterPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SemesterPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj3 (Semester)
                $obj3->addPembelajaran($obj1);

            } // if joined row is not null

                // Add objects for joined RombonganBelajar rows

                $key4 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RombonganBelajarPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = RombonganBelajarPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RombonganBelajarPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj4 (RombonganBelajar)
                $obj4->addPembelajaran($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key5 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MataPelajaranPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MataPelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj5 (MataPelajaran)
                $obj5->addPembelajaran($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Pembelajaran objects pre-filled with all related objects except PtkTerdaftar.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pembelajaran objects.
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
            $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);
        }

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol2 = PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PembelajaranPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PembelajaranPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PembelajaranPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PembelajaranPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Pembelajaran) to the collection in $obj2 (Semester)
                $obj2->addPembelajaran($obj1);

            } // if joined row is not null

                // Add objects for joined RombonganBelajar rows

                $key3 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RombonganBelajarPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = RombonganBelajarPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RombonganBelajarPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj3 (RombonganBelajar)
                $obj3->addPembelajaran($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key4 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = MataPelajaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    MataPelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj4 (MataPelajaran)
                $obj4->addPembelajaran($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Pembelajaran objects pre-filled with all related objects except Semester.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pembelajaran objects.
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
            $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);
        }

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol2 = PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PembelajaranPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PembelajaranPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PembelajaranPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PembelajaranPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Pembelajaran) to the collection in $obj2 (PtkTerdaftar)
                $obj2->addPembelajaran($obj1);

            } // if joined row is not null

                // Add objects for joined RombonganBelajar rows

                $key3 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RombonganBelajarPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = RombonganBelajarPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RombonganBelajarPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj3 (RombonganBelajar)
                $obj3->addPembelajaran($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key4 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = MataPelajaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    MataPelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj4 (MataPelajaran)
                $obj4->addPembelajaran($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Pembelajaran objects pre-filled with all related objects except RombonganBelajar.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pembelajaran objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRombonganBelajar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);
        }

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol2 = PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PembelajaranPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PembelajaranPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PembelajaranPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PembelajaranPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Pembelajaran) to the collection in $obj2 (PtkTerdaftar)
                $obj2->addPembelajaran($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key3 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SemesterPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SemesterPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj3 (Semester)
                $obj3->addPembelajaran($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key4 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = MataPelajaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    MataPelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj4 (MataPelajaran)
                $obj4->addPembelajaran($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Pembelajaran objects pre-filled with all related objects except MataPelajaran.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Pembelajaran objects.
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
            $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);
        }

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol2 = PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PtkTerdaftarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkTerdaftarPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PembelajaranPeer::PTK_TERDAFTAR_ID, PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PembelajaranPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PembelajaranPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PembelajaranPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Pembelajaran) to the collection in $obj2 (PtkTerdaftar)
                $obj2->addPembelajaran($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key3 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SemesterPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SemesterPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj3 (Semester)
                $obj3->addPembelajaran($obj1);

            } // if joined row is not null

                // Add objects for joined RombonganBelajar rows

                $key4 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = RombonganBelajarPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = RombonganBelajarPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    RombonganBelajarPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Pembelajaran) to the collection in $obj4 (RombonganBelajar)
                $obj4->addPembelajaran($obj1);

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
        return Propel::getDatabaseMap(PembelajaranPeer::DATABASE_NAME)->getTable(PembelajaranPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasePembelajaranPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasePembelajaranPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new PembelajaranTableMap());
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
        return PembelajaranPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Pembelajaran or Criteria object.
     *
     * @param      mixed $values Criteria or Pembelajaran object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Pembelajaran object
        }


        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Pembelajaran or Criteria object.
     *
     * @param      mixed $values Criteria or Pembelajaran object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PembelajaranPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PembelajaranPeer::PEMBELAJARAN_ID);
            $value = $criteria->remove(PembelajaranPeer::PEMBELAJARAN_ID);
            if ($value) {
                $selectCriteria->add(PembelajaranPeer::PEMBELAJARAN_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PembelajaranPeer::TABLE_NAME);
            }

        } else { // $values is Pembelajaran object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the pembelajaran table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PembelajaranPeer::TABLE_NAME, $con, PembelajaranPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PembelajaranPeer::clearInstancePool();
            PembelajaranPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Pembelajaran or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Pembelajaran object or primary key or array of primary keys
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
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PembelajaranPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Pembelajaran) { // it's a model object
            // invalidate the cache for this single object
            PembelajaranPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PembelajaranPeer::DATABASE_NAME);
            $criteria->add(PembelajaranPeer::PEMBELAJARAN_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                PembelajaranPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PembelajaranPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            PembelajaranPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Pembelajaran object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Pembelajaran $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PembelajaranPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PembelajaranPeer::TABLE_NAME);

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

        return BasePeer::doValidate(PembelajaranPeer::DATABASE_NAME, PembelajaranPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Pembelajaran
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PembelajaranPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PembelajaranPeer::DATABASE_NAME);
        $criteria->add(PembelajaranPeer::PEMBELAJARAN_ID, $pk);

        $v = PembelajaranPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Pembelajaran[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PembelajaranPeer::DATABASE_NAME);
            $criteria->add(PembelajaranPeer::PEMBELAJARAN_ID, $pks, Criteria::IN);
            $objs = PembelajaranPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePembelajaranPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePembelajaranPeer::buildTableMap();

