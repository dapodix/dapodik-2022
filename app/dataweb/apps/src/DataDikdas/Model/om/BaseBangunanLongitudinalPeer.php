<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BangunanLongitudinal;
use DataDikdas\Model\BangunanLongitudinalPeer;
use DataDikdas\Model\BangunanPeer;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\map\BangunanLongitudinalTableMap;

/**
 * Base static class for performing query and update operations on the 'bangunan_longitudinal' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseBangunanLongitudinalPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'bangunan_longitudinal';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\BangunanLongitudinal';

    /** the related TableMap class for this table */
    const TM_CLASS = 'BangunanLongitudinalTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 22;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 22;

    /** the column name for the id_bangunan field */
    const ID_BANGUNAN = 'bangunan_longitudinal.id_bangunan';

    /** the column name for the semester_id field */
    const SEMESTER_ID = 'bangunan_longitudinal.semester_id';

    /** the column name for the rusak_pondasi field */
    const RUSAK_PONDASI = 'bangunan_longitudinal.rusak_pondasi';

    /** the column name for the ket_pondasi field */
    const KET_PONDASI = 'bangunan_longitudinal.ket_pondasi';

    /** the column name for the rusak_sloop_kolom_balok field */
    const RUSAK_SLOOP_KOLOM_BALOK = 'bangunan_longitudinal.rusak_sloop_kolom_balok';

    /** the column name for the ket_sloop_kolom_balok field */
    const KET_SLOOP_KOLOM_BALOK = 'bangunan_longitudinal.ket_sloop_kolom_balok';

    /** the column name for the rusak_plester_struktur field */
    const RUSAK_PLESTER_STRUKTUR = 'bangunan_longitudinal.rusak_plester_struktur';

    /** the column name for the ket_plester_struktur field */
    const KET_PLESTER_STRUKTUR = 'bangunan_longitudinal.ket_plester_struktur';

    /** the column name for the rusak_kudakuda_atap field */
    const RUSAK_KUDAKUDA_ATAP = 'bangunan_longitudinal.rusak_kudakuda_atap';

    /** the column name for the ket_kudakuda_atap field */
    const KET_KUDAKUDA_ATAP = 'bangunan_longitudinal.ket_kudakuda_atap';

    /** the column name for the rusak_kaso_atap field */
    const RUSAK_KASO_ATAP = 'bangunan_longitudinal.rusak_kaso_atap';

    /** the column name for the ket_kaso_atap field */
    const KET_KASO_ATAP = 'bangunan_longitudinal.ket_kaso_atap';

    /** the column name for the rusak_reng_atap field */
    const RUSAK_RENG_ATAP = 'bangunan_longitudinal.rusak_reng_atap';

    /** the column name for the ket_reng_atap field */
    const KET_RENG_ATAP = 'bangunan_longitudinal.ket_reng_atap';

    /** the column name for the rusak_tutup_atap field */
    const RUSAK_TUTUP_ATAP = 'bangunan_longitudinal.rusak_tutup_atap';

    /** the column name for the ket_tutup_atap field */
    const KET_TUTUP_ATAP = 'bangunan_longitudinal.ket_tutup_atap';

    /** the column name for the nilai_saat_ini field */
    const NILAI_SAAT_INI = 'bangunan_longitudinal.nilai_saat_ini';

    /** the column name for the create_date field */
    const CREATE_DATE = 'bangunan_longitudinal.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'bangunan_longitudinal.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'bangunan_longitudinal.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'bangunan_longitudinal.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'bangunan_longitudinal.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of BangunanLongitudinal objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array BangunanLongitudinal[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. BangunanLongitudinalPeer::$fieldNames[BangunanLongitudinalPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdBangunan', 'SemesterId', 'RusakPondasi', 'KetPondasi', 'RusakSloopKolomBalok', 'KetSloopKolomBalok', 'RusakPlesterStruktur', 'KetPlesterStruktur', 'RusakKudakudaAtap', 'KetKudakudaAtap', 'RusakKasoAtap', 'KetKasoAtap', 'RusakRengAtap', 'KetRengAtap', 'RusakTutupAtap', 'KetTutupAtap', 'NilaiSaatIni', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idBangunan', 'semesterId', 'rusakPondasi', 'ketPondasi', 'rusakSloopKolomBalok', 'ketSloopKolomBalok', 'rusakPlesterStruktur', 'ketPlesterStruktur', 'rusakKudakudaAtap', 'ketKudakudaAtap', 'rusakKasoAtap', 'ketKasoAtap', 'rusakRengAtap', 'ketRengAtap', 'rusakTutupAtap', 'ketTutupAtap', 'nilaiSaatIni', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (BangunanLongitudinalPeer::ID_BANGUNAN, BangunanLongitudinalPeer::SEMESTER_ID, BangunanLongitudinalPeer::RUSAK_PONDASI, BangunanLongitudinalPeer::KET_PONDASI, BangunanLongitudinalPeer::RUSAK_SLOOP_KOLOM_BALOK, BangunanLongitudinalPeer::KET_SLOOP_KOLOM_BALOK, BangunanLongitudinalPeer::RUSAK_PLESTER_STRUKTUR, BangunanLongitudinalPeer::KET_PLESTER_STRUKTUR, BangunanLongitudinalPeer::RUSAK_KUDAKUDA_ATAP, BangunanLongitudinalPeer::KET_KUDAKUDA_ATAP, BangunanLongitudinalPeer::RUSAK_KASO_ATAP, BangunanLongitudinalPeer::KET_KASO_ATAP, BangunanLongitudinalPeer::RUSAK_RENG_ATAP, BangunanLongitudinalPeer::KET_RENG_ATAP, BangunanLongitudinalPeer::RUSAK_TUTUP_ATAP, BangunanLongitudinalPeer::KET_TUTUP_ATAP, BangunanLongitudinalPeer::NILAI_SAAT_INI, BangunanLongitudinalPeer::CREATE_DATE, BangunanLongitudinalPeer::LAST_UPDATE, BangunanLongitudinalPeer::SOFT_DELETE, BangunanLongitudinalPeer::LAST_SYNC, BangunanLongitudinalPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_BANGUNAN', 'SEMESTER_ID', 'RUSAK_PONDASI', 'KET_PONDASI', 'RUSAK_SLOOP_KOLOM_BALOK', 'KET_SLOOP_KOLOM_BALOK', 'RUSAK_PLESTER_STRUKTUR', 'KET_PLESTER_STRUKTUR', 'RUSAK_KUDAKUDA_ATAP', 'KET_KUDAKUDA_ATAP', 'RUSAK_KASO_ATAP', 'KET_KASO_ATAP', 'RUSAK_RENG_ATAP', 'KET_RENG_ATAP', 'RUSAK_TUTUP_ATAP', 'KET_TUTUP_ATAP', 'NILAI_SAAT_INI', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_bangunan', 'semester_id', 'rusak_pondasi', 'ket_pondasi', 'rusak_sloop_kolom_balok', 'ket_sloop_kolom_balok', 'rusak_plester_struktur', 'ket_plester_struktur', 'rusak_kudakuda_atap', 'ket_kudakuda_atap', 'rusak_kaso_atap', 'ket_kaso_atap', 'rusak_reng_atap', 'ket_reng_atap', 'rusak_tutup_atap', 'ket_tutup_atap', 'nilai_saat_ini', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. BangunanLongitudinalPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdBangunan' => 0, 'SemesterId' => 1, 'RusakPondasi' => 2, 'KetPondasi' => 3, 'RusakSloopKolomBalok' => 4, 'KetSloopKolomBalok' => 5, 'RusakPlesterStruktur' => 6, 'KetPlesterStruktur' => 7, 'RusakKudakudaAtap' => 8, 'KetKudakudaAtap' => 9, 'RusakKasoAtap' => 10, 'KetKasoAtap' => 11, 'RusakRengAtap' => 12, 'KetRengAtap' => 13, 'RusakTutupAtap' => 14, 'KetTutupAtap' => 15, 'NilaiSaatIni' => 16, 'CreateDate' => 17, 'LastUpdate' => 18, 'SoftDelete' => 19, 'LastSync' => 20, 'UpdaterId' => 21, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idBangunan' => 0, 'semesterId' => 1, 'rusakPondasi' => 2, 'ketPondasi' => 3, 'rusakSloopKolomBalok' => 4, 'ketSloopKolomBalok' => 5, 'rusakPlesterStruktur' => 6, 'ketPlesterStruktur' => 7, 'rusakKudakudaAtap' => 8, 'ketKudakudaAtap' => 9, 'rusakKasoAtap' => 10, 'ketKasoAtap' => 11, 'rusakRengAtap' => 12, 'ketRengAtap' => 13, 'rusakTutupAtap' => 14, 'ketTutupAtap' => 15, 'nilaiSaatIni' => 16, 'createDate' => 17, 'lastUpdate' => 18, 'softDelete' => 19, 'lastSync' => 20, 'updaterId' => 21, ),
        BasePeer::TYPE_COLNAME => array (BangunanLongitudinalPeer::ID_BANGUNAN => 0, BangunanLongitudinalPeer::SEMESTER_ID => 1, BangunanLongitudinalPeer::RUSAK_PONDASI => 2, BangunanLongitudinalPeer::KET_PONDASI => 3, BangunanLongitudinalPeer::RUSAK_SLOOP_KOLOM_BALOK => 4, BangunanLongitudinalPeer::KET_SLOOP_KOLOM_BALOK => 5, BangunanLongitudinalPeer::RUSAK_PLESTER_STRUKTUR => 6, BangunanLongitudinalPeer::KET_PLESTER_STRUKTUR => 7, BangunanLongitudinalPeer::RUSAK_KUDAKUDA_ATAP => 8, BangunanLongitudinalPeer::KET_KUDAKUDA_ATAP => 9, BangunanLongitudinalPeer::RUSAK_KASO_ATAP => 10, BangunanLongitudinalPeer::KET_KASO_ATAP => 11, BangunanLongitudinalPeer::RUSAK_RENG_ATAP => 12, BangunanLongitudinalPeer::KET_RENG_ATAP => 13, BangunanLongitudinalPeer::RUSAK_TUTUP_ATAP => 14, BangunanLongitudinalPeer::KET_TUTUP_ATAP => 15, BangunanLongitudinalPeer::NILAI_SAAT_INI => 16, BangunanLongitudinalPeer::CREATE_DATE => 17, BangunanLongitudinalPeer::LAST_UPDATE => 18, BangunanLongitudinalPeer::SOFT_DELETE => 19, BangunanLongitudinalPeer::LAST_SYNC => 20, BangunanLongitudinalPeer::UPDATER_ID => 21, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_BANGUNAN' => 0, 'SEMESTER_ID' => 1, 'RUSAK_PONDASI' => 2, 'KET_PONDASI' => 3, 'RUSAK_SLOOP_KOLOM_BALOK' => 4, 'KET_SLOOP_KOLOM_BALOK' => 5, 'RUSAK_PLESTER_STRUKTUR' => 6, 'KET_PLESTER_STRUKTUR' => 7, 'RUSAK_KUDAKUDA_ATAP' => 8, 'KET_KUDAKUDA_ATAP' => 9, 'RUSAK_KASO_ATAP' => 10, 'KET_KASO_ATAP' => 11, 'RUSAK_RENG_ATAP' => 12, 'KET_RENG_ATAP' => 13, 'RUSAK_TUTUP_ATAP' => 14, 'KET_TUTUP_ATAP' => 15, 'NILAI_SAAT_INI' => 16, 'CREATE_DATE' => 17, 'LAST_UPDATE' => 18, 'SOFT_DELETE' => 19, 'LAST_SYNC' => 20, 'UPDATER_ID' => 21, ),
        BasePeer::TYPE_FIELDNAME => array ('id_bangunan' => 0, 'semester_id' => 1, 'rusak_pondasi' => 2, 'ket_pondasi' => 3, 'rusak_sloop_kolom_balok' => 4, 'ket_sloop_kolom_balok' => 5, 'rusak_plester_struktur' => 6, 'ket_plester_struktur' => 7, 'rusak_kudakuda_atap' => 8, 'ket_kudakuda_atap' => 9, 'rusak_kaso_atap' => 10, 'ket_kaso_atap' => 11, 'rusak_reng_atap' => 12, 'ket_reng_atap' => 13, 'rusak_tutup_atap' => 14, 'ket_tutup_atap' => 15, 'nilai_saat_ini' => 16, 'create_date' => 17, 'last_update' => 18, 'soft_delete' => 19, 'last_sync' => 20, 'updater_id' => 21, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
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
        $toNames = BangunanLongitudinalPeer::getFieldNames($toType);
        $key = isset(BangunanLongitudinalPeer::$fieldKeys[$fromType][$name]) ? BangunanLongitudinalPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(BangunanLongitudinalPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, BangunanLongitudinalPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return BangunanLongitudinalPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. BangunanLongitudinalPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(BangunanLongitudinalPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(BangunanLongitudinalPeer::ID_BANGUNAN);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::SEMESTER_ID);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::RUSAK_PONDASI);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::KET_PONDASI);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::RUSAK_SLOOP_KOLOM_BALOK);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::KET_SLOOP_KOLOM_BALOK);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::RUSAK_PLESTER_STRUKTUR);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::KET_PLESTER_STRUKTUR);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::RUSAK_KUDAKUDA_ATAP);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::KET_KUDAKUDA_ATAP);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::RUSAK_KASO_ATAP);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::KET_KASO_ATAP);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::RUSAK_RENG_ATAP);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::KET_RENG_ATAP);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::RUSAK_TUTUP_ATAP);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::KET_TUTUP_ATAP);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::NILAI_SAAT_INI);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::CREATE_DATE);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::LAST_UPDATE);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::SOFT_DELETE);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::LAST_SYNC);
            $criteria->addSelectColumn(BangunanLongitudinalPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_bangunan');
            $criteria->addSelectColumn($alias . '.semester_id');
            $criteria->addSelectColumn($alias . '.rusak_pondasi');
            $criteria->addSelectColumn($alias . '.ket_pondasi');
            $criteria->addSelectColumn($alias . '.rusak_sloop_kolom_balok');
            $criteria->addSelectColumn($alias . '.ket_sloop_kolom_balok');
            $criteria->addSelectColumn($alias . '.rusak_plester_struktur');
            $criteria->addSelectColumn($alias . '.ket_plester_struktur');
            $criteria->addSelectColumn($alias . '.rusak_kudakuda_atap');
            $criteria->addSelectColumn($alias . '.ket_kudakuda_atap');
            $criteria->addSelectColumn($alias . '.rusak_kaso_atap');
            $criteria->addSelectColumn($alias . '.ket_kaso_atap');
            $criteria->addSelectColumn($alias . '.rusak_reng_atap');
            $criteria->addSelectColumn($alias . '.ket_reng_atap');
            $criteria->addSelectColumn($alias . '.rusak_tutup_atap');
            $criteria->addSelectColumn($alias . '.ket_tutup_atap');
            $criteria->addSelectColumn($alias . '.nilai_saat_ini');
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
        $criteria->setPrimaryTableName(BangunanLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BangunanLongitudinal
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = BangunanLongitudinalPeer::doSelect($critcopy, $con);
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
        return BangunanLongitudinalPeer::populateObjects(BangunanLongitudinalPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            BangunanLongitudinalPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);

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
     * @param      BangunanLongitudinal $obj A BangunanLongitudinal object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getIdBangunan(), (string) $obj->getSemesterId()));
            } // if key === null
            BangunanLongitudinalPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A BangunanLongitudinal object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof BangunanLongitudinal) {
                $key = serialize(array((string) $value->getIdBangunan(), (string) $value->getSemesterId()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or BangunanLongitudinal object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(BangunanLongitudinalPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   BangunanLongitudinal Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(BangunanLongitudinalPeer::$instances[$key])) {
                return BangunanLongitudinalPeer::$instances[$key];
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
        foreach (BangunanLongitudinalPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        BangunanLongitudinalPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to bangunan_longitudinal
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

        return array((string) $row[$startcol], (string) $row[$startcol + 1]);
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
        $cls = BangunanLongitudinalPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = BangunanLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = BangunanLongitudinalPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                BangunanLongitudinalPeer::addInstanceToPool($obj, $key);
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
     * @return array (BangunanLongitudinal object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = BangunanLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = BangunanLongitudinalPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + BangunanLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = BangunanLongitudinalPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            BangunanLongitudinalPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Semester table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSemester(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BangunanLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BangunanLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Bangunan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinBangunan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BangunanLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BangunanLongitudinalPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

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
     * Selects a collection of BangunanLongitudinal objects pre-filled with their Semester objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BangunanLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);
        }

        BangunanLongitudinalPeer::addSelectColumns($criteria);
        $startcol = BangunanLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        SemesterPeer::addSelectColumns($criteria);

        $criteria->addJoin(BangunanLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BangunanLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SemesterPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (BangunanLongitudinal) to $obj2 (Semester)
                $obj2->addBangunanLongitudinal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of BangunanLongitudinal objects pre-filled with their Bangunan objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BangunanLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinBangunan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);
        }

        BangunanLongitudinalPeer::addSelectColumns($criteria);
        $startcol = BangunanLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        BangunanPeer::addSelectColumns($criteria);

        $criteria->addJoin(BangunanLongitudinalPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = BangunanLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = BangunanPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = BangunanPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = BangunanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    BangunanPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (BangunanLongitudinal) to $obj2 (Bangunan)
                $obj2->addBangunanLongitudinal($obj1);

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
        $criteria->setPrimaryTableName(BangunanLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(BangunanLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(BangunanLongitudinalPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

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
     * Selects a collection of BangunanLongitudinal objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BangunanLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);
        }

        BangunanLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = BangunanLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        BangunanPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + BangunanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BangunanLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(BangunanLongitudinalPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BangunanLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Semester rows

            $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = SemesterPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (BangunanLongitudinal) to the collection in $obj2 (Semester)
                $obj2->addBangunanLongitudinal($obj1);
            } // if joined row not null

            // Add objects for joined Bangunan rows

            $key3 = BangunanPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = BangunanPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = BangunanPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    BangunanPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (BangunanLongitudinal) to the collection in $obj3 (Bangunan)
                $obj3->addBangunanLongitudinal($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Semester table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSemester(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BangunanLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BangunanLongitudinalPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related Bangunan table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptBangunan(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(BangunanLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            BangunanLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(BangunanLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
     * Selects a collection of BangunanLongitudinal objects pre-filled with all related objects except Semester.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BangunanLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);
        }

        BangunanLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = BangunanLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        BangunanPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + BangunanPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BangunanLongitudinalPeer::ID_BANGUNAN, BangunanPeer::ID_BANGUNAN, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BangunanLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Bangunan rows

                $key2 = BangunanPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = BangunanPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = BangunanPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    BangunanPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (BangunanLongitudinal) to the collection in $obj2 (Bangunan)
                $obj2->addBangunanLongitudinal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of BangunanLongitudinal objects pre-filled with all related objects except Bangunan.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of BangunanLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptBangunan(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);
        }

        BangunanLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = BangunanLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(BangunanLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = BangunanLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = BangunanLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = BangunanLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                BangunanLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Semester rows

                $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SemesterPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (BangunanLongitudinal) to the collection in $obj2 (Semester)
                $obj2->addBangunanLongitudinal($obj1);

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
        return Propel::getDatabaseMap(BangunanLongitudinalPeer::DATABASE_NAME)->getTable(BangunanLongitudinalPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseBangunanLongitudinalPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseBangunanLongitudinalPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new BangunanLongitudinalTableMap());
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
        return BangunanLongitudinalPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a BangunanLongitudinal or Criteria object.
     *
     * @param      mixed $values Criteria or BangunanLongitudinal object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from BangunanLongitudinal object
        }


        // Set the correct dbName
        $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a BangunanLongitudinal or Criteria object.
     *
     * @param      mixed $values Criteria or BangunanLongitudinal object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(BangunanLongitudinalPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(BangunanLongitudinalPeer::ID_BANGUNAN);
            $value = $criteria->remove(BangunanLongitudinalPeer::ID_BANGUNAN);
            if ($value) {
                $selectCriteria->add(BangunanLongitudinalPeer::ID_BANGUNAN, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BangunanLongitudinalPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(BangunanLongitudinalPeer::SEMESTER_ID);
            $value = $criteria->remove(BangunanLongitudinalPeer::SEMESTER_ID);
            if ($value) {
                $selectCriteria->add(BangunanLongitudinalPeer::SEMESTER_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(BangunanLongitudinalPeer::TABLE_NAME);
            }

        } else { // $values is BangunanLongitudinal object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the bangunan_longitudinal table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(BangunanLongitudinalPeer::TABLE_NAME, $con, BangunanLongitudinalPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            BangunanLongitudinalPeer::clearInstancePool();
            BangunanLongitudinalPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a BangunanLongitudinal or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or BangunanLongitudinal object or primary key or array of primary keys
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
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            BangunanLongitudinalPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof BangunanLongitudinal) { // it's a model object
            // invalidate the cache for this single object
            BangunanLongitudinalPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(BangunanLongitudinalPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(BangunanLongitudinalPeer::ID_BANGUNAN, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(BangunanLongitudinalPeer::SEMESTER_ID, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                BangunanLongitudinalPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(BangunanLongitudinalPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            BangunanLongitudinalPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given BangunanLongitudinal object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      BangunanLongitudinal $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(BangunanLongitudinalPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(BangunanLongitudinalPeer::TABLE_NAME);

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

        return BasePeer::doValidate(BangunanLongitudinalPeer::DATABASE_NAME, BangunanLongitudinalPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $id_bangunan
     * @param   string $semester_id
     * @param      PropelPDO $con
     * @return   BangunanLongitudinal
     */
    public static function retrieveByPK($id_bangunan, $semester_id, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $id_bangunan, (string) $semester_id));
         if (null !== ($obj = BangunanLongitudinalPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(BangunanLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(BangunanLongitudinalPeer::DATABASE_NAME);
        $criteria->add(BangunanLongitudinalPeer::ID_BANGUNAN, $id_bangunan);
        $criteria->add(BangunanLongitudinalPeer::SEMESTER_ID, $semester_id);
        $v = BangunanLongitudinalPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseBangunanLongitudinalPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseBangunanLongitudinalPeer::buildTableMap();

