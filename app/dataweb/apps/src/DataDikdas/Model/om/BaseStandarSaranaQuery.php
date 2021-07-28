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
use DataDikdas\Model\JenisPrasarana;
use DataDikdas\Model\JenisSarana;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\StandarSarana;
use DataDikdas\Model\StandarSaranaPeer;
use DataDikdas\Model\StandarSaranaQuery;

/**
 * Base class that represents a query for the 'ref.standar_sarana' table.
 *
 * 
 *
 * @method StandarSaranaQuery orderByIdStdSarana($order = Criteria::ASC) Order by the id_std_sarana column
 * @method StandarSaranaQuery orderByJenisPrasaranaId($order = Criteria::ASC) Order by the jenis_prasarana_id column
 * @method StandarSaranaQuery orderByJenisSaranaId($order = Criteria::ASC) Order by the jenis_sarana_id column
 * @method StandarSaranaQuery orderByJurusanId($order = Criteria::ASC) Order by the jurusan_id column
 * @method StandarSaranaQuery orderByBentukPendidikanId($order = Criteria::ASC) Order by the bentuk_pendidikan_id column
 * @method StandarSaranaQuery orderByAHarusAda($order = Criteria::ASC) Order by the a_harus_ada column
 * @method StandarSaranaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method StandarSaranaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method StandarSaranaQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method StandarSaranaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method StandarSaranaQuery groupByIdStdSarana() Group by the id_std_sarana column
 * @method StandarSaranaQuery groupByJenisPrasaranaId() Group by the jenis_prasarana_id column
 * @method StandarSaranaQuery groupByJenisSaranaId() Group by the jenis_sarana_id column
 * @method StandarSaranaQuery groupByJurusanId() Group by the jurusan_id column
 * @method StandarSaranaQuery groupByBentukPendidikanId() Group by the bentuk_pendidikan_id column
 * @method StandarSaranaQuery groupByAHarusAda() Group by the a_harus_ada column
 * @method StandarSaranaQuery groupByCreateDate() Group by the create_date column
 * @method StandarSaranaQuery groupByLastUpdate() Group by the last_update column
 * @method StandarSaranaQuery groupByExpiredDate() Group by the expired_date column
 * @method StandarSaranaQuery groupByLastSync() Group by the last_sync column
 *
 * @method StandarSaranaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StandarSaranaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StandarSaranaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method StandarSaranaQuery leftJoinJenisSarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisSarana relation
 * @method StandarSaranaQuery rightJoinJenisSarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisSarana relation
 * @method StandarSaranaQuery innerJoinJenisSarana($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisSarana relation
 *
 * @method StandarSaranaQuery leftJoinBentukPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the BentukPendidikan relation
 * @method StandarSaranaQuery rightJoinBentukPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BentukPendidikan relation
 * @method StandarSaranaQuery innerJoinBentukPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the BentukPendidikan relation
 *
 * @method StandarSaranaQuery leftJoinJenisPrasarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisPrasarana relation
 * @method StandarSaranaQuery rightJoinJenisPrasarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisPrasarana relation
 * @method StandarSaranaQuery innerJoinJenisPrasarana($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisPrasarana relation
 *
 * @method StandarSaranaQuery leftJoinJurusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Jurusan relation
 * @method StandarSaranaQuery rightJoinJurusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Jurusan relation
 * @method StandarSaranaQuery innerJoinJurusan($relationAlias = null) Adds a INNER JOIN clause to the query using the Jurusan relation
 *
 * @method StandarSarana findOne(PropelPDO $con = null) Return the first StandarSarana matching the query
 * @method StandarSarana findOneOrCreate(PropelPDO $con = null) Return the first StandarSarana matching the query, or a new StandarSarana object populated from the query conditions when no match is found
 *
 * @method StandarSarana findOneByJenisPrasaranaId(int $jenis_prasarana_id) Return the first StandarSarana filtered by the jenis_prasarana_id column
 * @method StandarSarana findOneByJenisSaranaId(int $jenis_sarana_id) Return the first StandarSarana filtered by the jenis_sarana_id column
 * @method StandarSarana findOneByJurusanId(string $jurusan_id) Return the first StandarSarana filtered by the jurusan_id column
 * @method StandarSarana findOneByBentukPendidikanId(int $bentuk_pendidikan_id) Return the first StandarSarana filtered by the bentuk_pendidikan_id column
 * @method StandarSarana findOneByAHarusAda(string $a_harus_ada) Return the first StandarSarana filtered by the a_harus_ada column
 * @method StandarSarana findOneByCreateDate(string $create_date) Return the first StandarSarana filtered by the create_date column
 * @method StandarSarana findOneByLastUpdate(string $last_update) Return the first StandarSarana filtered by the last_update column
 * @method StandarSarana findOneByExpiredDate(string $expired_date) Return the first StandarSarana filtered by the expired_date column
 * @method StandarSarana findOneByLastSync(string $last_sync) Return the first StandarSarana filtered by the last_sync column
 *
 * @method array findByIdStdSarana(string $id_std_sarana) Return StandarSarana objects filtered by the id_std_sarana column
 * @method array findByJenisPrasaranaId(int $jenis_prasarana_id) Return StandarSarana objects filtered by the jenis_prasarana_id column
 * @method array findByJenisSaranaId(int $jenis_sarana_id) Return StandarSarana objects filtered by the jenis_sarana_id column
 * @method array findByJurusanId(string $jurusan_id) Return StandarSarana objects filtered by the jurusan_id column
 * @method array findByBentukPendidikanId(int $bentuk_pendidikan_id) Return StandarSarana objects filtered by the bentuk_pendidikan_id column
 * @method array findByAHarusAda(string $a_harus_ada) Return StandarSarana objects filtered by the a_harus_ada column
 * @method array findByCreateDate(string $create_date) Return StandarSarana objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return StandarSarana objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return StandarSarana objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return StandarSarana objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseStandarSaranaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStandarSaranaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\StandarSarana', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StandarSaranaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StandarSaranaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StandarSaranaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StandarSaranaQuery) {
            return $criteria;
        }
        $query = new StandarSaranaQuery();
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
     * @return   StandarSarana|StandarSarana[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StandarSaranaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StandarSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 StandarSarana A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdStdSarana($key, $con = null)
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
     * @return                 StandarSarana A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_std_sarana", "jenis_prasarana_id", "jenis_sarana_id", "jurusan_id", "bentuk_pendidikan_id", "a_harus_ada", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."standar_sarana" WHERE "id_std_sarana" = :p0';
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
            $obj = new StandarSarana();
            $obj->hydrate($row);
            StandarSaranaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return StandarSarana|StandarSarana[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|StandarSarana[]|mixed the list of results, formatted by the current formatter
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
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StandarSaranaPeer::ID_STD_SARANA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StandarSaranaPeer::ID_STD_SARANA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_std_sarana column
     *
     * Example usage:
     * <code>
     * $query->filterByIdStdSarana('fooValue');   // WHERE id_std_sarana = 'fooValue'
     * $query->filterByIdStdSarana('%fooValue%'); // WHERE id_std_sarana LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idStdSarana The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function filterByIdStdSarana($idStdSarana = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idStdSarana)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idStdSarana)) {
                $idStdSarana = str_replace('*', '%', $idStdSarana);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StandarSaranaPeer::ID_STD_SARANA, $idStdSarana, $comparison);
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
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function filterByJenisPrasaranaId($jenisPrasaranaId = null, $comparison = null)
    {
        if (is_array($jenisPrasaranaId)) {
            $useMinMax = false;
            if (isset($jenisPrasaranaId['min'])) {
                $this->addUsingAlias(StandarSaranaPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPrasaranaId['max'])) {
                $this->addUsingAlias(StandarSaranaPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandarSaranaPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId, $comparison);
    }

    /**
     * Filter the query on the jenis_sarana_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisSaranaId(1234); // WHERE jenis_sarana_id = 1234
     * $query->filterByJenisSaranaId(array(12, 34)); // WHERE jenis_sarana_id IN (12, 34)
     * $query->filterByJenisSaranaId(array('min' => 12)); // WHERE jenis_sarana_id >= 12
     * $query->filterByJenisSaranaId(array('max' => 12)); // WHERE jenis_sarana_id <= 12
     * </code>
     *
     * @see       filterByJenisSarana()
     *
     * @param     mixed $jenisSaranaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function filterByJenisSaranaId($jenisSaranaId = null, $comparison = null)
    {
        if (is_array($jenisSaranaId)) {
            $useMinMax = false;
            if (isset($jenisSaranaId['min'])) {
                $this->addUsingAlias(StandarSaranaPeer::JENIS_SARANA_ID, $jenisSaranaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisSaranaId['max'])) {
                $this->addUsingAlias(StandarSaranaPeer::JENIS_SARANA_ID, $jenisSaranaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandarSaranaPeer::JENIS_SARANA_ID, $jenisSaranaId, $comparison);
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
     * @return StandarSaranaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(StandarSaranaPeer::JURUSAN_ID, $jurusanId, $comparison);
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
     * @see       filterByBentukPendidikan()
     *
     * @param     mixed $bentukPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function filterByBentukPendidikanId($bentukPendidikanId = null, $comparison = null)
    {
        if (is_array($bentukPendidikanId)) {
            $useMinMax = false;
            if (isset($bentukPendidikanId['min'])) {
                $this->addUsingAlias(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bentukPendidikanId['max'])) {
                $this->addUsingAlias(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId, $comparison);
    }

    /**
     * Filter the query on the a_harus_ada column
     *
     * Example usage:
     * <code>
     * $query->filterByAHarusAda(1234); // WHERE a_harus_ada = 1234
     * $query->filterByAHarusAda(array(12, 34)); // WHERE a_harus_ada IN (12, 34)
     * $query->filterByAHarusAda(array('min' => 12)); // WHERE a_harus_ada >= 12
     * $query->filterByAHarusAda(array('max' => 12)); // WHERE a_harus_ada <= 12
     * </code>
     *
     * @param     mixed $aHarusAda The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function filterByAHarusAda($aHarusAda = null, $comparison = null)
    {
        if (is_array($aHarusAda)) {
            $useMinMax = false;
            if (isset($aHarusAda['min'])) {
                $this->addUsingAlias(StandarSaranaPeer::A_HARUS_ADA, $aHarusAda['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aHarusAda['max'])) {
                $this->addUsingAlias(StandarSaranaPeer::A_HARUS_ADA, $aHarusAda['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandarSaranaPeer::A_HARUS_ADA, $aHarusAda, $comparison);
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
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(StandarSaranaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(StandarSaranaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandarSaranaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(StandarSaranaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(StandarSaranaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandarSaranaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(StandarSaranaPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(StandarSaranaPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandarSaranaPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(StandarSaranaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(StandarSaranaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandarSaranaPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related JenisSarana object
     *
     * @param   JenisSarana|PropelObjectCollection $jenisSarana The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StandarSaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisSarana($jenisSarana, $comparison = null)
    {
        if ($jenisSarana instanceof JenisSarana) {
            return $this
                ->addUsingAlias(StandarSaranaPeer::JENIS_SARANA_ID, $jenisSarana->getJenisSaranaId(), $comparison);
        } elseif ($jenisSarana instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StandarSaranaPeer::JENIS_SARANA_ID, $jenisSarana->toKeyValue('PrimaryKey', 'JenisSaranaId'), $comparison);
        } else {
            throw new PropelException('filterByJenisSarana() only accepts arguments of type JenisSarana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisSarana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function joinJenisSarana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisSarana');

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
            $this->addJoinObject($join, 'JenisSarana');
        }

        return $this;
    }

    /**
     * Use the JenisSarana relation JenisSarana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisSaranaQuery A secondary query class using the current class as primary query
     */
    public function useJenisSaranaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisSarana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisSarana', '\DataDikdas\Model\JenisSaranaQuery');
    }

    /**
     * Filter the query by a related BentukPendidikan object
     *
     * @param   BentukPendidikan|PropelObjectCollection $bentukPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StandarSaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBentukPendidikan($bentukPendidikan, $comparison = null)
    {
        if ($bentukPendidikan instanceof BentukPendidikan) {
            return $this
                ->addUsingAlias(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikan->getBentukPendidikanId(), $comparison);
        } elseif ($bentukPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StandarSaranaPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikan->toKeyValue('PrimaryKey', 'BentukPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByBentukPendidikan() only accepts arguments of type BentukPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BentukPendidikan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function joinBentukPendidikan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BentukPendidikan');

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
            $this->addJoinObject($join, 'BentukPendidikan');
        }

        return $this;
    }

    /**
     * Use the BentukPendidikan relation BentukPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BentukPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useBentukPendidikanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBentukPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BentukPendidikan', '\DataDikdas\Model\BentukPendidikanQuery');
    }

    /**
     * Filter the query by a related JenisPrasarana object
     *
     * @param   JenisPrasarana|PropelObjectCollection $jenisPrasarana The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StandarSaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisPrasarana($jenisPrasarana, $comparison = null)
    {
        if ($jenisPrasarana instanceof JenisPrasarana) {
            return $this
                ->addUsingAlias(StandarSaranaPeer::JENIS_PRASARANA_ID, $jenisPrasarana->getJenisPrasaranaId(), $comparison);
        } elseif ($jenisPrasarana instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StandarSaranaPeer::JENIS_PRASARANA_ID, $jenisPrasarana->toKeyValue('PrimaryKey', 'JenisPrasaranaId'), $comparison);
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
     * @return StandarSaranaQuery The current query, for fluid interface
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
     * Filter the query by a related Jurusan object
     *
     * @param   Jurusan|PropelObjectCollection $jurusan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StandarSaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusan($jurusan, $comparison = null)
    {
        if ($jurusan instanceof Jurusan) {
            return $this
                ->addUsingAlias(StandarSaranaPeer::JURUSAN_ID, $jurusan->getJurusanId(), $comparison);
        } elseif ($jurusan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StandarSaranaPeer::JURUSAN_ID, $jurusan->toKeyValue('PrimaryKey', 'JurusanId'), $comparison);
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
     * @return StandarSaranaQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   StandarSarana $standarSarana Object to remove from the list of results
     *
     * @return StandarSaranaQuery The current query, for fluid interface
     */
    public function prune($standarSarana = null)
    {
        if ($standarSarana) {
            $this->addUsingAlias(StandarSaranaPeer::ID_STD_SARANA, $standarSarana->getIdStdSarana(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
