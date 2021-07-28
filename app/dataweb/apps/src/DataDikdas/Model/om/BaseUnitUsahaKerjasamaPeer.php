<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\MouPeer;
use DataDikdas\Model\SumberDanaPeer;
use DataDikdas\Model\UnitUsahaKerjasama;
use DataDikdas\Model\UnitUsahaKerjasamaPeer;
use DataDikdas\Model\UnitUsahaPeer;
use DataDikdas\Model\map\UnitUsahaKerjasamaTableMap;

/**
 * Base static class for performing query and update operations on the 'unit_usaha_kerjasama' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseUnitUsahaKerjasamaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'unit_usaha_kerjasama';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\UnitUsahaKerjasama';

    /** the related TableMap class for this table */
    const TM_CLASS = 'UnitUsahaKerjasamaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 15;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 15;

    /** the column name for the mou_id field */
    const MOU_ID = 'unit_usaha_kerjasama.mou_id';

    /** the column name for the unit_usaha_id field */
    const UNIT_USAHA_ID = 'unit_usaha_kerjasama.unit_usaha_id';

    /** the column name for the sumber_dana_id field */
    const SUMBER_DANA_ID = 'unit_usaha_kerjasama.sumber_dana_id';

    /** the column name for the produk_barang_dihasilkan field */
    const PRODUK_BARANG_DIHASILKAN = 'unit_usaha_kerjasama.produk_barang_dihasilkan';

    /** the column name for the jasa_produksi_dihasilkan field */
    const JASA_PRODUKSI_DIHASILKAN = 'unit_usaha_kerjasama.jasa_produksi_dihasilkan';

    /** the column name for the omzet_barang_perbulan field */
    const OMZET_BARANG_PERBULAN = 'unit_usaha_kerjasama.omzet_barang_perbulan';

    /** the column name for the omzet_jasa_perbulan field */
    const OMZET_JASA_PERBULAN = 'unit_usaha_kerjasama.omzet_jasa_perbulan';

    /** the column name for the prestasi_penghargaan field */
    const PRESTASI_PENGHARGAAN = 'unit_usaha_kerjasama.prestasi_penghargaan';

    /** the column name for the pangsa_pasar_produk field */
    const PANGSA_PASAR_PRODUK = 'unit_usaha_kerjasama.pangsa_pasar_produk';

    /** the column name for the pangsa_pasar_jasa field */
    const PANGSA_PASAR_JASA = 'unit_usaha_kerjasama.pangsa_pasar_jasa';

    /** the column name for the create_date field */
    const CREATE_DATE = 'unit_usaha_kerjasama.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'unit_usaha_kerjasama.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'unit_usaha_kerjasama.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'unit_usaha_kerjasama.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'unit_usaha_kerjasama.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of UnitUsahaKerjasama objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array UnitUsahaKerjasama[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. UnitUsahaKerjasamaPeer::$fieldNames[UnitUsahaKerjasamaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('MouId', 'UnitUsahaId', 'SumberDanaId', 'ProdukBarangDihasilkan', 'JasaProduksiDihasilkan', 'OmzetBarangPerbulan', 'OmzetJasaPerbulan', 'PrestasiPenghargaan', 'PangsaPasarProduk', 'PangsaPasarJasa', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('mouId', 'unitUsahaId', 'sumberDanaId', 'produkBarangDihasilkan', 'jasaProduksiDihasilkan', 'omzetBarangPerbulan', 'omzetJasaPerbulan', 'prestasiPenghargaan', 'pangsaPasarProduk', 'pangsaPasarJasa', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (UnitUsahaKerjasamaPeer::MOU_ID, UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, UnitUsahaKerjasamaPeer::PRODUK_BARANG_DIHASILKAN, UnitUsahaKerjasamaPeer::JASA_PRODUKSI_DIHASILKAN, UnitUsahaKerjasamaPeer::OMZET_BARANG_PERBULAN, UnitUsahaKerjasamaPeer::OMZET_JASA_PERBULAN, UnitUsahaKerjasamaPeer::PRESTASI_PENGHARGAAN, UnitUsahaKerjasamaPeer::PANGSA_PASAR_PRODUK, UnitUsahaKerjasamaPeer::PANGSA_PASAR_JASA, UnitUsahaKerjasamaPeer::CREATE_DATE, UnitUsahaKerjasamaPeer::LAST_UPDATE, UnitUsahaKerjasamaPeer::SOFT_DELETE, UnitUsahaKerjasamaPeer::LAST_SYNC, UnitUsahaKerjasamaPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('MOU_ID', 'UNIT_USAHA_ID', 'SUMBER_DANA_ID', 'PRODUK_BARANG_DIHASILKAN', 'JASA_PRODUKSI_DIHASILKAN', 'OMZET_BARANG_PERBULAN', 'OMZET_JASA_PERBULAN', 'PRESTASI_PENGHARGAAN', 'PANGSA_PASAR_PRODUK', 'PANGSA_PASAR_JASA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('mou_id', 'unit_usaha_id', 'sumber_dana_id', 'produk_barang_dihasilkan', 'jasa_produksi_dihasilkan', 'omzet_barang_perbulan', 'omzet_jasa_perbulan', 'prestasi_penghargaan', 'pangsa_pasar_produk', 'pangsa_pasar_jasa', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. UnitUsahaKerjasamaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('MouId' => 0, 'UnitUsahaId' => 1, 'SumberDanaId' => 2, 'ProdukBarangDihasilkan' => 3, 'JasaProduksiDihasilkan' => 4, 'OmzetBarangPerbulan' => 5, 'OmzetJasaPerbulan' => 6, 'PrestasiPenghargaan' => 7, 'PangsaPasarProduk' => 8, 'PangsaPasarJasa' => 9, 'CreateDate' => 10, 'LastUpdate' => 11, 'SoftDelete' => 12, 'LastSync' => 13, 'UpdaterId' => 14, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('mouId' => 0, 'unitUsahaId' => 1, 'sumberDanaId' => 2, 'produkBarangDihasilkan' => 3, 'jasaProduksiDihasilkan' => 4, 'omzetBarangPerbulan' => 5, 'omzetJasaPerbulan' => 6, 'prestasiPenghargaan' => 7, 'pangsaPasarProduk' => 8, 'pangsaPasarJasa' => 9, 'createDate' => 10, 'lastUpdate' => 11, 'softDelete' => 12, 'lastSync' => 13, 'updaterId' => 14, ),
        BasePeer::TYPE_COLNAME => array (UnitUsahaKerjasamaPeer::MOU_ID => 0, UnitUsahaKerjasamaPeer::UNIT_USAHA_ID => 1, UnitUsahaKerjasamaPeer::SUMBER_DANA_ID => 2, UnitUsahaKerjasamaPeer::PRODUK_BARANG_DIHASILKAN => 3, UnitUsahaKerjasamaPeer::JASA_PRODUKSI_DIHASILKAN => 4, UnitUsahaKerjasamaPeer::OMZET_BARANG_PERBULAN => 5, UnitUsahaKerjasamaPeer::OMZET_JASA_PERBULAN => 6, UnitUsahaKerjasamaPeer::PRESTASI_PENGHARGAAN => 7, UnitUsahaKerjasamaPeer::PANGSA_PASAR_PRODUK => 8, UnitUsahaKerjasamaPeer::PANGSA_PASAR_JASA => 9, UnitUsahaKerjasamaPeer::CREATE_DATE => 10, UnitUsahaKerjasamaPeer::LAST_UPDATE => 11, UnitUsahaKerjasamaPeer::SOFT_DELETE => 12, UnitUsahaKerjasamaPeer::LAST_SYNC => 13, UnitUsahaKerjasamaPeer::UPDATER_ID => 14, ),
        BasePeer::TYPE_RAW_COLNAME => array ('MOU_ID' => 0, 'UNIT_USAHA_ID' => 1, 'SUMBER_DANA_ID' => 2, 'PRODUK_BARANG_DIHASILKAN' => 3, 'JASA_PRODUKSI_DIHASILKAN' => 4, 'OMZET_BARANG_PERBULAN' => 5, 'OMZET_JASA_PERBULAN' => 6, 'PRESTASI_PENGHARGAAN' => 7, 'PANGSA_PASAR_PRODUK' => 8, 'PANGSA_PASAR_JASA' => 9, 'CREATE_DATE' => 10, 'LAST_UPDATE' => 11, 'SOFT_DELETE' => 12, 'LAST_SYNC' => 13, 'UPDATER_ID' => 14, ),
        BasePeer::TYPE_FIELDNAME => array ('mou_id' => 0, 'unit_usaha_id' => 1, 'sumber_dana_id' => 2, 'produk_barang_dihasilkan' => 3, 'jasa_produksi_dihasilkan' => 4, 'omzet_barang_perbulan' => 5, 'omzet_jasa_perbulan' => 6, 'prestasi_penghargaan' => 7, 'pangsa_pasar_produk' => 8, 'pangsa_pasar_jasa' => 9, 'create_date' => 10, 'last_update' => 11, 'soft_delete' => 12, 'last_sync' => 13, 'updater_id' => 14, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $toNames = UnitUsahaKerjasamaPeer::getFieldNames($toType);
        $key = isset(UnitUsahaKerjasamaPeer::$fieldKeys[$fromType][$name]) ? UnitUsahaKerjasamaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(UnitUsahaKerjasamaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, UnitUsahaKerjasamaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return UnitUsahaKerjasamaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. UnitUsahaKerjasamaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(UnitUsahaKerjasamaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::MOU_ID);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::PRODUK_BARANG_DIHASILKAN);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::JASA_PRODUKSI_DIHASILKAN);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::OMZET_BARANG_PERBULAN);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::OMZET_JASA_PERBULAN);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::PRESTASI_PENGHARGAAN);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::PANGSA_PASAR_PRODUK);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::PANGSA_PASAR_JASA);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::CREATE_DATE);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::LAST_UPDATE);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::SOFT_DELETE);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::LAST_SYNC);
            $criteria->addSelectColumn(UnitUsahaKerjasamaPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.mou_id');
            $criteria->addSelectColumn($alias . '.unit_usaha_id');
            $criteria->addSelectColumn($alias . '.sumber_dana_id');
            $criteria->addSelectColumn($alias . '.produk_barang_dihasilkan');
            $criteria->addSelectColumn($alias . '.jasa_produksi_dihasilkan');
            $criteria->addSelectColumn($alias . '.omzet_barang_perbulan');
            $criteria->addSelectColumn($alias . '.omzet_jasa_perbulan');
            $criteria->addSelectColumn($alias . '.prestasi_penghargaan');
            $criteria->addSelectColumn($alias . '.pangsa_pasar_produk');
            $criteria->addSelectColumn($alias . '.pangsa_pasar_jasa');
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
        $criteria->setPrimaryTableName(UnitUsahaKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 UnitUsahaKerjasama
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = UnitUsahaKerjasamaPeer::doSelect($critcopy, $con);
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
        return UnitUsahaKerjasamaPeer::populateObjects(UnitUsahaKerjasamaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);

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
     * @param      UnitUsahaKerjasama $obj A UnitUsahaKerjasama object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getMouId(), (string) $obj->getUnitUsahaId()));
            } // if key === null
            UnitUsahaKerjasamaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A UnitUsahaKerjasama object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof UnitUsahaKerjasama) {
                $key = serialize(array((string) $value->getMouId(), (string) $value->getUnitUsahaId()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or UnitUsahaKerjasama object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(UnitUsahaKerjasamaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   UnitUsahaKerjasama Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(UnitUsahaKerjasamaPeer::$instances[$key])) {
                return UnitUsahaKerjasamaPeer::$instances[$key];
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
        foreach (UnitUsahaKerjasamaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        UnitUsahaKerjasamaPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to unit_usaha_kerjasama
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
        if ($row[$startcol] === null && $row[$startcol + 1] === null) {
            return null;
        }

        return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1]));
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

        return array((string) $row[$startcol], (string) $row[$startcol + 1]);
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
        $cls = UnitUsahaKerjasamaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = UnitUsahaKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = UnitUsahaKerjasamaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UnitUsahaKerjasamaPeer::addInstanceToPool($obj, $key);
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
     * @return array (UnitUsahaKerjasama object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = UnitUsahaKerjasamaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = UnitUsahaKerjasamaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + UnitUsahaKerjasamaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UnitUsahaKerjasamaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            UnitUsahaKerjasamaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related UnitUsaha table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinUnitUsaha(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UnitUsahaKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, UnitUsahaPeer::UNIT_USAHA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Mou table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMou(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UnitUsahaKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UnitUsahaKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SumberDana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSumberDana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UnitUsahaKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);

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
     * Selects a collection of UnitUsahaKerjasama objects pre-filled with their UnitUsaha objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UnitUsahaKerjasama objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinUnitUsaha(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);
        }

        UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        $startcol = UnitUsahaKerjasamaPeer::NUM_HYDRATE_COLUMNS;
        UnitUsahaPeer::addSelectColumns($criteria);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, UnitUsahaPeer::UNIT_USAHA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UnitUsahaKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UnitUsahaKerjasamaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = UnitUsahaKerjasamaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UnitUsahaKerjasamaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = UnitUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = UnitUsahaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = UnitUsahaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    UnitUsahaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (UnitUsahaKerjasama) to $obj2 (UnitUsaha)
                $obj2->addUnitUsahaKerjasama($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of UnitUsahaKerjasama objects pre-filled with their Mou objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UnitUsahaKerjasama objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMou(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);
        }

        UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        $startcol = UnitUsahaKerjasamaPeer::NUM_HYDRATE_COLUMNS;
        MouPeer::addSelectColumns($criteria);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UnitUsahaKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UnitUsahaKerjasamaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = UnitUsahaKerjasamaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UnitUsahaKerjasamaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MouPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MouPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MouPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MouPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (UnitUsahaKerjasama) to $obj2 (Mou)
                $obj2->addUnitUsahaKerjasama($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of UnitUsahaKerjasama objects pre-filled with their SumberDana objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UnitUsahaKerjasama objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSumberDana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);
        }

        UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        $startcol = UnitUsahaKerjasamaPeer::NUM_HYDRATE_COLUMNS;
        SumberDanaPeer::addSelectColumns($criteria);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UnitUsahaKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UnitUsahaKerjasamaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = UnitUsahaKerjasamaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UnitUsahaKerjasamaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SumberDanaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SumberDanaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SumberDanaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SumberDanaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (UnitUsahaKerjasama) to $obj2 (SumberDana)
                $obj2->addUnitUsahaKerjasama($obj1);

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
        $criteria->setPrimaryTableName(UnitUsahaKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, UnitUsahaPeer::UNIT_USAHA_ID, $join_behavior);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);

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
     * Selects a collection of UnitUsahaKerjasama objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UnitUsahaKerjasama objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);
        }

        UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        $startcol2 = UnitUsahaKerjasamaPeer::NUM_HYDRATE_COLUMNS;

        UnitUsahaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + UnitUsahaPeer::NUM_HYDRATE_COLUMNS;

        MouPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MouPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SumberDanaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, UnitUsahaPeer::UNIT_USAHA_ID, $join_behavior);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UnitUsahaKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UnitUsahaKerjasamaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UnitUsahaKerjasamaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UnitUsahaKerjasamaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined UnitUsaha rows

            $key2 = UnitUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = UnitUsahaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = UnitUsahaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    UnitUsahaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (UnitUsahaKerjasama) to the collection in $obj2 (UnitUsaha)
                $obj2->addUnitUsahaKerjasama($obj1);
            } // if joined row not null

            // Add objects for joined Mou rows

            $key3 = MouPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = MouPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = MouPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MouPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (UnitUsahaKerjasama) to the collection in $obj3 (Mou)
                $obj3->addUnitUsahaKerjasama($obj1);
            } // if joined row not null

            // Add objects for joined SumberDana rows

            $key4 = SumberDanaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = SumberDanaPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = SumberDanaPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SumberDanaPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (UnitUsahaKerjasama) to the collection in $obj4 (SumberDana)
                $obj4->addUnitUsahaKerjasama($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related UnitUsaha table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptUnitUsaha(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UnitUsahaKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(UnitUsahaKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Mou table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMou(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UnitUsahaKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, UnitUsahaPeer::UNIT_USAHA_ID, $join_behavior);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SumberDana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSumberDana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(UnitUsahaKerjasamaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, UnitUsahaPeer::UNIT_USAHA_ID, $join_behavior);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);

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
     * Selects a collection of UnitUsahaKerjasama objects pre-filled with all related objects except UnitUsaha.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UnitUsahaKerjasama objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptUnitUsaha(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);
        }

        UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        $startcol2 = UnitUsahaKerjasamaPeer::NUM_HYDRATE_COLUMNS;

        MouPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MouPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SumberDanaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UnitUsahaKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UnitUsahaKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UnitUsahaKerjasamaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UnitUsahaKerjasamaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UnitUsahaKerjasamaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Mou rows

                $key2 = MouPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = MouPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = MouPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MouPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (UnitUsahaKerjasama) to the collection in $obj2 (Mou)
                $obj2->addUnitUsahaKerjasama($obj1);

            } // if joined row is not null

                // Add objects for joined SumberDana rows

                $key3 = SumberDanaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SumberDanaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SumberDanaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SumberDanaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (UnitUsahaKerjasama) to the collection in $obj3 (SumberDana)
                $obj3->addUnitUsahaKerjasama($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of UnitUsahaKerjasama objects pre-filled with all related objects except Mou.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UnitUsahaKerjasama objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMou(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);
        }

        UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        $startcol2 = UnitUsahaKerjasamaPeer::NUM_HYDRATE_COLUMNS;

        UnitUsahaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + UnitUsahaPeer::NUM_HYDRATE_COLUMNS;

        SumberDanaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SumberDanaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, UnitUsahaPeer::UNIT_USAHA_ID, $join_behavior);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, SumberDanaPeer::SUMBER_DANA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UnitUsahaKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UnitUsahaKerjasamaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UnitUsahaKerjasamaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UnitUsahaKerjasamaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined UnitUsaha rows

                $key2 = UnitUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = UnitUsahaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = UnitUsahaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    UnitUsahaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (UnitUsahaKerjasama) to the collection in $obj2 (UnitUsaha)
                $obj2->addUnitUsahaKerjasama($obj1);

            } // if joined row is not null

                // Add objects for joined SumberDana rows

                $key3 = SumberDanaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SumberDanaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SumberDanaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SumberDanaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (UnitUsahaKerjasama) to the collection in $obj3 (SumberDana)
                $obj3->addUnitUsahaKerjasama($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of UnitUsahaKerjasama objects pre-filled with all related objects except SumberDana.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of UnitUsahaKerjasama objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSumberDana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);
        }

        UnitUsahaKerjasamaPeer::addSelectColumns($criteria);
        $startcol2 = UnitUsahaKerjasamaPeer::NUM_HYDRATE_COLUMNS;

        UnitUsahaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + UnitUsahaPeer::NUM_HYDRATE_COLUMNS;

        MouPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MouPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, UnitUsahaPeer::UNIT_USAHA_ID, $join_behavior);

        $criteria->addJoin(UnitUsahaKerjasamaPeer::MOU_ID, MouPeer::MOU_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = UnitUsahaKerjasamaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = UnitUsahaKerjasamaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = UnitUsahaKerjasamaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                UnitUsahaKerjasamaPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined UnitUsaha rows

                $key2 = UnitUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = UnitUsahaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = UnitUsahaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    UnitUsahaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (UnitUsahaKerjasama) to the collection in $obj2 (UnitUsaha)
                $obj2->addUnitUsahaKerjasama($obj1);

            } // if joined row is not null

                // Add objects for joined Mou rows

                $key3 = MouPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = MouPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = MouPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MouPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (UnitUsahaKerjasama) to the collection in $obj3 (Mou)
                $obj3->addUnitUsahaKerjasama($obj1);

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
        return Propel::getDatabaseMap(UnitUsahaKerjasamaPeer::DATABASE_NAME)->getTable(UnitUsahaKerjasamaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseUnitUsahaKerjasamaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseUnitUsahaKerjasamaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new UnitUsahaKerjasamaTableMap());
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
        return UnitUsahaKerjasamaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a UnitUsahaKerjasama or Criteria object.
     *
     * @param      mixed $values Criteria or UnitUsahaKerjasama object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from UnitUsahaKerjasama object
        }


        // Set the correct dbName
        $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a UnitUsahaKerjasama or Criteria object.
     *
     * @param      mixed $values Criteria or UnitUsahaKerjasama object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(UnitUsahaKerjasamaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(UnitUsahaKerjasamaPeer::MOU_ID);
            $value = $criteria->remove(UnitUsahaKerjasamaPeer::MOU_ID);
            if ($value) {
                $selectCriteria->add(UnitUsahaKerjasamaPeer::MOU_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(UnitUsahaKerjasamaPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID);
            $value = $criteria->remove(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID);
            if ($value) {
                $selectCriteria->add(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(UnitUsahaKerjasamaPeer::TABLE_NAME);
            }

        } else { // $values is UnitUsahaKerjasama object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the unit_usaha_kerjasama table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(UnitUsahaKerjasamaPeer::TABLE_NAME, $con, UnitUsahaKerjasamaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UnitUsahaKerjasamaPeer::clearInstancePool();
            UnitUsahaKerjasamaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a UnitUsahaKerjasama or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or UnitUsahaKerjasama object or primary key or array of primary keys
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
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            UnitUsahaKerjasamaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof UnitUsahaKerjasama) { // it's a model object
            // invalidate the cache for this single object
            UnitUsahaKerjasamaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UnitUsahaKerjasamaPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(UnitUsahaKerjasamaPeer::MOU_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                UnitUsahaKerjasamaPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(UnitUsahaKerjasamaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            UnitUsahaKerjasamaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given UnitUsahaKerjasama object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      UnitUsahaKerjasama $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(UnitUsahaKerjasamaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(UnitUsahaKerjasamaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(UnitUsahaKerjasamaPeer::DATABASE_NAME, UnitUsahaKerjasamaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $mou_id
     * @param   string $unit_usaha_id
     * @param      PropelPDO $con
     * @return   UnitUsahaKerjasama
     */
    public static function retrieveByPK($mou_id, $unit_usaha_id, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $mou_id, (string) $unit_usaha_id));
         if (null !== ($obj = UnitUsahaKerjasamaPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(UnitUsahaKerjasamaPeer::DATABASE_NAME);
        $criteria->add(UnitUsahaKerjasamaPeer::MOU_ID, $mou_id);
        $criteria->add(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, $unit_usaha_id);
        $v = UnitUsahaKerjasamaPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseUnitUsahaKerjasamaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseUnitUsahaKerjasamaPeer::buildTableMap();

