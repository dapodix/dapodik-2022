<?php

namespace DataDikdas\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\LargeObject;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangLongitudinal;
use DataDikdas\Model\RuangLongitudinalPeer;
use DataDikdas\Model\RuangLongitudinalQuery;
use DataDikdas\Model\Semester;

/**
 * Base class that represents a query for the 'ruang_longitudinal' table.
 *
 * 
 *
 * @method RuangLongitudinalQuery orderByIdRuang($order = Criteria::ASC) Order by the id_ruang column
 * @method RuangLongitudinalQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method RuangLongitudinalQuery orderByBlobId($order = Criteria::ASC) Order by the blob_id column
 * @method RuangLongitudinalQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method RuangLongitudinalQuery orderByRusakLisplangTalang($order = Criteria::ASC) Order by the rusak_lisplang_talang column
 * @method RuangLongitudinalQuery orderByKetLisplangTalang($order = Criteria::ASC) Order by the ket_lisplang_talang column
 * @method RuangLongitudinalQuery orderByRusakRangkaPlafon($order = Criteria::ASC) Order by the rusak_rangka_plafon column
 * @method RuangLongitudinalQuery orderByKetRangkaPlafon($order = Criteria::ASC) Order by the ket_rangka_plafon column
 * @method RuangLongitudinalQuery orderByRusakTutupPlafon($order = Criteria::ASC) Order by the rusak_tutup_plafon column
 * @method RuangLongitudinalQuery orderByKetTutupPlafon($order = Criteria::ASC) Order by the ket_tutup_plafon column
 * @method RuangLongitudinalQuery orderByRusakBataDinding($order = Criteria::ASC) Order by the rusak_bata_dinding column
 * @method RuangLongitudinalQuery orderByKetBataDinding($order = Criteria::ASC) Order by the ket_bata_dinding column
 * @method RuangLongitudinalQuery orderByRusakPlesterDinding($order = Criteria::ASC) Order by the rusak_plester_dinding column
 * @method RuangLongitudinalQuery orderByKetPlesterDinding($order = Criteria::ASC) Order by the ket_plester_dinding column
 * @method RuangLongitudinalQuery orderByRusakDaunJendela($order = Criteria::ASC) Order by the rusak_daun_jendela column
 * @method RuangLongitudinalQuery orderByKetDaunJendela($order = Criteria::ASC) Order by the ket_daun_jendela column
 * @method RuangLongitudinalQuery orderByRusakDaunPintu($order = Criteria::ASC) Order by the rusak_daun_pintu column
 * @method RuangLongitudinalQuery orderByKetDaunPintu($order = Criteria::ASC) Order by the ket_daun_pintu column
 * @method RuangLongitudinalQuery orderByRusakKusen($order = Criteria::ASC) Order by the rusak_kusen column
 * @method RuangLongitudinalQuery orderByKetKusen($order = Criteria::ASC) Order by the ket_kusen column
 * @method RuangLongitudinalQuery orderByRusakTutupLantai($order = Criteria::ASC) Order by the rusak_tutup_lantai column
 * @method RuangLongitudinalQuery orderByKetPenutupLantai($order = Criteria::ASC) Order by the ket_penutup_lantai column
 * @method RuangLongitudinalQuery orderByRusakInstListrik($order = Criteria::ASC) Order by the rusak_inst_listrik column
 * @method RuangLongitudinalQuery orderByKetInstListrik($order = Criteria::ASC) Order by the ket_inst_listrik column
 * @method RuangLongitudinalQuery orderByRusakInstAir($order = Criteria::ASC) Order by the rusak_inst_air column
 * @method RuangLongitudinalQuery orderByKetInstAir($order = Criteria::ASC) Order by the ket_inst_air column
 * @method RuangLongitudinalQuery orderByRusakDrainase($order = Criteria::ASC) Order by the rusak_drainase column
 * @method RuangLongitudinalQuery orderByKetDrainase($order = Criteria::ASC) Order by the ket_drainase column
 * @method RuangLongitudinalQuery orderByRusakFinishStruktur($order = Criteria::ASC) Order by the rusak_finish_struktur column
 * @method RuangLongitudinalQuery orderByKetFinishStruktur($order = Criteria::ASC) Order by the ket_finish_struktur column
 * @method RuangLongitudinalQuery orderByRusakFinishPlafon($order = Criteria::ASC) Order by the rusak_finish_plafon column
 * @method RuangLongitudinalQuery orderByKetFinishPlafon($order = Criteria::ASC) Order by the ket_finish_plafon column
 * @method RuangLongitudinalQuery orderByRusakFinishDinding($order = Criteria::ASC) Order by the rusak_finish_dinding column
 * @method RuangLongitudinalQuery orderByKetFinishDinding($order = Criteria::ASC) Order by the ket_finish_dinding column
 * @method RuangLongitudinalQuery orderByRusakFinishKpj($order = Criteria::ASC) Order by the rusak_finish_kpj column
 * @method RuangLongitudinalQuery orderByKetFinishKpj($order = Criteria::ASC) Order by the ket_finish_kpj column
 * @method RuangLongitudinalQuery orderByBerfungsi($order = Criteria::ASC) Order by the berfungsi column
 * @method RuangLongitudinalQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method RuangLongitudinalQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method RuangLongitudinalQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method RuangLongitudinalQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method RuangLongitudinalQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method RuangLongitudinalQuery groupByIdRuang() Group by the id_ruang column
 * @method RuangLongitudinalQuery groupBySemesterId() Group by the semester_id column
 * @method RuangLongitudinalQuery groupByBlobId() Group by the blob_id column
 * @method RuangLongitudinalQuery groupByAsalData() Group by the asal_data column
 * @method RuangLongitudinalQuery groupByRusakLisplangTalang() Group by the rusak_lisplang_talang column
 * @method RuangLongitudinalQuery groupByKetLisplangTalang() Group by the ket_lisplang_talang column
 * @method RuangLongitudinalQuery groupByRusakRangkaPlafon() Group by the rusak_rangka_plafon column
 * @method RuangLongitudinalQuery groupByKetRangkaPlafon() Group by the ket_rangka_plafon column
 * @method RuangLongitudinalQuery groupByRusakTutupPlafon() Group by the rusak_tutup_plafon column
 * @method RuangLongitudinalQuery groupByKetTutupPlafon() Group by the ket_tutup_plafon column
 * @method RuangLongitudinalQuery groupByRusakBataDinding() Group by the rusak_bata_dinding column
 * @method RuangLongitudinalQuery groupByKetBataDinding() Group by the ket_bata_dinding column
 * @method RuangLongitudinalQuery groupByRusakPlesterDinding() Group by the rusak_plester_dinding column
 * @method RuangLongitudinalQuery groupByKetPlesterDinding() Group by the ket_plester_dinding column
 * @method RuangLongitudinalQuery groupByRusakDaunJendela() Group by the rusak_daun_jendela column
 * @method RuangLongitudinalQuery groupByKetDaunJendela() Group by the ket_daun_jendela column
 * @method RuangLongitudinalQuery groupByRusakDaunPintu() Group by the rusak_daun_pintu column
 * @method RuangLongitudinalQuery groupByKetDaunPintu() Group by the ket_daun_pintu column
 * @method RuangLongitudinalQuery groupByRusakKusen() Group by the rusak_kusen column
 * @method RuangLongitudinalQuery groupByKetKusen() Group by the ket_kusen column
 * @method RuangLongitudinalQuery groupByRusakTutupLantai() Group by the rusak_tutup_lantai column
 * @method RuangLongitudinalQuery groupByKetPenutupLantai() Group by the ket_penutup_lantai column
 * @method RuangLongitudinalQuery groupByRusakInstListrik() Group by the rusak_inst_listrik column
 * @method RuangLongitudinalQuery groupByKetInstListrik() Group by the ket_inst_listrik column
 * @method RuangLongitudinalQuery groupByRusakInstAir() Group by the rusak_inst_air column
 * @method RuangLongitudinalQuery groupByKetInstAir() Group by the ket_inst_air column
 * @method RuangLongitudinalQuery groupByRusakDrainase() Group by the rusak_drainase column
 * @method RuangLongitudinalQuery groupByKetDrainase() Group by the ket_drainase column
 * @method RuangLongitudinalQuery groupByRusakFinishStruktur() Group by the rusak_finish_struktur column
 * @method RuangLongitudinalQuery groupByKetFinishStruktur() Group by the ket_finish_struktur column
 * @method RuangLongitudinalQuery groupByRusakFinishPlafon() Group by the rusak_finish_plafon column
 * @method RuangLongitudinalQuery groupByKetFinishPlafon() Group by the ket_finish_plafon column
 * @method RuangLongitudinalQuery groupByRusakFinishDinding() Group by the rusak_finish_dinding column
 * @method RuangLongitudinalQuery groupByKetFinishDinding() Group by the ket_finish_dinding column
 * @method RuangLongitudinalQuery groupByRusakFinishKpj() Group by the rusak_finish_kpj column
 * @method RuangLongitudinalQuery groupByKetFinishKpj() Group by the ket_finish_kpj column
 * @method RuangLongitudinalQuery groupByBerfungsi() Group by the berfungsi column
 * @method RuangLongitudinalQuery groupByCreateDate() Group by the create_date column
 * @method RuangLongitudinalQuery groupByLastUpdate() Group by the last_update column
 * @method RuangLongitudinalQuery groupBySoftDelete() Group by the soft_delete column
 * @method RuangLongitudinalQuery groupByLastSync() Group by the last_sync column
 * @method RuangLongitudinalQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method RuangLongitudinalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RuangLongitudinalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RuangLongitudinalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RuangLongitudinalQuery leftJoinRuang($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ruang relation
 * @method RuangLongitudinalQuery rightJoinRuang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ruang relation
 * @method RuangLongitudinalQuery innerJoinRuang($relationAlias = null) Adds a INNER JOIN clause to the query using the Ruang relation
 *
 * @method RuangLongitudinalQuery leftJoinLargeObject($relationAlias = null) Adds a LEFT JOIN clause to the query using the LargeObject relation
 * @method RuangLongitudinalQuery rightJoinLargeObject($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LargeObject relation
 * @method RuangLongitudinalQuery innerJoinLargeObject($relationAlias = null) Adds a INNER JOIN clause to the query using the LargeObject relation
 *
 * @method RuangLongitudinalQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method RuangLongitudinalQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method RuangLongitudinalQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method RuangLongitudinal findOne(PropelPDO $con = null) Return the first RuangLongitudinal matching the query
 * @method RuangLongitudinal findOneOrCreate(PropelPDO $con = null) Return the first RuangLongitudinal matching the query, or a new RuangLongitudinal object populated from the query conditions when no match is found
 *
 * @method RuangLongitudinal findOneByIdRuang(string $id_ruang) Return the first RuangLongitudinal filtered by the id_ruang column
 * @method RuangLongitudinal findOneBySemesterId(string $semester_id) Return the first RuangLongitudinal filtered by the semester_id column
 * @method RuangLongitudinal findOneByBlobId(string $blob_id) Return the first RuangLongitudinal filtered by the blob_id column
 * @method RuangLongitudinal findOneByAsalData(string $asal_data) Return the first RuangLongitudinal filtered by the asal_data column
 * @method RuangLongitudinal findOneByRusakLisplangTalang(string $rusak_lisplang_talang) Return the first RuangLongitudinal filtered by the rusak_lisplang_talang column
 * @method RuangLongitudinal findOneByKetLisplangTalang(string $ket_lisplang_talang) Return the first RuangLongitudinal filtered by the ket_lisplang_talang column
 * @method RuangLongitudinal findOneByRusakRangkaPlafon(string $rusak_rangka_plafon) Return the first RuangLongitudinal filtered by the rusak_rangka_plafon column
 * @method RuangLongitudinal findOneByKetRangkaPlafon(string $ket_rangka_plafon) Return the first RuangLongitudinal filtered by the ket_rangka_plafon column
 * @method RuangLongitudinal findOneByRusakTutupPlafon(string $rusak_tutup_plafon) Return the first RuangLongitudinal filtered by the rusak_tutup_plafon column
 * @method RuangLongitudinal findOneByKetTutupPlafon(string $ket_tutup_plafon) Return the first RuangLongitudinal filtered by the ket_tutup_plafon column
 * @method RuangLongitudinal findOneByRusakBataDinding(string $rusak_bata_dinding) Return the first RuangLongitudinal filtered by the rusak_bata_dinding column
 * @method RuangLongitudinal findOneByKetBataDinding(string $ket_bata_dinding) Return the first RuangLongitudinal filtered by the ket_bata_dinding column
 * @method RuangLongitudinal findOneByRusakPlesterDinding(string $rusak_plester_dinding) Return the first RuangLongitudinal filtered by the rusak_plester_dinding column
 * @method RuangLongitudinal findOneByKetPlesterDinding(string $ket_plester_dinding) Return the first RuangLongitudinal filtered by the ket_plester_dinding column
 * @method RuangLongitudinal findOneByRusakDaunJendela(string $rusak_daun_jendela) Return the first RuangLongitudinal filtered by the rusak_daun_jendela column
 * @method RuangLongitudinal findOneByKetDaunJendela(string $ket_daun_jendela) Return the first RuangLongitudinal filtered by the ket_daun_jendela column
 * @method RuangLongitudinal findOneByRusakDaunPintu(string $rusak_daun_pintu) Return the first RuangLongitudinal filtered by the rusak_daun_pintu column
 * @method RuangLongitudinal findOneByKetDaunPintu(string $ket_daun_pintu) Return the first RuangLongitudinal filtered by the ket_daun_pintu column
 * @method RuangLongitudinal findOneByRusakKusen(string $rusak_kusen) Return the first RuangLongitudinal filtered by the rusak_kusen column
 * @method RuangLongitudinal findOneByKetKusen(string $ket_kusen) Return the first RuangLongitudinal filtered by the ket_kusen column
 * @method RuangLongitudinal findOneByRusakTutupLantai(string $rusak_tutup_lantai) Return the first RuangLongitudinal filtered by the rusak_tutup_lantai column
 * @method RuangLongitudinal findOneByKetPenutupLantai(string $ket_penutup_lantai) Return the first RuangLongitudinal filtered by the ket_penutup_lantai column
 * @method RuangLongitudinal findOneByRusakInstListrik(string $rusak_inst_listrik) Return the first RuangLongitudinal filtered by the rusak_inst_listrik column
 * @method RuangLongitudinal findOneByKetInstListrik(string $ket_inst_listrik) Return the first RuangLongitudinal filtered by the ket_inst_listrik column
 * @method RuangLongitudinal findOneByRusakInstAir(string $rusak_inst_air) Return the first RuangLongitudinal filtered by the rusak_inst_air column
 * @method RuangLongitudinal findOneByKetInstAir(string $ket_inst_air) Return the first RuangLongitudinal filtered by the ket_inst_air column
 * @method RuangLongitudinal findOneByRusakDrainase(string $rusak_drainase) Return the first RuangLongitudinal filtered by the rusak_drainase column
 * @method RuangLongitudinal findOneByKetDrainase(string $ket_drainase) Return the first RuangLongitudinal filtered by the ket_drainase column
 * @method RuangLongitudinal findOneByRusakFinishStruktur(string $rusak_finish_struktur) Return the first RuangLongitudinal filtered by the rusak_finish_struktur column
 * @method RuangLongitudinal findOneByKetFinishStruktur(string $ket_finish_struktur) Return the first RuangLongitudinal filtered by the ket_finish_struktur column
 * @method RuangLongitudinal findOneByRusakFinishPlafon(string $rusak_finish_plafon) Return the first RuangLongitudinal filtered by the rusak_finish_plafon column
 * @method RuangLongitudinal findOneByKetFinishPlafon(string $ket_finish_plafon) Return the first RuangLongitudinal filtered by the ket_finish_plafon column
 * @method RuangLongitudinal findOneByRusakFinishDinding(string $rusak_finish_dinding) Return the first RuangLongitudinal filtered by the rusak_finish_dinding column
 * @method RuangLongitudinal findOneByKetFinishDinding(string $ket_finish_dinding) Return the first RuangLongitudinal filtered by the ket_finish_dinding column
 * @method RuangLongitudinal findOneByRusakFinishKpj(string $rusak_finish_kpj) Return the first RuangLongitudinal filtered by the rusak_finish_kpj column
 * @method RuangLongitudinal findOneByKetFinishKpj(string $ket_finish_kpj) Return the first RuangLongitudinal filtered by the ket_finish_kpj column
 * @method RuangLongitudinal findOneByBerfungsi(string $berfungsi) Return the first RuangLongitudinal filtered by the berfungsi column
 * @method RuangLongitudinal findOneByCreateDate(string $create_date) Return the first RuangLongitudinal filtered by the create_date column
 * @method RuangLongitudinal findOneByLastUpdate(string $last_update) Return the first RuangLongitudinal filtered by the last_update column
 * @method RuangLongitudinal findOneBySoftDelete(string $soft_delete) Return the first RuangLongitudinal filtered by the soft_delete column
 * @method RuangLongitudinal findOneByLastSync(string $last_sync) Return the first RuangLongitudinal filtered by the last_sync column
 * @method RuangLongitudinal findOneByUpdaterId(string $updater_id) Return the first RuangLongitudinal filtered by the updater_id column
 *
 * @method array findByIdRuang(string $id_ruang) Return RuangLongitudinal objects filtered by the id_ruang column
 * @method array findBySemesterId(string $semester_id) Return RuangLongitudinal objects filtered by the semester_id column
 * @method array findByBlobId(string $blob_id) Return RuangLongitudinal objects filtered by the blob_id column
 * @method array findByAsalData(string $asal_data) Return RuangLongitudinal objects filtered by the asal_data column
 * @method array findByRusakLisplangTalang(string $rusak_lisplang_talang) Return RuangLongitudinal objects filtered by the rusak_lisplang_talang column
 * @method array findByKetLisplangTalang(string $ket_lisplang_talang) Return RuangLongitudinal objects filtered by the ket_lisplang_talang column
 * @method array findByRusakRangkaPlafon(string $rusak_rangka_plafon) Return RuangLongitudinal objects filtered by the rusak_rangka_plafon column
 * @method array findByKetRangkaPlafon(string $ket_rangka_plafon) Return RuangLongitudinal objects filtered by the ket_rangka_plafon column
 * @method array findByRusakTutupPlafon(string $rusak_tutup_plafon) Return RuangLongitudinal objects filtered by the rusak_tutup_plafon column
 * @method array findByKetTutupPlafon(string $ket_tutup_plafon) Return RuangLongitudinal objects filtered by the ket_tutup_plafon column
 * @method array findByRusakBataDinding(string $rusak_bata_dinding) Return RuangLongitudinal objects filtered by the rusak_bata_dinding column
 * @method array findByKetBataDinding(string $ket_bata_dinding) Return RuangLongitudinal objects filtered by the ket_bata_dinding column
 * @method array findByRusakPlesterDinding(string $rusak_plester_dinding) Return RuangLongitudinal objects filtered by the rusak_plester_dinding column
 * @method array findByKetPlesterDinding(string $ket_plester_dinding) Return RuangLongitudinal objects filtered by the ket_plester_dinding column
 * @method array findByRusakDaunJendela(string $rusak_daun_jendela) Return RuangLongitudinal objects filtered by the rusak_daun_jendela column
 * @method array findByKetDaunJendela(string $ket_daun_jendela) Return RuangLongitudinal objects filtered by the ket_daun_jendela column
 * @method array findByRusakDaunPintu(string $rusak_daun_pintu) Return RuangLongitudinal objects filtered by the rusak_daun_pintu column
 * @method array findByKetDaunPintu(string $ket_daun_pintu) Return RuangLongitudinal objects filtered by the ket_daun_pintu column
 * @method array findByRusakKusen(string $rusak_kusen) Return RuangLongitudinal objects filtered by the rusak_kusen column
 * @method array findByKetKusen(string $ket_kusen) Return RuangLongitudinal objects filtered by the ket_kusen column
 * @method array findByRusakTutupLantai(string $rusak_tutup_lantai) Return RuangLongitudinal objects filtered by the rusak_tutup_lantai column
 * @method array findByKetPenutupLantai(string $ket_penutup_lantai) Return RuangLongitudinal objects filtered by the ket_penutup_lantai column
 * @method array findByRusakInstListrik(string $rusak_inst_listrik) Return RuangLongitudinal objects filtered by the rusak_inst_listrik column
 * @method array findByKetInstListrik(string $ket_inst_listrik) Return RuangLongitudinal objects filtered by the ket_inst_listrik column
 * @method array findByRusakInstAir(string $rusak_inst_air) Return RuangLongitudinal objects filtered by the rusak_inst_air column
 * @method array findByKetInstAir(string $ket_inst_air) Return RuangLongitudinal objects filtered by the ket_inst_air column
 * @method array findByRusakDrainase(string $rusak_drainase) Return RuangLongitudinal objects filtered by the rusak_drainase column
 * @method array findByKetDrainase(string $ket_drainase) Return RuangLongitudinal objects filtered by the ket_drainase column
 * @method array findByRusakFinishStruktur(string $rusak_finish_struktur) Return RuangLongitudinal objects filtered by the rusak_finish_struktur column
 * @method array findByKetFinishStruktur(string $ket_finish_struktur) Return RuangLongitudinal objects filtered by the ket_finish_struktur column
 * @method array findByRusakFinishPlafon(string $rusak_finish_plafon) Return RuangLongitudinal objects filtered by the rusak_finish_plafon column
 * @method array findByKetFinishPlafon(string $ket_finish_plafon) Return RuangLongitudinal objects filtered by the ket_finish_plafon column
 * @method array findByRusakFinishDinding(string $rusak_finish_dinding) Return RuangLongitudinal objects filtered by the rusak_finish_dinding column
 * @method array findByKetFinishDinding(string $ket_finish_dinding) Return RuangLongitudinal objects filtered by the ket_finish_dinding column
 * @method array findByRusakFinishKpj(string $rusak_finish_kpj) Return RuangLongitudinal objects filtered by the rusak_finish_kpj column
 * @method array findByKetFinishKpj(string $ket_finish_kpj) Return RuangLongitudinal objects filtered by the ket_finish_kpj column
 * @method array findByBerfungsi(string $berfungsi) Return RuangLongitudinal objects filtered by the berfungsi column
 * @method array findByCreateDate(string $create_date) Return RuangLongitudinal objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return RuangLongitudinal objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return RuangLongitudinal objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return RuangLongitudinal objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return RuangLongitudinal objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRuangLongitudinalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRuangLongitudinalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\RuangLongitudinal', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RuangLongitudinalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RuangLongitudinalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RuangLongitudinalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RuangLongitudinalQuery) {
            return $criteria;
        }
        $query = new RuangLongitudinalQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$id_ruang, $semester_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   RuangLongitudinal|RuangLongitudinal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RuangLongitudinalPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RuangLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 RuangLongitudinal A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_ruang", "semester_id", "blob_id", "asal_data", "rusak_lisplang_talang", "ket_lisplang_talang", "rusak_rangka_plafon", "ket_rangka_plafon", "rusak_tutup_plafon", "ket_tutup_plafon", "rusak_bata_dinding", "ket_bata_dinding", "rusak_plester_dinding", "ket_plester_dinding", "rusak_daun_jendela", "ket_daun_jendela", "rusak_daun_pintu", "ket_daun_pintu", "rusak_kusen", "ket_kusen", "rusak_tutup_lantai", "ket_penutup_lantai", "rusak_inst_listrik", "ket_inst_listrik", "rusak_inst_air", "ket_inst_air", "rusak_drainase", "ket_drainase", "rusak_finish_struktur", "ket_finish_struktur", "rusak_finish_plafon", "ket_finish_plafon", "rusak_finish_dinding", "ket_finish_dinding", "rusak_finish_kpj", "ket_finish_kpj", "berfungsi", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "ruang_longitudinal" WHERE "id_ruang" = :p0 AND "semester_id" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new RuangLongitudinal();
            $obj->hydrate($row);
            RuangLongitudinalPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return RuangLongitudinal|RuangLongitudinal[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|RuangLongitudinal[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(RuangLongitudinalPeer::ID_RUANG, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(RuangLongitudinalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(RuangLongitudinalPeer::ID_RUANG, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(RuangLongitudinalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_ruang column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRuang('fooValue');   // WHERE id_ruang = 'fooValue'
     * $query->filterByIdRuang('%fooValue%'); // WHERE id_ruang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idRuang The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByIdRuang($idRuang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idRuang)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idRuang)) {
                $idRuang = str_replace('*', '%', $idRuang);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::ID_RUANG, $idRuang, $comparison);
    }

    /**
     * Filter the query on the semester_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySemesterId('fooValue');   // WHERE semester_id = 'fooValue'
     * $query->filterBySemesterId('%fooValue%'); // WHERE semester_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $semesterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterBySemesterId($semesterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($semesterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $semesterId)) {
                $semesterId = str_replace('*', '%', $semesterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the blob_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBlobId('fooValue');   // WHERE blob_id = 'fooValue'
     * $query->filterByBlobId('%fooValue%'); // WHERE blob_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $blobId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByBlobId($blobId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($blobId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $blobId)) {
                $blobId = str_replace('*', '%', $blobId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::BLOB_ID, $blobId, $comparison);
    }

    /**
     * Filter the query on the asal_data column
     *
     * Example usage:
     * <code>
     * $query->filterByAsalData('fooValue');   // WHERE asal_data = 'fooValue'
     * $query->filterByAsalData('%fooValue%'); // WHERE asal_data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $asalData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByAsalData($asalData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($asalData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $asalData)) {
                $asalData = str_replace('*', '%', $asalData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::ASAL_DATA, $asalData, $comparison);
    }

    /**
     * Filter the query on the rusak_lisplang_talang column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakLisplangTalang(1234); // WHERE rusak_lisplang_talang = 1234
     * $query->filterByRusakLisplangTalang(array(12, 34)); // WHERE rusak_lisplang_talang IN (12, 34)
     * $query->filterByRusakLisplangTalang(array('min' => 12)); // WHERE rusak_lisplang_talang >= 12
     * $query->filterByRusakLisplangTalang(array('max' => 12)); // WHERE rusak_lisplang_talang <= 12
     * </code>
     *
     * @param     mixed $rusakLisplangTalang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakLisplangTalang($rusakLisplangTalang = null, $comparison = null)
    {
        if (is_array($rusakLisplangTalang)) {
            $useMinMax = false;
            if (isset($rusakLisplangTalang['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_LISPLANG_TALANG, $rusakLisplangTalang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakLisplangTalang['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_LISPLANG_TALANG, $rusakLisplangTalang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_LISPLANG_TALANG, $rusakLisplangTalang, $comparison);
    }

    /**
     * Filter the query on the ket_lisplang_talang column
     *
     * Example usage:
     * <code>
     * $query->filterByKetLisplangTalang('fooValue');   // WHERE ket_lisplang_talang = 'fooValue'
     * $query->filterByKetLisplangTalang('%fooValue%'); // WHERE ket_lisplang_talang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketLisplangTalang The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetLisplangTalang($ketLisplangTalang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketLisplangTalang)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketLisplangTalang)) {
                $ketLisplangTalang = str_replace('*', '%', $ketLisplangTalang);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_LISPLANG_TALANG, $ketLisplangTalang, $comparison);
    }

    /**
     * Filter the query on the rusak_rangka_plafon column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakRangkaPlafon(1234); // WHERE rusak_rangka_plafon = 1234
     * $query->filterByRusakRangkaPlafon(array(12, 34)); // WHERE rusak_rangka_plafon IN (12, 34)
     * $query->filterByRusakRangkaPlafon(array('min' => 12)); // WHERE rusak_rangka_plafon >= 12
     * $query->filterByRusakRangkaPlafon(array('max' => 12)); // WHERE rusak_rangka_plafon <= 12
     * </code>
     *
     * @param     mixed $rusakRangkaPlafon The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakRangkaPlafon($rusakRangkaPlafon = null, $comparison = null)
    {
        if (is_array($rusakRangkaPlafon)) {
            $useMinMax = false;
            if (isset($rusakRangkaPlafon['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_RANGKA_PLAFON, $rusakRangkaPlafon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakRangkaPlafon['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_RANGKA_PLAFON, $rusakRangkaPlafon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_RANGKA_PLAFON, $rusakRangkaPlafon, $comparison);
    }

    /**
     * Filter the query on the ket_rangka_plafon column
     *
     * Example usage:
     * <code>
     * $query->filterByKetRangkaPlafon('fooValue');   // WHERE ket_rangka_plafon = 'fooValue'
     * $query->filterByKetRangkaPlafon('%fooValue%'); // WHERE ket_rangka_plafon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketRangkaPlafon The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetRangkaPlafon($ketRangkaPlafon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketRangkaPlafon)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketRangkaPlafon)) {
                $ketRangkaPlafon = str_replace('*', '%', $ketRangkaPlafon);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_RANGKA_PLAFON, $ketRangkaPlafon, $comparison);
    }

    /**
     * Filter the query on the rusak_tutup_plafon column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakTutupPlafon(1234); // WHERE rusak_tutup_plafon = 1234
     * $query->filterByRusakTutupPlafon(array(12, 34)); // WHERE rusak_tutup_plafon IN (12, 34)
     * $query->filterByRusakTutupPlafon(array('min' => 12)); // WHERE rusak_tutup_plafon >= 12
     * $query->filterByRusakTutupPlafon(array('max' => 12)); // WHERE rusak_tutup_plafon <= 12
     * </code>
     *
     * @param     mixed $rusakTutupPlafon The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakTutupPlafon($rusakTutupPlafon = null, $comparison = null)
    {
        if (is_array($rusakTutupPlafon)) {
            $useMinMax = false;
            if (isset($rusakTutupPlafon['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_TUTUP_PLAFON, $rusakTutupPlafon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakTutupPlafon['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_TUTUP_PLAFON, $rusakTutupPlafon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_TUTUP_PLAFON, $rusakTutupPlafon, $comparison);
    }

    /**
     * Filter the query on the ket_tutup_plafon column
     *
     * Example usage:
     * <code>
     * $query->filterByKetTutupPlafon('fooValue');   // WHERE ket_tutup_plafon = 'fooValue'
     * $query->filterByKetTutupPlafon('%fooValue%'); // WHERE ket_tutup_plafon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketTutupPlafon The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetTutupPlafon($ketTutupPlafon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketTutupPlafon)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketTutupPlafon)) {
                $ketTutupPlafon = str_replace('*', '%', $ketTutupPlafon);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_TUTUP_PLAFON, $ketTutupPlafon, $comparison);
    }

    /**
     * Filter the query on the rusak_bata_dinding column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakBataDinding(1234); // WHERE rusak_bata_dinding = 1234
     * $query->filterByRusakBataDinding(array(12, 34)); // WHERE rusak_bata_dinding IN (12, 34)
     * $query->filterByRusakBataDinding(array('min' => 12)); // WHERE rusak_bata_dinding >= 12
     * $query->filterByRusakBataDinding(array('max' => 12)); // WHERE rusak_bata_dinding <= 12
     * </code>
     *
     * @param     mixed $rusakBataDinding The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakBataDinding($rusakBataDinding = null, $comparison = null)
    {
        if (is_array($rusakBataDinding)) {
            $useMinMax = false;
            if (isset($rusakBataDinding['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_BATA_DINDING, $rusakBataDinding['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakBataDinding['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_BATA_DINDING, $rusakBataDinding['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_BATA_DINDING, $rusakBataDinding, $comparison);
    }

    /**
     * Filter the query on the ket_bata_dinding column
     *
     * Example usage:
     * <code>
     * $query->filterByKetBataDinding('fooValue');   // WHERE ket_bata_dinding = 'fooValue'
     * $query->filterByKetBataDinding('%fooValue%'); // WHERE ket_bata_dinding LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketBataDinding The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetBataDinding($ketBataDinding = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketBataDinding)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketBataDinding)) {
                $ketBataDinding = str_replace('*', '%', $ketBataDinding);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_BATA_DINDING, $ketBataDinding, $comparison);
    }

    /**
     * Filter the query on the rusak_plester_dinding column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakPlesterDinding(1234); // WHERE rusak_plester_dinding = 1234
     * $query->filterByRusakPlesterDinding(array(12, 34)); // WHERE rusak_plester_dinding IN (12, 34)
     * $query->filterByRusakPlesterDinding(array('min' => 12)); // WHERE rusak_plester_dinding >= 12
     * $query->filterByRusakPlesterDinding(array('max' => 12)); // WHERE rusak_plester_dinding <= 12
     * </code>
     *
     * @param     mixed $rusakPlesterDinding The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakPlesterDinding($rusakPlesterDinding = null, $comparison = null)
    {
        if (is_array($rusakPlesterDinding)) {
            $useMinMax = false;
            if (isset($rusakPlesterDinding['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_PLESTER_DINDING, $rusakPlesterDinding['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakPlesterDinding['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_PLESTER_DINDING, $rusakPlesterDinding['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_PLESTER_DINDING, $rusakPlesterDinding, $comparison);
    }

    /**
     * Filter the query on the ket_plester_dinding column
     *
     * Example usage:
     * <code>
     * $query->filterByKetPlesterDinding('fooValue');   // WHERE ket_plester_dinding = 'fooValue'
     * $query->filterByKetPlesterDinding('%fooValue%'); // WHERE ket_plester_dinding LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketPlesterDinding The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetPlesterDinding($ketPlesterDinding = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketPlesterDinding)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketPlesterDinding)) {
                $ketPlesterDinding = str_replace('*', '%', $ketPlesterDinding);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_PLESTER_DINDING, $ketPlesterDinding, $comparison);
    }

    /**
     * Filter the query on the rusak_daun_jendela column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakDaunJendela(1234); // WHERE rusak_daun_jendela = 1234
     * $query->filterByRusakDaunJendela(array(12, 34)); // WHERE rusak_daun_jendela IN (12, 34)
     * $query->filterByRusakDaunJendela(array('min' => 12)); // WHERE rusak_daun_jendela >= 12
     * $query->filterByRusakDaunJendela(array('max' => 12)); // WHERE rusak_daun_jendela <= 12
     * </code>
     *
     * @param     mixed $rusakDaunJendela The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakDaunJendela($rusakDaunJendela = null, $comparison = null)
    {
        if (is_array($rusakDaunJendela)) {
            $useMinMax = false;
            if (isset($rusakDaunJendela['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_DAUN_JENDELA, $rusakDaunJendela['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakDaunJendela['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_DAUN_JENDELA, $rusakDaunJendela['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_DAUN_JENDELA, $rusakDaunJendela, $comparison);
    }

    /**
     * Filter the query on the ket_daun_jendela column
     *
     * Example usage:
     * <code>
     * $query->filterByKetDaunJendela('fooValue');   // WHERE ket_daun_jendela = 'fooValue'
     * $query->filterByKetDaunJendela('%fooValue%'); // WHERE ket_daun_jendela LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketDaunJendela The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetDaunJendela($ketDaunJendela = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketDaunJendela)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketDaunJendela)) {
                $ketDaunJendela = str_replace('*', '%', $ketDaunJendela);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_DAUN_JENDELA, $ketDaunJendela, $comparison);
    }

    /**
     * Filter the query on the rusak_daun_pintu column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakDaunPintu(1234); // WHERE rusak_daun_pintu = 1234
     * $query->filterByRusakDaunPintu(array(12, 34)); // WHERE rusak_daun_pintu IN (12, 34)
     * $query->filterByRusakDaunPintu(array('min' => 12)); // WHERE rusak_daun_pintu >= 12
     * $query->filterByRusakDaunPintu(array('max' => 12)); // WHERE rusak_daun_pintu <= 12
     * </code>
     *
     * @param     mixed $rusakDaunPintu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakDaunPintu($rusakDaunPintu = null, $comparison = null)
    {
        if (is_array($rusakDaunPintu)) {
            $useMinMax = false;
            if (isset($rusakDaunPintu['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_DAUN_PINTU, $rusakDaunPintu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakDaunPintu['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_DAUN_PINTU, $rusakDaunPintu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_DAUN_PINTU, $rusakDaunPintu, $comparison);
    }

    /**
     * Filter the query on the ket_daun_pintu column
     *
     * Example usage:
     * <code>
     * $query->filterByKetDaunPintu('fooValue');   // WHERE ket_daun_pintu = 'fooValue'
     * $query->filterByKetDaunPintu('%fooValue%'); // WHERE ket_daun_pintu LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketDaunPintu The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetDaunPintu($ketDaunPintu = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketDaunPintu)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketDaunPintu)) {
                $ketDaunPintu = str_replace('*', '%', $ketDaunPintu);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_DAUN_PINTU, $ketDaunPintu, $comparison);
    }

    /**
     * Filter the query on the rusak_kusen column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakKusen(1234); // WHERE rusak_kusen = 1234
     * $query->filterByRusakKusen(array(12, 34)); // WHERE rusak_kusen IN (12, 34)
     * $query->filterByRusakKusen(array('min' => 12)); // WHERE rusak_kusen >= 12
     * $query->filterByRusakKusen(array('max' => 12)); // WHERE rusak_kusen <= 12
     * </code>
     *
     * @param     mixed $rusakKusen The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakKusen($rusakKusen = null, $comparison = null)
    {
        if (is_array($rusakKusen)) {
            $useMinMax = false;
            if (isset($rusakKusen['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_KUSEN, $rusakKusen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakKusen['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_KUSEN, $rusakKusen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_KUSEN, $rusakKusen, $comparison);
    }

    /**
     * Filter the query on the ket_kusen column
     *
     * Example usage:
     * <code>
     * $query->filterByKetKusen('fooValue');   // WHERE ket_kusen = 'fooValue'
     * $query->filterByKetKusen('%fooValue%'); // WHERE ket_kusen LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketKusen The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetKusen($ketKusen = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketKusen)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketKusen)) {
                $ketKusen = str_replace('*', '%', $ketKusen);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_KUSEN, $ketKusen, $comparison);
    }

    /**
     * Filter the query on the rusak_tutup_lantai column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakTutupLantai(1234); // WHERE rusak_tutup_lantai = 1234
     * $query->filterByRusakTutupLantai(array(12, 34)); // WHERE rusak_tutup_lantai IN (12, 34)
     * $query->filterByRusakTutupLantai(array('min' => 12)); // WHERE rusak_tutup_lantai >= 12
     * $query->filterByRusakTutupLantai(array('max' => 12)); // WHERE rusak_tutup_lantai <= 12
     * </code>
     *
     * @param     mixed $rusakTutupLantai The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakTutupLantai($rusakTutupLantai = null, $comparison = null)
    {
        if (is_array($rusakTutupLantai)) {
            $useMinMax = false;
            if (isset($rusakTutupLantai['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_TUTUP_LANTAI, $rusakTutupLantai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakTutupLantai['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_TUTUP_LANTAI, $rusakTutupLantai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_TUTUP_LANTAI, $rusakTutupLantai, $comparison);
    }

    /**
     * Filter the query on the ket_penutup_lantai column
     *
     * Example usage:
     * <code>
     * $query->filterByKetPenutupLantai('fooValue');   // WHERE ket_penutup_lantai = 'fooValue'
     * $query->filterByKetPenutupLantai('%fooValue%'); // WHERE ket_penutup_lantai LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketPenutupLantai The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetPenutupLantai($ketPenutupLantai = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketPenutupLantai)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketPenutupLantai)) {
                $ketPenutupLantai = str_replace('*', '%', $ketPenutupLantai);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_PENUTUP_LANTAI, $ketPenutupLantai, $comparison);
    }

    /**
     * Filter the query on the rusak_inst_listrik column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakInstListrik(1234); // WHERE rusak_inst_listrik = 1234
     * $query->filterByRusakInstListrik(array(12, 34)); // WHERE rusak_inst_listrik IN (12, 34)
     * $query->filterByRusakInstListrik(array('min' => 12)); // WHERE rusak_inst_listrik >= 12
     * $query->filterByRusakInstListrik(array('max' => 12)); // WHERE rusak_inst_listrik <= 12
     * </code>
     *
     * @param     mixed $rusakInstListrik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakInstListrik($rusakInstListrik = null, $comparison = null)
    {
        if (is_array($rusakInstListrik)) {
            $useMinMax = false;
            if (isset($rusakInstListrik['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_INST_LISTRIK, $rusakInstListrik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakInstListrik['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_INST_LISTRIK, $rusakInstListrik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_INST_LISTRIK, $rusakInstListrik, $comparison);
    }

    /**
     * Filter the query on the ket_inst_listrik column
     *
     * Example usage:
     * <code>
     * $query->filterByKetInstListrik('fooValue');   // WHERE ket_inst_listrik = 'fooValue'
     * $query->filterByKetInstListrik('%fooValue%'); // WHERE ket_inst_listrik LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketInstListrik The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetInstListrik($ketInstListrik = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketInstListrik)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketInstListrik)) {
                $ketInstListrik = str_replace('*', '%', $ketInstListrik);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_INST_LISTRIK, $ketInstListrik, $comparison);
    }

    /**
     * Filter the query on the rusak_inst_air column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakInstAir(1234); // WHERE rusak_inst_air = 1234
     * $query->filterByRusakInstAir(array(12, 34)); // WHERE rusak_inst_air IN (12, 34)
     * $query->filterByRusakInstAir(array('min' => 12)); // WHERE rusak_inst_air >= 12
     * $query->filterByRusakInstAir(array('max' => 12)); // WHERE rusak_inst_air <= 12
     * </code>
     *
     * @param     mixed $rusakInstAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakInstAir($rusakInstAir = null, $comparison = null)
    {
        if (is_array($rusakInstAir)) {
            $useMinMax = false;
            if (isset($rusakInstAir['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_INST_AIR, $rusakInstAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakInstAir['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_INST_AIR, $rusakInstAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_INST_AIR, $rusakInstAir, $comparison);
    }

    /**
     * Filter the query on the ket_inst_air column
     *
     * Example usage:
     * <code>
     * $query->filterByKetInstAir('fooValue');   // WHERE ket_inst_air = 'fooValue'
     * $query->filterByKetInstAir('%fooValue%'); // WHERE ket_inst_air LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketInstAir The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetInstAir($ketInstAir = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketInstAir)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketInstAir)) {
                $ketInstAir = str_replace('*', '%', $ketInstAir);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_INST_AIR, $ketInstAir, $comparison);
    }

    /**
     * Filter the query on the rusak_drainase column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakDrainase(1234); // WHERE rusak_drainase = 1234
     * $query->filterByRusakDrainase(array(12, 34)); // WHERE rusak_drainase IN (12, 34)
     * $query->filterByRusakDrainase(array('min' => 12)); // WHERE rusak_drainase >= 12
     * $query->filterByRusakDrainase(array('max' => 12)); // WHERE rusak_drainase <= 12
     * </code>
     *
     * @param     mixed $rusakDrainase The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakDrainase($rusakDrainase = null, $comparison = null)
    {
        if (is_array($rusakDrainase)) {
            $useMinMax = false;
            if (isset($rusakDrainase['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_DRAINASE, $rusakDrainase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakDrainase['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_DRAINASE, $rusakDrainase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_DRAINASE, $rusakDrainase, $comparison);
    }

    /**
     * Filter the query on the ket_drainase column
     *
     * Example usage:
     * <code>
     * $query->filterByKetDrainase('fooValue');   // WHERE ket_drainase = 'fooValue'
     * $query->filterByKetDrainase('%fooValue%'); // WHERE ket_drainase LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketDrainase The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetDrainase($ketDrainase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketDrainase)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketDrainase)) {
                $ketDrainase = str_replace('*', '%', $ketDrainase);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_DRAINASE, $ketDrainase, $comparison);
    }

    /**
     * Filter the query on the rusak_finish_struktur column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakFinishStruktur(1234); // WHERE rusak_finish_struktur = 1234
     * $query->filterByRusakFinishStruktur(array(12, 34)); // WHERE rusak_finish_struktur IN (12, 34)
     * $query->filterByRusakFinishStruktur(array('min' => 12)); // WHERE rusak_finish_struktur >= 12
     * $query->filterByRusakFinishStruktur(array('max' => 12)); // WHERE rusak_finish_struktur <= 12
     * </code>
     *
     * @param     mixed $rusakFinishStruktur The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakFinishStruktur($rusakFinishStruktur = null, $comparison = null)
    {
        if (is_array($rusakFinishStruktur)) {
            $useMinMax = false;
            if (isset($rusakFinishStruktur['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_FINISH_STRUKTUR, $rusakFinishStruktur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakFinishStruktur['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_FINISH_STRUKTUR, $rusakFinishStruktur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_FINISH_STRUKTUR, $rusakFinishStruktur, $comparison);
    }

    /**
     * Filter the query on the ket_finish_struktur column
     *
     * Example usage:
     * <code>
     * $query->filterByKetFinishStruktur('fooValue');   // WHERE ket_finish_struktur = 'fooValue'
     * $query->filterByKetFinishStruktur('%fooValue%'); // WHERE ket_finish_struktur LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketFinishStruktur The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetFinishStruktur($ketFinishStruktur = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketFinishStruktur)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketFinishStruktur)) {
                $ketFinishStruktur = str_replace('*', '%', $ketFinishStruktur);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_FINISH_STRUKTUR, $ketFinishStruktur, $comparison);
    }

    /**
     * Filter the query on the rusak_finish_plafon column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakFinishPlafon(1234); // WHERE rusak_finish_plafon = 1234
     * $query->filterByRusakFinishPlafon(array(12, 34)); // WHERE rusak_finish_plafon IN (12, 34)
     * $query->filterByRusakFinishPlafon(array('min' => 12)); // WHERE rusak_finish_plafon >= 12
     * $query->filterByRusakFinishPlafon(array('max' => 12)); // WHERE rusak_finish_plafon <= 12
     * </code>
     *
     * @param     mixed $rusakFinishPlafon The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakFinishPlafon($rusakFinishPlafon = null, $comparison = null)
    {
        if (is_array($rusakFinishPlafon)) {
            $useMinMax = false;
            if (isset($rusakFinishPlafon['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_FINISH_PLAFON, $rusakFinishPlafon['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakFinishPlafon['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_FINISH_PLAFON, $rusakFinishPlafon['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_FINISH_PLAFON, $rusakFinishPlafon, $comparison);
    }

    /**
     * Filter the query on the ket_finish_plafon column
     *
     * Example usage:
     * <code>
     * $query->filterByKetFinishPlafon('fooValue');   // WHERE ket_finish_plafon = 'fooValue'
     * $query->filterByKetFinishPlafon('%fooValue%'); // WHERE ket_finish_plafon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketFinishPlafon The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetFinishPlafon($ketFinishPlafon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketFinishPlafon)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketFinishPlafon)) {
                $ketFinishPlafon = str_replace('*', '%', $ketFinishPlafon);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_FINISH_PLAFON, $ketFinishPlafon, $comparison);
    }

    /**
     * Filter the query on the rusak_finish_dinding column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakFinishDinding(1234); // WHERE rusak_finish_dinding = 1234
     * $query->filterByRusakFinishDinding(array(12, 34)); // WHERE rusak_finish_dinding IN (12, 34)
     * $query->filterByRusakFinishDinding(array('min' => 12)); // WHERE rusak_finish_dinding >= 12
     * $query->filterByRusakFinishDinding(array('max' => 12)); // WHERE rusak_finish_dinding <= 12
     * </code>
     *
     * @param     mixed $rusakFinishDinding The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakFinishDinding($rusakFinishDinding = null, $comparison = null)
    {
        if (is_array($rusakFinishDinding)) {
            $useMinMax = false;
            if (isset($rusakFinishDinding['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_FINISH_DINDING, $rusakFinishDinding['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakFinishDinding['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_FINISH_DINDING, $rusakFinishDinding['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_FINISH_DINDING, $rusakFinishDinding, $comparison);
    }

    /**
     * Filter the query on the ket_finish_dinding column
     *
     * Example usage:
     * <code>
     * $query->filterByKetFinishDinding('fooValue');   // WHERE ket_finish_dinding = 'fooValue'
     * $query->filterByKetFinishDinding('%fooValue%'); // WHERE ket_finish_dinding LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketFinishDinding The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetFinishDinding($ketFinishDinding = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketFinishDinding)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketFinishDinding)) {
                $ketFinishDinding = str_replace('*', '%', $ketFinishDinding);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_FINISH_DINDING, $ketFinishDinding, $comparison);
    }

    /**
     * Filter the query on the rusak_finish_kpj column
     *
     * Example usage:
     * <code>
     * $query->filterByRusakFinishKpj(1234); // WHERE rusak_finish_kpj = 1234
     * $query->filterByRusakFinishKpj(array(12, 34)); // WHERE rusak_finish_kpj IN (12, 34)
     * $query->filterByRusakFinishKpj(array('min' => 12)); // WHERE rusak_finish_kpj >= 12
     * $query->filterByRusakFinishKpj(array('max' => 12)); // WHERE rusak_finish_kpj <= 12
     * </code>
     *
     * @param     mixed $rusakFinishKpj The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByRusakFinishKpj($rusakFinishKpj = null, $comparison = null)
    {
        if (is_array($rusakFinishKpj)) {
            $useMinMax = false;
            if (isset($rusakFinishKpj['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_FINISH_KPJ, $rusakFinishKpj['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rusakFinishKpj['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_FINISH_KPJ, $rusakFinishKpj['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::RUSAK_FINISH_KPJ, $rusakFinishKpj, $comparison);
    }

    /**
     * Filter the query on the ket_finish_kpj column
     *
     * Example usage:
     * <code>
     * $query->filterByKetFinishKpj('fooValue');   // WHERE ket_finish_kpj = 'fooValue'
     * $query->filterByKetFinishKpj('%fooValue%'); // WHERE ket_finish_kpj LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketFinishKpj The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKetFinishKpj($ketFinishKpj = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketFinishKpj)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketFinishKpj)) {
                $ketFinishKpj = str_replace('*', '%', $ketFinishKpj);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::KET_FINISH_KPJ, $ketFinishKpj, $comparison);
    }

    /**
     * Filter the query on the berfungsi column
     *
     * Example usage:
     * <code>
     * $query->filterByBerfungsi(1234); // WHERE berfungsi = 1234
     * $query->filterByBerfungsi(array(12, 34)); // WHERE berfungsi IN (12, 34)
     * $query->filterByBerfungsi(array('min' => 12)); // WHERE berfungsi >= 12
     * $query->filterByBerfungsi(array('max' => 12)); // WHERE berfungsi <= 12
     * </code>
     *
     * @param     mixed $berfungsi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByBerfungsi($berfungsi = null, $comparison = null)
    {
        if (is_array($berfungsi)) {
            $useMinMax = false;
            if (isset($berfungsi['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::BERFUNGSI, $berfungsi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($berfungsi['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::BERFUNGSI, $berfungsi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::BERFUNGSI, $berfungsi, $comparison);
    }

    /**
     * Filter the query on the create_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateDate('2011-03-14'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate('now'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate(array('max' => 'yesterday')); // WHERE create_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $createDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::CREATE_DATE, $createDate, $comparison);
    }

    /**
     * Filter the query on the last_update column
     *
     * Example usage:
     * <code>
     * $query->filterByLastUpdate('2011-03-14'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate('now'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate(array('max' => 'yesterday')); // WHERE last_update > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastUpdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the soft_delete column
     *
     * Example usage:
     * <code>
     * $query->filterBySoftDelete(1234); // WHERE soft_delete = 1234
     * $query->filterBySoftDelete(array(12, 34)); // WHERE soft_delete IN (12, 34)
     * $query->filterBySoftDelete(array('min' => 12)); // WHERE soft_delete >= 12
     * $query->filterBySoftDelete(array('max' => 12)); // WHERE soft_delete <= 12
     * </code>
     *
     * @param     mixed $softDelete The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::SOFT_DELETE, $softDelete, $comparison);
    }

    /**
     * Filter the query on the last_sync column
     *
     * Example usage:
     * <code>
     * $query->filterByLastSync('2011-03-14'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync('now'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync(array('max' => 'yesterday')); // WHERE last_sync > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastSync The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(RuangLongitudinalPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query on the updater_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdaterId('fooValue');   // WHERE updater_id = 'fooValue'
     * $query->filterByUpdaterId('%fooValue%'); // WHERE updater_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updaterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function filterByUpdaterId($updaterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updaterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $updaterId)) {
                $updaterId = str_replace('*', '%', $updaterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangLongitudinalPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ruang object
     *
     * @param   Ruang|PropelObjectCollection $ruang The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuang($ruang, $comparison = null)
    {
        if ($ruang instanceof Ruang) {
            return $this
                ->addUsingAlias(RuangLongitudinalPeer::ID_RUANG, $ruang->getIdRuang(), $comparison);
        } elseif ($ruang instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RuangLongitudinalPeer::ID_RUANG, $ruang->toKeyValue('PrimaryKey', 'IdRuang'), $comparison);
        } else {
            throw new PropelException('filterByRuang() only accepts arguments of type Ruang or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ruang relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function joinRuang($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ruang');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Ruang');
        }

        return $this;
    }

    /**
     * Use the Ruang relation Ruang object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RuangQuery A secondary query class using the current class as primary query
     */
    public function useRuangQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRuang($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ruang', '\DataDikdas\Model\RuangQuery');
    }

    /**
     * Filter the query by a related LargeObject object
     *
     * @param   LargeObject|PropelObjectCollection $largeObject The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLargeObject($largeObject, $comparison = null)
    {
        if ($largeObject instanceof LargeObject) {
            return $this
                ->addUsingAlias(RuangLongitudinalPeer::BLOB_ID, $largeObject->getBlobId(), $comparison);
        } elseif ($largeObject instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RuangLongitudinalPeer::BLOB_ID, $largeObject->toKeyValue('PrimaryKey', 'BlobId'), $comparison);
        } else {
            throw new PropelException('filterByLargeObject() only accepts arguments of type LargeObject or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LargeObject relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function joinLargeObject($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LargeObject');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'LargeObject');
        }

        return $this;
    }

    /**
     * Use the LargeObject relation LargeObject object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LargeObjectQuery A secondary query class using the current class as primary query
     */
    public function useLargeObjectQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinLargeObject($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LargeObject', '\DataDikdas\Model\LargeObjectQuery');
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(RuangLongitudinalPeer::SEMESTER_ID, $semester->getSemesterId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RuangLongitudinalPeer::SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'SemesterId'), $comparison);
        } else {
            throw new PropelException('filterBySemester() only accepts arguments of type Semester or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Semester relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function joinSemester($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Semester');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Semester');
        }

        return $this;
    }

    /**
     * Use the Semester relation Semester object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SemesterQuery A secondary query class using the current class as primary query
     */
    public function useSemesterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSemester($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Semester', '\DataDikdas\Model\SemesterQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RuangLongitudinal $ruangLongitudinal Object to remove from the list of results
     *
     * @return RuangLongitudinalQuery The current query, for fluid interface
     */
    public function prune($ruangLongitudinal = null)
    {
        if ($ruangLongitudinal) {
            $this->addCond('pruneCond0', $this->getAliasedColName(RuangLongitudinalPeer::ID_RUANG), $ruangLongitudinal->getIdRuang(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(RuangLongitudinalPeer::SEMESTER_ID), $ruangLongitudinal->getSemesterId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
