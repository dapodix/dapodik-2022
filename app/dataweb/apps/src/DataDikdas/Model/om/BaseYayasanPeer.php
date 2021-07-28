<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\Yayasan;
use DataDikdas\Model\YayasanPeer;
use DataDikdas\Model\map\YayasanTableMap;

/**
 * Base static class for performing query and update operations on the 'yayasan' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseYayasanPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'yayasan';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Yayasan';

    /** the related TableMap class for this table */
    const TM_CLASS = 'YayasanTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 27;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 27;

    /** the column name for the yayasan_id field */
    const YAYASAN_ID = 'yayasan.yayasan_id';

    /** the column name for the nama field */
    const NAMA = 'yayasan.nama';

    /** the column name for the alamat_jalan field */
    const ALAMAT_JALAN = 'yayasan.alamat_jalan';

    /** the column name for the rt field */
    const RT = 'yayasan.rt';

    /** the column name for the rw field */
    const RW = 'yayasan.rw';

    /** the column name for the nama_dusun field */
    const NAMA_DUSUN = 'yayasan.nama_dusun';

    /** the column name for the desa_kelurahan field */
    const DESA_KELURAHAN = 'yayasan.desa_kelurahan';

    /** the column name for the kode_wilayah field */
    const KODE_WILAYAH = 'yayasan.kode_wilayah';

    /** the column name for the kode_pos field */
    const KODE_POS = 'yayasan.kode_pos';

    /** the column name for the lintang field */
    const LINTANG = 'yayasan.lintang';

    /** the column name for the bujur field */
    const BUJUR = 'yayasan.bujur';

    /** the column name for the nomor_telepon field */
    const NOMOR_TELEPON = 'yayasan.nomor_telepon';

    /** the column name for the nomor_fax field */
    const NOMOR_FAX = 'yayasan.nomor_fax';

    /** the column name for the email field */
    const EMAIL = 'yayasan.email';

    /** the column name for the website field */
    const WEBSITE = 'yayasan.website';

    /** the column name for the npyp field */
    const NPYP = 'yayasan.npyp';

    /** the column name for the nama_pimpinan_yayasan field */
    const NAMA_PIMPINAN_YAYASAN = 'yayasan.nama_pimpinan_yayasan';

    /** the column name for the no_pendirian_yayasan field */
    const NO_PENDIRIAN_YAYASAN = 'yayasan.no_pendirian_yayasan';

    /** the column name for the tanggal_pendirian_yayasan field */
    const TANGGAL_PENDIRIAN_YAYASAN = 'yayasan.tanggal_pendirian_yayasan';

    /** the column name for the nomor_pengesahan_pn_ln field */
    const NOMOR_PENGESAHAN_PN_LN = 'yayasan.nomor_pengesahan_pn_ln';

    /** the column name for the nomor_sk_bn field */
    const NOMOR_SK_BN = 'yayasan.nomor_sk_bn';

    /** the column name for the tanggal_sk_bn field */
    const TANGGAL_SK_BN = 'yayasan.tanggal_sk_bn';

    /** the column name for the create_date field */
    const CREATE_DATE = 'yayasan.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'yayasan.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'yayasan.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'yayasan.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'yayasan.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Yayasan objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Yayasan[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. YayasanPeer::$fieldNames[YayasanPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('YayasanId', 'Nama', 'AlamatJalan', 'Rt', 'Rw', 'NamaDusun', 'DesaKelurahan', 'KodeWilayah', 'KodePos', 'Lintang', 'Bujur', 'NomorTelepon', 'NomorFax', 'Email', 'Website', 'Npyp', 'NamaPimpinanYayasan', 'NoPendirianYayasan', 'TanggalPendirianYayasan', 'NomorPengesahanPnLn', 'NomorSkBn', 'TanggalSkBn', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('yayasanId', 'nama', 'alamatJalan', 'rt', 'rw', 'namaDusun', 'desaKelurahan', 'kodeWilayah', 'kodePos', 'lintang', 'bujur', 'nomorTelepon', 'nomorFax', 'email', 'website', 'npyp', 'namaPimpinanYayasan', 'noPendirianYayasan', 'tanggalPendirianYayasan', 'nomorPengesahanPnLn', 'nomorSkBn', 'tanggalSkBn', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (YayasanPeer::YAYASAN_ID, YayasanPeer::NAMA, YayasanPeer::ALAMAT_JALAN, YayasanPeer::RT, YayasanPeer::RW, YayasanPeer::NAMA_DUSUN, YayasanPeer::DESA_KELURAHAN, YayasanPeer::KODE_WILAYAH, YayasanPeer::KODE_POS, YayasanPeer::LINTANG, YayasanPeer::BUJUR, YayasanPeer::NOMOR_TELEPON, YayasanPeer::NOMOR_FAX, YayasanPeer::EMAIL, YayasanPeer::WEBSITE, YayasanPeer::NPYP, YayasanPeer::NAMA_PIMPINAN_YAYASAN, YayasanPeer::NO_PENDIRIAN_YAYASAN, YayasanPeer::TANGGAL_PENDIRIAN_YAYASAN, YayasanPeer::NOMOR_PENGESAHAN_PN_LN, YayasanPeer::NOMOR_SK_BN, YayasanPeer::TANGGAL_SK_BN, YayasanPeer::CREATE_DATE, YayasanPeer::LAST_UPDATE, YayasanPeer::SOFT_DELETE, YayasanPeer::LAST_SYNC, YayasanPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('YAYASAN_ID', 'NAMA', 'ALAMAT_JALAN', 'RT', 'RW', 'NAMA_DUSUN', 'DESA_KELURAHAN', 'KODE_WILAYAH', 'KODE_POS', 'LINTANG', 'BUJUR', 'NOMOR_TELEPON', 'NOMOR_FAX', 'EMAIL', 'WEBSITE', 'NPYP', 'NAMA_PIMPINAN_YAYASAN', 'NO_PENDIRIAN_YAYASAN', 'TANGGAL_PENDIRIAN_YAYASAN', 'NOMOR_PENGESAHAN_PN_LN', 'NOMOR_SK_BN', 'TANGGAL_SK_BN', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('yayasan_id', 'nama', 'alamat_jalan', 'rt', 'rw', 'nama_dusun', 'desa_kelurahan', 'kode_wilayah', 'kode_pos', 'lintang', 'bujur', 'nomor_telepon', 'nomor_fax', 'email', 'website', 'npyp', 'nama_pimpinan_yayasan', 'no_pendirian_yayasan', 'tanggal_pendirian_yayasan', 'nomor_pengesahan_pn_ln', 'nomor_sk_bn', 'tanggal_sk_bn', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. YayasanPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('YayasanId' => 0, 'Nama' => 1, 'AlamatJalan' => 2, 'Rt' => 3, 'Rw' => 4, 'NamaDusun' => 5, 'DesaKelurahan' => 6, 'KodeWilayah' => 7, 'KodePos' => 8, 'Lintang' => 9, 'Bujur' => 10, 'NomorTelepon' => 11, 'NomorFax' => 12, 'Email' => 13, 'Website' => 14, 'Npyp' => 15, 'NamaPimpinanYayasan' => 16, 'NoPendirianYayasan' => 17, 'TanggalPendirianYayasan' => 18, 'NomorPengesahanPnLn' => 19, 'NomorSkBn' => 20, 'TanggalSkBn' => 21, 'CreateDate' => 22, 'LastUpdate' => 23, 'SoftDelete' => 24, 'LastSync' => 25, 'UpdaterId' => 26, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('yayasanId' => 0, 'nama' => 1, 'alamatJalan' => 2, 'rt' => 3, 'rw' => 4, 'namaDusun' => 5, 'desaKelurahan' => 6, 'kodeWilayah' => 7, 'kodePos' => 8, 'lintang' => 9, 'bujur' => 10, 'nomorTelepon' => 11, 'nomorFax' => 12, 'email' => 13, 'website' => 14, 'npyp' => 15, 'namaPimpinanYayasan' => 16, 'noPendirianYayasan' => 17, 'tanggalPendirianYayasan' => 18, 'nomorPengesahanPnLn' => 19, 'nomorSkBn' => 20, 'tanggalSkBn' => 21, 'createDate' => 22, 'lastUpdate' => 23, 'softDelete' => 24, 'lastSync' => 25, 'updaterId' => 26, ),
        BasePeer::TYPE_COLNAME => array (YayasanPeer::YAYASAN_ID => 0, YayasanPeer::NAMA => 1, YayasanPeer::ALAMAT_JALAN => 2, YayasanPeer::RT => 3, YayasanPeer::RW => 4, YayasanPeer::NAMA_DUSUN => 5, YayasanPeer::DESA_KELURAHAN => 6, YayasanPeer::KODE_WILAYAH => 7, YayasanPeer::KODE_POS => 8, YayasanPeer::LINTANG => 9, YayasanPeer::BUJUR => 10, YayasanPeer::NOMOR_TELEPON => 11, YayasanPeer::NOMOR_FAX => 12, YayasanPeer::EMAIL => 13, YayasanPeer::WEBSITE => 14, YayasanPeer::NPYP => 15, YayasanPeer::NAMA_PIMPINAN_YAYASAN => 16, YayasanPeer::NO_PENDIRIAN_YAYASAN => 17, YayasanPeer::TANGGAL_PENDIRIAN_YAYASAN => 18, YayasanPeer::NOMOR_PENGESAHAN_PN_LN => 19, YayasanPeer::NOMOR_SK_BN => 20, YayasanPeer::TANGGAL_SK_BN => 21, YayasanPeer::CREATE_DATE => 22, YayasanPeer::LAST_UPDATE => 23, YayasanPeer::SOFT_DELETE => 24, YayasanPeer::LAST_SYNC => 25, YayasanPeer::UPDATER_ID => 26, ),
        BasePeer::TYPE_RAW_COLNAME => array ('YAYASAN_ID' => 0, 'NAMA' => 1, 'ALAMAT_JALAN' => 2, 'RT' => 3, 'RW' => 4, 'NAMA_DUSUN' => 5, 'DESA_KELURAHAN' => 6, 'KODE_WILAYAH' => 7, 'KODE_POS' => 8, 'LINTANG' => 9, 'BUJUR' => 10, 'NOMOR_TELEPON' => 11, 'NOMOR_FAX' => 12, 'EMAIL' => 13, 'WEBSITE' => 14, 'NPYP' => 15, 'NAMA_PIMPINAN_YAYASAN' => 16, 'NO_PENDIRIAN_YAYASAN' => 17, 'TANGGAL_PENDIRIAN_YAYASAN' => 18, 'NOMOR_PENGESAHAN_PN_LN' => 19, 'NOMOR_SK_BN' => 20, 'TANGGAL_SK_BN' => 21, 'CREATE_DATE' => 22, 'LAST_UPDATE' => 23, 'SOFT_DELETE' => 24, 'LAST_SYNC' => 25, 'UPDATER_ID' => 26, ),
        BasePeer::TYPE_FIELDNAME => array ('yayasan_id' => 0, 'nama' => 1, 'alamat_jalan' => 2, 'rt' => 3, 'rw' => 4, 'nama_dusun' => 5, 'desa_kelurahan' => 6, 'kode_wilayah' => 7, 'kode_pos' => 8, 'lintang' => 9, 'bujur' => 10, 'nomor_telepon' => 11, 'nomor_fax' => 12, 'email' => 13, 'website' => 14, 'npyp' => 15, 'nama_pimpinan_yayasan' => 16, 'no_pendirian_yayasan' => 17, 'tanggal_pendirian_yayasan' => 18, 'nomor_pengesahan_pn_ln' => 19, 'nomor_sk_bn' => 20, 'tanggal_sk_bn' => 21, 'create_date' => 22, 'last_update' => 23, 'soft_delete' => 24, 'last_sync' => 25, 'updater_id' => 26, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
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
        $toNames = YayasanPeer::getFieldNames($toType);
        $key = isset(YayasanPeer::$fieldKeys[$fromType][$name]) ? YayasanPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(YayasanPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, YayasanPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return YayasanPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. YayasanPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(YayasanPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(YayasanPeer::YAYASAN_ID);
            $criteria->addSelectColumn(YayasanPeer::NAMA);
            $criteria->addSelectColumn(YayasanPeer::ALAMAT_JALAN);
            $criteria->addSelectColumn(YayasanPeer::RT);
            $criteria->addSelectColumn(YayasanPeer::RW);
            $criteria->addSelectColumn(YayasanPeer::NAMA_DUSUN);
            $criteria->addSelectColumn(YayasanPeer::DESA_KELURAHAN);
            $criteria->addSelectColumn(YayasanPeer::KODE_WILAYAH);
            $criteria->addSelectColumn(YayasanPeer::KODE_POS);
            $criteria->addSelectColumn(YayasanPeer::LINTANG);
            $criteria->addSelectColumn(YayasanPeer::BUJUR);
            $criteria->addSelectColumn(YayasanPeer::NOMOR_TELEPON);
            $criteria->addSelectColumn(YayasanPeer::NOMOR_FAX);
            $criteria->addSelectColumn(YayasanPeer::EMAIL);
            $criteria->addSelectColumn(YayasanPeer::WEBSITE);
            $criteria->addSelectColumn(YayasanPeer::NPYP);
            $criteria->addSelectColumn(YayasanPeer::NAMA_PIMPINAN_YAYASAN);
            $criteria->addSelectColumn(YayasanPeer::NO_PENDIRIAN_YAYASAN);
            $criteria->addSelectColumn(YayasanPeer::TANGGAL_PENDIRIAN_YAYASAN);
            $criteria->addSelectColumn(YayasanPeer::NOMOR_PENGESAHAN_PN_LN);
            $criteria->addSelectColumn(YayasanPeer::NOMOR_SK_BN);
            $criteria->addSelectColumn(YayasanPeer::TANGGAL_SK_BN);
            $criteria->addSelectColumn(YayasanPeer::CREATE_DATE);
            $criteria->addSelectColumn(YayasanPeer::LAST_UPDATE);
            $criteria->addSelectColumn(YayasanPeer::SOFT_DELETE);
            $criteria->addSelectColumn(YayasanPeer::LAST_SYNC);
            $criteria->addSelectColumn(YayasanPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.yayasan_id');
            $criteria->addSelectColumn($alias . '.nama');
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
            $criteria->addSelectColumn($alias . '.npyp');
            $criteria->addSelectColumn($alias . '.nama_pimpinan_yayasan');
            $criteria->addSelectColumn($alias . '.no_pendirian_yayasan');
            $criteria->addSelectColumn($alias . '.tanggal_pendirian_yayasan');
            $criteria->addSelectColumn($alias . '.nomor_pengesahan_pn_ln');
            $criteria->addSelectColumn($alias . '.nomor_sk_bn');
            $criteria->addSelectColumn($alias . '.tanggal_sk_bn');
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
        $criteria->setPrimaryTableName(YayasanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            YayasanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(YayasanPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Yayasan
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = YayasanPeer::doSelect($critcopy, $con);
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
        return YayasanPeer::populateObjects(YayasanPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            YayasanPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(YayasanPeer::DATABASE_NAME);

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
     * @param      Yayasan $obj A Yayasan object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getYayasanId();
            } // if key === null
            YayasanPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Yayasan object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Yayasan) {
                $key = (string) $value->getYayasanId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Yayasan object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(YayasanPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Yayasan Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(YayasanPeer::$instances[$key])) {
                return YayasanPeer::$instances[$key];
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
        foreach (YayasanPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        YayasanPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to yayasan
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
        $cls = YayasanPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = YayasanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = YayasanPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                YayasanPeer::addInstanceToPool($obj, $key);
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
     * @return array (Yayasan object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = YayasanPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = YayasanPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + YayasanPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = YayasanPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            YayasanPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(YayasanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            YayasanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(YayasanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(YayasanPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of Yayasan objects pre-filled with their MstWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Yayasan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMstWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(YayasanPeer::DATABASE_NAME);
        }

        YayasanPeer::addSelectColumns($criteria);
        $startcol = YayasanPeer::NUM_HYDRATE_COLUMNS;
        MstWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(YayasanPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = YayasanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = YayasanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = YayasanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                YayasanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Yayasan) to $obj2 (MstWilayah)
                $obj2->addYayasan($obj1);

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
        $criteria->setPrimaryTableName(YayasanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            YayasanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(YayasanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(YayasanPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

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
     * Selects a collection of Yayasan objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Yayasan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(YayasanPeer::DATABASE_NAME);
        }

        YayasanPeer::addSelectColumns($criteria);
        $startcol2 = YayasanPeer::NUM_HYDRATE_COLUMNS;

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(YayasanPeer::KODE_WILAYAH, MstWilayahPeer::KODE_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = YayasanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = YayasanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = YayasanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                YayasanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Yayasan) to the collection in $obj2 (MstWilayah)
                $obj2->addYayasan($obj1);
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
        return Propel::getDatabaseMap(YayasanPeer::DATABASE_NAME)->getTable(YayasanPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseYayasanPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseYayasanPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new YayasanTableMap());
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
        return YayasanPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Yayasan or Criteria object.
     *
     * @param      mixed $values Criteria or Yayasan object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Yayasan object
        }


        // Set the correct dbName
        $criteria->setDbName(YayasanPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Yayasan or Criteria object.
     *
     * @param      mixed $values Criteria or Yayasan object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(YayasanPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(YayasanPeer::YAYASAN_ID);
            $value = $criteria->remove(YayasanPeer::YAYASAN_ID);
            if ($value) {
                $selectCriteria->add(YayasanPeer::YAYASAN_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(YayasanPeer::TABLE_NAME);
            }

        } else { // $values is Yayasan object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(YayasanPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the yayasan table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(YayasanPeer::TABLE_NAME, $con, YayasanPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            YayasanPeer::clearInstancePool();
            YayasanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Yayasan or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Yayasan object or primary key or array of primary keys
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
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            YayasanPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Yayasan) { // it's a model object
            // invalidate the cache for this single object
            YayasanPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(YayasanPeer::DATABASE_NAME);
            $criteria->add(YayasanPeer::YAYASAN_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                YayasanPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(YayasanPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            YayasanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Yayasan object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Yayasan $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(YayasanPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(YayasanPeer::TABLE_NAME);

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

        return BasePeer::doValidate(YayasanPeer::DATABASE_NAME, YayasanPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Yayasan
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = YayasanPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(YayasanPeer::DATABASE_NAME);
        $criteria->add(YayasanPeer::YAYASAN_ID, $pk);

        $v = YayasanPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Yayasan[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(YayasanPeer::DATABASE_NAME);
            $criteria->add(YayasanPeer::YAYASAN_ID, $pks, Criteria::IN);
            $objs = YayasanPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseYayasanPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseYayasanPeer::buildTableMap();

