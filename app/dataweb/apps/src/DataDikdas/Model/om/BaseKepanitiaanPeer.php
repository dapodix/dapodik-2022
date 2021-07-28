<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\JenisKepanitiaanPeer;
use DataDikdas\Model\Kepanitiaan;
use DataDikdas\Model\KepanitiaanPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\map\KepanitiaanTableMap;

/**
 * Base static class for performing query and update operations on the 'kepanitiaan' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseKepanitiaanPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'kepanitiaan';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Kepanitiaan';

    /** the related TableMap class for this table */
    const TM_CLASS = 'KepanitiaanTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 20;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 20;

    /** the column name for the id_panitia field */
    const ID_PANITIA = 'kepanitiaan.id_panitia';

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'kepanitiaan.sekolah_id';

    /** the column name for the id_jns_panitia field */
    const ID_JNS_PANITIA = 'kepanitiaan.id_jns_panitia';

    /** the column name for the nm_panitia field */
    const NM_PANITIA = 'kepanitiaan.nm_panitia';

    /** the column name for the instansi field */
    const INSTANSI = 'kepanitiaan.instansi';

    /** the column name for the tkt_panitia field */
    const TKT_PANITIA = 'kepanitiaan.tkt_panitia';

    /** the column name for the sk_tugas field */
    const SK_TUGAS = 'kepanitiaan.sk_tugas';

    /** the column name for the tmt_sk_tugas field */
    const TMT_SK_TUGAS = 'kepanitiaan.tmt_sk_tugas';

    /** the column name for the tst_sk_tugas field */
    const TST_SK_TUGAS = 'kepanitiaan.tst_sk_tugas';

    /** the column name for the a_pasang_papan field */
    const A_PASANG_PAPAN = 'kepanitiaan.a_pasang_papan';

    /** the column name for the a_formulir field */
    const A_FORMULIR = 'kepanitiaan.a_formulir';

    /** the column name for the a_silabus field */
    const A_SILABUS = 'kepanitiaan.a_silabus';

    /** the column name for the a_berlaku_pos field */
    const A_BERLAKU_POS = 'kepanitiaan.a_berlaku_pos';

    /** the column name for the a_sosialisasi_pos field */
    const A_SOSIALISASI_POS = 'kepanitiaan.a_sosialisasi_pos';

    /** the column name for the a_ks_edukatif field */
    const A_KS_EDUKATIF = 'kepanitiaan.a_ks_edukatif';

    /** the column name for the create_date field */
    const CREATE_DATE = 'kepanitiaan.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'kepanitiaan.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'kepanitiaan.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'kepanitiaan.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'kepanitiaan.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Kepanitiaan objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Kepanitiaan[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. KepanitiaanPeer::$fieldNames[KepanitiaanPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdPanitia', 'SekolahId', 'IdJnsPanitia', 'NmPanitia', 'Instansi', 'TktPanitia', 'SkTugas', 'TmtSkTugas', 'TstSkTugas', 'APasangPapan', 'AFormulir', 'ASilabus', 'ABerlakuPos', 'ASosialisasiPos', 'AKsEdukatif', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idPanitia', 'sekolahId', 'idJnsPanitia', 'nmPanitia', 'instansi', 'tktPanitia', 'skTugas', 'tmtSkTugas', 'tstSkTugas', 'aPasangPapan', 'aFormulir', 'aSilabus', 'aBerlakuPos', 'aSosialisasiPos', 'aKsEdukatif', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (KepanitiaanPeer::ID_PANITIA, KepanitiaanPeer::SEKOLAH_ID, KepanitiaanPeer::ID_JNS_PANITIA, KepanitiaanPeer::NM_PANITIA, KepanitiaanPeer::INSTANSI, KepanitiaanPeer::TKT_PANITIA, KepanitiaanPeer::SK_TUGAS, KepanitiaanPeer::TMT_SK_TUGAS, KepanitiaanPeer::TST_SK_TUGAS, KepanitiaanPeer::A_PASANG_PAPAN, KepanitiaanPeer::A_FORMULIR, KepanitiaanPeer::A_SILABUS, KepanitiaanPeer::A_BERLAKU_POS, KepanitiaanPeer::A_SOSIALISASI_POS, KepanitiaanPeer::A_KS_EDUKATIF, KepanitiaanPeer::CREATE_DATE, KepanitiaanPeer::LAST_UPDATE, KepanitiaanPeer::SOFT_DELETE, KepanitiaanPeer::LAST_SYNC, KepanitiaanPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_PANITIA', 'SEKOLAH_ID', 'ID_JNS_PANITIA', 'NM_PANITIA', 'INSTANSI', 'TKT_PANITIA', 'SK_TUGAS', 'TMT_SK_TUGAS', 'TST_SK_TUGAS', 'A_PASANG_PAPAN', 'A_FORMULIR', 'A_SILABUS', 'A_BERLAKU_POS', 'A_SOSIALISASI_POS', 'A_KS_EDUKATIF', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_panitia', 'sekolah_id', 'id_jns_panitia', 'nm_panitia', 'instansi', 'tkt_panitia', 'sk_tugas', 'tmt_sk_tugas', 'tst_sk_tugas', 'a_pasang_papan', 'a_formulir', 'a_silabus', 'a_berlaku_pos', 'a_sosialisasi_pos', 'a_ks_edukatif', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. KepanitiaanPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdPanitia' => 0, 'SekolahId' => 1, 'IdJnsPanitia' => 2, 'NmPanitia' => 3, 'Instansi' => 4, 'TktPanitia' => 5, 'SkTugas' => 6, 'TmtSkTugas' => 7, 'TstSkTugas' => 8, 'APasangPapan' => 9, 'AFormulir' => 10, 'ASilabus' => 11, 'ABerlakuPos' => 12, 'ASosialisasiPos' => 13, 'AKsEdukatif' => 14, 'CreateDate' => 15, 'LastUpdate' => 16, 'SoftDelete' => 17, 'LastSync' => 18, 'UpdaterId' => 19, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idPanitia' => 0, 'sekolahId' => 1, 'idJnsPanitia' => 2, 'nmPanitia' => 3, 'instansi' => 4, 'tktPanitia' => 5, 'skTugas' => 6, 'tmtSkTugas' => 7, 'tstSkTugas' => 8, 'aPasangPapan' => 9, 'aFormulir' => 10, 'aSilabus' => 11, 'aBerlakuPos' => 12, 'aSosialisasiPos' => 13, 'aKsEdukatif' => 14, 'createDate' => 15, 'lastUpdate' => 16, 'softDelete' => 17, 'lastSync' => 18, 'updaterId' => 19, ),
        BasePeer::TYPE_COLNAME => array (KepanitiaanPeer::ID_PANITIA => 0, KepanitiaanPeer::SEKOLAH_ID => 1, KepanitiaanPeer::ID_JNS_PANITIA => 2, KepanitiaanPeer::NM_PANITIA => 3, KepanitiaanPeer::INSTANSI => 4, KepanitiaanPeer::TKT_PANITIA => 5, KepanitiaanPeer::SK_TUGAS => 6, KepanitiaanPeer::TMT_SK_TUGAS => 7, KepanitiaanPeer::TST_SK_TUGAS => 8, KepanitiaanPeer::A_PASANG_PAPAN => 9, KepanitiaanPeer::A_FORMULIR => 10, KepanitiaanPeer::A_SILABUS => 11, KepanitiaanPeer::A_BERLAKU_POS => 12, KepanitiaanPeer::A_SOSIALISASI_POS => 13, KepanitiaanPeer::A_KS_EDUKATIF => 14, KepanitiaanPeer::CREATE_DATE => 15, KepanitiaanPeer::LAST_UPDATE => 16, KepanitiaanPeer::SOFT_DELETE => 17, KepanitiaanPeer::LAST_SYNC => 18, KepanitiaanPeer::UPDATER_ID => 19, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_PANITIA' => 0, 'SEKOLAH_ID' => 1, 'ID_JNS_PANITIA' => 2, 'NM_PANITIA' => 3, 'INSTANSI' => 4, 'TKT_PANITIA' => 5, 'SK_TUGAS' => 6, 'TMT_SK_TUGAS' => 7, 'TST_SK_TUGAS' => 8, 'A_PASANG_PAPAN' => 9, 'A_FORMULIR' => 10, 'A_SILABUS' => 11, 'A_BERLAKU_POS' => 12, 'A_SOSIALISASI_POS' => 13, 'A_KS_EDUKATIF' => 14, 'CREATE_DATE' => 15, 'LAST_UPDATE' => 16, 'SOFT_DELETE' => 17, 'LAST_SYNC' => 18, 'UPDATER_ID' => 19, ),
        BasePeer::TYPE_FIELDNAME => array ('id_panitia' => 0, 'sekolah_id' => 1, 'id_jns_panitia' => 2, 'nm_panitia' => 3, 'instansi' => 4, 'tkt_panitia' => 5, 'sk_tugas' => 6, 'tmt_sk_tugas' => 7, 'tst_sk_tugas' => 8, 'a_pasang_papan' => 9, 'a_formulir' => 10, 'a_silabus' => 11, 'a_berlaku_pos' => 12, 'a_sosialisasi_pos' => 13, 'a_ks_edukatif' => 14, 'create_date' => 15, 'last_update' => 16, 'soft_delete' => 17, 'last_sync' => 18, 'updater_id' => 19, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, )
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
        $toNames = KepanitiaanPeer::getFieldNames($toType);
        $key = isset(KepanitiaanPeer::$fieldKeys[$fromType][$name]) ? KepanitiaanPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(KepanitiaanPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, KepanitiaanPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return KepanitiaanPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. KepanitiaanPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(KepanitiaanPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(KepanitiaanPeer::ID_PANITIA);
            $criteria->addSelectColumn(KepanitiaanPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(KepanitiaanPeer::ID_JNS_PANITIA);
            $criteria->addSelectColumn(KepanitiaanPeer::NM_PANITIA);
            $criteria->addSelectColumn(KepanitiaanPeer::INSTANSI);
            $criteria->addSelectColumn(KepanitiaanPeer::TKT_PANITIA);
            $criteria->addSelectColumn(KepanitiaanPeer::SK_TUGAS);
            $criteria->addSelectColumn(KepanitiaanPeer::TMT_SK_TUGAS);
            $criteria->addSelectColumn(KepanitiaanPeer::TST_SK_TUGAS);
            $criteria->addSelectColumn(KepanitiaanPeer::A_PASANG_PAPAN);
            $criteria->addSelectColumn(KepanitiaanPeer::A_FORMULIR);
            $criteria->addSelectColumn(KepanitiaanPeer::A_SILABUS);
            $criteria->addSelectColumn(KepanitiaanPeer::A_BERLAKU_POS);
            $criteria->addSelectColumn(KepanitiaanPeer::A_SOSIALISASI_POS);
            $criteria->addSelectColumn(KepanitiaanPeer::A_KS_EDUKATIF);
            $criteria->addSelectColumn(KepanitiaanPeer::CREATE_DATE);
            $criteria->addSelectColumn(KepanitiaanPeer::LAST_UPDATE);
            $criteria->addSelectColumn(KepanitiaanPeer::SOFT_DELETE);
            $criteria->addSelectColumn(KepanitiaanPeer::LAST_SYNC);
            $criteria->addSelectColumn(KepanitiaanPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_panitia');
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.id_jns_panitia');
            $criteria->addSelectColumn($alias . '.nm_panitia');
            $criteria->addSelectColumn($alias . '.instansi');
            $criteria->addSelectColumn($alias . '.tkt_panitia');
            $criteria->addSelectColumn($alias . '.sk_tugas');
            $criteria->addSelectColumn($alias . '.tmt_sk_tugas');
            $criteria->addSelectColumn($alias . '.tst_sk_tugas');
            $criteria->addSelectColumn($alias . '.a_pasang_papan');
            $criteria->addSelectColumn($alias . '.a_formulir');
            $criteria->addSelectColumn($alias . '.a_silabus');
            $criteria->addSelectColumn($alias . '.a_berlaku_pos');
            $criteria->addSelectColumn($alias . '.a_sosialisasi_pos');
            $criteria->addSelectColumn($alias . '.a_ks_edukatif');
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
        $criteria->setPrimaryTableName(KepanitiaanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KepanitiaanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Kepanitiaan
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = KepanitiaanPeer::doSelect($critcopy, $con);
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
        return KepanitiaanPeer::populateObjects(KepanitiaanPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            KepanitiaanPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);

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
     * @param      Kepanitiaan $obj A Kepanitiaan object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getIdPanitia();
            } // if key === null
            KepanitiaanPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Kepanitiaan object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Kepanitiaan) {
                $key = (string) $value->getIdPanitia();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Kepanitiaan object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(KepanitiaanPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Kepanitiaan Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(KepanitiaanPeer::$instances[$key])) {
                return KepanitiaanPeer::$instances[$key];
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
        foreach (KepanitiaanPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        KepanitiaanPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to kepanitiaan
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
        $cls = KepanitiaanPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = KepanitiaanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = KepanitiaanPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                KepanitiaanPeer::addInstanceToPool($obj, $key);
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
     * @return array (Kepanitiaan object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = KepanitiaanPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = KepanitiaanPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + KepanitiaanPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = KepanitiaanPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            KepanitiaanPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisKepanitiaan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinJenisKepanitiaan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(KepanitiaanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KepanitiaanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KepanitiaanPeer::ID_JNS_PANITIA, JenisKepanitiaanPeer::ID_JNS_PANITIA, $join_behavior);

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
        $criteria->setPrimaryTableName(KepanitiaanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KepanitiaanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KepanitiaanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of Kepanitiaan objects pre-filled with their JenisKepanitiaan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kepanitiaan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinJenisKepanitiaan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);
        }

        KepanitiaanPeer::addSelectColumns($criteria);
        $startcol = KepanitiaanPeer::NUM_HYDRATE_COLUMNS;
        JenisKepanitiaanPeer::addSelectColumns($criteria);

        $criteria->addJoin(KepanitiaanPeer::ID_JNS_PANITIA, JenisKepanitiaanPeer::ID_JNS_PANITIA, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KepanitiaanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KepanitiaanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = KepanitiaanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KepanitiaanPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = JenisKepanitiaanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = JenisKepanitiaanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisKepanitiaanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    JenisKepanitiaanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Kepanitiaan) to $obj2 (JenisKepanitiaan)
                $obj2->addKepanitiaan($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Kepanitiaan objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kepanitiaan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);
        }

        KepanitiaanPeer::addSelectColumns($criteria);
        $startcol = KepanitiaanPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(KepanitiaanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KepanitiaanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KepanitiaanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = KepanitiaanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KepanitiaanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Kepanitiaan) to $obj2 (Sekolah)
                $obj2->addKepanitiaan($obj1);

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
        $criteria->setPrimaryTableName(KepanitiaanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KepanitiaanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(KepanitiaanPeer::ID_JNS_PANITIA, JenisKepanitiaanPeer::ID_JNS_PANITIA, $join_behavior);

        $criteria->addJoin(KepanitiaanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
     * Selects a collection of Kepanitiaan objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kepanitiaan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);
        }

        KepanitiaanPeer::addSelectColumns($criteria);
        $startcol2 = KepanitiaanPeer::NUM_HYDRATE_COLUMNS;

        JenisKepanitiaanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisKepanitiaanPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KepanitiaanPeer::ID_JNS_PANITIA, JenisKepanitiaanPeer::ID_JNS_PANITIA, $join_behavior);

        $criteria->addJoin(KepanitiaanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KepanitiaanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KepanitiaanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KepanitiaanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KepanitiaanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined JenisKepanitiaan rows

            $key2 = JenisKepanitiaanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = JenisKepanitiaanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = JenisKepanitiaanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisKepanitiaanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Kepanitiaan) to the collection in $obj2 (JenisKepanitiaan)
                $obj2->addKepanitiaan($obj1);
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

                // Add the $obj1 (Kepanitiaan) to the collection in $obj3 (Sekolah)
                $obj3->addKepanitiaan($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related JenisKepanitiaan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptJenisKepanitiaan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(KepanitiaanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KepanitiaanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(KepanitiaanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(KepanitiaanPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            KepanitiaanPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(KepanitiaanPeer::ID_JNS_PANITIA, JenisKepanitiaanPeer::ID_JNS_PANITIA, $join_behavior);

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
     * Selects a collection of Kepanitiaan objects pre-filled with all related objects except JenisKepanitiaan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kepanitiaan objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptJenisKepanitiaan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);
        }

        KepanitiaanPeer::addSelectColumns($criteria);
        $startcol2 = KepanitiaanPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KepanitiaanPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KepanitiaanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KepanitiaanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KepanitiaanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KepanitiaanPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Kepanitiaan) to the collection in $obj2 (Sekolah)
                $obj2->addKepanitiaan($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Kepanitiaan objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Kepanitiaan objects.
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
            $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);
        }

        KepanitiaanPeer::addSelectColumns($criteria);
        $startcol2 = KepanitiaanPeer::NUM_HYDRATE_COLUMNS;

        JenisKepanitiaanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + JenisKepanitiaanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(KepanitiaanPeer::ID_JNS_PANITIA, JenisKepanitiaanPeer::ID_JNS_PANITIA, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = KepanitiaanPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = KepanitiaanPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = KepanitiaanPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                KepanitiaanPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined JenisKepanitiaan rows

                $key2 = JenisKepanitiaanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = JenisKepanitiaanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = JenisKepanitiaanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    JenisKepanitiaanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Kepanitiaan) to the collection in $obj2 (JenisKepanitiaan)
                $obj2->addKepanitiaan($obj1);

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
        return Propel::getDatabaseMap(KepanitiaanPeer::DATABASE_NAME)->getTable(KepanitiaanPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseKepanitiaanPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseKepanitiaanPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new KepanitiaanTableMap());
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
        return KepanitiaanPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Kepanitiaan or Criteria object.
     *
     * @param      mixed $values Criteria or Kepanitiaan object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Kepanitiaan object
        }


        // Set the correct dbName
        $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Kepanitiaan or Criteria object.
     *
     * @param      mixed $values Criteria or Kepanitiaan object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(KepanitiaanPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(KepanitiaanPeer::ID_PANITIA);
            $value = $criteria->remove(KepanitiaanPeer::ID_PANITIA);
            if ($value) {
                $selectCriteria->add(KepanitiaanPeer::ID_PANITIA, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(KepanitiaanPeer::TABLE_NAME);
            }

        } else { // $values is Kepanitiaan object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the kepanitiaan table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(KepanitiaanPeer::TABLE_NAME, $con, KepanitiaanPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KepanitiaanPeer::clearInstancePool();
            KepanitiaanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Kepanitiaan or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Kepanitiaan object or primary key or array of primary keys
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
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            KepanitiaanPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Kepanitiaan) { // it's a model object
            // invalidate the cache for this single object
            KepanitiaanPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(KepanitiaanPeer::DATABASE_NAME);
            $criteria->add(KepanitiaanPeer::ID_PANITIA, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                KepanitiaanPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(KepanitiaanPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            KepanitiaanPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Kepanitiaan object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Kepanitiaan $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(KepanitiaanPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(KepanitiaanPeer::TABLE_NAME);

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

        return BasePeer::doValidate(KepanitiaanPeer::DATABASE_NAME, KepanitiaanPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return Kepanitiaan
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = KepanitiaanPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(KepanitiaanPeer::DATABASE_NAME);
        $criteria->add(KepanitiaanPeer::ID_PANITIA, $pk);

        $v = KepanitiaanPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return Kepanitiaan[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(KepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(KepanitiaanPeer::DATABASE_NAME);
            $criteria->add(KepanitiaanPeer::ID_PANITIA, $pks, Criteria::IN);
            $objs = KepanitiaanPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseKepanitiaanPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseKepanitiaanPeer::buildTableMap();

