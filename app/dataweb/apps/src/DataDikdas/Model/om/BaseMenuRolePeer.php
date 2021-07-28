<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\MenuPeer;
use DataDikdas\Model\MenuRole;
use DataDikdas\Model\MenuRolePeer;
use DataDikdas\Model\PeranPeer;
use DataDikdas\Model\map\MenuRoleTableMap;

/**
 * Base static class for performing query and update operations on the 'man_akses.menu_role' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseMenuRolePeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'man_akses.menu_role';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\MenuRole';

    /** the related TableMap class for this table */
    const TM_CLASS = 'MenuRoleTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 12;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 12;

    /** the column name for the id_menu field */
    const ID_MENU = 'man_akses.menu_role.id_menu';

    /** the column name for the peran_id field */
    const PERAN_ID = 'man_akses.menu_role.peran_id';

    /** the column name for the akses_menu field */
    const AKSES_MENU = 'man_akses.menu_role.akses_menu';

    /** the column name for the a_boleh_insert field */
    const A_BOLEH_INSERT = 'man_akses.menu_role.a_boleh_insert';

    /** the column name for the a_boleh_delete field */
    const A_BOLEH_DELETE = 'man_akses.menu_role.a_boleh_delete';

    /** the column name for the a_boleh_update field */
    const A_BOLEH_UPDATE = 'man_akses.menu_role.a_boleh_update';

    /** the column name for the a_boleh_sanggah field */
    const A_BOLEH_SANGGAH = 'man_akses.menu_role.a_boleh_sanggah';

    /** the column name for the approval_menu field */
    const APPROVAL_MENU = 'man_akses.menu_role.approval_menu';

    /** the column name for the create_date field */
    const CREATE_DATE = 'man_akses.menu_role.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'man_akses.menu_role.last_update';

    /** the column name for the expired_date field */
    const EXPIRED_DATE = 'man_akses.menu_role.expired_date';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'man_akses.menu_role.last_sync';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of MenuRole objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array MenuRole[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. MenuRolePeer::$fieldNames[MenuRolePeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdMenu', 'PeranId', 'AksesMenu', 'ABolehInsert', 'ABolehDelete', 'ABolehUpdate', 'ABolehSanggah', 'ApprovalMenu', 'CreateDate', 'LastUpdate', 'ExpiredDate', 'LastSync', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idMenu', 'peranId', 'aksesMenu', 'aBolehInsert', 'aBolehDelete', 'aBolehUpdate', 'aBolehSanggah', 'approvalMenu', 'createDate', 'lastUpdate', 'expiredDate', 'lastSync', ),
        BasePeer::TYPE_COLNAME => array (MenuRolePeer::ID_MENU, MenuRolePeer::PERAN_ID, MenuRolePeer::AKSES_MENU, MenuRolePeer::A_BOLEH_INSERT, MenuRolePeer::A_BOLEH_DELETE, MenuRolePeer::A_BOLEH_UPDATE, MenuRolePeer::A_BOLEH_SANGGAH, MenuRolePeer::APPROVAL_MENU, MenuRolePeer::CREATE_DATE, MenuRolePeer::LAST_UPDATE, MenuRolePeer::EXPIRED_DATE, MenuRolePeer::LAST_SYNC, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_MENU', 'PERAN_ID', 'AKSES_MENU', 'A_BOLEH_INSERT', 'A_BOLEH_DELETE', 'A_BOLEH_UPDATE', 'A_BOLEH_SANGGAH', 'APPROVAL_MENU', 'CREATE_DATE', 'LAST_UPDATE', 'EXPIRED_DATE', 'LAST_SYNC', ),
        BasePeer::TYPE_FIELDNAME => array ('id_menu', 'peran_id', 'akses_menu', 'a_boleh_insert', 'a_boleh_delete', 'a_boleh_update', 'a_boleh_sanggah', 'approval_menu', 'create_date', 'last_update', 'expired_date', 'last_sync', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. MenuRolePeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdMenu' => 0, 'PeranId' => 1, 'AksesMenu' => 2, 'ABolehInsert' => 3, 'ABolehDelete' => 4, 'ABolehUpdate' => 5, 'ABolehSanggah' => 6, 'ApprovalMenu' => 7, 'CreateDate' => 8, 'LastUpdate' => 9, 'ExpiredDate' => 10, 'LastSync' => 11, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idMenu' => 0, 'peranId' => 1, 'aksesMenu' => 2, 'aBolehInsert' => 3, 'aBolehDelete' => 4, 'aBolehUpdate' => 5, 'aBolehSanggah' => 6, 'approvalMenu' => 7, 'createDate' => 8, 'lastUpdate' => 9, 'expiredDate' => 10, 'lastSync' => 11, ),
        BasePeer::TYPE_COLNAME => array (MenuRolePeer::ID_MENU => 0, MenuRolePeer::PERAN_ID => 1, MenuRolePeer::AKSES_MENU => 2, MenuRolePeer::A_BOLEH_INSERT => 3, MenuRolePeer::A_BOLEH_DELETE => 4, MenuRolePeer::A_BOLEH_UPDATE => 5, MenuRolePeer::A_BOLEH_SANGGAH => 6, MenuRolePeer::APPROVAL_MENU => 7, MenuRolePeer::CREATE_DATE => 8, MenuRolePeer::LAST_UPDATE => 9, MenuRolePeer::EXPIRED_DATE => 10, MenuRolePeer::LAST_SYNC => 11, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_MENU' => 0, 'PERAN_ID' => 1, 'AKSES_MENU' => 2, 'A_BOLEH_INSERT' => 3, 'A_BOLEH_DELETE' => 4, 'A_BOLEH_UPDATE' => 5, 'A_BOLEH_SANGGAH' => 6, 'APPROVAL_MENU' => 7, 'CREATE_DATE' => 8, 'LAST_UPDATE' => 9, 'EXPIRED_DATE' => 10, 'LAST_SYNC' => 11, ),
        BasePeer::TYPE_FIELDNAME => array ('id_menu' => 0, 'peran_id' => 1, 'akses_menu' => 2, 'a_boleh_insert' => 3, 'a_boleh_delete' => 4, 'a_boleh_update' => 5, 'a_boleh_sanggah' => 6, 'approval_menu' => 7, 'create_date' => 8, 'last_update' => 9, 'expired_date' => 10, 'last_sync' => 11, ),
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
        $toNames = MenuRolePeer::getFieldNames($toType);
        $key = isset(MenuRolePeer::$fieldKeys[$fromType][$name]) ? MenuRolePeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(MenuRolePeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, MenuRolePeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return MenuRolePeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. MenuRolePeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(MenuRolePeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(MenuRolePeer::ID_MENU);
            $criteria->addSelectColumn(MenuRolePeer::PERAN_ID);
            $criteria->addSelectColumn(MenuRolePeer::AKSES_MENU);
            $criteria->addSelectColumn(MenuRolePeer::A_BOLEH_INSERT);
            $criteria->addSelectColumn(MenuRolePeer::A_BOLEH_DELETE);
            $criteria->addSelectColumn(MenuRolePeer::A_BOLEH_UPDATE);
            $criteria->addSelectColumn(MenuRolePeer::A_BOLEH_SANGGAH);
            $criteria->addSelectColumn(MenuRolePeer::APPROVAL_MENU);
            $criteria->addSelectColumn(MenuRolePeer::CREATE_DATE);
            $criteria->addSelectColumn(MenuRolePeer::LAST_UPDATE);
            $criteria->addSelectColumn(MenuRolePeer::EXPIRED_DATE);
            $criteria->addSelectColumn(MenuRolePeer::LAST_SYNC);
        } else {
            $criteria->addSelectColumn($alias . '.id_menu');
            $criteria->addSelectColumn($alias . '.peran_id');
            $criteria->addSelectColumn($alias . '.akses_menu');
            $criteria->addSelectColumn($alias . '.a_boleh_insert');
            $criteria->addSelectColumn($alias . '.a_boleh_delete');
            $criteria->addSelectColumn($alias . '.a_boleh_update');
            $criteria->addSelectColumn($alias . '.a_boleh_sanggah');
            $criteria->addSelectColumn($alias . '.approval_menu');
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
        $criteria->setPrimaryTableName(MenuRolePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MenuRolePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(MenuRolePeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MenuRole
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = MenuRolePeer::doSelect($critcopy, $con);
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
        return MenuRolePeer::populateObjects(MenuRolePeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            MenuRolePeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(MenuRolePeer::DATABASE_NAME);

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
     * @param      MenuRole $obj A MenuRole object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getIdMenu(), (string) $obj->getPeranId()));
            } // if key === null
            MenuRolePeer::$instances[$key] = $obj;
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
     * @param      mixed $value A MenuRole object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof MenuRole) {
                $key = serialize(array((string) $value->getIdMenu(), (string) $value->getPeranId()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or MenuRole object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(MenuRolePeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   MenuRole Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(MenuRolePeer::$instances[$key])) {
                return MenuRolePeer::$instances[$key];
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
        foreach (MenuRolePeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        MenuRolePeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to man_akses.menu_role
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
        if ($row[$startcol] === null && $row[$startcol + 1] === null) {
            return null;
        }

        return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1]));
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

        return array((string) $row[$startcol], (int) $row[$startcol + 1]);
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
        $cls = MenuRolePeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = MenuRolePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = MenuRolePeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MenuRolePeer::addInstanceToPool($obj, $key);
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
     * @return array (MenuRole object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = MenuRolePeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = MenuRolePeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + MenuRolePeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MenuRolePeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            MenuRolePeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Menu table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMenu(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MenuRolePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MenuRolePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MenuRolePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MenuRolePeer::ID_MENU, MenuPeer::ID_MENU, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Peran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPeran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MenuRolePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MenuRolePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MenuRolePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MenuRolePeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

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
     * Selects a collection of MenuRole objects pre-filled with their Menu objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MenuRole objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMenu(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MenuRolePeer::DATABASE_NAME);
        }

        MenuRolePeer::addSelectColumns($criteria);
        $startcol = MenuRolePeer::NUM_HYDRATE_COLUMNS;
        MenuPeer::addSelectColumns($criteria);

        $criteria->addJoin(MenuRolePeer::ID_MENU, MenuPeer::ID_MENU, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MenuRolePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MenuRolePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MenuRolePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MenuRolePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MenuPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MenuPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MenuPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MenuPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (MenuRole) to $obj2 (Menu)
                $obj2->addMenuRole($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of MenuRole objects pre-filled with their Peran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MenuRole objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPeran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MenuRolePeer::DATABASE_NAME);
        }

        MenuRolePeer::addSelectColumns($criteria);
        $startcol = MenuRolePeer::NUM_HYDRATE_COLUMNS;
        PeranPeer::addSelectColumns($criteria);

        $criteria->addJoin(MenuRolePeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MenuRolePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MenuRolePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MenuRolePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MenuRolePeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PeranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PeranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PeranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PeranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (MenuRole) to $obj2 (Peran)
                $obj2->addMenuRole($obj1);

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
        $criteria->setPrimaryTableName(MenuRolePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MenuRolePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MenuRolePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MenuRolePeer::ID_MENU, MenuPeer::ID_MENU, $join_behavior);

        $criteria->addJoin(MenuRolePeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

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
     * Selects a collection of MenuRole objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MenuRole objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MenuRolePeer::DATABASE_NAME);
        }

        MenuRolePeer::addSelectColumns($criteria);
        $startcol2 = MenuRolePeer::NUM_HYDRATE_COLUMNS;

        MenuPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MenuPeer::NUM_HYDRATE_COLUMNS;

        PeranPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PeranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MenuRolePeer::ID_MENU, MenuPeer::ID_MENU, $join_behavior);

        $criteria->addJoin(MenuRolePeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MenuRolePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MenuRolePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MenuRolePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MenuRolePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Menu rows

            $key2 = MenuPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = MenuPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MenuPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MenuPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (MenuRole) to the collection in $obj2 (Menu)
                $obj2->addMenuRole($obj1);
            } // if joined row not null

            // Add objects for joined Peran rows

            $key3 = PeranPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PeranPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PeranPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PeranPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (MenuRole) to the collection in $obj3 (Peran)
                $obj3->addMenuRole($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Menu table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptMenu(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MenuRolePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MenuRolePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MenuRolePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(MenuRolePeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Peran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPeran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MenuRolePeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MenuRolePeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MenuRolePeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(MenuRolePeer::ID_MENU, MenuPeer::ID_MENU, $join_behavior);

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
     * Selects a collection of MenuRole objects pre-filled with all related objects except Menu.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MenuRole objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMenu(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MenuRolePeer::DATABASE_NAME);
        }

        MenuRolePeer::addSelectColumns($criteria);
        $startcol2 = MenuRolePeer::NUM_HYDRATE_COLUMNS;

        PeranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PeranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MenuRolePeer::PERAN_ID, PeranPeer::PERAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MenuRolePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MenuRolePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MenuRolePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MenuRolePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Peran rows

                $key2 = PeranPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PeranPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PeranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PeranPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (MenuRole) to the collection in $obj2 (Peran)
                $obj2->addMenuRole($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of MenuRole objects pre-filled with all related objects except Peran.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of MenuRole objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPeran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MenuRolePeer::DATABASE_NAME);
        }

        MenuRolePeer::addSelectColumns($criteria);
        $startcol2 = MenuRolePeer::NUM_HYDRATE_COLUMNS;

        MenuPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MenuPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MenuRolePeer::ID_MENU, MenuPeer::ID_MENU, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MenuRolePeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MenuRolePeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MenuRolePeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MenuRolePeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Menu rows

                $key2 = MenuPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = MenuPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = MenuPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MenuPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (MenuRole) to the collection in $obj2 (Menu)
                $obj2->addMenuRole($obj1);

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
        return Propel::getDatabaseMap(MenuRolePeer::DATABASE_NAME)->getTable(MenuRolePeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseMenuRolePeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseMenuRolePeer::TABLE_NAME)) {
        $dbMap->addTableObject(new MenuRoleTableMap());
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
        return MenuRolePeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a MenuRole or Criteria object.
     *
     * @param      mixed $values Criteria or MenuRole object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from MenuRole object
        }


        // Set the correct dbName
        $criteria->setDbName(MenuRolePeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a MenuRole or Criteria object.
     *
     * @param      mixed $values Criteria or MenuRole object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(MenuRolePeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(MenuRolePeer::ID_MENU);
            $value = $criteria->remove(MenuRolePeer::ID_MENU);
            if ($value) {
                $selectCriteria->add(MenuRolePeer::ID_MENU, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MenuRolePeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(MenuRolePeer::PERAN_ID);
            $value = $criteria->remove(MenuRolePeer::PERAN_ID);
            if ($value) {
                $selectCriteria->add(MenuRolePeer::PERAN_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MenuRolePeer::TABLE_NAME);
            }

        } else { // $values is MenuRole object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(MenuRolePeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the man_akses.menu_role table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(MenuRolePeer::TABLE_NAME, $con, MenuRolePeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MenuRolePeer::clearInstancePool();
            MenuRolePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a MenuRole or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or MenuRole object or primary key or array of primary keys
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
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            MenuRolePeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof MenuRole) { // it's a model object
            // invalidate the cache for this single object
            MenuRolePeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MenuRolePeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(MenuRolePeer::ID_MENU, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(MenuRolePeer::PERAN_ID, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                MenuRolePeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(MenuRolePeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            MenuRolePeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given MenuRole object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      MenuRole $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(MenuRolePeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(MenuRolePeer::TABLE_NAME);

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

        return BasePeer::doValidate(MenuRolePeer::DATABASE_NAME, MenuRolePeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $id_menu
     * @param   int $peran_id
     * @param      PropelPDO $con
     * @return   MenuRole
     */
    public static function retrieveByPK($id_menu, $peran_id, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $id_menu, (string) $peran_id));
         if (null !== ($obj = MenuRolePeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(MenuRolePeer::DATABASE_NAME);
        $criteria->add(MenuRolePeer::ID_MENU, $id_menu);
        $criteria->add(MenuRolePeer::PERAN_ID, $peran_id);
        $v = MenuRolePeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseMenuRolePeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseMenuRolePeer::buildTableMap();

