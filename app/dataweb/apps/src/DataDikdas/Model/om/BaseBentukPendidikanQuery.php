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
use DataDikdas\Model\BentukPendidikan;
use DataDikdas\Model\BentukPendidikanPeer;
use DataDikdas\Model\BentukPendidikanQuery;
use DataDikdas\Model\Peran;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\StandarSarana;

/**
 * Base class that represents a query for the 'ref.bentuk_pendidikan' table.
 *
 * 
 *
 * @method BentukPendidikanQuery orderByBentukPendidikanId($order = Criteria::ASC) Order by the bentuk_pendidikan_id column
 * @method BentukPendidikanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method BentukPendidikanQuery orderByJenjangPaud($order = Criteria::ASC) Order by the jenjang_paud column
 * @method BentukPendidikanQuery orderByJenjangTk($order = Criteria::ASC) Order by the jenjang_tk column
 * @method BentukPendidikanQuery orderByJenjangSd($order = Criteria::ASC) Order by the jenjang_sd column
 * @method BentukPendidikanQuery orderByJenjangSmp($order = Criteria::ASC) Order by the jenjang_smp column
 * @method BentukPendidikanQuery orderByJenjangSma($order = Criteria::ASC) Order by the jenjang_sma column
 * @method BentukPendidikanQuery orderByJenjangTinggi($order = Criteria::ASC) Order by the jenjang_tinggi column
 * @method BentukPendidikanQuery orderByDirektoratPembinaan($order = Criteria::ASC) Order by the direktorat_pembinaan column
 * @method BentukPendidikanQuery orderByAktif($order = Criteria::ASC) Order by the aktif column
 * @method BentukPendidikanQuery orderByFormalitasPendidikan($order = Criteria::ASC) Order by the formalitas_pendidikan column
 * @method BentukPendidikanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BentukPendidikanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BentukPendidikanQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method BentukPendidikanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method BentukPendidikanQuery groupByBentukPendidikanId() Group by the bentuk_pendidikan_id column
 * @method BentukPendidikanQuery groupByNama() Group by the nama column
 * @method BentukPendidikanQuery groupByJenjangPaud() Group by the jenjang_paud column
 * @method BentukPendidikanQuery groupByJenjangTk() Group by the jenjang_tk column
 * @method BentukPendidikanQuery groupByJenjangSd() Group by the jenjang_sd column
 * @method BentukPendidikanQuery groupByJenjangSmp() Group by the jenjang_smp column
 * @method BentukPendidikanQuery groupByJenjangSma() Group by the jenjang_sma column
 * @method BentukPendidikanQuery groupByJenjangTinggi() Group by the jenjang_tinggi column
 * @method BentukPendidikanQuery groupByDirektoratPembinaan() Group by the direktorat_pembinaan column
 * @method BentukPendidikanQuery groupByAktif() Group by the aktif column
 * @method BentukPendidikanQuery groupByFormalitasPendidikan() Group by the formalitas_pendidikan column
 * @method BentukPendidikanQuery groupByCreateDate() Group by the create_date column
 * @method BentukPendidikanQuery groupByLastUpdate() Group by the last_update column
 * @method BentukPendidikanQuery groupByExpiredDate() Group by the expired_date column
 * @method BentukPendidikanQuery groupByLastSync() Group by the last_sync column
 *
 * @method BentukPendidikanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BentukPendidikanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BentukPendidikanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BentukPendidikanQuery leftJoinPeran($relationAlias = null) Adds a LEFT JOIN clause to the query using the Peran relation
 * @method BentukPendidikanQuery rightJoinPeran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Peran relation
 * @method BentukPendidikanQuery innerJoinPeran($relationAlias = null) Adds a INNER JOIN clause to the query using the Peran relation
 *
 * @method BentukPendidikanQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method BentukPendidikanQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method BentukPendidikanQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method BentukPendidikanQuery leftJoinStandarSarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the StandarSarana relation
 * @method BentukPendidikanQuery rightJoinStandarSarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StandarSarana relation
 * @method BentukPendidikanQuery innerJoinStandarSarana($relationAlias = null) Adds a INNER JOIN clause to the query using the StandarSarana relation
 *
 * @method BentukPendidikan findOne(PropelPDO $con = null) Return the first BentukPendidikan matching the query
 * @method BentukPendidikan findOneOrCreate(PropelPDO $con = null) Return the first BentukPendidikan matching the query, or a new BentukPendidikan object populated from the query conditions when no match is found
 *
 * @method BentukPendidikan findOneByNama(string $nama) Return the first BentukPendidikan filtered by the nama column
 * @method BentukPendidikan findOneByJenjangPaud(string $jenjang_paud) Return the first BentukPendidikan filtered by the jenjang_paud column
 * @method BentukPendidikan findOneByJenjangTk(string $jenjang_tk) Return the first BentukPendidikan filtered by the jenjang_tk column
 * @method BentukPendidikan findOneByJenjangSd(string $jenjang_sd) Return the first BentukPendidikan filtered by the jenjang_sd column
 * @method BentukPendidikan findOneByJenjangSmp(string $jenjang_smp) Return the first BentukPendidikan filtered by the jenjang_smp column
 * @method BentukPendidikan findOneByJenjangSma(string $jenjang_sma) Return the first BentukPendidikan filtered by the jenjang_sma column
 * @method BentukPendidikan findOneByJenjangTinggi(string $jenjang_tinggi) Return the first BentukPendidikan filtered by the jenjang_tinggi column
 * @method BentukPendidikan findOneByDirektoratPembinaan(string $direktorat_pembinaan) Return the first BentukPendidikan filtered by the direktorat_pembinaan column
 * @method BentukPendidikan findOneByAktif(string $aktif) Return the first BentukPendidikan filtered by the aktif column
 * @method BentukPendidikan findOneByFormalitasPendidikan(string $formalitas_pendidikan) Return the first BentukPendidikan filtered by the formalitas_pendidikan column
 * @method BentukPendidikan findOneByCreateDate(string $create_date) Return the first BentukPendidikan filtered by the create_date column
 * @method BentukPendidikan findOneByLastUpdate(string $last_update) Return the first BentukPendidikan filtered by the last_update column
 * @method BentukPendidikan findOneByExpiredDate(string $expired_date) Return the first BentukPendidikan filtered by the expired_date column
 * @method BentukPendidikan findOneByLastSync(string $last_sync) Return the first BentukPendidikan filtered by the last_sync column
 *
 * @method array findByBentukPendidikanId(int $bentuk_pendidikan_id) Return BentukPendidikan objects filtered by the bentuk_pendidikan_id column
 * @method array findByNama(string $nama) Return BentukPendidikan objects filtered by the nama column
 * @method array findByJenjangPaud(string $jenjang_paud) Return BentukPendidikan objects filtered by the jenjang_paud column
 * @method array findByJenjangTk(string $jenjang_tk) Return BentukPendidikan objects filtered by the jenjang_tk column
 * @method array findByJenjangSd(string $jenjang_sd) Return BentukPendidikan objects filtered by the jenjang_sd column
 * @method array findByJenjangSmp(string $jenjang_smp) Return BentukPendidikan objects filtered by the jenjang_smp column
 * @method array findByJenjangSma(string $jenjang_sma) Return BentukPendidikan objects filtered by the jenjang_sma column
 * @method array findByJenjangTinggi(string $jenjang_tinggi) Return BentukPendidikan objects filtered by the jenjang_tinggi column
 * @method array findByDirektoratPembinaan(string $direktorat_pembinaan) Return BentukPendidikan objects filtered by the direktorat_pembinaan column
 * @method array findByAktif(string $aktif) Return BentukPendidikan objects filtered by the aktif column
 * @method array findByFormalitasPendidikan(string $formalitas_pendidikan) Return BentukPendidikan objects filtered by the formalitas_pendidikan column
 * @method array findByCreateDate(string $create_date) Return BentukPendidikan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BentukPendidikan objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return BentukPendidikan objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return BentukPendidikan objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBentukPendidikanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBentukPendidikanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\BentukPendidikan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BentukPendidikanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BentukPendidikanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BentukPendidikanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BentukPendidikanQuery) {
            return $criteria;
        }
        $query = new BentukPendidikanQuery();
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
     * @return   BentukPendidikan|BentukPendidikan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BentukPendidikanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BentukPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BentukPendidikan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByBentukPendidikanId($key, $con = null)
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
     * @return                 BentukPendidikan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "bentuk_pendidikan_id", "nama", "jenjang_paud", "jenjang_tk", "jenjang_sd", "jenjang_smp", "jenjang_sma", "jenjang_tinggi", "direktorat_pembinaan", "aktif", "formalitas_pendidikan", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."bentuk_pendidikan" WHERE "bentuk_pendidikan_id" = :p0';
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
            $obj = new BentukPendidikan();
            $obj->hydrate($row);
            BentukPendidikanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BentukPendidikan|BentukPendidikan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BentukPendidikan[]|mixed the list of results, formatted by the current formatter
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
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the bentuk_pendidikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBentukPendidikanId(1234); // WHERE bentuk_pendidikan_id = 1234
     * $query->filterByBentukPendidikanId(array(12, 34)); // WHERE bentuk_pendidikan_id IN (12, 34)
     * $query->filterByBentukPendidikanId(array('min' => 12)); // WHERE bentuk_pendidikan_id >= 12
     * $query->filterByBentukPendidikanId(array('max' => 12)); // WHERE bentuk_pendidikan_id <= 12
     * </code>
     *
     * @param     mixed $bentukPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByBentukPendidikanId($bentukPendidikanId = null, $comparison = null)
    {
        if (is_array($bentukPendidikanId)) {
            $useMinMax = false;
            if (isset($bentukPendidikanId['min'])) {
                $this->addUsingAlias(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bentukPendidikanId['max'])) {
                $this->addUsingAlias(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId, $comparison);
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
     * @return BentukPendidikanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BentukPendidikanPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the jenjang_paud column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangPaud(1234); // WHERE jenjang_paud = 1234
     * $query->filterByJenjangPaud(array(12, 34)); // WHERE jenjang_paud IN (12, 34)
     * $query->filterByJenjangPaud(array('min' => 12)); // WHERE jenjang_paud >= 12
     * $query->filterByJenjangPaud(array('max' => 12)); // WHERE jenjang_paud <= 12
     * </code>
     *
     * @param     mixed $jenjangPaud The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByJenjangPaud($jenjangPaud = null, $comparison = null)
    {
        if (is_array($jenjangPaud)) {
            $useMinMax = false;
            if (isset($jenjangPaud['min'])) {
                $this->addUsingAlias(BentukPendidikanPeer::JENJANG_PAUD, $jenjangPaud['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPaud['max'])) {
                $this->addUsingAlias(BentukPendidikanPeer::JENJANG_PAUD, $jenjangPaud['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::JENJANG_PAUD, $jenjangPaud, $comparison);
    }

    /**
     * Filter the query on the jenjang_tk column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangTk(1234); // WHERE jenjang_tk = 1234
     * $query->filterByJenjangTk(array(12, 34)); // WHERE jenjang_tk IN (12, 34)
     * $query->filterByJenjangTk(array('min' => 12)); // WHERE jenjang_tk >= 12
     * $query->filterByJenjangTk(array('max' => 12)); // WHERE jenjang_tk <= 12
     * </code>
     *
     * @param     mixed $jenjangTk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByJenjangTk($jenjangTk = null, $comparison = null)
    {
        if (is_array($jenjangTk)) {
            $useMinMax = false;
            if (isset($jenjangTk['min'])) {
                $this->addUsingAlias(BentukPendidikanPeer::JENJANG_TK, $jenjangTk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangTk['max'])) {
                $this->addUsingAlias(BentukPendidikanPeer::JENJANG_TK, $jenjangTk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::JENJANG_TK, $jenjangTk, $comparison);
    }

    /**
     * Filter the query on the jenjang_sd column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangSd(1234); // WHERE jenjang_sd = 1234
     * $query->filterByJenjangSd(array(12, 34)); // WHERE jenjang_sd IN (12, 34)
     * $query->filterByJenjangSd(array('min' => 12)); // WHERE jenjang_sd >= 12
     * $query->filterByJenjangSd(array('max' => 12)); // WHERE jenjang_sd <= 12
     * </code>
     *
     * @param     mixed $jenjangSd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByJenjangSd($jenjangSd = null, $comparison = null)
    {
        if (is_array($jenjangSd)) {
            $useMinMax = false;
            if (isset($jenjangSd['min'])) {
                $this->addUsingAlias(BentukPendidikanPeer::JENJANG_SD, $jenjangSd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangSd['max'])) {
                $this->addUsingAlias(BentukPendidikanPeer::JENJANG_SD, $jenjangSd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::JENJANG_SD, $jenjangSd, $comparison);
    }

    /**
     * Filter the query on the jenjang_smp column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangSmp(1234); // WHERE jenjang_smp = 1234
     * $query->filterByJenjangSmp(array(12, 34)); // WHERE jenjang_smp IN (12, 34)
     * $query->filterByJenjangSmp(array('min' => 12)); // WHERE jenjang_smp >= 12
     * $query->filterByJenjangSmp(array('max' => 12)); // WHERE jenjang_smp <= 12
     * </code>
     *
     * @param     mixed $jenjangSmp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByJenjangSmp($jenjangSmp = null, $comparison = null)
    {
        if (is_array($jenjangSmp)) {
            $useMinMax = false;
            if (isset($jenjangSmp['min'])) {
                $this->addUsingAlias(BentukPendidikanPeer::JENJANG_SMP, $jenjangSmp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangSmp['max'])) {
                $this->addUsingAlias(BentukPendidikanPeer::JENJANG_SMP, $jenjangSmp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::JENJANG_SMP, $jenjangSmp, $comparison);
    }

    /**
     * Filter the query on the jenjang_sma column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangSma(1234); // WHERE jenjang_sma = 1234
     * $query->filterByJenjangSma(array(12, 34)); // WHERE jenjang_sma IN (12, 34)
     * $query->filterByJenjangSma(array('min' => 12)); // WHERE jenjang_sma >= 12
     * $query->filterByJenjangSma(array('max' => 12)); // WHERE jenjang_sma <= 12
     * </code>
     *
     * @param     mixed $jenjangSma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByJenjangSma($jenjangSma = null, $comparison = null)
    {
        if (is_array($jenjangSma)) {
            $useMinMax = false;
            if (isset($jenjangSma['min'])) {
                $this->addUsingAlias(BentukPendidikanPeer::JENJANG_SMA, $jenjangSma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangSma['max'])) {
                $this->addUsingAlias(BentukPendidikanPeer::JENJANG_SMA, $jenjangSma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::JENJANG_SMA, $jenjangSma, $comparison);
    }

    /**
     * Filter the query on the jenjang_tinggi column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangTinggi(1234); // WHERE jenjang_tinggi = 1234
     * $query->filterByJenjangTinggi(array(12, 34)); // WHERE jenjang_tinggi IN (12, 34)
     * $query->filterByJenjangTinggi(array('min' => 12)); // WHERE jenjang_tinggi >= 12
     * $query->filterByJenjangTinggi(array('max' => 12)); // WHERE jenjang_tinggi <= 12
     * </code>
     *
     * @param     mixed $jenjangTinggi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByJenjangTinggi($jenjangTinggi = null, $comparison = null)
    {
        if (is_array($jenjangTinggi)) {
            $useMinMax = false;
            if (isset($jenjangTinggi['min'])) {
                $this->addUsingAlias(BentukPendidikanPeer::JENJANG_TINGGI, $jenjangTinggi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangTinggi['max'])) {
                $this->addUsingAlias(BentukPendidikanPeer::JENJANG_TINGGI, $jenjangTinggi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::JENJANG_TINGGI, $jenjangTinggi, $comparison);
    }

    /**
     * Filter the query on the direktorat_pembinaan column
     *
     * Example usage:
     * <code>
     * $query->filterByDirektoratPembinaan('fooValue');   // WHERE direktorat_pembinaan = 'fooValue'
     * $query->filterByDirektoratPembinaan('%fooValue%'); // WHERE direktorat_pembinaan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $direktoratPembinaan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByDirektoratPembinaan($direktoratPembinaan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($direktoratPembinaan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $direktoratPembinaan)) {
                $direktoratPembinaan = str_replace('*', '%', $direktoratPembinaan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::DIREKTORAT_PEMBINAAN, $direktoratPembinaan, $comparison);
    }

    /**
     * Filter the query on the aktif column
     *
     * Example usage:
     * <code>
     * $query->filterByAktif(1234); // WHERE aktif = 1234
     * $query->filterByAktif(array(12, 34)); // WHERE aktif IN (12, 34)
     * $query->filterByAktif(array('min' => 12)); // WHERE aktif >= 12
     * $query->filterByAktif(array('max' => 12)); // WHERE aktif <= 12
     * </code>
     *
     * @param     mixed $aktif The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByAktif($aktif = null, $comparison = null)
    {
        if (is_array($aktif)) {
            $useMinMax = false;
            if (isset($aktif['min'])) {
                $this->addUsingAlias(BentukPendidikanPeer::AKTIF, $aktif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktif['max'])) {
                $this->addUsingAlias(BentukPendidikanPeer::AKTIF, $aktif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::AKTIF, $aktif, $comparison);
    }

    /**
     * Filter the query on the formalitas_pendidikan column
     *
     * Example usage:
     * <code>
     * $query->filterByFormalitasPendidikan('fooValue');   // WHERE formalitas_pendidikan = 'fooValue'
     * $query->filterByFormalitasPendidikan('%fooValue%'); // WHERE formalitas_pendidikan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $formalitasPendidikan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByFormalitasPendidikan($formalitasPendidikan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($formalitasPendidikan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $formalitasPendidikan)) {
                $formalitasPendidikan = str_replace('*', '%', $formalitasPendidikan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::FORMALITAS_PENDIDIKAN, $formalitasPendidikan, $comparison);
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
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BentukPendidikanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BentukPendidikanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BentukPendidikanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BentukPendidikanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(BentukPendidikanPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(BentukPendidikanPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BentukPendidikanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BentukPendidikanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BentukPendidikanPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Peran object
     *
     * @param   Peran|PropelObjectCollection $peran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BentukPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPeran($peran, $comparison = null)
    {
        if ($peran instanceof Peran) {
            return $this
                ->addUsingAlias(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $peran->getBentukPendidikanId(), $comparison);
        } elseif ($peran instanceof PropelObjectCollection) {
            return $this
                ->usePeranQuery()
                ->filterByPrimaryKeys($peran->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPeran() only accepts arguments of type Peran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Peran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function joinPeran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Peran');

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
            $this->addJoinObject($join, 'Peran');
        }

        return $this;
    }

    /**
     * Use the Peran relation Peran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PeranQuery A secondary query class using the current class as primary query
     */
    public function usePeranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPeran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Peran', '\DataDikdas\Model\PeranQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BentukPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $sekolah->getBentukPendidikanId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            return $this
                ->useSekolahQuery()
                ->filterByPrimaryKeys($sekolah->getPrimaryKeys())
                ->endUse();
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
     * @return BentukPendidikanQuery The current query, for fluid interface
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
     * Filter the query by a related StandarSarana object
     *
     * @param   StandarSarana|PropelObjectCollection $standarSarana  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BentukPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStandarSarana($standarSarana, $comparison = null)
    {
        if ($standarSarana instanceof StandarSarana) {
            return $this
                ->addUsingAlias(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $standarSarana->getBentukPendidikanId(), $comparison);
        } elseif ($standarSarana instanceof PropelObjectCollection) {
            return $this
                ->useStandarSaranaQuery()
                ->filterByPrimaryKeys($standarSarana->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStandarSarana() only accepts arguments of type StandarSarana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StandarSarana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function joinStandarSarana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StandarSarana');

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
            $this->addJoinObject($join, 'StandarSarana');
        }

        return $this;
    }

    /**
     * Use the StandarSarana relation StandarSarana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\StandarSaranaQuery A secondary query class using the current class as primary query
     */
    public function useStandarSaranaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStandarSarana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StandarSarana', '\DataDikdas\Model\StandarSaranaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BentukPendidikan $bentukPendidikan Object to remove from the list of results
     *
     * @return BentukPendidikanQuery The current query, for fluid interface
     */
    public function prune($bentukPendidikan = null)
    {
        if ($bentukPendidikan) {
            $this->addUsingAlias(BentukPendidikanPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikan->getBentukPendidikanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
