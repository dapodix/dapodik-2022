<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisCitaPeer;
use DataDikdas\Model\JenisHobbyPeer;
use DataDikdas\Model\JenisKeluarPeer;
use DataDikdas\Model\JenisPendaftaranPeer;
use DataDikdas\Model\JurusanSpPeer;
use DataDikdas\Model\PesertaDidikPeer;
use DataDikdas\Model\RegistrasiPesertaDidik;
use DataDikdas\Model\RegistrasiPesertaDidikPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\map\RegistrasiPesertaDidikTableMap;

/**
 * Base static class for performing query and update operations on the 'registrasi_peserta_didik' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseRegistrasiPesertaDidikPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'registrasi_peserta_didik';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\RegistrasiPesertaDidik';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RegistrasiPesertaDidikTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 23;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 23;

    /** the column name for the registrasi_id field */
    const REGISTRASI_ID = 'registrasi_peserta_didik.registrasi_id';

    /** the column name for the jurusan_sp_id field */
    const JURUSAN_SP_ID = 'registrasi_peserta_didik.jurusan_sp_id';

    /** the column name for the peserta_didik_id field */
    const PESERTA_DIDIK_ID = 'registrasi_peserta_didik.peserta_didik_id';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'registrasi_peserta_didik.sekolah_id';

    /** the column name for the jenis_pendaftaran_id field */
    const JENIS_PENDAFTARAN_ID = 'registrasi_peserta_didik.jenis_pendaftaran_id';

    /** the column name for the nipd field */
    const NIPD = 'registrasi_peserta_didik.nipd';

    /** the column name for the tanggal_masuk_sekolah field */
    const TANGGAL_MASUK_SEKOLAH = 'registrasi_peserta_didik.tanggal_masuk_sekolah';

    /** the column name for the jenis_keluar_id field */
    const JENIS_KELUAR_ID = 'registrasi_peserta_didik.jenis_keluar_id';

    /** the column name for the tanggal_keluar field */
    const TANGGAL_KELUAR = 'registrasi_peserta_didik.tanggal_keluar';

    /** the column name for the keterangan field */
    const KETERANGAN = 'registrasi_peserta_didik.keterangan';

    /** the column name for the no_skhun field */
    const NO_SKHUN = 'registrasi_peserta_didik.no_skhun';

    /** the column name for the no_peserta_ujian field */
    const NO_PESERTA_UJIAN = 'registrasi_peserta_didik.no_peserta_ujian';

    /** the column name for the no_seri_ijazah field */
    const NO_SERI_IJAZAH = 'registrasi_peserta_didik.no_seri_ijazah';

    /** the column name for the a_pernah_paud field */
    const A_PERNAH_PAUD = 'registrasi_peserta_didik.a_pernah_paud';

    /** the column name for the a_pernah_tk field */
    const A_PERNAH_TK = 'registrasi_peserta_didik.a_pernah_tk';

    /** the column name for the sekolah_asal field */
    const SEKOLAH_ASAL = 'registrasi_peserta_didik.sekolah_asal';

    /** the column name for the id_hobby field */
    const ID_HOBBY = 'registrasi_peserta_didik.id_hobby';

    /** the column name for the id_cita field */
    const ID_CITA = 'registrasi_peserta_didik.id_cita';

    /** the column name for the create_date field */
    const CREATE_DATE = 'registrasi_peserta_didik.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'registrasi_peserta_didik.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'registrasi_peserta_didik.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'registrasi_peserta_didik.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'registrasi_peserta_didik.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of RegistrasiPesertaDidik objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array RegistrasiPesertaDidik[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RegistrasiPesertaDidikPeer::$fieldNames[RegistrasiPesertaDidikPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('RegistrasiId', 'JurusanSpId', 'PesertaDidikId', 'SekolahId', 'JenisPendaftaranId', 'Nipd', 'TanggalMasukSekolah', 'JenisKeluarId', 'TanggalKeluar', 'Keterangan', 'NoSkhun', 'NoPesertaUjian', 'NoSeriIjazah', 'APernahPaud', 'APernahTk', 'SekolahAsal', 'IdHobby', 'IdCita', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('registrasiId', 'jurusanSpId', 'pesertaDidikId', 'sekolahId', 'jenisPendaftaranId', 'nipd', 'tanggalMasukSekolah', 'jenisKeluarId', 'tanggalKeluar', 'keterangan', 'noSkhun', 'noPesertaUjian', 'noSeriIjazah', 'aPernahPaud', 'aPernahTk', 'sekolahAsal', 'idHobby', 'idCita', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (RegistrasiPesertaDidikPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, RegistrasiPesertaDidikPeer::SEKOLAH_ID, RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, RegistrasiPesertaDidikPeer::NIPD, RegistrasiPesertaDidikPeer::TANGGAL_MASUK_SEKOLAH, RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, RegistrasiPesertaDidikPeer::TANGGAL_KELUAR, RegistrasiPesertaDidikPeer::KETERANGAN, RegistrasiPesertaDidikPeer::NO_SKHUN, RegistrasiPesertaDidikPeer::NO_PESERTA_UJIAN, RegistrasiPesertaDidikPeer::NO_SERI_IJAZAH, RegistrasiPesertaDidikPeer::A_PERNAH_PAUD, RegistrasiPesertaDidikPeer::A_PERNAH_TK, RegistrasiPesertaDidikPeer::SEKOLAH_ASAL, RegistrasiPesertaDidikPeer::ID_HOBBY, RegistrasiPesertaDidikPeer::ID_CITA, RegistrasiPesertaDidikPeer::CREATE_DATE, RegistrasiPesertaDidikPeer::LAST_UPDATE, RegistrasiPesertaDidikPeer::SOFT_DELETE, RegistrasiPesertaDidikPeer::LAST_SYNC, RegistrasiPesertaDidikPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('REGISTRASI_ID', 'JURUSAN_SP_ID', 'PESERTA_DIDIK_ID', 'SEKOLAH_ID', 'JENIS_PENDAFTARAN_ID', 'NIPD', 'TANGGAL_MASUK_SEKOLAH', 'JENIS_KELUAR_ID', 'TANGGAL_KELUAR', 'KETERANGAN', 'NO_SKHUN', 'NO_PESERTA_UJIAN', 'NO_SERI_IJAZAH', 'A_PERNAH_PAUD', 'A_PERNAH_TK', 'SEKOLAH_ASAL', 'ID_HOBBY', 'ID_CITA', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('registrasi_id', 'jurusan_sp_id', 'peserta_didik_id', 'sekolah_id', 'jenis_pendaftaran_id', 'nipd', 'tanggal_masuk_sekolah', 'jenis_keluar_id', 'tanggal_keluar', 'keterangan', 'no_skhun', 'no_peserta_ujian', 'no_seri_ijazah', 'a_pernah_paud', 'a_pernah_tk', 'sekolah_asal', 'id_hobby', 'id_cita', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RegistrasiPesertaDidikPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('RegistrasiId' => 0, 'JurusanSpId' => 1, 'PesertaDidikId' => 2, 'SekolahId' => 3, 'JenisPendaftaranId' => 4, 'Nipd' => 5, 'TanggalMasukSekolah' => 6, 'JenisKeluarId' => 7, 'TanggalKeluar' => 8, 'Keterangan' => 9, 'NoSkhun' => 10, 'NoPesertaUjian' => 11, 'NoSeriIjazah' => 12, 'APernahPaud' => 13, 'APernahTk' => 14, 'SekolahAsal' => 15, 'IdHobby' => 16, 'IdCita' => 17, 'CreateDate' => 18, 'LastUpdate' => 19, 'SoftDelete' => 20, 'LastSync' => 21, 'UpdaterId' => 22, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('registrasiId' => 0, 'jurusanSpId' => 1, 'pesertaDidikId' => 2, 'sekolahId' => 3, 'jenisPendaftaranId' => 4, 'nipd' => 5, 'tanggalMasukSekolah' => 6, 'jenisKeluarId' => 7, 'tanggalKeluar' => 8, 'keterangan' => 9, 'noSkhun' => 10, 'noPesertaUjian' => 11, 'noSeriIjazah' => 12, 'aPernahPaud' => 13, 'aPernahTk' => 14, 'sekolahAsal' => 15, 'idHobby' => 16, 'idCita' => 17, 'createDate' => 18, 'lastUpdate' => 19, 'softDelete' => 20, 'lastSync' => 21, 'updaterId' => 22, ),
        BasePeer::TYPE_COLNAME => array (RegistrasiPesertaDidikPeer::REGISTRASI_ID => 0, RegistrasiPesertaDidikPeer::JURUSAN_SP_ID => 1, RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID => 2, RegistrasiPesertaDidikPeer::SEKOLAH_ID => 3, RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID => 4, RegistrasiPesertaDidikPeer::NIPD => 5, RegistrasiPesertaDidikPeer::TANGGAL_MASUK_SEKOLAH => 6, RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID => 7, RegistrasiPesertaDidikPeer::TANGGAL_KELUAR => 8, RegistrasiPesertaDidikPeer::KETERANGAN => 9, RegistrasiPesertaDidikPeer::NO_SKHUN => 10, RegistrasiPesertaDidikPeer::NO_PESERTA_UJIAN => 11, RegistrasiPesertaDidikPeer::NO_SERI_IJAZAH => 12, RegistrasiPesertaDidikPeer::A_PERNAH_PAUD => 13, RegistrasiPesertaDidikPeer::A_PERNAH_TK => 14, RegistrasiPesertaDidikPeer::SEKOLAH_ASAL => 15, RegistrasiPesertaDidikPeer::ID_HOBBY => 16, RegistrasiPesertaDidikPeer::ID_CITA => 17, RegistrasiPesertaDidikPeer::CREATE_DATE => 18, RegistrasiPesertaDidikPeer::LAST_UPDATE => 19, RegistrasiPesertaDidikPeer::SOFT_DELETE => 20, RegistrasiPesertaDidikPeer::LAST_SYNC => 21, RegistrasiPesertaDidikPeer::UPDATER_ID => 22, ),
        BasePeer::TYPE_RAW_COLNAME => array ('REGISTRASI_ID' => 0, 'JURUSAN_SP_ID' => 1, 'PESERTA_DIDIK_ID' => 2, 'SEKOLAH_ID' => 3, 'JENIS_PENDAFTARAN_ID' => 4, 'NIPD' => 5, 'TANGGAL_MASUK_SEKOLAH' => 6, 'JENIS_KELUAR_ID' => 7, 'TANGGAL_KELUAR' => 8, 'KETERANGAN' => 9, 'NO_SKHUN' => 10, 'NO_PESERTA_UJIAN' => 11, 'NO_SERI_IJAZAH' => 12, 'A_PERNAH_PAUD' => 13, 'A_PERNAH_TK' => 14, 'SEKOLAH_ASAL' => 15, 'ID_HOBBY' => 16, 'ID_CITA' => 17, 'CREATE_DATE' => 18, 'LAST_UPDATE' => 19, 'SOFT_DELETE' => 20, 'LAST_SYNC' => 21, 'UPDATER_ID' => 22, ),
        BasePeer::TYPE_FIELDNAME => array ('registrasi_id' => 0, 'jurusan_sp_id' => 1, 'peserta_didik_id' => 2, 'sekolah_id' => 3, 'jenis_pendaftaran_id' => 4, 'nipd' => 5, 'tanggal_masuk_sekolah' => 6, 'jenis_keluar_id' => 7, 'tanggal_keluar' => 8, 'keterangan' => 9, 'no_skhun' => 10, 'no_peserta_ujian' => 11, 'no_seri_ijazah' => 12, 'a_pernah_paud' => 13, 'a_pernah_tk' => 14, 'sekolah_asal' => 15, 'id_hobby' => 16, 'id_cita' => 17, 'create_date' => 18, 'last_update' => 19, 'soft_delete' => 20, 'last_sync' => 21, 'updater_id' => 22, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, )
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
        $toNames = RegistrasiPesertaDidikPeer::getFieldNames($toType);
        $key = isset(RegistrasiPesertaDidikPeer::$fieldKeys[$fromType][$name]) ? RegistrasiPesertaDidikPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RegistrasiPesertaDidikPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RegistrasiPesertaDidikPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RegistrasiPesertaDidikPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RegistrasiPesertaDidikPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RegistrasiPesertaDidikPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::REGISTRASI_ID);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::NIPD);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::TANGGAL_MASUK_SEKOLAH);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::TANGGAL_KELUAR);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::KETERANGAN);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::NO_SKHUN);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::NO_PESERTA_UJIAN);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::NO_SERI_IJAZAH);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::A_PERNAH_PAUD);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::A_PERNAH_TK);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::SEKOLAH_ASAL);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::ID_HOBBY);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::ID_CITA);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::CREATE_DATE);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::LAST_UPDATE);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::SOFT_DELETE);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::LAST_SYNC);
            $criteria->addSelectColumn(RegistrasiPesertaDidikPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.registrasi_id');
            $criteria->addSelectColumn($alias . '.jurusan_sp_id');
            $criteria->addSelectColumn($alias . '.peserta_didik_id');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.jenis_pendaftaran_id');
            $criteria->addSelectColumn($alias . '.nipd');
            $criteria->addSelectColumn($alias . '.tanggal_masuk_sekolah');
            $criteria->addSelectColumn($alias . '.jenis_keluar_id');
            $criteria->addSelectColumn($alias . '.tanggal_keluar');
            $criteria->addSelectColumn($alias . '.keterangan');
            $criteria->addSelectColumn($alias . '.no_skhun');
            $criteria->addSelectColumn($alias . '.no_peserta_ujian');
            $criteria->addSelectColumn($alias . '.no_seri_ijazah');
            $criteria->addSelectColumn($alias . '.a_pernah_paud');
            $criteria->addSelectColumn($alias . '.a_pernah_tk');
            $criteria->addSelectColumn($alias . '.sekolah_asal');
            $criteria->addSelectColumn($alias . '.id_hobby');
            $criteria->addSelectColumn($alias . '.id_cita');
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
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RegistrasiPesertaDidik
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RegistrasiPesertaDidikPeer::doSelect($critcopy, $con);
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
        return RegistrasiPesertaDidikPeer::populateObjects(RegistrasiPesertaDidikPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

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
     * @param      RegistrasiPesertaDidik $obj A RegistrasiPesertaDidik object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getRegistrasiId();
            } // if key === null
            RegistrasiPesertaDidikPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A RegistrasiPesertaDidik object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof RegistrasiPesertaDidik) {
                $key = (string) $value->getRegistrasiId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RegistrasiPesertaDidik object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RegistrasiPesertaDidikPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   RegistrasiPesertaDidik Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RegistrasiPesertaDidikPeer::$instances[$key])) {
                return RegistrasiPesertaDidikPeer::$instances[$key];
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
        foreach (RegistrasiPesertaDidikPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RegistrasiPesertaDidikPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to registrasi_peserta_didik
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
        $cls = RegistrasiPesertaDidikPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RegistrasiPesertaDidikPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj, $key);
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
     * @return array (RegistrasiPesertaDidik object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RegistrasiPesertaDidikPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RegistrasiPesertaDidikPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RegistrasiPesertaDidikPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related JurusanSp table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJurusanSp(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisPendaftaran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisPendaftaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisKeluar table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisKeluar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisCita table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisCita(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisHobby table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisHobby(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);

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
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with their JurusanSp objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJurusanSp(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        JurusanSpPeer::addSelectColumns($criteria);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to $obj2 (JurusanSp)
                $obj2->addRegistrasiPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with their PesertaDidik objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPesertaDidik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        PesertaDidikPeer::addSelectColumns($criteria);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RegistrasiPesertaDidik) to $obj2 (PesertaDidik)
                $obj2->addRegistrasiPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RegistrasiPesertaDidik) to $obj2 (Sekolah)
                $obj2->addRegistrasiPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with their JenisPendaftaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisPendaftaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        JenisPendaftaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisPendaftaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisPendaftaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisPendaftaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisPendaftaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to $obj2 (JenisPendaftaran)
                $obj2->addRegistrasiPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with their JenisKeluar objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisKeluar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        JenisKeluarPeer::addSelectColumns($criteria);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisKeluarPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisKeluarPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisKeluarPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to $obj2 (JenisKeluar)
                $obj2->addRegistrasiPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with their JenisCita objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisCita(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        JenisCitaPeer::addSelectColumns($criteria);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisCitaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisCitaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisCitaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisCitaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to $obj2 (JenisCita)
                $obj2->addRegistrasiPesertaDidik($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with their JenisHobby objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisHobby(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;
        JenisHobbyPeer::addSelectColumns($criteria);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisHobbyPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisHobbyPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisHobbyPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisHobbyPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to $obj2 (JenisHobby)
                $obj2->addRegistrasiPesertaDidik($obj1);

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
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);

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
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisPendaftaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPendaftaranPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        JenisCitaPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenisCitaPeer::NUM_HYDRATE_COLUMNS;

        JenisHobbyPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + JenisHobbyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined JurusanSp rows

            $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj2 (JurusanSp)
                $obj2->addRegistrasiPesertaDidik($obj1);
            } // if joined row not null

            // Add objects for joined PesertaDidik rows

            $key3 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = PesertaDidikPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = PesertaDidikPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PesertaDidikPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj3 (PesertaDidik)
                $obj3->addRegistrasiPesertaDidik($obj1);
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

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj4 (Sekolah)
                $obj4->addRegistrasiPesertaDidik($obj1);
            } // if joined row not null

            // Add objects for joined JenisPendaftaran rows

            $key5 = JenisPendaftaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = JenisPendaftaranPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = JenisPendaftaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPendaftaranPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj5 (JenisPendaftaran)
                $obj5->addRegistrasiPesertaDidik($obj1);
            } // if joined row not null

            // Add objects for joined JenisKeluar rows

            $key6 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = JenisKeluarPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = JenisKeluarPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JenisKeluarPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj6 (JenisKeluar)
                $obj6->addRegistrasiPesertaDidik($obj1);
            } // if joined row not null

            // Add objects for joined JenisCita rows

            $key7 = JenisCitaPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = JenisCitaPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = JenisCitaPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenisCitaPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj7 (JenisCita)
                $obj7->addRegistrasiPesertaDidik($obj1);
            } // if joined row not null

            // Add objects for joined JenisHobby rows

            $key8 = JenisHobbyPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = JenisHobbyPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = JenisHobbyPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    JenisHobbyPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj8 (JenisHobby)
                $obj8->addRegistrasiPesertaDidik($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JurusanSp table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJurusanSp(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);

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
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);

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
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisPendaftaran table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisPendaftaran(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisKeluar table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisKeluar(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisCita table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisCita(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related JenisHobby table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisHobby(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

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
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with all related objects except JurusanSp.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJurusanSp(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisPendaftaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisPendaftaranPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        JenisCitaPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JenisCitaPeer::NUM_HYDRATE_COLUMNS;

        JenisHobbyPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenisHobbyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj2 (PesertaDidik)
                $obj2->addRegistrasiPesertaDidik($obj1);

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

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj3 (Sekolah)
                $obj3->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPendaftaran rows

                $key4 = JenisPendaftaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisPendaftaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisPendaftaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisPendaftaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj4 (JenisPendaftaran)
                $obj4->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisKeluar rows

                $key5 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisKeluarPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisKeluarPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj5 (JenisKeluar)
                $obj5->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisCita rows

                $key6 = JenisCitaPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JenisCitaPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JenisCitaPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JenisCitaPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj6 (JenisCita)
                $obj6->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHobby rows

                $key7 = JenisHobbyPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenisHobbyPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenisHobbyPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenisHobbyPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj7 (JenisHobby)
                $obj7->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with all related objects except PesertaDidik.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
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
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisPendaftaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisPendaftaranPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        JenisCitaPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JenisCitaPeer::NUM_HYDRATE_COLUMNS;

        JenisHobbyPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenisHobbyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj2 (JurusanSp)
                $obj2->addRegistrasiPesertaDidik($obj1);

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

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj3 (Sekolah)
                $obj3->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPendaftaran rows

                $key4 = JenisPendaftaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisPendaftaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisPendaftaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisPendaftaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj4 (JenisPendaftaran)
                $obj4->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisKeluar rows

                $key5 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisKeluarPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisKeluarPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj5 (JenisKeluar)
                $obj5->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisCita rows

                $key6 = JenisCitaPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JenisCitaPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JenisCitaPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JenisCitaPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj6 (JenisCita)
                $obj6->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHobby rows

                $key7 = JenisHobbyPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenisHobbyPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenisHobbyPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenisHobbyPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj7 (JenisHobby)
                $obj7->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
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
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        JenisPendaftaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + JenisPendaftaranPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        JenisCitaPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JenisCitaPeer::NUM_HYDRATE_COLUMNS;

        JenisHobbyPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenisHobbyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj2 (JurusanSp)
                $obj2->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined PesertaDidik rows

                $key3 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PesertaDidikPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PesertaDidikPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PesertaDidikPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj3 (PesertaDidik)
                $obj3->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPendaftaran rows

                $key4 = JenisPendaftaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = JenisPendaftaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = JenisPendaftaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    JenisPendaftaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj4 (JenisPendaftaran)
                $obj4->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisKeluar rows

                $key5 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisKeluarPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisKeluarPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj5 (JenisKeluar)
                $obj5->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisCita rows

                $key6 = JenisCitaPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JenisCitaPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JenisCitaPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JenisCitaPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj6 (JenisCita)
                $obj6->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHobby rows

                $key7 = JenisHobbyPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenisHobbyPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenisHobbyPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenisHobbyPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj7 (JenisHobby)
                $obj7->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with all related objects except JenisPendaftaran.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisPendaftaran(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        JenisCitaPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JenisCitaPeer::NUM_HYDRATE_COLUMNS;

        JenisHobbyPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenisHobbyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj2 (JurusanSp)
                $obj2->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined PesertaDidik rows

                $key3 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PesertaDidikPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PesertaDidikPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PesertaDidikPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj3 (PesertaDidik)
                $obj3->addRegistrasiPesertaDidik($obj1);

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

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj4 (Sekolah)
                $obj4->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisKeluar rows

                $key5 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisKeluarPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisKeluarPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj5 (JenisKeluar)
                $obj5->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisCita rows

                $key6 = JenisCitaPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JenisCitaPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JenisCitaPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JenisCitaPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj6 (JenisCita)
                $obj6->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHobby rows

                $key7 = JenisHobbyPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenisHobbyPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenisHobbyPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenisHobbyPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj7 (JenisHobby)
                $obj7->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with all related objects except JenisKeluar.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisKeluar(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisPendaftaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPendaftaranPeer::NUM_HYDRATE_COLUMNS;

        JenisCitaPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JenisCitaPeer::NUM_HYDRATE_COLUMNS;

        JenisHobbyPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenisHobbyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj2 (JurusanSp)
                $obj2->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined PesertaDidik rows

                $key3 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PesertaDidikPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PesertaDidikPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PesertaDidikPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj3 (PesertaDidik)
                $obj3->addRegistrasiPesertaDidik($obj1);

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

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj4 (Sekolah)
                $obj4->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPendaftaran rows

                $key5 = JenisPendaftaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPendaftaranPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPendaftaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPendaftaranPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj5 (JenisPendaftaran)
                $obj5->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisCita rows

                $key6 = JenisCitaPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JenisCitaPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JenisCitaPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JenisCitaPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj6 (JenisCita)
                $obj6->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHobby rows

                $key7 = JenisHobbyPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenisHobbyPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenisHobbyPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenisHobbyPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj7 (JenisHobby)
                $obj7->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with all related objects except JenisCita.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisCita(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisPendaftaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPendaftaranPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        JenisHobbyPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenisHobbyPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_HOBBY, JenisHobbyPeer::ID_HOBBY, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj2 (JurusanSp)
                $obj2->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined PesertaDidik rows

                $key3 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PesertaDidikPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PesertaDidikPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PesertaDidikPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj3 (PesertaDidik)
                $obj3->addRegistrasiPesertaDidik($obj1);

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

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj4 (Sekolah)
                $obj4->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPendaftaran rows

                $key5 = JenisPendaftaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPendaftaranPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPendaftaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPendaftaranPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj5 (JenisPendaftaran)
                $obj5->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisKeluar rows

                $key6 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JenisKeluarPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JenisKeluarPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj6 (JenisKeluar)
                $obj6->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisHobby rows

                $key7 = JenisHobbyPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenisHobbyPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenisHobbyPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenisHobbyPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj7 (JenisHobby)
                $obj7->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RegistrasiPesertaDidik objects pre-filled with all related objects except JenisHobby.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RegistrasiPesertaDidik objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisHobby(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        }

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol2 = RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        JurusanSpPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JurusanSpPeer::NUM_HYDRATE_COLUMNS;

        PesertaDidikPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        JenisPendaftaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + JenisPendaftaranPeer::NUM_HYDRATE_COLUMNS;

        JenisKeluarPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + JenisKeluarPeer::NUM_HYDRATE_COLUMNS;

        JenisCitaPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + JenisCitaPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, JurusanSpPeer::JURUSAN_SP_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, PesertaDidikPeer::PESERTA_DIDIK_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, JenisKeluarPeer::JENIS_KELUAR_ID, $join_behavior);

        $criteria->addJoin(RegistrasiPesertaDidikPeer::ID_CITA, JenisCitaPeer::ID_CITA, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RegistrasiPesertaDidikPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RegistrasiPesertaDidikPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JurusanSp rows

                $key2 = JurusanSpPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JurusanSpPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JurusanSpPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JurusanSpPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj2 (JurusanSp)
                $obj2->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined PesertaDidik rows

                $key3 = PesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PesertaDidikPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PesertaDidikPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PesertaDidikPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj3 (PesertaDidik)
                $obj3->addRegistrasiPesertaDidik($obj1);

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

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj4 (Sekolah)
                $obj4->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisPendaftaran rows

                $key5 = JenisPendaftaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = JenisPendaftaranPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = JenisPendaftaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    JenisPendaftaranPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj5 (JenisPendaftaran)
                $obj5->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisKeluar rows

                $key6 = JenisKeluarPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = JenisKeluarPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = JenisKeluarPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    JenisKeluarPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj6 (JenisKeluar)
                $obj6->addRegistrasiPesertaDidik($obj1);

            } // if joined row is not null

                // Add objects for joined JenisCita rows

                $key7 = JenisCitaPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = JenisCitaPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = JenisCitaPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    JenisCitaPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (RegistrasiPesertaDidik) to the collection in $obj7 (JenisCita)
                $obj7->addRegistrasiPesertaDidik($obj1);

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
        return Propel::getDatabaseMap(RegistrasiPesertaDidikPeer::DATABASE_NAME)->getTable(RegistrasiPesertaDidikPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRegistrasiPesertaDidikPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRegistrasiPesertaDidikPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RegistrasiPesertaDidikTableMap());
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
        return RegistrasiPesertaDidikPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a RegistrasiPesertaDidik or Criteria object.
     *
     * @param      mixed $values Criteria or RegistrasiPesertaDidik object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from RegistrasiPesertaDidik object
        }


        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a RegistrasiPesertaDidik or Criteria object.
     *
     * @param      mixed $values Criteria or RegistrasiPesertaDidik object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RegistrasiPesertaDidikPeer::REGISTRASI_ID);
            $value = $criteria->remove(RegistrasiPesertaDidikPeer::REGISTRASI_ID);
            if ($value) {
                $selectCriteria->add(RegistrasiPesertaDidikPeer::REGISTRASI_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RegistrasiPesertaDidikPeer::TABLE_NAME);
            }

        } else { // $values is RegistrasiPesertaDidik object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the registrasi_peserta_didik table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RegistrasiPesertaDidikPeer::TABLE_NAME, $con, RegistrasiPesertaDidikPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RegistrasiPesertaDidikPeer::clearInstancePool();
            RegistrasiPesertaDidikPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a RegistrasiPesertaDidik or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or RegistrasiPesertaDidik object or primary key or array of primary keys
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
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RegistrasiPesertaDidikPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof RegistrasiPesertaDidik) { // it's a model object
            // invalidate the cache for this single object
            RegistrasiPesertaDidikPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RegistrasiPesertaDidikPeer::DATABASE_NAME);
            $criteria->add(RegistrasiPesertaDidikPeer::REGISTRASI_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                RegistrasiPesertaDidikPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RegistrasiPesertaDidikPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            RegistrasiPesertaDidikPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given RegistrasiPesertaDidik object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      RegistrasiPesertaDidik $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RegistrasiPesertaDidikPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RegistrasiPesertaDidikPeer::TABLE_NAME);

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

        return BasePeer::doValidate(RegistrasiPesertaDidikPeer::DATABASE_NAME, RegistrasiPesertaDidikPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return RegistrasiPesertaDidik
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = RegistrasiPesertaDidikPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(RegistrasiPesertaDidikPeer::DATABASE_NAME);
        $criteria->add(RegistrasiPesertaDidikPeer::REGISTRASI_ID, $pk);

        $v = RegistrasiPesertaDidikPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return RegistrasiPesertaDidik[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(RegistrasiPesertaDidikPeer::DATABASE_NAME);
            $criteria->add(RegistrasiPesertaDidikPeer::REGISTRASI_ID, $pks, Criteria::IN);
            $objs = RegistrasiPesertaDidikPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseRegistrasiPesertaDidikPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRegistrasiPesertaDidikPeer::buildTableMap();

