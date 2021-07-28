<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\PangkatGolonganPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\RwyKepangkatan;
use DataDikdas\Model\RwyKepangkatanPeer;
use DataDikdas\Model\map\RwyKepangkatanTableMap;

/**
 * Base static class for performing query and update operations on the 'rwy_kepangkatan' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseRwyKepangkatanPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'rwy_kepangkatan';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\RwyKepangkatan';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RwyKepangkatanTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 14;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 14;

    /** the column name for the riwayat_kepangkatan_id field */
    const RIWAYAT_KEPANGKATAN_ID = 'rwy_kepangkatan.riwayat_kepangkatan_id';

    /** the column name for the ptk_id field */
    const PTK_ID = 'rwy_kepangkatan.ptk_id';

    /** the column name for the pangkat_golongan_id field */
    const PANGKAT_GOLONGAN_ID = 'rwy_kepangkatan.pangkat_golongan_id';

    /** the column name for the nomor_sk field */
    const NOMOR_SK = 'rwy_kepangkatan.nomor_sk';

    /** the column name for the tanggal_sk field */
    const TANGGAL_SK = 'rwy_kepangkatan.tanggal_sk';

    /** the column name for the tmt_pangkat field */
    const TMT_PANGKAT = 'rwy_kepangkatan.tmt_pangkat';

    /** the column name for the masa_kerja_gol_tahun field */
    const MASA_KERJA_GOL_TAHUN = 'rwy_kepangkatan.masa_kerja_gol_tahun';

    /** the column name for the masa_kerja_gol_bulan field */
    const MASA_KERJA_GOL_BULAN = 'rwy_kepangkatan.masa_kerja_gol_bulan';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'rwy_kepangkatan.asal_data';

    /** the column name for the create_date field */
    const CREATE_DATE = 'rwy_kepangkatan.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'rwy_kepangkatan.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'rwy_kepangkatan.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'rwy_kepangkatan.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'rwy_kepangkatan.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of RwyKepangkatan objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array RwyKepangkatan[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RwyKepangkatanPeer::$fieldNames[RwyKepangkatanPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('RiwayatKepangkatanId', 'PtkId', 'PangkatGolonganId', 'NomorSk', 'TanggalSk', 'TmtPangkat', 'MasaKerjaGolTahun', 'MasaKerjaGolBulan', 'AsalData', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('riwayatKepangkatanId', 'ptkId', 'pangkatGolonganId', 'nomorSk', 'tanggalSk', 'tmtPangkat', 'masaKerjaGolTahun', 'masaKerjaGolBulan', 'asalData', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID, RwyKepangkatanPeer::PTK_ID, RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, RwyKepangkatanPeer::NOMOR_SK, RwyKepangkatanPeer::TANGGAL_SK, RwyKepangkatanPeer::TMT_PANGKAT, RwyKepangkatanPeer::MASA_KERJA_GOL_TAHUN, RwyKepangkatanPeer::MASA_KERJA_GOL_BULAN, RwyKepangkatanPeer::ASAL_DATA, RwyKepangkatanPeer::CREATE_DATE, RwyKepangkatanPeer::LAST_UPDATE, RwyKepangkatanPeer::SOFT_DELETE, RwyKepangkatanPeer::LAST_SYNC, RwyKepangkatanPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('RIWAYAT_KEPANGKATAN_ID', 'PTK_ID', 'PANGKAT_GOLONGAN_ID', 'NOMOR_SK', 'TANGGAL_SK', 'TMT_PANGKAT', 'MASA_KERJA_GOL_TAHUN', 'MASA_KERJA_GOL_BULAN', 'ASAL_DATA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('riwayat_kepangkatan_id', 'ptk_id', 'pangkat_golongan_id', 'nomor_sk', 'tanggal_sk', 'tmt_pangkat', 'masa_kerja_gol_tahun', 'masa_kerja_gol_bulan', 'asal_data', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RwyKepangkatanPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('RiwayatKepangkatanId' => 0, 'PtkId' => 1, 'PangkatGolonganId' => 2, 'NomorSk' => 3, 'TanggalSk' => 4, 'TmtPangkat' => 5, 'MasaKerjaGolTahun' => 6, 'MasaKerjaGolBulan' => 7, 'AsalData' => 8, 'CreateDate' => 9, 'LastUpdate' => 10, 'SoftDelete' => 11, 'LastSync' => 12, 'UpdaterId' => 13, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('riwayatKepangkatanId' => 0, 'ptkId' => 1, 'pangkatGolonganId' => 2, 'nomorSk' => 3, 'tanggalSk' => 4, 'tmtPangkat' => 5, 'masaKerjaGolTahun' => 6, 'masaKerjaGolBulan' => 7, 'asalData' => 8, 'createDate' => 9, 'lastUpdate' => 10, 'softDelete' => 11, 'lastSync' => 12, 'updaterId' => 13, ),
        BasePeer::TYPE_COLNAME => array (RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID => 0, RwyKepangkatanPeer::PTK_ID => 1, RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID => 2, RwyKepangkatanPeer::NOMOR_SK => 3, RwyKepangkatanPeer::TANGGAL_SK => 4, RwyKepangkatanPeer::TMT_PANGKAT => 5, RwyKepangkatanPeer::MASA_KERJA_GOL_TAHUN => 6, RwyKepangkatanPeer::MASA_KERJA_GOL_BULAN => 7, RwyKepangkatanPeer::ASAL_DATA => 8, RwyKepangkatanPeer::CREATE_DATE => 9, RwyKepangkatanPeer::LAST_UPDATE => 10, RwyKepangkatanPeer::SOFT_DELETE => 11, RwyKepangkatanPeer::LAST_SYNC => 12, RwyKepangkatanPeer::UPDATER_ID => 13, ),
        BasePeer::TYPE_RAW_COLNAME => array ('RIWAYAT_KEPANGKATAN_ID' => 0, 'PTK_ID' => 1, 'PANGKAT_GOLONGAN_ID' => 2, 'NOMOR_SK' => 3, 'TANGGAL_SK' => 4, 'TMT_PANGKAT' => 5, 'MASA_KERJA_GOL_TAHUN' => 6, 'MASA_KERJA_GOL_BULAN' => 7, 'ASAL_DATA' => 8, 'CREATE_DATE' => 9, 'LAST_UPDATE' => 10, 'SOFT_DELETE' => 11, 'LAST_SYNC' => 12, 'UPDATER_ID' => 13, ),
        BasePeer::TYPE_FIELDNAME => array ('riwayat_kepangkatan_id' => 0, 'ptk_id' => 1, 'pangkat_golongan_id' => 2, 'nomor_sk' => 3, 'tanggal_sk' => 4, 'tmt_pangkat' => 5, 'masa_kerja_gol_tahun' => 6, 'masa_kerja_gol_bulan' => 7, 'asal_data' => 8, 'create_date' => 9, 'last_update' => 10, 'soft_delete' => 11, 'last_sync' => 12, 'updater_id' => 13, ),
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
        $toNames = RwyKepangkatanPeer::getFieldNames($toType);
        $key = isset(RwyKepangkatanPeer::$fieldKeys[$fromType][$name]) ? RwyKepangkatanPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RwyKepangkatanPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RwyKepangkatanPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RwyKepangkatanPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RwyKepangkatanPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RwyKepangkatanPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID);
            $criteria->addSelectColumn(RwyKepangkatanPeer::PTK_ID);
            $criteria->addSelectColumn(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID);
            $criteria->addSelectColumn(RwyKepangkatanPeer::NOMOR_SK);
            $criteria->addSelectColumn(RwyKepangkatanPeer::TANGGAL_SK);
            $criteria->addSelectColumn(RwyKepangkatanPeer::TMT_PANGKAT);
            $criteria->addSelectColumn(RwyKepangkatanPeer::MASA_KERJA_GOL_TAHUN);
            $criteria->addSelectColumn(RwyKepangkatanPeer::MASA_KERJA_GOL_BULAN);
            $criteria->addSelectColumn(RwyKepangkatanPeer::ASAL_DATA);
            $criteria->addSelectColumn(RwyKepangkatanPeer::CREATE_DATE);
            $criteria->addSelectColumn(RwyKepangkatanPeer::LAST_UPDATE);
            $criteria->addSelectColumn(RwyKepangkatanPeer::SOFT_DELETE);
            $criteria->addSelectColumn(RwyKepangkatanPeer::LAST_SYNC);
            $criteria->addSelectColumn(RwyKepangkatanPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.riwayat_kepangkatan_id');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.pangkat_golongan_id');
            $criteria->addSelectColumn($alias . '.nomor_sk');
            $criteria->addSelectColumn($alias . '.tanggal_sk');
            $criteria->addSelectColumn($alias . '.tmt_pangkat');
            $criteria->addSelectColumn($alias . '.masa_kerja_gol_tahun');
            $criteria->addSelectColumn($alias . '.masa_kerja_gol_bulan');
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
        $criteria->setPrimaryTableName(RwyKepangkatanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKepangkatanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RwyKepangkatan
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RwyKepangkatanPeer::doSelect($critcopy, $con);
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
        return RwyKepangkatanPeer::populateObjects(RwyKepangkatanPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RwyKepangkatanPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);

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
     * @param      RwyKepangkatan $obj A RwyKepangkatan object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getRiwayatKepangkatanId();
            } // if key === null
            RwyKepangkatanPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A RwyKepangkatan object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof RwyKepangkatan) {
                $key = (string) $value->getRiwayatKepangkatanId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RwyKepangkatan object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RwyKepangkatanPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   RwyKepangkatan Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RwyKepangkatanPeer::$instances[$key])) {
                return RwyKepangkatanPeer::$instances[$key];
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
        foreach (RwyKepangkatanPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RwyKepangkatanPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to rwy_kepangkatan
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
        $cls = RwyKepangkatanPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RwyKepangkatanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RwyKepangkatanPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RwyKepangkatanPeer::addInstanceToPool($obj, $key);
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
     * @return array (RwyKepangkatan object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RwyKepangkatanPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RwyKepangkatanPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RwyKepangkatanPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RwyKepangkatanPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RwyKepangkatanPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related PangkatGolongan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPangkatGolongan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwyKepangkatanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKepangkatanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RwyKepangkatanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKepangkatanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyKepangkatanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Selects a collection of RwyKepangkatan objects pre-filled with their PangkatGolongan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKepangkatan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPangkatGolongan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);
        }

        RwyKepangkatanPeer::addSelectColumns($criteria);
        $startcol = RwyKepangkatanPeer::NUM_HYDRATE_COLUMNS;
        PangkatGolonganPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKepangkatanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKepangkatanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwyKepangkatanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKepangkatanPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PangkatGolonganPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PangkatGolonganPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PangkatGolonganPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RwyKepangkatan) to $obj2 (PangkatGolongan)
                $obj2->addRwyKepangkatan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyKepangkatan objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKepangkatan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);
        }

        RwyKepangkatanPeer::addSelectColumns($criteria);
        $startcol = RwyKepangkatanPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwyKepangkatanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKepangkatanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKepangkatanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwyKepangkatanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKepangkatanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwyKepangkatan) to $obj2 (Ptk)
                $obj2->addRwyKepangkatan($obj1);

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
        $criteria->setPrimaryTableName(RwyKepangkatanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKepangkatanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(RwyKepangkatanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Selects a collection of RwyKepangkatan objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKepangkatan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);
        }

        RwyKepangkatanPeer::addSelectColumns($criteria);
        $startcol2 = RwyKepangkatanPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

        $criteria->addJoin(RwyKepangkatanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKepangkatanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKepangkatanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyKepangkatanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKepangkatanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined PangkatGolongan rows

            $key2 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = PangkatGolonganPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PangkatGolonganPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PangkatGolonganPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (RwyKepangkatan) to the collection in $obj2 (PangkatGolongan)
                $obj2->addRwyKepangkatan($obj1);
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

                // Add the $obj1 (RwyKepangkatan) to the collection in $obj3 (Ptk)
                $obj3->addRwyKepangkatan($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related PangkatGolongan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPangkatGolongan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwyKepangkatanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKepangkatanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwyKepangkatanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RwyKepangkatanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKepangkatanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);

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
     * Selects a collection of RwyKepangkatan objects pre-filled with all related objects except PangkatGolongan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKepangkatan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPangkatGolongan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);
        }

        RwyKepangkatanPeer::addSelectColumns($criteria);
        $startcol2 = RwyKepangkatanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyKepangkatanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKepangkatanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKepangkatanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyKepangkatanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKepangkatanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwyKepangkatan) to the collection in $obj2 (Ptk)
                $obj2->addRwyKepangkatan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyKepangkatan objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKepangkatan objects.
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
            $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);
        }

        RwyKepangkatanPeer::addSelectColumns($criteria);
        $startcol2 = RwyKepangkatanPeer::NUM_HYDRATE_COLUMNS;

        PangkatGolonganPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PangkatGolonganPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKepangkatanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKepangkatanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyKepangkatanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKepangkatanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined PangkatGolongan rows

                $key2 = PangkatGolonganPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PangkatGolonganPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PangkatGolonganPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PangkatGolonganPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RwyKepangkatan) to the collection in $obj2 (PangkatGolongan)
                $obj2->addRwyKepangkatan($obj1);

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
        return Propel::getDatabaseMap(RwyKepangkatanPeer::DATABASE_NAME)->getTable(RwyKepangkatanPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRwyKepangkatanPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRwyKepangkatanPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RwyKepangkatanTableMap());
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
        return RwyKepangkatanPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a RwyKepangkatan or Criteria object.
     *
     * @param      mixed $values Criteria or RwyKepangkatan object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from RwyKepangkatan object
        }


        // Set the correct dbName
        $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a RwyKepangkatan or Criteria object.
     *
     * @param      mixed $values Criteria or RwyKepangkatan object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RwyKepangkatanPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID);
            $value = $criteria->remove(RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID);
            if ($value) {
                $selectCriteria->add(RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RwyKepangkatanPeer::TABLE_NAME);
            }

        } else { // $values is RwyKepangkatan object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the rwy_kepangkatan table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RwyKepangkatanPeer::TABLE_NAME, $con, RwyKepangkatanPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RwyKepangkatanPeer::clearInstancePool();
            RwyKepangkatanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a RwyKepangkatan or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or RwyKepangkatan object or primary key or array of primary keys
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
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RwyKepangkatanPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof RwyKepangkatan) { // it's a model object
            // invalidate the cache for this single object
            RwyKepangkatanPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RwyKepangkatanPeer::DATABASE_NAME);
            $criteria->add(RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                RwyKepangkatanPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RwyKepangkatanPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            RwyKepangkatanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given RwyKepangkatan object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      RwyKepangkatan $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RwyKepangkatanPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RwyKepangkatanPeer::TABLE_NAME);

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

        return BasePeer::doValidate(RwyKepangkatanPeer::DATABASE_NAME, RwyKepangkatanPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return RwyKepangkatan
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RwyKepangkatanPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RwyKepangkatanPeer::DATABASE_NAME);
        $criteria->add(RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID, $pk);

        $v = RwyKepangkatanPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return RwyKepangkatan[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RwyKepangkatanPeer::DATABASE_NAME);
            $criteria->add(RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID, $pks, Criteria::IN);
            $objs = RwyKepangkatanPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRwyKepangkatanPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRwyKepangkatanPeer::buildTableMap();

