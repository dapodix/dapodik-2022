<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\AnggotaPanitia;
use DataDikdas\Model\AnggotaPanitiaPeer;
use DataDikdas\Model\KepanitiaanPeer;
use DataDikdas\Model\PesertaDidikPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\map\AnggotaPanitiaTableMap;

/**
 * Base static class for performing query and update operations on the 'anggota_panitia' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseAnggotaPanitiaPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'anggota_panitia';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\AnggotaPanitia';

    /** the related TableMap class for this table */
    const TM_CLASS = 'AnggotaPanitiaTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 13;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 13;

    /** the column name for the id_ang_panitia field */
    const ID_ANG_PANITIA = 'anggota_panitia.id_ang_panitia';

    /** the column name for the id_panitia field */
    const ID_PANITIA = 'anggota_panitia.id_panitia';

    /** the column name for the nm_ang field */
    const NM_ANG = 'anggota_panitia.nm_ang';

    /** the column name for the no_kontak field */
    const NO_KONTAK = 'anggota_panitia.no_kontak';

    /** the column name for the peran_ang field */
    const PERAN_ANG = 'anggota_panitia.peran_ang';

    /** the column name for the unsur_ang field */
    const UNSUR_ANG = 'anggota_panitia.unsur_ang';

    /** the column name for the peserta_didik_id field */
    const PESERTA_DIDIK_ID = 'anggota_panitia.peserta_didik_id';

    /** the column name for the ptk_id field */
    const PTK_ID = 'anggota_panitia.ptk_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'anggota_panitia.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'anggota_panitia.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'anggota_panitia.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'anggota_panitia.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'anggota_panitia.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of AnggotaPanitia objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array AnggotaPanitia[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. AnggotaPanitiaPeer::$fieldNames[AnggotaPanitiaPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdAngPanitia', 'IdPanitia', 'NmAng', 'NoKontak', 'PeranAng', 'UnsurAng', 'PesertaDidikId', 'PtkId', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idAngPanitia', 'idPanitia', 'nmAng', 'noKontak', 'peranAng', 'unsurAng', 'pesertaDidikId', 'ptkId', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (AnggotaPanitiaPeer::ID_ANG_PANITIA, AnggotaPanitiaPeer::ID_PANITIA, AnggotaPanitiaPeer::NM_ANG, AnggotaPanitiaPeer::NO_KONTAK, AnggotaPanitiaPeer::PERAN_ANG, AnggotaPanitiaPeer::UNSUR_ANG, AnggotaPanitiaPeer::PESERTA_DIDIK_ID, AnggotaPanitiaPeer::PTK_ID, AnggotaPanitiaPeer::CREATE_DATE, AnggotaPanitiaPeer::LAST_UPDATE, AnggotaPanitiaPeer::SOFT_DELETE, AnggotaPanitiaPeer::LAST_SYNC, AnggotaPanitiaPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ANG_PANITIA', 'ID_PANITIA', 'NM_ANG', 'NO_KONTAK', 'PERAN_ANG', 'UNSUR_ANG', 'PESERTA_DIDIK_ID', 'PTK_ID', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_ang_panitia', 'id_panitia', 'nm_ang', 'no_kontak', 'peran_ang', 'unsur_ang', 'peserta_didik_id', 'ptk_id', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. AnggotaPanitiaPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdAngPanitia' => 0, 'IdPanitia' => 1, 'NmAng' => 2, 'NoKontak' => 3, 'PeranAng' => 4, 'UnsurAng' => 5, 'PesertaDidikId' => 6, 'PtkId' => 7, 'CreateDate' => 8, 'LastUpdate' => 9, 'SoftDelete' => 10, 'LastSync' => 11, 'UpdaterId' => 12, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idAngPanitia' => 0, 'idPanitia' => 1, 'nmAng' => 2, 'noKontak' => 3, 'peranAng' => 4, 'unsurAng' => 5, 'pesertaDidikId' => 6, 'ptkId' => 7, 'createDate' => 8, 'lastUpdate' => 9, 'softDelete' => 10, 'lastSync' => 11, 'updaterId' => 12, ),
        BasePeer::TYPE_COLNAME => array (AnggotaPanitiaPeer::ID_ANG_PANITIA => 0, AnggotaPanitiaPeer::ID_PANITIA => 1, AnggotaPanitiaPeer::NM_ANG => 2, AnggotaPanitiaPeer::NO_KONTAK => 3, AnggotaPanitiaPeer::PERAN_ANG => 4, AnggotaPanitiaPeer::UNSUR_ANG => 5, AnggotaPanitiaPeer::PESERTA_DIDIK_ID => 6, AnggotaPanitiaPeer::PTK_ID => 7, AnggotaPanitiaPeer::CREATE_DATE => 8, AnggotaPanitiaPeer::LAST_UPDATE => 9, AnggotaPanitiaPeer::SOFT_DELETE => 10, AnggotaPanitiaPeer::LAST_SYNC => 11, AnggotaPanitiaPeer::UPDATER_ID => 12, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ANG_PANITIA' => 0, 'ID_PANITIA' => 1, 'NM_ANG' => 2, 'NO_KONTAK' => 3, 'PERAN_ANG' => 4, 'UNSUR_ANG' => 5, 'PESERTA_DIDIK_ID' => 6, 'PTK_ID' => 7, 'CREATE_DATE' => 8, 'LAST_UPDATE' => 9, 'SOFT_DELETE' => 10, 'LAST_SYNC' => 11, 'UPDATER_ID' => 12, ),
        BasePeer::TYPE_FIELDNAME => array ('id_ang_panitia' => 0, 'id_panitia' => 1, 'nm_ang' => 2, 'no_kontak' => 3, 'peran_ang' => 4, 'unsur_ang' => 5, 'peserta_didik_id' => 6, 'ptk_id' => 7, 'create_date' => 8, 'last_update' => 9, 'soft_delete' => 10, 'last_sync' => 11, 'updater_id' => 12, ),
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
        $toNames = AnggotaPanitiaPeer::getFieldNames($toType);
        $key = isset(AnggotaPanitiaPeer::$fieldKeys[$fromType][$name]) ? AnggotaPanitiaPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(AnggotaPanitiaPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, AnggotaPanitiaPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return AnggotaPanitiaPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. AnggotaPanitiaPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(AnggotaPanitiaPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(AnggotaPanitiaPeer::ID_ANG_PANITIA);
            $criteria->addSelectColumn(AnggotaPanitiaPeer::ID_PANITIA);
            $criteria->addSelectColumn(AnggotaPanitiaPeer::NM_ANG);
            $criteria->addSelectColumn(AnggotaPanitiaPeer::NO_KONTAK);
            $criteria->addSelectColumn(AnggotaPanitiaPeer::PERAN_ANG);
            $criteria->addSelectColumn(AnggotaPanitiaPeer::UNSUR_ANG);
            $criteria->addSelectColumn(AnggotaPanitiaPeer::PESERTA_DIDIK_ID);
            $criteria->addSelectColumn(AnggotaPanitiaPeer::PTK_ID);
            $criteria->addSelectColumn(AnggotaPanitiaPeer::CREATE_DATE);
            $criteria->addSelectColumn(AnggotaPanitiaPeer::LAST_UPDATE);
            $criteria->addSelectColumn(AnggotaPanitiaPeer::SOFT_DELETE);
            $criteria->addSelectColumn(AnggotaPanitiaPeer::LAST_SYNC);
            $criteria->addSelectColumn(AnggotaPanitiaPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_ang_panitia');
            $criteria->addSelectColumn($alias . '.id_panitia');
            $criteria->addSelectColumn($alias . '.nm_ang');
            $criteria->addSelectColumn($alias . '.no_kontak');
            $criteria->addSelectColumn($alias . '.peran_ang');
            $criteria->addSelectColumn($alias . '.unsur_ang');
            $criteria->addSelectColumn($alias . '.peserta_didik_id');
            $criteria->addSelectColumn($alias . '.ptk_id');
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
        $criteria->setPrimaryTableName(AnggotaPanitiaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaPanitiaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AnggotaPanitia
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = AnggotaPanitiaPeer::doSelect($critcopy, $con);
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
        return AnggotaPanitiaPeer::populateObjects(AnggotaPanitiaPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            AnggotaPanitiaPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);

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
     * @param      AnggotaPanitia $obj A AnggotaPanitia object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdAngPanitia();
            } // if key === null
            AnggotaPanitiaPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A AnggotaPanitia object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof AnggotaPanitia) {
                $key = (string) $value->getIdAngPanitia();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or AnggotaPanitia object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(AnggotaPanitiaPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   AnggotaPanitia Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(AnggotaPanitiaPeer::$instances[$key])) {
                return AnggotaPanitiaPeer::$instances[$key];
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
        foreach (AnggotaPanitiaPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        AnggotaPanitiaPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to anggota_panitia
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
        $cls = AnggotaPanitiaPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = AnggotaPanitiaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = AnggotaPanitiaPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AnggotaPanitiaPeer::addInstanceToPool($obj, $key);
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
     * @return array (AnggotaPanitia object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = AnggotaPanitiaPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = AnggotaPanitiaPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + AnggotaPanitiaPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AnggotaPanitiaPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            AnggotaPanitiaPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(AnggotaPanitiaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaPanitiaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AnggotaPanitiaPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AnggotaPanitiaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaPanitiaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AnggotaPanitiaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Kepanitiaan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinKepanitiaan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AnggotaPanitiaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaPanitiaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AnggotaPanitiaPeer::ID_PANITIA, KepanitiaanPeer::ID_PANITIA, $join_behavior);

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
     * Selects a collection of AnggotaPanitia objects pre-filled with their PesertaDidik objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AnggotaPanitia objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPesertaDidik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);
        }

        AnggotaPanitiaPeer::addSelectColumns($criteria);
        $startcol = AnggotaPanitiaPeer::NUM_HYDRATE_COLUMNS;
        PesertaDidikPeer::addSelectColumns($criteria);

        $criteria->addJoin(AnggotaPanitiaPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AnggotaPanitiaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AnggotaPanitiaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AnggotaPanitiaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AnggotaPanitiaPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (AnggotaPanitia) to $obj2 (PesertaDidik)
                $obj2->addAnggotaPanitia($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of AnggotaPanitia objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AnggotaPanitia objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);
        }

        AnggotaPanitiaPeer::addSelectColumns($criteria);
        $startcol = AnggotaPanitiaPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(AnggotaPanitiaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AnggotaPanitiaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AnggotaPanitiaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AnggotaPanitiaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AnggotaPanitiaPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (AnggotaPanitia) to $obj2 (Ptk)
                $obj2->addAnggotaPanitia($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of AnggotaPanitia objects pre-filled with their Kepanitiaan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AnggotaPanitia objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinKepanitiaan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);
        }

        AnggotaPanitiaPeer::addSelectColumns($criteria);
        $startcol = AnggotaPanitiaPeer::NUM_HYDRATE_COLUMNS;
        KepanitiaanPeer::addSelectColumns($criteria);

        $criteria->addJoin(AnggotaPanitiaPeer::ID_PANITIA, KepanitiaanPeer::ID_PANITIA, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AnggotaPanitiaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AnggotaPanitiaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AnggotaPanitiaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AnggotaPanitiaPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = KepanitiaanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = KepanitiaanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = KepanitiaanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    KepanitiaanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (AnggotaPanitia) to $obj2 (Kepanitiaan)
                $obj2->addAnggotaPanitia($obj1);

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
        $criteria->setPrimaryTableName(AnggotaPanitiaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaPanitiaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AnggotaPanitiaPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(AnggotaPanitiaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AnggotaPanitiaPeer::ID_PANITIA, KepanitiaanPeer::ID_PANITIA, $join_behavior);

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
     * Selects a collection of AnggotaPanitia objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AnggotaPanitia objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);
        }

        AnggotaPanitiaPeer::addSelectColumns($criteria);
        $startcol2 = AnggotaPanitiaPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        KepanitiaanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + KepanitiaanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AnggotaPanitiaPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(AnggotaPanitiaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AnggotaPanitiaPeer::ID_PANITIA, KepanitiaanPeer::ID_PANITIA, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AnggotaPanitiaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AnggotaPanitiaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AnggotaPanitiaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AnggotaPanitiaPeer::addInstanceToPool($obj1, $key1);
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
                } // if obj2 loaded

                // Add the $obj1 (AnggotaPanitia) to the collection in $obj2 (PesertaDidik)
                $obj2->addAnggotaPanitia($obj1);
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

                // Add the $obj1 (AnggotaPanitia) to the collection in $obj3 (Ptk)
                $obj3->addAnggotaPanitia($obj1);
            } // if joined row not null

            // Add objects for joined Kepanitiaan rows

            $key4 = KepanitiaanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = KepanitiaanPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = KepanitiaanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    KepanitiaanPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (AnggotaPanitia) to the collection in $obj4 (Kepanitiaan)
                $obj4->addAnggotaPanitia($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
        $criteria->setPrimaryTableName(AnggotaPanitiaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaPanitiaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AnggotaPanitiaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AnggotaPanitiaPeer::ID_PANITIA, KepanitiaanPeer::ID_PANITIA, $join_behavior);

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
        $criteria->setPrimaryTableName(AnggotaPanitiaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaPanitiaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AnggotaPanitiaPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(AnggotaPanitiaPeer::ID_PANITIA, KepanitiaanPeer::ID_PANITIA, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Kepanitiaan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptKepanitiaan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AnggotaPanitiaPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AnggotaPanitiaPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AnggotaPanitiaPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(AnggotaPanitiaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
     * Selects a collection of AnggotaPanitia objects pre-filled with all related objects except PesertaDidik.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AnggotaPanitia objects.
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
            $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);
        }

        AnggotaPanitiaPeer::addSelectColumns($criteria);
        $startcol2 = AnggotaPanitiaPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        KepanitiaanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KepanitiaanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AnggotaPanitiaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AnggotaPanitiaPeer::ID_PANITIA, KepanitiaanPeer::ID_PANITIA, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AnggotaPanitiaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AnggotaPanitiaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AnggotaPanitiaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AnggotaPanitiaPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (AnggotaPanitia) to the collection in $obj2 (Ptk)
                $obj2->addAnggotaPanitia($obj1);

            } // if joined row is not null

                // Add objects for joined Kepanitiaan rows

                $key3 = KepanitiaanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KepanitiaanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KepanitiaanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KepanitiaanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (AnggotaPanitia) to the collection in $obj3 (Kepanitiaan)
                $obj3->addAnggotaPanitia($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of AnggotaPanitia objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AnggotaPanitia objects.
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
            $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);
        }

        AnggotaPanitiaPeer::addSelectColumns($criteria);
        $startcol2 = AnggotaPanitiaPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        KepanitiaanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + KepanitiaanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AnggotaPanitiaPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(AnggotaPanitiaPeer::ID_PANITIA, KepanitiaanPeer::ID_PANITIA, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AnggotaPanitiaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AnggotaPanitiaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AnggotaPanitiaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AnggotaPanitiaPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (AnggotaPanitia) to the collection in $obj2 (PesertaDidik)
                $obj2->addAnggotaPanitia($obj1);

            } // if joined row is not null

                // Add objects for joined Kepanitiaan rows

                $key3 = KepanitiaanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = KepanitiaanPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = KepanitiaanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    KepanitiaanPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (AnggotaPanitia) to the collection in $obj3 (Kepanitiaan)
                $obj3->addAnggotaPanitia($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of AnggotaPanitia objects pre-filled with all related objects except Kepanitiaan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of AnggotaPanitia objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptKepanitiaan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);
        }

        AnggotaPanitiaPeer::addSelectColumns($criteria);
        $startcol2 = AnggotaPanitiaPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PtkPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AnggotaPanitiaPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(AnggotaPanitiaPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AnggotaPanitiaPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AnggotaPanitiaPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AnggotaPanitiaPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AnggotaPanitiaPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (AnggotaPanitia) to the collection in $obj2 (PesertaDidik)
                $obj2->addAnggotaPanitia($obj1);

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

                // Add the $obj1 (AnggotaPanitia) to the collection in $obj3 (Ptk)
                $obj3->addAnggotaPanitia($obj1);

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
        return Propel::getDatabaseMap(AnggotaPanitiaPeer::DATABASE_NAME)->getTable(AnggotaPanitiaPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseAnggotaPanitiaPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseAnggotaPanitiaPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new AnggotaPanitiaTableMap());
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
        return AnggotaPanitiaPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a AnggotaPanitia or Criteria object.
     *
     * @param      mixed $values Criteria or AnggotaPanitia object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from AnggotaPanitia object
        }


        // Set the correct dbName
        $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a AnggotaPanitia or Criteria object.
     *
     * @param      mixed $values Criteria or AnggotaPanitia object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(AnggotaPanitiaPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(AnggotaPanitiaPeer::ID_ANG_PANITIA);
            $value = $criteria->remove(AnggotaPanitiaPeer::ID_ANG_PANITIA);
            if ($value) {
                $selectCriteria->add(AnggotaPanitiaPeer::ID_ANG_PANITIA, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(AnggotaPanitiaPeer::TABLE_NAME);
            }

        } else { // $values is AnggotaPanitia object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the anggota_panitia table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(AnggotaPanitiaPeer::TABLE_NAME, $con, AnggotaPanitiaPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AnggotaPanitiaPeer::clearInstancePool();
            AnggotaPanitiaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a AnggotaPanitia or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or AnggotaPanitia object or primary key or array of primary keys
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
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            AnggotaPanitiaPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof AnggotaPanitia) { // it's a model object
            // invalidate the cache for this single object
            AnggotaPanitiaPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AnggotaPanitiaPeer::DATABASE_NAME);
            $criteria->add(AnggotaPanitiaPeer::ID_ANG_PANITIA, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                AnggotaPanitiaPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(AnggotaPanitiaPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            AnggotaPanitiaPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given AnggotaPanitia object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      AnggotaPanitia $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(AnggotaPanitiaPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(AnggotaPanitiaPeer::TABLE_NAME);

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

        return BasePeer::doValidate(AnggotaPanitiaPeer::DATABASE_NAME, AnggotaPanitiaPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return AnggotaPanitia
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = AnggotaPanitiaPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(AnggotaPanitiaPeer::DATABASE_NAME);
        $criteria->add(AnggotaPanitiaPeer::ID_ANG_PANITIA, $pk);

        $v = AnggotaPanitiaPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return AnggotaPanitia[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AnggotaPanitiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(AnggotaPanitiaPeer::DATABASE_NAME);
            $criteria->add(AnggotaPanitiaPeer::ID_ANG_PANITIA, $pks, Criteria::IN);
            $objs = AnggotaPanitiaPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseAnggotaPanitiaPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseAnggotaPanitiaPeer::buildTableMap();

