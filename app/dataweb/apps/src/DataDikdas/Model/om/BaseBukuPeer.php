<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BiblioPeer;
use DataDikdas\Model\Buku;
use DataDikdas\Model\BukuPeer;
use DataDikdas\Model\JenisHapusBukuPeer;
use DataDikdas\Model\MataPelajaranPeer;
use DataDikdas\Model\RuangPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\TingkatPendidikanPeer;
use DataDikdas\Model\map\BukuTableMap;

/**
 * Base static class for performing query and update operations on the 'buku' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseBukuPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'buku';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Buku';

    /** the related TableMap class for this table */
    const TM_CLASS = 'BukuTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 15;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 15;

    /** the column name for the id_buku field */
    const ID_BUKU = 'buku.id_buku';

    /** the column name for the mata_pelajaran_id field */
    const MATA_PELAJARAN_ID = 'buku.mata_pelajaran_id';

    /** the column name for the id_ruang field */
    const ID_RUANG = 'buku.id_ruang';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'buku.sekolah_id';

    /** the column name for the id_biblio field */
    const ID_BIBLIO = 'buku.id_biblio';

    /** the column name for the tingkat_pendidikan_id field */
    const TINGKAT_PENDIDIKAN_ID = 'buku.tingkat_pendidikan_id';

    /** the column name for the nm_buku field */
    const NM_BUKU = 'buku.nm_buku';

    /** the column name for the id_hapus_buku field */
    const ID_HAPUS_BUKU = 'buku.id_hapus_buku';

    /** the column name for the tgl_hapus_buku field */
    const TGL_HAPUS_BUKU = 'buku.tgl_hapus_buku';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'buku.asal_data';

    /** the column name for the create_date field */
    const CREATE_DATE = 'buku.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'buku.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'buku.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'buku.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'buku.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Buku objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Buku[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. BukuPeer::$fieldNames[BukuPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdBuku', 'MataPelajaranId', 'IdRuang', 'SekolahId', 'IdBiblio', 'TingkatPendidikanId', 'NmBuku', 'IdHapusBuku', 'TglHapusBuku', 'AsalData', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idBuku', 'mataPelajaranId', 'idRuang', 'sekolahId', 'idBiblio', 'tingkatPendidikanId', 'nmBuku', 'idHapusBuku', 'tglHapusBuku', 'asalData', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (BukuPeer::ID_BUKU, BukuPeer::MATA_PELAJARAN_ID, BukuPeer::ID_RUANG, BukuPeer::SEKOLAH_ID, BukuPeer::ID_BIBLIO, BukuPeer::TINGKAT_PENDIDIKAN_ID, BukuPeer::NM_BUKU, BukuPeer::ID_HAPUS_BUKU, BukuPeer::TGL_HAPUS_BUKU, BukuPeer::ASAL_DATA, BukuPeer::CREATE_DATE, BukuPeer::LAST_UPDATE, BukuPeer::SOFT_DELETE, BukuPeer::LAST_SYNC, BukuPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_BUKU', 'MATA_PELAJARAN_ID', 'ID_RUANG', 'SEKOLAH_ID', 'ID_BIBLIO', 'TINGKAT_PENDIDIKAN_ID', 'NM_BUKU', 'ID_HAPUS_BUKU', 'TGL_HAPUS_BUKU', 'ASAL_DATA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_buku', 'mata_pelajaran_id', 'id_ruang', 'sekolah_id', 'id_biblio', 'tingkat_pendidikan_id', 'nm_buku', 'id_hapus_buku', 'tgl_hapus_buku', 'asal_data', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. BukuPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdBuku' => 0, 'MataPelajaranId' => 1, 'IdRuang' => 2, 'SekolahId' => 3, 'IdBiblio' => 4, 'TingkatPendidikanId' => 5, 'NmBuku' => 6, 'IdHapusBuku' => 7, 'TglHapusBuku' => 8, 'AsalData' => 9, 'CreateDate' => 10, 'LastUpdate' => 11, 'SoftDelete' => 12, 'LastSync' => 13, 'UpdaterId' => 14, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idBuku' => 0, 'mataPelajaranId' => 1, 'idRuang' => 2, 'sekolahId' => 3, 'idBiblio' => 4, 'tingkatPendidikanId' => 5, 'nmBuku' => 6, 'idHapusBuku' => 7, 'tglHapusBuku' => 8, 'asalData' => 9, 'createDate' => 10, 'lastUpdate' => 11, 'softDelete' => 12, 'lastSync' => 13, 'updaterId' => 14, ),
        BasePeer::TYPE_COLNAME => array (BukuPeer::ID_BUKU => 0, BukuPeer::MATA_PELAJARAN_ID => 1, BukuPeer::ID_RUANG => 2, BukuPeer::SEKOLAH_ID => 3, BukuPeer::ID_BIBLIO => 4, BukuPeer::TINGKAT_PENDIDIKAN_ID => 5, BukuPeer::NM_BUKU => 6, BukuPeer::ID_HAPUS_BUKU => 7, BukuPeer::TGL_HAPUS_BUKU => 8, BukuPeer::ASAL_DATA => 9, BukuPeer::CREATE_DATE => 10, BukuPeer::LAST_UPDATE => 11, BukuPeer::SOFT_DELETE => 12, BukuPeer::LAST_SYNC => 13, BukuPeer::UPDATER_ID => 14, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_BUKU' => 0, 'MATA_PELAJARAN_ID' => 1, 'ID_RUANG' => 2, 'SEKOLAH_ID' => 3, 'ID_BIBLIO' => 4, 'TINGKAT_PENDIDIKAN_ID' => 5, 'NM_BUKU' => 6, 'ID_HAPUS_BUKU' => 7, 'TGL_HAPUS_BUKU' => 8, 'ASAL_DATA' => 9, 'CREATE_DATE' => 10, 'LAST_UPDATE' => 11, 'SOFT_DELETE' => 12, 'LAST_SYNC' => 13, 'UPDATER_ID' => 14, ),
        BasePeer::TYPE_FIELDNAME => array ('id_buku' => 0, 'mata_pelajaran_id' => 1, 'id_ruang' => 2, 'sekolah_id' => 3, 'id_biblio' => 4, 'tingkat_pendidikan_id' => 5, 'nm_buku' => 6, 'id_hapus_buku' => 7, 'tgl_hapus_buku' => 8, 'asal_data' => 9, 'create_date' => 10, 'last_update' => 11, 'soft_delete' => 12, 'last_sync' => 13, 'updater_id' => 14, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $toNames = BukuPeer::getFieldNames($toType);
        $key = isset(BukuPeer::$fieldKeys[$fromType][$name]) ? BukuPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(BukuPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, BukuPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return BukuPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. BukuPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(BukuPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(BukuPeer::ID_BUKU);
            $criteria->addSelectColumn(BukuPeer::MATA_PELAJARAN_ID);
            $criteria->addSelectColumn(BukuPeer::ID_RUANG);
            $criteria->addSelectColumn(BukuPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(BukuPeer::ID_BIBLIO);
            $criteria->addSelectColumn(BukuPeer::TINGKAT_PENDIDIKAN_ID);
            $criteria->addSelectColumn(BukuPeer::NM_BUKU);
            $criteria->addSelectColumn(BukuPeer::ID_HAPUS_BUKU);
            $criteria->addSelectColumn(BukuPeer::TGL_HAPUS_BUKU);
            $criteria->addSelectColumn(BukuPeer::ASAL_DATA);
            $criteria->addSelectColumn(BukuPeer::CREATE_DATE);
            $criteria->addSelectColumn(BukuPeer::LAST_UPDATE);
            $criteria->addSelectColumn(BukuPeer::SOFT_DELETE);
            $criteria->addSelectColumn(BukuPeer::LAST_SYNC);
            $criteria->addSelectColumn(BukuPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_buku');
            $criteria->addSelectColumn($alias . '.mata_pelajaran_id');
            $criteria->addSelectColumn($alias . '.id_ruang');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.id_biblio');
            $criteria->addSelectColumn($alias . '.tingkat_pendidikan_id');
            $criteria->addSelectColumn($alias . '.nm_buku');
            $criteria->addSelectColumn($alias . '.id_hapus_buku');
            $criteria->addSelectColumn($alias . '.tgl_hapus_buku');
            $criteria->addSelectColumn($alias . '.asal_data');
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
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(BukuPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Buku
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = BukuPeer::doSelect($critcopy, $con);
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
        return BukuPeer::populateObjects(BukuPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            BukuPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

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
     * @param      Buku $obj A Buku object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdBuku();
            } // if key === null
            BukuPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Buku object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Buku) {
                $key = (string) $value->getIdBuku();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Buku object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(BukuPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Buku Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(BukuPeer::$instances[$key])) {
                return BukuPeer::$instances[$key];
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
        foreach (BukuPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        BukuPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to buku
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
        $cls = BukuPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = BukuPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BukuPeer::addInstanceToPool($obj, $key);
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
     * @return array (Buku object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = BukuPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = BukuPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + BukuPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BukuPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            BukuPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Biblio table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBiblio(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Sekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related TingkatPendidikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinTingkatPendidikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisHapusBuku table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisHapusBuku(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Ruang table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRuang(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
     * Selects a collection of Buku objects pre-filled with their MataPelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMataPelajaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol = BukuPeer::NUM_HYDRATE_COLUMNS;
        MataPelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Buku) to $obj2 (MataPelajaran)
                $obj2->addBuku($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Buku objects pre-filled with their Biblio objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBiblio(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol = BukuPeer::NUM_HYDRATE_COLUMNS;
        BiblioPeer::addSelectColumns($criteria);

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BiblioPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BiblioPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BiblioPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BiblioPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Buku) to $obj2 (Biblio)
                $obj2->addBuku($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Buku objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol = BukuPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SekolahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SekolahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Buku) to $obj2 (Sekolah)
                $obj2->addBuku($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Buku objects pre-filled with their TingkatPendidikan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTingkatPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol = BukuPeer::NUM_HYDRATE_COLUMNS;
        TingkatPendidikanPeer::addSelectColumns($criteria);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = TingkatPendidikanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = TingkatPendidikanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    TingkatPendidikanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Buku) to $obj2 (TingkatPendidikan)
                $obj2->addBuku($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Buku objects pre-filled with their JenisHapusBuku objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisHapusBuku(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol = BukuPeer::NUM_HYDRATE_COLUMNS;
        JenisHapusBukuPeer::addSelectColumns($criteria);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisHapusBukuPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisHapusBukuPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisHapusBukuPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Buku) to $obj2 (JenisHapusBuku)
                $obj2->addBuku($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Buku objects pre-filled with their Ruang objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRuang(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol = BukuPeer::NUM_HYDRATE_COLUMNS;
        RuangPeer::addSelectColumns($criteria);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RuangPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RuangPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RuangPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Buku) to $obj2 (Ruang)
                $obj2->addBuku($obj1);

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
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
     * Selects a collection of Buku objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol2 = BukuPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        BiblioPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BiblioPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + RuangPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Buku) to the collection in $obj2 (MataPelajaran)
                $obj2->addBuku($obj1);
            } // if joined row not null

            // Add objects for joined Biblio rows

            $key3 = BiblioPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = BiblioPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = BiblioPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BiblioPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Buku) to the collection in $obj3 (Biblio)
                $obj3->addBuku($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = SekolahPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Buku) to the collection in $obj4 (Sekolah)
                $obj4->addBuku($obj1);
            } // if joined row not null

            // Add objects for joined TingkatPendidikan rows

            $key5 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = TingkatPendidikanPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = TingkatPendidikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    TingkatPendidikanPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Buku) to the collection in $obj5 (TingkatPendidikan)
                $obj5->addBuku($obj1);
            } // if joined row not null

            // Add objects for joined JenisHapusBuku rows

            $key6 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = JenisHapusBukuPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = JenisHapusBukuPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JenisHapusBukuPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Buku) to the collection in $obj6 (JenisHapusBuku)
                $obj6->addBuku($obj1);
            } // if joined row not null

            // Add objects for joined Ruang rows

            $key7 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = RuangPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = RuangPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    RuangPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (Buku) to the collection in $obj7 (Ruang)
                $obj7->addBuku($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
    public static function doCountJoinAllExceptMataPelajaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Biblio table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBiblio(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Sekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related TingkatPendidikan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptTingkatPendidikan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisHapusBuku table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisHapusBuku(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Ruang table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRuang(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BukuPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BukuPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

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
     * Selects a collection of Buku objects pre-filled with all related objects except MataPelajaran.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptMataPelajaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol2 = BukuPeer::NUM_HYDRATE_COLUMNS;

        BiblioPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BiblioPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + RuangPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Biblio rows

                $key2 = BiblioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BiblioPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BiblioPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BiblioPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Buku) to the collection in $obj2 (Biblio)
                $obj2->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key3 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Buku) to the collection in $obj3 (Sekolah)
                $obj3->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key4 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TingkatPendidikanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TingkatPendidikanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Buku) to the collection in $obj4 (TingkatPendidikan)
                $obj4->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key5 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisHapusBukuPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisHapusBukuPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Buku) to the collection in $obj5 (JenisHapusBuku)
                $obj5->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key6 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = RuangPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    RuangPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Buku) to the collection in $obj6 (Ruang)
                $obj6->addBuku($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Buku objects pre-filled with all related objects except Biblio.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBiblio(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol2 = BukuPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + RuangPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
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
                } // if $obj2 already loaded

                // Add the $obj1 (Buku) to the collection in $obj2 (MataPelajaran)
                $obj2->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key3 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Buku) to the collection in $obj3 (Sekolah)
                $obj3->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key4 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TingkatPendidikanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TingkatPendidikanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Buku) to the collection in $obj4 (TingkatPendidikan)
                $obj4->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key5 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisHapusBukuPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisHapusBukuPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Buku) to the collection in $obj5 (JenisHapusBuku)
                $obj5->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key6 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = RuangPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    RuangPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Buku) to the collection in $obj6 (Ruang)
                $obj6->addBuku($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Buku objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol2 = BukuPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        BiblioPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BiblioPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + RuangPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
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
                } // if $obj2 already loaded

                // Add the $obj1 (Buku) to the collection in $obj2 (MataPelajaran)
                $obj2->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Biblio rows

                $key3 = BiblioPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BiblioPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BiblioPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BiblioPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Buku) to the collection in $obj3 (Biblio)
                $obj3->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key4 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = TingkatPendidikanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TingkatPendidikanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Buku) to the collection in $obj4 (TingkatPendidikan)
                $obj4->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key5 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisHapusBukuPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisHapusBukuPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Buku) to the collection in $obj5 (JenisHapusBuku)
                $obj5->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key6 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = RuangPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    RuangPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Buku) to the collection in $obj6 (Ruang)
                $obj6->addBuku($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Buku objects pre-filled with all related objects except TingkatPendidikan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptTingkatPendidikan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol2 = BukuPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        BiblioPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BiblioPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + RuangPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
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
                } // if $obj2 already loaded

                // Add the $obj1 (Buku) to the collection in $obj2 (MataPelajaran)
                $obj2->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Biblio rows

                $key3 = BiblioPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BiblioPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BiblioPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BiblioPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Buku) to the collection in $obj3 (Biblio)
                $obj3->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Buku) to the collection in $obj4 (Sekolah)
                $obj4->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key5 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisHapusBukuPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisHapusBukuPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Buku) to the collection in $obj5 (JenisHapusBuku)
                $obj5->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key6 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = RuangPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    RuangPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Buku) to the collection in $obj6 (Ruang)
                $obj6->addBuku($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Buku objects pre-filled with all related objects except JenisHapusBuku.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisHapusBuku(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol2 = BukuPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        BiblioPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BiblioPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + RuangPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
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
                } // if $obj2 already loaded

                // Add the $obj1 (Buku) to the collection in $obj2 (MataPelajaran)
                $obj2->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Biblio rows

                $key3 = BiblioPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BiblioPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BiblioPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BiblioPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Buku) to the collection in $obj3 (Biblio)
                $obj3->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Buku) to the collection in $obj4 (Sekolah)
                $obj4->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key5 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = TingkatPendidikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    TingkatPendidikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Buku) to the collection in $obj5 (TingkatPendidikan)
                $obj5->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key6 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = RuangPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    RuangPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Buku) to the collection in $obj6 (Ruang)
                $obj6->addBuku($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Buku objects pre-filled with all related objects except Ruang.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Buku objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRuang(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BukuPeer::DATABASE_NAME);
        }

        BukuPeer::addSelectColumns($criteria);
        $startcol2 = BukuPeer::NUM_HYDRATE_COLUMNS;

        MataPelajaranPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MataPelajaranPeer::NUM_HYDRATE_COLUMNS;

        BiblioPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BiblioPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        TingkatPendidikanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BukuPeer::MATA_PELAJARAN_ID, MataPelajaranPeer::MATA_PELAJARAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_BIBLIO, BiblioPeer::ID_BIBLIO, $join_behavior);

        $criteria->addJoin(BukuPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::TINGKAT_PENDIDIKAN_ID, TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $join_behavior);

        $criteria->addJoin(BukuPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BukuPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BukuPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BukuPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BukuPeer::addInstanceToPool($obj1, $key1);
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
                } // if $obj2 already loaded

                // Add the $obj1 (Buku) to the collection in $obj2 (MataPelajaran)
                $obj2->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Biblio rows

                $key3 = BiblioPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BiblioPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BiblioPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BiblioPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Buku) to the collection in $obj3 (Biblio)
                $obj3->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key4 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SekolahPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SekolahPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Buku) to the collection in $obj4 (Sekolah)
                $obj4->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined TingkatPendidikan rows

                $key5 = TingkatPendidikanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = TingkatPendidikanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = TingkatPendidikanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    TingkatPendidikanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Buku) to the collection in $obj5 (TingkatPendidikan)
                $obj5->addBuku($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key6 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JenisHapusBukuPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JenisHapusBukuPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Buku) to the collection in $obj6 (JenisHapusBuku)
                $obj6->addBuku($obj1);

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
        return Propel::getDatabaseMap(BukuPeer::DATABASE_NAME)->getTable(BukuPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseBukuPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseBukuPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new BukuTableMap());
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
        return BukuPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Buku or Criteria object.
     *
     * @param      mixed $values Criteria or Buku object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Buku object
        }


        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Buku or Criteria object.
     *
     * @param      mixed $values Criteria or Buku object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(BukuPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(BukuPeer::ID_BUKU);
            $value = $criteria->remove(BukuPeer::ID_BUKU);
            if ($value) {
                $selectCriteria->add(BukuPeer::ID_BUKU, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BukuPeer::TABLE_NAME);
            }

        } else { // $values is Buku object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the buku table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(BukuPeer::TABLE_NAME, $con, BukuPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BukuPeer::clearInstancePool();
            BukuPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Buku or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Buku object or primary key or array of primary keys
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
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            BukuPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Buku) { // it's a model object
            // invalidate the cache for this single object
            BukuPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BukuPeer::DATABASE_NAME);
            $criteria->add(BukuPeer::ID_BUKU, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                BukuPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(BukuPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            BukuPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Buku object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Buku $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(BukuPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(BukuPeer::TABLE_NAME);

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

        return BasePeer::doValidate(BukuPeer::DATABASE_NAME, BukuPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Buku
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = BukuPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(BukuPeer::DATABASE_NAME);
        $criteria->add(BukuPeer::ID_BUKU, $pk);

        $v = BukuPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Buku[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(BukuPeer::DATABASE_NAME);
            $criteria->add(BukuPeer::ID_BUKU, $pks, Criteria::IN);
            $objs = BukuPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseBukuPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBukuPeer::buildTableMap();

