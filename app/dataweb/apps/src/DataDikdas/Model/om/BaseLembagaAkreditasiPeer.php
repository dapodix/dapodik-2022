<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\LembagaAkreditasi;
use DataDikdas\Model\LembagaAkreditasiPeer;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\map\LembagaAkreditasiTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.lembaga_akreditasi' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseLembagaAkreditasiPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.lembaga_akreditasi';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\LembagaAkreditasi';

    /** the related TableMap class for this table */
    const TM_CLASS = 'LembagaAkreditasiTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 21;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 21;

    /** the column name for the la_id field */
    const LA_ID = 'ref.lembaga_akreditasi.la_id';

    /** the column name for the nama field */
    const NAMA = 'ref.lembaga_akreditasi.nama';

    /** the column name for the la_tgl_mulai field */
    const LA_TGL_MULAI = 'ref.lembaga_akreditasi.la_tgl_mulai';

    /** the column name for the la_ket field */
    const LA_KET = 'ref.lembaga_akreditasi.la_ket';

    /** the column name for the alamat_jalan field */
    const ALAMAT_JALAN = 'ref.lembaga_akreditasi.alamat_jalan';

    /** the column name for the rt field */
    const RT = 'ref.lembaga_akreditasi.rt';

    /** the column name for the rw field */
    const RW = 'ref.lembaga_akreditasi.rw';

    /** the column name for the nama_dusun field */
    const NAMA_DUSUN = 'ref.lembaga_akreditasi.nama_dusun';

    /** the column name for the desa_kelurahan field */
    const DESA_KELURAHAN = 'ref.lembaga_akreditasi.desa_kelurahan';

    /** the column name for the kode_wilayah field */
    const KODE_WILAYAH = 'ref.lembaga_akreditasi.kode_wilayah';

    /** the column name for the kode_pos field */
    const KODE_POS = 'ref.lembaga_akreditasi.kode_pos';

    /** the column name for the lintang field */
    const LINTANG = 'ref.lembaga_akreditasi.lintang';

    /** the column name for the bujur field */
    const BUJUR = 'ref.lembaga_akreditasi.bujur';

    /** the column name for the nomor_telepon field */
    const NOMOR_TELEPON = 'ref.lembaga_akreditasi.nomor_telepon';

    /** the column name for the nomor_fax field */
    const NOMOR_FAX = 'ref.lembaga_akreditasi.nomor_fax';

    /** the column name for the email field */
    const EMAIL = 'ref.lembaga_akreditasi.email';

    /** the column name for the website field */
    const WEBSITE = 'ref.lembaga_akreditasi.website';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.lembaga_akreditasi.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.lembaga_akreditasi.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.lembaga_akreditasi.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.lembaga_akreditasi.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of LembagaAkreditasi objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array LembagaAkreditasi[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. LembagaAkreditasiPeer::$fieldNames[LembagaAkreditasiPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('LaId', 'Nama', 'LaTglMulai', 'LaKet', 'AlamatJalan', 'Rt', 'Rw', 'NamaDusun', 'DesaKelurahan', 'KodeWilayah', 'KodePos', 'Lintang', 'Bujur', 'NomorTelepon', 'NomorFax', 'Email', 'Website', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('laId', 'nama', 'laTglMulai', 'laKet', 'alamatJalan', 'rt', 'rw', 'namaDusun', 'desaKelurahan', 'kodeWilayah', 'kodePos', 'lintang', 'bujur', 'nomorTelepon', 'nomorFax', 'email', 'website', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (LembagaAkreditasiPeer::LA_ID, LembagaAkreditasiPeer::NAMA, LembagaAkreditasiPeer::LA_TGL_MULAI, LembagaAkreditasiPeer::LA_KET, LembagaAkreditasiPeer::ALAMAT_JALAN, LembagaAkreditasiPeer::RT, LembagaAkreditasiPeer::RW, LembagaAkreditasiPeer::NAMA_DUSUN, LembagaAkreditasiPeer::DESA_KELURAHAN, LembagaAkreditasiPeer::KODE_WILAYAH, LembagaAkreditasiPeer::KODE_POS, LembagaAkreditasiPeer::LINTANG, LembagaAkreditasiPeer::BUJUR, LembagaAkreditasiPeer::NOMOR_TELEPON, LembagaAkreditasiPeer::NOMOR_FAX, LembagaAkreditasiPeer::EMAIL, LembagaAkreditasiPeer::WEBSITE, LembagaAkreditasiPeer::CREATE_DATE, LembagaAkreditasiPeer::LAST_UPDATE, LembagaAkreditasiPeer::EXPIRED_DATE, LembagaAkreditasiPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('LA_ID', 'NAMA', 'LA_TGL_MULAI', 'LA_KET', 'ALAMAT_JALAN', 'RT', 'RW', 'NAMA_DUSUN', 'DESA_KELURAHAN', 'KODE_WILAYAH', 'KODE_POS', 'LINTANG', 'BUJUR', 'NOMOR_TELEPON', 'NOMOR_FAX', 'EMAIL', 'WEBSITE', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('la_id', 'nama', 'la_tgl_mulai', 'la_ket', 'alamat_jalan', 'rt', 'rw', 'nama_dusun', 'desa_kelurahan', 'kode_wilayah', 'kode_pos', 'lintang', 'bujur', 'nomor_telepon', 'nomor_fax', 'email', 'website', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. LembagaAkreditasiPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('LaId' => 0, 'Nama' => 1, 'LaTglMulai' => 2, 'LaKet' => 3, 'AlamatJalan' => 4, 'Rt' => 5, 'Rw' => 6, 'NamaDusun' => 7, 'DesaKelurahan' => 8, 'KodeWilayah' => 9, 'KodePos' => 10, 'Lintang' => 11, 'Bujur' => 12, 'NomorTelepon' => 13, 'NomorFax' => 14, 'Email' => 15, 'Website' => 16, 'CreateDate' => 17, 'LastUpdate' => 18, 'ExpiredDate' => 19, 'LastSync' => 20, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('laId' => 0, 'nama' => 1, 'laTglMulai' => 2, 'laKet' => 3, 'alamatJalan' => 4, 'rt' => 5, 'rw' => 6, 'namaDusun' => 7, 'desaKelurahan' => 8, 'kodeWilayah' => 9, 'kodePos' => 10, 'lintang' => 11, 'bujur' => 12, 'nomorTelepon' => 13, 'nomorFax' => 14, 'email' => 15, 'website' => 16, 'createDate' => 17, 'lastUpdate' => 18, 'expiredDate' => 19, 'lastSync' => 20, ),
        BasePeer::TYPE_COLNAME => array (LembagaAkreditasiPeer::LA_ID => 0, LembagaAkreditasiPeer::NAMA => 1, LembagaAkreditasiPeer::LA_TGL_MULAI => 2, LembagaAkreditasiPeer::LA_KET => 3, LembagaAkreditasiPeer::ALAMAT_JALAN => 4, LembagaAkreditasiPeer::RT => 5, LembagaAkreditasiPeer::RW => 6, LembagaAkreditasiPeer::NAMA_DUSUN => 7, LembagaAkreditasiPeer::DESA_KELURAHAN => 8, LembagaAkreditasiPeer::KODE_WILAYAH => 9, LembagaAkreditasiPeer::KODE_POS => 10, LembagaAkreditasiPeer::LINTANG => 11, LembagaAkreditasiPeer::BUJUR => 12, LembagaAkreditasiPeer::NOMOR_TELEPON => 13, LembagaAkreditasiPeer::NOMOR_FAX => 14, LembagaAkreditasiPeer::EMAIL => 15, LembagaAkreditasiPeer::WEBSITE => 16, LembagaAkreditasiPeer::CREATE_DATE => 17, LembagaAkreditasiPeer::LAST_UPDATE => 18, LembagaAkreditasiPeer::EXPIRED_DATE => 19, LembagaAkreditasiPeer::LAST_SYNC => 20, ),
        BasePeer::TYPE_RAW_COLNAME => array ('LA_ID' => 0, 'NAMA' => 1, 'LA_TGL_MULAI' => 2, 'LA_KET' => 3, 'ALAMAT_JALAN' => 4, 'RT' => 5, 'RW' => 6, 'NAMA_DUSUN' => 7, 'DESA_KELURAHAN' => 8, 'KODE_WILAYAH' => 9, 'KODE_POS' => 10, 'LINTANG' => 11, 'BUJUR' => 12, 'NOMOR_TELEPON' => 13, 'NOMOR_FAX' => 14, 'EMAIL' => 15, 'WEBSITE' => 16, 'CREATE_DATE' => 17, 'LAST_UPDATE' => 18, 'EXPIRED_DATE' => 19, 'LAST_SYNC' => 20, ),
        BasePeer::TYPE_FIELDNAME => array ('la_id' => 0, 'nama' => 1, 'la_tgl_mulai' => 2, 'la_ket' => 3, 'alamat_jalan' => 4, 'rt' => 5, 'rw' => 6, 'nama_dusun' => 7, 'desa_kelurahan' => 8, 'kode_wilayah' => 9, 'kode_pos' => 10, 'lintang' => 11, 'bujur' => 12, 'nomor_telepon' => 13, 'nomor_fax' => 14, 'email' => 15, 'website' => 16, 'create_date' => 17, 'last_update' => 18, 'expired_date' => 19, 'last_sync' => 20, ),
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
        $toNames = LembagaAkreditasiPeer::getFieldNames($toType);
        $key = isset(LembagaAkreditasiPeer::$fieldKeys[$fromType][$name]) ? LembagaAkreditasiPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(LembagaAkreditasiPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, LembagaAkreditasiPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return LembagaAkreditasiPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. LembagaAkreditasiPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(LembagaAkreditasiPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(LembagaAkreditasiPeer::LA_ID);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::NAMA);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::LA_TGL_MULAI);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::LA_KET);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::ALAMAT_JALAN);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::RT);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::RW);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::NAMA_DUSUN);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::DESA_KELURAHAN);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::KODE_WILAYAH);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::KODE_POS);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::LINTANG);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::BUJUR);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::NOMOR_TELEPON);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::NOMOR_FAX);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::EMAIL);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::WEBSITE);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::CREATE_DATE);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::LAST_UPDATE);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(LembagaAkreditasiPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.la_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.la_tgl_mulai');
            $criteria->addSelectColumn($alias . '.la_ket');
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
        $criteria->setPrimaryTableName(LembagaAkreditasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LembagaAkreditasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(LembagaAkreditasiPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(LembagaAkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 LembagaAkreditasi
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = LembagaAkreditasiPeer::doSelect($critcopy, $con);
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
        return LembagaAkreditasiPeer::populateObjects(LembagaAkreditasiPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(LembagaAkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            LembagaAkreditasiPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(LembagaAkreditasiPeer::DATABASE_NAME);

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
     * @param      LembagaAkreditasi $obj A LembagaAkreditasi object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getLaId();
            } // if key === null
            LembagaAkreditasiPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A LembagaAkreditasi object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof LembagaAkreditasi) {
                $key = (string) $value->getLaId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or LembagaAkreditasi object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(LembagaAkreditasiPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   LembagaAkreditasi Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(LembagaAkreditasiPeer::$instances[$key])) {
                return LembagaAkreditasiPeer::$instances[$key];
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
        foreach (LembagaAkreditasiPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        LembagaAkreditasiPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.lembaga_akreditasi
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
        $cls = LembagaAkreditasiPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = LembagaAkreditasiPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                LembagaAkreditasiPeer::addInstanceToPool($obj, $key);
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
     * @return array (LembagaAkreditasi object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = LembagaAkreditasiPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = LembagaAkreditasiPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            LembagaAkreditasiPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(LembagaAkreditasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LembagaAkreditasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(LembagaAkreditasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(LembagaAkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(LembagaAkreditasiPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of LembagaAkreditasi objects pre-filled with their MstWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of LembagaAkreditasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(LembagaAkreditasiPeer::DATABASE_NAME);
        }

        LembagaAkreditasiPeer::addSelectColumns($criteria);
        $startcol = LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;
        MstWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(LembagaAkreditasiPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = LembagaAkreditasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = LembagaAkreditasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                LembagaAkreditasiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (LembagaAkreditasi) to $obj2 (MstWilayah)
                $obj2->addLembagaAkreditasi($obj1);

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
        $criteria->setPrimaryTableName(LembagaAkreditasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LembagaAkreditasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(LembagaAkreditasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(LembagaAkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(LembagaAkreditasiPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of LembagaAkreditasi objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of LembagaAkreditasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(LembagaAkreditasiPeer::DATABASE_NAME);
        }

        LembagaAkreditasiPeer::addSelectColumns($criteria);
        $startcol2 = LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(LembagaAkreditasiPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = LembagaAkreditasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = LembagaAkreditasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                LembagaAkreditasiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (LembagaAkreditasi) to the collection in $obj2 (MstWilayah)
                $obj2->addLembagaAkreditasi($obj1);
            } // if joined row not null

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
        return Propel::getDatabaseMap(LembagaAkreditasiPeer::DATABASE_NAME)->getTable(LembagaAkreditasiPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseLembagaAkreditasiPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseLembagaAkreditasiPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new LembagaAkreditasiTableMap());
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
        return LembagaAkreditasiPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a LembagaAkreditasi or Criteria object.
     *
     * @param      mixed $values Criteria or LembagaAkreditasi object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LembagaAkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from LembagaAkreditasi object
        }


        // Set the correct dbName
        $criteria->setDbName(LembagaAkreditasiPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a LembagaAkreditasi or Criteria object.
     *
     * @param      mixed $values Criteria or LembagaAkreditasi object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LembagaAkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(LembagaAkreditasiPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(LembagaAkreditasiPeer::LA_ID);
            $value = $criteria->remove(LembagaAkreditasiPeer::LA_ID);
            if ($value) {
                $selectCriteria->add(LembagaAkreditasiPeer::LA_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(LembagaAkreditasiPeer::TABLE_NAME);
            }

        } else { // $values is LembagaAkreditasi object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(LembagaAkreditasiPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.lembaga_akreditasi table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LembagaAkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(LembagaAkreditasiPeer::TABLE_NAME, $con, LembagaAkreditasiPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LembagaAkreditasiPeer::clearInstancePool();
            LembagaAkreditasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a LembagaAkreditasi or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or LembagaAkreditasi object or primary key or array of primary keys
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
            $con = Propel::getConnection(LembagaAkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            LembagaAkreditasiPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof LembagaAkreditasi) { // it's a model object
            // invalidate the cache for this single object
            LembagaAkreditasiPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(LembagaAkreditasiPeer::DATABASE_NAME);
            $criteria->add(LembagaAkreditasiPeer::LA_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                LembagaAkreditasiPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(LembagaAkreditasiPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            LembagaAkreditasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given LembagaAkreditasi object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      LembagaAkreditasi $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(LembagaAkreditasiPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(LembagaAkreditasiPeer::TABLE_NAME);

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

        return BasePeer::doValidate(LembagaAkreditasiPeer::DATABASE_NAME, LembagaAkreditasiPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return LembagaAkreditasi
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = LembagaAkreditasiPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(LembagaAkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(LembagaAkreditasiPeer::DATABASE_NAME);
        $criteria->add(LembagaAkreditasiPeer::LA_ID, $pk);

        $v = LembagaAkreditasiPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return LembagaAkreditasi[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LembagaAkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(LembagaAkreditasiPeer::DATABASE_NAME);
            $criteria->add(LembagaAkreditasiPeer::LA_ID, $pks, Criteria::IN);
            $objs = LembagaAkreditasiPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseLembagaAkreditasiPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseLembagaAkreditasiPeer::buildTableMap();

