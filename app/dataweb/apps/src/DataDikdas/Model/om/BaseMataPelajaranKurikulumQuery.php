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
use DataDikdas\Model\GroupMatpel;
use DataDikdas\Model\Kurikulum;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\MataPelajaranKurikulum;
use DataDikdas\Model\MataPelajaranKurikulumPeer;
use DataDikdas\Model\MataPelajaranKurikulumQuery;
use DataDikdas\Model\TingkatPendidikan;

/**
 * Base class that represents a query for the 'ref.mata_pelajaran_kurikulum' table.
 *
 * 
 *
 * @method MataPelajaranKurikulumQuery orderByKurikulumId($order = Criteria::ASC) Order by the kurikulum_id column
 * @method MataPelajaranKurikulumQuery orderByMataPelajaranId($order = Criteria::ASC) Order by the mata_pelajaran_id column
 * @method MataPelajaranKurikulumQuery orderByTingkatPendidikanId($order = Criteria::ASC) Order by the tingkat_pendidikan_id column
 * @method MataPelajaranKurikulumQuery orderByJumlahJam($order = Criteria::ASC) Order by the jumlah_jam column
 * @method MataPelajaranKurikulumQuery orderByJumlahJamMaksimum($order = Criteria::ASC) Order by the jumlah_jam_maksimum column
 * @method MataPelajaranKurikulumQuery orderByWajib($order = Criteria::ASC) Order by the wajib column
 * @method MataPelajaranKurikulumQuery orderBySks($order = Criteria::ASC) Order by the sks column
 * @method MataPelajaranKurikulumQuery orderByAPeminatan($order = Criteria::ASC) Order by the a_peminatan column
 * @method MataPelajaranKurikulumQuery orderByAreaKompetensi($order = Criteria::ASC) Order by the area_kompetensi column
 * @method MataPelajaranKurikulumQuery orderByGmpId($order = Criteria::ASC) Order by the gmp_id column
 * @method MataPelajaranKurikulumQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method MataPelajaranKurikulumQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method MataPelajaranKurikulumQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method MataPelajaranKurikulumQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method MataPelajaranKurikulumQuery groupByKurikulumId() Group by the kurikulum_id column
 * @method MataPelajaranKurikulumQuery groupByMataPelajaranId() Group by the mata_pelajaran_id column
 * @method MataPelajaranKurikulumQuery groupByTingkatPendidikanId() Group by the tingkat_pendidikan_id column
 * @method MataPelajaranKurikulumQuery groupByJumlahJam() Group by the jumlah_jam column
 * @method MataPelajaranKurikulumQuery groupByJumlahJamMaksimum() Group by the jumlah_jam_maksimum column
 * @method MataPelajaranKurikulumQuery groupByWajib() Group by the wajib column
 * @method MataPelajaranKurikulumQuery groupBySks() Group by the sks column
 * @method MataPelajaranKurikulumQuery groupByAPeminatan() Group by the a_peminatan column
 * @method MataPelajaranKurikulumQuery groupByAreaKompetensi() Group by the area_kompetensi column
 * @method MataPelajaranKurikulumQuery groupByGmpId() Group by the gmp_id column
 * @method MataPelajaranKurikulumQuery groupByCreateDate() Group by the create_date column
 * @method MataPelajaranKurikulumQuery groupByLastUpdate() Group by the last_update column
 * @method MataPelajaranKurikulumQuery groupByExpiredDate() Group by the expired_date column
 * @method MataPelajaranKurikulumQuery groupByLastSync() Group by the last_sync column
 *
 * @method MataPelajaranKurikulumQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MataPelajaranKurikulumQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MataPelajaranKurikulumQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MataPelajaranKurikulumQuery leftJoinGroupMatpel($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupMatpel relation
 * @method MataPelajaranKurikulumQuery rightJoinGroupMatpel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupMatpel relation
 * @method MataPelajaranKurikulumQuery innerJoinGroupMatpel($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupMatpel relation
 *
 * @method MataPelajaranKurikulumQuery leftJoinKurikulum($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kurikulum relation
 * @method MataPelajaranKurikulumQuery rightJoinKurikulum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kurikulum relation
 * @method MataPelajaranKurikulumQuery innerJoinKurikulum($relationAlias = null) Adds a INNER JOIN clause to the query using the Kurikulum relation
 *
 * @method MataPelajaranKurikulumQuery leftJoinMataPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaran relation
 * @method MataPelajaranKurikulumQuery rightJoinMataPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaran relation
 * @method MataPelajaranKurikulumQuery innerJoinMataPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaran relation
 *
 * @method MataPelajaranKurikulumQuery leftJoinTingkatPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TingkatPendidikan relation
 * @method MataPelajaranKurikulumQuery rightJoinTingkatPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TingkatPendidikan relation
 * @method MataPelajaranKurikulumQuery innerJoinTingkatPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the TingkatPendidikan relation
 *
 * @method MataPelajaranKurikulum findOne(PropelPDO $con = null) Return the first MataPelajaranKurikulum matching the query
 * @method MataPelajaranKurikulum findOneOrCreate(PropelPDO $con = null) Return the first MataPelajaranKurikulum matching the query, or a new MataPelajaranKurikulum object populated from the query conditions when no match is found
 *
 * @method MataPelajaranKurikulum findOneByKurikulumId(int $kurikulum_id) Return the first MataPelajaranKurikulum filtered by the kurikulum_id column
 * @method MataPelajaranKurikulum findOneByMataPelajaranId(int $mata_pelajaran_id) Return the first MataPelajaranKurikulum filtered by the mata_pelajaran_id column
 * @method MataPelajaranKurikulum findOneByTingkatPendidikanId(string $tingkat_pendidikan_id) Return the first MataPelajaranKurikulum filtered by the tingkat_pendidikan_id column
 * @method MataPelajaranKurikulum findOneByJumlahJam(string $jumlah_jam) Return the first MataPelajaranKurikulum filtered by the jumlah_jam column
 * @method MataPelajaranKurikulum findOneByJumlahJamMaksimum(string $jumlah_jam_maksimum) Return the first MataPelajaranKurikulum filtered by the jumlah_jam_maksimum column
 * @method MataPelajaranKurikulum findOneByWajib(string $wajib) Return the first MataPelajaranKurikulum filtered by the wajib column
 * @method MataPelajaranKurikulum findOneBySks(string $sks) Return the first MataPelajaranKurikulum filtered by the sks column
 * @method MataPelajaranKurikulum findOneByAPeminatan(string $a_peminatan) Return the first MataPelajaranKurikulum filtered by the a_peminatan column
 * @method MataPelajaranKurikulum findOneByAreaKompetensi(string $area_kompetensi) Return the first MataPelajaranKurikulum filtered by the area_kompetensi column
 * @method MataPelajaranKurikulum findOneByGmpId(string $gmp_id) Return the first MataPelajaranKurikulum filtered by the gmp_id column
 * @method MataPelajaranKurikulum findOneByCreateDate(string $create_date) Return the first MataPelajaranKurikulum filtered by the create_date column
 * @method MataPelajaranKurikulum findOneByLastUpdate(string $last_update) Return the first MataPelajaranKurikulum filtered by the last_update column
 * @method MataPelajaranKurikulum findOneByExpiredDate(string $expired_date) Return the first MataPelajaranKurikulum filtered by the expired_date column
 * @method MataPelajaranKurikulum findOneByLastSync(string $last_sync) Return the first MataPelajaranKurikulum filtered by the last_sync column
 *
 * @method array findByKurikulumId(int $kurikulum_id) Return MataPelajaranKurikulum objects filtered by the kurikulum_id column
 * @method array findByMataPelajaranId(int $mata_pelajaran_id) Return MataPelajaranKurikulum objects filtered by the mata_pelajaran_id column
 * @method array findByTingkatPendidikanId(string $tingkat_pendidikan_id) Return MataPelajaranKurikulum objects filtered by the tingkat_pendidikan_id column
 * @method array findByJumlahJam(string $jumlah_jam) Return MataPelajaranKurikulum objects filtered by the jumlah_jam column
 * @method array findByJumlahJamMaksimum(string $jumlah_jam_maksimum) Return MataPelajaranKurikulum objects filtered by the jumlah_jam_maksimum column
 * @method array findByWajib(string $wajib) Return MataPelajaranKurikulum objects filtered by the wajib column
 * @method array findBySks(string $sks) Return MataPelajaranKurikulum objects filtered by the sks column
 * @method array findByAPeminatan(string $a_peminatan) Return MataPelajaranKurikulum objects filtered by the a_peminatan column
 * @method array findByAreaKompetensi(string $area_kompetensi) Return MataPelajaranKurikulum objects filtered by the area_kompetensi column
 * @method array findByGmpId(string $gmp_id) Return MataPelajaranKurikulum objects filtered by the gmp_id column
 * @method array findByCreateDate(string $create_date) Return MataPelajaranKurikulum objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return MataPelajaranKurikulum objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return MataPelajaranKurikulum objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return MataPelajaranKurikulum objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMataPelajaranKurikulumQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMataPelajaranKurikulumQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\MataPelajaranKurikulum', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MataPelajaranKurikulumQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MataPelajaranKurikulumQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MataPelajaranKurikulumQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MataPelajaranKurikulumQuery) {
            return $criteria;
        }
        $query = new MataPelajaranKurikulumQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$kurikulum_id, $mata_pelajaran_id, $tingkat_pendidikan_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   MataPelajaranKurikulum|MataPelajaranKurikulum[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MataPelajaranKurikulumPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MataPelajaranKurikulumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MataPelajaranKurikulum A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "kurikulum_id", "mata_pelajaran_id", "tingkat_pendidikan_id", "jumlah_jam", "jumlah_jam_maksimum", "wajib", "sks", "a_peminatan", "area_kompetensi", "gmp_id", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."mata_pelajaran_kurikulum" WHERE "kurikulum_id" = :p0 AND "mata_pelajaran_id" = :p1 AND "tingkat_pendidikan_id" = :p2';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);			
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new MataPelajaranKurikulum();
            $obj->hydrate($row);
            MataPelajaranKurikulumPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
     * @return MataPelajaranKurikulum|MataPelajaranKurikulum[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|MataPelajaranKurikulum[]|mixed the list of results, formatted by the current formatter
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
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(MataPelajaranKurikulumPeer::KURIKULUM_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(MataPelajaranKurikulumPeer::MATA_PELAJARAN_ID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(MataPelajaranKurikulumPeer::TINGKAT_PENDIDIKAN_ID, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(MataPelajaranKurikulumPeer::KURIKULUM_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(MataPelajaranKurikulumPeer::MATA_PELAJARAN_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(MataPelajaranKurikulumPeer::TINGKAT_PENDIDIKAN_ID, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the kurikulum_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKurikulumId(1234); // WHERE kurikulum_id = 1234
     * $query->filterByKurikulumId(array(12, 34)); // WHERE kurikulum_id IN (12, 34)
     * $query->filterByKurikulumId(array('min' => 12)); // WHERE kurikulum_id >= 12
     * $query->filterByKurikulumId(array('max' => 12)); // WHERE kurikulum_id <= 12
     * </code>
     *
     * @see       filterByKurikulum()
     *
     * @param     mixed $kurikulumId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByKurikulumId($kurikulumId = null, $comparison = null)
    {
        if (is_array($kurikulumId)) {
            $useMinMax = false;
            if (isset($kurikulumId['min'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::KURIKULUM_ID, $kurikulumId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kurikulumId['max'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::KURIKULUM_ID, $kurikulumId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::KURIKULUM_ID, $kurikulumId, $comparison);
    }

    /**
     * Filter the query on the mata_pelajaran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMataPelajaranId(1234); // WHERE mata_pelajaran_id = 1234
     * $query->filterByMataPelajaranId(array(12, 34)); // WHERE mata_pelajaran_id IN (12, 34)
     * $query->filterByMataPelajaranId(array('min' => 12)); // WHERE mata_pelajaran_id >= 12
     * $query->filterByMataPelajaranId(array('max' => 12)); // WHERE mata_pelajaran_id <= 12
     * </code>
     *
     * @see       filterByMataPelajaran()
     *
     * @param     mixed $mataPelajaranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByMataPelajaranId($mataPelajaranId = null, $comparison = null)
    {
        if (is_array($mataPelajaranId)) {
            $useMinMax = false;
            if (isset($mataPelajaranId['min'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::MATA_PELAJARAN_ID, $mataPelajaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mataPelajaranId['max'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::MATA_PELAJARAN_ID, $mataPelajaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::MATA_PELAJARAN_ID, $mataPelajaranId, $comparison);
    }

    /**
     * Filter the query on the tingkat_pendidikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTingkatPendidikanId(1234); // WHERE tingkat_pendidikan_id = 1234
     * $query->filterByTingkatPendidikanId(array(12, 34)); // WHERE tingkat_pendidikan_id IN (12, 34)
     * $query->filterByTingkatPendidikanId(array('min' => 12)); // WHERE tingkat_pendidikan_id >= 12
     * $query->filterByTingkatPendidikanId(array('max' => 12)); // WHERE tingkat_pendidikan_id <= 12
     * </code>
     *
     * @see       filterByTingkatPendidikan()
     *
     * @param     mixed $tingkatPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByTingkatPendidikanId($tingkatPendidikanId = null, $comparison = null)
    {
        if (is_array($tingkatPendidikanId)) {
            $useMinMax = false;
            if (isset($tingkatPendidikanId['min'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tingkatPendidikanId['max'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId, $comparison);
    }

    /**
     * Filter the query on the jumlah_jam column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlahJam(1234); // WHERE jumlah_jam = 1234
     * $query->filterByJumlahJam(array(12, 34)); // WHERE jumlah_jam IN (12, 34)
     * $query->filterByJumlahJam(array('min' => 12)); // WHERE jumlah_jam >= 12
     * $query->filterByJumlahJam(array('max' => 12)); // WHERE jumlah_jam <= 12
     * </code>
     *
     * @param     mixed $jumlahJam The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByJumlahJam($jumlahJam = null, $comparison = null)
    {
        if (is_array($jumlahJam)) {
            $useMinMax = false;
            if (isset($jumlahJam['min'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::JUMLAH_JAM, $jumlahJam['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlahJam['max'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::JUMLAH_JAM, $jumlahJam['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::JUMLAH_JAM, $jumlahJam, $comparison);
    }

    /**
     * Filter the query on the jumlah_jam_maksimum column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlahJamMaksimum(1234); // WHERE jumlah_jam_maksimum = 1234
     * $query->filterByJumlahJamMaksimum(array(12, 34)); // WHERE jumlah_jam_maksimum IN (12, 34)
     * $query->filterByJumlahJamMaksimum(array('min' => 12)); // WHERE jumlah_jam_maksimum >= 12
     * $query->filterByJumlahJamMaksimum(array('max' => 12)); // WHERE jumlah_jam_maksimum <= 12
     * </code>
     *
     * @param     mixed $jumlahJamMaksimum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByJumlahJamMaksimum($jumlahJamMaksimum = null, $comparison = null)
    {
        if (is_array($jumlahJamMaksimum)) {
            $useMinMax = false;
            if (isset($jumlahJamMaksimum['min'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::JUMLAH_JAM_MAKSIMUM, $jumlahJamMaksimum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlahJamMaksimum['max'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::JUMLAH_JAM_MAKSIMUM, $jumlahJamMaksimum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::JUMLAH_JAM_MAKSIMUM, $jumlahJamMaksimum, $comparison);
    }

    /**
     * Filter the query on the wajib column
     *
     * Example usage:
     * <code>
     * $query->filterByWajib(1234); // WHERE wajib = 1234
     * $query->filterByWajib(array(12, 34)); // WHERE wajib IN (12, 34)
     * $query->filterByWajib(array('min' => 12)); // WHERE wajib >= 12
     * $query->filterByWajib(array('max' => 12)); // WHERE wajib <= 12
     * </code>
     *
     * @param     mixed $wajib The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByWajib($wajib = null, $comparison = null)
    {
        if (is_array($wajib)) {
            $useMinMax = false;
            if (isset($wajib['min'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::WAJIB, $wajib['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wajib['max'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::WAJIB, $wajib['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::WAJIB, $wajib, $comparison);
    }

    /**
     * Filter the query on the sks column
     *
     * Example usage:
     * <code>
     * $query->filterBySks(1234); // WHERE sks = 1234
     * $query->filterBySks(array(12, 34)); // WHERE sks IN (12, 34)
     * $query->filterBySks(array('min' => 12)); // WHERE sks >= 12
     * $query->filterBySks(array('max' => 12)); // WHERE sks <= 12
     * </code>
     *
     * @param     mixed $sks The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterBySks($sks = null, $comparison = null)
    {
        if (is_array($sks)) {
            $useMinMax = false;
            if (isset($sks['min'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::SKS, $sks['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sks['max'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::SKS, $sks['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::SKS, $sks, $comparison);
    }

    /**
     * Filter the query on the a_peminatan column
     *
     * Example usage:
     * <code>
     * $query->filterByAPeminatan(1234); // WHERE a_peminatan = 1234
     * $query->filterByAPeminatan(array(12, 34)); // WHERE a_peminatan IN (12, 34)
     * $query->filterByAPeminatan(array('min' => 12)); // WHERE a_peminatan >= 12
     * $query->filterByAPeminatan(array('max' => 12)); // WHERE a_peminatan <= 12
     * </code>
     *
     * @param     mixed $aPeminatan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByAPeminatan($aPeminatan = null, $comparison = null)
    {
        if (is_array($aPeminatan)) {
            $useMinMax = false;
            if (isset($aPeminatan['min'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::A_PEMINATAN, $aPeminatan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aPeminatan['max'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::A_PEMINATAN, $aPeminatan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::A_PEMINATAN, $aPeminatan, $comparison);
    }

    /**
     * Filter the query on the area_kompetensi column
     *
     * Example usage:
     * <code>
     * $query->filterByAreaKompetensi('fooValue');   // WHERE area_kompetensi = 'fooValue'
     * $query->filterByAreaKompetensi('%fooValue%'); // WHERE area_kompetensi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $areaKompetensi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByAreaKompetensi($areaKompetensi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($areaKompetensi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $areaKompetensi)) {
                $areaKompetensi = str_replace('*', '%', $areaKompetensi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::AREA_KOMPETENSI, $areaKompetensi, $comparison);
    }

    /**
     * Filter the query on the gmp_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGmpId('fooValue');   // WHERE gmp_id = 'fooValue'
     * $query->filterByGmpId('%fooValue%'); // WHERE gmp_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gmpId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByGmpId($gmpId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gmpId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $gmpId)) {
                $gmpId = str_replace('*', '%', $gmpId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::GMP_ID, $gmpId, $comparison);
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
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the expired_date column
     *
     * Example usage:
     * <code>
     * $query->filterByExpiredDate('2011-03-14'); // WHERE expired_date = '2011-03-14'
     * $query->filterByExpiredDate('now'); // WHERE expired_date = '2011-03-14'
     * $query->filterByExpiredDate(array('max' => 'yesterday')); // WHERE expired_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $expiredDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(MataPelajaranKurikulumPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MataPelajaranKurikulumPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related GroupMatpel object
     *
     * @param   GroupMatpel|PropelObjectCollection $groupMatpel The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranKurikulumQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGroupMatpel($groupMatpel, $comparison = null)
    {
        if ($groupMatpel instanceof GroupMatpel) {
            return $this
                ->addUsingAlias(MataPelajaranKurikulumPeer::GMP_ID, $groupMatpel->getGmpId(), $comparison);
        } elseif ($groupMatpel instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MataPelajaranKurikulumPeer::GMP_ID, $groupMatpel->toKeyValue('PrimaryKey', 'GmpId'), $comparison);
        } else {
            throw new PropelException('filterByGroupMatpel() only accepts arguments of type GroupMatpel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GroupMatpel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function joinGroupMatpel($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GroupMatpel');

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
            $this->addJoinObject($join, 'GroupMatpel');
        }

        return $this;
    }

    /**
     * Use the GroupMatpel relation GroupMatpel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\GroupMatpelQuery A secondary query class using the current class as primary query
     */
    public function useGroupMatpelQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinGroupMatpel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GroupMatpel', '\DataDikdas\Model\GroupMatpelQuery');
    }

    /**
     * Filter the query by a related Kurikulum object
     *
     * @param   Kurikulum|PropelObjectCollection $kurikulum The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranKurikulumQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKurikulum($kurikulum, $comparison = null)
    {
        if ($kurikulum instanceof Kurikulum) {
            return $this
                ->addUsingAlias(MataPelajaranKurikulumPeer::KURIKULUM_ID, $kurikulum->getKurikulumId(), $comparison);
        } elseif ($kurikulum instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MataPelajaranKurikulumPeer::KURIKULUM_ID, $kurikulum->toKeyValue('PrimaryKey', 'KurikulumId'), $comparison);
        } else {
            throw new PropelException('filterByKurikulum() only accepts arguments of type Kurikulum or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Kurikulum relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function joinKurikulum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Kurikulum');

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
            $this->addJoinObject($join, 'Kurikulum');
        }

        return $this;
    }

    /**
     * Use the Kurikulum relation Kurikulum object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KurikulumQuery A secondary query class using the current class as primary query
     */
    public function useKurikulumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKurikulum($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kurikulum', '\DataDikdas\Model\KurikulumQuery');
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranKurikulumQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaran($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(MataPelajaranKurikulumPeer::MATA_PELAJARAN_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MataPelajaranKurikulumPeer::MATA_PELAJARAN_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByMataPelajaran() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function joinMataPelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaran');

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
            $this->addJoinObject($join, 'MataPelajaran');
        }

        return $this;
    }

    /**
     * Use the MataPelajaran relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMataPelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaran', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related TingkatPendidikan object
     *
     * @param   TingkatPendidikan|PropelObjectCollection $tingkatPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MataPelajaranKurikulumQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTingkatPendidikan($tingkatPendidikan, $comparison = null)
    {
        if ($tingkatPendidikan instanceof TingkatPendidikan) {
            return $this
                ->addUsingAlias(MataPelajaranKurikulumPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->getTingkatPendidikanId(), $comparison);
        } elseif ($tingkatPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MataPelajaranKurikulumPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->toKeyValue('PrimaryKey', 'TingkatPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByTingkatPendidikan() only accepts arguments of type TingkatPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TingkatPendidikan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function joinTingkatPendidikan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TingkatPendidikan');

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
            $this->addJoinObject($join, 'TingkatPendidikan');
        }

        return $this;
    }

    /**
     * Use the TingkatPendidikan relation TingkatPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TingkatPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useTingkatPendidikanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTingkatPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TingkatPendidikan', '\DataDikdas\Model\TingkatPendidikanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   MataPelajaranKurikulum $mataPelajaranKurikulum Object to remove from the list of results
     *
     * @return MataPelajaranKurikulumQuery The current query, for fluid interface
     */
    public function prune($mataPelajaranKurikulum = null)
    {
        if ($mataPelajaranKurikulum) {
            $this->addCond('pruneCond0', $this->getAliasedColName(MataPelajaranKurikulumPeer::KURIKULUM_ID), $mataPelajaranKurikulum->getKurikulumId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(MataPelajaranKurikulumPeer::MATA_PELAJARAN_ID), $mataPelajaranKurikulum->getMataPelajaranId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(MataPelajaranKurikulumPeer::TINGKAT_PENDIDIKAN_ID), $mataPelajaranKurikulum->getTingkatPendidikanId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
