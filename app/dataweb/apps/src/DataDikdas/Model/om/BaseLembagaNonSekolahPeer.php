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
use DataDikdas\Model\LembagaNonSekolah;
use DataDikdas\Model\LembagaNonSekolahPeer;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\map\LembagaNonSekolahTableMap;

/**
 * Base static class for performing query and update operations on the 'lembaga_non_sekolah' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseLembagaNonSekolahPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'lembaga_non_sekolah';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\LembagaNonSekolah';

    /** the related TableMap class for this table */
    const TM_CLASS = 'LembagaNonSekolahTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 22;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 22;

    /** the column name for the lembaga_id field */
    const LEMBAGA_ID = 'lembaga_non_sekolah.lembaga_id';

    /** the column name for the nama field */
    const NAMA = 'lembaga_non_sekolah.nama';

    /** the column name for the singkatan field */
    const SINGKATAN = 'lembaga_non_sekolah.singkatan';

    /** the column name for the jenis_lembaga_id field */
    const JENIS_LEMBAGA_ID = 'lembaga_non_sekolah.jenis_lembaga_id';

    /** the column name for the alamat_jalan field */
    const ALAMAT_JALAN = 'lembaga_non_sekolah.alamat_jalan';

    /** the column name for the rt field */
    const RT = 'lembaga_non_sekolah.rt';

    /** the column name for the rw field */
    const RW = 'lembaga_non_sekolah.rw';

    /** the column name for the nama_dusun field */
    const NAMA_DUSUN = 'lembaga_non_sekolah.nama_dusun';

    /** the column name for the desa_kelurahan field */
    const DESA_KELURAHAN = 'lembaga_non_sekolah.desa_kelurahan';

    /** the column name for the kode_wilayah field */
    const KODE_WILAYAH = 'lembaga_non_sekolah.kode_wilayah';

    /** the column name for the kode_pos field */
    const KODE_POS = 'lembaga_non_sekolah.kode_pos';

    /** the column name for the lintang field */
    const LINTANG = 'lembaga_non_sekolah.lintang';

    /** the column name for the bujur field */
    const BUJUR = 'lembaga_non_sekolah.bujur';

    /** the column name for the nomor_telepon field */
    const NOMOR_TELEPON = 'lembaga_non_sekolah.nomor_telepon';

    /** the column name for the nomor_fax field */
    const NOMOR_FAX = 'lembaga_non_sekolah.nomor_fax';

    /** the column name for the email field */
    const EMAIL = 'lembaga_non_sekolah.email';

    /** the column name for the website field */
    const WEBSITE = 'lembaga_non_sekolah.website';

    /** the column name for the create_date field */
    const CREATE_DATE = 'lembaga_non_sekolah.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'lembaga_non_sekolah.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'lembaga_non_sekolah.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'lembaga_non_sekolah.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'lembaga_non_sekolah.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of LembagaNonSekolah objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array LembagaNonSekolah[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. LembagaNonSekolahPeer::$fieldNames[LembagaNonSekolahPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('LembagaId', 'Nama', 'Singkatan', 'JenisLembagaId', 'AlamatJalan', 'Rt', 'Rw', 'NamaDusun', 'DesaKelurahan', 'KodeWilayah', 'KodePos', 'Lintang', 'Bujur', 'NomorTelepon', 'NomorFax', 'Email', 'Website', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('lembagaId', 'nama', 'singkatan', 'jenisLembagaId', 'alamatJalan', 'rt', 'rw', 'namaDusun', 'desaKelurahan', 'kodeWilayah', 'kodePos', 'lintang', 'bujur', 'nomorTelepon', 'nomorFax', 'email', 'website', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (LembagaNonSekolahPeer::LEMBAGA_ID, LembagaNonSekolahPeer::NAMA, LembagaNonSekolahPeer::SINGKATAN, LembagaNonSekolahPeer::JENIS_LEMBAGA_ID, LembagaNonSekolahPeer::ALAMAT_JALAN, LembagaNonSekolahPeer::RT, LembagaNonSekolahPeer::RW, LembagaNonSekolahPeer::NAMA_DUSUN, LembagaNonSekolahPeer::DESA_KELURAHAN, LembagaNonSekolahPeer::KODE_WILAYAH, LembagaNonSekolahPeer::KODE_POS, LembagaNonSekolahPeer::LINTANG, LembagaNonSekolahPeer::BUJUR, LembagaNonSekolahPeer::NOMOR_TELEPON, LembagaNonSekolahPeer::NOMOR_FAX, LembagaNonSekolahPeer::EMAIL, LembagaNonSekolahPeer::WEBSITE, LembagaNonSekolahPeer::CREATE_DATE, LembagaNonSekolahPeer::LAST_UPDATE, LembagaNonSekolahPeer::SOFT_DELETE, LembagaNonSekolahPeer::LAST_SYNC, LembagaNonSekolahPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('LEMBAGA_ID', 'NAMA', 'SINGKATAN', 'JENIS_LEMBAGA_ID', 'ALAMAT_JALAN', 'RT', 'RW', 'NAMA_DUSUN', 'DESA_KELURAHAN', 'KODE_WILAYAH', 'KODE_POS', 'LINTANG', 'BUJUR', 'NOMOR_TELEPON', 'NOMOR_FAX', 'EMAIL', 'WEBSITE', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('lembaga_id', 'nama', 'singkatan', 'jenis_lembaga_id', 'alamat_jalan', 'rt', 'rw', 'nama_dusun', 'desa_kelurahan', 'kode_wilayah', 'kode_pos', 'lintang', 'bujur', 'nomor_telepon', 'nomor_fax', 'email', 'website', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. LembagaNonSekolahPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('LembagaId' => 0, 'Nama' => 1, 'Singkatan' => 2, 'JenisLembagaId' => 3, 'AlamatJalan' => 4, 'Rt' => 5, 'Rw' => 6, 'NamaDusun' => 7, 'DesaKelurahan' => 8, 'KodeWilayah' => 9, 'KodePos' => 10, 'Lintang' => 11, 'Bujur' => 12, 'NomorTelepon' => 13, 'NomorFax' => 14, 'Email' => 15, 'Website' => 16, 'CreateDate' => 17, 'LastUpdate' => 18, 'SoftDelete' => 19, 'LastSync' => 20, 'UpdaterId' => 21, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('lembagaId' => 0, 'nama' => 1, 'singkatan' => 2, 'jenisLembagaId' => 3, 'alamatJalan' => 4, 'rt' => 5, 'rw' => 6, 'namaDusun' => 7, 'desaKelurahan' => 8, 'kodeWilayah' => 9, 'kodePos' => 10, 'lintang' => 11, 'bujur' => 12, 'nomorTelepon' => 13, 'nomorFax' => 14, 'email' => 15, 'website' => 16, 'createDate' => 17, 'lastUpdate' => 18, 'softDelete' => 19, 'lastSync' => 20, 'updaterId' => 21, ),
        BasePeer::TYPE_COLNAME => array (LembagaNonSekolahPeer::LEMBAGA_ID => 0, LembagaNonSekolahPeer::NAMA => 1, LembagaNonSekolahPeer::SINGKATAN => 2, LembagaNonSekolahPeer::JENIS_LEMBAGA_ID => 3, LembagaNonSekolahPeer::ALAMAT_JALAN => 4, LembagaNonSekolahPeer::RT => 5, LembagaNonSekolahPeer::RW => 6, LembagaNonSekolahPeer::NAMA_DUSUN => 7, LembagaNonSekolahPeer::DESA_KELURAHAN => 8, LembagaNonSekolahPeer::KODE_WILAYAH => 9, LembagaNonSekolahPeer::KODE_POS => 10, LembagaNonSekolahPeer::LINTANG => 11, LembagaNonSekolahPeer::BUJUR => 12, LembagaNonSekolahPeer::NOMOR_TELEPON => 13, LembagaNonSekolahPeer::NOMOR_FAX => 14, LembagaNonSekolahPeer::EMAIL => 15, LembagaNonSekolahPeer::WEBSITE => 16, LembagaNonSekolahPeer::CREATE_DATE => 17, LembagaNonSekolahPeer::LAST_UPDATE => 18, LembagaNonSekolahPeer::SOFT_DELETE => 19, LembagaNonSekolahPeer::LAST_SYNC => 20, LembagaNonSekolahPeer::UPDATER_ID => 21, ),
        BasePeer::TYPE_RAW_COLNAME => array ('LEMBAGA_ID' => 0, 'NAMA' => 1, 'SINGKATAN' => 2, 'JENIS_LEMBAGA_ID' => 3, 'ALAMAT_JALAN' => 4, 'RT' => 5, 'RW' => 6, 'NAMA_DUSUN' => 7, 'DESA_KELURAHAN' => 8, 'KODE_WILAYAH' => 9, 'KODE_POS' => 10, 'LINTANG' => 11, 'BUJUR' => 12, 'NOMOR_TELEPON' => 13, 'NOMOR_FAX' => 14, 'EMAIL' => 15, 'WEBSITE' => 16, 'CREATE_DATE' => 17, 'LAST_UPDATE' => 18, 'SOFT_DELETE' => 19, 'LAST_SYNC' => 20, 'UPDATER_ID' => 21, ),
        BasePeer::TYPE_FIELDNAME => array ('lembaga_id' => 0, 'nama' => 1, 'singkatan' => 2, 'jenis_lembaga_id' => 3, 'alamat_jalan' => 4, 'rt' => 5, 'rw' => 6, 'nama_dusun' => 7, 'desa_kelurahan' => 8, 'kode_wilayah' => 9, 'kode_pos' => 10, 'lintang' => 11, 'bujur' => 12, 'nomor_telepon' => 13, 'nomor_fax' => 14, 'email' => 15, 'website' => 16, 'create_date' => 17, 'last_update' => 18, 'soft_delete' => 19, 'last_sync' => 20, 'updater_id' => 21, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
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
        $toNames = LembagaNonSekolahPeer::getFieldNames($toType);
        $key = isset(LembagaNonSekolahPeer::$fieldKeys[$fromType][$name]) ? LembagaNonSekolahPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(LembagaNonSekolahPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, LembagaNonSekolahPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return LembagaNonSekolahPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. LembagaNonSekolahPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(LembagaNonSekolahPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(LembagaNonSekolahPeer::LEMBAGA_ID);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::NAMA);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::SINGKATAN);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::JENIS_LEMBAGA_ID);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::ALAMAT_JALAN);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::RT);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::RW);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::NAMA_DUSUN);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::DESA_KELURAHAN);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::KODE_WILAYAH);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::KODE_POS);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::LINTANG);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::BUJUR);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::NOMOR_TELEPON);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::NOMOR_FAX);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::EMAIL);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::WEBSITE);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::CREATE_DATE);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::LAST_UPDATE);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::SOFT_DELETE);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::LAST_SYNC);
            $criteria->addSelectColumn(LembagaNonSekolahPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.lembaga_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.singkatan');
            $criteria->addSelectColumn($alias . '.jenis_lembaga_id');
            $criteria->addSelectColumn($alias . '.alamat_jalan');
            $criteria->addSelectColumn($alias . '.rt');
            $criteria->addSelectColumn($alias . '.rw');
            $criteria->addSelectColumn($alias . '.nama_dusun');
            $criteria->addSelectColumn($alias . '.desa_kelurahan');
            $criteria->addSelectColumn($alias . '.kode_wilayah');
            $criteria->addSelectColumn($alias . '.kode_pos');
            $criteria->addSelectColumn($alias . '.lintang');
            $criteria->addSelectColumn($alias . '.bujur');
            $criteria->addSelectColumn($alias . '.nomor_telepon');
            $criteria->addSelectColumn($alias . '.nomor_fax');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.website');
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
        $criteria->setPrimaryTableName(LembagaNonSekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LembagaNonSekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 LembagaNonSekolah
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = LembagaNonSekolahPeer::doSelect($critcopy, $con);
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
        return LembagaNonSekolahPeer::populateObjects(LembagaNonSekolahPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            LembagaNonSekolahPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);

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
     * @param      LembagaNonSekolah $obj A LembagaNonSekolah object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getLembagaId();
            } // if key === null
            LembagaNonSekolahPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A LembagaNonSekolah object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof LembagaNonSekolah) {
                $key = (string) $value->getLembagaId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or LembagaNonSekolah object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(LembagaNonSekolahPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   LembagaNonSekolah Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(LembagaNonSekolahPeer::$instances[$key])) {
                return LembagaNonSekolahPeer::$instances[$key];
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
        foreach (LembagaNonSekolahPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        LembagaNonSekolahPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to lembaga_non_sekolah
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
        $cls = LembagaNonSekolahPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = LembagaNonSekolahPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                LembagaNonSekolahPeer::addInstanceToPool($obj, $key);
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
     * @return array (LembagaNonSekolah object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = LembagaNonSekolahPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = LembagaNonSekolahPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            LembagaNonSekolahPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related MstWilayah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMstWilayah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(LembagaNonSekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LembagaNonSekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(LembagaNonSekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
        $criteria->setPrimaryTableName(LembagaNonSekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LembagaNonSekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(LembagaNonSekolahPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

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
     * Selects a collection of LembagaNonSekolah objects pre-filled with their MstWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of LembagaNonSekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);
        }

        LembagaNonSekolahPeer::addSelectColumns($criteria);
        $startcol = LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;
        MstWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(LembagaNonSekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = LembagaNonSekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = LembagaNonSekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                LembagaNonSekolahPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (LembagaNonSekolah) to $obj2 (MstWilayah)
                $obj2->addLembagaNonSekolah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of LembagaNonSekolah objects pre-filled with their JenisLembaga objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of LembagaNonSekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisLembaga(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);
        }

        LembagaNonSekolahPeer::addSelectColumns($criteria);
        $startcol = LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;
        JenisLembagaPeer::addSelectColumns($criteria);

        $criteria->addJoin(LembagaNonSekolahPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = LembagaNonSekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = LembagaNonSekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                LembagaNonSekolahPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (LembagaNonSekolah) to $obj2 (JenisLembaga)
                $obj2->addLembagaNonSekolah($obj1);

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
        $criteria->setPrimaryTableName(LembagaNonSekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LembagaNonSekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(LembagaNonSekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(LembagaNonSekolahPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

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
     * Selects a collection of LembagaNonSekolah objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of LembagaNonSekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);
        }

        LembagaNonSekolahPeer::addSelectColumns($criteria);
        $startcol2 = LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        JenisLembagaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisLembagaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(LembagaNonSekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $criteria->addJoin(LembagaNonSekolahPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = LembagaNonSekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = LembagaNonSekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                LembagaNonSekolahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined MstWilayah rows

            $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (LembagaNonSekolah) to the collection in $obj2 (MstWilayah)
                $obj2->addLembagaNonSekolah($obj1);
            } // if joined row not null

            // Add objects for joined JenisLembaga rows

            $key3 = JenisLembagaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JenisLembagaPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JenisLembagaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisLembagaPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (LembagaNonSekolah) to the collection in $obj3 (JenisLembaga)
                $obj3->addLembagaNonSekolah($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related MstWilayah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMstWilayah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(LembagaNonSekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LembagaNonSekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(LembagaNonSekolahPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(LembagaNonSekolahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LembagaNonSekolahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(LembagaNonSekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of LembagaNonSekolah objects pre-filled with all related objects except MstWilayah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of LembagaNonSekolah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);
        }

        LembagaNonSekolahPeer::addSelectColumns($criteria);
        $startcol2 = LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisLembagaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisLembagaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(LembagaNonSekolahPeer::JENIS_LEMBAGA_ID, JenisLembagaPeer::JENIS_LEMBAGA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = LembagaNonSekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = LembagaNonSekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                LembagaNonSekolahPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (LembagaNonSekolah) to the collection in $obj2 (JenisLembaga)
                $obj2->addLembagaNonSekolah($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of LembagaNonSekolah objects pre-filled with all related objects except JenisLembaga.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of LembagaNonSekolah objects.
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
            $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);
        }

        LembagaNonSekolahPeer::addSelectColumns($criteria);
        $startcol2 = LembagaNonSekolahPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(LembagaNonSekolahPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = LembagaNonSekolahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = LembagaNonSekolahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = LembagaNonSekolahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                LembagaNonSekolahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined MstWilayah rows

                $key2 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = MstWilayahPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = MstWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MstWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (LembagaNonSekolah) to the collection in $obj2 (MstWilayah)
                $obj2->addLembagaNonSekolah($obj1);

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
        return Propel::getDatabaseMap(LembagaNonSekolahPeer::DATABASE_NAME)->getTable(LembagaNonSekolahPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseLembagaNonSekolahPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseLembagaNonSekolahPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new LembagaNonSekolahTableMap());
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
        return LembagaNonSekolahPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a LembagaNonSekolah or Criteria object.
     *
     * @param      mixed $values Criteria or LembagaNonSekolah object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from LembagaNonSekolah object
        }


        // Set the correct dbName
        $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a LembagaNonSekolah or Criteria object.
     *
     * @param      mixed $values Criteria or LembagaNonSekolah object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(LembagaNonSekolahPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(LembagaNonSekolahPeer::LEMBAGA_ID);
            $value = $criteria->remove(LembagaNonSekolahPeer::LEMBAGA_ID);
            if ($value) {
                $selectCriteria->add(LembagaNonSekolahPeer::LEMBAGA_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(LembagaNonSekolahPeer::TABLE_NAME);
            }

        } else { // $values is LembagaNonSekolah object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the lembaga_non_sekolah table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(LembagaNonSekolahPeer::TABLE_NAME, $con, LembagaNonSekolahPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LembagaNonSekolahPeer::clearInstancePool();
            LembagaNonSekolahPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a LembagaNonSekolah or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or LembagaNonSekolah object or primary key or array of primary keys
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
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            LembagaNonSekolahPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof LembagaNonSekolah) { // it's a model object
            // invalidate the cache for this single object
            LembagaNonSekolahPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(LembagaNonSekolahPeer::DATABASE_NAME);
            $criteria->add(LembagaNonSekolahPeer::LEMBAGA_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                LembagaNonSekolahPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(LembagaNonSekolahPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            LembagaNonSekolahPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given LembagaNonSekolah object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      LembagaNonSekolah $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(LembagaNonSekolahPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(LembagaNonSekolahPeer::TABLE_NAME);

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

        return BasePeer::doValidate(LembagaNonSekolahPeer::DATABASE_NAME, LembagaNonSekolahPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return LembagaNonSekolah
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = LembagaNonSekolahPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(LembagaNonSekolahPeer::DATABASE_NAME);
        $criteria->add(LembagaNonSekolahPeer::LEMBAGA_ID, $pk);

        $v = LembagaNonSekolahPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return LembagaNonSekolah[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(LembagaNonSekolahPeer::DATABASE_NAME);
            $criteria->add(LembagaNonSekolahPeer::LEMBAGA_ID, $pks, Criteria::IN);
            $objs = LembagaNonSekolahPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseLembagaNonSekolahPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseLembagaNonSekolahPeer::buildTableMap();

