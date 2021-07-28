<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BidangUsahaPeer;
use DataDikdas\Model\DudiPeer;
use DataDikdas\Model\PekerjaanPeer;
use DataDikdas\Model\PenghasilanPeer;
use DataDikdas\Model\RegistrasiPesertaDidikPeer;
use DataDikdas\Model\TracerLulusan;
use DataDikdas\Model\TracerLulusanPeer;
use DataDikdas\Model\map\TracerLulusanTableMap;

/**
 * Base static class for performing query and update operations on the 'tracer_lulusan' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseTracerLulusanPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'tracer_lulusan';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\TracerLulusan';

    /** the related TableMap class for this table */
    const TM_CLASS = 'TracerLulusanTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 21;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 21;

    /** the column name for the id_tracer field */
    const ID_TRACER = 'tracer_lulusan.id_tracer';

    /** the column name for the penghasilan_id field */
    const PENGHASILAN_ID = 'tracer_lulusan.penghasilan_id';

    /** the column name for the registrasi_id field */
    const REGISTRASI_ID = 'tracer_lulusan.registrasi_id';

    /** the column name for the tgl_entry field */
    const TGL_ENTRY = 'tracer_lulusan.tgl_entry';

    /** the column name for the akt_setelah_lulus field */
    const AKT_SETELAH_LULUS = 'tracer_lulusan.akt_setelah_lulus';

    /** the column name for the nm_inst_perusahaan field */
    const NM_INST_PERUSAHAAN = 'tracer_lulusan.nm_inst_perusahaan';

    /** the column name for the nm_sp field */
    const NM_SP = 'tracer_lulusan.nm_sp';

    /** the column name for the nm_prodi field */
    const NM_PRODI = 'tracer_lulusan.nm_prodi';

    /** the column name for the ket_tracer field */
    const KET_TRACER = 'tracer_lulusan.ket_tracer';

    /** the column name for the pekerjaan_id field */
    const PEKERJAAN_ID = 'tracer_lulusan.pekerjaan_id';

    /** the column name for the dudi_id field */
    const DUDI_ID = 'tracer_lulusan.dudi_id';

    /** the column name for the bidang_usaha_id field */
    const BIDANG_USAHA_ID = 'tracer_lulusan.bidang_usaha_id';

    /** the column name for the id_prodi field */
    const ID_PRODI = 'tracer_lulusan.id_prodi';

    /** the column name for the stat_tracer field */
    const STAT_TRACER = 'tracer_lulusan.stat_tracer';

    /** the column name for the ikatan_kerja field */
    const IKATAN_KERJA = 'tracer_lulusan.ikatan_kerja';

    /** the column name for the a_sesuai_kompetensi field */
    const A_SESUAI_KOMPETENSI = 'tracer_lulusan.a_sesuai_kompetensi';

    /** the column name for the create_date field */
    const CREATE_DATE = 'tracer_lulusan.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'tracer_lulusan.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'tracer_lulusan.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'tracer_lulusan.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'tracer_lulusan.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of TracerLulusan objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array TracerLulusan[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. TracerLulusanPeer::$fieldNames[TracerLulusanPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdTracer', 'PenghasilanId', 'RegistrasiId', 'TglEntry', 'AktSetelahLulus', 'NmInstPerusahaan', 'NmSp', 'NmProdi', 'KetTracer', 'PekerjaanId', 'DudiId', 'BidangUsahaId', 'IdProdi', 'StatTracer', 'IkatanKerja', 'ASesuaiKompetensi', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idTracer', 'penghasilanId', 'registrasiId', 'tglEntry', 'aktSetelahLulus', 'nmInstPerusahaan', 'nmSp', 'nmProdi', 'ketTracer', 'pekerjaanId', 'dudiId', 'bidangUsahaId', 'idProdi', 'statTracer', 'ikatanKerja', 'aSesuaiKompetensi', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (TracerLulusanPeer::ID_TRACER, TracerLulusanPeer::PENGHASILAN_ID, TracerLulusanPeer::REGISTRASI_ID, TracerLulusanPeer::TGL_ENTRY, TracerLulusanPeer::AKT_SETELAH_LULUS, TracerLulusanPeer::NM_INST_PERUSAHAAN, TracerLulusanPeer::NM_SP, TracerLulusanPeer::NM_PRODI, TracerLulusanPeer::KET_TRACER, TracerLulusanPeer::PEKERJAAN_ID, TracerLulusanPeer::DUDI_ID, TracerLulusanPeer::BIDANG_USAHA_ID, TracerLulusanPeer::ID_PRODI, TracerLulusanPeer::STAT_TRACER, TracerLulusanPeer::IKATAN_KERJA, TracerLulusanPeer::A_SESUAI_KOMPETENSI, TracerLulusanPeer::CREATE_DATE, TracerLulusanPeer::LAST_UPDATE, TracerLulusanPeer::SOFT_DELETE, TracerLulusanPeer::LAST_SYNC, TracerLulusanPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_TRACER', 'PENGHASILAN_ID', 'REGISTRASI_ID', 'TGL_ENTRY', 'AKT_SETELAH_LULUS', 'NM_INST_PERUSAHAAN', 'NM_SP', 'NM_PRODI', 'KET_TRACER', 'PEKERJAAN_ID', 'DUDI_ID', 'BIDANG_USAHA_ID', 'ID_PRODI', 'STAT_TRACER', 'IKATAN_KERJA', 'A_SESUAI_KOMPETENSI', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_tracer', 'penghasilan_id', 'registrasi_id', 'tgl_entry', 'akt_setelah_lulus', 'nm_inst_perusahaan', 'nm_sp', 'nm_prodi', 'ket_tracer', 'pekerjaan_id', 'dudi_id', 'bidang_usaha_id', 'id_prodi', 'stat_tracer', 'ikatan_kerja', 'a_sesuai_kompetensi', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. TracerLulusanPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdTracer' => 0, 'PenghasilanId' => 1, 'RegistrasiId' => 2, 'TglEntry' => 3, 'AktSetelahLulus' => 4, 'NmInstPerusahaan' => 5, 'NmSp' => 6, 'NmProdi' => 7, 'KetTracer' => 8, 'PekerjaanId' => 9, 'DudiId' => 10, 'BidangUsahaId' => 11, 'IdProdi' => 12, 'StatTracer' => 13, 'IkatanKerja' => 14, 'ASesuaiKompetensi' => 15, 'CreateDate' => 16, 'LastUpdate' => 17, 'SoftDelete' => 18, 'LastSync' => 19, 'UpdaterId' => 20, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idTracer' => 0, 'penghasilanId' => 1, 'registrasiId' => 2, 'tglEntry' => 3, 'aktSetelahLulus' => 4, 'nmInstPerusahaan' => 5, 'nmSp' => 6, 'nmProdi' => 7, 'ketTracer' => 8, 'pekerjaanId' => 9, 'dudiId' => 10, 'bidangUsahaId' => 11, 'idProdi' => 12, 'statTracer' => 13, 'ikatanKerja' => 14, 'aSesuaiKompetensi' => 15, 'createDate' => 16, 'lastUpdate' => 17, 'softDelete' => 18, 'lastSync' => 19, 'updaterId' => 20, ),
        BasePeer::TYPE_COLNAME => array (TracerLulusanPeer::ID_TRACER => 0, TracerLulusanPeer::PENGHASILAN_ID => 1, TracerLulusanPeer::REGISTRASI_ID => 2, TracerLulusanPeer::TGL_ENTRY => 3, TracerLulusanPeer::AKT_SETELAH_LULUS => 4, TracerLulusanPeer::NM_INST_PERUSAHAAN => 5, TracerLulusanPeer::NM_SP => 6, TracerLulusanPeer::NM_PRODI => 7, TracerLulusanPeer::KET_TRACER => 8, TracerLulusanPeer::PEKERJAAN_ID => 9, TracerLulusanPeer::DUDI_ID => 10, TracerLulusanPeer::BIDANG_USAHA_ID => 11, TracerLulusanPeer::ID_PRODI => 12, TracerLulusanPeer::STAT_TRACER => 13, TracerLulusanPeer::IKATAN_KERJA => 14, TracerLulusanPeer::A_SESUAI_KOMPETENSI => 15, TracerLulusanPeer::CREATE_DATE => 16, TracerLulusanPeer::LAST_UPDATE => 17, TracerLulusanPeer::SOFT_DELETE => 18, TracerLulusanPeer::LAST_SYNC => 19, TracerLulusanPeer::UPDATER_ID => 20, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_TRACER' => 0, 'PENGHASILAN_ID' => 1, 'REGISTRASI_ID' => 2, 'TGL_ENTRY' => 3, 'AKT_SETELAH_LULUS' => 4, 'NM_INST_PERUSAHAAN' => 5, 'NM_SP' => 6, 'NM_PRODI' => 7, 'KET_TRACER' => 8, 'PEKERJAAN_ID' => 9, 'DUDI_ID' => 10, 'BIDANG_USAHA_ID' => 11, 'ID_PRODI' => 12, 'STAT_TRACER' => 13, 'IKATAN_KERJA' => 14, 'A_SESUAI_KOMPETENSI' => 15, 'CREATE_DATE' => 16, 'LAST_UPDATE' => 17, 'SOFT_DELETE' => 18, 'LAST_SYNC' => 19, 'UPDATER_ID' => 20, ),
        BasePeer::TYPE_FIELDNAME => array ('id_tracer' => 0, 'penghasilan_id' => 1, 'registrasi_id' => 2, 'tgl_entry' => 3, 'akt_setelah_lulus' => 4, 'nm_inst_perusahaan' => 5, 'nm_sp' => 6, 'nm_prodi' => 7, 'ket_tracer' => 8, 'pekerjaan_id' => 9, 'dudi_id' => 10, 'bidang_usaha_id' => 11, 'id_prodi' => 12, 'stat_tracer' => 13, 'ikatan_kerja' => 14, 'a_sesuai_kompetensi' => 15, 'create_date' => 16, 'last_update' => 17, 'soft_delete' => 18, 'last_sync' => 19, 'updater_id' => 20, ),
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
        $toNames = TracerLulusanPeer::getFieldNames($toType);
        $key = isset(TracerLulusanPeer::$fieldKeys[$fromType][$name]) ? TracerLulusanPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(TracerLulusanPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, TracerLulusanPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return TracerLulusanPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. TracerLulusanPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(TracerLulusanPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(TracerLulusanPeer::ID_TRACER);
            $criteria->addSelectColumn(TracerLulusanPeer::PENGHASILAN_ID);
            $criteria->addSelectColumn(TracerLulusanPeer::REGISTRASI_ID);
            $criteria->addSelectColumn(TracerLulusanPeer::TGL_ENTRY);
            $criteria->addSelectColumn(TracerLulusanPeer::AKT_SETELAH_LULUS);
            $criteria->addSelectColumn(TracerLulusanPeer::NM_INST_PERUSAHAAN);
            $criteria->addSelectColumn(TracerLulusanPeer::NM_SP);
            $criteria->addSelectColumn(TracerLulusanPeer::NM_PRODI);
            $criteria->addSelectColumn(TracerLulusanPeer::KET_TRACER);
            $criteria->addSelectColumn(TracerLulusanPeer::PEKERJAAN_ID);
            $criteria->addSelectColumn(TracerLulusanPeer::DUDI_ID);
            $criteria->addSelectColumn(TracerLulusanPeer::BIDANG_USAHA_ID);
            $criteria->addSelectColumn(TracerLulusanPeer::ID_PRODI);
            $criteria->addSelectColumn(TracerLulusanPeer::STAT_TRACER);
            $criteria->addSelectColumn(TracerLulusanPeer::IKATAN_KERJA);
            $criteria->addSelectColumn(TracerLulusanPeer::A_SESUAI_KOMPETENSI);
            $criteria->addSelectColumn(TracerLulusanPeer::CREATE_DATE);
            $criteria->addSelectColumn(TracerLulusanPeer::LAST_UPDATE);
            $criteria->addSelectColumn(TracerLulusanPeer::SOFT_DELETE);
            $criteria->addSelectColumn(TracerLulusanPeer::LAST_SYNC);
            $criteria->addSelectColumn(TracerLulusanPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_tracer');
            $criteria->addSelectColumn($alias . '.penghasilan_id');
            $criteria->addSelectColumn($alias . '.registrasi_id');
            $criteria->addSelectColumn($alias . '.tgl_entry');
            $criteria->addSelectColumn($alias . '.akt_setelah_lulus');
            $criteria->addSelectColumn($alias . '.nm_inst_perusahaan');
            $criteria->addSelectColumn($alias . '.nm_sp');
            $criteria->addSelectColumn($alias . '.nm_prodi');
            $criteria->addSelectColumn($alias . '.ket_tracer');
            $criteria->addSelectColumn($alias . '.pekerjaan_id');
            $criteria->addSelectColumn($alias . '.dudi_id');
            $criteria->addSelectColumn($alias . '.bidang_usaha_id');
            $criteria->addSelectColumn($alias . '.id_prodi');
            $criteria->addSelectColumn($alias . '.stat_tracer');
            $criteria->addSelectColumn($alias . '.ikatan_kerja');
            $criteria->addSelectColumn($alias . '.a_sesuai_kompetensi');
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
        $criteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TracerLulusan
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = TracerLulusanPeer::doSelect($critcopy, $con);
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
        return TracerLulusanPeer::populateObjects(TracerLulusanPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

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
     * @param      TracerLulusan $obj A TracerLulusan object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdTracer();
            } // if key === null
            TracerLulusanPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A TracerLulusan object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof TracerLulusan) {
                $key = (string) $value->getIdTracer();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or TracerLulusan object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(TracerLulusanPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   TracerLulusan Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(TracerLulusanPeer::$instances[$key])) {
                return TracerLulusanPeer::$instances[$key];
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
        foreach (TracerLulusanPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        TracerLulusanPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to tracer_lulusan
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
        $cls = TracerLulusanPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = TracerLulusanPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                TracerLulusanPeer::addInstanceToPool($obj, $key);
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
     * @return array (TracerLulusan object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = TracerLulusanPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + TracerLulusanPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = TracerLulusanPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            TracerLulusanPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Penghasilan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPenghasilan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TracerLulusanPeer::PENGHASILAN_ID, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related BidangUsaha table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBidangUsaha(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TracerLulusanPeer::BIDANG_USAHA_ID, BidangUsahaPeer::BIDANG_USAHA_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TracerLulusanPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Pekerjaan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPekerjaan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TracerLulusanPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RegistrasiPesertaDidik table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinRegistrasiPesertaDidik(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TracerLulusanPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

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
     * Selects a collection of TracerLulusan objects pre-filled with their Penghasilan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TracerLulusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPenghasilan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);
        }

        TracerLulusanPeer::addSelectColumns($criteria);
        $startcol = TracerLulusanPeer::NUM_HYDRATE_COLUMNS;
        PenghasilanPeer::addSelectColumns($criteria);

        $criteria->addJoin(TracerLulusanPeer::PENGHASILAN_ID, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TracerLulusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TracerLulusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TracerLulusanPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PenghasilanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PenghasilanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PenghasilanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TracerLulusan) to $obj2 (Penghasilan)
                $obj2->addTracerLulusan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TracerLulusan objects pre-filled with their BidangUsaha objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TracerLulusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBidangUsaha(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);
        }

        TracerLulusanPeer::addSelectColumns($criteria);
        $startcol = TracerLulusanPeer::NUM_HYDRATE_COLUMNS;
        BidangUsahaPeer::addSelectColumns($criteria);

        $criteria->addJoin(TracerLulusanPeer::BIDANG_USAHA_ID, BidangUsahaPeer::BIDANG_USAHA_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TracerLulusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TracerLulusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TracerLulusanPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BidangUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BidangUsahaPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BidangUsahaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BidangUsahaPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TracerLulusan) to $obj2 (BidangUsaha)
                $obj2->addTracerLulusan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TracerLulusan objects pre-filled with their Dudi objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TracerLulusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinDudi(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);
        }

        TracerLulusanPeer::addSelectColumns($criteria);
        $startcol = TracerLulusanPeer::NUM_HYDRATE_COLUMNS;
        DudiPeer::addSelectColumns($criteria);

        $criteria->addJoin(TracerLulusanPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TracerLulusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TracerLulusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TracerLulusanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (TracerLulusan) to $obj2 (Dudi)
                $obj2->addTracerLulusan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TracerLulusan objects pre-filled with their Pekerjaan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TracerLulusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPekerjaan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);
        }

        TracerLulusanPeer::addSelectColumns($criteria);
        $startcol = TracerLulusanPeer::NUM_HYDRATE_COLUMNS;
        PekerjaanPeer::addSelectColumns($criteria);

        $criteria->addJoin(TracerLulusanPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TracerLulusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TracerLulusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TracerLulusanPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PekerjaanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PekerjaanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PekerjaanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TracerLulusan) to $obj2 (Pekerjaan)
                $obj2->addTracerLulusan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TracerLulusan objects pre-filled with their RegistrasiPesertaDidik objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TracerLulusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRegistrasiPesertaDidik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);
        }

        TracerLulusanPeer::addSelectColumns($criteria);
        $startcol = TracerLulusanPeer::NUM_HYDRATE_COLUMNS;
        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);

        $criteria->addJoin(TracerLulusanPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TracerLulusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = TracerLulusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TracerLulusanPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = RegistrasiPesertaDidikPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    RegistrasiPesertaDidikPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (TracerLulusan) to $obj2 (RegistrasiPesertaDidik)
                $obj2->addTracerLulusan($obj1);

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
        $criteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(TracerLulusanPeer::PENGHASILAN_ID, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::BIDANG_USAHA_ID, BidangUsahaPeer::BIDANG_USAHA_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

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
     * Selects a collection of TracerLulusan objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TracerLulusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);
        }

        TracerLulusanPeer::addSelectColumns($criteria);
        $startcol2 = TracerLulusanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        BidangUsahaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BidangUsahaPeer::NUM_HYDRATE_COLUMNS;

        DudiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + DudiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TracerLulusanPeer::PENGHASILAN_ID, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::BIDANG_USAHA_ID, BidangUsahaPeer::BIDANG_USAHA_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TracerLulusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TracerLulusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TracerLulusanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Penghasilan rows

            $key2 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = PenghasilanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PenghasilanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PenghasilanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj2 (Penghasilan)
                $obj2->addTracerLulusan($obj1);
            } // if joined row not null

            // Add objects for joined BidangUsaha rows

            $key3 = BidangUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = BidangUsahaPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = BidangUsahaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BidangUsahaPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj3 (BidangUsaha)
                $obj3->addTracerLulusan($obj1);
            } // if joined row not null

            // Add objects for joined Dudi rows

            $key4 = DudiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = DudiPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = DudiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    DudiPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj4 (Dudi)
                $obj4->addTracerLulusan($obj1);
            } // if joined row not null

            // Add objects for joined Pekerjaan rows

            $key5 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = PekerjaanPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = PekerjaanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PekerjaanPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj5 (Pekerjaan)
                $obj5->addTracerLulusan($obj1);
            } // if joined row not null

            // Add objects for joined RegistrasiPesertaDidik rows

            $key6 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = RegistrasiPesertaDidikPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    RegistrasiPesertaDidikPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj6 (RegistrasiPesertaDidik)
                $obj6->addTracerLulusan($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Penghasilan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPenghasilan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TracerLulusanPeer::BIDANG_USAHA_ID, BidangUsahaPeer::BIDANG_USAHA_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related BidangUsaha table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBidangUsaha(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TracerLulusanPeer::PENGHASILAN_ID, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TracerLulusanPeer::PENGHASILAN_ID, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::BIDANG_USAHA_ID, BidangUsahaPeer::BIDANG_USAHA_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Pekerjaan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPekerjaan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TracerLulusanPeer::PENGHASILAN_ID, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::BIDANG_USAHA_ID, BidangUsahaPeer::BIDANG_USAHA_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related RegistrasiPesertaDidik table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptRegistrasiPesertaDidik(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            TracerLulusanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(TracerLulusanPeer::PENGHASILAN_ID, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::BIDANG_USAHA_ID, BidangUsahaPeer::BIDANG_USAHA_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

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
     * Selects a collection of TracerLulusan objects pre-filled with all related objects except Penghasilan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TracerLulusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPenghasilan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);
        }

        TracerLulusanPeer::addSelectColumns($criteria);
        $startcol2 = TracerLulusanPeer::NUM_HYDRATE_COLUMNS;

        BidangUsahaPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BidangUsahaPeer::NUM_HYDRATE_COLUMNS;

        DudiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + DudiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TracerLulusanPeer::BIDANG_USAHA_ID, BidangUsahaPeer::BIDANG_USAHA_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TracerLulusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TracerLulusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TracerLulusanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined BidangUsaha rows

                $key2 = BidangUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BidangUsahaPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BidangUsahaPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BidangUsahaPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj2 (BidangUsaha)
                $obj2->addTracerLulusan($obj1);

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

                // Add the $obj1 (TracerLulusan) to the collection in $obj3 (Dudi)
                $obj3->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key4 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PekerjaanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PekerjaanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj4 (Pekerjaan)
                $obj4->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined RegistrasiPesertaDidik rows

                $key5 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = RegistrasiPesertaDidikPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RegistrasiPesertaDidikPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj5 (RegistrasiPesertaDidik)
                $obj5->addTracerLulusan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TracerLulusan objects pre-filled with all related objects except BidangUsaha.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TracerLulusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBidangUsaha(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);
        }

        TracerLulusanPeer::addSelectColumns($criteria);
        $startcol2 = TracerLulusanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        DudiPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + DudiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TracerLulusanPeer::PENGHASILAN_ID, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TracerLulusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TracerLulusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TracerLulusanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Penghasilan rows

                $key2 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PenghasilanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PenghasilanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj2 (Penghasilan)
                $obj2->addTracerLulusan($obj1);

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

                // Add the $obj1 (TracerLulusan) to the collection in $obj3 (Dudi)
                $obj3->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key4 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PekerjaanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PekerjaanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj4 (Pekerjaan)
                $obj4->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined RegistrasiPesertaDidik rows

                $key5 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = RegistrasiPesertaDidikPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RegistrasiPesertaDidikPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj5 (RegistrasiPesertaDidik)
                $obj5->addTracerLulusan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TracerLulusan objects pre-filled with all related objects except Dudi.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TracerLulusan objects.
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
            $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);
        }

        TracerLulusanPeer::addSelectColumns($criteria);
        $startcol2 = TracerLulusanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        BidangUsahaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BidangUsahaPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TracerLulusanPeer::PENGHASILAN_ID, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::BIDANG_USAHA_ID, BidangUsahaPeer::BIDANG_USAHA_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TracerLulusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TracerLulusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TracerLulusanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Penghasilan rows

                $key2 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PenghasilanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PenghasilanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj2 (Penghasilan)
                $obj2->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined BidangUsaha rows

                $key3 = BidangUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BidangUsahaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BidangUsahaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BidangUsahaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj3 (BidangUsaha)
                $obj3->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key4 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PekerjaanPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PekerjaanPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj4 (Pekerjaan)
                $obj4->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined RegistrasiPesertaDidik rows

                $key5 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = RegistrasiPesertaDidikPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RegistrasiPesertaDidikPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj5 (RegistrasiPesertaDidik)
                $obj5->addTracerLulusan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TracerLulusan objects pre-filled with all related objects except Pekerjaan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TracerLulusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPekerjaan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);
        }

        TracerLulusanPeer::addSelectColumns($criteria);
        $startcol2 = TracerLulusanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        BidangUsahaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BidangUsahaPeer::NUM_HYDRATE_COLUMNS;

        DudiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + DudiPeer::NUM_HYDRATE_COLUMNS;

        RegistrasiPesertaDidikPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + RegistrasiPesertaDidikPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TracerLulusanPeer::PENGHASILAN_ID, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::BIDANG_USAHA_ID, BidangUsahaPeer::BIDANG_USAHA_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::REGISTRASI_ID, RegistrasiPesertaDidikPeer::REGISTRASI_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TracerLulusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TracerLulusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TracerLulusanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Penghasilan rows

                $key2 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PenghasilanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PenghasilanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj2 (Penghasilan)
                $obj2->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined BidangUsaha rows

                $key3 = BidangUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BidangUsahaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BidangUsahaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BidangUsahaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj3 (BidangUsaha)
                $obj3->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined Dudi rows

                $key4 = DudiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = DudiPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = DudiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    DudiPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj4 (Dudi)
                $obj4->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined RegistrasiPesertaDidik rows

                $key5 = RegistrasiPesertaDidikPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = RegistrasiPesertaDidikPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = RegistrasiPesertaDidikPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    RegistrasiPesertaDidikPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj5 (RegistrasiPesertaDidik)
                $obj5->addTracerLulusan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of TracerLulusan objects pre-filled with all related objects except RegistrasiPesertaDidik.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of TracerLulusan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptRegistrasiPesertaDidik(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);
        }

        TracerLulusanPeer::addSelectColumns($criteria);
        $startcol2 = TracerLulusanPeer::NUM_HYDRATE_COLUMNS;

        PenghasilanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + PenghasilanPeer::NUM_HYDRATE_COLUMNS;

        BidangUsahaPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BidangUsahaPeer::NUM_HYDRATE_COLUMNS;

        DudiPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + DudiPeer::NUM_HYDRATE_COLUMNS;

        PekerjaanPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PekerjaanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(TracerLulusanPeer::PENGHASILAN_ID, PenghasilanPeer::PENGHASILAN_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::BIDANG_USAHA_ID, BidangUsahaPeer::BIDANG_USAHA_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::DUDI_ID, DudiPeer::DUDI_ID, $join_behavior);

        $criteria->addJoin(TracerLulusanPeer::PEKERJAAN_ID, PekerjaanPeer::PEKERJAAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = TracerLulusanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = TracerLulusanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = TracerLulusanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                TracerLulusanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Penghasilan rows

                $key2 = PenghasilanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = PenghasilanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = PenghasilanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    PenghasilanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj2 (Penghasilan)
                $obj2->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined BidangUsaha rows

                $key3 = BidangUsahaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = BidangUsahaPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = BidangUsahaPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BidangUsahaPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj3 (BidangUsaha)
                $obj3->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined Dudi rows

                $key4 = DudiPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = DudiPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = DudiPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    DudiPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj4 (Dudi)
                $obj4->addTracerLulusan($obj1);

            } // if joined row is not null

                // Add objects for joined Pekerjaan rows

                $key5 = PekerjaanPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = PekerjaanPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = PekerjaanPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PekerjaanPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (TracerLulusan) to the collection in $obj5 (Pekerjaan)
                $obj5->addTracerLulusan($obj1);

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
        return Propel::getDatabaseMap(TracerLulusanPeer::DATABASE_NAME)->getTable(TracerLulusanPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseTracerLulusanPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseTracerLulusanPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new TracerLulusanTableMap());
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
        return TracerLulusanPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a TracerLulusan or Criteria object.
     *
     * @param      mixed $values Criteria or TracerLulusan object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from TracerLulusan object
        }


        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a TracerLulusan or Criteria object.
     *
     * @param      mixed $values Criteria or TracerLulusan object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(TracerLulusanPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(TracerLulusanPeer::ID_TRACER);
            $value = $criteria->remove(TracerLulusanPeer::ID_TRACER);
            if ($value) {
                $selectCriteria->add(TracerLulusanPeer::ID_TRACER, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(TracerLulusanPeer::TABLE_NAME);
            }

        } else { // $values is TracerLulusan object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the tracer_lulusan table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(TracerLulusanPeer::TABLE_NAME, $con, TracerLulusanPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TracerLulusanPeer::clearInstancePool();
            TracerLulusanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a TracerLulusan or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or TracerLulusan object or primary key or array of primary keys
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
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            TracerLulusanPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof TracerLulusan) { // it's a model object
            // invalidate the cache for this single object
            TracerLulusanPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(TracerLulusanPeer::DATABASE_NAME);
            $criteria->add(TracerLulusanPeer::ID_TRACER, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                TracerLulusanPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(TracerLulusanPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            TracerLulusanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given TracerLulusan object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      TracerLulusan $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(TracerLulusanPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(TracerLulusanPeer::TABLE_NAME);

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

        return BasePeer::doValidate(TracerLulusanPeer::DATABASE_NAME, TracerLulusanPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return TracerLulusan
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = TracerLulusanPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(TracerLulusanPeer::DATABASE_NAME);
        $criteria->add(TracerLulusanPeer::ID_TRACER, $pk);

        $v = TracerLulusanPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return TracerLulusan[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(TracerLulusanPeer::DATABASE_NAME);
            $criteria->add(TracerLulusanPeer::ID_TRACER, $pks, Criteria::IN);
            $objs = TracerLulusanPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseTracerLulusanPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseTracerLulusanPeer::buildTableMap();

