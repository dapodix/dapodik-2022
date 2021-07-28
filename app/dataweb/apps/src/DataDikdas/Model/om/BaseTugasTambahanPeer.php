<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JabatanTugasPtkPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\RuangPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\TugasTambahan;
use DataDikdas\Model\TugasTambahanPeer;
use DataDikdas\Model\map\TugasTambahanTableMap;

/**
 * Base static class for performing query and update operations on the 'tugas_tambahan' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseTugasTambahanPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'tugas_tambahan';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\TugasTambahan';

    /** the related TableMap class for this table */
    const TM_CLASS = 'TugasTambahanTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 14;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 14;

    /** the column name for the ptk_tugas_tambahan_id field */
    const PTK_TUGAS_TAMBAHAN_ID = 'tugas_tambahan.ptk_tugas_tambahan_id';

    /** the column name for the ptk_id field */
    const PTK_ID = 'tugas_tambahan.ptk_id';

    /** the column name for the id_ruang field */
    const ID_RUANG = 'tugas_tambahan.id_ruang';

    /** the column name for the jabatan_ptk_id field */
    const JABATAN_PTK_ID = 'tugas_tambahan.jabatan_ptk_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'tugas_tambahan.sekolah_id';

    /** the column name for the jumlah_jam field */
    const JUMLAH_JAM = 'tugas_tambahan.jumlah_jam';

    /** the column name for the nomor_sk field */
    const NOMOR_SK = 'tugas_tambahan.nomor_sk';

    /** the column name for the tmt_tambahan field */
    const TMT_TAMBAHAN = 'tugas_tambahan.tmt_tambahan';

    /** the column name for the tst_tambahan field */
    const TST_TAMBAHAN = 'tugas_tambahan.tst_tambahan';

    /** the column name for the create_date field */
    const CREATE_DATE = 'tugas_tambahan.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'tugas_tambahan.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'tugas_tambahan.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'tugas_tambahan.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'tugas_tambahan.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of TugasTambahan objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array TugasTambahan[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. TugasTambahanPeer::$fieldNames[TugasTambahanPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('PtkTugasTambahanId', 'PtkId', 'IdRuang', 'JabatanPtkId', 'SekolahId', 'JumlahJam', 'NomorSk', 'TmtTambahan', 'TstTambahan', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('ptkTugasTambahanId', 'ptkId', 'idRuang', 'jabatanPtkId', 'sekolahId', 'jumlahJam', 'nomorSk', 'tmtTambahan', 'tstTambahan', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID, TugasTambahanPeer::PTK_ID, TugasTambahanPeer::ID_RUANG, TugasTambahanPeer::JABATAN_PTK_ID, TugasTambahanPeer::SEKOLAH_ID, TugasTambahanPeer::JUMLAH_JAM, TugasTambahanPeer::NOMOR_SK, TugasTambahanPeer::TMT_TAMBAHAN, TugasTambahanPeer::TST_TAMBAHAN, TugasTambahanPeer::CREATE_DATE, TugasTambahanPeer::LAST_UPDATE, TugasTambahanPeer::SOFT_DELETE, TugasTambahanPeer::LAST_SYNC, TugasTambahanPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PTK_TUGAS_TAMBAHAN_ID', 'PTK_ID', 'ID_RUANG', 'JABATAN_PTK_ID', 'SEKOLAH_ID', 'JUMLAH_JAM', 'NOMOR_SK', 'TMT_TAMBAHAN', 'TST_TAMBAHAN', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('ptk_tugas_tambahan_id', 'ptk_id', 'id_ruang', 'jabatan_ptk_id', 'sekolah_id', 'jumlah_jam', 'nomor_sk', 'tmt_tambahan', 'tst_tambahan', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. TugasTambahanPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('PtkTugasTambahanId' => 0, 'PtkId' => 1, 'IdRuang' => 2, 'JabatanPtkId' => 3, 'SekolahId' => 4, 'JumlahJam' => 5, 'NomorSk' => 6, 'TmtTambahan' => 7, 'TstTambahan' => 8, 'CreateDate' => 9, 'LastUpdate' => 10, 'SoftDelete' => 11, 'LastSync' => 12, 'UpdaterId' => 13, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('ptkTugasTambahanId' => 0, 'ptkId' => 1, 'idRuang' => 2, 'jabatanPtkId' => 3, 'sekolahId' => 4, 'jumlahJam' => 5, 'nomorSk' => 6, 'tmtTambahan' => 7, 'tstTambahan' => 8, 'createDate' => 9, 'lastUpdate' => 10, 'softDelete' => 11, 'lastSync' => 12, 'updaterId' => 13, ),
        BasePeer::TYPE_COLNAME => array (TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID => 0, TugasTambahanPeer::PTK_ID => 1, TugasTambahanPeer::ID_RUANG => 2, TugasTambahanPeer::JABATAN_PTK_ID => 3, TugasTambahanPeer::SEKOLAH_ID => 4, TugasTambahanPeer::JUMLAH_JAM => 5, TugasTambahanPeer::NOMOR_SK => 6, TugasTambahanPeer::TMT_TAMBAHAN => 7, TugasTambahanPeer::TST_TAMBAHAN => 8, TugasTambahanPeer::CREATE_DATE => 9, TugasTambahanPeer::LAST_UPDATE => 10, TugasTambahanPeer::SOFT_DELETE => 11, TugasTambahanPeer::LAST_SYNC => 12, TugasTambahanPeer::UPDATER_ID => 13, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PTK_TUGAS_TAMBAHAN_ID' => 0, 'PTK_ID' => 1, 'ID_RUANG' => 2, 'JABATAN_PTK_ID' => 3, 'SEKOLAH_ID' => 4, 'JUMLAH_JAM' => 5, 'NOMOR_SK' => 6, 'TMT_TAMBAHAN' => 7, 'TST_TAMBAHAN' => 8, 'CREATE_DATE' => 9, 'LAST_UPDATE' => 10, 'SOFT_DELETE' => 11, 'LAST_SYNC' => 12, 'UPDATER_ID' => 13, ),
        BasePeer::TYPE_FIELDNAME => array ('ptk_tugas_tambahan_id' => 0, 'ptk_id' => 1, 'id_ruang' => 2, 'jabatan_ptk_id' => 3, 'sekolah_id' => 4, 'jumlah_jam' => 5, 'nomor_sk' => 6, 'tmt_tambahan' => 7, 'tst_tambahan' => 8, 'create_date' => 9, 'last_update' => 10, 'soft_delete' => 11, 'last_sync' => 12, 'updater_id' => 13, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
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
        $toNames = TugasTambahanPeer::getFieldNames($toType);
        $key = isset(TugasTambahanPeer::$fieldKeys[$fromType][$name]) ? TugasTambahanPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(TugasTambahanPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, TugasTambahanPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return TugasTambahanPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. TugasTambahanPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(TugasTambahanPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID);
            $criteria->addSelectColumn(TugasTambahanPeer::PTK_ID);
            $criteria->addSelectColumn(TugasTambahanPeer::ID_RUANG);
            $criteria->addSelectColumn(TugasTambahanPeer::JABATAN_PTK_ID);
            $criteria->addSelectColumn(TugasTambahanPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(TugasTambahanPeer::JUMLAH_JAM);
            $criteria->addSelectColumn(TugasTambahanPeer::NOMOR_SK);
            $criteria->addSelectColumn(TugasTambahanPeer::TMT_TAMBAHAN);
            $criteria->addSelectColumn(TugasTambahanPeer::TST_TAMBAHAN);
            $criteria->addSelectColumn(TugasTambahanPeer::CREATE_DATE);
            $criteria->addSelectColumn(TugasTambahanPeer::LAST_UPDATE);
            $criteria->addSelectColumn(TugasTambahanPeer::SOFT_DELETE);
            $criteria->addSelectColumn(TugasTambahanPeer::LAST_SYNC);
            $criteria->addSelectColumn(TugasTambahanPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.ptk_tugas_tambahan_id');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.id_ruang');
            $criteria->addSelectColumn($alias . '.jabatan_ptk_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.jumlah_jam');
            $criteria->addSelectColumn($alias . '.nomor_sk');
            $criteria->addSelectColumn($alias . '.tmt_tambahan');
            $criteria->addSelectColumn($alias . '.tst_tambahan');
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
        $criteria->setPrimaryTableName(TugasTambahanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TugasTambahanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TugasTambahan
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = TugasTambahanPeer::doSelect($critcopy, $con);
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
        return TugasTambahanPeer::populateObjects(TugasTambahanPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            TugasTambahanPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

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
     * @param      TugasTambahan $obj A TugasTambahan object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getPtkTugasTambahanId();
            } // if key === null
            TugasTambahanPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A TugasTambahan object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof TugasTambahan) {
                $key = (string) $value->getPtkTugasTambahanId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or TugasTambahan object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(TugasTambahanPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   TugasTambahan Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(TugasTambahanPeer::$instances[$key])) {
                return TugasTambahanPeer::$instances[$key];
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
        foreach (TugasTambahanPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        TugasTambahanPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to tugas_tambahan
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
        $cls = TugasTambahanPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = TugasTambahanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = TugasTambahanPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TugasTambahanPeer::addInstanceToPool($obj, $key);
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
     * @return array (TugasTambahan object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = TugasTambahanPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = TugasTambahanPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + TugasTambahanPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TugasTambahanPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            TugasTambahanPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(TugasTambahanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TugasTambahanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TugasTambahanPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JabatanTugasPtk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJabatanTugasPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TugasTambahanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TugasTambahanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TugasTambahanPeer::JABATAN_PTK_ID, JabatanTugasPtkPeer::JABATAN_PTK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(TugasTambahanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TugasTambahanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TugasTambahanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(TugasTambahanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TugasTambahanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TugasTambahanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of TugasTambahan objects pre-filled with their Ruang objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TugasTambahan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRuang(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);
        }

        TugasTambahanPeer::addSelectColumns($criteria);
        $startcol = TugasTambahanPeer::NUM_HYDRATE_COLUMNS;
        RuangPeer::addSelectColumns($criteria);

        $criteria->addJoin(TugasTambahanPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TugasTambahanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TugasTambahanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TugasTambahanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TugasTambahanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (TugasTambahan) to $obj2 (Ruang)
                $obj2->addTugasTambahan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TugasTambahan objects pre-filled with their JabatanTugasPtk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TugasTambahan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJabatanTugasPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);
        }

        TugasTambahanPeer::addSelectColumns($criteria);
        $startcol = TugasTambahanPeer::NUM_HYDRATE_COLUMNS;
        JabatanTugasPtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(TugasTambahanPeer::JABATAN_PTK_ID, JabatanTugasPtkPeer::JABATAN_PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TugasTambahanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TugasTambahanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TugasTambahanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TugasTambahanPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JabatanTugasPtkPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JabatanTugasPtkPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JabatanTugasPtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JabatanTugasPtkPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TugasTambahan) to $obj2 (JabatanTugasPtk)
                $obj2->addTugasTambahan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TugasTambahan objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TugasTambahan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);
        }

        TugasTambahanPeer::addSelectColumns($criteria);
        $startcol = TugasTambahanPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(TugasTambahanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TugasTambahanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TugasTambahanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TugasTambahanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TugasTambahanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (TugasTambahan) to $obj2 (Ptk)
                $obj2->addTugasTambahan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TugasTambahan objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TugasTambahan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);
        }

        TugasTambahanPeer::addSelectColumns($criteria);
        $startcol = TugasTambahanPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(TugasTambahanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TugasTambahanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TugasTambahanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TugasTambahanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TugasTambahanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (TugasTambahan) to $obj2 (Sekolah)
                $obj2->addTugasTambahan($obj1);

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
        $criteria->setPrimaryTableName(TugasTambahanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TugasTambahanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TugasTambahanPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::JABATAN_PTK_ID, JabatanTugasPtkPeer::JABATAN_PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of TugasTambahan objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TugasTambahan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);
        }

        TugasTambahanPeer::addSelectColumns($criteria);
        $startcol2 = TugasTambahanPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        JabatanTugasPtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JabatanTugasPtkPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PtkPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TugasTambahanPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::JABATAN_PTK_ID, JabatanTugasPtkPeer::JABATAN_PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TugasTambahanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TugasTambahanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TugasTambahanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TugasTambahanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Ruang rows

            $key2 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = RuangPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RuangPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RuangPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (TugasTambahan) to the collection in $obj2 (Ruang)
                $obj2->addTugasTambahan($obj1);
            } // if joined row not null

            // Add objects for joined JabatanTugasPtk rows

            $key3 = JabatanTugasPtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JabatanTugasPtkPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JabatanTugasPtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JabatanTugasPtkPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (TugasTambahan) to the collection in $obj3 (JabatanTugasPtk)
                $obj3->addTugasTambahan($obj1);
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

                // Add the $obj1 (TugasTambahan) to the collection in $obj4 (Ptk)
                $obj4->addTugasTambahan($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key5 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = SekolahPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = SekolahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SekolahPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (TugasTambahan) to the collection in $obj5 (Sekolah)
                $obj5->addTugasTambahan($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
        $criteria->setPrimaryTableName(TugasTambahanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TugasTambahanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TugasTambahanPeer::JABATAN_PTK_ID, JabatanTugasPtkPeer::JABATAN_PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JabatanTugasPtk table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJabatanTugasPtk(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TugasTambahanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TugasTambahanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TugasTambahanPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(TugasTambahanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TugasTambahanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TugasTambahanPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::JABATAN_PTK_ID, JabatanTugasPtkPeer::JABATAN_PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(TugasTambahanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TugasTambahanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TugasTambahanPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::JABATAN_PTK_ID, JabatanTugasPtkPeer::JABATAN_PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Selects a collection of TugasTambahan objects pre-filled with all related objects except Ruang.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TugasTambahan objects.
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
            $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);
        }

        TugasTambahanPeer::addSelectColumns($criteria);
        $startcol2 = TugasTambahanPeer::NUM_HYDRATE_COLUMNS;

        JabatanTugasPtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JabatanTugasPtkPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TugasTambahanPeer::JABATAN_PTK_ID, JabatanTugasPtkPeer::JABATAN_PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TugasTambahanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TugasTambahanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TugasTambahanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TugasTambahanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JabatanTugasPtk rows

                $key2 = JabatanTugasPtkPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JabatanTugasPtkPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JabatanTugasPtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JabatanTugasPtkPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TugasTambahan) to the collection in $obj2 (JabatanTugasPtk)
                $obj2->addTugasTambahan($obj1);

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

                // Add the $obj1 (TugasTambahan) to the collection in $obj3 (Ptk)
                $obj3->addTugasTambahan($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TugasTambahan) to the collection in $obj4 (Sekolah)
                $obj4->addTugasTambahan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TugasTambahan objects pre-filled with all related objects except JabatanTugasPtk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TugasTambahan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJabatanTugasPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);
        }

        TugasTambahanPeer::addSelectColumns($criteria);
        $startcol2 = TugasTambahanPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TugasTambahanPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TugasTambahanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TugasTambahanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TugasTambahanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TugasTambahanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ruang rows

                $key2 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RuangPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RuangPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TugasTambahan) to the collection in $obj2 (Ruang)
                $obj2->addTugasTambahan($obj1);

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

                // Add the $obj1 (TugasTambahan) to the collection in $obj3 (Ptk)
                $obj3->addTugasTambahan($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TugasTambahan) to the collection in $obj4 (Sekolah)
                $obj4->addTugasTambahan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TugasTambahan objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TugasTambahan objects.
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
            $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);
        }

        TugasTambahanPeer::addSelectColumns($criteria);
        $startcol2 = TugasTambahanPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        JabatanTugasPtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JabatanTugasPtkPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TugasTambahanPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::JABATAN_PTK_ID, JabatanTugasPtkPeer::JABATAN_PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TugasTambahanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TugasTambahanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TugasTambahanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TugasTambahanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ruang rows

                $key2 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RuangPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RuangPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TugasTambahan) to the collection in $obj2 (Ruang)
                $obj2->addTugasTambahan($obj1);

            } // if joined row is not null

                // Add objects for joined JabatanTugasPtk rows

                $key3 = JabatanTugasPtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JabatanTugasPtkPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JabatanTugasPtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JabatanTugasPtkPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TugasTambahan) to the collection in $obj3 (JabatanTugasPtk)
                $obj3->addTugasTambahan($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TugasTambahan) to the collection in $obj4 (Sekolah)
                $obj4->addTugasTambahan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TugasTambahan objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TugasTambahan objects.
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
            $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);
        }

        TugasTambahanPeer::addSelectColumns($criteria);
        $startcol2 = TugasTambahanPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        JabatanTugasPtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JabatanTugasPtkPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PtkPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TugasTambahanPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::JABATAN_PTK_ID, JabatanTugasPtkPeer::JABATAN_PTK_ID, $join_behavior);

        $criteria->addJoin(TugasTambahanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TugasTambahanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TugasTambahanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TugasTambahanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TugasTambahanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ruang rows

                $key2 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RuangPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RuangPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TugasTambahan) to the collection in $obj2 (Ruang)
                $obj2->addTugasTambahan($obj1);

            } // if joined row is not null

                // Add objects for joined JabatanTugasPtk rows

                $key3 = JabatanTugasPtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JabatanTugasPtkPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JabatanTugasPtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JabatanTugasPtkPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TugasTambahan) to the collection in $obj3 (JabatanTugasPtk)
                $obj3->addTugasTambahan($obj1);

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

                // Add the $obj1 (TugasTambahan) to the collection in $obj4 (Ptk)
                $obj4->addTugasTambahan($obj1);

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
        return Propel::getDatabaseMap(TugasTambahanPeer::DATABASE_NAME)->getTable(TugasTambahanPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseTugasTambahanPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseTugasTambahanPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new TugasTambahanTableMap());
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
        return TugasTambahanPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a TugasTambahan or Criteria object.
     *
     * @param      mixed $values Criteria or TugasTambahan object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from TugasTambahan object
        }


        // Set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a TugasTambahan or Criteria object.
     *
     * @param      mixed $values Criteria or TugasTambahan object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(TugasTambahanPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID);
            $value = $criteria->remove(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID);
            if ($value) {
                $selectCriteria->add(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TugasTambahanPeer::TABLE_NAME);
            }

        } else { // $values is TugasTambahan object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the tugas_tambahan table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(TugasTambahanPeer::TABLE_NAME, $con, TugasTambahanPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TugasTambahanPeer::clearInstancePool();
            TugasTambahanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a TugasTambahan or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or TugasTambahan object or primary key or array of primary keys
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
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            TugasTambahanPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof TugasTambahan) { // it's a model object
            // invalidate the cache for this single object
            TugasTambahanPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TugasTambahanPeer::DATABASE_NAME);
            $criteria->add(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                TugasTambahanPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(TugasTambahanPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            TugasTambahanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given TugasTambahan object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      TugasTambahan $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(TugasTambahanPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(TugasTambahanPeer::TABLE_NAME);

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

        return BasePeer::doValidate(TugasTambahanPeer::DATABASE_NAME, TugasTambahanPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return TugasTambahan
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = TugasTambahanPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(TugasTambahanPeer::DATABASE_NAME);
        $criteria->add(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID, $pk);

        $v = TugasTambahanPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return TugasTambahan[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(TugasTambahanPeer::DATABASE_NAME);
            $criteria->add(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID, $pks, Criteria::IN);
            $objs = TugasTambahanPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseTugasTambahanPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTugasTambahanPeer::buildTableMap();

