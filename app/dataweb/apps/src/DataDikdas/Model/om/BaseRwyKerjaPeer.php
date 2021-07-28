<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisLembagaPeer;
use DataDikdas\Model\JenisPtkPeer;
use DataDikdas\Model\JenjangPendidikanPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\RwyKerja;
use DataDikdas\Model\RwyKerjaPeer;
use DataDikdas\Model\StatusKepegawaianPeer;
use DataDikdas\Model\map\RwyKerjaTableMap;

/**
 * Base static class for performing query and update operations on the 'rwy_kerja' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseRwyKerjaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'rwy_kerja';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\RwyKerja';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RwyKerjaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 19;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 19;

    /** the column name for the rwy_kerja_id field */
    const RWY_KERJA_ID = 'rwy_kerja.rwy_kerja_id';

    /** the column name for the jenjang_pendidikan_id field */
    const JENJANG_PENDIDIKAN_ID = 'rwy_kerja.jenjang_pendidikan_id';

    /** the column name for the jenis_lembaga_id field */
    const JENIS_LEMBAGA_ID = 'rwy_kerja.jenis_lembaga_id';

    /** the column name for the status_kepegawaian_id field */
    const STATUS_KEPEGAWAIAN_ID = 'rwy_kerja.status_kepegawaian_id';

    /** the column name for the ptk_id field */
    const PTK_ID = 'rwy_kerja.ptk_id';

    /** the column name for the jenis_ptk_id field */
    const JENIS_PTK_ID = 'rwy_kerja.jenis_ptk_id';

    /** the column name for the lembaga_pengangkat field */
    const LEMBAGA_PENGANGKAT = 'rwy_kerja.lembaga_pengangkat';

    /** the column name for the no_sk_kerja field */
    const NO_SK_KERJA = 'rwy_kerja.no_sk_kerja';

    /** the column name for the tgl_sk_kerja field */
    const TGL_SK_KERJA = 'rwy_kerja.tgl_sk_kerja';

    /** the column name for the tmt_kerja field */
    const TMT_KERJA = 'rwy_kerja.tmt_kerja';

    /** the column name for the tst_kerja field */
    const TST_KERJA = 'rwy_kerja.tst_kerja';

    /** the column name for the tempat_kerja field */
    const TEMPAT_KERJA = 'rwy_kerja.tempat_kerja';

    /** the column name for the ttd_sk_kerja field */
    const TTD_SK_KERJA = 'rwy_kerja.ttd_sk_kerja';

    /** the column name for the mapel_diajarkan field */
    const MAPEL_DIAJARKAN = 'rwy_kerja.mapel_diajarkan';

    /** the column name for the create_date field */
    const CREATE_DATE = 'rwy_kerja.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'rwy_kerja.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'rwy_kerja.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'rwy_kerja.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'rwy_kerja.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of RwyKerja objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array RwyKerja[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RwyKerjaPeer::$fieldNames[RwyKerjaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('RwyKerjaId', 'JenjangPendidikanId', 'JenisLembagaId', 'StatusKepegawaianId', 'PtkId', 'JenisPtkId', 'LembagaPengangkat', 'NoSkKerja', 'TglSkKerja', 'TmtKerja', 'TstKerja', 'TempatKerja', 'TtdSkKerja', 'MapelDiajarkan', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('rwyKerjaId', 'jenjangPendidikanId', 'jenisLembagaId', 'statusKepegawaianId', 'ptkId', 'jenisPtkId', 'lembagaPengangkat', 'noSkKerja', 'tglSkKerja', 'tmtKerja', 'tstKerja', 'tempatKerja', 'ttdSkKerja', 'mapelDiajarkan', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (RwyKerjaPeer::RWY_KERJA_ID, RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, RwyKerjaPeer::JENIS_LEMBAGA_ID, RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, RwyKerjaPeer::PTK_ID, RwyKerjaPeer::JENIS_PTK_ID, RwyKerjaPeer::LEMBAGA_PENGANGKAT, RwyKerjaPeer::NO_SK_KERJA, RwyKerjaPeer::TGL_SK_KERJA, RwyKerjaPeer::TMT_KERJA, RwyKerjaPeer::TST_KERJA, RwyKerjaPeer::TEMPAT_KERJA, RwyKerjaPeer::TTD_SK_KERJA, RwyKerjaPeer::MAPEL_DIAJARKAN, RwyKerjaPeer::CREATE_DATE, RwyKerjaPeer::LAST_UPDATE, RwyKerjaPeer::SOFT_DELETE, RwyKerjaPeer::LAST_SYNC, RwyKerjaPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('RWY_KERJA_ID', 'JENJANG_PENDIDIKAN_ID', 'JENIS_LEMBAGA_ID', 'STATUS_KEPEGAWAIAN_ID', 'PTK_ID', 'JENIS_PTK_ID', 'LEMBAGA_PENGANGKAT', 'NO_SK_KERJA', 'TGL_SK_KERJA', 'TMT_KERJA', 'TST_KERJA', 'TEMPAT_KERJA', 'TTD_SK_KERJA', 'MAPEL_DIAJARKAN', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('rwy_kerja_id', 'jenjang_pendidikan_id', 'jenis_lembaga_id', 'status_kepegawaian_id', 'ptk_id', 'jenis_ptk_id', 'lembaga_pengangkat', 'no_sk_kerja', 'tgl_sk_kerja', 'tmt_kerja', 'tst_kerja', 'tempat_kerja', 'ttd_sk_kerja', 'mapel_diajarkan', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RwyKerjaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('RwyKerjaId' => 0, 'JenjangPendidikanId' => 1, 'JenisLembagaId' => 2, 'StatusKepegawaianId' => 3, 'PtkId' => 4, 'JenisPtkId' => 5, 'LembagaPengangkat' => 6, 'NoSkKerja' => 7, 'TglSkKerja' => 8, 'TmtKerja' => 9, 'TstKerja' => 10, 'TempatKerja' => 11, 'TtdSkKerja' => 12, 'MapelDiajarkan' => 13, 'CreateDate' => 14, 'LastUpdate' => 15, 'SoftDelete' => 16, 'LastSync' => 17, 'UpdaterId' => 18, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('rwyKerjaId' => 0, 'jenjangPendidikanId' => 1, 'jenisLembagaId' => 2, 'statusKepegawaianId' => 3, 'ptkId' => 4, 'jenisPtkId' => 5, 'lembagaPengangkat' => 6, 'noSkKerja' => 7, 'tglSkKerja' => 8, 'tmtKerja' => 9, 'tstKerja' => 10, 'tempatKerja' => 11, 'ttdSkKerja' => 12, 'mapelDiajarkan' => 13, 'createDate' => 14, 'lastUpdate' => 15, 'softDelete' => 16, 'lastSync' => 17, 'updaterId' => 18, ),
        BasePeer::TYPE_COLNAME => array (RwyKerjaPeer::RWY_KERJA_ID => 0, RwyKerjaPeer::JENJANG_PENDIDIKAN_ID => 1, RwyKerjaPeer::JENIS_LEMBAGA_ID => 2, RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID => 3, RwyKerjaPeer::PTK_ID => 4, RwyKerjaPeer::JENIS_PTK_ID => 5, RwyKerjaPeer::LEMBAGA_PENGANGKAT => 6, RwyKerjaPeer::NO_SK_KERJA => 7, RwyKerjaPeer::TGL_SK_KERJA => 8, RwyKerjaPeer::TMT_KERJA => 9, RwyKerjaPeer::TST_KERJA => 10, RwyKerjaPeer::TEMPAT_KERJA => 11, RwyKerjaPeer::TTD_SK_KERJA => 12, RwyKerjaPeer::MAPEL_DIAJARKAN => 13, RwyKerjaPeer::CREATE_DATE => 14, RwyKerjaPeer::LAST_UPDATE => 15, RwyKerjaPeer::SOFT_DELETE => 16, RwyKerjaPeer::LAST_SYNC => 17, RwyKerjaPeer::UPDATER_ID => 18, ),
        BasePeer::TYPE_RAW_COLNAME => array ('RWY_KERJA_ID' => 0, 'JENJANG_PENDIDIKAN_ID' => 1, 'JENIS_LEMBAGA_ID' => 2, 'STATUS_KEPEGAWAIAN_ID' => 3, 'PTK_ID' => 4, 'JENIS_PTK_ID' => 5, 'LEMBAGA_PENGANGKAT' => 6, 'NO_SK_KERJA' => 7, 'TGL_SK_KERJA' => 8, 'TMT_KERJA' => 9, 'TST_KERJA' => 10, 'TEMPAT_KERJA' => 11, 'TTD_SK_KERJA' => 12, 'MAPEL_DIAJARKAN' => 13, 'CREATE_DATE' => 14, 'LAST_UPDATE' => 15, 'SOFT_DELETE' => 16, 'LAST_SYNC' => 17, 'UPDATER_ID' => 18, ),
        BasePeer::TYPE_FIELDNAME => array ('rwy_kerja_id' => 0, 'jenjang_pendidikan_id' => 1, 'jenis_lembaga_id' => 2, 'status_kepegawaian_id' => 3, 'ptk_id' => 4, 'jenis_ptk_id' => 5, 'lembaga_pengangkat' => 6, 'no_sk_kerja' => 7, 'tgl_sk_kerja' => 8, 'tmt_kerja' => 9, 'tst_kerja' => 10, 'tempat_kerja' => 11, 'ttd_sk_kerja' => 12, 'mapel_diajarkan' => 13, 'create_date' => 14, 'last_update' => 15, 'soft_delete' => 16, 'last_sync' => 17, 'updater_id' => 18, ),
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
        $toNames = RwyKerjaPeer::getFieldNames($toType);
        $key = isset(RwyKerjaPeer::$fieldKeys[$fromType][$name]) ? RwyKerjaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RwyKerjaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RwyKerjaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RwyKerjaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RwyKerjaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RwyKerjaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RwyKerjaPeer::RWY_KERJA_ID);
            $criteria->addSelectColumn(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID);
            $criteria->addSelectColumn(RwyKerjaPeer::JENIS_LEMBAGA_ID);
            $criteria->addSelectColumn(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID);
            $criteria->addSelectColumn(RwyKerjaPeer::PTK_ID);
            $criteria->addSelectColumn(RwyKerjaPeer::JENIS_PTK_ID);
            $criteria->addSelectColumn(RwyKerjaPeer::LEMBAGA_PENGANGKAT);
            $criteria->addSelectColumn(RwyKerjaPeer::NO_SK_KERJA);
            $criteria->addSelectColumn(RwyKerjaPeer::TGL_SK_KERJA);
            $criteria->addSelectColumn(RwyKerjaPeer::TMT_KERJA);
            $criteria->addSelectColumn(RwyKerjaPeer::TST_KERJA);
            $criteria->addSelectColumn(RwyKerjaPeer::TEMPAT_KERJA);
            $criteria->addSelectColumn(RwyKerjaPeer::TTD_SK_KERJA);
            $criteria->addSelectColumn(RwyKerjaPeer::MAPEL_DIAJARKAN);
            $criteria->addSelectColumn(RwyKerjaPeer::CREATE_DATE);
            $criteria->addSelectColumn(RwyKerjaPeer::LAST_UPDATE);
            $criteria->addSelectColumn(RwyKerjaPeer::SOFT_DELETE);
            $criteria->addSelectColumn(RwyKerjaPeer::LAST_SYNC);
            $criteria->addSelectColumn(RwyKerjaPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.rwy_kerja_id');
            $criteria->addSelectColumn($alias . '.jenjang_pendidikan_id');
            $criteria->addSelectColumn($alias . '.jenis_lembaga_id');
            $criteria->addSelectColumn($alias . '.status_kepegawaian_id');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.jenis_ptk_id');
            $criteria->addSelectColumn($alias . '.lembaga_pengangkat');
            $criteria->addSelectColumn($alias . '.no_sk_kerja');
            $criteria->addSelectColumn($alias . '.tgl_sk_kerja');
            $criteria->addSelectColumn($alias . '.tmt_kerja');
            $criteria->addSelectColumn($alias . '.tst_kerja');
            $criteria->addSelectColumn($alias . '.tempat_kerja');
            $criteria->addSelectColumn($alias . '.ttd_sk_kerja');
            $criteria->addSelectColumn($alias . '.mapel_diajarkan');
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
        $criteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RwyKerja
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RwyKerjaPeer::doSelect($critcopy, $con);
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
        return RwyKerjaPeer::populateObjects(RwyKerjaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

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
     * @param      RwyKerja $obj A RwyKerja object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getRwyKerjaId();
            } // if key === null
            RwyKerjaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A RwyKerja object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof RwyKerja) {
                $key = (string) $value->getRwyKerjaId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RwyKerja object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RwyKerjaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   RwyKerja Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RwyKerjaPeer::$instances[$key])) {
                return RwyKerjaPeer::$instances[$key];
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
        foreach (RwyKerjaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RwyKerjaPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to rwy_kerja
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
        $cls = RwyKerjaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RwyKerjaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RwyKerjaPeer::addInstanceToPool($obj, $key);
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
     * @return array (RwyKerja object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RwyKerjaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RwyKerjaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RwyKerjaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RwyKerjaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisLembaga table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisLembaga(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyKerjaPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisPtk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyKerjaPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyKerjaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related StatusKepegawaian table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinStatusKepegawaian(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
     * Selects a collection of RwyKerja objects pre-filled with their JenisLembaga objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKerja objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisLembaga(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);
        }

        RwyKerjaPeer::addSelectColumns($criteria);
        $startcol = RwyKerjaPeer::NUM_HYDRATE_COLUMNS;
        JenisLembagaPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwyKerjaPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKerjaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwyKerjaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKerjaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisLembagaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RwyKerja) to $obj2 (JenisLembaga)
                $obj2->addRwyKerja($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyKerja objects pre-filled with their JenisPtk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKerja objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);
        }

        RwyKerjaPeer::addSelectColumns($criteria);
        $startcol = RwyKerjaPeer::NUM_HYDRATE_COLUMNS;
        JenisPtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwyKerjaPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKerjaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwyKerjaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKerjaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisPtkPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisPtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisPtkPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RwyKerja) to $obj2 (JenisPtk)
                $obj2->addRwyKerja($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyKerja objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKerja objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);
        }

        RwyKerjaPeer::addSelectColumns($criteria);
        $startcol = RwyKerjaPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwyKerjaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKerjaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwyKerjaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKerjaPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwyKerja) to $obj2 (Ptk)
                $obj2->addRwyKerja($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyKerja objects pre-filled with their StatusKepegawaian objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKerja objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinStatusKepegawaian(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);
        }

        RwyKerjaPeer::addSelectColumns($criteria);
        $startcol = RwyKerjaPeer::NUM_HYDRATE_COLUMNS;
        StatusKepegawaianPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKerjaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwyKerjaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKerjaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = StatusKepegawaianPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = StatusKepegawaianPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    StatusKepegawaianPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RwyKerja) to $obj2 (StatusKepegawaian)
                $obj2->addRwyKerja($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyKerja objects pre-filled with their JenjangPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKerja objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenjangPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);
        }

        RwyKerjaPeer::addSelectColumns($criteria);
        $startcol = RwyKerjaPeer::NUM_HYDRATE_COLUMNS;
        JenjangPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKerjaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwyKerjaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKerjaPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwyKerja) to $obj2 (JenjangPendidikan)
                $obj2->addRwyKerja($obj1);

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
        $criteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyKerjaPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
     * Selects a collection of RwyKerja objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKerja objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);
        }

        RwyKerjaPeer::addSelectColumns($criteria);
        $startcol2 = RwyKerjaPeer::NUM_HYDRATE_COLUMNS;

        JenisLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisLembagaPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PtkPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyKerjaPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKerjaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyKerjaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKerjaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined JenisLembaga rows

            $key2 = JenisLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = JenisLembagaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj2 (JenisLembaga)
                $obj2->addRwyKerja($obj1);
            } // if joined row not null

            // Add objects for joined JenisPtk rows

            $key3 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JenisPtkPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JenisPtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisPtkPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj3 (JenisPtk)
                $obj3->addRwyKerja($obj1);
            } // if joined row not null

            // Add objects for joined Ptk rows

            $key4 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = PtkPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = PtkPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PtkPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj4 (Ptk)
                $obj4->addRwyKerja($obj1);
            } // if joined row not null

            // Add objects for joined StatusKepegawaian rows

            $key5 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = StatusKepegawaianPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = StatusKepegawaianPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    StatusKepegawaianPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj5 (StatusKepegawaian)
                $obj5->addRwyKerja($obj1);
            } // if joined row not null

            // Add objects for joined JenjangPendidikan rows

            $key6 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = JenjangPendidikanPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = JenjangPendidikanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JenjangPendidikanPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj6 (JenjangPendidikan)
                $obj6->addRwyKerja($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisLembaga table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisLembaga(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwyKerjaPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisPtk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwyKerjaPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwyKerjaPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related StatusKepegawaian table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptStatusKepegawaian(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwyKerjaPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyKerjaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwyKerjaPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

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
     * Selects a collection of RwyKerja objects pre-filled with all related objects except JenisLembaga.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKerja objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisLembaga(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);
        }

        RwyKerjaPeer::addSelectColumns($criteria);
        $startcol2 = RwyKerjaPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyKerjaPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKerjaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyKerjaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKerjaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisPtk rows

                $key2 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisPtkPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisPtkPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj2 (JenisPtk)
                $obj2->addRwyKerja($obj1);

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

                // Add the $obj1 (RwyKerja) to the collection in $obj3 (Ptk)
                $obj3->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key4 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = StatusKepegawaianPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    StatusKepegawaianPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj4 (StatusKepegawaian)
                $obj4->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key5 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenjangPendidikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenjangPendidikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj5 (JenjangPendidikan)
                $obj5->addRwyKerja($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyKerja objects pre-filled with all related objects except JenisPtk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKerja objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);
        }

        RwyKerjaPeer::addSelectColumns($criteria);
        $startcol2 = RwyKerjaPeer::NUM_HYDRATE_COLUMNS;

        JenisLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisLembagaPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyKerjaPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKerjaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyKerjaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKerjaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisLembaga rows

                $key2 = JenisLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj2 (JenisLembaga)
                $obj2->addRwyKerja($obj1);

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

                // Add the $obj1 (RwyKerja) to the collection in $obj3 (Ptk)
                $obj3->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key4 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = StatusKepegawaianPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    StatusKepegawaianPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj4 (StatusKepegawaian)
                $obj4->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key5 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenjangPendidikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenjangPendidikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj5 (JenjangPendidikan)
                $obj5->addRwyKerja($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyKerja objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKerja objects.
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
            $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);
        }

        RwyKerjaPeer::addSelectColumns($criteria);
        $startcol2 = RwyKerjaPeer::NUM_HYDRATE_COLUMNS;

        JenisLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisLembagaPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyKerjaPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKerjaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyKerjaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKerjaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisLembaga rows

                $key2 = JenisLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj2 (JenisLembaga)
                $obj2->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key3 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisPtkPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisPtkPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj3 (JenisPtk)
                $obj3->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key4 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = StatusKepegawaianPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    StatusKepegawaianPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj4 (StatusKepegawaian)
                $obj4->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key5 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenjangPendidikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenjangPendidikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj5 (JenjangPendidikan)
                $obj5->addRwyKerja($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyKerja objects pre-filled with all related objects except StatusKepegawaian.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKerja objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptStatusKepegawaian(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);
        }

        RwyKerjaPeer::addSelectColumns($criteria);
        $startcol2 = RwyKerjaPeer::NUM_HYDRATE_COLUMNS;

        JenisLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisLembagaPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyKerjaPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKerjaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyKerjaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKerjaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisLembaga rows

                $key2 = JenisLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj2 (JenisLembaga)
                $obj2->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key3 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisPtkPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisPtkPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj3 (JenisPtk)
                $obj3->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key4 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PtkPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PtkPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj4 (Ptk)
                $obj4->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key5 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenjangPendidikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenjangPendidikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj5 (JenjangPendidikan)
                $obj5->addRwyKerja($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyKerja objects pre-filled with all related objects except JenjangPendidikan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyKerja objects.
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
            $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);
        }

        RwyKerjaPeer::addSelectColumns($criteria);
        $startcol2 = RwyKerjaPeer::NUM_HYDRATE_COLUMNS;

        JenisLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisLembagaPeer::NUM_HYDRATE_COLUMNS;

        JenisPtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisPtkPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PtkPeer::NUM_HYDRATE_COLUMNS;

        StatusKepegawaianPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + StatusKepegawaianPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyKerjaPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyKerjaPeer::STATUS_KEPEGAWAIAN_ID, StatusKepegawaianPeer::STATUS_KEPEGAWAIAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyKerjaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyKerjaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyKerjaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyKerjaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisLembaga rows

                $key2 = JenisLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisLembagaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisLembagaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisLembagaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj2 (JenisLembaga)
                $obj2->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPtk rows

                $key3 = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisPtkPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisPtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisPtkPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj3 (JenisPtk)
                $obj3->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key4 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PtkPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PtkPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj4 (Ptk)
                $obj4->addRwyKerja($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepegawaian rows

                $key5 = StatusKepegawaianPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = StatusKepegawaianPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = StatusKepegawaianPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    StatusKepegawaianPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RwyKerja) to the collection in $obj5 (StatusKepegawaian)
                $obj5->addRwyKerja($obj1);

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
        return Propel::getDatabaseMap(RwyKerjaPeer::DATABASE_NAME)->getTable(RwyKerjaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRwyKerjaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRwyKerjaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RwyKerjaTableMap());
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
        return RwyKerjaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a RwyKerja or Criteria object.
     *
     * @param      mixed $values Criteria or RwyKerja object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from RwyKerja object
        }


        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a RwyKerja or Criteria object.
     *
     * @param      mixed $values Criteria or RwyKerja object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RwyKerjaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RwyKerjaPeer::RWY_KERJA_ID);
            $value = $criteria->remove(RwyKerjaPeer::RWY_KERJA_ID);
            if ($value) {
                $selectCriteria->add(RwyKerjaPeer::RWY_KERJA_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RwyKerjaPeer::TABLE_NAME);
            }

        } else { // $values is RwyKerja object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the rwy_kerja table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RwyKerjaPeer::TABLE_NAME, $con, RwyKerjaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RwyKerjaPeer::clearInstancePool();
            RwyKerjaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a RwyKerja or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or RwyKerja object or primary key or array of primary keys
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
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RwyKerjaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof RwyKerja) { // it's a model object
            // invalidate the cache for this single object
            RwyKerjaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RwyKerjaPeer::DATABASE_NAME);
            $criteria->add(RwyKerjaPeer::RWY_KERJA_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                RwyKerjaPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RwyKerjaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            RwyKerjaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given RwyKerja object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      RwyKerja $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RwyKerjaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RwyKerjaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(RwyKerjaPeer::DATABASE_NAME, RwyKerjaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return RwyKerja
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RwyKerjaPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RwyKerjaPeer::DATABASE_NAME);
        $criteria->add(RwyKerjaPeer::RWY_KERJA_ID, $pk);

        $v = RwyKerjaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return RwyKerja[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwyKerjaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RwyKerjaPeer::DATABASE_NAME);
            $criteria->add(RwyKerjaPeer::RWY_KERJA_ID, $pks, Criteria::IN);
            $objs = RwyKerjaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRwyKerjaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRwyKerjaPeer::buildTableMap();

