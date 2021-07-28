<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\LembSertifikasi;
use DataDikdas\Model\LembSertifikasiPeer;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\map\LembSertifikasiTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.lemb_sertifikasi' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseLembSertifikasiPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.lemb_sertifikasi';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\LembSertifikasi';

    /** the related TableMap class for this table */
    const TM_CLASS = 'LembSertifikasiTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 22;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 22;

    /** the column name for the kode_lemb_sert field */
    const KODE_LEMB_SERT = 'ref.lemb_sertifikasi.kode_lemb_sert';

    /** the column name for the nm_lemb_sert field */
    const NM_LEMB_SERT = 'ref.lemb_sertifikasi.nm_lemb_sert';

    /** the column name for the tmt_lemb_sert field */
    const TMT_LEMB_SERT = 'ref.lemb_sertifikasi.tmt_lemb_sert';

    /** the column name for the ket_lemb_sert field */
    const KET_LEMB_SERT = 'ref.lemb_sertifikasi.ket_lemb_sert';

    /** the column name for the alamat_jalan field */
    const ALAMAT_JALAN = 'ref.lemb_sertifikasi.alamat_jalan';

    /** the column name for the rt field */
    const RT = 'ref.lemb_sertifikasi.rt';

    /** the column name for the rw field */
    const RW = 'ref.lemb_sertifikasi.rw';

    /** the column name for the nama_dusun field */
    const NAMA_DUSUN = 'ref.lemb_sertifikasi.nama_dusun';

    /** the column name for the desa_kelurahan field */
    const DESA_KELURAHAN = 'ref.lemb_sertifikasi.desa_kelurahan';

    /** the column name for the kode_wilayah field */
    const KODE_WILAYAH = 'ref.lemb_sertifikasi.kode_wilayah';

    /** the column name for the kode_pos field */
    const KODE_POS = 'ref.lemb_sertifikasi.kode_pos';

    /** the column name for the lintang field */
    const LINTANG = 'ref.lemb_sertifikasi.lintang';

    /** the column name for the bujur field */
    const BUJUR = 'ref.lemb_sertifikasi.bujur';

    /** the column name for the nama field */
    const NAMA = 'ref.lemb_sertifikasi.nama';

    /** the column name for the nomor_telepon field */
    const NOMOR_TELEPON = 'ref.lemb_sertifikasi.nomor_telepon';

    /** the column name for the nomor_fax field */
    const NOMOR_FAX = 'ref.lemb_sertifikasi.nomor_fax';

    /** the column name for the email field */
    const EMAIL = 'ref.lemb_sertifikasi.email';

    /** the column name for the website field */
    const WEBSITE = 'ref.lemb_sertifikasi.website';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.lemb_sertifikasi.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.lemb_sertifikasi.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.lemb_sertifikasi.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.lemb_sertifikasi.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of LembSertifikasi objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array LembSertifikasi[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. LembSertifikasiPeer::$fieldNames[LembSertifikasiPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('KodeLembSert', 'NmLembSert', 'TmtLembSert', 'KetLembSert', 'AlamatJalan', 'Rt', 'Rw', 'NamaDusun', 'DesaKelurahan', 'KodeWilayah', 'KodePos', 'Lintang', 'Bujur', 'Nama', 'NomorTelepon', 'NomorFax', 'Email', 'Website', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('kodeLembSert', 'nmLembSert', 'tmtLembSert', 'ketLembSert', 'alamatJalan', 'rt', 'rw', 'namaDusun', 'desaKelurahan', 'kodeWilayah', 'kodePos', 'lintang', 'bujur', 'nama', 'nomorTelepon', 'nomorFax', 'email', 'website', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (LembSertifikasiPeer::KODE_LEMB_SERT, LembSertifikasiPeer::NM_LEMB_SERT, LembSertifikasiPeer::TMT_LEMB_SERT, LembSertifikasiPeer::KET_LEMB_SERT, LembSertifikasiPeer::ALAMAT_JALAN, LembSertifikasiPeer::RT, LembSertifikasiPeer::RW, LembSertifikasiPeer::NAMA_DUSUN, LembSertifikasiPeer::DESA_KELURAHAN, LembSertifikasiPeer::KODE_WILAYAH, LembSertifikasiPeer::KODE_POS, LembSertifikasiPeer::LINTANG, LembSertifikasiPeer::BUJUR, LembSertifikasiPeer::NAMA, LembSertifikasiPeer::NOMOR_TELEPON, LembSertifikasiPeer::NOMOR_FAX, LembSertifikasiPeer::EMAIL, LembSertifikasiPeer::WEBSITE, LembSertifikasiPeer::CREATE_DATE, LembSertifikasiPeer::LAST_UPDATE, LembSertifikasiPeer::EXPIRED_DATE, LembSertifikasiPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('KODE_LEMB_SERT', 'NM_LEMB_SERT', 'TMT_LEMB_SERT', 'KET_LEMB_SERT', 'ALAMAT_JALAN', 'RT', 'RW', 'NAMA_DUSUN', 'DESA_KELURAHAN', 'KODE_WILAYAH', 'KODE_POS', 'LINTANG', 'BUJUR', 'NAMA', 'NOMOR_TELEPON', 'NOMOR_FAX', 'EMAIL', 'WEBSITE', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('kode_lemb_sert', 'nm_lemb_sert', 'tmt_lemb_sert', 'ket_lemb_sert', 'alamat_jalan', 'rt', 'rw', 'nama_dusun', 'desa_kelurahan', 'kode_wilayah', 'kode_pos', 'lintang', 'bujur', 'nama', 'nomor_telepon', 'nomor_fax', 'email', 'website', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. LembSertifikasiPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('KodeLembSert' => 0, 'NmLembSert' => 1, 'TmtLembSert' => 2, 'KetLembSert' => 3, 'AlamatJalan' => 4, 'Rt' => 5, 'Rw' => 6, 'NamaDusun' => 7, 'DesaKelurahan' => 8, 'KodeWilayah' => 9, 'KodePos' => 10, 'Lintang' => 11, 'Bujur' => 12, 'Nama' => 13, 'NomorTelepon' => 14, 'NomorFax' => 15, 'Email' => 16, 'Website' => 17, 'CreateDate' => 18, 'LastUpdate' => 19, 'ExpiredDate' => 20, 'LastSync' => 21, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('kodeLembSert' => 0, 'nmLembSert' => 1, 'tmtLembSert' => 2, 'ketLembSert' => 3, 'alamatJalan' => 4, 'rt' => 5, 'rw' => 6, 'namaDusun' => 7, 'desaKelurahan' => 8, 'kodeWilayah' => 9, 'kodePos' => 10, 'lintang' => 11, 'bujur' => 12, 'nama' => 13, 'nomorTelepon' => 14, 'nomorFax' => 15, 'email' => 16, 'website' => 17, 'createDate' => 18, 'lastUpdate' => 19, 'expiredDate' => 20, 'lastSync' => 21, ),
        BasePeer::TYPE_COLNAME => array (LembSertifikasiPeer::KODE_LEMB_SERT => 0, LembSertifikasiPeer::NM_LEMB_SERT => 1, LembSertifikasiPeer::TMT_LEMB_SERT => 2, LembSertifikasiPeer::KET_LEMB_SERT => 3, LembSertifikasiPeer::ALAMAT_JALAN => 4, LembSertifikasiPeer::RT => 5, LembSertifikasiPeer::RW => 6, LembSertifikasiPeer::NAMA_DUSUN => 7, LembSertifikasiPeer::DESA_KELURAHAN => 8, LembSertifikasiPeer::KODE_WILAYAH => 9, LembSertifikasiPeer::KODE_POS => 10, LembSertifikasiPeer::LINTANG => 11, LembSertifikasiPeer::BUJUR => 12, LembSertifikasiPeer::NAMA => 13, LembSertifikasiPeer::NOMOR_TELEPON => 14, LembSertifikasiPeer::NOMOR_FAX => 15, LembSertifikasiPeer::EMAIL => 16, LembSertifikasiPeer::WEBSITE => 17, LembSertifikasiPeer::CREATE_DATE => 18, LembSertifikasiPeer::LAST_UPDATE => 19, LembSertifikasiPeer::EXPIRED_DATE => 20, LembSertifikasiPeer::LAST_SYNC => 21, ),
        BasePeer::TYPE_RAW_COLNAME => array ('KODE_LEMB_SERT' => 0, 'NM_LEMB_SERT' => 1, 'TMT_LEMB_SERT' => 2, 'KET_LEMB_SERT' => 3, 'ALAMAT_JALAN' => 4, 'RT' => 5, 'RW' => 6, 'NAMA_DUSUN' => 7, 'DESA_KELURAHAN' => 8, 'KODE_WILAYAH' => 9, 'KODE_POS' => 10, 'LINTANG' => 11, 'BUJUR' => 12, 'NAMA' => 13, 'NOMOR_TELEPON' => 14, 'NOMOR_FAX' => 15, 'EMAIL' => 16, 'WEBSITE' => 17, 'CREATE_DATE' => 18, 'LAST_UPDATE' => 19, 'EXPIRED_DATE' => 20, 'LAST_SYNC' => 21, ),
        BasePeer::TYPE_FIELDNAME => array ('kode_lemb_sert' => 0, 'nm_lemb_sert' => 1, 'tmt_lemb_sert' => 2, 'ket_lemb_sert' => 3, 'alamat_jalan' => 4, 'rt' => 5, 'rw' => 6, 'nama_dusun' => 7, 'desa_kelurahan' => 8, 'kode_wilayah' => 9, 'kode_pos' => 10, 'lintang' => 11, 'bujur' => 12, 'nama' => 13, 'nomor_telepon' => 14, 'nomor_fax' => 15, 'email' => 16, 'website' => 17, 'create_date' => 18, 'last_update' => 19, 'expired_date' => 20, 'last_sync' => 21, ),
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
        $toNames = LembSertifikasiPeer::getFieldNames($toType);
        $key = isset(LembSertifikasiPeer::$fieldKeys[$fromType][$name]) ? LembSertifikasiPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(LembSertifikasiPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, LembSertifikasiPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return LembSertifikasiPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. LembSertifikasiPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(LembSertifikasiPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(LembSertifikasiPeer::KODE_LEMB_SERT);
            $criteria->addSelectColumn(LembSertifikasiPeer::NM_LEMB_SERT);
            $criteria->addSelectColumn(LembSertifikasiPeer::TMT_LEMB_SERT);
            $criteria->addSelectColumn(LembSertifikasiPeer::KET_LEMB_SERT);
            $criteria->addSelectColumn(LembSertifikasiPeer::ALAMAT_JALAN);
            $criteria->addSelectColumn(LembSertifikasiPeer::RT);
            $criteria->addSelectColumn(LembSertifikasiPeer::RW);
            $criteria->addSelectColumn(LembSertifikasiPeer::NAMA_DUSUN);
            $criteria->addSelectColumn(LembSertifikasiPeer::DESA_KELURAHAN);
            $criteria->addSelectColumn(LembSertifikasiPeer::KODE_WILAYAH);
            $criteria->addSelectColumn(LembSertifikasiPeer::KODE_POS);
            $criteria->addSelectColumn(LembSertifikasiPeer::LINTANG);
            $criteria->addSelectColumn(LembSertifikasiPeer::BUJUR);
            $criteria->addSelectColumn(LembSertifikasiPeer::NAMA);
            $criteria->addSelectColumn(LembSertifikasiPeer::NOMOR_TELEPON);
            $criteria->addSelectColumn(LembSertifikasiPeer::NOMOR_FAX);
            $criteria->addSelectColumn(LembSertifikasiPeer::EMAIL);
            $criteria->addSelectColumn(LembSertifikasiPeer::WEBSITE);
            $criteria->addSelectColumn(LembSertifikasiPeer::CREATE_DATE);
            $criteria->addSelectColumn(LembSertifikasiPeer::LAST_UPDATE);
            $criteria->addSelectColumn(LembSertifikasiPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(LembSertifikasiPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.kode_lemb_sert');
            $criteria->addSelectColumn($alias . '.nm_lemb_sert');
            $criteria->addSelectColumn($alias . '.tmt_lemb_sert');
            $criteria->addSelectColumn($alias . '.ket_lemb_sert');
            $criteria->addSelectColumn($alias . '.alamat_jalan');
            $criteria->addSelectColumn($alias . '.rt');
            $criteria->addSelectColumn($alias . '.rw');
            $criteria->addSelectColumn($alias . '.nama_dusun');
            $criteria->addSelectColumn($alias . '.desa_kelurahan');
            $criteria->addSelectColumn($alias . '.kode_wilayah');
            $criteria->addSelectColumn($alias . '.kode_pos');
            $criteria->addSelectColumn($alias . '.lintang');
            $criteria->addSelectColumn($alias . '.bujur');
            $criteria->addSelectColumn($alias . '.nama');
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
        $criteria->setPrimaryTableName(LembSertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LembSertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(LembSertifikasiPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 LembSertifikasi
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = LembSertifikasiPeer::doSelect($critcopy, $con);
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
        return LembSertifikasiPeer::populateObjects(LembSertifikasiPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            LembSertifikasiPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(LembSertifikasiPeer::DATABASE_NAME);

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
     * @param      LembSertifikasi $obj A LembSertifikasi object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getKodeLembSert();
            } // if key === null
            LembSertifikasiPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A LembSertifikasi object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof LembSertifikasi) {
                $key = (string) $value->getKodeLembSert();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or LembSertifikasi object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(LembSertifikasiPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   LembSertifikasi Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(LembSertifikasiPeer::$instances[$key])) {
                return LembSertifikasiPeer::$instances[$key];
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
        foreach (LembSertifikasiPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        LembSertifikasiPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.lemb_sertifikasi
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
        $cls = LembSertifikasiPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = LembSertifikasiPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                LembSertifikasiPeer::addInstanceToPool($obj, $key);
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
     * @return array (LembSertifikasi object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = LembSertifikasiPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = LembSertifikasiPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            LembSertifikasiPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(LembSertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LembSertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(LembSertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(LembSertifikasiPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of LembSertifikasi objects pre-filled with their MstWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of LembSertifikasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(LembSertifikasiPeer::DATABASE_NAME);
        }

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol = LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;
        MstWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(LembSertifikasiPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = LembSertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = LembSertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                LembSertifikasiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (LembSertifikasi) to $obj2 (MstWilayah)
                $obj2->addLembSertifikasi($obj1);

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
        $criteria->setPrimaryTableName(LembSertifikasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            LembSertifikasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(LembSertifikasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(LembSertifikasiPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of LembSertifikasi objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of LembSertifikasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(LembSertifikasiPeer::DATABASE_NAME);
        }

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol2 = LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(LembSertifikasiPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = LembSertifikasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = LembSertifikasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                LembSertifikasiPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (LembSertifikasi) to the collection in $obj2 (MstWilayah)
                $obj2->addLembSertifikasi($obj1);
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
        return Propel::getDatabaseMap(LembSertifikasiPeer::DATABASE_NAME)->getTable(LembSertifikasiPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseLembSertifikasiPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseLembSertifikasiPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new LembSertifikasiTableMap());
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
        return LembSertifikasiPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a LembSertifikasi or Criteria object.
     *
     * @param      mixed $values Criteria or LembSertifikasi object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from LembSertifikasi object
        }


        // Set the correct dbName
        $criteria->setDbName(LembSertifikasiPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a LembSertifikasi or Criteria object.
     *
     * @param      mixed $values Criteria or LembSertifikasi object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(LembSertifikasiPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(LembSertifikasiPeer::KODE_LEMB_SERT);
            $value = $criteria->remove(LembSertifikasiPeer::KODE_LEMB_SERT);
            if ($value) {
                $selectCriteria->add(LembSertifikasiPeer::KODE_LEMB_SERT, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(LembSertifikasiPeer::TABLE_NAME);
            }

        } else { // $values is LembSertifikasi object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(LembSertifikasiPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.lemb_sertifikasi table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(LembSertifikasiPeer::TABLE_NAME, $con, LembSertifikasiPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LembSertifikasiPeer::clearInstancePool();
            LembSertifikasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a LembSertifikasi or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or LembSertifikasi object or primary key or array of primary keys
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
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            LembSertifikasiPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof LembSertifikasi) { // it's a model object
            // invalidate the cache for this single object
            LembSertifikasiPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(LembSertifikasiPeer::DATABASE_NAME);
            $criteria->add(LembSertifikasiPeer::KODE_LEMB_SERT, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                LembSertifikasiPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(LembSertifikasiPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            LembSertifikasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given LembSertifikasi object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      LembSertifikasi $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(LembSertifikasiPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(LembSertifikasiPeer::TABLE_NAME);

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

        return BasePeer::doValidate(LembSertifikasiPeer::DATABASE_NAME, LembSertifikasiPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return LembSertifikasi
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = LembSertifikasiPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(LembSertifikasiPeer::DATABASE_NAME);
        $criteria->add(LembSertifikasiPeer::KODE_LEMB_SERT, $pk);

        $v = LembSertifikasiPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return LembSertifikasi[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(LembSertifikasiPeer::DATABASE_NAME);
            $criteria->add(LembSertifikasiPeer::KODE_LEMB_SERT, $pks, Criteria::IN);
            $objs = LembSertifikasiPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseLembSertifikasiPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseLembSertifikasiPeer::buildTableMap();

