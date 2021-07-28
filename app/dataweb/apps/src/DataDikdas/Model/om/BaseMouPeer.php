<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\DudiPeer;
use DataDikdas\Model\JenisKsPeer;
use DataDikdas\Model\Mou;
use DataDikdas\Model\MouPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\map\MouTableMap;

/**
 * Base static class for performing query and update operations on the 'mou' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseMouPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'mou';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Mou';

    /** the related TableMap class for this table */
    const TM_CLASS = 'MouTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 21;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 21;

    /** the column name for the mou_id field */
    const MOU_ID = 'mou.mou_id';

    /** the column name for the id_jns_ks field */
    const ID_JNS_KS = 'mou.id_jns_ks';

    /** the column name for the dudi_id field */
    const DUDI_ID = 'mou.dudi_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'mou.sekolah_id';

    /** the column name for the nomor_mou field */
    const NOMOR_MOU = 'mou.nomor_mou';

    /** the column name for the judul_mou field */
    const JUDUL_MOU = 'mou.judul_mou';

    /** the column name for the tanggal_mulai field */
    const TANGGAL_MULAI = 'mou.tanggal_mulai';

    /** the column name for the tanggal_selesai field */
    const TANGGAL_SELESAI = 'mou.tanggal_selesai';

    /** the column name for the nama_dudi field */
    const NAMA_DUDI = 'mou.nama_dudi';

    /** the column name for the npwp_dudi field */
    const NPWP_DUDI = 'mou.npwp_dudi';

    /** the column name for the nama_bidang_usaha field */
    const NAMA_BIDANG_USAHA = 'mou.nama_bidang_usaha';

    /** the column name for the telp_kantor field */
    const TELP_KANTOR = 'mou.telp_kantor';

    /** the column name for the fax field */
    const FAX = 'mou.fax';

    /** the column name for the contact_person field */
    const CONTACT_PERSON = 'mou.contact_person';

    /** the column name for the telp_cp field */
    const TELP_CP = 'mou.telp_cp';

    /** the column name for the jabatan_cp field */
    const JABATAN_CP = 'mou.jabatan_cp';

    /** the column name for the create_date field */
    const CREATE_DATE = 'mou.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'mou.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'mou.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'mou.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'mou.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Mou objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Mou[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. MouPeer::$fieldNames[MouPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('MouId', 'IdJnsKs', 'DudiId', 'SekolahId', 'NomorMou', 'JudulMou', 'TanggalMulai', 'TanggalSelesai', 'NamaDudi', 'NpwpDudi', 'NamaBidangUsaha', 'TelpKantor', 'Fax', 'ContactPerson', 'TelpCp', 'JabatanCp', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('mouId', 'idJnsKs', 'dudiId', 'sekolahId', 'nomorMou', 'judulMou', 'tanggalMulai', 'tanggalSelesai', 'namaDudi', 'npwpDudi', 'namaBidangUsaha', 'telpKantor', 'fax', 'contactPerson', 'telpCp', 'jabatanCp', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (MouPeer::MOU_ID, MouPeer::ID_JNS_KS, MouPeer::DUDI_ID, MouPeer::SEKOLAH_ID, MouPeer::NOMOR_MOU, MouPeer::JUDUL_MOU, MouPeer::TANGGAL_MULAI, MouPeer::TANGGAL_SELESAI, MouPeer::NAMA_DUDI, MouPeer::NPWP_DUDI, MouPeer::NAMA_BIDANG_USAHA, MouPeer::TELP_KANTOR, MouPeer::FAX, MouPeer::CONTACT_PERSON, MouPeer::TELP_CP, MouPeer::JABATAN_CP, MouPeer::CREATE_DATE, MouPeer::LAST_UPDATE, MouPeer::SOFT_DELETE, MouPeer::LAST_SYNC, MouPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('MOU_ID', 'ID_JNS_KS', 'DUDI_ID', 'SEKOLAH_ID', 'NOMOR_MOU', 'JUDUL_MOU', 'TANGGAL_MULAI', 'TANGGAL_SELESAI', 'NAMA_DUDI', 'NPWP_DUDI', 'NAMA_BIDANG_USAHA', 'TELP_KANTOR', 'FAX', 'CONTACT_PERSON', 'TELP_CP', 'JABATAN_CP', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('mou_id', 'id_jns_ks', 'dudi_id', 'sekolah_id', 'nomor_mou', 'judul_mou', 'tanggal_mulai', 'tanggal_selesai', 'nama_dudi', 'npwp_dudi', 'nama_bidang_usaha', 'telp_kantor', 'fax', 'contact_person', 'telp_cp', 'jabatan_cp', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. MouPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('MouId' => 0, 'IdJnsKs' => 1, 'DudiId' => 2, 'SekolahId' => 3, 'NomorMou' => 4, 'JudulMou' => 5, 'TanggalMulai' => 6, 'TanggalSelesai' => 7, 'NamaDudi' => 8, 'NpwpDudi' => 9, 'NamaBidangUsaha' => 10, 'TelpKantor' => 11, 'Fax' => 12, 'ContactPerson' => 13, 'TelpCp' => 14, 'JabatanCp' => 15, 'CreateDate' => 16, 'LastUpdate' => 17, 'SoftDelete' => 18, 'LastSync' => 19, 'UpdaterId' => 20, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('mouId' => 0, 'idJnsKs' => 1, 'dudiId' => 2, 'sekolahId' => 3, 'nomorMou' => 4, 'judulMou' => 5, 'tanggalMulai' => 6, 'tanggalSelesai' => 7, 'namaDudi' => 8, 'npwpDudi' => 9, 'namaBidangUsaha' => 10, 'telpKantor' => 11, 'fax' => 12, 'contactPerson' => 13, 'telpCp' => 14, 'jabatanCp' => 15, 'createDate' => 16, 'lastUpdate' => 17, 'softDelete' => 18, 'lastSync' => 19, 'updaterId' => 20, ),
        BasePeer::TYPE_COLNAME => array (MouPeer::MOU_ID => 0, MouPeer::ID_JNS_KS => 1, MouPeer::DUDI_ID => 2, MouPeer::SEKOLAH_ID => 3, MouPeer::NOMOR_MOU => 4, MouPeer::JUDUL_MOU => 5, MouPeer::TANGGAL_MULAI => 6, MouPeer::TANGGAL_SELESAI => 7, MouPeer::NAMA_DUDI => 8, MouPeer::NPWP_DUDI => 9, MouPeer::NAMA_BIDANG_USAHA => 10, MouPeer::TELP_KANTOR => 11, MouPeer::FAX => 12, MouPeer::CONTACT_PERSON => 13, MouPeer::TELP_CP => 14, MouPeer::JABATAN_CP => 15, MouPeer::CREATE_DATE => 16, MouPeer::LAST_UPDATE => 17, MouPeer::SOFT_DELETE => 18, MouPeer::LAST_SYNC => 19, MouPeer::UPDATER_ID => 20, ),
        BasePeer::TYPE_RAW_COLNAME => array ('MOU_ID' => 0, 'ID_JNS_KS' => 1, 'DUDI_ID' => 2, 'SEKOLAH_ID' => 3, 'NOMOR_MOU' => 4, 'JUDUL_MOU' => 5, 'TANGGAL_MULAI' => 6, 'TANGGAL_SELESAI' => 7, 'NAMA_DUDI' => 8, 'NPWP_DUDI' => 9, 'NAMA_BIDANG_USAHA' => 10, 'TELP_KANTOR' => 11, 'FAX' => 12, 'CONTACT_PERSON' => 13, 'TELP_CP' => 14, 'JABATAN_CP' => 15, 'CREATE_DATE' => 16, 'LAST_UPDATE' => 17, 'SOFT_DELETE' => 18, 'LAST_SYNC' => 19, 'UPDATER_ID' => 20, ),
        BasePeer::TYPE_FIELDNAME => array ('mou_id' => 0, 'id_jns_ks' => 1, 'dudi_id' => 2, 'sekolah_id' => 3, 'nomor_mou' => 4, 'judul_mou' => 5, 'tanggal_mulai' => 6, 'tanggal_selesai' => 7, 'nama_dudi' => 8, 'npwp_dudi' => 9, 'nama_bidang_usaha' => 10, 'telp_kantor' => 11, 'fax' => 12, 'contact_person' => 13, 'telp_cp' => 14, 'jabatan_cp' => 15, 'create_date' => 16, 'last_update' => 17, 'soft_delete' => 18, 'last_sync' => 19, 'updater_id' => 20, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
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
        $toNames = MouPeer::getFieldNames($toType);
        $key = isset(MouPeer::$fieldKeys[$fromType][$name]) ? MouPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(MouPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, MouPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return MouPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. MouPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(MouPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(MouPeer::MOU_ID);
            $criteria->addSelectColumn(MouPeer::ID_JNS_KS);
            $criteria->addSelectColumn(MouPeer::DUDI_ID);
            $criteria->addSelectColumn(MouPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(MouPeer::NOMOR_MOU);
            $criteria->addSelectColumn(MouPeer::JUDUL_MOU);
            $criteria->addSelectColumn(MouPeer::TANGGAL_MULAI);
            $criteria->addSelectColumn(MouPeer::TANGGAL_SELESAI);
            $criteria->addSelectColumn(MouPeer::NAMA_DUDI);
            $criteria->addSelectColumn(MouPeer::NPWP_DUDI);
            $criteria->addSelectColumn(MouPeer::NAMA_BIDANG_USAHA);
            $criteria->addSelectColumn(MouPeer::TELP_KANTOR);
            $criteria->addSelectColumn(MouPeer::FAX);
            $criteria->addSelectColumn(MouPeer::CONTACT_PERSON);
            $criteria->addSelectColumn(MouPeer::TELP_CP);
            $criteria->addSelectColumn(MouPeer::JABATAN_CP);
            $criteria->addSelectColumn(MouPeer::CREATE_DATE);
            $criteria->addSelectColumn(MouPeer::LAST_UPDATE);
            $criteria->addSelectColumn(MouPeer::SOFT_DELETE);
            $criteria->addSelectColumn(MouPeer::LAST_SYNC);
            $criteria->addSelectColumn(MouPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.mou_id');
            $criteria->addSelectColumn($alias . '.id_jns_ks');
            $criteria->addSelectColumn($alias . '.dudi_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.nomor_mou');
            $criteria->addSelectColumn($alias . '.judul_mou');
            $criteria->addSelectColumn($alias . '.tanggal_mulai');
            $criteria->addSelectColumn($alias . '.tanggal_selesai');
            $criteria->addSelectColumn($alias . '.nama_dudi');
            $criteria->addSelectColumn($alias . '.npwp_dudi');
            $criteria->addSelectColumn($alias . '.nama_bidang_usaha');
            $criteria->addSelectColumn($alias . '.telp_kantor');
            $criteria->addSelectColumn($alias . '.fax');
            $criteria->addSelectColumn($alias . '.contact_person');
            $criteria->addSelectColumn($alias . '.telp_cp');
            $criteria->addSelectColumn($alias . '.jabatan_cp');
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
        $criteria->setPrimaryTableName(MouPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MouPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(MouPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Mou
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = MouPeer::doSelect($critcopy, $con);
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
        return MouPeer::populateObjects(MouPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            MouPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(MouPeer::DATABASE_NAME);

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
     * @param      Mou $obj A Mou object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getMouId();
            } // if key === null
            MouPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Mou object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Mou) {
                $key = (string) $value->getMouId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Mou object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(MouPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Mou Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(MouPeer::$instances[$key])) {
                return MouPeer::$instances[$key];
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
        foreach (MouPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        MouPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to mou
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
        $cls = MouPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = MouPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = MouPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MouPeer::addInstanceToPool($obj, $key);
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
     * @return array (Mou object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = MouPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = MouPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + MouPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MouPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            MouPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisKs table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisKs(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MouPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MouPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MouPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MouPeer::ID_JNS_KS, JenisKsPeer::ID_JNS_KS, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Dudi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinDudi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MouPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MouPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MouPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MouPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(MouPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MouPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MouPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MouPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of Mou objects pre-filled with their JenisKs objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Mou objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisKs(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MouPeer::DATABASE_NAME);
        }

        MouPeer::addSelectColumns($criteria);
        $startcol = MouPeer::NUM_HYDRATE_COLUMNS;
        JenisKsPeer::addSelectColumns($criteria);

        $criteria->addJoin(MouPeer::ID_JNS_KS, JenisKsPeer::ID_JNS_KS, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MouPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MouPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MouPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MouPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisKsPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisKsPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisKsPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisKsPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Mou) to $obj2 (JenisKs)
                $obj2->addMou($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Mou objects pre-filled with their Dudi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Mou objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinDudi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MouPeer::DATABASE_NAME);
        }

        MouPeer::addSelectColumns($criteria);
        $startcol = MouPeer::NUM_HYDRATE_COLUMNS;
        DudiPeer::addSelectColumns($criteria);

        $criteria->addJoin(MouPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MouPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MouPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MouPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MouPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = DudiPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = DudiPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = DudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    DudiPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Mou) to $obj2 (Dudi)
                $obj2->addMou($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Mou objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Mou objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MouPeer::DATABASE_NAME);
        }

        MouPeer::addSelectColumns($criteria);
        $startcol = MouPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(MouPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MouPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MouPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = MouPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MouPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Mou) to $obj2 (Sekolah)
                $obj2->addMou($obj1);

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
        $criteria->setPrimaryTableName(MouPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MouPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(MouPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(MouPeer::ID_JNS_KS, JenisKsPeer::ID_JNS_KS, $join_behavior);

        $criteria->addJoin(MouPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(MouPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of Mou objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Mou objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MouPeer::DATABASE_NAME);
        }

        MouPeer::addSelectColumns($criteria);
        $startcol2 = MouPeer::NUM_HYDRATE_COLUMNS;

        JenisKsPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisKsPeer::NUM_HYDRATE_COLUMNS;

        DudiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + DudiPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MouPeer::ID_JNS_KS, JenisKsPeer::ID_JNS_KS, $join_behavior);

        $criteria->addJoin(MouPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(MouPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MouPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MouPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MouPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MouPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined JenisKs rows

            $key2 = JenisKsPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = JenisKsPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisKsPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisKsPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Mou) to the collection in $obj2 (JenisKs)
                $obj2->addMou($obj1);
            } // if joined row not null

            // Add objects for joined Dudi rows

            $key3 = DudiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = DudiPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = DudiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    DudiPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Mou) to the collection in $obj3 (Dudi)
                $obj3->addMou($obj1);
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

                // Add the $obj1 (Mou) to the collection in $obj4 (Sekolah)
                $obj4->addMou($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisKs table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisKs(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MouPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MouPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MouPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(MouPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(MouPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Dudi table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptDudi(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(MouPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MouPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MouPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(MouPeer::ID_JNS_KS, JenisKsPeer::ID_JNS_KS, $join_behavior);

        $criteria->addJoin(MouPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(MouPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            MouPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(MouPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(MouPeer::ID_JNS_KS, JenisKsPeer::ID_JNS_KS, $join_behavior);

        $criteria->addJoin(MouPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

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
     * Selects a collection of Mou objects pre-filled with all related objects except JenisKs.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Mou objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisKs(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MouPeer::DATABASE_NAME);
        }

        MouPeer::addSelectColumns($criteria);
        $startcol2 = MouPeer::NUM_HYDRATE_COLUMNS;

        DudiPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + DudiPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MouPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(MouPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MouPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MouPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MouPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MouPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Dudi rows

                $key2 = DudiPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = DudiPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = DudiPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    DudiPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Mou) to the collection in $obj2 (Dudi)
                $obj2->addMou($obj1);

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

                // Add the $obj1 (Mou) to the collection in $obj3 (Sekolah)
                $obj3->addMou($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Mou objects pre-filled with all related objects except Dudi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Mou objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptDudi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(MouPeer::DATABASE_NAME);
        }

        MouPeer::addSelectColumns($criteria);
        $startcol2 = MouPeer::NUM_HYDRATE_COLUMNS;

        JenisKsPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisKsPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MouPeer::ID_JNS_KS, JenisKsPeer::ID_JNS_KS, $join_behavior);

        $criteria->addJoin(MouPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MouPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MouPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MouPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MouPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisKs rows

                $key2 = JenisKsPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisKsPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisKsPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisKsPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Mou) to the collection in $obj2 (JenisKs)
                $obj2->addMou($obj1);

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

                // Add the $obj1 (Mou) to the collection in $obj3 (Sekolah)
                $obj3->addMou($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Mou objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Mou objects.
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
            $criteria->setDbName(MouPeer::DATABASE_NAME);
        }

        MouPeer::addSelectColumns($criteria);
        $startcol2 = MouPeer::NUM_HYDRATE_COLUMNS;

        JenisKsPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisKsPeer::NUM_HYDRATE_COLUMNS;

        DudiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + DudiPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(MouPeer::ID_JNS_KS, JenisKsPeer::ID_JNS_KS, $join_behavior);

        $criteria->addJoin(MouPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = MouPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = MouPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = MouPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                MouPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisKs rows

                $key2 = JenisKsPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisKsPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisKsPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisKsPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Mou) to the collection in $obj2 (JenisKs)
                $obj2->addMou($obj1);

            } // if joined row is not null

                // Add objects for joined Dudi rows

                $key3 = DudiPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = DudiPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = DudiPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    DudiPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Mou) to the collection in $obj3 (Dudi)
                $obj3->addMou($obj1);

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
        return Propel::getDatabaseMap(MouPeer::DATABASE_NAME)->getTable(MouPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseMouPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseMouPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new MouTableMap());
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
        return MouPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Mou or Criteria object.
     *
     * @param      mixed $values Criteria or Mou object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Mou object
        }


        // Set the correct dbName
        $criteria->setDbName(MouPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Mou or Criteria object.
     *
     * @param      mixed $values Criteria or Mou object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(MouPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(MouPeer::MOU_ID);
            $value = $criteria->remove(MouPeer::MOU_ID);
            if ($value) {
                $selectCriteria->add(MouPeer::MOU_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(MouPeer::TABLE_NAME);
            }

        } else { // $values is Mou object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(MouPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the mou table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(MouPeer::TABLE_NAME, $con, MouPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MouPeer::clearInstancePool();
            MouPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Mou or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Mou object or primary key or array of primary keys
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
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            MouPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Mou) { // it's a model object
            // invalidate the cache for this single object
            MouPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MouPeer::DATABASE_NAME);
            $criteria->add(MouPeer::MOU_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                MouPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(MouPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            MouPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Mou object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Mou $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(MouPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(MouPeer::TABLE_NAME);

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

        return BasePeer::doValidate(MouPeer::DATABASE_NAME, MouPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Mou
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = MouPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(MouPeer::DATABASE_NAME);
        $criteria->add(MouPeer::MOU_ID, $pk);

        $v = MouPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Mou[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(MouPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(MouPeer::DATABASE_NAME);
            $criteria->add(MouPeer::MOU_ID, $pks, Criteria::IN);
            $objs = MouPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseMouPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseMouPeer::buildTableMap();

