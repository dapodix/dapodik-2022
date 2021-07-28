<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\KategoriDesaPeer;
use DataDikdas\Model\LevelWilayahPeer;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahPeer;
use DataDikdas\Model\NegaraPeer;
use DataDikdas\Model\map\MstWilayahTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.mst_wilayah' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseMstWilayahPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.mst_wilayah';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\MstWilayah';

    /** the related TableMap class for this table */
    const TM_CLASS = 'MstWilayahTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 21;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 21;

    /** the column name for the kode_wilayah field */
    const KODE_WILAYAH = 'ref.mst_wilayah.kode_wilayah';

    /** the column name for the nama field */
    const NAMA = 'ref.mst_wilayah.nama';

    /** the column name for the id_level_wilayah field */
    const ID_LEVEL_WILAYAH = 'ref.mst_wilayah.id_level_wilayah';

    /** the column name for the mst_kode_wilayah field */
    const MST_KODE_WILAYAH = 'ref.mst_wilayah.mst_kode_wilayah';

    /** the column name for the negara_id field */
    const NEGARA_ID = 'ref.mst_wilayah.negara_id';

    /** the column name for the asal_wilayah field */
    const ASAL_WILAYAH = 'ref.mst_wilayah.asal_wilayah';

    /** the column name for the kode_bps field */
    const KODE_BPS = 'ref.mst_wilayah.kode_bps';

    /** the column name for the kode_dagri field */
    const KODE_DAGRI = 'ref.mst_wilayah.kode_dagri';

    /** the column name for the kode_keu field */
    const KODE_KEU = 'ref.mst_wilayah.kode_keu';

    /** the column name for the id_prov field */
    const ID_PROV = 'ref.mst_wilayah.id_prov';

    /** the column name for the id_kabkota field */
    const ID_KABKOTA = 'ref.mst_wilayah.id_kabkota';

    /** the column name for the id_kec field */
    const ID_KEC = 'ref.mst_wilayah.id_kec';

    /** the column name for the a_desa field */
    const A_DESA = 'ref.mst_wilayah.a_desa';

    /** the column name for the a_kelurahan field */
    const A_KELURAHAN = 'ref.mst_wilayah.a_kelurahan';

    /** the column name for the a_35 field */
    const A_35 = 'ref.mst_wilayah.a_35';

    /** the column name for the a_urban field */
    const A_URBAN = 'ref.mst_wilayah.a_urban';

    /** the column name for the kategori_desa_id field */
    const KATEGORI_DESA_ID = 'ref.mst_wilayah.kategori_desa_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.mst_wilayah.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.mst_wilayah.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.mst_wilayah.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.mst_wilayah.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of MstWilayah objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array MstWilayah[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. MstWilayahPeer::$fieldNames[MstWilayahPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('KodeWilayah', 'Nama', 'IdLevelWilayah', 'MstKodeWilayah', 'NegaraId', 'AsalWilayah', 'KodeBps', 'KodeDagri', 'KodeKeu', 'IdProv', 'IdKabkota', 'IdKec', 'ADesa', 'AKelurahan', 'A35', 'AUrban', 'KategoriDesaId', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('kodeWilayah', 'nama', 'idLevelWilayah', 'mstKodeWilayah', 'negaraId', 'asalWilayah', 'kodeBps', 'kodeDagri', 'kodeKeu', 'idProv', 'idKabkota', 'idKec', 'aDesa', 'aKelurahan', 'a35', 'aUrban', 'kategoriDesaId', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (MstWilayahPeer::KODE_WILAYAH, MstWilayahPeer::NAMA, MstWilayahPeer::ID_LEVEL_WILAYAH, MstWilayahPeer::MST_KODE_WILAYAH, MstWilayahPeer::NEGARA_ID, MstWilayahPeer::ASAL_WILAYAH, MstWilayahPeer::KODE_BPS, MstWilayahPeer::KODE_DAGRI, MstWilayahPeer::KODE_KEU, MstWilayahPeer::ID_PROV, MstWilayahPeer::ID_KABKOTA, MstWilayahPeer::ID_KEC, MstWilayahPeer::A_DESA, MstWilayahPeer::A_KELURAHAN, MstWilayahPeer::A_35, MstWilayahPeer::A_URBAN, MstWilayahPeer::KATEGORI_DESA_ID, MstWilayahPeer::CREATE_DATE, MstWilayahPeer::LAST_UPDATE, MstWilayahPeer::EXPIRED_DATE, MstWilayahPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('KODE_WILAYAH', 'NAMA', 'ID_LEVEL_WILAYAH', 'MST_KODE_WILAYAH', 'NEGARA_ID', 'ASAL_WILAYAH', 'KODE_BPS', 'KODE_DAGRI', 'KODE_KEU', 'ID_PROV', 'ID_KABKOTA', 'ID_KEC', 'A_DESA', 'A_KELURAHAN', 'A_35', 'A_URBAN', 'KATEGORI_DESA_ID', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('kode_wilayah', 'nama', 'id_level_wilayah', 'mst_kode_wilayah', 'negara_id', 'asal_wilayah', 'kode_bps', 'kode_dagri', 'kode_keu', 'id_prov', 'id_kabkota', 'id_kec', 'a_desa', 'a_kelurahan', 'a_35', 'a_urban', 'kategori_desa_id', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. MstWilayahPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('KodeWilayah' => 0, 'Nama' => 1, 'IdLevelWilayah' => 2, 'MstKodeWilayah' => 3, 'NegaraId' => 4, 'AsalWilayah' => 5, 'KodeBps' => 6, 'KodeDagri' => 7, 'KodeKeu' => 8, 'IdProv' => 9, 'IdKabkota' => 10, 'IdKec' => 11, 'ADesa' => 12, 'AKelurahan' => 13, 'A35' => 14, 'AUrban' => 15, 'KategoriDesaId' => 16, 'CreateDate' => 17, 'LastUpdate' => 18, 'ExpiredDate' => 19, 'LastSync' => 20, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('kodeWilayah' => 0, 'nama' => 1, 'idLevelWilayah' => 2, 'mstKodeWilayah' => 3, 'negaraId' => 4, 'asalWilayah' => 5, 'kodeBps' => 6, 'kodeDagri' => 7, 'kodeKeu' => 8, 'idProv' => 9, 'idKabkota' => 10, 'idKec' => 11, 'aDesa' => 12, 'aKelurahan' => 13, 'a35' => 14, 'aUrban' => 15, 'kategoriDesaId' => 16, 'createDate' => 17, 'lastUpdate' => 18, 'expiredDate' => 19, 'lastSync' => 20, ),
        BasePeer::TYPE_COLNAME => array (MstWilayahPeer::KODE_WILAYAH => 0, MstWilayahPeer::NAMA => 1, MstWilayahPeer::ID_LEVEL_WILAYAH => 2, MstWilayahPeer::MST_KODE_WILAYAH => 3, MstWilayahPeer::NEGARA_ID => 4, MstWilayahPeer::ASAL_WILAYAH => 5, MstWilayahPeer::KODE_BPS => 6, MstWilayahPeer::KODE_DAGRI => 7, MstWilayahPeer::KODE_KEU => 8, MstWilayahPeer::ID_PROV => 9, MstWilayahPeer::ID_KABKOTA => 10, MstWilayahPeer::ID_KEC => 11, MstWilayahPeer::A_DESA => 12, MstWilayahPeer::A_KELURAHAN => 13, MstWilayahPeer::A_35 => 14, MstWilayahPeer::A_URBAN => 15, MstWilayahPeer::KATEGORI_DESA_ID => 16, MstWilayahPeer::CREATE_DATE => 17, MstWilayahPeer::LAST_UPDATE => 18, MstWilayahPeer::EXPIRED_DATE => 19, MstWilayahPeer::LAST_SYNC => 20, ),
        BasePeer::TYPE_RAW_COLNAME => array ('KODE_WILAYAH' => 0, 'NAMA' => 1, 'ID_LEVEL_WILAYAH' => 2, 'MST_KODE_WILAYAH' => 3, 'NEGARA_ID' => 4, 'ASAL_WILAYAH' => 5, 'KODE_BPS' => 6, 'KODE_DAGRI' => 7, 'KODE_KEU' => 8, 'ID_PROV' => 9, 'ID_KABKOTA' => 10, 'ID_KEC' => 11, 'A_DESA' => 12, 'A_KELURAHAN' => 13, 'A_35' => 14, 'A_URBAN' => 15, 'KATEGORI_DESA_ID' => 16, 'CREATE_DATE' => 17, 'LAST_UPDATE' => 18, 'EXPIRED_DATE' => 19, 'LAST_SYNC' => 20, ),
        BasePeer::TYPE_FIELDNAME => array ('kode_wilayah' => 0, 'nama' => 1, 'id_level_wilayah' => 2, 'mst_kode_wilayah' => 3, 'negara_id' => 4, 'asal_wilayah' => 5, 'kode_bps' => 6, 'kode_dagri' => 7, 'kode_keu' => 8, 'id_prov' => 9, 'id_kabkota' => 10, 'id_kec' => 11, 'a_desa' => 12, 'a_kelurahan' => 13, 'a_35' => 14, 'a_urban' => 15, 'kategori_desa_id' => 16, 'create_date' => 17, 'last_update' => 18, 'expired_date' => 19, 'last_sync' => 20, ),
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
        $toNames = MstWilayahPeer::getFieldNames($toType);
        $key = isset(MstWilayahPeer::$fieldKeys[$fromType][$name]) ? MstWilayahPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(MstWilayahPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, MstWilayahPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return MstWilayahPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. MstWilayahPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(MstWilayahPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(MstWilayahPeer::KODE_WILAYAH);
            $criteria->addSelectColumn(MstWilayahPeer::NAMA);
            $criteria->addSelectColumn(MstWilayahPeer::ID_LEVEL_WILAYAH);
            $criteria->addSelectColumn(MstWilayahPeer::MST_KODE_WILAYAH);
            $criteria->addSelectColumn(MstWilayahPeer::NEGARA_ID);
            $criteria->addSelectColumn(MstWilayahPeer::ASAL_WILAYAH);
            $criteria->addSelectColumn(MstWilayahPeer::KODE_BPS);
            $criteria->addSelectColumn(MstWilayahPeer::KODE_DAGRI);
            $criteria->addSelectColumn(MstWilayahPeer::KODE_KEU);
            $criteria->addSelectColumn(MstWilayahPeer::ID_PROV);
            $criteria->addSelectColumn(MstWilayahPeer::ID_KABKOTA);
            $criteria->addSelectColumn(MstWilayahPeer::ID_KEC);
            $criteria->addSelectColumn(MstWilayahPeer::A_DESA);
            $criteria->addSelectColumn(MstWilayahPeer::A_KELURAHAN);
            $criteria->addSelectColumn(MstWilayahPeer::A_35);
            $criteria->addSelectColumn(MstWilayahPeer::A_URBAN);
            $criteria->addSelectColumn(MstWilayahPeer::KATEGORI_DESA_ID);
            $criteria->addSelectColumn(MstWilayahPeer::CREATE_DATE);
            $criteria->addSelectColumn(MstWilayahPeer::LAST_UPDATE);
            $criteria->addSelectColumn(MstWilayahPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(MstWilayahPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.kode_wilayah');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.id_level_wilayah');
            $criteria->addSelectColumn($alias . '.mst_kode_wilayah');
            $criteria->addSelectColumn($alias . '.negara_id');
            $criteria->addSelectColumn($alias . '.asal_wilayah');
            $criteria->addSelectColumn($alias . '.kode_bps');
            $criteria->addSelectColumn($alias . '.kode_dagri');
            $criteria->addSelectColumn($alias . '.kode_keu');
            $criteria->addSelectColumn($alias . '.id_prov');
            $criteria->addSelectColumn($alias . '.id_kabkota');
            $criteria->addSelectColumn($alias . '.id_kec');
            $criteria->addSelectColumn($alias . '.a_desa');
            $criteria->addSelectColumn($alias . '.a_kelurahan');
            $criteria->addSelectColumn($alias . '.a_35');
            $criteria->addSelectColumn($alias . '.a_urban');
            $criteria->addSelectColumn($alias . '.kategori_desa_id');
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
        $criteria->setPrimaryTableName(MstWilayahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MstWilayahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MstWilayah
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = MstWilayahPeer::doSelect($critcopy, $con);
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
        return MstWilayahPeer::populateObjects(MstWilayahPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            MstWilayahPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);

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
     * @param      MstWilayah $obj A MstWilayah object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getKodeWilayah();
            } // if key === null
            MstWilayahPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A MstWilayah object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof MstWilayah) {
                $key = (string) $value->getKodeWilayah();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or MstWilayah object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(MstWilayahPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   MstWilayah Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(MstWilayahPeer::$instances[$key])) {
                return MstWilayahPeer::$instances[$key];
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
        foreach (MstWilayahPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        MstWilayahPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.mst_wilayah
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
        $cls = MstWilayahPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = MstWilayahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = MstWilayahPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MstWilayahPeer::addInstanceToPool($obj, $key);
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
     * @return array (MstWilayah object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = MstWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = MstWilayahPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + MstWilayahPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MstWilayahPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            MstWilayahPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related KategoriDesa table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKategoriDesa(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MstWilayahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MstWilayahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MstWilayahPeer::KATEGORI_DESA_ID, KategoriDesaPeer::KATEGORI_DESA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LevelWilayah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLevelWilayah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MstWilayahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MstWilayahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MstWilayahPeer::ID_LEVEL_WILAYAH, LevelWilayahPeer::ID_LEVEL_WILAYAH, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Negara table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinNegara(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MstWilayahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MstWilayahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MstWilayahPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

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
     * Selects a collection of MstWilayah objects pre-filled with their KategoriDesa objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MstWilayah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKategoriDesa(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);
        }

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol = MstWilayahPeer::NUM_HYDRATE_COLUMNS;
        KategoriDesaPeer::addSelectColumns($criteria);

        $criteria->addJoin(MstWilayahPeer::KATEGORI_DESA_ID, KategoriDesaPeer::KATEGORI_DESA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MstWilayahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MstWilayahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MstWilayahPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KategoriDesaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KategoriDesaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KategoriDesaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KategoriDesaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (MstWilayah) to $obj2 (KategoriDesa)
                $obj2->addMstWilayah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of MstWilayah objects pre-filled with their LevelWilayah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MstWilayah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLevelWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);
        }

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol = MstWilayahPeer::NUM_HYDRATE_COLUMNS;
        LevelWilayahPeer::addSelectColumns($criteria);

        $criteria->addJoin(MstWilayahPeer::ID_LEVEL_WILAYAH, LevelWilayahPeer::ID_LEVEL_WILAYAH, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MstWilayahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MstWilayahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MstWilayahPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LevelWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LevelWilayahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LevelWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LevelWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (MstWilayah) to $obj2 (LevelWilayah)
                $obj2->addMstWilayah($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of MstWilayah objects pre-filled with their Negara objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MstWilayah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinNegara(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);
        }

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol = MstWilayahPeer::NUM_HYDRATE_COLUMNS;
        NegaraPeer::addSelectColumns($criteria);

        $criteria->addJoin(MstWilayahPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MstWilayahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MstWilayahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MstWilayahPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = NegaraPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = NegaraPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    NegaraPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (MstWilayah) to $obj2 (Negara)
                $obj2->addMstWilayah($obj1);

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
        $criteria->setPrimaryTableName(MstWilayahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MstWilayahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MstWilayahPeer::KATEGORI_DESA_ID, KategoriDesaPeer::KATEGORI_DESA_ID, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::ID_LEVEL_WILAYAH, LevelWilayahPeer::ID_LEVEL_WILAYAH, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

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
     * Selects a collection of MstWilayah objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MstWilayah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);
        }

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol2 = MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KategoriDesaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KategoriDesaPeer::NUM_HYDRATE_COLUMNS;

        LevelWilayahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LevelWilayahPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MstWilayahPeer::KATEGORI_DESA_ID, KategoriDesaPeer::KATEGORI_DESA_ID, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::ID_LEVEL_WILAYAH, LevelWilayahPeer::ID_LEVEL_WILAYAH, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MstWilayahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MstWilayahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MstWilayahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined KategoriDesa rows

            $key2 = KategoriDesaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = KategoriDesaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KategoriDesaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KategoriDesaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (MstWilayah) to the collection in $obj2 (KategoriDesa)
                $obj2->addMstWilayah($obj1);
            } // if joined row not null

            // Add objects for joined LevelWilayah rows

            $key3 = LevelWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = LevelWilayahPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = LevelWilayahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LevelWilayahPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (MstWilayah) to the collection in $obj3 (LevelWilayah)
                $obj3->addMstWilayah($obj1);
            } // if joined row not null

            // Add objects for joined Negara rows

            $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = NegaraPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (MstWilayah) to the collection in $obj4 (Negara)
                $obj4->addMstWilayah($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related KategoriDesa table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKategoriDesa(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MstWilayahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MstWilayahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(MstWilayahPeer::ID_LEVEL_WILAYAH, LevelWilayahPeer::ID_LEVEL_WILAYAH, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LevelWilayah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLevelWilayah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MstWilayahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MstWilayahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(MstWilayahPeer::KATEGORI_DESA_ID, KategoriDesaPeer::KATEGORI_DESA_ID, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MstWilayahRelatedByMstKodeWilayah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMstWilayahRelatedByMstKodeWilayah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MstWilayahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MstWilayahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(MstWilayahPeer::KATEGORI_DESA_ID, KategoriDesaPeer::KATEGORI_DESA_ID, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::ID_LEVEL_WILAYAH, LevelWilayahPeer::ID_LEVEL_WILAYAH, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Negara table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptNegara(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MstWilayahPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MstWilayahPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(MstWilayahPeer::KATEGORI_DESA_ID, KategoriDesaPeer::KATEGORI_DESA_ID, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::ID_LEVEL_WILAYAH, LevelWilayahPeer::ID_LEVEL_WILAYAH, $join_behavior);

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
     * Selects a collection of MstWilayah objects pre-filled with all related objects except KategoriDesa.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MstWilayah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKategoriDesa(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);
        }

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol2 = MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        LevelWilayahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LevelWilayahPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MstWilayahPeer::ID_LEVEL_WILAYAH, LevelWilayahPeer::ID_LEVEL_WILAYAH, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MstWilayahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MstWilayahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MstWilayahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LevelWilayah rows

                $key2 = LevelWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LevelWilayahPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LevelWilayahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LevelWilayahPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (MstWilayah) to the collection in $obj2 (LevelWilayah)
                $obj2->addMstWilayah($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key3 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = NegaraPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    NegaraPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (MstWilayah) to the collection in $obj3 (Negara)
                $obj3->addMstWilayah($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of MstWilayah objects pre-filled with all related objects except LevelWilayah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MstWilayah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLevelWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);
        }

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol2 = MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KategoriDesaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KategoriDesaPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MstWilayahPeer::KATEGORI_DESA_ID, KategoriDesaPeer::KATEGORI_DESA_ID, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MstWilayahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MstWilayahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MstWilayahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KategoriDesa rows

                $key2 = KategoriDesaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KategoriDesaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KategoriDesaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KategoriDesaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (MstWilayah) to the collection in $obj2 (KategoriDesa)
                $obj2->addMstWilayah($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key3 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = NegaraPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    NegaraPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (MstWilayah) to the collection in $obj3 (Negara)
                $obj3->addMstWilayah($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of MstWilayah objects pre-filled with all related objects except MstWilayahRelatedByMstKodeWilayah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MstWilayah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMstWilayahRelatedByMstKodeWilayah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);
        }

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol2 = MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KategoriDesaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KategoriDesaPeer::NUM_HYDRATE_COLUMNS;

        LevelWilayahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LevelWilayahPeer::NUM_HYDRATE_COLUMNS;

        NegaraPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + NegaraPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MstWilayahPeer::KATEGORI_DESA_ID, KategoriDesaPeer::KATEGORI_DESA_ID, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::ID_LEVEL_WILAYAH, LevelWilayahPeer::ID_LEVEL_WILAYAH, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::NEGARA_ID, NegaraPeer::NEGARA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MstWilayahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MstWilayahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MstWilayahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KategoriDesa rows

                $key2 = KategoriDesaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KategoriDesaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KategoriDesaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KategoriDesaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (MstWilayah) to the collection in $obj2 (KategoriDesa)
                $obj2->addMstWilayah($obj1);

            } // if joined row is not null

                // Add objects for joined LevelWilayah rows

                $key3 = LevelWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = LevelWilayahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = LevelWilayahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LevelWilayahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (MstWilayah) to the collection in $obj3 (LevelWilayah)
                $obj3->addMstWilayah($obj1);

            } // if joined row is not null

                // Add objects for joined Negara rows

                $key4 = NegaraPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = NegaraPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = NegaraPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    NegaraPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (MstWilayah) to the collection in $obj4 (Negara)
                $obj4->addMstWilayah($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of MstWilayah objects pre-filled with all related objects except Negara.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MstWilayah objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptNegara(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);
        }

        MstWilayahPeer::addSelectColumns($criteria);
        $startcol2 = MstWilayahPeer::NUM_HYDRATE_COLUMNS;

        KategoriDesaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + KategoriDesaPeer::NUM_HYDRATE_COLUMNS;

        LevelWilayahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LevelWilayahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MstWilayahPeer::KATEGORI_DESA_ID, KategoriDesaPeer::KATEGORI_DESA_ID, $join_behavior);

        $criteria->addJoin(MstWilayahPeer::ID_LEVEL_WILAYAH, LevelWilayahPeer::ID_LEVEL_WILAYAH, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MstWilayahPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MstWilayahPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MstWilayahPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MstWilayahPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined KategoriDesa rows

                $key2 = KategoriDesaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = KategoriDesaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = KategoriDesaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    KategoriDesaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (MstWilayah) to the collection in $obj2 (KategoriDesa)
                $obj2->addMstWilayah($obj1);

            } // if joined row is not null

                // Add objects for joined LevelWilayah rows

                $key3 = LevelWilayahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = LevelWilayahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = LevelWilayahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LevelWilayahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (MstWilayah) to the collection in $obj3 (LevelWilayah)
                $obj3->addMstWilayah($obj1);

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
        return Propel::getDatabaseMap(MstWilayahPeer::DATABASE_NAME)->getTable(MstWilayahPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseMstWilayahPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseMstWilayahPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new MstWilayahTableMap());
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
        return MstWilayahPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a MstWilayah or Criteria object.
     *
     * @param      mixed $values Criteria or MstWilayah object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from MstWilayah object
        }


        // Set the correct dbName
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a MstWilayah or Criteria object.
     *
     * @param      mixed $values Criteria or MstWilayah object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(MstWilayahPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(MstWilayahPeer::KODE_WILAYAH);
            $value = $criteria->remove(MstWilayahPeer::KODE_WILAYAH);
            if ($value) {
                $selectCriteria->add(MstWilayahPeer::KODE_WILAYAH, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MstWilayahPeer::TABLE_NAME);
            }

        } else { // $values is MstWilayah object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.mst_wilayah table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(MstWilayahPeer::TABLE_NAME, $con, MstWilayahPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MstWilayahPeer::clearInstancePool();
            MstWilayahPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a MstWilayah or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or MstWilayah object or primary key or array of primary keys
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
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            MstWilayahPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof MstWilayah) { // it's a model object
            // invalidate the cache for this single object
            MstWilayahPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MstWilayahPeer::DATABASE_NAME);
            $criteria->add(MstWilayahPeer::KODE_WILAYAH, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                MstWilayahPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(MstWilayahPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            MstWilayahPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given MstWilayah object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      MstWilayah $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(MstWilayahPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(MstWilayahPeer::TABLE_NAME);

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

        return BasePeer::doValidate(MstWilayahPeer::DATABASE_NAME, MstWilayahPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return MstWilayah
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = MstWilayahPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(MstWilayahPeer::DATABASE_NAME);
        $criteria->add(MstWilayahPeer::KODE_WILAYAH, $pk);

        $v = MstWilayahPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return MstWilayah[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MstWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(MstWilayahPeer::DATABASE_NAME);
            $criteria->add(MstWilayahPeer::KODE_WILAYAH, $pks, Criteria::IN);
            $objs = MstWilayahPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseMstWilayahPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseMstWilayahPeer::buildTableMap();

