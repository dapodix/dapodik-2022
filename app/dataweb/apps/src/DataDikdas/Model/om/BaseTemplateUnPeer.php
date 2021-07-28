<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenjangPendidikanPeer;
use DataDikdas\Model\JurusanPeer;
use DataDikdas\Model\MataPelajaranPeer;
use DataDikdas\Model\TahunAjaranPeer;
use DataDikdas\Model\TemplateUn;
use DataDikdas\Model\TemplateUnPeer;
use DataDikdas\Model\map\TemplateUnTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.template_un' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseTemplateUnPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.template_un';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\TemplateUn';

    /** the related TableMap class for this table */
    const TM_CLASS = 'TemplateUnTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 16;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 16;

    /** the column name for the template_id field */
    const TEMPLATE_ID = 'ref.template_un.template_id';

    /** the column name for the jenjang_pendidikan_id field */
    const JENJANG_PENDIDIKAN_ID = 'ref.template_un.jenjang_pendidikan_id';

    /** the column name for the tahun_ajaran_id field */
    const TAHUN_AJARAN_ID = 'ref.template_un.tahun_ajaran_id';

    /** the column name for the jurusan_id field */
    const JURUSAN_ID = 'ref.template_un.jurusan_id';

    /** the column name for the template_ket field */
    const TEMPLATE_KET = 'ref.template_un.template_ket';

    /** the column name for the mp1_id field */
    const MP1_ID = 'ref.template_un.mp1_id';

    /** the column name for the mp2_id field */
    const MP2_ID = 'ref.template_un.mp2_id';

    /** the column name for the mp3_id field */
    const MP3_ID = 'ref.template_un.mp3_id';

    /** the column name for the mp4_id field */
    const MP4_ID = 'ref.template_un.mp4_id';

    /** the column name for the mp5_id field */
    const MP5_ID = 'ref.template_un.mp5_id';

    /** the column name for the mp6_id field */
    const MP6_ID = 'ref.template_un.mp6_id';

    /** the column name for the mp7_id field */
    const MP7_ID = 'ref.template_un.mp7_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.template_un.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.template_un.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.template_un.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.template_un.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of TemplateUn objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array TemplateUn[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. TemplateUnPeer::$fieldNames[TemplateUnPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('TemplateId', 'JenjangPendidikanId', 'TahunAjaranId', 'JurusanId', 'TemplateKet', 'Mp1Id', 'Mp2Id', 'Mp3Id', 'Mp4Id', 'Mp5Id', 'Mp6Id', 'Mp7Id', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('templateId', 'jenjangPendidikanId', 'tahunAjaranId', 'jurusanId', 'templateKet', 'mp1Id', 'mp2Id', 'mp3Id', 'mp4Id', 'mp5Id', 'mp6Id', 'mp7Id', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (TemplateUnPeer::TEMPLATE_ID, TemplateUnPeer::JENJANG_PENDIDIKAN_ID, TemplateUnPeer::TAHUN_AJARAN_ID, TemplateUnPeer::JURUSAN_ID, TemplateUnPeer::TEMPLATE_KET, TemplateUnPeer::MP1_ID, TemplateUnPeer::MP2_ID, TemplateUnPeer::MP3_ID, TemplateUnPeer::MP4_ID, TemplateUnPeer::MP5_ID, TemplateUnPeer::MP6_ID, TemplateUnPeer::MP7_ID, TemplateUnPeer::CREATE_DATE, TemplateUnPeer::LAST_UPDATE, TemplateUnPeer::EXPIRED_DATE, TemplateUnPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('TEMPLATE_ID', 'JENJANG_PENDIDIKAN_ID', 'TAHUN_AJARAN_ID', 'JURUSAN_ID', 'TEMPLATE_KET', 'MP1_ID', 'MP2_ID', 'MP3_ID', 'MP4_ID', 'MP5_ID', 'MP6_ID', 'MP7_ID', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('template_id', 'jenjang_pendidikan_id', 'tahun_ajaran_id', 'jurusan_id', 'template_ket', 'mp1_id', 'mp2_id', 'mp3_id', 'mp4_id', 'mp5_id', 'mp6_id', 'mp7_id', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. TemplateUnPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('TemplateId' => 0, 'JenjangPendidikanId' => 1, 'TahunAjaranId' => 2, 'JurusanId' => 3, 'TemplateKet' => 4, 'Mp1Id' => 5, 'Mp2Id' => 6, 'Mp3Id' => 7, 'Mp4Id' => 8, 'Mp5Id' => 9, 'Mp6Id' => 10, 'Mp7Id' => 11, 'CreateDate' => 12, 'LastUpdate' => 13, 'ExpiredDate' => 14, 'LastSync' => 15, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('templateId' => 0, 'jenjangPendidikanId' => 1, 'tahunAjaranId' => 2, 'jurusanId' => 3, 'templateKet' => 4, 'mp1Id' => 5, 'mp2Id' => 6, 'mp3Id' => 7, 'mp4Id' => 8, 'mp5Id' => 9, 'mp6Id' => 10, 'mp7Id' => 11, 'createDate' => 12, 'lastUpdate' => 13, 'expiredDate' => 14, 'lastSync' => 15, ),
        BasePeer::TYPE_COLNAME => array (TemplateUnPeer::TEMPLATE_ID => 0, TemplateUnPeer::JENJANG_PENDIDIKAN_ID => 1, TemplateUnPeer::TAHUN_AJARAN_ID => 2, TemplateUnPeer::JURUSAN_ID => 3, TemplateUnPeer::TEMPLATE_KET => 4, TemplateUnPeer::MP1_ID => 5, TemplateUnPeer::MP2_ID => 6, TemplateUnPeer::MP3_ID => 7, TemplateUnPeer::MP4_ID => 8, TemplateUnPeer::MP5_ID => 9, TemplateUnPeer::MP6_ID => 10, TemplateUnPeer::MP7_ID => 11, TemplateUnPeer::CREATE_DATE => 12, TemplateUnPeer::LAST_UPDATE => 13, TemplateUnPeer::EXPIRED_DATE => 14, TemplateUnPeer::LAST_SYNC => 15, ),
        BasePeer::TYPE_RAW_COLNAME => array ('TEMPLATE_ID' => 0, 'JENJANG_PENDIDIKAN_ID' => 1, 'TAHUN_AJARAN_ID' => 2, 'JURUSAN_ID' => 3, 'TEMPLATE_KET' => 4, 'MP1_ID' => 5, 'MP2_ID' => 6, 'MP3_ID' => 7, 'MP4_ID' => 8, 'MP5_ID' => 9, 'MP6_ID' => 10, 'MP7_ID' => 11, 'CREATE_DATE' => 12, 'LAST_UPDATE' => 13, 'EXPIRED_DATE' => 14, 'LAST_SYNC' => 15, ),
        BasePeer::TYPE_FIELDNAME => array ('template_id' => 0, 'jenjang_pendidikan_id' => 1, 'tahun_ajaran_id' => 2, 'jurusan_id' => 3, 'template_ket' => 4, 'mp1_id' => 5, 'mp2_id' => 6, 'mp3_id' => 7, 'mp4_id' => 8, 'mp5_id' => 9, 'mp6_id' => 10, 'mp7_id' => 11, 'create_date' => 12, 'last_update' => 13, 'expired_date' => 14, 'last_sync' => 15, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
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
        $toNames = TemplateUnPeer::getFieldNames($toType);
        $key = isset(TemplateUnPeer::$fieldKeys[$fromType][$name]) ? TemplateUnPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(TemplateUnPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, TemplateUnPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return TemplateUnPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. TemplateUnPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(TemplateUnPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(TemplateUnPeer::TEMPLATE_ID);
            $criteria->addSelectColumn(TemplateUnPeer::JENJANG_PENDIDIKAN_ID);
            $criteria->addSelectColumn(TemplateUnPeer::TAHUN_AJARAN_ID);
            $criteria->addSelectColumn(TemplateUnPeer::JURUSAN_ID);
            $criteria->addSelectColumn(TemplateUnPeer::TEMPLATE_KET);
            $criteria->addSelectColumn(TemplateUnPeer::MP1_ID);
            $criteria->addSelectColumn(TemplateUnPeer::MP2_ID);
            $criteria->addSelectColumn(TemplateUnPeer::MP3_ID);
            $criteria->addSelectColumn(TemplateUnPeer::MP4_ID);
            $criteria->addSelectColumn(TemplateUnPeer::MP5_ID);
            $criteria->addSelectColumn(TemplateUnPeer::MP6_ID);
            $criteria->addSelectColumn(TemplateUnPeer::MP7_ID);
            $criteria->addSelectColumn(TemplateUnPeer::CREATE_DATE);
            $criteria->addSelectColumn(TemplateUnPeer::LAST_UPDATE);
            $criteria->addSelectColumn(TemplateUnPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(TemplateUnPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.template_id');
            $criteria->addSelectColumn($alias . '.jenjang_pendidikan_id');
            $criteria->addSelectColumn($alias . '.tahun_ajaran_id');
            $criteria->addSelectColumn($alias . '.jurusan_id');
            $criteria->addSelectColumn($alias . '.template_ket');
            $criteria->addSelectColumn($alias . '.mp1_id');
            $criteria->addSelectColumn($alias . '.mp2_id');
            $criteria->addSelectColumn($alias . '.mp3_id');
            $criteria->addSelectColumn($alias . '.mp4_id');
            $criteria->addSelectColumn($alias . '.mp5_id');
            $criteria->addSelectColumn($alias . '.mp6_id');
            $criteria->addSelectColumn($alias . '.mp7_id');
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
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TemplateUn
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = TemplateUnPeer::doSelect($critcopy, $con);
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
        return TemplateUnPeer::populateObjects(TemplateUnPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            TemplateUnPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

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
     * @param      TemplateUn $obj A TemplateUn object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getTemplateId();
            } // if key === null
            TemplateUnPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A TemplateUn object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof TemplateUn) {
                $key = (string) $value->getTemplateId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or TemplateUn object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(TemplateUnPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   TemplateUn Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(TemplateUnPeer::$instances[$key])) {
                return TemplateUnPeer::$instances[$key];
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
        foreach (TemplateUnPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        TemplateUnPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.template_un
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
        $cls = TemplateUnPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = TemplateUnPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TemplateUnPeer::addInstanceToPool($obj, $key);
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
     * @return array (TemplateUn object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = TemplateUnPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = TemplateUnPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + TemplateUnPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TemplateUnPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            TemplateUnPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenjangPendidikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenjangPendidikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Jurusan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJurusan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp3Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMataPelajaranRelatedByMp3Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TemplateUnPeer::MP3_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp4Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMataPelajaranRelatedByMp4Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TemplateUnPeer::MP4_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp7Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMataPelajaranRelatedByMp7Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TemplateUnPeer::MP7_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp5Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMataPelajaranRelatedByMp5Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TemplateUnPeer::MP5_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp1Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMataPelajaranRelatedByMp1Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TemplateUnPeer::MP1_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp2Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMataPelajaranRelatedByMp2Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TemplateUnPeer::MP2_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp6Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMataPelajaranRelatedByMp6Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TemplateUnPeer::MP6_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related TahunAjaran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinTahunAjaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Selects a collection of TemplateUn objects pre-filled with their JenjangPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenjangPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol = TemplateUnPeer::NUM_HYDRATE_COLUMNS;
        JenjangPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TemplateUn) to $obj2 (JenjangPendidikan)
                $obj2->addTemplateUn($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with their Jurusan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJurusan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol = TemplateUnPeer::NUM_HYDRATE_COLUMNS;
        JurusanPeer::addSelectColumns($criteria);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JurusanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JurusanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JurusanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TemplateUn) to $obj2 (Jurusan)
                $obj2->addTemplateUn($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with their MataPelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMataPelajaranRelatedByMp3Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol = TemplateUnPeer::NUM_HYDRATE_COLUMNS;
        MataPelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(TemplateUnPeer::MP3_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MataPelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MataPelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TemplateUn) to $obj2 (MataPelajaran)
                $obj2->addTemplateUnRelatedByMp3Id($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with their MataPelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMataPelajaranRelatedByMp4Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol = TemplateUnPeer::NUM_HYDRATE_COLUMNS;
        MataPelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(TemplateUnPeer::MP4_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MataPelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MataPelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TemplateUn) to $obj2 (MataPelajaran)
                $obj2->addTemplateUnRelatedByMp4Id($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with their MataPelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMataPelajaranRelatedByMp7Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol = TemplateUnPeer::NUM_HYDRATE_COLUMNS;
        MataPelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(TemplateUnPeer::MP7_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MataPelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MataPelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TemplateUn) to $obj2 (MataPelajaran)
                $obj2->addTemplateUnRelatedByMp7Id($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with their MataPelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMataPelajaranRelatedByMp5Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol = TemplateUnPeer::NUM_HYDRATE_COLUMNS;
        MataPelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(TemplateUnPeer::MP5_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MataPelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MataPelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TemplateUn) to $obj2 (MataPelajaran)
                $obj2->addTemplateUnRelatedByMp5Id($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with their MataPelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMataPelajaranRelatedByMp1Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol = TemplateUnPeer::NUM_HYDRATE_COLUMNS;
        MataPelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(TemplateUnPeer::MP1_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MataPelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MataPelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TemplateUn) to $obj2 (MataPelajaran)
                $obj2->addTemplateUnRelatedByMp1Id($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with their MataPelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMataPelajaranRelatedByMp2Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol = TemplateUnPeer::NUM_HYDRATE_COLUMNS;
        MataPelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(TemplateUnPeer::MP2_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MataPelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MataPelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TemplateUn) to $obj2 (MataPelajaran)
                $obj2->addTemplateUnRelatedByMp2Id($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with their MataPelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMataPelajaranRelatedByMp6Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol = TemplateUnPeer::NUM_HYDRATE_COLUMNS;
        MataPelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(TemplateUnPeer::MP6_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MataPelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MataPelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TemplateUn) to $obj2 (MataPelajaran)
                $obj2->addTemplateUnRelatedByMp6Id($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with their TahunAjaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTahunAjaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol = TemplateUnPeer::NUM_HYDRATE_COLUMNS;
        TahunAjaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = TahunAjaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = TahunAjaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    TahunAjaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TemplateUn) to $obj2 (TahunAjaran)
                $obj2->addTemplateUn($obj1);

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
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP3_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP4_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP7_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP5_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP1_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP2_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP6_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Selects a collection of TemplateUn objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol2 = TemplateUnPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP3_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP4_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP7_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP5_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP1_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP2_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP6_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined JenjangPendidikan rows

            $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj2 (JenjangPendidikan)
                $obj2->addTemplateUn($obj1);
            } // if joined row not null

            // Add objects for joined Jurusan rows

            $key3 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JurusanPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JurusanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj3 (Jurusan)
                $obj3->addTemplateUn($obj1);
            } // if joined row not null

            // Add objects for joined MataPelajaran rows

            $key4 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = MataPelajaranPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    MataPelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj4 (MataPelajaran)
                $obj4->addTemplateUnRelatedByMp3Id($obj1);
            } // if joined row not null

            // Add objects for joined MataPelajaran rows

            $key5 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = MataPelajaranPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MataPelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj5 (MataPelajaran)
                $obj5->addTemplateUnRelatedByMp4Id($obj1);
            } // if joined row not null

            // Add objects for joined MataPelajaran rows

            $key6 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = MataPelajaranPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MataPelajaranPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj6 (MataPelajaran)
                $obj6->addTemplateUnRelatedByMp7Id($obj1);
            } // if joined row not null

            // Add objects for joined MataPelajaran rows

            $key7 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = MataPelajaranPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MataPelajaranPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj7 (MataPelajaran)
                $obj7->addTemplateUnRelatedByMp5Id($obj1);
            } // if joined row not null

            // Add objects for joined MataPelajaran rows

            $key8 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = MataPelajaranPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    MataPelajaranPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj8 (MataPelajaran)
                $obj8->addTemplateUnRelatedByMp1Id($obj1);
            } // if joined row not null

            // Add objects for joined MataPelajaran rows

            $key9 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol9);
            if ($key9 !== null) {
                $obj9 = MataPelajaranPeer::getInstanceFromPool($key9);
                if (!$obj9) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    MataPelajaranPeer::addInstanceToPool($obj9, $key9);
                } // if obj9 loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj9 (MataPelajaran)
                $obj9->addTemplateUnRelatedByMp2Id($obj1);
            } // if joined row not null

            // Add objects for joined MataPelajaran rows

            $key10 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol10);
            if ($key10 !== null) {
                $obj10 = MataPelajaranPeer::getInstanceFromPool($key10);
                if (!$obj10) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    MataPelajaranPeer::addInstanceToPool($obj10, $key10);
                } // if obj10 loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj10 (MataPelajaran)
                $obj10->addTemplateUnRelatedByMp6Id($obj1);
            } // if joined row not null

            // Add objects for joined TahunAjaran rows

            $key11 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol11);
            if ($key11 !== null) {
                $obj11 = TahunAjaranPeer::getInstanceFromPool($key11);
                if (!$obj11) {

                    $cls = TahunAjaranPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    TahunAjaranPeer::addInstanceToPool($obj11, $key11);
                } // if obj11 loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj11 (TahunAjaran)
                $obj11->addTemplateUn($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenjangPendidikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenjangPendidikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP3_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP4_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP7_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP5_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP1_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP2_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP6_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Jurusan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJurusan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP3_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP4_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP7_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP5_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP1_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP2_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP6_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp3Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMataPelajaranRelatedByMp3Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp4Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMataPelajaranRelatedByMp4Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp7Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMataPelajaranRelatedByMp7Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp5Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMataPelajaranRelatedByMp5Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp1Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMataPelajaranRelatedByMp1Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp2Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMataPelajaranRelatedByMp2Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related MataPelajaranRelatedByMp6Id table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMataPelajaranRelatedByMp6Id(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related TahunAjaran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptTahunAjaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TemplateUnPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP3_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP4_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP7_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP5_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP1_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP2_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP6_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Selects a collection of TemplateUn objects pre-filled with all related objects except JenjangPendidikan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenjangPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol2 = TemplateUnPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP3_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP4_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP7_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP5_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP1_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP2_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP6_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Jurusan rows

                $key2 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj2 (Jurusan)
                $obj2->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key3 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = MataPelajaranPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MataPelajaranPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj3 (MataPelajaran)
                $obj3->addTemplateUnRelatedByMp3Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key4 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = MataPelajaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    MataPelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj4 (MataPelajaran)
                $obj4->addTemplateUnRelatedByMp4Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key5 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MataPelajaranPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MataPelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj5 (MataPelajaran)
                $obj5->addTemplateUnRelatedByMp7Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key6 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MataPelajaranPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MataPelajaranPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj6 (MataPelajaran)
                $obj6->addTemplateUnRelatedByMp5Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key7 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MataPelajaranPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MataPelajaranPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj7 (MataPelajaran)
                $obj7->addTemplateUnRelatedByMp1Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key8 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = MataPelajaranPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    MataPelajaranPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj8 (MataPelajaran)
                $obj8->addTemplateUnRelatedByMp2Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key9 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = MataPelajaranPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    MataPelajaranPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj9 (MataPelajaran)
                $obj9->addTemplateUnRelatedByMp6Id($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key10 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = TahunAjaranPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    TahunAjaranPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj10 (TahunAjaran)
                $obj10->addTemplateUn($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with all related objects except Jurusan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJurusan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol2 = TemplateUnPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP3_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP4_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP7_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP5_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP1_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP2_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP6_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenjangPendidikan rows

                $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj2 (JenjangPendidikan)
                $obj2->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key3 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = MataPelajaranPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    MataPelajaranPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj3 (MataPelajaran)
                $obj3->addTemplateUnRelatedByMp3Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key4 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = MataPelajaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    MataPelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj4 (MataPelajaran)
                $obj4->addTemplateUnRelatedByMp4Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key5 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MataPelajaranPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MataPelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj5 (MataPelajaran)
                $obj5->addTemplateUnRelatedByMp7Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key6 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MataPelajaranPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MataPelajaranPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj6 (MataPelajaran)
                $obj6->addTemplateUnRelatedByMp5Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key7 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MataPelajaranPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MataPelajaranPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj7 (MataPelajaran)
                $obj7->addTemplateUnRelatedByMp1Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key8 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = MataPelajaranPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    MataPelajaranPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj8 (MataPelajaran)
                $obj8->addTemplateUnRelatedByMp2Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key9 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = MataPelajaranPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    MataPelajaranPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj9 (MataPelajaran)
                $obj9->addTemplateUnRelatedByMp6Id($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key10 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = TahunAjaranPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    TahunAjaranPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj10 (TahunAjaran)
                $obj10->addTemplateUn($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with all related objects except MataPelajaranRelatedByMp3Id.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMataPelajaranRelatedByMp3Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol2 = TemplateUnPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenjangPendidikan rows

                $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj2 (JenjangPendidikan)
                $obj2->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined Jurusan rows

                $key3 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JurusanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj3 (Jurusan)
                $obj3->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key4 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TahunAjaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TahunAjaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj4 (TahunAjaran)
                $obj4->addTemplateUn($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with all related objects except MataPelajaranRelatedByMp4Id.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMataPelajaranRelatedByMp4Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol2 = TemplateUnPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenjangPendidikan rows

                $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj2 (JenjangPendidikan)
                $obj2->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined Jurusan rows

                $key3 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JurusanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj3 (Jurusan)
                $obj3->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key4 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TahunAjaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TahunAjaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj4 (TahunAjaran)
                $obj4->addTemplateUn($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with all related objects except MataPelajaranRelatedByMp7Id.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMataPelajaranRelatedByMp7Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol2 = TemplateUnPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenjangPendidikan rows

                $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj2 (JenjangPendidikan)
                $obj2->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined Jurusan rows

                $key3 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JurusanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj3 (Jurusan)
                $obj3->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key4 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TahunAjaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TahunAjaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj4 (TahunAjaran)
                $obj4->addTemplateUn($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with all related objects except MataPelajaranRelatedByMp5Id.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMataPelajaranRelatedByMp5Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol2 = TemplateUnPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenjangPendidikan rows

                $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj2 (JenjangPendidikan)
                $obj2->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined Jurusan rows

                $key3 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JurusanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj3 (Jurusan)
                $obj3->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key4 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TahunAjaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TahunAjaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj4 (TahunAjaran)
                $obj4->addTemplateUn($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with all related objects except MataPelajaranRelatedByMp1Id.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMataPelajaranRelatedByMp1Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol2 = TemplateUnPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenjangPendidikan rows

                $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj2 (JenjangPendidikan)
                $obj2->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined Jurusan rows

                $key3 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JurusanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj3 (Jurusan)
                $obj3->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key4 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TahunAjaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TahunAjaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj4 (TahunAjaran)
                $obj4->addTemplateUn($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with all related objects except MataPelajaranRelatedByMp2Id.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMataPelajaranRelatedByMp2Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol2 = TemplateUnPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenjangPendidikan rows

                $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj2 (JenjangPendidikan)
                $obj2->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined Jurusan rows

                $key3 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JurusanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj3 (Jurusan)
                $obj3->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key4 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TahunAjaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TahunAjaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj4 (TahunAjaran)
                $obj4->addTemplateUn($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with all related objects except MataPelajaranRelatedByMp6Id.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMataPelajaranRelatedByMp6Id(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol2 = TemplateUnPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenjangPendidikan rows

                $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj2 (JenjangPendidikan)
                $obj2->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined Jurusan rows

                $key3 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JurusanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj3 (Jurusan)
                $obj3->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key4 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TahunAjaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TahunAjaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj4 (TahunAjaran)
                $obj4->addTemplateUn($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TemplateUn objects pre-filled with all related objects except TahunAjaran.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TemplateUn objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptTahunAjaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);
        }

        TemplateUnPeer::addSelectColumns($criteria);
        $startcol2 = TemplateUnPeer::NUM_HYDRATE_COLUMNS;

        JenjangPendidikanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JurusanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JurusanPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::JURUSAN_ID, JurusanPeer::JURUSAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP3_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP4_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP7_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP5_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP1_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP2_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(TemplateUnPeer::MP6_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TemplateUnPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TemplateUnPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TemplateUnPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TemplateUnPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenjangPendidikan rows

                $key2 = JenjangPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenjangPendidikanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenjangPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenjangPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj2 (JenjangPendidikan)
                $obj2->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined Jurusan rows

                $key3 = JurusanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JurusanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JurusanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JurusanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj3 (Jurusan)
                $obj3->addTemplateUn($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key4 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = MataPelajaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    MataPelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj4 (MataPelajaran)
                $obj4->addTemplateUnRelatedByMp3Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key5 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = MataPelajaranPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    MataPelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj5 (MataPelajaran)
                $obj5->addTemplateUnRelatedByMp4Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key6 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = MataPelajaranPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    MataPelajaranPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj6 (MataPelajaran)
                $obj6->addTemplateUnRelatedByMp7Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key7 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = MataPelajaranPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    MataPelajaranPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj7 (MataPelajaran)
                $obj7->addTemplateUnRelatedByMp5Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key8 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = MataPelajaranPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    MataPelajaranPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj8 (MataPelajaran)
                $obj8->addTemplateUnRelatedByMp1Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key9 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = MataPelajaranPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    MataPelajaranPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj9 (MataPelajaran)
                $obj9->addTemplateUnRelatedByMp2Id($obj1);

            } // if joined row is not null

                // Add objects for joined MataPelajaran rows

                $key10 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = MataPelajaranPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = MataPelajaranPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    MataPelajaranPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (TemplateUn) to the collection in $obj10 (MataPelajaran)
                $obj10->addTemplateUnRelatedByMp6Id($obj1);

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
        return Propel::getDatabaseMap(TemplateUnPeer::DATABASE_NAME)->getTable(TemplateUnPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseTemplateUnPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseTemplateUnPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new TemplateUnTableMap());
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
        return TemplateUnPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a TemplateUn or Criteria object.
     *
     * @param      mixed $values Criteria or TemplateUn object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from TemplateUn object
        }


        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a TemplateUn or Criteria object.
     *
     * @param      mixed $values Criteria or TemplateUn object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(TemplateUnPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(TemplateUnPeer::TEMPLATE_ID);
            $value = $criteria->remove(TemplateUnPeer::TEMPLATE_ID);
            if ($value) {
                $selectCriteria->add(TemplateUnPeer::TEMPLATE_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TemplateUnPeer::TABLE_NAME);
            }

        } else { // $values is TemplateUn object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.template_un table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(TemplateUnPeer::TABLE_NAME, $con, TemplateUnPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TemplateUnPeer::clearInstancePool();
            TemplateUnPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a TemplateUn or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or TemplateUn object or primary key or array of primary keys
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
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            TemplateUnPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof TemplateUn) { // it's a model object
            // invalidate the cache for this single object
            TemplateUnPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TemplateUnPeer::DATABASE_NAME);
            $criteria->add(TemplateUnPeer::TEMPLATE_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                TemplateUnPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(TemplateUnPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            TemplateUnPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given TemplateUn object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      TemplateUn $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(TemplateUnPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(TemplateUnPeer::TABLE_NAME);

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

        return BasePeer::doValidate(TemplateUnPeer::DATABASE_NAME, TemplateUnPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return TemplateUn
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = TemplateUnPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(TemplateUnPeer::DATABASE_NAME);
        $criteria->add(TemplateUnPeer::TEMPLATE_ID, $pk);

        $v = TemplateUnPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return TemplateUn[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(TemplateUnPeer::DATABASE_NAME);
            $criteria->add(TemplateUnPeer::TEMPLATE_ID, $pks, Criteria::IN);
            $objs = TemplateUnPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseTemplateUnPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTemplateUnPeer::buildTableMap();

