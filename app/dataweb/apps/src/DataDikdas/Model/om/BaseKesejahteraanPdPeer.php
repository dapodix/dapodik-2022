<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisKesejahteraanPeer;
use DataDikdas\Model\KesejahteraanPd;
use DataDikdas\Model\KesejahteraanPdPeer;
use DataDikdas\Model\PesertaDidikPeer;
use DataDikdas\Model\map\KesejahteraanPdTableMap;

/**
 * Base static class for performing query and update operations on the 'kesejahteraan_pd' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseKesejahteraanPdPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'kesejahteraan_pd';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\KesejahteraanPd';

    /** the related TableMap class for this table */
    const TM_CLASS = 'KesejahteraanPdTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 12;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 12;

    /** the column name for the id_sejahtera_pd field */
    const ID_SEJAHTERA_PD = 'kesejahteraan_pd.id_sejahtera_pd';

    /** the column name for the peserta_didik_id field */
    const PESERTA_DIDIK_ID = 'kesejahteraan_pd.peserta_didik_id';

    /** the column name for the jenis_kesejahteraan_id field */
    const JENIS_KESEJAHTERAAN_ID = 'kesejahteraan_pd.jenis_kesejahteraan_id';

    /** the column name for the nomor field */
    const NOMOR = 'kesejahteraan_pd.nomor';

    /** the column name for the nm_di_kartu field */
    const NM_DI_KARTU = 'kesejahteraan_pd.nm_di_kartu';

    /** the column name for the dari_tahun field */
    const DARI_TAHUN = 'kesejahteraan_pd.dari_tahun';

    /** the column name for the sampai_tahun field */
    const SAMPAI_TAHUN = 'kesejahteraan_pd.sampai_tahun';

    /** the column name for the create_date field */
    const CREATE_DATE = 'kesejahteraan_pd.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'kesejahteraan_pd.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'kesejahteraan_pd.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'kesejahteraan_pd.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'kesejahteraan_pd.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of KesejahteraanPd objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array KesejahteraanPd[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. KesejahteraanPdPeer::$fieldNames[KesejahteraanPdPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdSejahteraPd', 'PesertaDidikId', 'JenisKesejahteraanId', 'Nomor', 'NmDiKartu', 'DariTahun', 'SampaiTahun', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idSejahteraPd', 'pesertaDidikId', 'jenisKesejahteraanId', 'nomor', 'nmDiKartu', 'dariTahun', 'sampaiTahun', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (KesejahteraanPdPeer::ID_SEJAHTERA_PD, KesejahteraanPdPeer::PESERTA_DIDIK_ID, KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID, KesejahteraanPdPeer::NOMOR, KesejahteraanPdPeer::NM_DI_KARTU, KesejahteraanPdPeer::DARI_TAHUN, KesejahteraanPdPeer::SAMPAI_TAHUN, KesejahteraanPdPeer::CREATE_DATE, KesejahteraanPdPeer::LAST_UPDATE, KesejahteraanPdPeer::SOFT_DELETE, KesejahteraanPdPeer::LAST_SYNC, KesejahteraanPdPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_SEJAHTERA_PD', 'PESERTA_DIDIK_ID', 'JENIS_KESEJAHTERAAN_ID', 'NOMOR', 'NM_DI_KARTU', 'DARI_TAHUN', 'SAMPAI_TAHUN', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_sejahtera_pd', 'peserta_didik_id', 'jenis_kesejahteraan_id', 'nomor', 'nm_di_kartu', 'dari_tahun', 'sampai_tahun', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. KesejahteraanPdPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdSejahteraPd' => 0, 'PesertaDidikId' => 1, 'JenisKesejahteraanId' => 2, 'Nomor' => 3, 'NmDiKartu' => 4, 'DariTahun' => 5, 'SampaiTahun' => 6, 'CreateDate' => 7, 'LastUpdate' => 8, 'SoftDelete' => 9, 'LastSync' => 10, 'UpdaterId' => 11, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idSejahteraPd' => 0, 'pesertaDidikId' => 1, 'jenisKesejahteraanId' => 2, 'nomor' => 3, 'nmDiKartu' => 4, 'dariTahun' => 5, 'sampaiTahun' => 6, 'createDate' => 7, 'lastUpdate' => 8, 'softDelete' => 9, 'lastSync' => 10, 'updaterId' => 11, ),
        BasePeer::TYPE_COLNAME => array (KesejahteraanPdPeer::ID_SEJAHTERA_PD => 0, KesejahteraanPdPeer::PESERTA_DIDIK_ID => 1, KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID => 2, KesejahteraanPdPeer::NOMOR => 3, KesejahteraanPdPeer::NM_DI_KARTU => 4, KesejahteraanPdPeer::DARI_TAHUN => 5, KesejahteraanPdPeer::SAMPAI_TAHUN => 6, KesejahteraanPdPeer::CREATE_DATE => 7, KesejahteraanPdPeer::LAST_UPDATE => 8, KesejahteraanPdPeer::SOFT_DELETE => 9, KesejahteraanPdPeer::LAST_SYNC => 10, KesejahteraanPdPeer::UPDATER_ID => 11, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_SEJAHTERA_PD' => 0, 'PESERTA_DIDIK_ID' => 1, 'JENIS_KESEJAHTERAAN_ID' => 2, 'NOMOR' => 3, 'NM_DI_KARTU' => 4, 'DARI_TAHUN' => 5, 'SAMPAI_TAHUN' => 6, 'CREATE_DATE' => 7, 'LAST_UPDATE' => 8, 'SOFT_DELETE' => 9, 'LAST_SYNC' => 10, 'UPDATER_ID' => 11, ),
        BasePeer::TYPE_FIELDNAME => array ('id_sejahtera_pd' => 0, 'peserta_didik_id' => 1, 'jenis_kesejahteraan_id' => 2, 'nomor' => 3, 'nm_di_kartu' => 4, 'dari_tahun' => 5, 'sampai_tahun' => 6, 'create_date' => 7, 'last_update' => 8, 'soft_delete' => 9, 'last_sync' => 10, 'updater_id' => 11, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $toNames = KesejahteraanPdPeer::getFieldNames($toType);
        $key = isset(KesejahteraanPdPeer::$fieldKeys[$fromType][$name]) ? KesejahteraanPdPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(KesejahteraanPdPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, KesejahteraanPdPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return KesejahteraanPdPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. KesejahteraanPdPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(KesejahteraanPdPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(KesejahteraanPdPeer::ID_SEJAHTERA_PD);
            $criteria->addSelectColumn(KesejahteraanPdPeer::PESERTA_DIDIK_ID);
            $criteria->addSelectColumn(KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID);
            $criteria->addSelectColumn(KesejahteraanPdPeer::NOMOR);
            $criteria->addSelectColumn(KesejahteraanPdPeer::NM_DI_KARTU);
            $criteria->addSelectColumn(KesejahteraanPdPeer::DARI_TAHUN);
            $criteria->addSelectColumn(KesejahteraanPdPeer::SAMPAI_TAHUN);
            $criteria->addSelectColumn(KesejahteraanPdPeer::CREATE_DATE);
            $criteria->addSelectColumn(KesejahteraanPdPeer::LAST_UPDATE);
            $criteria->addSelectColumn(KesejahteraanPdPeer::SOFT_DELETE);
            $criteria->addSelectColumn(KesejahteraanPdPeer::LAST_SYNC);
            $criteria->addSelectColumn(KesejahteraanPdPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_sejahtera_pd');
            $criteria->addSelectColumn($alias . '.peserta_didik_id');
            $criteria->addSelectColumn($alias . '.jenis_kesejahteraan_id');
            $criteria->addSelectColumn($alias . '.nomor');
            $criteria->addSelectColumn($alias . '.nm_di_kartu');
            $criteria->addSelectColumn($alias . '.dari_tahun');
            $criteria->addSelectColumn($alias . '.sampai_tahun');
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
        $criteria->setPrimaryTableName(KesejahteraanPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KesejahteraanPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 KesejahteraanPd
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = KesejahteraanPdPeer::doSelect($critcopy, $con);
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
        return KesejahteraanPdPeer::populateObjects(KesejahteraanPdPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            KesejahteraanPdPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);

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
     * @param      KesejahteraanPd $obj A KesejahteraanPd object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdSejahteraPd();
            } // if key === null
            KesejahteraanPdPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A KesejahteraanPd object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof KesejahteraanPd) {
                $key = (string) $value->getIdSejahteraPd();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or KesejahteraanPd object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(KesejahteraanPdPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   KesejahteraanPd Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(KesejahteraanPdPeer::$instances[$key])) {
                return KesejahteraanPdPeer::$instances[$key];
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
        foreach (KesejahteraanPdPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        KesejahteraanPdPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to kesejahteraan_pd
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
        $cls = KesejahteraanPdPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = KesejahteraanPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = KesejahteraanPdPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                KesejahteraanPdPeer::addInstanceToPool($obj, $key);
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
     * @return array (KesejahteraanPd object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = KesejahteraanPdPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = KesejahteraanPdPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + KesejahteraanPdPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = KesejahteraanPdPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            KesejahteraanPdPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisKesejahteraan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisKesejahteraan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(KesejahteraanPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KesejahteraanPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID, JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(KesejahteraanPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KesejahteraanPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KesejahteraanPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
     * Selects a collection of KesejahteraanPd objects pre-filled with their JenisKesejahteraan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of KesejahteraanPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisKesejahteraan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);
        }

        KesejahteraanPdPeer::addSelectColumns($criteria);
        $startcol = KesejahteraanPdPeer::NUM_HYDRATE_COLUMNS;
        JenisKesejahteraanPeer::addSelectColumns($criteria);

        $criteria->addJoin(KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID, JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KesejahteraanPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KesejahteraanPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = KesejahteraanPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KesejahteraanPdPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisKesejahteraanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisKesejahteraanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisKesejahteraanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisKesejahteraanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (KesejahteraanPd) to $obj2 (JenisKesejahteraan)
                $obj2->addKesejahteraanPd($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of KesejahteraanPd objects pre-filled with their PesertaDidik objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of KesejahteraanPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPesertaDidik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);
        }

        KesejahteraanPdPeer::addSelectColumns($criteria);
        $startcol = KesejahteraanPdPeer::NUM_HYDRATE_COLUMNS;
        PesertaDidikPeer::addSelectColumns($criteria);

        $criteria->addJoin(KesejahteraanPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KesejahteraanPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KesejahteraanPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = KesejahteraanPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KesejahteraanPdPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (KesejahteraanPd) to $obj2 (PesertaDidik)
                $obj2->addKesejahteraanPd($obj1);

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
        $criteria->setPrimaryTableName(KesejahteraanPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KesejahteraanPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID, JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $join_behavior);

        $criteria->addJoin(KesejahteraanPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
     * Selects a collection of KesejahteraanPd objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of KesejahteraanPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);
        }

        KesejahteraanPdPeer::addSelectColumns($criteria);
        $startcol2 = KesejahteraanPdPeer::NUM_HYDRATE_COLUMNS;

        JenisKesejahteraanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisKesejahteraanPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID, JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $join_behavior);

        $criteria->addJoin(KesejahteraanPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KesejahteraanPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KesejahteraanPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KesejahteraanPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KesejahteraanPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined JenisKesejahteraan rows

            $key2 = JenisKesejahteraanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = JenisKesejahteraanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisKesejahteraanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisKesejahteraanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (KesejahteraanPd) to the collection in $obj2 (JenisKesejahteraan)
                $obj2->addKesejahteraanPd($obj1);
            } // if joined row not null

            // Add objects for joined PesertaDidik rows

            $key3 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PesertaDidikPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PesertaDidikPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PesertaDidikPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (KesejahteraanPd) to the collection in $obj3 (PesertaDidik)
                $obj3->addKesejahteraanPd($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisKesejahteraan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisKesejahteraan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(KesejahteraanPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KesejahteraanPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(KesejahteraanPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(KesejahteraanPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KesejahteraanPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID, JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $join_behavior);

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
     * Selects a collection of KesejahteraanPd objects pre-filled with all related objects except JenisKesejahteraan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of KesejahteraanPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisKesejahteraan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);
        }

        KesejahteraanPdPeer::addSelectColumns($criteria);
        $startcol2 = KesejahteraanPdPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KesejahteraanPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KesejahteraanPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KesejahteraanPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KesejahteraanPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KesejahteraanPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined PesertaDidik rows

                $key2 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PesertaDidikPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PesertaDidikPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PesertaDidikPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (KesejahteraanPd) to the collection in $obj2 (PesertaDidik)
                $obj2->addKesejahteraanPd($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of KesejahteraanPd objects pre-filled with all related objects except PesertaDidik.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of KesejahteraanPd objects.
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
            $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);
        }

        KesejahteraanPdPeer::addSelectColumns($criteria);
        $startcol2 = KesejahteraanPdPeer::NUM_HYDRATE_COLUMNS;

        JenisKesejahteraanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisKesejahteraanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KesejahteraanPdPeer::JENIS_KESEJAHTERAAN_ID, JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KesejahteraanPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KesejahteraanPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KesejahteraanPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KesejahteraanPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisKesejahteraan rows

                $key2 = JenisKesejahteraanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisKesejahteraanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisKesejahteraanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisKesejahteraanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (KesejahteraanPd) to the collection in $obj2 (JenisKesejahteraan)
                $obj2->addKesejahteraanPd($obj1);

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
        return Propel::getDatabaseMap(KesejahteraanPdPeer::DATABASE_NAME)->getTable(KesejahteraanPdPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseKesejahteraanPdPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseKesejahteraanPdPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new KesejahteraanPdTableMap());
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
        return KesejahteraanPdPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a KesejahteraanPd or Criteria object.
     *
     * @param      mixed $values Criteria or KesejahteraanPd object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from KesejahteraanPd object
        }


        // Set the correct dbName
        $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a KesejahteraanPd or Criteria object.
     *
     * @param      mixed $values Criteria or KesejahteraanPd object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(KesejahteraanPdPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(KesejahteraanPdPeer::ID_SEJAHTERA_PD);
            $value = $criteria->remove(KesejahteraanPdPeer::ID_SEJAHTERA_PD);
            if ($value) {
                $selectCriteria->add(KesejahteraanPdPeer::ID_SEJAHTERA_PD, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(KesejahteraanPdPeer::TABLE_NAME);
            }

        } else { // $values is KesejahteraanPd object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the kesejahteraan_pd table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(KesejahteraanPdPeer::TABLE_NAME, $con, KesejahteraanPdPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KesejahteraanPdPeer::clearInstancePool();
            KesejahteraanPdPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a KesejahteraanPd or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or KesejahteraanPd object or primary key or array of primary keys
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
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            KesejahteraanPdPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof KesejahteraanPd) { // it's a model object
            // invalidate the cache for this single object
            KesejahteraanPdPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(KesejahteraanPdPeer::DATABASE_NAME);
            $criteria->add(KesejahteraanPdPeer::ID_SEJAHTERA_PD, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                KesejahteraanPdPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(KesejahteraanPdPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            KesejahteraanPdPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given KesejahteraanPd object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      KesejahteraanPd $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(KesejahteraanPdPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(KesejahteraanPdPeer::TABLE_NAME);

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

        return BasePeer::doValidate(KesejahteraanPdPeer::DATABASE_NAME, KesejahteraanPdPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return KesejahteraanPd
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = KesejahteraanPdPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(KesejahteraanPdPeer::DATABASE_NAME);
        $criteria->add(KesejahteraanPdPeer::ID_SEJAHTERA_PD, $pk);

        $v = KesejahteraanPdPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return KesejahteraanPd[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(KesejahteraanPdPeer::DATABASE_NAME);
            $criteria->add(KesejahteraanPdPeer::ID_SEJAHTERA_PD, $pks, Criteria::IN);
            $objs = KesejahteraanPdPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseKesejahteraanPdPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseKesejahteraanPdPeer::buildTableMap();

