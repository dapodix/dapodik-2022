<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\Alat;
use DataDikdas\Model\AlatPeer;
use DataDikdas\Model\JenisHapusBukuPeer;
use DataDikdas\Model\JenisSaranaPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\RuangPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\StatusKepemilikanSarprasPeer;
use DataDikdas\Model\map\AlatTableMap;

/**
 * Base static class for performing query and update operations on the 'alat' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseAlatPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'alat';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Alat';

    /** the related TableMap class for this table */
    const TM_CLASS = 'AlatTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 24;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 24;

    /** the column name for the id_alat field */
    const ID_ALAT = 'alat.id_alat';

    /** the column name for the jenis_sarana_id field */
    const JENIS_SARANA_ID = 'alat.jenis_sarana_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'alat.sekolah_id';

    /** the column name for the ptk_id field */
    const PTK_ID = 'alat.ptk_id';

    /** the column name for the id_ruang field */
    const ID_RUANG = 'alat.id_ruang';

    /** the column name for the id_hapus_buku field */
    const ID_HAPUS_BUKU = 'alat.id_hapus_buku';

    /** the column name for the kepemilikan_sarpras_id field */
    const KEPEMILIKAN_SARPRAS_ID = 'alat.kepemilikan_sarpras_id';

    /** the column name for the kd_kl field */
    const KD_KL = 'alat.kd_kl';

    /** the column name for the kd_satker field */
    const KD_SATKER = 'alat.kd_satker';

    /** the column name for the kd_brg field */
    const KD_BRG = 'alat.kd_brg';

    /** the column name for the nup field */
    const NUP = 'alat.nup';

    /** the column name for the kode_eselon1 field */
    const KODE_ESELON1 = 'alat.kode_eselon1';

    /** the column name for the nama_eselon1 field */
    const NAMA_ESELON1 = 'alat.nama_eselon1';

    /** the column name for the kode_sub_satker field */
    const KODE_SUB_SATKER = 'alat.kode_sub_satker';

    /** the column name for the nama_sub_satker field */
    const NAMA_SUB_SATKER = 'alat.nama_sub_satker';

    /** the column name for the nama field */
    const NAMA = 'alat.nama';

    /** the column name for the spesifikasi field */
    const SPESIFIKASI = 'alat.spesifikasi';

    /** the column name for the tgl_hapus_buku field */
    const TGL_HAPUS_BUKU = 'alat.tgl_hapus_buku';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'alat.asal_data';

    /** the column name for the create_date field */
    const CREATE_DATE = 'alat.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'alat.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'alat.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'alat.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'alat.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Alat objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Alat[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. AlatPeer::$fieldNames[AlatPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdAlat', 'JenisSaranaId', 'SekolahId', 'PtkId', 'IdRuang', 'IdHapusBuku', 'KepemilikanSarprasId', 'KdKl', 'KdSatker', 'KdBrg', 'Nup', 'KodeEselon1', 'NamaEselon1', 'KodeSubSatker', 'NamaSubSatker', 'Nama', 'Spesifikasi', 'TglHapusBuku', 'AsalData', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idAlat', 'jenisSaranaId', 'sekolahId', 'ptkId', 'idRuang', 'idHapusBuku', 'kepemilikanSarprasId', 'kdKl', 'kdSatker', 'kdBrg', 'nup', 'kodeEselon1', 'namaEselon1', 'kodeSubSatker', 'namaSubSatker', 'nama', 'spesifikasi', 'tglHapusBuku', 'asalData', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (AlatPeer::ID_ALAT, AlatPeer::JENIS_SARANA_ID, AlatPeer::SEKOLAH_ID, AlatPeer::PTK_ID, AlatPeer::ID_RUANG, AlatPeer::ID_HAPUS_BUKU, AlatPeer::KEPEMILIKAN_SARPRAS_ID, AlatPeer::KD_KL, AlatPeer::KD_SATKER, AlatPeer::KD_BRG, AlatPeer::NUP, AlatPeer::KODE_ESELON1, AlatPeer::NAMA_ESELON1, AlatPeer::KODE_SUB_SATKER, AlatPeer::NAMA_SUB_SATKER, AlatPeer::NAMA, AlatPeer::SPESIFIKASI, AlatPeer::TGL_HAPUS_BUKU, AlatPeer::ASAL_DATA, AlatPeer::CREATE_DATE, AlatPeer::LAST_UPDATE, AlatPeer::SOFT_DELETE, AlatPeer::LAST_SYNC, AlatPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ALAT', 'JENIS_SARANA_ID', 'SEKOLAH_ID', 'PTK_ID', 'ID_RUANG', 'ID_HAPUS_BUKU', 'KEPEMILIKAN_SARPRAS_ID', 'KD_KL', 'KD_SATKER', 'KD_BRG', 'NUP', 'KODE_ESELON1', 'NAMA_ESELON1', 'KODE_SUB_SATKER', 'NAMA_SUB_SATKER', 'NAMA', 'SPESIFIKASI', 'TGL_HAPUS_BUKU', 'ASAL_DATA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_alat', 'jenis_sarana_id', 'sekolah_id', 'ptk_id', 'id_ruang', 'id_hapus_buku', 'kepemilikan_sarpras_id', 'kd_kl', 'kd_satker', 'kd_brg', 'nup', 'kode_eselon1', 'nama_eselon1', 'kode_sub_satker', 'nama_sub_satker', 'nama', 'spesifikasi', 'tgl_hapus_buku', 'asal_data', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. AlatPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdAlat' => 0, 'JenisSaranaId' => 1, 'SekolahId' => 2, 'PtkId' => 3, 'IdRuang' => 4, 'IdHapusBuku' => 5, 'KepemilikanSarprasId' => 6, 'KdKl' => 7, 'KdSatker' => 8, 'KdBrg' => 9, 'Nup' => 10, 'KodeEselon1' => 11, 'NamaEselon1' => 12, 'KodeSubSatker' => 13, 'NamaSubSatker' => 14, 'Nama' => 15, 'Spesifikasi' => 16, 'TglHapusBuku' => 17, 'AsalData' => 18, 'CreateDate' => 19, 'LastUpdate' => 20, 'SoftDelete' => 21, 'LastSync' => 22, 'UpdaterId' => 23, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idAlat' => 0, 'jenisSaranaId' => 1, 'sekolahId' => 2, 'ptkId' => 3, 'idRuang' => 4, 'idHapusBuku' => 5, 'kepemilikanSarprasId' => 6, 'kdKl' => 7, 'kdSatker' => 8, 'kdBrg' => 9, 'nup' => 10, 'kodeEselon1' => 11, 'namaEselon1' => 12, 'kodeSubSatker' => 13, 'namaSubSatker' => 14, 'nama' => 15, 'spesifikasi' => 16, 'tglHapusBuku' => 17, 'asalData' => 18, 'createDate' => 19, 'lastUpdate' => 20, 'softDelete' => 21, 'lastSync' => 22, 'updaterId' => 23, ),
        BasePeer::TYPE_COLNAME => array (AlatPeer::ID_ALAT => 0, AlatPeer::JENIS_SARANA_ID => 1, AlatPeer::SEKOLAH_ID => 2, AlatPeer::PTK_ID => 3, AlatPeer::ID_RUANG => 4, AlatPeer::ID_HAPUS_BUKU => 5, AlatPeer::KEPEMILIKAN_SARPRAS_ID => 6, AlatPeer::KD_KL => 7, AlatPeer::KD_SATKER => 8, AlatPeer::KD_BRG => 9, AlatPeer::NUP => 10, AlatPeer::KODE_ESELON1 => 11, AlatPeer::NAMA_ESELON1 => 12, AlatPeer::KODE_SUB_SATKER => 13, AlatPeer::NAMA_SUB_SATKER => 14, AlatPeer::NAMA => 15, AlatPeer::SPESIFIKASI => 16, AlatPeer::TGL_HAPUS_BUKU => 17, AlatPeer::ASAL_DATA => 18, AlatPeer::CREATE_DATE => 19, AlatPeer::LAST_UPDATE => 20, AlatPeer::SOFT_DELETE => 21, AlatPeer::LAST_SYNC => 22, AlatPeer::UPDATER_ID => 23, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ALAT' => 0, 'JENIS_SARANA_ID' => 1, 'SEKOLAH_ID' => 2, 'PTK_ID' => 3, 'ID_RUANG' => 4, 'ID_HAPUS_BUKU' => 5, 'KEPEMILIKAN_SARPRAS_ID' => 6, 'KD_KL' => 7, 'KD_SATKER' => 8, 'KD_BRG' => 9, 'NUP' => 10, 'KODE_ESELON1' => 11, 'NAMA_ESELON1' => 12, 'KODE_SUB_SATKER' => 13, 'NAMA_SUB_SATKER' => 14, 'NAMA' => 15, 'SPESIFIKASI' => 16, 'TGL_HAPUS_BUKU' => 17, 'ASAL_DATA' => 18, 'CREATE_DATE' => 19, 'LAST_UPDATE' => 20, 'SOFT_DELETE' => 21, 'LAST_SYNC' => 22, 'UPDATER_ID' => 23, ),
        BasePeer::TYPE_FIELDNAME => array ('id_alat' => 0, 'jenis_sarana_id' => 1, 'sekolah_id' => 2, 'ptk_id' => 3, 'id_ruang' => 4, 'id_hapus_buku' => 5, 'kepemilikan_sarpras_id' => 6, 'kd_kl' => 7, 'kd_satker' => 8, 'kd_brg' => 9, 'nup' => 10, 'kode_eselon1' => 11, 'nama_eselon1' => 12, 'kode_sub_satker' => 13, 'nama_sub_satker' => 14, 'nama' => 15, 'spesifikasi' => 16, 'tgl_hapus_buku' => 17, 'asal_data' => 18, 'create_date' => 19, 'last_update' => 20, 'soft_delete' => 21, 'last_sync' => 22, 'updater_id' => 23, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
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
        $toNames = AlatPeer::getFieldNames($toType);
        $key = isset(AlatPeer::$fieldKeys[$fromType][$name]) ? AlatPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(AlatPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, AlatPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return AlatPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. AlatPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(AlatPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(AlatPeer::ID_ALAT);
            $criteria->addSelectColumn(AlatPeer::JENIS_SARANA_ID);
            $criteria->addSelectColumn(AlatPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(AlatPeer::PTK_ID);
            $criteria->addSelectColumn(AlatPeer::ID_RUANG);
            $criteria->addSelectColumn(AlatPeer::ID_HAPUS_BUKU);
            $criteria->addSelectColumn(AlatPeer::KEPEMILIKAN_SARPRAS_ID);
            $criteria->addSelectColumn(AlatPeer::KD_KL);
            $criteria->addSelectColumn(AlatPeer::KD_SATKER);
            $criteria->addSelectColumn(AlatPeer::KD_BRG);
            $criteria->addSelectColumn(AlatPeer::NUP);
            $criteria->addSelectColumn(AlatPeer::KODE_ESELON1);
            $criteria->addSelectColumn(AlatPeer::NAMA_ESELON1);
            $criteria->addSelectColumn(AlatPeer::KODE_SUB_SATKER);
            $criteria->addSelectColumn(AlatPeer::NAMA_SUB_SATKER);
            $criteria->addSelectColumn(AlatPeer::NAMA);
            $criteria->addSelectColumn(AlatPeer::SPESIFIKASI);
            $criteria->addSelectColumn(AlatPeer::TGL_HAPUS_BUKU);
            $criteria->addSelectColumn(AlatPeer::ASAL_DATA);
            $criteria->addSelectColumn(AlatPeer::CREATE_DATE);
            $criteria->addSelectColumn(AlatPeer::LAST_UPDATE);
            $criteria->addSelectColumn(AlatPeer::SOFT_DELETE);
            $criteria->addSelectColumn(AlatPeer::LAST_SYNC);
            $criteria->addSelectColumn(AlatPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_alat');
            $criteria->addSelectColumn($alias . '.jenis_sarana_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.id_ruang');
            $criteria->addSelectColumn($alias . '.id_hapus_buku');
            $criteria->addSelectColumn($alias . '.kepemilikan_sarpras_id');
            $criteria->addSelectColumn($alias . '.kd_kl');
            $criteria->addSelectColumn($alias . '.kd_satker');
            $criteria->addSelectColumn($alias . '.kd_brg');
            $criteria->addSelectColumn($alias . '.nup');
            $criteria->addSelectColumn($alias . '.kode_eselon1');
            $criteria->addSelectColumn($alias . '.nama_eselon1');
            $criteria->addSelectColumn($alias . '.kode_sub_satker');
            $criteria->addSelectColumn($alias . '.nama_sub_satker');
            $criteria->addSelectColumn($alias . '.nama');
            $criteria->addSelectColumn($alias . '.spesifikasi');
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
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(AlatPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Alat
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = AlatPeer::doSelect($critcopy, $con);
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
        return AlatPeer::populateObjects(AlatPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            AlatPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

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
     * @param      Alat $obj A Alat object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdAlat();
            } // if key === null
            AlatPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Alat object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Alat) {
                $key = (string) $value->getIdAlat();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Alat object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(AlatPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Alat Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(AlatPeer::$instances[$key])) {
                return AlatPeer::$instances[$key];
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
        foreach (AlatPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        AlatPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to alat
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
        $cls = AlatPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = AlatPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AlatPeer::addInstanceToPool($obj, $key);
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
     * @return array (Alat object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = AlatPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = AlatPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + AlatPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AlatPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            AlatPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisSarana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisSarana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related StatusKepemilikanSarpras table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinStatusKepemilikanSarpras(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of Alat objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol = AlatPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Alat) to $obj2 (Ptk)
                $obj2->addAlat($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Alat objects pre-filled with their Ruang objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRuang(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol = AlatPeer::NUM_HYDRATE_COLUMNS;
        RuangPeer::addSelectColumns($criteria);

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Alat) to $obj2 (Ruang)
                $obj2->addAlat($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Alat objects pre-filled with their JenisHapusBuku objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisHapusBuku(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol = AlatPeer::NUM_HYDRATE_COLUMNS;
        JenisHapusBukuPeer::addSelectColumns($criteria);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Alat) to $obj2 (JenisHapusBuku)
                $obj2->addAlat($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Alat objects pre-filled with their JenisSarana objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisSarana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol = AlatPeer::NUM_HYDRATE_COLUMNS;
        JenisSaranaPeer::addSelectColumns($criteria);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisSaranaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisSaranaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisSaranaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Alat) to $obj2 (JenisSarana)
                $obj2->addAlat($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Alat objects pre-filled with their StatusKepemilikanSarpras objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinStatusKepemilikanSarpras(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol = AlatPeer::NUM_HYDRATE_COLUMNS;
        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Alat) to $obj2 (StatusKepemilikanSarpras)
                $obj2->addAlat($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Alat objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol = AlatPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Alat) to $obj2 (Sekolah)
                $obj2->addAlat($obj1);

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
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of Alat objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol2 = AlatPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RuangPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Alat) to the collection in $obj2 (Ptk)
                $obj2->addAlat($obj1);
            } // if joined row not null

            // Add objects for joined Ruang rows

            $key3 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = RuangPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = RuangPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RuangPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Alat) to the collection in $obj3 (Ruang)
                $obj3->addAlat($obj1);
            } // if joined row not null

            // Add objects for joined JenisHapusBuku rows

            $key4 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = JenisHapusBukuPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = JenisHapusBukuPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisHapusBukuPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Alat) to the collection in $obj4 (JenisHapusBuku)
                $obj4->addAlat($obj1);
            } // if joined row not null

            // Add objects for joined JenisSarana rows

            $key5 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = JenisSaranaPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = JenisSaranaPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisSaranaPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Alat) to the collection in $obj5 (JenisSarana)
                $obj5->addAlat($obj1);
            } // if joined row not null

            // Add objects for joined StatusKepemilikanSarpras rows

            $key6 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Alat) to the collection in $obj6 (StatusKepemilikanSarpras)
                $obj6->addAlat($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key7 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = SekolahPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = SekolahPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    SekolahPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (Alat) to the collection in $obj7 (Sekolah)
                $obj7->addAlat($obj1);
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
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisSarana table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisSarana(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related StatusKepemilikanSarpras table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptStatusKepemilikanSarpras(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AlatPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AlatPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

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
     * Selects a collection of Alat objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
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
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol2 = AlatPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Ruang rows

                $key2 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = RuangPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    RuangPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Alat) to the collection in $obj2 (Ruang)
                $obj2->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key3 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisHapusBukuPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisHapusBukuPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Alat) to the collection in $obj3 (JenisHapusBuku)
                $obj3->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined JenisSarana rows

                $key4 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisSaranaPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisSaranaPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisSaranaPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Alat) to the collection in $obj4 (JenisSarana)
                $obj4->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key5 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Alat) to the collection in $obj5 (StatusKepemilikanSarpras)
                $obj5->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key6 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SekolahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SekolahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Alat) to the collection in $obj6 (Sekolah)
                $obj6->addAlat($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Alat objects pre-filled with all related objects except Ruang.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
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
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol2 = AlatPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Alat) to the collection in $obj2 (Ptk)
                $obj2->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key3 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = JenisHapusBukuPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisHapusBukuPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Alat) to the collection in $obj3 (JenisHapusBuku)
                $obj3->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined JenisSarana rows

                $key4 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisSaranaPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisSaranaPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisSaranaPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Alat) to the collection in $obj4 (JenisSarana)
                $obj4->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key5 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Alat) to the collection in $obj5 (StatusKepemilikanSarpras)
                $obj5->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key6 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SekolahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SekolahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Alat) to the collection in $obj6 (Sekolah)
                $obj6->addAlat($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Alat objects pre-filled with all related objects except JenisHapusBuku.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
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
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol2 = AlatPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RuangPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Alat) to the collection in $obj2 (Ptk)
                $obj2->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key3 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RuangPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RuangPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Alat) to the collection in $obj3 (Ruang)
                $obj3->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined JenisSarana rows

                $key4 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisSaranaPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisSaranaPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisSaranaPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Alat) to the collection in $obj4 (JenisSarana)
                $obj4->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key5 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Alat) to the collection in $obj5 (StatusKepemilikanSarpras)
                $obj5->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key6 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SekolahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SekolahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Alat) to the collection in $obj6 (Sekolah)
                $obj6->addAlat($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Alat objects pre-filled with all related objects except JenisSarana.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisSarana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol2 = AlatPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RuangPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Alat) to the collection in $obj2 (Ptk)
                $obj2->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key3 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RuangPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RuangPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Alat) to the collection in $obj3 (Ruang)
                $obj3->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key4 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisHapusBukuPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisHapusBukuPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Alat) to the collection in $obj4 (JenisHapusBuku)
                $obj4->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key5 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Alat) to the collection in $obj5 (StatusKepemilikanSarpras)
                $obj5->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key6 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SekolahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SekolahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Alat) to the collection in $obj6 (Sekolah)
                $obj6->addAlat($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Alat objects pre-filled with all related objects except StatusKepemilikanSarpras.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptStatusKepemilikanSarpras(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol2 = AlatPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RuangPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Alat) to the collection in $obj2 (Ptk)
                $obj2->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key3 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RuangPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RuangPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Alat) to the collection in $obj3 (Ruang)
                $obj3->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key4 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisHapusBukuPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisHapusBukuPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Alat) to the collection in $obj4 (JenisHapusBuku)
                $obj4->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined JenisSarana rows

                $key5 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisSaranaPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisSaranaPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisSaranaPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Alat) to the collection in $obj5 (JenisSarana)
                $obj5->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key6 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = SekolahPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    SekolahPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Alat) to the collection in $obj6 (Sekolah)
                $obj6->addAlat($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Alat objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Alat objects.
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
            $criteria->setDbName(AlatPeer::DATABASE_NAME);
        }

        AlatPeer::addSelectColumns($criteria);
        $startcol2 = AlatPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + RuangPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AlatPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(AlatPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AlatPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $criteria->addJoin(AlatPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AlatPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AlatPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AlatPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AlatPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Alat) to the collection in $obj2 (Ptk)
                $obj2->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined Ruang rows

                $key3 = RuangPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = RuangPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = RuangPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    RuangPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Alat) to the collection in $obj3 (Ruang)
                $obj3->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHapusBuku rows

                $key4 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisHapusBukuPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisHapusBukuPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Alat) to the collection in $obj4 (JenisHapusBuku)
                $obj4->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined JenisSarana rows

                $key5 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisSaranaPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisSaranaPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisSaranaPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Alat) to the collection in $obj5 (JenisSarana)
                $obj5->addAlat($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key6 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Alat) to the collection in $obj6 (StatusKepemilikanSarpras)
                $obj6->addAlat($obj1);

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
        return Propel::getDatabaseMap(AlatPeer::DATABASE_NAME)->getTable(AlatPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseAlatPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseAlatPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new AlatTableMap());
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
        return AlatPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Alat or Criteria object.
     *
     * @param      mixed $values Criteria or Alat object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Alat object
        }


        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Alat or Criteria object.
     *
     * @param      mixed $values Criteria or Alat object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(AlatPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(AlatPeer::ID_ALAT);
            $value = $criteria->remove(AlatPeer::ID_ALAT);
            if ($value) {
                $selectCriteria->add(AlatPeer::ID_ALAT, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(AlatPeer::TABLE_NAME);
            }

        } else { // $values is Alat object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the alat table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(AlatPeer::TABLE_NAME, $con, AlatPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AlatPeer::clearInstancePool();
            AlatPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Alat or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Alat object or primary key or array of primary keys
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
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            AlatPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Alat) { // it's a model object
            // invalidate the cache for this single object
            AlatPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AlatPeer::DATABASE_NAME);
            $criteria->add(AlatPeer::ID_ALAT, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                AlatPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(AlatPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            AlatPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Alat object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Alat $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(AlatPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(AlatPeer::TABLE_NAME);

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

        return BasePeer::doValidate(AlatPeer::DATABASE_NAME, AlatPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Alat
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = AlatPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(AlatPeer::DATABASE_NAME);
        $criteria->add(AlatPeer::ID_ALAT, $pk);

        $v = AlatPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Alat[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(AlatPeer::DATABASE_NAME);
            $criteria->add(AlatPeer::ID_ALAT, $pks, Criteria::IN);
            $objs = AlatPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseAlatPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseAlatPeer::buildTableMap();

