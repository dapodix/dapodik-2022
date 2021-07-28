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
use DataDikdas\Model\Alat;
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\Buku;
use DataDikdas\Model\Jadwal;
use DataDikdas\Model\JenisPrasarana;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangLongitudinal;
use DataDikdas\Model\RuangPeer;
use DataDikdas\Model\RuangQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\TugasTambahan;

/**
 * Base class that represents a query for the 'ruang' table.
 *
 * 
 *
 * @method RuangQuery orderByIdRuang($order = Criteria::ASC) Order by the id_ruang column
 * @method RuangQuery orderByJenisPrasaranaId($order = Criteria::ASC) Order by the jenis_prasarana_id column
 * @method RuangQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method RuangQuery orderByParentIdRuang($order = Criteria::ASC) Order by the parent_id_ruang column
 * @method RuangQuery orderByIdBangunan($order = Criteria::ASC) Order by the id_bangunan column
 * @method RuangQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method RuangQuery orderByKdRuang($order = Criteria::ASC) Order by the kd_ruang column
 * @method RuangQuery orderByNmRuang($order = Criteria::ASC) Order by the nm_ruang column
 * @method RuangQuery orderByLantai($order = Criteria::ASC) Order by the lantai column
 * @method RuangQuery orderByPanjang($order = Criteria::ASC) Order by the panjang column
 * @method RuangQuery orderByLebar($order = Criteria::ASC) Order by the lebar column
 * @method RuangQuery orderByRegPras($order = Criteria::ASC) Order by the reg_pras column
 * @method RuangQuery orderByKapasitas($order = Criteria::ASC) Order by the kapasitas column
 * @method RuangQuery orderByLuasRuang($order = Criteria::ASC) Order by the luas_ruang column
 * @method RuangQuery orderByLuasPlesterM2($order = Criteria::ASC) Order by the luas_plester_m2 column
 * @method RuangQuery orderByLuasPlafonM2($order = Criteria::ASC) Order by the luas_plafon_m2 column
 * @method RuangQuery orderByLuasDindingM2($order = Criteria::ASC) Order by the luas_dinding_m2 column
 * @method RuangQuery orderByLuasDaunJendelaM2($order = Criteria::ASC) Order by the luas_daun_jendela_m2 column
 * @method RuangQuery orderByLuasDaunPintuM2($order = Criteria::ASC) Order by the luas_daun_pintu_m2 column
 * @method RuangQuery orderByPanjKusenM($order = Criteria::ASC) Order by the panj_kusen_m column
 * @method RuangQuery orderByLuasTutupLantaiM2($order = Criteria::ASC) Order by the luas_tutup_lantai_m2 column
 * @method RuangQuery orderByPanjInstListrikM($order = Criteria::ASC) Order by the panj_inst_listrik_m column
 * @method RuangQuery orderByJmlInstListrik($order = Criteria::ASC) Order by the jml_inst_listrik column
 * @method RuangQuery orderByPanjInstAirM($order = Criteria::ASC) Order by the panj_inst_air_m column
 * @method RuangQuery orderByJmlInstAir($order = Criteria::ASC) Order by the jml_inst_air column
 * @method RuangQuery orderByPanjDrainaseM($order = Criteria::ASC) Order by the panj_drainase_m column
 * @method RuangQuery orderByLuasFinishStrukturM2($order = Criteria::ASC) Order by the luas_finish_struktur_m2 column
 * @method RuangQuery orderByLuasFinishPlafonM2($order = Criteria::ASC) Order by the luas_finish_plafon_m2 column
 * @method RuangQuery orderByLuasFinishDindingM2($order = Criteria::ASC) Order by the luas_finish_dinding_m2 column
 * @method RuangQuery orderByLuasFinishKpjM2($order = Criteria::ASC) Order by the luas_finish_kpj_m2 column
 * @method RuangQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method RuangQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method RuangQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method RuangQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method RuangQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method RuangQuery groupByIdRuang() Group by the id_ruang column
 * @method RuangQuery groupByJenisPrasaranaId() Group by the jenis_prasarana_id column
 * @method RuangQuery groupBySekolahId() Group by the sekolah_id column
 * @method RuangQuery groupByParentIdRuang() Group by the parent_id_ruang column
 * @method RuangQuery groupByIdBangunan() Group by the id_bangunan column
 * @method RuangQuery groupByAsalData() Group by the asal_data column
 * @method RuangQuery groupByKdRuang() Group by the kd_ruang column
 * @method RuangQuery groupByNmRuang() Group by the nm_ruang column
 * @method RuangQuery groupByLantai() Group by the lantai column
 * @method RuangQuery groupByPanjang() Group by the panjang column
 * @method RuangQuery groupByLebar() Group by the lebar column
 * @method RuangQuery groupByRegPras() Group by the reg_pras column
 * @method RuangQuery groupByKapasitas() Group by the kapasitas column
 * @method RuangQuery groupByLuasRuang() Group by the luas_ruang column
 * @method RuangQuery groupByLuasPlesterM2() Group by the luas_plester_m2 column
 * @method RuangQuery groupByLuasPlafonM2() Group by the luas_plafon_m2 column
 * @method RuangQuery groupByLuasDindingM2() Group by the luas_dinding_m2 column
 * @method RuangQuery groupByLuasDaunJendelaM2() Group by the luas_daun_jendela_m2 column
 * @method RuangQuery groupByLuasDaunPintuM2() Group by the luas_daun_pintu_m2 column
 * @method RuangQuery groupByPanjKusenM() Group by the panj_kusen_m column
 * @method RuangQuery groupByLuasTutupLantaiM2() Group by the luas_tutup_lantai_m2 column
 * @method RuangQuery groupByPanjInstListrikM() Group by the panj_inst_listrik_m column
 * @method RuangQuery groupByJmlInstListrik() Group by the jml_inst_listrik column
 * @method RuangQuery groupByPanjInstAirM() Group by the panj_inst_air_m column
 * @method RuangQuery groupByJmlInstAir() Group by the jml_inst_air column
 * @method RuangQuery groupByPanjDrainaseM() Group by the panj_drainase_m column
 * @method RuangQuery groupByLuasFinishStrukturM2() Group by the luas_finish_struktur_m2 column
 * @method RuangQuery groupByLuasFinishPlafonM2() Group by the luas_finish_plafon_m2 column
 * @method RuangQuery groupByLuasFinishDindingM2() Group by the luas_finish_dinding_m2 column
 * @method RuangQuery groupByLuasFinishKpjM2() Group by the luas_finish_kpj_m2 column
 * @method RuangQuery groupByCreateDate() Group by the create_date column
 * @method RuangQuery groupByLastUpdate() Group by the last_update column
 * @method RuangQuery groupBySoftDelete() Group by the soft_delete column
 * @method RuangQuery groupByLastSync() Group by the last_sync column
 * @method RuangQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method RuangQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RuangQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RuangQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RuangQuery leftJoinRuangRelatedByParentIdRuang($relationAlias = null) Adds a LEFT JOIN clause to the query using the RuangRelatedByParentIdRuang relation
 * @method RuangQuery rightJoinRuangRelatedByParentIdRuang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RuangRelatedByParentIdRuang relation
 * @method RuangQuery innerJoinRuangRelatedByParentIdRuang($relationAlias = null) Adds a INNER JOIN clause to the query using the RuangRelatedByParentIdRuang relation
 *
 * @method RuangQuery leftJoinBangunan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bangunan relation
 * @method RuangQuery rightJoinBangunan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bangunan relation
 * @method RuangQuery innerJoinBangunan($relationAlias = null) Adds a INNER JOIN clause to the query using the Bangunan relation
 *
 * @method RuangQuery leftJoinJenisPrasarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisPrasarana relation
 * @method RuangQuery rightJoinJenisPrasarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisPrasarana relation
 * @method RuangQuery innerJoinJenisPrasarana($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisPrasarana relation
 *
 * @method RuangQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method RuangQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method RuangQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method RuangQuery leftJoinAlat($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alat relation
 * @method RuangQuery rightJoinAlat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alat relation
 * @method RuangQuery innerJoinAlat($relationAlias = null) Adds a INNER JOIN clause to the query using the Alat relation
 *
 * @method RuangQuery leftJoinBuku($relationAlias = null) Adds a LEFT JOIN clause to the query using the Buku relation
 * @method RuangQuery rightJoinBuku($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Buku relation
 * @method RuangQuery innerJoinBuku($relationAlias = null) Adds a INNER JOIN clause to the query using the Buku relation
 *
 * @method RuangQuery leftJoinJadwal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Jadwal relation
 * @method RuangQuery rightJoinJadwal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Jadwal relation
 * @method RuangQuery innerJoinJadwal($relationAlias = null) Adds a INNER JOIN clause to the query using the Jadwal relation
 *
 * @method RuangQuery leftJoinRombonganBelajar($relationAlias = null) Adds a LEFT JOIN clause to the query using the RombonganBelajar relation
 * @method RuangQuery rightJoinRombonganBelajar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RombonganBelajar relation
 * @method RuangQuery innerJoinRombonganBelajar($relationAlias = null) Adds a INNER JOIN clause to the query using the RombonganBelajar relation
 *
 * @method RuangQuery leftJoinRuangRelatedByIdRuang($relationAlias = null) Adds a LEFT JOIN clause to the query using the RuangRelatedByIdRuang relation
 * @method RuangQuery rightJoinRuangRelatedByIdRuang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RuangRelatedByIdRuang relation
 * @method RuangQuery innerJoinRuangRelatedByIdRuang($relationAlias = null) Adds a INNER JOIN clause to the query using the RuangRelatedByIdRuang relation
 *
 * @method RuangQuery leftJoinRuangLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the RuangLongitudinal relation
 * @method RuangQuery rightJoinRuangLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RuangLongitudinal relation
 * @method RuangQuery innerJoinRuangLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the RuangLongitudinal relation
 *
 * @method RuangQuery leftJoinTugasTambahan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TugasTambahan relation
 * @method RuangQuery rightJoinTugasTambahan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TugasTambahan relation
 * @method RuangQuery innerJoinTugasTambahan($relationAlias = null) Adds a INNER JOIN clause to the query using the TugasTambahan relation
 *
 * @method Ruang findOne(PropelPDO $con = null) Return the first Ruang matching the query
 * @method Ruang findOneOrCreate(PropelPDO $con = null) Return the first Ruang matching the query, or a new Ruang object populated from the query conditions when no match is found
 *
 * @method Ruang findOneByJenisPrasaranaId(int $jenis_prasarana_id) Return the first Ruang filtered by the jenis_prasarana_id column
 * @method Ruang findOneBySekolahId(string $sekolah_id) Return the first Ruang filtered by the sekolah_id column
 * @method Ruang findOneByParentIdRuang(string $parent_id_ruang) Return the first Ruang filtered by the parent_id_ruang column
 * @method Ruang findOneByIdBangunan(string $id_bangunan) Return the first Ruang filtered by the id_bangunan column
 * @method Ruang findOneByAsalData(string $asal_data) Return the first Ruang filtered by the asal_data column
 * @method Ruang findOneByKdRuang(string $kd_ruang) Return the first Ruang filtered by the kd_ruang column
 * @method Ruang findOneByNmRuang(string $nm_ruang) Return the first Ruang filtered by the nm_ruang column
 * @method Ruang findOneByLantai(string $lantai) Return the first Ruang filtered by the lantai column
 * @method Ruang findOneByPanjang(double $panjang) Return the first Ruang filtered by the panjang column
 * @method Ruang findOneByLebar(double $lebar) Return the first Ruang filtered by the lebar column
 * @method Ruang findOneByRegPras(string $reg_pras) Return the first Ruang filtered by the reg_pras column
 * @method Ruang findOneByKapasitas(string $kapasitas) Return the first Ruang filtered by the kapasitas column
 * @method Ruang findOneByLuasRuang(double $luas_ruang) Return the first Ruang filtered by the luas_ruang column
 * @method Ruang findOneByLuasPlesterM2(string $luas_plester_m2) Return the first Ruang filtered by the luas_plester_m2 column
 * @method Ruang findOneByLuasPlafonM2(string $luas_plafon_m2) Return the first Ruang filtered by the luas_plafon_m2 column
 * @method Ruang findOneByLuasDindingM2(string $luas_dinding_m2) Return the first Ruang filtered by the luas_dinding_m2 column
 * @method Ruang findOneByLuasDaunJendelaM2(string $luas_daun_jendela_m2) Return the first Ruang filtered by the luas_daun_jendela_m2 column
 * @method Ruang findOneByLuasDaunPintuM2(string $luas_daun_pintu_m2) Return the first Ruang filtered by the luas_daun_pintu_m2 column
 * @method Ruang findOneByPanjKusenM(string $panj_kusen_m) Return the first Ruang filtered by the panj_kusen_m column
 * @method Ruang findOneByLuasTutupLantaiM2(string $luas_tutup_lantai_m2) Return the first Ruang filtered by the luas_tutup_lantai_m2 column
 * @method Ruang findOneByPanjInstListrikM(string $panj_inst_listrik_m) Return the first Ruang filtered by the panj_inst_listrik_m column
 * @method Ruang findOneByJmlInstListrik(string $jml_inst_listrik) Return the first Ruang filtered by the jml_inst_listrik column
 * @method Ruang findOneByPanjInstAirM(string $panj_inst_air_m) Return the first Ruang filtered by the panj_inst_air_m column
 * @method Ruang findOneByJmlInstAir(string $jml_inst_air) Return the first Ruang filtered by the jml_inst_air column
 * @method Ruang findOneByPanjDrainaseM(string $panj_drainase_m) Return the first Ruang filtered by the panj_drainase_m column
 * @method Ruang findOneByLuasFinishStrukturM2(string $luas_finish_struktur_m2) Return the first Ruang filtered by the luas_finish_struktur_m2 column
 * @method Ruang findOneByLuasFinishPlafonM2(string $luas_finish_plafon_m2) Return the first Ruang filtered by the luas_finish_plafon_m2 column
 * @method Ruang findOneByLuasFinishDindingM2(string $luas_finish_dinding_m2) Return the first Ruang filtered by the luas_finish_dinding_m2 column
 * @method Ruang findOneByLuasFinishKpjM2(string $luas_finish_kpj_m2) Return the first Ruang filtered by the luas_finish_kpj_m2 column
 * @method Ruang findOneByCreateDate(string $create_date) Return the first Ruang filtered by the create_date column
 * @method Ruang findOneByLastUpdate(string $last_update) Return the first Ruang filtered by the last_update column
 * @method Ruang findOneBySoftDelete(string $soft_delete) Return the first Ruang filtered by the soft_delete column
 * @method Ruang findOneByLastSync(string $last_sync) Return the first Ruang filtered by the last_sync column
 * @method Ruang findOneByUpdaterId(string $updater_id) Return the first Ruang filtered by the updater_id column
 *
 * @method array findByIdRuang(string $id_ruang) Return Ruang objects filtered by the id_ruang column
 * @method array findByJenisPrasaranaId(int $jenis_prasarana_id) Return Ruang objects filtered by the jenis_prasarana_id column
 * @method array findBySekolahId(string $sekolah_id) Return Ruang objects filtered by the sekolah_id column
 * @method array findByParentIdRuang(string $parent_id_ruang) Return Ruang objects filtered by the parent_id_ruang column
 * @method array findByIdBangunan(string $id_bangunan) Return Ruang objects filtered by the id_bangunan column
 * @method array findByAsalData(string $asal_data) Return Ruang objects filtered by the asal_data column
 * @method array findByKdRuang(string $kd_ruang) Return Ruang objects filtered by the kd_ruang column
 * @method array findByNmRuang(string $nm_ruang) Return Ruang objects filtered by the nm_ruang column
 * @method array findByLantai(string $lantai) Return Ruang objects filtered by the lantai column
 * @method array findByPanjang(double $panjang) Return Ruang objects filtered by the panjang column
 * @method array findByLebar(double $lebar) Return Ruang objects filtered by the lebar column
 * @method array findByRegPras(string $reg_pras) Return Ruang objects filtered by the reg_pras column
 * @method array findByKapasitas(string $kapasitas) Return Ruang objects filtered by the kapasitas column
 * @method array findByLuasRuang(double $luas_ruang) Return Ruang objects filtered by the luas_ruang column
 * @method array findByLuasPlesterM2(string $luas_plester_m2) Return Ruang objects filtered by the luas_plester_m2 column
 * @method array findByLuasPlafonM2(string $luas_plafon_m2) Return Ruang objects filtered by the luas_plafon_m2 column
 * @method array findByLuasDindingM2(string $luas_dinding_m2) Return Ruang objects filtered by the luas_dinding_m2 column
 * @method array findByLuasDaunJendelaM2(string $luas_daun_jendela_m2) Return Ruang objects filtered by the luas_daun_jendela_m2 column
 * @method array findByLuasDaunPintuM2(string $luas_daun_pintu_m2) Return Ruang objects filtered by the luas_daun_pintu_m2 column
 * @method array findByPanjKusenM(string $panj_kusen_m) Return Ruang objects filtered by the panj_kusen_m column
 * @method array findByLuasTutupLantaiM2(string $luas_tutup_lantai_m2) Return Ruang objects filtered by the luas_tutup_lantai_m2 column
 * @method array findByPanjInstListrikM(string $panj_inst_listrik_m) Return Ruang objects filtered by the panj_inst_listrik_m column
 * @method array findByJmlInstListrik(string $jml_inst_listrik) Return Ruang objects filtered by the jml_inst_listrik column
 * @method array findByPanjInstAirM(string $panj_inst_air_m) Return Ruang objects filtered by the panj_inst_air_m column
 * @method array findByJmlInstAir(string $jml_inst_air) Return Ruang objects filtered by the jml_inst_air column
 * @method array findByPanjDrainaseM(string $panj_drainase_m) Return Ruang objects filtered by the panj_drainase_m column
 * @method array findByLuasFinishStrukturM2(string $luas_finish_struktur_m2) Return Ruang objects filtered by the luas_finish_struktur_m2 column
 * @method array findByLuasFinishPlafonM2(string $luas_finish_plafon_m2) Return Ruang objects filtered by the luas_finish_plafon_m2 column
 * @method array findByLuasFinishDindingM2(string $luas_finish_dinding_m2) Return Ruang objects filtered by the luas_finish_dinding_m2 column
 * @method array findByLuasFinishKpjM2(string $luas_finish_kpj_m2) Return Ruang objects filtered by the luas_finish_kpj_m2 column
 * @method array findByCreateDate(string $create_date) Return Ruang objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Ruang objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Ruang objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Ruang objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Ruang objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRuangQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRuangQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Ruang', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RuangQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RuangQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RuangQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RuangQuery) {
            return $criteria;
        }
        $query = new RuangQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query 
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Ruang|Ruang[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RuangPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RuangPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Ruang A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdRuang($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Ruang A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_ruang", "jenis_prasarana_id", "sekolah_id", "parent_id_ruang", "id_bangunan", "asal_data", "kd_ruang", "nm_ruang", "lantai", "panjang", "lebar", "reg_pras", "kapasitas", "luas_ruang", "luas_plester_m2", "luas_plafon_m2", "luas_dinding_m2", "luas_daun_jendela_m2", "luas_daun_pintu_m2", "panj_kusen_m", "luas_tutup_lantai_m2", "panj_inst_listrik_m", "jml_inst_listrik", "panj_inst_air_m", "jml_inst_air", "panj_drainase_m", "luas_finish_struktur_m2", "luas_finish_plafon_m2", "luas_finish_dinding_m2", "luas_finish_kpj_m2", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "ruang" WHERE "id_ruang" = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Ruang();
            $obj->hydrate($row);
            RuangPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Ruang|Ruang[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Ruang[]|mixed the list of results, formatted by the current formatter
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
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RuangPeer::ID_RUANG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RuangPeer::ID_RUANG, $keys, Criteria::IN);
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
     * @return RuangQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RuangPeer::ID_RUANG, $idRuang, $comparison);
    }

    /**
     * Filter the query on the jenis_prasarana_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisPrasaranaId(1234); // WHERE jenis_prasarana_id = 1234
     * $query->filterByJenisPrasaranaId(array(12, 34)); // WHERE jenis_prasarana_id IN (12, 34)
     * $query->filterByJenisPrasaranaId(array('min' => 12)); // WHERE jenis_prasarana_id >= 12
     * $query->filterByJenisPrasaranaId(array('max' => 12)); // WHERE jenis_prasarana_id <= 12
     * </code>
     *
     * @see       filterByJenisPrasarana()
     *
     * @param     mixed $jenisPrasaranaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByJenisPrasaranaId($jenisPrasaranaId = null, $comparison = null)
    {
        if (is_array($jenisPrasaranaId)) {
            $useMinMax = false;
            if (isset($jenisPrasaranaId['min'])) {
                $this->addUsingAlias(RuangPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPrasaranaId['max'])) {
                $this->addUsingAlias(RuangPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId, $comparison);
    }

    /**
     * Filter the query on the sekolah_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahId('fooValue');   // WHERE sekolah_id = 'fooValue'
     * $query->filterBySekolahId('%fooValue%'); // WHERE sekolah_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterBySekolahId($sekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sekolahId)) {
                $sekolahId = str_replace('*', '%', $sekolahId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the parent_id_ruang column
     *
     * Example usage:
     * <code>
     * $query->filterByParentIdRuang('fooValue');   // WHERE parent_id_ruang = 'fooValue'
     * $query->filterByParentIdRuang('%fooValue%'); // WHERE parent_id_ruang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $parentIdRuang The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByParentIdRuang($parentIdRuang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($parentIdRuang)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $parentIdRuang)) {
                $parentIdRuang = str_replace('*', '%', $parentIdRuang);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangPeer::PARENT_ID_RUANG, $parentIdRuang, $comparison);
    }

    /**
     * Filter the query on the id_bangunan column
     *
     * Example usage:
     * <code>
     * $query->filterByIdBangunan('fooValue');   // WHERE id_bangunan = 'fooValue'
     * $query->filterByIdBangunan('%fooValue%'); // WHERE id_bangunan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idBangunan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByIdBangunan($idBangunan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idBangunan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idBangunan)) {
                $idBangunan = str_replace('*', '%', $idBangunan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangPeer::ID_BANGUNAN, $idBangunan, $comparison);
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
     * @return RuangQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RuangPeer::ASAL_DATA, $asalData, $comparison);
    }

    /**
     * Filter the query on the kd_ruang column
     *
     * Example usage:
     * <code>
     * $query->filterByKdRuang('fooValue');   // WHERE kd_ruang = 'fooValue'
     * $query->filterByKdRuang('%fooValue%'); // WHERE kd_ruang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kdRuang The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByKdRuang($kdRuang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kdRuang)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kdRuang)) {
                $kdRuang = str_replace('*', '%', $kdRuang);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangPeer::KD_RUANG, $kdRuang, $comparison);
    }

    /**
     * Filter the query on the nm_ruang column
     *
     * Example usage:
     * <code>
     * $query->filterByNmRuang('fooValue');   // WHERE nm_ruang = 'fooValue'
     * $query->filterByNmRuang('%fooValue%'); // WHERE nm_ruang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmRuang The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByNmRuang($nmRuang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmRuang)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmRuang)) {
                $nmRuang = str_replace('*', '%', $nmRuang);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangPeer::NM_RUANG, $nmRuang, $comparison);
    }

    /**
     * Filter the query on the lantai column
     *
     * Example usage:
     * <code>
     * $query->filterByLantai(1234); // WHERE lantai = 1234
     * $query->filterByLantai(array(12, 34)); // WHERE lantai IN (12, 34)
     * $query->filterByLantai(array('min' => 12)); // WHERE lantai >= 12
     * $query->filterByLantai(array('max' => 12)); // WHERE lantai <= 12
     * </code>
     *
     * @param     mixed $lantai The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLantai($lantai = null, $comparison = null)
    {
        if (is_array($lantai)) {
            $useMinMax = false;
            if (isset($lantai['min'])) {
                $this->addUsingAlias(RuangPeer::LANTAI, $lantai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lantai['max'])) {
                $this->addUsingAlias(RuangPeer::LANTAI, $lantai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LANTAI, $lantai, $comparison);
    }

    /**
     * Filter the query on the panjang column
     *
     * Example usage:
     * <code>
     * $query->filterByPanjang(1234); // WHERE panjang = 1234
     * $query->filterByPanjang(array(12, 34)); // WHERE panjang IN (12, 34)
     * $query->filterByPanjang(array('min' => 12)); // WHERE panjang >= 12
     * $query->filterByPanjang(array('max' => 12)); // WHERE panjang <= 12
     * </code>
     *
     * @param     mixed $panjang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByPanjang($panjang = null, $comparison = null)
    {
        if (is_array($panjang)) {
            $useMinMax = false;
            if (isset($panjang['min'])) {
                $this->addUsingAlias(RuangPeer::PANJANG, $panjang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($panjang['max'])) {
                $this->addUsingAlias(RuangPeer::PANJANG, $panjang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::PANJANG, $panjang, $comparison);
    }

    /**
     * Filter the query on the lebar column
     *
     * Example usage:
     * <code>
     * $query->filterByLebar(1234); // WHERE lebar = 1234
     * $query->filterByLebar(array(12, 34)); // WHERE lebar IN (12, 34)
     * $query->filterByLebar(array('min' => 12)); // WHERE lebar >= 12
     * $query->filterByLebar(array('max' => 12)); // WHERE lebar <= 12
     * </code>
     *
     * @param     mixed $lebar The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLebar($lebar = null, $comparison = null)
    {
        if (is_array($lebar)) {
            $useMinMax = false;
            if (isset($lebar['min'])) {
                $this->addUsingAlias(RuangPeer::LEBAR, $lebar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lebar['max'])) {
                $this->addUsingAlias(RuangPeer::LEBAR, $lebar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LEBAR, $lebar, $comparison);
    }

    /**
     * Filter the query on the reg_pras column
     *
     * Example usage:
     * <code>
     * $query->filterByRegPras('fooValue');   // WHERE reg_pras = 'fooValue'
     * $query->filterByRegPras('%fooValue%'); // WHERE reg_pras LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regPras The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByRegPras($regPras = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regPras)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regPras)) {
                $regPras = str_replace('*', '%', $regPras);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RuangPeer::REG_PRAS, $regPras, $comparison);
    }

    /**
     * Filter the query on the kapasitas column
     *
     * Example usage:
     * <code>
     * $query->filterByKapasitas(1234); // WHERE kapasitas = 1234
     * $query->filterByKapasitas(array(12, 34)); // WHERE kapasitas IN (12, 34)
     * $query->filterByKapasitas(array('min' => 12)); // WHERE kapasitas >= 12
     * $query->filterByKapasitas(array('max' => 12)); // WHERE kapasitas <= 12
     * </code>
     *
     * @param     mixed $kapasitas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByKapasitas($kapasitas = null, $comparison = null)
    {
        if (is_array($kapasitas)) {
            $useMinMax = false;
            if (isset($kapasitas['min'])) {
                $this->addUsingAlias(RuangPeer::KAPASITAS, $kapasitas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kapasitas['max'])) {
                $this->addUsingAlias(RuangPeer::KAPASITAS, $kapasitas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::KAPASITAS, $kapasitas, $comparison);
    }

    /**
     * Filter the query on the luas_ruang column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasRuang(1234); // WHERE luas_ruang = 1234
     * $query->filterByLuasRuang(array(12, 34)); // WHERE luas_ruang IN (12, 34)
     * $query->filterByLuasRuang(array('min' => 12)); // WHERE luas_ruang >= 12
     * $query->filterByLuasRuang(array('max' => 12)); // WHERE luas_ruang <= 12
     * </code>
     *
     * @param     mixed $luasRuang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLuasRuang($luasRuang = null, $comparison = null)
    {
        if (is_array($luasRuang)) {
            $useMinMax = false;
            if (isset($luasRuang['min'])) {
                $this->addUsingAlias(RuangPeer::LUAS_RUANG, $luasRuang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasRuang['max'])) {
                $this->addUsingAlias(RuangPeer::LUAS_RUANG, $luasRuang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LUAS_RUANG, $luasRuang, $comparison);
    }

    /**
     * Filter the query on the luas_plester_m2 column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasPlesterM2(1234); // WHERE luas_plester_m2 = 1234
     * $query->filterByLuasPlesterM2(array(12, 34)); // WHERE luas_plester_m2 IN (12, 34)
     * $query->filterByLuasPlesterM2(array('min' => 12)); // WHERE luas_plester_m2 >= 12
     * $query->filterByLuasPlesterM2(array('max' => 12)); // WHERE luas_plester_m2 <= 12
     * </code>
     *
     * @param     mixed $luasPlesterM2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLuasPlesterM2($luasPlesterM2 = null, $comparison = null)
    {
        if (is_array($luasPlesterM2)) {
            $useMinMax = false;
            if (isset($luasPlesterM2['min'])) {
                $this->addUsingAlias(RuangPeer::LUAS_PLESTER_M2, $luasPlesterM2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasPlesterM2['max'])) {
                $this->addUsingAlias(RuangPeer::LUAS_PLESTER_M2, $luasPlesterM2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LUAS_PLESTER_M2, $luasPlesterM2, $comparison);
    }

    /**
     * Filter the query on the luas_plafon_m2 column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasPlafonM2(1234); // WHERE luas_plafon_m2 = 1234
     * $query->filterByLuasPlafonM2(array(12, 34)); // WHERE luas_plafon_m2 IN (12, 34)
     * $query->filterByLuasPlafonM2(array('min' => 12)); // WHERE luas_plafon_m2 >= 12
     * $query->filterByLuasPlafonM2(array('max' => 12)); // WHERE luas_plafon_m2 <= 12
     * </code>
     *
     * @param     mixed $luasPlafonM2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLuasPlafonM2($luasPlafonM2 = null, $comparison = null)
    {
        if (is_array($luasPlafonM2)) {
            $useMinMax = false;
            if (isset($luasPlafonM2['min'])) {
                $this->addUsingAlias(RuangPeer::LUAS_PLAFON_M2, $luasPlafonM2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasPlafonM2['max'])) {
                $this->addUsingAlias(RuangPeer::LUAS_PLAFON_M2, $luasPlafonM2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LUAS_PLAFON_M2, $luasPlafonM2, $comparison);
    }

    /**
     * Filter the query on the luas_dinding_m2 column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasDindingM2(1234); // WHERE luas_dinding_m2 = 1234
     * $query->filterByLuasDindingM2(array(12, 34)); // WHERE luas_dinding_m2 IN (12, 34)
     * $query->filterByLuasDindingM2(array('min' => 12)); // WHERE luas_dinding_m2 >= 12
     * $query->filterByLuasDindingM2(array('max' => 12)); // WHERE luas_dinding_m2 <= 12
     * </code>
     *
     * @param     mixed $luasDindingM2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLuasDindingM2($luasDindingM2 = null, $comparison = null)
    {
        if (is_array($luasDindingM2)) {
            $useMinMax = false;
            if (isset($luasDindingM2['min'])) {
                $this->addUsingAlias(RuangPeer::LUAS_DINDING_M2, $luasDindingM2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasDindingM2['max'])) {
                $this->addUsingAlias(RuangPeer::LUAS_DINDING_M2, $luasDindingM2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LUAS_DINDING_M2, $luasDindingM2, $comparison);
    }

    /**
     * Filter the query on the luas_daun_jendela_m2 column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasDaunJendelaM2(1234); // WHERE luas_daun_jendela_m2 = 1234
     * $query->filterByLuasDaunJendelaM2(array(12, 34)); // WHERE luas_daun_jendela_m2 IN (12, 34)
     * $query->filterByLuasDaunJendelaM2(array('min' => 12)); // WHERE luas_daun_jendela_m2 >= 12
     * $query->filterByLuasDaunJendelaM2(array('max' => 12)); // WHERE luas_daun_jendela_m2 <= 12
     * </code>
     *
     * @param     mixed $luasDaunJendelaM2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLuasDaunJendelaM2($luasDaunJendelaM2 = null, $comparison = null)
    {
        if (is_array($luasDaunJendelaM2)) {
            $useMinMax = false;
            if (isset($luasDaunJendelaM2['min'])) {
                $this->addUsingAlias(RuangPeer::LUAS_DAUN_JENDELA_M2, $luasDaunJendelaM2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasDaunJendelaM2['max'])) {
                $this->addUsingAlias(RuangPeer::LUAS_DAUN_JENDELA_M2, $luasDaunJendelaM2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LUAS_DAUN_JENDELA_M2, $luasDaunJendelaM2, $comparison);
    }

    /**
     * Filter the query on the luas_daun_pintu_m2 column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasDaunPintuM2(1234); // WHERE luas_daun_pintu_m2 = 1234
     * $query->filterByLuasDaunPintuM2(array(12, 34)); // WHERE luas_daun_pintu_m2 IN (12, 34)
     * $query->filterByLuasDaunPintuM2(array('min' => 12)); // WHERE luas_daun_pintu_m2 >= 12
     * $query->filterByLuasDaunPintuM2(array('max' => 12)); // WHERE luas_daun_pintu_m2 <= 12
     * </code>
     *
     * @param     mixed $luasDaunPintuM2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLuasDaunPintuM2($luasDaunPintuM2 = null, $comparison = null)
    {
        if (is_array($luasDaunPintuM2)) {
            $useMinMax = false;
            if (isset($luasDaunPintuM2['min'])) {
                $this->addUsingAlias(RuangPeer::LUAS_DAUN_PINTU_M2, $luasDaunPintuM2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasDaunPintuM2['max'])) {
                $this->addUsingAlias(RuangPeer::LUAS_DAUN_PINTU_M2, $luasDaunPintuM2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LUAS_DAUN_PINTU_M2, $luasDaunPintuM2, $comparison);
    }

    /**
     * Filter the query on the panj_kusen_m column
     *
     * Example usage:
     * <code>
     * $query->filterByPanjKusenM(1234); // WHERE panj_kusen_m = 1234
     * $query->filterByPanjKusenM(array(12, 34)); // WHERE panj_kusen_m IN (12, 34)
     * $query->filterByPanjKusenM(array('min' => 12)); // WHERE panj_kusen_m >= 12
     * $query->filterByPanjKusenM(array('max' => 12)); // WHERE panj_kusen_m <= 12
     * </code>
     *
     * @param     mixed $panjKusenM The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByPanjKusenM($panjKusenM = null, $comparison = null)
    {
        if (is_array($panjKusenM)) {
            $useMinMax = false;
            if (isset($panjKusenM['min'])) {
                $this->addUsingAlias(RuangPeer::PANJ_KUSEN_M, $panjKusenM['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($panjKusenM['max'])) {
                $this->addUsingAlias(RuangPeer::PANJ_KUSEN_M, $panjKusenM['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::PANJ_KUSEN_M, $panjKusenM, $comparison);
    }

    /**
     * Filter the query on the luas_tutup_lantai_m2 column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasTutupLantaiM2(1234); // WHERE luas_tutup_lantai_m2 = 1234
     * $query->filterByLuasTutupLantaiM2(array(12, 34)); // WHERE luas_tutup_lantai_m2 IN (12, 34)
     * $query->filterByLuasTutupLantaiM2(array('min' => 12)); // WHERE luas_tutup_lantai_m2 >= 12
     * $query->filterByLuasTutupLantaiM2(array('max' => 12)); // WHERE luas_tutup_lantai_m2 <= 12
     * </code>
     *
     * @param     mixed $luasTutupLantaiM2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLuasTutupLantaiM2($luasTutupLantaiM2 = null, $comparison = null)
    {
        if (is_array($luasTutupLantaiM2)) {
            $useMinMax = false;
            if (isset($luasTutupLantaiM2['min'])) {
                $this->addUsingAlias(RuangPeer::LUAS_TUTUP_LANTAI_M2, $luasTutupLantaiM2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasTutupLantaiM2['max'])) {
                $this->addUsingAlias(RuangPeer::LUAS_TUTUP_LANTAI_M2, $luasTutupLantaiM2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LUAS_TUTUP_LANTAI_M2, $luasTutupLantaiM2, $comparison);
    }

    /**
     * Filter the query on the panj_inst_listrik_m column
     *
     * Example usage:
     * <code>
     * $query->filterByPanjInstListrikM(1234); // WHERE panj_inst_listrik_m = 1234
     * $query->filterByPanjInstListrikM(array(12, 34)); // WHERE panj_inst_listrik_m IN (12, 34)
     * $query->filterByPanjInstListrikM(array('min' => 12)); // WHERE panj_inst_listrik_m >= 12
     * $query->filterByPanjInstListrikM(array('max' => 12)); // WHERE panj_inst_listrik_m <= 12
     * </code>
     *
     * @param     mixed $panjInstListrikM The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByPanjInstListrikM($panjInstListrikM = null, $comparison = null)
    {
        if (is_array($panjInstListrikM)) {
            $useMinMax = false;
            if (isset($panjInstListrikM['min'])) {
                $this->addUsingAlias(RuangPeer::PANJ_INST_LISTRIK_M, $panjInstListrikM['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($panjInstListrikM['max'])) {
                $this->addUsingAlias(RuangPeer::PANJ_INST_LISTRIK_M, $panjInstListrikM['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::PANJ_INST_LISTRIK_M, $panjInstListrikM, $comparison);
    }

    /**
     * Filter the query on the jml_inst_listrik column
     *
     * Example usage:
     * <code>
     * $query->filterByJmlInstListrik(1234); // WHERE jml_inst_listrik = 1234
     * $query->filterByJmlInstListrik(array(12, 34)); // WHERE jml_inst_listrik IN (12, 34)
     * $query->filterByJmlInstListrik(array('min' => 12)); // WHERE jml_inst_listrik >= 12
     * $query->filterByJmlInstListrik(array('max' => 12)); // WHERE jml_inst_listrik <= 12
     * </code>
     *
     * @param     mixed $jmlInstListrik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByJmlInstListrik($jmlInstListrik = null, $comparison = null)
    {
        if (is_array($jmlInstListrik)) {
            $useMinMax = false;
            if (isset($jmlInstListrik['min'])) {
                $this->addUsingAlias(RuangPeer::JML_INST_LISTRIK, $jmlInstListrik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jmlInstListrik['max'])) {
                $this->addUsingAlias(RuangPeer::JML_INST_LISTRIK, $jmlInstListrik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::JML_INST_LISTRIK, $jmlInstListrik, $comparison);
    }

    /**
     * Filter the query on the panj_inst_air_m column
     *
     * Example usage:
     * <code>
     * $query->filterByPanjInstAirM(1234); // WHERE panj_inst_air_m = 1234
     * $query->filterByPanjInstAirM(array(12, 34)); // WHERE panj_inst_air_m IN (12, 34)
     * $query->filterByPanjInstAirM(array('min' => 12)); // WHERE panj_inst_air_m >= 12
     * $query->filterByPanjInstAirM(array('max' => 12)); // WHERE panj_inst_air_m <= 12
     * </code>
     *
     * @param     mixed $panjInstAirM The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByPanjInstAirM($panjInstAirM = null, $comparison = null)
    {
        if (is_array($panjInstAirM)) {
            $useMinMax = false;
            if (isset($panjInstAirM['min'])) {
                $this->addUsingAlias(RuangPeer::PANJ_INST_AIR_M, $panjInstAirM['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($panjInstAirM['max'])) {
                $this->addUsingAlias(RuangPeer::PANJ_INST_AIR_M, $panjInstAirM['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::PANJ_INST_AIR_M, $panjInstAirM, $comparison);
    }

    /**
     * Filter the query on the jml_inst_air column
     *
     * Example usage:
     * <code>
     * $query->filterByJmlInstAir(1234); // WHERE jml_inst_air = 1234
     * $query->filterByJmlInstAir(array(12, 34)); // WHERE jml_inst_air IN (12, 34)
     * $query->filterByJmlInstAir(array('min' => 12)); // WHERE jml_inst_air >= 12
     * $query->filterByJmlInstAir(array('max' => 12)); // WHERE jml_inst_air <= 12
     * </code>
     *
     * @param     mixed $jmlInstAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByJmlInstAir($jmlInstAir = null, $comparison = null)
    {
        if (is_array($jmlInstAir)) {
            $useMinMax = false;
            if (isset($jmlInstAir['min'])) {
                $this->addUsingAlias(RuangPeer::JML_INST_AIR, $jmlInstAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jmlInstAir['max'])) {
                $this->addUsingAlias(RuangPeer::JML_INST_AIR, $jmlInstAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::JML_INST_AIR, $jmlInstAir, $comparison);
    }

    /**
     * Filter the query on the panj_drainase_m column
     *
     * Example usage:
     * <code>
     * $query->filterByPanjDrainaseM(1234); // WHERE panj_drainase_m = 1234
     * $query->filterByPanjDrainaseM(array(12, 34)); // WHERE panj_drainase_m IN (12, 34)
     * $query->filterByPanjDrainaseM(array('min' => 12)); // WHERE panj_drainase_m >= 12
     * $query->filterByPanjDrainaseM(array('max' => 12)); // WHERE panj_drainase_m <= 12
     * </code>
     *
     * @param     mixed $panjDrainaseM The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByPanjDrainaseM($panjDrainaseM = null, $comparison = null)
    {
        if (is_array($panjDrainaseM)) {
            $useMinMax = false;
            if (isset($panjDrainaseM['min'])) {
                $this->addUsingAlias(RuangPeer::PANJ_DRAINASE_M, $panjDrainaseM['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($panjDrainaseM['max'])) {
                $this->addUsingAlias(RuangPeer::PANJ_DRAINASE_M, $panjDrainaseM['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::PANJ_DRAINASE_M, $panjDrainaseM, $comparison);
    }

    /**
     * Filter the query on the luas_finish_struktur_m2 column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasFinishStrukturM2(1234); // WHERE luas_finish_struktur_m2 = 1234
     * $query->filterByLuasFinishStrukturM2(array(12, 34)); // WHERE luas_finish_struktur_m2 IN (12, 34)
     * $query->filterByLuasFinishStrukturM2(array('min' => 12)); // WHERE luas_finish_struktur_m2 >= 12
     * $query->filterByLuasFinishStrukturM2(array('max' => 12)); // WHERE luas_finish_struktur_m2 <= 12
     * </code>
     *
     * @param     mixed $luasFinishStrukturM2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLuasFinishStrukturM2($luasFinishStrukturM2 = null, $comparison = null)
    {
        if (is_array($luasFinishStrukturM2)) {
            $useMinMax = false;
            if (isset($luasFinishStrukturM2['min'])) {
                $this->addUsingAlias(RuangPeer::LUAS_FINISH_STRUKTUR_M2, $luasFinishStrukturM2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasFinishStrukturM2['max'])) {
                $this->addUsingAlias(RuangPeer::LUAS_FINISH_STRUKTUR_M2, $luasFinishStrukturM2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LUAS_FINISH_STRUKTUR_M2, $luasFinishStrukturM2, $comparison);
    }

    /**
     * Filter the query on the luas_finish_plafon_m2 column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasFinishPlafonM2(1234); // WHERE luas_finish_plafon_m2 = 1234
     * $query->filterByLuasFinishPlafonM2(array(12, 34)); // WHERE luas_finish_plafon_m2 IN (12, 34)
     * $query->filterByLuasFinishPlafonM2(array('min' => 12)); // WHERE luas_finish_plafon_m2 >= 12
     * $query->filterByLuasFinishPlafonM2(array('max' => 12)); // WHERE luas_finish_plafon_m2 <= 12
     * </code>
     *
     * @param     mixed $luasFinishPlafonM2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLuasFinishPlafonM2($luasFinishPlafonM2 = null, $comparison = null)
    {
        if (is_array($luasFinishPlafonM2)) {
            $useMinMax = false;
            if (isset($luasFinishPlafonM2['min'])) {
                $this->addUsingAlias(RuangPeer::LUAS_FINISH_PLAFON_M2, $luasFinishPlafonM2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasFinishPlafonM2['max'])) {
                $this->addUsingAlias(RuangPeer::LUAS_FINISH_PLAFON_M2, $luasFinishPlafonM2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LUAS_FINISH_PLAFON_M2, $luasFinishPlafonM2, $comparison);
    }

    /**
     * Filter the query on the luas_finish_dinding_m2 column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasFinishDindingM2(1234); // WHERE luas_finish_dinding_m2 = 1234
     * $query->filterByLuasFinishDindingM2(array(12, 34)); // WHERE luas_finish_dinding_m2 IN (12, 34)
     * $query->filterByLuasFinishDindingM2(array('min' => 12)); // WHERE luas_finish_dinding_m2 >= 12
     * $query->filterByLuasFinishDindingM2(array('max' => 12)); // WHERE luas_finish_dinding_m2 <= 12
     * </code>
     *
     * @param     mixed $luasFinishDindingM2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLuasFinishDindingM2($luasFinishDindingM2 = null, $comparison = null)
    {
        if (is_array($luasFinishDindingM2)) {
            $useMinMax = false;
            if (isset($luasFinishDindingM2['min'])) {
                $this->addUsingAlias(RuangPeer::LUAS_FINISH_DINDING_M2, $luasFinishDindingM2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasFinishDindingM2['max'])) {
                $this->addUsingAlias(RuangPeer::LUAS_FINISH_DINDING_M2, $luasFinishDindingM2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LUAS_FINISH_DINDING_M2, $luasFinishDindingM2, $comparison);
    }

    /**
     * Filter the query on the luas_finish_kpj_m2 column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasFinishKpjM2(1234); // WHERE luas_finish_kpj_m2 = 1234
     * $query->filterByLuasFinishKpjM2(array(12, 34)); // WHERE luas_finish_kpj_m2 IN (12, 34)
     * $query->filterByLuasFinishKpjM2(array('min' => 12)); // WHERE luas_finish_kpj_m2 >= 12
     * $query->filterByLuasFinishKpjM2(array('max' => 12)); // WHERE luas_finish_kpj_m2 <= 12
     * </code>
     *
     * @param     mixed $luasFinishKpjM2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLuasFinishKpjM2($luasFinishKpjM2 = null, $comparison = null)
    {
        if (is_array($luasFinishKpjM2)) {
            $useMinMax = false;
            if (isset($luasFinishKpjM2['min'])) {
                $this->addUsingAlias(RuangPeer::LUAS_FINISH_KPJ_M2, $luasFinishKpjM2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasFinishKpjM2['max'])) {
                $this->addUsingAlias(RuangPeer::LUAS_FINISH_KPJ_M2, $luasFinishKpjM2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LUAS_FINISH_KPJ_M2, $luasFinishKpjM2, $comparison);
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
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(RuangPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(RuangPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(RuangPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(RuangPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(RuangPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(RuangPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return RuangQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(RuangPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(RuangPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RuangPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return RuangQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RuangPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ruang object
     *
     * @param   Ruang|PropelObjectCollection $ruang The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuangRelatedByParentIdRuang($ruang, $comparison = null)
    {
        if ($ruang instanceof Ruang) {
            return $this
                ->addUsingAlias(RuangPeer::PARENT_ID_RUANG, $ruang->getIdRuang(), $comparison);
        } elseif ($ruang instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RuangPeer::PARENT_ID_RUANG, $ruang->toKeyValue('PrimaryKey', 'IdRuang'), $comparison);
        } else {
            throw new PropelException('filterByRuangRelatedByParentIdRuang() only accepts arguments of type Ruang or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RuangRelatedByParentIdRuang relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function joinRuangRelatedByParentIdRuang($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RuangRelatedByParentIdRuang');

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
            $this->addJoinObject($join, 'RuangRelatedByParentIdRuang');
        }

        return $this;
    }

    /**
     * Use the RuangRelatedByParentIdRuang relation Ruang object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RuangQuery A secondary query class using the current class as primary query
     */
    public function useRuangRelatedByParentIdRuangQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRuangRelatedByParentIdRuang($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RuangRelatedByParentIdRuang', '\DataDikdas\Model\RuangQuery');
    }

    /**
     * Filter the query by a related Bangunan object
     *
     * @param   Bangunan|PropelObjectCollection $bangunan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBangunan($bangunan, $comparison = null)
    {
        if ($bangunan instanceof Bangunan) {
            return $this
                ->addUsingAlias(RuangPeer::ID_BANGUNAN, $bangunan->getIdBangunan(), $comparison);
        } elseif ($bangunan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RuangPeer::ID_BANGUNAN, $bangunan->toKeyValue('PrimaryKey', 'IdBangunan'), $comparison);
        } else {
            throw new PropelException('filterByBangunan() only accepts arguments of type Bangunan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bangunan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function joinBangunan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bangunan');

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
            $this->addJoinObject($join, 'Bangunan');
        }

        return $this;
    }

    /**
     * Use the Bangunan relation Bangunan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BangunanQuery A secondary query class using the current class as primary query
     */
    public function useBangunanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBangunan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bangunan', '\DataDikdas\Model\BangunanQuery');
    }

    /**
     * Filter the query by a related JenisPrasarana object
     *
     * @param   JenisPrasarana|PropelObjectCollection $jenisPrasarana The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisPrasarana($jenisPrasarana, $comparison = null)
    {
        if ($jenisPrasarana instanceof JenisPrasarana) {
            return $this
                ->addUsingAlias(RuangPeer::JENIS_PRASARANA_ID, $jenisPrasarana->getJenisPrasaranaId(), $comparison);
        } elseif ($jenisPrasarana instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RuangPeer::JENIS_PRASARANA_ID, $jenisPrasarana->toKeyValue('PrimaryKey', 'JenisPrasaranaId'), $comparison);
        } else {
            throw new PropelException('filterByJenisPrasarana() only accepts arguments of type JenisPrasarana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisPrasarana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function joinJenisPrasarana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisPrasarana');

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
            $this->addJoinObject($join, 'JenisPrasarana');
        }

        return $this;
    }

    /**
     * Use the JenisPrasarana relation JenisPrasarana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisPrasaranaQuery A secondary query class using the current class as primary query
     */
    public function useJenisPrasaranaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisPrasarana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisPrasarana', '\DataDikdas\Model\JenisPrasaranaQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(RuangPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RuangPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
        } else {
            throw new PropelException('filterBySekolah() only accepts arguments of type Sekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sekolah');

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
            $this->addJoinObject($join, 'Sekolah');
        }

        return $this;
    }

    /**
     * Use the Sekolah relation Sekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahQuery A secondary query class using the current class as primary query
     */
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\DataDikdas\Model\SekolahQuery');
    }

    /**
     * Filter the query by a related Alat object
     *
     * @param   Alat|PropelObjectCollection $alat  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlat($alat, $comparison = null)
    {
        if ($alat instanceof Alat) {
            return $this
                ->addUsingAlias(RuangPeer::ID_RUANG, $alat->getIdRuang(), $comparison);
        } elseif ($alat instanceof PropelObjectCollection) {
            return $this
                ->useAlatQuery()
                ->filterByPrimaryKeys($alat->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlat() only accepts arguments of type Alat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Alat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function joinAlat($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Alat');

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
            $this->addJoinObject($join, 'Alat');
        }

        return $this;
    }

    /**
     * Use the Alat relation Alat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlatQuery A secondary query class using the current class as primary query
     */
    public function useAlatQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAlat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Alat', '\DataDikdas\Model\AlatQuery');
    }

    /**
     * Filter the query by a related Buku object
     *
     * @param   Buku|PropelObjectCollection $buku  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBuku($buku, $comparison = null)
    {
        if ($buku instanceof Buku) {
            return $this
                ->addUsingAlias(RuangPeer::ID_RUANG, $buku->getIdRuang(), $comparison);
        } elseif ($buku instanceof PropelObjectCollection) {
            return $this
                ->useBukuQuery()
                ->filterByPrimaryKeys($buku->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBuku() only accepts arguments of type Buku or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Buku relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function joinBuku($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Buku');

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
            $this->addJoinObject($join, 'Buku');
        }

        return $this;
    }

    /**
     * Use the Buku relation Buku object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BukuQuery A secondary query class using the current class as primary query
     */
    public function useBukuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBuku($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Buku', '\DataDikdas\Model\BukuQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwal($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(RuangPeer::ID_RUANG, $jadwal->getIdRuang(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalQuery()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwal() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Jadwal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function joinJadwal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Jadwal');

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
            $this->addJoinObject($join, 'Jadwal');
        }

        return $this;
    }

    /**
     * Use the Jadwal relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJadwal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Jadwal', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related RombonganBelajar object
     *
     * @param   RombonganBelajar|PropelObjectCollection $rombonganBelajar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRombonganBelajar($rombonganBelajar, $comparison = null)
    {
        if ($rombonganBelajar instanceof RombonganBelajar) {
            return $this
                ->addUsingAlias(RuangPeer::ID_RUANG, $rombonganBelajar->getIdRuang(), $comparison);
        } elseif ($rombonganBelajar instanceof PropelObjectCollection) {
            return $this
                ->useRombonganBelajarQuery()
                ->filterByPrimaryKeys($rombonganBelajar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRombonganBelajar() only accepts arguments of type RombonganBelajar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RombonganBelajar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function joinRombonganBelajar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RombonganBelajar');

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
            $this->addJoinObject($join, 'RombonganBelajar');
        }

        return $this;
    }

    /**
     * Use the RombonganBelajar relation RombonganBelajar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RombonganBelajarQuery A secondary query class using the current class as primary query
     */
    public function useRombonganBelajarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRombonganBelajar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RombonganBelajar', '\DataDikdas\Model\RombonganBelajarQuery');
    }

    /**
     * Filter the query by a related Ruang object
     *
     * @param   Ruang|PropelObjectCollection $ruang  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuangRelatedByIdRuang($ruang, $comparison = null)
    {
        if ($ruang instanceof Ruang) {
            return $this
                ->addUsingAlias(RuangPeer::ID_RUANG, $ruang->getParentIdRuang(), $comparison);
        } elseif ($ruang instanceof PropelObjectCollection) {
            return $this
                ->useRuangRelatedByIdRuangQuery()
                ->filterByPrimaryKeys($ruang->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRuangRelatedByIdRuang() only accepts arguments of type Ruang or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RuangRelatedByIdRuang relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function joinRuangRelatedByIdRuang($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RuangRelatedByIdRuang');

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
            $this->addJoinObject($join, 'RuangRelatedByIdRuang');
        }

        return $this;
    }

    /**
     * Use the RuangRelatedByIdRuang relation Ruang object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RuangQuery A secondary query class using the current class as primary query
     */
    public function useRuangRelatedByIdRuangQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRuangRelatedByIdRuang($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RuangRelatedByIdRuang', '\DataDikdas\Model\RuangQuery');
    }

    /**
     * Filter the query by a related RuangLongitudinal object
     *
     * @param   RuangLongitudinal|PropelObjectCollection $ruangLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuangLongitudinal($ruangLongitudinal, $comparison = null)
    {
        if ($ruangLongitudinal instanceof RuangLongitudinal) {
            return $this
                ->addUsingAlias(RuangPeer::ID_RUANG, $ruangLongitudinal->getIdRuang(), $comparison);
        } elseif ($ruangLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useRuangLongitudinalQuery()
                ->filterByPrimaryKeys($ruangLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRuangLongitudinal() only accepts arguments of type RuangLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RuangLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function joinRuangLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RuangLongitudinal');

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
            $this->addJoinObject($join, 'RuangLongitudinal');
        }

        return $this;
    }

    /**
     * Use the RuangLongitudinal relation RuangLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RuangLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useRuangLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRuangLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RuangLongitudinal', '\DataDikdas\Model\RuangLongitudinalQuery');
    }

    /**
     * Filter the query by a related TugasTambahan object
     *
     * @param   TugasTambahan|PropelObjectCollection $tugasTambahan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RuangQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTugasTambahan($tugasTambahan, $comparison = null)
    {
        if ($tugasTambahan instanceof TugasTambahan) {
            return $this
                ->addUsingAlias(RuangPeer::ID_RUANG, $tugasTambahan->getIdRuang(), $comparison);
        } elseif ($tugasTambahan instanceof PropelObjectCollection) {
            return $this
                ->useTugasTambahanQuery()
                ->filterByPrimaryKeys($tugasTambahan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTugasTambahan() only accepts arguments of type TugasTambahan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TugasTambahan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function joinTugasTambahan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TugasTambahan');

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
            $this->addJoinObject($join, 'TugasTambahan');
        }

        return $this;
    }

    /**
     * Use the TugasTambahan relation TugasTambahan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TugasTambahanQuery A secondary query class using the current class as primary query
     */
    public function useTugasTambahanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTugasTambahan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TugasTambahan', '\DataDikdas\Model\TugasTambahanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Ruang $ruang Object to remove from the list of results
     *
     * @return RuangQuery The current query, for fluid interface
     */
    public function prune($ruang = null)
    {
        if ($ruang) {
            $this->addUsingAlias(RuangPeer::ID_RUANG, $ruang->getIdRuang(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
