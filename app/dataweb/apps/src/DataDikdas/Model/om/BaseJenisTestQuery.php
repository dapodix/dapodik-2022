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
use DataDikdas\Model\JenisTest;
use DataDikdas\Model\JenisTestPeer;
use DataDikdas\Model\JenisTestQuery;
use DataDikdas\Model\NilaiTest;

/**
 * Base class that represents a query for the 'ref.jenis_test' table.
 *
 * 
 *
 * @method JenisTestQuery orderByJenisTestId($order = Criteria::ASC) Order by the jenis_test_id column
 * @method JenisTestQuery orderByJenisTest($order = Criteria::ASC) Order by the jenis_test column
 * @method JenisTestQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method JenisTestQuery orderByNilaiMaks($order = Criteria::ASC) Order by the nilai_maks column
 * @method JenisTestQuery orderByKetSkor1($order = Criteria::ASC) Order by the ket_skor1 column
 * @method JenisTestQuery orderByKetSkor2($order = Criteria::ASC) Order by the ket_skor2 column
 * @method JenisTestQuery orderByKetSkor3($order = Criteria::ASC) Order by the ket_skor3 column
 * @method JenisTestQuery orderByKetSkor4($order = Criteria::ASC) Order by the ket_skor4 column
 * @method JenisTestQuery orderByKetSkor5($order = Criteria::ASC) Order by the ket_skor5 column
 * @method JenisTestQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisTestQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisTestQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisTestQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisTestQuery groupByJenisTestId() Group by the jenis_test_id column
 * @method JenisTestQuery groupByJenisTest() Group by the jenis_test column
 * @method JenisTestQuery groupByKeterangan() Group by the keterangan column
 * @method JenisTestQuery groupByNilaiMaks() Group by the nilai_maks column
 * @method JenisTestQuery groupByKetSkor1() Group by the ket_skor1 column
 * @method JenisTestQuery groupByKetSkor2() Group by the ket_skor2 column
 * @method JenisTestQuery groupByKetSkor3() Group by the ket_skor3 column
 * @method JenisTestQuery groupByKetSkor4() Group by the ket_skor4 column
 * @method JenisTestQuery groupByKetSkor5() Group by the ket_skor5 column
 * @method JenisTestQuery groupByCreateDate() Group by the create_date column
 * @method JenisTestQuery groupByLastUpdate() Group by the last_update column
 * @method JenisTestQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisTestQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisTestQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisTestQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisTestQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisTestQuery leftJoinNilaiTest($relationAlias = null) Adds a LEFT JOIN clause to the query using the NilaiTest relation
 * @method JenisTestQuery rightJoinNilaiTest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NilaiTest relation
 * @method JenisTestQuery innerJoinNilaiTest($relationAlias = null) Adds a INNER JOIN clause to the query using the NilaiTest relation
 *
 * @method JenisTest findOne(PropelPDO $con = null) Return the first JenisTest matching the query
 * @method JenisTest findOneOrCreate(PropelPDO $con = null) Return the first JenisTest matching the query, or a new JenisTest object populated from the query conditions when no match is found
 *
 * @method JenisTest findOneByJenisTest(string $jenis_test) Return the first JenisTest filtered by the jenis_test column
 * @method JenisTest findOneByKeterangan(string $keterangan) Return the first JenisTest filtered by the keterangan column
 * @method JenisTest findOneByNilaiMaks(string $nilai_maks) Return the first JenisTest filtered by the nilai_maks column
 * @method JenisTest findOneByKetSkor1(string $ket_skor1) Return the first JenisTest filtered by the ket_skor1 column
 * @method JenisTest findOneByKetSkor2(string $ket_skor2) Return the first JenisTest filtered by the ket_skor2 column
 * @method JenisTest findOneByKetSkor3(string $ket_skor3) Return the first JenisTest filtered by the ket_skor3 column
 * @method JenisTest findOneByKetSkor4(string $ket_skor4) Return the first JenisTest filtered by the ket_skor4 column
 * @method JenisTest findOneByKetSkor5(string $ket_skor5) Return the first JenisTest filtered by the ket_skor5 column
 * @method JenisTest findOneByCreateDate(string $create_date) Return the first JenisTest filtered by the create_date column
 * @method JenisTest findOneByLastUpdate(string $last_update) Return the first JenisTest filtered by the last_update column
 * @method JenisTest findOneByExpiredDate(string $expired_date) Return the first JenisTest filtered by the expired_date column
 * @method JenisTest findOneByLastSync(string $last_sync) Return the first JenisTest filtered by the last_sync column
 *
 * @method array findByJenisTestId(string $jenis_test_id) Return JenisTest objects filtered by the jenis_test_id column
 * @method array findByJenisTest(string $jenis_test) Return JenisTest objects filtered by the jenis_test column
 * @method array findByKeterangan(string $keterangan) Return JenisTest objects filtered by the keterangan column
 * @method array findByNilaiMaks(string $nilai_maks) Return JenisTest objects filtered by the nilai_maks column
 * @method array findByKetSkor1(string $ket_skor1) Return JenisTest objects filtered by the ket_skor1 column
 * @method array findByKetSkor2(string $ket_skor2) Return JenisTest objects filtered by the ket_skor2 column
 * @method array findByKetSkor3(string $ket_skor3) Return JenisTest objects filtered by the ket_skor3 column
 * @method array findByKetSkor4(string $ket_skor4) Return JenisTest objects filtered by the ket_skor4 column
 * @method array findByKetSkor5(string $ket_skor5) Return JenisTest objects filtered by the ket_skor5 column
 * @method array findByCreateDate(string $create_date) Return JenisTest objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisTest objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisTest objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisTest objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisTestQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisTestQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisTest', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisTestQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisTestQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisTestQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisTestQuery) {
            return $criteria;
        }
        $query = new JenisTestQuery();
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
     * @return   JenisTest|JenisTest[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisTestPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisTest A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisTestId($key, $con = null)
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
     * @return                 JenisTest A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_test_id", "jenis_test", "keterangan", "nilai_maks", "ket_skor1", "ket_skor2", "ket_skor3", "ket_skor4", "ket_skor5", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_test" WHERE "jenis_test_id" = :p0';
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
            $obj = new JenisTest();
            $obj->hydrate($row);
            JenisTestPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisTest|JenisTest[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisTest[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisTestPeer::JENIS_TEST_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisTestPeer::JENIS_TEST_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jenis_test_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisTestId(1234); // WHERE jenis_test_id = 1234
     * $query->filterByJenisTestId(array(12, 34)); // WHERE jenis_test_id IN (12, 34)
     * $query->filterByJenisTestId(array('min' => 12)); // WHERE jenis_test_id >= 12
     * $query->filterByJenisTestId(array('max' => 12)); // WHERE jenis_test_id <= 12
     * </code>
     *
     * @param     mixed $jenisTestId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByJenisTestId($jenisTestId = null, $comparison = null)
    {
        if (is_array($jenisTestId)) {
            $useMinMax = false;
            if (isset($jenisTestId['min'])) {
                $this->addUsingAlias(JenisTestPeer::JENIS_TEST_ID, $jenisTestId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisTestId['max'])) {
                $this->addUsingAlias(JenisTestPeer::JENIS_TEST_ID, $jenisTestId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::JENIS_TEST_ID, $jenisTestId, $comparison);
    }

    /**
     * Filter the query on the jenis_test column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisTest('fooValue');   // WHERE jenis_test = 'fooValue'
     * $query->filterByJenisTest('%fooValue%'); // WHERE jenis_test LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jenisTest The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByJenisTest($jenisTest = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jenisTest)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jenisTest)) {
                $jenisTest = str_replace('*', '%', $jenisTest);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::JENIS_TEST, $jenisTest, $comparison);
    }

    /**
     * Filter the query on the keterangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKeterangan('fooValue');   // WHERE keterangan = 'fooValue'
     * $query->filterByKeterangan('%fooValue%'); // WHERE keterangan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keterangan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByKeterangan($keterangan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keterangan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $keterangan)) {
                $keterangan = str_replace('*', '%', $keterangan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::KETERANGAN, $keterangan, $comparison);
    }

    /**
     * Filter the query on the nilai_maks column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiMaks(1234); // WHERE nilai_maks = 1234
     * $query->filterByNilaiMaks(array(12, 34)); // WHERE nilai_maks IN (12, 34)
     * $query->filterByNilaiMaks(array('min' => 12)); // WHERE nilai_maks >= 12
     * $query->filterByNilaiMaks(array('max' => 12)); // WHERE nilai_maks <= 12
     * </code>
     *
     * @param     mixed $nilaiMaks The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByNilaiMaks($nilaiMaks = null, $comparison = null)
    {
        if (is_array($nilaiMaks)) {
            $useMinMax = false;
            if (isset($nilaiMaks['min'])) {
                $this->addUsingAlias(JenisTestPeer::NILAI_MAKS, $nilaiMaks['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilaiMaks['max'])) {
                $this->addUsingAlias(JenisTestPeer::NILAI_MAKS, $nilaiMaks['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::NILAI_MAKS, $nilaiMaks, $comparison);
    }

    /**
     * Filter the query on the ket_skor1 column
     *
     * Example usage:
     * <code>
     * $query->filterByKetSkor1('fooValue');   // WHERE ket_skor1 = 'fooValue'
     * $query->filterByKetSkor1('%fooValue%'); // WHERE ket_skor1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketSkor1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByKetSkor1($ketSkor1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketSkor1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketSkor1)) {
                $ketSkor1 = str_replace('*', '%', $ketSkor1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::KET_SKOR1, $ketSkor1, $comparison);
    }

    /**
     * Filter the query on the ket_skor2 column
     *
     * Example usage:
     * <code>
     * $query->filterByKetSkor2('fooValue');   // WHERE ket_skor2 = 'fooValue'
     * $query->filterByKetSkor2('%fooValue%'); // WHERE ket_skor2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketSkor2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByKetSkor2($ketSkor2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketSkor2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketSkor2)) {
                $ketSkor2 = str_replace('*', '%', $ketSkor2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::KET_SKOR2, $ketSkor2, $comparison);
    }

    /**
     * Filter the query on the ket_skor3 column
     *
     * Example usage:
     * <code>
     * $query->filterByKetSkor3('fooValue');   // WHERE ket_skor3 = 'fooValue'
     * $query->filterByKetSkor3('%fooValue%'); // WHERE ket_skor3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketSkor3 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByKetSkor3($ketSkor3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketSkor3)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketSkor3)) {
                $ketSkor3 = str_replace('*', '%', $ketSkor3);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::KET_SKOR3, $ketSkor3, $comparison);
    }

    /**
     * Filter the query on the ket_skor4 column
     *
     * Example usage:
     * <code>
     * $query->filterByKetSkor4('fooValue');   // WHERE ket_skor4 = 'fooValue'
     * $query->filterByKetSkor4('%fooValue%'); // WHERE ket_skor4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketSkor4 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByKetSkor4($ketSkor4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketSkor4)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketSkor4)) {
                $ketSkor4 = str_replace('*', '%', $ketSkor4);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::KET_SKOR4, $ketSkor4, $comparison);
    }

    /**
     * Filter the query on the ket_skor5 column
     *
     * Example usage:
     * <code>
     * $query->filterByKetSkor5('fooValue');   // WHERE ket_skor5 = 'fooValue'
     * $query->filterByKetSkor5('%fooValue%'); // WHERE ket_skor5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketSkor5 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByKetSkor5($ketSkor5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketSkor5)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketSkor5)) {
                $ketSkor5 = str_replace('*', '%', $ketSkor5);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::KET_SKOR5, $ketSkor5, $comparison);
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
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisTestPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisTestPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisTestPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisTestPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisTestPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisTestPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisTestPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisTestPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisTestPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related NilaiTest object
     *
     * @param   NilaiTest|PropelObjectCollection $nilaiTest  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisTestQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNilaiTest($nilaiTest, $comparison = null)
    {
        if ($nilaiTest instanceof NilaiTest) {
            return $this
                ->addUsingAlias(JenisTestPeer::JENIS_TEST_ID, $nilaiTest->getJenisTestId(), $comparison);
        } elseif ($nilaiTest instanceof PropelObjectCollection) {
            return $this
                ->useNilaiTestQuery()
                ->filterByPrimaryKeys($nilaiTest->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNilaiTest() only accepts arguments of type NilaiTest or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the NilaiTest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function joinNilaiTest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('NilaiTest');

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
            $this->addJoinObject($join, 'NilaiTest');
        }

        return $this;
    }

    /**
     * Use the NilaiTest relation NilaiTest object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\NilaiTestQuery A secondary query class using the current class as primary query
     */
    public function useNilaiTestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNilaiTest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NilaiTest', '\DataDikdas\Model\NilaiTestQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisTest $jenisTest Object to remove from the list of results
     *
     * @return JenisTestQuery The current query, for fluid interface
     */
    public function prune($jenisTest = null)
    {
        if ($jenisTest) {
            $this->addUsingAlias(JenisTestPeer::JENIS_TEST_ID, $jenisTest->getJenisTestId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
