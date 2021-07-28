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
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\Kompetensi;
use DataDikdas\Model\Kurikulum;
use DataDikdas\Model\KurikulumPeer;
use DataDikdas\Model\KurikulumQuery;
use DataDikdas\Model\MataPelajaranKurikulum;
use DataDikdas\Model\RombonganBelajar;

/**
 * Base class that represents a query for the 'ref.kurikulum' table.
 *
 * 
 *
 * @method KurikulumQuery orderByKurikulumId($order = Criteria::ASC) Order by the kurikulum_id column
 * @method KurikulumQuery orderByNamaKurikulum($order = Criteria::ASC) Order by the nama_kurikulum column
 * @method KurikulumQuery orderByMulaiBerlaku($order = Criteria::ASC) Order by the mulai_berlaku column
 * @method KurikulumQuery orderBySistemSks($order = Criteria::ASC) Order by the sistem_sks column
 * @method KurikulumQuery orderByTotalSks($order = Criteria::ASC) Order by the total_sks column
 * @method KurikulumQuery orderByJenjangPendidikanId($order = Criteria::ASC) Order by the jenjang_pendidikan_id column
 * @method KurikulumQuery orderByJurusanId($order = Criteria::ASC) Order by the jurusan_id column
 * @method KurikulumQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KurikulumQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KurikulumQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method KurikulumQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method KurikulumQuery groupByKurikulumId() Group by the kurikulum_id column
 * @method KurikulumQuery groupByNamaKurikulum() Group by the nama_kurikulum column
 * @method KurikulumQuery groupByMulaiBerlaku() Group by the mulai_berlaku column
 * @method KurikulumQuery groupBySistemSks() Group by the sistem_sks column
 * @method KurikulumQuery groupByTotalSks() Group by the total_sks column
 * @method KurikulumQuery groupByJenjangPendidikanId() Group by the jenjang_pendidikan_id column
 * @method KurikulumQuery groupByJurusanId() Group by the jurusan_id column
 * @method KurikulumQuery groupByCreateDate() Group by the create_date column
 * @method KurikulumQuery groupByLastUpdate() Group by the last_update column
 * @method KurikulumQuery groupByExpiredDate() Group by the expired_date column
 * @method KurikulumQuery groupByLastSync() Group by the last_sync column
 *
 * @method KurikulumQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KurikulumQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KurikulumQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KurikulumQuery leftJoinJenjangPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenjangPendidikan relation
 * @method KurikulumQuery rightJoinJenjangPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenjangPendidikan relation
 * @method KurikulumQuery innerJoinJenjangPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenjangPendidikan relation
 *
 * @method KurikulumQuery leftJoinJurusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Jurusan relation
 * @method KurikulumQuery rightJoinJurusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Jurusan relation
 * @method KurikulumQuery innerJoinJurusan($relationAlias = null) Adds a INNER JOIN clause to the query using the Jurusan relation
 *
 * @method KurikulumQuery leftJoinGroupMatpel($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupMatpel relation
 * @method KurikulumQuery rightJoinGroupMatpel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupMatpel relation
 * @method KurikulumQuery innerJoinGroupMatpel($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupMatpel relation
 *
 * @method KurikulumQuery leftJoinKompetensi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kompetensi relation
 * @method KurikulumQuery rightJoinKompetensi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kompetensi relation
 * @method KurikulumQuery innerJoinKompetensi($relationAlias = null) Adds a INNER JOIN clause to the query using the Kompetensi relation
 *
 * @method KurikulumQuery leftJoinMataPelajaranKurikulum($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaranKurikulum relation
 * @method KurikulumQuery rightJoinMataPelajaranKurikulum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaranKurikulum relation
 * @method KurikulumQuery innerJoinMataPelajaranKurikulum($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaranKurikulum relation
 *
 * @method KurikulumQuery leftJoinRombonganBelajar($relationAlias = null) Adds a LEFT JOIN clause to the query using the RombonganBelajar relation
 * @method KurikulumQuery rightJoinRombonganBelajar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RombonganBelajar relation
 * @method KurikulumQuery innerJoinRombonganBelajar($relationAlias = null) Adds a INNER JOIN clause to the query using the RombonganBelajar relation
 *
 * @method Kurikulum findOne(PropelPDO $con = null) Return the first Kurikulum matching the query
 * @method Kurikulum findOneOrCreate(PropelPDO $con = null) Return the first Kurikulum matching the query, or a new Kurikulum object populated from the query conditions when no match is found
 *
 * @method Kurikulum findOneByNamaKurikulum(string $nama_kurikulum) Return the first Kurikulum filtered by the nama_kurikulum column
 * @method Kurikulum findOneByMulaiBerlaku(string $mulai_berlaku) Return the first Kurikulum filtered by the mulai_berlaku column
 * @method Kurikulum findOneBySistemSks(string $sistem_sks) Return the first Kurikulum filtered by the sistem_sks column
 * @method Kurikulum findOneByTotalSks(string $total_sks) Return the first Kurikulum filtered by the total_sks column
 * @method Kurikulum findOneByJenjangPendidikanId(string $jenjang_pendidikan_id) Return the first Kurikulum filtered by the jenjang_pendidikan_id column
 * @method Kurikulum findOneByJurusanId(string $jurusan_id) Return the first Kurikulum filtered by the jurusan_id column
 * @method Kurikulum findOneByCreateDate(string $create_date) Return the first Kurikulum filtered by the create_date column
 * @method Kurikulum findOneByLastUpdate(string $last_update) Return the first Kurikulum filtered by the last_update column
 * @method Kurikulum findOneByExpiredDate(string $expired_date) Return the first Kurikulum filtered by the expired_date column
 * @method Kurikulum findOneByLastSync(string $last_sync) Return the first Kurikulum filtered by the last_sync column
 *
 * @method array findByKurikulumId(int $kurikulum_id) Return Kurikulum objects filtered by the kurikulum_id column
 * @method array findByNamaKurikulum(string $nama_kurikulum) Return Kurikulum objects filtered by the nama_kurikulum column
 * @method array findByMulaiBerlaku(string $mulai_berlaku) Return Kurikulum objects filtered by the mulai_berlaku column
 * @method array findBySistemSks(string $sistem_sks) Return Kurikulum objects filtered by the sistem_sks column
 * @method array findByTotalSks(string $total_sks) Return Kurikulum objects filtered by the total_sks column
 * @method array findByJenjangPendidikanId(string $jenjang_pendidikan_id) Return Kurikulum objects filtered by the jenjang_pendidikan_id column
 * @method array findByJurusanId(string $jurusan_id) Return Kurikulum objects filtered by the jurusan_id column
 * @method array findByCreateDate(string $create_date) Return Kurikulum objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Kurikulum objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Kurikulum objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Kurikulum objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKurikulumQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKurikulumQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Kurikulum', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KurikulumQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KurikulumQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KurikulumQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KurikulumQuery) {
            return $criteria;
        }
        $query = new KurikulumQuery();
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
     * @return   Kurikulum|Kurikulum[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KurikulumPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KurikulumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Kurikulum A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByKurikulumId($key, $con = null)
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
     * @return                 Kurikulum A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "kurikulum_id", "nama_kurikulum", "mulai_berlaku", "sistem_sks", "total_sks", "jenjang_pendidikan_id", "jurusan_id", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."kurikulum" WHERE "kurikulum_id" = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Kurikulum();
            $obj->hydrate($row);
            KurikulumPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Kurikulum|Kurikulum[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Kurikulum[]|mixed the list of results, formatted by the current formatter
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
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KurikulumPeer::KURIKULUM_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KurikulumPeer::KURIKULUM_ID, $keys, Criteria::IN);
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
     * @param     mixed $kurikulumId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterByKurikulumId($kurikulumId = null, $comparison = null)
    {
        if (is_array($kurikulumId)) {
            $useMinMax = false;
            if (isset($kurikulumId['min'])) {
                $this->addUsingAlias(KurikulumPeer::KURIKULUM_ID, $kurikulumId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kurikulumId['max'])) {
                $this->addUsingAlias(KurikulumPeer::KURIKULUM_ID, $kurikulumId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KurikulumPeer::KURIKULUM_ID, $kurikulumId, $comparison);
    }

    /**
     * Filter the query on the nama_kurikulum column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaKurikulum('fooValue');   // WHERE nama_kurikulum = 'fooValue'
     * $query->filterByNamaKurikulum('%fooValue%'); // WHERE nama_kurikulum LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaKurikulum The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterByNamaKurikulum($namaKurikulum = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaKurikulum)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaKurikulum)) {
                $namaKurikulum = str_replace('*', '%', $namaKurikulum);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KurikulumPeer::NAMA_KURIKULUM, $namaKurikulum, $comparison);
    }

    /**
     * Filter the query on the mulai_berlaku column
     *
     * Example usage:
     * <code>
     * $query->filterByMulaiBerlaku('2011-03-14'); // WHERE mulai_berlaku = '2011-03-14'
     * $query->filterByMulaiBerlaku('now'); // WHERE mulai_berlaku = '2011-03-14'
     * $query->filterByMulaiBerlaku(array('max' => 'yesterday')); // WHERE mulai_berlaku > '2011-03-13'
     * </code>
     *
     * @param     mixed $mulaiBerlaku The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterByMulaiBerlaku($mulaiBerlaku = null, $comparison = null)
    {
        if (is_array($mulaiBerlaku)) {
            $useMinMax = false;
            if (isset($mulaiBerlaku['min'])) {
                $this->addUsingAlias(KurikulumPeer::MULAI_BERLAKU, $mulaiBerlaku['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mulaiBerlaku['max'])) {
                $this->addUsingAlias(KurikulumPeer::MULAI_BERLAKU, $mulaiBerlaku['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KurikulumPeer::MULAI_BERLAKU, $mulaiBerlaku, $comparison);
    }

    /**
     * Filter the query on the sistem_sks column
     *
     * Example usage:
     * <code>
     * $query->filterBySistemSks(1234); // WHERE sistem_sks = 1234
     * $query->filterBySistemSks(array(12, 34)); // WHERE sistem_sks IN (12, 34)
     * $query->filterBySistemSks(array('min' => 12)); // WHERE sistem_sks >= 12
     * $query->filterBySistemSks(array('max' => 12)); // WHERE sistem_sks <= 12
     * </code>
     *
     * @param     mixed $sistemSks The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterBySistemSks($sistemSks = null, $comparison = null)
    {
        if (is_array($sistemSks)) {
            $useMinMax = false;
            if (isset($sistemSks['min'])) {
                $this->addUsingAlias(KurikulumPeer::SISTEM_SKS, $sistemSks['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sistemSks['max'])) {
                $this->addUsingAlias(KurikulumPeer::SISTEM_SKS, $sistemSks['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KurikulumPeer::SISTEM_SKS, $sistemSks, $comparison);
    }

    /**
     * Filter the query on the total_sks column
     *
     * Example usage:
     * <code>
     * $query->filterByTotalSks(1234); // WHERE total_sks = 1234
     * $query->filterByTotalSks(array(12, 34)); // WHERE total_sks IN (12, 34)
     * $query->filterByTotalSks(array('min' => 12)); // WHERE total_sks >= 12
     * $query->filterByTotalSks(array('max' => 12)); // WHERE total_sks <= 12
     * </code>
     *
     * @param     mixed $totalSks The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterByTotalSks($totalSks = null, $comparison = null)
    {
        if (is_array($totalSks)) {
            $useMinMax = false;
            if (isset($totalSks['min'])) {
                $this->addUsingAlias(KurikulumPeer::TOTAL_SKS, $totalSks['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($totalSks['max'])) {
                $this->addUsingAlias(KurikulumPeer::TOTAL_SKS, $totalSks['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KurikulumPeer::TOTAL_SKS, $totalSks, $comparison);
    }

    /**
     * Filter the query on the jenjang_pendidikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangPendidikanId(1234); // WHERE jenjang_pendidikan_id = 1234
     * $query->filterByJenjangPendidikanId(array(12, 34)); // WHERE jenjang_pendidikan_id IN (12, 34)
     * $query->filterByJenjangPendidikanId(array('min' => 12)); // WHERE jenjang_pendidikan_id >= 12
     * $query->filterByJenjangPendidikanId(array('max' => 12)); // WHERE jenjang_pendidikan_id <= 12
     * </code>
     *
     * @see       filterByJenjangPendidikan()
     *
     * @param     mixed $jenjangPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterByJenjangPendidikanId($jenjangPendidikanId = null, $comparison = null)
    {
        if (is_array($jenjangPendidikanId)) {
            $useMinMax = false;
            if (isset($jenjangPendidikanId['min'])) {
                $this->addUsingAlias(KurikulumPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPendidikanId['max'])) {
                $this->addUsingAlias(KurikulumPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KurikulumPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId, $comparison);
    }

    /**
     * Filter the query on the jurusan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJurusanId('fooValue');   // WHERE jurusan_id = 'fooValue'
     * $query->filterByJurusanId('%fooValue%'); // WHERE jurusan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jurusanId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterByJurusanId($jurusanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jurusanId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jurusanId)) {
                $jurusanId = str_replace('*', '%', $jurusanId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KurikulumPeer::JURUSAN_ID, $jurusanId, $comparison);
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
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KurikulumPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KurikulumPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KurikulumPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KurikulumPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KurikulumPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KurikulumPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(KurikulumPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(KurikulumPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KurikulumPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KurikulumPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KurikulumPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KurikulumPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related JenjangPendidikan object
     *
     * @param   JenjangPendidikan|PropelObjectCollection $jenjangPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KurikulumQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenjangPendidikan($jenjangPendidikan, $comparison = null)
    {
        if ($jenjangPendidikan instanceof JenjangPendidikan) {
            return $this
                ->addUsingAlias(KurikulumPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->getJenjangPendidikanId(), $comparison);
        } elseif ($jenjangPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KurikulumPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->toKeyValue('PrimaryKey', 'JenjangPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByJenjangPendidikan() only accepts arguments of type JenjangPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenjangPendidikan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function joinJenjangPendidikan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenjangPendidikan');

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
            $this->addJoinObject($join, 'JenjangPendidikan');
        }

        return $this;
    }

    /**
     * Use the JenjangPendidikan relation JenjangPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenjangPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useJenjangPendidikanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenjangPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenjangPendidikan', '\DataDikdas\Model\JenjangPendidikanQuery');
    }

    /**
     * Filter the query by a related Jurusan object
     *
     * @param   Jurusan|PropelObjectCollection $jurusan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KurikulumQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusan($jurusan, $comparison = null)
    {
        if ($jurusan instanceof Jurusan) {
            return $this
                ->addUsingAlias(KurikulumPeer::JURUSAN_ID, $jurusan->getJurusanId(), $comparison);
        } elseif ($jurusan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KurikulumPeer::JURUSAN_ID, $jurusan->toKeyValue('PrimaryKey', 'JurusanId'), $comparison);
        } else {
            throw new PropelException('filterByJurusan() only accepts arguments of type Jurusan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Jurusan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function joinJurusan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Jurusan');

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
            $this->addJoinObject($join, 'Jurusan');
        }

        return $this;
    }

    /**
     * Use the Jurusan relation Jurusan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanQuery A secondary query class using the current class as primary query
     */
    public function useJurusanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJurusan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Jurusan', '\DataDikdas\Model\JurusanQuery');
    }

    /**
     * Filter the query by a related GroupMatpel object
     *
     * @param   GroupMatpel|PropelObjectCollection $groupMatpel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KurikulumQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGroupMatpel($groupMatpel, $comparison = null)
    {
        if ($groupMatpel instanceof GroupMatpel) {
            return $this
                ->addUsingAlias(KurikulumPeer::KURIKULUM_ID, $groupMatpel->getKurikulumId(), $comparison);
        } elseif ($groupMatpel instanceof PropelObjectCollection) {
            return $this
                ->useGroupMatpelQuery()
                ->filterByPrimaryKeys($groupMatpel->getPrimaryKeys())
                ->endUse();
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
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function joinGroupMatpel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useGroupMatpelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGroupMatpel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GroupMatpel', '\DataDikdas\Model\GroupMatpelQuery');
    }

    /**
     * Filter the query by a related Kompetensi object
     *
     * @param   Kompetensi|PropelObjectCollection $kompetensi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KurikulumQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKompetensi($kompetensi, $comparison = null)
    {
        if ($kompetensi instanceof Kompetensi) {
            return $this
                ->addUsingAlias(KurikulumPeer::KURIKULUM_ID, $kompetensi->getKurikulumId(), $comparison);
        } elseif ($kompetensi instanceof PropelObjectCollection) {
            return $this
                ->useKompetensiQuery()
                ->filterByPrimaryKeys($kompetensi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKompetensi() only accepts arguments of type Kompetensi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Kompetensi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function joinKompetensi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Kompetensi');

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
            $this->addJoinObject($join, 'Kompetensi');
        }

        return $this;
    }

    /**
     * Use the Kompetensi relation Kompetensi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KompetensiQuery A secondary query class using the current class as primary query
     */
    public function useKompetensiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKompetensi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kompetensi', '\DataDikdas\Model\KompetensiQuery');
    }

    /**
     * Filter the query by a related MataPelajaranKurikulum object
     *
     * @param   MataPelajaranKurikulum|PropelObjectCollection $mataPelajaranKurikulum  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KurikulumQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaranKurikulum($mataPelajaranKurikulum, $comparison = null)
    {
        if ($mataPelajaranKurikulum instanceof MataPelajaranKurikulum) {
            return $this
                ->addUsingAlias(KurikulumPeer::KURIKULUM_ID, $mataPelajaranKurikulum->getKurikulumId(), $comparison);
        } elseif ($mataPelajaranKurikulum instanceof PropelObjectCollection) {
            return $this
                ->useMataPelajaranKurikulumQuery()
                ->filterByPrimaryKeys($mataPelajaranKurikulum->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMataPelajaranKurikulum() only accepts arguments of type MataPelajaranKurikulum or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaranKurikulum relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function joinMataPelajaranKurikulum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaranKurikulum');

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
            $this->addJoinObject($join, 'MataPelajaranKurikulum');
        }

        return $this;
    }

    /**
     * Use the MataPelajaranKurikulum relation MataPelajaranKurikulum object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranKurikulumQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranKurikulumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMataPelajaranKurikulum($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaranKurikulum', '\DataDikdas\Model\MataPelajaranKurikulumQuery');
    }

    /**
     * Filter the query by a related RombonganBelajar object
     *
     * @param   RombonganBelajar|PropelObjectCollection $rombonganBelajar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KurikulumQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRombonganBelajar($rombonganBelajar, $comparison = null)
    {
        if ($rombonganBelajar instanceof RombonganBelajar) {
            return $this
                ->addUsingAlias(KurikulumPeer::KURIKULUM_ID, $rombonganBelajar->getKurikulumId(), $comparison);
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
     * @return KurikulumQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   Kurikulum $kurikulum Object to remove from the list of results
     *
     * @return KurikulumQuery The current query, for fluid interface
     */
    public function prune($kurikulum = null)
    {
        if ($kurikulum) {
            $this->addUsingAlias(KurikulumPeer::KURIKULUM_ID, $kurikulum->getKurikulumId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
