<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\EkstraKurikulerPeer;
use DataDikdas\Model\KelasEkskul;
use DataDikdas\Model\KelasEkskulPeer;
use DataDikdas\Model\RombonganBelajarPeer;
use DataDikdas\Model\map\KelasEkskulTableMap;

/**
 * Base static class for performing query and update operations on the 'kelas_ekskul' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseKelasEkskulPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'kelas_ekskul';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\KelasEkskul';

    /** the related TableMap class for this table */
    const TM_CLASS = 'KelasEkskulTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 12;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 12;

    /** the column name for the id_kelas_ekskul field */
    const ID_KELAS_EKSKUL = 'kelas_ekskul.id_kelas_ekskul';

    /** the column name for the rombongan_belajar_id field */
    const ROMBONGAN_BELAJAR_ID = 'kelas_ekskul.rombongan_belajar_id';

    /** the column name for the id_ekskul field */
    const ID_EKSKUL = 'kelas_ekskul.id_ekskul';

    /** the column name for the nm_ekskul field */
    const NM_EKSKUL = 'kelas_ekskul.nm_ekskul';

    /** the column name for the sk_ekskul field */
    const SK_EKSKUL = 'kelas_ekskul.sk_ekskul';

    /** the column name for the tgl_sk_ekskul field */
    const TGL_SK_EKSKUL = 'kelas_ekskul.tgl_sk_ekskul';

    /** the column name for the jam_kegiatan_per_minggu field */
    const JAM_KEGIATAN_PER_MINGGU = 'kelas_ekskul.jam_kegiatan_per_minggu';

    /** the column name for the create_date field */
    const CREATE_DATE = 'kelas_ekskul.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'kelas_ekskul.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'kelas_ekskul.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'kelas_ekskul.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'kelas_ekskul.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of KelasEkskul objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array KelasEkskul[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. KelasEkskulPeer::$fieldNames[KelasEkskulPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdKelasEkskul', 'RombonganBelajarId', 'IdEkskul', 'NmEkskul', 'SkEkskul', 'TglSkEkskul', 'JamKegiatanPerMinggu', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idKelasEkskul', 'rombonganBelajarId', 'idEkskul', 'nmEkskul', 'skEkskul', 'tglSkEkskul', 'jamKegiatanPerMinggu', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (KelasEkskulPeer::ID_KELAS_EKSKUL, KelasEkskulPeer::ROMBONGAN_BELAJAR_ID, KelasEkskulPeer::ID_EKSKUL, KelasEkskulPeer::NM_EKSKUL, KelasEkskulPeer::SK_EKSKUL, KelasEkskulPeer::TGL_SK_EKSKUL, KelasEkskulPeer::JAM_KEGIATAN_PER_MINGGU, KelasEkskulPeer::CREATE_DATE, KelasEkskulPeer::LAST_UPDATE, KelasEkskulPeer::SOFT_DELETE, KelasEkskulPeer::LAST_SYNC, KelasEkskulPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_KELAS_EKSKUL', 'ROMBONGAN_BELAJAR_ID', 'ID_EKSKUL', 'NM_EKSKUL', 'SK_EKSKUL', 'TGL_SK_EKSKUL', 'JAM_KEGIATAN_PER_MINGGU', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_kelas_ekskul', 'rombongan_belajar_id', 'id_ekskul', 'nm_ekskul', 'sk_ekskul', 'tgl_sk_ekskul', 'jam_kegiatan_per_minggu', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. KelasEkskulPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdKelasEkskul' => 0, 'RombonganBelajarId' => 1, 'IdEkskul' => 2, 'NmEkskul' => 3, 'SkEkskul' => 4, 'TglSkEkskul' => 5, 'JamKegiatanPerMinggu' => 6, 'CreateDate' => 7, 'LastUpdate' => 8, 'SoftDelete' => 9, 'LastSync' => 10, 'UpdaterId' => 11, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idKelasEkskul' => 0, 'rombonganBelajarId' => 1, 'idEkskul' => 2, 'nmEkskul' => 3, 'skEkskul' => 4, 'tglSkEkskul' => 5, 'jamKegiatanPerMinggu' => 6, 'createDate' => 7, 'lastUpdate' => 8, 'softDelete' => 9, 'lastSync' => 10, 'updaterId' => 11, ),
        BasePeer::TYPE_COLNAME => array (KelasEkskulPeer::ID_KELAS_EKSKUL => 0, KelasEkskulPeer::ROMBONGAN_BELAJAR_ID => 1, KelasEkskulPeer::ID_EKSKUL => 2, KelasEkskulPeer::NM_EKSKUL => 3, KelasEkskulPeer::SK_EKSKUL => 4, KelasEkskulPeer::TGL_SK_EKSKUL => 5, KelasEkskulPeer::JAM_KEGIATAN_PER_MINGGU => 6, KelasEkskulPeer::CREATE_DATE => 7, KelasEkskulPeer::LAST_UPDATE => 8, KelasEkskulPeer::SOFT_DELETE => 9, KelasEkskulPeer::LAST_SYNC => 10, KelasEkskulPeer::UPDATER_ID => 11, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_KELAS_EKSKUL' => 0, 'ROMBONGAN_BELAJAR_ID' => 1, 'ID_EKSKUL' => 2, 'NM_EKSKUL' => 3, 'SK_EKSKUL' => 4, 'TGL_SK_EKSKUL' => 5, 'JAM_KEGIATAN_PER_MINGGU' => 6, 'CREATE_DATE' => 7, 'LAST_UPDATE' => 8, 'SOFT_DELETE' => 9, 'LAST_SYNC' => 10, 'UPDATER_ID' => 11, ),
        BasePeer::TYPE_FIELDNAME => array ('id_kelas_ekskul' => 0, 'rombongan_belajar_id' => 1, 'id_ekskul' => 2, 'nm_ekskul' => 3, 'sk_ekskul' => 4, 'tgl_sk_ekskul' => 5, 'jam_kegiatan_per_minggu' => 6, 'create_date' => 7, 'last_update' => 8, 'soft_delete' => 9, 'last_sync' => 10, 'updater_id' => 11, ),
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
        $toNames = KelasEkskulPeer::getFieldNames($toType);
        $key = isset(KelasEkskulPeer::$fieldKeys[$fromType][$name]) ? KelasEkskulPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(KelasEkskulPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, KelasEkskulPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return KelasEkskulPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. KelasEkskulPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(KelasEkskulPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(KelasEkskulPeer::ID_KELAS_EKSKUL);
            $criteria->addSelectColumn(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID);
            $criteria->addSelectColumn(KelasEkskulPeer::ID_EKSKUL);
            $criteria->addSelectColumn(KelasEkskulPeer::NM_EKSKUL);
            $criteria->addSelectColumn(KelasEkskulPeer::SK_EKSKUL);
            $criteria->addSelectColumn(KelasEkskulPeer::TGL_SK_EKSKUL);
            $criteria->addSelectColumn(KelasEkskulPeer::JAM_KEGIATAN_PER_MINGGU);
            $criteria->addSelectColumn(KelasEkskulPeer::CREATE_DATE);
            $criteria->addSelectColumn(KelasEkskulPeer::LAST_UPDATE);
            $criteria->addSelectColumn(KelasEkskulPeer::SOFT_DELETE);
            $criteria->addSelectColumn(KelasEkskulPeer::LAST_SYNC);
            $criteria->addSelectColumn(KelasEkskulPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_kelas_ekskul');
            $criteria->addSelectColumn($alias . '.rombongan_belajar_id');
            $criteria->addSelectColumn($alias . '.id_ekskul');
            $criteria->addSelectColumn($alias . '.nm_ekskul');
            $criteria->addSelectColumn($alias . '.sk_ekskul');
            $criteria->addSelectColumn($alias . '.tgl_sk_ekskul');
            $criteria->addSelectColumn($alias . '.jam_kegiatan_per_minggu');
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
        $criteria->setPrimaryTableName(KelasEkskulPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KelasEkskulPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 KelasEkskul
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = KelasEkskulPeer::doSelect($critcopy, $con);
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
        return KelasEkskulPeer::populateObjects(KelasEkskulPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            KelasEkskulPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);

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
     * @param      KelasEkskul $obj A KelasEkskul object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdKelasEkskul();
            } // if key === null
            KelasEkskulPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A KelasEkskul object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof KelasEkskul) {
                $key = (string) $value->getIdKelasEkskul();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or KelasEkskul object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(KelasEkskulPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   KelasEkskul Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(KelasEkskulPeer::$instances[$key])) {
                return KelasEkskulPeer::$instances[$key];
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
        foreach (KelasEkskulPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        KelasEkskulPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to kelas_ekskul
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
        $cls = KelasEkskulPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = KelasEkskulPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = KelasEkskulPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                KelasEkskulPeer::addInstanceToPool($obj, $key);
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
     * @return array (KelasEkskul object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = KelasEkskulPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = KelasEkskulPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + KelasEkskulPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = KelasEkskulPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            KelasEkskulPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related RombonganBelajar table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRombonganBelajar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(KelasEkskulPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KelasEkskulPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related EkstraKurikuler table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinEkstraKurikuler(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(KelasEkskulPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KelasEkskulPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KelasEkskulPeer::ID_EKSKUL, EkstraKurikulerPeer::ID_EKSKUL, $join_behavior);

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
     * Selects a collection of KelasEkskul objects pre-filled with their RombonganBelajar objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of KelasEkskul objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRombonganBelajar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);
        }

        KelasEkskulPeer::addSelectColumns($criteria);
        $startcol = KelasEkskulPeer::NUM_HYDRATE_COLUMNS;
        RombonganBelajarPeer::addSelectColumns($criteria);

        $criteria->addJoin(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KelasEkskulPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KelasEkskulPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = KelasEkskulPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KelasEkskulPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RombonganBelajarPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RombonganBelajarPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RombonganBelajarPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (KelasEkskul) to $obj2 (RombonganBelajar)
                $obj2->addKelasEkskul($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of KelasEkskul objects pre-filled with their EkstraKurikuler objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of KelasEkskul objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinEkstraKurikuler(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);
        }

        KelasEkskulPeer::addSelectColumns($criteria);
        $startcol = KelasEkskulPeer::NUM_HYDRATE_COLUMNS;
        EkstraKurikulerPeer::addSelectColumns($criteria);

        $criteria->addJoin(KelasEkskulPeer::ID_EKSKUL, EkstraKurikulerPeer::ID_EKSKUL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KelasEkskulPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KelasEkskulPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = KelasEkskulPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KelasEkskulPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = EkstraKurikulerPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = EkstraKurikulerPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = EkstraKurikulerPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    EkstraKurikulerPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (KelasEkskul) to $obj2 (EkstraKurikuler)
                $obj2->addKelasEkskul($obj1);

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
        $criteria->setPrimaryTableName(KelasEkskulPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KelasEkskulPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

        $criteria->addJoin(KelasEkskulPeer::ID_EKSKUL, EkstraKurikulerPeer::ID_EKSKUL, $join_behavior);

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
     * Selects a collection of KelasEkskul objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of KelasEkskul objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);
        }

        KelasEkskulPeer::addSelectColumns($criteria);
        $startcol2 = KelasEkskulPeer::NUM_HYDRATE_COLUMNS;

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        EkstraKurikulerPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + EkstraKurikulerPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

        $criteria->addJoin(KelasEkskulPeer::ID_EKSKUL, EkstraKurikulerPeer::ID_EKSKUL, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KelasEkskulPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KelasEkskulPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KelasEkskulPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KelasEkskulPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined RombonganBelajar rows

            $key2 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = RombonganBelajarPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RombonganBelajarPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RombonganBelajarPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (KelasEkskul) to the collection in $obj2 (RombonganBelajar)
                $obj2->addKelasEkskul($obj1);
            } // if joined row not null

            // Add objects for joined EkstraKurikuler rows

            $key3 = EkstraKurikulerPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = EkstraKurikulerPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = EkstraKurikulerPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    EkstraKurikulerPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (KelasEkskul) to the collection in $obj3 (EkstraKurikuler)
                $obj3->addKelasEkskul($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related RombonganBelajar table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRombonganBelajar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(KelasEkskulPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KelasEkskulPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(KelasEkskulPeer::ID_EKSKUL, EkstraKurikulerPeer::ID_EKSKUL, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related EkstraKurikuler table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptEkstraKurikuler(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(KelasEkskulPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KelasEkskulPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);

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
     * Selects a collection of KelasEkskul objects pre-filled with all related objects except RombonganBelajar.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of KelasEkskul objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRombonganBelajar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);
        }

        KelasEkskulPeer::addSelectColumns($criteria);
        $startcol2 = KelasEkskulPeer::NUM_HYDRATE_COLUMNS;

        EkstraKurikulerPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + EkstraKurikulerPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KelasEkskulPeer::ID_EKSKUL, EkstraKurikulerPeer::ID_EKSKUL, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KelasEkskulPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KelasEkskulPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KelasEkskulPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KelasEkskulPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined EkstraKurikuler rows

                $key2 = EkstraKurikulerPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = EkstraKurikulerPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = EkstraKurikulerPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    EkstraKurikulerPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (KelasEkskul) to the collection in $obj2 (EkstraKurikuler)
                $obj2->addKelasEkskul($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of KelasEkskul objects pre-filled with all related objects except EkstraKurikuler.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of KelasEkskul objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptEkstraKurikuler(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);
        }

        KelasEkskulPeer::addSelectColumns($criteria);
        $startcol2 = KelasEkskulPeer::NUM_HYDRATE_COLUMNS;

        RombonganBelajarPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RombonganBelajarPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID, RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KelasEkskulPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KelasEkskulPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KelasEkskulPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KelasEkskulPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined RombonganBelajar rows

                $key2 = RombonganBelajarPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RombonganBelajarPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = RombonganBelajarPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RombonganBelajarPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (KelasEkskul) to the collection in $obj2 (RombonganBelajar)
                $obj2->addKelasEkskul($obj1);

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
        return Propel::getDatabaseMap(KelasEkskulPeer::DATABASE_NAME)->getTable(KelasEkskulPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseKelasEkskulPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseKelasEkskulPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new KelasEkskulTableMap());
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
        return KelasEkskulPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a KelasEkskul or Criteria object.
     *
     * @param      mixed $values Criteria or KelasEkskul object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from KelasEkskul object
        }


        // Set the correct dbName
        $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a KelasEkskul or Criteria object.
     *
     * @param      mixed $values Criteria or KelasEkskul object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(KelasEkskulPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(KelasEkskulPeer::ID_KELAS_EKSKUL);
            $value = $criteria->remove(KelasEkskulPeer::ID_KELAS_EKSKUL);
            if ($value) {
                $selectCriteria->add(KelasEkskulPeer::ID_KELAS_EKSKUL, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(KelasEkskulPeer::TABLE_NAME);
            }

        } else { // $values is KelasEkskul object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the kelas_ekskul table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(KelasEkskulPeer::TABLE_NAME, $con, KelasEkskulPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KelasEkskulPeer::clearInstancePool();
            KelasEkskulPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a KelasEkskul or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or KelasEkskul object or primary key or array of primary keys
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
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            KelasEkskulPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof KelasEkskul) { // it's a model object
            // invalidate the cache for this single object
            KelasEkskulPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(KelasEkskulPeer::DATABASE_NAME);
            $criteria->add(KelasEkskulPeer::ID_KELAS_EKSKUL, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                KelasEkskulPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(KelasEkskulPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            KelasEkskulPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given KelasEkskul object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      KelasEkskul $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(KelasEkskulPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(KelasEkskulPeer::TABLE_NAME);

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

        return BasePeer::doValidate(KelasEkskulPeer::DATABASE_NAME, KelasEkskulPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return KelasEkskul
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = KelasEkskulPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(KelasEkskulPeer::DATABASE_NAME);
        $criteria->add(KelasEkskulPeer::ID_KELAS_EKSKUL, $pk);

        $v = KelasEkskulPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return KelasEkskul[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(KelasEkskulPeer::DATABASE_NAME);
            $criteria->add(KelasEkskulPeer::ID_KELAS_EKSKUL, $pks, Criteria::IN);
            $objs = KelasEkskulPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseKelasEkskulPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseKelasEkskulPeer::buildTableMap();

