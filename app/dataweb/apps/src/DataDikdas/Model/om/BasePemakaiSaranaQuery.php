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
use DataDikdas\Model\JenisSarana;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\PemakaiSarana;
use DataDikdas\Model\PemakaiSaranaPeer;
use DataDikdas\Model\PemakaiSaranaQuery;

/**
 * Base class that represents a query for the 'ref.pemakai_sarana' table.
 *
 * 
 *
 * @method PemakaiSaranaQuery orderByJenisSaranaId($order = Criteria::ASC) Order by the jenis_sarana_id column
 * @method PemakaiSaranaQuery orderByJurusanId($order = Criteria::ASC) Order by the jurusan_id column
 * @method PemakaiSaranaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PemakaiSaranaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PemakaiSaranaQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method PemakaiSaranaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method PemakaiSaranaQuery groupByJenisSaranaId() Group by the jenis_sarana_id column
 * @method PemakaiSaranaQuery groupByJurusanId() Group by the jurusan_id column
 * @method PemakaiSaranaQuery groupByCreateDate() Group by the create_date column
 * @method PemakaiSaranaQuery groupByLastUpdate() Group by the last_update column
 * @method PemakaiSaranaQuery groupByExpiredDate() Group by the expired_date column
 * @method PemakaiSaranaQuery groupByLastSync() Group by the last_sync column
 *
 * @method PemakaiSaranaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PemakaiSaranaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PemakaiSaranaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PemakaiSaranaQuery leftJoinJurusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Jurusan relation
 * @method PemakaiSaranaQuery rightJoinJurusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Jurusan relation
 * @method PemakaiSaranaQuery innerJoinJurusan($relationAlias = null) Adds a INNER JOIN clause to the query using the Jurusan relation
 *
 * @method PemakaiSaranaQuery leftJoinJenisSarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisSarana relation
 * @method PemakaiSaranaQuery rightJoinJenisSarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisSarana relation
 * @method PemakaiSaranaQuery innerJoinJenisSarana($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisSarana relation
 *
 * @method PemakaiSarana findOne(PropelPDO $con = null) Return the first PemakaiSarana matching the query
 * @method PemakaiSarana findOneOrCreate(PropelPDO $con = null) Return the first PemakaiSarana matching the query, or a new PemakaiSarana object populated from the query conditions when no match is found
 *
 * @method PemakaiSarana findOneByJenisSaranaId(int $jenis_sarana_id) Return the first PemakaiSarana filtered by the jenis_sarana_id column
 * @method PemakaiSarana findOneByJurusanId(string $jurusan_id) Return the first PemakaiSarana filtered by the jurusan_id column
 * @method PemakaiSarana findOneByCreateDate(string $create_date) Return the first PemakaiSarana filtered by the create_date column
 * @method PemakaiSarana findOneByLastUpdate(string $last_update) Return the first PemakaiSarana filtered by the last_update column
 * @method PemakaiSarana findOneByExpiredDate(string $expired_date) Return the first PemakaiSarana filtered by the expired_date column
 * @method PemakaiSarana findOneByLastSync(string $last_sync) Return the first PemakaiSarana filtered by the last_sync column
 *
 * @method array findByJenisSaranaId(int $jenis_sarana_id) Return PemakaiSarana objects filtered by the jenis_sarana_id column
 * @method array findByJurusanId(string $jurusan_id) Return PemakaiSarana objects filtered by the jurusan_id column
 * @method array findByCreateDate(string $create_date) Return PemakaiSarana objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return PemakaiSarana objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return PemakaiSarana objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return PemakaiSarana objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePemakaiSaranaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePemakaiSaranaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\PemakaiSarana', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PemakaiSaranaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PemakaiSaranaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PemakaiSaranaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PemakaiSaranaQuery) {
            return $criteria;
        }
        $query = new PemakaiSaranaQuery();
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
                         A Primary key composition: [$jenis_sarana_id, $jurusan_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   PemakaiSarana|PemakaiSarana[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PemakaiSaranaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PemakaiSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PemakaiSarana A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_sarana_id", "jurusan_id", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."pemakai_sarana" WHERE "jenis_sarana_id" = :p0 AND "jurusan_id" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new PemakaiSarana();
            $obj->hydrate($row);
            PemakaiSaranaPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return PemakaiSarana|PemakaiSarana[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PemakaiSarana[]|mixed the list of results, formatted by the current formatter
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
     * @return PemakaiSaranaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PemakaiSaranaPeer::JENIS_SARANA_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PemakaiSaranaPeer::JURUSAN_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PemakaiSaranaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PemakaiSaranaPeer::JENIS_SARANA_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PemakaiSaranaPeer::JURUSAN_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return PemakaiSaranaQuery The current query, for fluid interface
     */
    public function filterByJenisSaranaId($jenisSaranaId = null, $comparison = null)
    {
        if (is_array($jenisSaranaId)) {
            $useMinMax = false;
            if (isset($jenisSaranaId['min'])) {
                $this->addUsingAlias(PemakaiSaranaPeer::JENIS_SARANA_ID, $jenisSaranaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisSaranaId['max'])) {
                $this->addUsingAlias(PemakaiSaranaPeer::JENIS_SARANA_ID, $jenisSaranaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PemakaiSaranaPeer::JENIS_SARANA_ID, $jenisSaranaId, $comparison);
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
     * @return PemakaiSaranaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PemakaiSaranaPeer::JURUSAN_ID, $jurusanId, $comparison);
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
     * @return PemakaiSaranaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PemakaiSaranaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PemakaiSaranaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PemakaiSaranaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PemakaiSaranaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PemakaiSaranaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PemakaiSaranaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PemakaiSaranaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PemakaiSaranaQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(PemakaiSaranaPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(PemakaiSaranaPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PemakaiSaranaPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return PemakaiSaranaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PemakaiSaranaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PemakaiSaranaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PemakaiSaranaPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Jurusan object
     *
     * @param   Jurusan|PropelObjectCollection $jurusan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PemakaiSaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusan($jurusan, $comparison = null)
    {
        if ($jurusan instanceof Jurusan) {
            return $this
                ->addUsingAlias(PemakaiSaranaPeer::JURUSAN_ID, $jurusan->getJurusanId(), $comparison);
        } elseif ($jurusan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PemakaiSaranaPeer::JURUSAN_ID, $jurusan->toKeyValue('PrimaryKey', 'JurusanId'), $comparison);
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
     * @return PemakaiSaranaQuery The current query, for fluid interface
     */
    public function joinJurusan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useJurusanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJurusan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Jurusan', '\DataDikdas\Model\JurusanQuery');
    }

    /**
     * Filter the query by a related JenisSarana object
     *
     * @param   JenisSarana|PropelObjectCollection $jenisSarana The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PemakaiSaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisSarana($jenisSarana, $comparison = null)
    {
        if ($jenisSarana instanceof JenisSarana) {
            return $this
                ->addUsingAlias(PemakaiSaranaPeer::JENIS_SARANA_ID, $jenisSarana->getJenisSaranaId(), $comparison);
        } elseif ($jenisSarana instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PemakaiSaranaPeer::JENIS_SARANA_ID, $jenisSarana->toKeyValue('PrimaryKey', 'JenisSaranaId'), $comparison);
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
     * @return PemakaiSaranaQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   PemakaiSarana $pemakaiSarana Object to remove from the list of results
     *
     * @return PemakaiSaranaQuery The current query, for fluid interface
     */
    public function prune($pemakaiSarana = null)
    {
        if ($pemakaiSarana) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PemakaiSaranaPeer::JENIS_SARANA_ID), $pemakaiSarana->getJenisSaranaId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PemakaiSaranaPeer::JURUSAN_ID), $pemakaiSarana->getJurusanId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
