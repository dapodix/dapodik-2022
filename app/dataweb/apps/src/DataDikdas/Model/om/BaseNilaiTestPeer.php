<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisTestPeer;
use DataDikdas\Model\NilaiTest;
use DataDikdas\Model\NilaiTestPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\map\NilaiTestTableMap;

/**
 * Base static class for performing query and update operations on the 'nilai_test' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseNilaiTestPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'nilai_test';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\NilaiTest';

    /** the related TableMap class for this table */
    const TM_CLASS = 'NilaiTestTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 19;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 19;

    /** the column name for the nilai_test_id field */
    const NILAI_TEST_ID = 'nilai_test.nilai_test_id';

    /** the column name for the jenis_test_id field */
    const JENIS_TEST_ID = 'nilai_test.jenis_test_id';

    /** the column name for the ptk_id field */
    const PTK_ID = 'nilai_test.ptk_id';

    /** the column name for the nama field */
    const NAMA = 'nilai_test.nama';

    /** the column name for the penyelenggara field */
    const PENYELENGGARA = 'nilai_test.penyelenggara';

    /** the column name for the tahun field */
    const TAHUN = 'nilai_test.tahun';

    /** the column name for the skor field */
    const SKOR = 'nilai_test.skor';

    /** the column name for the skor1 field */
    const SKOR1 = 'nilai_test.skor1';

    /** the column name for the skor2 field */
    const SKOR2 = 'nilai_test.skor2';

    /** the column name for the skor3 field */
    const SKOR3 = 'nilai_test.skor3';

    /** the column name for the skor4 field */
    const SKOR4 = 'nilai_test.skor4';

    /** the column name for the skor5 field */
    const SKOR5 = 'nilai_test.skor5';

    /** the column name for the nomor_peserta field */
    const NOMOR_PESERTA = 'nilai_test.nomor_peserta';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'nilai_test.asal_data';

    /** the column name for the create_date field */
    const CREATE_DATE = 'nilai_test.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'nilai_test.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'nilai_test.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'nilai_test.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'nilai_test.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of NilaiTest objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array NilaiTest[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. NilaiTestPeer::$fieldNames[NilaiTestPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('NilaiTestId', 'JenisTestId', 'PtkId', 'Nama', 'Penyelenggara', 'Tahun', 'Skor', 'Skor1', 'Skor2', 'Skor3', 'Skor4', 'Skor5', 'NomorPeserta', 'AsalData', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('nilaiTestId', 'jenisTestId', 'ptkId', 'nama', 'penyelenggara', 'tahun', 'skor', 'skor1', 'skor2', 'skor3', 'skor4', 'skor5', 'nomorPeserta', 'asalData', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (NilaiTestPeer::NILAI_TEST_ID, NilaiTestPeer::JENIS_TEST_ID, NilaiTestPeer::PTK_ID, NilaiTestPeer::NAMA, NilaiTestPeer::PENYELENGGARA, NilaiTestPeer::TAHUN, NilaiTestPeer::SKOR, NilaiTestPeer::SKOR1, NilaiTestPeer::SKOR2, NilaiTestPeer::SKOR3, NilaiTestPeer::SKOR4, NilaiTestPeer::SKOR5, NilaiTestPeer::NOMOR_PESERTA, NilaiTestPeer::ASAL_DATA, NilaiTestPeer::CREATE_DATE, NilaiTestPeer::LAST_UPDATE, NilaiTestPeer::SOFT_DELETE, NilaiTestPeer::LAST_SYNC, NilaiTestPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('NILAI_TEST_ID', 'JENIS_TEST_ID', 'PTK_ID', 'NAMA', 'PENYELENGGARA', 'TAHUN', 'SKOR', 'SKOR1', 'SKOR2', 'SKOR3', 'SKOR4', 'SKOR5', 'NOMOR_PESERTA', 'ASAL_DATA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('nilai_test_id', 'jenis_test_id', 'ptk_id', 'nama', 'penyelenggara', 'tahun', 'skor', 'skor1', 'skor2', 'skor3', 'skor4', 'skor5', 'nomor_peserta', 'asal_data', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. NilaiTestPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('NilaiTestId' => 0, 'JenisTestId' => 1, 'PtkId' => 2, 'Nama' => 3, 'Penyelenggara' => 4, 'Tahun' => 5, 'Skor' => 6, 'Skor1' => 7, 'Skor2' => 8, 'Skor3' => 9, 'Skor4' => 10, 'Skor5' => 11, 'NomorPeserta' => 12, 'AsalData' => 13, 'CreateDate' => 14, 'LastUpdate' => 15, 'SoftDelete' => 16, 'LastSync' => 17, 'UpdaterId' => 18, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('nilaiTestId' => 0, 'jenisTestId' => 1, 'ptkId' => 2, 'nama' => 3, 'penyelenggara' => 4, 'tahun' => 5, 'skor' => 6, 'skor1' => 7, 'skor2' => 8, 'skor3' => 9, 'skor4' => 10, 'skor5' => 11, 'nomorPeserta' => 12, 'asalData' => 13, 'createDate' => 14, 'lastUpdate' => 15, 'softDelete' => 16, 'lastSync' => 17, 'updaterId' => 18, ),
        BasePeer::TYPE_COLNAME => array (NilaiTestPeer::NILAI_TEST_ID => 0, NilaiTestPeer::JENIS_TEST_ID => 1, NilaiTestPeer::PTK_ID => 2, NilaiTestPeer::NAMA => 3, NilaiTestPeer::PENYELENGGARA => 4, NilaiTestPeer::TAHUN => 5, NilaiTestPeer::SKOR => 6, NilaiTestPeer::SKOR1 => 7, NilaiTestPeer::SKOR2 => 8, NilaiTestPeer::SKOR3 => 9, NilaiTestPeer::SKOR4 => 10, NilaiTestPeer::SKOR5 => 11, NilaiTestPeer::NOMOR_PESERTA => 12, NilaiTestPeer::ASAL_DATA => 13, NilaiTestPeer::CREATE_DATE => 14, NilaiTestPeer::LAST_UPDATE => 15, NilaiTestPeer::SOFT_DELETE => 16, NilaiTestPeer::LAST_SYNC => 17, NilaiTestPeer::UPDATER_ID => 18, ),
        BasePeer::TYPE_RAW_COLNAME => array ('NILAI_TEST_ID' => 0, 'JENIS_TEST_ID' => 1, 'PTK_ID' => 2, 'NAMA' => 3, 'PENYELENGGARA' => 4, 'TAHUN' => 5, 'SKOR' => 6, 'SKOR1' => 7, 'SKOR2' => 8, 'SKOR3' => 9, 'SKOR4' => 10, 'SKOR5' => 11, 'NOMOR_PESERTA' => 12, 'ASAL_DATA' => 13, 'CREATE_DATE' => 14, 'LAST_UPDATE' => 15, 'SOFT_DELETE' => 16, 'LAST_SYNC' => 17, 'UPDATER_ID' => 18, ),
        BasePeer::TYPE_FIELDNAME => array ('nilai_test_id' => 0, 'jenis_test_id' => 1, 'ptk_id' => 2, 'nama' => 3, 'penyelenggara' => 4, 'tahun' => 5, 'skor' => 6, 'skor1' => 7, 'skor2' => 8, 'skor3' => 9, 'skor4' => 10, 'skor5' => 11, 'nomor_peserta' => 12, 'asal_data' => 13, 'create_date' => 14, 'last_update' => 15, 'soft_delete' => 16, 'last_sync' => 17, 'updater_id' => 18, ),
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
        $toNames = NilaiTestPeer::getFieldNames($toType);
        $key = isset(NilaiTestPeer::$fieldKeys[$fromType][$name]) ? NilaiTestPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(NilaiTestPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, NilaiTestPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return NilaiTestPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. NilaiTestPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(NilaiTestPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(NilaiTestPeer::NILAI_TEST_ID);
            $criteria->addSelectColumn(NilaiTestPeer::JENIS_TEST_ID);
            $criteria->addSelectColumn(NilaiTestPeer::PTK_ID);
            $criteria->addSelectColumn(NilaiTestPeer::NAMA);
            $criteria->addSelectColumn(NilaiTestPeer::PENYELENGGARA);
            $criteria->addSelectColumn(NilaiTestPeer::TAHUN);
            $criteria->addSelectColumn(NilaiTestPeer::SKOR);
            $criteria->addSelectColumn(NilaiTestPeer::SKOR1);
            $criteria->addSelectColumn(NilaiTestPeer::SKOR2);
            $criteria->addSelectColumn(NilaiTestPeer::SKOR3);
            $criteria->addSelectColumn(NilaiTestPeer::SKOR4);
            $criteria->addSelectColumn(NilaiTestPeer::SKOR5);
            $criteria->addSelectColumn(NilaiTestPeer::NOMOR_PESERTA);
            $criteria->addSelectColumn(NilaiTestPeer::ASAL_DATA);
            $criteria->addSelectColumn(NilaiTestPeer::CREATE_DATE);
            $criteria->addSelectColumn(NilaiTestPeer::LAST_UPDATE);
            $criteria->addSelectColumn(NilaiTestPeer::SOFT_DELETE);
            $criteria->addSelectColumn(NilaiTestPeer::LAST_SYNC);
            $criteria->addSelectColumn(NilaiTestPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.nilai_test_id');
            $criteria->addSelectColumn($alias . '.jenis_test_id');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.penyelenggara');
            $criteria->addSelectColumn($alias . '.tahun');
            $criteria->addSelectColumn($alias . '.skor');
            $criteria->addSelectColumn($alias . '.skor1');
            $criteria->addSelectColumn($alias . '.skor2');
            $criteria->addSelectColumn($alias . '.skor3');
            $criteria->addSelectColumn($alias . '.skor4');
            $criteria->addSelectColumn($alias . '.skor5');
            $criteria->addSelectColumn($alias . '.nomor_peserta');
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
        $criteria->setPrimaryTableName(NilaiTestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NilaiTestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(NilaiTestPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 NilaiTest
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = NilaiTestPeer::doSelect($critcopy, $con);
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
        return NilaiTestPeer::populateObjects(NilaiTestPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            NilaiTestPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);

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
     * @param      NilaiTest $obj A NilaiTest object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getNilaiTestId();
            } // if key === null
            NilaiTestPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A NilaiTest object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof NilaiTest) {
                $key = (string) $value->getNilaiTestId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or NilaiTest object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(NilaiTestPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   NilaiTest Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(NilaiTestPeer::$instances[$key])) {
                return NilaiTestPeer::$instances[$key];
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
        foreach (NilaiTestPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        NilaiTestPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to nilai_test
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
        $cls = NilaiTestPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = NilaiTestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = NilaiTestPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                NilaiTestPeer::addInstanceToPool($obj, $key);
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
     * @return array (NilaiTest object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = NilaiTestPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = NilaiTestPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + NilaiTestPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = NilaiTestPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            NilaiTestPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisTest table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisTest(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NilaiTestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NilaiTestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NilaiTestPeer::JENIS_TEST_ID, JenisTestPeer::JENIS_TEST_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(NilaiTestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NilaiTestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NilaiTestPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Selects a collection of NilaiTest objects pre-filled with their JenisTest objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NilaiTest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisTest(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);
        }

        NilaiTestPeer::addSelectColumns($criteria);
        $startcol = NilaiTestPeer::NUM_HYDRATE_COLUMNS;
        JenisTestPeer::addSelectColumns($criteria);

        $criteria->addJoin(NilaiTestPeer::JENIS_TEST_ID, JenisTestPeer::JENIS_TEST_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NilaiTestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NilaiTestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = NilaiTestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NilaiTestPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisTestPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisTestPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisTestPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisTestPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (NilaiTest) to $obj2 (JenisTest)
                $obj2->addNilaiTest($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of NilaiTest objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NilaiTest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);
        }

        NilaiTestPeer::addSelectColumns($criteria);
        $startcol = NilaiTestPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(NilaiTestPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NilaiTestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NilaiTestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = NilaiTestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NilaiTestPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (NilaiTest) to $obj2 (Ptk)
                $obj2->addNilaiTest($obj1);

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
        $criteria->setPrimaryTableName(NilaiTestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NilaiTestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NilaiTestPeer::JENIS_TEST_ID, JenisTestPeer::JENIS_TEST_ID, $join_behavior);

        $criteria->addJoin(NilaiTestPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Selects a collection of NilaiTest objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NilaiTest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);
        }

        NilaiTestPeer::addSelectColumns($criteria);
        $startcol2 = NilaiTestPeer::NUM_HYDRATE_COLUMNS;

        JenisTestPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisTestPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(NilaiTestPeer::JENIS_TEST_ID, JenisTestPeer::JENIS_TEST_ID, $join_behavior);

        $criteria->addJoin(NilaiTestPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NilaiTestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NilaiTestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = NilaiTestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NilaiTestPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined JenisTest rows

            $key2 = JenisTestPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = JenisTestPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisTestPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisTestPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (NilaiTest) to the collection in $obj2 (JenisTest)
                $obj2->addNilaiTest($obj1);
            } // if joined row not null

            // Add objects for joined Ptk rows

            $key3 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PtkPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PtkPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PtkPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (NilaiTest) to the collection in $obj3 (Ptk)
                $obj3->addNilaiTest($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisTest table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisTest(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NilaiTestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NilaiTestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(NilaiTestPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(NilaiTestPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NilaiTestPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(NilaiTestPeer::JENIS_TEST_ID, JenisTestPeer::JENIS_TEST_ID, $join_behavior);

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
     * Selects a collection of NilaiTest objects pre-filled with all related objects except JenisTest.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NilaiTest objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisTest(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);
        }

        NilaiTestPeer::addSelectColumns($criteria);
        $startcol2 = NilaiTestPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(NilaiTestPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NilaiTestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NilaiTestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = NilaiTestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NilaiTestPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ptk rows

                $key2 = PtkPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PtkPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PtkPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PtkPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (NilaiTest) to the collection in $obj2 (Ptk)
                $obj2->addNilaiTest($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of NilaiTest objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NilaiTest objects.
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
            $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);
        }

        NilaiTestPeer::addSelectColumns($criteria);
        $startcol2 = NilaiTestPeer::NUM_HYDRATE_COLUMNS;

        JenisTestPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisTestPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(NilaiTestPeer::JENIS_TEST_ID, JenisTestPeer::JENIS_TEST_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NilaiTestPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NilaiTestPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = NilaiTestPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NilaiTestPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisTest rows

                $key2 = JenisTestPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisTestPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisTestPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisTestPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (NilaiTest) to the collection in $obj2 (JenisTest)
                $obj2->addNilaiTest($obj1);

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
        return Propel::getDatabaseMap(NilaiTestPeer::DATABASE_NAME)->getTable(NilaiTestPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseNilaiTestPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseNilaiTestPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new NilaiTestTableMap());
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
        return NilaiTestPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a NilaiTest or Criteria object.
     *
     * @param      mixed $values Criteria or NilaiTest object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from NilaiTest object
        }


        // Set the correct dbName
        $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a NilaiTest or Criteria object.
     *
     * @param      mixed $values Criteria or NilaiTest object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(NilaiTestPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(NilaiTestPeer::NILAI_TEST_ID);
            $value = $criteria->remove(NilaiTestPeer::NILAI_TEST_ID);
            if ($value) {
                $selectCriteria->add(NilaiTestPeer::NILAI_TEST_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(NilaiTestPeer::TABLE_NAME);
            }

        } else { // $values is NilaiTest object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the nilai_test table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(NilaiTestPeer::TABLE_NAME, $con, NilaiTestPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NilaiTestPeer::clearInstancePool();
            NilaiTestPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a NilaiTest or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or NilaiTest object or primary key or array of primary keys
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
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            NilaiTestPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof NilaiTest) { // it's a model object
            // invalidate the cache for this single object
            NilaiTestPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(NilaiTestPeer::DATABASE_NAME);
            $criteria->add(NilaiTestPeer::NILAI_TEST_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                NilaiTestPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(NilaiTestPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            NilaiTestPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given NilaiTest object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      NilaiTest $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(NilaiTestPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(NilaiTestPeer::TABLE_NAME);

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

        return BasePeer::doValidate(NilaiTestPeer::DATABASE_NAME, NilaiTestPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return NilaiTest
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = NilaiTestPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(NilaiTestPeer::DATABASE_NAME);
        $criteria->add(NilaiTestPeer::NILAI_TEST_ID, $pk);

        $v = NilaiTestPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return NilaiTest[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(NilaiTestPeer::DATABASE_NAME);
            $criteria->add(NilaiTestPeer::NILAI_TEST_ID, $pks, Criteria::IN);
            $objs = NilaiTestPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseNilaiTestPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseNilaiTestPeer::buildTableMap();

