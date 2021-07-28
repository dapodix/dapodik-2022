<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisPtk;
use DataDikdas\Model\JenisPtkPeer;
use DataDikdas\Model\map\JenisPtkTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.jenis_ptk' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisPtkPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.jenis_ptk';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\JenisPtk';

    /** the related TableMap class for this table */
    const TM_CLASS = 'JenisPtkTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 18;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 18;

    /** the column name for the jenis_ptk_id field */
    const JENIS_PTK_ID = 'ref.jenis_ptk.jenis_ptk_id';

    /** the column name for the jenis_ptk field */
    const JENIS_PTK = 'ref.jenis_ptk.jenis_ptk';

    /** the column name for the guru_kelas field */
    const GURU_KELAS = 'ref.jenis_ptk.guru_kelas';

    /** the column name for the guru_matpel field */
    const GURU_MATPEL = 'ref.jenis_ptk.guru_matpel';

    /** the column name for the guru_bk field */
    const GURU_BK = 'ref.jenis_ptk.guru_bk';

    /** the column name for the guru_inklusi field */
    const GURU_INKLUSI = 'ref.jenis_ptk.guru_inklusi';

    /** the column name for the guru_pengganti field */
    const GURU_PENGGANTI = 'ref.jenis_ptk.guru_pengganti';

    /** the column name for the pengawas_satdik field */
    const PENGAWAS_SATDIK = 'ref.jenis_ptk.pengawas_satdik';

    /** the column name for the pengawas_plb field */
    const PENGAWAS_PLB = 'ref.jenis_ptk.pengawas_plb';

    /** the column name for the pengawas_matpel field */
    const PENGAWAS_MATPEL = 'ref.jenis_ptk.pengawas_matpel';

    /** the column name for the pengawas_bidang field */
    const PENGAWAS_BIDANG = 'ref.jenis_ptk.pengawas_bidang';

    /** the column name for the tas field */
    const TAS = 'ref.jenis_ptk.tas';

    /** the column name for the tendik_lainnya field */
    const TENDIK_LAINNYA = 'ref.jenis_ptk.tendik_lainnya';

    /** the column name for the formal field */
    const FORMAL = 'ref.jenis_ptk.formal';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.jenis_ptk.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.jenis_ptk.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.jenis_ptk.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.jenis_ptk.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of JenisPtk objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array JenisPtk[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. JenisPtkPeer::$fieldNames[JenisPtkPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('JenisPtkId', 'JenisPtk', 'GuruKelas', 'GuruMatpel', 'GuruBk', 'GuruInklusi', 'GuruPengganti', 'PengawasSatdik', 'PengawasPlb', 'PengawasMatpel', 'PengawasBidang', 'Tas', 'TendikLainnya', 'Formal', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jenisPtkId', 'jenisPtk', 'guruKelas', 'guruMatpel', 'guruBk', 'guruInklusi', 'guruPengganti', 'pengawasSatdik', 'pengawasPlb', 'pengawasMatpel', 'pengawasBidang', 'tas', 'tendikLainnya', 'formal', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (JenisPtkPeer::JENIS_PTK_ID, JenisPtkPeer::JENIS_PTK, JenisPtkPeer::GURU_KELAS, JenisPtkPeer::GURU_MATPEL, JenisPtkPeer::GURU_BK, JenisPtkPeer::GURU_INKLUSI, JenisPtkPeer::GURU_PENGGANTI, JenisPtkPeer::PENGAWAS_SATDIK, JenisPtkPeer::PENGAWAS_PLB, JenisPtkPeer::PENGAWAS_MATPEL, JenisPtkPeer::PENGAWAS_BIDANG, JenisPtkPeer::TAS, JenisPtkPeer::TENDIK_LAINNYA, JenisPtkPeer::FORMAL, JenisPtkPeer::CREATE_DATE, JenisPtkPeer::LAST_UPDATE, JenisPtkPeer::EXPIRED_DATE, JenisPtkPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JENIS_PTK_ID', 'JENIS_PTK', 'GURU_KELAS', 'GURU_MATPEL', 'GURU_BK', 'GURU_INKLUSI', 'GURU_PENGGANTI', 'PENGAWAS_SATDIK', 'PENGAWAS_PLB', 'PENGAWAS_MATPEL', 'PENGAWAS_BIDANG', 'TAS', 'TENDIK_LAINNYA', 'FORMAL', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('jenis_ptk_id', 'jenis_ptk', 'guru_kelas', 'guru_matpel', 'guru_bk', 'guru_inklusi', 'guru_pengganti', 'pengawas_satdik', 'pengawas_plb', 'pengawas_matpel', 'pengawas_bidang', 'tas', 'tendik_lainnya', 'formal', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. JenisPtkPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('JenisPtkId' => 0, 'JenisPtk' => 1, 'GuruKelas' => 2, 'GuruMatpel' => 3, 'GuruBk' => 4, 'GuruInklusi' => 5, 'GuruPengganti' => 6, 'PengawasSatdik' => 7, 'PengawasPlb' => 8, 'PengawasMatpel' => 9, 'PengawasBidang' => 10, 'Tas' => 11, 'TendikLainnya' => 12, 'Formal' => 13, 'CreateDate' => 14, 'LastUpdate' => 15, 'ExpiredDate' => 16, 'LastSync' => 17, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('jenisPtkId' => 0, 'jenisPtk' => 1, 'guruKelas' => 2, 'guruMatpel' => 3, 'guruBk' => 4, 'guruInklusi' => 5, 'guruPengganti' => 6, 'pengawasSatdik' => 7, 'pengawasPlb' => 8, 'pengawasMatpel' => 9, 'pengawasBidang' => 10, 'tas' => 11, 'tendikLainnya' => 12, 'formal' => 13, 'createDate' => 14, 'lastUpdate' => 15, 'expiredDate' => 16, 'lastSync' => 17, ),
        BasePeer::TYPE_COLNAME => array (JenisPtkPeer::JENIS_PTK_ID => 0, JenisPtkPeer::JENIS_PTK => 1, JenisPtkPeer::GURU_KELAS => 2, JenisPtkPeer::GURU_MATPEL => 3, JenisPtkPeer::GURU_BK => 4, JenisPtkPeer::GURU_INKLUSI => 5, JenisPtkPeer::GURU_PENGGANTI => 6, JenisPtkPeer::PENGAWAS_SATDIK => 7, JenisPtkPeer::PENGAWAS_PLB => 8, JenisPtkPeer::PENGAWAS_MATPEL => 9, JenisPtkPeer::PENGAWAS_BIDANG => 10, JenisPtkPeer::TAS => 11, JenisPtkPeer::TENDIK_LAINNYA => 12, JenisPtkPeer::FORMAL => 13, JenisPtkPeer::CREATE_DATE => 14, JenisPtkPeer::LAST_UPDATE => 15, JenisPtkPeer::EXPIRED_DATE => 16, JenisPtkPeer::LAST_SYNC => 17, ),
        BasePeer::TYPE_RAW_COLNAME => array ('JENIS_PTK_ID' => 0, 'JENIS_PTK' => 1, 'GURU_KELAS' => 2, 'GURU_MATPEL' => 3, 'GURU_BK' => 4, 'GURU_INKLUSI' => 5, 'GURU_PENGGANTI' => 6, 'PENGAWAS_SATDIK' => 7, 'PENGAWAS_PLB' => 8, 'PENGAWAS_MATPEL' => 9, 'PENGAWAS_BIDANG' => 10, 'TAS' => 11, 'TENDIK_LAINNYA' => 12, 'FORMAL' => 13, 'CREATE_DATE' => 14, 'LAST_UPDATE' => 15, 'EXPIRED_DATE' => 16, 'LAST_SYNC' => 17, ),
        BasePeer::TYPE_FIELDNAME => array ('jenis_ptk_id' => 0, 'jenis_ptk' => 1, 'guru_kelas' => 2, 'guru_matpel' => 3, 'guru_bk' => 4, 'guru_inklusi' => 5, 'guru_pengganti' => 6, 'pengawas_satdik' => 7, 'pengawas_plb' => 8, 'pengawas_matpel' => 9, 'pengawas_bidang' => 10, 'tas' => 11, 'tendik_lainnya' => 12, 'formal' => 13, 'create_date' => 14, 'last_update' => 15, 'expired_date' => 16, 'last_sync' => 17, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
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
        $toNames = JenisPtkPeer::getFieldNames($toType);
        $key = isset(JenisPtkPeer::$fieldKeys[$fromType][$name]) ? JenisPtkPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(JenisPtkPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, JenisPtkPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return JenisPtkPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. JenisPtkPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(JenisPtkPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(JenisPtkPeer::JENIS_PTK_ID);
            $criteria->addSelectColumn(JenisPtkPeer::JENIS_PTK);
            $criteria->addSelectColumn(JenisPtkPeer::GURU_KELAS);
            $criteria->addSelectColumn(JenisPtkPeer::GURU_MATPEL);
            $criteria->addSelectColumn(JenisPtkPeer::GURU_BK);
            $criteria->addSelectColumn(JenisPtkPeer::GURU_INKLUSI);
            $criteria->addSelectColumn(JenisPtkPeer::GURU_PENGGANTI);
            $criteria->addSelectColumn(JenisPtkPeer::PENGAWAS_SATDIK);
            $criteria->addSelectColumn(JenisPtkPeer::PENGAWAS_PLB);
            $criteria->addSelectColumn(JenisPtkPeer::PENGAWAS_MATPEL);
            $criteria->addSelectColumn(JenisPtkPeer::PENGAWAS_BIDANG);
            $criteria->addSelectColumn(JenisPtkPeer::TAS);
            $criteria->addSelectColumn(JenisPtkPeer::TENDIK_LAINNYA);
            $criteria->addSelectColumn(JenisPtkPeer::FORMAL);
            $criteria->addSelectColumn(JenisPtkPeer::CREATE_DATE);
            $criteria->addSelectColumn(JenisPtkPeer::LAST_UPDATE);
            $criteria->addSelectColumn(JenisPtkPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(JenisPtkPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.jenis_ptk_id');
            $criteria->addSelectColumn($alias . '.jenis_ptk');
            $criteria->addSelectColumn($alias . '.guru_kelas');
            $criteria->addSelectColumn($alias . '.guru_matpel');
            $criteria->addSelectColumn($alias . '.guru_bk');
            $criteria->addSelectColumn($alias . '.guru_inklusi');
            $criteria->addSelectColumn($alias . '.guru_pengganti');
            $criteria->addSelectColumn($alias . '.pengawas_satdik');
            $criteria->addSelectColumn($alias . '.pengawas_plb');
            $criteria->addSelectColumn($alias . '.pengawas_matpel');
            $criteria->addSelectColumn($alias . '.pengawas_bidang');
            $criteria->addSelectColumn($alias . '.tas');
            $criteria->addSelectColumn($alias . '.tendik_lainnya');
            $criteria->addSelectColumn($alias . '.formal');
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
        $criteria->setPrimaryTableName(JenisPtkPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JenisPtkPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(JenisPtkPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(JenisPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisPtk
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = JenisPtkPeer::doSelect($critcopy, $con);
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
        return JenisPtkPeer::populateObjects(JenisPtkPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(JenisPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            JenisPtkPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(JenisPtkPeer::DATABASE_NAME);

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
     * @param      JenisPtk $obj A JenisPtk object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getJenisPtkId();
            } // if key === null
            JenisPtkPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A JenisPtk object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof JenisPtk) {
                $key = (string) $value->getJenisPtkId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or JenisPtk object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(JenisPtkPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   JenisPtk Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(JenisPtkPeer::$instances[$key])) {
                return JenisPtkPeer::$instances[$key];
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
        foreach (JenisPtkPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        JenisPtkPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.jenis_ptk
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
        $cls = JenisPtkPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = JenisPtkPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = JenisPtkPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JenisPtkPeer::addInstanceToPool($obj, $key);
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
     * @return array (JenisPtk object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = JenisPtkPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = JenisPtkPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + JenisPtkPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JenisPtkPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            JenisPtkPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(JenisPtkPeer::DATABASE_NAME)->getTable(JenisPtkPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseJenisPtkPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseJenisPtkPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new JenisPtkTableMap());
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
        return JenisPtkPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a JenisPtk or Criteria object.
     *
     * @param      mixed $values Criteria or JenisPtk object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisPtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from JenisPtk object
        }


        // Set the correct dbName
        $criteria->setDbName(JenisPtkPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a JenisPtk or Criteria object.
     *
     * @param      mixed $values Criteria or JenisPtk object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisPtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(JenisPtkPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(JenisPtkPeer::JENIS_PTK_ID);
            $value = $criteria->remove(JenisPtkPeer::JENIS_PTK_ID);
            if ($value) {
                $selectCriteria->add(JenisPtkPeer::JENIS_PTK_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JenisPtkPeer::TABLE_NAME);
            }

        } else { // $values is JenisPtk object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(JenisPtkPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.jenis_ptk table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisPtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(JenisPtkPeer::TABLE_NAME, $con, JenisPtkPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JenisPtkPeer::clearInstancePool();
            JenisPtkPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a JenisPtk or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or JenisPtk object or primary key or array of primary keys
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
            $con = Propel::getConnection(JenisPtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            JenisPtkPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof JenisPtk) { // it's a model object
            // invalidate the cache for this single object
            JenisPtkPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JenisPtkPeer::DATABASE_NAME);
            $criteria->add(JenisPtkPeer::JENIS_PTK_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                JenisPtkPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(JenisPtkPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            JenisPtkPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given JenisPtk object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      JenisPtk $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(JenisPtkPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(JenisPtkPeer::TABLE_NAME);

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

        return BasePeer::doValidate(JenisPtkPeer::DATABASE_NAME, JenisPtkPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return JenisPtk
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = JenisPtkPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(JenisPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(JenisPtkPeer::DATABASE_NAME);
        $criteria->add(JenisPtkPeer::JENIS_PTK_ID, $pk);

        $v = JenisPtkPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return JenisPtk[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JenisPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(JenisPtkPeer::DATABASE_NAME);
            $criteria->add(JenisPtkPeer::JENIS_PTK_ID, $pks, Criteria::IN);
            $objs = JenisPtkPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseJenisPtkPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseJenisPtkPeer::buildTableMap();

