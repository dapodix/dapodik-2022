<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\PtkBaru;
use DataDikdas\Model\PtkBaruPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\TahunAjaranPeer;
use DataDikdas\Model\map\PtkBaruTableMap;

/**
 * Base static class for performing query and update operations on the 'ptk_baru' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BasePtkBaruPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ptk_baru';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\PtkBaru';

    /** the related TableMap class for this table */
    const TM_CLASS = 'PtkBaruTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 18;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 18;

    /** the column name for the ptk_baru_id field */
    const PTK_BARU_ID = 'ptk_baru.ptk_baru_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'ptk_baru.sekolah_id';

    /** the column name for the tahun_ajaran_id field */
    const TAHUN_AJARAN_ID = 'ptk_baru.tahun_ajaran_id';

    /** the column name for the nama_ptk field */
    const NAMA_PTK = 'ptk_baru.nama_ptk';

    /** the column name for the jenis_kelamin field */
    const JENIS_KELAMIN = 'ptk_baru.jenis_kelamin';

    /** the column name for the nuptk field */
    const NUPTK = 'ptk_baru.nuptk';

    /** the column name for the nik field */
    const NIK = 'ptk_baru.nik';

    /** the column name for the tempat_lahir field */
    const TEMPAT_LAHIR = 'ptk_baru.tempat_lahir';

    /** the column name for the tanggal_lahir field */
    const TANGGAL_LAHIR = 'ptk_baru.tanggal_lahir';

    /** the column name for the nama_ibu_kandung field */
    const NAMA_IBU_KANDUNG = 'ptk_baru.nama_ibu_kandung';

    /** the column name for the sudah_diproses field */
    const SUDAH_DIPROSES = 'ptk_baru.sudah_diproses';

    /** the column name for the berhasil_diproses field */
    const BERHASIL_DIPROSES = 'ptk_baru.berhasil_diproses';

    /** the column name for the ptk_id field */
    const PTK_ID = 'ptk_baru.ptk_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ptk_baru.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ptk_baru.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'ptk_baru.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ptk_baru.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'ptk_baru.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of PtkBaru objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array PtkBaru[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. PtkBaruPeer::$fieldNames[PtkBaruPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('PtkBaruId', 'SekolahId', 'TahunAjaranId', 'NamaPtk', 'JenisKelamin', 'Nuptk', 'Nik', 'TempatLahir', 'TanggalLahir', 'NamaIbuKandung', 'SudahDiproses', 'BerhasilDiproses', 'PtkId', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('ptkBaruId', 'sekolahId', 'tahunAjaranId', 'namaPtk', 'jenisKelamin', 'nuptk', 'nik', 'tempatLahir', 'tanggalLahir', 'namaIbuKandung', 'sudahDiproses', 'berhasilDiproses', 'ptkId', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (PtkBaruPeer::PTK_BARU_ID, PtkBaruPeer::SEKOLAH_ID, PtkBaruPeer::TAHUN_AJARAN_ID, PtkBaruPeer::NAMA_PTK, PtkBaruPeer::JENIS_KELAMIN, PtkBaruPeer::NUPTK, PtkBaruPeer::NIK, PtkBaruPeer::TEMPAT_LAHIR, PtkBaruPeer::TANGGAL_LAHIR, PtkBaruPeer::NAMA_IBU_KANDUNG, PtkBaruPeer::SUDAH_DIPROSES, PtkBaruPeer::BERHASIL_DIPROSES, PtkBaruPeer::PTK_ID, PtkBaruPeer::CREATE_DATE, PtkBaruPeer::LAST_UPDATE, PtkBaruPeer::SOFT_DELETE, PtkBaruPeer::LAST_SYNC, PtkBaruPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PTK_BARU_ID', 'SEKOLAH_ID', 'TAHUN_AJARAN_ID', 'NAMA_PTK', 'JENIS_KELAMIN', 'NUPTK', 'NIK', 'TEMPAT_LAHIR', 'TANGGAL_LAHIR', 'NAMA_IBU_KANDUNG', 'SUDAH_DIPROSES', 'BERHASIL_DIPROSES', 'PTK_ID', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('ptk_baru_id', 'sekolah_id', 'tahun_ajaran_id', 'nama_ptk', 'jenis_kelamin', 'nuptk', 'nik', 'tempat_lahir', 'tanggal_lahir', 'nama_ibu_kandung', 'sudah_diproses', 'berhasil_diproses', 'ptk_id', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. PtkBaruPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('PtkBaruId' => 0, 'SekolahId' => 1, 'TahunAjaranId' => 2, 'NamaPtk' => 3, 'JenisKelamin' => 4, 'Nuptk' => 5, 'Nik' => 6, 'TempatLahir' => 7, 'TanggalLahir' => 8, 'NamaIbuKandung' => 9, 'SudahDiproses' => 10, 'BerhasilDiproses' => 11, 'PtkId' => 12, 'CreateDate' => 13, 'LastUpdate' => 14, 'SoftDelete' => 15, 'LastSync' => 16, 'UpdaterId' => 17, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('ptkBaruId' => 0, 'sekolahId' => 1, 'tahunAjaranId' => 2, 'namaPtk' => 3, 'jenisKelamin' => 4, 'nuptk' => 5, 'nik' => 6, 'tempatLahir' => 7, 'tanggalLahir' => 8, 'namaIbuKandung' => 9, 'sudahDiproses' => 10, 'berhasilDiproses' => 11, 'ptkId' => 12, 'createDate' => 13, 'lastUpdate' => 14, 'softDelete' => 15, 'lastSync' => 16, 'updaterId' => 17, ),
        BasePeer::TYPE_COLNAME => array (PtkBaruPeer::PTK_BARU_ID => 0, PtkBaruPeer::SEKOLAH_ID => 1, PtkBaruPeer::TAHUN_AJARAN_ID => 2, PtkBaruPeer::NAMA_PTK => 3, PtkBaruPeer::JENIS_KELAMIN => 4, PtkBaruPeer::NUPTK => 5, PtkBaruPeer::NIK => 6, PtkBaruPeer::TEMPAT_LAHIR => 7, PtkBaruPeer::TANGGAL_LAHIR => 8, PtkBaruPeer::NAMA_IBU_KANDUNG => 9, PtkBaruPeer::SUDAH_DIPROSES => 10, PtkBaruPeer::BERHASIL_DIPROSES => 11, PtkBaruPeer::PTK_ID => 12, PtkBaruPeer::CREATE_DATE => 13, PtkBaruPeer::LAST_UPDATE => 14, PtkBaruPeer::SOFT_DELETE => 15, PtkBaruPeer::LAST_SYNC => 16, PtkBaruPeer::UPDATER_ID => 17, ),
        BasePeer::TYPE_RAW_COLNAME => array ('PTK_BARU_ID' => 0, 'SEKOLAH_ID' => 1, 'TAHUN_AJARAN_ID' => 2, 'NAMA_PTK' => 3, 'JENIS_KELAMIN' => 4, 'NUPTK' => 5, 'NIK' => 6, 'TEMPAT_LAHIR' => 7, 'TANGGAL_LAHIR' => 8, 'NAMA_IBU_KANDUNG' => 9, 'SUDAH_DIPROSES' => 10, 'BERHASIL_DIPROSES' => 11, 'PTK_ID' => 12, 'CREATE_DATE' => 13, 'LAST_UPDATE' => 14, 'SOFT_DELETE' => 15, 'LAST_SYNC' => 16, 'UPDATER_ID' => 17, ),
        BasePeer::TYPE_FIELDNAME => array ('ptk_baru_id' => 0, 'sekolah_id' => 1, 'tahun_ajaran_id' => 2, 'nama_ptk' => 3, 'jenis_kelamin' => 4, 'nuptk' => 5, 'nik' => 6, 'tempat_lahir' => 7, 'tanggal_lahir' => 8, 'nama_ibu_kandung' => 9, 'sudah_diproses' => 10, 'berhasil_diproses' => 11, 'ptk_id' => 12, 'create_date' => 13, 'last_update' => 14, 'soft_delete' => 15, 'last_sync' => 16, 'updater_id' => 17, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
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
        $toNames = PtkBaruPeer::getFieldNames($toType);
        $key = isset(PtkBaruPeer::$fieldKeys[$fromType][$name]) ? PtkBaruPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(PtkBaruPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, PtkBaruPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return PtkBaruPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. PtkBaruPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(PtkBaruPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(PtkBaruPeer::PTK_BARU_ID);
            $criteria->addSelectColumn(PtkBaruPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(PtkBaruPeer::TAHUN_AJARAN_ID);
            $criteria->addSelectColumn(PtkBaruPeer::NAMA_PTK);
            $criteria->addSelectColumn(PtkBaruPeer::JENIS_KELAMIN);
            $criteria->addSelectColumn(PtkBaruPeer::NUPTK);
            $criteria->addSelectColumn(PtkBaruPeer::NIK);
            $criteria->addSelectColumn(PtkBaruPeer::TEMPAT_LAHIR);
            $criteria->addSelectColumn(PtkBaruPeer::TANGGAL_LAHIR);
            $criteria->addSelectColumn(PtkBaruPeer::NAMA_IBU_KANDUNG);
            $criteria->addSelectColumn(PtkBaruPeer::SUDAH_DIPROSES);
            $criteria->addSelectColumn(PtkBaruPeer::BERHASIL_DIPROSES);
            $criteria->addSelectColumn(PtkBaruPeer::PTK_ID);
            $criteria->addSelectColumn(PtkBaruPeer::CREATE_DATE);
            $criteria->addSelectColumn(PtkBaruPeer::LAST_UPDATE);
            $criteria->addSelectColumn(PtkBaruPeer::SOFT_DELETE);
            $criteria->addSelectColumn(PtkBaruPeer::LAST_SYNC);
            $criteria->addSelectColumn(PtkBaruPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.ptk_baru_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.tahun_ajaran_id');
            $criteria->addSelectColumn($alias . '.nama_ptk');
            $criteria->addSelectColumn($alias . '.jenis_kelamin');
            $criteria->addSelectColumn($alias . '.nuptk');
            $criteria->addSelectColumn($alias . '.nik');
            $criteria->addSelectColumn($alias . '.tempat_lahir');
            $criteria->addSelectColumn($alias . '.tanggal_lahir');
            $criteria->addSelectColumn($alias . '.nama_ibu_kandung');
            $criteria->addSelectColumn($alias . '.sudah_diproses');
            $criteria->addSelectColumn($alias . '.berhasil_diproses');
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
        $criteria->setPrimaryTableName(PtkBaruPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkBaruPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(PtkBaruPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PtkBaru
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = PtkBaruPeer::doSelect($critcopy, $con);
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
        return PtkBaruPeer::populateObjects(PtkBaruPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            PtkBaruPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);

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
     * @param      PtkBaru $obj A PtkBaru object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getPtkBaruId();
            } // if key === null
            PtkBaruPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A PtkBaru object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof PtkBaru) {
                $key = (string) $value->getPtkBaruId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or PtkBaru object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(PtkBaruPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   PtkBaru Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(PtkBaruPeer::$instances[$key])) {
                return PtkBaruPeer::$instances[$key];
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
        foreach (PtkBaruPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        PtkBaruPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ptk_baru
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
        $cls = PtkBaruPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = PtkBaruPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = PtkBaruPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PtkBaruPeer::addInstanceToPool($obj, $key);
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
     * @return array (PtkBaru object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = PtkBaruPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = PtkBaruPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + PtkBaruPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PtkBaruPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            PtkBaruPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(PtkBaruPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkBaruPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkBaruPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PtkBaruPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkBaruPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkBaruPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PtkBaruPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkBaruPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkBaruPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Selects a collection of PtkBaru objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkBaru objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);
        }

        PtkBaruPeer::addSelectColumns($criteria);
        $startcol = PtkBaruPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkBaruPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkBaruPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkBaruPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkBaruPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkBaruPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (PtkBaru) to $obj2 (Ptk)
                $obj2->addPtkBaru($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PtkBaru objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkBaru objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);
        }

        PtkBaruPeer::addSelectColumns($criteria);
        $startcol = PtkBaruPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkBaruPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkBaruPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkBaruPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkBaruPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkBaruPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (PtkBaru) to $obj2 (Sekolah)
                $obj2->addPtkBaru($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PtkBaru objects pre-filled with their TahunAjaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkBaru objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinTahunAjaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);
        }

        PtkBaruPeer::addSelectColumns($criteria);
        $startcol = PtkBaruPeer::NUM_HYDRATE_COLUMNS;
        TahunAjaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(PtkBaruPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkBaruPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkBaruPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = PtkBaruPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkBaruPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (PtkBaru) to $obj2 (TahunAjaran)
                $obj2->addPtkBaru($obj1);

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
        $criteria->setPrimaryTableName(PtkBaruPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkBaruPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(PtkBaruPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkBaruPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(PtkBaruPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
     * Selects a collection of PtkBaru objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkBaru objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);
        }

        PtkBaruPeer::addSelectColumns($criteria);
        $startcol2 = PtkBaruPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkBaruPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkBaruPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(PtkBaruPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkBaruPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkBaruPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkBaruPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkBaruPeer::addInstanceToPool($obj1, $key1);
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
                } // if obj2 loaded

                // Add the $obj1 (PtkBaru) to the collection in $obj2 (Ptk)
                $obj2->addPtkBaru($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key3 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = SekolahPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = SekolahPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (PtkBaru) to the collection in $obj3 (Sekolah)
                $obj3->addPtkBaru($obj1);
            } // if joined row not null

            // Add objects for joined TahunAjaran rows

            $key4 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = TahunAjaranPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = TahunAjaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    TahunAjaranPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (PtkBaru) to the collection in $obj4 (TahunAjaran)
                $obj4->addPtkBaru($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
        $criteria->setPrimaryTableName(PtkBaruPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkBaruPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkBaruPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(PtkBaruPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PtkBaruPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkBaruPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkBaruPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkBaruPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(PtkBaruPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            PtkBaruPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(PtkBaruPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkBaruPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of PtkBaru objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkBaru objects.
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
            $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);
        }

        PtkBaruPeer::addSelectColumns($criteria);
        $startcol2 = PtkBaruPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkBaruPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(PtkBaruPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkBaruPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkBaruPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkBaruPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkBaruPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Sekolah rows

                $key2 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SekolahPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SekolahPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (PtkBaru) to the collection in $obj2 (Sekolah)
                $obj2->addPtkBaru($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key3 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = TahunAjaranPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TahunAjaranPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PtkBaru) to the collection in $obj3 (TahunAjaran)
                $obj3->addPtkBaru($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PtkBaru objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkBaru objects.
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
            $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);
        }

        PtkBaruPeer::addSelectColumns($criteria);
        $startcol2 = PtkBaruPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        TahunAjaranPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + TahunAjaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkBaruPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkBaruPeer::TAHUN_AJARAN_ID, TahunAjaranPeer::TAHUN_AJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkBaruPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkBaruPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkBaruPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkBaruPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (PtkBaru) to the collection in $obj2 (Ptk)
                $obj2->addPtkBaru($obj1);

            } // if joined row is not null

                // Add objects for joined TahunAjaran rows

                $key3 = TahunAjaranPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = TahunAjaranPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = TahunAjaranPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    TahunAjaranPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (PtkBaru) to the collection in $obj3 (TahunAjaran)
                $obj3->addPtkBaru($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of PtkBaru objects pre-filled with all related objects except TahunAjaran.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of PtkBaru objects.
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
            $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);
        }

        PtkBaruPeer::addSelectColumns($criteria);
        $startcol2 = PtkBaruPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(PtkBaruPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(PtkBaruPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = PtkBaruPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = PtkBaruPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = PtkBaruPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                PtkBaruPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (PtkBaru) to the collection in $obj2 (Ptk)
                $obj2->addPtkBaru($obj1);

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

                // Add the $obj1 (PtkBaru) to the collection in $obj3 (Sekolah)
                $obj3->addPtkBaru($obj1);

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
        return Propel::getDatabaseMap(PtkBaruPeer::DATABASE_NAME)->getTable(PtkBaruPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BasePtkBaruPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BasePtkBaruPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new PtkBaruTableMap());
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
        return PtkBaruPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a PtkBaru or Criteria object.
     *
     * @param      mixed $values Criteria or PtkBaru object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from PtkBaru object
        }


        // Set the correct dbName
        $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a PtkBaru or Criteria object.
     *
     * @param      mixed $values Criteria or PtkBaru object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(PtkBaruPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(PtkBaruPeer::PTK_BARU_ID);
            $value = $criteria->remove(PtkBaruPeer::PTK_BARU_ID);
            if ($value) {
                $selectCriteria->add(PtkBaruPeer::PTK_BARU_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(PtkBaruPeer::TABLE_NAME);
            }

        } else { // $values is PtkBaru object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ptk_baru table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(PtkBaruPeer::TABLE_NAME, $con, PtkBaruPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PtkBaruPeer::clearInstancePool();
            PtkBaruPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a PtkBaru or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or PtkBaru object or primary key or array of primary keys
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
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            PtkBaruPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof PtkBaru) { // it's a model object
            // invalidate the cache for this single object
            PtkBaruPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PtkBaruPeer::DATABASE_NAME);
            $criteria->add(PtkBaruPeer::PTK_BARU_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                PtkBaruPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(PtkBaruPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            PtkBaruPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given PtkBaru object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      PtkBaru $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(PtkBaruPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(PtkBaruPeer::TABLE_NAME);

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

        return BasePeer::doValidate(PtkBaruPeer::DATABASE_NAME, PtkBaruPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return PtkBaru
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = PtkBaruPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(PtkBaruPeer::DATABASE_NAME);
        $criteria->add(PtkBaruPeer::PTK_BARU_ID, $pk);

        $v = PtkBaruPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return PtkBaru[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(PtkBaruPeer::DATABASE_NAME);
            $criteria->add(PtkBaruPeer::PTK_BARU_ID, $pks, Criteria::IN);
            $objs = PtkBaruPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BasePtkBaruPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePtkBaruPeer::buildTableMap();

