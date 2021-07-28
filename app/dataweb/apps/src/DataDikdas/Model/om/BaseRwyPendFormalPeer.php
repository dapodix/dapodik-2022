<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BidangStudiPeer;
use DataDikdas\Model\GelarAkademikPeer;
use DataDikdas\Model\JenjangPendidikanPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\RwyPendFormal;
use DataDikdas\Model\RwyPendFormalPeer;
use DataDikdas\Model\map\RwyPendFormalTableMap;

/**
 * Base static class for performing query and update operations on the 'rwy_pend_formal' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseRwyPendFormalPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'rwy_pend_formal';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\RwyPendFormal';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RwyPendFormalTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 21;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 21;

    /** the column name for the riwayat_pendidikan_formal_id field */
    const RIWAYAT_PENDIDIKAN_FORMAL_ID = 'rwy_pend_formal.riwayat_pendidikan_formal_id';

    /** the column name for the bidang_studi_id field */
    const BIDANG_STUDI_ID = 'rwy_pend_formal.bidang_studi_id';

    /** the column name for the jenjang_pendidikan_id field */
    const JENJANG_PENDIDIKAN_ID = 'rwy_pend_formal.jenjang_pendidikan_id';

    /** the column name for the gelar_akademik_id field */
    const GELAR_AKADEMIK_ID = 'rwy_pend_formal.gelar_akademik_id';

    /** the column name for the ptk_id field */
    const PTK_ID = 'rwy_pend_formal.ptk_id';

    /** the column name for the satuan_pendidikan_formal field */
    const SATUAN_PENDIDIKAN_FORMAL = 'rwy_pend_formal.satuan_pendidikan_formal';

    /** the column name for the fakultas field */
    const FAKULTAS = 'rwy_pend_formal.fakultas';

    /** the column name for the kependidikan field */
    const KEPENDIDIKAN = 'rwy_pend_formal.kependidikan';

    /** the column name for the tahun_masuk field */
    const TAHUN_MASUK = 'rwy_pend_formal.tahun_masuk';

    /** the column name for the tahun_lulus field */
    const TAHUN_LULUS = 'rwy_pend_formal.tahun_lulus';

    /** the column name for the nim field */
    const NIM = 'rwy_pend_formal.nim';

    /** the column name for the status_kuliah field */
    const STATUS_KULIAH = 'rwy_pend_formal.status_kuliah';

    /** the column name for the semester field */
    const SEMESTER = 'rwy_pend_formal.semester';

    /** the column name for the ipk field */
    const IPK = 'rwy_pend_formal.ipk';

    /** the column name for the prodi field */
    const PRODI = 'rwy_pend_formal.prodi';

    /** the column name for the id_reg_pd field */
    const ID_REG_PD = 'rwy_pend_formal.id_reg_pd';

    /** the column name for the create_date field */
    const CREATE_DATE = 'rwy_pend_formal.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'rwy_pend_formal.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'rwy_pend_formal.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'rwy_pend_formal.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'rwy_pend_formal.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of RwyPendFormal objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array RwyPendFormal[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RwyPendFormalPeer::$fieldNames[RwyPendFormalPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('RiwayatPendidikanFormalId', 'BidangStudiId', 'JenjangPendidikanId', 'GelarAkademikId', 'PtkId', 'SatuanPendidikanFormal', 'Fakultas', 'Kependidikan', 'TahunMasuk', 'TahunLulus', 'Nim', 'StatusKuliah', 'Semester', 'Ipk', 'Prodi', 'IdRegPd', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('riwayatPendidikanFormalId', 'bidangStudiId', 'jenjangPendidikanId', 'gelarAkademikId', 'ptkId', 'satuanPendidikanFormal', 'fakultas', 'kependidikan', 'tahunMasuk', 'tahunLulus', 'nim', 'statusKuliah', 'semester', 'ipk', 'prodi', 'idRegPd', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, RwyPendFormalPeer::BIDANG_STUDI_ID, RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, RwyPendFormalPeer::GELAR_AKADEMIK_ID, RwyPendFormalPeer::PTK_ID, RwyPendFormalPeer::SATUAN_PENDIDIKAN_FORMAL, RwyPendFormalPeer::FAKULTAS, RwyPendFormalPeer::KEPENDIDIKAN, RwyPendFormalPeer::TAHUN_MASUK, RwyPendFormalPeer::TAHUN_LULUS, RwyPendFormalPeer::NIM, RwyPendFormalPeer::STATUS_KULIAH, RwyPendFormalPeer::SEMESTER, RwyPendFormalPeer::IPK, RwyPendFormalPeer::PRODI, RwyPendFormalPeer::ID_REG_PD, RwyPendFormalPeer::CREATE_DATE, RwyPendFormalPeer::LAST_UPDATE, RwyPendFormalPeer::SOFT_DELETE, RwyPendFormalPeer::LAST_SYNC, RwyPendFormalPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('RIWAYAT_PENDIDIKAN_FORMAL_ID', 'BIDANG_STUDI_ID', 'JENJANG_PENDIDIKAN_ID', 'GELAR_AKADEMIK_ID', 'PTK_ID', 'SATUAN_PENDIDIKAN_FORMAL', 'FAKULTAS', 'KEPENDIDIKAN', 'TAHUN_MASUK', 'TAHUN_LULUS', 'NIM', 'STATUS_KULIAH', 'SEMESTER', 'IPK', 'PRODI', 'ID_REG_PD', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('riwayat_pendidikan_formal_id', 'bidang_studi_id', 'jenjang_pendidikan_id', 'gelar_akademik_id', 'ptk_id', 'satuan_pendidikan_formal', 'fakultas', 'kependidikan', 'tahun_masuk', 'tahun_lulus', 'nim', 'status_kuliah', 'semester', 'ipk', 'prodi', 'id_reg_pd', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RwyPendFormalPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('RiwayatPendidikanFormalId' => 0, 'BidangStudiId' => 1, 'JenjangPendidikanId' => 2, 'GelarAkademikId' => 3, 'PtkId' => 4, 'SatuanPendidikanFormal' => 5, 'Fakultas' => 6, 'Kependidikan' => 7, 'TahunMasuk' => 8, 'TahunLulus' => 9, 'Nim' => 10, 'StatusKuliah' => 11, 'Semester' => 12, 'Ipk' => 13, 'Prodi' => 14, 'IdRegPd' => 15, 'CreateDate' => 16, 'LastUpdate' => 17, 'SoftDelete' => 18, 'LastSync' => 19, 'UpdaterId' => 20, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('riwayatPendidikanFormalId' => 0, 'bidangStudiId' => 1, 'jenjangPendidikanId' => 2, 'gelarAkademikId' => 3, 'ptkId' => 4, 'satuanPendidikanFormal' => 5, 'fakultas' => 6, 'kependidikan' => 7, 'tahunMasuk' => 8, 'tahunLulus' => 9, 'nim' => 10, 'statusKuliah' => 11, 'semester' => 12, 'ipk' => 13, 'prodi' => 14, 'idRegPd' => 15, 'createDate' => 16, 'lastUpdate' => 17, 'softDelete' => 18, 'lastSync' => 19, 'updaterId' => 20, ),
        BasePeer::TYPE_COLNAME => array (RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID => 0, RwyPendFormalPeer::BIDANG_STUDI_ID => 1, RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID => 2, RwyPendFormalPeer::GELAR_AKADEMIK_ID => 3, RwyPendFormalPeer::PTK_ID => 4, RwyPendFormalPeer::SATUAN_PENDIDIKAN_FORMAL => 5, RwyPendFormalPeer::FAKULTAS => 6, RwyPendFormalPeer::KEPENDIDIKAN => 7, RwyPendFormalPeer::TAHUN_MASUK => 8, RwyPendFormalPeer::TAHUN_LULUS => 9, RwyPendFormalPeer::NIM => 10, RwyPendFormalPeer::STATUS_KULIAH => 11, RwyPendFormalPeer::SEMESTER => 12, RwyPendFormalPeer::IPK => 13, RwyPendFormalPeer::PRODI => 14, RwyPendFormalPeer::ID_REG_PD => 15, RwyPendFormalPeer::CREATE_DATE => 16, RwyPendFormalPeer::LAST_UPDATE => 17, RwyPendFormalPeer::SOFT_DELETE => 18, RwyPendFormalPeer::LAST_SYNC => 19, RwyPendFormalPeer::UPDATER_ID => 20, ),
        BasePeer::TYPE_RAW_COLNAME => array ('RIWAYAT_PENDIDIKAN_FORMAL_ID' => 0, 'BIDANG_STUDI_ID' => 1, 'JENJANG_PENDIDIKAN_ID' => 2, 'GELAR_AKADEMIK_ID' => 3, 'PTK_ID' => 4, 'SATUAN_PENDIDIKAN_FORMAL' => 5, 'FAKULTAS' => 6, 'KEPENDIDIKAN' => 7, 'TAHUN_MASUK' => 8, 'TAHUN_LULUS' => 9, 'NIM' => 10, 'STATUS_KULIAH' => 11, 'SEMESTER' => 12, 'IPK' => 13, 'PRODI' => 14, 'ID_REG_PD' => 15, 'CREATE_DATE' => 16, 'LAST_UPDATE' => 17, 'SOFT_DELETE' => 18, 'LAST_SYNC' => 19, 'UPDATER_ID' => 20, ),
        BasePeer::TYPE_FIELDNAME => array ('riwayat_pendidikan_formal_id' => 0, 'bidang_studi_id' => 1, 'jenjang_pendidikan_id' => 2, 'gelar_akademik_id' => 3, 'ptk_id' => 4, 'satuan_pendidikan_formal' => 5, 'fakultas' => 6, 'kependidikan' => 7, 'tahun_masuk' => 8, 'tahun_lulus' => 9, 'nim' => 10, 'status_kuliah' => 11, 'semester' => 12, 'ipk' => 13, 'prodi' => 14, 'id_reg_pd' => 15, 'create_date' => 16, 'last_update' => 17, 'soft_delete' => 18, 'last_sync' => 19, 'updater_id' => 20, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
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
        $toNames = RwyPendFormalPeer::getFieldNames($toType);
        $key = isset(RwyPendFormalPeer::$fieldKeys[$fromType][$name]) ? RwyPendFormalPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RwyPendFormalPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RwyPendFormalPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RwyPendFormalPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RwyPendFormalPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RwyPendFormalPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID);
            $criteria->addSelectColumn(RwyPendFormalPeer::BIDANG_STUDI_ID);
            $criteria->addSelectColumn(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID);
            $criteria->addSelectColumn(RwyPendFormalPeer::GELAR_AKADEMIK_ID);
            $criteria->addSelectColumn(RwyPendFormalPeer::PTK_ID);
            $criteria->addSelectColumn(RwyPendFormalPeer::SATUAN_PENDIDIKAN_FORMAL);
            $criteria->addSelectColumn(RwyPendFormalPeer::FAKULTAS);
            $criteria->addSelectColumn(RwyPendFormalPeer::KEPENDIDIKAN);
            $criteria->addSelectColumn(RwyPendFormalPeer::TAHUN_MASUK);
            $criteria->addSelectColumn(RwyPendFormalPeer::TAHUN_LULUS);
            $criteria->addSelectColumn(RwyPendFormalPeer::NIM);
            $criteria->addSelectColumn(RwyPendFormalPeer::STATUS_KULIAH);
            $criteria->addSelectColumn(RwyPendFormalPeer::SEMESTER);
            $criteria->addSelectColumn(RwyPendFormalPeer::IPK);
            $criteria->addSelectColumn(RwyPendFormalPeer::PRODI);
            $criteria->addSelectColumn(RwyPendFormalPeer::ID_REG_PD);
            $criteria->addSelectColumn(RwyPendFormalPeer::CREATE_DATE);
            $criteria->addSelectColumn(RwyPendFormalPeer::LAST_UPDATE);
            $criteria->addSelectColumn(RwyPendFormalPeer::SOFT_DELETE);
            $criteria->addSelectColumn(RwyPendFormalPeer::LAST_SYNC);
            $criteria->addSelectColumn(RwyPendFormalPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.riwayat_pendidikan_formal_id');
            $criteria->addSelectColumn($alias . '.bidang_studi_id');
            $criteria->addSelectColumn($alias . '.jenjang_pendidikan_id');
            $criteria->addSelectColumn($alias . '.gelar_akademik_id');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.satuan_pendidikan_formal');
            $criteria->addSelectColumn($alias . '.fakultas');
            $criteria->addSelectColumn($alias . '.kependidikan');
            $criteria->addSelectColumn($alias . '.tahun_masuk');
            $criteria->addSelectColumn($alias . '.tahun_lulus');
            $criteria->addSelectColumn($alias . '.nim');
            $criteria->addSelectColumn($alias . '.status_kuliah');
            $criteria->addSelectColumn($alias . '.semester');
            $criteria->addSelectColumn($alias . '.ipk');
            $criteria->addSelectColumn($alias . '.prodi');
            $criteria->addSelectColumn($alias . '.id_reg_pd');
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
        $criteria->setPrimaryTableName(RwyPendFormalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyPendFormalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RwyPendFormal
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RwyPendFormalPeer::doSelect($critcopy, $con);
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
        return RwyPendFormalPeer::populateObjects(RwyPendFormalPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RwyPendFormalPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

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
     * @param      RwyPendFormal $obj A RwyPendFormal object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getRiwayatPendidikanFormalId();
            } // if key === null
            RwyPendFormalPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A RwyPendFormal object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof RwyPendFormal) {
                $key = (string) $value->getRiwayatPendidikanFormalId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RwyPendFormal object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RwyPendFormalPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   RwyPendFormal Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RwyPendFormalPeer::$instances[$key])) {
                return RwyPendFormalPeer::$instances[$key];
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
        foreach (RwyPendFormalPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RwyPendFormalPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to rwy_pend_formal
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
        $cls = RwyPendFormalPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RwyPendFormalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RwyPendFormalPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RwyPendFormalPeer::addInstanceToPool($obj, $key);
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
     * @return array (RwyPendFormal object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RwyPendFormalPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RwyPendFormalPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RwyPendFormalPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RwyPendFormalPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RwyPendFormalPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related GelarAkademik table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinGelarAkademik(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwyPendFormalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyPendFormalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyPendFormalPeer::GELAR_AKADEMIK_ID, GelarAkademikPeer::GELAR_AKADEMIK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RwyPendFormalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyPendFormalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyPendFormalPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related BidangStudi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBidangStudi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwyPendFormalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyPendFormalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyPendFormalPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RwyPendFormalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyPendFormalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
     * Selects a collection of RwyPendFormal objects pre-filled with their GelarAkademik objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyPendFormal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinGelarAkademik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);
        }

        RwyPendFormalPeer::addSelectColumns($criteria);
        $startcol = RwyPendFormalPeer::NUM_HYDRATE_COLUMNS;
        GelarAkademikPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwyPendFormalPeer::GELAR_AKADEMIK_ID, GelarAkademikPeer::GELAR_AKADEMIK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyPendFormalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyPendFormalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwyPendFormalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyPendFormalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = GelarAkademikPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = GelarAkademikPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = GelarAkademikPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    GelarAkademikPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RwyPendFormal) to $obj2 (GelarAkademik)
                $obj2->addRwyPendFormal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyPendFormal objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyPendFormal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);
        }

        RwyPendFormalPeer::addSelectColumns($criteria);
        $startcol = RwyPendFormalPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwyPendFormalPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyPendFormalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyPendFormalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwyPendFormalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyPendFormalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwyPendFormal) to $obj2 (Ptk)
                $obj2->addRwyPendFormal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyPendFormal objects pre-filled with their BidangStudi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyPendFormal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBidangStudi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);
        }

        RwyPendFormalPeer::addSelectColumns($criteria);
        $startcol = RwyPendFormalPeer::NUM_HYDRATE_COLUMNS;
        BidangStudiPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwyPendFormalPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyPendFormalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyPendFormalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwyPendFormalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyPendFormalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RwyPendFormal) to $obj2 (BidangStudi)
                $obj2->addRwyPendFormal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyPendFormal objects pre-filled with their JenjangPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyPendFormal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenjangPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);
        }

        RwyPendFormalPeer::addSelectColumns($criteria);
        $startcol = RwyPendFormalPeer::NUM_HYDRATE_COLUMNS;
        JenjangPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyPendFormalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyPendFormalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RwyPendFormalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyPendFormalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwyPendFormal) to $obj2 (JenjangPendidikan)
                $obj2->addRwyPendFormal($obj1);

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
        $criteria->setPrimaryTableName(RwyPendFormalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyPendFormalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RwyPendFormalPeer::GELAR_AKADEMIK_ID, GelarAkademikPeer::GELAR_AKADEMIK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
     * Selects a collection of RwyPendFormal objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyPendFormal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);
        }

        RwyPendFormalPeer::addSelectColumns($criteria);
        $startcol2 = RwyPendFormalPeer::NUM_HYDRATE_COLUMNS;

        GelarAkademikPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + GelarAkademikPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyPendFormalPeer::GELAR_AKADEMIK_ID, GelarAkademikPeer::GELAR_AKADEMIK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyPendFormalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyPendFormalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyPendFormalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyPendFormalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined GelarAkademik rows

            $key2 = GelarAkademikPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = GelarAkademikPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = GelarAkademikPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    GelarAkademikPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (RwyPendFormal) to the collection in $obj2 (GelarAkademik)
                $obj2->addRwyPendFormal($obj1);
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

                // Add the $obj1 (RwyPendFormal) to the collection in $obj3 (Ptk)
                $obj3->addRwyPendFormal($obj1);
            } // if joined row not null

            // Add objects for joined BidangStudi rows

            $key4 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = BidangStudiPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = BidangStudiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    BidangStudiPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (RwyPendFormal) to the collection in $obj4 (BidangStudi)
                $obj4->addRwyPendFormal($obj1);
            } // if joined row not null

            // Add objects for joined JenjangPendidikan rows

            $key5 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = JenjangPendidikanPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = JenjangPendidikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenjangPendidikanPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (RwyPendFormal) to the collection in $obj5 (JenjangPendidikan)
                $obj5->addRwyPendFormal($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related GelarAkademik table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptGelarAkademik(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwyPendFormalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyPendFormalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwyPendFormalPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RwyPendFormalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyPendFormalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwyPendFormalPeer::GELAR_AKADEMIK_ID, GelarAkademikPeer::GELAR_AKADEMIK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related BidangStudi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBidangStudi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RwyPendFormalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyPendFormalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwyPendFormalPeer::GELAR_AKADEMIK_ID, GelarAkademikPeer::GELAR_AKADEMIK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RwyPendFormalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RwyPendFormalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RwyPendFormalPeer::GELAR_AKADEMIK_ID, GelarAkademikPeer::GELAR_AKADEMIK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

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
     * Selects a collection of RwyPendFormal objects pre-filled with all related objects except GelarAkademik.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyPendFormal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptGelarAkademik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);
        }

        RwyPendFormalPeer::addSelectColumns($criteria);
        $startcol2 = RwyPendFormalPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyPendFormalPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyPendFormalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyPendFormalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyPendFormalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyPendFormalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RwyPendFormal) to the collection in $obj2 (Ptk)
                $obj2->addRwyPendFormal($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key3 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BidangStudiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BidangStudiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RwyPendFormal) to the collection in $obj3 (BidangStudi)
                $obj3->addRwyPendFormal($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key4 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenjangPendidikanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenjangPendidikanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwyPendFormal) to the collection in $obj4 (JenjangPendidikan)
                $obj4->addRwyPendFormal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyPendFormal objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyPendFormal objects.
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
            $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);
        }

        RwyPendFormalPeer::addSelectColumns($criteria);
        $startcol2 = RwyPendFormalPeer::NUM_HYDRATE_COLUMNS;

        GelarAkademikPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + GelarAkademikPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyPendFormalPeer::GELAR_AKADEMIK_ID, GelarAkademikPeer::GELAR_AKADEMIK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyPendFormalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyPendFormalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyPendFormalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyPendFormalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined GelarAkademik rows

                $key2 = GelarAkademikPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = GelarAkademikPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = GelarAkademikPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    GelarAkademikPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RwyPendFormal) to the collection in $obj2 (GelarAkademik)
                $obj2->addRwyPendFormal($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key3 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BidangStudiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BidangStudiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RwyPendFormal) to the collection in $obj3 (BidangStudi)
                $obj3->addRwyPendFormal($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key4 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenjangPendidikanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenjangPendidikanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwyPendFormal) to the collection in $obj4 (JenjangPendidikan)
                $obj4->addRwyPendFormal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyPendFormal objects pre-filled with all related objects except BidangStudi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyPendFormal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBidangStudi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);
        }

        RwyPendFormalPeer::addSelectColumns($criteria);
        $startcol2 = RwyPendFormalPeer::NUM_HYDRATE_COLUMNS;

        GelarAkademikPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + GelarAkademikPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyPendFormalPeer::GELAR_AKADEMIK_ID, GelarAkademikPeer::GELAR_AKADEMIK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyPendFormalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyPendFormalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyPendFormalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyPendFormalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined GelarAkademik rows

                $key2 = GelarAkademikPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = GelarAkademikPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = GelarAkademikPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    GelarAkademikPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RwyPendFormal) to the collection in $obj2 (GelarAkademik)
                $obj2->addRwyPendFormal($obj1);

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

                // Add the $obj1 (RwyPendFormal) to the collection in $obj3 (Ptk)
                $obj3->addRwyPendFormal($obj1);

            } // if joined row is not null

                // Add objects for joined JenjangPendidikan rows

                $key4 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenjangPendidikanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenjangPendidikanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwyPendFormal) to the collection in $obj4 (JenjangPendidikan)
                $obj4->addRwyPendFormal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RwyPendFormal objects pre-filled with all related objects except JenjangPendidikan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RwyPendFormal objects.
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
            $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);
        }

        RwyPendFormalPeer::addSelectColumns($criteria);
        $startcol2 = RwyPendFormalPeer::NUM_HYDRATE_COLUMNS;

        GelarAkademikPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + GelarAkademikPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RwyPendFormalPeer::GELAR_AKADEMIK_ID, GelarAkademikPeer::GELAR_AKADEMIK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RwyPendFormalPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RwyPendFormalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RwyPendFormalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RwyPendFormalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RwyPendFormalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined GelarAkademik rows

                $key2 = GelarAkademikPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = GelarAkademikPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = GelarAkademikPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    GelarAkademikPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RwyPendFormal) to the collection in $obj2 (GelarAkademik)
                $obj2->addRwyPendFormal($obj1);

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

                // Add the $obj1 (RwyPendFormal) to the collection in $obj3 (Ptk)
                $obj3->addRwyPendFormal($obj1);

            } // if joined row is not null

                // Add objects for joined BidangStudi rows

                $key4 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = BidangStudiPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    BidangStudiPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RwyPendFormal) to the collection in $obj4 (BidangStudi)
                $obj4->addRwyPendFormal($obj1);

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
        return Propel::getDatabaseMap(RwyPendFormalPeer::DATABASE_NAME)->getTable(RwyPendFormalPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRwyPendFormalPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRwyPendFormalPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RwyPendFormalTableMap());
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
        return RwyPendFormalPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a RwyPendFormal or Criteria object.
     *
     * @param      mixed $values Criteria or RwyPendFormal object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from RwyPendFormal object
        }


        // Set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a RwyPendFormal or Criteria object.
     *
     * @param      mixed $values Criteria or RwyPendFormal object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RwyPendFormalPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID);
            $value = $criteria->remove(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID);
            if ($value) {
                $selectCriteria->add(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RwyPendFormalPeer::TABLE_NAME);
            }

        } else { // $values is RwyPendFormal object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the rwy_pend_formal table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RwyPendFormalPeer::TABLE_NAME, $con, RwyPendFormalPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RwyPendFormalPeer::clearInstancePool();
            RwyPendFormalPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a RwyPendFormal or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or RwyPendFormal object or primary key or array of primary keys
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
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RwyPendFormalPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof RwyPendFormal) { // it's a model object
            // invalidate the cache for this single object
            RwyPendFormalPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RwyPendFormalPeer::DATABASE_NAME);
            $criteria->add(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                RwyPendFormalPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RwyPendFormalPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            RwyPendFormalPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given RwyPendFormal object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      RwyPendFormal $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RwyPendFormalPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RwyPendFormalPeer::TABLE_NAME);

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

        return BasePeer::doValidate(RwyPendFormalPeer::DATABASE_NAME, RwyPendFormalPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return RwyPendFormal
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RwyPendFormalPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RwyPendFormalPeer::DATABASE_NAME);
        $criteria->add(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $pk);

        $v = RwyPendFormalPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return RwyPendFormal[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RwyPendFormalPeer::DATABASE_NAME);
            $criteria->add(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $pks, Criteria::IN);
            $objs = RwyPendFormalPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRwyPendFormalPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRwyPendFormalPeer::buildTableMap();

