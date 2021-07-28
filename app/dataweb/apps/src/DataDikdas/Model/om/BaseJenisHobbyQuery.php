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
use DataDikdas\Model\JenisHobby;
use DataDikdas\Model\JenisHobbyPeer;
use DataDikdas\Model\JenisHobbyQuery;
use DataDikdas\Model\RegistrasiPesertaDidik;

/**
 * Base class that represents a query for the 'ref.jenis_hobby' table.
 *
 * 
 *
 * @method JenisHobbyQuery orderByIdHobby($order = Criteria::ASC) Order by the id_hobby column
 * @method JenisHobbyQuery orderByNmHobby($order = Criteria::ASC) Order by the nm_hobby column
 * @method JenisHobbyQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisHobbyQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisHobbyQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisHobbyQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisHobbyQuery groupByIdHobby() Group by the id_hobby column
 * @method JenisHobbyQuery groupByNmHobby() Group by the nm_hobby column
 * @method JenisHobbyQuery groupByCreateDate() Group by the create_date column
 * @method JenisHobbyQuery groupByLastUpdate() Group by the last_update column
 * @method JenisHobbyQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisHobbyQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisHobbyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisHobbyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisHobbyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisHobbyQuery leftJoinRegistrasiPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method JenisHobbyQuery rightJoinRegistrasiPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method JenisHobbyQuery innerJoinRegistrasiPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the RegistrasiPesertaDidik relation
 *
 * @method JenisHobby findOne(PropelPDO $con = null) Return the first JenisHobby matching the query
 * @method JenisHobby findOneOrCreate(PropelPDO $con = null) Return the first JenisHobby matching the query, or a new JenisHobby object populated from the query conditions when no match is found
 *
 * @method JenisHobby findOneByNmHobby(string $nm_hobby) Return the first JenisHobby filtered by the nm_hobby column
 * @method JenisHobby findOneByCreateDate(string $create_date) Return the first JenisHobby filtered by the create_date column
 * @method JenisHobby findOneByLastUpdate(string $last_update) Return the first JenisHobby filtered by the last_update column
 * @method JenisHobby findOneByExpiredDate(string $expired_date) Return the first JenisHobby filtered by the expired_date column
 * @method JenisHobby findOneByLastSync(string $last_sync) Return the first JenisHobby filtered by the last_sync column
 *
 * @method array findByIdHobby(string $id_hobby) Return JenisHobby objects filtered by the id_hobby column
 * @method array findByNmHobby(string $nm_hobby) Return JenisHobby objects filtered by the nm_hobby column
 * @method array findByCreateDate(string $create_date) Return JenisHobby objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisHobby objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisHobby objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisHobby objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisHobbyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisHobbyQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisHobby', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisHobbyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisHobbyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisHobbyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisHobbyQuery) {
            return $criteria;
        }
        $query = new JenisHobbyQuery();
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
     * @return   JenisHobby|JenisHobby[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisHobbyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisHobbyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisHobby A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdHobby($key, $con = null)
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
     * @return                 JenisHobby A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_hobby", "nm_hobby", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_hobby" WHERE "id_hobby" = :p0';
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
            $obj = new JenisHobby();
            $obj->hydrate($row);
            JenisHobbyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisHobby|JenisHobby[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisHobby[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisHobbyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisHobbyPeer::ID_HOBBY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisHobbyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisHobbyPeer::ID_HOBBY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_hobby column
     *
     * Example usage:
     * <code>
     * $query->filterByIdHobby(1234); // WHERE id_hobby = 1234
     * $query->filterByIdHobby(array(12, 34)); // WHERE id_hobby IN (12, 34)
     * $query->filterByIdHobby(array('min' => 12)); // WHERE id_hobby >= 12
     * $query->filterByIdHobby(array('max' => 12)); // WHERE id_hobby <= 12
     * </code>
     *
     * @param     mixed $idHobby The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisHobbyQuery The current query, for fluid interface
     */
    public function filterByIdHobby($idHobby = null, $comparison = null)
    {
        if (is_array($idHobby)) {
            $useMinMax = false;
            if (isset($idHobby['min'])) {
                $this->addUsingAlias(JenisHobbyPeer::ID_HOBBY, $idHobby['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idHobby['max'])) {
                $this->addUsingAlias(JenisHobbyPeer::ID_HOBBY, $idHobby['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisHobbyPeer::ID_HOBBY, $idHobby, $comparison);
    }

    /**
     * Filter the query on the nm_hobby column
     *
     * Example usage:
     * <code>
     * $query->filterByNmHobby('fooValue');   // WHERE nm_hobby = 'fooValue'
     * $query->filterByNmHobby('%fooValue%'); // WHERE nm_hobby LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmHobby The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisHobbyQuery The current query, for fluid interface
     */
    public function filterByNmHobby($nmHobby = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmHobby)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmHobby)) {
                $nmHobby = str_replace('*', '%', $nmHobby);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisHobbyPeer::NM_HOBBY, $nmHobby, $comparison);
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
     * @return JenisHobbyQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisHobbyPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisHobbyPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisHobbyPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisHobbyQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisHobbyPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisHobbyPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisHobbyPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisHobbyQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisHobbyPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisHobbyPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisHobbyPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisHobbyQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisHobbyPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisHobbyPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisHobbyPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related RegistrasiPesertaDidik object
     *
     * @param   RegistrasiPesertaDidik|PropelObjectCollection $registrasiPesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisHobbyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegistrasiPesertaDidik($registrasiPesertaDidik, $comparison = null)
    {
        if ($registrasiPesertaDidik instanceof RegistrasiPesertaDidik) {
            return $this
                ->addUsingAlias(JenisHobbyPeer::ID_HOBBY, $registrasiPesertaDidik->getIdHobby(), $comparison);
        } elseif ($registrasiPesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->useRegistrasiPesertaDidikQuery()
                ->filterByPrimaryKeys($registrasiPesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRegistrasiPesertaDidik() only accepts arguments of type RegistrasiPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RegistrasiPesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisHobbyQuery The current query, for fluid interface
     */
    public function joinRegistrasiPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RegistrasiPesertaDidik');

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
            $this->addJoinObject($join, 'RegistrasiPesertaDidik');
        }

        return $this;
    }

    /**
     * Use the RegistrasiPesertaDidik relation RegistrasiPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RegistrasiPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useRegistrasiPesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRegistrasiPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RegistrasiPesertaDidik', '\DataDikdas\Model\RegistrasiPesertaDidikQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisHobby $jenisHobby Object to remove from the list of results
     *
     * @return JenisHobbyQuery The current query, for fluid interface
     */
    public function prune($jenisHobby = null)
    {
        if ($jenisHobby) {
            $this->addUsingAlias(JenisHobbyPeer::ID_HOBBY, $jenisHobby->getIdHobby(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
