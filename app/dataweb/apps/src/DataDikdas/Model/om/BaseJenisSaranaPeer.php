<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisSarana;
use DataDikdas\Model\JenisSaranaPeer;
use DataDikdas\Model\map\JenisSaranaTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.jenis_sarana' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisSaranaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.jenis_sarana';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\JenisSarana';

    /** the related TableMap class for this table */
    const TM_CLASS = 'JenisSaranaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 13;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 13;

    /** the column name for the jenis_sarana_id field */
    const JENIS_SARANA_ID = 'ref.jenis_sarana.jenis_sarana_id';

    /** the column name for the nama field */
    const NAMA = 'ref.jenis_sarana.nama';

    /** the column name for the kelompok field */
    const KELOMPOK = 'ref.jenis_sarana.kelompok';

    /** the column name for the perlu_penempatan field */
    const PERLU_PENEMPATAN = 'ref.jenis_sarana.perlu_penempatan';

    /** the column name for the keterangan field */
    const KETERANGAN = 'ref.jenis_sarana.keterangan';

    /** the column name for the a_alat field */
    const A_ALAT = 'ref.jenis_sarana.a_alat';

    /** the column name for the a_angkutan field */
    const A_ANGKUTAN = 'ref.jenis_sarana.a_angkutan';

    /** the column name for the spm_qty_min_per_siswa field */
    const SPM_QTY_MIN_PER_SISWA = 'ref.jenis_sarana.spm_qty_min_per_siswa';

    /** the column name for the spm_qty_min_per_sekolah field */
    const SPM_QTY_MIN_PER_SEKOLAH = 'ref.jenis_sarana.spm_qty_min_per_sekolah';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.jenis_sarana.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.jenis_sarana.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.jenis_sarana.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.jenis_sarana.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of JenisSarana objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array JenisSarana[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. JenisSaranaPeer::$fieldNames[JenisSaranaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('JenisSaranaId', 'Nama', 'Kelompok', 'PerluPenempatan', 'Keterangan', 'AAlat', 'AAngkutan', 'SpmQtyMinPerSiswa', 'SpmQtyMinPerSekolah', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jenisSaranaId', 'nama', 'kelompok', 'perluPenempatan', 'keterangan', 'aAlat', 'aAngkutan', 'spmQtyMinPerSiswa', 'spmQtyMinPerSekolah', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (JenisSaranaPeer::JENIS_SARANA_ID, JenisSaranaPeer::NAMA, JenisSaranaPeer::KELOMPOK, JenisSaranaPeer::PERLU_PENEMPATAN, JenisSaranaPeer::KETERANGAN, JenisSaranaPeer::A_ALAT, JenisSaranaPeer::A_ANGKUTAN, JenisSaranaPeer::SPM_QTY_MIN_PER_SISWA, JenisSaranaPeer::SPM_QTY_MIN_PER_SEKOLAH, JenisSaranaPeer::CREATE_DATE, JenisSaranaPeer::LAST_UPDATE, JenisSaranaPeer::EXPIRED_DATE, JenisSaranaPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JENIS_SARANA_ID', 'NAMA', 'KELOMPOK', 'PERLU_PENEMPATAN', 'KETERANGAN', 'A_ALAT', 'A_ANGKUTAN', 'SPM_QTY_MIN_PER_SISWA', 'SPM_QTY_MIN_PER_SEKOLAH', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('jenis_sarana_id', 'nama', 'kelompok', 'perlu_penempatan', 'keterangan', 'a_alat', 'a_angkutan', 'spm_qty_min_per_siswa', 'spm_qty_min_per_sekolah', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. JenisSaranaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('JenisSaranaId' => 0, 'Nama' => 1, 'Kelompok' => 2, 'PerluPenempatan' => 3, 'Keterangan' => 4, 'AAlat' => 5, 'AAngkutan' => 6, 'SpmQtyMinPerSiswa' => 7, 'SpmQtyMinPerSekolah' => 8, 'CreateDate' => 9, 'LastUpdate' => 10, 'ExpiredDate' => 11, 'LastSync' => 12, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jenisSaranaId' => 0, 'nama' => 1, 'kelompok' => 2, 'perluPenempatan' => 3, 'keterangan' => 4, 'aAlat' => 5, 'aAngkutan' => 6, 'spmQtyMinPerSiswa' => 7, 'spmQtyMinPerSekolah' => 8, 'createDate' => 9, 'lastUpdate' => 10, 'expiredDate' => 11, 'lastSync' => 12, ),
        BasePeer::TYPE_COLNAME => array (JenisSaranaPeer::JENIS_SARANA_ID => 0, JenisSaranaPeer::NAMA => 1, JenisSaranaPeer::KELOMPOK => 2, JenisSaranaPeer::PERLU_PENEMPATAN => 3, JenisSaranaPeer::KETERANGAN => 4, JenisSaranaPeer::A_ALAT => 5, JenisSaranaPeer::A_ANGKUTAN => 6, JenisSaranaPeer::SPM_QTY_MIN_PER_SISWA => 7, JenisSaranaPeer::SPM_QTY_MIN_PER_SEKOLAH => 8, JenisSaranaPeer::CREATE_DATE => 9, JenisSaranaPeer::LAST_UPDATE => 10, JenisSaranaPeer::EXPIRED_DATE => 11, JenisSaranaPeer::LAST_SYNC => 12, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JENIS_SARANA_ID' => 0, 'NAMA' => 1, 'KELOMPOK' => 2, 'PERLU_PENEMPATAN' => 3, 'KETERANGAN' => 4, 'A_ALAT' => 5, 'A_ANGKUTAN' => 6, 'SPM_QTY_MIN_PER_SISWA' => 7, 'SPM_QTY_MIN_PER_SEKOLAH' => 8, 'CREATE_DATE' => 9, 'LAST_UPDATE' => 10, 'EXPIRED_DATE' => 11, 'LAST_SYNC' => 12, ),
        BasePeer::TYPE_FIELDNAME => array ('jenis_sarana_id' => 0, 'nama' => 1, 'kelompok' => 2, 'perlu_penempatan' => 3, 'keterangan' => 4, 'a_alat' => 5, 'a_angkutan' => 6, 'spm_qty_min_per_siswa' => 7, 'spm_qty_min_per_sekolah' => 8, 'create_date' => 9, 'last_update' => 10, 'expired_date' => 11, 'last_sync' => 12, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
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
        $toNames = JenisSaranaPeer::getFieldNames($toType);
        $key = isset(JenisSaranaPeer::$fieldKeys[$fromType][$name]) ? JenisSaranaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(JenisSaranaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, JenisSaranaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return JenisSaranaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. JenisSaranaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(JenisSaranaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(JenisSaranaPeer::JENIS_SARANA_ID);
            $criteria->addSelectColumn(JenisSaranaPeer::NAMA);
            $criteria->addSelectColumn(JenisSaranaPeer::KELOMPOK);
            $criteria->addSelectColumn(JenisSaranaPeer::PERLU_PENEMPATAN);
            $criteria->addSelectColumn(JenisSaranaPeer::KETERANGAN);
            $criteria->addSelectColumn(JenisSaranaPeer::A_ALAT);
            $criteria->addSelectColumn(JenisSaranaPeer::A_ANGKUTAN);
            $criteria->addSelectColumn(JenisSaranaPeer::SPM_QTY_MIN_PER_SISWA);
            $criteria->addSelectColumn(JenisSaranaPeer::SPM_QTY_MIN_PER_SEKOLAH);
            $criteria->addSelectColumn(JenisSaranaPeer::CREATE_DATE);
            $criteria->addSelectColumn(JenisSaranaPeer::LAST_UPDATE);
            $criteria->addSelectColumn(JenisSaranaPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(JenisSaranaPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.jenis_sarana_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.kelompok');
            $criteria->addSelectColumn($alias . '.perlu_penempatan');
            $criteria->addSelectColumn($alias . '.keterangan');
            $criteria->addSelectColumn($alias . '.a_alat');
            $criteria->addSelectColumn($alias . '.a_angkutan');
            $criteria->addSelectColumn($alias . '.spm_qty_min_per_siswa');
            $criteria->addSelectColumn($alias . '.spm_qty_min_per_sekolah');
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
        $criteria->setPrimaryTableName(JenisSaranaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JenisSaranaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(JenisSaranaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(JenisSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisSarana
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = JenisSaranaPeer::doSelect($critcopy, $con);
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
        return JenisSaranaPeer::populateObjects(JenisSaranaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(JenisSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            JenisSaranaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(JenisSaranaPeer::DATABASE_NAME);

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
     * @param      JenisSarana $obj A JenisSarana object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getJenisSaranaId();
            } // if key === null
            JenisSaranaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A JenisSarana object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof JenisSarana) {
                $key = (string) $value->getJenisSaranaId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or JenisSarana object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(JenisSaranaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   JenisSarana Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(JenisSaranaPeer::$instances[$key])) {
                return JenisSaranaPeer::$instances[$key];
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
        foreach (JenisSaranaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        JenisSaranaPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.jenis_sarana
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

        return (int) $row[$startcol];
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
        $cls = JenisSaranaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = JenisSaranaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JenisSaranaPeer::addInstanceToPool($obj, $key);
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
     * @return array (JenisSarana object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = JenisSaranaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JenisSaranaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            JenisSaranaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        return Propel::getDatabaseMap(JenisSaranaPeer::DATABASE_NAME)->getTable(JenisSaranaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseJenisSaranaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseJenisSaranaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new JenisSaranaTableMap());
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
        return JenisSaranaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a JenisSarana or Criteria object.
     *
     * @param      mixed $values Criteria or JenisSarana object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisSaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from JenisSarana object
        }


        // Set the correct dbName
        $criteria->setDbName(JenisSaranaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a JenisSarana or Criteria object.
     *
     * @param      mixed $values Criteria or JenisSarana object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisSaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(JenisSaranaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(JenisSaranaPeer::JENIS_SARANA_ID);
            $value = $criteria->remove(JenisSaranaPeer::JENIS_SARANA_ID);
            if ($value) {
                $selectCriteria->add(JenisSaranaPeer::JENIS_SARANA_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JenisSaranaPeer::TABLE_NAME);
            }

        } else { // $values is JenisSarana object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(JenisSaranaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.jenis_sarana table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisSaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(JenisSaranaPeer::TABLE_NAME, $con, JenisSaranaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JenisSaranaPeer::clearInstancePool();
            JenisSaranaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a JenisSarana or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or JenisSarana object or primary key or array of primary keys
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
            $con = Propel::getConnection(JenisSaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            JenisSaranaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof JenisSarana) { // it's a model object
            // invalidate the cache for this single object
            JenisSaranaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JenisSaranaPeer::DATABASE_NAME);
            $criteria->add(JenisSaranaPeer::JENIS_SARANA_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                JenisSaranaPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(JenisSaranaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            JenisSaranaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given JenisSarana object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      JenisSarana $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(JenisSaranaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(JenisSaranaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(JenisSaranaPeer::DATABASE_NAME, JenisSaranaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return JenisSarana
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = JenisSaranaPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(JenisSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(JenisSaranaPeer::DATABASE_NAME);
        $criteria->add(JenisSaranaPeer::JENIS_SARANA_ID, $pk);

        $v = JenisSaranaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return JenisSarana[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(JenisSaranaPeer::DATABASE_NAME);
            $criteria->add(JenisSaranaPeer::JENIS_SARANA_ID, $pks, Criteria::IN);
            $objs = JenisSaranaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseJenisSaranaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseJenisSaranaPeer::buildTableMap();

