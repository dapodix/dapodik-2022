<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\LargeObjectPeer;
use DataDikdas\Model\RuangLongitudinal;
use DataDikdas\Model\RuangLongitudinalPeer;
use DataDikdas\Model\RuangPeer;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\map\RuangLongitudinalTableMap;

/**
 * Base static class for performing query and update operations on the 'ruang_longitudinal' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseRuangLongitudinalPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'ruang_longitudinal';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\RuangLongitudinal';

    /** the related TableMap class for this table */
    const TM_CLASS = 'RuangLongitudinalTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 42;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 42;

    /** the column name for the id_ruang field */
    const ID_RUANG = 'ruang_longitudinal.id_ruang';

    /** the column name for the semester_id field */
    const SEMESTER_ID = 'ruang_longitudinal.semester_id';

    /** the column name for the blob_id field */
    const BLOB_ID = 'ruang_longitudinal.blob_id';

    /** the column name for the asal_data field */
    const ASAL_DATA = 'ruang_longitudinal.asal_data';

    /** the column name for the rusak_lisplang_talang field */
    const RUSAK_LISPLANG_TALANG = 'ruang_longitudinal.rusak_lisplang_talang';

    /** the column name for the ket_lisplang_talang field */
    const KET_LISPLANG_TALANG = 'ruang_longitudinal.ket_lisplang_talang';

    /** the column name for the rusak_rangka_plafon field */
    const RUSAK_RANGKA_PLAFON = 'ruang_longitudinal.rusak_rangka_plafon';

    /** the column name for the ket_rangka_plafon field */
    const KET_RANGKA_PLAFON = 'ruang_longitudinal.ket_rangka_plafon';

    /** the column name for the rusak_tutup_plafon field */
    const RUSAK_TUTUP_PLAFON = 'ruang_longitudinal.rusak_tutup_plafon';

    /** the column name for the ket_tutup_plafon field */
    const KET_TUTUP_PLAFON = 'ruang_longitudinal.ket_tutup_plafon';

    /** the column name for the rusak_bata_dinding field */
    const RUSAK_BATA_DINDING = 'ruang_longitudinal.rusak_bata_dinding';

    /** the column name for the ket_bata_dinding field */
    const KET_BATA_DINDING = 'ruang_longitudinal.ket_bata_dinding';

    /** the column name for the rusak_plester_dinding field */
    const RUSAK_PLESTER_DINDING = 'ruang_longitudinal.rusak_plester_dinding';

    /** the column name for the ket_plester_dinding field */
    const KET_PLESTER_DINDING = 'ruang_longitudinal.ket_plester_dinding';

    /** the column name for the rusak_daun_jendela field */
    const RUSAK_DAUN_JENDELA = 'ruang_longitudinal.rusak_daun_jendela';

    /** the column name for the ket_daun_jendela field */
    const KET_DAUN_JENDELA = 'ruang_longitudinal.ket_daun_jendela';

    /** the column name for the rusak_daun_pintu field */
    const RUSAK_DAUN_PINTU = 'ruang_longitudinal.rusak_daun_pintu';

    /** the column name for the ket_daun_pintu field */
    const KET_DAUN_PINTU = 'ruang_longitudinal.ket_daun_pintu';

    /** the column name for the rusak_kusen field */
    const RUSAK_KUSEN = 'ruang_longitudinal.rusak_kusen';

    /** the column name for the ket_kusen field */
    const KET_KUSEN = 'ruang_longitudinal.ket_kusen';

    /** the column name for the rusak_tutup_lantai field */
    const RUSAK_TUTUP_LANTAI = 'ruang_longitudinal.rusak_tutup_lantai';

    /** the column name for the ket_penutup_lantai field */
    const KET_PENUTUP_LANTAI = 'ruang_longitudinal.ket_penutup_lantai';

    /** the column name for the rusak_inst_listrik field */
    const RUSAK_INST_LISTRIK = 'ruang_longitudinal.rusak_inst_listrik';

    /** the column name for the ket_inst_listrik field */
    const KET_INST_LISTRIK = 'ruang_longitudinal.ket_inst_listrik';

    /** the column name for the rusak_inst_air field */
    const RUSAK_INST_AIR = 'ruang_longitudinal.rusak_inst_air';

    /** the column name for the ket_inst_air field */
    const KET_INST_AIR = 'ruang_longitudinal.ket_inst_air';

    /** the column name for the rusak_drainase field */
    const RUSAK_DRAINASE = 'ruang_longitudinal.rusak_drainase';

    /** the column name for the ket_drainase field */
    const KET_DRAINASE = 'ruang_longitudinal.ket_drainase';

    /** the column name for the rusak_finish_struktur field */
    const RUSAK_FINISH_STRUKTUR = 'ruang_longitudinal.rusak_finish_struktur';

    /** the column name for the ket_finish_struktur field */
    const KET_FINISH_STRUKTUR = 'ruang_longitudinal.ket_finish_struktur';

    /** the column name for the rusak_finish_plafon field */
    const RUSAK_FINISH_PLAFON = 'ruang_longitudinal.rusak_finish_plafon';

    /** the column name for the ket_finish_plafon field */
    const KET_FINISH_PLAFON = 'ruang_longitudinal.ket_finish_plafon';

    /** the column name for the rusak_finish_dinding field */
    const RUSAK_FINISH_DINDING = 'ruang_longitudinal.rusak_finish_dinding';

    /** the column name for the ket_finish_dinding field */
    const KET_FINISH_DINDING = 'ruang_longitudinal.ket_finish_dinding';

    /** the column name for the rusak_finish_kpj field */
    const RUSAK_FINISH_KPJ = 'ruang_longitudinal.rusak_finish_kpj';

    /** the column name for the ket_finish_kpj field */
    const KET_FINISH_KPJ = 'ruang_longitudinal.ket_finish_kpj';

    /** the column name for the berfungsi field */
    const BERFUNGSI = 'ruang_longitudinal.berfungsi';

    /** the column name for the create_date field */
    const CREATE_DATE = 'ruang_longitudinal.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'ruang_longitudinal.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'ruang_longitudinal.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'ruang_longitudinal.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'ruang_longitudinal.updater_id';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of RuangLongitudinal objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array RuangLongitudinal[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. RuangLongitudinalPeer::$fieldNames[RuangLongitudinalPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('IdRuang', 'SemesterId', 'BlobId', 'AsalData', 'RusakLisplangTalang', 'KetLisplangTalang', 'RusakRangkaPlafon', 'KetRangkaPlafon', 'RusakTutupPlafon', 'KetTutupPlafon', 'RusakBataDinding', 'KetBataDinding', 'RusakPlesterDinding', 'KetPlesterDinding', 'RusakDaunJendela', 'KetDaunJendela', 'RusakDaunPintu', 'KetDaunPintu', 'RusakKusen', 'KetKusen', 'RusakTutupLantai', 'KetPenutupLantai', 'RusakInstListrik', 'KetInstListrik', 'RusakInstAir', 'KetInstAir', 'RusakDrainase', 'KetDrainase', 'RusakFinishStruktur', 'KetFinishStruktur', 'RusakFinishPlafon', 'KetFinishPlafon', 'RusakFinishDinding', 'KetFinishDinding', 'RusakFinishKpj', 'KetFinishKpj', 'Berfungsi', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idRuang', 'semesterId', 'blobId', 'asalData', 'rusakLisplangTalang', 'ketLisplangTalang', 'rusakRangkaPlafon', 'ketRangkaPlafon', 'rusakTutupPlafon', 'ketTutupPlafon', 'rusakBataDinding', 'ketBataDinding', 'rusakPlesterDinding', 'ketPlesterDinding', 'rusakDaunJendela', 'ketDaunJendela', 'rusakDaunPintu', 'ketDaunPintu', 'rusakKusen', 'ketKusen', 'rusakTutupLantai', 'ketPenutupLantai', 'rusakInstListrik', 'ketInstListrik', 'rusakInstAir', 'ketInstAir', 'rusakDrainase', 'ketDrainase', 'rusakFinishStruktur', 'ketFinishStruktur', 'rusakFinishPlafon', 'ketFinishPlafon', 'rusakFinishDinding', 'ketFinishDinding', 'rusakFinishKpj', 'ketFinishKpj', 'berfungsi', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', ),
        BasePeer::TYPE_COLNAME => array (RuangLongitudinalPeer::ID_RUANG, RuangLongitudinalPeer::SEMESTER_ID, RuangLongitudinalPeer::BLOB_ID, RuangLongitudinalPeer::ASAL_DATA, RuangLongitudinalPeer::RUSAK_LISPLANG_TALANG, RuangLongitudinalPeer::KET_LISPLANG_TALANG, RuangLongitudinalPeer::RUSAK_RANGKA_PLAFON, RuangLongitudinalPeer::KET_RANGKA_PLAFON, RuangLongitudinalPeer::RUSAK_TUTUP_PLAFON, RuangLongitudinalPeer::KET_TUTUP_PLAFON, RuangLongitudinalPeer::RUSAK_BATA_DINDING, RuangLongitudinalPeer::KET_BATA_DINDING, RuangLongitudinalPeer::RUSAK_PLESTER_DINDING, RuangLongitudinalPeer::KET_PLESTER_DINDING, RuangLongitudinalPeer::RUSAK_DAUN_JENDELA, RuangLongitudinalPeer::KET_DAUN_JENDELA, RuangLongitudinalPeer::RUSAK_DAUN_PINTU, RuangLongitudinalPeer::KET_DAUN_PINTU, RuangLongitudinalPeer::RUSAK_KUSEN, RuangLongitudinalPeer::KET_KUSEN, RuangLongitudinalPeer::RUSAK_TUTUP_LANTAI, RuangLongitudinalPeer::KET_PENUTUP_LANTAI, RuangLongitudinalPeer::RUSAK_INST_LISTRIK, RuangLongitudinalPeer::KET_INST_LISTRIK, RuangLongitudinalPeer::RUSAK_INST_AIR, RuangLongitudinalPeer::KET_INST_AIR, RuangLongitudinalPeer::RUSAK_DRAINASE, RuangLongitudinalPeer::KET_DRAINASE, RuangLongitudinalPeer::RUSAK_FINISH_STRUKTUR, RuangLongitudinalPeer::KET_FINISH_STRUKTUR, RuangLongitudinalPeer::RUSAK_FINISH_PLAFON, RuangLongitudinalPeer::KET_FINISH_PLAFON, RuangLongitudinalPeer::RUSAK_FINISH_DINDING, RuangLongitudinalPeer::KET_FINISH_DINDING, RuangLongitudinalPeer::RUSAK_FINISH_KPJ, RuangLongitudinalPeer::KET_FINISH_KPJ, RuangLongitudinalPeer::BERFUNGSI, RuangLongitudinalPeer::CREATE_DATE, RuangLongitudinalPeer::LAST_UPDATE, RuangLongitudinalPeer::SOFT_DELETE, RuangLongitudinalPeer::LAST_SYNC, RuangLongitudinalPeer::UPDATER_ID, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_RUANG', 'SEMESTER_ID', 'BLOB_ID', 'ASAL_DATA', 'RUSAK_LISPLANG_TALANG', 'KET_LISPLANG_TALANG', 'RUSAK_RANGKA_PLAFON', 'KET_RANGKA_PLAFON', 'RUSAK_TUTUP_PLAFON', 'KET_TUTUP_PLAFON', 'RUSAK_BATA_DINDING', 'KET_BATA_DINDING', 'RUSAK_PLESTER_DINDING', 'KET_PLESTER_DINDING', 'RUSAK_DAUN_JENDELA', 'KET_DAUN_JENDELA', 'RUSAK_DAUN_PINTU', 'KET_DAUN_PINTU', 'RUSAK_KUSEN', 'KET_KUSEN', 'RUSAK_TUTUP_LANTAI', 'KET_PENUTUP_LANTAI', 'RUSAK_INST_LISTRIK', 'KET_INST_LISTRIK', 'RUSAK_INST_AIR', 'KET_INST_AIR', 'RUSAK_DRAINASE', 'KET_DRAINASE', 'RUSAK_FINISH_STRUKTUR', 'KET_FINISH_STRUKTUR', 'RUSAK_FINISH_PLAFON', 'KET_FINISH_PLAFON', 'RUSAK_FINISH_DINDING', 'KET_FINISH_DINDING', 'RUSAK_FINISH_KPJ', 'KET_FINISH_KPJ', 'BERFUNGSI', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', ),
        BasePeer::TYPE_FIELDNAME => array ('id_ruang', 'semester_id', 'blob_id', 'asal_data', 'rusak_lisplang_talang', 'ket_lisplang_talang', 'rusak_rangka_plafon', 'ket_rangka_plafon', 'rusak_tutup_plafon', 'ket_tutup_plafon', 'rusak_bata_dinding', 'ket_bata_dinding', 'rusak_plester_dinding', 'ket_plester_dinding', 'rusak_daun_jendela', 'ket_daun_jendela', 'rusak_daun_pintu', 'ket_daun_pintu', 'rusak_kusen', 'ket_kusen', 'rusak_tutup_lantai', 'ket_penutup_lantai', 'rusak_inst_listrik', 'ket_inst_listrik', 'rusak_inst_air', 'ket_inst_air', 'rusak_drainase', 'ket_drainase', 'rusak_finish_struktur', 'ket_finish_struktur', 'rusak_finish_plafon', 'ket_finish_plafon', 'rusak_finish_dinding', 'ket_finish_dinding', 'rusak_finish_kpj', 'ket_finish_kpj', 'berfungsi', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. RuangLongitudinalPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('IdRuang' => 0, 'SemesterId' => 1, 'BlobId' => 2, 'AsalData' => 3, 'RusakLisplangTalang' => 4, 'KetLisplangTalang' => 5, 'RusakRangkaPlafon' => 6, 'KetRangkaPlafon' => 7, 'RusakTutupPlafon' => 8, 'KetTutupPlafon' => 9, 'RusakBataDinding' => 10, 'KetBataDinding' => 11, 'RusakPlesterDinding' => 12, 'KetPlesterDinding' => 13, 'RusakDaunJendela' => 14, 'KetDaunJendela' => 15, 'RusakDaunPintu' => 16, 'KetDaunPintu' => 17, 'RusakKusen' => 18, 'KetKusen' => 19, 'RusakTutupLantai' => 20, 'KetPenutupLantai' => 21, 'RusakInstListrik' => 22, 'KetInstListrik' => 23, 'RusakInstAir' => 24, 'KetInstAir' => 25, 'RusakDrainase' => 26, 'KetDrainase' => 27, 'RusakFinishStruktur' => 28, 'KetFinishStruktur' => 29, 'RusakFinishPlafon' => 30, 'KetFinishPlafon' => 31, 'RusakFinishDinding' => 32, 'KetFinishDinding' => 33, 'RusakFinishKpj' => 34, 'KetFinishKpj' => 35, 'Berfungsi' => 36, 'CreateDate' => 37, 'LastUpdate' => 38, 'SoftDelete' => 39, 'LastSync' => 40, 'UpdaterId' => 41, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('idRuang' => 0, 'semesterId' => 1, 'blobId' => 2, 'asalData' => 3, 'rusakLisplangTalang' => 4, 'ketLisplangTalang' => 5, 'rusakRangkaPlafon' => 6, 'ketRangkaPlafon' => 7, 'rusakTutupPlafon' => 8, 'ketTutupPlafon' => 9, 'rusakBataDinding' => 10, 'ketBataDinding' => 11, 'rusakPlesterDinding' => 12, 'ketPlesterDinding' => 13, 'rusakDaunJendela' => 14, 'ketDaunJendela' => 15, 'rusakDaunPintu' => 16, 'ketDaunPintu' => 17, 'rusakKusen' => 18, 'ketKusen' => 19, 'rusakTutupLantai' => 20, 'ketPenutupLantai' => 21, 'rusakInstListrik' => 22, 'ketInstListrik' => 23, 'rusakInstAir' => 24, 'ketInstAir' => 25, 'rusakDrainase' => 26, 'ketDrainase' => 27, 'rusakFinishStruktur' => 28, 'ketFinishStruktur' => 29, 'rusakFinishPlafon' => 30, 'ketFinishPlafon' => 31, 'rusakFinishDinding' => 32, 'ketFinishDinding' => 33, 'rusakFinishKpj' => 34, 'ketFinishKpj' => 35, 'berfungsi' => 36, 'createDate' => 37, 'lastUpdate' => 38, 'softDelete' => 39, 'lastSync' => 40, 'updaterId' => 41, ),
        BasePeer::TYPE_COLNAME => array (RuangLongitudinalPeer::ID_RUANG => 0, RuangLongitudinalPeer::SEMESTER_ID => 1, RuangLongitudinalPeer::BLOB_ID => 2, RuangLongitudinalPeer::ASAL_DATA => 3, RuangLongitudinalPeer::RUSAK_LISPLANG_TALANG => 4, RuangLongitudinalPeer::KET_LISPLANG_TALANG => 5, RuangLongitudinalPeer::RUSAK_RANGKA_PLAFON => 6, RuangLongitudinalPeer::KET_RANGKA_PLAFON => 7, RuangLongitudinalPeer::RUSAK_TUTUP_PLAFON => 8, RuangLongitudinalPeer::KET_TUTUP_PLAFON => 9, RuangLongitudinalPeer::RUSAK_BATA_DINDING => 10, RuangLongitudinalPeer::KET_BATA_DINDING => 11, RuangLongitudinalPeer::RUSAK_PLESTER_DINDING => 12, RuangLongitudinalPeer::KET_PLESTER_DINDING => 13, RuangLongitudinalPeer::RUSAK_DAUN_JENDELA => 14, RuangLongitudinalPeer::KET_DAUN_JENDELA => 15, RuangLongitudinalPeer::RUSAK_DAUN_PINTU => 16, RuangLongitudinalPeer::KET_DAUN_PINTU => 17, RuangLongitudinalPeer::RUSAK_KUSEN => 18, RuangLongitudinalPeer::KET_KUSEN => 19, RuangLongitudinalPeer::RUSAK_TUTUP_LANTAI => 20, RuangLongitudinalPeer::KET_PENUTUP_LANTAI => 21, RuangLongitudinalPeer::RUSAK_INST_LISTRIK => 22, RuangLongitudinalPeer::KET_INST_LISTRIK => 23, RuangLongitudinalPeer::RUSAK_INST_AIR => 24, RuangLongitudinalPeer::KET_INST_AIR => 25, RuangLongitudinalPeer::RUSAK_DRAINASE => 26, RuangLongitudinalPeer::KET_DRAINASE => 27, RuangLongitudinalPeer::RUSAK_FINISH_STRUKTUR => 28, RuangLongitudinalPeer::KET_FINISH_STRUKTUR => 29, RuangLongitudinalPeer::RUSAK_FINISH_PLAFON => 30, RuangLongitudinalPeer::KET_FINISH_PLAFON => 31, RuangLongitudinalPeer::RUSAK_FINISH_DINDING => 32, RuangLongitudinalPeer::KET_FINISH_DINDING => 33, RuangLongitudinalPeer::RUSAK_FINISH_KPJ => 34, RuangLongitudinalPeer::KET_FINISH_KPJ => 35, RuangLongitudinalPeer::BERFUNGSI => 36, RuangLongitudinalPeer::CREATE_DATE => 37, RuangLongitudinalPeer::LAST_UPDATE => 38, RuangLongitudinalPeer::SOFT_DELETE => 39, RuangLongitudinalPeer::LAST_SYNC => 40, RuangLongitudinalPeer::UPDATER_ID => 41, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID_RUANG' => 0, 'SEMESTER_ID' => 1, 'BLOB_ID' => 2, 'ASAL_DATA' => 3, 'RUSAK_LISPLANG_TALANG' => 4, 'KET_LISPLANG_TALANG' => 5, 'RUSAK_RANGKA_PLAFON' => 6, 'KET_RANGKA_PLAFON' => 7, 'RUSAK_TUTUP_PLAFON' => 8, 'KET_TUTUP_PLAFON' => 9, 'RUSAK_BATA_DINDING' => 10, 'KET_BATA_DINDING' => 11, 'RUSAK_PLESTER_DINDING' => 12, 'KET_PLESTER_DINDING' => 13, 'RUSAK_DAUN_JENDELA' => 14, 'KET_DAUN_JENDELA' => 15, 'RUSAK_DAUN_PINTU' => 16, 'KET_DAUN_PINTU' => 17, 'RUSAK_KUSEN' => 18, 'KET_KUSEN' => 19, 'RUSAK_TUTUP_LANTAI' => 20, 'KET_PENUTUP_LANTAI' => 21, 'RUSAK_INST_LISTRIK' => 22, 'KET_INST_LISTRIK' => 23, 'RUSAK_INST_AIR' => 24, 'KET_INST_AIR' => 25, 'RUSAK_DRAINASE' => 26, 'KET_DRAINASE' => 27, 'RUSAK_FINISH_STRUKTUR' => 28, 'KET_FINISH_STRUKTUR' => 29, 'RUSAK_FINISH_PLAFON' => 30, 'KET_FINISH_PLAFON' => 31, 'RUSAK_FINISH_DINDING' => 32, 'KET_FINISH_DINDING' => 33, 'RUSAK_FINISH_KPJ' => 34, 'KET_FINISH_KPJ' => 35, 'BERFUNGSI' => 36, 'CREATE_DATE' => 37, 'LAST_UPDATE' => 38, 'SOFT_DELETE' => 39, 'LAST_SYNC' => 40, 'UPDATER_ID' => 41, ),
        BasePeer::TYPE_FIELDNAME => array ('id_ruang' => 0, 'semester_id' => 1, 'blob_id' => 2, 'asal_data' => 3, 'rusak_lisplang_talang' => 4, 'ket_lisplang_talang' => 5, 'rusak_rangka_plafon' => 6, 'ket_rangka_plafon' => 7, 'rusak_tutup_plafon' => 8, 'ket_tutup_plafon' => 9, 'rusak_bata_dinding' => 10, 'ket_bata_dinding' => 11, 'rusak_plester_dinding' => 12, 'ket_plester_dinding' => 13, 'rusak_daun_jendela' => 14, 'ket_daun_jendela' => 15, 'rusak_daun_pintu' => 16, 'ket_daun_pintu' => 17, 'rusak_kusen' => 18, 'ket_kusen' => 19, 'rusak_tutup_lantai' => 20, 'ket_penutup_lantai' => 21, 'rusak_inst_listrik' => 22, 'ket_inst_listrik' => 23, 'rusak_inst_air' => 24, 'ket_inst_air' => 25, 'rusak_drainase' => 26, 'ket_drainase' => 27, 'rusak_finish_struktur' => 28, 'ket_finish_struktur' => 29, 'rusak_finish_plafon' => 30, 'ket_finish_plafon' => 31, 'rusak_finish_dinding' => 32, 'ket_finish_dinding' => 33, 'rusak_finish_kpj' => 34, 'ket_finish_kpj' => 35, 'berfungsi' => 36, 'create_date' => 37, 'last_update' => 38, 'soft_delete' => 39, 'last_sync' => 40, 'updater_id' => 41, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, )
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
        $toNames = RuangLongitudinalPeer::getFieldNames($toType);
        $key = isset(RuangLongitudinalPeer::$fieldKeys[$fromType][$name]) ? RuangLongitudinalPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(RuangLongitudinalPeer::$fieldKeys[$fromType], true));
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
        if (!array_key_exists($type, RuangLongitudinalPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return RuangLongitudinalPeer::$fieldNames[$type];
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
     * @param      string $column The column name for current table. (i.e. RuangLongitudinalPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(RuangLongitudinalPeer::TABLE_NAME.'.', $alias.'.', $column);
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
            $criteria->addSelectColumn(RuangLongitudinalPeer::ID_RUANG);
            $criteria->addSelectColumn(RuangLongitudinalPeer::SEMESTER_ID);
            $criteria->addSelectColumn(RuangLongitudinalPeer::BLOB_ID);
            $criteria->addSelectColumn(RuangLongitudinalPeer::ASAL_DATA);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_LISPLANG_TALANG);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_LISPLANG_TALANG);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_RANGKA_PLAFON);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_RANGKA_PLAFON);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_TUTUP_PLAFON);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_TUTUP_PLAFON);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_BATA_DINDING);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_BATA_DINDING);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_PLESTER_DINDING);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_PLESTER_DINDING);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_DAUN_JENDELA);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_DAUN_JENDELA);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_DAUN_PINTU);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_DAUN_PINTU);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_KUSEN);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_KUSEN);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_TUTUP_LANTAI);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_PENUTUP_LANTAI);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_INST_LISTRIK);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_INST_LISTRIK);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_INST_AIR);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_INST_AIR);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_DRAINASE);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_DRAINASE);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_FINISH_STRUKTUR);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_FINISH_STRUKTUR);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_FINISH_PLAFON);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_FINISH_PLAFON);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_FINISH_DINDING);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_FINISH_DINDING);
            $criteria->addSelectColumn(RuangLongitudinalPeer::RUSAK_FINISH_KPJ);
            $criteria->addSelectColumn(RuangLongitudinalPeer::KET_FINISH_KPJ);
            $criteria->addSelectColumn(RuangLongitudinalPeer::BERFUNGSI);
            $criteria->addSelectColumn(RuangLongitudinalPeer::CREATE_DATE);
            $criteria->addSelectColumn(RuangLongitudinalPeer::LAST_UPDATE);
            $criteria->addSelectColumn(RuangLongitudinalPeer::SOFT_DELETE);
            $criteria->addSelectColumn(RuangLongitudinalPeer::LAST_SYNC);
            $criteria->addSelectColumn(RuangLongitudinalPeer::UPDATER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id_ruang');
            $criteria->addSelectColumn($alias . '.semester_id');
            $criteria->addSelectColumn($alias . '.blob_id');
            $criteria->addSelectColumn($alias . '.asal_data');
            $criteria->addSelectColumn($alias . '.rusak_lisplang_talang');
            $criteria->addSelectColumn($alias . '.ket_lisplang_talang');
            $criteria->addSelectColumn($alias . '.rusak_rangka_plafon');
            $criteria->addSelectColumn($alias . '.ket_rangka_plafon');
            $criteria->addSelectColumn($alias . '.rusak_tutup_plafon');
            $criteria->addSelectColumn($alias . '.ket_tutup_plafon');
            $criteria->addSelectColumn($alias . '.rusak_bata_dinding');
            $criteria->addSelectColumn($alias . '.ket_bata_dinding');
            $criteria->addSelectColumn($alias . '.rusak_plester_dinding');
            $criteria->addSelectColumn($alias . '.ket_plester_dinding');
            $criteria->addSelectColumn($alias . '.rusak_daun_jendela');
            $criteria->addSelectColumn($alias . '.ket_daun_jendela');
            $criteria->addSelectColumn($alias . '.rusak_daun_pintu');
            $criteria->addSelectColumn($alias . '.ket_daun_pintu');
            $criteria->addSelectColumn($alias . '.rusak_kusen');
            $criteria->addSelectColumn($alias . '.ket_kusen');
            $criteria->addSelectColumn($alias . '.rusak_tutup_lantai');
            $criteria->addSelectColumn($alias . '.ket_penutup_lantai');
            $criteria->addSelectColumn($alias . '.rusak_inst_listrik');
            $criteria->addSelectColumn($alias . '.ket_inst_listrik');
            $criteria->addSelectColumn($alias . '.rusak_inst_air');
            $criteria->addSelectColumn($alias . '.ket_inst_air');
            $criteria->addSelectColumn($alias . '.rusak_drainase');
            $criteria->addSelectColumn($alias . '.ket_drainase');
            $criteria->addSelectColumn($alias . '.rusak_finish_struktur');
            $criteria->addSelectColumn($alias . '.ket_finish_struktur');
            $criteria->addSelectColumn($alias . '.rusak_finish_plafon');
            $criteria->addSelectColumn($alias . '.ket_finish_plafon');
            $criteria->addSelectColumn($alias . '.rusak_finish_dinding');
            $criteria->addSelectColumn($alias . '.ket_finish_dinding');
            $criteria->addSelectColumn($alias . '.rusak_finish_kpj');
            $criteria->addSelectColumn($alias . '.ket_finish_kpj');
            $criteria->addSelectColumn($alias . '.berfungsi');
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
        $criteria->setPrimaryTableName(RuangLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RuangLongitudinal
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = RuangLongitudinalPeer::doSelect($critcopy, $con);
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
        return RuangLongitudinalPeer::populateObjects(RuangLongitudinalPeer::doSelectStmt($criteria, $con));
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
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            RuangLongitudinalPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);

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
     * @param      RuangLongitudinal $obj A RuangLongitudinal object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getIdRuang(), (string) $obj->getSemesterId()));
            } // if key === null
            RuangLongitudinalPeer::$instances[$key] = $obj;
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
     * @param      mixed $value A RuangLongitudinal object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof RuangLongitudinal) {
                $key = serialize(array((string) $value->getIdRuang(), (string) $value->getSemesterId()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or RuangLongitudinal object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(RuangLongitudinalPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   RuangLongitudinal Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(RuangLongitudinalPeer::$instances[$key])) {
                return RuangLongitudinalPeer::$instances[$key];
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
        foreach (RuangLongitudinalPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        RuangLongitudinalPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to ruang_longitudinal
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
        $cls = RuangLongitudinalPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = RuangLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = RuangLongitudinalPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                RuangLongitudinalPeer::addInstanceToPool($obj, $key);
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
     * @return array (RuangLongitudinal object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = RuangLongitudinalPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = RuangLongitudinalPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + RuangLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = RuangLongitudinalPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            RuangLongitudinalPeer::addInstanceToPool($obj, $key);
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
        $criteria->setPrimaryTableName(RuangLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RuangLongitudinalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LargeObject table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinLargeObject(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RuangLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RuangLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RuangLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RuangLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
     * Selects a collection of RuangLongitudinal objects pre-filled with their Ruang objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RuangLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinRuang(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);
        }

        RuangLongitudinalPeer::addSelectColumns($criteria);
        $startcol = RuangLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        RuangPeer::addSelectColumns($criteria);

        $criteria->addJoin(RuangLongitudinalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RuangLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangLongitudinalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RuangLongitudinal) to $obj2 (Ruang)
                $obj2->addRuangLongitudinal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RuangLongitudinal objects pre-filled with their LargeObject objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RuangLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinLargeObject(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);
        }

        RuangLongitudinalPeer::addSelectColumns($criteria);
        $startcol = RuangLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        LargeObjectPeer::addSelectColumns($criteria);

        $criteria->addJoin(RuangLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RuangLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = LargeObjectPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = LargeObjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    LargeObjectPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (RuangLongitudinal) to $obj2 (LargeObject)
                $obj2->addRuangLongitudinal($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RuangLongitudinal objects pre-filled with their Semester objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RuangLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);
        }

        RuangLongitudinalPeer::addSelectColumns($criteria);
        $startcol = RuangLongitudinalPeer::NUM_HYDRATE_COLUMNS;
        SemesterPeer::addSelectColumns($criteria);

        $criteria->addJoin(RuangLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = RuangLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangLongitudinalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RuangLongitudinal) to $obj2 (Semester)
                $obj2->addRuangLongitudinal($obj1);

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
        $criteria->setPrimaryTableName(RuangLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(RuangLongitudinalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RuangLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(RuangLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
     * Selects a collection of RuangLongitudinal objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RuangLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);
        }

        RuangLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = RuangLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RuangLongitudinalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RuangLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(RuangLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RuangLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangLongitudinalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RuangLongitudinal) to the collection in $obj2 (Ruang)
                $obj2->addRuangLongitudinal($obj1);
            } // if joined row not null

            // Add objects for joined LargeObject rows

            $key3 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = LargeObjectPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = LargeObjectPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LargeObjectPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (RuangLongitudinal) to the collection in $obj3 (LargeObject)
                $obj3->addRuangLongitudinal($obj1);
            } // if joined row not null

            // Add objects for joined Semester rows

            $key4 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = SemesterPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = SemesterPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SemesterPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (RuangLongitudinal) to the collection in $obj4 (Semester)
                $obj4->addRuangLongitudinal($obj1);
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
        $criteria->setPrimaryTableName(RuangLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RuangLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(RuangLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
     * Returns the number of rows matching criteria, joining the related LargeObject table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptLargeObject(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(RuangLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RuangLongitudinalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RuangLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

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
        $criteria->setPrimaryTableName(RuangLongitudinalPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            RuangLongitudinalPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(RuangLongitudinalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RuangLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

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
     * Selects a collection of RuangLongitudinal objects pre-filled with all related objects except Ruang.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RuangLongitudinal objects.
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
            $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);
        }

        RuangLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = RuangLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RuangLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);

        $criteria->addJoin(RuangLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RuangLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangLongitudinalPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined LargeObject rows

                $key2 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = LargeObjectPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    LargeObjectPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (RuangLongitudinal) to the collection in $obj2 (LargeObject)
                $obj2->addRuangLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key3 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SemesterPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SemesterPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RuangLongitudinal) to the collection in $obj3 (Semester)
                $obj3->addRuangLongitudinal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RuangLongitudinal objects pre-filled with all related objects except LargeObject.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RuangLongitudinal objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptLargeObject(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);
        }

        RuangLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = RuangLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RuangLongitudinalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RuangLongitudinalPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RuangLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangLongitudinalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RuangLongitudinal) to the collection in $obj2 (Ruang)
                $obj2->addRuangLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key3 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SemesterPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SemesterPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RuangLongitudinal) to the collection in $obj3 (Semester)
                $obj3->addRuangLongitudinal($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of RuangLongitudinal objects pre-filled with all related objects except Semester.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of RuangLongitudinal objects.
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
            $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);
        }

        RuangLongitudinalPeer::addSelectColumns($criteria);
        $startcol2 = RuangLongitudinalPeer::NUM_HYDRATE_COLUMNS;

        RuangPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + RuangPeer::NUM_HYDRATE_COLUMNS;

        LargeObjectPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + LargeObjectPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(RuangLongitudinalPeer::ID_RUANG, RuangPeer::ID_RUANG, $join_behavior);

        $criteria->addJoin(RuangLongitudinalPeer::BLOB_ID, LargeObjectPeer::BLOB_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = RuangLongitudinalPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = RuangLongitudinalPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = RuangLongitudinalPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                RuangLongitudinalPeer::addInstanceToPool($obj1, $key1);
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

                // Add the $obj1 (RuangLongitudinal) to the collection in $obj2 (Ruang)
                $obj2->addRuangLongitudinal($obj1);

            } // if joined row is not null

                // Add objects for joined LargeObject rows

                $key3 = LargeObjectPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = LargeObjectPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = LargeObjectPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    LargeObjectPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (RuangLongitudinal) to the collection in $obj3 (LargeObject)
                $obj3->addRuangLongitudinal($obj1);

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
        return Propel::getDatabaseMap(RuangLongitudinalPeer::DATABASE_NAME)->getTable(RuangLongitudinalPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseRuangLongitudinalPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseRuangLongitudinalPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new RuangLongitudinalTableMap());
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
        return RuangLongitudinalPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a RuangLongitudinal or Criteria object.
     *
     * @param      mixed $values Criteria or RuangLongitudinal object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from RuangLongitudinal object
        }


        // Set the correct dbName
        $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);

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
     * Performs an UPDATE on the database, given a RuangLongitudinal or Criteria object.
     *
     * @param      mixed $values Criteria or RuangLongitudinal object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(RuangLongitudinalPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(RuangLongitudinalPeer::ID_RUANG);
            $value = $criteria->remove(RuangLongitudinalPeer::ID_RUANG);
            if ($value) {
                $selectCriteria->add(RuangLongitudinalPeer::ID_RUANG, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RuangLongitudinalPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(RuangLongitudinalPeer::SEMESTER_ID);
            $value = $criteria->remove(RuangLongitudinalPeer::SEMESTER_ID);
            if ($value) {
                $selectCriteria->add(RuangLongitudinalPeer::SEMESTER_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(RuangLongitudinalPeer::TABLE_NAME);
            }

        } else { // $values is RuangLongitudinal object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the ruang_longitudinal table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(RuangLongitudinalPeer::TABLE_NAME, $con, RuangLongitudinalPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RuangLongitudinalPeer::clearInstancePool();
            RuangLongitudinalPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a RuangLongitudinal or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or RuangLongitudinal object or primary key or array of primary keys
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
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            RuangLongitudinalPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof RuangLongitudinal) { // it's a model object
            // invalidate the cache for this single object
            RuangLongitudinalPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(RuangLongitudinalPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(RuangLongitudinalPeer::ID_RUANG, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(RuangLongitudinalPeer::SEMESTER_ID, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                RuangLongitudinalPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(RuangLongitudinalPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            RuangLongitudinalPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given RuangLongitudinal object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      RuangLongitudinal $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(RuangLongitudinalPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(RuangLongitudinalPeer::TABLE_NAME);

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

        return BasePeer::doValidate(RuangLongitudinalPeer::DATABASE_NAME, RuangLongitudinalPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $id_ruang
     * @param   string $semester_id
     * @param      PropelPDO $con
     * @return   RuangLongitudinal
     */
    public static function retrieveByPK($id_ruang, $semester_id, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $id_ruang, (string) $semester_id));
         if (null !== ($obj = RuangLongitudinalPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(RuangLongitudinalPeer::DATABASE_NAME);
        $criteria->add(RuangLongitudinalPeer::ID_RUANG, $id_ruang);
        $criteria->add(RuangLongitudinalPeer::SEMESTER_ID, $semester_id);
        $v = RuangLongitudinalPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseRuangLongitudinalPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseRuangLongitudinalPeer::buildTableMap();

