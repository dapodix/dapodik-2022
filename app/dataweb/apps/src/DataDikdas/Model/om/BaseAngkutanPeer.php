<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\Angkutan;
use DataDikdas\Model\AngkutanPeer;
use DataDikdas\Model\JenisHapusBukuPeer;
use DataDikdas\Model\JenisSaranaPeer;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\StatusKepemilikanSarprasPeer;
use DataDikdas\Model\map\AngkutanTableMap;

/**
 * Base static class for performing query and update operations on the 'angkutan' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseAngkutanPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'angkutan';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Angkutan';

    /** the related TableMap class for this table */
    const TM_CLASS = 'AngkutanTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 27;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 27;

    /** the column name for the id_angkutan field */
    const ID_ANGKUTAN = 'angkutan.id_angkutan';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'angkutan.sekolah_id';

    /** the column name for the ptk_id field */
    const PTK_ID = 'angkutan.ptk_id';

    /** the column name for the jenis_sarana_id field */
    const JENIS_SARANA_ID = 'angkutan.jenis_sarana_id';

    /** the column name for the id_hapus_buku field */
    const ID_HAPUS_BUKU = 'angkutan.id_hapus_buku';

    /** the column name for the kepemilikan_sarpras_id field */
    const KEPEMILIKAN_SARPRAS_ID = 'angkutan.kepemilikan_sarpras_id';

    /** the column name for the kd_kl field */
    const KD_KL = 'angkutan.kd_kl';

    /** the column name for the kd_satker field */
    const KD_SATKER = 'angkutan.kd_satker';

    /** the column name for the kd_brg field */
    const KD_BRG = 'angkutan.kd_brg';

    /** the column name for the nup field */
    const NUP = 'angkutan.nup';

    /** the column name for the kode_eselon1 field */
    const KODE_ESELON1 = 'angkutan.kode_eselon1';

    /** the column name for the nama_eselon1 field */
    const NAMA_ESELON1 = 'angkutan.nama_eselon1';

    /** the column name for the kode_sub_satker field */
    const KODE_SUB_SATKER = 'angkutan.kode_sub_satker';

    /** the column name for the nama_sub_satker field */
    const NAMA_SUB_SATKER = 'angkutan.nama_sub_satker';

    /** the column name for the nama field */
    const NAMA = 'angkutan.nama';

    /** the column name for the spesifikasi field */
    const SPESIFIKASI = 'angkutan.spesifikasi';

    /** the column name for the tgl_hapus_buku field */
    const TGL_HAPUS_BUKU = 'angkutan.tgl_hapus_buku';

    /** the column name for the merk field */
    const MERK = 'angkutan.merk';

    /** the column name for the no_polisi field */
    const NO_POLISI = 'angkutan.no_polisi';

    /** the column name for the no_bpkb field */
    const NO_BPKB = 'angkutan.no_bpkb';

    /** the column name for the alamat field */
    const ALAMAT = 'angkutan.alamat';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'angkutan.asal_data';

    /** the column name for the create_date field */
    const CREATE_DATE = 'angkutan.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'angkutan.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'angkutan.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'angkutan.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'angkutan.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Angkutan objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Angkutan[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. AngkutanPeer::$fieldNames[AngkutanPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdAngkutan', 'SekolahId', 'PtkId', 'JenisSaranaId', 'IdHapusBuku', 'KepemilikanSarprasId', 'KdKl', 'KdSatker', 'KdBrg', 'Nup', 'KodeEselon1', 'NamaEselon1', 'KodeSubSatker', 'NamaSubSatker', 'Nama', 'Spesifikasi', 'TglHapusBuku', 'Merk', 'NoPolisi', 'NoBpkb', 'Alamat', 'AsalData', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idAngkutan', 'sekolahId', 'ptkId', 'jenisSaranaId', 'idHapusBuku', 'kepemilikanSarprasId', 'kdKl', 'kdSatker', 'kdBrg', 'nup', 'kodeEselon1', 'namaEselon1', 'kodeSubSatker', 'namaSubSatker', 'nama', 'spesifikasi', 'tglHapusBuku', 'merk', 'noPolisi', 'noBpkb', 'alamat', 'asalData', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (AngkutanPeer::ID_ANGKUTAN, AngkutanPeer::SEKOLAH_ID, AngkutanPeer::PTK_ID, AngkutanPeer::JENIS_SARANA_ID, AngkutanPeer::ID_HAPUS_BUKU, AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, AngkutanPeer::KD_KL, AngkutanPeer::KD_SATKER, AngkutanPeer::KD_BRG, AngkutanPeer::NUP, AngkutanPeer::KODE_ESELON1, AngkutanPeer::NAMA_ESELON1, AngkutanPeer::KODE_SUB_SATKER, AngkutanPeer::NAMA_SUB_SATKER, AngkutanPeer::NAMA, AngkutanPeer::SPESIFIKASI, AngkutanPeer::TGL_HAPUS_BUKU, AngkutanPeer::MERK, AngkutanPeer::NO_POLISI, AngkutanPeer::NO_BPKB, AngkutanPeer::ALAMAT, AngkutanPeer::ASAL_DATA, AngkutanPeer::CREATE_DATE, AngkutanPeer::LAST_UPDATE, AngkutanPeer::SOFT_DELETE, AngkutanPeer::LAST_SYNC, AngkutanPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ANGKUTAN', 'SEKOLAH_ID', 'PTK_ID', 'JENIS_SARANA_ID', 'ID_HAPUS_BUKU', 'KEPEMILIKAN_SARPRAS_ID', 'KD_KL', 'KD_SATKER', 'KD_BRG', 'NUP', 'KODE_ESELON1', 'NAMA_ESELON1', 'KODE_SUB_SATKER', 'NAMA_SUB_SATKER', 'NAMA', 'SPESIFIKASI', 'TGL_HAPUS_BUKU', 'MERK', 'NO_POLISI', 'NO_BPKB', 'ALAMAT', 'ASAL_DATA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_angkutan', 'sekolah_id', 'ptk_id', 'jenis_sarana_id', 'id_hapus_buku', 'kepemilikan_sarpras_id', 'kd_kl', 'kd_satker', 'kd_brg', 'nup', 'kode_eselon1', 'nama_eselon1', 'kode_sub_satker', 'nama_sub_satker', 'nama', 'spesifikasi', 'tgl_hapus_buku', 'merk', 'no_polisi', 'no_bpkb', 'alamat', 'asal_data', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. AngkutanPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdAngkutan' => 0, 'SekolahId' => 1, 'PtkId' => 2, 'JenisSaranaId' => 3, 'IdHapusBuku' => 4, 'KepemilikanSarprasId' => 5, 'KdKl' => 6, 'KdSatker' => 7, 'KdBrg' => 8, 'Nup' => 9, 'KodeEselon1' => 10, 'NamaEselon1' => 11, 'KodeSubSatker' => 12, 'NamaSubSatker' => 13, 'Nama' => 14, 'Spesifikasi' => 15, 'TglHapusBuku' => 16, 'Merk' => 17, 'NoPolisi' => 18, 'NoBpkb' => 19, 'Alamat' => 20, 'AsalData' => 21, 'CreateDate' => 22, 'LastUpdate' => 23, 'SoftDelete' => 24, 'LastSync' => 25, 'UpdaterId' => 26, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idAngkutan' => 0, 'sekolahId' => 1, 'ptkId' => 2, 'jenisSaranaId' => 3, 'idHapusBuku' => 4, 'kepemilikanSarprasId' => 5, 'kdKl' => 6, 'kdSatker' => 7, 'kdBrg' => 8, 'nup' => 9, 'kodeEselon1' => 10, 'namaEselon1' => 11, 'kodeSubSatker' => 12, 'namaSubSatker' => 13, 'nama' => 14, 'spesifikasi' => 15, 'tglHapusBuku' => 16, 'merk' => 17, 'noPolisi' => 18, 'noBpkb' => 19, 'alamat' => 20, 'asalData' => 21, 'createDate' => 22, 'lastUpdate' => 23, 'softDelete' => 24, 'lastSync' => 25, 'updaterId' => 26, ),
        BasePeer::TYPE_COLNAME => array (AngkutanPeer::ID_ANGKUTAN => 0, AngkutanPeer::SEKOLAH_ID => 1, AngkutanPeer::PTK_ID => 2, AngkutanPeer::JENIS_SARANA_ID => 3, AngkutanPeer::ID_HAPUS_BUKU => 4, AngkutanPeer::KEPEMILIKAN_SARPRAS_ID => 5, AngkutanPeer::KD_KL => 6, AngkutanPeer::KD_SATKER => 7, AngkutanPeer::KD_BRG => 8, AngkutanPeer::NUP => 9, AngkutanPeer::KODE_ESELON1 => 10, AngkutanPeer::NAMA_ESELON1 => 11, AngkutanPeer::KODE_SUB_SATKER => 12, AngkutanPeer::NAMA_SUB_SATKER => 13, AngkutanPeer::NAMA => 14, AngkutanPeer::SPESIFIKASI => 15, AngkutanPeer::TGL_HAPUS_BUKU => 16, AngkutanPeer::MERK => 17, AngkutanPeer::NO_POLISI => 18, AngkutanPeer::NO_BPKB => 19, AngkutanPeer::ALAMAT => 20, AngkutanPeer::ASAL_DATA => 21, AngkutanPeer::CREATE_DATE => 22, AngkutanPeer::LAST_UPDATE => 23, AngkutanPeer::SOFT_DELETE => 24, AngkutanPeer::LAST_SYNC => 25, AngkutanPeer::UPDATER_ID => 26, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_ANGKUTAN' => 0, 'SEKOLAH_ID' => 1, 'PTK_ID' => 2, 'JENIS_SARANA_ID' => 3, 'ID_HAPUS_BUKU' => 4, 'KEPEMILIKAN_SARPRAS_ID' => 5, 'KD_KL' => 6, 'KD_SATKER' => 7, 'KD_BRG' => 8, 'NUP' => 9, 'KODE_ESELON1' => 10, 'NAMA_ESELON1' => 11, 'KODE_SUB_SATKER' => 12, 'NAMA_SUB_SATKER' => 13, 'NAMA' => 14, 'SPESIFIKASI' => 15, 'TGL_HAPUS_BUKU' => 16, 'MERK' => 17, 'NO_POLISI' => 18, 'NO_BPKB' => 19, 'ALAMAT' => 20, 'ASAL_DATA' => 21, 'CREATE_DATE' => 22, 'LAST_UPDATE' => 23, 'SOFT_DELETE' => 24, 'LAST_SYNC' => 25, 'UPDATER_ID' => 26, ),
        BasePeer::TYPE_FIELDNAME => array ('id_angkutan' => 0, 'sekolah_id' => 1, 'ptk_id' => 2, 'jenis_sarana_id' => 3, 'id_hapus_buku' => 4, 'kepemilikan_sarpras_id' => 5, 'kd_kl' => 6, 'kd_satker' => 7, 'kd_brg' => 8, 'nup' => 9, 'kode_eselon1' => 10, 'nama_eselon1' => 11, 'kode_sub_satker' => 12, 'nama_sub_satker' => 13, 'nama' => 14, 'spesifikasi' => 15, 'tgl_hapus_buku' => 16, 'merk' => 17, 'no_polisi' => 18, 'no_bpkb' => 19, 'alamat' => 20, 'asal_data' => 21, 'create_date' => 22, 'last_update' => 23, 'soft_delete' => 24, 'last_sync' => 25, 'updater_id' => 26, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, )
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
        $toNames = AngkutanPeer::getFieldNames($toType);
        $key = isset(AngkutanPeer::$fieldKeys[$fromType][$name]) ? AngkutanPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(AngkutanPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, AngkutanPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return AngkutanPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. AngkutanPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(AngkutanPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(AngkutanPeer::ID_ANGKUTAN);
            $criteria->addSelectColumn(AngkutanPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(AngkutanPeer::PTK_ID);
            $criteria->addSelectColumn(AngkutanPeer::JENIS_SARANA_ID);
            $criteria->addSelectColumn(AngkutanPeer::ID_HAPUS_BUKU);
            $criteria->addSelectColumn(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID);
            $criteria->addSelectColumn(AngkutanPeer::KD_KL);
            $criteria->addSelectColumn(AngkutanPeer::KD_SATKER);
            $criteria->addSelectColumn(AngkutanPeer::KD_BRG);
            $criteria->addSelectColumn(AngkutanPeer::NUP);
            $criteria->addSelectColumn(AngkutanPeer::KODE_ESELON1);
            $criteria->addSelectColumn(AngkutanPeer::NAMA_ESELON1);
            $criteria->addSelectColumn(AngkutanPeer::KODE_SUB_SATKER);
            $criteria->addSelectColumn(AngkutanPeer::NAMA_SUB_SATKER);
            $criteria->addSelectColumn(AngkutanPeer::NAMA);
            $criteria->addSelectColumn(AngkutanPeer::SPESIFIKASI);
            $criteria->addSelectColumn(AngkutanPeer::TGL_HAPUS_BUKU);
            $criteria->addSelectColumn(AngkutanPeer::MERK);
            $criteria->addSelectColumn(AngkutanPeer::NO_POLISI);
            $criteria->addSelectColumn(AngkutanPeer::NO_BPKB);
            $criteria->addSelectColumn(AngkutanPeer::ALAMAT);
            $criteria->addSelectColumn(AngkutanPeer::ASAL_DATA);
            $criteria->addSelectColumn(AngkutanPeer::CREATE_DATE);
            $criteria->addSelectColumn(AngkutanPeer::LAST_UPDATE);
            $criteria->addSelectColumn(AngkutanPeer::SOFT_DELETE);
            $criteria->addSelectColumn(AngkutanPeer::LAST_SYNC);
            $criteria->addSelectColumn(AngkutanPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_angkutan');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.ptk_id');
            $criteria->addSelectColumn($alias . '.jenis_sarana_id');
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
            $criteria->addSelectColumn($alias . '.merk');
            $criteria->addSelectColumn($alias . '.no_polisi');
            $criteria->addSelectColumn($alias . '.no_bpkb');
            $criteria->addSelectColumn($alias . '.alamat');
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
        $criteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AngkutanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Angkutan
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = AngkutanPeer::doSelect($critcopy, $con);
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
        return AngkutanPeer::populateObjects(AngkutanPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            AngkutanPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

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
     * @param      Angkutan $obj A Angkutan object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdAngkutan();
            } // if key === null
            AngkutanPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Angkutan object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Angkutan) {
                $key = (string) $value->getIdAngkutan();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Angkutan object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(AngkutanPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Angkutan Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(AngkutanPeer::$instances[$key])) {
                return AngkutanPeer::$instances[$key];
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
        foreach (AngkutanPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        AngkutanPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to angkutan
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
        $cls = AngkutanPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = AngkutanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = AngkutanPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AngkutanPeer::addInstanceToPool($obj, $key);
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
     * @return array (Angkutan object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = AngkutanPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = AngkutanPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + AngkutanPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AngkutanPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            AngkutanPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AngkutanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AngkutanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AngkutanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AngkutanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

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
        $criteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AngkutanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AngkutanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AngkutanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AngkutanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AngkutanPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

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
     * Selects a collection of Angkutan objects pre-filled with their Ptk objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Angkutan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPtk(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AngkutanPeer::DATABASE_NAME);
        }

        AngkutanPeer::addSelectColumns($criteria);
        $startcol = AngkutanPeer::NUM_HYDRATE_COLUMNS;
        PtkPeer::addSelectColumns($criteria);

        $criteria->addJoin(AngkutanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AngkutanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AngkutanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AngkutanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AngkutanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Angkutan) to $obj2 (Ptk)
                $obj2->addAngkutan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Angkutan objects pre-filled with their JenisHapusBuku objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Angkutan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisHapusBuku(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AngkutanPeer::DATABASE_NAME);
        }

        AngkutanPeer::addSelectColumns($criteria);
        $startcol = AngkutanPeer::NUM_HYDRATE_COLUMNS;
        JenisHapusBukuPeer::addSelectColumns($criteria);

        $criteria->addJoin(AngkutanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AngkutanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AngkutanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AngkutanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AngkutanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Angkutan) to $obj2 (JenisHapusBuku)
                $obj2->addAngkutan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Angkutan objects pre-filled with their StatusKepemilikanSarpras objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Angkutan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinStatusKepemilikanSarpras(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AngkutanPeer::DATABASE_NAME);
        }

        AngkutanPeer::addSelectColumns($criteria);
        $startcol = AngkutanPeer::NUM_HYDRATE_COLUMNS;
        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);

        $criteria->addJoin(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AngkutanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AngkutanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AngkutanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AngkutanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Angkutan) to $obj2 (StatusKepemilikanSarpras)
                $obj2->addAngkutan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Angkutan objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Angkutan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AngkutanPeer::DATABASE_NAME);
        }

        AngkutanPeer::addSelectColumns($criteria);
        $startcol = AngkutanPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(AngkutanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AngkutanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AngkutanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AngkutanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AngkutanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Angkutan) to $obj2 (Sekolah)
                $obj2->addAngkutan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Angkutan objects pre-filled with their JenisSarana objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Angkutan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisSarana(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AngkutanPeer::DATABASE_NAME);
        }

        AngkutanPeer::addSelectColumns($criteria);
        $startcol = AngkutanPeer::NUM_HYDRATE_COLUMNS;
        JenisSaranaPeer::addSelectColumns($criteria);

        $criteria->addJoin(AngkutanPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AngkutanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AngkutanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = AngkutanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AngkutanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Angkutan) to $obj2 (JenisSarana)
                $obj2->addAngkutan($obj1);

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
        $criteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AngkutanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(AngkutanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

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
     * Selects a collection of Angkutan objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Angkutan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(AngkutanPeer::DATABASE_NAME);
        }

        AngkutanPeer::addSelectColumns($criteria);
        $startcol2 = AngkutanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AngkutanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AngkutanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AngkutanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AngkutanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AngkutanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Angkutan) to the collection in $obj2 (Ptk)
                $obj2->addAngkutan($obj1);
            } // if joined row not null

            // Add objects for joined JenisHapusBuku rows

            $key3 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = JenisHapusBukuPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = JenisHapusBukuPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    JenisHapusBukuPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Angkutan) to the collection in $obj3 (JenisHapusBuku)
                $obj3->addAngkutan($obj1);
            } // if joined row not null

            // Add objects for joined StatusKepemilikanSarpras rows

            $key4 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Angkutan) to the collection in $obj4 (StatusKepemilikanSarpras)
                $obj4->addAngkutan($obj1);
            } // if joined row not null

            // Add objects for joined Sekolah rows

            $key5 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = SekolahPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = SekolahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SekolahPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Angkutan) to the collection in $obj5 (Sekolah)
                $obj5->addAngkutan($obj1);
            } // if joined row not null

            // Add objects for joined JenisSarana rows

            $key6 = JenisSaranaPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = JenisSaranaPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = JenisSaranaPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JenisSaranaPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Angkutan) to the collection in $obj6 (JenisSarana)
                $obj6->addAngkutan($obj1);
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
        $criteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AngkutanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AngkutanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AngkutanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AngkutanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AngkutanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AngkutanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AngkutanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AngkutanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AngkutanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            AngkutanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(AngkutanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of Angkutan objects pre-filled with all related objects except Ptk.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Angkutan objects.
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
            $criteria->setDbName(AngkutanPeer::DATABASE_NAME);
        }

        AngkutanPeer::addSelectColumns($criteria);
        $startcol2 = AngkutanPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AngkutanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AngkutanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AngkutanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AngkutanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AngkutanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisHapusBuku rows

                $key2 = JenisHapusBukuPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisHapusBukuPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisHapusBukuPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisHapusBukuPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Angkutan) to the collection in $obj2 (JenisHapusBuku)
                $obj2->addAngkutan($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key3 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Angkutan) to the collection in $obj3 (StatusKepemilikanSarpras)
                $obj3->addAngkutan($obj1);

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

                // Add the $obj1 (Angkutan) to the collection in $obj4 (Sekolah)
                $obj4->addAngkutan($obj1);

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

                // Add the $obj1 (Angkutan) to the collection in $obj5 (JenisSarana)
                $obj5->addAngkutan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Angkutan objects pre-filled with all related objects except JenisHapusBuku.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Angkutan objects.
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
            $criteria->setDbName(AngkutanPeer::DATABASE_NAME);
        }

        AngkutanPeer::addSelectColumns($criteria);
        $startcol2 = AngkutanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AngkutanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AngkutanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AngkutanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AngkutanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AngkutanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Angkutan) to the collection in $obj2 (Ptk)
                $obj2->addAngkutan($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key3 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Angkutan) to the collection in $obj3 (StatusKepemilikanSarpras)
                $obj3->addAngkutan($obj1);

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

                // Add the $obj1 (Angkutan) to the collection in $obj4 (Sekolah)
                $obj4->addAngkutan($obj1);

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

                // Add the $obj1 (Angkutan) to the collection in $obj5 (JenisSarana)
                $obj5->addAngkutan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Angkutan objects pre-filled with all related objects except StatusKepemilikanSarpras.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Angkutan objects.
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
            $criteria->setDbName(AngkutanPeer::DATABASE_NAME);
        }

        AngkutanPeer::addSelectColumns($criteria);
        $startcol2 = AngkutanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AngkutanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AngkutanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AngkutanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AngkutanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AngkutanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AngkutanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Angkutan) to the collection in $obj2 (Ptk)
                $obj2->addAngkutan($obj1);

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

                // Add the $obj1 (Angkutan) to the collection in $obj3 (JenisHapusBuku)
                $obj3->addAngkutan($obj1);

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

                // Add the $obj1 (Angkutan) to the collection in $obj4 (Sekolah)
                $obj4->addAngkutan($obj1);

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

                // Add the $obj1 (Angkutan) to the collection in $obj5 (JenisSarana)
                $obj5->addAngkutan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Angkutan objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Angkutan objects.
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
            $criteria->setDbName(AngkutanPeer::DATABASE_NAME);
        }

        AngkutanPeer::addSelectColumns($criteria);
        $startcol2 = AngkutanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        JenisSaranaPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisSaranaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AngkutanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::JENIS_SARANA_ID, JenisSaranaPeer::JENIS_SARANA_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AngkutanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AngkutanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AngkutanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AngkutanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Angkutan) to the collection in $obj2 (Ptk)
                $obj2->addAngkutan($obj1);

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

                // Add the $obj1 (Angkutan) to the collection in $obj3 (JenisHapusBuku)
                $obj3->addAngkutan($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key4 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Angkutan) to the collection in $obj4 (StatusKepemilikanSarpras)
                $obj4->addAngkutan($obj1);

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

                // Add the $obj1 (Angkutan) to the collection in $obj5 (JenisSarana)
                $obj5->addAngkutan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Angkutan objects pre-filled with all related objects except JenisSarana.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Angkutan objects.
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
            $criteria->setDbName(AngkutanPeer::DATABASE_NAME);
        }

        AngkutanPeer::addSelectColumns($criteria);
        $startcol2 = AngkutanPeer::NUM_HYDRATE_COLUMNS;

        PtkPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PtkPeer::NUM_HYDRATE_COLUMNS;

        JenisHapusBukuPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + JenisHapusBukuPeer::NUM_HYDRATE_COLUMNS;

        StatusKepemilikanSarprasPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + StatusKepemilikanSarprasPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(AngkutanPeer::PTK_ID, PtkPeer::PTK_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::ID_HAPUS_BUKU, JenisHapusBukuPeer::ID_HAPUS_BUKU, $join_behavior);

        $criteria->addJoin(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $join_behavior);

        $criteria->addJoin(AngkutanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = AngkutanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = AngkutanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = AngkutanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                AngkutanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Angkutan) to the collection in $obj2 (Ptk)
                $obj2->addAngkutan($obj1);

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

                // Add the $obj1 (Angkutan) to the collection in $obj3 (JenisHapusBuku)
                $obj3->addAngkutan($obj1);

            } // if joined row is not null

                // Add objects for joined StatusKepemilikanSarpras rows

                $key4 = StatusKepemilikanSarprasPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = StatusKepemilikanSarprasPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = StatusKepemilikanSarprasPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    StatusKepemilikanSarprasPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Angkutan) to the collection in $obj4 (StatusKepemilikanSarpras)
                $obj4->addAngkutan($obj1);

            } // if joined row is not null

                // Add objects for joined Sekolah rows

                $key5 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = SekolahPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SekolahPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Angkutan) to the collection in $obj5 (Sekolah)
                $obj5->addAngkutan($obj1);

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
        return Propel::getDatabaseMap(AngkutanPeer::DATABASE_NAME)->getTable(AngkutanPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseAngkutanPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseAngkutanPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new AngkutanTableMap());
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
        return AngkutanPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Angkutan or Criteria object.
     *
     * @param      mixed $values Criteria or Angkutan object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Angkutan object
        }


        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Angkutan or Criteria object.
     *
     * @param      mixed $values Criteria or Angkutan object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(AngkutanPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(AngkutanPeer::ID_ANGKUTAN);
            $value = $criteria->remove(AngkutanPeer::ID_ANGKUTAN);
            if ($value) {
                $selectCriteria->add(AngkutanPeer::ID_ANGKUTAN, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(AngkutanPeer::TABLE_NAME);
            }

        } else { // $values is Angkutan object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the angkutan table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(AngkutanPeer::TABLE_NAME, $con, AngkutanPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AngkutanPeer::clearInstancePool();
            AngkutanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Angkutan or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Angkutan object or primary key or array of primary keys
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
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            AngkutanPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Angkutan) { // it's a model object
            // invalidate the cache for this single object
            AngkutanPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AngkutanPeer::DATABASE_NAME);
            $criteria->add(AngkutanPeer::ID_ANGKUTAN, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                AngkutanPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(AngkutanPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            AngkutanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Angkutan object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Angkutan $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(AngkutanPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(AngkutanPeer::TABLE_NAME);

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

        return BasePeer::doValidate(AngkutanPeer::DATABASE_NAME, AngkutanPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Angkutan
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = AngkutanPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(AngkutanPeer::DATABASE_NAME);
        $criteria->add(AngkutanPeer::ID_ANGKUTAN, $pk);

        $v = AngkutanPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Angkutan[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(AngkutanPeer::DATABASE_NAME);
            $criteria->add(AngkutanPeer::ID_ANGKUTAN, $pks, Criteria::IN);
            $objs = AngkutanPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseAngkutanPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseAngkutanPeer::buildTableMap();

