<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\LembSertifikasiPeer;
use DataDikdas\Model\LembagaAkreditasiPeer;
use DataDikdas\Model\PenggunaPeer;
use DataDikdas\Model\PeranPeer;
use DataDikdas\Model\RolePengguna;
use DataDikdas\Model\RolePenggunaPeer;
use DataDikdas\Model\map\RolePenggunaTableMap;

/**
 * Base static class for performing query and update operations on the 'man_akses.role_pengguna' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseRolePenggunaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'man_akses.role_pengguna';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\RolePengguna';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RolePenggunaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 19;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 19;

    /** the column name for the id_role_pengguna field */
    const ID_ROLE_PENGGUNA = 'man_akses.role_pengguna.id_role_pengguna';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'man_akses.role_pengguna.sekolah_id';

    /** the column name for the lembaga_id field */
    const LEMBAGA_ID = 'man_akses.role_pengguna.lembaga_id';

    /** the column name for the yayasan_id field */
    const YAYASAN_ID = 'man_akses.role_pengguna.yayasan_id';

    /** the column name for the la_id field */
    const LA_ID = 'man_akses.role_pengguna.la_id';

    /** the column name for the dudi_id field */
    const DUDI_ID = 'man_akses.role_pengguna.dudi_id';

    /** the column name for the kode_lemb_sert field */
    const KODE_LEMB_SERT = 'man_akses.role_pengguna.kode_lemb_sert';

    /** the column name for the pengguna_id field */
    const PENGGUNA_ID = 'man_akses.role_pengguna.pengguna_id';

    /** the column name for the peran_id field */
    const PERAN_ID = 'man_akses.role_pengguna.peran_id';

    /** the column name for the sk_penugasan field */
    const SK_PENUGASAN = 'man_akses.role_pengguna.sk_penugasan';

    /** the column name for the tgl_sk_penugasan field */
    const TGL_SK_PENUGASAN = 'man_akses.role_pengguna.tgl_sk_penugasan';

    /** the column name for the approval_peran field */
    const APPROVAL_PERAN = 'man_akses.role_pengguna.approval_peran';

    /** the column name for the tgl_kadaluwarsa field */
    const TGL_KADALUWARSA = 'man_akses.role_pengguna.tgl_kadaluwarsa';

    /** the column name for the last_active field */
    const LAST_ACTIVE = 'man_akses.role_pengguna.last_active';

    /** the column name for the jenis_lembaga field */
    const JENIS_LEMBAGA = 'man_akses.role_pengguna.jenis_lembaga';

    /** the column name for the create_date field */
    const CREATE_DATE = 'man_akses.role_pengguna.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'man_akses.role_pengguna.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'man_akses.role_pengguna.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'man_akses.role_pengguna.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of RolePengguna objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array RolePengguna[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RolePenggunaPeer::$fieldNames[RolePenggunaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdRolePengguna', 'SekolahId', 'LembagaId', 'YayasanId', 'LaId', 'DudiId', 'KodeLembSert', 'PenggunaId', 'PeranId', 'SkPenugasan', 'TglSkPenugasan', 'ApprovalPeran', 'TglKadaluwarsa', 'LastActive', 'JenisLembaga', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idRolePengguna', 'sekolahId', 'lembagaId', 'yayasanId', 'laId', 'dudiId', 'kodeLembSert', 'penggunaId', 'peranId', 'skPenugasan', 'tglSkPenugasan', 'approvalPeran', 'tglKadaluwarsa', 'lastActive', 'jenisLembaga', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (RolePenggunaPeer::ID_ROLE_PENGGUNA, RolePenggunaPeer::SEKOLAH_ID, RolePenggunaPeer::LEMBAGA_ID, RolePenggunaPeer::YAYASAN_ID, RolePenggunaPeer::LA_ID, RolePenggunaPeer::DUDI_ID, RolePenggunaPeer::KODE_LEMB_SERT, RolePenggunaPeer::PENGGUNA_ID, RolePenggunaPeer::PERAN_ID, RolePenggunaPeer::SK_PENUGASAN, RolePenggunaPeer::TGL_SK_PENUGASAN, RolePenggunaPeer::APPROVAL_PERAN, RolePenggunaPeer::TGL_KADALUWARSA, RolePenggunaPeer::LAST_ACTIVE, RolePenggunaPeer::JENIS_LEMBAGA, RolePenggunaPeer::CREATE_DATE, RolePenggunaPeer::LAST_UPDATE, RolePenggunaPeer::EXPIRED_DATE, RolePenggunaPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ROLE_PENGGUNA', 'SEKOLAH_ID', 'LEMBAGA_ID', 'YAYASAN_ID', 'LA_ID', 'DUDI_ID', 'KODE_LEMB_SERT', 'PENGGUNA_ID', 'PERAN_ID', 'SK_PENUGASAN', 'TGL_SK_PENUGASAN', 'APPROVAL_PERAN', 'TGL_KADALUWARSA', 'LAST_ACTIVE', 'JENIS_LEMBAGA', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('id_role_pengguna', 'sekolah_id', 'lembaga_id', 'yayasan_id', 'la_id', 'dudi_id', 'kode_lemb_sert', 'pengguna_id', 'peran_id', 'sk_penugasan', 'tgl_sk_penugasan', 'approval_peran', 'tgl_kadaluwarsa', 'last_active', 'jenis_lembaga', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RolePenggunaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdRolePengguna' => 0, 'SekolahId' => 1, 'LembagaId' => 2, 'YayasanId' => 3, 'LaId' => 4, 'DudiId' => 5, 'KodeLembSert' => 6, 'PenggunaId' => 7, 'PeranId' => 8, 'SkPenugasan' => 9, 'TglSkPenugasan' => 10, 'ApprovalPeran' => 11, 'TglKadaluwarsa' => 12, 'LastActive' => 13, 'JenisLembaga' => 14, 'CreateDate' => 15, 'LastUpdate' => 16, 'ExpiredDate' => 17, 'LastSync' => 18, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idRolePengguna' => 0, 'sekolahId' => 1, 'lembagaId' => 2, 'yayasanId' => 3, 'laId' => 4, 'dudiId' => 5, 'kodeLembSert' => 6, 'penggunaId' => 7, 'peranId' => 8, 'skPenugasan' => 9, 'tglSkPenugasan' => 10, 'approvalPeran' => 11, 'tglKadaluwarsa' => 12, 'lastActive' => 13, 'jenisLembaga' => 14, 'createDate' => 15, 'lastUpdate' => 16, 'expiredDate' => 17, 'lastSync' => 18, ),
        BasePeer::TYPE_COLNAME => array (RolePenggunaPeer::ID_ROLE_PENGGUNA => 0, RolePenggunaPeer::SEKOLAH_ID => 1, RolePenggunaPeer::LEMBAGA_ID => 2, RolePenggunaPeer::YAYASAN_ID => 3, RolePenggunaPeer::LA_ID => 4, RolePenggunaPeer::DUDI_ID => 5, RolePenggunaPeer::KODE_LEMB_SERT => 6, RolePenggunaPeer::PENGGUNA_ID => 7, RolePenggunaPeer::PERAN_ID => 8, RolePenggunaPeer::SK_PENUGASAN => 9, RolePenggunaPeer::TGL_SK_PENUGASAN => 10, RolePenggunaPeer::APPROVAL_PERAN => 11, RolePenggunaPeer::TGL_KADALUWARSA => 12, RolePenggunaPeer::LAST_ACTIVE => 13, RolePenggunaPeer::JENIS_LEMBAGA => 14, RolePenggunaPeer::CREATE_DATE => 15, RolePenggunaPeer::LAST_UPDATE => 16, RolePenggunaPeer::EXPIRED_DATE => 17, RolePenggunaPeer::LAST_SYNC => 18, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ROLE_PENGGUNA' => 0, 'SEKOLAH_ID' => 1, 'LEMBAGA_ID' => 2, 'YAYASAN_ID' => 3, 'LA_ID' => 4, 'DUDI_ID' => 5, 'KODE_LEMB_SERT' => 6, 'PENGGUNA_ID' => 7, 'PERAN_ID' => 8, 'SK_PENUGASAN' => 9, 'TGL_SK_PENUGASAN' => 10, 'APPROVAL_PERAN' => 11, 'TGL_KADALUWARSA' => 12, 'LAST_ACTIVE' => 13, 'JENIS_LEMBAGA' => 14, 'CREATE_DATE' => 15, 'LAST_UPDATE' => 16, 'EXPIRED_DATE' => 17, 'LAST_SYNC' => 18, ),
        BasePeer::TYPE_FIELDNAME => array ('id_role_pengguna' => 0, 'sekolah_id' => 1, 'lembaga_id' => 2, 'yayasan_id' => 3, 'la_id' => 4, 'dudi_id' => 5, 'kode_lemb_sert' => 6, 'pengguna_id' => 7, 'peran_id' => 8, 'sk_penugasan' => 9, 'tgl_sk_penugasan' => 10, 'approval_peran' => 11, 'tgl_kadaluwarsa' => 12, 'last_active' => 13, 'jenis_lembaga' => 14, 'create_date' => 15, 'last_update' => 16, 'expired_date' => 17, 'last_sync' => 18, ),
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
        $toNames = RolePenggunaPeer::getFieldNames($toType);
        $key = isset(RolePenggunaPeer::$fieldKeys[$fromType][$name]) ? RolePenggunaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RolePenggunaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RolePenggunaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RolePenggunaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RolePenggunaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RolePenggunaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RolePenggunaPeer::ID_ROLE_PENGGUNA);
            $criteria->addSelectColumn(RolePenggunaPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(RolePenggunaPeer::LEMBAGA_ID);
            $criteria->addSelectColumn(RolePenggunaPeer::YAYASAN_ID);
            $criteria->addSelectColumn(RolePenggunaPeer::LA_ID);
            $criteria->addSelectColumn(RolePenggunaPeer::DUDI_ID);
            $criteria->addSelectColumn(RolePenggunaPeer::KODE_LEMB_SERT);
            $criteria->addSelectColumn(RolePenggunaPeer::PENGGUNA_ID);
            $criteria->addSelectColumn(RolePenggunaPeer::PERAN_ID);
            $criteria->addSelectColumn(RolePenggunaPeer::SK_PENUGASAN);
            $criteria->addSelectColumn(RolePenggunaPeer::TGL_SK_PENUGASAN);
            $criteria->addSelectColumn(RolePenggunaPeer::APPROVAL_PERAN);
            $criteria->addSelectColumn(RolePenggunaPeer::TGL_KADALUWARSA);
            $criteria->addSelectColumn(RolePenggunaPeer::LAST_ACTIVE);
            $criteria->addSelectColumn(RolePenggunaPeer::JENIS_LEMBAGA);
            $criteria->addSelectColumn(RolePenggunaPeer::CREATE_DATE);
            $criteria->addSelectColumn(RolePenggunaPeer::LAST_UPDATE);
            $criteria->addSelectColumn(RolePenggunaPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(RolePenggunaPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.id_role_pengguna');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.lembaga_id');
            $criteria->addSelectColumn($alias . '.yayasan_id');
            $criteria->addSelectColumn($alias . '.la_id');
            $criteria->addSelectColumn($alias . '.dudi_id');
            $criteria->addSelectColumn($alias . '.kode_lemb_sert');
            $criteria->addSelectColumn($alias . '.pengguna_id');
            $criteria->addSelectColumn($alias . '.peran_id');
            $criteria->addSelectColumn($alias . '.sk_penugasan');
            $criteria->addSelectColumn($alias . '.tgl_sk_penugasan');
            $criteria->addSelectColumn($alias . '.approval_peran');
            $criteria->addSelectColumn($alias . '.tgl_kadaluwarsa');
            $criteria->addSelectColumn($alias . '.last_active');
            $criteria->addSelectColumn($alias . '.jenis_lembaga');
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
        $criteria->setPrimaryTableName(RolePenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RolePenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RolePengguna
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RolePenggunaPeer::doSelect($critcopy, $con);
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
        return RolePenggunaPeer::populateObjects(RolePenggunaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RolePenggunaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

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
     * @param      RolePengguna $obj A RolePengguna object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdRolePengguna();
            } // if key === null
            RolePenggunaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A RolePengguna object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof RolePengguna) {
                $key = (string) $value->getIdRolePengguna();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RolePengguna object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RolePenggunaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   RolePengguna Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RolePenggunaPeer::$instances[$key])) {
                return RolePenggunaPeer::$instances[$key];
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
        foreach (RolePenggunaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RolePenggunaPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to man_akses.role_pengguna
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
        $cls = RolePenggunaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RolePenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RolePenggunaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RolePenggunaPeer::addInstanceToPool($obj, $key);
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
     * @return array (RolePengguna object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RolePenggunaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RolePenggunaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RolePenggunaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RolePenggunaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RolePenggunaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Peran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPeran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RolePenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RolePenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RolePenggunaPeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LembSertifikasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLembSertifikasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RolePenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RolePenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RolePenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Pengguna table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPengguna(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RolePenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RolePenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RolePenggunaPeer::PENGGUNA_ID, PenggunaPeer::PENGGUNA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LembagaAkreditasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLembagaAkreditasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RolePenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RolePenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RolePenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

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
     * Selects a collection of RolePengguna objects pre-filled with their Peran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RolePengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPeran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);
        }

        RolePenggunaPeer::addSelectColumns($criteria);
        $startcol = RolePenggunaPeer::NUM_HYDRATE_COLUMNS;
        PeranPeer::addSelectColumns($criteria);

        $criteria->addJoin(RolePenggunaPeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RolePenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RolePenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RolePenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RolePenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PeranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PeranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PeranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PeranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RolePengguna) to $obj2 (Peran)
                $obj2->addRolePengguna($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RolePengguna objects pre-filled with their LembSertifikasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RolePengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLembSertifikasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);
        }

        RolePenggunaPeer::addSelectColumns($criteria);
        $startcol = RolePenggunaPeer::NUM_HYDRATE_COLUMNS;
        LembSertifikasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(RolePenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RolePenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RolePenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RolePenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RolePenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LembSertifikasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LembSertifikasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LembSertifikasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RolePengguna) to $obj2 (LembSertifikasi)
                $obj2->addRolePengguna($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RolePengguna objects pre-filled with their Pengguna objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RolePengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPengguna(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);
        }

        RolePenggunaPeer::addSelectColumns($criteria);
        $startcol = RolePenggunaPeer::NUM_HYDRATE_COLUMNS;
        PenggunaPeer::addSelectColumns($criteria);

        $criteria->addJoin(RolePenggunaPeer::PENGGUNA_ID, PenggunaPeer::PENGGUNA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RolePenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RolePenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RolePenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RolePenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PenggunaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PenggunaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PenggunaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PenggunaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RolePengguna) to $obj2 (Pengguna)
                $obj2->addRolePengguna($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RolePengguna objects pre-filled with their LembagaAkreditasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RolePengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLembagaAkreditasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);
        }

        RolePenggunaPeer::addSelectColumns($criteria);
        $startcol = RolePenggunaPeer::NUM_HYDRATE_COLUMNS;
        LembagaAkreditasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(RolePenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RolePenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RolePenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RolePenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RolePenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LembagaAkreditasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LembagaAkreditasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RolePengguna) to $obj2 (LembagaAkreditasi)
                $obj2->addRolePengguna($obj1);

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
        $criteria->setPrimaryTableName(RolePenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RolePenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RolePenggunaPeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::PENGGUNA_ID, PenggunaPeer::PENGGUNA_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

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
     * Selects a collection of RolePengguna objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RolePengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);
        }

        RolePenggunaPeer::addSelectColumns($criteria);
        $startcol2 = RolePenggunaPeer::NUM_HYDRATE_COLUMNS;

        PeranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PeranPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        PenggunaPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PenggunaPeer::NUM_HYDRATE_COLUMNS;

        LembagaAkreditasiPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RolePenggunaPeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::PENGGUNA_ID, PenggunaPeer::PENGGUNA_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RolePenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RolePenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RolePenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RolePenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Peran rows

            $key2 = PeranPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = PeranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PeranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PeranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj2 (Peran)
                $obj2->addRolePengguna($obj1);
            } // if joined row not null

            // Add objects for joined LembSertifikasi rows

            $key3 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = LembSertifikasiPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = LembSertifikasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LembSertifikasiPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj3 (LembSertifikasi)
                $obj3->addRolePengguna($obj1);
            } // if joined row not null

            // Add objects for joined Pengguna rows

            $key4 = PenggunaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = PenggunaPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = PenggunaPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PenggunaPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj4 (Pengguna)
                $obj4->addRolePengguna($obj1);
            } // if joined row not null

            // Add objects for joined LembagaAkreditasi rows

            $key5 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = LembagaAkreditasiPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    LembagaAkreditasiPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj5 (LembagaAkreditasi)
                $obj5->addRolePengguna($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Peran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPeran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RolePenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RolePenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RolePenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::PENGGUNA_ID, PenggunaPeer::PENGGUNA_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LembSertifikasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLembSertifikasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RolePenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RolePenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RolePenggunaPeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::PENGGUNA_ID, PenggunaPeer::PENGGUNA_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Pengguna table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPengguna(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RolePenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RolePenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RolePenggunaPeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LembagaAkreditasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLembagaAkreditasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RolePenggunaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RolePenggunaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RolePenggunaPeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::PENGGUNA_ID, PenggunaPeer::PENGGUNA_ID, $join_behavior);

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
     * Selects a collection of RolePengguna objects pre-filled with all related objects except Peran.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RolePengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPeran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);
        }

        RolePenggunaPeer::addSelectColumns($criteria);
        $startcol2 = RolePenggunaPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        PenggunaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PenggunaPeer::NUM_HYDRATE_COLUMNS;

        LembagaAkreditasiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RolePenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::PENGGUNA_ID, PenggunaPeer::PENGGUNA_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RolePenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RolePenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RolePenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RolePenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LembSertifikasi rows

                $key2 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LembSertifikasiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LembSertifikasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LembSertifikasiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj2 (LembSertifikasi)
                $obj2->addRolePengguna($obj1);

            } // if joined row is not null

                // Add objects for joined Pengguna rows

                $key3 = PenggunaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PenggunaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PenggunaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PenggunaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj3 (Pengguna)
                $obj3->addRolePengguna($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaAkreditasi rows

                $key4 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LembagaAkreditasiPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembagaAkreditasiPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj4 (LembagaAkreditasi)
                $obj4->addRolePengguna($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RolePengguna objects pre-filled with all related objects except LembSertifikasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RolePengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLembSertifikasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);
        }

        RolePenggunaPeer::addSelectColumns($criteria);
        $startcol2 = RolePenggunaPeer::NUM_HYDRATE_COLUMNS;

        PeranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PeranPeer::NUM_HYDRATE_COLUMNS;

        PenggunaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PenggunaPeer::NUM_HYDRATE_COLUMNS;

        LembagaAkreditasiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RolePenggunaPeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::PENGGUNA_ID, PenggunaPeer::PENGGUNA_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RolePenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RolePenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RolePenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RolePenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Peran rows

                $key2 = PeranPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PeranPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PeranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PeranPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj2 (Peran)
                $obj2->addRolePengguna($obj1);

            } // if joined row is not null

                // Add objects for joined Pengguna rows

                $key3 = PenggunaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PenggunaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PenggunaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PenggunaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj3 (Pengguna)
                $obj3->addRolePengguna($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaAkreditasi rows

                $key4 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LembagaAkreditasiPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembagaAkreditasiPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj4 (LembagaAkreditasi)
                $obj4->addRolePengguna($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RolePengguna objects pre-filled with all related objects except Pengguna.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RolePengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPengguna(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);
        }

        RolePenggunaPeer::addSelectColumns($criteria);
        $startcol2 = RolePenggunaPeer::NUM_HYDRATE_COLUMNS;

        PeranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PeranPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        LembagaAkreditasiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembagaAkreditasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RolePenggunaPeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::LA_ID, LembagaAkreditasiPeer::LA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RolePenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RolePenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RolePenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RolePenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Peran rows

                $key2 = PeranPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PeranPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PeranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PeranPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj2 (Peran)
                $obj2->addRolePengguna($obj1);

            } // if joined row is not null

                // Add objects for joined LembSertifikasi rows

                $key3 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = LembSertifikasiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = LembSertifikasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LembSertifikasiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj3 (LembSertifikasi)
                $obj3->addRolePengguna($obj1);

            } // if joined row is not null

                // Add objects for joined LembagaAkreditasi rows

                $key4 = LembagaAkreditasiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LembagaAkreditasiPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LembagaAkreditasiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembagaAkreditasiPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj4 (LembagaAkreditasi)
                $obj4->addRolePengguna($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RolePengguna objects pre-filled with all related objects except LembagaAkreditasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RolePengguna objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLembagaAkreditasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);
        }

        RolePenggunaPeer::addSelectColumns($criteria);
        $startcol2 = RolePenggunaPeer::NUM_HYDRATE_COLUMNS;

        PeranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PeranPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        PenggunaPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PenggunaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RolePenggunaPeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(RolePenggunaPeer::PENGGUNA_ID, PenggunaPeer::PENGGUNA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RolePenggunaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RolePenggunaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RolePenggunaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RolePenggunaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Peran rows

                $key2 = PeranPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PeranPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PeranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PeranPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj2 (Peran)
                $obj2->addRolePengguna($obj1);

            } // if joined row is not null

                // Add objects for joined LembSertifikasi rows

                $key3 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = LembSertifikasiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = LembSertifikasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LembSertifikasiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj3 (LembSertifikasi)
                $obj3->addRolePengguna($obj1);

            } // if joined row is not null

                // Add objects for joined Pengguna rows

                $key4 = PenggunaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PenggunaPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = PenggunaPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PenggunaPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RolePengguna) to the collection in $obj4 (Pengguna)
                $obj4->addRolePengguna($obj1);

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
        return Propel::getDatabaseMap(RolePenggunaPeer::DATABASE_NAME)->getTable(RolePenggunaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRolePenggunaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRolePenggunaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RolePenggunaTableMap());
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
        return RolePenggunaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a RolePengguna or Criteria object.
     *
     * @param      mixed $values Criteria or RolePengguna object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from RolePengguna object
        }


        // Set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a RolePengguna or Criteria object.
     *
     * @param      mixed $values Criteria or RolePengguna object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RolePenggunaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RolePenggunaPeer::ID_ROLE_PENGGUNA);
            $value = $criteria->remove(RolePenggunaPeer::ID_ROLE_PENGGUNA);
            if ($value) {
                $selectCriteria->add(RolePenggunaPeer::ID_ROLE_PENGGUNA, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RolePenggunaPeer::TABLE_NAME);
            }

        } else { // $values is RolePengguna object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the man_akses.role_pengguna table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RolePenggunaPeer::TABLE_NAME, $con, RolePenggunaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RolePenggunaPeer::clearInstancePool();
            RolePenggunaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a RolePengguna or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or RolePengguna object or primary key or array of primary keys
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
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RolePenggunaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof RolePengguna) { // it's a model object
            // invalidate the cache for this single object
            RolePenggunaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RolePenggunaPeer::DATABASE_NAME);
            $criteria->add(RolePenggunaPeer::ID_ROLE_PENGGUNA, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                RolePenggunaPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RolePenggunaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            RolePenggunaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given RolePengguna object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      RolePengguna $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RolePenggunaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RolePenggunaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(RolePenggunaPeer::DATABASE_NAME, RolePenggunaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return RolePengguna
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RolePenggunaPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RolePenggunaPeer::DATABASE_NAME);
        $criteria->add(RolePenggunaPeer::ID_ROLE_PENGGUNA, $pk);

        $v = RolePenggunaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return RolePengguna[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RolePenggunaPeer::DATABASE_NAME);
            $criteria->add(RolePenggunaPeer::ID_ROLE_PENGGUNA, $pks, Criteria::IN);
            $objs = RolePenggunaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRolePenggunaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRolePenggunaPeer::buildTableMap();

