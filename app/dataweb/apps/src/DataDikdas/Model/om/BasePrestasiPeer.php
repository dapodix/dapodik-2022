<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisPrestasiPeer;
use DataDikdas\Model\PesertaDidikPeer;
use DataDikdas\Model\Prestasi;
use DataDikdas\Model\PrestasiPeer;
use DataDikdas\Model\TingkatPrestasiPeer;
use DataDikdas\Model\map\PrestasiTableMap;

/**
 * Base static class for performing query and update operations on the 'prestasi' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BasePrestasiPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'prestasi';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Prestasi';

    /** the related TableMap class for this table */
    const TM_CLASS = 'PrestasiTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 14;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 14;

    /** the column name for the prestasi_id field */
    const PRESTASI_ID = 'prestasi.prestasi_id';

    /** the column name for the jenis_prestasi_id field */
    const JENIS_PRESTASI_ID = 'prestasi.jenis_prestasi_id';

    /** the column name for the tingkat_prestasi_id field */
    const TINGKAT_PRESTASI_ID = 'prestasi.tingkat_prestasi_id';

    /** the column name for the peserta_didik_id field */
    const PESERTA_DIDIK_ID = 'prestasi.peserta_didik_id';

    /** the column name for the nama field */
    const NAMA = 'prestasi.nama';

    /** the column name for the tahun_prestasi field */
    const TAHUN_PRESTASI = 'prestasi.tahun_prestasi';

    /** the column name for the penyelenggara field */
    const PENYELENGGARA = 'prestasi.penyelenggara';

    /** the column name for the peringkat field */
    const PERINGKAT = 'prestasi.peringkat';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'prestasi.asal_data';

    /** the column name for the create_date field */
    const CREATE_DATE = 'prestasi.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'prestasi.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'prestasi.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'prestasi.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'prestasi.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Prestasi objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Prestasi[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PrestasiPeer::$fieldNames[PrestasiPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('PrestasiId', 'JenisPrestasiId', 'TingkatPrestasiId', 'PesertaDidikId', 'Nama', 'TahunPrestasi', 'Penyelenggara', 'Peringkat', 'AsalData', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('prestasiId', 'jenisPrestasiId', 'tingkatPrestasiId', 'pesertaDidikId', 'nama', 'tahunPrestasi', 'penyelenggara', 'peringkat', 'asalData', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (PrestasiPeer::PRESTASI_ID, PrestasiPeer::JENIS_PRESTASI_ID, PrestasiPeer::TINGKAT_PRESTASI_ID, PrestasiPeer::PESERTA_DIDIK_ID, PrestasiPeer::NAMA, PrestasiPeer::TAHUN_PRESTASI, PrestasiPeer::PENYELENGGARA, PrestasiPeer::PERINGKAT, PrestasiPeer::ASAL_DATA, PrestasiPeer::CREATE_DATE, PrestasiPeer::LAST_UPDATE, PrestasiPeer::SOFT_DELETE, PrestasiPeer::LAST_SYNC, PrestasiPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PRESTASI_ID', 'JENIS_PRESTASI_ID', 'TINGKAT_PRESTASI_ID', 'PESERTA_DIDIK_ID', 'NAMA', 'TAHUN_PRESTASI', 'PENYELENGGARA', 'PERINGKAT', 'ASAL_DATA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('prestasi_id', 'jenis_prestasi_id', 'tingkat_prestasi_id', 'peserta_didik_id', 'nama', 'tahun_prestasi', 'penyelenggara', 'peringkat', 'asal_data', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PrestasiPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('PrestasiId' => 0, 'JenisPrestasiId' => 1, 'TingkatPrestasiId' => 2, 'PesertaDidikId' => 3, 'Nama' => 4, 'TahunPrestasi' => 5, 'Penyelenggara' => 6, 'Peringkat' => 7, 'AsalData' => 8, 'CreateDate' => 9, 'LastUpdate' => 10, 'SoftDelete' => 11, 'LastSync' => 12, 'UpdaterId' => 13, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('prestasiId' => 0, 'jenisPrestasiId' => 1, 'tingkatPrestasiId' => 2, 'pesertaDidikId' => 3, 'nama' => 4, 'tahunPrestasi' => 5, 'penyelenggara' => 6, 'peringkat' => 7, 'asalData' => 8, 'createDate' => 9, 'lastUpdate' => 10, 'softDelete' => 11, 'lastSync' => 12, 'updaterId' => 13, ),
        BasePeer::TYPE_COLNAME => array (PrestasiPeer::PRESTASI_ID => 0, PrestasiPeer::JENIS_PRESTASI_ID => 1, PrestasiPeer::TINGKAT_PRESTASI_ID => 2, PrestasiPeer::PESERTA_DIDIK_ID => 3, PrestasiPeer::NAMA => 4, PrestasiPeer::TAHUN_PRESTASI => 5, PrestasiPeer::PENYELENGGARA => 6, PrestasiPeer::PERINGKAT => 7, PrestasiPeer::ASAL_DATA => 8, PrestasiPeer::CREATE_DATE => 9, PrestasiPeer::LAST_UPDATE => 10, PrestasiPeer::SOFT_DELETE => 11, PrestasiPeer::LAST_SYNC => 12, PrestasiPeer::UPDATER_ID => 13, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PRESTASI_ID' => 0, 'JENIS_PRESTASI_ID' => 1, 'TINGKAT_PRESTASI_ID' => 2, 'PESERTA_DIDIK_ID' => 3, 'NAMA' => 4, 'TAHUN_PRESTASI' => 5, 'PENYELENGGARA' => 6, 'PERINGKAT' => 7, 'ASAL_DATA' => 8, 'CREATE_DATE' => 9, 'LAST_UPDATE' => 10, 'SOFT_DELETE' => 11, 'LAST_SYNC' => 12, 'UPDATER_ID' => 13, ),
        BasePeer::TYPE_FIELDNAME => array ('prestasi_id' => 0, 'jenis_prestasi_id' => 1, 'tingkat_prestasi_id' => 2, 'peserta_didik_id' => 3, 'nama' => 4, 'tahun_prestasi' => 5, 'penyelenggara' => 6, 'peringkat' => 7, 'asal_data' => 8, 'create_date' => 9, 'last_update' => 10, 'soft_delete' => 11, 'last_sync' => 12, 'updater_id' => 13, ),
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
        $toNames = PrestasiPeer::getFieldNames($toType);
        $key = isset(PrestasiPeer::$fieldKeys[$fromType][$name]) ? PrestasiPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(PrestasiPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, PrestasiPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PrestasiPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. PrestasiPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PrestasiPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(PrestasiPeer::PRESTASI_ID);
            $criteria->addSelectColumn(PrestasiPeer::JENIS_PRESTASI_ID);
            $criteria->addSelectColumn(PrestasiPeer::TINGKAT_PRESTASI_ID);
            $criteria->addSelectColumn(PrestasiPeer::PESERTA_DIDIK_ID);
            $criteria->addSelectColumn(PrestasiPeer::NAMA);
            $criteria->addSelectColumn(PrestasiPeer::TAHUN_PRESTASI);
            $criteria->addSelectColumn(PrestasiPeer::PENYELENGGARA);
            $criteria->addSelectColumn(PrestasiPeer::PERINGKAT);
            $criteria->addSelectColumn(PrestasiPeer::ASAL_DATA);
            $criteria->addSelectColumn(PrestasiPeer::CREATE_DATE);
            $criteria->addSelectColumn(PrestasiPeer::LAST_UPDATE);
            $criteria->addSelectColumn(PrestasiPeer::SOFT_DELETE);
            $criteria->addSelectColumn(PrestasiPeer::LAST_SYNC);
            $criteria->addSelectColumn(PrestasiPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.prestasi_id');
            $criteria->addSelectColumn($alias . '.jenis_prestasi_id');
            $criteria->addSelectColumn($alias . '.tingkat_prestasi_id');
            $criteria->addSelectColumn($alias . '.peserta_didik_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.tahun_prestasi');
            $criteria->addSelectColumn($alias . '.penyelenggara');
            $criteria->addSelectColumn($alias . '.peringkat');
            $criteria->addSelectColumn($alias . '.asal_data');
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
        $criteria->setPrimaryTableName(PrestasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PrestasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PrestasiPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Prestasi
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PrestasiPeer::doSelect($critcopy, $con);
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
        return PrestasiPeer::populateObjects(PrestasiPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PrestasiPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PrestasiPeer::DATABASE_NAME);

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
     * @param      Prestasi $obj A Prestasi object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getPrestasiId();
            } // if key === null
            PrestasiPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Prestasi object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Prestasi) {
                $key = (string) $value->getPrestasiId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Prestasi object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(PrestasiPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Prestasi Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PrestasiPeer::$instances[$key])) {
                return PrestasiPeer::$instances[$key];
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
        foreach (PrestasiPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        PrestasiPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to prestasi
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
        $cls = PrestasiPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PrestasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PrestasiPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PrestasiPeer::addInstanceToPool($obj, $key);
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
     * @return array (Prestasi object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PrestasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PrestasiPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PrestasiPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PrestasiPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PrestasiPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisPrestasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisPrestasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PrestasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PrestasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PrestasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PrestasiPeer::JENIS_PRESTASI_ID, JenisPrestasiPeer::JENIS_PRESTASI_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related TingkatPrestasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinTingkatPrestasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PrestasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PrestasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PrestasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PrestasiPeer::TINGKAT_PRESTASI_ID, TingkatPrestasiPeer::TINGKAT_PRESTASI_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PesertaDidik table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPesertaDidik(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PrestasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PrestasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PrestasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PrestasiPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
     * Selects a collection of Prestasi objects pre-filled with their JenisPrestasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Prestasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisPrestasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PrestasiPeer::DATABASE_NAME);
        }

        PrestasiPeer::addSelectColumns($criteria);
        $startcol = PrestasiPeer::NUM_HYDRATE_COLUMNS;
        JenisPrestasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(PrestasiPeer::JENIS_PRESTASI_ID, JenisPrestasiPeer::JENIS_PRESTASI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PrestasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PrestasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PrestasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PrestasiPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisPrestasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisPrestasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisPrestasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisPrestasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Prestasi) to $obj2 (JenisPrestasi)
                $obj2->addPrestasi($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Prestasi objects pre-filled with their TingkatPrestasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Prestasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTingkatPrestasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PrestasiPeer::DATABASE_NAME);
        }

        PrestasiPeer::addSelectColumns($criteria);
        $startcol = PrestasiPeer::NUM_HYDRATE_COLUMNS;
        TingkatPrestasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(PrestasiPeer::TINGKAT_PRESTASI_ID, TingkatPrestasiPeer::TINGKAT_PRESTASI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PrestasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PrestasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PrestasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PrestasiPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = TingkatPrestasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = TingkatPrestasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = TingkatPrestasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    TingkatPrestasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Prestasi) to $obj2 (TingkatPrestasi)
                $obj2->addPrestasi($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Prestasi objects pre-filled with their PesertaDidik objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Prestasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPesertaDidik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PrestasiPeer::DATABASE_NAME);
        }

        PrestasiPeer::addSelectColumns($criteria);
        $startcol = PrestasiPeer::NUM_HYDRATE_COLUMNS;
        PesertaDidikPeer::addSelectColumns($criteria);

        $criteria->addJoin(PrestasiPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PrestasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PrestasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PrestasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PrestasiPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PesertaDidikPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PesertaDidikPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PesertaDidikPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Prestasi) to $obj2 (PesertaDidik)
                $obj2->addPrestasi($obj1);

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
        $criteria->setPrimaryTableName(PrestasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PrestasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PrestasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PrestasiPeer::JENIS_PRESTASI_ID, JenisPrestasiPeer::JENIS_PRESTASI_ID, $join_behavior);

        $criteria->addJoin(PrestasiPeer::TINGKAT_PRESTASI_ID, TingkatPrestasiPeer::TINGKAT_PRESTASI_ID, $join_behavior);

        $criteria->addJoin(PrestasiPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
     * Selects a collection of Prestasi objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Prestasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PrestasiPeer::DATABASE_NAME);
        }

        PrestasiPeer::addSelectColumns($criteria);
        $startcol2 = PrestasiPeer::NUM_HYDRATE_COLUMNS;

        JenisPrestasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisPrestasiPeer::NUM_HYDRATE_COLUMNS;

        TingkatPrestasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TingkatPrestasiPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PrestasiPeer::JENIS_PRESTASI_ID, JenisPrestasiPeer::JENIS_PRESTASI_ID, $join_behavior);

        $criteria->addJoin(PrestasiPeer::TINGKAT_PRESTASI_ID, TingkatPrestasiPeer::TINGKAT_PRESTASI_ID, $join_behavior);

        $criteria->addJoin(PrestasiPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PrestasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PrestasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PrestasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PrestasiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined JenisPrestasi rows

            $key2 = JenisPrestasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = JenisPrestasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisPrestasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisPrestasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Prestasi) to the collection in $obj2 (JenisPrestasi)
                $obj2->addPrestasi($obj1);
            } // if joined row not null

            // Add objects for joined TingkatPrestasi rows

            $key3 = TingkatPrestasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = TingkatPrestasiPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = TingkatPrestasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TingkatPrestasiPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Prestasi) to the collection in $obj3 (TingkatPrestasi)
                $obj3->addPrestasi($obj1);
            } // if joined row not null

            // Add objects for joined PesertaDidik rows

            $key4 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = PesertaDidikPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = PesertaDidikPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PesertaDidikPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Prestasi) to the collection in $obj4 (PesertaDidik)
                $obj4->addPrestasi($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisPrestasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisPrestasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PrestasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PrestasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PrestasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PrestasiPeer::TINGKAT_PRESTASI_ID, TingkatPrestasiPeer::TINGKAT_PRESTASI_ID, $join_behavior);

        $criteria->addJoin(PrestasiPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related TingkatPrestasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptTingkatPrestasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PrestasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PrestasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PrestasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PrestasiPeer::JENIS_PRESTASI_ID, JenisPrestasiPeer::JENIS_PRESTASI_ID, $join_behavior);

        $criteria->addJoin(PrestasiPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PesertaDidik table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPesertaDidik(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(PrestasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PrestasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PrestasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PrestasiPeer::JENIS_PRESTASI_ID, JenisPrestasiPeer::JENIS_PRESTASI_ID, $join_behavior);

        $criteria->addJoin(PrestasiPeer::TINGKAT_PRESTASI_ID, TingkatPrestasiPeer::TINGKAT_PRESTASI_ID, $join_behavior);

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
     * Selects a collection of Prestasi objects pre-filled with all related objects except JenisPrestasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Prestasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisPrestasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PrestasiPeer::DATABASE_NAME);
        }

        PrestasiPeer::addSelectColumns($criteria);
        $startcol2 = PrestasiPeer::NUM_HYDRATE_COLUMNS;

        TingkatPrestasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + TingkatPrestasiPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PrestasiPeer::TINGKAT_PRESTASI_ID, TingkatPrestasiPeer::TINGKAT_PRESTASI_ID, $join_behavior);

        $criteria->addJoin(PrestasiPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PrestasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PrestasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PrestasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PrestasiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined TingkatPrestasi rows

                $key2 = TingkatPrestasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = TingkatPrestasiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = TingkatPrestasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    TingkatPrestasiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Prestasi) to the collection in $obj2 (TingkatPrestasi)
                $obj2->addPrestasi($obj1);

            } // if joined row is not null

                // Add objects for joined PesertaDidik rows

                $key3 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PesertaDidikPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PesertaDidikPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PesertaDidikPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Prestasi) to the collection in $obj3 (PesertaDidik)
                $obj3->addPrestasi($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Prestasi objects pre-filled with all related objects except TingkatPrestasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Prestasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptTingkatPrestasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PrestasiPeer::DATABASE_NAME);
        }

        PrestasiPeer::addSelectColumns($criteria);
        $startcol2 = PrestasiPeer::NUM_HYDRATE_COLUMNS;

        JenisPrestasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisPrestasiPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PrestasiPeer::JENIS_PRESTASI_ID, JenisPrestasiPeer::JENIS_PRESTASI_ID, $join_behavior);

        $criteria->addJoin(PrestasiPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PrestasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PrestasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PrestasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PrestasiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisPrestasi rows

                $key2 = JenisPrestasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisPrestasiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisPrestasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisPrestasiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Prestasi) to the collection in $obj2 (JenisPrestasi)
                $obj2->addPrestasi($obj1);

            } // if joined row is not null

                // Add objects for joined PesertaDidik rows

                $key3 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PesertaDidikPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PesertaDidikPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PesertaDidikPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Prestasi) to the collection in $obj3 (PesertaDidik)
                $obj3->addPrestasi($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Prestasi objects pre-filled with all related objects except PesertaDidik.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Prestasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPesertaDidik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PrestasiPeer::DATABASE_NAME);
        }

        PrestasiPeer::addSelectColumns($criteria);
        $startcol2 = PrestasiPeer::NUM_HYDRATE_COLUMNS;

        JenisPrestasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisPrestasiPeer::NUM_HYDRATE_COLUMNS;

        TingkatPrestasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TingkatPrestasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PrestasiPeer::JENIS_PRESTASI_ID, JenisPrestasiPeer::JENIS_PRESTASI_ID, $join_behavior);

        $criteria->addJoin(PrestasiPeer::TINGKAT_PRESTASI_ID, TingkatPrestasiPeer::TINGKAT_PRESTASI_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PrestasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PrestasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PrestasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PrestasiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisPrestasi rows

                $key2 = JenisPrestasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisPrestasiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisPrestasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisPrestasiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Prestasi) to the collection in $obj2 (JenisPrestasi)
                $obj2->addPrestasi($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPrestasi rows

                $key3 = TingkatPrestasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = TingkatPrestasiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = TingkatPrestasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TingkatPrestasiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Prestasi) to the collection in $obj3 (TingkatPrestasi)
                $obj3->addPrestasi($obj1);

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
        return Propel::getDatabaseMap(PrestasiPeer::DATABASE_NAME)->getTable(PrestasiPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasePrestasiPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasePrestasiPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new PrestasiTableMap());
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
        return PrestasiPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Prestasi or Criteria object.
     *
     * @param      mixed $values Criteria or Prestasi object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Prestasi object
        }


        // Set the correct dbName
        $criteria->setDbName(PrestasiPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Prestasi or Criteria object.
     *
     * @param      mixed $values Criteria or Prestasi object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PrestasiPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PrestasiPeer::PRESTASI_ID);
            $value = $criteria->remove(PrestasiPeer::PRESTASI_ID);
            if ($value) {
                $selectCriteria->add(PrestasiPeer::PRESTASI_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PrestasiPeer::TABLE_NAME);
            }

        } else { // $values is Prestasi object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PrestasiPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the prestasi table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PrestasiPeer::TABLE_NAME, $con, PrestasiPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PrestasiPeer::clearInstancePool();
            PrestasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Prestasi or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Prestasi object or primary key or array of primary keys
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
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PrestasiPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Prestasi) { // it's a model object
            // invalidate the cache for this single object
            PrestasiPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PrestasiPeer::DATABASE_NAME);
            $criteria->add(PrestasiPeer::PRESTASI_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                PrestasiPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PrestasiPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            PrestasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Prestasi object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Prestasi $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PrestasiPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PrestasiPeer::TABLE_NAME);

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

        return BasePeer::doValidate(PrestasiPeer::DATABASE_NAME, PrestasiPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Prestasi
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PrestasiPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PrestasiPeer::DATABASE_NAME);
        $criteria->add(PrestasiPeer::PRESTASI_ID, $pk);

        $v = PrestasiPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Prestasi[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PrestasiPeer::DATABASE_NAME);
            $criteria->add(PrestasiPeer::PRESTASI_ID, $pks, Criteria::IN);
            $objs = PrestasiPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePrestasiPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePrestasiPeer::buildTableMap();

