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
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikLongitudinal;
use DataDikdas\Model\PesertaDidikLongitudinalPeer;
use DataDikdas\Model\PesertaDidikLongitudinalQuery;
use DataDikdas\Model\Semester;
use DataDikdas\Model\VldPdLong;

/**
 * Base class that represents a query for the 'peserta_didik_longitudinal' table.
 *
 * 
 *
 * @method PesertaDidikLongitudinalQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method PesertaDidikLongitudinalQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method PesertaDidikLongitudinalQuery orderByTinggiBadan($order = Criteria::ASC) Order by the tinggi_badan column
 * @method PesertaDidikLongitudinalQuery orderByBeratBadan($order = Criteria::ASC) Order by the berat_badan column
 * @method PesertaDidikLongitudinalQuery orderByLingkarKepala($order = Criteria::ASC) Order by the lingkar_kepala column
 * @method PesertaDidikLongitudinalQuery orderByJarakRumahKeSekolah($order = Criteria::ASC) Order by the jarak_rumah_ke_sekolah column
 * @method PesertaDidikLongitudinalQuery orderByJarakRumahKeSekolahKm($order = Criteria::ASC) Order by the jarak_rumah_ke_sekolah_km column
 * @method PesertaDidikLongitudinalQuery orderByWaktuTempuhKeSekolah($order = Criteria::ASC) Order by the waktu_tempuh_ke_sekolah column
 * @method PesertaDidikLongitudinalQuery orderByMenitTempuhKeSekolah($order = Criteria::ASC) Order by the menit_tempuh_ke_sekolah column
 * @method PesertaDidikLongitudinalQuery orderByJumlahSaudaraKandung($order = Criteria::ASC) Order by the jumlah_saudara_kandung column
 * @method PesertaDidikLongitudinalQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PesertaDidikLongitudinalQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PesertaDidikLongitudinalQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method PesertaDidikLongitudinalQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PesertaDidikLongitudinalQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method PesertaDidikLongitudinalQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method PesertaDidikLongitudinalQuery groupBySemesterId() Group by the semester_id column
 * @method PesertaDidikLongitudinalQuery groupByTinggiBadan() Group by the tinggi_badan column
 * @method PesertaDidikLongitudinalQuery groupByBeratBadan() Group by the berat_badan column
 * @method PesertaDidikLongitudinalQuery groupByLingkarKepala() Group by the lingkar_kepala column
 * @method PesertaDidikLongitudinalQuery groupByJarakRumahKeSekolah() Group by the jarak_rumah_ke_sekolah column
 * @method PesertaDidikLongitudinalQuery groupByJarakRumahKeSekolahKm() Group by the jarak_rumah_ke_sekolah_km column
 * @method PesertaDidikLongitudinalQuery groupByWaktuTempuhKeSekolah() Group by the waktu_tempuh_ke_sekolah column
 * @method PesertaDidikLongitudinalQuery groupByMenitTempuhKeSekolah() Group by the menit_tempuh_ke_sekolah column
 * @method PesertaDidikLongitudinalQuery groupByJumlahSaudaraKandung() Group by the jumlah_saudara_kandung column
 * @method PesertaDidikLongitudinalQuery groupByCreateDate() Group by the create_date column
 * @method PesertaDidikLongitudinalQuery groupByLastUpdate() Group by the last_update column
 * @method PesertaDidikLongitudinalQuery groupBySoftDelete() Group by the soft_delete column
 * @method PesertaDidikLongitudinalQuery groupByLastSync() Group by the last_sync column
 * @method PesertaDidikLongitudinalQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method PesertaDidikLongitudinalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PesertaDidikLongitudinalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PesertaDidikLongitudinalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PesertaDidikLongitudinalQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method PesertaDidikLongitudinalQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method PesertaDidikLongitudinalQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method PesertaDidikLongitudinalQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method PesertaDidikLongitudinalQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method PesertaDidikLongitudinalQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method PesertaDidikLongitudinalQuery leftJoinVldPdLong($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPdLong relation
 * @method PesertaDidikLongitudinalQuery rightJoinVldPdLong($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPdLong relation
 * @method PesertaDidikLongitudinalQuery innerJoinVldPdLong($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPdLong relation
 *
 * @method PesertaDidikLongitudinal findOne(PropelPDO $con = null) Return the first PesertaDidikLongitudinal matching the query
 * @method PesertaDidikLongitudinal findOneOrCreate(PropelPDO $con = null) Return the first PesertaDidikLongitudinal matching the query, or a new PesertaDidikLongitudinal object populated from the query conditions when no match is found
 *
 * @method PesertaDidikLongitudinal findOneByPesertaDidikId(string $peserta_didik_id) Return the first PesertaDidikLongitudinal filtered by the peserta_didik_id column
 * @method PesertaDidikLongitudinal findOneBySemesterId(string $semester_id) Return the first PesertaDidikLongitudinal filtered by the semester_id column
 * @method PesertaDidikLongitudinal findOneByTinggiBadan(string $tinggi_badan) Return the first PesertaDidikLongitudinal filtered by the tinggi_badan column
 * @method PesertaDidikLongitudinal findOneByBeratBadan(string $berat_badan) Return the first PesertaDidikLongitudinal filtered by the berat_badan column
 * @method PesertaDidikLongitudinal findOneByLingkarKepala(string $lingkar_kepala) Return the first PesertaDidikLongitudinal filtered by the lingkar_kepala column
 * @method PesertaDidikLongitudinal findOneByJarakRumahKeSekolah(string $jarak_rumah_ke_sekolah) Return the first PesertaDidikLongitudinal filtered by the jarak_rumah_ke_sekolah column
 * @method PesertaDidikLongitudinal findOneByJarakRumahKeSekolahKm(string $jarak_rumah_ke_sekolah_km) Return the first PesertaDidikLongitudinal filtered by the jarak_rumah_ke_sekolah_km column
 * @method PesertaDidikLongitudinal findOneByWaktuTempuhKeSekolah(string $waktu_tempuh_ke_sekolah) Return the first PesertaDidikLongitudinal filtered by the waktu_tempuh_ke_sekolah column
 * @method PesertaDidikLongitudinal findOneByMenitTempuhKeSekolah(string $menit_tempuh_ke_sekolah) Return the first PesertaDidikLongitudinal filtered by the menit_tempuh_ke_sekolah column
 * @method PesertaDidikLongitudinal findOneByJumlahSaudaraKandung(string $jumlah_saudara_kandung) Return the first PesertaDidikLongitudinal filtered by the jumlah_saudara_kandung column
 * @method PesertaDidikLongitudinal findOneByCreateDate(string $create_date) Return the first PesertaDidikLongitudinal filtered by the create_date column
 * @method PesertaDidikLongitudinal findOneByLastUpdate(string $last_update) Return the first PesertaDidikLongitudinal filtered by the last_update column
 * @method PesertaDidikLongitudinal findOneBySoftDelete(string $soft_delete) Return the first PesertaDidikLongitudinal filtered by the soft_delete column
 * @method PesertaDidikLongitudinal findOneByLastSync(string $last_sync) Return the first PesertaDidikLongitudinal filtered by the last_sync column
 * @method PesertaDidikLongitudinal findOneByUpdaterId(string $updater_id) Return the first PesertaDidikLongitudinal filtered by the updater_id column
 *
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return PesertaDidikLongitudinal objects filtered by the peserta_didik_id column
 * @method array findBySemesterId(string $semester_id) Return PesertaDidikLongitudinal objects filtered by the semester_id column
 * @method array findByTinggiBadan(string $tinggi_badan) Return PesertaDidikLongitudinal objects filtered by the tinggi_badan column
 * @method array findByBeratBadan(string $berat_badan) Return PesertaDidikLongitudinal objects filtered by the berat_badan column
 * @method array findByLingkarKepala(string $lingkar_kepala) Return PesertaDidikLongitudinal objects filtered by the lingkar_kepala column
 * @method array findByJarakRumahKeSekolah(string $jarak_rumah_ke_sekolah) Return PesertaDidikLongitudinal objects filtered by the jarak_rumah_ke_sekolah column
 * @method array findByJarakRumahKeSekolahKm(string $jarak_rumah_ke_sekolah_km) Return PesertaDidikLongitudinal objects filtered by the jarak_rumah_ke_sekolah_km column
 * @method array findByWaktuTempuhKeSekolah(string $waktu_tempuh_ke_sekolah) Return PesertaDidikLongitudinal objects filtered by the waktu_tempuh_ke_sekolah column
 * @method array findByMenitTempuhKeSekolah(string $menit_tempuh_ke_sekolah) Return PesertaDidikLongitudinal objects filtered by the menit_tempuh_ke_sekolah column
 * @method array findByJumlahSaudaraKandung(string $jumlah_saudara_kandung) Return PesertaDidikLongitudinal objects filtered by the jumlah_saudara_kandung column
 * @method array findByCreateDate(string $create_date) Return PesertaDidikLongitudinal objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return PesertaDidikLongitudinal objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return PesertaDidikLongitudinal objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return PesertaDidikLongitudinal objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return PesertaDidikLongitudinal objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePesertaDidikLongitudinalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePesertaDidikLongitudinalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\PesertaDidikLongitudinal', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PesertaDidikLongitudinalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PesertaDidikLongitudinalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PesertaDidikLongitudinalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PesertaDidikLongitudinalQuery) {
            return $criteria;
        }
        $query = new PesertaDidikLongitudinalQuery();
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
                         A Primary key composition: [$peserta_didik_id, $semester_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   PesertaDidikLongitudinal|PesertaDidikLongitudinal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PesertaDidikLongitudinalPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PesertaDidikLongitudinal A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "peserta_didik_id", "semester_id", "tinggi_badan", "berat_badan", "lingkar_kepala", "jarak_rumah_ke_sekolah", "jarak_rumah_ke_sekolah_km", "waktu_tempuh_ke_sekolah", "menit_tempuh_ke_sekolah", "jumlah_saudara_kandung", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "peserta_didik_longitudinal" WHERE "peserta_didik_id" = :p0 AND "semester_id" = :p1';
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
            $obj = new PesertaDidikLongitudinal();
            $obj->hydrate($row);
            PesertaDidikLongitudinalPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return PesertaDidikLongitudinal|PesertaDidikLongitudinal[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PesertaDidikLongitudinal[]|mixed the list of results, formatted by the current formatter
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
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PesertaDidikLongitudinalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PesertaDidikLongitudinalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the peserta_didik_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPesertaDidikId('fooValue');   // WHERE peserta_didik_id = 'fooValue'
     * $query->filterByPesertaDidikId('%fooValue%'); // WHERE peserta_didik_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pesertaDidikId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPesertaDidikId($pesertaDidikId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pesertaDidikId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pesertaDidikId)) {
                $pesertaDidikId = str_replace('*', '%', $pesertaDidikId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
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
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the tinggi_badan column
     *
     * Example usage:
     * <code>
     * $query->filterByTinggiBadan(1234); // WHERE tinggi_badan = 1234
     * $query->filterByTinggiBadan(array(12, 34)); // WHERE tinggi_badan IN (12, 34)
     * $query->filterByTinggiBadan(array('min' => 12)); // WHERE tinggi_badan >= 12
     * $query->filterByTinggiBadan(array('max' => 12)); // WHERE tinggi_badan <= 12
     * </code>
     *
     * @param     mixed $tinggiBadan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByTinggiBadan($tinggiBadan = null, $comparison = null)
    {
        if (is_array($tinggiBadan)) {
            $useMinMax = false;
            if (isset($tinggiBadan['min'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::TINGGI_BADAN, $tinggiBadan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tinggiBadan['max'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::TINGGI_BADAN, $tinggiBadan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::TINGGI_BADAN, $tinggiBadan, $comparison);
    }

    /**
     * Filter the query on the berat_badan column
     *
     * Example usage:
     * <code>
     * $query->filterByBeratBadan(1234); // WHERE berat_badan = 1234
     * $query->filterByBeratBadan(array(12, 34)); // WHERE berat_badan IN (12, 34)
     * $query->filterByBeratBadan(array('min' => 12)); // WHERE berat_badan >= 12
     * $query->filterByBeratBadan(array('max' => 12)); // WHERE berat_badan <= 12
     * </code>
     *
     * @param     mixed $beratBadan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByBeratBadan($beratBadan = null, $comparison = null)
    {
        if (is_array($beratBadan)) {
            $useMinMax = false;
            if (isset($beratBadan['min'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::BERAT_BADAN, $beratBadan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($beratBadan['max'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::BERAT_BADAN, $beratBadan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::BERAT_BADAN, $beratBadan, $comparison);
    }

    /**
     * Filter the query on the lingkar_kepala column
     *
     * Example usage:
     * <code>
     * $query->filterByLingkarKepala(1234); // WHERE lingkar_kepala = 1234
     * $query->filterByLingkarKepala(array(12, 34)); // WHERE lingkar_kepala IN (12, 34)
     * $query->filterByLingkarKepala(array('min' => 12)); // WHERE lingkar_kepala >= 12
     * $query->filterByLingkarKepala(array('max' => 12)); // WHERE lingkar_kepala <= 12
     * </code>
     *
     * @param     mixed $lingkarKepala The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLingkarKepala($lingkarKepala = null, $comparison = null)
    {
        if (is_array($lingkarKepala)) {
            $useMinMax = false;
            if (isset($lingkarKepala['min'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::LINGKAR_KEPALA, $lingkarKepala['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lingkarKepala['max'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::LINGKAR_KEPALA, $lingkarKepala['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::LINGKAR_KEPALA, $lingkarKepala, $comparison);
    }

    /**
     * Filter the query on the jarak_rumah_ke_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterByJarakRumahKeSekolah(1234); // WHERE jarak_rumah_ke_sekolah = 1234
     * $query->filterByJarakRumahKeSekolah(array(12, 34)); // WHERE jarak_rumah_ke_sekolah IN (12, 34)
     * $query->filterByJarakRumahKeSekolah(array('min' => 12)); // WHERE jarak_rumah_ke_sekolah >= 12
     * $query->filterByJarakRumahKeSekolah(array('max' => 12)); // WHERE jarak_rumah_ke_sekolah <= 12
     * </code>
     *
     * @param     mixed $jarakRumahKeSekolah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByJarakRumahKeSekolah($jarakRumahKeSekolah = null, $comparison = null)
    {
        if (is_array($jarakRumahKeSekolah)) {
            $useMinMax = false;
            if (isset($jarakRumahKeSekolah['min'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH, $jarakRumahKeSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jarakRumahKeSekolah['max'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH, $jarakRumahKeSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH, $jarakRumahKeSekolah, $comparison);
    }

    /**
     * Filter the query on the jarak_rumah_ke_sekolah_km column
     *
     * Example usage:
     * <code>
     * $query->filterByJarakRumahKeSekolahKm(1234); // WHERE jarak_rumah_ke_sekolah_km = 1234
     * $query->filterByJarakRumahKeSekolahKm(array(12, 34)); // WHERE jarak_rumah_ke_sekolah_km IN (12, 34)
     * $query->filterByJarakRumahKeSekolahKm(array('min' => 12)); // WHERE jarak_rumah_ke_sekolah_km >= 12
     * $query->filterByJarakRumahKeSekolahKm(array('max' => 12)); // WHERE jarak_rumah_ke_sekolah_km <= 12
     * </code>
     *
     * @param     mixed $jarakRumahKeSekolahKm The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByJarakRumahKeSekolahKm($jarakRumahKeSekolahKm = null, $comparison = null)
    {
        if (is_array($jarakRumahKeSekolahKm)) {
            $useMinMax = false;
            if (isset($jarakRumahKeSekolahKm['min'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH_KM, $jarakRumahKeSekolahKm['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jarakRumahKeSekolahKm['max'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH_KM, $jarakRumahKeSekolahKm['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::JARAK_RUMAH_KE_SEKOLAH_KM, $jarakRumahKeSekolahKm, $comparison);
    }

    /**
     * Filter the query on the waktu_tempuh_ke_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterByWaktuTempuhKeSekolah(1234); // WHERE waktu_tempuh_ke_sekolah = 1234
     * $query->filterByWaktuTempuhKeSekolah(array(12, 34)); // WHERE waktu_tempuh_ke_sekolah IN (12, 34)
     * $query->filterByWaktuTempuhKeSekolah(array('min' => 12)); // WHERE waktu_tempuh_ke_sekolah >= 12
     * $query->filterByWaktuTempuhKeSekolah(array('max' => 12)); // WHERE waktu_tempuh_ke_sekolah <= 12
     * </code>
     *
     * @param     mixed $waktuTempuhKeSekolah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByWaktuTempuhKeSekolah($waktuTempuhKeSekolah = null, $comparison = null)
    {
        if (is_array($waktuTempuhKeSekolah)) {
            $useMinMax = false;
            if (isset($waktuTempuhKeSekolah['min'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::WAKTU_TEMPUH_KE_SEKOLAH, $waktuTempuhKeSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($waktuTempuhKeSekolah['max'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::WAKTU_TEMPUH_KE_SEKOLAH, $waktuTempuhKeSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::WAKTU_TEMPUH_KE_SEKOLAH, $waktuTempuhKeSekolah, $comparison);
    }

    /**
     * Filter the query on the menit_tempuh_ke_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterByMenitTempuhKeSekolah(1234); // WHERE menit_tempuh_ke_sekolah = 1234
     * $query->filterByMenitTempuhKeSekolah(array(12, 34)); // WHERE menit_tempuh_ke_sekolah IN (12, 34)
     * $query->filterByMenitTempuhKeSekolah(array('min' => 12)); // WHERE menit_tempuh_ke_sekolah >= 12
     * $query->filterByMenitTempuhKeSekolah(array('max' => 12)); // WHERE menit_tempuh_ke_sekolah <= 12
     * </code>
     *
     * @param     mixed $menitTempuhKeSekolah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByMenitTempuhKeSekolah($menitTempuhKeSekolah = null, $comparison = null)
    {
        if (is_array($menitTempuhKeSekolah)) {
            $useMinMax = false;
            if (isset($menitTempuhKeSekolah['min'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::MENIT_TEMPUH_KE_SEKOLAH, $menitTempuhKeSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($menitTempuhKeSekolah['max'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::MENIT_TEMPUH_KE_SEKOLAH, $menitTempuhKeSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::MENIT_TEMPUH_KE_SEKOLAH, $menitTempuhKeSekolah, $comparison);
    }

    /**
     * Filter the query on the jumlah_saudara_kandung column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlahSaudaraKandung(1234); // WHERE jumlah_saudara_kandung = 1234
     * $query->filterByJumlahSaudaraKandung(array(12, 34)); // WHERE jumlah_saudara_kandung IN (12, 34)
     * $query->filterByJumlahSaudaraKandung(array('min' => 12)); // WHERE jumlah_saudara_kandung >= 12
     * $query->filterByJumlahSaudaraKandung(array('max' => 12)); // WHERE jumlah_saudara_kandung <= 12
     * </code>
     *
     * @param     mixed $jumlahSaudaraKandung The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByJumlahSaudaraKandung($jumlahSaudaraKandung = null, $comparison = null)
    {
        if (is_array($jumlahSaudaraKandung)) {
            $useMinMax = false;
            if (isset($jumlahSaudaraKandung['min'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::JUMLAH_SAUDARA_KANDUNG, $jumlahSaudaraKandung['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlahSaudaraKandung['max'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::JUMLAH_SAUDARA_KANDUNG, $jumlahSaudaraKandung['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::JUMLAH_SAUDARA_KANDUNG, $jumlahSaudaraKandung, $comparison);
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
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PesertaDidikLongitudinalPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikLongitudinalPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID, $pesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID, $pesertaDidik->toKeyValue('PrimaryKey', 'PesertaDidikId'), $comparison);
        } else {
            throw new PropelException('filterByPesertaDidik() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function joinPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidik');

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
            $this->addJoinObject($join, 'PesertaDidik');
        }

        return $this;
    }

    /**
     * Use the PesertaDidik relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidik', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(PesertaDidikLongitudinalPeer::SEMESTER_ID, $semester->getSemesterId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikLongitudinalPeer::SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'SemesterId'), $comparison);
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
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
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
     * Filter the query by a related VldPdLong object
     *
     * @param   VldPdLong|PropelObjectCollection $vldPdLong  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPdLong($vldPdLong, $comparison = null)
    {
        if ($vldPdLong instanceof VldPdLong) {
            return $this
                ->addUsingAlias(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID, $vldPdLong->getPesertaDidikId(), $comparison)
                ->addUsingAlias(PesertaDidikLongitudinalPeer::SEMESTER_ID, $vldPdLong->getSemesterId(), $comparison);
        } else {
            throw new PropelException('filterByVldPdLong() only accepts arguments of type VldPdLong');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPdLong relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function joinVldPdLong($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPdLong');

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
            $this->addJoinObject($join, 'VldPdLong');
        }

        return $this;
    }

    /**
     * Use the VldPdLong relation VldPdLong object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPdLongQuery A secondary query class using the current class as primary query
     */
    public function useVldPdLongQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPdLong($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPdLong', '\DataDikdas\Model\VldPdLongQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   PesertaDidikLongitudinal $pesertaDidikLongitudinal Object to remove from the list of results
     *
     * @return PesertaDidikLongitudinalQuery The current query, for fluid interface
     */
    public function prune($pesertaDidikLongitudinal = null)
    {
        if ($pesertaDidikLongitudinal) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PesertaDidikLongitudinalPeer::PESERTA_DIDIK_ID), $pesertaDidikLongitudinal->getPesertaDidikId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PesertaDidikLongitudinalPeer::SEMESTER_ID), $pesertaDidikLongitudinal->getSemesterId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
