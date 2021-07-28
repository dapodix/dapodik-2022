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
use DataDikdas\Model\NilaiTest;
use DataDikdas\Model\NilaiTestPeer;
use DataDikdas\Model\NilaiTestQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\VldNilaiTest;

/**
 * Base class that represents a query for the 'nilai_test' table.
 *
 * 
 *
 * @method NilaiTestQuery orderByNilaiTestId($order = Criteria::ASC) Order by the nilai_test_id column
 * @method NilaiTestQuery orderByJenisTestId($order = Criteria::ASC) Order by the jenis_test_id column
 * @method NilaiTestQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method NilaiTestQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method NilaiTestQuery orderByPenyelenggara($order = Criteria::ASC) Order by the penyelenggara column
 * @method NilaiTestQuery orderByTahun($order = Criteria::ASC) Order by the tahun column
 * @method NilaiTestQuery orderBySkor($order = Criteria::ASC) Order by the skor column
 * @method NilaiTestQuery orderBySkor1($order = Criteria::ASC) Order by the skor1 column
 * @method NilaiTestQuery orderBySkor2($order = Criteria::ASC) Order by the skor2 column
 * @method NilaiTestQuery orderBySkor3($order = Criteria::ASC) Order by the skor3 column
 * @method NilaiTestQuery orderBySkor4($order = Criteria::ASC) Order by the skor4 column
 * @method NilaiTestQuery orderBySkor5($order = Criteria::ASC) Order by the skor5 column
 * @method NilaiTestQuery orderByNomorPeserta($order = Criteria::ASC) Order by the nomor_peserta column
 * @method NilaiTestQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method NilaiTestQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method NilaiTestQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method NilaiTestQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method NilaiTestQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method NilaiTestQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method NilaiTestQuery groupByNilaiTestId() Group by the nilai_test_id column
 * @method NilaiTestQuery groupByJenisTestId() Group by the jenis_test_id column
 * @method NilaiTestQuery groupByPtkId() Group by the ptk_id column
 * @method NilaiTestQuery groupByNama() Group by the nama column
 * @method NilaiTestQuery groupByPenyelenggara() Group by the penyelenggara column
 * @method NilaiTestQuery groupByTahun() Group by the tahun column
 * @method NilaiTestQuery groupBySkor() Group by the skor column
 * @method NilaiTestQuery groupBySkor1() Group by the skor1 column
 * @method NilaiTestQuery groupBySkor2() Group by the skor2 column
 * @method NilaiTestQuery groupBySkor3() Group by the skor3 column
 * @method NilaiTestQuery groupBySkor4() Group by the skor4 column
 * @method NilaiTestQuery groupBySkor5() Group by the skor5 column
 * @method NilaiTestQuery groupByNomorPeserta() Group by the nomor_peserta column
 * @method NilaiTestQuery groupByAsalData() Group by the asal_data column
 * @method NilaiTestQuery groupByCreateDate() Group by the create_date column
 * @method NilaiTestQuery groupByLastUpdate() Group by the last_update column
 * @method NilaiTestQuery groupBySoftDelete() Group by the soft_delete column
 * @method NilaiTestQuery groupByLastSync() Group by the last_sync column
 * @method NilaiTestQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method NilaiTestQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method NilaiTestQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method NilaiTestQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method NilaiTestQuery leftJoinJenisTest($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisTest relation
 * @method NilaiTestQuery rightJoinJenisTest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisTest relation
 * @method NilaiTestQuery innerJoinJenisTest($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisTest relation
 *
 * @method NilaiTestQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method NilaiTestQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method NilaiTestQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method NilaiTestQuery leftJoinVldNilaiTest($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldNilaiTest relation
 * @method NilaiTestQuery rightJoinVldNilaiTest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldNilaiTest relation
 * @method NilaiTestQuery innerJoinVldNilaiTest($relationAlias = null) Adds a INNER JOIN clause to the query using the VldNilaiTest relation
 *
 * @method NilaiTest findOne(PropelPDO $con = null) Return the first NilaiTest matching the query
 * @method NilaiTest findOneOrCreate(PropelPDO $con = null) Return the first NilaiTest matching the query, or a new NilaiTest object populated from the query conditions when no match is found
 *
 * @method NilaiTest findOneByJenisTestId(string $jenis_test_id) Return the first NilaiTest filtered by the jenis_test_id column
 * @method NilaiTest findOneByPtkId(string $ptk_id) Return the first NilaiTest filtered by the ptk_id column
 * @method NilaiTest findOneByNama(string $nama) Return the first NilaiTest filtered by the nama column
 * @method NilaiTest findOneByPenyelenggara(string $penyelenggara) Return the first NilaiTest filtered by the penyelenggara column
 * @method NilaiTest findOneByTahun(string $tahun) Return the first NilaiTest filtered by the tahun column
 * @method NilaiTest findOneBySkor(string $skor) Return the first NilaiTest filtered by the skor column
 * @method NilaiTest findOneBySkor1(string $skor1) Return the first NilaiTest filtered by the skor1 column
 * @method NilaiTest findOneBySkor2(string $skor2) Return the first NilaiTest filtered by the skor2 column
 * @method NilaiTest findOneBySkor3(string $skor3) Return the first NilaiTest filtered by the skor3 column
 * @method NilaiTest findOneBySkor4(string $skor4) Return the first NilaiTest filtered by the skor4 column
 * @method NilaiTest findOneBySkor5(string $skor5) Return the first NilaiTest filtered by the skor5 column
 * @method NilaiTest findOneByNomorPeserta(string $nomor_peserta) Return the first NilaiTest filtered by the nomor_peserta column
 * @method NilaiTest findOneByAsalData(string $asal_data) Return the first NilaiTest filtered by the asal_data column
 * @method NilaiTest findOneByCreateDate(string $create_date) Return the first NilaiTest filtered by the create_date column
 * @method NilaiTest findOneByLastUpdate(string $last_update) Return the first NilaiTest filtered by the last_update column
 * @method NilaiTest findOneBySoftDelete(string $soft_delete) Return the first NilaiTest filtered by the soft_delete column
 * @method NilaiTest findOneByLastSync(string $last_sync) Return the first NilaiTest filtered by the last_sync column
 * @method NilaiTest findOneByUpdaterId(string $updater_id) Return the first NilaiTest filtered by the updater_id column
 *
 * @method array findByNilaiTestId(string $nilai_test_id) Return NilaiTest objects filtered by the nilai_test_id column
 * @method array findByJenisTestId(string $jenis_test_id) Return NilaiTest objects filtered by the jenis_test_id column
 * @method array findByPtkId(string $ptk_id) Return NilaiTest objects filtered by the ptk_id column
 * @method array findByNama(string $nama) Return NilaiTest objects filtered by the nama column
 * @method array findByPenyelenggara(string $penyelenggara) Return NilaiTest objects filtered by the penyelenggara column
 * @method array findByTahun(string $tahun) Return NilaiTest objects filtered by the tahun column
 * @method array findBySkor(string $skor) Return NilaiTest objects filtered by the skor column
 * @method array findBySkor1(string $skor1) Return NilaiTest objects filtered by the skor1 column
 * @method array findBySkor2(string $skor2) Return NilaiTest objects filtered by the skor2 column
 * @method array findBySkor3(string $skor3) Return NilaiTest objects filtered by the skor3 column
 * @method array findBySkor4(string $skor4) Return NilaiTest objects filtered by the skor4 column
 * @method array findBySkor5(string $skor5) Return NilaiTest objects filtered by the skor5 column
 * @method array findByNomorPeserta(string $nomor_peserta) Return NilaiTest objects filtered by the nomor_peserta column
 * @method array findByAsalData(string $asal_data) Return NilaiTest objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return NilaiTest objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return NilaiTest objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return NilaiTest objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return NilaiTest objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return NilaiTest objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseNilaiTestQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseNilaiTestQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\NilaiTest', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NilaiTestQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   NilaiTestQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NilaiTestQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NilaiTestQuery) {
            return $criteria;
        }
        $query = new NilaiTestQuery();
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
     * @return   NilaiTest|NilaiTest[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NilaiTestPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 NilaiTest A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByNilaiTestId($key, $con = null)
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
     * @return                 NilaiTest A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "nilai_test_id", "jenis_test_id", "ptk_id", "nama", "penyelenggara", "tahun", "skor", "skor1", "skor2", "skor3", "skor4", "skor5", "nomor_peserta", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "nilai_test" WHERE "nilai_test_id" = :p0';
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
            $obj = new NilaiTest();
            $obj->hydrate($row);
            NilaiTestPeer::addInstanceToPool($obj, (string) $key);
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
     * @return NilaiTest|NilaiTest[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|NilaiTest[]|mixed the list of results, formatted by the current formatter
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
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NilaiTestPeer::NILAI_TEST_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NilaiTestPeer::NILAI_TEST_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the nilai_test_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiTestId('fooValue');   // WHERE nilai_test_id = 'fooValue'
     * $query->filterByNilaiTestId('%fooValue%'); // WHERE nilai_test_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nilaiTestId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterByNilaiTestId($nilaiTestId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nilaiTestId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nilaiTestId)) {
                $nilaiTestId = str_replace('*', '%', $nilaiTestId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::NILAI_TEST_ID, $nilaiTestId, $comparison);
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
     * @see       filterByJenisTest()
     *
     * @param     mixed $jenisTestId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterByJenisTestId($jenisTestId = null, $comparison = null)
    {
        if (is_array($jenisTestId)) {
            $useMinMax = false;
            if (isset($jenisTestId['min'])) {
                $this->addUsingAlias(NilaiTestPeer::JENIS_TEST_ID, $jenisTestId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisTestId['max'])) {
                $this->addUsingAlias(NilaiTestPeer::JENIS_TEST_ID, $jenisTestId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::JENIS_TEST_ID, $jenisTestId, $comparison);
    }

    /**
     * Filter the query on the ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkId('fooValue');   // WHERE ptk_id = 'fooValue'
     * $query->filterByPtkId('%fooValue%'); // WHERE ptk_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterByPtkId($ptkId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ptkId)) {
                $ptkId = str_replace('*', '%', $ptkId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the nama column
     *
     * Example usage:
     * <code>
     * $query->filterByNama('fooValue');   // WHERE nama = 'fooValue'
     * $query->filterByNama('%fooValue%'); // WHERE nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nama The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nama)) {
                $nama = str_replace('*', '%', $nama);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the penyelenggara column
     *
     * Example usage:
     * <code>
     * $query->filterByPenyelenggara('fooValue');   // WHERE penyelenggara = 'fooValue'
     * $query->filterByPenyelenggara('%fooValue%'); // WHERE penyelenggara LIKE '%fooValue%'
     * </code>
     *
     * @param     string $penyelenggara The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterByPenyelenggara($penyelenggara = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($penyelenggara)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $penyelenggara)) {
                $penyelenggara = str_replace('*', '%', $penyelenggara);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::PENYELENGGARA, $penyelenggara, $comparison);
    }

    /**
     * Filter the query on the tahun column
     *
     * Example usage:
     * <code>
     * $query->filterByTahun(1234); // WHERE tahun = 1234
     * $query->filterByTahun(array(12, 34)); // WHERE tahun IN (12, 34)
     * $query->filterByTahun(array('min' => 12)); // WHERE tahun >= 12
     * $query->filterByTahun(array('max' => 12)); // WHERE tahun <= 12
     * </code>
     *
     * @param     mixed $tahun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterByTahun($tahun = null, $comparison = null)
    {
        if (is_array($tahun)) {
            $useMinMax = false;
            if (isset($tahun['min'])) {
                $this->addUsingAlias(NilaiTestPeer::TAHUN, $tahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahun['max'])) {
                $this->addUsingAlias(NilaiTestPeer::TAHUN, $tahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::TAHUN, $tahun, $comparison);
    }

    /**
     * Filter the query on the skor column
     *
     * Example usage:
     * <code>
     * $query->filterBySkor(1234); // WHERE skor = 1234
     * $query->filterBySkor(array(12, 34)); // WHERE skor IN (12, 34)
     * $query->filterBySkor(array('min' => 12)); // WHERE skor >= 12
     * $query->filterBySkor(array('max' => 12)); // WHERE skor <= 12
     * </code>
     *
     * @param     mixed $skor The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterBySkor($skor = null, $comparison = null)
    {
        if (is_array($skor)) {
            $useMinMax = false;
            if (isset($skor['min'])) {
                $this->addUsingAlias(NilaiTestPeer::SKOR, $skor['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($skor['max'])) {
                $this->addUsingAlias(NilaiTestPeer::SKOR, $skor['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::SKOR, $skor, $comparison);
    }

    /**
     * Filter the query on the skor1 column
     *
     * Example usage:
     * <code>
     * $query->filterBySkor1(1234); // WHERE skor1 = 1234
     * $query->filterBySkor1(array(12, 34)); // WHERE skor1 IN (12, 34)
     * $query->filterBySkor1(array('min' => 12)); // WHERE skor1 >= 12
     * $query->filterBySkor1(array('max' => 12)); // WHERE skor1 <= 12
     * </code>
     *
     * @param     mixed $skor1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterBySkor1($skor1 = null, $comparison = null)
    {
        if (is_array($skor1)) {
            $useMinMax = false;
            if (isset($skor1['min'])) {
                $this->addUsingAlias(NilaiTestPeer::SKOR1, $skor1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($skor1['max'])) {
                $this->addUsingAlias(NilaiTestPeer::SKOR1, $skor1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::SKOR1, $skor1, $comparison);
    }

    /**
     * Filter the query on the skor2 column
     *
     * Example usage:
     * <code>
     * $query->filterBySkor2(1234); // WHERE skor2 = 1234
     * $query->filterBySkor2(array(12, 34)); // WHERE skor2 IN (12, 34)
     * $query->filterBySkor2(array('min' => 12)); // WHERE skor2 >= 12
     * $query->filterBySkor2(array('max' => 12)); // WHERE skor2 <= 12
     * </code>
     *
     * @param     mixed $skor2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterBySkor2($skor2 = null, $comparison = null)
    {
        if (is_array($skor2)) {
            $useMinMax = false;
            if (isset($skor2['min'])) {
                $this->addUsingAlias(NilaiTestPeer::SKOR2, $skor2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($skor2['max'])) {
                $this->addUsingAlias(NilaiTestPeer::SKOR2, $skor2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::SKOR2, $skor2, $comparison);
    }

    /**
     * Filter the query on the skor3 column
     *
     * Example usage:
     * <code>
     * $query->filterBySkor3(1234); // WHERE skor3 = 1234
     * $query->filterBySkor3(array(12, 34)); // WHERE skor3 IN (12, 34)
     * $query->filterBySkor3(array('min' => 12)); // WHERE skor3 >= 12
     * $query->filterBySkor3(array('max' => 12)); // WHERE skor3 <= 12
     * </code>
     *
     * @param     mixed $skor3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterBySkor3($skor3 = null, $comparison = null)
    {
        if (is_array($skor3)) {
            $useMinMax = false;
            if (isset($skor3['min'])) {
                $this->addUsingAlias(NilaiTestPeer::SKOR3, $skor3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($skor3['max'])) {
                $this->addUsingAlias(NilaiTestPeer::SKOR3, $skor3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::SKOR3, $skor3, $comparison);
    }

    /**
     * Filter the query on the skor4 column
     *
     * Example usage:
     * <code>
     * $query->filterBySkor4(1234); // WHERE skor4 = 1234
     * $query->filterBySkor4(array(12, 34)); // WHERE skor4 IN (12, 34)
     * $query->filterBySkor4(array('min' => 12)); // WHERE skor4 >= 12
     * $query->filterBySkor4(array('max' => 12)); // WHERE skor4 <= 12
     * </code>
     *
     * @param     mixed $skor4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterBySkor4($skor4 = null, $comparison = null)
    {
        if (is_array($skor4)) {
            $useMinMax = false;
            if (isset($skor4['min'])) {
                $this->addUsingAlias(NilaiTestPeer::SKOR4, $skor4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($skor4['max'])) {
                $this->addUsingAlias(NilaiTestPeer::SKOR4, $skor4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::SKOR4, $skor4, $comparison);
    }

    /**
     * Filter the query on the skor5 column
     *
     * Example usage:
     * <code>
     * $query->filterBySkor5(1234); // WHERE skor5 = 1234
     * $query->filterBySkor5(array(12, 34)); // WHERE skor5 IN (12, 34)
     * $query->filterBySkor5(array('min' => 12)); // WHERE skor5 >= 12
     * $query->filterBySkor5(array('max' => 12)); // WHERE skor5 <= 12
     * </code>
     *
     * @param     mixed $skor5 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterBySkor5($skor5 = null, $comparison = null)
    {
        if (is_array($skor5)) {
            $useMinMax = false;
            if (isset($skor5['min'])) {
                $this->addUsingAlias(NilaiTestPeer::SKOR5, $skor5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($skor5['max'])) {
                $this->addUsingAlias(NilaiTestPeer::SKOR5, $skor5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::SKOR5, $skor5, $comparison);
    }

    /**
     * Filter the query on the nomor_peserta column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorPeserta('fooValue');   // WHERE nomor_peserta = 'fooValue'
     * $query->filterByNomorPeserta('%fooValue%'); // WHERE nomor_peserta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorPeserta The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterByNomorPeserta($nomorPeserta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorPeserta)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorPeserta)) {
                $nomorPeserta = str_replace('*', '%', $nomorPeserta);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::NOMOR_PESERTA, $nomorPeserta, $comparison);
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
     * @return NilaiTestQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NilaiTestPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(NilaiTestPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(NilaiTestPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(NilaiTestPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(NilaiTestPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(NilaiTestPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(NilaiTestPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(NilaiTestPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(NilaiTestPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiTestPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return NilaiTestQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NilaiTestPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JenisTest object
     *
     * @param   JenisTest|PropelObjectCollection $jenisTest The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 NilaiTestQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisTest($jenisTest, $comparison = null)
    {
        if ($jenisTest instanceof JenisTest) {
            return $this
                ->addUsingAlias(NilaiTestPeer::JENIS_TEST_ID, $jenisTest->getJenisTestId(), $comparison);
        } elseif ($jenisTest instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NilaiTestPeer::JENIS_TEST_ID, $jenisTest->toKeyValue('PrimaryKey', 'JenisTestId'), $comparison);
        } else {
            throw new PropelException('filterByJenisTest() only accepts arguments of type JenisTest or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisTest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function joinJenisTest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisTest');

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
            $this->addJoinObject($join, 'JenisTest');
        }

        return $this;
    }

    /**
     * Use the JenisTest relation JenisTest object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisTestQuery A secondary query class using the current class as primary query
     */
    public function useJenisTestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisTest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisTest', '\DataDikdas\Model\JenisTestQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 NilaiTestQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(NilaiTestPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NilaiTestPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
        } else {
            throw new PropelException('filterByPtk() only accepts arguments of type Ptk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ptk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function joinPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ptk');

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
            $this->addJoinObject($join, 'Ptk');
        }

        return $this;
    }

    /**
     * Use the Ptk relation Ptk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkQuery A secondary query class using the current class as primary query
     */
    public function usePtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ptk', '\DataDikdas\Model\PtkQuery');
    }

    /**
     * Filter the query by a related VldNilaiTest object
     *
     * @param   VldNilaiTest|PropelObjectCollection $vldNilaiTest  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 NilaiTestQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldNilaiTest($vldNilaiTest, $comparison = null)
    {
        if ($vldNilaiTest instanceof VldNilaiTest) {
            return $this
                ->addUsingAlias(NilaiTestPeer::NILAI_TEST_ID, $vldNilaiTest->getNilaiTestId(), $comparison);
        } elseif ($vldNilaiTest instanceof PropelObjectCollection) {
            return $this
                ->useVldNilaiTestQuery()
                ->filterByPrimaryKeys($vldNilaiTest->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldNilaiTest() only accepts arguments of type VldNilaiTest or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldNilaiTest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function joinVldNilaiTest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldNilaiTest');

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
            $this->addJoinObject($join, 'VldNilaiTest');
        }

        return $this;
    }

    /**
     * Use the VldNilaiTest relation VldNilaiTest object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldNilaiTestQuery A secondary query class using the current class as primary query
     */
    public function useVldNilaiTestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldNilaiTest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldNilaiTest', '\DataDikdas\Model\VldNilaiTestQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   NilaiTest $nilaiTest Object to remove from the list of results
     *
     * @return NilaiTestQuery The current query, for fluid interface
     */
    public function prune($nilaiTest = null)
    {
        if ($nilaiTest) {
            $this->addUsingAlias(NilaiTestPeer::NILAI_TEST_ID, $nilaiTest->getNilaiTestId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
