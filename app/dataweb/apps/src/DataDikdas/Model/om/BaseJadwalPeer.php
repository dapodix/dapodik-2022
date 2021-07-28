<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\Jadwal;
use DataDikdas\Model\JadwalPeer;
use DataDikdas\Model\PembelajaranPeer;
use DataDikdas\Model\RuangPeer;
use DataDikdas\Model\SekolahLongitudinalPeer;
use DataDikdas\Model\map\JadwalTableMap;

/**
 * Base static class for performing query and update operations on the 'jadwal' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseJadwalPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'jadwal';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Jadwal';

    /** the related TableMap class for this table */
    const TM_CLASS = 'JadwalTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 29;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 29;

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'jadwal.sekolah_id';

    /** the column name for the semester_id field */
    const SEMESTER_ID = 'jadwal.semester_id';

    /** the column name for the id_ruang field */
    const ID_RUANG = 'jadwal.id_ruang';

    /** the column name for the hari field */
    const HARI = 'jadwal.hari';

    /** the column name for the bel_ke_01 field */
    const BEL_KE_01 = 'jadwal.bel_ke_01';

    /** the column name for the bel_ke_02 field */
    const BEL_KE_02 = 'jadwal.bel_ke_02';

    /** the column name for the bel_ke_03 field */
    const BEL_KE_03 = 'jadwal.bel_ke_03';

    /** the column name for the bel_ke_04 field */
    const BEL_KE_04 = 'jadwal.bel_ke_04';

    /** the column name for the bel_ke_05 field */
    const BEL_KE_05 = 'jadwal.bel_ke_05';

    /** the column name for the bel_ke_06 field */
    const BEL_KE_06 = 'jadwal.bel_ke_06';

    /** the column name for the bel_ke_07 field */
    const BEL_KE_07 = 'jadwal.bel_ke_07';

    /** the column name for the bel_ke_08 field */
    const BEL_KE_08 = 'jadwal.bel_ke_08';

    /** the column name for the bel_ke_09 field */
    const BEL_KE_09 = 'jadwal.bel_ke_09';

    /** the column name for the bel_ke_10 field */
    const BEL_KE_10 = 'jadwal.bel_ke_10';

    /** the column name for the bel_ke_11 field */
    const BEL_KE_11 = 'jadwal.bel_ke_11';

    /** the column name for the bel_ke_12 field */
    const BEL_KE_12 = 'jadwal.bel_ke_12';

    /** the column name for the bel_ke_13 field */
    const BEL_KE_13 = 'jadwal.bel_ke_13';

    /** the column name for the bel_ke_14 field */
    const BEL_KE_14 = 'jadwal.bel_ke_14';

    /** the column name for the bel_ke_15 field */
    const BEL_KE_15 = 'jadwal.bel_ke_15';

    /** the column name for the bel_ke_16 field */
    const BEL_KE_16 = 'jadwal.bel_ke_16';

    /** the column name for the bel_ke_17 field */
    const BEL_KE_17 = 'jadwal.bel_ke_17';

    /** the column name for the bel_ke_18 field */
    const BEL_KE_18 = 'jadwal.bel_ke_18';

    /** the column name for the bel_ke_19 field */
    const BEL_KE_19 = 'jadwal.bel_ke_19';

    /** the column name for the bel_ke_20 field */
    const BEL_KE_20 = 'jadwal.bel_ke_20';

    /** the column name for the create_date field */
    const CREATE_DATE = 'jadwal.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'jadwal.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'jadwal.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'jadwal.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'jadwal.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Jadwal objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Jadwal[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. JadwalPeer::$fieldNames[JadwalPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('SekolahId', 'SemesterId', 'IdRuang', 'Hari', 'BelKe01', 'BelKe02', 'BelKe03', 'BelKe04', 'BelKe05', 'BelKe06', 'BelKe07', 'BelKe08', 'BelKe09', 'BelKe10', 'BelKe11', 'BelKe12', 'BelKe13', 'BelKe14', 'BelKe15', 'BelKe16', 'BelKe17', 'BelKe18', 'BelKe19', 'BelKe20', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('sekolahId', 'semesterId', 'idRuang', 'hari', 'belKe01', 'belKe02', 'belKe03', 'belKe04', 'belKe05', 'belKe06', 'belKe07', 'belKe08', 'belKe09', 'belKe10', 'belKe11', 'belKe12', 'belKe13', 'belKe14', 'belKe15', 'belKe16', 'belKe17', 'belKe18', 'belKe19', 'belKe20', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (JadwalPeer::SEKOLAH_ID, JadwalPeer::SEMESTER_ID, JadwalPeer::ID_RUANG, JadwalPeer::HARI, JadwalPeer::BEL_KE_01, JadwalPeer::BEL_KE_02, JadwalPeer::BEL_KE_03, JadwalPeer::BEL_KE_04, JadwalPeer::BEL_KE_05, JadwalPeer::BEL_KE_06, JadwalPeer::BEL_KE_07, JadwalPeer::BEL_KE_08, JadwalPeer::BEL_KE_09, JadwalPeer::BEL_KE_10, JadwalPeer::BEL_KE_11, JadwalPeer::BEL_KE_12, JadwalPeer::BEL_KE_13, JadwalPeer::BEL_KE_14, JadwalPeer::BEL_KE_15, JadwalPeer::BEL_KE_16, JadwalPeer::BEL_KE_17, JadwalPeer::BEL_KE_18, JadwalPeer::BEL_KE_19, JadwalPeer::BEL_KE_20, JadwalPeer::CREATE_DATE, JadwalPeer::LAST_UPDATE, JadwalPeer::SOFT_DELETE, JadwalPeer::LAST_SYNC, JadwalPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SEKOLAH_ID', 'SEMESTER_ID', 'ID_RUANG', 'HARI', 'BEL_KE_01', 'BEL_KE_02', 'BEL_KE_03', 'BEL_KE_04', 'BEL_KE_05', 'BEL_KE_06', 'BEL_KE_07', 'BEL_KE_08', 'BEL_KE_09', 'BEL_KE_10', 'BEL_KE_11', 'BEL_KE_12', 'BEL_KE_13', 'BEL_KE_14', 'BEL_KE_15', 'BEL_KE_16', 'BEL_KE_17', 'BEL_KE_18', 'BEL_KE_19', 'BEL_KE_20', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('sekolah_id', 'semester_id', 'id_ruang', 'hari', 'bel_ke_01', 'bel_ke_02', 'bel_ke_03', 'bel_ke_04', 'bel_ke_05', 'bel_ke_06', 'bel_ke_07', 'bel_ke_08', 'bel_ke_09', 'bel_ke_10', 'bel_ke_11', 'bel_ke_12', 'bel_ke_13', 'bel_ke_14', 'bel_ke_15', 'bel_ke_16', 'bel_ke_17', 'bel_ke_18', 'bel_ke_19', 'bel_ke_20', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. JadwalPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('SekolahId' => 0, 'SemesterId' => 1, 'IdRuang' => 2, 'Hari' => 3, 'BelKe01' => 4, 'BelKe02' => 5, 'BelKe03' => 6, 'BelKe04' => 7, 'BelKe05' => 8, 'BelKe06' => 9, 'BelKe07' => 10, 'BelKe08' => 11, 'BelKe09' => 12, 'BelKe10' => 13, 'BelKe11' => 14, 'BelKe12' => 15, 'BelKe13' => 16, 'BelKe14' => 17, 'BelKe15' => 18, 'BelKe16' => 19, 'BelKe17' => 20, 'BelKe18' => 21, 'BelKe19' => 22, 'BelKe20' => 23, 'CreateDate' => 24, 'LastUpdate' => 25, 'SoftDelete' => 26, 'LastSync' => 27, 'UpdaterId' => 28, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('sekolahId' => 0, 'semesterId' => 1, 'idRuang' => 2, 'hari' => 3, 'belKe01' => 4, 'belKe02' => 5, 'belKe03' => 6, 'belKe04' => 7, 'belKe05' => 8, 'belKe06' => 9, 'belKe07' => 10, 'belKe08' => 11, 'belKe09' => 12, 'belKe10' => 13, 'belKe11' => 14, 'belKe12' => 15, 'belKe13' => 16, 'belKe14' => 17, 'belKe15' => 18, 'belKe16' => 19, 'belKe17' => 20, 'belKe18' => 21, 'belKe19' => 22, 'belKe20' => 23, 'createDate' => 24, 'lastUpdate' => 25, 'softDelete' => 26, 'lastSync' => 27, 'updaterId' => 28, ),
        BasePeer::TYPE_COLNAME => array (JadwalPeer::SEKOLAH_ID => 0, JadwalPeer::SEMESTER_ID => 1, JadwalPeer::ID_RUANG => 2, JadwalPeer::HARI => 3, JadwalPeer::BEL_KE_01 => 4, JadwalPeer::BEL_KE_02 => 5, JadwalPeer::BEL_KE_03 => 6, JadwalPeer::BEL_KE_04 => 7, JadwalPeer::BEL_KE_05 => 8, JadwalPeer::BEL_KE_06 => 9, JadwalPeer::BEL_KE_07 => 10, JadwalPeer::BEL_KE_08 => 11, JadwalPeer::BEL_KE_09 => 12, JadwalPeer::BEL_KE_10 => 13, JadwalPeer::BEL_KE_11 => 14, JadwalPeer::BEL_KE_12 => 15, JadwalPeer::BEL_KE_13 => 16, JadwalPeer::BEL_KE_14 => 17, JadwalPeer::BEL_KE_15 => 18, JadwalPeer::BEL_KE_16 => 19, JadwalPeer::BEL_KE_17 => 20, JadwalPeer::BEL_KE_18 => 21, JadwalPeer::BEL_KE_19 => 22, JadwalPeer::BEL_KE_20 => 23, JadwalPeer::CREATE_DATE => 24, JadwalPeer::LAST_UPDATE => 25, JadwalPeer::SOFT_DELETE => 26, JadwalPeer::LAST_SYNC => 27, JadwalPeer::UPDATER_ID => 28, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SEKOLAH_ID' => 0, 'SEMESTER_ID' => 1, 'ID_RUANG' => 2, 'HARI' => 3, 'BEL_KE_01' => 4, 'BEL_KE_02' => 5, 'BEL_KE_03' => 6, 'BEL_KE_04' => 7, 'BEL_KE_05' => 8, 'BEL_KE_06' => 9, 'BEL_KE_07' => 10, 'BEL_KE_08' => 11, 'BEL_KE_09' => 12, 'BEL_KE_10' => 13, 'BEL_KE_11' => 14, 'BEL_KE_12' => 15, 'BEL_KE_13' => 16, 'BEL_KE_14' => 17, 'BEL_KE_15' => 18, 'BEL_KE_16' => 19, 'BEL_KE_17' => 20, 'BEL_KE_18' => 21, 'BEL_KE_19' => 22, 'BEL_KE_20' => 23, 'CREATE_DATE' => 24, 'LAST_UPDATE' => 25, 'SOFT_DELETE' => 26, 'LAST_SYNC' => 27, 'UPDATER_ID' => 28, ),
        BasePeer::TYPE_FIELDNAME => array ('sekolah_id' => 0, 'semester_id' => 1, 'id_ruang' => 2, 'hari' => 3, 'bel_ke_01' => 4, 'bel_ke_02' => 5, 'bel_ke_03' => 6, 'bel_ke_04' => 7, 'bel_ke_05' => 8, 'bel_ke_06' => 9, 'bel_ke_07' => 10, 'bel_ke_08' => 11, 'bel_ke_09' => 12, 'bel_ke_10' => 13, 'bel_ke_11' => 14, 'bel_ke_12' => 15, 'bel_ke_13' => 16, 'bel_ke_14' => 17, 'bel_ke_15' => 18, 'bel_ke_16' => 19, 'bel_ke_17' => 20, 'bel_ke_18' => 21, 'bel_ke_19' => 22, 'bel_ke_20' => 23, 'create_date' => 24, 'last_update' => 25, 'soft_delete' => 26, 'last_sync' => 27, 'updater_id' => 28, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
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
        $toNames = JadwalPeer::getFieldNames($toType);
        $key = isset(JadwalPeer::$fieldKeys[$fromType][$name]) ? JadwalPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(JadwalPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, JadwalPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return JadwalPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. JadwalPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(JadwalPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(JadwalPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(JadwalPeer::SEMESTER_ID);
            $criteria->addSelectColumn(JadwalPeer::ID_RUANG);
            $criteria->addSelectColumn(JadwalPeer::HARI);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_01);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_02);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_03);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_04);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_05);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_06);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_07);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_08);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_09);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_10);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_11);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_12);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_13);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_14);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_15);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_16);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_17);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_18);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_19);
            $criteria->addSelectColumn(JadwalPeer::BEL_KE_20);
            $criteria->addSelectColumn(JadwalPeer::CREATE_DATE);
            $criteria->addSelectColumn(JadwalPeer::LAST_UPDATE);
            $criteria->addSelectColumn(JadwalPeer::SOFT_DELETE);
            $criteria->addSelectColumn(JadwalPeer::LAST_SYNC);
            $criteria->addSelectColumn(JadwalPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.semester_id');
            $criteria->addSelectColumn($alias . '.id_ruang');
            $criteria->addSelectColumn($alias . '.hari');
            $criteria->addSelectColumn($alias . '.bel_ke_01');
            $criteria->addSelectColumn($alias . '.bel_ke_02');
            $criteria->addSelectColumn($alias . '.bel_ke_03');
            $criteria->addSelectColumn($alias . '.bel_ke_04');
            $criteria->addSelectColumn($alias . '.bel_ke_05');
            $criteria->addSelectColumn($alias . '.bel_ke_06');
            $criteria->addSelectColumn($alias . '.bel_ke_07');
            $criteria->addSelectColumn($alias . '.bel_ke_08');
            $criteria->addSelectColumn($alias . '.bel_ke_09');
            $criteria->addSelectColumn($alias . '.bel_ke_10');
            $criteria->addSelectColumn($alias . '.bel_ke_11');
            $criteria->addSelectColumn($alias . '.bel_ke_12');
            $criteria->addSelectColumn($alias . '.bel_ke_13');
            $criteria->addSelectColumn($alias . '.bel_ke_14');
            $criteria->addSelectColumn($alias . '.bel_ke_15');
            $criteria->addSelectColumn($alias . '.bel_ke_16');
            $criteria->addSelectColumn($alias . '.bel_ke_17');
            $criteria->addSelectColumn($alias . '.bel_ke_18');
            $criteria->addSelectColumn($alias . '.bel_ke_19');
            $criteria->addSelectColumn($alias . '.bel_ke_20');
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
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(JadwalPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Jadwal
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = JadwalPeer::doSelect($critcopy, $con);
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
        return JadwalPeer::populateObjects(JadwalPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            JadwalPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

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
     * @param      Jadwal $obj A Jadwal object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getSekolahId(), (string) $obj->getSemesterId(), (string) $obj->getIdRuang(), (string) $obj->getHari()));
            } // if key === null
            JadwalPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A Jadwal object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Jadwal) {
                $key = serialize(array((string) $value->getSekolahId(), (string) $value->getSemesterId(), (string) $value->getIdRuang(), (string) $value->getHari()));
            } elseif (is_array($value) && count($value) === 4) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1], (string) $value[2], (string) $value[3]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Jadwal object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(JadwalPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Jadwal Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(JadwalPeer::$instances[$key])) {
                return JadwalPeer::$instances[$key];
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
        foreach (JadwalPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        JadwalPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to jadwal
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
        if ($row[$startcol] === null && $row[$startcol + 1] === null && $row[$startcol + 2] === null && $row[$startcol + 3] === null) {
            return null;
        }

        return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1], (string) $row[$startcol + 2], (string) $row[$startcol + 3]));
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

        return array((string) $row[$startcol], (string) $row[$startcol + 1], (string) $row[$startcol + 2], (string) $row[$startcol + 3]);
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
        $cls = JadwalPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = JadwalPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                JadwalPeer::addInstanceToPool($obj, $key);
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
     * @return array (Jadwal object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = JadwalPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = JadwalPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + JadwalPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = JadwalPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            JadwalPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
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
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SekolahLongitudinal table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSekolahLongitudinal(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe01 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe01(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_01, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe02 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe02(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_02, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe03 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe03(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_03, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe04 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe04(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_04, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe05 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe05(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_05, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe06 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe06(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_06, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe07 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe07(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_07, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe08 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe08(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_08, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe09 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe09(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_09, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe10 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe10(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_10, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe11 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe11(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_11, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe12 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe12(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_12, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe13 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe13(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_13, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe14 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe14(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_14, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe15 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe15(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_15, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe16 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe16(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_16, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe17 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe17(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_17, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe18 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe18(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_18, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe19 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe19(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_19, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe20 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinPembelajaranRelatedByBelKe20(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::BEL_KE_20, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Selects a collection of Jadwal objects pre-filled with their Ruang objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRuang(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        RuangPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their SekolahLongitudinal objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolahLongitudinal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        SekolahLongitudinalPeer::addSelectColumns($criteria);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SekolahLongitudinalPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SekolahLongitudinalPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (SekolahLongitudinal)
                $obj2->addJadwal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe01(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_01, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe01($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe02(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_02, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe02($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe03(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_03, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe03($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe04(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_04, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe04($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe05(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_05, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe05($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe06(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_06, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe06($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe07(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_07, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe07($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe08(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_08, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe08($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe09(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_09, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe09($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe10(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_10, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe10($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe11(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_11, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe11($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe12(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_12, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe12($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe13(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_13, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe13($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe14(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_14, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe14($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe15(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_15, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe15($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe16(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_16, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe16($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe17(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_17, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe17($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe18(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_18, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe18($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe19(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_19, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe19($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with their Pembelajaran objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinPembelajaranRelatedByBelKe20(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol = JadwalPeer::NUM_HYDRATE_COLUMNS;
        PembelajaranPeer::addSelectColumns($criteria);

        $criteria->addJoin(JadwalPeer::BEL_KE_20, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = PembelajaranPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    PembelajaranPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Jadwal) to $obj2 (Pembelajaran)
                $obj2->addJadwalRelatedByBelKe20($obj1);

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
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_01, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_02, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_03, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_04, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_05, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_06, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_07, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_08, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_09, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_10, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_11, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_12, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_13, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_14, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_15, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_16, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_17, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_18, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_19, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_20, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Selects a collection of Jadwal objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol20 = $startcol19 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol21 = $startcol20 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol22 = $startcol21 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol23 = $startcol22 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol24 = $startcol23 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_01, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_02, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_03, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_04, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_05, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_06, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_07, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_08, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_09, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_10, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_11, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_12, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_13, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_14, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_15, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_16, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_17, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_18, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_19, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_20, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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
                } // if obj2 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);
            } // if joined row not null

            // Add objects for joined SekolahLongitudinal rows

            $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key4 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = PembelajaranPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PembelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj4 (Pembelajaran)
                $obj4->addJadwalRelatedByBelKe01($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key5 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = PembelajaranPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PembelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj5 (Pembelajaran)
                $obj5->addJadwalRelatedByBelKe02($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key6 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol6);
            if ($key6 !== null) {
                $obj6 = PembelajaranPeer::getInstanceFromPool($key6);
                if (!$obj6) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PembelajaranPeer::addInstanceToPool($obj6, $key6);
                } // if obj6 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj6 (Pembelajaran)
                $obj6->addJadwalRelatedByBelKe03($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key7 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol7);
            if ($key7 !== null) {
                $obj7 = PembelajaranPeer::getInstanceFromPool($key7);
                if (!$obj7) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    PembelajaranPeer::addInstanceToPool($obj7, $key7);
                } // if obj7 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj7 (Pembelajaran)
                $obj7->addJadwalRelatedByBelKe04($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key8 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol8);
            if ($key8 !== null) {
                $obj8 = PembelajaranPeer::getInstanceFromPool($key8);
                if (!$obj8) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    PembelajaranPeer::addInstanceToPool($obj8, $key8);
                } // if obj8 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj8 (Pembelajaran)
                $obj8->addJadwalRelatedByBelKe05($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key9 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol9);
            if ($key9 !== null) {
                $obj9 = PembelajaranPeer::getInstanceFromPool($key9);
                if (!$obj9) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PembelajaranPeer::addInstanceToPool($obj9, $key9);
                } // if obj9 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj9 (Pembelajaran)
                $obj9->addJadwalRelatedByBelKe06($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key10 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol10);
            if ($key10 !== null) {
                $obj10 = PembelajaranPeer::getInstanceFromPool($key10);
                if (!$obj10) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PembelajaranPeer::addInstanceToPool($obj10, $key10);
                } // if obj10 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj10 (Pembelajaran)
                $obj10->addJadwalRelatedByBelKe07($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key11 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol11);
            if ($key11 !== null) {
                $obj11 = PembelajaranPeer::getInstanceFromPool($key11);
                if (!$obj11) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PembelajaranPeer::addInstanceToPool($obj11, $key11);
                } // if obj11 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj11 (Pembelajaran)
                $obj11->addJadwalRelatedByBelKe08($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key12 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol12);
            if ($key12 !== null) {
                $obj12 = PembelajaranPeer::getInstanceFromPool($key12);
                if (!$obj12) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    PembelajaranPeer::addInstanceToPool($obj12, $key12);
                } // if obj12 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj12 (Pembelajaran)
                $obj12->addJadwalRelatedByBelKe09($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key13 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol13);
            if ($key13 !== null) {
                $obj13 = PembelajaranPeer::getInstanceFromPool($key13);
                if (!$obj13) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PembelajaranPeer::addInstanceToPool($obj13, $key13);
                } // if obj13 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj13 (Pembelajaran)
                $obj13->addJadwalRelatedByBelKe10($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key14 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol14);
            if ($key14 !== null) {
                $obj14 = PembelajaranPeer::getInstanceFromPool($key14);
                if (!$obj14) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PembelajaranPeer::addInstanceToPool($obj14, $key14);
                } // if obj14 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj14 (Pembelajaran)
                $obj14->addJadwalRelatedByBelKe11($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key15 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol15);
            if ($key15 !== null) {
                $obj15 = PembelajaranPeer::getInstanceFromPool($key15);
                if (!$obj15) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PembelajaranPeer::addInstanceToPool($obj15, $key15);
                } // if obj15 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj15 (Pembelajaran)
                $obj15->addJadwalRelatedByBelKe12($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key16 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol16);
            if ($key16 !== null) {
                $obj16 = PembelajaranPeer::getInstanceFromPool($key16);
                if (!$obj16) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PembelajaranPeer::addInstanceToPool($obj16, $key16);
                } // if obj16 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj16 (Pembelajaran)
                $obj16->addJadwalRelatedByBelKe13($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key17 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol17);
            if ($key17 !== null) {
                $obj17 = PembelajaranPeer::getInstanceFromPool($key17);
                if (!$obj17) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PembelajaranPeer::addInstanceToPool($obj17, $key17);
                } // if obj17 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj17 (Pembelajaran)
                $obj17->addJadwalRelatedByBelKe14($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key18 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol18);
            if ($key18 !== null) {
                $obj18 = PembelajaranPeer::getInstanceFromPool($key18);
                if (!$obj18) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PembelajaranPeer::addInstanceToPool($obj18, $key18);
                } // if obj18 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj18 (Pembelajaran)
                $obj18->addJadwalRelatedByBelKe15($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key19 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol19);
            if ($key19 !== null) {
                $obj19 = PembelajaranPeer::getInstanceFromPool($key19);
                if (!$obj19) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj19 = new $cls();
                    $obj19->hydrate($row, $startcol19);
                    PembelajaranPeer::addInstanceToPool($obj19, $key19);
                } // if obj19 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj19 (Pembelajaran)
                $obj19->addJadwalRelatedByBelKe16($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key20 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol20);
            if ($key20 !== null) {
                $obj20 = PembelajaranPeer::getInstanceFromPool($key20);
                if (!$obj20) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj20 = new $cls();
                    $obj20->hydrate($row, $startcol20);
                    PembelajaranPeer::addInstanceToPool($obj20, $key20);
                } // if obj20 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj20 (Pembelajaran)
                $obj20->addJadwalRelatedByBelKe17($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key21 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol21);
            if ($key21 !== null) {
                $obj21 = PembelajaranPeer::getInstanceFromPool($key21);
                if (!$obj21) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj21 = new $cls();
                    $obj21->hydrate($row, $startcol21);
                    PembelajaranPeer::addInstanceToPool($obj21, $key21);
                } // if obj21 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj21 (Pembelajaran)
                $obj21->addJadwalRelatedByBelKe18($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key22 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol22);
            if ($key22 !== null) {
                $obj22 = PembelajaranPeer::getInstanceFromPool($key22);
                if (!$obj22) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj22 = new $cls();
                    $obj22->hydrate($row, $startcol22);
                    PembelajaranPeer::addInstanceToPool($obj22, $key22);
                } // if obj22 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj22 (Pembelajaran)
                $obj22->addJadwalRelatedByBelKe19($obj1);
            } // if joined row not null

            // Add objects for joined Pembelajaran rows

            $key23 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol23);
            if ($key23 !== null) {
                $obj23 = PembelajaranPeer::getInstanceFromPool($key23);
                if (!$obj23) {

                    $cls = PembelajaranPeer::getOMClass();

                    $obj23 = new $cls();
                    $obj23->hydrate($row, $startcol23);
                    PembelajaranPeer::addInstanceToPool($obj23, $key23);
                } // if obj23 loaded

                // Add the $obj1 (Jadwal) to the collection in $obj23 (Pembelajaran)
                $obj23->addJadwalRelatedByBelKe20($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
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
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_01, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_02, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_03, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_04, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_05, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_06, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_07, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_08, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_09, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_10, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_11, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_12, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_13, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_14, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_15, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_16, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_17, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_18, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_19, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_20, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related SekolahLongitudinal table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSekolahLongitudinal(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_01, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_02, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_03, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_04, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_05, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_06, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_07, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_08, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_09, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_10, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_11, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_12, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_13, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_14, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_15, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_16, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_17, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_18, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_19, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_20, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe01 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe01(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe02 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe02(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe03 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe03(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe04 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe04(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe05 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe05(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe06 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe06(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe07 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe07(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe08 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe08(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe09 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe09(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe10 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe10(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe11 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe11(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe12 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe12(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe13 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe13(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe14 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe14(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe15 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe15(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe16 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe16(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe17 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe17(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe18 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe18(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe19 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe19(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related PembelajaranRelatedByBelKe20 table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptPembelajaranRelatedByBelKe20(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            JadwalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

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
     * Selects a collection of Jadwal objects pre-filled with all related objects except Ruang.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
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
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol20 = $startcol19 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol21 = $startcol20 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol22 = $startcol21 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol23 = $startcol22 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_01, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_02, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_03, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_04, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_05, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_06, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_07, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_08, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_09, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_10, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_11, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_12, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_13, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_14, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_15, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_16, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_17, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_18, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_19, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_20, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined SekolahLongitudinal rows

                $key2 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SekolahLongitudinalPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SekolahLongitudinalPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj2 (SekolahLongitudinal)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key3 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PembelajaranPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PembelajaranPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (Pembelajaran)
                $obj3->addJadwalRelatedByBelKe01($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key4 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PembelajaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PembelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj4 (Pembelajaran)
                $obj4->addJadwalRelatedByBelKe02($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key5 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = PembelajaranPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PembelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj5 (Pembelajaran)
                $obj5->addJadwalRelatedByBelKe03($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key6 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = PembelajaranPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PembelajaranPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj6 (Pembelajaran)
                $obj6->addJadwalRelatedByBelKe04($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key7 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = PembelajaranPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    PembelajaranPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj7 (Pembelajaran)
                $obj7->addJadwalRelatedByBelKe05($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key8 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = PembelajaranPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    PembelajaranPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj8 (Pembelajaran)
                $obj8->addJadwalRelatedByBelKe06($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key9 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = PembelajaranPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PembelajaranPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj9 (Pembelajaran)
                $obj9->addJadwalRelatedByBelKe07($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key10 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PembelajaranPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PembelajaranPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj10 (Pembelajaran)
                $obj10->addJadwalRelatedByBelKe08($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key11 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PembelajaranPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PembelajaranPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj11 (Pembelajaran)
                $obj11->addJadwalRelatedByBelKe09($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key12 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = PembelajaranPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    PembelajaranPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj12 (Pembelajaran)
                $obj12->addJadwalRelatedByBelKe10($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key13 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PembelajaranPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PembelajaranPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj13 (Pembelajaran)
                $obj13->addJadwalRelatedByBelKe11($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key14 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PembelajaranPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PembelajaranPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj14 (Pembelajaran)
                $obj14->addJadwalRelatedByBelKe12($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key15 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PembelajaranPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PembelajaranPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj15 (Pembelajaran)
                $obj15->addJadwalRelatedByBelKe13($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key16 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PembelajaranPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PembelajaranPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj16 (Pembelajaran)
                $obj16->addJadwalRelatedByBelKe14($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key17 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = PembelajaranPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PembelajaranPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj17 (Pembelajaran)
                $obj17->addJadwalRelatedByBelKe15($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key18 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = PembelajaranPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PembelajaranPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj18 (Pembelajaran)
                $obj18->addJadwalRelatedByBelKe16($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key19 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol19);
                if ($key19 !== null) {
                    $obj19 = PembelajaranPeer::getInstanceFromPool($key19);
                    if (!$obj19) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj19 = new $cls();
                    $obj19->hydrate($row, $startcol19);
                    PembelajaranPeer::addInstanceToPool($obj19, $key19);
                } // if $obj19 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj19 (Pembelajaran)
                $obj19->addJadwalRelatedByBelKe17($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key20 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol20);
                if ($key20 !== null) {
                    $obj20 = PembelajaranPeer::getInstanceFromPool($key20);
                    if (!$obj20) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj20 = new $cls();
                    $obj20->hydrate($row, $startcol20);
                    PembelajaranPeer::addInstanceToPool($obj20, $key20);
                } // if $obj20 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj20 (Pembelajaran)
                $obj20->addJadwalRelatedByBelKe18($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key21 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol21);
                if ($key21 !== null) {
                    $obj21 = PembelajaranPeer::getInstanceFromPool($key21);
                    if (!$obj21) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj21 = new $cls();
                    $obj21->hydrate($row, $startcol21);
                    PembelajaranPeer::addInstanceToPool($obj21, $key21);
                } // if $obj21 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj21 (Pembelajaran)
                $obj21->addJadwalRelatedByBelKe19($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key22 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol22);
                if ($key22 !== null) {
                    $obj22 = PembelajaranPeer::getInstanceFromPool($key22);
                    if (!$obj22) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj22 = new $cls();
                    $obj22->hydrate($row, $startcol22);
                    PembelajaranPeer::addInstanceToPool($obj22, $key22);
                } // if $obj22 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj22 (Pembelajaran)
                $obj22->addJadwalRelatedByBelKe20($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except SekolahLongitudinal.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSekolahLongitudinal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol7 = $startcol6 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol8 = $startcol7 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol9 = $startcol8 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol10 = $startcol9 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol11 = $startcol10 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol12 = $startcol11 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol13 = $startcol12 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol14 = $startcol13 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol15 = $startcol14 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol16 = $startcol15 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol17 = $startcol16 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol18 = $startcol17 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol19 = $startcol18 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol20 = $startcol19 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol21 = $startcol20 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol22 = $startcol21 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        PembelajaranPeer::addSelectColumns($criteria);
        $startcol23 = $startcol22 + PembelajaranPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_01, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_02, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_03, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_04, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_05, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_06, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_07, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_08, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_09, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_10, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_11, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_12, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_13, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_14, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_15, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_16, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_17, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_18, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_19, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);

        $criteria->addJoin(JadwalPeer::BEL_KE_20, PembelajaranPeer::PEMBELAJARAN_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key3 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = PembelajaranPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    PembelajaranPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (Pembelajaran)
                $obj3->addJadwalRelatedByBelKe01($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key4 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = PembelajaranPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    PembelajaranPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj4 (Pembelajaran)
                $obj4->addJadwalRelatedByBelKe02($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key5 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol5);
                if ($key5 !== null) {
                    $obj5 = PembelajaranPeer::getInstanceFromPool($key5);
                    if (!$obj5) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    PembelajaranPeer::addInstanceToPool($obj5, $key5);
                } // if $obj5 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj5 (Pembelajaran)
                $obj5->addJadwalRelatedByBelKe03($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key6 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol6);
                if ($key6 !== null) {
                    $obj6 = PembelajaranPeer::getInstanceFromPool($key6);
                    if (!$obj6) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj6 = new $cls();
                    $obj6->hydrate($row, $startcol6);
                    PembelajaranPeer::addInstanceToPool($obj6, $key6);
                } // if $obj6 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj6 (Pembelajaran)
                $obj6->addJadwalRelatedByBelKe04($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key7 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol7);
                if ($key7 !== null) {
                    $obj7 = PembelajaranPeer::getInstanceFromPool($key7);
                    if (!$obj7) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj7 = new $cls();
                    $obj7->hydrate($row, $startcol7);
                    PembelajaranPeer::addInstanceToPool($obj7, $key7);
                } // if $obj7 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj7 (Pembelajaran)
                $obj7->addJadwalRelatedByBelKe05($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key8 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol8);
                if ($key8 !== null) {
                    $obj8 = PembelajaranPeer::getInstanceFromPool($key8);
                    if (!$obj8) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj8 = new $cls();
                    $obj8->hydrate($row, $startcol8);
                    PembelajaranPeer::addInstanceToPool($obj8, $key8);
                } // if $obj8 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj8 (Pembelajaran)
                $obj8->addJadwalRelatedByBelKe06($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key9 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol9);
                if ($key9 !== null) {
                    $obj9 = PembelajaranPeer::getInstanceFromPool($key9);
                    if (!$obj9) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj9 = new $cls();
                    $obj9->hydrate($row, $startcol9);
                    PembelajaranPeer::addInstanceToPool($obj9, $key9);
                } // if $obj9 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj9 (Pembelajaran)
                $obj9->addJadwalRelatedByBelKe07($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key10 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol10);
                if ($key10 !== null) {
                    $obj10 = PembelajaranPeer::getInstanceFromPool($key10);
                    if (!$obj10) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj10 = new $cls();
                    $obj10->hydrate($row, $startcol10);
                    PembelajaranPeer::addInstanceToPool($obj10, $key10);
                } // if $obj10 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj10 (Pembelajaran)
                $obj10->addJadwalRelatedByBelKe08($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key11 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol11);
                if ($key11 !== null) {
                    $obj11 = PembelajaranPeer::getInstanceFromPool($key11);
                    if (!$obj11) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj11 = new $cls();
                    $obj11->hydrate($row, $startcol11);
                    PembelajaranPeer::addInstanceToPool($obj11, $key11);
                } // if $obj11 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj11 (Pembelajaran)
                $obj11->addJadwalRelatedByBelKe09($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key12 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol12);
                if ($key12 !== null) {
                    $obj12 = PembelajaranPeer::getInstanceFromPool($key12);
                    if (!$obj12) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj12 = new $cls();
                    $obj12->hydrate($row, $startcol12);
                    PembelajaranPeer::addInstanceToPool($obj12, $key12);
                } // if $obj12 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj12 (Pembelajaran)
                $obj12->addJadwalRelatedByBelKe10($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key13 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol13);
                if ($key13 !== null) {
                    $obj13 = PembelajaranPeer::getInstanceFromPool($key13);
                    if (!$obj13) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj13 = new $cls();
                    $obj13->hydrate($row, $startcol13);
                    PembelajaranPeer::addInstanceToPool($obj13, $key13);
                } // if $obj13 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj13 (Pembelajaran)
                $obj13->addJadwalRelatedByBelKe11($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key14 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol14);
                if ($key14 !== null) {
                    $obj14 = PembelajaranPeer::getInstanceFromPool($key14);
                    if (!$obj14) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj14 = new $cls();
                    $obj14->hydrate($row, $startcol14);
                    PembelajaranPeer::addInstanceToPool($obj14, $key14);
                } // if $obj14 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj14 (Pembelajaran)
                $obj14->addJadwalRelatedByBelKe12($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key15 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol15);
                if ($key15 !== null) {
                    $obj15 = PembelajaranPeer::getInstanceFromPool($key15);
                    if (!$obj15) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj15 = new $cls();
                    $obj15->hydrate($row, $startcol15);
                    PembelajaranPeer::addInstanceToPool($obj15, $key15);
                } // if $obj15 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj15 (Pembelajaran)
                $obj15->addJadwalRelatedByBelKe13($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key16 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol16);
                if ($key16 !== null) {
                    $obj16 = PembelajaranPeer::getInstanceFromPool($key16);
                    if (!$obj16) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj16 = new $cls();
                    $obj16->hydrate($row, $startcol16);
                    PembelajaranPeer::addInstanceToPool($obj16, $key16);
                } // if $obj16 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj16 (Pembelajaran)
                $obj16->addJadwalRelatedByBelKe14($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key17 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol17);
                if ($key17 !== null) {
                    $obj17 = PembelajaranPeer::getInstanceFromPool($key17);
                    if (!$obj17) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj17 = new $cls();
                    $obj17->hydrate($row, $startcol17);
                    PembelajaranPeer::addInstanceToPool($obj17, $key17);
                } // if $obj17 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj17 (Pembelajaran)
                $obj17->addJadwalRelatedByBelKe15($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key18 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol18);
                if ($key18 !== null) {
                    $obj18 = PembelajaranPeer::getInstanceFromPool($key18);
                    if (!$obj18) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj18 = new $cls();
                    $obj18->hydrate($row, $startcol18);
                    PembelajaranPeer::addInstanceToPool($obj18, $key18);
                } // if $obj18 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj18 (Pembelajaran)
                $obj18->addJadwalRelatedByBelKe16($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key19 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol19);
                if ($key19 !== null) {
                    $obj19 = PembelajaranPeer::getInstanceFromPool($key19);
                    if (!$obj19) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj19 = new $cls();
                    $obj19->hydrate($row, $startcol19);
                    PembelajaranPeer::addInstanceToPool($obj19, $key19);
                } // if $obj19 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj19 (Pembelajaran)
                $obj19->addJadwalRelatedByBelKe17($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key20 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol20);
                if ($key20 !== null) {
                    $obj20 = PembelajaranPeer::getInstanceFromPool($key20);
                    if (!$obj20) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj20 = new $cls();
                    $obj20->hydrate($row, $startcol20);
                    PembelajaranPeer::addInstanceToPool($obj20, $key20);
                } // if $obj20 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj20 (Pembelajaran)
                $obj20->addJadwalRelatedByBelKe18($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key21 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol21);
                if ($key21 !== null) {
                    $obj21 = PembelajaranPeer::getInstanceFromPool($key21);
                    if (!$obj21) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj21 = new $cls();
                    $obj21->hydrate($row, $startcol21);
                    PembelajaranPeer::addInstanceToPool($obj21, $key21);
                } // if $obj21 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj21 (Pembelajaran)
                $obj21->addJadwalRelatedByBelKe19($obj1);

            } // if joined row is not null

                // Add objects for joined Pembelajaran rows

                $key22 = PembelajaranPeer::getPrimaryKeyHashFromRow($row, $startcol22);
                if ($key22 !== null) {
                    $obj22 = PembelajaranPeer::getInstanceFromPool($key22);
                    if (!$obj22) {
    
                        $cls = PembelajaranPeer::getOMClass();

                    $obj22 = new $cls();
                    $obj22->hydrate($row, $startcol22);
                    PembelajaranPeer::addInstanceToPool($obj22, $key22);
                } // if $obj22 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj22 (Pembelajaran)
                $obj22->addJadwalRelatedByBelKe20($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe01.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe01(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe02.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe02(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe03.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe03(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe04.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe04(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe05.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe05(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe06.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe06(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe07.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe07(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe08.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe08(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe09.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe09(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe10.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe10(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe11.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe11(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe12.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe12(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe13.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe13(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe14.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe14(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe15.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe15(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe16.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe16(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe17.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe17(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe18.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe18(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe19.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe19(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Jadwal objects pre-filled with all related objects except PembelajaranRelatedByBelKe20.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Jadwal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptPembelajaranRelatedByBelKe20(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(JadwalPeer::DATABASE_NAME);
        }

        JadwalPeer::addSelectColumns($criteria);
        $startcol2 = JadwalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SekolahLongitudinalPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SekolahLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(JadwalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addMultipleJoin(array(
        array(JadwalPeer::SEKOLAH_ID, SekolahLongitudinalPeer::SEKOLAH_ID),
        array(JadwalPeer::SEMESTER_ID, SekolahLongitudinalPeer::SEMESTER_ID),
      ), $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = JadwalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = JadwalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = JadwalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                JadwalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (Jadwal) to the collection in $obj2 (Ruang)
                $obj2->addJadwal($obj1);

            } // if joined row is not null

                // Add objects for joined SekolahLongitudinal rows

                $key3 = SekolahLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SekolahLongitudinalPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SekolahLongitudinalPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SekolahLongitudinalPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Jadwal) to the collection in $obj3 (SekolahLongitudinal)
                $obj3->addJadwal($obj1);

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
        return Propel::getDatabaseMap(JadwalPeer::DATABASE_NAME)->getTable(JadwalPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseJadwalPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseJadwalPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new JadwalTableMap());
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
        return JadwalPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Jadwal or Criteria object.
     *
     * @param      mixed $values Criteria or Jadwal object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Jadwal object
        }


        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a Jadwal or Criteria object.
     *
     * @param      mixed $values Criteria or Jadwal object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(JadwalPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(JadwalPeer::SEKOLAH_ID);
            $value = $criteria->remove(JadwalPeer::SEKOLAH_ID);
            if ($value) {
                $selectCriteria->add(JadwalPeer::SEKOLAH_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(JadwalPeer::SEMESTER_ID);
            $value = $criteria->remove(JadwalPeer::SEMESTER_ID);
            if ($value) {
                $selectCriteria->add(JadwalPeer::SEMESTER_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(JadwalPeer::ID_RUANG);
            $value = $criteria->remove(JadwalPeer::ID_RUANG);
            if ($value) {
                $selectCriteria->add(JadwalPeer::ID_RUANG, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(JadwalPeer::HARI);
            $value = $criteria->remove(JadwalPeer::HARI);
            if ($value) {
                $selectCriteria->add(JadwalPeer::HARI, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(JadwalPeer::TABLE_NAME);
            }

        } else { // $values is Jadwal object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the jadwal table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(JadwalPeer::TABLE_NAME, $con, JadwalPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            JadwalPeer::clearInstancePool();
            JadwalPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Jadwal or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Jadwal object or primary key or array of primary keys
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
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            JadwalPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Jadwal) { // it's a model object
            // invalidate the cache for this single object
            JadwalPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(JadwalPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(JadwalPeer::SEKOLAH_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(JadwalPeer::SEMESTER_ID, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(JadwalPeer::ID_RUANG, $value[2]));
                $criterion->addAnd($criteria->getNewCriterion(JadwalPeer::HARI, $value[3]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                JadwalPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(JadwalPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            JadwalPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Jadwal object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Jadwal $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(JadwalPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(JadwalPeer::TABLE_NAME);

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

        return BasePeer::doValidate(JadwalPeer::DATABASE_NAME, JadwalPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $sekolah_id
     * @param   string $semester_id
     * @param   string $id_ruang
     * @param   string $hari
     * @param      PropelPDO $con
     * @return   Jadwal
     */
    public static function retrieveByPK($sekolah_id, $semester_id, $id_ruang, $hari, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $sekolah_id, (string) $semester_id, (string) $id_ruang, (string) $hari));
         if (null !== ($obj = JadwalPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(JadwalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(JadwalPeer::DATABASE_NAME);
        $criteria->add(JadwalPeer::SEKOLAH_ID, $sekolah_id);
        $criteria->add(JadwalPeer::SEMESTER_ID, $semester_id);
        $criteria->add(JadwalPeer::ID_RUANG, $id_ruang);
        $criteria->add(JadwalPeer::HARI, $hari);
        $v = JadwalPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseJadwalPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseJadwalPeer::buildTableMap();

