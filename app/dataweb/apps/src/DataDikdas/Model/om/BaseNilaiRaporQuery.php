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
use DataDikdas\Model\MatevRapor;
use DataDikdas\Model\NilaiRapor;
use DataDikdas\Model\NilaiRaporPeer;
use DataDikdas\Model\NilaiRaporQuery;

/**
 * Base class that represents a query for the 'nilai.nilai_rapor' table.
 *
 * 
 *
 * @method NilaiRaporQuery orderByNilaiId($order = Criteria::ASC) Order by the nilai_id column
 * @method NilaiRaporQuery orderByIdEvaluasi($order = Criteria::ASC) Order by the id_evaluasi column
 * @method NilaiRaporQuery orderByAnggotaRombelId($order = Criteria::ASC) Order by the anggota_rombel_id column
 * @method NilaiRaporQuery orderByNilaiKognitifAngka($order = Criteria::ASC) Order by the nilai_kognitif_angka column
 * @method NilaiRaporQuery orderByNilaiKognitifHuruf($order = Criteria::ASC) Order by the nilai_kognitif_huruf column
 * @method NilaiRaporQuery orderByKetKognitif($order = Criteria::ASC) Order by the ket_kognitif column
 * @method NilaiRaporQuery orderByNilaiPsimAngka($order = Criteria::ASC) Order by the nilai_psim_angka column
 * @method NilaiRaporQuery orderByNilaiPsimHuruf($order = Criteria::ASC) Order by the nilai_psim_huruf column
 * @method NilaiRaporQuery orderByKetPsim($order = Criteria::ASC) Order by the ket_psim column
 * @method NilaiRaporQuery orderByNilaiAfektifAngka($order = Criteria::ASC) Order by the nilai_afektif_angka column
 * @method NilaiRaporQuery orderByNilaiAfektifHuruf($order = Criteria::ASC) Order by the nilai_afektif_huruf column
 * @method NilaiRaporQuery orderByKetAfektif($order = Criteria::ASC) Order by the ket_afektif column
 * @method NilaiRaporQuery orderByNilaiAfektif2Angka($order = Criteria::ASC) Order by the nilai_afektif2_angka column
 * @method NilaiRaporQuery orderByNilaiAfektif2Huruf($order = Criteria::ASC) Order by the nilai_afektif2_huruf column
 * @method NilaiRaporQuery orderByKetAfektif2($order = Criteria::ASC) Order by the ket_afektif2 column
 * @method NilaiRaporQuery orderByABeku($order = Criteria::ASC) Order by the a_beku column
 * @method NilaiRaporQuery orderByRaporKe($order = Criteria::ASC) Order by the rapor_ke column
 * @method NilaiRaporQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method NilaiRaporQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method NilaiRaporQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method NilaiRaporQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method NilaiRaporQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method NilaiRaporQuery groupByNilaiId() Group by the nilai_id column
 * @method NilaiRaporQuery groupByIdEvaluasi() Group by the id_evaluasi column
 * @method NilaiRaporQuery groupByAnggotaRombelId() Group by the anggota_rombel_id column
 * @method NilaiRaporQuery groupByNilaiKognitifAngka() Group by the nilai_kognitif_angka column
 * @method NilaiRaporQuery groupByNilaiKognitifHuruf() Group by the nilai_kognitif_huruf column
 * @method NilaiRaporQuery groupByKetKognitif() Group by the ket_kognitif column
 * @method NilaiRaporQuery groupByNilaiPsimAngka() Group by the nilai_psim_angka column
 * @method NilaiRaporQuery groupByNilaiPsimHuruf() Group by the nilai_psim_huruf column
 * @method NilaiRaporQuery groupByKetPsim() Group by the ket_psim column
 * @method NilaiRaporQuery groupByNilaiAfektifAngka() Group by the nilai_afektif_angka column
 * @method NilaiRaporQuery groupByNilaiAfektifHuruf() Group by the nilai_afektif_huruf column
 * @method NilaiRaporQuery groupByKetAfektif() Group by the ket_afektif column
 * @method NilaiRaporQuery groupByNilaiAfektif2Angka() Group by the nilai_afektif2_angka column
 * @method NilaiRaporQuery groupByNilaiAfektif2Huruf() Group by the nilai_afektif2_huruf column
 * @method NilaiRaporQuery groupByKetAfektif2() Group by the ket_afektif2 column
 * @method NilaiRaporQuery groupByABeku() Group by the a_beku column
 * @method NilaiRaporQuery groupByRaporKe() Group by the rapor_ke column
 * @method NilaiRaporQuery groupByCreateDate() Group by the create_date column
 * @method NilaiRaporQuery groupByLastUpdate() Group by the last_update column
 * @method NilaiRaporQuery groupBySoftDelete() Group by the soft_delete column
 * @method NilaiRaporQuery groupByLastSync() Group by the last_sync column
 * @method NilaiRaporQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method NilaiRaporQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method NilaiRaporQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method NilaiRaporQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method NilaiRaporQuery leftJoinMatevRapor($relationAlias = null) Adds a LEFT JOIN clause to the query using the MatevRapor relation
 * @method NilaiRaporQuery rightJoinMatevRapor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MatevRapor relation
 * @method NilaiRaporQuery innerJoinMatevRapor($relationAlias = null) Adds a INNER JOIN clause to the query using the MatevRapor relation
 *
 * @method NilaiRapor findOne(PropelPDO $con = null) Return the first NilaiRapor matching the query
 * @method NilaiRapor findOneOrCreate(PropelPDO $con = null) Return the first NilaiRapor matching the query, or a new NilaiRapor object populated from the query conditions when no match is found
 *
 * @method NilaiRapor findOneByIdEvaluasi(string $id_evaluasi) Return the first NilaiRapor filtered by the id_evaluasi column
 * @method NilaiRapor findOneByAnggotaRombelId(string $anggota_rombel_id) Return the first NilaiRapor filtered by the anggota_rombel_id column
 * @method NilaiRapor findOneByNilaiKognitifAngka(string $nilai_kognitif_angka) Return the first NilaiRapor filtered by the nilai_kognitif_angka column
 * @method NilaiRapor findOneByNilaiKognitifHuruf(string $nilai_kognitif_huruf) Return the first NilaiRapor filtered by the nilai_kognitif_huruf column
 * @method NilaiRapor findOneByKetKognitif(string $ket_kognitif) Return the first NilaiRapor filtered by the ket_kognitif column
 * @method NilaiRapor findOneByNilaiPsimAngka(string $nilai_psim_angka) Return the first NilaiRapor filtered by the nilai_psim_angka column
 * @method NilaiRapor findOneByNilaiPsimHuruf(string $nilai_psim_huruf) Return the first NilaiRapor filtered by the nilai_psim_huruf column
 * @method NilaiRapor findOneByKetPsim(string $ket_psim) Return the first NilaiRapor filtered by the ket_psim column
 * @method NilaiRapor findOneByNilaiAfektifAngka(string $nilai_afektif_angka) Return the first NilaiRapor filtered by the nilai_afektif_angka column
 * @method NilaiRapor findOneByNilaiAfektifHuruf(string $nilai_afektif_huruf) Return the first NilaiRapor filtered by the nilai_afektif_huruf column
 * @method NilaiRapor findOneByKetAfektif(string $ket_afektif) Return the first NilaiRapor filtered by the ket_afektif column
 * @method NilaiRapor findOneByNilaiAfektif2Angka(string $nilai_afektif2_angka) Return the first NilaiRapor filtered by the nilai_afektif2_angka column
 * @method NilaiRapor findOneByNilaiAfektif2Huruf(string $nilai_afektif2_huruf) Return the first NilaiRapor filtered by the nilai_afektif2_huruf column
 * @method NilaiRapor findOneByKetAfektif2(string $ket_afektif2) Return the first NilaiRapor filtered by the ket_afektif2 column
 * @method NilaiRapor findOneByABeku(string $a_beku) Return the first NilaiRapor filtered by the a_beku column
 * @method NilaiRapor findOneByRaporKe(string $rapor_ke) Return the first NilaiRapor filtered by the rapor_ke column
 * @method NilaiRapor findOneByCreateDate(string $create_date) Return the first NilaiRapor filtered by the create_date column
 * @method NilaiRapor findOneByLastUpdate(string $last_update) Return the first NilaiRapor filtered by the last_update column
 * @method NilaiRapor findOneBySoftDelete(string $soft_delete) Return the first NilaiRapor filtered by the soft_delete column
 * @method NilaiRapor findOneByLastSync(string $last_sync) Return the first NilaiRapor filtered by the last_sync column
 * @method NilaiRapor findOneByUpdaterId(string $updater_id) Return the first NilaiRapor filtered by the updater_id column
 *
 * @method array findByNilaiId(string $nilai_id) Return NilaiRapor objects filtered by the nilai_id column
 * @method array findByIdEvaluasi(string $id_evaluasi) Return NilaiRapor objects filtered by the id_evaluasi column
 * @method array findByAnggotaRombelId(string $anggota_rombel_id) Return NilaiRapor objects filtered by the anggota_rombel_id column
 * @method array findByNilaiKognitifAngka(string $nilai_kognitif_angka) Return NilaiRapor objects filtered by the nilai_kognitif_angka column
 * @method array findByNilaiKognitifHuruf(string $nilai_kognitif_huruf) Return NilaiRapor objects filtered by the nilai_kognitif_huruf column
 * @method array findByKetKognitif(string $ket_kognitif) Return NilaiRapor objects filtered by the ket_kognitif column
 * @method array findByNilaiPsimAngka(string $nilai_psim_angka) Return NilaiRapor objects filtered by the nilai_psim_angka column
 * @method array findByNilaiPsimHuruf(string $nilai_psim_huruf) Return NilaiRapor objects filtered by the nilai_psim_huruf column
 * @method array findByKetPsim(string $ket_psim) Return NilaiRapor objects filtered by the ket_psim column
 * @method array findByNilaiAfektifAngka(string $nilai_afektif_angka) Return NilaiRapor objects filtered by the nilai_afektif_angka column
 * @method array findByNilaiAfektifHuruf(string $nilai_afektif_huruf) Return NilaiRapor objects filtered by the nilai_afektif_huruf column
 * @method array findByKetAfektif(string $ket_afektif) Return NilaiRapor objects filtered by the ket_afektif column
 * @method array findByNilaiAfektif2Angka(string $nilai_afektif2_angka) Return NilaiRapor objects filtered by the nilai_afektif2_angka column
 * @method array findByNilaiAfektif2Huruf(string $nilai_afektif2_huruf) Return NilaiRapor objects filtered by the nilai_afektif2_huruf column
 * @method array findByKetAfektif2(string $ket_afektif2) Return NilaiRapor objects filtered by the ket_afektif2 column
 * @method array findByABeku(string $a_beku) Return NilaiRapor objects filtered by the a_beku column
 * @method array findByRaporKe(string $rapor_ke) Return NilaiRapor objects filtered by the rapor_ke column
 * @method array findByCreateDate(string $create_date) Return NilaiRapor objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return NilaiRapor objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return NilaiRapor objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return NilaiRapor objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return NilaiRapor objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseNilaiRaporQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseNilaiRaporQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\NilaiRapor', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NilaiRaporQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   NilaiRaporQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NilaiRaporQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NilaiRaporQuery) {
            return $criteria;
        }
        $query = new NilaiRaporQuery();
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
     * @return   NilaiRapor|NilaiRapor[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NilaiRaporPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NilaiRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 NilaiRapor A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByNilaiId($key, $con = null)
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
     * @return                 NilaiRapor A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "nilai_id", "id_evaluasi", "anggota_rombel_id", "nilai_kognitif_angka", "nilai_kognitif_huruf", "ket_kognitif", "nilai_psim_angka", "nilai_psim_huruf", "ket_psim", "nilai_afektif_angka", "nilai_afektif_huruf", "ket_afektif", "nilai_afektif2_angka", "nilai_afektif2_huruf", "ket_afektif2", "a_beku", "rapor_ke", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "nilai"."nilai_rapor" WHERE "nilai_id" = :p0';
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
            $obj = new NilaiRapor();
            $obj->hydrate($row);
            NilaiRaporPeer::addInstanceToPool($obj, (string) $key);
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
     * @return NilaiRapor|NilaiRapor[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|NilaiRapor[]|mixed the list of results, formatted by the current formatter
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
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NilaiRaporPeer::NILAI_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NilaiRaporPeer::NILAI_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the nilai_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiId('fooValue');   // WHERE nilai_id = 'fooValue'
     * $query->filterByNilaiId('%fooValue%'); // WHERE nilai_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nilaiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByNilaiId($nilaiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nilaiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nilaiId)) {
                $nilaiId = str_replace('*', '%', $nilaiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::NILAI_ID, $nilaiId, $comparison);
    }

    /**
     * Filter the query on the id_evaluasi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdEvaluasi('fooValue');   // WHERE id_evaluasi = 'fooValue'
     * $query->filterByIdEvaluasi('%fooValue%'); // WHERE id_evaluasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idEvaluasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByIdEvaluasi($idEvaluasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idEvaluasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idEvaluasi)) {
                $idEvaluasi = str_replace('*', '%', $idEvaluasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::ID_EVALUASI, $idEvaluasi, $comparison);
    }

    /**
     * Filter the query on the anggota_rombel_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAnggotaRombelId('fooValue');   // WHERE anggota_rombel_id = 'fooValue'
     * $query->filterByAnggotaRombelId('%fooValue%'); // WHERE anggota_rombel_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $anggotaRombelId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByAnggotaRombelId($anggotaRombelId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($anggotaRombelId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $anggotaRombelId)) {
                $anggotaRombelId = str_replace('*', '%', $anggotaRombelId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::ANGGOTA_ROMBEL_ID, $anggotaRombelId, $comparison);
    }

    /**
     * Filter the query on the nilai_kognitif_angka column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiKognitifAngka(1234); // WHERE nilai_kognitif_angka = 1234
     * $query->filterByNilaiKognitifAngka(array(12, 34)); // WHERE nilai_kognitif_angka IN (12, 34)
     * $query->filterByNilaiKognitifAngka(array('min' => 12)); // WHERE nilai_kognitif_angka >= 12
     * $query->filterByNilaiKognitifAngka(array('max' => 12)); // WHERE nilai_kognitif_angka <= 12
     * </code>
     *
     * @param     mixed $nilaiKognitifAngka The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByNilaiKognitifAngka($nilaiKognitifAngka = null, $comparison = null)
    {
        if (is_array($nilaiKognitifAngka)) {
            $useMinMax = false;
            if (isset($nilaiKognitifAngka['min'])) {
                $this->addUsingAlias(NilaiRaporPeer::NILAI_KOGNITIF_ANGKA, $nilaiKognitifAngka['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilaiKognitifAngka['max'])) {
                $this->addUsingAlias(NilaiRaporPeer::NILAI_KOGNITIF_ANGKA, $nilaiKognitifAngka['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::NILAI_KOGNITIF_ANGKA, $nilaiKognitifAngka, $comparison);
    }

    /**
     * Filter the query on the nilai_kognitif_huruf column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiKognitifHuruf('fooValue');   // WHERE nilai_kognitif_huruf = 'fooValue'
     * $query->filterByNilaiKognitifHuruf('%fooValue%'); // WHERE nilai_kognitif_huruf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nilaiKognitifHuruf The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByNilaiKognitifHuruf($nilaiKognitifHuruf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nilaiKognitifHuruf)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nilaiKognitifHuruf)) {
                $nilaiKognitifHuruf = str_replace('*', '%', $nilaiKognitifHuruf);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::NILAI_KOGNITIF_HURUF, $nilaiKognitifHuruf, $comparison);
    }

    /**
     * Filter the query on the ket_kognitif column
     *
     * Example usage:
     * <code>
     * $query->filterByKetKognitif('fooValue');   // WHERE ket_kognitif = 'fooValue'
     * $query->filterByKetKognitif('%fooValue%'); // WHERE ket_kognitif LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketKognitif The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByKetKognitif($ketKognitif = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketKognitif)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketKognitif)) {
                $ketKognitif = str_replace('*', '%', $ketKognitif);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::KET_KOGNITIF, $ketKognitif, $comparison);
    }

    /**
     * Filter the query on the nilai_psim_angka column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiPsimAngka(1234); // WHERE nilai_psim_angka = 1234
     * $query->filterByNilaiPsimAngka(array(12, 34)); // WHERE nilai_psim_angka IN (12, 34)
     * $query->filterByNilaiPsimAngka(array('min' => 12)); // WHERE nilai_psim_angka >= 12
     * $query->filterByNilaiPsimAngka(array('max' => 12)); // WHERE nilai_psim_angka <= 12
     * </code>
     *
     * @param     mixed $nilaiPsimAngka The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByNilaiPsimAngka($nilaiPsimAngka = null, $comparison = null)
    {
        if (is_array($nilaiPsimAngka)) {
            $useMinMax = false;
            if (isset($nilaiPsimAngka['min'])) {
                $this->addUsingAlias(NilaiRaporPeer::NILAI_PSIM_ANGKA, $nilaiPsimAngka['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilaiPsimAngka['max'])) {
                $this->addUsingAlias(NilaiRaporPeer::NILAI_PSIM_ANGKA, $nilaiPsimAngka['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::NILAI_PSIM_ANGKA, $nilaiPsimAngka, $comparison);
    }

    /**
     * Filter the query on the nilai_psim_huruf column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiPsimHuruf('fooValue');   // WHERE nilai_psim_huruf = 'fooValue'
     * $query->filterByNilaiPsimHuruf('%fooValue%'); // WHERE nilai_psim_huruf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nilaiPsimHuruf The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByNilaiPsimHuruf($nilaiPsimHuruf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nilaiPsimHuruf)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nilaiPsimHuruf)) {
                $nilaiPsimHuruf = str_replace('*', '%', $nilaiPsimHuruf);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::NILAI_PSIM_HURUF, $nilaiPsimHuruf, $comparison);
    }

    /**
     * Filter the query on the ket_psim column
     *
     * Example usage:
     * <code>
     * $query->filterByKetPsim('fooValue');   // WHERE ket_psim = 'fooValue'
     * $query->filterByKetPsim('%fooValue%'); // WHERE ket_psim LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketPsim The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByKetPsim($ketPsim = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketPsim)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketPsim)) {
                $ketPsim = str_replace('*', '%', $ketPsim);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::KET_PSIM, $ketPsim, $comparison);
    }

    /**
     * Filter the query on the nilai_afektif_angka column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiAfektifAngka(1234); // WHERE nilai_afektif_angka = 1234
     * $query->filterByNilaiAfektifAngka(array(12, 34)); // WHERE nilai_afektif_angka IN (12, 34)
     * $query->filterByNilaiAfektifAngka(array('min' => 12)); // WHERE nilai_afektif_angka >= 12
     * $query->filterByNilaiAfektifAngka(array('max' => 12)); // WHERE nilai_afektif_angka <= 12
     * </code>
     *
     * @param     mixed $nilaiAfektifAngka The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByNilaiAfektifAngka($nilaiAfektifAngka = null, $comparison = null)
    {
        if (is_array($nilaiAfektifAngka)) {
            $useMinMax = false;
            if (isset($nilaiAfektifAngka['min'])) {
                $this->addUsingAlias(NilaiRaporPeer::NILAI_AFEKTIF_ANGKA, $nilaiAfektifAngka['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilaiAfektifAngka['max'])) {
                $this->addUsingAlias(NilaiRaporPeer::NILAI_AFEKTIF_ANGKA, $nilaiAfektifAngka['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::NILAI_AFEKTIF_ANGKA, $nilaiAfektifAngka, $comparison);
    }

    /**
     * Filter the query on the nilai_afektif_huruf column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiAfektifHuruf('fooValue');   // WHERE nilai_afektif_huruf = 'fooValue'
     * $query->filterByNilaiAfektifHuruf('%fooValue%'); // WHERE nilai_afektif_huruf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nilaiAfektifHuruf The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByNilaiAfektifHuruf($nilaiAfektifHuruf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nilaiAfektifHuruf)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nilaiAfektifHuruf)) {
                $nilaiAfektifHuruf = str_replace('*', '%', $nilaiAfektifHuruf);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::NILAI_AFEKTIF_HURUF, $nilaiAfektifHuruf, $comparison);
    }

    /**
     * Filter the query on the ket_afektif column
     *
     * Example usage:
     * <code>
     * $query->filterByKetAfektif('fooValue');   // WHERE ket_afektif = 'fooValue'
     * $query->filterByKetAfektif('%fooValue%'); // WHERE ket_afektif LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketAfektif The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByKetAfektif($ketAfektif = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketAfektif)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketAfektif)) {
                $ketAfektif = str_replace('*', '%', $ketAfektif);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::KET_AFEKTIF, $ketAfektif, $comparison);
    }

    /**
     * Filter the query on the nilai_afektif2_angka column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiAfektif2Angka(1234); // WHERE nilai_afektif2_angka = 1234
     * $query->filterByNilaiAfektif2Angka(array(12, 34)); // WHERE nilai_afektif2_angka IN (12, 34)
     * $query->filterByNilaiAfektif2Angka(array('min' => 12)); // WHERE nilai_afektif2_angka >= 12
     * $query->filterByNilaiAfektif2Angka(array('max' => 12)); // WHERE nilai_afektif2_angka <= 12
     * </code>
     *
     * @param     mixed $nilaiAfektif2Angka The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByNilaiAfektif2Angka($nilaiAfektif2Angka = null, $comparison = null)
    {
        if (is_array($nilaiAfektif2Angka)) {
            $useMinMax = false;
            if (isset($nilaiAfektif2Angka['min'])) {
                $this->addUsingAlias(NilaiRaporPeer::NILAI_AFEKTIF2_ANGKA, $nilaiAfektif2Angka['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilaiAfektif2Angka['max'])) {
                $this->addUsingAlias(NilaiRaporPeer::NILAI_AFEKTIF2_ANGKA, $nilaiAfektif2Angka['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::NILAI_AFEKTIF2_ANGKA, $nilaiAfektif2Angka, $comparison);
    }

    /**
     * Filter the query on the nilai_afektif2_huruf column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiAfektif2Huruf('fooValue');   // WHERE nilai_afektif2_huruf = 'fooValue'
     * $query->filterByNilaiAfektif2Huruf('%fooValue%'); // WHERE nilai_afektif2_huruf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nilaiAfektif2Huruf The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByNilaiAfektif2Huruf($nilaiAfektif2Huruf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nilaiAfektif2Huruf)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nilaiAfektif2Huruf)) {
                $nilaiAfektif2Huruf = str_replace('*', '%', $nilaiAfektif2Huruf);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::NILAI_AFEKTIF2_HURUF, $nilaiAfektif2Huruf, $comparison);
    }

    /**
     * Filter the query on the ket_afektif2 column
     *
     * Example usage:
     * <code>
     * $query->filterByKetAfektif2('fooValue');   // WHERE ket_afektif2 = 'fooValue'
     * $query->filterByKetAfektif2('%fooValue%'); // WHERE ket_afektif2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketAfektif2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByKetAfektif2($ketAfektif2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketAfektif2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketAfektif2)) {
                $ketAfektif2 = str_replace('*', '%', $ketAfektif2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::KET_AFEKTIF2, $ketAfektif2, $comparison);
    }

    /**
     * Filter the query on the a_beku column
     *
     * Example usage:
     * <code>
     * $query->filterByABeku(1234); // WHERE a_beku = 1234
     * $query->filterByABeku(array(12, 34)); // WHERE a_beku IN (12, 34)
     * $query->filterByABeku(array('min' => 12)); // WHERE a_beku >= 12
     * $query->filterByABeku(array('max' => 12)); // WHERE a_beku <= 12
     * </code>
     *
     * @param     mixed $aBeku The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByABeku($aBeku = null, $comparison = null)
    {
        if (is_array($aBeku)) {
            $useMinMax = false;
            if (isset($aBeku['min'])) {
                $this->addUsingAlias(NilaiRaporPeer::A_BEKU, $aBeku['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aBeku['max'])) {
                $this->addUsingAlias(NilaiRaporPeer::A_BEKU, $aBeku['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::A_BEKU, $aBeku, $comparison);
    }

    /**
     * Filter the query on the rapor_ke column
     *
     * Example usage:
     * <code>
     * $query->filterByRaporKe(1234); // WHERE rapor_ke = 1234
     * $query->filterByRaporKe(array(12, 34)); // WHERE rapor_ke IN (12, 34)
     * $query->filterByRaporKe(array('min' => 12)); // WHERE rapor_ke >= 12
     * $query->filterByRaporKe(array('max' => 12)); // WHERE rapor_ke <= 12
     * </code>
     *
     * @param     mixed $raporKe The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByRaporKe($raporKe = null, $comparison = null)
    {
        if (is_array($raporKe)) {
            $useMinMax = false;
            if (isset($raporKe['min'])) {
                $this->addUsingAlias(NilaiRaporPeer::RAPOR_KE, $raporKe['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($raporKe['max'])) {
                $this->addUsingAlias(NilaiRaporPeer::RAPOR_KE, $raporKe['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::RAPOR_KE, $raporKe, $comparison);
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
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(NilaiRaporPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(NilaiRaporPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(NilaiRaporPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(NilaiRaporPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(NilaiRaporPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(NilaiRaporPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(NilaiRaporPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(NilaiRaporPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiRaporPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return NilaiRaporQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NilaiRaporPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related MatevRapor object
     *
     * @param   MatevRapor|PropelObjectCollection $matevRapor The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 NilaiRaporQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMatevRapor($matevRapor, $comparison = null)
    {
        if ($matevRapor instanceof MatevRapor) {
            return $this
                ->addUsingAlias(NilaiRaporPeer::ID_EVALUASI, $matevRapor->getIdEvaluasi(), $comparison);
        } elseif ($matevRapor instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NilaiRaporPeer::ID_EVALUASI, $matevRapor->toKeyValue('PrimaryKey', 'IdEvaluasi'), $comparison);
        } else {
            throw new PropelException('filterByMatevRapor() only accepts arguments of type MatevRapor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MatevRapor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function joinMatevRapor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MatevRapor');

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
            $this->addJoinObject($join, 'MatevRapor');
        }

        return $this;
    }

    /**
     * Use the MatevRapor relation MatevRapor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MatevRaporQuery A secondary query class using the current class as primary query
     */
    public function useMatevRaporQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMatevRapor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MatevRapor', '\DataDikdas\Model\MatevRaporQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   NilaiRapor $nilaiRapor Object to remove from the list of results
     *
     * @return NilaiRaporQuery The current query, for fluid interface
     */
    public function prune($nilaiRapor = null)
    {
        if ($nilaiRapor) {
            $this->addUsingAlias(NilaiRaporPeer::NILAI_ID, $nilaiRapor->getNilaiId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
