<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\MatevRaporPeer;
use DataDikdas\Model\NilaiRapor;
use DataDikdas\Model\NilaiRaporPeer;
use DataDikdas\Model\map\NilaiRaporTableMap;

/**
 * Base static class for performing query and update operations on the 'nilai.nilai_rapor' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseNilaiRaporPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'nilai.nilai_rapor';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\NilaiRapor';

    /** the related TableMap class for this table */
    const TM_CLASS = 'NilaiRaporTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 22;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 22;

    /** the column name for the nilai_id field */
    const NILAI_ID = 'nilai.nilai_rapor.nilai_id';

    /** the column name for the id_evaluasi field */
    const ID_EVALUASI = 'nilai.nilai_rapor.id_evaluasi';

    /** the column name for the anggota_rombel_id field */
    const ANGGOTA_ROMBEL_ID = 'nilai.nilai_rapor.anggota_rombel_id';

    /** the column name for the nilai_kognitif_angka field */
    const NILAI_KOGNITIF_ANGKA = 'nilai.nilai_rapor.nilai_kognitif_angka';

    /** the column name for the nilai_kognitif_huruf field */
    const NILAI_KOGNITIF_HURUF = 'nilai.nilai_rapor.nilai_kognitif_huruf';

    /** the column name for the ket_kognitif field */
    const KET_KOGNITIF = 'nilai.nilai_rapor.ket_kognitif';

    /** the column name for the nilai_psim_angka field */
    const NILAI_PSIM_ANGKA = 'nilai.nilai_rapor.nilai_psim_angka';

    /** the column name for the nilai_psim_huruf field */
    const NILAI_PSIM_HURUF = 'nilai.nilai_rapor.nilai_psim_huruf';

    /** the column name for the ket_psim field */
    const KET_PSIM = 'nilai.nilai_rapor.ket_psim';

    /** the column name for the nilai_afektif_angka field */
    const NILAI_AFEKTIF_ANGKA = 'nilai.nilai_rapor.nilai_afektif_angka';

    /** the column name for the nilai_afektif_huruf field */
    const NILAI_AFEKTIF_HURUF = 'nilai.nilai_rapor.nilai_afektif_huruf';

    /** the column name for the ket_afektif field */
    const KET_AFEKTIF = 'nilai.nilai_rapor.ket_afektif';

    /** the column name for the nilai_afektif2_angka field */
    const NILAI_AFEKTIF2_ANGKA = 'nilai.nilai_rapor.nilai_afektif2_angka';

    /** the column name for the nilai_afektif2_huruf field */
    const NILAI_AFEKTIF2_HURUF = 'nilai.nilai_rapor.nilai_afektif2_huruf';

    /** the column name for the ket_afektif2 field */
    const KET_AFEKTIF2 = 'nilai.nilai_rapor.ket_afektif2';

    /** the column name for the a_beku field */
    const A_BEKU = 'nilai.nilai_rapor.a_beku';

    /** the column name for the rapor_ke field */
    const RAPOR_KE = 'nilai.nilai_rapor.rapor_ke';

    /** the column name for the create_date field */
    const CREATE_DATE = 'nilai.nilai_rapor.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'nilai.nilai_rapor.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'nilai.nilai_rapor.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'nilai.nilai_rapor.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'nilai.nilai_rapor.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of NilaiRapor objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array NilaiRapor[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. NilaiRaporPeer::$fieldNames[NilaiRaporPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('NilaiId', 'IdEvaluasi', 'AnggotaRombelId', 'NilaiKognitifAngka', 'NilaiKognitifHuruf', 'KetKognitif', 'NilaiPsimAngka', 'NilaiPsimHuruf', 'KetPsim', 'NilaiAfektifAngka', 'NilaiAfektifHuruf', 'KetAfektif', 'NilaiAfektif2Angka', 'NilaiAfektif2Huruf', 'KetAfektif2', 'ABeku', 'RaporKe', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('nilaiId', 'idEvaluasi', 'anggotaRombelId', 'nilaiKognitifAngka', 'nilaiKognitifHuruf', 'ketKognitif', 'nilaiPsimAngka', 'nilaiPsimHuruf', 'ketPsim', 'nilaiAfektifAngka', 'nilaiAfektifHuruf', 'ketAfektif', 'nilaiAfektif2Angka', 'nilaiAfektif2Huruf', 'ketAfektif2', 'aBeku', 'raporKe', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (NilaiRaporPeer::NILAI_ID, NilaiRaporPeer::ID_EVALUASI, NilaiRaporPeer::ANGGOTA_ROMBEL_ID, NilaiRaporPeer::NILAI_KOGNITIF_ANGKA, NilaiRaporPeer::NILAI_KOGNITIF_HURUF, NilaiRaporPeer::KET_KOGNITIF, NilaiRaporPeer::NILAI_PSIM_ANGKA, NilaiRaporPeer::NILAI_PSIM_HURUF, NilaiRaporPeer::KET_PSIM, NilaiRaporPeer::NILAI_AFEKTIF_ANGKA, NilaiRaporPeer::NILAI_AFEKTIF_HURUF, NilaiRaporPeer::KET_AFEKTIF, NilaiRaporPeer::NILAI_AFEKTIF2_ANGKA, NilaiRaporPeer::NILAI_AFEKTIF2_HURUF, NilaiRaporPeer::KET_AFEKTIF2, NilaiRaporPeer::A_BEKU, NilaiRaporPeer::RAPOR_KE, NilaiRaporPeer::CREATE_DATE, NilaiRaporPeer::LAST_UPDATE, NilaiRaporPeer::SOFT_DELETE, NilaiRaporPeer::LAST_SYNC, NilaiRaporPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('NILAI_ID', 'ID_EVALUASI', 'ANGGOTA_ROMBEL_ID', 'NILAI_KOGNITIF_ANGKA', 'NILAI_KOGNITIF_HURUF', 'KET_KOGNITIF', 'NILAI_PSIM_ANGKA', 'NILAI_PSIM_HURUF', 'KET_PSIM', 'NILAI_AFEKTIF_ANGKA', 'NILAI_AFEKTIF_HURUF', 'KET_AFEKTIF', 'NILAI_AFEKTIF2_ANGKA', 'NILAI_AFEKTIF2_HURUF', 'KET_AFEKTIF2', 'A_BEKU', 'RAPOR_KE', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('nilai_id', 'id_evaluasi', 'anggota_rombel_id', 'nilai_kognitif_angka', 'nilai_kognitif_huruf', 'ket_kognitif', 'nilai_psim_angka', 'nilai_psim_huruf', 'ket_psim', 'nilai_afektif_angka', 'nilai_afektif_huruf', 'ket_afektif', 'nilai_afektif2_angka', 'nilai_afektif2_huruf', 'ket_afektif2', 'a_beku', 'rapor_ke', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. NilaiRaporPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('NilaiId' => 0, 'IdEvaluasi' => 1, 'AnggotaRombelId' => 2, 'NilaiKognitifAngka' => 3, 'NilaiKognitifHuruf' => 4, 'KetKognitif' => 5, 'NilaiPsimAngka' => 6, 'NilaiPsimHuruf' => 7, 'KetPsim' => 8, 'NilaiAfektifAngka' => 9, 'NilaiAfektifHuruf' => 10, 'KetAfektif' => 11, 'NilaiAfektif2Angka' => 12, 'NilaiAfektif2Huruf' => 13, 'KetAfektif2' => 14, 'ABeku' => 15, 'RaporKe' => 16, 'CreateDate' => 17, 'LastUpdate' => 18, 'SoftDelete' => 19, 'LastSync' => 20, 'UpdaterId' => 21, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('nilaiId' => 0, 'idEvaluasi' => 1, 'anggotaRombelId' => 2, 'nilaiKognitifAngka' => 3, 'nilaiKognitifHuruf' => 4, 'ketKognitif' => 5, 'nilaiPsimAngka' => 6, 'nilaiPsimHuruf' => 7, 'ketPsim' => 8, 'nilaiAfektifAngka' => 9, 'nilaiAfektifHuruf' => 10, 'ketAfektif' => 11, 'nilaiAfektif2Angka' => 12, 'nilaiAfektif2Huruf' => 13, 'ketAfektif2' => 14, 'aBeku' => 15, 'raporKe' => 16, 'createDate' => 17, 'lastUpdate' => 18, 'softDelete' => 19, 'lastSync' => 20, 'updaterId' => 21, ),
        BasePeer::TYPE_COLNAME => array (NilaiRaporPeer::NILAI_ID => 0, NilaiRaporPeer::ID_EVALUASI => 1, NilaiRaporPeer::ANGGOTA_ROMBEL_ID => 2, NilaiRaporPeer::NILAI_KOGNITIF_ANGKA => 3, NilaiRaporPeer::NILAI_KOGNITIF_HURUF => 4, NilaiRaporPeer::KET_KOGNITIF => 5, NilaiRaporPeer::NILAI_PSIM_ANGKA => 6, NilaiRaporPeer::NILAI_PSIM_HURUF => 7, NilaiRaporPeer::KET_PSIM => 8, NilaiRaporPeer::NILAI_AFEKTIF_ANGKA => 9, NilaiRaporPeer::NILAI_AFEKTIF_HURUF => 10, NilaiRaporPeer::KET_AFEKTIF => 11, NilaiRaporPeer::NILAI_AFEKTIF2_ANGKA => 12, NilaiRaporPeer::NILAI_AFEKTIF2_HURUF => 13, NilaiRaporPeer::KET_AFEKTIF2 => 14, NilaiRaporPeer::A_BEKU => 15, NilaiRaporPeer::RAPOR_KE => 16, NilaiRaporPeer::CREATE_DATE => 17, NilaiRaporPeer::LAST_UPDATE => 18, NilaiRaporPeer::SOFT_DELETE => 19, NilaiRaporPeer::LAST_SYNC => 20, NilaiRaporPeer::UPDATER_ID => 21, ),
        BasePeer::TYPE_RAW_COLNAME => array ('NILAI_ID' => 0, 'ID_EVALUASI' => 1, 'ANGGOTA_ROMBEL_ID' => 2, 'NILAI_KOGNITIF_ANGKA' => 3, 'NILAI_KOGNITIF_HURUF' => 4, 'KET_KOGNITIF' => 5, 'NILAI_PSIM_ANGKA' => 6, 'NILAI_PSIM_HURUF' => 7, 'KET_PSIM' => 8, 'NILAI_AFEKTIF_ANGKA' => 9, 'NILAI_AFEKTIF_HURUF' => 10, 'KET_AFEKTIF' => 11, 'NILAI_AFEKTIF2_ANGKA' => 12, 'NILAI_AFEKTIF2_HURUF' => 13, 'KET_AFEKTIF2' => 14, 'A_BEKU' => 15, 'RAPOR_KE' => 16, 'CREATE_DATE' => 17, 'LAST_UPDATE' => 18, 'SOFT_DELETE' => 19, 'LAST_SYNC' => 20, 'UPDATER_ID' => 21, ),
        BasePeer::TYPE_FIELDNAME => array ('nilai_id' => 0, 'id_evaluasi' => 1, 'anggota_rombel_id' => 2, 'nilai_kognitif_angka' => 3, 'nilai_kognitif_huruf' => 4, 'ket_kognitif' => 5, 'nilai_psim_angka' => 6, 'nilai_psim_huruf' => 7, 'ket_psim' => 8, 'nilai_afektif_angka' => 9, 'nilai_afektif_huruf' => 10, 'ket_afektif' => 11, 'nilai_afektif2_angka' => 12, 'nilai_afektif2_huruf' => 13, 'ket_afektif2' => 14, 'a_beku' => 15, 'rapor_ke' => 16, 'create_date' => 17, 'last_update' => 18, 'soft_delete' => 19, 'last_sync' => 20, 'updater_id' => 21, ),
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
        $toNames = NilaiRaporPeer::getFieldNames($toType);
        $key = isset(NilaiRaporPeer::$fieldKeys[$fromType][$name]) ? NilaiRaporPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(NilaiRaporPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, NilaiRaporPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return NilaiRaporPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. NilaiRaporPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(NilaiRaporPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(NilaiRaporPeer::NILAI_ID);
            $criteria->addSelectColumn(NilaiRaporPeer::ID_EVALUASI);
            $criteria->addSelectColumn(NilaiRaporPeer::ANGGOTA_ROMBEL_ID);
            $criteria->addSelectColumn(NilaiRaporPeer::NILAI_KOGNITIF_ANGKA);
            $criteria->addSelectColumn(NilaiRaporPeer::NILAI_KOGNITIF_HURUF);
            $criteria->addSelectColumn(NilaiRaporPeer::KET_KOGNITIF);
            $criteria->addSelectColumn(NilaiRaporPeer::NILAI_PSIM_ANGKA);
            $criteria->addSelectColumn(NilaiRaporPeer::NILAI_PSIM_HURUF);
            $criteria->addSelectColumn(NilaiRaporPeer::KET_PSIM);
            $criteria->addSelectColumn(NilaiRaporPeer::NILAI_AFEKTIF_ANGKA);
            $criteria->addSelectColumn(NilaiRaporPeer::NILAI_AFEKTIF_HURUF);
            $criteria->addSelectColumn(NilaiRaporPeer::KET_AFEKTIF);
            $criteria->addSelectColumn(NilaiRaporPeer::NILAI_AFEKTIF2_ANGKA);
            $criteria->addSelectColumn(NilaiRaporPeer::NILAI_AFEKTIF2_HURUF);
            $criteria->addSelectColumn(NilaiRaporPeer::KET_AFEKTIF2);
            $criteria->addSelectColumn(NilaiRaporPeer::A_BEKU);
            $criteria->addSelectColumn(NilaiRaporPeer::RAPOR_KE);
            $criteria->addSelectColumn(NilaiRaporPeer::CREATE_DATE);
            $criteria->addSelectColumn(NilaiRaporPeer::LAST_UPDATE);
            $criteria->addSelectColumn(NilaiRaporPeer::SOFT_DELETE);
            $criteria->addSelectColumn(NilaiRaporPeer::LAST_SYNC);
            $criteria->addSelectColumn(NilaiRaporPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.nilai_id');
            $criteria->addSelectColumn($alias . '.id_evaluasi');
            $criteria->addSelectColumn($alias . '.anggota_rombel_id');
            $criteria->addSelectColumn($alias . '.nilai_kognitif_angka');
            $criteria->addSelectColumn($alias . '.nilai_kognitif_huruf');
            $criteria->addSelectColumn($alias . '.ket_kognitif');
            $criteria->addSelectColumn($alias . '.nilai_psim_angka');
            $criteria->addSelectColumn($alias . '.nilai_psim_huruf');
            $criteria->addSelectColumn($alias . '.ket_psim');
            $criteria->addSelectColumn($alias . '.nilai_afektif_angka');
            $criteria->addSelectColumn($alias . '.nilai_afektif_huruf');
            $criteria->addSelectColumn($alias . '.ket_afektif');
            $criteria->addSelectColumn($alias . '.nilai_afektif2_angka');
            $criteria->addSelectColumn($alias . '.nilai_afektif2_huruf');
            $criteria->addSelectColumn($alias . '.ket_afektif2');
            $criteria->addSelectColumn($alias . '.a_beku');
            $criteria->addSelectColumn($alias . '.rapor_ke');
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
        $criteria->setPrimaryTableName(NilaiRaporPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NilaiRaporPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(NilaiRaporPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(NilaiRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 NilaiRapor
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = NilaiRaporPeer::doSelect($critcopy, $con);
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
        return NilaiRaporPeer::populateObjects(NilaiRaporPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(NilaiRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            NilaiRaporPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(NilaiRaporPeer::DATABASE_NAME);

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
     * @param      NilaiRapor $obj A NilaiRapor object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getNilaiId();
            } // if key === null
            NilaiRaporPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A NilaiRapor object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof NilaiRapor) {
                $key = (string) $value->getNilaiId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or NilaiRapor object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(NilaiRaporPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   NilaiRapor Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(NilaiRaporPeer::$instances[$key])) {
                return NilaiRaporPeer::$instances[$key];
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
        foreach (NilaiRaporPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        NilaiRaporPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to nilai.nilai_rapor
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
        $cls = NilaiRaporPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = NilaiRaporPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = NilaiRaporPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                NilaiRaporPeer::addInstanceToPool($obj, $key);
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
     * @return array (NilaiRapor object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = NilaiRaporPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = NilaiRaporPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + NilaiRaporPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = NilaiRaporPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            NilaiRaporPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related MatevRapor table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinMatevRapor(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NilaiRaporPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NilaiRaporPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(NilaiRaporPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NilaiRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NilaiRaporPeer::ID_EVALUASI, MatevRaporPeer::ID_EVALUASI, $join_behavior);

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
     * Selects a collection of NilaiRapor objects pre-filled with their MatevRapor objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NilaiRapor objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinMatevRapor(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NilaiRaporPeer::DATABASE_NAME);
        }

        NilaiRaporPeer::addSelectColumns($criteria);
        $startcol = NilaiRaporPeer::NUM_HYDRATE_COLUMNS;
        MatevRaporPeer::addSelectColumns($criteria);

        $criteria->addJoin(NilaiRaporPeer::ID_EVALUASI, MatevRaporPeer::ID_EVALUASI, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NilaiRaporPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NilaiRaporPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = NilaiRaporPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NilaiRaporPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = MatevRaporPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = MatevRaporPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MatevRaporPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    MatevRaporPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (NilaiRapor) to $obj2 (MatevRapor)
                $obj2->addNilaiRapor($obj1);

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
        $criteria->setPrimaryTableName(NilaiRaporPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NilaiRaporPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(NilaiRaporPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NilaiRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NilaiRaporPeer::ID_EVALUASI, MatevRaporPeer::ID_EVALUASI, $join_behavior);

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
     * Selects a collection of NilaiRapor objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NilaiRapor objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NilaiRaporPeer::DATABASE_NAME);
        }

        NilaiRaporPeer::addSelectColumns($criteria);
        $startcol2 = NilaiRaporPeer::NUM_HYDRATE_COLUMNS;

        MatevRaporPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + MatevRaporPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(NilaiRaporPeer::ID_EVALUASI, MatevRaporPeer::ID_EVALUASI, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NilaiRaporPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NilaiRaporPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = NilaiRaporPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NilaiRaporPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined MatevRapor rows

            $key2 = MatevRaporPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = MatevRaporPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = MatevRaporPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    MatevRaporPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (NilaiRapor) to the collection in $obj2 (MatevRapor)
                $obj2->addNilaiRapor($obj1);
            } // if joined row not null

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
        return Propel::getDatabaseMap(NilaiRaporPeer::DATABASE_NAME)->getTable(NilaiRaporPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseNilaiRaporPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseNilaiRaporPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new NilaiRaporTableMap());
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
        return NilaiRaporPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a NilaiRapor or Criteria object.
     *
     * @param      mixed $values Criteria or NilaiRapor object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NilaiRaporPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from NilaiRapor object
        }


        // Set the correct dbName
        $criteria->setDbName(NilaiRaporPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a NilaiRapor or Criteria object.
     *
     * @param      mixed $values Criteria or NilaiRapor object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NilaiRaporPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(NilaiRaporPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(NilaiRaporPeer::NILAI_ID);
            $value = $criteria->remove(NilaiRaporPeer::NILAI_ID);
            if ($value) {
                $selectCriteria->add(NilaiRaporPeer::NILAI_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(NilaiRaporPeer::TABLE_NAME);
            }

        } else { // $values is NilaiRapor object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(NilaiRaporPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the nilai.nilai_rapor table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NilaiRaporPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(NilaiRaporPeer::TABLE_NAME, $con, NilaiRaporPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NilaiRaporPeer::clearInstancePool();
            NilaiRaporPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a NilaiRapor or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or NilaiRapor object or primary key or array of primary keys
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
            $con = Propel::getConnection(NilaiRaporPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            NilaiRaporPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof NilaiRapor) { // it's a model object
            // invalidate the cache for this single object
            NilaiRaporPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(NilaiRaporPeer::DATABASE_NAME);
            $criteria->add(NilaiRaporPeer::NILAI_ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                NilaiRaporPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(NilaiRaporPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            NilaiRaporPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given NilaiRapor object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      NilaiRapor $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(NilaiRaporPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(NilaiRaporPeer::TABLE_NAME);

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

        return BasePeer::doValidate(NilaiRaporPeer::DATABASE_NAME, NilaiRaporPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      string $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return NilaiRapor
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = NilaiRaporPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(NilaiRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(NilaiRaporPeer::DATABASE_NAME);
        $criteria->add(NilaiRaporPeer::NILAI_ID, $pk);

        $v = NilaiRaporPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return NilaiRapor[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NilaiRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(NilaiRaporPeer::DATABASE_NAME);
            $criteria->add(NilaiRaporPeer::NILAI_ID, $pks, Criteria::IN);
            $objs = NilaiRaporPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

} // BaseNilaiRaporPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseNilaiRaporPeer::buildTableMap();

