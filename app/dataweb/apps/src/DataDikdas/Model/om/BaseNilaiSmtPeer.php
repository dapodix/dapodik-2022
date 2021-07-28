<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\NilaiSmt;
use DataDikdas\Model\NilaiSmtPeer;
use DataDikdas\Model\map\NilaiSmtTableMap;

/**
 * Base static class for performing query and update operations on the 'nilai.nilai_smt' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseNilaiSmtPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'nilai.nilai_smt';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\NilaiSmt';

    /** the related TableMap class for this table */
    const TM_CLASS = 'NilaiSmtTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 14;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 14;

    /** the column name for the anggota_rombel_id field */
    const ANGGOTA_ROMBEL_ID = 'nilai.nilai_smt.anggota_rombel_id';

    /** the column name for the nilai_afektif_angka field */
    const NILAI_AFEKTIF_ANGKA = 'nilai.nilai_smt.nilai_afektif_angka';

    /** the column name for the nilai_afektif_huruf field */
    const NILAI_AFEKTIF_HURUF = 'nilai.nilai_smt.nilai_afektif_huruf';

    /** the column name for the ket_afektif field */
    const KET_AFEKTIF = 'nilai.nilai_smt.ket_afektif';

    /** the column name for the nilai_afektif2_angka field */
    const NILAI_AFEKTIF2_ANGKA = 'nilai.nilai_smt.nilai_afektif2_angka';

    /** the column name for the nilai_afektif2_huruf field */
    const NILAI_AFEKTIF2_HURUF = 'nilai.nilai_smt.nilai_afektif2_huruf';

    /** the column name for the ket_afektif2 field */
    const KET_AFEKTIF2 = 'nilai.nilai_smt.ket_afektif2';

    /** the column name for the a_beku field */
    const A_BEKU = 'nilai.nilai_smt.a_beku';

    /** the column name for the rapor_ke field */
    const RAPOR_KE = 'nilai.nilai_smt.rapor_ke';

    /** the column name for the create_date field */
    const CREATE_DATE = 'nilai.nilai_smt.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'nilai.nilai_smt.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'nilai.nilai_smt.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'nilai.nilai_smt.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'nilai.nilai_smt.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of NilaiSmt objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array NilaiSmt[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. NilaiSmtPeer::$fieldNames[NilaiSmtPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('AnggotaRombelId', 'NilaiAfektifAngka', 'NilaiAfektifHuruf', 'KetAfektif', 'NilaiAfektif2Angka', 'NilaiAfektif2Huruf', 'KetAfektif2', 'ABeku', 'RaporKe', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('anggotaRombelId', 'nilaiAfektifAngka', 'nilaiAfektifHuruf', 'ketAfektif', 'nilaiAfektif2Angka', 'nilaiAfektif2Huruf', 'ketAfektif2', 'aBeku', 'raporKe', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (NilaiSmtPeer::ANGGOTA_ROMBEL_ID, NilaiSmtPeer::NILAI_AFEKTIF_ANGKA, NilaiSmtPeer::NILAI_AFEKTIF_HURUF, NilaiSmtPeer::KET_AFEKTIF, NilaiSmtPeer::NILAI_AFEKTIF2_ANGKA, NilaiSmtPeer::NILAI_AFEKTIF2_HURUF, NilaiSmtPeer::KET_AFEKTIF2, NilaiSmtPeer::A_BEKU, NilaiSmtPeer::RAPOR_KE, NilaiSmtPeer::CREATE_DATE, NilaiSmtPeer::LAST_UPDATE, NilaiSmtPeer::SOFT_DELETE, NilaiSmtPeer::LAST_SYNC, NilaiSmtPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ANGGOTA_ROMBEL_ID', 'NILAI_AFEKTIF_ANGKA', 'NILAI_AFEKTIF_HURUF', 'KET_AFEKTIF', 'NILAI_AFEKTIF2_ANGKA', 'NILAI_AFEKTIF2_HURUF', 'KET_AFEKTIF2', 'A_BEKU', 'RAPOR_KE', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('anggota_rombel_id', 'nilai_afektif_angka', 'nilai_afektif_huruf', 'ket_afektif', 'nilai_afektif2_angka', 'nilai_afektif2_huruf', 'ket_afektif2', 'a_beku', 'rapor_ke', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. NilaiSmtPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('AnggotaRombelId' => 0, 'NilaiAfektifAngka' => 1, 'NilaiAfektifHuruf' => 2, 'KetAfektif' => 3, 'NilaiAfektif2Angka' => 4, 'NilaiAfektif2Huruf' => 5, 'KetAfektif2' => 6, 'ABeku' => 7, 'RaporKe' => 8, 'CreateDate' => 9, 'LastUpdate' => 10, 'SoftDelete' => 11, 'LastSync' => 12, 'UpdaterId' => 13, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('anggotaRombelId' => 0, 'nilaiAfektifAngka' => 1, 'nilaiAfektifHuruf' => 2, 'ketAfektif' => 3, 'nilaiAfektif2Angka' => 4, 'nilaiAfektif2Huruf' => 5, 'ketAfektif2' => 6, 'aBeku' => 7, 'raporKe' => 8, 'createDate' => 9, 'lastUpdate' => 10, 'softDelete' => 11, 'lastSync' => 12, 'updaterId' => 13, ),
        BasePeer::TYPE_COLNAME => array (NilaiSmtPeer::ANGGOTA_ROMBEL_ID => 0, NilaiSmtPeer::NILAI_AFEKTIF_ANGKA => 1, NilaiSmtPeer::NILAI_AFEKTIF_HURUF => 2, NilaiSmtPeer::KET_AFEKTIF => 3, NilaiSmtPeer::NILAI_AFEKTIF2_ANGKA => 4, NilaiSmtPeer::NILAI_AFEKTIF2_HURUF => 5, NilaiSmtPeer::KET_AFEKTIF2 => 6, NilaiSmtPeer::A_BEKU => 7, NilaiSmtPeer::RAPOR_KE => 8, NilaiSmtPeer::CREATE_DATE => 9, NilaiSmtPeer::LAST_UPDATE => 10, NilaiSmtPeer::SOFT_DELETE => 11, NilaiSmtPeer::LAST_SYNC => 12, NilaiSmtPeer::UPDATER_ID => 13, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ANGGOTA_ROMBEL_ID' => 0, 'NILAI_AFEKTIF_ANGKA' => 1, 'NILAI_AFEKTIF_HURUF' => 2, 'KET_AFEKTIF' => 3, 'NILAI_AFEKTIF2_ANGKA' => 4, 'NILAI_AFEKTIF2_HURUF' => 5, 'KET_AFEKTIF2' => 6, 'A_BEKU' => 7, 'RAPOR_KE' => 8, 'CREATE_DATE' => 9, 'LAST_UPDATE' => 10, 'SOFT_DELETE' => 11, 'LAST_SYNC' => 12, 'UPDATER_ID' => 13, ),
        BasePeer::TYPE_FIELDNAME => array ('anggota_rombel_id' => 0, 'nilai_afektif_angka' => 1, 'nilai_afektif_huruf' => 2, 'ket_afektif' => 3, 'nilai_afektif2_angka' => 4, 'nilai_afektif2_huruf' => 5, 'ket_afektif2' => 6, 'a_beku' => 7, 'rapor_ke' => 8, 'create_date' => 9, 'last_update' => 10, 'soft_delete' => 11, 'last_sync' => 12, 'updater_id' => 13, ),
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
        $toNames = NilaiSmtPeer::getFieldNames($toType);
        $key = isset(NilaiSmtPeer::$fieldKeys[$fromType][$name]) ? NilaiSmtPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(NilaiSmtPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, NilaiSmtPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return NilaiSmtPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. NilaiSmtPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(NilaiSmtPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(NilaiSmtPeer::ANGGOTA_ROMBEL_ID);
            $criteria->addSelectColumn(NilaiSmtPeer::NILAI_AFEKTIF_ANGKA);
            $criteria->addSelectColumn(NilaiSmtPeer::NILAI_AFEKTIF_HURUF);
            $criteria->addSelectColumn(NilaiSmtPeer::KET_AFEKTIF);
            $criteria->addSelectColumn(NilaiSmtPeer::NILAI_AFEKTIF2_ANGKA);
            $criteria->addSelectColumn(NilaiSmtPeer::NILAI_AFEKTIF2_HURUF);
            $criteria->addSelectColumn(NilaiSmtPeer::KET_AFEKTIF2);
            $criteria->addSelectColumn(NilaiSmtPeer::A_BEKU);
            $criteria->addSelectColumn(NilaiSmtPeer::RAPOR_KE);
            $criteria->addSelectColumn(NilaiSmtPeer::CREATE_DATE);
            $criteria->addSelectColumn(NilaiSmtPeer::LAST_UPDATE);
            $criteria->addSelectColumn(NilaiSmtPeer::SOFT_DELETE);
            $criteria->addSelectColumn(NilaiSmtPeer::LAST_SYNC);
            $criteria->addSelectColumn(NilaiSmtPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.anggota_rombel_id');
            $criteria->addSelectColumn($alias . '.nilai_afektif_angka');
            $criteria->addSelectColumn($alias . '.nilai_afektif_huruf');
            $criteria->addSelectColumn($alias . '.ket_afektif');
            $criteria->addSelectColumn($alias . '.nilai_afektif2_angka');
            $criteria->addSelectColumn($alias . '.nilai_afektif2_huruf');
            $criteria->addSelectColumn($alias . '.ket_afektif2');
            $criteria->addSelectColumn($alias . '.a_beku');
            $criteria->addSelectColumn($alias . '.rapor_ke');
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
        $criteria->setPrimaryTableName(NilaiSmtPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NilaiSmtPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(NilaiSmtPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(NilaiSmtPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 NilaiSmt
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = NilaiSmtPeer::doSelect($critcopy, $con);
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
        return NilaiSmtPeer::populateObjects(NilaiSmtPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(NilaiSmtPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            NilaiSmtPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(NilaiSmtPeer::DATABASE_NAME);

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
     * @param      NilaiSmt $obj A NilaiSmt object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getAnggotaRombelId();
            } // if key === null
            NilaiSmtPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A NilaiSmt object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof NilaiSmt) {
                $key = (string) $value->getAnggotaRombelId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or NilaiSmt object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(NilaiSmtPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   NilaiSmt Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(NilaiSmtPeer::$instances[$key])) {
                return NilaiSmtPeer::$instances[$key];
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
        foreach (NilaiSmtPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        NilaiSmtPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to nilai.nilai_smt
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
        $cls = NilaiSmtPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = NilaiSmtPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = NilaiSmtPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                NilaiSmtPeer::addInstanceToPool($obj, $key);
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
     * @return array (NilaiSmt object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = NilaiSmtPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = NilaiSmtPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + NilaiSmtPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = NilaiSmtPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            NilaiSmtPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(NilaiSmtPeer::DATABASE_NAME)->getTable(NilaiSmtPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseNilaiSmtPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseNilaiSmtPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new NilaiSmtTableMap());
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
        return NilaiSmtPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a NilaiSmt or Criteria object.
     *
     * @param      mixed $values Criteria or NilaiSmt object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NilaiSmtPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from NilaiSmt object
        }


        // Set the correct dbName
        $criteria->setDbName(NilaiSmtPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a NilaiSmt or Criteria object.
     *
     * @param      mixed $values Criteria or NilaiSmt object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NilaiSmtPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(NilaiSmtPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(NilaiSmtPeer::ANGGOTA_ROMBEL_ID);
            $value = $criteria->remove(NilaiSmtPeer::ANGGOTA_ROMBEL_ID);
            if ($value) {
                $selectCriteria->add(NilaiSmtPeer::ANGGOTA_ROMBEL_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(NilaiSmtPeer::TABLE_NAME);
            }

        } else { // $values is NilaiSmt object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(NilaiSmtPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the nilai.nilai_smt table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NilaiSmtPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(NilaiSmtPeer::TABLE_NAME, $con, NilaiSmtPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NilaiSmtPeer::clearInstancePool();
            NilaiSmtPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a NilaiSmt or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or NilaiSmt object or primary key or array of primary keys
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
            $con = Propel::getConnection(NilaiSmtPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            NilaiSmtPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof NilaiSmt) { // it's a model object
            // invalidate the cache for this single object
            NilaiSmtPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(NilaiSmtPeer::DATABASE_NAME);
            $criteria->add(NilaiSmtPeer::ANGGOTA_ROMBEL_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                NilaiSmtPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(NilaiSmtPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            NilaiSmtPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given NilaiSmt object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      NilaiSmt $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(NilaiSmtPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(NilaiSmtPeer::TABLE_NAME);

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

        return BasePeer::doValidate(NilaiSmtPeer::DATABASE_NAME, NilaiSmtPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return NilaiSmt
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = NilaiSmtPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(NilaiSmtPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(NilaiSmtPeer::DATABASE_NAME);
        $criteria->add(NilaiSmtPeer::ANGGOTA_ROMBEL_ID, $pk);

        $v = NilaiSmtPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return NilaiSmt[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NilaiSmtPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(NilaiSmtPeer::DATABASE_NAME);
            $criteria->add(NilaiSmtPeer::ANGGOTA_ROMBEL_ID, $pks, Criteria::IN);
            $objs = NilaiSmtPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseNilaiSmtPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseNilaiSmtPeer::buildTableMap();

