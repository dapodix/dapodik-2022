<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\MataPelajaranPeer;
use DataDikdas\Model\MatevRapor;
use DataDikdas\Model\MatevRaporPeer;
use DataDikdas\Model\map\MatevRaporTableMap;

/**
 * Base static class for performing query and update operations on the 'nilai.matev_rapor' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseMatevRaporPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'nilai.matev_rapor';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\MatevRapor';

    /** the related TableMap class for this table */
    const TM_CLASS = 'MatevRaporTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 14;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 14;

    /** the column name for the id_evaluasi field */
    const ID_EVALUASI = 'nilai.matev_rapor.id_evaluasi';

    /** the column name for the nm_mata_evaluasi field */
    const NM_MATA_EVALUASI = 'nilai.matev_rapor.nm_mata_evaluasi';

    /** the column name for the a_dari_template field */
    const A_DARI_TEMPLATE = 'nilai.matev_rapor.a_dari_template';

    /** the column name for the no_urut field */
    const NO_URUT = 'nilai.matev_rapor.no_urut';

    /** the column name for the kkm_kognitif field */
    const KKM_KOGNITIF = 'nilai.matev_rapor.kkm_kognitif';

    /** the column name for the kkm_psikomotorik field */
    const KKM_PSIKOMOTORIK = 'nilai.matev_rapor.kkm_psikomotorik';

    /** the column name for the rombongan_belajar_id field */
    const ROMBONGAN_BELAJAR_ID = 'nilai.matev_rapor.rombongan_belajar_id';

    /** the column name for the mata_pelajaran_id field */
    const MATA_PELAJARAN_ID = 'nilai.matev_rapor.mata_pelajaran_id';

    /** the column name for the pembelajaran_id field */
    const PEMBELAJARAN_ID = 'nilai.matev_rapor.pembelajaran_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'nilai.matev_rapor.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'nilai.matev_rapor.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'nilai.matev_rapor.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'nilai.matev_rapor.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'nilai.matev_rapor.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of MatevRapor objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array MatevRapor[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. MatevRaporPeer::$fieldNames[MatevRaporPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdEvaluasi', 'NmMataEvaluasi', 'ADariTemplate', 'NoUrut', 'KkmKognitif', 'KkmPsikomotorik', 'RombonganBelajarId', 'MataPelajaranId', 'PembelajaranId', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idEvaluasi', 'nmMataEvaluasi', 'aDariTemplate', 'noUrut', 'kkmKognitif', 'kkmPsikomotorik', 'rombonganBelajarId', 'mataPelajaranId', 'pembelajaranId', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (MatevRaporPeer::ID_EVALUASI, MatevRaporPeer::NM_MATA_EVALUASI, MatevRaporPeer::A_DARI_TEMPLATE, MatevRaporPeer::NO_URUT, MatevRaporPeer::KKM_KOGNITIF, MatevRaporPeer::KKM_PSIKOMOTORIK, MatevRaporPeer::ROMBONGAN_BELAJAR_ID, MatevRaporPeer::MATA_PELAJARAN_ID, MatevRaporPeer::PEMBELAJARAN_ID, MatevRaporPeer::CREATE_DATE, MatevRaporPeer::LAST_UPDATE, MatevRaporPeer::SOFT_DELETE, MatevRaporPeer::LAST_SYNC, MatevRaporPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_EVALUASI', 'NM_MATA_EVALUASI', 'A_DARI_TEMPLATE', 'NO_URUT', 'KKM_KOGNITIF', 'KKM_PSIKOMOTORIK', 'ROMBONGAN_BELAJAR_ID', 'MATA_PELAJARAN_ID', 'PEMBELAJARAN_ID', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_evaluasi', 'nm_mata_evaluasi', 'a_dari_template', 'no_urut', 'kkm_kognitif', 'kkm_psikomotorik', 'rombongan_belajar_id', 'mata_pelajaran_id', 'pembelajaran_id', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. MatevRaporPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdEvaluasi' => 0, 'NmMataEvaluasi' => 1, 'ADariTemplate' => 2, 'NoUrut' => 3, 'KkmKognitif' => 4, 'KkmPsikomotorik' => 5, 'RombonganBelajarId' => 6, 'MataPelajaranId' => 7, 'PembelajaranId' => 8, 'CreateDate' => 9, 'LastUpdate' => 10, 'SoftDelete' => 11, 'LastSync' => 12, 'UpdaterId' => 13, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idEvaluasi' => 0, 'nmMataEvaluasi' => 1, 'aDariTemplate' => 2, 'noUrut' => 3, 'kkmKognitif' => 4, 'kkmPsikomotorik' => 5, 'rombonganBelajarId' => 6, 'mataPelajaranId' => 7, 'pembelajaranId' => 8, 'createDate' => 9, 'lastUpdate' => 10, 'softDelete' => 11, 'lastSync' => 12, 'updaterId' => 13, ),
        BasePeer::TYPE_COLNAME => array (MatevRaporPeer::ID_EVALUASI => 0, MatevRaporPeer::NM_MATA_EVALUASI => 1, MatevRaporPeer::A_DARI_TEMPLATE => 2, MatevRaporPeer::NO_URUT => 3, MatevRaporPeer::KKM_KOGNITIF => 4, MatevRaporPeer::KKM_PSIKOMOTORIK => 5, MatevRaporPeer::ROMBONGAN_BELAJAR_ID => 6, MatevRaporPeer::MATA_PELAJARAN_ID => 7, MatevRaporPeer::PEMBELAJARAN_ID => 8, MatevRaporPeer::CREATE_DATE => 9, MatevRaporPeer::LAST_UPDATE => 10, MatevRaporPeer::SOFT_DELETE => 11, MatevRaporPeer::LAST_SYNC => 12, MatevRaporPeer::UPDATER_ID => 13, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_EVALUASI' => 0, 'NM_MATA_EVALUASI' => 1, 'A_DARI_TEMPLATE' => 2, 'NO_URUT' => 3, 'KKM_KOGNITIF' => 4, 'KKM_PSIKOMOTORIK' => 5, 'ROMBONGAN_BELAJAR_ID' => 6, 'MATA_PELAJARAN_ID' => 7, 'PEMBELAJARAN_ID' => 8, 'CREATE_DATE' => 9, 'LAST_UPDATE' => 10, 'SOFT_DELETE' => 11, 'LAST_SYNC' => 12, 'UPDATER_ID' => 13, ),
        BasePeer::TYPE_FIELDNAME => array ('id_evaluasi' => 0, 'nm_mata_evaluasi' => 1, 'a_dari_template' => 2, 'no_urut' => 3, 'kkm_kognitif' => 4, 'kkm_psikomotorik' => 5, 'rombongan_belajar_id' => 6, 'mata_pelajaran_id' => 7, 'pembelajaran_id' => 8, 'create_date' => 9, 'last_update' => 10, 'soft_delete' => 11, 'last_sync' => 12, 'updater_id' => 13, ),
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
        $toNames = MatevRaporPeer::getFieldNames($toType);
        $key = isset(MatevRaporPeer::$fieldKeys[$fromType][$name]) ? MatevRaporPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(MatevRaporPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, MatevRaporPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return MatevRaporPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. MatevRaporPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(MatevRaporPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(MatevRaporPeer::ID_EVALUASI);
            $criteria->addSelectColumn(MatevRaporPeer::NM_MATA_EVALUASI);
            $criteria->addSelectColumn(MatevRaporPeer::A_DARI_TEMPLATE);
            $criteria->addSelectColumn(MatevRaporPeer::NO_URUT);
            $criteria->addSelectColumn(MatevRaporPeer::KKM_KOGNITIF);
            $criteria->addSelectColumn(MatevRaporPeer::KKM_PSIKOMOTORIK);
            $criteria->addSelectColumn(MatevRaporPeer::ROMBONGAN_BELAJAR_ID);
            $criteria->addSelectColumn(MatevRaporPeer::MATA_PELAJARAN_ID);
            $criteria->addSelectColumn(MatevRaporPeer::PEMBELAJARAN_ID);
            $criteria->addSelectColumn(MatevRaporPeer::CREATE_DATE);
            $criteria->addSelectColumn(MatevRaporPeer::LAST_UPDATE);
            $criteria->addSelectColumn(MatevRaporPeer::SOFT_DELETE);
            $criteria->addSelectColumn(MatevRaporPeer::LAST_SYNC);
            $criteria->addSelectColumn(MatevRaporPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_evaluasi');
            $criteria->addSelectColumn($alias . '.nm_mata_evaluasi');
            $criteria->addSelectColumn($alias . '.a_dari_template');
            $criteria->addSelectColumn($alias . '.no_urut');
            $criteria->addSelectColumn($alias . '.kkm_kognitif');
            $criteria->addSelectColumn($alias . '.kkm_psikomotorik');
            $criteria->addSelectColumn($alias . '.rombongan_belajar_id');
            $criteria->addSelectColumn($alias . '.mata_pelajaran_id');
            $criteria->addSelectColumn($alias . '.pembelajaran_id');
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
        $criteria->setPrimaryTableName(MatevRaporPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MatevRaporPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(MatevRaporPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MatevRapor
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = MatevRaporPeer::doSelect($critcopy, $con);
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
        return MatevRaporPeer::populateObjects(MatevRaporPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            MatevRaporPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(MatevRaporPeer::DATABASE_NAME);

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
     * @param      MatevRapor $obj A MatevRapor object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdEvaluasi();
            } // if key === null
            MatevRaporPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A MatevRapor object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof MatevRapor) {
                $key = (string) $value->getIdEvaluasi();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or MatevRapor object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(MatevRaporPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   MatevRapor Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(MatevRaporPeer::$instances[$key])) {
                return MatevRaporPeer::$instances[$key];
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
        foreach (MatevRaporPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        MatevRaporPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to nilai.matev_rapor
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
        $cls = MatevRaporPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = MatevRaporPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = MatevRaporPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MatevRaporPeer::addInstanceToPool($obj, $key);
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
     * @return array (MatevRapor object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = MatevRaporPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = MatevRaporPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + MatevRaporPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MatevRaporPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            MatevRaporPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related MataPelajaran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMataPelajaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MatevRaporPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MatevRaporPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MatevRaporPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MatevRaporPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Selects a collection of MatevRapor objects pre-filled with their MataPelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MatevRapor objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMataPelajaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MatevRaporPeer::DATABASE_NAME);
        }

        MatevRaporPeer::addSelectColumns($criteria);
        $startcol = MatevRaporPeer::NUM_HYDRATE_COLUMNS;
        MataPelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(MatevRaporPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MatevRaporPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MatevRaporPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MatevRaporPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MatevRaporPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (MatevRapor) to $obj2 (MataPelajaran)
                $obj2->addMatevRapor($obj1);

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
        $criteria->setPrimaryTableName(MatevRaporPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MatevRaporPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MatevRaporPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MatevRaporPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Selects a collection of MatevRapor objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MatevRapor objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MatevRaporPeer::DATABASE_NAME);
        }

        MatevRaporPeer::addSelectColumns($criteria);
        $startcol2 = MatevRaporPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MatevRaporPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MatevRaporPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MatevRaporPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MatevRaporPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MatevRaporPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined MataPelajaran rows

            $key2 = MataPelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = MataPelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MataPelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MataPelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (MatevRapor) to the collection in $obj2 (MataPelajaran)
                $obj2->addMatevRapor($obj1);
            } // if joined row not null

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
        return Propel::getDatabaseMap(MatevRaporPeer::DATABASE_NAME)->getTable(MatevRaporPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseMatevRaporPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseMatevRaporPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new MatevRaporTableMap());
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
        return MatevRaporPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a MatevRapor or Criteria object.
     *
     * @param      mixed $values Criteria or MatevRapor object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from MatevRapor object
        }


        // Set the correct dbName
        $criteria->setDbName(MatevRaporPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a MatevRapor or Criteria object.
     *
     * @param      mixed $values Criteria or MatevRapor object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(MatevRaporPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(MatevRaporPeer::ID_EVALUASI);
            $value = $criteria->remove(MatevRaporPeer::ID_EVALUASI);
            if ($value) {
                $selectCriteria->add(MatevRaporPeer::ID_EVALUASI, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MatevRaporPeer::TABLE_NAME);
            }

        } else { // $values is MatevRapor object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(MatevRaporPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the nilai.matev_rapor table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(MatevRaporPeer::TABLE_NAME, $con, MatevRaporPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MatevRaporPeer::clearInstancePool();
            MatevRaporPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a MatevRapor or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or MatevRapor object or primary key or array of primary keys
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
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            MatevRaporPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof MatevRapor) { // it's a model object
            // invalidate the cache for this single object
            MatevRaporPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MatevRaporPeer::DATABASE_NAME);
            $criteria->add(MatevRaporPeer::ID_EVALUASI, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                MatevRaporPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(MatevRaporPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            MatevRaporPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given MatevRapor object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      MatevRapor $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(MatevRaporPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(MatevRaporPeer::TABLE_NAME);

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

        return BasePeer::doValidate(MatevRaporPeer::DATABASE_NAME, MatevRaporPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return MatevRapor
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = MatevRaporPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(MatevRaporPeer::DATABASE_NAME);
        $criteria->add(MatevRaporPeer::ID_EVALUASI, $pk);

        $v = MatevRaporPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return MatevRapor[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(MatevRaporPeer::DATABASE_NAME);
            $criteria->add(MatevRaporPeer::ID_EVALUASI, $pks, Criteria::IN);
            $objs = MatevRaporPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseMatevRaporPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseMatevRaporPeer::buildTableMap();

