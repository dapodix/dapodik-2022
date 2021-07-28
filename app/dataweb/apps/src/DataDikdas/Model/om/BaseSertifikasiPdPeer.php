<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BidangStudiPeer;
use DataDikdas\Model\JenisSertifikasiPeer;
use DataDikdas\Model\LembSertifikasiPeer;
use DataDikdas\Model\PesertaDidikPeer;
use DataDikdas\Model\SertifikasiPd;
use DataDikdas\Model\SertifikasiPdPeer;
use DataDikdas\Model\map\SertifikasiPdTableMap;

/**
 * Base static class for performing query and update operations on the 'sertifikasi_pd' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseSertifikasiPdPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'sertifikasi_pd';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\SertifikasiPd';

    /** the related TableMap class for this table */
    const TM_CLASS = 'SertifikasiPdTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 14;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 14;

    /** the column name for the id_sert_pd field */
    const ID_SERT_PD = 'sertifikasi_pd.id_sert_pd';

    /** the column name for the id_jenis_sertifikasi field */
    const ID_JENIS_SERTIFIKASI = 'sertifikasi_pd.id_jenis_sertifikasi';

    /** the column name for the peserta_didik_id field */
    const PESERTA_DIDIK_ID = 'sertifikasi_pd.peserta_didik_id';

    /** the column name for the bidang_studi_id field */
    const BIDANG_STUDI_ID = 'sertifikasi_pd.bidang_studi_id';

    /** the column name for the no_sert_pd field */
    const NO_SERT_PD = 'sertifikasi_pd.no_sert_pd';

    /** the column name for the tgl_sert_pd field */
    const TGL_SERT_PD = 'sertifikasi_pd.tgl_sert_pd';

    /** the column name for the tgl_exp_sert_pd field */
    const TGL_EXP_SERT_PD = 'sertifikasi_pd.tgl_exp_sert_pd';

    /** the column name for the no_peserta_sert_pd field */
    const NO_PESERTA_SERT_PD = 'sertifikasi_pd.no_peserta_sert_pd';

    /** the column name for the kode_lemb_sert field */
    const KODE_LEMB_SERT = 'sertifikasi_pd.kode_lemb_sert';

    /** the column name for the create_date field */
    const CREATE_DATE = 'sertifikasi_pd.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'sertifikasi_pd.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'sertifikasi_pd.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'sertifikasi_pd.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'sertifikasi_pd.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of SertifikasiPd objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array SertifikasiPd[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. SertifikasiPdPeer::$fieldNames[SertifikasiPdPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdSertPd', 'IdJenisSertifikasi', 'PesertaDidikId', 'BidangStudiId', 'NoSertPd', 'TglSertPd', 'TglExpSertPd', 'NoPesertaSertPd', 'KodeLembSert', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idSertPd', 'idJenisSertifikasi', 'pesertaDidikId', 'bidangStudiId', 'noSertPd', 'tglSertPd', 'tglExpSertPd', 'noPesertaSertPd', 'kodeLembSert', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (SertifikasiPdPeer::ID_SERT_PD, SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, SertifikasiPdPeer::PESERTA_DIDIK_ID, SertifikasiPdPeer::BIDANG_STUDI_ID, SertifikasiPdPeer::NO_SERT_PD, SertifikasiPdPeer::TGL_SERT_PD, SertifikasiPdPeer::TGL_EXP_SERT_PD, SertifikasiPdPeer::NO_PESERTA_SERT_PD, SertifikasiPdPeer::KODE_LEMB_SERT, SertifikasiPdPeer::CREATE_DATE, SertifikasiPdPeer::LAST_UPDATE, SertifikasiPdPeer::SOFT_DELETE, SertifikasiPdPeer::LAST_SYNC, SertifikasiPdPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_SERT_PD', 'ID_JENIS_SERTIFIKASI', 'PESERTA_DIDIK_ID', 'BIDANG_STUDI_ID', 'NO_SERT_PD', 'TGL_SERT_PD', 'TGL_EXP_SERT_PD', 'NO_PESERTA_SERT_PD', 'KODE_LEMB_SERT', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_sert_pd', 'id_jenis_sertifikasi', 'peserta_didik_id', 'bidang_studi_id', 'no_sert_pd', 'tgl_sert_pd', 'tgl_exp_sert_pd', 'no_peserta_sert_pd', 'kode_lemb_sert', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. SertifikasiPdPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdSertPd' => 0, 'IdJenisSertifikasi' => 1, 'PesertaDidikId' => 2, 'BidangStudiId' => 3, 'NoSertPd' => 4, 'TglSertPd' => 5, 'TglExpSertPd' => 6, 'NoPesertaSertPd' => 7, 'KodeLembSert' => 8, 'CreateDate' => 9, 'LastUpdate' => 10, 'SoftDelete' => 11, 'LastSync' => 12, 'UpdaterId' => 13, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idSertPd' => 0, 'idJenisSertifikasi' => 1, 'pesertaDidikId' => 2, 'bidangStudiId' => 3, 'noSertPd' => 4, 'tglSertPd' => 5, 'tglExpSertPd' => 6, 'noPesertaSertPd' => 7, 'kodeLembSert' => 8, 'createDate' => 9, 'lastUpdate' => 10, 'softDelete' => 11, 'lastSync' => 12, 'updaterId' => 13, ),
        BasePeer::TYPE_COLNAME => array (SertifikasiPdPeer::ID_SERT_PD => 0, SertifikasiPdPeer::ID_JENIS_SERTIFIKASI => 1, SertifikasiPdPeer::PESERTA_DIDIK_ID => 2, SertifikasiPdPeer::BIDANG_STUDI_ID => 3, SertifikasiPdPeer::NO_SERT_PD => 4, SertifikasiPdPeer::TGL_SERT_PD => 5, SertifikasiPdPeer::TGL_EXP_SERT_PD => 6, SertifikasiPdPeer::NO_PESERTA_SERT_PD => 7, SertifikasiPdPeer::KODE_LEMB_SERT => 8, SertifikasiPdPeer::CREATE_DATE => 9, SertifikasiPdPeer::LAST_UPDATE => 10, SertifikasiPdPeer::SOFT_DELETE => 11, SertifikasiPdPeer::LAST_SYNC => 12, SertifikasiPdPeer::UPDATER_ID => 13, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_SERT_PD' => 0, 'ID_JENIS_SERTIFIKASI' => 1, 'PESERTA_DIDIK_ID' => 2, 'BIDANG_STUDI_ID' => 3, 'NO_SERT_PD' => 4, 'TGL_SERT_PD' => 5, 'TGL_EXP_SERT_PD' => 6, 'NO_PESERTA_SERT_PD' => 7, 'KODE_LEMB_SERT' => 8, 'CREATE_DATE' => 9, 'LAST_UPDATE' => 10, 'SOFT_DELETE' => 11, 'LAST_SYNC' => 12, 'UPDATER_ID' => 13, ),
        BasePeer::TYPE_FIELDNAME => array ('id_sert_pd' => 0, 'id_jenis_sertifikasi' => 1, 'peserta_didik_id' => 2, 'bidang_studi_id' => 3, 'no_sert_pd' => 4, 'tgl_sert_pd' => 5, 'tgl_exp_sert_pd' => 6, 'no_peserta_sert_pd' => 7, 'kode_lemb_sert' => 8, 'create_date' => 9, 'last_update' => 10, 'soft_delete' => 11, 'last_sync' => 12, 'updater_id' => 13, ),
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
        $toNames = SertifikasiPdPeer::getFieldNames($toType);
        $key = isset(SertifikasiPdPeer::$fieldKeys[$fromType][$name]) ? SertifikasiPdPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(SertifikasiPdPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, SertifikasiPdPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return SertifikasiPdPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. SertifikasiPdPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(SertifikasiPdPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(SertifikasiPdPeer::ID_SERT_PD);
            $criteria->addSelectColumn(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI);
            $criteria->addSelectColumn(SertifikasiPdPeer::PESERTA_DIDIK_ID);
            $criteria->addSelectColumn(SertifikasiPdPeer::BIDANG_STUDI_ID);
            $criteria->addSelectColumn(SertifikasiPdPeer::NO_SERT_PD);
            $criteria->addSelectColumn(SertifikasiPdPeer::TGL_SERT_PD);
            $criteria->addSelectColumn(SertifikasiPdPeer::TGL_EXP_SERT_PD);
            $criteria->addSelectColumn(SertifikasiPdPeer::NO_PESERTA_SERT_PD);
            $criteria->addSelectColumn(SertifikasiPdPeer::KODE_LEMB_SERT);
            $criteria->addSelectColumn(SertifikasiPdPeer::CREATE_DATE);
            $criteria->addSelectColumn(SertifikasiPdPeer::LAST_UPDATE);
            $criteria->addSelectColumn(SertifikasiPdPeer::SOFT_DELETE);
            $criteria->addSelectColumn(SertifikasiPdPeer::LAST_SYNC);
            $criteria->addSelectColumn(SertifikasiPdPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_sert_pd');
            $criteria->addSelectColumn($alias . '.id_jenis_sertifikasi');
            $criteria->addSelectColumn($alias . '.peserta_didik_id');
            $criteria->addSelectColumn($alias . '.bidang_studi_id');
            $criteria->addSelectColumn($alias . '.no_sert_pd');
            $criteria->addSelectColumn($alias . '.tgl_sert_pd');
            $criteria->addSelectColumn($alias . '.tgl_exp_sert_pd');
            $criteria->addSelectColumn($alias . '.no_peserta_sert_pd');
            $criteria->addSelectColumn($alias . '.kode_lemb_sert');
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
        $criteria->setPrimaryTableName(SertifikasiPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SertifikasiPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SertifikasiPd
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = SertifikasiPdPeer::doSelect($critcopy, $con);
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
        return SertifikasiPdPeer::populateObjects(SertifikasiPdPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            SertifikasiPdPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

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
     * @param      SertifikasiPd $obj A SertifikasiPd object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdSertPd();
            } // if key === null
            SertifikasiPdPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A SertifikasiPd object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof SertifikasiPd) {
                $key = (string) $value->getIdSertPd();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or SertifikasiPd object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(SertifikasiPdPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   SertifikasiPd Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(SertifikasiPdPeer::$instances[$key])) {
                return SertifikasiPdPeer::$instances[$key];
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
        foreach (SertifikasiPdPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        SertifikasiPdPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to sertifikasi_pd
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
        $cls = SertifikasiPdPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = SertifikasiPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = SertifikasiPdPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SertifikasiPdPeer::addInstanceToPool($obj, $key);
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
     * @return array (SertifikasiPd object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = SertifikasiPdPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = SertifikasiPdPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + SertifikasiPdPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SertifikasiPdPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            SertifikasiPdPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related BidangStudi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBidangStudi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SertifikasiPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SertifikasiPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SertifikasiPdPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisSertifikasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisSertifikasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SertifikasiPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SertifikasiPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

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
        $criteria->setPrimaryTableName(SertifikasiPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SertifikasiPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SertifikasiPdPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

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
        $criteria->setPrimaryTableName(SertifikasiPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SertifikasiPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SertifikasiPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
     * Selects a collection of SertifikasiPd objects pre-filled with their BidangStudi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SertifikasiPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBidangStudi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);
        }

        SertifikasiPdPeer::addSelectColumns($criteria);
        $startcol = SertifikasiPdPeer::NUM_HYDRATE_COLUMNS;
        BidangStudiPeer::addSelectColumns($criteria);

        $criteria->addJoin(SertifikasiPdPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SertifikasiPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SertifikasiPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SertifikasiPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SertifikasiPdPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SertifikasiPd) to $obj2 (BidangStudi)
                $obj2->addSertifikasiPd($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SertifikasiPd objects pre-filled with their JenisSertifikasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SertifikasiPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisSertifikasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);
        }

        SertifikasiPdPeer::addSelectColumns($criteria);
        $startcol = SertifikasiPdPeer::NUM_HYDRATE_COLUMNS;
        JenisSertifikasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SertifikasiPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SertifikasiPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SertifikasiPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SertifikasiPdPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisSertifikasiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisSertifikasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisSertifikasiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (SertifikasiPd) to $obj2 (JenisSertifikasi)
                $obj2->addSertifikasiPd($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SertifikasiPd objects pre-filled with their LembSertifikasi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SertifikasiPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLembSertifikasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);
        }

        SertifikasiPdPeer::addSelectColumns($criteria);
        $startcol = SertifikasiPdPeer::NUM_HYDRATE_COLUMNS;
        LembSertifikasiPeer::addSelectColumns($criteria);

        $criteria->addJoin(SertifikasiPdPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SertifikasiPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SertifikasiPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SertifikasiPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SertifikasiPdPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (SertifikasiPd) to $obj2 (LembSertifikasi)
                $obj2->addSertifikasiPd($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SertifikasiPd objects pre-filled with their PesertaDidik objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SertifikasiPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPesertaDidik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);
        }

        SertifikasiPdPeer::addSelectColumns($criteria);
        $startcol = SertifikasiPdPeer::NUM_HYDRATE_COLUMNS;
        PesertaDidikPeer::addSelectColumns($criteria);

        $criteria->addJoin(SertifikasiPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SertifikasiPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SertifikasiPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SertifikasiPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SertifikasiPdPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (SertifikasiPd) to $obj2 (PesertaDidik)
                $obj2->addSertifikasiPd($obj1);

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
        $criteria->setPrimaryTableName(SertifikasiPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SertifikasiPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SertifikasiPdPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
     * Selects a collection of SertifikasiPd objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SertifikasiPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);
        }

        SertifikasiPdPeer::addSelectColumns($criteria);
        $startcol2 = SertifikasiPdPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenisSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SertifikasiPdPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SertifikasiPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SertifikasiPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SertifikasiPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SertifikasiPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined BidangStudi rows

            $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj2 (BidangStudi)
                $obj2->addSertifikasiPd($obj1);
            } // if joined row not null

            // Add objects for joined JenisSertifikasi rows

            $key3 = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JenisSertifikasiPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JenisSertifikasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisSertifikasiPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj3 (JenisSertifikasi)
                $obj3->addSertifikasiPd($obj1);
            } // if joined row not null

            // Add objects for joined LembSertifikasi rows

            $key4 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = LembSertifikasiPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = LembSertifikasiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembSertifikasiPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj4 (LembSertifikasi)
                $obj4->addSertifikasiPd($obj1);
            } // if joined row not null

            // Add objects for joined PesertaDidik rows

            $key5 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = PesertaDidikPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = PesertaDidikPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PesertaDidikPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj5 (PesertaDidik)
                $obj5->addSertifikasiPd($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related BidangStudi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBidangStudi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SertifikasiPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SertifikasiPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisSertifikasi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisSertifikasi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SertifikasiPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SertifikasiPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SertifikasiPdPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(SertifikasiPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SertifikasiPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SertifikasiPdPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(SertifikasiPdPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SertifikasiPdPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SertifikasiPdPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

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
     * Selects a collection of SertifikasiPd objects pre-filled with all related objects except BidangStudi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SertifikasiPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBidangStudi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);
        }

        SertifikasiPdPeer::addSelectColumns($criteria);
        $startcol2 = SertifikasiPdPeer::NUM_HYDRATE_COLUMNS;

        JenisSertifikasiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SertifikasiPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SertifikasiPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SertifikasiPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SertifikasiPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisSertifikasi rows

                $key2 = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisSertifikasiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisSertifikasiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisSertifikasiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj2 (JenisSertifikasi)
                $obj2->addSertifikasiPd($obj1);

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

                // Add the $obj1 (SertifikasiPd) to the collection in $obj3 (LembSertifikasi)
                $obj3->addSertifikasiPd($obj1);

            } // if joined row is not null

                // Add objects for joined PesertaDidik rows

                $key4 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PesertaDidikPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = PesertaDidikPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PesertaDidikPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj4 (PesertaDidik)
                $obj4->addSertifikasiPd($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SertifikasiPd objects pre-filled with all related objects except JenisSertifikasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SertifikasiPd objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisSertifikasi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);
        }

        SertifikasiPdPeer::addSelectColumns($criteria);
        $startcol2 = SertifikasiPdPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SertifikasiPdPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SertifikasiPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SertifikasiPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SertifikasiPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SertifikasiPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BidangStudi rows

                $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj2 (BidangStudi)
                $obj2->addSertifikasiPd($obj1);

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

                // Add the $obj1 (SertifikasiPd) to the collection in $obj3 (LembSertifikasi)
                $obj3->addSertifikasiPd($obj1);

            } // if joined row is not null

                // Add objects for joined PesertaDidik rows

                $key4 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PesertaDidikPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = PesertaDidikPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PesertaDidikPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj4 (PesertaDidik)
                $obj4->addSertifikasiPd($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SertifikasiPd objects pre-filled with all related objects except LembSertifikasi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SertifikasiPd objects.
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
            $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);
        }

        SertifikasiPdPeer::addSelectColumns($criteria);
        $startcol2 = SertifikasiPdPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenisSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SertifikasiPdPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SertifikasiPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SertifikasiPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SertifikasiPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SertifikasiPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BidangStudi rows

                $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj2 (BidangStudi)
                $obj2->addSertifikasiPd($obj1);

            } // if joined row is not null

                // Add objects for joined JenisSertifikasi rows

                $key3 = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisSertifikasiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisSertifikasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisSertifikasiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj3 (JenisSertifikasi)
                $obj3->addSertifikasiPd($obj1);

            } // if joined row is not null

                // Add objects for joined PesertaDidik rows

                $key4 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PesertaDidikPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = PesertaDidikPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PesertaDidikPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj4 (PesertaDidik)
                $obj4->addSertifikasiPd($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of SertifikasiPd objects pre-filled with all related objects except PesertaDidik.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of SertifikasiPd objects.
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
            $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);
        }

        SertifikasiPdPeer::addSelectColumns($criteria);
        $startcol2 = SertifikasiPdPeer::NUM_HYDRATE_COLUMNS;

        BidangStudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangStudiPeer::NUM_HYDRATE_COLUMNS;

        JenisSertifikasiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        LembSertifikasiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + LembSertifikasiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SertifikasiPdPeer::BIDANG_STUDI_ID, BidangStudiPeer::BIDANG_STUDI_ID, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $join_behavior);

        $criteria->addJoin(SertifikasiPdPeer::KODE_LEMB_SERT, LembSertifikasiPeer::KODE_LEMB_SERT, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SertifikasiPdPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SertifikasiPdPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SertifikasiPdPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SertifikasiPdPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BidangStudi rows

                $key2 = BidangStudiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BidangStudiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BidangStudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BidangStudiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj2 (BidangStudi)
                $obj2->addSertifikasiPd($obj1);

            } // if joined row is not null

                // Add objects for joined JenisSertifikasi rows

                $key3 = JenisSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisSertifikasiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisSertifikasiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisSertifikasiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj3 (JenisSertifikasi)
                $obj3->addSertifikasiPd($obj1);

            } // if joined row is not null

                // Add objects for joined LembSertifikasi rows

                $key4 = LembSertifikasiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = LembSertifikasiPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = LembSertifikasiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    LembSertifikasiPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (SertifikasiPd) to the collection in $obj4 (LembSertifikasi)
                $obj4->addSertifikasiPd($obj1);

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
        return Propel::getDatabaseMap(SertifikasiPdPeer::DATABASE_NAME)->getTable(SertifikasiPdPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseSertifikasiPdPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseSertifikasiPdPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new SertifikasiPdTableMap());
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
        return SertifikasiPdPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a SertifikasiPd or Criteria object.
     *
     * @param      mixed $values Criteria or SertifikasiPd object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from SertifikasiPd object
        }


        // Set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a SertifikasiPd or Criteria object.
     *
     * @param      mixed $values Criteria or SertifikasiPd object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(SertifikasiPdPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(SertifikasiPdPeer::ID_SERT_PD);
            $value = $criteria->remove(SertifikasiPdPeer::ID_SERT_PD);
            if ($value) {
                $selectCriteria->add(SertifikasiPdPeer::ID_SERT_PD, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SertifikasiPdPeer::TABLE_NAME);
            }

        } else { // $values is SertifikasiPd object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the sertifikasi_pd table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(SertifikasiPdPeer::TABLE_NAME, $con, SertifikasiPdPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SertifikasiPdPeer::clearInstancePool();
            SertifikasiPdPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a SertifikasiPd or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or SertifikasiPd object or primary key or array of primary keys
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
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            SertifikasiPdPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof SertifikasiPd) { // it's a model object
            // invalidate the cache for this single object
            SertifikasiPdPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SertifikasiPdPeer::DATABASE_NAME);
            $criteria->add(SertifikasiPdPeer::ID_SERT_PD, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                SertifikasiPdPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(SertifikasiPdPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            SertifikasiPdPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given SertifikasiPd object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      SertifikasiPd $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(SertifikasiPdPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(SertifikasiPdPeer::TABLE_NAME);

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

        return BasePeer::doValidate(SertifikasiPdPeer::DATABASE_NAME, SertifikasiPdPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return SertifikasiPd
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = SertifikasiPdPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(SertifikasiPdPeer::DATABASE_NAME);
        $criteria->add(SertifikasiPdPeer::ID_SERT_PD, $pk);

        $v = SertifikasiPdPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return SertifikasiPd[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(SertifikasiPdPeer::DATABASE_NAME);
            $criteria->add(SertifikasiPdPeer::ID_SERT_PD, $pks, Criteria::IN);
            $objs = SertifikasiPdPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseSertifikasiPdPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSertifikasiPdPeer::buildTableMap();

