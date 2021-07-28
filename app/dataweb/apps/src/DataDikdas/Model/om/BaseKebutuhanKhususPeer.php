<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\KebutuhanKhususPeer;
use DataDikdas\Model\map\KebutuhanKhususTableMap;

/**
 * Base static class for performing query and update operations on the 'ref.kebutuhan_khusus' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseKebutuhanKhususPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ref.kebutuhan_khusus';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\KebutuhanKhusus';

    /** the related TableMap class for this table */
    const TM_CLASS = 'KebutuhanKhususTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 25;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 25;

    /** the column name for the kebutuhan_khusus_id field */
    const KEBUTUHAN_KHUSUS_ID = 'ref.kebutuhan_khusus.kebutuhan_khusus_id';

    /** the column name for the kebutuhan_khusus field */
    const KEBUTUHAN_KHUSUS = 'ref.kebutuhan_khusus.kebutuhan_khusus';

    /** the column name for the kk_a field */
    const KK_A = 'ref.kebutuhan_khusus.kk_a';

    /** the column name for the kk_b field */
    const KK_B = 'ref.kebutuhan_khusus.kk_b';

    /** the column name for the kk_c field */
    const KK_C = 'ref.kebutuhan_khusus.kk_c';

    /** the column name for the kk_c1 field */
    const KK_C1 = 'ref.kebutuhan_khusus.kk_c1';

    /** the column name for the kk_d field */
    const KK_D = 'ref.kebutuhan_khusus.kk_d';

    /** the column name for the kk_d1 field */
    const KK_D1 = 'ref.kebutuhan_khusus.kk_d1';

    /** the column name for the kk_e field */
    const KK_E = 'ref.kebutuhan_khusus.kk_e';

    /** the column name for the kk_f field */
    const KK_F = 'ref.kebutuhan_khusus.kk_f';

    /** the column name for the kk_h field */
    const KK_H = 'ref.kebutuhan_khusus.kk_h';

    /** the column name for the kk_i field */
    const KK_I = 'ref.kebutuhan_khusus.kk_i';

    /** the column name for the kk_j field */
    const KK_J = 'ref.kebutuhan_khusus.kk_j';

    /** the column name for the kk_k field */
    const KK_K = 'ref.kebutuhan_khusus.kk_k';

    /** the column name for the kk_n field */
    const KK_N = 'ref.kebutuhan_khusus.kk_n';

    /** the column name for the kk_o field */
    const KK_O = 'ref.kebutuhan_khusus.kk_o';

    /** the column name for the kk_p field */
    const KK_P = 'ref.kebutuhan_khusus.kk_p';

    /** the column name for the kk_q field */
    const KK_Q = 'ref.kebutuhan_khusus.kk_q';

    /** the column name for the untuk_lembaga field */
    const UNTUK_LEMBAGA = 'ref.kebutuhan_khusus.untuk_lembaga';

    /** the column name for the untuk_ptk field */
    const UNTUK_PTK = 'ref.kebutuhan_khusus.untuk_ptk';

    /** the column name for the untuk_pd field */
    const UNTUK_PD = 'ref.kebutuhan_khusus.untuk_pd';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ref.kebutuhan_khusus.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ref.kebutuhan_khusus.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'ref.kebutuhan_khusus.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ref.kebutuhan_khusus.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of KebutuhanKhusus objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array KebutuhanKhusus[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. KebutuhanKhususPeer::$fieldNames[KebutuhanKhususPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('KebutuhanKhususId', 'KebutuhanKhusus', 'KkA', 'KkB', 'KkC', 'KkC1', 'KkD', 'KkD1', 'KkE', 'KkF', 'KkH', 'KkI', 'KkJ', 'KkK', 'KkN', 'KkO', 'KkP', 'KkQ', 'UntukLembaga', 'UntukPtk', 'UntukPd', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('kebutuhanKhususId', 'kebutuhanKhusus', 'kkA', 'kkB', 'kkC', 'kkC1', 'kkD', 'kkD1', 'kkE', 'kkF', 'kkH', 'kkI', 'kkJ', 'kkK', 'kkN', 'kkO', 'kkP', 'kkQ', 'untukLembaga', 'untukPtk', 'untukPd', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS, KebutuhanKhususPeer::KK_A, KebutuhanKhususPeer::KK_B, KebutuhanKhususPeer::KK_C, KebutuhanKhususPeer::KK_C1, KebutuhanKhususPeer::KK_D, KebutuhanKhususPeer::KK_D1, KebutuhanKhususPeer::KK_E, KebutuhanKhususPeer::KK_F, KebutuhanKhususPeer::KK_H, KebutuhanKhususPeer::KK_I, KebutuhanKhususPeer::KK_J, KebutuhanKhususPeer::KK_K, KebutuhanKhususPeer::KK_N, KebutuhanKhususPeer::KK_O, KebutuhanKhususPeer::KK_P, KebutuhanKhususPeer::KK_Q, KebutuhanKhususPeer::UNTUK_LEMBAGA, KebutuhanKhususPeer::UNTUK_PTK, KebutuhanKhususPeer::UNTUK_PD, KebutuhanKhususPeer::CREATE_DATE, KebutuhanKhususPeer::LAST_UPDATE, KebutuhanKhususPeer::EXPIRED_DATE, KebutuhanKhususPeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('KEBUTUHAN_KHUSUS_ID', 'KEBUTUHAN_KHUSUS', 'KK_A', 'KK_B', 'KK_C', 'KK_C1', 'KK_D', 'KK_D1', 'KK_E', 'KK_F', 'KK_H', 'KK_I', 'KK_J', 'KK_K', 'KK_N', 'KK_O', 'KK_P', 'KK_Q', 'UNTUK_LEMBAGA', 'UNTUK_PTK', 'UNTUK_PD', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('kebutuhan_khusus_id', 'kebutuhan_khusus', 'kk_a', 'kk_b', 'kk_c', 'kk_c1', 'kk_d', 'kk_d1', 'kk_e', 'kk_f', 'kk_h', 'kk_i', 'kk_j', 'kk_k', 'kk_n', 'kk_o', 'kk_p', 'kk_q', 'untuk_lembaga', 'untuk_ptk', 'untuk_pd', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. KebutuhanKhususPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('KebutuhanKhususId' => 0, 'KebutuhanKhusus' => 1, 'KkA' => 2, 'KkB' => 3, 'KkC' => 4, 'KkC1' => 5, 'KkD' => 6, 'KkD1' => 7, 'KkE' => 8, 'KkF' => 9, 'KkH' => 10, 'KkI' => 11, 'KkJ' => 12, 'KkK' => 13, 'KkN' => 14, 'KkO' => 15, 'KkP' => 16, 'KkQ' => 17, 'UntukLembaga' => 18, 'UntukPtk' => 19, 'UntukPd' => 20, 'CreateDate' => 21, 'LastUpdate' => 22, 'ExpiredDate' => 23, 'LastSync' => 24, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('kebutuhanKhususId' => 0, 'kebutuhanKhusus' => 1, 'kkA' => 2, 'kkB' => 3, 'kkC' => 4, 'kkC1' => 5, 'kkD' => 6, 'kkD1' => 7, 'kkE' => 8, 'kkF' => 9, 'kkH' => 10, 'kkI' => 11, 'kkJ' => 12, 'kkK' => 13, 'kkN' => 14, 'kkO' => 15, 'kkP' => 16, 'kkQ' => 17, 'untukLembaga' => 18, 'untukPtk' => 19, 'untukPd' => 20, 'createDate' => 21, 'lastUpdate' => 22, 'expiredDate' => 23, 'lastSync' => 24, ),
        BasePeer::TYPE_COLNAME => array (KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID => 0, KebutuhanKhususPeer::KEBUTUHAN_KHUSUS => 1, KebutuhanKhususPeer::KK_A => 2, KebutuhanKhususPeer::KK_B => 3, KebutuhanKhususPeer::KK_C => 4, KebutuhanKhususPeer::KK_C1 => 5, KebutuhanKhususPeer::KK_D => 6, KebutuhanKhususPeer::KK_D1 => 7, KebutuhanKhususPeer::KK_E => 8, KebutuhanKhususPeer::KK_F => 9, KebutuhanKhususPeer::KK_H => 10, KebutuhanKhususPeer::KK_I => 11, KebutuhanKhususPeer::KK_J => 12, KebutuhanKhususPeer::KK_K => 13, KebutuhanKhususPeer::KK_N => 14, KebutuhanKhususPeer::KK_O => 15, KebutuhanKhususPeer::KK_P => 16, KebutuhanKhususPeer::KK_Q => 17, KebutuhanKhususPeer::UNTUK_LEMBAGA => 18, KebutuhanKhususPeer::UNTUK_PTK => 19, KebutuhanKhususPeer::UNTUK_PD => 20, KebutuhanKhususPeer::CREATE_DATE => 21, KebutuhanKhususPeer::LAST_UPDATE => 22, KebutuhanKhususPeer::EXPIRED_DATE => 23, KebutuhanKhususPeer::LAST_SYNC => 24, ),
        BasePeer::TYPE_RAW_COLNAME => array ('KEBUTUHAN_KHUSUS_ID' => 0, 'KEBUTUHAN_KHUSUS' => 1, 'KK_A' => 2, 'KK_B' => 3, 'KK_C' => 4, 'KK_C1' => 5, 'KK_D' => 6, 'KK_D1' => 7, 'KK_E' => 8, 'KK_F' => 9, 'KK_H' => 10, 'KK_I' => 11, 'KK_J' => 12, 'KK_K' => 13, 'KK_N' => 14, 'KK_O' => 15, 'KK_P' => 16, 'KK_Q' => 17, 'UNTUK_LEMBAGA' => 18, 'UNTUK_PTK' => 19, 'UNTUK_PD' => 20, 'CREATE_DATE' => 21, 'LAST_UPDATE' => 22, 'EXPIRED_DATE' => 23, 'LAST_SYNC' => 24, ),
        BasePeer::TYPE_FIELDNAME => array ('kebutuhan_khusus_id' => 0, 'kebutuhan_khusus' => 1, 'kk_a' => 2, 'kk_b' => 3, 'kk_c' => 4, 'kk_c1' => 5, 'kk_d' => 6, 'kk_d1' => 7, 'kk_e' => 8, 'kk_f' => 9, 'kk_h' => 10, 'kk_i' => 11, 'kk_j' => 12, 'kk_k' => 13, 'kk_n' => 14, 'kk_o' => 15, 'kk_p' => 16, 'kk_q' => 17, 'untuk_lembaga' => 18, 'untuk_ptk' => 19, 'untuk_pd' => 20, 'create_date' => 21, 'last_update' => 22, 'expired_date' => 23, 'last_sync' => 24, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
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
        $toNames = KebutuhanKhususPeer::getFieldNames($toType);
        $key = isset(KebutuhanKhususPeer::$fieldKeys[$fromType][$name]) ? KebutuhanKhususPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(KebutuhanKhususPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, KebutuhanKhususPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return KebutuhanKhususPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. KebutuhanKhususPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(KebutuhanKhususPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_A);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_B);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_C);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_C1);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_D);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_D1);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_E);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_F);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_H);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_I);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_J);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_K);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_N);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_O);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_P);
            $criteria->addSelectColumn(KebutuhanKhususPeer::KK_Q);
            $criteria->addSelectColumn(KebutuhanKhususPeer::UNTUK_LEMBAGA);
            $criteria->addSelectColumn(KebutuhanKhususPeer::UNTUK_PTK);
            $criteria->addSelectColumn(KebutuhanKhususPeer::UNTUK_PD);
            $criteria->addSelectColumn(KebutuhanKhususPeer::CREATE_DATE);
            $criteria->addSelectColumn(KebutuhanKhususPeer::LAST_UPDATE);
            $criteria->addSelectColumn(KebutuhanKhususPeer::EXPIRED_DATE);
            $criteria->addSelectColumn(KebutuhanKhususPeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.kebutuhan_khusus_id');
            $criteria->addSelectColumn($alias . '.kebutuhan_khusus');
            $criteria->addSelectColumn($alias . '.kk_a');
            $criteria->addSelectColumn($alias . '.kk_b');
            $criteria->addSelectColumn($alias . '.kk_c');
            $criteria->addSelectColumn($alias . '.kk_c1');
            $criteria->addSelectColumn($alias . '.kk_d');
            $criteria->addSelectColumn($alias . '.kk_d1');
            $criteria->addSelectColumn($alias . '.kk_e');
            $criteria->addSelectColumn($alias . '.kk_f');
            $criteria->addSelectColumn($alias . '.kk_h');
            $criteria->addSelectColumn($alias . '.kk_i');
            $criteria->addSelectColumn($alias . '.kk_j');
            $criteria->addSelectColumn($alias . '.kk_k');
            $criteria->addSelectColumn($alias . '.kk_n');
            $criteria->addSelectColumn($alias . '.kk_o');
            $criteria->addSelectColumn($alias . '.kk_p');
            $criteria->addSelectColumn($alias . '.kk_q');
            $criteria->addSelectColumn($alias . '.untuk_lembaga');
            $criteria->addSelectColumn($alias . '.untuk_ptk');
            $criteria->addSelectColumn($alias . '.untuk_pd');
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
        $criteria->setPrimaryTableName(KebutuhanKhususPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KebutuhanKhususPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(KebutuhanKhususPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(KebutuhanKhususPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 KebutuhanKhusus
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = KebutuhanKhususPeer::doSelect($critcopy, $con);
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
        return KebutuhanKhususPeer::populateObjects(KebutuhanKhususPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(KebutuhanKhususPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            KebutuhanKhususPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(KebutuhanKhususPeer::DATABASE_NAME);

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
     * @param      KebutuhanKhusus $obj A KebutuhanKhusus object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getKebutuhanKhususId();
            } // if key === null
            KebutuhanKhususPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A KebutuhanKhusus object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof KebutuhanKhusus) {
                $key = (string) $value->getKebutuhanKhususId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or KebutuhanKhusus object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(KebutuhanKhususPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   KebutuhanKhusus Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(KebutuhanKhususPeer::$instances[$key])) {
                return KebutuhanKhususPeer::$instances[$key];
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
        foreach (KebutuhanKhususPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        KebutuhanKhususPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ref.kebutuhan_khusus
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
        $cls = KebutuhanKhususPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = KebutuhanKhususPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                KebutuhanKhususPeer::addInstanceToPool($obj, $key);
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
     * @return array (KebutuhanKhusus object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = KebutuhanKhususPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = KebutuhanKhususPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + KebutuhanKhususPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = KebutuhanKhususPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            KebutuhanKhususPeer::addInstanceToPool($obj, $key);
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
        return Propel::getDatabaseMap(KebutuhanKhususPeer::DATABASE_NAME)->getTable(KebutuhanKhususPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseKebutuhanKhususPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseKebutuhanKhususPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new KebutuhanKhususTableMap());
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
        return KebutuhanKhususPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a KebutuhanKhusus or Criteria object.
     *
     * @param      mixed $values Criteria or KebutuhanKhusus object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KebutuhanKhususPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from KebutuhanKhusus object
        }


        // Set the correct dbName
        $criteria->setDbName(KebutuhanKhususPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a KebutuhanKhusus or Criteria object.
     *
     * @param      mixed $values Criteria or KebutuhanKhusus object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KebutuhanKhususPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(KebutuhanKhususPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID);
            $value = $criteria->remove(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID);
            if ($value) {
                $selectCriteria->add(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(KebutuhanKhususPeer::TABLE_NAME);
            }

        } else { // $values is KebutuhanKhusus object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(KebutuhanKhususPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ref.kebutuhan_khusus table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KebutuhanKhususPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(KebutuhanKhususPeer::TABLE_NAME, $con, KebutuhanKhususPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KebutuhanKhususPeer::clearInstancePool();
            KebutuhanKhususPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a KebutuhanKhusus or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or KebutuhanKhusus object or primary key or array of primary keys
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
            $con = Propel::getConnection(KebutuhanKhususPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            KebutuhanKhususPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof KebutuhanKhusus) { // it's a model object
            // invalidate the cache for this single object
            KebutuhanKhususPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(KebutuhanKhususPeer::DATABASE_NAME);
            $criteria->add(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                KebutuhanKhususPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(KebutuhanKhususPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            KebutuhanKhususPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given KebutuhanKhusus object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      KebutuhanKhusus $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(KebutuhanKhususPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(KebutuhanKhususPeer::TABLE_NAME);

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

        return BasePeer::doValidate(KebutuhanKhususPeer::DATABASE_NAME, KebutuhanKhususPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return KebutuhanKhusus
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = KebutuhanKhususPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(KebutuhanKhususPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(KebutuhanKhususPeer::DATABASE_NAME);
        $criteria->add(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $pk);

        $v = KebutuhanKhususPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return KebutuhanKhusus[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KebutuhanKhususPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(KebutuhanKhususPeer::DATABASE_NAME);
            $criteria->add(KebutuhanKhususPeer::KEBUTUHAN_KHUSUS_ID, $pks, Criteria::IN);
            $objs = KebutuhanKhususPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseKebutuhanKhususPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseKebutuhanKhususPeer::buildTableMap();

