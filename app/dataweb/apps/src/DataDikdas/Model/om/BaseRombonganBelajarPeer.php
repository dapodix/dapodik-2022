<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JurusanSpPeer;
use DataDikdas\Model\KebutuhanKhususPeer;
use DataDikdas\Model\KurikulumPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RombonganBelajarPeer;
use DataDikdas\Model\RuangPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\TingkatPendidikanPeer;
use DataDikdas\Model\map\RombonganBelajarTableMap;

/**
 * Base static class for performing query and update operations on the 'rombongan_belajar' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseRombonganBelajarPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'rombongan_belajar';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\RombonganBelajar';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RombonganBelajarTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 20;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 20;

    /** the column name for the rombongan_belajar_id field */
    const ROMBONGAN_BELAJAR_ID = 'rombongan_belajar.rombongan_belajar_id';

    /** the column name for the semester_id field */
    const SEMESTER_ID = 'rombongan_belajar.semester_id';

    /** the column name for the id_ruang field */
    const ID_RUANG = 'rombongan_belajar.id_ruang';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'rombongan_belajar.sekolah_id';

    /** the column name for the tingkat_pendidikan_id field */
    const TINGKAT_PENDIDIKAN_ID = 'rombongan_belajar.tingkat_pendidikan_id';

    /** the column name for the jurusan_sp_id field */
    const JURUSAN_SP_ID = 'rombongan_belajar.jurusan_sp_id';

    /** the column name for the kurikulum_id field */
    const KURIKULUM_ID = 'rombongan_belajar.kurikulum_id';

    /** the column name for the nama field */
    const NAMA = 'rombongan_belajar.nama';

    /** the column name for the ptk_id field */
    const PTK_ID = 'rombongan_belajar.ptk_id';

    /** the column name for the moving_class field */
    const MOVING_CLASS = 'rombongan_belajar.moving_class';

    /** the column name for the jenis_rombel field */
    const JENIS_ROMBEL = 'rombongan_belajar.jenis_rombel';

    /** the column name for the sks field */
    const SKS = 'rombongan_belajar.sks';

    /** the column name for the tanggal_mulai field */
    const TANGGAL_MULAI = 'rombongan_belajar.tanggal_mulai';

    /** the column name for the tanggal_selesai field */
    const TANGGAL_SELESAI = 'rombongan_belajar.tanggal_selesai';

    /** the column name for the kebutuhan_khusus_id field */
    const KEBUTUHAN_KHUSUS_ID = 'rombongan_belajar.kebutuhan_khusus_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'rombongan_belajar.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'rombongan_belajar.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'rombongan_belajar.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'rombongan_belajar.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'rombongan_belajar.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of RombonganBelajar objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array RombonganBelajar[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RombonganBelajarPeer::$fieldNames[RombonganBelajarPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('RombonganBelajarId', 'SemesterId', 'IdRuang', 'SekolahId', 'TingkatPendidikanId', 'JurusanSpId', 'KurikulumId', 'Nama', 'PtkId', 'MovingClass', 'JenisRombel', 'Sks', 'TanggalMulai', 'TanggalSelesai', 'KebutuhanKhususId', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('rombonganBelajarId', 'semesterId', 'idRuang', 'sekolahId', 'tingkatPendidikanId', 'jurusanSpId', 'kurikulumId', 'nama', 'ptkId', 'movingClass', 'jenisRombel', 'sks', 'tanggalMulai', 'tanggalSelesai', 'kebutuhanKhususId', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::SEMESTER_ID, RombonganBelajarPeer::ID_RUANG, RombonganBelajarPeer::SEKOLAH_ID, RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, RombonganBelajarPeer::JURUSAN_SP_ID, RombonganBelajarPeer::KURIKULUM_ID, RombonganBelajarPeer::NAMA, RombonganBelajarPeer::PTK_ID, RombonganBelajarPeer::MOVING_CLASS, RombonganBelajarPeer::JENIS_ROMBEL, RombonganBelajarPeer::SKS, RombonganBelajarPeer::TANGGAL_MULAI, RombonganBelajarPeer::TANGGAL_SELESAI, RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, RombonganBelajarPeer::CREATE_DATE, RombonganBelajarPeer::LAST_UPDATE, RombonganBelajarPeer::SOFT_DELETE, RombonganBelajarPeer::LAST_SYNC, RombonganBelajarPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ROMBONGAN_BELAJAR_ID', 'SEMESTER_ID', 'ID_RUANG', 'SEKOLAH_ID', 'TINGKAT_PENDIDIKAN_ID', 'JURUSAN_SP_ID', 'KURIKULUM_ID', 'NAMA', 'PTK_ID', 'MOVING_CLASS', 'JENIS_ROMBEL', 'SKS', 'TANGGAL_MULAI', 'TANGGAL_SELESAI', 'KEBUTUHAN_KHUSUS_ID', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('rombongan_belajar_id', 'semester_id', 'id_ruang', 'sekolah_id', 'tingkat_pendidikan_id', 'jurusan_sp_id', 'kurikulum_id', 'nama', 'ptk_id', 'moving_class', 'jenis_rombel', 'sks', 'tanggal_mulai', 'tanggal_selesai', 'kebutuhan_khusus_id', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RombonganBelajarPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('RombonganBelajarId' => 0, 'SemesterId' => 1, 'IdRuang' => 2, 'SekolahId' => 3, 'TingkatPendidikanId' => 4, 'JurusanSpId' => 5, 'KurikulumId' => 6, 'Nama' => 7, 'PtkId' => 8, 'MovingClass' => 9, 'JenisRombel' => 10, 'Sks' => 11, 'TanggalMulai' => 12, 'TanggalSelesai' => 13, 'KebutuhanKhususId' => 14, 'CreateDate' => 15, 'LastUpdate' => 16, 'SoftDelete' => 17, 'LastSync' => 18, 'UpdaterId' => 19, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('rombonganBelajarId' => 0, 'semesterId' => 1, 'idRuang' => 2, 'sekolahId' => 3, 'tingkatPendidikanId' => 4, 'jurusanSpId' => 5, 'kurikulumId' => 6, 'nama' => 7, 'ptkId' => 8, 'movingClass' => 9, 'jenisRombel' => 10, 'sks' => 11, 'tanggalMulai' => 12, 'tanggalSelesai' => 13, 'kebutuhanKhususId' => 14, 'createDate' => 15, 'lastUpdate' => 16, 'softDelete' => 17, 'lastSync' => 18, 'updaterId' => 19, ),
        BasePeer::TYPE_COLNAME => array (RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID => 0, RombonganBelajarPeer::SEMESTER_ID => 1, RombonganBelajarPeer::ID_RUANG => 2, RombonganBelajarPeer::SEKOLAH_ID => 3, RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID => 4, RombonganBelajarPeer::JURUSAN_SP_ID => 5, RombonganBelajarPeer::KURIKULUM_ID => 6, RombonganBelajarPeer::NAMA => 7, RombonganBelajarPeer::PTK_ID => 8, RombonganBelajarPeer::MOVING_CLASS => 9, RombonganBelajarPeer::JENIS_ROMBEL => 10, RombonganBelajarPeer::SKS => 11, RombonganBelajarPeer::TANGGAL_MULAI => 12, RombonganBelajarPeer::TANGGAL_SELESAI => 13, RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID => 14, RombonganBelajarPeer::CREATE_DATE => 15, RombonganBelajarPeer::LAST_UPDATE => 16, RombonganBelajarPeer::SOFT_DELETE => 17, RombonganBelajarPeer::LAST_SYNC => 18, RombonganBelajarPeer::UPDATER_ID => 19, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ROMBONGAN_BELAJAR_ID' => 0, 'SEMESTER_ID' => 1, 'ID_RUANG' => 2, 'SEKOLAH_ID' => 3, 'TINGKAT_PENDIDIKAN_ID' => 4, 'JURUSAN_SP_ID' => 5, 'KURIKULUM_ID' => 6, 'NAMA' => 7, 'PTK_ID' => 8, 'MOVING_CLASS' => 9, 'JENIS_ROMBEL' => 10, 'SKS' => 11, 'TANGGAL_MULAI' => 12, 'TANGGAL_SELESAI' => 13, 'KEBUTUHAN_KHUSUS_ID' => 14, 'CREATE_DATE' => 15, 'LAST_UPDATE' => 16, 'SOFT_DELETE' => 17, 'LAST_SYNC' => 18, 'UPDATER_ID' => 19, ),
        BasePeer::TYPE_FIELDNAME => array ('rombongan_belajar_id' => 0, 'semester_id' => 1, 'id_ruang' => 2, 'sekolah_id' => 3, 'tingkat_pendidikan_id' => 4, 'jurusan_sp_id' => 5, 'kurikulum_id' => 6, 'nama' => 7, 'ptk_id' => 8, 'moving_class' => 9, 'jenis_rombel' => 10, 'sks' => 11, 'tanggal_mulai' => 12, 'tanggal_selesai' => 13, 'kebutuhan_khusus_id' => 14, 'create_date' => 15, 'last_update' => 16, 'soft_delete' => 17, 'last_sync' => 18, 'updater_id' => 19, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
        $toNames = RombonganBelajarPeer::getFieldNames($toType);
        $key = isset(RombonganBelajarPeer::$fieldKeys[$fromType][$name]) ? RombonganBelajarPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RombonganBelajarPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RombonganBelajarPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RombonganBelajarPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RombonganBelajarPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RombonganBelajarPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID);
            $criteria->addSelectColumn(RombonganBelajarPeer::SEMESTER_ID);
            $criteria->addSelectColumn(RombonganBelajarPeer::ID_RUANG);
            $criteria->addSelectColumn(RombonganBelajarPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID);
            $criteria->addSelectColumn(RombonganBelajarPeer::JURUSAN_SP_ID);
            $criteria->addSelectColumn(RombonganBelajarPeer::KURIKULUM_ID);
            $criteria->addSelectColumn(RombonganBelajarPeer::NAMA);
            $criteria->addSelectColumn(RombonganBelajarPeer::PTK_ID);
            $criteria->addSelectColumn(RombonganBelajarPeer::MOVING_CLASS);
            $criteria->addSelectColumn(RombonganBelajarPeer::JENIS_ROMBEL);
            $criteria->addSelectColumn(RombonganBelajarPeer::SKS);
            $criteria->addSelectColumn(RombonganBelajarPeer::TANGGAL_MULAI);
            $criteria->addSelectColumn(RombonganBelajarPeer::TANGGAL_SELESAI);
            $criteria->addSelectColumn(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID);
            $criteria->addSelectColumn(RombonganBelajarPeer::CREATE_DATE);
            $criteria->addSelectColumn(RombonganBelajarPeer::LAST_UPDATE);
            $criteria->addSelectColumn(RombonganBelajarPeer::SOFT_DELETE);
            $criteria->addSelectColumn(RombonganBelajarPeer::LAST_SYNC);
            $criteria->addSelectColumn(RombonganBelajarPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.rombongan_belajar_id');
            $criteria->addSelectColumn($alias . '.semester_id');
            $criteria->addSelectColumn($alias . '.id_ruang');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.tingkat_pendidikan_id');
            $criteria->addSelectColumn($alias . '.jurusan_sp_id');
            $criteria->addSelectColumn($alias . '.kurikulum_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.moving_class');
            $criteria->addSelectColumn($alias . '.jenis_rombel');
            $criteria->addSelectColumn($alias . '.sks');
            $criteria->addSelectColumn($alias . '.tanggal_mulai');
            $criteria->addSelectColumn($alias . '.tanggal_selesai');
            $criteria->addSelectColumn($alias . '.kebutuhan_khusus_id');
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
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RombonganBelajar
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RombonganBelajarPeer::doSelect($critcopy, $con);
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
        return RombonganBelajarPeer::populateObjects(RombonganBelajarPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

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
     * @param      RombonganBelajar $obj A RombonganBelajar object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getRombonganBelajarId();
            } // if key === null
            RombonganBelajarPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A RombonganBelajar object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof RombonganBelajar) {
                $key = (string) $value->getRombonganBelajarId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RombonganBelajar object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RombonganBelajarPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   RombonganBelajar Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RombonganBelajarPeer::$instances[$key])) {
                return RombonganBelajarPeer::$instances[$key];
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
        foreach (RombonganBelajarPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RombonganBelajarPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to rombongan_belajar
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
        $cls = RombonganBelajarPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RombonganBelajarPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RombonganBelajarPeer::addInstanceToPool($obj, $key);
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
     * @return array (RombonganBelajar object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RombonganBelajarPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RombonganBelajarPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RombonganBelajarPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related JurusanSp table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJurusanSp(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

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
    public static function doCountJoinKurikulum(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Ruang table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRuang(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Sekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of RombonganBelajar objects pre-filled with their JurusanSp objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJurusanSp(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;
        JurusanSpPeer::addSelectColumns($criteria);

        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RombonganBelajar) to $obj2 (JurusanSp)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with their KebutuhanKhusus objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKebutuhanKhusus(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;
        KebutuhanKhususPeer::addSelectColumns($criteria);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RombonganBelajar) to $obj2 (KebutuhanKhusus)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with their Kurikulum objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKurikulum(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;
        KurikulumPeer::addSelectColumns($criteria);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RombonganBelajar) to $obj2 (Kurikulum)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with their Semester objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;
        SemesterPeer::addSelectColumns($criteria);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RombonganBelajar) to $obj2 (Semester)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with their TingkatPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTingkatPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;
        TingkatPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RombonganBelajar) to $obj2 (TingkatPendidikan)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RombonganBelajar) to $obj2 (Ptk)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with their Ruang objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRuang(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;
        RuangPeer::addSelectColumns($criteria);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RuangPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RuangPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RuangPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RombonganBelajar) to $obj2 (Ruang)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SekolahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SekolahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RombonganBelajar) to $obj2 (Sekolah)
                $obj2->addRombonganBelajar($obj1);

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
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of RombonganBelajar objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol2 = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + PtkPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined JurusanSp rows

            $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj2 (JurusanSp)
                $obj2->addRombonganBelajar($obj1);
            } // if joined row not null

            // Add objects for joined KebutuhanKhusus rows

            $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addRombonganBelajar($obj1);
            } // if joined row not null

            // Add objects for joined Kurikulum rows

            $key4 = KurikulumPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = KurikulumPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = KurikulumPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    KurikulumPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj4 (Kurikulum)
                $obj4->addRombonganBelajar($obj1);
            } // if joined row not null

            // Add objects for joined Semester rows

            $key5 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = SemesterPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = SemesterPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SemesterPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj5 (Semester)
                $obj5->addRombonganBelajar($obj1);
            } // if joined row not null

            // Add objects for joined TingkatPendidikan rows

            $key6 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = TingkatPendidikanPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = TingkatPendidikanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    TingkatPendidikanPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj6 (TingkatPendidikan)
                $obj6->addRombonganBelajar($obj1);
            } // if joined row not null

            // Add objects for joined Ptk rows

            $key7 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = PtkPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = PtkPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    PtkPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj7 (Ptk)
                $obj7->addRombonganBelajar($obj1);
            } // if joined row not null

            // Add objects for joined Ruang rows

            $key8 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = RuangPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = RuangPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    RuangPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj8 (Ruang)
                $obj8->addRombonganBelajar($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key9 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol9);
            if ($key9 !== null) {
                $obj9 = SekolahPeer::getInstanceFromPool($key9);
                if (!$obj9) {

                    $cls = SekolahPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    SekolahPeer::addInstanceToPool($obj9, $key9);
                } // if obj9 loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj9 (Sekolah)
                $obj9->addRombonganBelajar($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JurusanSp table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJurusanSp(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related KebutuhanKhusus table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKebutuhanKhusus(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Ruang table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRuang(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Sekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RombonganBelajarPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
     * Selects a collection of RombonganBelajar objects pre-filled with all related objects except JurusanSp.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJurusanSp(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol2 = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PtkPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
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
                } // if $obj2 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj2 (KebutuhanKhusus)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Kurikulum rows

                $key3 = KurikulumPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KurikulumPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KurikulumPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KurikulumPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj3 (Kurikulum)
                $obj3->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key4 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SemesterPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SemesterPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj4 (Semester)
                $obj4->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key5 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = TingkatPendidikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    TingkatPendidikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj5 (TingkatPendidikan)
                $obj5->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key6 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = PtkPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PtkPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj6 (Ptk)
                $obj6->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key7 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = RuangPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    RuangPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj7 (Ruang)
                $obj7->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key8 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = SekolahPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    SekolahPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj8 (Sekolah)
                $obj8->addRombonganBelajar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with all related objects except KebutuhanKhusus.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKebutuhanKhusus(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol2 = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PtkPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj2 (JurusanSp)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Kurikulum rows

                $key3 = KurikulumPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KurikulumPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KurikulumPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KurikulumPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj3 (Kurikulum)
                $obj3->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key4 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SemesterPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SemesterPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj4 (Semester)
                $obj4->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key5 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = TingkatPendidikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    TingkatPendidikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj5 (TingkatPendidikan)
                $obj5->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key6 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = PtkPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PtkPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj6 (Ptk)
                $obj6->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key7 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = RuangPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    RuangPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj7 (Ruang)
                $obj7->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key8 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = SekolahPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    SekolahPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj8 (Sekolah)
                $obj8->addRombonganBelajar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with all related objects except Kurikulum.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
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
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol2 = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PtkPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj2 (JurusanSp)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key4 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SemesterPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SemesterPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj4 (Semester)
                $obj4->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key5 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = TingkatPendidikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    TingkatPendidikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj5 (TingkatPendidikan)
                $obj5->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key6 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = PtkPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PtkPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj6 (Ptk)
                $obj6->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key7 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = RuangPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    RuangPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj7 (Ruang)
                $obj7->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key8 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = SekolahPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    SekolahPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj8 (Sekolah)
                $obj8->addRombonganBelajar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with all related objects except Semester.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
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
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol2 = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PtkPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj2 (JurusanSp)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Kurikulum rows

                $key4 = KurikulumPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = KurikulumPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = KurikulumPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    KurikulumPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj4 (Kurikulum)
                $obj4->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key5 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = TingkatPendidikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    TingkatPendidikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj5 (TingkatPendidikan)
                $obj5->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key6 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = PtkPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PtkPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj6 (Ptk)
                $obj6->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key7 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = RuangPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    RuangPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj7 (Ruang)
                $obj7->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key8 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = SekolahPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    SekolahPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj8 (Sekolah)
                $obj8->addRombonganBelajar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with all related objects except TingkatPendidikan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
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
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol2 = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PtkPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj2 (JurusanSp)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Kurikulum rows

                $key4 = KurikulumPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = KurikulumPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = KurikulumPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    KurikulumPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj4 (Kurikulum)
                $obj4->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key5 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SemesterPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SemesterPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj5 (Semester)
                $obj5->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key6 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = PtkPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PtkPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj6 (Ptk)
                $obj6->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key7 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = RuangPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    RuangPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj7 (Ruang)
                $obj7->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key8 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = SekolahPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    SekolahPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj8 (Sekolah)
                $obj8->addRombonganBelajar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
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
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol2 = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj2 (JurusanSp)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Kurikulum rows

                $key4 = KurikulumPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = KurikulumPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = KurikulumPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    KurikulumPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj4 (Kurikulum)
                $obj4->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key5 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SemesterPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SemesterPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj5 (Semester)
                $obj5->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key6 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = TingkatPendidikanPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    TingkatPendidikanPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj6 (TingkatPendidikan)
                $obj6->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key7 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = RuangPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    RuangPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj7 (Ruang)
                $obj7->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key8 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = SekolahPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    SekolahPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj8 (Sekolah)
                $obj8->addRombonganBelajar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with all related objects except Ruang.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRuang(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol2 = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + PtkPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj2 (JurusanSp)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Kurikulum rows

                $key4 = KurikulumPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = KurikulumPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = KurikulumPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    KurikulumPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj4 (Kurikulum)
                $obj4->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key5 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SemesterPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SemesterPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj5 (Semester)
                $obj5->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key6 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = TingkatPendidikanPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    TingkatPendidikanPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj6 (TingkatPendidikan)
                $obj6->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key7 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = PtkPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    PtkPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj7 (Ptk)
                $obj7->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key8 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = SekolahPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    SekolahPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj8 (Sekolah)
                $obj8->addRombonganBelajar($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RombonganBelajar objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RombonganBelajar objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);
        }

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol2 = RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        KebutuhanKhususPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;

        KurikulumPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + KurikulumPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + PtkPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + RuangPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RombonganBelajarPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::KURIKULUM_ID, KurikulumPeer::KURIKULUM_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(RombonganBelajarPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RombonganBelajarPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RombonganBelajarPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RombonganBelajarPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj2 (JurusanSp)
                $obj2->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined KebutuhanKhusus rows

                $key3 = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KebutuhanKhususPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KebutuhanKhususPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KebutuhanKhususPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj3 (KebutuhanKhusus)
                $obj3->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Kurikulum rows

                $key4 = KurikulumPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = KurikulumPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = KurikulumPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    KurikulumPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj4 (Kurikulum)
                $obj4->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key5 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SemesterPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SemesterPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj5 (Semester)
                $obj5->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key6 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = TingkatPendidikanPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    TingkatPendidikanPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj6 (TingkatPendidikan)
                $obj6->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ptk rows

                $key7 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = PtkPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    PtkPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj7 (Ptk)
                $obj7->addRombonganBelajar($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key8 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = RuangPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    RuangPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (RombonganBelajar) to the collection in $obj8 (Ruang)
                $obj8->addRombonganBelajar($obj1);

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
        return Propel::getDatabaseMap(RombonganBelajarPeer::DATABASE_NAME)->getTable(RombonganBelajarPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRombonganBelajarPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRombonganBelajarPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RombonganBelajarTableMap());
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
        return RombonganBelajarPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a RombonganBelajar or Criteria object.
     *
     * @param      mixed $values Criteria or RombonganBelajar object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from RombonganBelajar object
        }


        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a RombonganBelajar or Criteria object.
     *
     * @param      mixed $values Criteria or RombonganBelajar object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RombonganBelajarPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID);
            $value = $criteria->remove(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID);
            if ($value) {
                $selectCriteria->add(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RombonganBelajarPeer::TABLE_NAME);
            }

        } else { // $values is RombonganBelajar object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the rombongan_belajar table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RombonganBelajarPeer::TABLE_NAME, $con, RombonganBelajarPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RombonganBelajarPeer::clearInstancePool();
            RombonganBelajarPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a RombonganBelajar or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or RombonganBelajar object or primary key or array of primary keys
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
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RombonganBelajarPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof RombonganBelajar) { // it's a model object
            // invalidate the cache for this single object
            RombonganBelajarPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RombonganBelajarPeer::DATABASE_NAME);
            $criteria->add(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                RombonganBelajarPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RombonganBelajarPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            RombonganBelajarPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given RombonganBelajar object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      RombonganBelajar $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RombonganBelajarPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RombonganBelajarPeer::TABLE_NAME);

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

        return BasePeer::doValidate(RombonganBelajarPeer::DATABASE_NAME, RombonganBelajarPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return RombonganBelajar
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RombonganBelajarPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RombonganBelajarPeer::DATABASE_NAME);
        $criteria->add(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $pk);

        $v = RombonganBelajarPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return RombonganBelajar[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RombonganBelajarPeer::DATABASE_NAME);
            $criteria->add(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $pks, Criteria::IN);
            $objs = RombonganBelajarPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRombonganBelajarPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRombonganBelajarPeer::buildTableMap();

